<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home Kulkul</title>
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
                    'fade-in': 'fadeIn 1s ease-out'
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
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
</head>
<body class="bg-slate-950 overflow-x-hidden">
    
    @include('user/includes.navbar')
  
    @include('user/includes.sidebar')

    <!-- Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/60 opacity-0 pointer-events-none transition-opacity duration-500 z-40"></div>

    <!-- Hero Section -->
     <section class="relative pt-24 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-24">
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
            <div class="grid lg:grid-cols-2 gap-16 items-center min-h-[80vh]">
                <div class="space-y-8 animate-slide-up">
                    <div class="space-y-4">
                        <div class="flex items-center justify-center mb-6">
                            <div class="w-20 h-1 bg-gradient-to-r from-orange-500 to-red-500 mr-4"></div>
                            <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-full flex items-center justify-center shadow-xl">
                                <img src="{{ asset('images/logo.png') }}" alt="Logo SMKN 13 Bandung" class="w-10 h-10 object-contain transform transition-transform hover:scale-110 duration-300 filter drop-shadow-lg">
                            </div>
                            <div class="w-20 h-1 bg-gradient-to-r from-red-500 to-orange-500 ml-4"></div>
                        </div>
                        <h1 class="text-6xl md:text-7xl font-bold text-white mb-6 tracking-tight">
                            Selamat Datang di <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-400">Kulkul</span>
                        </h1>
                        <p class="text-xl text-slate-300 leading-relaxed font-light">
                            Temukan passion sejatimu melalui berbagai ekstrakurikuler yang menantang dan menyenangkan di SMKN 13 Bandung!
                        </p>
                    </div>
                    
                    <div class="space-y-4 text-slate-200">
                        <p class="text-lg leading-relaxed font-light">
                            Sed tristique quis sapien eget posuere. Vivamus vitae felis a orci vulputate ullamcorper. Pellentesque habitant morbi tristique senectus et netus et malesuada fames ac turpis egestas.
                        </p>
                        
                        <p class="text-lg leading-relaxed font-light">
                            Aenean in tortor nec tellus dictum volutpat varius at turpis. Morbi ornare diam sed rutrum congue. Praesent eget efficitur felis.
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-4 pt-8">
                        <button class="px-8 py-4 bg-gradient-to-r from-orange-500 to-red-600 text-white font-bold rounded-full hover-lift hover:from-orange-400 hover:to-red-500 transition-all duration-300 animate-glow shadow-2xl">
                            <i class="fas fa-rocket mr-2"></i>
                            Explore Now!
                        </button>
                        <button class="px-8 py-4 glass-effect text-white font-bold rounded-full hover-lift border border-orange-500/50 hover:border-orange-400 transition-all duration-300">
                            <i class="fas fa-play mr-2"></i>
                            Watch Video
                        </button>
                    </div>
                </div>

                <div class="relative animate-slide-in">
                    <div class="relative group hover-lift">
                        <div class="absolute -inset-1 bg-gradient-to-r from-orange-500 via-red-500 to-orange-600 rounded-3xl blur opacity-30 group-hover:opacity-50 transition duration-1000 animate-glow"></div>
                        <div class="relative bg-gradient-to-br from-slate-800/90 to-slate-900/90 backdrop-blur-xl rounded-3xl p-10 space-y-8 border border-orange-500/20 shadow-2xl overflow-hidden">
                            <!-- Header Badge -->
                            <div class="absolute top-6 left-6 z-10">
                                <div class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-4 py-2 rounded-full text-sm font-bold animate-pulse-slow">
                                    <i class="fas fa-star mr-2"></i>
                                    SMKN 13 BANDUNG
                                </div>
                            </div>
            
                        <div class="relative rounded-2xl overflow-hidden group mb-6">
                         <div 
                            class="aspect-video bg-cover bg-center flex items-center justify-center" 
                            style="background-image: url('{{ asset('images/eskul.jpg') }}');">
                            
                            <div class="absolute inset-0 bg-black/50"></div>

                            <!-- Konten -->
                            <div class="relative text-center text-white z-10">
                            <i class="fas fa-users text-6xl mb-4 animate-bounce-slow"></i>
                            <h3 class="text-2xl font-bold">
                                <span
                                id="rotating-title"
                                class="inline-block transition-opacity duration-500"
                                aria-live="polite"
                                aria-atomic="true"
                                >
                                Berdaya suai
                                </span>
                            </h3>
                            </div>
                        </div>
                        </div>


                            <div class="absolute inset-0 bg-black/20 group-hover:bg-black/10 transition-colors duration-300"></div>

                            <div class="absolute bottom-4 left-4 right-4">
                                <div class="glass-effect rounded-lg p-3 bg-slate-900/50">
                                <div class="flex items-center justify-between text-white text-sm">
                                    <span><i class="fas fa-eye mr-1"></i> 1.2K views</span>
                                    <span><i class="fas fa-heart mr-1 text-red-400"></i> 89 likes</span>
                                </div>
                                </div>
                            </div>
                            </div>
                            
                            <!-- Content -->
                            <div class="text-center space-y-4">
                                <h3 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-400">
                                    WELCOME, USER!
                                </h3>
                                <p class="text-slate-300 leading-relaxed">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Aliquam placerat ante nibh, 
                                    quis vulputate magna malesuada ut. Sed cursus ante dapibus elit consectetur.
                                </p>
                                
                                <!-- Stats -->
                                <div class="grid grid-cols-3 gap-4 pt-4">
                                    <div class="text-center">
                                        <div class="text-2xl font-bold text-orange-400">23</div>
                                        <div class="text-xs text-slate-400">Ekstrakurikuler</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-2xl font-bold text-red-400">500+</div>
                                        <div class="text-xs text-slate-400">Siswa Aktif</div>
                                    </div>
                                    <div class="text-center">
                                        <div class="text-2xl font-bold text-yellow-400">100%</div>
                                        <div class="text-xs text-slate-400">Kepuasan</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

       <!-- Wave Bottom for Hero Section -->
        <div class="absolute -bottom-1 left-0 w-full overflow-hidden">
            <svg class="relative block w-full h-[100px]" viewBox="0 0 1440 120" preserveAspectRatio="none">
                <defs>
                    <linearGradient id="wave-gradient" gradientTransform="rotate(90)">
                        <stop offset="0%" stop-color="#0f172a"/>
                        <stop offset="100%" stop-color="#1e293b"/>
                    </linearGradient>
                </defs>
                <path 
                    d="M0,96L34.3,85.3C68.6,75,137,53,206,48C274.3,43,343,53,411,58.7C480,64,549,64,617,69.3C685.7,75,754,85,823,90.7C891.4,96,960,96,1029,90.7C1097.1,85,1166,75,1234,69.3C1302.9,64,1371,64,1406,64L1440,64L1440,120L1405.7,120C1371.4,120,1303,120,1234,120C1165.7,120,1097,120,1029,120C960,120,891,120,823,120C754.3,120,686,120,617,120C548.6,120,480,120,411,120C342.9,120,274,120,206,120C137.1,120,69,120,34,120L0,120Z"
                    fill="url(#wave-gradient)"
                    class="transition-all duration-300 ease-in-out"
                >
                    <animate
                        attributeName="d"
                        dur="5s" dowidnp
                        repeatCount="indefinite"
                        values="
                            M0,96L34.3,85.3C68.6,75,137,53,206,48C274.3,43,343,53,411,58.7C480,64,549,64,617,69.3C685.7,75,754,85,823,90.7C891.4,96,960,96,1029,90.7C1097.1,85,1166,75,1234,69.3C1302.9,64,1371,64,1406,64L1440,64L1440,120L1405.7,120C1371.4,120,1303,120,1234,120C1165.7,120,1097,120,1029,120C960,120,891,120,823,120C754.3,120,686,120,617,120C548.6,120,480,120,411,120C342.9,120,274,120,206,120C137.1,120,69,120,34,120L0,120Z;
                            M0,96L34.3,90.7C68.6,85,137,75,206,69.3C274.3,64,343,64,411,69.3C480,75,549,85,617,90.7C685.7,96,754,96,823,90.7C891.4,85,960,75,1029,69.3C1097.1,64,1166,64,1234,69.3C1302.9,75,1371,85,1406,90.7L1440,96L1440,120L1405.7,120C1371.4,120,1303,120,1234,120C1165.7,120,1097,120,1029,120C960,120,891,120,823,120C754.3,120,686,120,617,120C548.6,120,480,120,411,120C342.9,120,274,120,206,120C137.1,120,69,120,34,120L0,120Z;
                            M0,96L34.3,85.3C68.6,75,137,53,206,48C274.3,43,343,53,411,58.7C480,64,549,64,617,69.3C685.7,75,754,85,823,90.7C891.4,96,960,96,1029,90.7C1097.1,85,1166,75,1234,69.3C1302.9,64,1371,64,1406,64L1440,64L1440,120L1405.7,120C1371.4,120,1303,120,1234,120C1165.7,120,1097,120,1029,120C960,120,891,120,823,120C754.3,120,686,120,617,120C548.6,120,480,120,411,120C342.9,120,274,120,206,120C137.1,120,69,120,34,120L0,120Z"
                    />
                </path>
            </svg>
        </div>
        </section>

        <!-- Features Section -->
        <section class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-24">
                <div class="container mx-auto px-4">
                    <div class="text-center max-w-3xl mx-auto mb-16">
                        <h2 class="text-4xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-400 mb-6">
                            Kenapa Memilih Kulkul?
                        </h2>
                            <p class="text-slate-300 text-lg">
                                Temukan berbagai keunggulan dan manfaat yang akan kamu dapatkan di program ekstrakurikuler SMKN 13 Bandung
                            </p>
                        </div>

            <!-- Feature Cards -->
            <div class="grid md:grid-cols-3 gap-8 mb-16">
                <!-- Feature 1 -->
                <div class="group hover-lift">
                    <div class="relative">
                        <div class="absolute -inset-1 bg-gradient-to-r from-orange-500 to-red-500 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-1000"></div>
                        <div class="relative bg-slate-800 border border-orange-500/20 p-8 rounded-2xl">
                            <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-red-500 rounded-xl flex items-center justify-center mb-6">
                                <i class="fas fa-award text-white text-xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-4">Prestasi Unggul</h3>
                            <p class="text-slate-300">
                                Raih berbagai prestasi di tingkat regional hingga nasional melalui program ekstrakurikuler yang terstruktur.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="group hover-lift">
                    <div class="relative">
                        <div class="absolute -inset-1 bg-gradient-to-r from-orange-500 to-red-500 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-1000"></div>
                        <div class="relative bg-slate-800 border border-orange-500/20 p-8 rounded-2xl">
                            <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-red-500 rounded-xl flex items-center justify-center mb-6">
                                <i class="fas fa-users text-white text-xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-4">Pembina Profesional</h3>
                            <p class="text-slate-300">
                                Dibimbing oleh para pembina berpengalaman yang siap mengembangkan potensimu.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="group hover-lift">
                    <div class="relative">
                        <div class="absolute -inset-1 bg-gradient-to-r from-orange-500 to-red-500 rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-1000"></div>
                        <div class="relative bg-slate-800 border border-orange-500/20 p-8 rounded-2xl">
                            <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-red-500 rounded-xl flex items-center justify-center mb-6">
                                <i class="fas fa-rocket text-white text-xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-4">Fasilitas Lengkap</h3>
                            <p class="text-slate-300">
                                Didukung fasilitas modern dan lengkap untuk menunjang kegiatan ekstrakurikuler.
                            </p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="max-w-4xl mx-auto text-center">
                <div class="relative group hover-lift">
                    <div class="absolute -inset-1 bg-gradient-to-r from-orange-500 via-red-500 to-orange-500 rounded-3xl blur opacity-25 group-hover:opacity-50 transition duration-1000"></div>
                    <div class="relative bg-slate-800/80 backdrop-blur-xl border border-orange-500/20 p-8 md:p-12 rounded-3xl">
                        <h3 class="text-3xl font-bold text-white mb-6">Siap Bergabung dengan Kami?</h3>
                        <p class="text-slate-300 mb-8 max-w-2xl mx-auto">
                            Jangan lewatkan kesempatan untuk mengembangkan bakatmu dan menjadi bagian dari prestasi SMKN 13 Bandung!
                        </p>
                        <button class="px-8 py-4 bg-gradient-to-r from-orange-500 to-red-600 text-white font-bold rounded-full hover-lift hover:from-orange-400 hover:to-red-500 transition-all duration-300">
                            <i class="fas fa-paper-plane mr-2"></i>
                            Daftar Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wave Top -->
            <div class="absolute -top-1 left-0 w-full overflow-hidden pointer-events-none">
                <svg viewBox="0 0 1200 120" class="w-full h-20 fill-slate-950">
                    <path d="M0,60 Q300,120 600,60 T1200,60 L1200,0 L0,0 Z"></path>
                </svg>
            </div>

    </section>

     @include('user/includes.footer')

    <script src="{{ asset('js/overllayImagePage.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html> 