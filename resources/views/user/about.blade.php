<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Kulkul</title>
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
                                boxShadow: '0 0 40px rgba(251, 146, 60, 0.8), 0 0 60px rgba(234, 88, 12, 0.3)'
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
                        },
                        slideIn: {
                            '0%': {
                                transform: 'translateX(100px)',
                                opacity: '0'
                            },
                            '100%': {
                                transform: 'translateX(0)',
                                opacity: '1'
                            }
                        },
                        rotate: {
                            '0%': {
                                transform: 'rotate(0deg)'
                            },
                            '100%': {
                                transform: 'rotate(360deg)'
                            }
                        },
                        fadeIn: {
                            '0%': {
                                opacity: '0'
                            },
                            '100%': {
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
                    Tentang <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-400">Kami</span>
                </h1>
                <p class="text-xl text-slate-300 max-w-3xl mx-auto leading-relaxed">
                    Mengenal lebih dekat program ekstrakurikuler unggulan yang mengembangkan potensi siswa SMKN 13 Bandung menuju masa depan yang gemilang
                </p>
            </div>

            <!-- Stats Cards -->
            <div class="grid md:grid-cols-4 gap-6 mb-20">
                <div class="group bg-gradient-to-br from-orange-900/30 to-red-900/30 backdrop-blur-xl rounded-2xl p-8 text-center hover-lift border border-orange-500/30 hover:border-orange-400/50 transition-all duration-500">
                    <div class="text-5xl font-bold text-white mb-3 group-hover:scale-110 transition-transform duration-300">23</div>
                    <div class="text-orange-300 font-medium text-lg">Ekstrakurikuler</div>
                    <div class="text-slate-400 text-sm mt-1">Program Unggulan</div>
                </div>
                <div class="group bg-gradient-to-br from-red-900/30 to-orange-900/30 backdrop-blur-xl rounded-2xl p-8 text-center hover-lift border border-red-500/30 hover:border-red-400/50 transition-all duration-500">
                    <div class="text-5xl font-bold text-white mb-3 group-hover:scale-110 transition-transform duration-300">200+</div>
                    <div class="text-red-300 font-medium text-lg">Siswa Aktif</div>
                    <div class="text-slate-400 text-sm mt-1">Partisipasi Tinggi</div>
                </div>
                <div class="group bg-gradient-to-br from-orange-800/30 to-red-800/30 backdrop-blur-xl rounded-2xl p-8 text-center hover-lift border border-orange-600/30 hover:border-orange-500/50 transition-all duration-500">
                    <div class="text-5xl font-bold text-white mb-3 group-hover:scale-110 transition-transform duration-300">120+</div>
                    <div class="text-orange-300 font-medium text-lg">Prestasi</div>
                    <div class="text-slate-400 text-sm mt-1">Pencapaian Luar Biasa</div>
                </div>
                <div class="group bg-gradient-to-br from-red-800/30 to-orange-800/30 backdrop-blur-xl rounded-2xl p-8 text-center hover-lift border border-red-600/30 hover:border-red-500/50 transition-all duration-500">
                    <div class="text-5xl font-bold text-white mb-3 group-hover:scale-110 transition-transform duration-300">23+</div>
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
                                    <span class="font-medium">Studio</span>
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
                        <div class="w-32 h-32 mx-auto rounded-full bg-gradient-to-br from-orange-600 to-red-500 p-1 group-hover:animate-bounce shadow-xl">
                            <div class="w-full h-full rounded-full bg-slate-800 flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('images/bumaya.jpg') }}" alt="Pak Sukma S.pd" class="w-full h-full object-cover">
                            </div>
                        </div>
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x-1/2 w-8 h-8 bg-gradient-to-br from-orange-400 to-red-400 rounded-full flex items-center justify-center">
                            <i class="fas fa-crown text-white text-sm"></i>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-3">Ibu Maya Kusmayanti M.pd</h3>
                    <p class="text-orange-400 mb-4 font-semibold">Waka Kesiswaan </p>
                    <p class="text-slate-400 leading-relaxed mb-6">5+ tahun pengalaman dalam pembinaan ekstrakurikuler dan pengembangan karakter siswa dengan dedikasi tinggi</p>
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
                    <h3 class="text-2xl font-bold text-white mb-3">Ibu Tessa Eka Yuniar S.pd</h3>
                    <p class="text-red-400 mb-4 font-semibold">Pembina OSIS & MPK</p>
                    <p class="text-slate-400 leading-relaxed mb-6">2 tahun pengalaman dalam pembinaan ekstrakurikuler dan pengembangan karakter siswa</p>
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
                            <div class="w-full h-full rounded-full bg-slate-800 flex items-center justify-center overflow-hidden">
                                <img src="{{ asset('images/paksukma.jpg') }}" alt="Pak Sukma S.pd" class="w-full h-full object-cover">
                            </div>
                        </div>
                        <div class="absolute -bottom-2 left-1/2 transform -translate-x
                        -1/2 w-8 h-8 bg-gradient-to-br from-orange-400 to-red-400 rounded-full flex items-center justify-center">
                            <i class="fas fa-medal text-white text-sm"></i>
                        </div>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-3">Pak Sukma S.pd</h3>
                    <p class="text-orange-400 mb-4 font-semibold">Koordinator Ekskul
                    </p>
                    <p class="text-slate-400 leading-relaxed mb-6">Ahli dalam management ekstrakurikuler </p>
                    <div class="flex justify-center space-x-4">
                        <div class="w-2 h-2 bg-orange-400 rounded-full"></div>
                        <div class="w-2 h-2 bg-red-400 rounded-full"></div>
                        <div class="w-2 h-2 bg-orange-500 rounded-full"></div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    @include('user/includes.footer')

    <script src="{{ asset('js/sidebar.js') }}"></script>
</body>

</html>