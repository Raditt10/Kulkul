<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Kulkul SMKN 13</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        slate: { 850: '#1a2234' }
                    },
                    animation: {
                        'slide-in': 'slideIn 0.3s ease-out',
                        'fade-in': 'fadeIn 0.5s ease-out',
                        'pulse-slow': 'pulse 4s infinite',
                    }
                }
            }
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        .sidebar-scroll::-webkit-scrollbar { width: 6px; }
        .sidebar-scroll::-webkit-scrollbar-track { background: rgba(51, 65, 85, 0.3); border-radius: 10px; }
        .sidebar-scroll::-webkit-scrollbar-thumb { background: linear-gradient(to bottom, #f97316, #dc2626); border-radius: 10px; }
        .sidebar-scroll::-webkit-scrollbar-thumb:hover { background: linear-gradient(to bottom, #fb923c, #ef4444); }
    </style>
</head>
<body class="bg-slate-950">
    
    <!-- Sidebar -->
    <aside id="sidebar" class="fixed left-0 top-0 h-screen w-64 bg-gradient-to-b from-slate-900 to-slate-950 border-r border-orange-500/20 z-50 transition-transform duration-300 sidebar-scroll overflow-y-auto">
        <!-- Logo Header -->
        <div class="p-6 border-b border-orange-500/20">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                   <img src="{{ asset('images/logo.png') }}" alt="Logo SMKN 13 Bandung" class="w-10 h-10 object-contain">
                </div>
                <div>
                    <h1 class="text-white font-bold text-lg">Kulkul Admin</h1>
                    <p class="text-slate-400 text-xs">SMKN 13 Bandung</p>
                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="p-4 space-y-2">
            <!-- Dashboard -->
            <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-xl bg-gradient-to-r from-orange-500/20 to-red-500/20 text-orange-400 border border-orange-500/30 transition-all duration-300">
                <i class="fas fa-home text-lg"></i>
                <span class="font-semibold">Dashboard</span>
            </a>

            <!-- Ekstrakurikuler -->
            <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/50 transition-all duration-300">
                <i class="fas fa-users text-lg"></i>
                <span class="font-medium">Ekstrakurikuler</span>
            </a>

            <!-- Siswa -->
            <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/50 transition-all duration-300">
                <i class="fas fa-user-graduate text-lg"></i>
                <span class="font-medium">Siswa</span>
            </a>

            <!-- Pembina -->
            <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/50 transition-all duration-300">
                <i class="fas fa-chalkboard-teacher text-lg"></i>
                <span class="font-medium">Pembina</span>
            </a>

            <!-- Jadwal -->
            <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/50 transition-all duration-300">
                <i class="fas fa-calendar-alt text-lg"></i>
                <span class="font-medium">Jadwal</span>
            </a>

            <!-- Prestasi -->
            <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/50 transition-all duration-300">
                <i class="fas fa-trophy text-lg"></i>
                <span class="font-medium">Prestasi</span>
            </a>

            <!-- Laporan -->
            <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/50 transition-all duration-300">
                <i class="fas fa-file-alt text-lg"></i>
                <span class="font-medium">Laporan</span>
            </a>

            <!-- Divider -->
            <div class="my-4 border-t border-slate-800"></div>

            <!-- Pengaturan -->
            <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-slate-400 hover:text-white hover:bg-slate-800/50 transition-all duration-300">
                <i class="fas fa-cog text-lg"></i>
                <span class="font-medium">Pengaturan</span>
            </a>

            <!-- Logout -->
            <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-red-400 hover:text-red-300 hover:bg-red-500/10 transition-all duration-300">
                <i class="fas fa-sign-out-alt text-lg"></i>
                <span class="font-medium">Logout</span>
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <div class="ml-64 min-h-screen">
        <!-- Top Navigation Bar -->
        <header class="bg-gradient-to-r from-slate-900 to-slate-950 border-b border-orange-500/20 sticky top-0 z-40">
            <div class="px-8 py-4 flex items-center justify-between">
                <!-- Search Bar -->
                <div class="flex-1 max-w-xl">
                    <div class="relative">
                        <input type="text" placeholder="Cari data..." 
                            class="w-full bg-slate-800/50 border border-slate-700 rounded-xl px-4 py-2.5 pl-10 text-white placeholder-slate-400 focus:outline-none focus:border-orange-500 transition-colors">
                        <i class="fas fa-search absolute left-3 top-3.5 text-slate-400"></i>
                    </div>
                </div>

                <!-- Right Menu -->
                <div class="flex items-center space-x-4 ml-6">
                    <!-- Notifications -->
                    <button class="relative p-2 text-slate-400 hover:text-white transition-colors">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>

                    <!-- Profile -->
                    <div class="flex items-center space-x-3 pl-4 border-l border-slate-700">
                        <div class="text-right">
                            <p class="text-white font-semibold text-sm">Admin User</p>
                            <p class="text-slate-400 text-xs">Administrator</p>
                        </div>
                        <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-red-600 rounded-full flex items-center justify-center">
                            <i class="fas fa-user text-white"></i>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Dashboard Content -->
        <main class="p-8">
            <!-- Welcome Section -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-white mb-2">Dashboard Admin</h1>
                <p class="text-slate-400">Selamat datang kembali! Berikut adalah ringkasan sistem Kulkul SMKN 13 Bandung</p>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
                <!-- Card 1 -->
                <div class="bg-gradient-to-br from-orange-500/10 to-red-500/10 backdrop-blur-xl rounded-2xl p-6 border border-orange-500/20 hover:border-orange-500/40 transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-users text-white text-xl"></i>
                        </div>
                        <span class="text-green-400 text-sm font-semibold">+12%</span>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-1">1,234</h3>
                    <p class="text-slate-400 text-sm">Total Siswa</p>
                </div>

                <!-- Card 2 -->
                <div class="bg-gradient-to-br from-blue-500/10 to-cyan-500/10 backdrop-blur-xl rounded-2xl p-6 border border-blue-500/20 hover:border-blue-500/40 transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-clipboard-list text-white text-xl"></i>
                        </div>
                        <span class="text-green-400 text-sm font-semibold">+5</span>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-1">25</h3>
                    <p class="text-slate-400 text-sm">Ekstrakurikuler</p>
                </div>

                <!-- Card 3 -->
                <div class="bg-gradient-to-br from-purple-500/10 to-pink-500/10 backdrop-blur-xl rounded-2xl p-6 border border-purple-500/20 hover:border-purple-500/40 transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-trophy text-white text-xl"></i>
                        </div>
                        <span class="text-green-400 text-sm font-semibold">+8</span>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-1">142</h3>
                    <p class="text-slate-400 text-sm">Total Prestasi</p>
                </div>

                <!-- Card 4 -->
                <div class="bg-gradient-to-br from-green-500/10 to-emerald-500/10 backdrop-blur-xl rounded-2xl p-6 border border-green-500/20 hover:border-green-500/40 transition-all duration-300">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-chalkboard-teacher text-white text-xl"></i>
                        </div>
                        <span class="text-slate-400 text-sm font-semibold">Aktif</span>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-1">32</h3>
                    <p class="text-slate-400 text-sm">Pembina</p>
                </div>
            </div>

            <!-- Charts & Tables Section -->
            <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-8">
                <!-- Recent Activity -->
                <div class="lg:col-span-2 bg-slate-900/50 backdrop-blur-xl rounded-2xl p-6 border border-slate-800">
                    <div class="flex items-center justify-between mb-6">
                        <h2 class="text-xl font-bold text-white">Aktivitas Terbaru</h2>
                        <button class="text-orange-400 hover:text-orange-300 text-sm font-semibold">Lihat Semua</button>
                    </div>
                    <div class="space-y-4">
                        <!-- Activity Item -->
                        <div class="flex items-start space-x-4 p-4 bg-slate-800/50 rounded-xl hover:bg-slate-800 transition-colors">
                            <div class="w-10 h-10 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-user-plus text-white"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-white font-medium">Siswa baru mendaftar</p>
                                <p class="text-slate-400 text-sm">Ahmad Fauzi bergabung dengan Basket</p>
                                <p class="text-slate-500 text-xs mt-1">5 menit yang lalu</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4 p-4 bg-slate-800/50 rounded-xl hover:bg-slate-800 transition-colors">
                            <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-trophy text-white"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-white font-medium">Prestasi baru ditambahkan</p>
                                <p class="text-slate-400 text-sm">Juara 1 Lomba Debat Tingkat Provinsi</p>
                                <p class="text-slate-500 text-xs mt-1">2 jam yang lalu</p>
                            </div>
                        </div>

                        <div class="flex items-start space-x-4 p-4 bg-slate-800/50 rounded-xl hover:bg-slate-800 transition-colors">
                            <div class="w-10 h-10 bg-gradient-to-br from-purple-500 to-pink-600 rounded-lg flex items-center justify-center flex-shrink-0">
                                <i class="fas fa-calendar text-white"></i>
                            </div>
                            <div class="flex-1">
                                <p class="text-white font-medium">Jadwal baru dibuat</p>
                                <p class="text-slate-400 text-sm">Latihan Paduan Suara - Senin 15:00</p>
                                <p class="text-slate-500 text-xs mt-1">5 jam yang lalu</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Quick Stats -->
                <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl p-6 border border-slate-800">
                    <h2 class="text-xl font-bold text-white mb-6">Statistik Cepat</h2>
                    <div class="space-y-6">
                        <!-- Stat Item -->
                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-slate-400 text-sm">Tingkat Kehadiran</span>
                                <span class="text-white font-bold">87%</span>
                            </div>
                            <div class="w-full bg-slate-800 rounded-full h-2">
                                <div class="bg-gradient-to-r from-green-500 to-emerald-600 h-2 rounded-full" style="width: 87%"></div>
                            </div>
                        </div>

                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-slate-400 text-sm">Partisipasi Siswa</span>
                                <span class="text-white font-bold">92%</span>
                            </div>
                            <div class="w-full bg-slate-800 rounded-full h-2">
                                <div class="bg-gradient-to-r from-blue-500 to-cyan-600 h-2 rounded-full" style="width: 92%"></div>
                            </div>
                        </div>

                        <div>
                            <div class="flex items-center justify-between mb-2">
                                <span class="text-slate-400 text-sm">Kepuasan Pembina</span>
                                <span class="text-white font-bold">95%</span>
                            </div>
                            <div class="w-full bg-slate-800 rounded-full h-2">
                                <div class="bg-gradient-to-r from-orange-500 to-red-600 h-2 rounded-full" style="width: 95%"></div>
                            </div>
                        </div>

                        <!-- Quick Actions -->
                        <div class="mt-8 pt-6 border-t border-slate-800">
                            <h3 class="text-white font-semibold mb-4">Aksi Cepat</h3>
                            <div class="space-y-2">
                                <button class="w-full px-4 py-3 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-xl hover:from-orange-400 hover:to-red-500 transition-all duration-300 text-sm font-semibold">
                                    <i class="fas fa-plus mr-2"></i>Tambah Ekstrakurikuler
                                </button>
                                <button class="w-full px-4 py-3 bg-slate-800 text-white rounded-xl hover:bg-slate-700 transition-all duration-300 text-sm font-semibold">
                                    <i class="fas fa-file-download mr-2"></i>Export Laporan
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Upcoming Events -->
            <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl p-6 border border-slate-800">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-xl font-bold text-white">Jadwal Mendatang</h2>
                    <button class="text-orange-400 hover:text-orange-300 text-sm font-semibold">Lihat Kalender</button>
                </div>
                <div class="grid md:grid-cols-3 gap-4">
                    <!-- Event Card -->
                    <div class="bg-slate-800/50 rounded-xl p-4 border border-slate-700 hover:border-orange-500/50 transition-colors">
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-lg flex flex-col items-center justify-center">
                                <span class="text-white text-xs font-bold">OCT</span>
                                <span class="text-white text-lg font-bold">15</span>
                            </div>
                            <div>
                                <h3 class="text-white font-semibold">Lomba Basket</h3>
                                <p class="text-slate-400 text-xs">09:00 - 15:00</p>
                            </div>
                        </div>
                        <p class="text-slate-400 text-sm">Pertandingan persahabatan antar sekolah</p>
                    </div>

                    <div class="bg-slate-800/50 rounded-xl p-4 border border-slate-700 hover:border-blue-500/50 transition-colors">
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-lg flex flex-col items-center justify-center">
                                <span class="text-white text-xs font-bold">OCT</span>
                                <span class="text-white text-lg font-bold">18</span>
                            </div>
                            <div>
                                <h3 class="text-white font-semibold">Workshop Coding</h3>
                                <p class="text-slate-400 text-xs">14:00 - 16:00</p>
                            </div>
                        </div>
                        <p class="text-slate-400 text-sm">Pelatihan web development untuk pemula</p>
                    </div>

                    <div class="bg-slate-800/50 rounded-xl p-4 border border-slate-700 hover:border-purple-500/50 transition-colors">
                        <div class="flex items-center space-x-3 mb-3">
                            <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-lg flex flex-col items-center justify-center">
                                <span class="text-white text-xs font-bold">OCT</span>
                                <span class="text-white text-lg font-bold">20</span>
                            </div>
                            <div>
                                <h3 class="text-white font-semibold">Pentas Seni</h3>
                                <p class="text-slate-400 text-xs">18:00 - 21:00</p>
                            </div>
                        </div>
                        <p class="text-slate-400 text-sm">Pertunjukan seni dan budaya tahunan</p>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <script>
        // Toggle sidebar on mobile (optional)
        const sidebar = document.getElementById('sidebar');
        
        // Add smooth scroll behavior
        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function (e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    target.scrollIntoView({ behavior: 'smooth' });
                }
            });
        });
    </script>
</body>
</html>