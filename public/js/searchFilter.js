 // Friends search and filter functionality
        const searchInput = document.getElementById('searchFriends');
        const classFilter = document.getElementById('filterClass');
        const statusFilter = document.getElementById('filterStatus');
        const friendsGrid = document.getElementById('friendsGrid');
        const noResults = document.getElementById('noResults');

        function filterFriends() {
            const searchTerm = searchInput.value.toLowerCase();
            const selectedClass = classFilter.value;
            const selectedStatus = statusFilter.value;
            
            const friendCards = friendsGrid.querySelectorAll('.friend-card');
            let visibleCount = 0;

            friendCards.forEach(card => {
                const name = card.dataset.name;
                const friendClass = card.dataset.class;
                const status = card.dataset.status;

                const matchesSearch = name.includes(searchTerm);
                const matchesClass = !selectedClass || friendClass === selectedClass;
                const matchesStatus = !selectedStatus || status === selectedStatus;

                if (matchesSearch && matchesClass && matchesStatus) {
                    card.style.display = 'block';
                    card.style.animation = 'scaleIn 0.5s ease-out';
                    visibleCount;
                } else {
                    card.style.display = 'none';
                }
            });

            // Show/hide no results message
            if (visibleCount === 0) {
                noResults.classList.remove('hidden');
                friendsGrid.style.display = 'none';
            } else {
                noResults.classList.add('hidden');
                friendsGrid.style.display = 'grid';
            }
        }

        // Add event listeners for search and filters
        searchInput.addEventListener('input', filterFriends);
        classFilter.addEventListener('change', filterFriends);
        statusFilter.addEventListener('change', filterFriends);

        // Add smooth animations on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all friend cards for scroll animations
        document.querySelectorAll('.friend-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(50px)';
            card.style.transition = 'all 0.6s ease-out';
            observer.observe(card);
        });

        // Add click effects for buttons
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', function(e) {
                // Create ripple effect
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = size  'px';
                ripple.style.left = x  'px';
                ripple.style.top = y  'px';
                ripple.classList.add('ripple');
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Add CSS for ripple effect
        const style = document.createElement('style');
        style.textContent = `
            .ripple {
                position: absolute;
                border-radius: 50%;
                opacity: 1;
                background: rgba(255, 255, 255, 0.3);
                transform: scale(0);
                animation: ripple-animation 0.6s linear;
                pointer-events: none;
            }
            
            @keyframes ripple-animation {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);