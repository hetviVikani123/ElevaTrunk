// assets/js/main.js - Enhanced version
(function($) {
    'use strict';
    
    $(document).ready(function() {
        // Back to top button functionality
        initBackToTop();
        
        // Smooth scrolling for navigation links
        initSmoothScroll();
        
        // Initialize Bootstrap components
        initBootstrapComponents();
        
        // Animation on scroll
        initScrollAnimations();
        
        // Contact form validation
        initFormValidation();
        
        // Lazy loading images
        initLazyLoading();
        
        // Mobile menu improvements
        initMobileMenu();

        // Gallery & Video interactions (scroll reveal, tilt, parallax)
        initGalleryObservers();
        initGalleryInteractions();
    });
    
    // Back to Top Button
    function initBackToTop() {
        const $backToTop = $('.back-to-top');
        
        $(window).scroll(function() {
            if ($(this).scrollTop() > 300) {
                $backToTop.fadeIn('slow');
            } else {
                $backToTop.fadeOut('slow');
            }
        });
        
        $backToTop.click(function(e) {
            e.preventDefault();
            $('html, body').animate({scrollTop: 0}, 800);
            return false;
        });
    }
    
    // Smooth Scrolling
    function initSmoothScroll() {
        $('a[href*="#"]').not('[href="#"]').not('[href="#0"]').click(function(event) {
            if (location.pathname.replace(/^\//, '') === this.pathname.replace(/^\//, '') 
                && location.hostname === this.hostname) {
                let target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                
                if (target.length) {
                    event.preventDefault();
                    $('html, body').animate({
                        scrollTop: target.offset().top - 70
                    }, 800, function() {
                        const $target = $(target);
                        $target.focus();
                        if (!$target.is(':focus')) {
                            $target.attr('tabindex', '-1');
                            $target.focus();
                        }
                    });
                }
            }
        });
    }
    
    // Initialize Bootstrap Components
    function initBootstrapComponents() {
        // Initialize tooltips
        const tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'));
        tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl);
        });
        
        // Initialize popovers
        const popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'));
        popoverTriggerList.map(function(popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl);
        });
    }
    
    // Animation on Scroll
    function initScrollAnimations() {
        function animateOnScroll() {
            $('.animate__animated').each(function() {
                const elementTop = $(this).offset().top;
                const scrollTop = $(window).scrollTop();
                const windowHeight = $(window).height();
                
                if (scrollTop + windowHeight > elementTop + 100) {
                    $(this).addClass('animate__fadeIn');
                }
            });
        }
        
        animateOnScroll();
        
        $(window).on('scroll', function() {
            animateOnScroll();
        });
    }
    
    // Form Validation
    function initFormValidation() {
        const $contactForm = $('form[action*="contact.php"]');
        
        if ($contactForm.length) {
            $contactForm.submit(function(e) {
                let isValid = true;
                const $form = $(this);
                
                // Clear previous errors
                $form.find('.is-invalid').removeClass('is-invalid');
                $form.find('.alert-danger').remove();
                
                // Validate name
                const $name = $form.find('#name');
                if ($name.val().trim() === '') {
                    $name.addClass('is-invalid');
                    isValid = false;
                }
                
                // Validate email
                const $email = $form.find('#email');
                if (!isValidEmail($email.val())) {
                    $email.addClass('is-invalid');
                    isValid = false;
                }
                
                // Validate subject
                const $subject = $form.find('#subject');
                if ($subject.val().trim() === '') {
                    $subject.addClass('is-invalid');
                    isValid = false;
                }
                
                // Validate message
                const $message = $form.find('#message');
                if ($message.val().trim() === '') {
                    $message.addClass('is-invalid');
                    isValid = false;
                }
                
                if (!isValid) {
                    e.preventDefault();
                    $form.prepend('<div class="alert alert-danger alert-dismissible fade show" role="alert">Please fill all required fields correctly.<button type="button" class="btn-close" data-bs-dismiss="alert"></button></div>');
                    $('html, body').animate({
                        scrollTop: $form.offset().top - 100
                    }, 500);
                }
            });
        }
    }
    
    // Email Validation
    function isValidEmail(email) {
        const regex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;
        return regex.test(email.trim());
    }
    
    // Lazy Loading for Images
    function initLazyLoading() {
        if ('loading' in HTMLImageElement.prototype) {
            // Browser supports lazy loading natively
            const images = document.querySelectorAll('img[loading="lazy"]');
            images.forEach(img => {
                img.src = img.dataset.src || img.src;
            });
        } else {
            // Fallback for browsers that don't support lazy loading
            const lazyImages = document.querySelectorAll('img[loading="lazy"]');
            
            if ('IntersectionObserver' in window) {
                const imageObserver = new IntersectionObserver((entries, observer) => {
                    entries.forEach(entry => {
                        if (entry.isIntersecting) {
                            const img = entry.target;
                            img.src = img.dataset.src || img.src;
                            img.classList.remove('lazy');
                            imageObserver.unobserve(img);
                        }
                    });
                });
                
                lazyImages.forEach(img => imageObserver.observe(img));
            }
        }
    }
    
    // Mobile Menu Improvements
    function initMobileMenu() {
        const $navbarToggler = $('.navbar-toggler');
        const $navbarCollapse = $('.navbar-collapse');
        
        // Close menu when clicking outside
        $(document).on('click', function(e) {
            if (!$(e.target).closest('.navbar').length && $navbarCollapse.hasClass('show')) {
                $navbarToggler.click();
            }
        });
        
        // Close menu when clicking on a link
        $('.navbar-nav a').on('click', function() {
            if (window.innerWidth < 992 && $navbarCollapse.hasClass('show')) {
                $navbarToggler.click();
            }
        });
    }
    
    // Enhanced Social Media Style Cursor for Gallery
    $(document).on('mouseenter', '.premium-gallery-card', function() {
        $('.cursor-ring').css({
            'width': '100px',
            'height': '100px',
            'border-color': '#ff914d',
            'border-width': '4px'
        });
        
        $('.cursor-dot').css({
            'width': '25px',
            'height': '25px',
            'background': 'linear-gradient(135deg, #c52c71, #ff914d)',
            'box-shadow': '0 0 30px #ff914d, 0 0 50px #c52c71'
        });
    });
    
    $(document).on('mouseleave', '.premium-gallery-card', function() {
        $('.cursor-ring').css({
            'width': '50px',
            'height': '50px',
            'border-color': '',
            'border-width': '3px'
        });
        
        $('.cursor-dot').css({
            'width': '10px',
            'height': '10px',
            'background': '',
            'box-shadow': ''
        });
    });
    
    // Add "VIEW" text on gallery hover
    $(document).on('mouseenter', '.premium-gallery-card', function() {
        if (!$('.cursor-text').length) {
            $('.custom-cursor').append('<div class="cursor-text">VIEW</div>');
        }
        $('.cursor-text').css('opacity', '1');
    });
    
    $(document).on('mouseleave', '.premium-gallery-card', function() {
        $('.cursor-text').css('opacity', '0');
    });
    
    /* ==================================================
       Gallery observers and interaction handlers
       - Scroll reveal (intersection observer)
       - Tilt on mouse move
       - Simple parallax effect for inner image
    ===================================================== */
    function initGalleryObservers() {
        if (!('IntersectionObserver' in window)) return;

        const items = document.querySelectorAll('.gallery-item');
        const observer = new IntersectionObserver((entries, obs) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                    // only reveal once
                    obs.unobserve(entry.target);
                }
            });
        }, { threshold: 0.18 });

        items.forEach(it => observer.observe(it));

        // Video cards - ensure they gain class for animation
        const vids = document.querySelectorAll('.video-card');
        const vObserver = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('in-view');
                }
            });
        }, { threshold: 0.4 });
        vids.forEach(v => vObserver.observe(v));
    }

    function initGalleryInteractions() {
        // tilt + parallax on card
        document.querySelectorAll('.premium-gallery-card').forEach(card => {
            card.addEventListener('mousemove', function (e) {
                const rect = card.getBoundingClientRect();
                const cx = rect.left + rect.width / 2;
                const cy = rect.top + rect.height / 2;
                const dx = (e.clientX - cx) / rect.width;
                const dy = (e.clientY - cy) / rect.height;

                const rotY = dx * 10; // rotateY
                const rotX = -dy * 8; // rotateX

                card.style.transform = `perspective(1000px) rotateX(${rotX}deg) rotateY(${rotY}deg) scale(1.02)`;

                const img = card.querySelector('.gallery-image');
                if (img) {
                    // subtle parallax move on the image
                    img.style.transform = `translate3d(${dx * -10}px, ${dy * -10}px, 0) scale(1.08)`;
                }
            });

            card.addEventListener('mouseleave', function () {
                card.style.transform = '';
                const img = card.querySelector('.gallery-image');
                if (img) img.style.transform = '';
            });
        });

        // Ensure photoCategories visible when photos tab active (reinforce inline toggling)
        const photoTab = document.getElementById('photos-tab');
        const videoTab = document.getElementById('videos-tab');
        const photoCategories = document.getElementById('photoCategories');
        if (photoCategories) photoCategories.style.display = 'flex';

        if (photoTab && videoTab) {
            photoTab.addEventListener('click', () => { if (photoCategories) photoCategories.style.display = 'flex'; });
            videoTab.addEventListener('click', () => { if (photoCategories) photoCategories.style.display = 'none'; });
        }
        
        // Video hover preview with unmute
        initVideoHoverPreview();
        
        // Momentum horizontal scrolling
        initMomentumScroll();
        
        // Fullscreen lightbox for images and videos
        initFullscreenLightbox();
    }
    
    /* ==================================================
       Video hover preview - unmute and enlarge on hover
    ===================================================== */
    function initVideoHoverPreview() {
        document.querySelectorAll('.video-card video').forEach(video => {
            const card = video.closest('.video-card');
            
            card.addEventListener('mouseenter', function() {
                video.muted = false;
                video.volume = 0.5;
                video.play().catch(e => console.log('Play prevented:', e));
            });
            
            card.addEventListener('mouseleave', function() {
                video.muted = true;
                video.pause();
            });
        });
    }
    
    /* ==================================================
       Momentum-based horizontal scrolling
    ===================================================== */
    function initMomentumScroll() {
        const scrollContainer = document.querySelector('.gallery-grid');
        if (!scrollContainer) return;
        
        // Wrap in horizontal scroll container
        const wrapper = document.createElement('div');
        wrapper.className = 'gallery-horizontal-scroll';
        scrollContainer.parentNode.insertBefore(wrapper, scrollContainer);
        wrapper.appendChild(scrollContainer);
        scrollContainer.classList.add('horizontal-mode');
        
        let isDown = false;
        let startX;
        let scrollLeft;
        let velocity = 0;
        let lastX = 0;
        let lastTime = Date.now();
        
        wrapper.addEventListener('mousedown', (e) => {
            isDown = true;
            wrapper.style.scrollBehavior = 'auto';
            startX = e.pageX - wrapper.offsetLeft;
            scrollLeft = wrapper.scrollLeft;
            lastX = e.pageX;
            lastTime = Date.now();
            velocity = 0;
        });
        
        wrapper.addEventListener('mouseleave', () => {
            isDown = false;
            applyMomentum();
        });
        
        wrapper.addEventListener('mouseup', () => {
            isDown = false;
            applyMomentum();
        });
        
        wrapper.addEventListener('mousemove', (e) => {
            if (!isDown) return;
            e.preventDefault();
            const x = e.pageX - wrapper.offsetLeft;
            const walk = (x - startX) * 2;
            wrapper.scrollLeft = scrollLeft - walk;
            
            const now = Date.now();
            const dt = now - lastTime;
            if (dt > 0) {
                velocity = (e.pageX - lastX) / dt;
            }
            lastX = e.pageX;
            lastTime = now;
        });
        
        function applyMomentum() {
            if (Math.abs(velocity) > 0.1) {
                wrapper.scrollLeft -= velocity * 20;
                velocity *= 0.95;
                requestAnimationFrame(applyMomentum);
            } else {
                wrapper.style.scrollBehavior = 'smooth';
            }
        }
        
        // Touch momentum for mobile
        let touchStartX = 0;
        let touchVelocity = 0;
        
        wrapper.addEventListener('touchstart', (e) => {
            touchStartX = e.touches[0].pageX;
            lastTime = Date.now();
            touchVelocity = 0;
        });
        
        wrapper.addEventListener('touchmove', (e) => {
            const touch = e.touches[0];
            const now = Date.now();
            const dt = now - lastTime;
            if (dt > 0) {
                touchVelocity = (touch.pageX - touchStartX) / dt;
            }
            lastTime = now;
        });
        
        wrapper.addEventListener('touchend', () => {
            if (Math.abs(touchVelocity) > 0.1) {
                applyTouchMomentum();
            }
        });
        
        function applyTouchMomentum() {
            if (Math.abs(touchVelocity) > 0.05) {
                wrapper.scrollLeft -= touchVelocity * 15;
                touchVelocity *= 0.92;
                requestAnimationFrame(applyTouchMomentum);
            }
        }
    }
    
    /* ==================================================
       Fullscreen lightbox for images and videos
    ===================================================== */
    function initFullscreenLightbox() {
        // Create lightbox HTML
        const lightbox = document.createElement('div');
        lightbox.className = 'fullscreen-lightbox';
        lightbox.innerHTML = `
            <div class="lightbox-close"><i class="fas fa-times"></i></div>
            <div class="lightbox-nav prev"><i class="fas fa-chevron-left"></i></div>
            <div class="lightbox-nav next"><i class="fas fa-chevron-right"></i></div>
            <div class="lightbox-content"></div>
            <div class="lightbox-info"></div>
        `;
        document.body.appendChild(lightbox);
        
        const content = lightbox.querySelector('.lightbox-content');
        const info = lightbox.querySelector('.lightbox-info');
        const closeBtn = lightbox.querySelector('.lightbox-close');
        const prevBtn = lightbox.querySelector('.lightbox-nav.prev');
        const nextBtn = lightbox.querySelector('.lightbox-nav.next');
        
        let currentIndex = 0;
        let mediaItems = [];
        
        // Collect all gallery images
        function collectMediaItems() {
            mediaItems = [];
            document.querySelectorAll('.premium-gallery-card, .video-card').forEach((item, index) => {
                const img = item.querySelector('.gallery-image');
                const video = item.querySelector('video');
                const title = item.querySelector('.overlay-title, .video-title')?.textContent || 'Image ' + (index + 1);
                const category = item.querySelector('.overlay-category')?.textContent || '';
                
                if (img) {
                    mediaItems.push({
                        type: 'image',
                        src: img.src,
                        title: title,
                        category: category
                    });
                } else if (video) {
                    mediaItems.push({
                        type: 'video',
                        src: video.querySelector('source')?.src || video.src,
                        title: title,
                        category: category
                    });
                }
            });
        }
        
        // Open lightbox
        function openLightbox(index) {
            collectMediaItems();
            currentIndex = index;
            showMedia();
            lightbox.classList.add('active');
            document.body.style.overflow = 'hidden';
        }
        
        // Show media at current index
        function showMedia() {
            const item = mediaItems[currentIndex];
            if (!item) return;
            
            content.innerHTML = '';
            
            if (item.type === 'image') {
                const img = document.createElement('img');
                img.src = item.src;
                img.alt = item.title;
                content.appendChild(img);
            } else if (item.type === 'video') {
                const video = document.createElement('video');
                video.controls = true;
                video.autoplay = true;
                const source = document.createElement('source');
                source.src = item.src;
                source.type = item.src.endsWith('.mov') ? 'video/quicktime' : 'video/mp4';
                video.appendChild(source);
                content.appendChild(video);
            }
            
            info.innerHTML = `<strong>${item.title}</strong>${item.category ? ' <span style="opacity:0.7">• ' + item.category + '</span>' : ''} <span style="opacity:0.5">(${currentIndex + 1}/${mediaItems.length})</span>`;
        }
        
        // Close lightbox
        function closeLightbox() {
            lightbox.classList.remove('active');
            document.body.style.overflow = '';
            const video = content.querySelector('video');
            if (video) video.pause();
        }
        
        // Navigation
        function showNext() {
            currentIndex = (currentIndex + 1) % mediaItems.length;
            showMedia();
        }
        
        function showPrev() {
            currentIndex = (currentIndex - 1 + mediaItems.length) % mediaItems.length;
            showMedia();
        }
        
        // Event listeners
        closeBtn.addEventListener('click', closeLightbox);
        nextBtn.addEventListener('click', showNext);
        prevBtn.addEventListener('click', showPrev);
        
        lightbox.addEventListener('click', (e) => {
            if (e.target === lightbox) closeLightbox();
        });
        
        document.addEventListener('keydown', (e) => {
            if (!lightbox.classList.contains('active')) return;
            if (e.key === 'Escape') closeLightbox();
            if (e.key === 'ArrowRight') showNext();
            if (e.key === 'ArrowLeft') showPrev();
        });
        
        // Attach click handlers to gallery items
        document.addEventListener('click', (e) => {
            const card = e.target.closest('.premium-gallery-card, .video-card');
            if (!card) return;
            
            const allCards = Array.from(document.querySelectorAll('.premium-gallery-card, .video-card'));
            const index = allCards.indexOf(card);
            if (index >= 0) {
                e.preventDefault();
                openLightbox(index);
            }
        });
    }

})(jQuery);