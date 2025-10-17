<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coming Soon</title>
    <link rel="icon" type="image/png" href="images/logo.png">
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="{{ asset('js/main.js') }}"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style href="{{ asset('css/sidebarscroll.css') }}"></style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        slate: {
                            850: '#1a2234'
                        }
                    },
                    backgroundImage: {
                        'gradient-radial': 'radial-gradient(var(--tw-gradient-stops))'
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'bounce-slow': 'bounce 3s infinite',
                        'pulse-slow': 'pulse 4s infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                        'slide-up': 'slideUp 1s ease-out',
                        'slide-in': 'slideIn 1.2s ease-out',
                        'rotate-slow': 'rotate 20s linear infinite',
                        'fade-in': 'fadeIn 1s ease-out',
                        'shake': 'shake 0.5s ease-in-out',
                        'success': 'success 0.6s ease-out'
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
                        },
                        slideIn: {
                            '0%': { transform: 'translateX(100px)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' }
                        },
                        rotate: {
                            '0%': { transform: 'rotate(0deg)' },
                            '100%': { transform: 'rotate(360deg)' }
                        },
                        fadeIn: {
                            '0%': { opacity: '0' },
                            '100%': { opacity: '1' }
                        },
                        shake: {
                            '0%, 100%': { transform: 'translateX(0)' },
                            '25%': { transform: 'translateX(-10px)' },
                            '75%': { transform: 'translateX(10px)' }
                        },
                        success: {
                            '0%': { transform: 'scale(0.8)', opacity: '0' },
                            '50%': { transform: 'scale(1.1)' },
                            '100%': { transform: 'scale(1)', opacity: '1' }
                        }
                    }
                }
            }
        }
    </script>
    <style>
          /* Styles yang ada tetap, tapi tambahkan ini untuk memperbaiki layout */
        body {
            display: flex;
            flex-direction: column;
            min-height: 100vh; /* Pastikan halaman penuh tinggi layar */
        }
        .main-content {
            flex: 1; /* Konten utama mengisi sisa ruang */
            padding-top: 4rem; /* Sesuaikan berdasarkan tinggi navbar */
            padding-bottom: 4rem; /* Beri ruang untuk footer */
        }
        .sidebar {
            position: fixed; /* Pastikan sidebar fixed dan tidak tumpang tindih */
            top: 0;
            left: 0;
            height: 100vh;
            width: 250px; /* Atur lebar tetap */
            z-index: 50; /* Di atas overlay */
        }
        #sidebarOverlay {
            z-index: 45; /* Di bawah sidebar tapi di atas konten */
        }
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
        /* Custom Scrollbar */
        .sidebar-scroll::-webkit-scrollbar {
            width: 6px;
        }
        .sidebar-scroll::-webkit-scrollbar-track {
            background: rgba(51, 65, 85, 0.3);
            border-radius: 10px;
        }
        .sidebar-scroll::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #f97316, #dc2626);
            border-radius: 10px;
        }
        .sidebar-scroll::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #fb923c, #ef4444);
        }
        .progress-bar {
            transition: width 0.3s ease;
        }
        .toggle-switch {
            transition: all 0.3s ease;
        }
        .language-option {
            transition: all 0.2s ease;
        }
        .language-option:hover {
            transform: scale(1.05);
        }
    </style>
</head>
<body class="dark-mode overflow-x-hidden">
   <!-- Animated Background -->
<div class="fixed inset-0 -z-10">
    <!-- Gradient base -->
    <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900"></div>
    <div class="absolute inset-0 bg-gradient-to-r from-orange-600/5 via-red-600/5 to-orange-600/5 animate-pulse-slow"></div>
    <!-- Floating blobs -->
    <div class="absolute top-0 left-0 w-96 h-96 bg-orange-500/10 rounded-full blur-3xl animate-float"></div>
    <div class="absolute bottom-0 right-0 w-96 h-96 bg-red-500/10 rounded-full blur-3xl animate-float" style="animation-delay: 2s"></div>
    <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-orange-400/5 rounded-full blur-2xl animate-pulse-slow" style="animation-delay: 4s"></div>
</div>
/

   @include('user/includes.navbar')
  
   @include('user/includes.sidebar')

    <!-- Success Notification -->
    <div id="successNotification" class="fixed top-24 right-4 z-50 hidden">
        <div class="bg-green-500 text-white px-6 py-4 rounded-xl shadow-2xl success-message flex items-center gap-3">
            <div class="text-2xl animate-success">✓</div>
            <div>
                <div class="font-bold">Berhasil!</div>
                <div class="text-sm" id="successMessage">Perubahan telah disimpan</div>
            </div>
        </div>
    </div>

    <!-- Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/60 opacity-0 pointer-events-none transition-opacity duration-500 z-40"></div>

    <!-- Main Content -->
    <div class="container mx-auto px-4 relative z-10 pt-28 pb-12">
        <div class="max-w-6xl mx-auto">
            <!-- Header -->
            <div class="text-center mb-12 animate-slide-up">
                <div class="flex items-center justify-center mb-6">
                    <div class="w-20 h-1 bg-gradient-to-r from-orange-500 to-red-500 mr-4"></div>
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-full flex items-center justify-center shadow-xl">
                       <img src="{{ asset('images/logo.png') }}" alt="Logo SMKN 13 Bandung" class="w-8 h-8 object-contain">
                    </div>
                    <div class="w-20 h-1 bg-gradient-to-r from-red-500 to-orange-500 ml-4"></div>
                </div>
                <h1 class="text-5xl md:text-6xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-400 mb-3">
                    Pengaturan
                </h1>
                <p class="text-xl text-slate-400">Kelola preferensi dan keamanan akun Anda dengan mudah</p>
            </div>

            <!-- Settings Grid -->
            <div class="grid lg:grid-cols-2 gap-8">
                <!-- Left Column -->
                <div class="space-y-6">
                    <!-- Keamanan Akun -->
                    <div class="section-card glass-effect rounded-2xl p-6 border border-slate-700 hover-lift animate-slide-up">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-shield-alt text-white text-xl"></i>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-white">Keamanan Akun</h2>
                                <p class="text-sm text-slate-400">Ubah password dan kelola keamanan</p>
                            </div>
                        </div>

                        <form id="passwordForm" class="space-y-4">
                            <div>
                                <label class="block text-sm font-semibold text-slate-300 mb-2">Password Lama</label>
                                <div class="relative">
                                    <input 
                                        type="password" 
                                        id="oldPassword"
                                        class="w-full px-4 py-3 pl-12 bg-slate-800/50 border-2 border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-orange-500 transition-all duration-300"
                                        placeholder="Masukkan password lama"
                                    >
                                    <i class="fas fa-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-slate-500"></i>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-300 mb-2">Password Baru</label>
                                <div class="relative">
                                    <input 
                                        type="password" 
                                        id="newPassword"
                                        class="w-full px-4 py-3 pl-12 bg-slate-800/50 border-2 border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-orange-500 transition-all duration-300"
                                        placeholder="Masukkan password baru"
                                    >
                                    <i class="fas fa-key absolute left-4 top-1/2 transform -translate-y-1/2 text-slate-500"></i>
                                </div>
                                <div class="mt-2">
                                    <div class="text-xs text-slate-400 mb-1">Kekuatan Password:</div>
                                    <div class="w-full bg-slate-700 rounded-full h-2">
                                        <div id="passwordStrength" class="progress-bar bg-gradient-to-r from-red-500 to-orange-500 h-2 rounded-full" style="width: 0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-300 mb-2">Konfirmasi Password</label>
                                <div class="relative">
                                    <input 
                                        type="password" 
                                        id="confirmPassword"
                                        class="w-full px-4 py-3 pl-12 bg-slate-800/50 border-2 border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-orange-500 transition-all duration-300"
                                        placeholder="Konfirmasi password baru"
                                    >
                                    <i class="fas fa-check-circle absolute left-4 top-1/2 transform -translate-y-1/2 text-slate-500"></i>
                                </div>
                            </div>
                            <button 
                                type="submit"
                                class="w-full px-6 py-3 bg-gradient-to-r from-orange-500 to-red-600 text-white font-bold rounded-xl hover-lift hover:from-orange-400 hover:to-red-500 transition-all duration-300 shadow-xl"
                            >
                                <i class="fas fa-save mr-2"></i>
                                Ubah Password
                            </button>
                        </form>
                    </div>

                    <!-- Bahasa & Lokalisasi -->
                    <div class="section-card glass-effect rounded-2xl p-6 border border-slate-700 hover-lift animate-slide-up" style="animation-delay: 0.2s">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-globe text-white text-xl"></i>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-white">Bahasa & Lokalisasi</h2>
                                <p class="text-sm text-slate-400">Pilih bahasa dan zona waktu</p>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-semibold text-slate-300 mb-3">Bahasa Interface</label>
                                <div class="grid grid-cols-2 gap-3">
                                    <div class="language-option p-3 bg-slate-800/30 rounded-xl border-2 border-orange-500 cursor-pointer">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-full bg-red-500 flex items-center justify-center text-white font-bold text-sm">ID</div>
                                            <div>
                                                <div class="font-medium text-white">Indonesia</div>
                                                <div class="text-xs text-slate-400">Bahasa Indonesia</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="language-option p-3 bg-slate-800/30 rounded-xl border-2 border-slate-700 cursor-pointer hover:border-orange-400">
                                        <div class="flex items-center gap-3">
                                            <div class="w-8 h-8 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold text-sm">EN</div>
                                            <div>
                                                <div class="font-medium text-white">English</div>
                                                <div class="text-xs text-slate-400">English (US)</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            
                            <div>
                                <label class="block text-sm font-semibold text-slate-300 mb-2">Zona Waktu</label>
                                <select class="w-full px-4 py-3 bg-slate-800/50 border-2 border-slate-700 rounded-xl text-white focus:outline-none focus:border-orange-500 transition-all duration-300">
                                    <option value="WIB">WIB - Waktu Indonesia Barat (GMT+7)</option>
                                    <option value="WITA">WITA - Waktu Indonesia Tengah (GMT+8)</option>
                                    <option value="WIT">WIT - Waktu Indonesia Timur (GMT+9)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="space-y-6">
                    <!-- Tampilan -->
                    <div class="section-card glass-effect rounded-2xl p-6 border border-slate-700 hover-lift animate-slide-up" style="animation-delay: 0.1s">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-palette text-white text-xl"></i>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-white">Tampilan</h2>
                                <p class="text-sm text-slate-400">Sesuaikan tema dan tampilan aplikasi</p>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white flex items-center gap-2">
                                        <i class="fas fa-moon text-orange-400"></i>
                                        Mode Gelap
                                    </div>
                                    <div class="text-sm text-slate-400">Aktifkan mode gelap untuk tampilan yang nyaman</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" id="darkModeToggle" class="sr-only peer toggle-switch" checked>
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white flex items-center gap-2">
                                        <i class="fas fa-magic text-orange-400"></i>
                                        Animasi
                                    </div>
                                    <div class="text-sm text-slate-400">Aktifkan efek animasi dan transisi</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer toggle-switch" checked>
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white flex items-center gap-2">
                                        <i class="fas fa-compress-arrows-alt text-orange-400"></i>
                                        Mode Kompak
                                    </div>
                                    <div class="text-sm text-slate-400">Tampilan lebih padat untuk layar kecil</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer toggle-switch">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <!-- Notifikasi -->
                    <div class="section-card glass-effect rounded-2xl p-6 border border-slate-700 hover-lift animate-slide-up" style="animation-delay: 0.3s">
                        <div class="flex items-center gap-3 mb-6">
                            <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-bell text-white text-xl"></i>
                            </div>
                            <div>
                                <h2 class="text-2xl font-bold text-white">Notifikasi</h2>
                                <p class="text-sm text-slate-400">Kelola preferensi notifikasi</p>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-mobile-alt text-orange-400"></i>
                                    <div class="font-medium text-white">Notifikasi Push</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer notif-toggle toggle-switch" data-type="push" checked>
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-envelope text-orange-400"></i>
                                    <div class="font-medium text-white">Email Notifikasi</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer notif-toggle toggle-switch" data-type="email" checked>
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-users text-orange-400"></i>
                                    <div class="font-medium text-white">Notifikasi Eskul</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer notif-toggle toggle-switch" data-type="eskul" checked>
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-volume-up text-orange-400"></i>
                                    <div class="font-medium text-white">Suara Notifikasi</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer notif-toggle toggle-switch" data-type="sound" checked>
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Full Width Sections -->
            <div class="mt-8 space-y-6">
                <!-- Privasi & Keamanan -->
                <div class="section-card glass-effect rounded-2xl p-6 border border-slate-700 hover-lift animate-slide-up" style="animation-delay: 0.4s">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-user-shield text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">Privasi & Keamanan</h2>
                            <p class="text-sm text-slate-400">Kelola pengaturan privasi dan keamanan data</p>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-eye text-orange-400"></i>
                                    <div>
                                        <div class="font-medium text-white">Profil Publik</div>
                                        <div class="text-xs text-slate-400">Tampilkan profil ke siswa lain</div>
                                    </div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer toggle-switch" checked>
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-chart-line text-orange-400"></i>
                                    <div>
                                        <div class="font-medium text-white">Analitik Aktivitas</div>
                                        <div class="text-xs text-slate-400">Izinkan pengumpulan data aktivitas</div>
                                    </div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer toggle-switch" checked>
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                        </div>

                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-lock text-orange-400"></i>
                                    <div>
                                        <div class="font-medium text-white">Autentikasi 2 Faktor</div>
                                        <div class="text-xs text-slate-400">Keamanan tambahan untuk login</div>
                                    </div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer toggle-switch">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-history text-orange-400"></i>
                                    <div>
                                        <div class="font-medium text-white">Riwayat Login</div>
                                        <div class="text-xs text-slate-400">Simpan log aktivitas login</div>
                                    </div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer toggle-switch" checked>
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Backup & Sinkronisasi -->
                <div class="section-card glass-effect rounded-2xl p-6 border border-slate-700 hover-lift animate-slide-up" style="animation-delay: 0.5s">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-cloud text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">Backup & Sinkronisasi</h2>
                            <p class="text-sm text-slate-400">Kelola backup data dan sinkronisasi perangkat</p>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="bg-slate-800/30 rounded-xl p-4">
                            <div class="flex items-center gap-3 mb-3">
                                <i class="fas fa-save text-orange-400 text-xl"></i>
                                <div>
                                    <div class="font-semibold text-white">Auto Backup</div>
                                    <div class="text-xs text-slate-400">Backup otomatis harian</div>
                                </div>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer toggle-switch" checked>
                                <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                            </label>
                        </div>

                        <div class="bg-slate-800/30 rounded-xl p-4">
                            <div class="flex items-center gap-3 mb-3">
                                <i class="fas fa-sync text-orange-400 text-xl"></i>
                                <div>
                                    <div class="font-semibold text-white">Sinkronisasi</div>
                                    <div class="text-xs text-slate-400">Sinkron antar perangkat</div>
                                </div>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer toggle-switch" checked>
                                <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                            </label>
                        </div>

                        <div class="bg-slate-800/30 rounded-xl p-4">
                            <div class="text-center">
                                <div class="text-sm text-slate-400 mb-2">Backup Terakhir</div>
                                <div class="font-semibold text-white">2 jam yang lalu</div>
                                <button class="mt-2 px-4 py-2 bg-gradient-to-r from-orange-500 to-red-600 text-white text-sm rounded-lg hover-lift transition-all duration-300">
                                    <i class="fas fa-download mr-1"></i>
                                    Backup Sekarang
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ekspor & Impor Data -->
                <div class="section-card glass-effect rounded-2xl p-6 border border-slate-700 hover-lift animate-slide-up" style="animation-delay: 0.6s">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-file-export text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">Ekspor & Impor Data</h2>
                            <p class="text-sm text-slate-400">Kelola data pribadi dan riwayat aktivitas</p>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-3 gap-6">
                        <div class="bg-slate-800/30 rounded-xl p-4 text-center">
                            <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-download text-white text-xl"></i>
                            </div>
                            <div class="font-semibold text-white mb-2">Ekspor Data</div>
                            <div class="text-sm text-slate-400 mb-4">Unduh semua data pribadi dalam format JSON</div>
                            <button class="w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-all duration-300">
                                <i class="fas fa-download mr-2"></i>
                                Ekspor
                            </button>
                        </div>

                        <div class="bg-slate-800/30 rounded-xl p-4 text-center">
                            <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-upload text-white text-xl"></i>
                            </div>
                            <div class="font-semibold text-white mb-2">Impor Data</div>
                            <div class="text-sm text-slate-400 mb-4">Impor data dari file backup sebelumnya</div>
                            <button class="w-full px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-all duration-300">
                                <i class="fas fa-upload mr-2"></i>
                                Impor
                            </button>
                        </div>

                        <div class="bg-slate-800/30 rounded-xl p-4 text-center">
                            <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-3">
                                <i class="fas fa-file-pdf text-white text-xl"></i>
                            </div>
                            <div class="font-semibold text-white mb-2">Laporan PDF</div>
                            <div class="text-sm text-slate-400 mb-4">Generate laporan aktivitas dalam PDF</div>
                            <button class="w-full px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-all duration-300">
                                <i class="fas fa-file-pdf mr-2"></i>
                                Generate
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Manajemen Sesi -->
                <div class="section-card glass-effect rounded-2xl p-6 border border-slate-700 hover-lift animate-slide-up" style="animation-delay: 0.7s">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-desktop text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">Manajemen Sesi</h2>
                            <p class="text-sm text-slate-400">Kelola perangkat yang terhubung ke akun Anda</p>
                        </div>
                    </div>

                    <div class="space-y-4">
                        <!-- Current Session -->
                        <div class="bg-green-900/20 border border-green-500/30 rounded-xl p-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center">
                                        <i class="fas fa-laptop text-white"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-white flex items-center gap-2">
                                            Windows PC - Chrome
                                            <span class="px-2 py-1 bg-green-500 text-white text-xs rounded-full">Aktif Sekarang</span>
                                        </div>
                                        <div class="text-sm text-slate-400">IP: 192.168.1.100 • Bandung, Indonesia</div>
                                        <div class="text-xs text-slate-500">Login: 2 jam yang lalu</div>
                                    </div>
                                </div>
                                <div class="text-green-400">
                                    <i class="fas fa-circle text-xs"></i>
                                </div>
                            </div>
                        </div>

                        <!-- Other Sessions -->
                        <div class="bg-slate-800/30 rounded-xl p-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-slate-600 rounded-full flex items-center justify-center">
                                        <i class="fas fa-mobile-alt text-white"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-white">Android - Chrome Mobile</div>
                                        <div class="text-sm text-slate-400">IP: 192.168.1.105 • Bandung, Indonesia</div>
                                        <div class="text-xs text-slate-500">Login: 1 hari yang lalu</div>
                                    </div>
                                </div>
                                <button class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-sm rounded-lg transition-all duration-300">
                                    <i class="fas fa-sign-out-alt mr-1"></i>
                                    Logout
                                </button>
                            </div>
                        </div>

                        <div class="bg-slate-800/30 rounded-xl p-4">
                            <div class="flex items-center justify-between">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-slate-600 rounded-full flex items-center justify-center">
                                        <i class="fas fa-tablet-alt text-white"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-white">iPad - Safari</div>
                                        <div class="text-sm text-slate-400">IP: 192.168.1.108 • Bandung, Indonesia</div>
                                        <div class="text-xs text-slate-500">Login: 3 hari yang lalu</div>
                                    </div>
                                </div>
                                <button class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-sm rounded-lg transition-all duration-300">
                                    <i class="fas fa-sign-out-alt mr-1"></i>
                                    Logout
                                </button>
                            </div>
                        </div>

                        <div class="text-center pt-4">
                            <button class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-all duration-300">
                                <i class="fas fa-sign-out-alt mr-2"></i>
                                Logout Semua Perangkat
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Aksesibilitas -->
                <div class="section-card glass-effect rounded-2xl p-6 border border-slate-700 hover-lift animate-slide-up" style="animation-delay: 0.8s">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-universal-access text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-white">Aksesibilitas</h2>
                            <p class="text-sm text-slate-400">Pengaturan untuk kemudahan akses</p>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white flex items-center gap-2">
                                        <i class="fas fa-text-height text-orange-400"></i>
                                        Ukuran Font Besar
                                    </div>
                                    <div class="text-sm text-slate-400">Perbesar ukuran teks untuk kemudahan baca</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer toggle-switch">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white flex items-center gap-2">
                                        <i class="fas fa-adjust text-orange-400"></i>
                                        Kontras Tinggi
                                    </div>
                                    <div class="text-sm text-slate-400">Tingkatkan kontras untuk visibilitas lebih baik</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer toggle-switch">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white flex items-center gap-2">
                                        <i class="fas fa-mouse-pointer text-orange-400"></i>
                                        Kursor Besar
                                    </div>
                                    <div class="text-sm text-slate-400">Perbesar ukuran kursor mouse</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer toggle-switch">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white flex items-center gap-2">
                                        <i class="fas fa-keyboard text-orange-400"></i>
                                        Navigasi Keyboard
                                    </div>
                                    <div class="text-sm text-slate-400">Aktifkan navigasi menggunakan keyboard</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer toggle-switch" checked>
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white flex items-center gap-2">
                                        <i class="fas fa-volume-up text-orange-400"></i>
                                        Screen Reader
                                    </div>
                                    <div class="text-sm text-slate-400">Dukungan untuk pembaca layar</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer toggle-switch">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>

                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white flex items-center gap-2">
                                        <i class="fas fa-stopwatch text-orange-400"></i>
                                        Kurangi Animasi
                                    </div>
                                    <div class="text-sm text-slate-400">Kurangi efek animasi untuk sensitivitas gerak</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer toggle-switch">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Zona Bahaya -->
                <div class="section-card glass-effect rounded-2xl p-6 border border-red-500/50 hover-lift animate-slide-up" style="animation-delay: 0.9s">
                    <div class="flex items-center gap-3 mb-6">
                        <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-red-700 rounded-xl flex items-center justify-center">
                            <i class="fas fa-exclamation-triangle text-white text-xl"></i>
                        </div>
                        <div>
                            <h2 class="text-2xl font-bold text-red-400">Zona Bahaya</h2>
                            <p class="text-sm text-slate-400">Tindakan ini tidak dapat dibatalkan</p>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div class="bg-red-900/20 border border-red-500/30 rounded-xl p-4">
                            <div class="flex items-center gap-3 mb-3">
                                <i class="fas fa-trash text-red-400 text-xl"></i>
                                <div>
                                    <div class="font-semibold text-white">Hapus Semua Data</div>
                                    <div class="text-sm text-slate-400">Menghapus semua data akun secara permanen</div>
                                </div>
                            </div>
                            <button id="deleteDataBtn" class="w-full px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-all duration-300">
                                <i class="fas fa-trash mr-2"></i>
                                Hapus Data
                            </button>
                        </div>

                        <div class="bg-red-900/20 border border-red-500/30 rounded-xl p-4">
                            <div class="flex items-center gap-3 mb-3">
                                <i class="fas fa-user-times text-red-400 text-xl"></i>
                                <div>
                                    <div class="font-semibold text-white">Hapus Akun</div>
                                    <div class="text-sm text-slate-400">Menghapus akun secara permanen</div>
                                </div>
                            </div>
                            <button id="deleteAccountBtn" class="w-full px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-all duration-300">
                                <i class="fas fa-user-times mr-2"></i>
                                Hapus Akun
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Save All Button -->
            <div class="mt-8 text-center animate-slide-up" style="animation-delay: 0.7s">
                <button id="saveAllSettings" class="px-8 py-4 bg-gradient-to-r from-orange-500 to-red-600 text-white font-bold text-lg rounded-2xl hover-lift hover:from-orange-400 hover:to-red-500 transition-all duration-300 shadow-2xl">
                    <i class="fas fa-save mr-3"></i>
                    Simpan Semua Pengaturan
                </button>
            </div>
        </div>
    </div>

    @include('user/includes.footer')

    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/settings.js') }}"></script>

</body>
</html>
