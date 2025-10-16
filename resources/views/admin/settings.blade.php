<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Kulkul SMKN 13</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
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
    
    
     @include('admin.includes.sidebar')

    <!-- Main Content -->
    <div class="ml-64 min-h-screen">
        <!-- Top Navigation Bar -->
        <header class="bg-gradient-to-r from-slate-900 to-slate-950 border-b border-orange-500/20 sticky top-0 z-40">
            <div class="px-8 py-4 flex items-center justify-between">
                <!-- Search Bar -->
                <div class="flex-1 max-w-xl">
                    <div class="relative">
                        <input type="text" placeholder="Cari pengaturan..." 
                            class="w-full bg-slate-800/50 border border-slate-700 rounded-xl px-4 py-2.5 pl-10 text-white placeholder-slate-400 focus:outline-none focus:border-orange-500 transition-colors">
                        <i class="fas fa-search absolute left-3 top-3.5 text-slate-400"></i>
                    </div>
                </div>

                <!-- Right Menu -->
                <div class="flex items-center space-x-4 ml-6">
                    <button class="relative p-2 text-slate-400 hover:text-white transition-colors">
                        <i class="fas fa-bell text-xl"></i>
                        <span class="absolute top-1 right-1 w-2 h-2 bg-red-500 rounded-full"></span>
                    </button>

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

        <!-- Settings Content -->
        <main class="p-8">
            <!-- Header -->
            <div class="mb-8">
                <h1 class="text-4xl font-bold text-white mb-2">Pengaturan</h1>
                <p class="text-slate-400">Kelola pengaturan sistem dan preferensi Anda</p>
            </div>

            <div class="grid grid-cols-1 lg:grid-cols-4 gap-6">
                <!-- Settings Navigation -->
                <div class="lg:col-span-1">
                    <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl p-4 border border-slate-800 sticky top-24">
                        <nav class="space-y-1">
                            <button onclick="showTab('profile')" class="settings-tab active w-full text-left px-4 py-3 rounded-xl text-white hover:bg-slate-800 transition-colors flex items-center space-x-3">
                                <i class="fas fa-user-circle"></i>
                                <span>Profil</span>
                            </button>
                            <button onclick="showTab('account')" class="settings-tab w-full text-left px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 transition-colors flex items-center space-x-3">
                                <i class="fas fa-key"></i>
                                <span>Keamanan</span>
                            </button>
                        </nav>
                    </div>
                </div>

                <!-- Settings Content -->
                <div class="lg:col-span-3 space-y-6">
                    
                    <!-- Profile Tab -->
                    <div id="profile-tab" class="settings-content">
                        <!-- Profile Picture -->
                        <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl p-6 border border-slate-800">
                            <h2 class="text-xl font-bold text-white mb-6">Foto Profil</h2>
                            <div class="flex items-center space-x-6">
                                <div class="w-24 h-24 bg-gradient-to-br from-orange-500 to-red-600 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-white text-3xl"></i>
                                </div>
                                <div>
                                    <button class="px-4 py-2 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-lg hover:from-orange-400 hover:to-red-500 transition-all text-sm font-semibold">
                                        <i class="fas fa-upload mr-2"></i>Upload Foto
                                    </button>
                                    <button class="px-4 py-2 bg-slate-800 text-white rounded-lg hover:bg-slate-700 transition-all text-sm font-semibold ml-2">
                                        Hapus
                                    </button>
                                    <p class="text-slate-400 text-xs mt-2">JPG, PNG atau GIF. Maksimal 2MB</p>
                                </div>
                            </div>
                        </div>

                        <!-- Personal Information -->
                        <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl p-6 border border-slate-800">
                            <h2 class="text-xl font-bold text-white mb-6">Informasi Pribadi</h2>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-slate-400 text-sm mb-2">Nama Lengkap</label>
                                    <input type="text" value="Admin User" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors" readonly>
                                </div>
                                <div>
                                    <label class="block text-slate-400 text-sm mb-2">Email</label>
                                    <input type="email" value="admin@smkn13.sch.id" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors" readonly>
                                </div>
                                <div>
                                    <label class="block text-slate-400 text-sm mb-2">Nomor Telepon</label>
                                    <input type="tel" value="+62 812 3456 7890" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors" readonly>
                                </div>
                                <div>
                                    <label class="block text-slate-400 text-sm mb-2">Jabatan</label>
                                    <input type="text" value="Administrator" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors" readonly>
                                </div>
                            </div>
                            <div class="flex justify-end mt-6">
                            </div>
                        </div>
                    </div>

                    <!-- Account Security Tab -->
                    <div id="account-tab" class="settings-content hidden">
                        <!-- Change Password -->
                        <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl p-6 border border-slate-800">
                            <h2 class="text-xl font-bold text-white mb-6">Ubah Password</h2>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-slate-400 text-sm mb-2">Password Lama</label>
                                    <input type="password" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                                </div>
                                <div>
                                    <label class="block text-slate-400 text-sm mb-2">Password Baru</label>
                                    <input type="password" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                                </div>
                                <div>
                                    <label class="block text-slate-400 text-sm mb-2">Konfirmasi Password Baru</label>
                                    <input type="password" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                                </div>
                            </div>
                            <div class="flex justify-end mt-6">
                                <button class="px-6 py-2.5 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-lg hover:from-orange-400 hover:to-red-500 transition-all font-semibold">
                                    Update Password
                                </button>
                            </div>
                        </div>

                        <!-- Two-Factor Authentication -->
                         
                        <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl p-6 border border-slate-800">
                            <h2 class="text-xl font-bold text-white mb-4">Autentikasi Dua Faktor</h2>
                            <p class="text-slate-400 text-sm mb-6">Tambahkan lapisan keamanan ekstra ke akun Anda</p>
                            <div class="flex items-center justify-between p-4 bg-slate-800/50 rounded-xl">
                                <div class="flex items-center space-x-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-shield-alt text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <p class="text-white font-semibold">Status: Aktif</p>
                                        <p class="text-slate-400 text-sm">Terakhir digunakan 2 jam yang lalu</p>
                                    </div>
                                </div>
                                <button class="px-4 py-2 bg-slate-700 text-white rounded-lg hover:bg-slate-600 transition-all text-sm font-semibold">
                                    Kelola
                                </button>
                            </div>
                        </div>

                        <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl p-6 border border-slate-800">
                                <h2 class="text-xl font-bold text-white mb-6">Sesi Login</h2>
                                <div class="space-y-3">
                                <div class="flex items-center justify-between p-4 bg-slate-800/50 rounded-xl">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-check text-white"></i>
                                        </div>
                                        <div>
                                            <p class="text-white font-semibold">backup-2025-10-14.zip</p>
                                            <p class="text-slate-400 text-sm">14 Oktober 2025, 02:00 WIB • 243 MB</p>
                                        </div>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button class="px-3 py-2 bg-slate-700 text-white rounded-lg hover:bg-slate-600 transition-all text-sm">
                                            <i class="fas fa-download"></i>
                                        </button>
                                        <button class="px-3 py-2 bg-slate-700 text-white rounded-lg hover:bg-slate-600 transition-all text-sm">
                                            <i class="fas fa-undo"></i>
                                        </button>
                                    </div>
                                </div>

                                <div class="flex items-center justify-between p-4 bg-slate-800/50 rounded-xl">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-check text-white"></i>
                                        </div>
                                        <div>
                                            <p class="text-white font-semibold">backup-2025-10-13.zip</p>
                                            <p class="text-slate-400 text-sm">13 Oktober 2025, 02:00 WIB • 242 MB</p>
                                        </div>
                                    </div>
                                    <div class="flex space-x-2">
                                        <button class="px-3 py-2 bg-slate-700 text-white rounded-lg hover:bg-slate-600 transition-all text-sm">
                                            <i class="fas fa-download"></i>
                                        </button>
                                        <button class="px-3 py-2 bg-slate-700 text-white rounded-lg hover:bg-slate-600 transition-all text-sm">
                                            <i class="fas fa-undo"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                        <!-- Danger Zone -->
                            <div class="bg-gradient-to-br from-red-500/10 to-red-600/10 backdrop-blur-xl rounded-2xl p-6 border border-red-500/30 mt-6">
                                <h2 class="text-xl font-bold text-red-400 mb-4">Danger Zone</h2>
                                <p class="text-slate-400 text-sm mb-6">Tindakan berikut bersifat permanen dan tidak dapat dibatalkan</p>
                                <div class="space-y-3">
                                <button class="w-full px-4 py-3 bg-slate-800 text-red-400 rounded-lg hover:bg-slate-700 transition-all text-sm font-semibold flex items-center justify-between">
                                    <span><i class="fas fa-trash-alt mr-2"></i>Hapus Semua Data</span>
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                                <button class="w-full px-4 py-3 bg-slate-800 text-red-400 rounded-lg hover:bg-slate-700 transition-all text-sm font-semibold flex items-center justify-between">
                                    <span><i class="fas fa-redo mr-2"></i>Reset Sistem</span>
                                    <i class="fas fa-chevron-right"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div>
                        <p class="text-white font-medium">Windows • Chrome</p>
                        <p class="text-slate-400 text-sm">Bandung, Indonesia • Saat ini</p>
                    </div>
                </div>
            </div>
        </main>
    </div>
    <script src="{{ asset('js/openTab.js') }}"></script>
</body>
</html>

