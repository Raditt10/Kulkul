<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Settings - Kulkul SMKN 13</title>
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
    
    <!-- Sidebar (Include dari file terpisah) -->
    <!-- @include('admin.includes.sidebar') -->

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
                            <button onclick="showTab('notifications')" class="settings-tab w-full text-left px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 transition-colors flex items-center space-x-3">
                                <i class="fas fa-bell"></i>
                                <span>Notifikasi</span>
                            </button>
                            <button onclick="showTab('system')" class="settings-tab w-full text-left px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 transition-colors flex items-center space-x-3">
                                <i class="fas fa-cog"></i>
                                <span>Sistem</span>
                            </button>
                            <button onclick="showTab('backup')" class="settings-tab w-full text-left px-4 py-3 rounded-xl text-slate-400 hover:bg-slate-800 transition-colors flex items-center space-x-3">
                                <i class="fas fa-database"></i>
                                <span>Backup</span>
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
                                    <input type="text" value="Admin User" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                                </div>
                                <div>
                                    <label class="block text-slate-400 text-sm mb-2">Email</label>
                                    <input type="email" value="admin@smkn13.sch.id" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                                </div>
                                <div>
                                    <label class="block text-slate-400 text-sm mb-2">Nomor Telepon</label>
                                    <input type="tel" value="+62 812 3456 7890" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                                </div>
                                <div>
                                    <label class="block text-slate-400 text-sm mb-2">Jabatan</label>
                                    <input type="text" value="Administrator" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                                </div>
                            </div>
                            <div class="flex justify-end mt-6">
                                <button class="px-6 py-2.5 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-lg hover:from-orange-400 hover:to-red-500 transition-all font-semibold">
                                    Simpan Perubahan
                                </button>
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

                        <!-- Two Factor Authentication -->
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

                        <!-- Login Sessions -->
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
                        <div class="bg-gradient-to-br from-red-500/10 to-red-600/10 backdrop-blur-xl rounded-2xl p-6 border border-red-500/30">
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

                </div>
            </div>
        </main>
    </div>

    <script>
        function showTab(tabName) {
            // Hide all tabs
            document.querySelectorAll('.settings-content').forEach(content => {
                content.classList.add('hidden');
            });
            
            // Remove active class from all buttons
            document.querySelectorAll('.settings-tab').forEach(tab => {
                tab.classList.remove('active', 'text-white', 'bg-slate-800');
                tab.classList.add('text-slate-400');
            });
            
            // Show selected tab
            document.getElementById(tabName + '-tab').classList.remove('hidden');
            
            // Add active class to clicked button
            event.target.closest('.settings-tab').classList.add('active', 'text-white', 'bg-slate-800');
            event.target.closest('.settings-tab').classList.remove('text-slate-400');
        }
    </script>
</body>
</html><i class="fas fa-desktop text-green-400 text-xl"></i>
                                        <div>
                                            <p class="text-white font-medium">Windows • Chrome</p>
                                            <p class="text-slate-400 text-sm">Bandung, Indonesia • Saat ini</p>
                                        </div>
                                    </div>
                                    <span class="text-green-400 text-sm font-semibold">Aktif</span>
                                </div>
                                <div class="flex items-center justify-between p-4 bg-slate-800/50 rounded-xl">
                                    <div class="flex items-center space-x-4">
                                        <i class="fas fa-mobile-alt text-slate-400 text-xl"></i>
                                        <div>
                                            <p class="text-white font-medium">Android • Chrome Mobile</p>
                                            <p class="text-slate-400 text-sm">Bandung, Indonesia • 3 hari yang lalu</p>
                                        </div>
                                    </div>
                                    <button class="text-red-400 hover:text-red-300 text-sm font-semibold">Logout</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Notifications Tab -->
                    <div id="notifications-tab" class="settings-content hidden">
                        <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl p-6 border border-slate-800">
                            <h2 class="text-xl font-bold text-white mb-6">Preferensi Notifikasi</h2>
                            <div class="space-y-4">
                                <!-- Notification Item -->
                                <div class="flex items-center justify-between p-4 bg-slate-800/50 rounded-xl">
                                    <div>
                                        <p class="text-white font-semibold">Pendaftaran Siswa Baru</p>
                                        <p class="text-slate-400 text-sm">Dapatkan notifikasi saat ada siswa baru mendaftar</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" checked class="sr-only peer">
                                        <div class="w-11 h-6 bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600"></div>
                                    </label>
                                </div>

                                <div class="flex items-center justify-between p-4 bg-slate-800/50 rounded-xl">
                                    <div>
                                        <p class="text-white font-semibold">Prestasi Baru</p>
                                        <p class="text-slate-400 text-sm">Notifikasi saat ada prestasi baru ditambahkan</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" checked class="sr-only peer">
                                        <div class="w-11 h-6 bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600"></div>
                                    </label>
                                </div>

                                <div class="flex items-center justify-between p-4 bg-slate-800/50 rounded-xl">
                                    <div>
                                        <p class="text-white font-semibold">Jadwal Kegiatan</p>
                                        <p class="text-slate-400 text-sm">Pengingat untuk kegiatan yang akan datang</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" checked class="sr-only peer">
                                        <div class="w-11 h-6 bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600"></div>
                                    </label>
                                </div>

                                <div class="flex items-center justify-between p-4 bg-slate-800/50 rounded-xl">
                                    <div>
                                        <p class="text-white font-semibold">Laporan Mingguan</p>
                                        <p class="text-slate-400 text-sm">Ringkasan aktivitas sistem setiap minggu</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer">
                                        <div class="w-11 h-6 bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600"></div>
                                    </label>
                                </div>

                                <div class="flex items-center justify-between p-4 bg-slate-800/50 rounded-xl">
                                    <div>
                                        <p class="text-white font-semibold">Email Marketing</p>
                                        <p class="text-slate-400 text-sm">Terima update dan tips via email</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" class="sr-only peer">
                                        <div class="w-11 h-6 bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600"></div>
                                    </label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- System Tab -->
                    <div id="system-tab" class="settings-content hidden">
                        <!-- General Settings -->
                        <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl p-6 border border-slate-800">
                            <h2 class="text-xl font-bold text-white mb-6">Pengaturan Umum</h2>
                            <div class="space-y-4">
                                <div>
                                    <label class="block text-slate-400 text-sm mb-2">Nama Sekolah</label>
                                    <input type="text" value="SMKN 13 Bandung" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                                </div>
                                <div>
                                    <label class="block text-slate-400 text-sm mb-2">Bahasa Sistem</label>
                                    <select class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                                        <option>Bahasa Indonesia</option>
                                        <option>English</option>
                                    </select>
                                </div>
                                <div>
                                    <label class="block text-slate-400 text-sm mb-2">Zona Waktu</label>
                                    <select class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                                        <option>WIB (GMT+7)</option>
                                        <option>WITA (GMT+8)</option>
                                        <option>WIT (GMT+9)</option>
                                    </select>
                                </div>
                            </div>
                            <div class="flex justify-end mt-6">
                                <button class="px-6 py-2.5 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-lg hover:from-orange-400 hover:to-red-500 transition-all font-semibold">
                                    Simpan Perubahan
                                </button>
                            </div>
                        </div>

                        <!-- System Information -->
                        <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl p-6 border border-slate-800">
                            <h2 class="text-xl font-bold text-white mb-6">Informasi Sistem</h2>
                            <div class="grid md:grid-cols-2 gap-4">
                                <div class="p-4 bg-slate-800/50 rounded-xl">
                                    <p class="text-slate-400 text-sm mb-1">Versi Sistem</p>
                                    <p class="text-white font-semibold">v2.5.1</p>
                                </div>
                                <div class="p-4 bg-slate-800/50 rounded-xl">
                                    <p class="text-slate-400 text-sm mb-1">Terakhir Update</p>
                                    <p class="text-white font-semibold">15 Oktober 2025</p>
                                </div>
                                <div class="p-4 bg-slate-800/50 rounded-xl">
                                    <p class="text-slate-400 text-sm mb-1">Storage Terpakai</p>
                                    <p class="text-white font-semibold">2.4 GB / 10 GB</p>
                                </div>
                                <div class="p-4 bg-slate-800/50 rounded-xl">
                                    <p class="text-slate-400 text-sm mb-1">Total Pengguna</p>
                                    <p class="text-white font-semibold">1,267 Users</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Backup Tab -->
                    <div id="backup-tab" class="settings-content hidden">
                        <!-- Backup Settings -->
                        <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl p-6 border border-slate-800">
                            <h2 class="text-xl font-bold text-white mb-6">Backup Otomatis</h2>
                            <div class="space-y-4">
                                <div class="flex items-center justify-between p-4 bg-slate-800/50 rounded-xl">
                                    <div>
                                        <p class="text-white font-semibold">Backup Harian</p>
                                        <p class="text-slate-400 text-sm">Backup otomatis setiap hari pukul 02:00 WIB</p>
                                    </div>
                                    <label class="relative inline-flex items-center cursor-pointer">
                                        <input type="checkbox" checked class="sr-only peer">
                                        <div class="w-11 h-6 bg-slate-700 peer-focus:outline-none rounded-full peer peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-[2px] after:left-[2px] after:bg-white after:rounded-full after:h-5 after:w-5 after:transition-all peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600"></div>
                                    </label>
                                </div>

                                <div>
                                    <label class="block text-slate-400 text-sm mb-2">Simpan Backup Selama</label>
                                    <select class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                                        <option>7 Hari</option>
                                        <option>14 Hari</option>
                                        <option>30 Hari</option>
                                        <option>90 Hari</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <!-- Recent Backups -->
                        <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl p-6 border border-slate-800">
                            <div class="flex items-center justify-between mb-6">
                                <h2 class="text-xl font-bold text-white">Backup Terbaru</h2>
                                <button class="px-4 py-2 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-lg hover:from-orange-400 hover:to-red-500 transition-all text-sm font-semibold">
                                    <i class="fas fa-plus mr-2"></i>Buat Backup
                                </button>
                            </div>
                            <div class="space-y-3">
                                <div class="flex items-center justify-between p-4 bg-slate-800/50 rounded-xl">
                                    <div class="flex items-center space-x-4">
                                        <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                                            <i class="fas fa-check text-white"></i>
                                        </div>
                                        <div>
                                            <p class="text-white font-semibold">backup-2025-10-15.zip</p>
                                            <p class="text-slate-400 text-sm">15 Oktober 2025, 02:00 WIB • 245 MB</p>
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
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</body>
</html>

