<?php
require_once 'assets/includes/config.php';
require_once 'assets/includes/functions.php';

$category = $_GET['category'] ?? null;

try {
    $sql = "SELECT * FROM gallery";
    $params = [];

    if ($category && $category !== 'all') {
        $sql .= " WHERE category = :category";
        $params[':category'] = $category;
    }

    $sql .= " ORDER BY created_at DESC";
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);

    if ($stmt->rowCount() > 0) {
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
            
            // Display gallery item with same structure as main page
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
                echo '<div class="gallery-image-wrapper d-flex align-items-center justify-content-center bg-light">';
                echo '<div class="text-center p-2">';
                echo '<i class="fas fa-image text-muted mb-1"></i>';
                echo '<p class="text-muted mb-0 small">Image not found</p>';
                echo '</div></div>';
            }

            echo '</div></div>';
        }
    } else {
        echo '<div class="col-12 text-center py-5"><div class="alert alert-info">No images found in this category</div></div>';
    }
} catch (PDOException $e) {
    echo '<div class="col-12 alert alert-danger">Database error: '.htmlspecialchars($e->getMessage()).'</div>';
}
