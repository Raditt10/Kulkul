    const title = ['Ele']
   
   // Rotating titles animation
        const titles = ['Berdaya Suai', 'Kompeten', 'Berahlak Mulia'];
        let currentIndex = 0;
        const titleElement = document.getElementById('rotating-title');

        function rotateTitle() {
            titleElement.style.opacity = '0';
            titleElement.style.transform = 'translateY(-10px)';
            
            setTimeout(() => {
                currentIndex = (currentIndex + 1) % titles.length;
                titleElement.textContent = titles[currentIndex];
                titleElement.style.opacity = '1';
                titleElement.style.transform = 'translateY(0)';
            }, 500);
        }

        setInterval(rotateTitle, 3000);

        // Add cursor trail effect
        document.addEventListener('mousemove', (e) => {
            if (Math.random() > 0.9) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                particle.style.cssText = `
                    position: fixed;
                    width: 4px;
                    height: 4px;
                    background: linear-gradient(45deg, #fb923c, #ef4444);
                    border-radius: 50%;
                    pointer-events: none;
                    z-index: 9999;
                    left: ${e.clientX}px;
                    top: ${e.clientY}px;
                    opacity: 1;
                    transition: all 0.5s ease;
                `;
                document.body.appendChild(particle);
                
                setTimeout(() => {
                    particle.style.opacity = '0';
                    particle.style.transform = 'translateY(20px)';
                }, 100);
                
                setTimeout(() => {
                    particle.remove();
                }, 600);
            }
        });

        // Interactive button ripple effect
        const buttons = document.querySelectorAll('.interactive-button');
        buttons.forEach(button => {
            button.addEventListener('click', function(e) {
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.cssText = `
                    position: absolute;
                    width: ${size}px;
                    height: ${size}px;
                    border-radius: 50%;
                    background: rgba(255, 255, 255, 0.5);
                    left: ${x}px;
                    top: ${y}px;
                    transform: scale(0);
                    animation: ripple 0.6s ease-out;
                    pointer-events: none;
                `;
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Add ripple animation
        const style = document.createElement('style');
        style.textContent = `
            @keyframes ripple {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);

        // Parallax effect for cards
        document.addEventListener('mousemove', (e) => {
            const cards = document.querySelectorAll('.hover-lift');
            const mouseX = e.clientX / window.innerWidth;
            const mouseY = e.clientY / window.innerHeight;
            
            cards.forEach(card => {
                const rect = card.getBoundingClientRect();
                const cardX = (rect.left + rect.width / 2) / window.innerWidth;
                const cardY = (rect.top + rect.height / 2) / window.innerHeight;
                
                const deltaX = (mouseX - cardX) * 10;
                const deltaY = (mouseY - cardY) * 10;
                
                card.style.transform = `perspective(1000px) rotateY(${deltaX}deg) rotateX(${-deltaY}deg)`;
            });
        });

        // Reset card position when mouse leaves
        document.addEventListener('mouseleave', () => {
            const cards = document.querySelectorAll('.hover-lift');
            cards.forEach(card => {
                card.style.transform = '';
            });
        });

       // Stats counter animation
        // Animasi counter hanya untuk angka tertentu
        function animateCounter(element, target, duration = 1000) {
            let start = 0;
            const increment = target / (duration / 16);
            
            const timer = setInterval(() => {
                start += increment;
                if (start >= target) {
                    element.textContent = target;
                    clearInterval(timer);
                } else {
                    element.textContent = Math.floor(start);
                }
            }, 16);
        }

        // Ambil elemen stats yang relevan dan jalankan animasi
        document.querySelectorAll('.stats-card').forEach(card => {
            const label = card.querySelector('.text-xs').textContent.trim();
            const counter = card.querySelector('.text-3xl');
            let target = 0;

            if (label === 'Ekstrakurikuler') target = 23;
            else if (label === 'Siswa Aktif') target = 200;
            else if (label === 'Kepuasan') target = 100;

            if (target > 0) {
                counter.textContent = '0';
                setTimeout(() => animateCounter(counter, target, 1000), 300);
            } else {
                counter.textContent = ''; // hilangkan angka lain
            }
        });



        // Intersection Observer for animations
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -100px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.classList.add('animate-slide-up');
                    
                    // Animate counters when they come into view
                    const counters = entry.target.querySelectorAll('.text-3xl');
                    counters.forEach(counter => {
                        const target = counter.textContent.includes('+') 
                            ? 500 
                            : counter.textContent.includes('%') 
                                ? 100 
                                : parseInt(counter.textContent);
                        
                        if (!isNaN(target)) {
                            counter.textContent = '0';
                            setTimeout(() => {
                                animateCounter(counter, target);
                                if (counter.parentElement.textContent.includes('+')) {
                                    setTimeout(() => {
                                        counter.textContent = target + '+';
                                    }, 2000);
                                }
                                if (counter.parentElement.textContent.includes('%')) {
                                    setTimeout(() => {
                                        counter.textContent = target + '%';
                                    }, 2000);
                                }
                            }, 200);
                        }
                    });
                }
            });
        }, observerOptions);

        // Observe all stats cards
        document.querySelectorAll('.stats-card').forEach(card => {
            observer.observe(card);
        });

        // Observe feature cards
        document.querySelectorAll('.group.hover-lift').forEach(card => {
            observer.observe(card);
        });

        // Add floating animation to random particles
        setInterval(() => {
            const container = document.getElementById('particles-container');
            if (container && Math.random() > 0.7) {
                const particle = document.createElement('div');
                const size = Math.random() * 3 + 1;
                const colors = ['bg-orange-400', 'bg-red-400', 'bg-orange-500', 'bg-red-300'];
                const color = colors[Math.floor(Math.random() * colors.length)];
                
                particle.className = `particle absolute ${color} animate-float opacity-60`;
                particle.style.cssText = `
                    width: ${size}px;
                    height: ${size}px;
                    left: ${Math.random() * 100}%;
                    top: ${Math.random() * 100}%;
                    animation-delay: ${Math.random() * 3}s;
                `;
                
                container.appendChild(particle);
                
                setTimeout(() => {
                    particle.remove();
                }, 6000);
            }
        }, 3000);

        // Smooth scroll for buttons
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', function(e) {
                // Add click animation
                this.style.transform = 'scale(0.95)';
                setTimeout(() => {
                    this.style.transform = '';
                }, 100);
            });
        });

        // Add glow effect on hover for stats
        const statCards = document.querySelectorAll('.stats-card');
        statCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                this.style.boxShadow = '0 0 30px rgba(251, 146, 60, 0.3)';
            });
            
            card.addEventListener('mouseleave', function() {
                this.style.boxShadow = '';
            });
        });

        // Feature cards hover effect
        const featureCards = document.querySelectorAll('.group.hover-lift > div > div.relative.bg-slate-800');
        featureCards.forEach(card => {
            card.addEventListener('mouseenter', function() {
                const icon = this.querySelector('.fa-award, .fa-users, .fa-rocket');
                if (icon) {
                    icon.style.animation = 'bounce-slow 0.5s ease';
                }
            });
        });

        // Add typing effect to welcome text
        const welcomeText = document.querySelector('.gradient-text');
        if (welcomeText) {
            const originalText = welcomeText.textContent;
            welcomeText.textContent = '';
            let index = 0;
            
            function typeText() {
                if (index < originalText.length) {
                    welcomeText.textContent += originalText.charAt(index);
                    index++;
                    setTimeout(typeText, 100);
                }
            }
            
            setTimeout(typeText, 500);
        }

        // Add 3D tilt effect to main card
        const mainCard = document.querySelector('.animate-slide-in .group.hover-lift');
        if (mainCard) {
            mainCard.addEventListener('mousemove', function(e) {
                const rect = this.getBoundingClientRect();
                const x = e.clientX - rect.left;
                const y = e.clientY - rect.top;
                
                const centerX = rect.width / 2;
                const centerY = rect.height / 2;
                
                const rotateX = (y - centerY) / 20;
                const rotateY = (centerX - x) / 20;
                
                this.style.transform = `perspective(1000px) rotateX(${rotateX}deg) rotateY(${rotateY}deg) translateY(-10px)`;
            });
            
            mainCard.addEventListener('mouseleave', function() {
                this.style.transform = '';
            });
        }

        console.log('🚀 Kulkul Interactive Features Loaded!');
        console.log('Enjoy the modern and interactive experience!');
