// Hero Section Animations
(function() {
    'use strict';

    // ========================================
    // ANIMATED GRID BACKGROUND
    // ========================================
    const gridCanvas = document.getElementById('gridCanvas');
    if (gridCanvas) {
        const ctx = gridCanvas.getContext('2d');
        let particles = [];
        
        function resizeCanvas() {
            gridCanvas.width = gridCanvas.offsetWidth;
            gridCanvas.height = gridCanvas.offsetHeight;
        }
        
        function createParticles() {
            particles = [];
            const particleCount = 100;
            
            for (let i = 0; i < particleCount; i++) {
                particles.push({
                    x: Math.random() * gridCanvas.width,
                    y: Math.random() * gridCanvas.height,
                    vx: (Math.random() - 0.5) * 0.3,
                    vy: (Math.random() - 0.5) * 0.3,
                    radius: Math.random() * 1.5 + 0.5
                });
            }
        }
        
        function animateGrid() {
            ctx.clearRect(0, 0, gridCanvas.width, gridCanvas.height);
            
            // Draw particles
            particles.forEach(particle => {
                particle.x += particle.vx;
                particle.y += particle.vy;
                
                if (particle.x < 0 || particle.x > gridCanvas.width) particle.vx *= -1;
                if (particle.y < 0 || particle.y > gridCanvas.height) particle.vy *= -1;
                
                ctx.beginPath();
                ctx.arc(particle.x, particle.y, particle.radius, 0, Math.PI * 2);
                ctx.fillStyle = 'rgba(197, 44, 113, 0.5)';
                ctx.fill();
            });
            
            // Draw connections
            ctx.strokeStyle = 'rgba(255, 145, 77, 0.2)';
            ctx.lineWidth = 0.5;
            
            for (let i = 0; i < particles.length; i++) {
                for (let j = i + 1; j < particles.length; j++) {
                    const dx = particles[i].x - particles[j].x;
                    const dy = particles[i].y - particles[j].y;
                    const distance = Math.sqrt(dx * dx + dy * dy);
                    
                    if (distance < 100) {
                        ctx.beginPath();
                        ctx.moveTo(particles[i].x, particles[i].y);
                        ctx.lineTo(particles[j].x, particles[j].y);
                        ctx.stroke();
                    }
                }
            }
            
            requestAnimationFrame(animateGrid);
        }
        
        resizeCanvas();
        createParticles();
        animateGrid();
        
        window.addEventListener('resize', () => {
            resizeCanvas();
            createParticles();
        });
    }

    // ========================================
    // STATS COUNTER ANIMATION
    // ========================================
    const statNumbers = document.querySelectorAll('.stat-number');
    
    function animateCounter(element) {
        const target = parseInt(element.dataset.count);
        const duration = 2000;
        const increment = target / (duration / 16);
        let current = 0;
        
        const counter = setInterval(() => {
            current += increment;
            if (current >= target) {
                element.textContent = target + '+';
                clearInterval(counter);
            } else {
                element.textContent = Math.floor(current);
            }
        }, 16);
    }
    
    // Intersection Observer for stats
    const statsObserver = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                animateCounter(entry.target);
                statsObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });
    
    statNumbers.forEach(stat => statsObserver.observe(stat));

    // ========================================
    // GLITCH EFFECT ON HOVER
    // ========================================
    const glitchElements = document.querySelectorAll('.glitch');
    
    glitchElements.forEach(el => {
        el.addEventListener('mouseenter', () => {
            el.classList.add('glitch-active');
            setTimeout(() => {
                el.classList.remove('glitch-active');
            }, 500);
        });
    });

    // ========================================
    // SCROLL INDICATOR
    // ========================================
    const scrollIndicator = document.querySelector('.scroll-indicator');
    
    if (scrollIndicator) {
        scrollIndicator.addEventListener('click', () => {
            const servicesSection = document.querySelector('.py-5.bg-light');
            if (servicesSection) {
                servicesSection.scrollIntoView({ behavior: 'smooth' });
            }
        });
        
        window.addEventListener('scroll', () => {
            if (window.scrollY > 100) {
                scrollIndicator.style.opacity = '0';
            } else {
                scrollIndicator.style.opacity = '1';
            }
        });
    }

    // ========================================
    // PARALLAX EFFECT FOR HERO ELEMENTS
    // ========================================
    window.addEventListener('scroll', () => {
        const scrolled = window.pageYOffset;
        
        const floatIcons = document.querySelectorAll('.float-icon');
        floatIcons.forEach((icon, index) => {
            const speed = 0.5 + (index * 0.1);
            icon.style.transform = `translateY(${scrolled * speed}px)`;
        });
        
        const meshGradients = document.querySelectorAll('.mesh-gradient');
        meshGradients.forEach((mesh, index) => {
            const speed = 0.3 + (index * 0.05);
            mesh.style.transform = `translateY(${scrolled * speed}px)`;
        });
    });

    console.log('🎬 Hero animations initialized');
})();
