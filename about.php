<?php
// about.php - About Us page
require_once './assets/includes/header.php';
?>

    <!-- Page Header -->
    <section class="page-header py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center animate__animated animate__fadeIn">
                    <h1 class="fw-bold">About <span class="text-primary">Eleva Trunk Media</span></h1>
                    <nav aria-label="breadcrumb" class="d-flex justify-content-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <!-- About Content -->
    <section class="py-5 about-story-section" data-parallax="0.3">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-6 mb-4 mb-lg-0">
                    <div class="about-image-wrapper" data-aos="fade-right" data-aos-duration="1000">
                        <div class="image-frame film-strip">
                            <img src="assets/images/IMG_6048.JPG" alt="Our Story" class="img-fluid rounded shadow about-image">
                            <div class="image-overlay">
                                <div class="overlay-icon">
                                    <i class="fas fa-play-circle"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="story-content" data-aos="fade-left" data-aos-duration="1000">
                        <h2 class="fw-bold mb-4 holographic-text" data-holographic>Our <span class="text-primary">Story</span></h2>
                        <p class="lead mb-4">With a strong foundation in filmmaking and marketing, Eleva Trunk Media was born from the belief in the power of storytelling through visuals. The passion behind this agency lies in creating content that not only captures attention but truly stands out in a crowded digital world.</p>

                    <p>At Eleva Trunk Media, we’re not just another marketing agency. We’re your creative partners. We don’t stop at strategy or posting content—we go all the way. From conceptualizing a campaign to physically coming to your space, shooting content, curating social media calendars, building brand strategies, and finally, posting and promoting your content—we do it all.</p>

                    <p>Our approach is rooted in creativity, strategy, and execution. Whether you’re a brand looking to boost sales, connect with your audience, or simply stand out, we handle everything from A to Z. We don’t believe in generic marketing—we create tailored, standout content that helps your brand shine.</p>

                    <p>That’s what sets Eleva Trunk Media apart. We’re not just marketers. We’re filmmakers, storytellers, strategists, and creators—committed to taking your brand to the next level.</p>
                    <div class="row mt-5 g-4">
                        <div class="col-sm-6">
                            <div class="mission-vision-card" data-aos="fade-up" data-aos-delay="100">
                                <div class="mv-icon">
                                    <i class="fas fa-bullseye"></i>
                                </div>
                                <h5 class="mb-3">Our Mission</h5>
                                    <p class="mb-0">Our mission is to deliver complete end-to-end media solutions — from concept, scripting, and shooting to editing, posting, and strategy — providing brands with everything from A to Z in one powerful, creative package.</p>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="mission-vision-card" data-aos="fade-up" data-aos-delay="200">
                                <div class="mv-icon">
                                    <i class="fas fa-eye"></i>
                                </div>
                                <h5 class="mb-3">Our Vision</h5>
                                    <p class="mb-0">To become the leading creative agency known for trend-setting ideas, high-quality content, and innovative storytelling — elevating every brand we touch.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Our Values -->
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Our <span class="text-primary">Values</span></h2>
                <p class="lead text-muted">The principles that guide everything we do</p>
            </div>
            <div class="row g-4">
                <div class="col-md-4 animate__animated animate__fadeInUp">
                    <div class="card h-100 border-0 shadow-sm hover-effect">
                        <div class="card-body text-center p-4">
                            <div class="icon-box bg-opacity-10 text-primary mx-auto mb-4">
                                <i class="fas fa-lightbulb fa-2x"></i>
                            </div>
                            <h5 class="fw-bold">Innovation</h5>
                            <p class="text-muted">We constantly push boundaries to deliver fresh, creative solutions that stand out in crowded social feeds.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animate__animated animate__fadeInUp animate__delay-1s">
                    <div class="card h-100 border-0 shadow-sm hover-effect">
                        <div class="card-body text-center p-4">
                            <div class="icon-box bg-opacity-10 text-primary mx-auto mb-4">
                                <i class="fas fa-handshake fa-2x"></i>
                            </div>
                            <h5 class="fw-bold">Integrity</h5>
                            <p class="text-muted">We build trust through transparency, honesty, and delivering on our promises.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 animate__animated animate__fadeInUp animate__delay-2s">
                    <div class="card h-100 border-0 shadow-sm hover-effect">
                        <div class="card-body text-center p-4">
                            <div class="icon-box bg-opacity-10 text-primary mx-auto mb-4">
                                <i class="fas fa-chart-line fa-2x"></i>
                            </div>
                            <h5 class="fw-bold">Results</h5>
                            <p class="text-muted">We're driven by measurable outcomes that contribute to our clients' business success.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Team Preview -->
    <!-- <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Meet Our <span class="text-primary">Leadership</span></h2>
                <p class="lead text-muted">The passionate professionals behind Eleva Trunk Media</p>
            </div>
            <div class="row g-4">
                <?php
                $stmt = $pdo->query("SELECT * FROM team WHERE is_leadership = 1 ORDER BY display_order ASC LIMIT 3");
                while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="col-md-4 animate__animated animate__fadeInUp">';
                    echo '<div class="card border-0 shadow-sm hover-effect h-100">';
                    echo '<img src="assets/uploads/team/'.$row['photo'].'" class="card-img-top" alt="'.$row['name'].'">';
                    echo '<div class="card-body text-center">';
                    echo '<h5 class="card-title mb-1">'.$row['name'].'</h5>';
                    echo '<p class="text-primary mb-3">'.$row['position'].'</p>';
                    echo '<p class="card-text text-muted">'.$row['bio_short'].'</p>';
                    echo '<div class="social-links mt-3">';
                    echo '<a href="'.$row['linkedin'].'" class="text-muted me-2"><i class="fab fa-linkedin-in"></i></a>';
                    echo '<a href="'.$row['twitter'].'" class="text-muted me-2"><i class="fab fa-twitter"></i></a>';
                    echo '<a href="'.$row['instagram'].'" class="text-muted"><i class="fab fa-instagram"></i></a>';
                    echo '</div></div></div></div>';
                }
                ?>
            </div>
            <div class="text-center mt-4">
                <a href="team.php" class="btn btn-outline-primary px-4">View Full Team</a>
            </div>
        </div>
    </section> -->

<?php
require_once './assets/includes/footer.php';
?>