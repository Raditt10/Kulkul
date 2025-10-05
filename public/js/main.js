        document.addEventListener('DOMContentLoaded', () => {
            const menuBtn = document.querySelector('.fa-bars').parentElement; // tombol sidebar
            const sidebar = document.getElementById('sidebar');
            const closeBtn = document.getElementById('closeSidebar');

            // buka sidebar
            menuBtn.addEventListener('click', () => {
                sidebar.classList.remove('translate-x-full');
                sidebar.classList.add('translate-x-0');
            });

            // tutup sidebar
            closeBtn.addEventListener('click', () => {
                sidebar.classList.remove('translate-x-0');
                sidebar.classList.add('translate-x-full');
            });
        });


        // Advanced JavaScript untuk efek yang lebih menarik
        document.addEventListener('DOMContentLoaded', function() {
            // Parallax scrolling effect
            window.addEventListener('scroll', function() {
                const scrolled = window.pageYOffset;
                const parallax = document.querySelector('.floating-shapes');
                if (parallax) {
                    parallax.style.transform = `translateY(${scrolled * 0.5}px)`;
                }
                
                // Navbar background change on scroll
                const navbar = document.querySelector('nav');
                if (scrolled > 100) {
                    navbar.classList.add('bg-gray-900/95');
                    navbar.classList.remove('glass-effect');
                } else {
                    navbar.classList.remove('bg-gray-900/95');
                    navbar.classList.add('glass-effect');
                }
            });

            // Smooth scrolling for navigation
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({
                            behavior: 'smooth',
                            block: 'start'
                        });
                    }
                });
            });

            // Intersection Observer untuk animasi saat scroll
            const observerOptions = {
                threshold: 0.1,
                rootMargin: '0px 0px -50px 0px'
            };

            const observer = new IntersectionObserver((entries) => {
                entries.forEach(entry => {
                    if (entry.isIntersecting) {
                        entry.target.style.animationPlayState = 'running';
                        entry.target.classList.add('animate-slide-up');
                    }
                });
            }, observerOptions);

            // Observe semua elemen yang ingin dianimasi
            document.querySelectorAll('.hover-lift').forEach(el => {
                observer.observe(el);
            });

            // Mouse follow effect untuk floating shapes
            document.addEventListener('mousemove', function(e) {
                const shapes = document.querySelectorAll('.shape');
                const x = e.clientX / window.innerWidth;
                const y = e.clientY / window.innerHeight;
                
                shapes.forEach((shape, index) => {
                    const speed = (index + 1) * 0.5;
                    const xPos = x * speed * 50;
                    const yPos = y * speed * 50;
                    shape.style.transform = `translate(${xPos}px, ${yPos}px)`;
                });
            });

            // Auto-typing effect untuk search placeholder
            const searchInput = document.querySelector('input[type="text"]');
            const phrases = [
                'Search Amazing Ekskul...',
                'Find Your Passion...',
                'Discover New Skills...',
                'Join The Fun...'
            ];
            let phraseIndex = 0;
            let letterIndex = 0;
            let isDeleting = false;

            function typeWriter() {
                const currentPhrase = phrases[phraseIndex];
                
                if (isDeleting) {
                    searchInput.placeholder = currentPhrase.substring(0, letterIndex - 1);
                    letterIndex--;
                } else {
                    searchInput.placeholder = currentPhrase.substring(0, letterIndex + 1);
                    letterIndex++;
                }

                if (!isDeleting && letterIndex === currentPhrase.length) {
                    setTimeout(() => isDeleting = true, 2000);
                } else if (isDeleting && letterIndex === 0) {
                    isDeleting = false;
                    phraseIndex = (phraseIndex + 1) % phrases.length;
                }

                const typingSpeed = isDeleting ? 50 : 100;
                setTimeout(typeWriter, typingSpeed);
            }

            // Start typing effect
            setTimeout(typeWriter, 1000);
        });