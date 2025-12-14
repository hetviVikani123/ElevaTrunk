<?php
// blog.php - Blog page
require_once './assets/includes/header.php';

// Pagination setup
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$per_page = 6;
$start = ($page > 1) ? ($page * $per_page) - $per_page : 0;

// Get total posts for pagination
$total = $pdo->query("SELECT COUNT(*) FROM posts WHERE published = 1")->fetchColumn();
$pages = ceil($total / $per_page);
?>

    <!-- Page Header -->
    <section class="page-header py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center animate__animated animate__fadeIn">
                    <h1 class="fw-bold">Our <span class="text-primary">Blog</span></h1>
                    <nav aria-label="breadcrumb" class="d-flex justify-content-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Blog</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- Blog Posts -->
    <section class="py-5">
        <div class="container">
            <div class="row g-4">
                <?php
                // Fetch blog posts with pagination
                $stmt = $pdo->prepare("SELECT * FROM posts WHERE published = 1 ORDER BY published_at DESC LIMIT {$start}, {$per_page}");
                $stmt->execute();
                
                if ($stmt->rowCount() > 0) {
                    while ($post = $stmt->fetch(PDO::FETCH_ASSOC)) {
                        echo '<div class="col-md-6 col-lg-4 animate__animated animate__fadeInUp">';
                        echo '<div class="card border-0 shadow-sm h-100 hover-effect">';
                        
                        // Check if image exists
                        $image_path = 'assets/uploads/blogs/' . $post['featured_image'];
                        if (file_exists($image_path)) {
                            echo '<a href="blog-single.php?id='.$post['id'].'">';
                            echo '<img src="'.$image_path.'" class="card-img-top" alt="'.htmlspecialchars($post['title']).'" loading="lazy">';
                            echo '</a>';
                        } else {
                            echo '<div class="placeholder-image bg-light d-flex align-items-center justify-content-center" style="height: 250px;">';
                            echo '<i class="fas fa-image fa-3x text-muted"></i>';
                            echo '</div>';
                        }
                        
                        echo '<div class="card-body">';
                        echo '<div class="d-flex align-items-center mb-3 flex-wrap gap-2">';
                        echo '<span class="badge bg-primary bg-opacity-10 text-primary">'.htmlspecialchars($post['category']).'</span>';
                        echo '<small class="text-muted"><i class="far fa-calendar-alt me-1"></i>'.date('M j, Y', strtotime($post['published_at'])).'</small>';
                        echo '</div>';
                        echo '<h5 class="card-title"><a href="blog-single.php?id='.$post['id'].'" class="text-dark text-decoration-none">'.htmlspecialchars($post['title']).'</a></h5>';
                        echo '<p class="card-text text-muted">'.htmlspecialchars(substr(strip_tags($post['content']), 0, 150)).'...</p>';
                        echo '</div>';
                        echo '<div class="card-footer bg-transparent border-0 pt-0 pb-3">';
                        echo '<a href="blog-single.php?id='.$post['id'].'" class="btn btn-link text-primary text-decoration-none ps-0">Read More <i class="fas fa-arrow-right ms-1"></i></a>';
                        echo '</div></div></div>';
                    }
                } else {
                    echo '<div class="col-12 text-center py-5">';
                    echo '<div class="alert alert-info">No blog posts found. Check back soon!</div>';
                    echo '</div>';
                }
                ?>
            </div>
            
            <!-- Pagination -->
            <?php if ($pages > 1) : ?>
            <nav aria-label="Blog pagination" class="mt-5">
                <ul class="pagination justify-content-center">
                    <?php if ($page > 1) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $page - 1 ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <?php endif; ?>
                    
                    <?php for ($i = 1; $i <= $pages; $i++) : ?>
                    <li class="page-item <?= ($page == $i) ? 'active' : '' ?>">
                        <a class="page-link" href="?page=<?= $i ?>"><?= $i ?></a>
                    </li>
                    <?php endfor; ?>
                    
                    <?php if ($page < $pages) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?page=<?= $page + 1 ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                    <?php endif; ?>
                </ul>
            </nav>
            <?php endif; ?>
        </div>
    </section>

<?php
require_once './assets/includes/footer.php';
?>