<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Ekstrakurikuler Kulkul</title>
<link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
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
                        '0%, 100%': {
                            transform: 'translateY(0px)'
                        },
                        '50%': {
                            transform: 'translateY(-20px)'
                        }
                    },
                    glow: {
                        '0%': {
                            boxShadow: '0 0 20px rgba(251, 146, 60, 0.4)'
                        },
                        '100%': {
                            boxShadow: '0 0 40px rgba(251, 146, 60, 0.8)'
                        }
                    },
                    slideUp: {
                        '0%': {
                            transform: 'translateY(100px)',
                            opacity: '0'
                        },
                        '100%': {
                            transform: 'translateY(0)',
                            opacity: '1'
                        }
                    }
                }
            }
        }
    }
</script>
<style href="{{ asset('css/sidebarscroll.css') }}"></style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<style>
    .hover-lift {
        transition: all 0.3s ease;
    }

    .hover-lift:hover {
        transform: translateY(-8px);
    }

    .glass-effect {
        backdrop-filter: blur(16px);
    }
    @keyframes bounce-slow {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-4px); }
    }
    .animate-bounce-slow {
    animation: bounce-slow 2s infinite;
    }

    /* Hover tombol scale */
    .group:hover .relative {
    transform: scale(1.05);
    transition: transform 0.3s ease;
    }
</style>
</head>

<body class="bg-slate-950 overflow-x-hidden">

    @include('user/includes.navbar')
  
    @include('user/includes.sidebar')

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 pt-32 pb-20">
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-gradient-to-r from-orange-600/5 via-red-600/5 to-orange-600/5 animate-pulse-slow"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center max-w-4xl mx-auto mb-12 animate-slide-up">
            <div class="flex items-center justify-center mb-6">
                <div class="w-20 h-1 bg-gradient-to-r from-orange-500 to-red-500 mr-4"></div>
                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-full flex items-center justify-center shadow-xl">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo SMKN 13 Bandung" class="w-10 h-10 object-contain filter drop-shadow-lg">
                </div>
                <div class="w-20 h-1 bg-gradient-to-r from-red-500 to-orange-500 ml-4"></div>
            </div>
            <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">
                Daftar <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-400">Ekstrakurikuler</span>
            </h1>
            <p class="text-xl text-slate-300 leading-relaxed">
                Temukan passion-mu dan kembangkan bakat terbaikmu bersama berbagai pilihan ekstrakurikuler di SMKN 13 Bandung
            </p>
       <div class="mt-8 flex flex-wrap justify-center gap-6">
            <a href="{{ route('timeo') }}" 
            class="relative inline-block px-8 py-4 font-bold text-white rounded-full overflow-hidden group shadow-lg">
                <span class="absolute inset-0 bg-gradient-to-r from-orange-500 to-red-600 transition-all duration-500 ease-in-out group-hover:from-red-500 group-hover:to-orange-500"></span>
                <span class="relative flex items-center gap-2">
                    <i class="fas fa-stopwatch animate-bounce-slow"></i>
                    Lihat Jadwal O' Time
                </span>
                <span class="absolute -inset-0.5 rounded-full bg-gradient-to-r from-orange-500 to-red-600 blur opacity-30 group-hover:opacity-50 transition duration-500"></span>
            </a>
         </div>
       </div>
    
        <!-- Filter Section -->
        <div class="flex flex-wrap justify-center gap-4 mb-12">
            <button onclick="filterEskul('all')" class="filter-btn active px-6 py-3 rounded-full font-bold transition-all duration-300 bg-gradient-to-r from-orange-500 to-red-600 text-white">
                <i class="fas fa-th-large mr-2"></i>Semua
            </button>
            <button onclick="filterEskul('olahraga')" class="filter-btn px-6 py-3 rounded-full font-bold transition-all duration-300 bg-slate-800 text-white">
                <i class="fas fa-running mr-2"></i>Olahraga
            </button>
            <button onclick="filterEskul('seni')" class="filter-btn px-6 py-3 rounded-full font-bold transition-all duration-300 bg-slate-800 text-white">
                <i class="fas fa-palette mr-2"></i>Seni & Budaya
            </button>
            <button onclick="filterEskul('akademik')" class="filter-btn px-6 py-3 rounded-full font-bold transition-all duration-300 bg-slate-800 text-white">
                <i class="fas fa-brain mr-2"></i>Akademik
            </button>
            <button onclick="filterEskul('teknologi')" class="filter-btn px-6 py-3 rounded-full font-bold transition-all duration-300 bg-slate-800 text-white">
                <i class="fas fa-laptop-code mr-2"></i>Teknologi
            </button>
        </div>
    </div>
</section>

<!-- Eskul Cards Section -->
<section class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-20">
    <div class="container mx-auto px-4">
        <div id="eskulGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Card will be generated by JavaScript -->
        </div>
    </div>
</section>

  <footer class="bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 relative overflow-hidden">
        <!-- Pattern Background -->
        <div class="absolute inset-0 pattern-dots opacity-30"></div>
        
        <!-- Decorative Elements -->
        <div class="absolute top-0 left-0 w-64 h-64 bg-orange-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-600/10 rounded-full blur-3xl"></div>
        
        <div class="container mx-auto px-4 py-16 relative z-10">
            <!-- Main Footer Content -->
            <div class="grid md:grid-cols-4 gap-12 mb-12">
                
                <!-- SMKN 13 Info -->
                <div class="fade-in-up space-y-4">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg shadow-orange-500/30">
                          <img src="{{ asset('images/logo.png') }}" alt="Logo SMKN 13 Bandung" class="w-12 h-12 object-contain">
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-lg">SMKN 13</h4>
                            <p class="text-orange-400 text-sm">Bandung</p>
                        </div>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        <i class="fas fa-map-marker-alt text-orange-500 mr-2"></i>
                        Jl. Soekarno-Hatta KM.10<br>
                        <span class="ml-6">Bandung, Jawa Barat 40286</span>
                    </p>
                    <p class="text-slate-500 text-xs italic">
                        "Berdaya suai, Kompeten, dan Berahlak Mulia"
                    </p>
                </div>
                
                <!-- Quick Links -->
                <div class="fade-in-up" style="animation-delay: 0.1s;">
                    <h4 class="text-white font-bold mb-6 text-lg flex items-center">
                        <span class="w-1 h-6 bg-gradient-to-b from-orange-500 to-orange-600 rounded-full mr-3"></span>
                        Quick Links
                    </h4>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('home') }}" class="text-slate-400 hover:text-orange-400 transition-colors duration-300 flex items-center group text-sm">
                                <i class="fas fa-chevron-right text-orange-500 mr-2 text-xs transform group-hover:translate-x-1 transition-transform"></i>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}" class="text-slate-400 hover:text-orange-400 transition-colors duration-300 flex items-center group text-sm">
                                <i class="fas fa-chevron-right text-orange-500 mr-2 text-xs transform group-hover:translate-x-1 transition-transform"></i>
                                Tentang Kami
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services') }}" class="text-slate-400 hover:text-orange-400 transition-colors duration-300 flex items-center group text-sm">
                                <i class="fas fa-chevron-right text-orange-500 mr-2 text-xs transform group-hover:translate-x-1 transition-transform"></i>
                                Program Kami 
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div class="fade-in-up" style="animation-delay: 0.2s;">
                    <h4 class="text-white font-bold mb-6 text-lg flex items-center">
                        <span class="w-1 h-6 bg-gradient-to-b from-orange-500 to-orange-600 rounded-full mr-3"></span>
                        Hubungi Kami
                    </h4>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3 group">
                            <div class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center group-hover:bg-orange-500 transition-colors duration-300 flex-shrink-0">
                                <i class="fas fa-phone text-orange-400 group-hover:text-white transition-colors"></i>
                            </div>
                            <div>
                                <p class="text-slate-500 text-xs">Telepon</p>
                                <a href="tel:0227318960" class="text-slate-300 hover:text-orange-400 transition-colors text-sm">(022) 7318960</a>
                            </div>
                        </li>
                        <li class="flex items-start space-x-3 group">
                            <div class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center group-hover:bg-orange-500 transition-colors duration-300 flex-shrink-0">
                                <i class="fas fa-envelope text-orange-400 group-hover:text-white transition-colors"></i>
                            </div>
                            <div>
                                <p class="text-slate-500 text-xs">Email</p>
                                <a href="mailto:info@smkn13bdg.sch.id" class="text-slate-300 hover:text-orange-400 transition-colors text-sm break-all">info@smkn13bdg.sch.id</a>
                            </div>
                        </li>
                        <li class="flex items-start space-x-3 group">
                            <div class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center group-hover:bg-orange-500 transition-colors duration-300 flex-shrink-0">
                                <i class="fas fa-clock text-orange-400 group-hover:text-white transition-colors"></i>
                            </div>
                            <div>
                                <p class="text-slate-500 text-xs">Jam Kerja</p>
                                <p class="text-slate-300 text-sm">Senin - Jumat<br>07:00 - 16:00 WIB</p>
                            </div>
                        </li>
                    </ul>
                </div>
                
                <!-- Social Media & Logo -->
                <div class="fade-in-up" style="animation-delay: 0.3s;">
                    <h4 class="text-white font-bold mb-6 text-lg flex items-center">
                        <span class="w-1 h-6 bg-gradient-to-b from-orange-500 to-orange-600 rounded-full mr-3"></span>
                        Ikuti Kami
                    </h4>
                    <div class="flex flex-wrap gap-3 mb-8">
                        <a href="#" class="w-12 h-12 bg-slate-800 rounded-xl flex items-center justify-center hover:bg-gradient-to-br hover:from-blue-600 hover:to-blue-700 transition-all duration-300 hover-lift group">
                            <i class="fab fa-facebook-f text-slate-400 group-hover:text-white transition-colors"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-slate-800 rounded-xl flex items-center justify-center hover:bg-gradient-to-br hover:from-sky-500 hover:to-sky-600 transition-all duration-300 hover-lift group">
                            <i class="fab fa-twitter text-slate-400 group-hover:text-white transition-colors"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-slate-800 rounded-xl flex items-center justify-center hover:bg-gradient-to-br hover:from-pink-600 hover:to-rose-600 transition-all duration-300 hover-lift group">
                            <i class="fab fa-instagram text-slate-400 group-hover:text-white transition-colors"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-slate-800 rounded-xl flex items-center justify-center hover:bg-gradient-to-br hover:from-red-600 hover:to-red-700 transition-all duration-300 hover-lift group">
                            <i class="fab fa-youtube text-slate-400 group-hover:text-white transition-colors"></i>
                        </a>
                    </div>
                    
                    <!-- School Logo -->
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset('images/logo2.png') }}" alt="Logo SMKN 13 Bandung" class="w-100 h-100 object-contain flex-shrink-0">
                    </div>
                </div>
                
            </div>
            
            <!-- Bottom Bar -->
            <div class="border-t border-slate-800/50 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <p class="text-slate-500 text-sm">
                        &copy; 2025 <span class="text-orange-400 font-semibold">SMKN 13 Bandung</span>. All rights reserved.
                    </p>
                    <div class="flex items-center space-x-6 text-sm">
                        <a href="#" class="text-slate-500 hover:text-orange-400 transition-colors duration-300">Privacy Policy</a>
                        <span class="text-slate-700">|</span>
                        <a href="#" class="text-slate-500 hover:text-orange-400 transition-colors duration-300">Terms of Service</a>
                        <span class="text-slate-700">|</span>
                        <a href="#" class="text-slate-500 hover:text-orange-400 transition-colors duration-300">Sitemap</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>


  <script src="{{ asset('js/sidebar.js') }}"></script>
  <script src="{{ asset('js/dataEkstrakurikuler.js') }}"></script>
</body>
</html> 