<?php
// header.php - Common header for all pages
session_start();
require_once 'config.php';

// Check for active page for navigation highlighting
$current_page = basename($_SERVER['PHP_SELF']);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eleva Trunk Media - Social Media Marketing Experts</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/css/lightbox.min.css">
<script src="https://cdnjs.cloudflare.com/ajax/libs/lightbox2/2.11.3/js/lightbox.min.js"></script>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <!-- Animate.css -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css"/>
    
    <!-- AOS Animation Library -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/aos/2.3.4/aos.css">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/futuristic.css">
    <link rel="stylesheet" href="assets/css/hero.css">
    
    <!-- Favicon -->
    <link rel="icon" href="assets/images/favicon.png" type="image/png">
</head>
<body>
    <!-- Floating Controls -->
    <div class="floating-controls">
        <button class="theme-toggle" id="themeToggle" aria-label="Toggle Theme">
            <i class="fas fa-sun sun-icon"></i>
            <i class="fas fa-moon moon-icon"></i>
        </button>
        <button class="hamburger-menu" id="hamburgerBtn" aria-label="Menu">
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
            <span class="hamburger-line"></span>
        </button>
    </div>

    <!-- Full-Screen Navigation Overlay -->
    <nav class="fullscreen-nav" id="fullscreenNav">
        <!-- Camera Aperture Animation Background -->
        <div class="aperture-bg">
            <div class="aperture-blade"></div>
            <div class="aperture-blade"></div>
            <div class="aperture-blade"></div>
            <div class="aperture-blade"></div>
            <div class="aperture-blade"></div>
            <div class="aperture-blade"></div>
        </div>
        
        <!-- Particle System Background -->
        <canvas id="particleCanvas" class="particle-canvas"></canvas>
        
        <!-- Navigation Content -->
        <div class="nav-content">
            <div class="nav-left">
                <!-- Logo in Navigation -->
                <div class="nav-logo">
                    <img src="assets/images/logo.png" alt="Eleva Trunk Media">
                    <div class="logo-subtitle">Visual Storytelling</div>
                </div>
                
                <!-- Main Navigation Links -->
                <ul class="nav-links">
                    <li class="nav-item" data-number="01">
                        <a href="index.php" class="nav-link <?= ($current_page == 'index.php') ? 'active' : '' ?>">
                            <span class="link-text">Home</span>
                            <span class="link-hover">Home</span>
                        </a>
                    </li>
                    <li class="nav-item" data-number="02">
                        <a href="about.php" class="nav-link <?= ($current_page == 'about.php') ? 'active' : '' ?>">
                            <span class="link-text">About Us</span>
                            <span class="link-hover">About Us</span>
                        </a>
                    </li>
                    <li class="nav-item" data-number="03">
                        <a href="gallery.php" class="nav-link <?= ($current_page == 'gallery.php') ? 'active' : '' ?>">
                            <span class="link-text">Gallery</span>
                            <span class="link-hover">Gallery</span>
                        </a>
                    </li>
                    <li class="nav-item" data-number="04">
                        <a href="contact.php" class="nav-link <?= ($current_page == 'contact.php') ? 'active' : '' ?>">
                            <span class="link-text">Contact</span>
                            <span class="link-hover">Contact</span>
                        </a>
                    </li>
                </ul>
                
                <!-- Social Media Links -->
                <div class="nav-social">
                    <a href="#" class="social-link" data-platform="instagram">
                        <i class="fab fa-instagram"></i>
                        <span>Instagram</span>
                    </a>
                    <a href="#" class="social-link" data-platform="facebook">
                        <i class="fab fa-facebook"></i>
                        <span>Facebook</span>
                    </a>
                    <a href="#" class="social-link" data-platform="twitter">
                        <i class="fab fa-twitter"></i>
                        <span>Twitter</span>
                    </a>
                    <a href="#" class="social-link" data-platform="linkedin">
                        <i class="fab fa-linkedin"></i>
                        <span>LinkedIn</span>
                    </a>
                </div>
            </div>
            
            <!-- Right Side - Featured Image/Video Preview -->
            <div class="nav-right">
                <div class="nav-preview">
                    <div class="preview-frame">
                        <div class="frame-corners">
                            <span class="corner top-left"></span>
                            <span class="corner top-right"></span>
                            <span class="corner bottom-left"></span>
                            <span class="corner bottom-right"></span>
                        </div>
                        <div class="preview-content" id="navPreview">
                            <img src="assets/images/logo.png" alt="Preview" class="preview-image">
                        </div>
                        <div class="camera-ui">
                            <div class="ui-element focus-point"></div>
                            <div class="ui-element exposure-bar"></div>
                            <div class="ui-text">
                                <span class="iso">ISO 400</span>
                                <span class="aperture">f/2.8</span>
                                <span class="shutter">1/250</span>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Contact Info -->
                <div class="nav-contact">
                    <div class="contact-item">
                        <i class="fas fa-envelope"></i>
                        <span>hello@elevatrunk.com</span>
                    </div>
                    <div class="contact-item">
                        <i class="fas fa-phone"></i>
                        <span>+91 8147444419</span>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Close Button -->
        <button class="nav-close" id="navCloseBtn" aria-label="Close Menu">
            <span class="close-line"></span>
            <span class="close-line"></span>
        </button>
    </nav>

    <!-- Custom Cursor -->
    <div class="custom-cursor">
        <div class="cursor-ring"></div>
        <div class="cursor-dot"></div>
    </div>