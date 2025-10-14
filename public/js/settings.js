// Dark mode toggle
        const darkModeToggle = document.getElementById('darkModeToggle');
        const body = document.body;

        darkModeToggle.addEventListener('change', function() {
            if (this.checked) {
                body.classList.remove('light-mode');
                body.classList.add('dark-mode');
            } else {
                body.classList.remove('dark-mode');
                body.classList.add('light-mode');
            }
        });

        // Password strength indicator
        const newPasswordInput = document.getElementById('newPassword');
        const passwordStrength = document.getElementById('passwordStrength');

        newPasswordInput.addEventListener('input', function() {
            const password = this.value;
            let strength = 0;
            
            if (password.length >= 8) strength += 25;
            if (/[a-z]/.test(password)) strength += 25;
            if (/[A-Z]/.test(password)) strength += 25;
            if (/[0-9]/.test(password)) strength += 25;
            
            passwordStrength.style.width = strength + '%';
            
            if (strength < 50) {
                passwordStrength.className = 'progress-bar bg-red-500 h-2 rounded-full';
            } else if (strength < 75) {
                passwordStrength.className = 'progress-bar bg-yellow-500 h-2 rounded-full';
            } else {
                passwordStrength.className = 'progress-bar bg-green-500 h-2 rounded-full';
            }
        });

        // Password form submission
        const passwordForm = document.getElementById('passwordForm');
        passwordForm.addEventListener('submit', async function(e) {
        e.preventDefault();

        const oldPassword = document.getElementById('oldPassword').value;
        const newPassword = document.getElementById('newPassword').value;
        const confirmPassword = document.getElementById('confirmPassword').value;

        if (!oldPassword || !newPassword || !confirmPassword) {
            showNotification('Harap isi semua field password!', 'error');
            return;
        }

        if (newPassword !== confirmPassword) {
            showNotification('Password baru dan konfirmasi tidak cocok!', 'error');
            return;
        }

        if (newPassword.length < 8) {
            showNotification('Password baru harus minimal 8 karakter!', 'error');
            return;
        }

        // Ambil CSRF token dari meta tag di Blade
        const token = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        try {
            const response = await fetch('/reset-password', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'Accept': 'application/json',
                    'X-CSRF-TOKEN': token
                },
                credentials: 'same-origin',
                body: JSON.stringify({
                    old_password: oldPassword,
                    new_password: newPassword
                })
            });

            const data = await response.json();

            if (response.ok) {
                showNotification(data.message || 'Password berhasil diubah!', 'success');
                passwordForm.reset();
                passwordStrength.style.width = '0%';
            } else {
                showNotification(data.error || 'Gagal mengubah password!', 'error');
                console.log(response);
            }
        } catch (error) {
            showNotification('Terjadi kesalahan pada server!', 'error');
            console.log('data');
        }
    });
        // Language selection
        const languageOptions = document.querySelectorAll('.language-option');
        languageOptions.forEach(option => {
            option.addEventListener('click', function() {
                languageOptions.forEach(opt => {
                    opt.classList.remove('border-orange-500');
                    opt.classList.add('border-slate-700');
                });
                this.classList.remove('border-slate-700');
                this.classList.add('border-orange-500');
                
                const language = this.querySelector('.font-medium').textContent;
                showNotification(`Bahasa diubah ke ${language}`, 'success');
            });
        });

        // Notification system
        function showNotification(message, type = 'success') {
            const notification = document.getElementById('successNotification');
            const messageElement = document.getElementById('successMessage');
            
            messageElement.textContent = message;
            
            if (type === 'error') {
                notification.querySelector('.bg-green-500').className = 'bg-red-500 text-white px-6 py-4 rounded-xl shadow-2xl success-message flex items-center gap-3';
                notification.querySelector('.text-2xl').textContent = '✗';
            } else {
                notification.querySelector('.bg-red-500, .bg-green-500').className = 'bg-green-500 text-white px-6 py-4 rounded-xl shadow-2xl success-message flex items-center gap-3';
                notification.querySelector('.text-2xl').textContent = '✓';
            }
            
            notification.classList.remove('hidden');
            
            setTimeout(() => {
                notification.classList.add('hidden');
            }, 3000);
        }

        // Toggle switches animation
        const toggleSwitches = document.querySelectorAll('.toggle-switch');
        toggleSwitches.forEach(toggle => {
            toggle.addEventListener('change', function() {
                const parent = this.closest('.section-card, .bg-slate-800\\/30');
                if (parent) {
                    parent.style.transform = 'scale(0.98)';
                    setTimeout(() => {
                        parent.style.transform = 'scale(1)';
                    }, 150);
                }
            });
        });

        // Add floating particles animation
        function createFloatingParticle() {
            const particle = document.createElement('div');
            particle.className = 'absolute w-2 h-2 bg-orange-400 rounded-full opacity-20 animate-float';
            particle.style.left = Math.random() * 100 + '%';
            particle.style.top = Math.random() * 100 + '%';
            particle.style.animationDelay = Math.random() * 6 + 's';
            particle.style.animationDuration = (Math.random() * 4 + 4) + 's';
            
            document.querySelector('.absolute.inset-0.fixed').appendChild(particle);
            
            setTimeout(() => {
                particle.remove();
            }, 10000);
        }

        // Create particles periodically
        setInterval(createFloatingParticle, 3000);

        // Initialize with some particles
        for (let i = 0; i < 5; i++) {
            setTimeout(createFloatingParticle, i * 1000);
        }

        // Export/Import Data functionality
        document.querySelectorAll('button').forEach(button => {
            if (button.textContent.includes('Ekspor')) {
                button.addEventListener('click', function() {
                    this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Mengekspor...';
                    this.disabled = true;
                    
                    setTimeout(() => {
                        // Simulate data export
                        const data = {
                            user: 'Username',
                            nis: '2080710',
                            settings: {
                                darkMode: true,
                                notifications: true,
                                language: 'id'
                            },
                            exportDate: new Date().toISOString()
                        };
                        
                        const blob = new Blob([JSON.stringify(data, null, 2)], {type: 'application/json'});
                        const url = URL.createObjectURL(blob);
                        const a = document.createElement('a');
                        a.href = url;
                        a.download = 'kulkul_data_export.json';
                        a.click();
                        URL.revokeObjectURL(url);
                        
                        showNotification('Data berhasil diekspor!', 'success');
                        this.innerHTML = '<i class="fas fa-download mr-2"></i>Ekspor';
                        this.disabled = false;
                    }, 2000);
                });
            }
            
            if (button.textContent.includes('Impor')) {
                button.addEventListener('click', function() {
                    const input = document.createElement('input');
                    input.type = 'file';
                    input.accept = '.json';
                    input.onchange = function(e) {
                        const file = e.target.files[0];
                        if (file) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                try {
                                    const data = JSON.parse(e.target.result);
                                    showNotification('Data berhasil diimpor!', 'success');
                                } catch (error) {
                                    showNotification('File tidak valid!', 'error');
                                }
                            };
                            reader.readAsText(file);
                        }
                    };
                    input.click();
                });
            }
            
            if (button.textContent.includes('Generate')) {
                button.addEventListener('click', function() {
                    this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Generating...';
                    this.disabled = true;
                    
                    setTimeout(() => {
                        showNotification('Laporan PDF berhasil dibuat!', 'success');
                        this.innerHTML = '<i class="fas fa-file-pdf mr-2"></i>Generate';
                        this.disabled = false;
                    }, 3000);
                });
            }
        });

        // Session management
        document.querySelectorAll('button').forEach(button => {
            if (button.textContent.includes('Logout') && !button.textContent.includes('Semua')) {
                button.addEventListener('click', function() {
                    const sessionCard = this.closest('.bg-slate-800\\/30');
                    if (sessionCard) {
                        sessionCard.style.opacity = '0.5';
                        this.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i>Logging out...';
                        this.disabled = true;
                        
                        setTimeout(() => {
                            sessionCard.remove();
                            showNotification('Sesi berhasil dihentikan!', 'success');
                        }, 1500);
                    }
                });
            }
            
            if (button.textContent.includes('Logout Semua Perangkat')) {
                button.addEventListener('click', function() {
                    if (confirm('Apakah Anda yakin ingin logout dari semua perangkat?')) {
                        this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Logging out...';
                        this.disabled = true;
                        
                        setTimeout(() => {
                            document.querySelectorAll('.bg-slate-800\\/30').forEach(card => {
                                if (card.querySelector('.fas.fa-mobile-alt, .fas.fa-tablet-alt')) {
                                    card.remove();
                                }
                            });
                            showNotification('Berhasil logout dari semua perangkat!', 'success');
                            this.innerHTML = '<i class="fas fa-sign-out-alt mr-2"></i>Logout Semua Perangkat';
                            this.disabled = false;
                        }, 2000);
                    }
                });
            }
        });

        // Accessibility features
        const accessibilityToggles = document.querySelectorAll('.toggle-switch');
        accessibilityToggles.forEach(toggle => {
            toggle.addEventListener('change', function() {
                const label = this.closest('.flex').querySelector('.font-semibold').textContent;
                
                if (label.includes('Ukuran Font Besar')) {
                    if (this.checked) {
                        document.body.style.fontSize = '1.1em';
                        showNotification('Font diperbesar', 'success');
                    } else {
                        document.body.style.fontSize = '';
                        showNotification('Font dikembalikan ke ukuran normal', 'success');
                    }
                }
                
                if (label.includes('Kontras Tinggi')) {
                    if (this.checked) {
                        document.body.style.filter = 'contrast(1.2)';
                        showNotification('Kontras tinggi diaktifkan', 'success');
                    } else {
                        document.body.style.filter = '';
                        showNotification('Kontras dikembalikan ke normal', 'success');
                    }
                }
                
                if (label.includes('Kursor Besar')) {
                    if (this.checked) {
                        document.body.style.cursor = 'url("data:image/svg+xml,%3Csvg xmlns=\'http://www.w3.org/2000/svg\' width=\'32\' height=\'32\' viewBox=\'0 0 32 32\'%3E%3Cpath d=\'M2 2l8 26 6-10 10-6z\' fill=\'white\' stroke=\'black\' stroke-width=\'2\'/%3E%3C/svg%3E") 2 2, auto';
                        showNotification('Kursor diperbesar', 'success');
                    } else {
                        document.body.style.cursor = '';
                        showNotification('Kursor dikembalikan ke ukuran normal', 'success');
                    }
                }
                
                if (label.includes('Kurangi Animasi')) {
                    if (this.checked) {
                        document.body.style.setProperty('--animation-duration', '0.1s');
                        showNotification('Animasi dikurangi', 'success');
                    } else {
                        document.body.style.removeProperty('--animation-duration');
                        showNotification('Animasi dikembalikan ke normal', 'success');
                    }
                }
            });
        });

        // Danger zone actions
        const deleteDataBtn = document.getElementById('deleteDataBtn');
        const deleteAccountBtn = document.getElementById('deleteAccountBtn');

        if (deleteDataBtn) {
            deleteDataBtn.addEventListener('click', function() {
                if (confirm('PERINGATAN: Tindakan ini akan menghapus SEMUA data Anda secara permanen. Apakah Anda yakin?')) {
                    if (confirm('Konfirmasi sekali lagi: Semua data akan hilang dan tidak dapat dikembalikan!')) {
                        this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menghapus...';
                        this.disabled = true;
                        
                        setTimeout(() => {
                            showNotification('Simulasi: Data akan dihapus (tidak benar-benar dihapus)', 'error');
                            this.innerHTML = '<i class="fas fa-trash mr-2"></i>Hapus Data';
                            this.disabled = false;
                        }, 3000);
                    }
                }
            });
        }

        if (deleteAccountBtn) {
            deleteAccountBtn.addEventListener('click', function() {
                if (confirm('PERINGATAN: Tindakan ini akan menghapus akun Anda secara permanen. Apakah Anda yakin?')) {
                    if (confirm('Konfirmasi sekali lagi: Akun akan dihapus dan tidak dapat dikembalikan!')) {
                        this.innerHTML = '<i class="fas fa-spinner fa-spin mr-2"></i>Menghapus...';
                        this.disabled = true;
                        
                        setTimeout(() => {
                            showNotification('Simulasi: Akun akan dihapus (tidak benar-benar dihapus)', 'error');
                            this.innerHTML = '<i class="fas fa-user-times mr-2"></i>Hapus Akun';
                            this.disabled = false;
                        }, 3000);
                    }
                }
            });
        }

        // Backup functionality
        document.querySelectorAll('button').forEach(button => {
            if (button.textContent.includes('Backup Sekarang')) {
                button.addEventListener('click', function() {
                    this.innerHTML = '<i class="fas fa-spinner fa-spin mr-1"></i>Backing up...';
                    this.disabled = true;
                    
                    setTimeout(() => {
                        const now = new Date();
                        const timeString = now.toLocaleTimeString('id-ID', {
                            hour: '2-digit',
                            minute: '2-digit'
                        });
                        
                        // Update backup time display
                        const backupTimeElement = this.parentElement.querySelector('.font-semibold');
                        if (backupTimeElement) {
                            backupTimeElement.textContent = `${timeString} (baru saja)`;
                        }
                        
                        showNotification('Backup berhasil dibuat!', 'success');
                        this.innerHTML = '<i class="fas fa-download mr-1"></i>Backup Sekarang';
                        this.disabled = false;
                    }, 2500);
                });
            }
        });

        // Add keyboard navigation support
        document.addEventListener('keydown', function(e) {
            if (e.key === 'Tab') {
                // Enhance tab navigation visibility
                document.body.classList.add('keyboard-navigation');
            }
        });

        document.addEventListener('mousedown', function() {
            document.body.classList.remove('keyboard-navigation');
        });

        // Add CSS for keyboard navigation
        const style = document.createElement('style');
        style.textContent = `
            .keyboard-navigation *:focus {
                outline: 2px solid #f97316 !important;
                outline-offset: 2px !important;
            }
        `;
        document.head.appendChild(style);