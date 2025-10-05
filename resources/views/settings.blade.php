<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pengaturan - Kulkul SMKN 13 BANDUNG</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        slate: {
                            850: '#1a2234'
                        }
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                        'slide-up': 'slideUp 1s ease-out',
                        'pulse-slow': 'pulse 4s infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' }
                        },
                        glow: {
                            '0%': { boxShadow: '0 0 20px rgba(251, 146, 60, 0.4)' },
                            '100%': { boxShadow: '0 0 40px rgba(251, 146, 60, 0.8), 0 0 60px rgba(234, 88, 12, 0.3)' }
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(100px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' }
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-lift:hover {
            transform: translateY(-3px);
        }
        .glass-effect {
            backdrop-filter: blur(20px);
            background: rgba(30, 41, 59, 0.8);
        }
        .section-card {
            transition: all 0.3s ease;
        }
        .section-card:hover {
            border-color: rgba(251, 146, 60, 0.5);
        }
        body.dark-mode {
            background: #0f172a;
        }
        body.light-mode {
            background: #f8fafc;
        }
        body.light-mode .glass-effect {
            background: rgba(255, 255, 255, 0.8);
        }
        body.light-mode .text-white {
            color: #1e293b !important;
        }
        body.light-mode .text-slate-300 {
            color: #475569 !important;
        }
        body.light-mode .text-slate-400 {
            color: #64748b !important;
        }
        body.light-mode .bg-slate-800 {
            background: #ffffff !important;
        }
        body.light-mode .bg-slate-900 {
            background: #f1f5f9 !important;
        }
        body.light-mode .border-slate-700 {
            border-color: #e2e8f0 !important;
        }
        .shake {
            animation: shake 0.5s;
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }
        .success-message {
            animation: slideDown 0.3s ease-out;
        }
        @keyframes slideDown {
            from {
                transform: translateY(-100%);
                opacity: 0;
            }
            to {
                transform: translateY(0);
                opacity: 1;
            }
        }
    </style>
</head>
<body class="dark-mode min-h-screen overflow-x-hidden">
    <!-- Background -->
    <div class="absolute inset-0 fixed overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-orange-600/5 via-red-600/5 to-orange-600/5 animate-pulse-slow"></div>
        <div class="absolute top-0 left-0 w-96 h-96 bg-orange-500/10 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-red-500/10 rounded-full blur-3xl animate-float" style="animation-delay: 2s"></div>
    </div>

    <!-- Success Notification -->
    <div id="successNotification" class="fixed top-24 right-4 z-50 hidden">
        <div class="bg-green-500 text-white px-6 py-4 rounded-xl shadow-2xl success-message flex items-center gap-3">
            <div class="text-2xl">✓</div>
            <div>
                <div class="font-bold">Berhasil!</div>
                <div class="text-sm" id="successMessage">Perubahan telah disimpan</div>
            </div>
        </div>
    </div>

    <!-- Navigation Bar -->
    <nav class="glass-effect fixed w-full z-40 transition-all duration-500 border-b border-orange-500/20 bg-slate-900/80">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-20">
                <div class="flex items-center space-x-6">
                    <div class="relative group">
                        <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center animate-glow hover:scale-110 transition-all duration-300 shadow-xl">
                            <div class="text-3xl font-bold text-white">K</div>
                        </div>
                    </div>
                    <div class="hidden md:block">
                        <h1 class="text-xl font-bold text-white">SMKN 13 Bandung</h1>
                        <p class="text-sm text-orange-300">Excellence in Education</p>
                    </div>
                </div>

                <div class="flex items-center gap-4">
                    <a href="#" class="px-4 py-2 text-slate-300 hover:text-white transition-colors duration-300">
                        Kembali
                    </a>
                </div>
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 relative z-10 pt-28 pb-12">
        <div class="max-w-4xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-12 animate-slide-up">
                <h1 class="text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-400 mb-3">
                    Pengaturan
                </h1>
                <p class="text-slate-400">Kelola preferensi dan keamanan akun Anda</p>
            </div>

            <!-- Settings Sections -->
            <div class="space-y-6">
                <!-- Keamanan Akun -->
                <div class="section-card glass-effect rounded-2xl p-6 border border-slate-700 hover-lift">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">Keamanan Akun</h2>
                            <p class="text-sm text-slate-400">Ubah password dan kelola keamanan</p>
                        </div>
                    </div>

                    <form id="passwordForm" class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-2">Password Lama</label>
                            <input 
                                type="password" 
                                id="oldPassword"
                                class="w-full px-4 py-3 bg-slate-800/50 border-2 border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-orange-500 transition-all duration-300"
                                placeholder="Masukkan password lama"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-2">Password Baru</label>
                            <input 
                                type="password" 
                                id="newPassword"
                                class="w-full px-4 py-3 bg-slate-800/50 border-2 border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-orange-500 transition-all duration-300"
                                placeholder="Masukkan password baru"
                            >
                        </div>
                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-2">Konfirmasi Password</label>
                            <input 
                                type="password" 
                                id="confirmPassword"
                                class="w-full px-4 py-3 bg-slate-800/50 border-2 border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-orange-500 transition-all duration-300"
                                placeholder="Konfirmasi password baru"
                            >
                        </div>
                        <button 
                            type="submit"
                            class="w-full px-6 py-3 bg-gradient-to-r from-orange-500 to-red-600 text-white font-bold rounded-xl hover-lift hover:from-orange-400 hover:to-red-500 transition-all duration-300 shadow-xl"
                        >
                            Ubah Password
                        </button>
                    </form>
                </div>

                <!-- Tampilan -->
                <div class="section-card glass-effect rounded-2xl p-6 border border-slate-700 hover-lift">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">Tampilan</h2>
                            <p class="text-sm text-slate-400">Sesuaikan tema aplikasi</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                            <div>
                                <div class="font-semibold text-white">Mode Gelap</div>
                                <div class="text-sm text-slate-400">Aktifkan mode gelap untuk tampilan yang nyaman di malam hari</div>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" id="darkModeToggle" class="sr-only peer" checked>
                                <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Notifikasi -->
                <div class="section-card glass-effect rounded-2xl p-6 border border-slate-700 hover-lift">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">Notifikasi</h2>
                            <p class="text-sm text-slate-400">Kelola preferensi notifikasi</p>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                            <div class="font-medium text-white">Notifikasi Push</div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer notif-toggle" data-type="push" checked>
                                <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                            </label>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                            <div class="font-medium text-white">Email Notifikasi</div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer notif-toggle" data-type="email" checked>
                                <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                            </label>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                            <div class="font-medium text-white">Notifikasi Eskul</div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer notif-toggle" data-type="eskul" checked>
                                <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Privasi -->
                <div class="section-card glass-effect rounded-2xl p-6 border border-slate-700 hover-lift">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m5.618-4.016A11.955 11.955 0 0112 2.944a11.955 11.955 0 01-8.618 3.04A12.02 12.02 0 003 9c0 5.591 3.824 10.29 9 11.622 5.176-1.332 9-6.03 9-11.622 0-1.042-.133-2.052-.382-3.016z"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">Privasi</h2>
                            <p class="text-sm text-slate-400">Kontrol privasi akun Anda</p>
                        </div>
                    </div>

                    <div class="space-y-3">
                        <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                            <div class="font-medium text-white">Profil Publik</div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer privacy-toggle" data-type="profile" checked>
                                <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                            </label>
                        </div>

                        <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                            <div class="font-medium text-white">Tampilkan Status Online</div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer privacy-toggle" data-type="status">
                                <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Bahasa & Region -->
                <div class="section-card glass-effect rounded-2xl p-6 border border-slate-700 hover-lift">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5h12M9 3v2m1.048 9.5A18.022 18.022 0 016.412 9m6.088 9h7M11 21l5-10 5 10M12.751 5C11.783 10.77 8.07 15.61 3 18.129"></path>
                            </svg>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">Bahasa & Region</h2>
                            <p class="text-sm text-slate-400">Atur bahasa dan lokasi</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-2">Bahasa</label>
                            <select id="languageSelect" class="w-full px-4 py-3 bg-slate-800/50 border-2 border-slate-700 rounded-xl text-white focus:outline-none focus:border-orange-500 transition-all duration-300">
                                <option value="id">Bahasa Indonesia</option>
                                <option value="en">English</option>
                                <option value="su">Basa Sunda</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-semibold text-slate-300 mb-2">Zona Waktu</label>
                            <select id="timezoneSelect" class="w-full px-4 py-3 bg-slate-800/50 border-2 border-slate-700 rounded-xl text-white focus:outline-none focus:border-orange-500 transition-all duration-300">
                                <option value="wib">WIB (GMT+7)</option>
                                <option value="wita">WITA (GMT+8)</option>
                                <option value="wit">WIT (GMT+9)</option>
                            </select>
                        </div>
                    </div>
                </div>

                <!-- Tentang -->
                <div class="section-card glass-effect rounded-2xl p-6 border border-slate-700">
                    <div class="text-center space-y-4">
                        <div class="w-20 h-20 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center mx-auto">
                            <div class="text-4xl font-bold text-white">K</div>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">Kulkul SMKN 13 Bandung</h3>
                            <p class="text-sm text-slate-400">Versi 1.0.0</p>
                        </div>
                        <p class="text-slate-400 text-sm max-w-md mx-auto">
                            Platform manajemen ekstrakurikuler untuk siswa SMKN 13 Bandung
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Show success notification
        function showSuccess(message) {
            const notification = document.getElementById('successNotification');
            const messageEl = document.getElementById('successMessage');
            messageEl.textContent = message;
            notification.classList.remove('hidden');
            setTimeout(() => {
                notification.classList.add('hidden');
            }, 3000);
        }

        // Password Form
        document.getElementById('passwordForm').addEventListener('submit', (e) => {
            e.preventDefault();
            const oldPass = document.getElementById('oldPassword').value;
            const newPass = document.getElementById('newPassword').value;
            const confirmPass = document.getElementById('confirmPassword').value;
            const form = e.target;

            if (!oldPass || !newPass || !confirmPass) {
                form.classList.add('shake');
                setTimeout(() => form.classList.remove('shake'), 500);
                return;
            }

            if (newPass !== confirmPass) {
                form.classList.add('shake');
                setTimeout(() => form.classList.remove('shake'), 500);
                alert('Password baru dan konfirmasi tidak cocok!');
                return;
            }

            if (newPass.length < 6) {
                alert('Password minimal 6 karakter!');
                return;
            }

            showSuccess('Password berhasil diubah!');
            form.reset();
        });

        // Dark Mode Toggle
        const darkModeToggle = document.getElementById('darkModeToggle');
        darkModeToggle.addEventListener('change', () => {
            if (darkModeToggle.checked) {
                document.body.classList.remove('light-mode');
                document.body.classList.add('dark-mode');
                showSuccess('Mode gelap diaktifkan');
            } else {
                document.body.classList.remove('dark-mode');
                document.body.classList.add('light-mode');
                showSuccess('Mode terang diaktifkan');
            }
        });

        // Notification Toggles
        document.querySelectorAll('.notif-toggle').forEach(toggle => {
            toggle.addEventListener('change', (e) => {
                const type = e.target.dataset.type;
                const status = e.target.checked ? 'diaktifkan' : 'dinonaktifkan';
                showSuccess(`Notifikasi ${type} ${status}`);
            });
        });

        // Privacy Toggles
        document.querySelectorAll('.privacy-toggle').forEach(toggle => {
            toggle.addEventListener('change', (e) => {
                const type = e.target.dataset.type;
                const status = e.target.checked ? 'diaktifkan' : 'dinonaktifkan';
                showSuccess(`Privasi ${type} ${status}`);
            });
        });

        // Language Select
        document.getElementById('languageSelect').addEventListener('change', (e) => {
            const langNames = {
                'id': 'Bahasa Indonesia',
                'en': 'English',
                'su': 'Basa Sunda'
            };
            showSuccess(`Bahasa diubah ke ${langNames[e.target.value]}`);
        });

        // Timezone Select
        document.getElementById('timezoneSelect').addEventListener('change', (e) => {
            showSuccess(`Zona waktu diubah ke ${e.target.value.toUpperCase()}`);
        });
    </script>
</body>
</html>