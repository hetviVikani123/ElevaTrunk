<?php
// footer.php - Common footer for all pages
?>
    <!-- Footer -->
    <footer class="modern-footer pt-5 pb-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 mb-4">
                    <h5 class="text-uppercase mb-4 fw-bold">Eleva Trunk Media</h5>
                    <p class="mb-3">Transforming brands through innovative social media strategies and captivating visual content.</p>
                    <div class="social-icons mt-4">
                        <a href="https://www.facebook.com/profile.php?id=61577105214095" target="_blank" rel="noopener noreferrer" class="text-dark me-2" title="Facebook"><i class="fab fa-facebook-f"></i></a>
                        <a href="https://www.instagram.com/elevatrunkmedia?igsh=bnYzMDl2ZnhpMDB6&utm_source=qr" target="_blank" rel="noopener noreferrer" class="text-dark me-2" title="Instagram"><i class="fab fa-instagram"></i></a>
                    </div>
                </div>
                <div class="col-md-2 col-sm-6 mb-4">
                    <h5 class="text-uppercase mb-4 fw-bold">Quick Links</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2"><a href="index.php">Home</a></li>
                        <li class="mb-2"><a href="about.php">About Us</a></li>
                        <!-- <li class="mb-2"><a href="blog.php">Blog</a></li>
                        <li class="mb-2"><a href="team.php">Our Team</a></li> -->
                        <li class="mb-2"><a href="gallery.php">Gallery</a></li>
                        <li class="mb-2"><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
                <div class="col-md-3 col-sm-6 mb-4">
                    <h5 class="text-uppercase mb-4 fw-bold">Services</h5>
                    <ul class="list-unstyled">
                        <li class="mb-2">Social Media Strategy</li>
                        <li class="mb-2">Content Creation</li>
                        <li class="mb-2">Graphic Designing</li>
                        <li class="mb-2">Digital Marketing</li>
                        <li class="mb-2">Web Designing</li>
                    </ul>
                </div>
                <div class="col-md-3 mb-4">
                    <h5 class="text-uppercase mb-4 fw-bold">Contact Info</h5>
                    <ul class="list-unstyled">
                        <li class="mb-3">
                            <i class="fas fa-phone me-2"></i>
                            <div class="d-inline-block">
                                <strong>Naitri Santoki</strong><br>
                                <a href="tel:+918141744419" class="text-muted">+91 8141744419</a>
                            </div>
                        </li>
                        <li class="mb-2">
                            <i class="fas fa-envelope me-2"></i>
                            <a href="mailto:elevatrunkmedia@gmail.com">elevatrunkmedia@gmail.com</a>
                        </li>
                    </ul>
                </div>
            </div>
            <hr class="my-4 border-secondary opacity-25">
            <div class="row align-items-center">
                <div class="col-md-6 text-center text-md-start mb-3 mb-md-0">
                    <p class="mb-0">&copy; <?= date('Y') ?> Eleva Trunk Media. All rights reserved.</p>
                </div>
                <div class="col-md-6 text-center text-md-end">
                    <small class="text-muted">Designed with <i class="fas fa-heart text-danger"></i> by Eleva Trunk Media</small>
                </div>
            </div>
        </div>
    </footer>

    <!-- Back to Top Button -->
    <a href="#" class="btn btn-primary btn-lg back-to-top animate__animated animate__fadeInUp" role="button">
        <i class="fas fa-arrow-up"></i>
    </a>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    
    <!-- AOS Animation Library -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.js"></script>
    
    <!-- Custom JS -->
    <script src="assets/js/main.js"></script>
    <script src="assets/js/futuristic.js"></script>
    <script src="assets/js/hero.js"></script>
    
    <!-- Initialize AOS -->
    <script>
        AOS.init({
            duration: 1000,
            once: true,
            offset: 100
        });
    </script>
</body>
</html>