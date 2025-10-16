<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Services Kulkul</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <!-- Tailwind & custom -->
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="{{ asset('js/main.js') }}"></script>
    <style href="{{ asset('css/sidebarscroll.css') }}"></style>

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

   @include('user/includes.navbar')
  
   @include('user/includes.sidebar')

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
                        <a href="{{ route('services') }}" class="inline-block bg-gradient-to-r from-orange-500 to-red-500 text-white font-semibold px-6 py-3 rounded-full shadow-lg hover:shadow-xl transition-all duration-300 hover-lift">
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
   
    @include('user/includes.footer')

    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/swipperImage.js') }}"></script>
</body>
</html>
