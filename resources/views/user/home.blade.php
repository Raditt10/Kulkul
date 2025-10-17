<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <title>Home Kulkul</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @keyframes float {
            0%, 100% { transform: translateY(0px); }
            50% { transform: translateY(-20px); }
        }
        @keyframes glow {
            0% { box-shadow: 0 0 20px rgba(251, 146, 60, 0.4); }
            100% { box-shadow: 0 0 40px rgba(251, 146, 60, 0.8), 0 0 60px rgba(234, 88, 12, 0.3); }
        }
        @keyframes pulse-slow {
            0%, 100% { opacity: 1; }
            50% { opacity: 0.5; }
        }
        @keyframes slideUp {
            0% { transform: translateY(100px); opacity: 0; }
            100% { transform: translateY(0); opacity: 1; }
        }
        @keyframes slideIn {
            0% { transform: translateX(100px); opacity: 0; }
            100% { transform: translateX(0); opacity: 1; }
        }
        @keyframes shimmer {
            0% { background-position: -1000px 0; }
            100% { background-position: 1000px 0; }
        }
        @keyframes bounce-slow {
            0%, 100% { transform: translateY(0); }
            50% { transform: translateY(-10px); }
        }
        .animate-float { animation: float 6s ease-in-out infinite; }
        .animate-glow { animation: glow 2s ease-in-out infinite alternate; }
        .animate-pulse-slow { animation: pulse-slow 4s infinite; }
        .animate-slide-up { animation: slideUp 1s ease-out; }
        .animate-slide-in { animation: slideIn 1.2s ease-out; }
        .animate-bounce-slow { animation: bounce-slow 3s infinite; }
        .animate-shimmer {
            background: linear-gradient(90deg, transparent, rgba(251, 146, 60, 0.3), transparent);
            background-size: 1000px 100%;
            animation: shimmer 3s infinite;
        }
        .hover-lift { 
            transition: transform 0.3s ease, box-shadow 0.3s ease; 
        }
        .hover-lift:hover { 
            transform: translateY(-10px); 
            box-shadow: 0 20px 40px rgba(0, 0, 0, 0.3);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.1);
        }
        .card-hover-scale {
            transition: all 0.3s ease;
        }
        .card-hover-scale:hover {
            transform: scale(1.05) translateY(-5px);
        }
        .gradient-text {
            background: linear-gradient(90deg, #fb923c, #ef4444, #fb923c);
            background-size: 200% auto;
            -webkit-background-clip: text;
            background-clip: text;
            -webkit-text-fill-color: transparent;
            animation: shimmer 3s linear infinite;
        }
        .stats-card {
            position: relative;
            overflow: hidden;
        }
        .stats-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: -100%;
            width: 100%;
            height: 100%;
            background: linear-gradient(90deg, transparent, rgba(251, 146, 60, 0.2), transparent);
            transition: left 0.5s;
        }
        .stats-card:hover::before {
            left: 100%;
        }
        .particle {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
            opacity: 0.6;
        }
        .interactive-button {
            position: relative;
            overflow: hidden;
        }
        .interactive-button::before {
            content: '';
            position: absolute;
            top: 50%;
            left: 50%;
            width: 0;
            height: 0;
            border-radius: 50%;
            background: rgba(255, 255, 255, 0.3);
            transform: translate(-50%, -50%);
            transition: width 0.6s, height 0.6s;
        }
        .interactive-button:hover::before {
            width: 300px;
            height: 300px;
        }
    </style>
</head>
<body class="bg-slate-950 overflow-x-hidden">

    @include('user/includes.navbar')

    @include('user/includes.sidebar')

    <!-- Hero Section -->
    <section class="relative pt-24 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-24">
        <!-- Animated Background -->
        <div class="absolute inset-0">
            <div class="absolute inset-0 bg-gradient-to-r from-orange-600/5 via-red-600/5 to-orange-600/5 animate-pulse-slow"></div>
            <div class="absolute top-0 left-0 w-full h-full" id="particles-container">
                <div class="particle absolute top-1/4 left-1/4 w-3 h-3 bg-orange-400 animate-float" style="animation-delay: 0s"></div>
                <div class="particle absolute top-1/3 right-1/4 w-2 h-2 bg-red-400 animate-float" style="animation-delay: 1s"></div>
                <div class="particle absolute bottom-1/3 left-1/3 w-2.5 h-2.5 bg-orange-500 animate-float" style="animation-delay: 2s"></div>
                <div class="particle absolute bottom-1/4 right-1/3 w-2 h-2 bg-red-300 animate-float" style="animation-delay: 3s"></div>
            </div>
        </div>

        <div class="container mx-auto px-4 relative z-10">
            <div class="grid lg:grid-cols-2 gap-16 items-center min-h-[80vh]">
                <!-- Left Content -->
                <div class="space-y-8 animate-slide-up">
                    <div class="space-y-4">
                        <div class="flex items-center justify-center lg:justify-start mb-6">
                            <div class="w-20 h-1 bg-gradient-to-r from-orange-500 to-red-500 mr-4 animate-pulse"></div>
                            <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-full flex items-center justify-center shadow-xl animate-glow hover:scale-110 transition-transform cursor-pointer">
                                <img src="{{ asset('images/logo.png') }}" alt="Logo SMKN 13 Bandung" class="w-8 h-8 object-contain">
                            </div>
                            <div class="w-20 h-1 bg-gradient-to-r from-red-500 to-orange-500 ml-4 animate-pulse"></div>
                        </div>
                        <h1 class="text-5xl md:text-7xl font-bold text-white mb-6 tracking-tight">
                            Selamat Datang di <span class="gradient-text">Kulkul</span>
                        </h1>
                        <p class="text-xl text-slate-300 leading-relaxed font-light">
                            Temukan passion sejatimu melalui berbagai ekstrakurikuler yang menantang dan menyenangkan di SMKN 13 Bandung!
                        </p>
                    </div>
                    
                    <div class="space-y-4 text-slate-200">
                        <p class="text-lg leading-relaxed font-light hover:text-orange-300 transition-colors cursor-default">
                            Platform terdepan yang mengembangkan cara Siswa/i mengakses dan mengelola kegiatan ekstrakurikuler. Kami adalah forum digital yang menghubungkan siswa, guru pembina, dan berbagai jenis ekskul dalam satu lingkungan digital.
                        </p>
                        
                        <p class="text-lg leading-relaxed font-light text-orange-400 animate-pulse-slow">
                            🚀 Kami hadir sebagai solusi dari sistem yang tidak efisien.
                        </p>
                    </div>

                    <div class="flex flex-wrap gap-4 pt-8">
                        <a href="{{ route('ekstrakurikuler') }}" class="interactive-button px-8 py-4 bg-gradient-to-r from-orange-500 to-red-600 text-white font-bold rounded-full hover-lift transition-all duration-300 animate-glow shadow-2xl group">
                            <i class="fas fa-rocket mr-2 group-hover:rotate-45 transition-transform"></i>
                            Explore Now!
                        </a>
                        <a href="https://youtu.be/O1JP-O-QAnc?si=V7SNRWzKbdfXS_pb" 
                        target="_blank" 
                        class="interactive-button px-8 py-4 glass-effect text-white font-bold rounded-full hover-lift border border-orange-500/50 hover:border-orange-400 transition-all duration-300 group">
                            <i class="fas fa-play mr-2 group-hover:scale-125 transition-transform"></i>
                            Tonton
                        </a>
                    </div>

                    <!-- Quick Stats -->
                    <div class="grid grid-cols-3 gap-4 pt-6">
                        <div class="text-center p-4 glass-effect rounded-xl hover:bg-orange-500/10 transition-all cursor-pointer card-hover-scale">
                            <div class="text-3xl font-bold text-orange-400">23</div>
                            <div class="text-xs text-slate-400">Ekskul</div>
                        </div>
                        <div class="text-center p-4 glass-effect rounded-xl hover:bg-red-500/10 transition-all cursor-pointer card-hover-scale">
                            <div class="text-3xl font-bold text-red-400">500+</div>
                            <div class="text-xs text-slate-400">Siswa</div>
                        </div>
                        <div class="text-center p-4 glass-effect rounded-xl hover:bg-yellow-500/10 transition-all cursor-pointer card-hover-scale">
                            <div class="text-3xl font-bold text-yellow-400">100%</div>
                            <div class="text-xs text-slate-400">Puas</div>
                        </div>
                    </div>
                </div>

                <!-- Right Card -->
                <div class="relative animate-slide-in">
                    <div class="relative group hover-lift">
                        <div class="absolute -inset-1 bg-gradient-to-r from-orange-500 via-red-500 to-orange-600 rounded-3xl blur opacity-30 group-hover:opacity-60 transition duration-1000 animate-glow"></div>
                        <div class="relative bg-gradient-to-br from-slate-800/90 to-slate-900/90 backdrop-blur-xl rounded-3xl overflow-hidden border border-orange-500/20 shadow-2xl">
                            
                            <!-- Header Badge -->
                            <div class="absolute top-6 left-6 z-20">
                                <div class="bg-gradient-to-r from-orange-500 to-red-500 text-white px-4 py-2 rounded-full text-sm font-bold animate-pulse-slow shadow-lg hover:scale-105 transition-transform cursor-pointer">
                                    <i class="fas fa-star mr-2 animate-spin" style="animation-duration: 3s;"></i>
                                    SMKN 13 BANDUNG
                                </div>
                            </div>

                            <!-- Image Container -->
                            <div class="relative rounded-2xl overflow-hidden m-6 mb-4 group/img">
                                <div class="aspect-video bg-gradient-to-br from-slate-700 to-slate-900 flex items-center justify-center relative">
                                    
                                   <div
                                    class="absolute inset-0 bg-cover bg-center transition-transform duration-500 group-hover/img:scale-110"
                                    style="background-image: url('{{ asset('images/eskul.jpg') }}');">
                                    </div>
                                                                        
                                    <!-- Dark Overlay -->
                                    <div class="absolute inset-0 bg-gradient-to-t from-black/80 via-black/50 to-black/30 group-hover/img:from-black/70 transition-colors duration-300"></div>

                                    <!-- Animated Particles -->
                                    <div class="absolute inset-0 pointer-events-none">
                                        <div class="particle absolute top-1/4 left-1/4 w-2 h-2 bg-orange-400 animate-float opacity-60"></div>
                                        <div class="particle absolute top-1/3 right-1/4 w-1.5 h-1.5 bg-red-400 animate-float opacity-60" style="animation-delay: 1s"></div>
                                        <div class="particle absolute bottom-1/3 left-1/3 w-2 h-2 bg-orange-500 animate-float opacity-60" style="animation-delay: 2s"></div>
                                    </div>

                                    <!-- Content -->
                                    <div class="relative text-center text-white z-10 px-6">
                                        <div class="mb-4">
                                            <i class="fas fa-users text-6xl opacity-90 transform group-hover/img:scale-125 group-hover/img:rotate-6 transition-all duration-500"></i>
                                        </div>
                                        <h3 class="text-3xl font-bold mb-2">
                                            <span id="rotating-title" class="inline-block transition-all duration-500">
                                                Berdaya Suai
                                            </span>
                                        </h3>
                                        <p class="text-sm text-slate-300 max-w-md mx-auto opacity-0 group-hover/img:opacity-100 transition-opacity duration-300">
                                            Bergabunglah dengan komunitas siswa aktif
                                        </p>
                                    </div>

                                    <!-- Bottom Stats Bar -->
                                    <div class="absolute bottom-0 left-0 right-0 p-4">
                                        <div class="glass-effect rounded-xl p-3 bg-slate-900/60 backdrop-blur-md transform translate-y-full group-hover/img:translate-y-0 transition-transform duration-300">
                                            <div class="flex items-center justify-between text-white text-sm">
                                                <div class="flex items-center gap-4">
                                                    <span class="flex items-center hover:text-orange-400 transition-colors cursor-pointer">
                                                        <i class="fas fa-eye mr-1.5"></i> 
                                                        <span class="font-semibold">1.9k</span>
                                                    </span>
                                                    <span class="flex items-center hover:text-red-400 transition-colors cursor-pointer">
                                                        <i class="fas fa-heart mr-1.5"></i> 
                                                        <span class="font-semibold">53</span>
                                                    </span>
                                                    <span class="flex items-center hover:text-blue-400 transition-colors cursor-pointer">
                                                        <i class="fas fa-share mr-1.5"></i> 
                                                        <span class="font-semibold">12</span>
                                                    </span>
                                                </div>
                                                <button class="px-3 py-1 bg-gradient-to-r from-orange-500 to-red-500 rounded-lg text-xs font-bold hover:shadow-lg hover:scale-105 transition-all duration-300">
                                                    <i class="fas fa-play mr-1"></i>
                                                    Tonton
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Card Content -->
                            <div class="p-8 pt-4">
                                <div class="text-center space-y-4">
                                    <h3 class="text-3xl font-bold gradient-text">
                                        WELCOME, {{ Str::upper(session('user')->name) }}
                                    </h3>
                                    <p class="text-slate-300 leading-relaxed text-sm">
                                        Platform digital yang menghubungkan siswa dengan berbagai kegiatan ekstrakurikuler. 
                                        Temukan passionmu dan kembangkan potensi terbaikmu bersama kami!
                                    </p>
                                    
                                    <!-- Stats Grid -->
                                    <div class="grid grid-cols-3 gap-4 pt-6">
                                        <div class="stats-card text-center p-4 rounded-xl bg-slate-800/50 border border-orange-500/20 hover:border-orange-500/60 transition-all duration-300 cursor-pointer group">
                                            <div class="text-3xl font-bold text-orange-400 mb-1 group-hover:scale-110 transition-transform">23</div>
                                            <div class="text-xs text-slate-400 font-medium">Ekstrakurikuler</div>
                                        </div>
                                        <div class="stats-card text-center p-4 rounded-xl bg-slate-800/50 border border-red-500/20 hover:border-red-500/60 transition-all duration-300 cursor-pointer group">
                                            <div class="text-3xl font-bold text-red-400 mb-1 group-hover:scale-110 transition-transform">500+</div>
                                            <div class="text-xs text-slate-400 font-medium">Siswa Aktif</div>
                                        </div>
                                        <div class="stats-card text-center p-4 rounded-xl bg-slate-800/50 border border-yellow-500/20 hover:border-yellow-500/60 transition-all duration-300 cursor-pointer group">
                                            <div class="text-3xl font-bold text-yellow-400 mb-1 group-hover:scale-110 transition-transform">100%</div>
                                            <div class="text-xs text-slate-400 font-medium">Kepuasan</div>
                                        </div>
                                    </div>

                                    <!-- Action Button -->
                                    <div class="pt-4">
                                        <button class="interactive-button w-full px-6 py-3 bg-gradient-to-r from-orange-500 to-red-600 text-white font-bold rounded-xl hover:from-orange-400 hover:to-red-500 transition-all duration-300 shadow-lg hover:shadow-orange-500/50 group">
                                            <i class="fas fa-rocket mr-2 group-hover:translate-x-1 transition-transform"></i>
                                            Jelajahi Ekstrakurikuler
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Wave Bottom -->
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
                    class="transition-all duration-300 ease-in-out">
                </path>
            </svg>
        </div>
    </section>

    <!-- Features Section -->
    <section class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-24 relative">
        <div class="container mx-auto px-4">
            <div class="text-center max-w-3xl mx-auto mb-16">
                <h2 class="text-4xl md:text-5xl font-bold gradient-text mb-6 animate-slide-up">
                    Kenapa Memilih Kulkul?
                </h2>
                <p class="text-slate-300 text-lg animate-slide-up" style="animation-delay: 0.2s;">
                    Temukan berbagai keunggulan dan manfaat yang akan kamu dapatkan di program ekstrakurikuler SMKN 13 Bandung
                </p>
            </div>

            <!-- Feature Cards -->
            <div class="grid md:grid-cols-3 gap-8 mb-16">
                <!-- Feature 1 -->
                <div class="group hover-lift cursor-pointer">
                    <div class="relative">
                        <div class="absolute -inset-1 bg-gradient-to-r from-orange-500 to-red-500 rounded-2xl blur opacity-25 group-hover:opacity-60 transition duration-1000"></div>
                        <div class="relative bg-slate-800 border border-orange-500/20 group-hover:border-orange-500/60 p-8 rounded-2xl transition-all duration-300">
                            <div class="w-14 h-14 bg-gradient-to-br from-orange-400 to-red-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                <i class="fas fa-award text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-4 group-hover:text-orange-400 transition-colors">Prestasi Unggul</h3>
                            <p class="text-slate-300 leading-relaxed">
                                Raih berbagai prestasi di tingkat regional hingga nasional melalui program ekstrakurikuler yang terstruktur.
                            </p>
                            <div class="mt-4 text-orange-400 opacity-0 group-hover:opacity-100 transition-opacity">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feature 2 -->
                <div class="group hover-lift cursor-pointer">
                    <div class="relative">
                        <div class="absolute -inset-1 bg-gradient-to-r from-orange-500 to-red-500 rounded-2xl blur opacity-25 group-hover:opacity-60 transition duration-1000"></div>
                        <div class="relative bg-slate-800 border border-orange-500/20 group-hover:border-orange-500/60 p-8 rounded-2xl transition-all duration-300">
                            <div class="w-14 h-14 bg-gradient-to-br from-orange-400 to-red-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                <i class="fas fa-users text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-4 group-hover:text-orange-400 transition-colors">Pembina Profesional</h3>
                            <p class="text-slate-300 leading-relaxed">
                                Dibimbing oleh para pembina berpengalaman yang siap mengembangkan potensimu.
                            </p>
                            <div class="mt-4 text-orange-400 opacity-0 group-hover:opacity-100 transition-opacity">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Feature 3 -->
                <div class="group hover-lift cursor-pointer">
                    <div class="relative">
                        <div class="absolute -inset-1 bg-gradient-to-r from-orange-500 to-red-500 rounded-2xl blur opacity-25 group-hover:opacity-60 transition duration-1000"></div>
                        <div class="relative bg-slate-800 border border-orange-500/20 group-hover:border-orange-500/60 p-8 rounded-2xl transition-all duration-300">
                            <div class="w-14 h-14 bg-gradient-to-br from-orange-400 to-red-500 rounded-xl flex items-center justify-center mb-6 group-hover:scale-110 group-hover:rotate-6 transition-all duration-300">
                                <i class="fas fa-rocket text-white text-2xl"></i>
                            </div>
                            <h3 class="text-xl font-bold text-white mb-4 group-hover:text-orange-400 transition-colors">Fasilitas Lengkap</h3>
                            <p class="text-slate-300 leading-relaxed">
                                Didukung fasilitas modern dan lengkap untuk menunjang kegiatan ekstrakurikuler.
                            </p>
                            <div class="mt-4 text-orange-400 opacity-0 group-hover:opacity-100 transition-opacity">
                                <i class="fas fa-arrow-right"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- CTA Section -->
            <div class="max-w-4xl mx-auto text-center">
                <div class="relative group hover-lift">
                    <div class="absolute -inset-1 bg-gradient-to-r from-orange-500 via-red-500 to-orange-500 rounded-3xl blur opacity-25 group-hover:opacity-60 transition duration-1000"></div>
                    <div class="relative bg-slate-800/80 backdrop-blur-xl border border-orange-500/20 group-hover:border-orange-500/60 p-8 md:p-12 rounded-3xl transition-all duration-300">
                        <div class="mb-6">
                            <i class="fas fa-rocket text-5xl text-orange-400 animate-bounce-slow"></i>
                        </div>
                        <h3 class="text-3xl md:text-4xl font-bold text-white mb-6">Siap Bergabung dengan Kami?</h3>
                        <p class="text-slate-300 mb-8 max-w-2xl mx-auto leading-relaxed">
                            Jangan lewatkan kesempatan untuk mengembangkan bakatmu dan menjadi bagian dari prestasi SMKN 13 Bandung!
                        </p>
                        <button class="interactive-button px-10 py-4 bg-gradient-to-r from-orange-500 to-red-600 text-white font-bold rounded-full hover-lift hover:from-orange-400 hover:to-red-500 transition-all duration-300 shadow-xl hover:shadow-orange-500/50 group/btn">
                            <i class="fas fa-paper-plane mr-2 group-hover/btn:translate-x-1 group-hover/btn:-translate-y-1 transition-transform"></i>
                            Daftar Sekarang
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    @include('user/includes.footer')

    <script src="{{ asset('js/overllayImagePage.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>
</html>