<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <title>Admin Siswa Kulkul</title>
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
    
    @include('admin/includes.sidebar')

    <!-- Main Content -->
    <div class="ml-64 min-h-screen">
        <!-- Top Navigation Bar -->
        <header class="bg-gradient-to-r from-slate-900 to-slate-950 border-b border-orange-500/20 sticky top-0 z-40">
            <div class="px-8 py-4 flex items-center justify-between">
                <div class="flex-1 max-w-xl">
                    <div class="relative">
                        <input type="text" id="searchInput" placeholder="Cari siswa (nama, NIS, kelas)..." 
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
                    <h1 class="text-4xl font-bold text-white mb-2">Data Siswa</h1>
                    <p class="text-slate-400">Kelola data siswa dan partisipasi ekstrakurikuler</p>
                </div>
                <div class="flex space-x-3">
                    <button onclick="exportData()" class="px-6 py-3 bg-slate-800 text-white rounded-xl hover:bg-slate-700 transition-all duration-300 font-semibold">
                        <i class="fas fa-file-export mr-2"></i>Export Excel
                    </button>
                    <button onclick="openModal()" class="px-6 py-3 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-xl hover:from-orange-400 hover:to-red-500 transition-all duration-300 font-semibold">
                        <i class="fas fa-plus mr-2"></i>Tambah Siswa
                    </button>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <div class="bg-gradient-to-br from-blue-500/10 to-cyan-500/10 backdrop-blur-xl rounded-xl p-6 border border-blue-500/20">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400 text-sm">Total Siswa</p>
                            <h3 class="text-3xl font-bold text-white" id="totalSiswa">1,234</h3>
                        </div>
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-users text-white text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-green-500/10 to-emerald-500/10 backdrop-blur-xl rounded-xl p-6 border border-green-500/20">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400 text-sm">Aktif Ekskul</p>
                            <h3 class="text-3xl font-bold text-white">987</h3>
                        </div>
                        <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-check-circle text-white text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-purple-500/10 to-pink-500/10 backdrop-blur-xl rounded-xl p-6 border border-purple-500/20">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400 text-sm">Kelas X</p>
                            <h3 class="text-3xl font-bold text-white">420</h3>
                        </div>
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-graduation-cap text-white text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-orange-500/10 to-red-500/10 backdrop-blur-xl rounded-xl p-6 border border-orange-500/20">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400 text-sm">Prestasi</p>
                            <h3 class="text-3xl font-bold text-white">142</h3>
                        </div>
                        <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-trophy text-white text-2xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filters -->
            <div class="mb-6 flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <button onclick="filterKelas('all')" class="filter-btn active px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-400 transition-colors font-medium">
                        Semua Kelas
                    </button>
                    <button onclick="filterKelas('X')" class="filter-btn px-4 py-2 bg-slate-800 text-slate-400 rounded-lg hover:bg-slate-700 transition-colors font-medium">
                        Kelas X
                    </button>
                    <button onclick="filterKelas('XI')" class="filter-btn px-4 py-2 bg-slate-800 text-slate-400 rounded-lg hover:bg-slate-700 transition-colors font-medium">
                        Kelas XI
                    </button>
                    <button onclick="filterKelas('XII')" class="filter-btn px-4 py-2 bg-slate-800 text-slate-400 rounded-lg hover:bg-slate-700 transition-colors font-medium">
                        Kelas XII
                    </button>
                </div>

                <div class="flex items-center space-x-3">
                    <select id="jurusanFilter" onchange="applyFilters()" class="bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-orange-500">
                        <option value="all">Semua Jurusan</option>
                        <option value="RPL">RPL</option>
                        <option value="TKJ">TKJ</option>
                        <option value="MM">Multimedia</option>
                        <option value="DPIB">DPIB</option>
                    </select>

                    <select id="statusFilter" onchange="applyFilters()" class="bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-orange-500">
                        <option value="all">Semua Status</option>
                        <option value="active">Aktif Ekskul</option>
                        <option value="inactive">Belum Ikut Ekskul</option>
                    </select>
                </div>
            </div>

            <!-- Table -->
            <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl border border-slate-800 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-slate-800/50">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">
                                    <input type="checkbox" class="rounded border-slate-600 text-orange-500 focus:ring-orange-500">
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">NIS</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Nama Siswa</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Kelas</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Jurusan</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Ekstrakurikuler</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="siswaTableBody" class="divide-y divide-slate-800">
                            <!-- Table rows will be inserted here -->
                        </tbody>
                    </table>
                </div>

                <!-- Pagination -->
                <div class="px-6 py-4 bg-slate-800/30 flex items-center justify-between border-t border-slate-800">
                    <div class="text-sm text-slate-400">
                        Menampilkan <span class="text-white font-semibold">1-10</span> dari <span class="text-white font-semibold" id="totalRows">50</span> siswa
                    </div>
                    <div class="flex space-x-2">
                        <button class="px-4 py-2 bg-slate-800 text-slate-400 rounded-lg hover:bg-slate-700 transition-colors">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                        <button class="px-4 py-2 bg-orange-500 text-white rounded-lg">1</button>
                        <button class="px-4 py-2 bg-slate-800 text-slate-400 rounded-lg hover:bg-slate-700 transition-colors">2</button>
                        <button class="px-4 py-2 bg-slate-800 text-slate-400 rounded-lg hover:bg-slate-700 transition-colors">3</button>
                        <button class="px-4 py-2 bg-slate-800 text-slate-400 rounded-lg hover:bg-slate-700 transition-colors">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    </div>
                </div>
            </div>
        </main>
    </div>

    <!-- Modal Add/Edit Siswa -->
    <div id="siswaModal" class="modal fixed inset-0 bg-black/70 backdrop-blur-sm items-center justify-center z-50">
        <div class="bg-slate-900 rounded-2xl p-8 max-w-3xl w-full mx-4 border border-slate-800 max-h-[90vh] overflow-y-auto">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-white">Tambah Siswa</h2>
                <button onclick="closeModal()" class="text-slate-400 hover:text-white transition-colors">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>

            <form id="siswaForm" class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">NIS</label>
                        <input type="text" id="nis" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                    </div>

                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">NISN</label>
                        <input type="text" id="nisn" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                    </div>
                </div>

                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Nama Lengkap</label>
                    <input type="text" id="namaLengkap" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                </div>

                <div class="grid grid-cols-3 gap-4">
                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">Kelas</label>
                        <select id="kelas" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                            <option value="X">X</option>
                            <option value="XI">XI</option>
                            <option value="XII">XII</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">Jurusan</label>
                        <select id="jurusan" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                            <option value="RPL">RPL</option>
                            <option value="TKJ">TKJ</option>
                            <option value="MM">Multimedia</option>
                            <option value="DPIB">DPIB</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">Rombel</label>
                        <select id="rombel" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                        </select>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">Jenis Kelamin</label>
                        <select id="jenisKelamin" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                            <option value="L">Laki-laki</option>
                            <option value="P">Perempuan</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">Tempat Lahir</label>
                        <input type="text" id="tempatLahir" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">Tanggal Lahir</label>
                        <input type="date" id="tanggalLahir" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                    </div>

                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">No. Telepon</label>
                        <input type="tel" id="noTelepon" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                    </div>
                </div>

                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Alamat</label>
                    <textarea id="alamat" rows="2" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors"></textarea>
                </div>

                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Ekstrakurikuler yang Diikuti</label>
                    <div class="grid grid-cols-2 gap-2 bg-slate-800/50 p-4 rounded-lg max-h-32 overflow-y-auto">
                        <label class="flex items-center space-x-2 text-slate-300">
                            <input type="checkbox" value="Basket" class="rounded border-slate-600 text-orange-500 focus:ring-orange-500">
                            <span>Basket</span>
                        </label>
                        <label class="flex items-center space-x-2 text-slate-300">
                            <input type="checkbox" value="Futsal" class="rounded border-slate-600 text-orange-500 focus:ring-orange-500">
                            <span>Futsal</span>
                        </label>
                        <label class="flex items-center space-x-2 text-slate-300">
                            <input type="checkbox" value="Paduan Suara" class="rounded border-slate-600 text-orange-500 focus:ring-orange-500">
                            <span>Paduan Suara</span>
                        </label>
                        <label class="flex items-center space-x-2 text-slate-300">
                            <input type="checkbox" value="Tari" class="rounded border-slate-600 text-orange-500 focus:ring-orange-500">
                            <span>Tari Tradisional</span>
                        </label>
                        <label class="flex items-center space-x-2 text-slate-300">
                            <input type="checkbox" value="Robotika" class="rounded border-slate-600 text-orange-500 focus:ring-orange-500">
                            <span>Robotika</span>
                        </label>
                        <label class="flex items-center space-x-2 text-slate-300">
                            <input type="checkbox" value="Pramuka" class="rounded border-slate-600 text-orange-500 focus:ring-orange-500">
                            <span>Pramuka</span>
                        </label>
                    </div>
                </div>

                <div class="flex space-x-3 pt-4">
                    <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-xl hover:from-orange-400 hover:to-red-500 transition-all duration-300 font-semibold">
                        <i class="fas fa-save mr-2"></i>Simpan Data
                    </button>
                    <button type="button" onclick="closeModal()" class="px-6 py-3 bg-slate-800 text-white rounded-xl hover:bg-slate-700 transition-all duration-300 font-semibold">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Detail Modal -->
    <div id="detailModal" class="modal fixed inset-0 bg-black/70 backdrop-blur-sm items-center justify-center z-50">
        <div class="bg-slate-900 rounded-2xl p-8 max-w-2xl w-full mx-4 border border-slate-800">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-white">Detail Siswa</h2>
                <button onclick="closeDetailModal()" class="text-slate-400 hover:text-white transition-colors">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>

            <div id="detailContent" class="space-y-4">
                <!-- detail siswa -->
            </div>
        </div>
    </div>          

  <script src=" {{ asset('js/modal.js') }}"></script>
</body>
</html>