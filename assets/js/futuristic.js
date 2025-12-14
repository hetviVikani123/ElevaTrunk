// Futuristic Navigation and Animations
(function() {
    'use strict';

    // ========================================
    // CUSTOM CURSOR
    // ========================================
    const cursor = {
        ring: document.querySelector('.cursor-ring'),
        dot: document.querySelector('.cursor-dot'),
        
        init() {
            if (!this.ring || !this.dot) return;
            
            let mouseX = 0, mouseY = 0;
            let ringX = 0, ringY = 0;
            let dotX = 0, dotY = 0;
            
            // Smooth cursor movement
            const smoothCursor = () => {
                // Ring follows with delay
                ringX += (mouseX - ringX) * 0.15;
                ringY += (mouseY - ringY) * 0.15;
                
                // Dot follows directly
                dotX += (mouseX - dotX) * 0.5;
                dotY += (mouseY - dotY) * 0.5;
                
                this.ring.style.left = ringX + 'px';
                this.ring.style.top = ringY + 'px';
                this.dot.style.left = dotX + 'px';
                this.dot.style.top = dotY + 'px';
                
                requestAnimationFrame(smoothCursor);
            };
            
            document.addEventListener('mousemove', (e) => {
                mouseX = e.clientX;
                mouseY = e.clientY;
            });
            
            smoothCursor();
            
            // Hide default cursor
            document.body.style.cursor = 'none';
            document.querySelectorAll('a, button, .premium-btn, .filter-btn').forEach(el => {
                el.style.cursor = 'none';
                
                // Expand cursor on hover
                el.addEventListener('mouseenter', () => {
                    this.ring.style.width = '60px';
                    this.ring.style.height = '60px';
                    this.ring.style.borderWidth = '3px';
                    this.dot.style.width = '8px';
                    this.dot.style.height = '8px';
                });
                
                el.addEventListener('mouseleave', () => {
                    this.ring.style.width = '40px';
                    this.ring.style.height = '40px';
                    this.ring.style.borderWidth = '2px';
                    this.dot.style.width = '6px';
                    this.dot.style.height = '6px';
                });
            });
        }
    };

    // ========================================
    // FULLSCREEN NAVIGATION
    // ========================================
    const navigation = {
        hamburger: document.getElementById('hamburgerBtn'),
        nav: document.getElementById('fullscreenNav'),
        closeBtn: document.getElementById('navCloseBtn'),
        
        init() {
            if (!this.hamburger || !this.nav) return;
            
            this.hamburger.addEventListener('click', () => this.open());
            this.closeBtn.addEventListener('click', () => this.close());
            
            // Close on ESC key
            document.addEventListener('keydown', (e) => {
                if (e.key === 'Escape' && this.nav.classList.contains('active')) {
                    this.close();
                }
            });
            
            // Animate nav links on hover
            const navLinks = document.querySelectorAll('.nav-link');
            navLinks.forEach(link => {
                link.addEventListener('mouseenter', (e) => {
                    this.updatePreview(e.target);
                });
            });
        },
        
        open() {
            this.nav.classList.add('active');
            this.hamburger.classList.add('active');
            document.body.classList.add('nav-open');
            this.startParticles();
        },
        
        close() {
            this.nav.classList.remove('active');
            this.hamburger.classList.remove('active');
            document.body.classList.remove('nav-open');
            this.stopParticles();
        },
        
        updatePreview(link) {
            const preview = document.getElementById('navPreview');
            const href = link.getAttribute('href');
            
            // Add different preview images based on the link
            const previews = {
                'index.php': 'assets/images/logo.png',
                'about.php': 'assets/images/logo.png',
                'gallery.php': 'assets/images/logo.png',
                'contact.php': 'assets/images/logo.png'
            };
            
            const img = preview.querySelector('.preview-image');
            if (previews[href]) {
                img.src = previews[href];
            }
        },
        
        startParticles() {
            if (particleSystem.canvas) {
                particleSystem.start();
            }
        },
        
        stopParticles() {
            if (particleSystem.canvas) {
                particleSystem.stop();
            }
        }
    };

    // ========================================
    // PARTICLE SYSTEM
    // ========================================
    const particleSystem = {
        canvas: document.getElementById('particleCanvas'),
        ctx: null,
        particles: [],
        animationId: null,
        mouse: { x: 0, y: 0 },
        
        init() {
            if (!this.canvas) return;
            
            this.ctx = this.canvas.getContext('2d');
            this.resize();
            
            window.addEventListener('resize', () => this.resize());
            this.canvas.addEventListener('mousemove', (e) => {
                const rect = this.canvas.getBoundingClientRect();
                this.mouse.x = e.clientX - rect.left;
                this.mouse.y = e.clientY - rect.top;
            });
            
            this.createParticles();
        },
        
        resize() {
            this.canvas.width = window.innerWidth;
            this.canvas.height = window.innerHeight;
        },
        
        createParticles() {
            const particleCount = 50;
            this.particles = [];
            
            for (let i = 0; i < particleCount; i++) {
                this.particles.push({
                    x: Math.random() * this.canvas.width,
                    y: Math.random() * this.canvas.height,
                    vx: (Math.random() - 0.5) * 0.5,
                    vy: (Math.random() - 0.5) * 0.5,
                    radius: Math.random() * 2 + 1,
                    icon: ['📷', '🎥', '📸', '🎬', '💡'][Math.floor(Math.random() * 5)]
                });
            }
        },
        
        start() {
            if (this.animationId) return;
            this.animate();
        },
        
        stop() {
            if (this.animationId) {
                cancelAnimationFrame(this.animationId);
                this.animationId = null;
            }
        },
        
        animate() {
            this.ctx.clearRect(0, 0, this.canvas.width, this.canvas.height);
            
            this.particles.forEach(particle => {
                // Mouse interaction
                const dx = this.mouse.x - particle.x;
                const dy = this.mouse.y - particle.y;
                const distance = Math.sqrt(dx * dx + dy * dy);
                
                if (distance < 100) {
                    const force = (100 - distance) / 100;
                    particle.vx -= (dx / distance) * force * 0.2;
                    particle.vy -= (dy / distance) * force * 0.2;
                }
                
                // Update position
                particle.x += particle.vx;
                particle.y += particle.vy;
                
                // Bounce off edges
                if (particle.x < 0 || particle.x > this.canvas.width) particle.vx *= -1;
                if (particle.y < 0 || particle.y > this.canvas.height) particle.vy *= -1;
                
                // Damping
                particle.vx *= 0.99;
                particle.vy *= 0.99;
                
                // Draw particle
                this.ctx.font = '16px Arial';
                this.ctx.fillStyle = 'rgba(255, 255, 255, 0.3)';
                this.ctx.fillText(particle.icon, particle.x, particle.y);
            });
            
            // Draw connections
            this.ctx.strokeStyle = 'rgba(197, 44, 113, 0.1)';
            this.ctx.lineWidth = 1;
            
            for (let i = 0; i < this.particles.length; i++) {
                for (let j = i + 1; j < this.particles.length; j++) {
                    const dx = this.particles[i].x - this.particles[j].x;
                    const dy = this.particles[i].y - this.particles[j].y;
                    const distance = Math.sqrt(dx * dx + dy * dy);
                    
                    if (distance < 150) {
                        this.ctx.beginPath();
                        this.ctx.moveTo(this.particles[i].x, this.particles[i].y);
                        this.ctx.lineTo(this.particles[j].x, this.particles[j].y);
                        this.ctx.stroke();
                    }
                }
            }
            
            this.animationId = requestAnimationFrame(() => this.animate());
        }
    };

    // ========================================
    // PAGE LOAD ANIMATION
    // ========================================
    const pageLoader = {
        init() {
            window.addEventListener('load', () => {
                document.body.style.opacity = '0';
                setTimeout(() => {
                    document.body.style.transition = 'opacity 0.6s';
                    document.body.style.opacity = '1';
                }, 100);
            });
        }
    };

    // ========================================
    // PARALLAX EFFECT
    // ========================================
    const parallax = {
        init() {
            const parallaxElements = document.querySelectorAll('[data-parallax]');
            
            if (parallaxElements.length === 0) return;
            
            window.addEventListener('scroll', () => {
                parallaxElements.forEach(el => {
                    const speed = el.dataset.parallax || 0.5;
                    const yPos = -(window.pageYOffset * speed);
                    el.style.transform = `translateY(${yPos}px)`;
                });
            });
        }
    };

    // ========================================
    // TEXT ANIMATIONS
    // ========================================
    const textAnimations = {
        init() {
            // Glitch effect on hover
            const glitchElements = document.querySelectorAll('.glitch');
            glitchElements.forEach(el => {
                el.setAttribute('data-text', el.textContent);
            });
            
            // Holographic text scroll reveal
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('holographic-text');
                    }
                });
            }, { threshold: 0.5 });
            
            document.querySelectorAll('[data-holographic]').forEach(el => {
                observer.observe(el);
            });
        }
    };

    // ========================================
    // 3D GALLERY CARDS
    // ========================================
    const gallery3D = {
        init() {
            const cards = document.querySelectorAll('.premium-gallery-card');
            
            cards.forEach(card => {
                card.addEventListener('mousemove', (e) => {
                    const rect = card.getBoundingClientRect();
                    const x = e.clientX - rect.left;
                    const y = e.clientY - rect.top;
                    
                    const centerX = rect.width / 2;
                    const centerY = rect.height / 2;
                    
                    const rotateX = (y - centerY) / 15;
                    const rotateY = (centerX - x) / 15;
                    
                    card.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-10px)`;
                });
                
                card.addEventListener('mouseleave', () => {
                    card.style.transform = 'perspective(1000px) rotateX(0) rotateY(0) translateY(0)';
                });
            });
            
            // Enhanced filter button interactions
            this.initFilterButtons();
        },
        
        initFilterButtons() {
            const filterBtns = document.querySelectorAll('.filter-btn');
            
            filterBtns.forEach(btn => {
                btn.addEventListener('click', function() {
                    // Remove active from all buttons
                    filterBtns.forEach(b => b.classList.remove('active'));
                    // Add active to clicked button
                    this.classList.add('active');
                    
                    const category = this.getAttribute('data-category');
                    const galleryItems = document.querySelectorAll('.gallery-item');
                    
                    // Animate out
                    galleryItems.forEach((item, index) => {
                        setTimeout(() => {
                            item.style.opacity = '0';
                            item.style.transform = 'translateY(-20px)';
                        }, index * 30);
                    });
                    
                    // Filter and animate in
                    setTimeout(() => {
                        let visibleIndex = 0;
                        galleryItems.forEach(item => {
                            const itemCategory = item.getAttribute('data-category');
                            
                            if (category === 'all' || itemCategory === category) {
                                setTimeout(() => {
                                    item.style.display = 'block';
                                    setTimeout(() => {
                                        item.style.opacity = '1';
                                        item.style.transform = 'translateY(0)';
                                    }, 50);
                                }, visibleIndex * 50);
                                visibleIndex++;
                            } else {
                                item.style.display = 'none';
                            }
                        });
                    }, 400);
                });
            });
        }
    };

    // ========================================
    // THEME TOGGLE
    // ========================================
    const themeToggle = {
        btn: document.getElementById('themeToggle'),
        
        init() {
            if (!this.btn) return;
            
            // Check for saved theme preference or default to light
            const savedTheme = localStorage.getItem('theme') || 'light';
            this.setTheme(savedTheme);
            
            this.btn.addEventListener('click', () => {
                const currentTheme = document.documentElement.getAttribute('data-theme');
                const newTheme = currentTheme === 'dark' ? 'light' : 'dark';
                this.setTheme(newTheme);
            });
        },
        
        setTheme(theme) {
            document.documentElement.setAttribute('data-theme', theme);
            localStorage.setItem('theme', theme);
            
            // Update meta theme-color
            const metaTheme = document.querySelector('meta[name="theme-color"]');
            if (metaTheme) {
                metaTheme.setAttribute('content', theme === 'dark' ? '#0a0a0a' : '#ffffff');
            }
        }
    };

    // ========================================
    // SMOOTH SCROLL ANIMATIONS
    // ========================================
    const scrollAnimations = {
        init() {
            const sections = document.querySelectorAll('section');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.classList.add('section-visible');
                    }
                });
            }, {
                threshold: 0.1,
                rootMargin: '-50px'
            });
            
            sections.forEach(section => {
                observer.observe(section);
                section.style.opacity = '0';
                section.style.transform = 'translateY(30px)';
                section.style.transition = 'opacity 0.8s ease, transform 0.8s ease';
            });
            
            // Add CSS for visible state
            const style = document.createElement('style');
            style.textContent = `
                .section-visible {
                    opacity: 1 !important;
                    transform: translateY(0) !important;
                }
            `;
            document.head.appendChild(style);
        }
    };

    // ========================================
    // ANIMATED COUNTERS
    // ========================================
    const animatedCounters = {
        init() {
            const counters = document.querySelectorAll('.stat-number[data-count]');
            
            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting && !entry.target.classList.contains('counted')) {
                        this.animateCounter(entry.target);
                        entry.target.classList.add('counted');
                    }
                });
            }, { threshold: 0.5 });
            
            counters.forEach(counter => observer.observe(counter));
        },
        
        animateCounter(element) {
            const target = parseInt(element.getAttribute('data-count'));
            const duration = 2000; // 2 seconds
            const start = 0;
            const increment = target / (duration / 16); // 60fps
            let current = start;
            
            const timer = setInterval(() => {
                current += increment;
                if (current >= target) {
                    element.textContent = target + '+';
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(current);
                }
            }, 16);
        }
    };

    // ========================================
    // MAGNETIC BUTTONS
    // ========================================
    const magneticButtons = {
        init() {
            const buttons = document.querySelectorAll('.premium-btn, .filter-btn, .premium-service-card');
            
            buttons.forEach(btn => {
                btn.addEventListener('mousemove', (e) => {
                    const rect = btn.getBoundingClientRect();
                    const x = e.clientX - rect.left - rect.width / 2;
                    const y = e.clientY - rect.top - rect.height / 2;
                    
                    const moveX = x * 0.15;
                    const moveY = y * 0.15;
                    
                    btn.style.transform = `translate(${moveX}px, ${moveY}px)`;
                });
                
                btn.addEventListener('mouseleave', () => {
                    btn.style.transform = 'translate(0, 0)';
                });
            });
        }
    };

    // ========================================
    // SCROLL PROGRESS INDICATOR
    // ========================================
    const scrollProgress = {
        init() {
            const progressBar = document.createElement('div');
            progressBar.className = 'scroll-progress';
            document.body.appendChild(progressBar);
            
            window.addEventListener('scroll', () => {
                const windowHeight = document.documentElement.scrollHeight - document.documentElement.clientHeight;
                const scrolled = (window.pageYOffset / windowHeight) * 100;
                progressBar.style.width = scrolled + '%';
            });
            
            // Add CSS for progress bar
            const style = document.createElement('style');
            style.textContent = `
                .scroll-progress {
                    position: fixed;
                    top: 0;
                    left: 0;
                    height: 4px;
                    background: linear-gradient(90deg, var(--primary-color), var(--secondary-color));
                    z-index: 9999;
                    transition: width 0.1s ease;
                }
            `;
            document.head.appendChild(style);
        }
    };

    // ========================================
    // INITIALIZE ALL
    // ========================================
    document.addEventListener('DOMContentLoaded', () => {
        cursor.init();
        navigation.init();
        particleSystem.init();
        pageLoader.init();
        parallax.init();
        textAnimations.init();
        gallery3D.init();
        themeToggle.init();
        scrollAnimations.init();
        animatedCounters.init();
        magneticButtons.init();
        scrollProgress.init();
        
        console.log('🚀 Futuristic UI Initialized - All Systems Ready');
    });

    // ========================================
    // SMOOTH SCROLL FOR ANCHOR LINKS
    // ========================================
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#' && document.querySelector(href)) {
                e.preventDefault();
                document.querySelector(href).scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
            }
        });
    });

})();
