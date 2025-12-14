<?php
// gallery.php - Complete working version
require_once './assets/includes/header.php';
require_once './assets/includes/config.php';
require_once './assets/includes/functions.php';

// Enable debugging (set to false for production)
$debug = false;
?>

<!-- Category Filter Section -->
<section class="page-header py-5 bg-light">
    <div class="container">
        <div class="row">
            <div class="col-12 text-center animate__animated animate__fadeIn">
                <h1 class="fw-bold">Portfolio <span class="text-primary">Gallery</span></h1>
                <nav aria-label="breadcrumb" class="d-flex justify-content-center">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Gallery</li>
                    </ol>
                </nav>
            </div>
        </div>
        <div class="row justify-content-center mt-4">
            <div class="col-lg-8 text-center">
                <div class="btn-group flex-wrap" role="group">
                    <a href="?category=all" class="btn btn-outline-primary <?= (!isset($_GET['category']) || $_GET['category'] == 'all') ? 'active' : '' ?>">All</a>
                    <?php
                    // Get all categories
                    try {
                        $categories = $pdo->query("SELECT DISTINCT category FROM gallery ORDER BY category")->fetchAll(PDO::FETCH_COLUMN);
                        foreach ($categories as $category) {
                            $active = (isset($_GET['category']) && $_GET['category'] == $category) ? 'active' : '';
                            echo '<a href="?category='.urlencode($category).'" class="btn btn-outline-primary '.$active.'">'.htmlspecialchars($category).'</a>';
                        }
                    } catch (PDOException $e) {
                        if ($debug) echo '<div class="alert alert-danger">Category error: '.htmlspecialchars($e->getMessage()).'</div>';
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Gallery Grid Section -->
<section class="py-5">
    <div class="container">
        <?php
        // Handle category filter
        $category_filter = isset($_GET['category']) && $_GET['category'] !== 'all' ? $_GET['category'] : null;
        
        try {
            // Build query
            $sql = "SELECT * FROM gallery";
            $params = [];
            
            if ($category_filter) {
                $sql .= " WHERE category = :category";
                $params[':category'] = $category_filter;
            }
            
            $sql .= " ORDER BY created_at DESC";
            
            $stmt = $pdo->prepare($sql);
            $stmt->execute($params);
            
            if ($stmt->rowCount() > 0) {
                echo '<div class="row g-4">';
                
                while ($item = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    // Path configuration
                    $base_dir = __DIR__ . '/assets/uploads/gallery/';
                    $web_base = 'assets/uploads/gallery/';
                    
                    // Sanitize filename
                    $image_file = basename($item['image']);
                    
                    // File paths
                    $original_path = $base_dir . $image_file;
                    $thumb_path = $base_dir . 'thumbs/' . $image_file;
                    $web_original = $web_base . $image_file;
                    $web_thumb = $web_base . 'thumbs/' . $image_file;
                    
                    // Debug output
                    if ($debug) {
                        echo '<div class="col-12 mb-4 p-3 border rounded">';
                        echo '<h5>Debug Info for: '.htmlspecialchars($image_file).'</h5>';
                        echo '<p>Original: '.$original_path.' ('.(file_exists($original_path) ? 'Exists' : 'MISSING').')</p>';
                        echo '<p>Thumb: '.$thumb_path.' ('.(file_exists($thumb_path) ? 'Exists' : 'MISSING').')</p>';
                        echo '</div>';
                    }
                    
                    // Display gallery item
                    echo '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-item" data-category="'.htmlspecialchars($item['category']).'">';
                    echo '<div class="premium-gallery-card">';

                    if (file_exists($original_path)) {
                        // Create thumbnail if missing
                        if (!file_exists($thumb_path)) {
                            if (!file_exists(dirname($thumb_path))) {
                                mkdir(dirname($thumb_path), 0755, true);
                            }
                            createThumbnail($original_path, $thumb_path, 500, 500);
                        }
                        
                        // Use thumbnail if available, otherwise use original
                        $display_image = file_exists($thumb_path) ? $web_thumb : $web_original;
                        
                        echo '<div class="gallery-image-wrapper">';
                        echo '<img src="'.$display_image.'" class="gallery-image" alt="'.htmlspecialchars($item['title']).'" loading="lazy">';
                        echo '<div class="gallery-overlay">';
                        echo '<div class="overlay-content">';
                        echo '<h6 class="overlay-title">'.htmlspecialchars($item['title']).'</h6>';
                        echo '<span class="overlay-category">'.htmlspecialchars($item['category']).'</span>';
                        echo '</div>';
                        echo '</div>';
                        echo '</div>';
                    } else {
                        echo '<div class="card-body d-flex align-items-center justify-content-center bg-light">';
                        echo '<div class="text-center p-2">';
                        echo '<i class="bi bi-image text-muted mb-1"></i>';
                        echo '<p class="text-muted mb-0">Image not found</p>';
                        if ($debug) echo '<small class="text-danger d-block">'.htmlspecialchars($item['image']).'</small>';
                        echo '</div></div>';
                    }

                    echo '</div></div>';
                }
                
                echo '</div>'; // Close row
            } else {
                echo '<div class="text-center py-5">';
                echo '<div class="alert alert-info">No images found'.($category_filter ? ' in '.htmlspecialchars($category_filter) : '').'</div>';
                echo '</div>';
            }
        } catch (PDOException $e) {
            echo '<div class="alert alert-danger">Error loading gallery: '.htmlspecialchars($e->getMessage()).'</div>';
            if ($debug) error_log("Gallery Error: " . $e->getMessage());
        }
        ?>
    </div>
</section>

<style>
/* Gallery Page Specific Styles */
.page-header {
    background: linear-gradient(135deg, var(--bg-primary) 0%, var(--card-bg) 100%);
    border-bottom: 1px solid var(--border-color);
}

/* Category buttons */
.btn-group .btn {
    margin: 0.25rem;
    border-radius: 50px !important;
    padding: 0.75rem 2rem;
    font-weight: 600;
    transition: all 0.3s ease;
}

.btn-outline-primary {
    border: 2px solid var(--primary-color);
    color: var(--primary-color);
}

.btn-outline-primary:hover,
.btn-outline-primary.active {
    background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
    border-color: var(--primary-color);
    color: white;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(197, 44, 113, 0.3);
}

/* Gallery items use premium card styles from futuristic.css */
.gallery-item {
    opacity: 1 !important;
    transform: none !important;
}

/* Override any grayscale filters */
.gallery-item .gallery-image {
    filter: none !important;
}

.premium-gallery-card:hover .gallery-image {
    filter: brightness(1.05) contrast(1.05) !important;
}
</style>

<!-- Lightbox Initialization -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true,
        'albumLabel': 'Image %1 of %2'
    });
});
</script>

<?php
require_once './assets/includes/footer.php';
?>