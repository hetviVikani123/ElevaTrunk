<!-- <?php
require_once './assets/includes/header.php';
?>

 
    <section class="page-header py-5 bg-light">
        <div class="container">
            <div class="row">
                <div class="col-12 text-center animate__animated animate__fadeIn">
                    <h1 class="fw-bold">Our <span class="text-primary">Team</span></h1>
                    <nav aria-label="breadcrumb" class="d-flex justify-content-center">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="index.php">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Our Team</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Leadership <span class="text-primary">Team</span></h2>
                <p class="lead text-muted">To become the leading creative agency known for trend-setting ideas, high-quality content, and innovative storytelling — elevating every brand we touch.</p>
            </div>
            <div class="row g-4">
                <?php
                $stmt = $pdo->query("SELECT * FROM team WHERE is_leadership = 1 ORDER BY display_order ASC");
                while ($member = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="col-md-4 animate__animated animate__fadeInUp">';
                    echo '<div class="card border-0 shadow-sm hover-effect h-100">';
                    echo '<img src="assets/uploads/team/'.$member['photo'].'" class="card-img-top" alt="'.$member['name'].'">';
                    echo '<div class="card-body text-center">';
                    echo '<h5 class="card-title mb-1">'.$member['name'].'</h5>';
                    echo '<p class="text-primary mb-3">'.$member['position'].'</p>';
                    echo '<p class="card-text text-muted">'.$member['bio_short'].'</p>';
                    echo '<div class="social-links mt-3">';
                    echo '<a href="'.$member['linkedin'].'" class="text-muted me-2"><i class="fab fa-linkedin-in"></i></a>';
                    echo '<a href="'.$member['twitter'].'" class="text-muted me-2"><i class="fab fa-twitter"></i></a>';
                    echo '<a href="'.$member['instagram'].'" class="text-muted"><i class="fab fa-instagram"></i></a>';
                    echo '</div></div></div></div>';
                }
                ?>
            </div>
        </div>
    </section>

   
    <section class="py-5 bg-light">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Creative <span class="text-primary">Team</span></h2>
                <p class="lead text-muted">The talented individuals bringing ideas to life</p>
            </div>
            <div class="row g-4">
                <?php
                $stmt = $pdo->query("SELECT * FROM team WHERE department = 'creative' ORDER BY display_order ASC");
                while ($member = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="col-md-3 col-sm-6 animate__animated animate__fadeInUp">';
                    echo '<div class="card border-0 shadow-sm hover-effect h-100">';
                    echo '<img src="assets/uploads/team/'.$member['photo'].'" class="card-img-top" alt="'.$member['name'].'">';
                    echo '<div class="card-body text-center">';
                    echo '<h5 class="card-title mb-1">'.$member['name'].'</h5>';
                    echo '<p class="text-primary mb-3">'.$member['position'].'</p>';
                    echo '<div class="social-links">';
                    echo '<a href="'.$member['linkedin'].'" class="text-muted me-2"><i class="fab fa-linkedin-in"></i></a>';
                    echo '<a href="'.$member['instagram'].'" class="text-muted"><i class="fab fa-instagram"></i></a>';
                    echo '</div></div></div></div>';
                }
                ?>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <h2 class="fw-bold">Strategy <span class="text-primary">Team</span></h2>
                <p class="lead text-muted">The analytical minds behind our successful campaigns</p>
            </div>
            <div class="row g-4">
                <?php
             
                $stmt = $pdo->query("SELECT * FROM team WHERE department = 'strategy' ORDER BY display_order ASC");
                while ($member = $stmt->fetch(PDO::FETCH_ASSOC)) {
                    echo '<div class="col-md-3 col-sm-6 animate__animated animate__fadeInUp">';
                    echo '<div class="card border-0 shadow-sm hover-effect h-100">';
                    echo '<img src="assets/uploads/team/'.$member['photo'].'" class="card-img-top" alt="'.$member['name'].'">';
                    echo '<div class="card-body text-center">';
                    echo '<h5 class="card-title mb-1">'.$member['name'].'</h5>';
                    echo '<p class="text-primary mb-3">'.$member['position'].'</p>';
                    echo '<div class="social-links">';
                    echo '<a href="'.$member['linkedin'].'" class="text-muted me-2"><i class="fab fa-linkedin-in"></i></a>';
                    echo '<a href="'.$member['twitter'].'" class="text-muted"><i class="fab fa-twitter"></i></a>';
                    echo '</div></div></div></div>';
                }
                ?>
            </div>
        </div>
    </section>

    
    <section class="py-5 bg-primary text-white">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8 mb-4 mb-lg-0">
                    <h2 class="fw-bold mb-3">Want to Join Our Team?</h2>
                    <p class="lead mb-0">We're always looking for talented individuals to join our growing team.</p>
                </div>
                <div class="col-lg-4 text-lg-end">
                    <a href="contact.php?inquiry=careers" class="btn btn-light btn-lg px-4">View Openings</a>
                </div>
            </div>
        </div>
    </section>

<?php
require_once './assets/includes/footer.php';
?> -->