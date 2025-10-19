    <!DOCTYPE html>
    <html lang="id">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
        <title>Coming soon</title>
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

            .ekskul-checkbox {
            transition: all 0.2s ease;
            transform: scale(1);
            }
            .ekskul-checkbox:checked {
            transform: scale(1.2);
            }
        </style>
    </head>
    <body class="bg-slate-950">
        @php $page = "prestasi" @endphp
        @include('admin/includes.sidebar')

        <!-- Main Content -->
        <div class="ml-64 min-h-screen">
            <!-- Top Navigation Bar -->
            <header class="bg-gradient-to-r from-slate-900 to-slate-950 border-b border-orange-500/20 sticky top-0 z-40">
                <div class="px-8 py-4 flex items-center justify-between">
                    <div class="flex-1 max-w-xl">
                        <div class="relative">
                            <input type="text" id="searchInput" placeholder="Cari prestasi..." 
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
                        <h1 class="text-4xl font-bold text-white mb-2">Hall of Fame</h1>
                        <p class="text-slate-400">Catat dan kelola prestasi siswa ekstrakurikuler</p>
                    </div>
                    <div class="flex space-x-3">
                        <button onclick="exportData()" class="px-6 py-3 bg-slate-800 text-white rounded-xl hover:bg-slate-700 transition-all duration-300 font-semibold">
                            <i class="fas fa-file-export mr-2"></i>Export Data
                        </button>
                        <button onclick="openModal()" class="px-6 py-3 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-xl hover:from-orange-400 hover:to-red-500 transition-all duration-300 font-semibold">
                            <i class="fas fa-plus mr-2"></i>Tambah Prestasi
                        </button>
                    </div>
                </div>

                <!-- Stats Cards -->
                <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                    <div class="bg-gradient-to-br from-yellow-500/10 to-orange-500/10 backdrop-blur-xl rounded-xl p-6 border border-yellow-500/20">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-slate-400 text-sm">Total Prestasi</p>
                                <h3 class="text-3xl font-bold text-white" id="totalPrestasi">142</h3>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-trophy text-white text-2xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-yellow-400/10 to-yellow-600/10 backdrop-blur-xl rounded-xl p-6 border border-yellow-400/20">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-slate-400 text-sm">Juara 1</p>
                                <h3 class="text-3xl font-bold text-white">58</h3>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-yellow-400 to-yellow-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-medal text-white text-2xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-slate-400/10 to-slate-600/10 backdrop-blur-xl rounded-xl p-6 border border-slate-400/20">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-slate-400 text-sm">Juara 2</p>
                                <h3 class="text-3xl font-bold text-white">45</h3>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-slate-400 to-slate-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-medal text-white text-2xl"></i>
                            </div>
                        </div>
                    </div>

                    <div class="bg-gradient-to-br from-orange-700/10 to-orange-900/10 backdrop-blur-xl rounded-xl p-6 border border-orange-700/20">
                        <div class="flex items-center justify-between">
                            <div>
                                <p class="text-slate-400 text-sm">Juara 3</p>
                                <h3 class="text-3xl font-bold text-white">39</h3>
                            </div>
                            <div class="w-14 h-14 bg-gradient-to-br from-orange-700 to-orange-900 rounded-xl flex items-center justify-center">
                                <i class="fas fa-medal text-white text-2xl"></i>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Filters -->
                <div class="mb-6 flex items-center justify-between flex-wrap gap-4">
                    <div class="flex items-center space-x-3">
                        <button onclick="filterTingkat('all')" class="filter-btn active px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-400 transition-colors font-medium">
                            Semua Tingkat
                        </button>
                        <button onclick="filterTingkat('Internasional')" class="filter-btn px-4 py-2 bg-slate-800 text-slate-400 rounded-lg hover:bg-slate-700 transition-colors font-medium">
                            Internasional
                        </button>
                        <button onclick="filterTingkat('Nasional')" class="filter-btn px-4 py-2 bg-slate-800 text-slate-400 rounded-lg hover:bg-slate-700 transition-colors font-medium">
                            Nasional
                        </button>
                        <button onclick="filterTingkat('Provinsi')" class="filter-btn px-4 py-2 bg-slate-800 text-slate-400 rounded-lg hover:bg-slate-700 transition-colors font-medium">
                            Provinsi
                        </button>
                        <button onclick="filterTingkat('Kota')" class="filter-btn px-4 py-2 bg-slate-800 text-slate-400 rounded-lg hover:bg-slate-700 transition-colors font-medium">
                            Kota
                        </button>
                    </div>

                    <div class="flex items-center space-x-3">
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

                        <select id="juaraFilter" onchange="applyFilters()" class="bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-orange-500">
                            <option value="all">Semua Peringkat</option>
                            <option value="Juara 1">Juara 1</option>
                            <option value="Juara 2">Juara 2</option>
                            <option value="Juara 3">Juara 3</option>
                            <option value="Harapan">Juara Harapan</option>
                        </select>

                        <select id="tahunFilter" onchange="applyFilters()" class="bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-orange-500">
                            <option value="all">Semua Tahun</option>
                            <option value="2025">2025</option>
                            <option value="2024">2024</option>
                            <option value="2023">2023</option>
                            <option value="2022">2022</option>
                        </select>
                    </div>
                </div>

                <!-- Prestasi Grid -->
                <div id="prestasiGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                    <!-- Cards will be inserted here -->
                </div>
            </main>
        </div>

        <!-- Modal Add/Edit Prestasi -->
        <div id="prestasiModal" class="modal fixed inset-0 bg-black/70 backdrop-blur-sm items-center justify-center z-50">
            <div class="bg-slate-900 rounded-2xl p-8 max-w-3xl w-full mx-4 border border-slate-800 max-h-[90vh] overflow-y-auto">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-white">Tambah Prestasi</h2>
                    <button onclick="closeModal()" class="text-slate-400 hover:text-white transition-colors">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>

                <form id="prestasiForm" class="space-y-4">
                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">Nama Lomba/Kompetisi</label>
                        <input type="text" id="namaLomba" required placeholder="Contoh: Lomba Basket Antar Sekolah" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                    </div>

                    <div class="grid grid-cols-2 gap-4">
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
                            <label class="block text-slate-400 text-sm font-medium mb-2">Tingkat</label>
                            <select id="tingkat" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                                <option value="Kota">Kota</option>
                                <option value="Provinsi">Provinsi</option>
                                <option value="Nasional">Nasional</option>
                                <option value="Internasional">Internasional</option>
                            </select>
                        </div>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <label class="block text-slate-400 text-sm font-medium mb-2">Peringkat/Juara</label>
                            <select id="peringkat" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                                <option value="Juara 1">Juara 1</option>
                                <option value="Juara 2">Juara 2</option>
                                <option value="Juara 3">Juara 3</option>
                                <option value="Harapan">Juara Harapan</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-slate-400 text-sm font-medium mb-2">Tanggal Lomba</label>
                            <input type="date" id="tanggalLomba" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                        </div>
                    </div>

                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">Lokasi/Tempat</label>
                        <input type="text" id="lokasi" required placeholder="Contoh: GOR Pajajaran, Bandung" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                    </div>

                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">Nama Siswa/Tim</label>
                        <input type="text" id="namaSiswa" required placeholder="Nama siswa atau tim yang berprestasi" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                    </div>

                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">Pembina</label>
                        <input type="text" id="pembina" required placeholder="Nama pembina yang membimbing" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                    </div>

                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">Deskripsi/Keterangan</label>
                        <textarea id="deskripsi" rows="3" placeholder="Deskripsi singkat tentang prestasi ini..." class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors"></textarea>
                    </div>

                    <div class="flex space-x-3 pt-4">
                        <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-xl hover:from-orange-400 hover:to-red-500 transition-all duration-300 font-semibold">
                            <i class="fas fa-save mr-2"></i>Simpan Prestasi
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
            <div class="bg-slate-900 rounded-2xl p-8 max-w-2xl w-full mx-4 border border-slate-800 max-h-[90vh] overflow-y-auto">
                <div class="flex items-center justify-between mb-6">
                    <h2 class="text-2xl font-bold text-white">Detail Prestasi</h2>
                    <button onclick="closeDetailModal()" class="text-slate-400 hover:text-white transition-colors">
                        <i class="fas fa-times text-2xl"></i>
                    </button>
                </div>

                <div id="detailContent">
                    <!-- detail prestasi di js -->
                </div>
            </div>
        </div>
    </body>
    </html>