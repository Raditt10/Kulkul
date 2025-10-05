<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services - Kulkul SMKN 13 BANDUNG</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <!-- Tailwind & custom -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/main.js') }}"></script>

    <!-- Tailwind custom config -->
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
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- SwiperJS CSS (buat slider) -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css"/>
    <script src="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.js"></script>
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
                    <a href="{{ route('about') }}" class="group flex items-center text-slate-300 hover:text-white font-medium transition-all duration-300 hover-lift">
                        <i class="fas fa-info-circle mr-2 group-hover:animate-pulse text-orange-400"></i>
                        <span class="relative">
                            TENTANG KAMI
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-orange-400 transition-all duration-300 group-hover:w-full"></span>
                        </span>
                    </a>    
                    <a href="#" class="group flex items-center text-white font-medium transition-all duration-300 hover-lift">
                        <i class="fas fa-cogs mr-2 group-hover:animate-spin text-orange-400"></i>
                        <span class="relative">
                            LAYANAN
                            <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-orange-400"></span>
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
                    Layanan <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-400">Ekstrakurikuler</span>
                </h1>
                <p class="text-xl text-slate-300 max-w-3xl mx-auto leading-relaxed">
                    Jelajahi berbagai program layanan ekstrakurikuler yang dirancang untuk mengasah bakat dan potensi siswa SMKN 13 Bandung
                </p>
            </div>

            <!-- Stats Cards -->
            <div class="grid md:grid-cols-4 gap-6 mb-20">
                <div class="group bg-gradient-to-br from-orange-900/30 to-red-900/30 backdrop-blur-xl rounded-2xl p-8 text-center hover-lift border border-orange-500/30 hover:border-orange-400/50 transition-all duration-500">
                    <div class="text-5xl font-bold text-white mb-3 group-hover:scale-110 transition-transform duration-300">8</div>
                    <div class="text-orange-300 font-medium text-lg">Kategori Layanan</div>
                    <div class="text-slate-400 text-sm mt-1">Beragam Pilihan</div>
                </div>
                <div class="group bg-gradient-to-br from-red-900/30 to-orange-900/30 backdrop-blur-xl rounded-2xl p-8 text-center hover-lift border border-red-500/30 hover:border-red-400/50 transition-all duration-500">
                    <div class="text-5xl font-bold text-white mb-3 group-hover:scale-110 transition-transform duration-300">25+</div>
                    <div class="text-red-300 font-medium text-lg">Program Aktif</div>
                    <div class="text-slate-400 text-sm mt-1">Kegiatan Rutin</div>
                </div>
                <div class="group bg-gradient-to-br from-orange-800/30 to-red-800/30 backdrop-blur-xl rounded-2xl p-8 text-center hover-lift border border-orange-600/30 hover:border-orange-500/50 transition-all duration-500">
                    <div class="text-5xl font-bold text-white mb-3 group-hover:scale-110 transition-transform duration-300">1000+</div>
                    <div class="text-orange-300 font-medium text-lg">Siswa Terlibat</div>
                    <div class="text-slate-400 text-sm mt-1">Partisipasi Maksimal</div>
                </div>
                <div class="group bg-gradient-to-br from-red-800/30 to-orange-800/30 backdrop-blur-xl rounded-2xl p-8 text-center hover-lift border border-red-600/30 hover:border-red-500/50 transition-all duration-500">
                    <div class="text-5xl font-bold text-white mb-3 group-hover:scale-110 transition-transform duration-300">Gratis</div>
                    <div class="text-red-300 font-medium text-lg">Akses Layanan</div>
                    <div class="text-slate-400 text-sm mt-1">Tanpa Biaya Tambahan</div>
                </div>
            </div>

            <!-- Main Content -->
            <div class="grid lg:grid-cols-2 gap-16 items-center py-16">
                <!-- Left Content -->
                <div class="space-y-8 animate-slide-up">
                    <div class="space-y-6">
                        <h2 class="text-5xl font-bold text-white mb-6">
                            Manfaat <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-400">Layanan</span>
                        </h2>
                        <div class="space-y-6 text-slate-200">
                            <p class="text-lg leading-relaxed font-light">
                                Program ekstrakurikuler kami dirancang untuk mendukung pengembangan holistik siswa, mulai dari keterampilan teknis hingga soft skills yang esensial untuk masa depan.
                            </p>
                            <div class="space-y-4">
                                <div class="flex items-start space-x-4">
                                    <div class="w-3 h-3 bg-gradient-to-r from-orange-400 to-red-400 rounded-full mt-2 flex-shrink-0"></div>
                                    <p class="text-base text-slate-300">Pengembangan bakat individu melalui kegiatan yang sesuai minat</p>
                                </div>
                                <div class="flex items-start space-x-4">
                                    <div class="w-3 h-3 bg-gradient-to-r from-red-400 to-orange-400 rounded-full mt-2 flex-shrink-0"></div>
                                    <p class="text-base text-slate-300">Peningkatan prestasi akademik melalui keseimbangan kegiatan non-akademik</p>
                                </div>
                                <div class="flex items-start space-x-4">
                                    <div class="w-3 h-3 bg-gradient-to-r from-orange-500 to-red-500 rounded-full mt-2 flex-shrink-0"></div>
                                    <p class="text-base text-slate-300">Pengembangan keterampilan sosial dan kepemimpinan</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div>
                        <a href="#" class="inline-block bg-gradient-to-r from-orange-500 to-red-500 text-white font-semibold px-6 py-3 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover-lift">
                            Jelajahi Layanan
                        </a>
                    </div>
               </div>

                    <!-- Right Content -->
                        <div class="relative animate-slide-in">
                        <!-- Swiper Container -->
                        <div class="swiper mySwiper w-full h-96 rounded-3xl shadow-2xl overflow-hidden border border-orange-400/30">
                            <div class="swiper-wrapper">

                            <!-- Slide 1 -->
                            <div class="swiper-slide relative group">
                                <img src="{{ asset('images/eskul.jpg') }}" alt="Olahraga"
                                    class="w-full h-full object-cover filter brightness-75 transition-transform duration-500 group-hover:scale-110">
                                <!-- Overlay Info -->
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent 
                                            flex flex-col justify-end items-center text-center 
                                            opacity-0 group-hover:opacity-100 transition-opacity duration-500 p-6">
                                <h3 class="text-white text-xl font-bold mb-2">Ekstrakurikuler Olahraga</h3>
                                <p class="text-slate-200 text-sm">Tingkatkan kesehatan & kerja sama tim lewat olahraga seru.</p>
                                </div>
                            </div>

                            <!-- Slide 2 -->
                            <div class="swiper-slide relative group">
                                <img src="{{ asset('images/eskul.jpg') }}" alt="Seni"
                                    class="w-full h-full object-cover filter brightness-75 transition-transform duration-500 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent 
                                            flex flex-col justify-end items-center text-center 
                                            opacity-0 group-hover:opacity-100 transition-opacity duration-500 p-6">
                                <h3 class="text-white text-xl font-bold mb-2">Ekstrakurikuler Seni</h3>
                                <p class="text-slate-200 text-sm">Kembangkan kreativitas lewat musik, tari, dan teater.</p>
                                </div>
                            </div>

                            <!-- Slide 3 -->
                            <div class="swiper-slide relative group">
                                <img src="{{ asset('images/eskul.jpg') }}" alt="Teknologi"
                                    class="w-full h-full object-cover filter brightness-75 transition-transform duration-500 group-hover:scale-110">
                                <div class="absolute inset-0 bg-gradient-to-t from-black/70 via-black/40 to-transparent 
                                            flex flex-col justify-end items-center text-center 
                                            opacity-0 group-hover:opacity-100 transition-opacity duration-500 p-6">
                                <h3 class="text-white text-xl font-bold mb-2">Ekstrakurikuler Teknologi</h3>
                                <p class="text-slate-200 text-sm">Belajar coding, robotik, & inovasi digital.</p>
                                </div>
                            </div>

                            </div>

                            <!-- Pagination -->
                            <div class="swiper-pagination !bottom-3"></div>
                            <!-- Navigation -->
                            <div class="swiper-button-prev !text-orange-400"></div>
                            <div class="swiper-button-next !text-orange-400"></div>
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

    <script>
  const swiper = new Swiper('.mySwiper', {
    effect: 'coverflow',
    grabCursor: true,
    centeredSlides: true,
    loop: true,
    slidesPerView: 'auto',
    coverflowEffect: {
      rotate: 20,
      stretch: 0,
      depth: 200,
      modifier: 1,
      slideShadows: false,
    },
    autoplay: {
      delay: 3500,
      disableOnInteraction: false,
    },
    pagination: {
      el: '.swiper-pagination',
      clickable: true,
      bulletClass: 'swiper-pagination-bullet bg-orange-400 w-3 h-3 rounded-full opacity-50',
      bulletActiveClass: 'opacity-100 scale-125',
    },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
  });
</script>
</body>
</html>
