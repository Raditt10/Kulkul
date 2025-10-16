<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teman Saya Kulkul</title>
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
    @include('user/includes.navbar')
  
    @include('user/includes.sidebar')

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

   @include('user/includes.footer')

  <script src="{{ asset('js/sidebar.js') }}"></script>
  <script src="{{ asset('js/searchFilter.js') }}"></script>
</body>
</html>
