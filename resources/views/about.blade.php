<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About - Kulkul SMKN 13 BANDUNG</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#dc2626',
                        secondary: '#fbbf24',
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
                        }
                    }
                }
            }
        }
    </script>
    <style>
     /* Custom Scrollbar untuk Sidebar */
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
</style>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-950 overflow-x-hidden">
    <!-- Navigation Bar -->
    <nav class="glass-effect fixed w-full z-50 transition-all duration-500 border-b border-orange-500/20 bg-slate-900/80">
        <div class="container mx-auto px-4">
            <div class="flex items-center justify-between h-20">
                                <div class="flex items-center space-x-6">
                    <!-- Logo -->
                    <div class="relative group">
                        <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center animate-glow hover:scale-110 transition-all duration-300 shadow-xl">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo SMKN 13 Bandung" class="w-10 h-10 object-contain">
                        </div>
                        <!-- Efek hover overlay -->
                        <div class="absolute inset-0 bg-gradient-to-br from-orange-400 to-red-500 rounded-2xl opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                    </div>

                    <!-- Brand Text -->
                    <div class="hidden md:block">
                        <h1 class="text-xl font-bold text-white">SMKN 13 Bandung</h1>
                        <p class="text-sm text-orange-300">Excellence in Education</p>
                    </div>
                </div>

                <!-- Navigation Menu -->
                <div class="hidden md:flex items-center space-x-8">
                    <a href="{{ route('home') }}" class="group flex items-center text-slate-300 hover:text-white font-medium transition-all duration-300 hover-lift">
                        <i class="fas fa-home mr-2 group-hover:animate-bounce text-orange-400"></i>
                        <span class="relative">
                            BERANDA
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-orange-400 transition-all duration-300 group-hover:w-full"></span>
                        </span>
                    </a>
                    <a href="{{ route('about') }}" class="group flex items-center text-white font-medium transition-all duration-300 hover-lift">
                        <i class="fas fa-info-circle mr-2 group-hover:animate-pulse text-orange-400"></i>
                        <span class="relative">
                            TENTANG KAMI
                            <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-orange-400"></span>
                        </span>
                    </a>    
                    <a href="{{ route('services') }}" class="group flex items-center text-slate-300 hover:text-white font-medium transition-all duration-300 hover-lift">
                        <i class="fas fa-cogs mr-2 group-hover:animate-spin text-orange-400"></i>
                        <span class="relative">
                            LAYANAN
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-orange-400 transition-all duration-300 group-hover:w-full"></span>
                        </span>
                    </a>
                </div>

                <!-- User Profile -->
                <div class="flex items-center">
                    <div class="bg-gradient-to-r from-orange-500 to-red-600 rounded-2xl p-1 shadow-xl">
                        <div class="bg-slate-900/90 rounded-2xl p-3 flex items-center space-x-3 hover-lift">
                            <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-red-500 rounded-full overflow-hidden animate-pulse-slow shadow-lg">
                                <div class="w-full h-full bg-gradient-to-br from-orange-300 to-red-400 flex items-center justify-center">
                                    <i class="fas fa-user text-white text-lg"></i>
                                </div>
                            </div>
                            <div class="hidden sm:block">
                                <div class="text-sm font-bold text-white">Username</div>
                                <div class="text-xs text-orange-300">NIS : 2080710</div>
                            </div>
                            <button id="sidebarToggle" class="text-slate-300 hover:text-white transition-colors duration-300 hover:rotate-90">
                                <i class="fas fa-bars text-lg"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>

      <!-- Sidebar -->
   <div id="sidebar" class="fixed top-0 right-0 w-80 h-full backdrop-blur-xl text-white transform translate-x-full transition-transform duration-500 ease-in-out z-50 shadow-2xl border-l border-orange-500/20 bg-slate-900/95 flex flex-col">
        <!-- Header (Fixed) -->
        <div class="flex items-center justify-between px-6 py-4 border-b border-orange-500/30 bg-gradient-to-r from-orange-600/20 to-red-600/20 flex-shrink-0">
            <h2 class="text-xl font-bold text-white">Menu Navigasi</h2>
            <button id="closeSidebar" class="text-slate-300 hover:text-white transition-colors duration-300 hover:rotate-90">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Profile Card -->
        <div class="px-6 py-4 border-b border-orange-500/30 flex-shrink-0">
            <div class="flex items-center space-x-4 hover-lift bg-gradient-to-r from-orange-600/10 to-red-600/10 p-4 rounded-xl border border-orange-500/20">
                <div class="w-16 h-16 rounded-full bg-gradient-to-br from-orange-400 to-red-500 flex items-center justify-center animate-pulse-slow shadow-lg">
                    <i class="fas fa-user text-white text-xl"></i>
                </div>
                <div>
                    <p class="font-bold text-white text-base">Username</p>
                    <p class="text-sm text-orange-300">NIS: 2080710</p>
                    <p class="text-xs text-slate-400">Siswa Aktif</p>
                </div>
            </div>
        </div>

        <!-- Menu Items -->
        <ul class="flex-1 overflow-y-auto sidebar-scroll px-6 py-4 space-y-3">
            <li>
                <a href="{{ route('home') }}" class="flex items-center space-x-4 text-white bg-orange-600/30 transition-all duration-300 hover-lift p-3 rounded-xl border border-orange-400/30">
                    <i class="fas fa-home text-orange-400 w-5"></i>
                    <span class="font-medium">Beranda</span>
                </a>
            </li>
            <li>
                <a href="{{ route('about') }}" class="flex items-center space-x-4 text-slate-300 hover:text-white hover:bg-orange-600/20 transition-all duration-300 hover-lift p-3 rounded-xl">
                    <i class="fas fa-info-circle text-orange-400 w-5"></i>
                    <span class="font-medium">Tentang Kami</span>
                </a>
            </li>
            <li>
                <a href="{{ route('services') }}" class="flex items-center space-x-4 text-slate-300 hover:text-white hover:bg-orange-600/20 transition-all duration-300 hover-lift p-3 rounded-xl">
                    <i class="fas fa-cogs text-orange-400 w-5"></i>
                    <span class="font-medium">Layanan</span>
                </a>
            </li> 
            <li>
                <a href="{{ route('eskul') }}" class="flex items-center space-x-4 text-slate-300 hover:text-white hover:bg-orange-600/20 transition-all duration-300 hover-lift p-3 rounded-xl">
                    <i class="fas fa-list text-orange-400 w-5"></i>
                 <span class="font-medium">Eskul list</span>
                </a>
            </li>
            <li>
                <a href="{{ route('profile') }}" class="flex items-center space-x-4 text-slate-300 hover:text-white hover:bg-orange-600/20 transition-all duration-300 hover-lift p-3 rounded-xl">
                    <i class="fas fa-user-graduate text-orange-400 w-5"></i>
                    <span class="font-medium">Profil Saya</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center space-x-4 text-slate-300 hover:text-white hover:bg-orange-600/20 transition-all duration-300 hover-lift p-3 rounded-xl">
                    <i class="fas fa-users text-orange-400 w-5"></i>
                    <span class="font-medium">Teman Saya</span>
                </a>
            </li>
            <li>
                <a href="#" class="flex items-center space-x-4 text-slate-300 hover:text-white hover:bg-orange-600/20 transition-all duration-300 hover-lift p-3 rounded-xl">
                    <i class="fas fa-cog text-orange-400 w-5"></i>
                    <span class="font-medium">Pengaturan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('login') }}" class="flex items-center space-x-4 text-slate-300 hover:text-white hover:bg-orange-600/20 transition-all duration-300 hover-lift p-3 rounded-xl">
                    <i class="fas fa-sign-in-alt text-green-400 w-5"></i>
                    <span class="font-medium">Masuk</span>
            </li>
            <li class="pt-4 border-t border-orange-500/20">
                <a href="#" class="flex items-center space-x-4 text-red-300 hover:text-red-200 hover:bg-red-600/20 transition-all duration-300 hover-lift p-3 rounded-xl">
                    <i class="fas fa-sign-out-alt text-red-400 w-5"></i>
                    <span class="font-medium">Keluar</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/60 opacity-0 pointer-events-none transition-opacity duration-500 z-40"></div>

    <!-- Hero Section -->
    <section class="relative min-h-screen bg-gradient-to-br from-slate-950 via-slate-900 to-slate-800 overflow-hidden pt-28">
        <!-- Animated Background -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-r from-orange-600/5 via-red-600/5 to-orange-600/5 animate-pulse-slow"></div>
            <div class="absolute top-0 left-0 w-full h-full">
                <div class="absolute top-1/4 left-1/4 w-3 h-3 bg-orange-400 rounded-full animate-bounce opacity-60" style="animation-delay: 0s"></div>
                <div class="absolute top-1/3 right-1/4 w-2 h-2 bg-red-400 rounded-full animate-bounce opacity-60" style="animation-delay: 1s"></div>
                <div class="absolute bottom-1/3 left-1/3 w-2.5 h-2.5 bg-orange-500 rounded-full animate-bounce opacity-60" style="animation-delay: 2s"></div>
                <div class="absolute bottom-1/4 right-1/3 w-2 h-2 bg-red-300 rounded-full animate-bounce opacity-60" style="animation-delay: 3s"></div>
            </div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <!-- Main Title -->
            <div class="max-w-4xl mx-auto text-center mb-20 animate-slide-up">
                <div class="flex items-center justify-center mb-6">
                    <div class="w-20 h-1 bg-gradient-to-r from-orange-500 to-red-500 mr-4"></div>
                    <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-full flex items-center justify-center shadow-xl">
                        <img src="{{ asset('images/logo.png') }}" alt="Logo SMKN 13 Bandung" class="w-10 h-10 object-contain filter drop-shadow-lg">
                    </div>
                    <div class="w-20 h-1 bg-gradient-to-r from-red-500 to-orange-500 ml-4"></div>
                </div>
                <h1 class="text-6xl md:text-7xl font-bold text-white mb-6 tracking-tight">
                    Tentang <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-400">Kulkul</span>
                </h1>
                <p class="text-xl text-slate-300 max-w-3xl mx-auto leading-relaxed">
                    Mengenal lebih dekat program ekstrakurikuler unggulan yang mengembangkan potensi siswa SMKN 13 Bandung menuju masa depan yang gemilang
                </p>
            </div>

            <!-- Stats Cards -->
            <div class="grid md:grid-cols-4 gap-6 mb-20">
                <div class="group bg-gradient-to-br from-orange-900/30 to-red-900/30 backdrop-blur-xl rounded-2xl p-8 text-center hover-lift border border-orange-500/30 hover:border-orange-400/50 transition-all duration-500">
                    <div class="text-5xl font-bold text-white mb-3 group-hover:scale-110 transition-transform duration-300">25+</div>
                    <div class="text-orange-300 font-medium text-lg">Ekstrakurikuler</div>
                    <div class="text-slate-400 text-sm mt-1">Program Unggulan</div>
                </div>
                <div class="group bg-gradient-to-br from-red-900/30 to-orange-900/30 backdrop-blur-xl rounded-2xl p-8 text-center hover-lift border border-red-500/30 hover:border-red-400/50 transition-all duration-500">
                    <div class="text-5xl font-bold text-white mb-3 group-hover:scale-110 transition-transform duration-300">1000+</div>
                    <div class="text-red-300 font-medium text-lg">Siswa Aktif</div>
                    <div class="text-slate-400 text-sm mt-1">Partisipasi Tinggi</div>
                </div>
                <div class="group bg-gradient-to-br from-orange-800/30 to-red-800/30 backdrop-blur-xl rounded-2xl p-8 text-center hover-lift border border-orange-600/30 hover:border-orange-500/50 transition-all duration-500">
                    <div class="text-5xl font-bold text-white mb-3 group-hover:scale-110 transition-transform duration-300">50+</div>
                    <div class="text-orange-300 font-medium text-lg">Prestasi</div>
                    <div class="text-slate-400 text-sm mt-1">Pencapaian Luar Biasa</div>
                </div>
                <div class="group bg-gradient-to-br from-red-800/30 to-orange-800/30 backdrop-blur-xl rounded-2xl p-8 text-center hover-lift border border-red-600/30 hover:border-red-500/50 transition-all duration-500">
                    <div class="text-5xl font-bold text-white mb-3 group-hover:scale-110 transition-transform duration-300">15+</div>
                    <div class="text-red-300 font-medium text-lg">Pembina Ahli</div>
                    <div class="text-slate-400 text-sm mt-1">Tenaga Profesional</div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="grid lg:grid-cols-2 gap-16 items-center py-16">
                <!-- Left Content -->
                <div class="space-y-8 animate-slide-up">
                    <div class="space-y-6">
                        <h2 class="text-5xl font-bold text-white mb-6">
                            Visi & <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-400">Misi</span>
                        </h2>
                        <div class="space-y-6 text-slate-200">
                            <p class="text-lg leading-relaxed font-light">
                                Menciptakan lingkungan pendidikan yang mendukung pengembangan potensi siswa melalui kegiatan ekstrakurikuler yang inovatif, berkelanjutan, dan berkualitas tinggi dengan standar internasional.
                            </p>
                            <div class="space-y-4">
                                <div class="flex items-start space-x-4">
                                    <div class="w-3 h-3 bg-gradient-to-r from-orange-400 to-red-400 rounded-full mt-2 flex-shrink-0"></div>
                                    <p class="text-base text-slate-300">Mengembangkan bakat dan minat siswa secara optimal melalui program yang terstruktur</p>
                                </div>
                                <div class="flex items-start space-x-4">
                                    <div class="w-3 h-3 bg-gradient-to-r from-red-400 to-orange-400 rounded-full mt-2 flex-shrink-0"></div>
                                    <p class="text-base text-slate-300">Membentuk karakter kepemimpinan, tanggung jawab, dan jiwa kompetitif yang sehat</p>
                                </div>
                                <div class="flex items-start space-x-4">
                                    <div class="w-3 h-3 bg-gradient-to-r from-orange-500 to-red-500 rounded-full mt-2 flex-shrink-0"></div>
                                    <p class="text-base text-slate-300">Meningkatkan prestasi non-akademik hingga tingkat nasional dan internasional</p>
                                </div>
                                <div class="flex items-start space-x-4">
                                    <div class="w-3 h-3 bg-gradient-to-r from-red-500 to-orange-500 rounded-full mt-2 flex-shrink-0"></div>
                                    <p class="text-base text-slate-300">Membangun networking dan kerjasama dengan institusi pendidikan lainnya</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <!-- Right Content -->
                <div class="relative animate-slide-in">
                    <div class="relative group hover-lift">
                        <div class="absolute -inset-1 bg-gradient-to-r from-orange-500 via-red-500 to-orange-600 rounded-3xl blur opacity-30 group-hover:opacity-50 transition duration-1000 animate-glow"></div>
                        <div class="relative bg-gradient-to-br from-slate-800/90 to-slate-900/90 backdrop-blur-xl rounded-3xl p-10 space-y-8 border border-orange-500/20">
                            <div class="text-center">
                                <h3 class="text-3xl font-bold text-white mb-6">Fasilitas Unggulan</h3>
                                <div class="w-20 h-1 bg-gradient-to-r from-orange-400 to-red-400 mx-auto mb-8"></div>
                            </div>
                            <div class="grid grid-cols-2 gap-6">
                                <div class="flex items-center space-x-4 text-slate-300 hover:text-white transition-colors duration-300 p-3 rounded-xl hover:bg-orange-600/10">
                                    <i class="fas fa-music text-2xl text-orange-400"></i>
                                    <span class="font-medium">Studio Musik</span>
                                </div>
                                <div class="flex items-center space-x-4 text-slate-300 hover:text-white transition-colors duration-300 p-3 rounded-xl hover:bg-orange-600/10">
                                    <i class="fas fa-football-ball text-2xl text-red-400"></i>
                                    <span class="font-medium">Lapangan Olahraga</span>
                                </div>
                                <div class="flex items-center space-x-4 text-slate-300 hover:text-white transition-colors duration-300 p-3 rounded-xl hover:bg-orange-600/10">
                                    <i class="fas fa-paint-brush text-2xl text-orange-500"></i>
                                    <span class="font-medium">Ruang Seni</span>
                                </div>
                                <div class="flex items-center space-x-4 text-slate-300 hover:text-white transition-colors duration-300 p-3 rounded-xl hover:bg-orange-600/10">
                                    <i class="fas fa-microscope text-2xl text-red-500"></i>
                                    <span class="font-medium">Lab Penelitian</span>
                                </div>
                                <div class="flex items-center space-x-4 text-slate-300 hover:text-white transition-colors duration-300 p-3 rounded-xl hover:bg-orange-600/10">
                                    <i class="fas fa-camera text-2xl text-orange-400"></i>
                                    <span class="font-medium">Studio Fotografi</span>
                                </div>
                                <div class="flex items-center space-x-4 text-slate-300 hover:text-white transition-colors duration-300 p-3 rounded-xl hover:bg-orange-600/10">
                                    <i class="fas fa-code text-2xl text-red-400"></i>
                                    <span class="font-medium">Lab Komputer</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wave Bottom -->
        <div class="absolute bottom-0 left-0 w-full">
            <svg viewBox="0 0 1200 120" class="w-full h-20 fill-slate-800">
                <path d="M0,60 Q300,120 600,60 T1200,60 L1200,120 L0,120 Z"></path>
            </svg>
        </div>
    </section>

    <!-- Team Section -->
    <section class="bg-slate-800 py-24">
        <div class="container mx-auto px-4">
            <div class="text-center mb-20">
                <h2 class="text-5xl md:text-6xl font-bold text-white mb-6">
                    Tim <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-400">Pembina</span>
                </h2>
                <p class="text-xl text-slate-400 max-w-2xl mx-auto">
                    Tenaga profesional berpengalaman yang mendedikasikan hidupnya untuk pendidikan berkualitas
                </p>
                <div class="w-24 h-1 bg-gradient-to-r from-orange-400 to-red-400 mx-auto mt-6"></div>
            </div>
            
            <div class="grid md:grid-cols-3 gap-10">
                <!-- Pembina Card 1 -->
                <div class="group bg-gradient-to-br from-slate-700/50 to-slate-800/50 backdrop-blur-xl rounded-2xl p-8 text-center hover-lift border border-orange-500/20 hover:border-orange-400/40 transition-all duration-500">
                    <div class="relative mb-8">
                        <div class="w-32 h-32 mx-auto rounded-full bg-gradient-to-br from-orange-500 to-red-600 p-1 group-hover:animate-bounce shadow-xl">
                            <div class="w-full h-full rounded-full bg-slate-800 flex items-center justify-center">
                                <i class="fas fa-user-tie text-4xl text-orange-400"></i>
                            </div>
                        </div>
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-8 h-8 bg-gradient-to-br from-orange-400 to-red-400 rounded-full flex items-center justify-center">
                            <i class="fas fa-crown text-white text-sm"></i>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-3">Drs. Ahmad Wijaya</h3>
                    <p class="text-orange-400 mb-4 font-semibold">Kepala Pembina</p>
                    <p class="text-slate-400 leading-relaxed mb-6">15+ tahun pengalaman dalam pembinaan ekstrakurikuler dan pengembangan karakter siswa dengan dedikasi tinggi</p>
                    <div class="flex justify-center space-x-4">
                        <div class="w-2 h-2 bg-orange-400 rounded-full"></div>
                        <div class="w-2 h-2 bg-red-400 rounded-full"></div>
                        <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                    </div>
                </div>

                <!-- Pembina Card 2 -->
                <div class="group bg-gradient-to-br from-slate-700/50 to-slate-800/50 backdrop-blur-xl rounded-2xl p-8 text-center hover-lift border border-red-500/20 hover:border-red-400/40 transition-all duration-500">
                    <div class="relative mb-8">
                        <div class="w-32 h-32 mx-auto rounded-full bg-gradient-to-br from-red-500 to-orange-600 p-1 group-hover:animate-bounce shadow-xl">
                            <div class="w-full h-full rounded-full bg-slate-800 flex items-center justify-center">
                                <i class="fas fa-user-graduate text-4xl text-red-400"></i>
                            </div>
                        </div>
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-8 h-8 bg-gradient-to-br from-red-400 to-orange-400 rounded-full flex items-center justify-center">
                            <i class="fas fa-star text-white text-sm"></i>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-3">Siti Nurhaliza, S.Pd</h3>
                    <p class="text-red-400 mb-4 font-semibold">Koordinator Seni & Budaya</p>
                    <p class="text-slate-400 leading-relaxed mb-6">Spesialis dalam pengembangan bakat seni dan budaya dengan prestasi tingkat nasional dalam berbagai kompetisi</p>
                    <div class="flex justify-center space-x-4">
                        <div class="w-2 h-2 bg-red-400 rounded-full"></div>
                        <div class="w-2 h-2 bg-orange-400 rounded-full"></div>
                        <div class="w-2 h-2 bg-red-500 rounded-full"></div>
                    </div>
                </div>

                <!-- Pembina Card 3 -->
                <div class="group bg-gradient-to-br from-slate-700/50 to-slate-800/50 backdrop-blur-xl rounded-2xl p-8 text-center hover-lift border border-orange-600/20 hover:border-orange-500/40 transition-all duration-500">
                    <div class="relative mb-8">
                        <div class="w-32 h-32 mx-auto rounded-full bg-gradient-to-br from-orange-600 to-red-500 p-1 group-hover:animate-bounce shadow-xl">
                            <div class="w-full h-full rounded-full bg-slate-800 flex items-center justify-center">
                                <i class="fas fa-chalkboard-teacher text-4xl text-orange-400"></i>
                            </div>
                        </div>
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x
                        -1/2 w-8 h-8 bg-gradient-to-br from-orange-400 to-red-400 rounded-full flex items-center justify-center">
                            <i class="fas fa-medal text-white text-sm"></i>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-3">Budi Santoso, M.Kom</h3>
                    <p class="text-orange-400 mb-4 font-semibold">Koordinator Teknologi
                    </p>
                    <p class="text-slate-400 leading-relaxed mb-6">Ahli di bidang teknologi informasi dengan pengalaman mengelola lab komputer dan program coding untuk siswa</p>
                    <div class="flex justify-center space-x-4">
                        <div class="w-2 h-2 bg-orange-400 rounded-full"></div>
                        <div class="w-2 h-2 bg-red-400 rounded-full"></div>
                        <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

     <!-- Footer -->
    <footer class="bg-slate-950 py-12 relative">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8 text-slate-400">
                <div>
                    <h4 class="text-white font-bold mb-4">SMKN 13 Bandung</h4>
                    <p class="text-sm">
                        Jl. Soekarno-Hatta KM.10 <br>
                        Bandung, Jawa Barat 40286
                    </p>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-4">Links</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-orange-400">Home</a></li>
                        <li><a href="#" class="hover:text-orange-400">About Us</a></li>
                        <li><a href="#" class="hover:text-orange-400">Services</a></li>
                        <li><a href="#" class="hover:text-orange-400">Contact</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-4">Contact</h4>
                    <ul class="space-y-2 text-sm">
                        <li><i class="fas fa-phone mr-2"></i> (022) 7318960</li>
                        <li><i class="fas fa-envelope mr-2"></i> info@smkn13bdg.sch.id</li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-orange-500 transition-colors duration-300">
                            <i class="fab fa-facebook-f text-white"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-orange-500 transition-colors duration-300">
                            <i class="fab fa-twitter text-white"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-orange-500 transition-colors duration-300">
                            <i class="fab fa-instagram text-white"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-slate-800 mt-12 pt-8 text-center text-sm text-slate-500">
                <p>&copy; 2025 SMKN 13 Bandung. All rights reserved.</p>
            </div>
        </div>
    </footer>
</body>
</html>

  