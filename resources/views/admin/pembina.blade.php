<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <title>Admin Pembina Kulkul</title>
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
    @php $page = "pembina" @endphp
    @include('admin/includes.sidebar')

    @include('admin.includes.notif')
       
    <!-- Main Content -->
    <div class="ml-64 min-h-screen">
        <!-- Top Navigation Bar -->
        <header class="bg-gradient-to-r from-slate-900 to-slate-950 border-b border-orange-500/20 sticky top-0 z-40">
            <div class="px-8 py-4 flex items-center justify-between">
                <div class="flex-1 max-w-xl">
                    <div class="relative">
                        <input type="text" id="searchInput" placeholder="Cari pembina..." 
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
                    <h1 class="text-4xl font-bold text-white mb-2">Data Pembina</h1>
                    <p class="text-slate-400">Kelola data pembina ekstrakurikuler</p>
                </div>
                <div class="flex space-x-3">
                    <button onclick="openModal()" class="px-6 py-3 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-xl hover:from-orange-400 hover:to-red-500 transition-all duration-300 font-semibold">
                        <i class="fas fa-plus mr-2"></i>Tambah Pembina
                    </button>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
                <div class="bg-gradient-to-br from-blue-500/10 to-cyan-500/10 backdrop-blur-xl rounded-xl p-6 border border-blue-500/20">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400 text-sm">Total Pembina</p>
                            <h3 class="text-3xl font-bold text-white" id="totalPembina">32</h3>
                        </div>
                        <div class="w-14 h-14 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-chalkboard-teacher text-white text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-green-500/10 to-emerald-500/10 backdrop-blur-xl rounded-xl p-6 border border-green-500/20">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400 text-sm">Pembina Aktif</p>
                            <h3 class="text-3xl font-bold text-white">28</h3>
                        </div>
                        <div class="w-14 h-14 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-check-circle text-white text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-purple-500/10 to-pink-500/10 backdrop-blur-xl rounded-xl p-6 border border-purple-500/20">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400 text-sm">Rata-rata Pengalaman</p>
                            <h3 class="text-3xl font-bold text-white">8.5</h3>
                            <p class="text-slate-400 text-xs">Tahun</p>
                        </div>
                        <div class="w-14 h-14 bg-gradient-to-br from-purple-500 to-pink-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-award text-white text-2xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-orange-500/10 to-red-500/10 backdrop-blur-xl rounded-xl p-6 border border-orange-500/20">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400 text-sm">Total Siswa Dibina</p>
                            <h3 class="text-3xl font-bold text-white">987</h3>
                        </div>
                        <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-users text-white text-2xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter Tabs -->
            <div class="mb-6 flex items-center justify-between">
                <div class="flex items-center space-x-3">
                    <button onclick="filterKategori('all')" class="filter-btn active px-4 py-2 bg-orange-500 text-white rounded-lg hover:bg-orange-400 transition-colors font-medium">
                        Semua Pembina
                    </button>
                    <button onclick="filterKategori('olahraga')" class="filter-btn px-4 py-2 bg-slate-800 text-slate-400 rounded-lg hover:bg-slate-700 transition-colors font-medium">
                        Olahraga
                    </button>
                    <button onclick="filterKategori('seni')" class="filter-btn px-4 py-2 bg-slate-800 text-slate-400 rounded-lg hover:bg-slate-700 transition-colors font-medium">
                        Seni & Budaya
                    </button>
                    <button onclick="filterKategori('akademik')" class="filter-btn px-4 py-2 bg-slate-800 text-slate-400 rounded-lg hover:bg-slate-700 transition-colors font-medium">
                        Akademik
                    </button>
                </div>

                <select id="sortBy" onchange="sortData()" class="bg-slate-800 border border-slate-700 rounded-lg px-4 py-2 text-white focus:outline-none focus:border-orange-500">
                    <option value="nama">Urutkan: Nama (A-Z)</option>
                    <option value="ekskul">Urutkan: Jumlah Ekskul</option>
                    <option value="siswa">Urutkan: Jumlah Siswa</option>
                    <option value="pengalaman">Urutkan: Pengalaman</option>
                </select>
            </div>

            <!-- Pembina Grid -->
            <div id="pembinaGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Cards will be inserted here -->
            </div>
        </main>
    </div>

    <!-- Modal Add/Edit Pembina -->
    <div id="pembinaModal" class="modal fixed inset-0 bg-black/70 backdrop-blur-sm items-center justify-center z-50">
        <div class="bg-slate-900 rounded-2xl p-8 max-w-3xl w-full mx-4 border border-slate-800 max-h-[90vh] overflow-y-auto">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-white">Tambah Pembina</h2>
                <button onclick="closeModal()" class="text-slate-400 hover:text-white transition-colors">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>

            <form id="pembinaForm" class="space-y-4">
                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">NIP</label>
                        <input type="text" id="nip" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                    </div>

                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">NUPTK</label>
                        <input type="text" id="nuptk" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                    </div>
                </div>

                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Nama Lengkap</label>
                    <input type="text" id="namaLengkap" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
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
                        <input type="tel" id="noTelepon" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                    </div>
                </div>

                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Email</label>
                    <input type="email" id="email" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">Pendidikan Terakhir</label>
                        <select id="pendidikan" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                            <option value="S1">S1</option>
                            <option value="S2">S2</option>
                            <option value="S3">S3</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">Jurusan</label>
                        <input type="text" id="jurusan" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                    </div>
                </div>

                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Alamat</label>
                    <textarea id="alamat" rows="2" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors"></textarea>
                </div>

                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Ekstrakurikuler yang Dibina</label>
                    <div class="grid grid-cols-2 gap-2 bg-slate-800/50 p-4 rounded-lg max-h-40 overflow-y-auto">
                        <label class="flex items-center space-x-2 text-slate-300">
                            <input type="checkbox" value="Basket" class="rounded border-slate-600 text-orange-500 focus:ring-orange-500 ekskul-checkbox ">
                            <span>Basket</span>
                        </label>
                        <label class="flex items-center space-x-2 text-slate-300">
                            <input type="checkbox" value="Futsal" class="rounded border-slate-600 text-orange-500 focus:ring-orange-500 ekskul-checkbox">
                            <span>Futsal</span>
                        </label>
                        <label class="flex items-center space-x-2 text-slate-300">
                            <input type="checkbox" value="Voli" class="rounded border-slate-600 text-orange-500 focus:ring-orange-500 ekskul-checkbox">
                            <span>Voli</span>
                        </label>
                        <label class="flex items-center space-x-2 text-slate-300">
                            <input type="checkbox" value="Paduan Suara" class="rounded border-slate-600 text-orange-500 focus:ring-orange-500 ekskul-checkbox">
                            <span>Paduan Suara</span>
                        </label>
                        <label class="flex items-center space-x-2 text-slate-300">
                            <input type="checkbox" value="Tari Tradisional" class="rounded border-slate-600 text-orange-500 focus:ring-orange-500 ekskul-checkbox">
                            <span>Tari Tradisional</span>
                        </label>
                        <label class="flex items-center space-x-2 text-slate-300">
                            <input type="checkbox" value="Band" class="rounded border-slate-600 text-orange-500 focus:ring-orange-500 ekskul-checkbox">
                            <span>Band</span>
                        </label>
                        <label class="flex items-center space-x-2 text-slate-300">
                            <input type="checkbox" value="Robotika" class="rounded border-slate-600 text-orange-500 focus:ring-orange-500 ekskul-checkbox">
                            <span>Robotika</span>
                        </label>
                        <label class="flex items-center space-x-2 text-slate-300">
                            <input type="checkbox" value="Bahasa Inggris" class="rounded border-slate-600 text-orange-500 focus:ring-orange-500 ekskul-checkbox">
                            <span>Bahasa Inggris</span>
                        </label>
                        <label class="flex items-center space-x-2 text-slate-300">
                            <input type="checkbox" value="Pramuka" class="rounded border-slate-600 text-orange-500 focus:ring-orange-500 ekskul-checkbox">
                            <span>Pramuka</span>
                        </label>
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">Pengalaman Mengajar (Tahun)</label>
                        <input type="number" id="pengalaman" min="0" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                    </div>

                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">Status</label>
                        <select id="status" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                            <option value="Aktif">Aktif</option>
                            <option value="Cuti">Cuti</option>
                            <option value="Non-Aktif">Non-Aktif</option>
                        </select>
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
        <div class="bg-slate-900 rounded-2xl p-8 max-w-3xl w-full mx-4 border border-slate-800 max-h-[90vh] overflow-y-auto">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-white">Detail Pembina</h2>
                <button onclick="closeDetailModal()" class="text-slate-400 hover:text-white transition-colors">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>

            <div id="detailContent">
                <!-- Content will be populated by JavaScript -->
            </div>
        </div>
    </div>

    <script>
        // Sample Data
        let pembinaData = @json($data_pembina);
        console.log(pembinaData);

        let currentFilter = 'all';
        let currentSort = 'nama';

        // Render Pembina Cards
        function renderCards(data) {
            const grid = document.getElementById('pembinaGrid');
            grid.innerHTML = '';

            const categoryColors = {
                olahraga: { bg: 'from-blue-500/10 to-cyan-500/10', border: 'border-blue-500/20', icon: 'from-blue-500 to-cyan-600' },
                seni: { bg: 'from-purple-500/10 to-pink-500/10', border: 'border-purple-500/20', icon: 'from-purple-500 to-pink-600' },
                akademik: { bg: 'from-green-500/10 to-emerald-500/10', border: 'border-green-500/20', icon: 'from-green-500 to-emerald-600' }
            };

            data.forEach(pembina => {
                const colors = categoryColors["seni"];
                const card = document.createElement('div');
                card.className = `bg-gradient-to-br ${colors.bg} backdrop-blur-xl rounded-2xl p-6 border ${colors.border} hover:border-orange-500/30 transition-all duration-300`;
                
                card.innerHTML = `
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center space-x-4">
                            <div class="w-16 h-16 bg-gradient-to-br rounded-xl flex items-center justify-center">
                                <i class="fas fa-user-tie text-white text-2xl"></i>
                            </div>
                            <div>
                                <h3 class="text-lg font-bold text-white">${pembina.nama}</h3>
                                <p class="text-slate-400 text-sm">NIP: ${pembina.nip}</p>
                            </div>
                        </div>
                    </div>

                    <div class="space-y-2 mb-4">
                        <div class="flex items-center text-sm">
                            <i class="fas fa-graduation-cap text-orange-400 w-5 mr-2"></i>
                            <span class="text-slate-300">${pembina.pendidikan} ${pembina.jurusan}</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <i class="fas fa-phone text-orange-400 w-5 mr-2"></i>
                            <span class="text-slate-300">${pembina.no_telp}</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <i class="fas fa-envelope text-orange-400 w-5 mr-2"></i>
                            <span class="text-slate-300 truncate">${pembina.email}</span>
                        </div>
                        <div class="flex items-center text-sm">
                            <i class="fas fa-briefcase text-orange-400 w-5 mr-2"></i>
                            <span class="text-slate-300">${pembina.pengalaman} Tahun Pengalaman</span>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-slate-700 mb-4">
                        <p class="text-slate-400 text-xs font-semibold mb-2">Ekstrakurikuler:</p>
                        <div class="flex flex-wrap gap-2">
                                <span class="px-3 py-1 bg-slate-800/50 text-orange-400 rounded-lg text-xs font-medium">
                                    ${pembina.ekslul}
                                </span>
                        </div>
                    </div>

                    <div class="flex items-center justify-between pt-4 border-t border-slate-700">
                        <div class="flex items-center space-x-2">
                            <i class="fas fa-users text-slate-400"></i>
                            <span class="text-white font-semibold">${pembina.jumlah_siswa} Siswa</span>
                        </div>
                        <div class="flex space-x-2">
                            <button onclick="viewDetail(${pembina.id})" class="px-3 py-1.5 bg-slate-800 hover:bg-orange-500 text-white rounded-lg transition-colors text-sm">
                                <i class="fas fa-eye"></i>
                            </button>
                            <button onclick="editPembina(${pembina.id})" class="px-3 py-1.5 bg-slate-800 hover:bg-blue-500 text-white rounded-lg transition-colors text-sm">
                                <i class="fas fa-edit"></i>
                            </button>
                            <button onclick="deletePembina(${pembina.id})" class="px-3 py-1.5 bg-slate-800 hover:bg-red-500 text-white rounded-lg transition-colors text-sm">
                                <i class="fas fa-trash"></i>
                            </button>
                        </div>
                    </div>

                    <div class="mt-3">
                        <span class="px-3 py-1 rounded-full text-xs font-semibold ${pembina.status === 'Aktif' ? 'bg-green-500/20 text-green-400' : 'bg-slate-700 text-slate-400'}">
                            ${pembina.status}
                        </span>
                    </div>
                `;
                
                grid.appendChild(card);
            });
        }

        // Filter Functions
        function filterKategori(kategori) {
            currentFilter = kategori;
            
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active', 'bg-orange-500', 'text-white');
                btn.classList.add('text-slate-400');
            });
            event.target.classList.add('active', 'bg-orange-500', 'text-white');
            event.target.classList.remove('text-slate-400');

            applyFiltersAndSort();
        }

        // Sort Function
        function sortData() {
            currentSort = document.getElementById('sortBy').value;
            applyFiltersAndSort();
        }

        // Apply Filters and Sort
        function applyFiltersAndSort() {
            let filtered = currentFilter === 'all' 
                ? [...pembinaData] 
                : pembinaData.filter(p => p.kategori === currentFilter);

            // Apply sorting
            filtered.sort((a, b) => {
                switch(currentSort) {
                    case 'nama':
                        return a.nama.localeCompare(b.nama);
                    case 'ekskul':
                        return b.ekskul.length - a.ekskul.length;
                    case 'siswa':
                        return b.jumlah_siswa - a.jumlah_siswa;
                    case 'pengalaman':
                        return b.pengalaman - a.pengalaman;
                    default:
                        return 0;
                }
            });

            renderCards(filtered);
        }

        // Search Function
        document.getElementById('searchInput').addEventListener('input', (e) => {
            const searchTerm = e.target.value.toLowerCase();
            let filtered = currentFilter === 'all' 
                ? [...pembinaData] 
                : pembinaData.filter(p => p.kategori === currentFilter);
            
            filtered = filtered.filter(p => 
                p.nama.toLowerCase().includes(searchTerm) ||
                p.nip.includes(searchTerm) ||
                p.email.toLowerCase().includes(searchTerm) ||
                p.ekskul.some(e => e.toLowerCase().includes(searchTerm))
            );
            
            renderCards(filtered);
        });

        // Modal Functions
        function openModal() {
            document.getElementById('pembinaModal').classList.add('active');
            document.getElementById('pembinaForm').reset();
        }

        function closeModal() {
            document.getElementById('pembinaModal').classList.remove('active');
        }

        function closeDetailModal() {
            document.getElementById('detailModal').classList.remove('active');
        }

        // Form Submit
        document.getElementById('pembinaForm').addEventListener('submit', (e) => {
            e.preventDefault();
            
            const selectedEkskul = Array.from(document.querySelectorAll('.ekskul-checkbox:checked'))
                .map(cb => cb.value);

            // Determine kategori based on selected ekskul
            let kategori = 'akademik';
            const olahragaEkskul = ['Basket', 'Futsal', 'Voli'];
            const seniEkskul = ['Paduan Suara', 'Band', 'Tari Tradisional'];
            
            if (selectedEkskul.some(e => olahragaEkskul.includes(e))) {
                kategori = 'olahraga';
            } else if (selectedEkskul.some(e => seniEkskul.includes(e))) {
                kategori = 'seni';
            }
            
            const newPembina = {
                id: pembinaData.length + 1,
                nip: document.getElementById('nip').value,
                nama: document.getElementById('namaLengkap').value,
                jk: document.getElementById('jenisKelamin').value,
                tempat_lahir: document.getElementById('tempatLahir').value,
                tgl_lahir: document.getElementById('tanggalLahir').value,
                telepon: document.getElementById('noTelepon').value,
                email: document.getElementById('email').value,
                pendidikan: document.getElementById('pendidikan').value,
                jurusan: document.getElementById('jurusan').value,
                alamat: document.getElementById('alamat').value,
                ekskul: selectedEkskul,
                kategori: kategori,
                pengalaman: parseInt(document.getElementById('pengalaman').value),
                status: document.getElementById('status').value,
                jumlah_siswa: 0
            };
            
            pembinaData.push(newPembina);
            document.getElementById('totalPembina').textContent = pembinaData.length;
            applyFiltersAndSort();
            closeModal();
            
            alert('Pembina berhasil ditambahkan!');
        });

        // Edit Function
    function editPembina(id) {
        const pembina = pembinaData.find(p => p.id === id);
        if (pembina) {
            editId = id; // simpan ID untuk update

            document.getElementById('nip').value = pembina.nip;
            document.getElementById('namaLengkap').value = pembina.nama;
            document.getElementById('jenisKelamin').value = pembina.jk;
            document.getElementById('tempatLahir').value = pembina.tempat_lahir;
            document.getElementById('tanggalLahir').value = pembina.tgl_lahir;
            document.getElementById('noTelepon').value = pembina.telepon;
            document.getElementById('email').value = pembina.email;
            document.getElementById('pendidikan').value = pembina.pendidikan;
            document.getElementById('jurusan').value = pembina.jurusan;
            document.getElementById('alamat').value = pembina.alamat;
            document.getElementById('pengalaman').value = pembina.pengalaman;
            document.getElementById('status').value = pembina.status;

            document.querySelectorAll('.ekskul-checkbox').forEach(cb => {
                cb.checked = pembina.ekskul.includes(cb.value);
            });

            openModal();
        }
}

        // Delete Function
        function deletePembina(id) {
            if (confirm('Apakah Anda yakin ingin menghapus data pembina ini?')) {
                pembinaData = pembinaData.filter(p => p.id !== id);
                document.getElementById('totalPembina').textContent = pembinaData.length;
                applyFiltersAndSort();
                alert('Pembina berhasil dihapus!');
            }
        }

        // View Detail Function
        function viewDetail(id) {
            const pembina = pembinaData.find(p => p.id === id);
            if (pembina) {
                const content = document.getElementById('detailContent');
                content.innerHTML = `
                    <div class="space-y-6">
                        <div class="flex items-center space-x-4">
                            <div class="w-20 h-20 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-user-tie text-white text-3xl"></i>
                            </div>
                            <div>
                                <h3 class="text-2xl font-bold text-white">${pembina.nama}</h3>
                                <p class="text-slate-400">NIP: ${pembina.nip}</p>
                                <span class="inline-block mt-2 px-3 py-1 rounded-full text-xs font-semibold ${pembina.status === 'Aktif' ? 'bg-green-500/20 text-green-400' : 'bg-slate-700 text-slate-400'}">
                                    ${pembina.status}
                                </span>
                            </div>
                        </div>

                        <div class="grid grid-cols-2 gap-4">
                            <div class="bg-slate-800/50 rounded-lg p-4">
                                <p class="text-slate-400 text-sm mb-1">Jenis Kelamin</p>
                                <p class="text-white font-semibold">${pembina.gender}</p>
                            </div>
                            <div class="bg-slate-800/50 rounded-lg p-4">
                                <p class="text-slate-400 text-sm mb-1">Tempat, Tanggal Lahir</p>
                                <p class="text-white font-semibold">${pembina.tempat_lahir}, ${pembina.tgl_lahir}</p>
                            </div>
                            <div class="bg-slate-800/50 rounded-lg p-4">
                                <p class="text-slate-400 text-sm mb-1">No. Telepon</p>
                                <p class="text-white font-semibold">${pembina.telepon}</p>
                            </div>
                            <div class="bg-slate-800/50 rounded-lg p-4">
                                <p class="text-slate-400 text-sm mb-1">Email</p>
                                <p class="text-white font-semibold text-sm">${pembina.email}</p>
                            </div>
                            <div class="bg-slate-800/50 rounded-lg p-4">
                                <p class="text-slate-400 text-sm mb-1">Pendidikan</p>
                                <p class="text-white font-semibold">${pembina.pendidikan} ${pembina.jurusan}</p>
                            </div>
                            <div class="bg-slate-800/50 rounded-lg p-4">
                                <p class="text-slate-400 text-sm mb-1">Pengalaman</p>
                                <p class="text-white font-semibold">${pembina.pengalaman} Tahun</p>
                            </div>
                        </div>

                        <div class="bg-slate-800/50 rounded-lg p-4">
                            <p class="text-slate-400 text-sm mb-2">Alamat</p>
                            <p class="text-white">${pembina.alamat}</p>
                        </div>

                        <div class="bg-slate-800/50 rounded-lg p-4">
                            <p class="text-slate-400 text-sm mb-3">Ekstrakurikuler yang Dibina</p>
                            <div class="flex flex-wrap gap-2">

                            </div>
                        </div>

                        <div class="bg-slate-800/50 rounded-lg p-4">
                            <p class="text-slate-400 text-sm mb-2">Jumlah Siswa yang Dibina</p>
                            <p class="text-3xl font-bold text-white"> <span class="text-lg text-slate-400">Siswa</span></p>
                        </div>
                    </div>
                `;
                
                document.getElementById('detailModal').classList.add('active');
            }
        }
       
            document.querySelectorAll('.ekskul-checkbox').forEach(checkbox => {
                checkbox.addEventListener('change', function () {
                    if (this.checked) {
                        // Uncheck semua checkbox lain
                        document.querySelectorAll('.ekskul-checkbox').forEach(cb => {
                            if (cb !== this) cb.checked = false;
                        });
                    }
                });
            });

        // Initial Render
        renderCards(pembinaData);
    </script>
</body>
</html>