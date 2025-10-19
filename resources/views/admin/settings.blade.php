<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">>
    <title>Coming soon</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        slate: { 850: '#1a2234' }
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'pulse-slow': 'pulse 4s infinite',
                        'slide-up': 'slideUp 0.6s ease-out',
                        'fade-in': 'fadeIn 0.5s ease-out'
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' }
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(30px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' }
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
        .sidebar-scroll::-webkit-scrollbar { width: 6px; }
        .sidebar-scroll::-webkit-scrollbar-track { background: rgba(51, 65, 85, 0.3); border-radius: 10px; }
        .sidebar-scroll::-webkit-scrollbar-thumb { background: linear-gradient(to bottom, #f97316, #dc2626); border-radius: 10px; }
        .settings-content { display: none; }
        .settings-content.active { display: block; animation: fadeIn 0.5s ease-out; }
        .settings-tab { transition: all 0.3s ease; }
        .settings-tab.active { background: linear-gradient(to right, #f97316, #dc2626) !important; color: white !important; transform: translateX(8px); }
        .hover-lift { transition: transform 0.3s ease, box-shadow 0.3s ease; }
        .hover-lift:hover { transform: translateY(-3px); box-shadow: 0 10px 30px rgba(251, 146, 60, 0.3); }
        .glass-effect { backdrop-filter: blur(20px); background: rgba(30, 41, 59, 0.8); }
        .progress-bar { transition: width 0.3s ease; }
    </style>
</head>
<body class="bg-slate-950 overflow-x-hidden">
    @php $page = "settings" @endphp
    @include('admin/includes.sidebar')

    @include('admin.includes.notif')

    <!-- Success Notification -->
    <div id="successNotification" class="fixed top-4 right-4 z-50 hidden">
        <div class="bg-green-500 text-white px-6 py-4 rounded-xl shadow-2xl flex items-center gap-3 animate-slide-up">
            <i class="fas fa-check-circle text-2xl"></i>
            <div>
                <div class="font-bold">Berhasil!</div>
                <div class="text-sm" id="successMessage">Perubahan telah disimpan</div>
            </div>
        </div>
    </div>

        <h1 class="text-3xl font-bold text-white mb-6">Pengaturan</h1>

        <!-- Main Settings Container -->
        <div class="flex flex-col lg:flex-row gap-6 max-w-7xl mx-auto">
            <!-- Sidebar Navigation -->
            <div class="lg:w-80 w-full">
                <div class="glass-effect rounded-2xl p-6 border border-slate-700 sticky top-4">
                    <h3 class="text-lg font-bold text-white mb-4 flex items-center gap-2">
                        <i class="fas fa-list text-orange-400"></i>
                        Kategori Pengaturan
                    </h3>
                    <nav class="space-y-2">
                        <button onclick="showTab('account')" class="settings-tab active w-full text-left px-4 py-3 rounded-xl flex items-center gap-3 text-white">
                            <i class="fas fa-user-circle text-lg"></i>
                            <div>
                                <div class="font-semibold">Akun</div>
                                <div class="text-xs opacity-75">Profil & Identitas</div>
                            </div>
                        </button>

                        <button onclick="showTab('notifications')" class="settings-tab w-full text-left px-4 py-3 rounded-xl flex items-center gap-3 text-slate-400 bg-slate-800/30 hover:bg-slate-800/50">
                            <i class="fas fa-bell text-lg"></i>
                            <div>
                                <div class="font-semibold">Notifikasi</div>
                                <div class="text-xs opacity-75">Alerts & Pesan</div>
                            </div>
                        </button>

                        <button onclick="showTab('language')" class="settings-tab w-full text-left px-4 py-3 rounded-xl flex items-center gap-3 text-slate-400 bg-slate-800/30 hover:bg-slate-800/50">
                            <i class="fas fa-globe text-lg"></i>
                            <div>
                                <div class="font-semibold">Bahasa</div>
                                <div class="text-xs opacity-75">Lokalisasi</div>
                            </div>
                        </button>

                        <button onclick="showTab('accessibility')" class="settings-tab w-full text-left px-4 py-3 rounded-xl flex items-center gap-3 text-slate-400 bg-slate-800/30 hover:bg-slate-800/50">
                            <i class="fas fa-universal-access text-lg"></i>
                            <div>
                                <div class="font-semibold">Aksesibilitas</div>
                                <div class="text-xs opacity-75">Kemudahan Akses</div>
                            </div>
                        </button>

                        <button onclick="showTab('storage')" class="settings-tab w-full text-left px-4 py-3 rounded-xl flex items-center gap-3 text-slate-400 bg-slate-800/30 hover:bg-slate-800/50">
                            <i class="fas fa-hdd text-lg"></i>
                            <div>
                                <div class="font-semibold">Penyimpanan</div>
                                <div class="text-xs opacity-75">Backup & Data</div>
                            </div>
                        </button>

                        <button onclick="showTab('sessions')" class="settings-tab w-full text-left px-4 py-3 rounded-xl flex items-center gap-3 text-slate-400 bg-slate-800/30 hover:bg-slate-800/50">
                            <i class="fas fa-desktop text-lg"></i>
                            <div>
                                <div class="font-semibold">Sesi Aktif</div>
                                <div class="text-xs opacity-75">Perangkat Login</div>
                            </div>
                        </button>

                        <button onclick="showTab('integrations')" class="settings-tab w-full text-left px-4 py-3 rounded-xl flex items-center gap-3 text-slate-400 bg-slate-800/30 hover:bg-slate-800/50">
                            <i class="fas fa-plug text-lg"></i>
                            <div>
                                <div class="font-semibold">Integrasi</div>
                                <div class="text-xs opacity-75">Apps & Services</div>
                            </div>
                        </button>

                        <button onclick="showTab('advanced')" class="settings-tab w-full text-left px-4 py-3 rounded-xl flex items-center gap-3 text-slate-400 bg-slate-800/30 hover:bg-slate-800/50">
                            <i class="fas fa-sliders-h text-lg"></i>
                            <div>
                                <div class="font-semibold">Lanjutan</div>
                                <div class="text-xs opacity-75">Developer Options</div>
                            </div>
                        </button>

                        <button onclick="showTab('danger')" class="settings-tab w-full text-left px-4 py-3 rounded-xl flex items-center gap-3 text-slate-400 bg-slate-800/30 hover:bg-slate-800/50">
                            <i class="fas fa-exclamation-triangle text-lg"></i>
                            <div>
                                <div class="font-semibold text-red-400">Zona Bahaya</div>
                                <div class="text-xs opacity-75">Hapus Data/Akun</div>
                            </div>
                        </button>
                    </nav>
                </div>
            </div>

            <!-- Content Area -->
            <div class="flex-1">
                <!-- Account Tab -->
                <div id="account-tab" class="settings-content active">
                    <div class="glass-effect rounded-2xl p-6 border border-slate-700 mb-6">
                        <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                            <i class="fas fa-user-circle text-orange-400"></i>
                            Informasi Akun
                        </h2>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-semibold text-slate-300 mb-2">Nama Lengkap</label>
                                <input type="text" value="Ahmad Fauzi" class="w-full px-4 py-3 bg-slate-800/50 border-2 border-slate-700 rounded-xl text-white focus:outline-none focus:border-orange-500">
                            </div>
                            <div class="grid grid-cols-2 gap-4">
                                <div>
                                    <label class="block text-sm font-semibold text-slate-300 mb-2">Email</label>
                                    <input type="email" value="ahmad@smkn13.sch.id" class="w-full px-4 py-3 bg-slate-800/50 border-2 border-slate-700 rounded-xl text-white focus:outline-none focus:border-orange-500">
                                </div>
                                <div>
                                    <label class="block text-sm font-semibold text-slate-300 mb-2">Nomor Telepon</label>
                                    <input type="tel" value="+62 812 3456 7890" class="w-full px-4 py-3 bg-slate-800/50 border-2 border-slate-700 rounded-xl text-white focus:outline-none focus:border-orange-500">
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-300 mb-2">Bio</label>
                                <textarea rows="3" class="w-full px-4 py-3 bg-slate-800/50 border-2 border-slate-700 rounded-xl text-white focus:outline-none focus:border-orange-500" placeholder="Ceritakan tentang diri Anda...">Siswa aktif di SMKN 13 Bandung, mengikuti ekstrakurikuler Robotika dan Basket.</textarea>
                            </div>
                            <button onclick="saveSettings('Profil')" class="px-6 py-3 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-xl hover-lift font-semibold">
                                <i class="fas fa-save mr-2"></i>Simpan Profil
                            </button>
                        </div>
                    </div>
                </div>

                <!-- Notifications Tab -->
                <div id="notifications-tab" class="settings-content">
                    <div class="glass-effect rounded-2xl p-6 border border-slate-700">
                        <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                            <i class="fas fa-bell text-orange-400"></i>
                            Preferensi Notifikasi
                        </h2>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-mobile-alt text-orange-400"></i>
                                    <div>
                                        <div class="font-medium text-white">Notifikasi Push</div>
                                        <div class="text-xs text-slate-400">Notifikasi real-time di perangkat</div>
                                    </div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-envelope text-orange-400"></i>
                                    <div>
                                        <div class="font-medium text-white">Email Notifikasi</div>
                                        <div class="text-xs text-slate-400">Pemberitahuan melalui email</div>
                                    </div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-users text-orange-400"></i>
                                    <div>
                                        <div class="font-medium text-white">Notifikasi Eskul</div>
                                        <div class="text-xs text-slate-400">Update kegiatan ekstrakurikuler</div>
                                    </div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-trophy text-orange-400"></i>
                                    <div>
                                        <div class="font-medium text-white">Notifikasi Prestasi</div>
                                        <div class="text-xs text-slate-400">Info lomba dan prestasi baru</div>
                                    </div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div class="flex items-center gap-3">
                                    <i class="fas fa-volume-up text-orange-400"></i>
                                    <div>
                                        <div class="font-medium text-white">Suara Notifikasi</div>
                                        <div class="text-xs text-slate-400">Efek suara untuk notifikasi</div>
                                    </div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Language Tab -->
                <div id="language-tab" class="settings-content">
                    <div class="glass-effect rounded-2xl p-6 border border-slate-700">
                        <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                            <i class="fas fa-globe text-orange-400"></i>
                            Bahasa & Lokalisasi
                        </h2>
                        <div class="space-y-4">
                            <div>
                                <label class="block text-sm font-semibold text-slate-300 mb-3">Bahasa Interface</label>
                                <div class="grid grid-cols-2 gap-3">
                                    <div class="p-4 bg-slate-800/30 rounded-xl border-2 border-orange-500 cursor-pointer hover-lift">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full bg-red-500 flex items-center justify-center text-white font-bold">ID</div>
                                            <div>
                                                <div class="font-medium text-white">Bahasa Indonesia</div>
                                                <div class="text-xs text-slate-400">Indonesian</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-4 bg-slate-800/30 rounded-xl border-2 border-slate-700 cursor-pointer hover:border-orange-400 hover-lift">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full bg-blue-500 flex items-center justify-center text-white font-bold">EN</div>
                                            <div>
                                                <div class="font-medium text-white">English</div>
                                                <div class="text-xs text-slate-400">English (US)</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-4 bg-slate-800/30 rounded-xl border-2 border-slate-700 cursor-pointer hover:border-orange-400 hover-lift">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full bg-green-500 flex items-center justify-center text-white font-bold">AR</div>
                                            <div>
                                                <div class="font-medium text-white">العربية</div>
                                                <div class="text-xs text-slate-400">Arabic</div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="p-4 bg-slate-800/30 rounded-xl border-2 border-slate-700 cursor-pointer hover:border-orange-400 hover-lift">
                                        <div class="flex items-center gap-3">
                                            <div class="w-10 h-10 rounded-full bg-yellow-500 flex items-center justify-center text-white font-bold">CN</div>
                                            <div>
                                                <div class="font-medium text-white">中文</div>
                                                <div class="text-xs text-slate-400">Chinese</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-300 mb-2">Zona Waktu</label>
                                <select class="w-full px-4 py-3 bg-slate-800/50 border-2 border-slate-700 rounded-xl text-white focus:outline-none focus:border-orange-500">
                                    <option value="WIB">WIB - Waktu Indonesia Barat (GMT+7)</option>
                                    <option value="WITA">WITA - Waktu Indonesia Tengah (GMT+8)</option>
                                    <option value="WIT">WIT - Waktu Indonesia Timur (GMT+9)</option>
                                </select>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-300 mb-2">Format Tanggal</label>
                                <select class="w-full px-4 py-3 bg-slate-800/50 border-2 border-slate-700 rounded-xl text-white focus:outline-none focus:border-orange-500">
                                    <option value="DD/MM/YYYY">DD/MM/YYYY (15/10/2025)</option>
                                    <option value="MM/DD/YYYY">MM/DD/YYYY (10/15/2025)</option>
                                    <option value="YYYY-MM-DD">YYYY-MM-DD (2025-10-15)</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Accessibility Tab -->
                <div id="accessibility-tab" class="settings-content">
                    <div class="glass-effect rounded-2xl p-6 border border-slate-700">
                        <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                            <i class="fas fa-universal-access text-orange-400"></i>
                            Aksesibilitas
                        </h2>
                        <div class="grid md:grid-cols-2 gap-4">
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white flex items-center gap-2">
                                        <i class="fas fa-text-height text-orange-400"></i>
                                        Ukuran Font Besar
                                    </div>
                                    <div class="text-xs text-slate-400">Perbesar teks</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white flex items-center gap-2">
                                        <i class="fas fa-adjust text-orange-400"></i>
                                        Kontras Tinggi
                                    </div>
                                    <div class="text-xs text-slate-400">Tingkatkan kontras</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white flex items-center gap-2">
                                        <i class="fas fa-keyboard text-orange-400"></i>
                                        Navigasi Keyboard
                                    </div>
                                    <div class="text-xs text-slate-400">Aktifkan shortcut</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white flex items-center gap-2">
                                        <i class="fas fa-volume-up text-orange-400"></i>
                                        Screen Reader
                                    </div>
                                    <div class="text-xs text-slate-400">Pembaca layar</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white flex items-center gap-2">
                                        <i class="fas fa-stopwatch text-orange-400"></i>
                                        Kurangi Animasi
                                    </div>
                                    <div class="text-xs text-slate-400">Sensitivitas gerak</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white flex items-center gap-2">
                                        <i class="fas fa-mouse-pointer text-orange-400"></i>
                                        Kursor Besar
                                    </div>
                                    <div class="text-xs text-slate-400">Perbesar kursor</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Storage Tab -->
                <div id="storage-tab" class="settings-content">
                    <div class="glass-effect rounded-2xl p-6 border border-slate-700 mb-6">
                        <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                            <i class="fas fa-hdd text-orange-400"></i>
                            Penyimpanan & Backup
                        </h2>
                        <div class="mb-6">
                            <div class="flex justify-between text-sm text-slate-400 mb-2">
                                <span>Penggunaan Penyimpanan</span>
                                <span>3.2 GB / 10 GB</span>
                            </div>
                            <div class="w-full bg-slate-700 rounded-full h-3">
                                <div class="bg-gradient-to-r from-orange-500 to-red-600 h-3 rounded-full" style="width: 32%"></div>
                            </div>
                        </div>
                        <div class="grid md:grid-cols-3 gap-4 mb-6">
                            <div class="bg-slate-800/30 rounded-xl p-4">
                                <div class="text-slate-400 text-sm mb-1">Dokumen</div>
                                <div class="text-white font-bold text-xl">1.2 GB</div>
                                <div class="text-xs text-slate-500">245 files</div>
                            </div>
                            <div class="bg-slate-800/30 rounded-xl p-4">
                                <div class="text-slate-400 text-sm mb-1">Gambar</div>
                                <div class="text-white font-bold text-xl">1.5 GB</div>
                                <div class="text-xs text-slate-500">1,234 files</div>
                            </div>
                            <div class="bg-slate-800/30 rounded-xl p-4">
                                <div class="text-slate-400 text-sm mb-1">Lainnya</div>
                                <div class="text-white font-bold text-xl">0.5 GB</div>
                                <div class="text-xs text-slate-500">89 files</div>
                            </div>
                        </div>
                        <div class="space-y-3">
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white">Auto Backup</div>
                                    <div class="text-sm text-slate-400">Backup otomatis harian</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white">Sinkronisasi Cloud</div>
                                    <div class="text-sm text-slate-400">Sinkron antar perangkat</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                        </div>
                        <div class="mt-6 text-center">
                            <button onclick="saveSettings('Backup')" class="px-6 py-3 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-xl hover-lift font-semibold">
                                <i class="fas fa-download mr-2"></i>Backup Sekarang
                            </button>
                        </div>
                    </div>

                    <div class="glass-effect rounded-2xl p-6 border border-slate-700">
                        <h3 class="text-xl font-bold text-white mb-4">Ekspor & Impor Data</h3>
                        <div class="grid md:grid-cols-3 gap-4">
                            <div class="bg-slate-800/30 rounded-xl p-4 text-center hover-lift">
                                <div class="w-16 h-16 bg-gradient-to-br from-blue-500 to-blue-600 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <i class="fas fa-download text-white text-xl"></i>
                                </div>
                                <div class="font-semibold text-white mb-2">Ekspor Data</div>
                                <div class="text-sm text-slate-400 mb-4">Format JSON</div>
                                <button class="w-full px-4 py-2 bg-blue-600 hover:bg-blue-700 text-white rounded-lg transition-all">
                                    Ekspor
                                </button>
                            </div>
                            <div class="bg-slate-800/30 rounded-xl p-4 text-center hover-lift">
                                <div class="w-16 h-16 bg-gradient-to-br from-green-500 to-green-600 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <i class="fas fa-upload text-white text-xl"></i>
                                </div>
                                <div class="font-semibold text-white mb-2">Impor Data</div>
                                <div class="text-sm text-slate-400 mb-4">Restore backup</div>
                                <button class="w-full px-4 py-2 bg-green-600 hover:bg-green-700 text-white rounded-lg transition-all">
                                    Impor
                                </button>
                            </div>
                            <div class="bg-slate-800/30 rounded-xl p-4 text-center hover-lift">
                                <div class="w-16 h-16 bg-gradient-to-br from-purple-500 to-purple-600 rounded-full flex items-center justify-center mx-auto mb-3">
                                    <i class="fas fa-file-pdf text-white text-xl"></i>
                                </div>
                                <div class="font-semibold text-white mb-2">Laporan PDF</div>
                                <div class="text-sm text-slate-400 mb-4">Generate report</div>
                                <button class="w-full px-4 py-2 bg-purple-600 hover:bg-purple-700 text-white rounded-lg transition-all">
                                    Generate
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Sessions Tab -->
                <div id="sessions-tab" class="settings-content">
                    <div class="glass-effect rounded-2xl p-6 border border-slate-700">
                        <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                            <i class="fas fa-desktop text-orange-400"></i>
                            Manajemen Sesi
                        </h2>
                        <div class="space-y-4">
                            <div class="bg-green-900/20 border border-green-500/30 rounded-xl p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-green-500 rounded-full flex items-center justify-center">
                                            <i class="fas fa-laptop text-white"></i>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-white flex items-center gap-2">
                                                Windows PC - Chrome
                                                <span class="px-2 py-1 bg-green-500 text-white text-xs rounded-full">Aktif</span>
                                            </div>
                                            <div class="text-sm text-slate-400">IP: 192.168.1.100 • Bandung</div>
                                            <div class="text-xs text-slate-500">Login: 2 jam lalu</div>
                                        </div>
                                    </div>
                                    <i class="fas fa-circle text-green-400 text-xs"></i>
                                </div>
                            </div>
                            <div class="bg-slate-800/30 rounded-xl p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-slate-600 rounded-full flex items-center justify-center">
                                            <i class="fas fa-mobile-alt text-white"></i>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-white">Android - Chrome</div>
                                            <div class="text-sm text-slate-400">IP: 192.168.1.105 • Bandung</div>
                                            <div class="text-xs text-slate-500">Login: 1 hari lalu</div>
                                        </div>
                                    </div>
                                    <button class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-sm rounded-lg transition-all">
                                        <i class="fas fa-sign-out-alt mr-1"></i>Logout
                                    </button>
                                </div>
                            </div>
                            <div class="bg-slate-800/30 rounded-xl p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-slate-600 rounded-full flex items-center justify-center">
                                            <i class="fas fa-tablet-alt text-white"></i>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-white">iPad - Safari</div>
                                            <div class="text-sm text-slate-400">IP: 192.168.1.108 • Bandung</div>
                                            <div class="text-xs text-slate-500">Login: 3 hari lalu</div>
                                        </div>
                                    </div>
                                    <button class="px-3 py-1 bg-red-600 hover:bg-red-700 text-white text-sm rounded-lg transition-all">
                                        <i class="fas fa-sign-out-alt mr-1"></i>Logout
                                    </button>
                                </div>
                            </div>
                            <div class="text-center pt-4">
                                <button class="px-6 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-all">
                                    <i class="fas fa-sign-out-alt mr-2"></i>Logout Semua Perangkat
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Integrations Tab -->
                <div id="integrations-tab" class="settings-content">
                    <div class="glass-effect rounded-2xl p-6 border border-slate-700">
                        <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                            <i class="fas fa-plug text-orange-400"></i>
                            Integrasi Aplikasi
                        </h2>
                        <div class="space-y-4">
                            <div class="bg-slate-800/30 rounded-xl p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-blue-500 rounded-lg flex items-center justify-center">
                                            <i class="fab fa-google text-white text-xl"></i>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-white">Google Workspace</div>
                                            <div class="text-sm text-slate-400">Gmail, Drive, Calendar</div>
                                            <div class="text-xs text-green-400">Terhubung</div>
                                        </div>
                                    </div>
                                    <button class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-all text-sm">
                                        Putuskan
                                    </button>
                                </div>
                            </div>
                            <div class="bg-slate-800/30 rounded-xl p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-blue-600 rounded-lg flex items-center justify-center">
                                            <i class="fab fa-microsoft text-white text-xl"></i>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-white">Microsoft 365</div>
                                            <div class="text-sm text-slate-400">OneDrive, Teams, Office</div>
                                            <div class="text-xs text-slate-500">Belum terhubung</div>
                                        </div>
                                    </div>
                                    <button class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition-all text-sm">
                                        Hubungkan
                                    </button>
                                </div>
                            </div>
                            <div class="bg-slate-800/30 rounded-xl p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-purple-500 rounded-lg flex items-center justify-center">
                                            <i class="fab fa-discord text-white text-xl"></i>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-white">Discord</div>
                                            <div class="text-sm text-slate-400">Komunikasi grup eskul</div>
                                            <div class="text-xs text-green-400">Terhubung</div>
                                        </div>
                                    </div>
                                    <button class="px-4 py-2 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-all text-sm">
                                        Putuskan
                                    </button>
                                </div>
                            </div>
                            <div class="bg-slate-800/30 rounded-xl p-4">
                                <div class="flex items-center justify-between">
                                    <div class="flex items-center gap-4">
                                        <div class="w-12 h-12 bg-pink-500 rounded-lg flex items-center justify-center">
                                            <i class="fab fa-instagram text-white text-xl"></i>
                                        </div>
                                        <div>
                                            <div class="font-semibold text-white">Instagram</div>
                                            <div class="text-sm text-slate-400">Bagikan prestasi</div>
                                            <div class="text-xs text-slate-500">Belum terhubung</div>
                                        </div>
                                    </div>
                                    <button class="px-4 py-2 bg-orange-500 hover:bg-orange-600 text-white rounded-lg transition-all text-sm">
                                        Hubungkan
                                    </button>
                                </div>
                            </div>
                            <div class="bg-slate-800/30 rounded-xl p-4">
                                <div class="flex items-center gap-4">
                                    <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-lg flex items-center justify-center">
                                        <i class="fas fa-plus text-white text-xl"></i>
                                    </div>
                                    <div>
                                        <div class="font-semibold text-white">Tambah Integrasi Baru</div>
                                        <div class="text-sm text-slate-400">Hubungkan aplikasi lainnya</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Advanced Tab -->
                <div id="advanced-tab" class="settings-content">
                    <div class="glass-effect rounded-2xl p-6 border border-slate-700 mb-6">
                        <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                            <i class="fas fa-sliders-h text-orange-400"></i>
                            Pengaturan Lanjutan
                        </h2>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white">Mode Developer</div>
                                    <div class="text-sm text-slate-400">Aktifkan fitur developer tools</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white">Debug Mode</div>
                                    <div class="text-sm text-slate-400">Tampilkan log debugging</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white">Beta Features</div>
                                    <div class="text-sm text-slate-400">Aktifkan fitur eksperimental</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white">Hardware Acceleration</div>
                                    <div class="text-sm text-slate-400">Gunakan GPU untuk rendering</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                        </div>
                    </div>

                    <div class="glass-effect rounded-2xl p-6 border border-slate-700">
                        <h3 class="text-xl font-bold text-white mb-4">Cache & Performance</h3>
                        <div class="grid md:grid-cols-2 gap-4 mb-4">
                            <div class="bg-slate-800/30 rounded-xl p-4">
                                <div class="text-slate-400 text-sm mb-1">Cache Size</div>
                                <div class="text-white font-bold text-2xl">458 MB</div>
                                <div class="text-xs text-slate-500">2,456 items cached</div>
                            </div>
                            <div class="bg-slate-800/30 rounded-xl p-4">
                                <div class="text-slate-400 text-sm mb-1">Load Time</div>
                                <div class="text-white font-bold text-2xl">1.2s</div>
                                <div class="text-xs text-green-400">Fast performance</div>
                            </div>
                        </div>
                        <button class="w-full px-6 py-3 bg-slate-800 hover:bg-slate-700 text-white rounded-xl transition-all font-semibold">
                            <i class="fas fa-trash mr-2"></i>Clear Cache & Data
                        </button>
                    </div>
                </div>

                <!-- Danger Zone Tab -->
                <div id="danger-tab" class="settings-content">
                    <div class="glass-effect rounded-2xl p-6 border border-red-500/50">
                        <h2 class="text-2xl font-bold text-red-400 mb-6 flex items-center gap-3">
                            <i class="fas fa-exclamation-triangle"></i>
                            Zona Bahaya
                        </h2>
                        <div class="bg-red-900/20 border border-red-500/30 rounded-xl p-6 mb-4">
                            <div class="flex items-start gap-4">
                                <i class="fas fa-exclamation-circle text-red-400 text-3xl"></i>
                                <div>
                                    <h3 class="text-white font-bold text-lg mb-2">Peringatan!</h3>
                                    <p class="text-slate-300 text-sm">
                                        Tindakan di bawah ini bersifat permanen dan tidak dapat dibatalkan. 
                                        Pastikan Anda telah membuat backup data penting sebelum melanjutkan.
                                    </p>
                                </div>
                            </div>
                        </div>

                        <div class="space-y-4">
                            <div class="bg-red-900/20 border border-red-500/30 rounded-xl p-4">
                                <div class="flex items-center justify-between mb-3">
                                    <div>
                                        <div class="font-semibold text-white text-lg flex items-center gap-2">
                                            <i class="fas fa-trash text-red-400"></i>
                                            Hapus Semua Data
                                        </div>
                                        <div class="text-sm text-slate-400 mt-1">
                                            Menghapus semua data akun secara permanen termasuk riwayat, 
                                            prestasi, dan file yang tersimpan
                                        </div>
                                    </div>
                                </div>
                                <button onclick="confirmDelete('data')" class="w-full px-6 py-3 bg-red-600 hover:bg-red-700 text-white rounded-lg transition-all font-semibold">
                                    <i class="fas fa-trash mr-2"></i>Hapus Semua Data
                                </button>
                            </div>

                            <div class="bg-red-900/20 border border-red-500/30 rounded-xl p-4">
                                <div class="flex items-center justify-between mb-3">
                                    <div>
                                        <div class="font-semibold text-white text-lg flex items-center gap-2">
                                            <i class="fas fa-user-times text-red-400"></i>
                                            Nonaktifkan Akun
                                        </div>
                                        <div class="text-sm text-slate-400 mt-1">
                                            Menonaktifkan akun sementara. Anda dapat mengaktifkannya kembali 
                                            dengan login dalam 30 hari
                                        </div>
                                    </div>
                                </div>
                                <button onclick="confirmDelete('deactivate')" class="w-full px-6 py-3 bg-orange-600 hover:bg-orange-700 text-white rounded-lg transition-all font-semibold">
                                    <i class="fas fa-user-slash mr-2"></i>Nonaktifkan Akun
                                </button>
                            </div>

                            <div class="bg-red-900/20 border border-red-500/30 rounded-xl p-4">
                                <div class="flex items-center justify-between mb-3">
                                    <div>
                                        <div class="font-semibold text-white text-lg flex items-center gap-2">
                                            <i class="fas fa-ban text-red-400"></i>
                                            Hapus Akun Permanen
                                        </div>
                                        <div class="text-sm text-slate-400 mt-1">
                                            Menghapus akun secara permanen. Semua data akan hilang dan 
                                            tidak dapat dipulihkan
                                        </div>
                                    </div>
                                </div>
                                <button onclick="confirmDelete('account')" class="w-full px-6 py-3 bg-red-700 hover:bg-red-800 text-white rounded-lg transition-all font-semibold">
                                    <i class="fas fa-user-times mr-2"></i>Hapus Akun Permanen
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Save All Button -->
        <div class="mt-8 text-center">
            <button onclick="saveAllSettings()" class="px-8 py-4 bg-gradient-to-r from-orange-500 to-red-600 text-white font-bold text-lg rounded-2xl hover-lift shadow-2xl">
                <i class="fas fa-save mr-3"></i>Simpan Semua Pengaturan
            </button>
        </div>
    </div>

    <script>
        // Tab Navigation
        function showTab(tabName) {
            // Hide all content
            document.querySelectorAll('.settings-content').forEach(content => {
                content.classList.remove('active');
            });
            
            // Remove active from all tabs
            document.querySelectorAll('.settings-tab').forEach(tab => {
                tab.classList.remove('active');
                tab.classList.add('bg-slate-800/30', 'text-slate-400');
            });
            
            // Show selected content
            document.getElementById(tabName + '-tab').classList.add('active');
            
            // Add active to clicked tab
            event.target.closest('.settings-tab').classList.add('active');
            event.target.closest('.settings-tab').classList.remove('bg-slate-800/30', 'text-slate-400');
        }

        // Password Strength Indicator
        document.getElementById('newPassword')?.addEventListener('input', function(e) {
            const password = e.target.value;
            const strength = calculatePasswordStrength(password);
            const bar = document.getElementById('passwordStrength');
            
            bar.style.width = strength + '%';
            
            if (strength < 30) {
                bar.className = 'progress-bar bg-red-500 h-2 rounded-full';
            } else if (strength < 60) {
                bar.className = 'progress-bar bg-yellow-500 h-2 rounded-full';
            } else {
                bar.className = 'progress-bar bg-green-500 h-2 rounded-full';
            }
        });

        function calculatePasswordStrength(password) {
            let strength = 0;
            if (password.length > 0) strength += 20;
            if (password.length >= 8) strength += 20;
            if (password.match(/[a-z]/) && password.match(/[A-Z]/)) strength += 20;
            if (password.match(/\d/)) strength += 20;
            if (password.match(/[^a-zA-Z\d]/)) strength += 20;
            return strength;
        }

        // Save Settings
        function saveSettings(category) {
            showNotification(`Pengaturan ${category} berhasil disimpan!`);
        }

        function saveAllSettings() {
            showNotification('Semua pengaturan berhasil disimpan!');
        }

        // Notification
        function showNotification(message) {
            const notification = document.getElementById('successNotification');
            const messageEl = document.getElementById('successMessage');
            messageEl.textContent = message;
            notification.classList.remove('hidden');
            
            setTimeout(() => {
                notification.classList.add('hidden');
            }, 3000);
        }

        // Confirm Delete
        function confirmDelete(type) {
            let message = '';
            if (type === 'data') {
                message = 'Apakah Anda yakin ingin menghapus SEMUA data? Tindakan ini tidak dapat dibatalkan!';
            } else if (type === 'deactivate') {
                message = 'Apakah Anda yakin ingin menonaktifkan akun? Anda dapat mengaktifkannya kembali dalam 30 hari.';
            } else if (type === 'account') {
                message = 'PERINGATAN! Akun akan dihapus PERMANEN dan tidak dapat dipulihkan. Ketik "HAPUS" untuk konfirmasi.';
                const input = prompt(message);
                if (input === 'HAPUS') {
                    alert('Akun berhasil dihapus. Anda akan diarahkan ke halaman login.');
                    return;
                }
                return;
            }
            
            if (confirm(message)) {
                showNotification('Tindakan berhasil dijalankan');
            }
        }

        // Initialize tooltips and animations
        document.addEventListener('DOMContentLoaded', function() {
            // Add smooth scroll
            document.querySelectorAll('a[href^="#"]').forEach(anchor => {
                anchor.addEventListener('click', function (e) {
                    e.preventDefault();
                    const target = document.querySelector(this.getAttribute('href'));
                    if (target) {
                        target.scrollIntoView({ behavior: 'smooth' });
                    }
                });
            });

            // Add keyboard shortcuts
            document.addEventListener('keydown', function(e) {
                // Ctrl/Cmd + S to save
                if ((e.ctrlKey || e.metaKey) && e.key === 's') {
                    e.preventDefault();
                    saveAllSettings();
                }
            });
        });
    </script>
</body>
</html>
                <!-- Security Tab -->
                <div id="security-tab" class="settings-content">
                    <div class="glass-effect rounded-2xl p-6 border border-slate-700 mb-6">
                        <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                            <i class="fas fa-shield-alt text-orange-400"></i>
                            Keamanan & Password
                        </h2>
                        <form class="space-y-4">
                            <div>
                                <label class="block text-sm font-semibold text-slate-300 mb-2">Password Lama</label>
                                <div class="relative">
                                    <input type="password" class="w-full px-4 py-3 pl-12 bg-slate-800/50 border-2 border-slate-700 rounded-xl text-white focus:outline-none focus:border-orange-500">
                                    <i class="fas fa-lock absolute left-4 top-1/2 transform -translate-y-1/2 text-slate-500"></i>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-300 mb-2">Password Baru</label>
                                <div class="relative">
                                    <input type="password" id="newPassword" class="w-full px-4 py-3 pl-12 bg-slate-800/50 border-2 border-slate-700 rounded-xl text-white focus:outline-none focus:border-orange-500">
                                    <i class="fas fa-key absolute left-4 top-1/2 transform -translate-y-1/2 text-slate-500"></i>
                                </div>
                                <div class="mt-2">
                                    <div class="text-xs text-slate-400 mb-1">Kekuatan Password:</div>
                                    <div class="w-full bg-slate-700 rounded-full h-2">
                                        <div id="passwordStrength" class="progress-bar bg-gradient-to-r from-red-500 to-green-500 h-2 rounded-full" style="width: 0%"></div>
                                    </div>
                                </div>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-300 mb-2">Konfirmasi Password</label>
                                <div class="relative">
                                    <input type="password" class="w-full px-4 py-3 pl-12 bg-slate-800/50 border-2 border-slate-700 rounded-xl text-white focus:outline-none focus:border-orange-500">
                                    <i class="fas fa-check-circle absolute left-4 top-1/2 transform -translate-y-1/2 text-slate-500"></i>
                                </div>
                            </div>
                            <button type="button" onclick="saveSettings('Password')" class="w-full px-6 py-3 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-xl hover-lift font-semibold">
                                <i class="fas fa-save mr-2"></i>Ubah Password
                            </button>
                        </form>
                    </div>

                    <div class="glass-effect rounded-2xl p-6 border border-slate-700">
                        <h3 class="text-xl font-bold text-white mb-4">Autentikasi Dua Faktor (2FA)</h3>
                        <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                            <div>
                                <div class="font-semibold text-white">Status 2FA</div>
                                <div class="text-sm text-slate-400">Tambahan keamanan untuk login</div>
                            </div>
                            <label class="relative inline-flex items-center cursor-pointer">
                                <input type="checkbox" class="sr-only peer">
                                <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                            </label>
                        </div>
                    </div>
                </div>

                <!-- Privacy Tab -->
                <div id="privacy-tab" class="settings-content">
                    <div class="glass-effect rounded-2xl p-6 border border-slate-700">
                        <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                            <i class="fas fa-user-shield text-orange-400"></i>
                            Privasi & Keamanan Data
                        </h2>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white">Profil Publik</div>
                                    <div class="text-sm text-slate-400">Tampilkan profil ke siswa lain</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white">Tampilkan Status Online</div>
                                    <div class="text-sm text-slate-400">Perlihatkan ketika Anda online</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white">Izinkan Tag dari Teman</div>
                                    <div class="text-sm text-slate-400">Teman dapat menandai Anda di postingan</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white">Analitik Aktivitas</div>
                                    <div class="text-sm text-slate-400">Izinkan pengumpulan data aktivitas</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Appearance Tab -->
                <div id="appearance-tab" class="settings-content">
                    <div class="glass-effect rounded-2xl p-6 border border-slate-700">
                        <h2 class="text-2xl font-bold text-white mb-6 flex items-center gap-3">
                            <i class="fas fa-palette text-orange-400"></i>
                            Tampilan & Tema
                        </h2>
                        <div class="space-y-4">
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white flex items-center gap-2">
                                        <i class="fas fa-moon text-orange-400"></i>
                                        Mode Gelap
                                    </div>
                                    <div class="text-sm text-slate-400">Aktifkan tampilan gelap</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white flex items-center gap-2">
                                        <i class="fas fa-magic text-orange-400"></i>
                                        Animasi Interface
                                    </div>
                                    <div class="text-sm text-slate-400">Efek transisi dan animasi</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" checked class="sr-only peer">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                            <div class="flex items-center justify-between p-4 bg-slate-800/30 rounded-xl">
                                <div>
                                    <div class="font-semibold text-white flex items-center gap-2">
                                        <i class="fas fa-compress-arrows-alt text-orange-400"></i>
                                        Mode Kompak
                                    </div>
                                    <div class="text-sm text-slate-400">Tampilan lebih padat</div>
                                </div>
                                <label class="relative inline-flex items-center cursor-pointer">
                                    <input type="checkbox" class="sr-only peer">
                                    <div class="w-14 h-7 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                    <div class="absolute left-1 top-1 w-5 h-5 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-7"></div>
                                </label>
                            </div>
                            <div>
                                <label class="block text-sm font-semibold text-slate-300 mb-3">Warna Aksen</label>
                                <div class="grid grid-cols-6 gap-3">
                                    <button class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-lg border-2 border-orange-400 shadow-lg"></button>
                                    <button class="w-12 h-12 bg-gradient-to-br from-blue-500 to-blue-700 rounded-lg hover:border-2 hover:border-blue-400"></button>
                                    <button class="w-12 h-12 bg-gradient-to-br from-green-500 to-green-700 rounded-lg hover:border-2 hover:border-green-400"></button>
                                    <button class="w-12 h-12 bg-gradient-to-br from-purple-500 to-purple-700 rounded-lg hover:border-2 hover:border-purple-400"></button>
                                    <button class="w-12 h-12 bg-gradient-to-br from-pink-500 to-pink-700 rounded-lg hover:border-2 hover:border-pink-400"></button>
                                    <button class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-yellow-700 rounded-lg hover:border-2 hover:border-yellow-400"></button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    <script src="{{ asset('notif.js') }}"></script>
    </body>
</html>
