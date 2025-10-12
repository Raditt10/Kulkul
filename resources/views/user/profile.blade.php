<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <script src="{{ asset('js/main.js') }}"></script>
    <title>Profil Saya - SMKN 13 BANDUNG</title>
    <script src="https://cdn.tailwindcss.com"></script>
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
    <style>
        .glass-effect {
            backdrop-filter: blur(20px);
            background: rgba(30, 41, 59, 0.8);
            border: 1px solid rgba(251, 146, 60, 0.2);
        }
        .hover-lift {
            transition: transform 0.3s ease-in-out;
        }
        .hover-lift:hover {
            transform: translateY(-5px);
        }
    </style>
</head>
<body class="bg-slate-950 overflow-x-hidden">
    @include('user/includes.navbar')
  
    @include('user/includes.sidebar')

    <!-- Overlay -->
    <div id="sidebarOverlay" class="fixed inset-0 bg-black/60 opacity-0 pointer-events-none transition-opacity duration-500 z-40"></div>

    <!-- Main Content -->
    <main class="pt-24 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 min-h-screen">
        <!-- Header Section -->
        <section class="relative py-16">
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
                <div class="text-center mb-12">
                    <div class="flex items-center justify-center mb-6">
                        <div class="w-20 h-1 bg-gradient-to-r from-orange-500 to-red-500 mr-4"></div>
                        <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-full flex items-center justify-center shadow-xl">
                            <img src="{{ asset('images/logo.png') }}" alt="Logo SMKN 13 Bandung" class="w-8 h-8 object-contain">
                        </div>
                        <div class="w-20 h-1 bg-gradient-to-r from-red-500 to-orange-500 ml-4"></div>
                    </div>
                    <h1 class="text-4xl md:text-5xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-400 mb-4">
                        Profil Saya
                    </h1>
                    <p class="text-slate-300 text-lg max-w-2xl mx-auto">
                        Kelola informasi profil dan preferensi akun Anda
                    </p>
                </div>
            </div>
        </section>

        <!-- Profile Content -->
        <section class="pb-24">
            <div class="container mx-auto px-4">
                <div class="grid lg:grid-cols-3 gap-8">
                    <!-- Profile Card -->
                    <div class="lg:col-span-1">
                        <div class="relative group hover-lift">
                            <div class="absolute -inset-1 bg-gradient-to-r from-orange-500 via-red-500 to-orange-600 rounded-3xl blur opacity-30 group-hover:opacity-50 transition duration-1000 animate-glow"></div>
                            <div class="relative bg-gradient-to-br from-slate-800/90 to-slate-900/90 backdrop-blur-xl rounded-3xl p-8 border border-orange-500/20 shadow-2xl">
                                <!-- Profile Picture -->
                                <div class="text-center mb-6">
                                    <div class="relative mx-auto w-32 h-32 mb-6">
                                        <div class="w-32 h-32 rounded-full bg-gradient-to-br from-orange-400 to-red-500 flex items-center justify-center shadow-2xl">
                                            <i class="fas fa-user text-white text-4xl"></i>
                                        </div>
                                        <button class="absolute bottom-0 right-0 w-10 h-10 bg-gradient-to-r from-orange-500 to-red-600 rounded-full flex items-center justify-center hover:scale-110 transition-transform duration-300 shadow-lg">
                                            <i class="fas fa-camera text-white text-sm"></i>
                                        </button>
                                    </div>
                                    <h2 class="text-2xl font-bold text-white mb-2">Alif Pratama</h2>
                                    <p class="text-orange-300 font-medium">NIS: 2080710</p>
                                    <p class="text-slate-400 text-sm">Siswa Aktif • Kelas XII RPL</p>
                                </div>

                                <!-- Quick Stats -->
                                <div class="grid grid-cols-2 gap-4 mb-6">
                                    <div class="text-center p-4 bg-slate-700/50 rounded-xl border border-orange-500/20">
                                        <div class="text-2xl font-bold text-orange-400">3</div>
                                        <div class="text-xs text-slate-400">Ekstrakurikuler</div>
                                    </div>
                                    <div class="text-center p-4 bg-slate-700/50 rounded-xl border border-orange-500/20">
                                        <div class="text-2xl font-bold text-red-400">87.5</div>
                                        <div class="text-xs text-slate-400">Rata-rata Nilai</div>
                                    </div>
                                </div>

                                <!-- Achievement Badge -->
                                <div class="text-center">
                                    <div class="inline-flex items-center px-4 py-2 bg-gradient-to-r from-yellow-500/20 to-yellow-600/20 rounded-full border border-yellow-400/30">
                                        <i class="fas fa-trophy text-yellow-400 mr-2"></i>
                                        <span class="text-yellow-300 text-sm font-medium">Siswa Berprestasi</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Profile Form -->
                    <div class="lg:col-span-2">
                        <div class="relative group">
                            <div class="absolute -inset-1 bg-gradient-to-r from-orange-500 via-red-500 to-orange-600 rounded-3xl blur opacity-20 group-hover:opacity-30 transition duration-1000"></div>
                            <div class="relative bg-gradient-to-br from-slate-800/90 to-slate-900/90 backdrop-blur-xl rounded-3xl p-8 border border-orange-500/20 shadow-2xl">
                                <!-- Tab Navigation -->
                                <div class="flex space-x-1 mb-8 bg-slate-700/30 p-1 rounded-2xl">
                                    <button id="personalTab" class="flex-1 py-3 px-6 rounded-xl font-medium transition-all duration-300  text-white bg-gradient-to-r from-orange-500 to-red-500 text-slate-300 hover:text-white">
                                        <i class="fas fa-user mr-2"></i>
                                        Data Pribadi
                                    </button>
                                    <button id="academicTab" class="flex-1 py-3 px-6 rounded-xl font-medium transition-all duration-300 text-slate-300 hover:text-white">
                                        <i class="fas fa-graduation-cap mr-2"></i>
                                        Data Akademik
                                    </button>
                                </div>

                                <!-- Personal Data Tab -->
                                <div id="personalContent" class="tab-content">
                                    <form class="space-y-6">
                                        <div class="grid md:grid-cols-2 gap-6">
                                            <div>
                                                <label class="block text-sm font-medium text-slate-300 mb-2">Nama Lengkap</label>
                                                <input type="text" value="Alif Pratama Wijaya" class="w-full px-4 py-3 bg-slate-700/50 border border-orange-500/20 rounded-xl text-white placeholder-slate-400 focus:border-orange-400 focus:outline-none transition-colors duration-300">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-slate-300 mb-2">NIS</label>
                                                <input type="text" value="2080710" class="w-full px-4 py-3 bg-slate-700/50 border border-orange-500/20 rounded-xl text-white placeholder-slate-400 focus:border-orange-400 focus:outline-none transition-colors duration-300" readonly>
                                            </div>
                                        </div>

                                        <div class="grid md:grid-cols-2 gap-6">
                                            <div>
                                                <label class="block text-sm font-medium text-slate-300 mb-2">Email</label>
                                                <input type="email" value="alif.pratama@student.smkn13bdg.sch.id" class="w-full px-4 py-3 bg-slate-700/50 border border-orange-500/20 rounded-xl text-white placeholder-slate-400 focus:border-orange-400 focus:outline-none transition-colors duration-300">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-slate-300 mb-2">No. Telepon</label>
                                                <input type="tel" value="+62 812 3456 7890" class="w-full px-4 py-3 bg-slate-700/50 border border-orange-500/20 rounded-xl text-white placeholder-slate-400 focus:border-orange-400 focus:outline-none transition-colors duration-300">
                                            </div>
                                        </div>

                                        <div class="grid md:grid-cols-2 gap-6">
                                            <div>
                                                <label class="block text-sm font-medium text-slate-300 mb-2">Tempat Lahir</label>
                                                <input type="text" value="Bandung" class="w-full px-4 py-3 bg-slate-700/50 border border-orange-500/20 rounded-xl text-white placeholder-slate-400 focus:border-orange-400 focus:outline-none transition-colors duration-300">
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-slate-300 mb-2">Tanggal Lahir</label>
                                                <input type="date" value="2007-03-15" class="w-full px-4 py-3 bg-slate-700/50 border border-orange-500/20 rounded-xl text-white placeholder-slate-400 focus:border-orange-400 focus:outline-none transition-colors duration-300">
                                            </div>
                                        </div>

                                        <div>
                                            <label class="block text-sm font-medium text-slate-300 mb-2">Alamat Lengkap</label>
                                            <textarea rows="3" class="w-full px-4 py-3 bg-slate-700/50 border border-orange-500/20 rounded-xl text-white placeholder-slate-400 focus:border-orange-400 focus:outline-none transition-colors duration-300" placeholder="Masukkan alamat lengkap...">Jl. Soekarno Hatta No. 123, Bandung, Jawa Barat</textarea>
                                        </div>
                                    </form>
                                </div>

                                <!-- Academic Data Tab -->
                                <div id="academicContent" class="tab-content hidden">
                                    <div class="space-y-6">
                                        <div class="grid md:grid-cols-2 gap-6">
                                            <div>
                                                <label class="block text-sm font-medium text-slate-300 mb-2">Kelas</label>
                                                <select class="w-full px-4 py-3 bg-slate-700/50 border border-orange-500/20 rounded-xl text-white focus:border-orange-400 focus:outline-none transition-colors duration-300">
                                                    <option>XII RPL 1</option>
                                                    <option>XII RPL 2</option>
                                                    <option>XII RPL 3</option>
                                                </select>
                                            </div>
                                            <div>
                                                <label class="block text-sm font-medium text-slate-300 mb-2">Jurusan</label>
                                                <input type="text" value="Rekayasa Perangkat Lunak" class="w-full px-4 py-3 bg-slate-700/50 border border-orange-500/20 rounded-xl text-white placeholder-slate-400 focus:border-orange-400 focus:outline-none transition-colors duration-300" readonly>
                                            </div>
                                        </div>

                                        <div class="bg-slate-700/30 rounded-2xl p-6">
                                            <h3 class="text-lg font-bold text-white mb-4">Ekstrakurikuler yang Diikuti</h3>
                                            <div class="space-y-3">
                                                <div class="flex items-center justify-between p-3 bg-slate-800/50 rounded-xl border border-orange-500/20">
                                                    <div class="flex items-center space-x-3">
                                                        <i class="fas fa-code text-orange-400"></i>
                                                        <span class="text-white font-medium">Programming Club</span>
                                                    </div>
                                                    <span class="text-green-400 text-sm">Aktif</span>
                                                </div>
                                                <div class="flex items-center justify-between p-3 bg-slate-800/50 rounded-xl border border-orange-500/20">
                                                    <div class="flex items-center space-x-3">
                                                        <i class="fas fa-camera text-orange-400"></i>
                                                        <span class="text-white font-medium">Fotografi</span>
                                                    </div>
                                                    <span class="text-green-400 text-sm">Aktif</span>
                                                </div>
                                                <div class="flex items-center justify-between p-3 bg-slate-800/50 rounded-xl border border-orange-500/20">
                                                    <div class="flex items-center space-x-3">
                                                        <i class="fas fa-futbol text-orange-400"></i>
                                                        <span class="text-white font-medium">Futsal</span>
                                                    </div>
                                                    <span class="text-green-400 text-sm">Aktif</span>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="bg-slate-700/30 rounded-2xl p-6">
                                            <h3 class="text-lg font-bold text-white mb-4">Prestasi</h3>
                                            <div class="space-y-3">
                                                <div class="flex items-center space-x-3 p-3 bg-yellow-500/10 rounded-xl border border-yellow-400/30">
                                                    <i class="fas fa-trophy text-yellow-400"></i>
                                                    <div>
                                                        <p class="text-white font-medium">Juara 2 Lomba Coding Nasional</p>
                                                        <p class="text-sm text-slate-400">2023</p>
                                                    </div>
                                                </div>
                                                <div class="flex items-center space-x-3 p-3 bg-yellow-500/10 rounded-xl border border-yellow-400/30">
                                                    <i class="fas fa-trophy text-yellow-400"></i>
                                                    <div>
                                                        <p class="text-white font-medium">Juara 1 Lomba Fotografi Kota Bandung</p>
                                                        <p class="text-sm text-slate-400">2022</p>      
                                                    </div>
                                                </div>  
                                                <div class="flex items-center space-x-3 p-3 bg-yellow-500/10 rounded-xl border border-yellow-400/30">
                                                    <i class="fas fa-trophy text-yellow-400"></i>
                                                    <div>
                                                        <p class="text-white font-medium">Juara 3 Turnamen Futsal Antar Sekolah</p>
                                                        <p class="text-sm text-slate-400">2023</p>                          
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
 
   @include('user/includes.footer')
 
    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/profileTab.js') }}"></script>
</body>
</html>
                                                