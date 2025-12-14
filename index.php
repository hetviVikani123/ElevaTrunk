<?php
// index.php - Homepage
require_once './assets/includes/header.php';
?>
<head>  <!-- Font Awesome 6 Free -->
<!-- Font Awesome 5 Free -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<style>
     .text-primary {
    color: #ff914d;
}</style>
</head>
  <body>
<!-- Futuristic Hero Section -->
<section class="futuristic-hero" id="heroSection">
    <!-- Animated Background Grid -->
    <div class="hero-grid-bg">
        <canvas id="gridCanvas" class="grid-canvas"></canvas>
    </div>
    
    <!-- Holographic Gradient Mesh -->
    <div class="holographic-mesh">
        <div class="mesh-gradient"></div>
        <div class="mesh-gradient"></div>
        <div class="mesh-gradient"></div>
    </div>
    
    <!-- Floating Elements -->
    <div class="floating-elements">
        <div class="float-icon" style="--delay: 0s; --duration: 20s;">
            <i class="fas fa-camera"></i>
        </div>
        <div class="float-icon" style="--delay: 2s; --duration: 18s;">
            <i class="fas fa-video"></i>
        </div>
        <div class="float-icon" style="--delay: 4s; --duration: 22s;">
            <i class="fab fa-instagram"></i>
        </div>
        <div class="float-icon" style="--delay: 6s; --duration: 19s;">
            <i class="fas fa-hashtag"></i>
        </div>
        <div class="float-icon" style="--delay: 8s; --duration: 21s;">
            <i class="fas fa-chart-line"></i>
        </div>
        <div class="float-icon" style="--delay: 10s; --duration: 17s;">
            <i class="fab fa-facebook"></i>
        </div>
    </div>
    
    <!-- Hero Content -->
    <div class="hero-content-wrapper">
        <div class="container">
            <div class="row align-items-center min-vh-100">
                <div class="col-lg-7">
                    <div class="hero-text">
                        <!-- Main Heading with Glitch Effect -->
                        <h1 class="hero-title glitch" data-text="Elevate Your Brand">
                            <span class="hero-line" data-aos="fade-right" data-aos-delay="100">
                                Elevate Your
                            </span>
                            <span class="hero-line holographic-text" data-aos="fade-right" data-aos-delay="300">
                                Brand with
                            </span>
                            <span class="hero-line brand-name" data-aos="fade-right" data-aos-delay="500">
                                Eleva Trunk Media
                            </span>
                        </h1>
                        
                        <!-- Tagline with Typewriter Effect -->
                        <p class="hero-subtitle" data-aos="fade-up" data-aos-delay="700">
                            <span class="typewriter">We craft compelling social media strategies that drive engagement and growth.</span>
                        </p>
                        
                        <!-- CTA Buttons -->
                        <div class="hero-cta" data-aos="fade-up" data-aos-delay="900">
                            <a href="contact.php" class="cta-btn cta-primary">
                                <span class="btn-text">Get Started</span>
                                <span class="btn-icon"><i class="fas fa-arrow-right"></i></span>
                            </a>
                            <a href="gallery.php" class="cta-btn cta-secondary">
                                <span class="btn-text">View Work</span>
                                <span class="btn-icon"><i class="fas fa-images"></i></span>
                            </a>
                        </div>
                    </div>
                </div>
                
                <!-- Hero Visual -->
                <div class="col-lg-5 d-none d-lg-block">
                    <div class="hero-visual" data-aos="zoom-in" data-aos-delay="600">
                        <div class="visual-frame">
                            <!-- Camera Viewfinder -->
                            <div class="viewfinder">
                                <div class="vf-corners">
                                    <span class="vf-corner tl"></span>
                                    <span class="vf-corner tr"></span>
                                    <span class="vf-corner bl"></span>
                                    <span class="vf-corner br"></span>
                                </div>
                                <div class="vf-grid">
                                    <div class="grid-line h"></div>
                                    <div class="grid-line h"></div>
                                    <div class="grid-line v"></div>
                                    <div class="grid-line v"></div>
                                </div>
                                <div class="vf-focus-point"></div>
                            </div>
                            
                            <!-- Animated Logo -->
                            <div class="hero-logo-display">
                                <img src="assets/images/logo.png" alt="Eleva Trunk Media" class="animated-logo">
                                <div class="logo-glow"></div>
                            </div>
                            
                            <!-- Tech Lines -->
                            <svg class="tech-lines" viewBox="0 0 400 400">
                                <circle cx="200" cy="200" r="150" class="tech-circle" />
                                <circle cx="200" cy="200" r="180" class="tech-circle" />
                                <line x1="50" y1="200" x2="150" y2="200" class="tech-line" />
                                <line x1="250" y1="200" x2="350" y2="200" class="tech-line" />
                                <line x1="200" y1="50" x2="200" y2="150" class="tech-line" />
                                <line x1="200" y1="250" x2="200" y2="350" class="tech-line" />
                            </svg>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Scroll Indicator -->
    <div class="scroll-indicator" data-aos="fade-up" data-aos-delay="1300">
        <div class="mouse">
            <div class="wheel"></div>
        </div>
        <div class="scroll-text">Scroll to explore</div>
    </div>
</section>
    <!-- Services Section -->
<section class="services-premium-section py-5" data-aos="fade-up">
    <div class="services-bg-pattern"></div>
    <div class="container position-relative">
        <div class="text-center mb-5" data-aos="fade-down">
            <h2 class="section-title-large mb-4">
                <span class="gradient-text">Elevate Your Brand</span><br>
                With Our Services
            </h2>
        </div>
        
        <div class="row g-4">
            <!-- Service 1 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="premium-service-card">
                    <div class="service-card-bg"></div>
                    <div class="service-icon-wrapper">
                        <div class="service-icon">
                            <i class="fas fa-bullhorn"></i>
                        </div>
                        <div class="icon-glow"></div>
                    </div>
                    <h3 class="service-title">Social Media Strategy</h3>
                    <p class="service-description">Customized plans to maximize your online presence and engagement across all platforms</p>
                    <div class="service-features">
                        <span class="feature-tag"><i class="fas fa-check"></i> Strategy Planning</span>
                        <span class="feature-tag"><i class="fas fa-check"></i> Audience Analysis</span>
                        <span class="feature-tag"><i class="fas fa-check"></i> Content Calendar</span>
                    </div>
                    <div class="service-number">01</div>
                </div>
            </div>
            
            <!-- Service 2 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="premium-service-card">
                    <div class="service-card-bg"></div>
                    <div class="service-icon-wrapper">
                        <div class="service-icon">
                            <i class="fas fa-camera"></i>
                        </div>
                        <div class="icon-glow"></div>
                    </div>
                    <h3 class="service-title">Content Creation</h3>
                    <p class="service-description">Stunning visuals and compelling copy that tells your brand story and captivates your audience</p>
                    <div class="service-features">
                        <span class="feature-tag"><i class="fas fa-check"></i> Photography</span>
                        <span class="feature-tag"><i class="fas fa-check"></i> Videography</span>
                        <span class="feature-tag"><i class="fas fa-check"></i> Copywriting</span>
                    </div>
                    <div class="service-number">02</div>
                </div>
            </div>
            
            <!-- Service 3 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="premium-service-card">
                    <div class="service-card-bg"></div>
                    <div class="service-icon-wrapper">
                        <div class="service-icon">
                            <i class="fas fa-paint-brush"></i>
                        </div>
                        <div class="icon-glow"></div>
                    </div>
                    <h3 class="service-title">Graphic Design</h3>
                    <p class="service-description">Strategic design that boosts recognition and communicates your brand's message clearly</p>
                    <div class="service-features">
                        <span class="feature-tag"><i class="fas fa-check"></i> Brand Identity</span>
                        <span class="feature-tag"><i class="fas fa-check"></i> Social Graphics</span>
                        <span class="feature-tag"><i class="fas fa-check"></i> Print Design</span>
                    </div>
                    <div class="service-number">03</div>
                </div>
            </div>
            
            <!-- Service 4 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="100">
                <div class="premium-service-card">
                    <div class="service-card-bg"></div>
                    <div class="service-icon-wrapper">
                        <div class="service-icon">
                            <i class="fas fa-bullseye"></i>
                        </div>
                        <div class="icon-glow"></div>
                    </div>
                    <h3 class="service-title">Digital Marketing</h3>
                    <p class="service-description">Targeted digital marketing strategies that amplify your brand and convert customers</p>
                    <div class="service-features">
                        <span class="feature-tag"><i class="fas fa-check"></i> Paid Ads</span>
                        <span class="feature-tag"><i class="fas fa-check"></i> SEO/SEM</span>
                        <span class="feature-tag"><i class="fas fa-check"></i> Analytics</span>
                    </div>
                    <div class="service-number">04</div>
                </div>
            </div>
            
            <!-- Service 5 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="200">
                <div class="premium-service-card">
                    <div class="service-card-bg"></div>
                    <div class="service-icon-wrapper">
                        <div class="service-icon">
                            <i class="fas fa-laptop-code"></i>
                        </div>
                        <div class="icon-glow"></div>
                    </div>
                    <h3 class="service-title">Web Design</h3>
                    <p class="service-description">Custom websites built to elevate your brand with responsive, user-friendly designs</p>
                    <div class="service-features">
                        <span class="feature-tag"><i class="fas fa-check"></i> UI/UX Design</span>
                        <span class="feature-tag"><i class="fas fa-check"></i> Development</span>
                        <span class="feature-tag"><i class="fas fa-check"></i> Maintenance</span>
                    </div>
                    <div class="service-number">05</div>
                </div>
            </div>
            
            <!-- Service 6 -->
            <div class="col-lg-4 col-md-6" data-aos="fade-up" data-aos-delay="300">
                <div class="premium-service-card">
                    <div class="service-card-bg"></div>
                    <div class="service-icon-wrapper">
                        <div class="service-icon">
                            <i class="fas fa-chart-line"></i>
                        </div>
                        <div class="icon-glow"></div>
                    </div>
                    <h3 class="service-title">Brand Management</h3>
                    <p class="service-description">Complete brand oversight ensuring consistency and growth across all touchpoints</p>
                    <div class="service-features">
                        <span class="feature-tag"><i class="fas fa-check"></i> Monitoring</span>
                        <span class="feature-tag"><i class="fas fa-check"></i> Reputation</span>
                        <span class="feature-tag"><i class="fas fa-check"></i> Growth Strategy</span>
                    </div>
                    <div class="service-number">06</div>
                </div>
            </div>
        </div>
    </div>
</section>

<style>
    .services-carousel {
        position: relative;
        padding: 0 40px;
    }
    
    .scroll-container {
        display: flex;
        overflow-x: hidden;
        scroll-behavior: smooth;
        scroll-snap-type: x mandatory;
        -webkit-overflow-scrolling: touch;
    }
    
    .service-card {
        scroll-snap-align: start;
        min-width: calc(33.333% - 16px);
        flex: 0 0 auto;
        transition: all 0.5s ease;
        margin-right: 16px;
    }
    
    .service-card:hover {
        transform: translateY(-10px) scale(1.03);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1) !important;
    }
    
    .hover-effect:hover .icon-box {
        animation: bounce 0.5s;
    }
    
    .icon-box {
        width: 70px;
        height: 70px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
    }
    
    .carousel-btn {
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .carousel-btn:hover {
        background-color: #0d6efd !important;
        color: white !important;
    }
    
    .scroll-indicator {
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: #dee2e6;
        cursor: pointer;
        transition: all 0.3s;
    }
    
    .scroll-indicator.active {
        background-color: #0d6efd;
        width: 20px;
        border-radius: 5px;
    }
    
    @keyframes bounce {
        0%, 100% { transform: translateY(0); }
        50% { transform: translateY(-10px); }
    }
    
    @media (max-width: 768px) {
        .service-card {
            min-width: calc(100% - 16px);
        }
    }
</style>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const container = document.querySelector('.scroll-container');
        const prevBtn = document.querySelector('.prev-btn');
        const nextBtn = document.querySelector('.next-btn');
        const indicators = document.querySelectorAll('.scroll-indicator');
        let currentIndex = 0;
        
        // Calculate how many cards to scroll based on viewport width
        function getScrollAmount() {
            if (window.innerWidth < 768) return 1; // Mobile - scroll 1 card
            return 3; // Desktop - scroll 3 cards
        }
        
        // Update indicators
        function updateIndicators() {
            indicators.forEach((indicator, index) => {
                indicator.classList.toggle('active', index === currentIndex);
            });
        }
        
        // Scroll to specific index
        function scrollToIndex(index) {
            const cardWidth = document.querySelector('.service-card').offsetWidth + 16;
            const scrollAmount = index * getScrollAmount() * cardWidth;
            container.scrollTo({
                left: scrollAmount,
                behavior: 'smooth'
            });
            currentIndex = index;
            updateIndicators();
        }
        
        // Next button click
        nextBtn.addEventListener('click', () => {
            const maxIndex = Math.ceil(document.querySelectorAll('.service-card').length / getScrollAmount()) - 1;
            if (currentIndex < maxIndex) {
                scrollToIndex(currentIndex + 1);
            }
        });
        
        // Previous button click
        prevBtn.addEventListener('click', () => {
            if (currentIndex > 0) {
                scrollToIndex(currentIndex - 1);
            }
        });
        
        // Indicator clicks
        indicators.forEach((indicator, index) => {
            indicator.addEventListener('click', () => {
                scrollToIndex(index);
            });
        });
        
        // Handle scroll events to update indicators
        container.addEventListener('scroll', () => {
            const cardWidth = document.querySelector('.service-card').offsetWidth + 16;
            const scrollPos = container.scrollLeft;
            currentIndex = Math.round(scrollPos / (cardWidth * getScrollAmount()));
            updateIndicators();
        });
        
        // Initialize
        updateIndicators();
    });
</script>

    <!-- About Section -->
    <section class="premium-about-section py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-6 mb-4 mb-lg-0" data-aos="fade-right">
                    <div class="about-image-showcase">
                        <div class="showcase-main">
                            <img src="assets/images/IMG_6048.JPG" alt="About Eleva Trunk Media" class="img-fluid">
                            <div class="image-border-gradient"></div>
                        </div>
                        <div class="floating-badge badge-1">
                            <i class="fas fa-award"></i>
                            <span>Award Winning</span>
                        </div>
                        <div class="floating-badge badge-2">
                            <i class="fas fa-users"></i>
                            <span>100+ Clients</span>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="about-content-wrapper">
                        <h2 class="section-title-large mb-4">
                            Elevating Brands Through
                            <span class="gradient-text">Creative Excellence</span>
                        </h2>
                        
                        <div class="about-description">
                            <p class="lead-text">With a strong foundation in filmmaking and marketing, Eleva Trunk Media was born from the belief in the power of storytelling through visuals.</p>

                            
                            <p>At Eleva Trunk Media, we're not just another marketing agency. We're your creative partners. We don't stop at strategy or posting content—we go all the way. From conceptualizing a campaign to physically coming to your space, shooting content, curating social media calendars, building brand strategies, and finally, posting and promoting your content—we do it all.</p>
                            
                            <p>Our approach is rooted in creativity, strategy, and execution. Whether you're a brand looking to boost sales, connect with your audience, or simply stand out, we handle everything from A to Z.</p>
                        </div>
                        
                        <div class="about-highlights">
                            <div class="highlight-item">
                                <div class="highlight-icon">
                                    <i class="fas fa-video"></i>
                                </div>
                                <div class="highlight-content">
                                    <h6>Filmmaking Expertise</h6>
                                    <p>Professional content creation from concept to delivery</p>
                                </div>
                            </div>
                            <div class="highlight-item">
                                <div class="highlight-icon">
                                    <i class="fas fa-lightbulb"></i>
                                </div>
                                <div class="highlight-content">
                                    <h6>Strategic Thinking</h6>
                                    <p>Data-driven strategies that deliver real results</p>
                                </div>
                            </div>
                        </div>
                        
                        <a href="about.php" class="premium-btn">
                            <span>Discover Our Story</span>
                            <i class="fas fa-arrow-right"></i>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- Portfolio/Gallery Preview -->
    <?php
// gallery.php - Complete working version with photos and videos tabs
require_once './assets/includes/header.php';
require_once './assets/includes/config.php';
require_once './assets/includes/functions.php';

// Enable debugging (set to false for production)
$debug = false;

// Determine active tab
$active_tab = isset($_GET['tab']) && in_array($_GET['tab'], ['photos', 'videos']) ? $_GET['tab'] : 'photos';
?>

<!-- Tabs Navigation -->
<section class="premium-gallery-section py-5">
    <div class="container">
        <div class="row justify-content-center mb-3">
            <div class="col-lg-8 text-center" data-aos="fade-up">
                <h2 class="section-title-large mb-4">
                    Our <span class="gradient-text">Creative Work</span>
                </h2>
            </div>
        </div>
        
        <div class="row justify-content-center mb-2">
            <div class="col-lg-10">
                <ul class="premium-tabs nav nav-tabs justify-content-center mb-4" id="galleryTabs" role="tablist" data-aos="fade-up" data-aos-delay="100">
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?= $active_tab === 'photos' ? 'active' : '' ?>" id="photos-tab" data-bs-toggle="tab" data-bs-target="#photos" type="button" role="tab" aria-controls="photos" aria-selected="<?= $active_tab === 'photos' ? 'true' : 'false' ?>">
                            <i class="fas fa-images me-2"></i>
                            <span>Photos</span>
                        </button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="nav-link <?= $active_tab === 'videos' ? 'active' : '' ?>" id="videos-tab" data-bs-toggle="tab" data-bs-target="#videos" type="button" role="tab" aria-controls="videos" aria-selected="<?= $active_tab === 'videos' ? 'true' : 'false' ?>">
                            <i class="fas fa-video me-2"></i>
                            <span>Featured Videos</span>
                        </button>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</section>

<!-- Tabs Content -->
<div class="tab-content" id="galleryTabsContent">
    <!-- Photos Tab -->
     <section class="py-0 mb-4">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div id="photoCategories" class="premium-filter-buttons" role="group" data-aos="fade-up" data-aos-delay="50">
                    <button class="filter-btn active" data-category="all">
                        <span>All</span>
                    </button>
                    <?php
                    // Get all categories
                    try {
                        $categories = $pdo->query("SELECT DISTINCT category FROM gallery ORDER BY category")->fetchAll(PDO::FETCH_COLUMN);
                       
                        foreach ($categories as $category) {
                            echo '<button class="filter-btn category-btn" data-category="' . htmlspecialchars($category) . '">';
                            echo '<span>' . htmlspecialchars($category) . '</span>';
                            echo '</button>';
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
<script>
document.addEventListener("DOMContentLoaded", function () {
    const photoTab = document.getElementById('photos-tab');
    const videoTab = document.getElementById('videos-tab');
    const photoCategories = document.getElementById('photoCategories');

    function toggleCategoryButtons() {
        const isPhotosActive = photoTab.classList.contains('active');
        if (isPhotosActive) {
            photoCategories.style.display = 'flex';
            photoCategories.style.opacity = '1';
            photoCategories.style.visibility = 'visible';
        } else {
            photoCategories.style.display = 'none';
            photoCategories.style.opacity = '0';
            photoCategories.style.visibility = 'hidden';
        }
    }

    // Trigger on page load
    toggleCategoryButtons();

    // Re-check when tab is clicked - use 'shown.bs.tab' event for Bootstrap tabs
    photoTab.addEventListener('shown.bs.tab', toggleCategoryButtons);
    videoTab.addEventListener('shown.bs.tab', toggleCategoryButtons);
    
    // Also listen to click for immediate response
    photoTab.addEventListener('click', toggleCategoryButtons);
    videoTab.addEventListener('click', toggleCategoryButtons);
});
</script>

 <!-- Photos Tab -->
<div class="tab-pane fade <?= $active_tab === 'photos' ? 'show active' : '' ?>" id="photos" role="tabpanel" aria-labelledby="photos-tab">
    <div class="container px-0">
        <!-- Gallery Grid Section -->
        <section>
            <div class="container">
                <?php
                // Handle category filter for photos
                $category_filter = isset($_GET['category']) && $_GET['category'] !== 'all' ? $_GET['category'] : null;
                
                try {
                    // Build query for photos
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
                        echo '<div class="row g-4 gallery-grid">';
                        
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
                            
                            // Display gallery item
                            echo '<div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 gallery-item" data-category="'.htmlspecialchars($item['category']).'">';
                            echo '<div class="premium-gallery-card">';

                            if (file_exists($original_path)) {
                                // Create thumbnail if missing
                                if (!file_exists($thumb_path)) {
                                    if (!file_exists(dirname($thumb_path))) {
                                        mkdir(dirname($thumb_path), 0755, true);
                                    }
                                    createThumbnail($original_path, $thumb_path, 500, 500); // Increased thumbnail size
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
                                echo '<div class="card-body d-flex align-items-center justify-content-center bg-light rounded">';
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
    </div>
</div>
<script>
document.addEventListener("DOMContentLoaded", function () {
    const buttons = document.querySelectorAll(".filter-btn");
    const galleryContainer = document.querySelector(".gallery-grid");

    buttons.forEach(button => {
        button.addEventListener("click", function () {
            const category = this.dataset.category;

            // Update active state
            buttons.forEach(btn => btn.classList.remove('active'));
            this.classList.add('active');

            // Show loading state
            galleryContainer.style.opacity = '0.5';

            // Fetch filtered gallery
            fetch("get_gallery.php?category=" + encodeURIComponent(category))
                .then(response => response.text())
                .then(html => {
                    galleryContainer.innerHTML = html;
                    galleryContainer.style.opacity = '1';
                    
                    // Reinitialize gallery interactions for new items
                    setTimeout(() => {
                        // Add in-view class to trigger animations
                        const newItems = galleryContainer.querySelectorAll('.gallery-item');
                        newItems.forEach((item, index) => {
                            setTimeout(() => {
                                item.classList.add('in-view');
                            }, index * 50);
                        });
                        
                        // Reinitialize lightbox for new items
                        if (typeof initFullscreenLightbox === 'function') {
                            // Remove old lightbox if exists
                            const oldLightbox = document.querySelector('.fullscreen-lightbox');
                            if (oldLightbox) oldLightbox.remove();
                            initFullscreenLightbox();
                        }
                        
                        // Reinitialize tilt effects
                        document.querySelectorAll('.premium-gallery-card').forEach(card => {
                            card.addEventListener('mousemove', function (e) {
                                const rect = card.getBoundingClientRect();
                                const cx = rect.left + rect.width / 2;
                                const cy = rect.top + rect.height / 2;
                                const dx = (e.clientX - cx) / rect.width;
                                const dy = (e.clientY - cy) / rect.height;

                                const rotY = dx * 10;
                                const rotX = -dy * 8;

                                card.style.transform = `perspective(1000px) rotateX(${rotX}deg) rotateY(${rotY}deg) scale(1.02)`;

                                const img = card.querySelector('.gallery-image');
                                if (img) {
                                    img.style.transform = `translate3d(${dx * -10}px, ${dy * -10}px, 0) scale(1.08)`;
                                }
                            });

                            card.addEventListener('mouseleave', function () {
                                card.style.transform = '';
                                const img = card.querySelector('.gallery-image');
                                if (img) img.style.transform = '';
                            });
                        });
                    }, 100);
                })
                .catch(error => {
                    console.error("Error loading images:", error);
                    galleryContainer.innerHTML = '<div class="col-12 text-danger text-center py-5">Failed to load images. Please try again.</div>';
                    galleryContainer.style.opacity = '1';
                });
        });
    });
});
</script>
<!-- <div class="row g-4 gallery-grid">
   
</div> -->

<style>
    /* Custom CSS for gallery images */
    .gallery-image-container {
        width: 100%; /* Fixed width for all images */
        /* height: 100%; Fixed height for all images */
        overflow: none ; 
         display: flex;
        align-items: stretch;
        justify-content: space-between;
        background-color: #f8f9fa;
        border-radius: 8px;  
        aspect-ratio: 1 / 1;
        
    }
    #photos {
    padding-top: 0 !important;
    margin-top: 0 !important;
}
.tab-content {
    padding-top: 0 !important;
}
 
    .gallery-image-container img {
        width: 100%;
        height: 100%;
        object-fit: cover; /* This will cover the area while maintaining aspect ratio */
        transition: transform 0.3s ease;
    }
    
    .gallery-image-container:hover img {
        transform: scale(1.05);
    }
    
    /* Responsive adjustments */
    @media (min-width: 1200px) {
        .gallery-image-container {
            height: 250px; /* Bigger on larger screens */
        }
    }
</style>


    <!-- Videos Tab -->
    <div class="tab-pane fade <?= $active_tab === 'videos' ? 'show active' : '' ?>" id="videos" role="tabpanel" aria-labelledby="videos-tab">
        <div class="container px-0">
            <div class="row g-4">
                <?php
                try {
                    // Get all featured videos
                    $stmt = $pdo->query("SELECT * FROM videos WHERE is_featured = 1 ORDER BY created_at DESC");
                    
                    if ($stmt->rowCount() > 0) {
                        while ($video = $stmt->fetch(PDO::FETCH_ASSOC)) {
                            // Path configuration
                            $video_file = basename($video['video_path']);
                            $thumb_file = basename($video['thumbnail_path']);
                            
                            $video_path = 'assets/uploads/videos/' . $video_file;
                            $thumb_path = 'assets/uploads/thumbnail/' . $thumb_file;
                            
                            // Check if files exist
                            $video_exists = file_exists(__DIR__ . '/' . $video_path);
                            $thumb_exists = file_exists(__DIR__ . '/' . $thumb_path);
                            
                            echo '<div class="col-md-6 col-lg-4">';
                            echo '<div class="card video-card h-100 border-0 shadow-sm overflow-hidden">';
                            echo '<div class="video-container position-relative">';
                            
                            if ($video_exists) {
                                echo '<video class="w-100" autoplay loop muted playsinline>';
                                $ext = pathinfo($video_path, PATHINFO_EXTENSION);
    
                            // Set correct MIME type based on extension
                            if (strtolower($ext) === 'mov') {
                                echo '<source src="'.$video_path.'" type="video/quicktime">';
                            } else {
                                echo '<source src="'.$video_path.'" type="video/mp4">';
                            }
                            
                                echo 'Your browser does not support the video tag.';
                                echo '</video>';
                                
                                // Overlay with title that appears on hover
                                echo '<div class="video-overlay">';
                                echo '<div class="video-info">';
                                echo '<h5 class="video-title">'.htmlspecialchars($video['title']).'</h5>';
                                if ($thumb_exists) {
                                    echo '<img src="'.$thumb_path.'" class="video-thumbnail" alt="'.htmlspecialchars($video['title']).'">';
                                }
                                echo '</div>';
                                echo '</div>';
                            } else {
                                echo '<div class="card-body d-flex align-items-center justify-content-center bg-light" style="height: 200px;">';
                                echo '<div class="text-center">';
                                echo '<i class="bi bi-film text-muted mb-2" style="font-size: 2rem;"></i>';
                                echo '<p class="text-muted mb-0">Video not found</p>';
                                if ($debug) echo '<small class="text-danger d-block">'.htmlspecialchars($video['video_path']).'</small>';
                                echo '</div></div>';
                            }
                            
                            echo '</div>'; // Close video-container
                            
                            // Video description
                            echo '<div class="card-body">';
                            echo '<h5 class="card-title">'.htmlspecialchars($video['title']).'</h5>';
                            if (!empty($video['description'])) {
                                echo '<p class="card-text">'.htmlspecialchars($video['description']).'</p>';
                            }
                            echo '</div>';
                            
                            echo '</div>'; // Close card
                            echo '</div>'; // Close col
                        }
                    } else {
                        echo '<div class="col-12 text-center py-5">';
                        echo '<div class="alert alert-info">No featured videos found</div>';
                        echo '</div>';
                    }
                } catch (PDOException $e) {
                    echo '<div class="col-12">';
                    echo '<div class="alert alert-danger">Error loading videos: '.htmlspecialchars($e->getMessage()).'</div>';
                    if ($debug) error_log("Videos Error: " . $e->getMessage());
                    echo '</div>';
                }
                ?>
            </div>
        </div>
    </div>
</div>

<!-- Lightbox Initialization -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Initialize lightbox for photos
    lightbox.option({
        'resizeDuration': 200,
        'wrapAround': true,
        'albumLabel': 'Image %1 of %2'
    });
    
    // Pause videos when not in view
    const videoObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            const video = entry.target.querySelector('video');
            if (video) {
                if (entry.isIntersecting) {
                    video.play().catch(e => console.log('Autoplay prevented:', e));
                } else {
                    video.pause();
                }
            }
        });
    }, { threshold: 0.5 });

    document.querySelectorAll('.video-card').forEach(card => {
        videoObserver.observe(card);
    });
});
</script>

<style>
/* Custom styles for the gallery */
.square-container {
    position: relative;
    width: 100%;
    padding-top: 100%; /* 1:1 Aspect Ratio */
    overflow: hidden;
}

.square-container img {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

/* Video card styles */
.video-container {
    height: 0;
    padding-bottom: 56.25%; /* 16:9 Aspect Ratio */
    position: relative;
    background: #000;
}

.video-container video {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.video-overlay {
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background: rgba(0, 0, 0, 0.7);
    display: flex;
    align-items: center;
    justify-content: center;
    opacity: 0;
    transition: opacity 0.3s ease;
}

.video-card:hover .video-overlay {
    opacity: 1;
}

.video-info {
    color: white;
    text-align: center;
    padding: 1rem;
}

.video-thumbnail {
    max-width: 100%;
    max-height: 120px;
    margin-top: 1rem;
    border: 2px solid white;
}

/* Active tab styling */
.nav-tabs .nav-link.active {
    font-weight: bold;
    border-bottom: 3px solid #0d6efd;
}
</style>

<?php
require_once './assets/includes/footer.php';
?>
    <!-- Testimonials -->
     

    <!-- CTA Section -->
    <section class="premium-cta-section">
        <div class="cta-background">
            <div class="cta-gradient-orb orb-1"></div>
            <div class="cta-gradient-orb orb-2"></div>
            <div class="cta-gradient-orb orb-3"></div>
        </div>
        <div class="container position-relative">
            <div class="row justify-content-center">
                <div class="col-lg-10">
                    <div class="cta-content" data-aos="zoom-in">
                        <div class="cta-icon-wrapper">
                            <div class="cta-icon">
                                <i class="fas fa-rocket"></i>
                            </div>
                        </div>
                        <h2 class="cta-title">Ready to <span class="gradient-text">Elevate</span> Your Brand?</h2>
                        <p class="cta-subtitle">Let's create something extraordinary together. Transform your social media presence with our expert team.</p>
                        <div class="cta-buttons">
                            <a href="contact.php" class="premium-btn cta-primary">
                                <span>Get Started</span>
                                <i class="fas fa-arrow-right"></i>
                            </a>
                            <a href="gallery.php" class="premium-btn cta-secondary">
                                <span>View Our Work</span>
                                <i class="fas fa-images"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
<?php
require_once './assets/includes/footer.php';
?>