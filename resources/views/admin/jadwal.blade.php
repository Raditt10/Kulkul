<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <title>Admin Jadwal Kulkul</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        slate: { 850: '#1a2234' }
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
        .modal { display: none; }
        .modal.active { display: flex; }
    </style>
</head>
<body class="bg-slate-950">
    @php $site = 'schedule' @endphp
    @include('admin/includes.sidebar')
    
    <!-- Main Content -->
    <div class="ml-64 min-h-screen">
        <!-- Top Navigation Bar -->
        <header class="bg-gradient-to-r from-slate-900 to-slate-950 border-b border-orange-500/20 sticky top-0 z-40">
            <div class="px-8 py-4 flex items-center justify-between">
                <div class="flex-1 max-w-xl">
                    <div class="relative">
                        <input type="text" id="searchInput" placeholder="Cari jadwal..." 
                            class="w-full bg-slate-800/50 border border-slate-700 rounded-xl px-4 py-2.5 pl-10 text-white placeholder-slate-400 focus:outline-none focus:border-orange-500 transition-colors">
                        <i class="fas fa-search absolute left-3 top-3.5 text-slate-400"></i>
                    </div>
                </div>

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

        <!-- Page Content -->
        <main class="p-8">
            <!-- Page Header -->
            <div class="mb-8 flex items-center justify-between">
                <div>
                    <h1 class="text-4xl font-bold text-white mb-2">Jadwal Kegiatan</h1>
                    <p class="text-slate-400">Kelola jadwal ekstrakurikuler dan kegiatan sekolah</p>
                </div>
                <div class="flex space-x-3">
                    <button onclick="toggleView('calendar')" id="calendarViewBtn" class="px-6 py-3 bg-slate-800 text-white rounded-xl hover:bg-slate-700 transition-all duration-300 font-semibold">
                        <i class="fas fa-calendar-alt mr-2"></i>Tampilan Kalender
                    </button>
                    <button onclick="openModal()" class="px-6 py-3 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-xl hover:from-orange-400 hover:to-red-500 transition-all duration-300 font-semibold">
                        <i class="fas fa-plus mr-2"></i>Tambah Jadwal
                    </button>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <div class="bg-gradient-to-br from-blue-500/10 to-cyan-500/10 backdrop-blur-xl rounded-xl p-6 border border-blue-500/20">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400 text-sm">Jadwal Hari Ini</p>
                            <h3 class="text-3xl font-bold text-white" id="todaySchedule">8</h3>
                        </div>
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-calendar-day text-white text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-green-500/10 to-emerald-500/10 backdrop-blur-xl rounded-xl p-6 border border-green-500/20">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400 text-sm">Minggu Ini</p>
                            <h3 class="text-3xl font-bold text-white">32</h3>
                        </div>
                        <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-calendar-week text-white text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-purple-500/10 to-pink-500/10 backdrop-blur-xl rounded-xl p-6 border border-purple-500/20">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400 text-sm">Upcoming Events</p>
                            <h3 class="text-3xl font-bold text-white">5</h3>
                        </div>
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-star text-white text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-orange-500/10 to-red-500/10 backdrop-blur-xl rounded-xl p-6 border border-orange-500/20">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400 text-sm">Konflik Jadwal</p>
                            <h3 class="text-3xl font-bold text-white">2</h3>
                        </div>
                        <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-exclamation-triangle text-white text-2xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter Section -->
            <div class="mb-6 flex items-center justify-between flex-wrap gap-4">
                <div class="flex items-center space-x-3">
                    <button onclick="filterHari('all')" class="filter-btn active px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-400 transition-colors font-medium">
                        Semua Hari
                    </button>
                    <button onclick="filterHari('Senin')" class="filter-btn px-4 py-2 bg-slate-800 text-slate-400 rounded-lg hover:bg-slate-700 transition-colors font-medium">
                        Senin
                    </button>
                    <button onclick="filterHari('Selasa')" class="filter-btn px-4 py-2 bg-slate-800 text-slate-400 rounded-lg hover:bg-slate-700 transition-colors font-medium">
                        Selasa
                    </button>
                    <button onclick="filterHari('Rabu')" class="filter-btn px-4 py-2 bg-slate-800 text-slate-400 rounded-lg hover:bg-slate-700 transition-colors font-medium">
                        Rabu
                    </button>
                    <button onclick="filterHari('Kamis')" class="filter-btn px-4 py-2 bg-slate-800 text-slate-400 rounded-lg hover:bg-slate-700 transition-colors font-medium">
                        Kamis
                    </button>
                    <button onclick="filterHari('Jumat')" class="filter-btn px-4 py-2 bg-slate-800 text-slate-400 rounded-lg hover:bg-slate-700 transition-colors font-medium">
                        Jumat
                    </button>
                    <button onclick="filterHari('Sabtu')" class="filter-btn px-4 py-2 bg-slate-800 text-slate-400 rounded-lg hover:bg-slate-700 transition-colors font-medium">
                        Sabtu
                    </button>
                </div>

                <select id="ekskulFilter" onchange="applyFilters()" class="bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-orange-500">
                    <option value="all">Semua Ekstrakurikuler</option>
                    <option value="Basket">Basket</option>
                    <option value="Futsal">Futsal</option>
                    <option value="Voli">Voli</option>
                    <option value="Paduan Suara">Paduan Suara</option>
                    <option value="Tari Tradisional">Tari Tradisional</option>
                    <option value="Band">Band</option>
                    <option value="Robotika">Robotika</option>
                    <option value="Bahasa Inggris">Bahasa Inggris</option>
                    <option value="Pramuka">Pramuka</option>
                </select>
            </div>

            <!-- Schedule Cards View -->
            <div id="scheduleView">
                <div id="jadwalGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Cards will be inserted here -->
                </div>
            </div>

            <!-- Calendar View (Hidden by default) -->
            <div id="calendarView" class="hidden">
                <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl border border-slate-800 p-6">
                    <div class="flex items-center justify-between mb-6">
                        <button onclick="changeMonth(-1)" class="p-2 bg-slate-800 hover:bg-slate-700 text-white rounded-lg transition-colors">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <h2 class="text-2xl font-bold text-white" id="currentMonth">Oktober 2025</h2>
                        <button onclick="changeMonth(1)" class="p-2 bg-slate-800 hover:bg-slate-700 text-white rounded-lg transition-colors">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>

                    <!-- Calendar Grid -->
                    <div class="grid grid-cols-7 gap-2">
                        <!-- Days Header -->
                        <div class="text-center py-3 text-slate-400 font-semibold text-sm">Min</div>
                        <div class="text-center py-3 text-slate-400 font-semibold text-sm">Sen</div>
                        <div class="text-center py-3 text-slate-400 font-semibold text-sm">Sel</div>
                        <div class="text-center py-3 text-slate-400 font-semibold text-sm">Rab</div>
                        <div class="text-center py-3 text-slate-400 font-semibold text-sm">Kam</div>
                        <div class="text-center py-3 text-slate-400 font-semibold text-sm">Jum</div>
                        <div class="text-center py-3 text-slate-400 font-semibold text-sm">Sab</div>
                        
                        <!-- Calendar Days -->
                        <div id="calendarDays" class="col-span-7 grid grid-cols-7 gap-2">
                            <!-- Days will be inserted here -->
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal Add/Edit Jadwal -->
    <div id="jadwalModal" class="modal fixed inset-0 bg-black/70 backdrop-blur-sm items-center justify-center z-50">
        <div class="bg-slate-900 rounded-2xl p-8 max-w-2xl w-full mx-4 border border-slate-800 max-h-[90vh] overflow-y-auto">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-white">Tambah Jadwal</h2>
                <button onclick="closeModal()" class="text-slate-400 hover:text-white transition-colors">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>

            <form id="jadwalForm" class="space-y-4">
                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Ekstrakurikuler</label>
                    <select id="ekskul" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                        <option value="">Pilih Ekstrakurikuler</option>
                        <option value="Basket">Basket</option>
                        <option value="Futsal">Futsal</option>
                        <option value="Voli">Voli</option>
                        <option value="Paduan Suara">Paduan Suara</option>
                        <option value="Tari Tradisional">Tari Tradisional</option>
                        <option value="Band">Band</option>
                        <option value="Robotika">Robotika</option>
                        <option value="Bahasa Inggris">Bahasa Inggris</option>
                        <option value="Pramuka">Pramuka</option>
                    </select>
                </div>

                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Jenis Kegiatan</label>
                    <select id="jenisKegiatan" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                        <option value="Latihan Rutin">Latihan Rutin</option>
                        <option value="Lomba">Lomba</option>
                        <option value="Pertandingan">Pertandingan</option>
                        <option value="Workshop">Workshop</option>
                        <option value="Pentas">Pentas/Performance</option>
                        <option value="Evaluasi">Evaluasi</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                </div>

                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Nama Kegiatan</label>
                    <input type="text" id="namaKegiatan" required placeholder="Contoh: Latihan Basket" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">Hari</label>
                        <select id="hari" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">Tanggal</label>
                        <input type="date" id="tanggal" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">Waktu Mulai</label>
                        <input type="time" id="waktuMulai" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                    </div>

                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">Waktu Selesai</label>
                        <input type="time" id="waktuSelesai" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                    </div>
                </div>

                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Lokasi/Tempat</label>
                    <input type="text" id="lokasi" required placeholder="Contoh: Lapangan Basket" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                </div>

                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Pembina</label>
                    <input type="text" id="pembina" required placeholder="Nama Pembina" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                </div>

                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Keterangan</label>
                    <textarea id="keterangan" rows="3" placeholder="Tambahkan catatan atau keterangan..." class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors"></textarea>
                </div>

                <div class="flex space-x-3 pt-4">
                    <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-xl hover:from-orange-400 hover:to-red-500 transition-all duration-300 font-semibold">
                        <i class="fas fa-save mr-2"></i>Simpan Jadwal
                    </button>
                    <button type="button" onclick="closeModal()" class="px-6 py-3 bg-slate-800 text-white rounded-xl hover:bg-slate-700 transition-all duration-300 font-semibold">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <script>
        // Sample Data
        let jadwalData = [
            { id: 1, ekskul: 'Basket', jenis: 'Latihan Rutin', nama: 'Latihan Basket', hari: 'Senin', tanggal: '2025-10-20', waktu_mulai: '15:00', waktu_selesai: '17:00', lokasi: 'Lapangan Basket', pembina: 'Budi Santoso', keterangan: 'Latihan teknik dasar' },
            { id: 2, ekskul: 'Paduan Suara', jenis: 'Latihan Rutin', nama: 'Latihan Vokal', hari: 'Senin', tanggal: '2025-10-20', waktu_mulai: '14:00', waktu_selesai: '16:00', lokasi: 'Ruang Musik', pembina: 'Siti Nurhaliza', keterangan: 'Persiapan pentas seni' },
            { id: 3, ekskul: 'Futsal', jenis: 'Pertandingan', nama: 'Pertandingan Persahabatan', hari: 'Selasa', tanggal: '2025-10-21', waktu_mulai: '15:30', waktu_selesai: '17:30', lokasi: 'Lapangan Futsal', pembina: 'Ahmad Rifai', keterangan: 'Vs SMKN 1 Bandung' },
            { id: 4, ekskul: 'Robotika', jenis: 'Workshop', nama: 'Workshop Arduino', hari: 'Rabu', tanggal: '2025-10-22', waktu_mulai: '13:00', waktu_selesai: '15:00', lokasi: 'Lab Komputer', pembina: 'Irfan Hakim', keterangan: 'Pemrograman dasar Arduino' },
            { id: 5, ekskul: 'Tari Tradisional', jenis: 'Latihan Rutin', nama: 'Latihan Tari Jaipong', hari: 'Kamis', tanggal: '2025-10-23', waktu_mulai: '15:00', waktu_selesai: '17:00', lokasi: 'Aula', pembina: 'Dewi Lestari', keterangan: '' },
            { id: 6, ekskul: 'Basket', jenis: 'Latihan Rutin', nama: 'Latihan Basket', hari: 'Kamis', tanggal: '2025-10-23', waktu_mulai: '15:00', waktu_selesai: '17:00', lokasi: 'Lapangan Basket', pembina: 'Budi Santoso', keterangan: 'Latihan strategi tim' },
            { id: 7, ekskul: 'Bahasa Inggris', jenis: 'Latihan Rutin', nama: 'English Conversation', hari: 'Jumat', tanggal: '2025-10-24', waktu_mulai: '14:00', waktu_selesai: '16:00', lokasi: 'Ruang Kelas 301', pembina: 'Sarah Johnson', keterangan: 'Speaking practice' },
            { id: 8, ekskul: 'Band', jenis: 'Latihan Rutin', nama: 'Latihan Band', hari: 'Jumat', tanggal: '2025-10-24', waktu_mulai: '15:00', waktu_selesai: '18:00', lokasi: 'Studio Musik', pembina: 'Rian Maulana', keterangan: 'Latihan lagu baru' },
            { id: 9, ekskul: 'Pramuka', jenis: 'Latihan Rutin', nama: 'Latihan Pramuka', hari: 'Sabtu', tanggal: '2025-10-25', waktu_mulai: '08:00', waktu_selesai: '12:00', lokasi: 'Lapangan Upacara', pembina: 'Eko Prasetyo', keterangan: 'PBB dan tali-temali' },
            { id: 10, ekskul: 'Voli', jenis: 'Latihan Rutin', nama: 'Latihan Voli', hari: 'Rabu', tanggal: '2025-10-22', waktu_mulai: '15:00', waktu_selesai: '17:00', lokasi: 'Lapangan Voli', pembina: 'Diana Kusuma', keterangan: 'Latihan servis dan smash' },
            { id: 11, ekskul: 'Basket', jenis: 'Lomba', nama: 'Lomba Basket Antar Sekolah', hari: 'Sabtu', tanggal: '2025-10-25', waktu_mulai: '09:00', waktu_selesai: '15:00', lokasi: 'GOR Pajajaran', pembina: 'Budi Santoso', keterangan: 'Tingkat Kota Bandung' },
            { id: 12, ekskul: 'Tari Tradisional', jenis: 'Pentas', nama: 'Pentas Seni Budaya', hari: 'Jumat', tanggal: '2025-10-31', waktu_mulai: '18:00', waktu_selesai: '21:00', lokasi: 'Auditorium Sekolah', pembina: 'Dewi Lestari', keterangan: 'Pentas tahunan' },
            { id: 13, ekskul: 'Futsal', jenis: 'Latihan Rutin', nama: 'Latihan Futsal', hari: 'Selasa', tanggal: '2025-10-21', waktu_mulai: '15:30', waktu_selesai: '17:30', lokasi: 'Lapangan Futsal', pembina: 'Ahmad Rifai', keterangan: 'Latihan taktik dan strategi' },
            { id: 14, ekskul: 'Robotika', jenis: 'Latihan Rutin', nama: 'Latihan Robotika', hari: 'Jumat', tanggal: '2025-10-24', waktu_mulai: '13:00', waktu_selesai: '15:00', lokasi: 'Lab Komputer', pembina: 'Irfan Hakim', keterangan: 'Persiapan lomba robotik' },
            { id: 15, ekskul: 'Bahasa Inggris', jenis: 'Evaluasi', nama: 'Evaluasi Progress', hari: 'Selasa', tanggal: '2025-10-28', waktu_mulai: '14:00', waktu_selesai: '16:00', lokasi: 'Ruang Kelas 301', pembina: 'Sarah Johnson', keterangan: 'Test speaking dan writing' },
        ];

        let currentFilter = 'all';
        let currentEkskulFilter = 'all';

        // Render Schedule Cards
        function renderSchedule(data) {
            const grid = document.getElementById('jadwalGrid');
            grid.innerHTML = '';

            const jenisColors = {
                'Latihan Rutin': { bg: 'from-blue-500/10 to-cyan-500/10', border: 'border-blue-500/20', icon: 'from-blue-500 to-cyan-600' },
                'Lomba': { bg: 'from-orange-500/10 to-red-500/10', border: 'border-orange-500/20', icon: 'from-orange-500 to-red-600' },
                'Pertandingan': { bg: 'from-purple-500/10 to-pink-500/10', border: 'border-purple-500/20', icon: 'from-purple-500 to-pink-600' },
                'Workshop': { bg: 'from-green-500/10 to-emerald-500/10', border: 'border-green-500/20', icon: 'from-green-500 to-emerald-600' },
                'Pentas': { bg: 'from-yellow-500/10 to-orange-500/10', border: 'border-yellow-500/20', icon: 'from-yellow-500 to-orange-600' },
                'Evaluasi': { bg: 'from-slate-500/10 to-slate-600/10', border: 'border-slate-500/20', icon: 'from-slate-500 to-slate-600' },
                'Lainnya': { bg: 'from-slate-500/10 to-slate-600/10', border: 'border-slate-500/20', icon: 'from-slate-500 to-slate-600' }
            };

            if (data.length === 0) {
                grid.innerHTML = `
                    <div class="col-span-3 text-center py-12">
                        <i class="fas fa-calendar-times text-6xl text-slate-600 mb-4"></i>
                        <p class="text-slate-400 text-lg">Tidak ada jadwal yang ditemukan</p>
                    </div>
                `;
                return;
            }

            data.forEach(jadwal => {
                const colors = jenisColors[jadwal.jenis] || jenisColors['Lainnya'];
                const card = document.createElement('div');
                card.className = `bg-gradient-to-br ${colors.bg} backdrop-blur-xl rounded-2xl p-6 border ${colors.border} hover:border-orange-500/30 transition-all duration-300`;
                
                card.innerHTML = `
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-gradient-to-br ${colors.icon} rounded-xl flex items-center justify-center">
                                <i class="fas fa-calendar-check text-white text-xl"></i>
                            </div>
                            <div>
                                <span class="px-3 py-1 rounded-full text-xs font-semibold bg-orange-500/20 text-orange-400">
                                    ${jadwal.jenis}
                                </span>
                            </div>
                        </div>
                        <div class="flex space-x-1">
                            <button onclick="editJadwal(${jadwal.id})" class="p-2 text-slate-400 hover:text-blue-400 transition-colors">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="deleteJadwal(${jadwal.id})" class="p-2 text-slate-400 hover:text-red-400 transition-colors">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>

                    <h3 class="text-xl font-bold text-white mb-2">${jadwal.nama}</h3>
                    <p class="text-orange-400 font-semibold mb-4">${jadwal.ekskul}</p>

                    <div class="space-y-2 mb-4">
                        <div class="flex items-center text-sm">
                            <i class="fas fa-calendar text-slate-400 w-5 mr-2"></i>
                            <span class="text-slate-300">${jadwal.hari}, ${formatDate(jadwal.tanggal)}</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <i class="fas fa-clock text-slate-400 w-5 mr-2"></i>
                            <span class="text-slate-300">${jadwal.waktu_mulai} - ${jadwal.waktu_selesai}</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <i class="fas fa-map-marker-alt text-slate-400 w-5 mr-2"></i>
                            <span class="text-slate-300">${jadwal.lokasi}</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <i class="fas fa-user-tie text-slate-400 w-5 mr-2"></i>
                            <span class="text-slate-300">${jadwal.pembina}</span>
                        </div>
                    </div>

                    ${jadwal.keterangan ? `
                        <div class="pt-4 border-t border-slate-700">
                            <p class="text-slate-400 text-sm"><i class="fas fa-info-circle mr-2"></i>${jadwal.keterangan}</p>
                        </div>
                    ` : ''}
                `;
                
                grid.appendChild(card);
            });
        }

        // Format Date
        function formatDate(dateString) {
            const options = { year: 'numeric', month: 'long', day: 'numeric' };
            return new Date(dateString).toLocaleDateString('id-ID', options);
        }

        // Filter Functions
        function filterHari(hari) {
            currentFilter = hari;
            
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active', 'bg-orange-500', 'text-white');
                btn.classList.add('text-slate-400');
            });
            event.target.classList.add('active', 'bg-orange-500', 'text-white');
            event.target.classList.remove('text-slate-400');

            applyFilters();
        }

        function applyFilters() {
            currentEkskulFilter = document.getElementById('ekskulFilter').value;
            
            let filtered = jadwalData;

            if (currentFilter !== 'all') {
                filtered = filtered.filter(j => j.hari === currentFilter);
            }

            if (currentEkskulFilter !== 'all') {
                filtered = filtered.filter(j => j.ekskul === currentEkskulFilter);
            }

            // Sort by date and time
            filtered.sort((a, b) => {
                if (a.tanggal !== b.tanggal) {
                    return new Date(a.tanggal) - new Date(b.tanggal);
                }
                return a.waktu_mulai.localeCompare(b.waktu_mulai);
            });

            renderSchedule(filtered);
        }

        // Search Function
        document.getElementById('searchInput').addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            let filtered = jadwalData.filter(j => 
                j.nama.toLowerCase().includes(searchTerm) ||
                j.ekskul.toLowerCase().includes(searchTerm) ||
                j.pembina.toLowerCase().includes(searchTerm) ||
                j.lokasi.toLowerCase().includes(searchTerm)
            );

            if (currentFilter !== 'all') {
                filtered = filtered.filter(j => j.hari === currentFilter);
            }

            if (currentEkskulFilter !== 'all') {
                filtered = filtered.filter(j => j.ekskul === currentEkskulFilter);
            }

            renderSchedule(filtered);
        });

        // Toggle View
        function toggleView(view) {
            const scheduleView = document.getElementById('scheduleView');
            const calendarView = document.getElementById('calendarView');
            const calendarBtn = document.getElementById('calendarViewBtn');

            if (view === 'calendar') {
                scheduleView.classList.add('hidden');
                calendarView.classList.remove('hidden');
                calendarBtn.innerHTML = '<i class="fas fa-list mr-2"></i>Tampilan List';
                calendarBtn.setAttribute('onclick', "toggleView('list')");
                renderCalendar();
            } else {
                scheduleView.classList.remove('hidden');
                calendarView.classList.add('hidden');
                calendarBtn.innerHTML = '<i class="fas fa-calendar-alt mr-2"></i>Tampilan Kalender';
                calendarBtn.setAttribute('onclick', "toggleView('calendar')");
            }
        }

        // Calendar Variables
        let currentMonth = new Date().getMonth();
        let currentYear = new Date().getFullYear();

        // Render Calendar
        function renderCalendar() {
            const monthNames = ['Januari', 'Februari', 'Maret', 'April', 'Mei', 'Juni', 
                              'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'];
            
            document.getElementById('currentMonth').textContent = `${monthNames[currentMonth]} ${currentYear}`;

            const firstDay = new Date(currentYear, currentMonth, 1).getDay();
            const daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
            
            const calendarDays = document.getElementById('calendarDays');
            calendarDays.innerHTML = '';

            // Empty cells for days before month starts
            for (let i = 0; i < firstDay; i++) {
                const emptyDay = document.createElement('div');
                emptyDay.className = 'min-h-24 bg-slate-800/30 rounded-lg';
                calendarDays.appendChild(emptyDay);
            }

            // Days of month
            for (let day = 1; day <= daysInMonth; day++) {
                const dateStr = `${currentYear}-${String(currentMonth + 1).padStart(2, '0')}-${String(day).padStart(2, '0')}`;
                const daySchedules = jadwalData.filter(j => j.tanggal === dateStr);
                
                const dayCell = document.createElement('div');
                dayCell.className = 'min-h-24 bg-slate-800/50 rounded-lg p-2 hover:bg-slate-800 transition-colors cursor-pointer';
                
                let cellContent = `<div class="text-white font-semibold mb-1">${day}</div>`;
                
                if (daySchedules.length > 0) {
                    cellContent += '<div class="space-y-1">';
                    daySchedules.slice(0, 2).forEach(schedule => {
                        cellContent += `
                            <div class="text-xs bg-orange-500/20 text-orange-400 rounded px-2 py-1 truncate">
                                ${schedule.waktu_mulai} ${schedule.ekskul}
                            </div>
                        `;
                    });
                    if (daySchedules.length > 2) {
                        cellContent += `<div class="text-xs text-slate-400">+${daySchedules.length - 2} lainnya</div>`;
                    }
                    cellContent += '</div>';
                }
                
                dayCell.innerHTML = cellContent;
                calendarDays.appendChild(dayCell);
            }
        }

        // Change Month
        function changeMonth(direction) {
            currentMonth += direction;
            if (currentMonth > 11) {
                currentMonth = 0;
                currentYear++;
            } else if (currentMonth < 0) {
                currentMonth = 11;
                currentYear--;
            }
            renderCalendar();
        }

        // Modal Functions
        function openModal() {
            document.getElementById('jadwalModal').classList.add('active');
            document.getElementById('jadwalForm').reset();
        }

        function closeModal() {
            document.getElementById('jadwalModal').classList.remove('active');
        }

        // Form Submit
        document.getElementById('jadwalForm').addEventListener('submit', (e) => {
            e.preventDefault();
            
            const newJadwal = {
                id: jadwalData.length + 1,
                ekskul: document.getElementById('ekskul').value,
                jenis: document.getElementById('jenisKegiatan').value,
                nama: document.getElementById('namaKegiatan').value,
                hari: document.getElementById('hari').value,
                tanggal: document.getElementById('tanggal').value,
                waktu_mulai: document.getElementById('waktuMulai').value,
                waktu_selesai: document.getElementById('waktuSelesai').value,
                lokasi: document.getElementById('lokasi').value,
                pembina: document.getElementById('pembina').value,
                keterangan: document.getElementById('keterangan').value
            };
            
            jadwalData.push(newJadwal);
            applyFilters();
            closeModal();
            
            alert('Jadwal berhasil ditambahkan!');
        });

        // Edit Function
        function editJadwal(id) {
            const jadwal = jadwalData.find(j => j.id === id);
            if (jadwal) {
                document.getElementById('ekskul').value = jadwal.ekskul;
                document.getElementById('jenisKegiatan').value = jadwal.jenis;
                document.getElementById('namaKegiatan').value = jadwal.nama;
                document.getElementById('hari').value = jadwal.hari;
                document.getElementById('tanggal').value = jadwal.tanggal;
                document.getElementById('waktuMulai').value = jadwal.waktu_mulai;
                document.getElementById('waktuSelesai').value = jadwal.waktu_selesai;
                document.getElementById('lokasi').value = jadwal.lokasi;
                document.getElementById('pembina').value = jadwal.pembina;
                document.getElementById('keterangan').value = jadwal.keterangan;
                
                openModal();
            }
        }

        // Delete Function
        function deleteJadwal(id) {
            if (confirm('Apakah Anda yakin ingin menghapus jadwal ini?')) {
                jadwalData = jadwalData.filter(j => j.id !== id);
                applyFilters();
                alert('Jadwal berhasil dihapus!');
            }
        }

        // Initial Render
        renderSchedule(jadwalData);
    </script>
</body>
</html>