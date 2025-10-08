<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teman Saya - Kulkul SMKN 13 BANDUNG</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <script src="{{ asset('js/main.js') }}"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <style href="{{ asset('css/sidebarscroll.css') }}"></style>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
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
                        'scale-in': 'scaleIn 0.5s ease-out',
                        'wiggle': 'wiggle 1s ease-in-out infinite'
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
                        scaleIn: {
                            '0%': { transform: 'scale(0.8)', opacity: '0' },
                            '100%': { transform: 'scale(1)', opacity: '1' }
                        },
                        wiggle: {
                            '0%, 100%': { transform: 'rotate(-3deg)' },
                            '50%': { transform: 'rotate(3deg)' }
                        }
                    }
                }
            }
        }
    </script>
    <style>
        /* Custom Scrollbar Sidebar */
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

        /* Custom Scrollbar for Friends List */
        .friends-scroll::-webkit-scrollbar {
            width: 8px;
        }
        .friends-scroll::-webkit-scrollbar-track {
            background: rgba(30, 41, 59, 0.5);
            border-radius: 10px;
        }
        .friends-scroll::-webkit-scrollbar-thumb {
            background: linear-gradient(to bottom, #f97316, #dc2626);
            border-radius: 10px;
        }
        .friends-scroll::-webkit-scrollbar-thumb:hover {
            background: linear-gradient(to bottom, #fb923c, #ef4444);
        }

        /* Status indicators */
        .status-online {
            background: linear-gradient(135deg, #10b981, #059669);
            animation: pulse 2s infinite;
        }
        .status-offline {
            background: linear-gradient(135deg, #6b7280, #4b5563);
        }
        .status-away {
            background: linear-gradient(135deg, #f59e0b, #d97706);
        }

        /* Friend card hover effects */
        .friend-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        .friend-card:hover {
            transform: translateY(-8px) scale(1.02);
            box-shadow: 0 25px 50px -12px rgba(251, 146, 60, 0.25);
        }

        /* Search input focus effect */
        .search-input:focus {
            box-shadow: 0 0 0 3px rgba(251, 146, 60, 0.3);
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
                    <a href="{{ route('about') }}" class="group flex items-center text-slate-300 hover:text-white font-medium transition-all duration-300 hover-lift">
                        <i class="fas fa-info-circle mr-2 group-hover:animate-pulse text-orange-400"></i>
                        <span class="relative">
                            TENTANG KAMI
                            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-orange-400 transition-all duration-300 group-hover:w-full"></span>
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
                                <div class="text-sm font-bold text-white">{{ $user['username'] }}</div>
                                <div class="text-xs text-orange-300">NIS : {{ $user['nis'] }}</div>
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
                    <p class="font-bold text-white text-base">{{ $user['username'] }}</p>
                    <p class="text-sm text-orange-300">NIS: {{ $user['nis'] }}</p>
                    <p class="text-xs text-slate-400">Siswa Aktif</p>
                </div>
            </div>
        </div>

      <!-- Menu Items -->
        <ul class="px-6 py-6 space-y-3">
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
                <a href="{{ route('friend') }}" class="flex items-center space-x-4 text-slate-300 hover:text-white hover:bg-orange-600/20 transition-all duration-300 hover-lift p-3 rounded-xl">
                    <i class="fas fa-users text-orange-400 w-5"></i>
                    <span class="font-medium">Teman Saya</span>
                </a>
            </li>
            <li>
                <a href="{{ route('settings') }}" class="flex items-center space-x-4 text-slate-300 hover:text-white hover:bg-orange-600/20 transition-all duration-300 hover-lift p-3 rounded-xl">
                    <i class="fas fa-cog text-orange-400 w-5"></i>
                    <span class="font-medium">Pengaturan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('login') }}" class="flex items-center space-x-4 text-slate-300 hover:text-white hover:bg-orange-600/20 transition-all duration-300 hover-lift p-3 rounded-xl">
                    <i class="fas fa-sign-in-alt text-orange-400 w-5"></i>
                    <span class="font-medium">Masuk</span>

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

    <!-- Main Content -->
    <main class="pt-20 min-h-screen bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950">
        <!-- Header Section -->
        <section class="relative py-16 overflow-hidden">
            <!-- Animated Background -->
            <div class="absolute inset-0">
                <div class="absolute inset-0 bg-gradient-to-r from-orange-600/5 via-red-600/5 to-orange-600/5 animate-pulse-slow"></div>
                <div class="absolute top-0 left-0 w-full h-full">
                    <div class="absolute top-1/4 left-1/4 w-3 h-3 bg-orange-400 rounded-full animate-bounce opacity-60" style="animation-delay: 0s"></div>
                    <div class="absolute top-1/3 right-1/4 w-2 h-2 bg-red-400 rounded-full animate-bounce opacity-60" style="animation-delay: 1s"></div>
                    <div class="absolute bottom-1/3 left-1/3 w-2.5 h-2.5 bg-orange-500 rounded-full animate-bounce opacity-60" style="animation-delay: 2s"></div>
                </div>
            </div>

            <div class="container mx-auto px-4 relative z-10">
                <div class="text-center max-w-4xl mx-auto animate-slide-up">
                    <!-- Header Badge -->
                    <div class="inline-flex items-center bg-gradient-to-r from-orange-500/20 to-red-500/20 border border-orange-500/30 rounded-full px-6 py-3 mb-8">
                        <i class="fas fa-users text-orange-400 mr-3 animate-pulse"></i>
                        <span class="text-orange-300 font-medium">Teman Saya</span>
                    </div>

                    <h1 class="text-5xl md:text-6xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-400 mb-6">
                        Teman Sekelas & Ekstrakurikuler
                    </h1>
                    <p class="text-xl text-slate-300 leading-relaxed max-w-2xl mx-auto">
                        Terhubung dengan teman-teman di SMKN 13 Bandung. Temukan teman sekelas, sesama anggota ekstrakurikuler, dan perluas jaringan pertemananmu!
                    </p>
                </div>
            </div>
        </section>

        <!-- Friends Section -->
        <section class="py-16">
            <div class="container mx-auto px-4">
                <!-- Search and Filter Bar -->
                <div class="mb-12 animate-slide-up" style="animation-delay: 0.2s">
                    <div class="max-w-4xl mx-auto">
                        <div class="bg-slate-800/50 backdrop-blur-xl border border-orange-500/20 rounded-2xl p-6 shadow-2xl">
                            <div class="grid md:grid-cols-12 gap-4 items-center">
                                <!-- Search Input -->
                                <div class="md:col-span-5 relative">
                                    <div class="absolute inset-y-0 left-0 pl-4 flex items-center pointer-events-none">
                                        <i class="fas fa-search text-orange-400"></i>
                                    </div>
                                    <input 
                                        type="text" 
                                        id="searchFriends"
                                        placeholder="Cari nama teman..." 
                                        class="search-input w-full pl-12 pr-4 py-3 bg-slate-700/50 border border-slate-600 rounded-xl text-white placeholder-slate-400 focus:outline-none focus:border-orange-500 transition-all duration-300"
                                    >
                                </div>

                                <!-- Filter by Class -->
                                <div class="md:col-span-3">
                                    <select id="filterClass" class="w-full py-3 px-4 bg-slate-700/50 border border-slate-600 rounded-xl text-white focus:outline-none focus:border-orange-500 transition-all duration-300">
                                        <option value="">Semua Kelas</option>
                                        <option value="XII RPL 1">XII RPL 1</option>
                                        <option value="XII RPL 2">XII RPL 2</option>
                                        <option value="XII TKJ 1">XII TKJ 1</option>
                                        <option value="XI RPL 1">XI RPL 1</option>
                                        <option value="XI TKJ 2">XI TKJ 2</option>
                                        <option value="XII MM 1">XII MM 1</option>
                                    </select>
                                </div>

                                <!-- Filter by Status -->
                                <div class="md:col-span-2">
                                    <select id="filterStatus" class="w-full py-3 px-4 bg-slate-700/50 border border-slate-600 rounded-xl text-white focus:outline-none focus:border-orange-500 transition-all duration-300">
                                        <option value="">Semua Status</option>
                                        <option value="online">Online</option>
                                        <option value="offline">Offline</option>
                                        <option value="away">Away</option>
                                    </select>
                                </div>

                                <!-- Add Friend Button -->
                                <div class="md:col-span-2">
                                    <button class="w-full py-3 px-4 bg-gradient-to-r from-orange-500 to-red-600 text-white font-bold rounded-xl hover:from-orange-400 hover:to-red-500 transition-all duration-300 hover-lift">
                                        <i class="fas fa-user-plus mr-2"></i>
                                        Tambah
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Friends Stats -->
                <div class="mb-12 animate-slide-up" style="animation-delay: 0.4s">
                    <div class="max-w-4xl mx-auto">
                        <div class="grid md:grid-cols-4 gap-6">
                            <div class="bg-gradient-to-br from-orange-500/20 to-red-500/20 border border-orange-500/30 rounded-xl p-6 text-center hover-lift">
                                <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-red-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-users text-white text-xl"></i>
                                </div>
                                <div class="text-2xl font-bold text-white mb-2">{{ count($friends) }}</div>
                                <div class="text-sm text-slate-300">Total Teman</div>
                            </div>
                            <div class="bg-gradient-to-br from-green-500/20 to-emerald-500/20 border border-green-500/30 rounded-xl p-6 text-center hover-lift">
                                <div class="w-12 h-12 bg-gradient-to-br from-green-400 to-emerald-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-circle text-white text-xl"></i>
                                </div>
                                <div class="text-2xl font-bold text-white mb-2">{{ collect($friends)->where('status', 'online')->count() }}</div>
                                <div class="text-sm text-slate-300">Online</div>
                            </div>
                            <div class="bg-gradient-to-br from-yellow-500/20 to-amber-500/20 border border-yellow-500/30 rounded-xl p-6 text-center hover-lift">
                                <div class="w-12 h-12 bg-gradient-to-br from-yellow-400 to-amber-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-clock text-white text-xl"></i>
                                </div>
                                <div class="text-2xl font-bold text-white mb-2">{{ collect($friends)->where('status', 'away')->count() }}</div>
                                <div class="text-sm text-slate-300">Away</div>
                            </div>
                            <div class="bg-gradient-to-br from-slate-500/20 to-gray-500/20 border border-slate-500/30 rounded-xl p-6 text-center hover-lift">
                                <div class="w-12 h-12 bg-gradient-to-br from-slate-400 to-gray-500 rounded-full flex items-center justify-center mx-auto mb-4">
                                    <i class="fas fa-user-slash text-white text-xl"></i>
                                </div>
                                <div class="text-2xl font-bold text-white mb-2">{{ collect($friends)->where('status', 'offline')->count() }}</div>
                                <div class="text-sm text-slate-300">Offline</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Friends Grid -->
                <div class="max-w-7xl mx-auto">
                    <div id="friendsGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
                        @foreach($friends as $index => $friend)
                        <div class="friend-card bg-slate-800/50 backdrop-blur-xl border border-orange-500/20 rounded-2xl p-6 shadow-xl animate-scale-in" 
                             style="animation-delay: {{ $index * 0.1 }}s"
                             data-name="{{ strtolower($friend['name']) }}"
                             data-class="{{ $friend['class'] }}"
                             data-status="{{ $friend['status'] }}">
                            
                            <!-- Friend Header -->
                            <div class="flex items-start justify-between mb-6">
                                <div class="flex items-center space-x-4">
                                    <!-- Avatar with Status -->
                                    <div class="relative">
                                        <div class="w-16 h-16 bg-gradient-to-br from-orange-400 to-red-500 rounded-full flex items-center justify-center shadow-lg">
                                            <i class="fas fa-user text-white text-xl"></i>
                                        </div>
                                        <!-- Status Indicator -->
                                        <div class="absolute -bottom-1 -right-1 w-6 h-6 status-{{ $friend['status'] }} rounded-full border-2 border-slate-800 flex items-center justify-center">
                                            @if($friend['status'] === 'online')
                                                <i class="fas fa-circle text-white text-xs"></i>
                                            @elseif($friend['status'] === 'away')
                                                <i class="fas fa-clock text-white text-xs"></i>
                                            @else
                                                <i class="fas fa-times text-white text-xs"></i>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div>
                                        <h3 class="text-lg font-bold text-white">{{ $friend['name'] }}</h3>
                                        <p class="text-sm text-orange-300">{{ $friend['class'] }}</p>
                                        <p class="text-xs text-slate-400">NIS: {{ $friend['nis'] }}</p>
                                    </div>
                                </div>

                                <!-- Action Menu -->
                                <div class="relative">
                                    <button class="text-slate-400 hover:text-white transition-colors duration-300 p-2">
                                        <i class="fas fa-ellipsis-v"></i>
                                    </button>
                                </div>
                            </div>

                            <!-- Friend Info -->
                            <div class="space-y-4 mb-6">
                                <!-- Ekstrakurikuler -->
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-slate-300">Ekstrakurikuler:</span>
                                    <span class="text-sm font-medium text-orange-300">{{ $friend['eskul'] }}</span>
                                </div>

                                <!-- Mutual Friends -->
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-slate-300">Teman Bersama:</span>
                                    <span class="text-sm font-medium text-white">{{ $friend['mutual_friends'] }} orang</span>
                                </div>

                                <!-- Join Date -->
                                <div class="flex items-center justify-between">
                                    <span class="text-sm text-slate-300">Bergabung:</span>
                                    <span class="text-sm font-medium text-slate-300">{{ date('d M Y', strtotime($friend['joined_date'])) }}</span>
                                </div>

                                <!-- Status Text -->
                                <div class="flex items-center space-x-2">
                                    <div class="w-2 h-2 status-{{ $friend['status'] }} rounded-full"></div>
                                    <span class="text-sm text-slate-300 capitalize">{{ $friend['status'] }}</span>
                                </div>
                            </div>

                            <!-- Action Buttons -->
                            <div class="flex space-x-3">
                                <button class="flex-1 py-2 px-4 bg-gradient-to-r from-orange-500 to-red-600 text-white font-medium rounded-lg hover:from-orange-400 hover:to-red-500 transition-all duration-300 hover-lift text-sm">
                                    <i class="fas fa-comment mr-2"></i>
                                    Chat
                                </button>
                                <button class="flex-1 py-2 px-4 bg-slate-700/50 border border-slate-600 text-white font-medium rounded-lg hover:bg-slate-600/50 transition-all duration-300 hover-lift text-sm">
                                    <i class="fas fa-eye mr-2"></i>
                                    Profil
                                </button>
                            </div>
                        </div>
                        @endforeach
                    </div>

                    <!-- No Results Message -->
                    <div id="noResults" class="hidden text-center py-16">
                        <div class="max-w-md mx-auto">
                            <div class="w-24 h-24 bg-gradient-to-br from-orange-400 to-red-500 rounded-full flex items-center justify-center mx-auto mb-6 animate-bounce-slow">
                                <i class="fas fa-search text-white text-3xl"></i>
                            </div>
                            <h3 class="text-2xl font-bold text-white mb-4">Teman Tidak Ditemukan</h3>
                            <p class="text-slate-300">Coba ubah kata kunci pencarian atau filter yang digunakan.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

    <!-- Footer -->
    <footer class="bg-slate-950 py-12 relative border-t border-orange-500/20">
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
                        <li><a href="{{ route('home') }}" class="hover:text-orange-400">Home</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-orange-400">About Us</a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-orange-400">Services</a></li>
                        <li><a href="{{ route('friend') }}" class="hover:text-orange-400">Friends</a></li>
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

    <!-- JavaScript -->
    <script>
        // Sidebar functionality
        const sidebarToggle = document.getElementById('sidebarToggle');
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const closeSidebar = document.getElementById('closeSidebar');

        function openSidebar() {
            sidebar.classList.remove('translate-x-full');
            sidebarOverlay.classList.remove('opacity-0', 'pointer-events-none');
        }

        function closeSidebarFunc() {
            sidebar.classList.add('translate-x-full');
            sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
        }

        sidebarToggle.addEventListener('click', openSidebar);
        closeSidebar.addEventListener('click', closeSidebarFunc);
        sidebarOverlay.addEventListener('click', closeSidebarFunc);

        // Friends search and filter functionality
        const searchInput = document.getElementById('searchFriends');
        const classFilter = document.getElementById('filterClass');
        const statusFilter = document.getElementById('filterStatus');
        const friendsGrid = document.getElementById('friendsGrid');
        const noResults = document.getElementById('noResults');

        function filterFriends() {
            const searchTerm = searchInput.value.toLowerCase();
            const selectedClass = classFilter.value;
            const selectedStatus = statusFilter.value;
            
            const friendCards = friendsGrid.querySelectorAll('.friend-card');
            let visibleCount = 0;

            friendCards.forEach(card => {
                const name = card.dataset.name;
                const friendClass = card.dataset.class;
                const status = card.dataset.status;

                const matchesSearch = name.includes(searchTerm);
                const matchesClass = !selectedClass || friendClass === selectedClass;
                const matchesStatus = !selectedStatus || status === selectedStatus;

                if (matchesSearch && matchesClass && matchesStatus) {
                    card.style.display = 'block';
                    card.style.animation = 'scaleIn 0.5s ease-out';
                    visibleCount;
                } else {
                    card.style.display = 'none';
                }
            });

            // Show/hide no results message
            if (visibleCount === 0) {
                noResults.classList.remove('hidden');
                friendsGrid.style.display = 'none';
            } else {
                noResults.classList.add('hidden');
                friendsGrid.style.display = 'grid';
            }
        }

        // Add event listeners for search and filters
        searchInput.addEventListener('input', filterFriends);
        classFilter.addEventListener('change', filterFriends);
        statusFilter.addEventListener('change', filterFriends);

        // Add smooth animations on scroll
        const observerOptions = {
            threshold: 0.1,
            rootMargin: '0px 0px -50px 0px'
        };

        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    entry.target.style.opacity = '1';
                    entry.target.style.transform = 'translateY(0)';
                }
            });
        }, observerOptions);

        // Observe all friend cards for scroll animations
        document.querySelectorAll('.friend-card').forEach(card => {
            card.style.opacity = '0';
            card.style.transform = 'translateY(50px)';
            card.style.transition = 'all 0.6s ease-out';
            observer.observe(card);
        });

        // Add click effects for buttons
        document.querySelectorAll('button').forEach(button => {
            button.addEventListener('click', function(e) {
                // Create ripple effect
                const ripple = document.createElement('span');
                const rect = this.getBoundingClientRect();
                const size = Math.max(rect.width, rect.height);
                const x = e.clientX - rect.left - size / 2;
                const y = e.clientY - rect.top - size / 2;
                
                ripple.style.width = ripple.style.height = size  'px';
                ripple.style.left = x  'px';
                ripple.style.top = y  'px';
                ripple.classList.add('ripple');
                
                this.appendChild(ripple);
                
                setTimeout(() => {
                    ripple.remove();
                }, 600);
            });
        });

        // Add CSS for ripple effect
        const style = document.createElement('style');
        style.textContent = `
            .ripple {
                position: absolute;
                border-radius: 50%;
                background: rgba(255, 255, 255, 0.3);
                transform: scale(0);
                animation: ripple-animation 0.6s linear;
                pointer-events: none;
            }
            
            @keyframes ripple-animation {
                to {
                    transform: scale(4);
                    opacity: 0;
                }
            }
        `;
        document.head.appendChild(style);
    </script>
</body>
</html>
