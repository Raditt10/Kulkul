<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <title>Admin Form Pendaftaran Kulkul</title>
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
    @php $page = 'form' @endphp

    @include('admin/includes.sidebar')

    @include('admin.includes.notif')

    <!-- Main Content -->
    <div class="ml-64 min-h-screen">
        <!-- Top Navigation Bar -->
        <header class="bg-gradient-to-r from-slate-900 to-slate-950 border-b border-orange-500/20 sticky top-0 z-40">
            <div class="px-8 py-4 flex items-center justify-between">
                <div class="flex-1 max-w-xl">
                    <div class="relative">
                        <input type="text" id="searchInput" placeholder="Cari siswa, ekstrakurikuler..." 
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

        <!-- Main Content -->
        <main class="p-8">
            <!-- Header Section -->
            <div class="mb-8">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-4xl font-bold text-white mb-2">Kelola Pendaftaran Ekstrakurikuler</h1>
                        <p class="text-slate-400">Kelola dan proses pendaftaran siswa ke ekstrakurikuler</p>
                    </div>
                    <button onclick="exportData()" class="px-6 py-3 bg-slate-800 text-white rounded-xl hover:bg-slate-700 transition-all duration-300">
                        <i class="fas fa-file-export mr-2"></i>Export Data
                    </button>
                </div>
            </div>

            <!-- Stats Cards -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-8">
                <div class="bg-gradient-to-br from-yellow-500/10 to-orange-500/10 backdrop-blur-xl rounded-2xl p-6 border border-yellow-500/20">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-yellow-500 to-orange-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-clock text-white text-xl"></i>
                        </div>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-1" id="pendingCount">8</h3>
                    <p class="text-slate-400 text-sm">Menunggu Persetujuan</p>
                </div>

                <div class="bg-gradient-to-br from-green-500/10 to-emerald-500/10 backdrop-blur-xl rounded-2xl p-6 border border-green-500/20">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-check text-white text-xl"></i>
                        </div>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-1" id="approvedCount">45</h3>
                    <p class="text-slate-400 text-sm">Disetujui</p>
                </div>

                <div class="bg-gradient-to-br from-red-500/10 to-rose-500/10 backdrop-blur-xl rounded-2xl p-6 border border-red-500/20">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-red-500 to-rose-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-times text-white text-xl"></i>
                        </div>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-1" id="rejectedCount">3</h3>
                    <p class="text-slate-400 text-sm">Ditolak</p>
                </div>

                <div class="bg-gradient-to-br from-blue-500/10 to-cyan-500/10 backdrop-blur-xl rounded-2xl p-6 border border-blue-500/20">
                    <div class="flex items-center justify-between mb-4">
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-users text-white text-xl"></i>
                        </div>
                    </div>
                    <h3 class="text-3xl font-bold text-white mb-1" id="totalCount">56</h3>
                    <p class="text-slate-400 text-sm">Total Pendaftaran</p>
                </div>
            </div>

            <!-- Filters -->
            <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl p-6 border border-slate-800 mb-6">
                <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                    <div>
                        <label class="text-slate-400 text-sm mb-2 block">Status</label>
                        <select id="filterStatus" onchange="filterData()" class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-orange-500">
                            <option value="all">Semua Status</option>
                            <option value="pending">Menunggu</option>
                            <option value="approved">Disetujui</option>
                            <option value="rejected">Ditolak</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-slate-400 text-sm mb-2 block">Ekstrakurikuler</label>
                        <select id="filterEskul" onchange="filterData()" class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-orange-500">
                            <option value="all">Semua Ekstrakurikuler</option>
                            <option value="basket">Basket</option>
                            <option value="paskibra">Paskibra</option>
                            <option value="coding">Coding Club</option>
                            <option value="music">Paduan Suara</option>
                            <option value="tari">Tari Tradisional</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-slate-400 text-sm mb-2 block">Kelas</label>
                        <select id="filterKelas" onchange="filterData()" class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-orange-500">
                            <option value="all">Semua Kelas</option>
                            <option value="X">Kelas X</option>
                            <option value="XI">Kelas XI</option>
                            <option value="XII">Kelas XII</option>
                        </select>
                    </div>
                    <div>
                        <label class="text-slate-400 text-sm mb-2 block">Urutkan</label>
                        <select id="sortBy" onchange="sortData()" class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-2.5 text-white focus:outline-none focus:border-orange-500">
                            <option value="newest">Terbaru</option>
                            <option value="oldest">Terlama</option>
                            <option value="name">Nama A-Z</option>
                        </select>
                    </div>
                </div>
            </div>

            <!-- Table -->
            <div class="bg-slate-900/50 backdrop-blur-xl rounded-2xl border border-slate-800 overflow-hidden">
                <div class="overflow-x-auto">
                    <table class="w-full">
                        <thead class="bg-slate-800/50 border-b border-slate-700">
                            <tr>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">
                                    <input type="checkbox" id="selectAll" onclick="toggleSelectAll()" class="rounded border-slate-600">
                                </th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Siswa</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Ekstrakurikuler</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Kelas</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Tanggal Daftar</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Status</th>
                                <th class="px-6 py-4 text-left text-xs font-semibold text-slate-400 uppercase tracking-wider">Aksi</th>
                            </tr>
                        </thead>
                        <tbody id="tableBody" class="divide-y divide-slate-800">
                            <!-- Data will be inserted here by JavaScript -->
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Pagination -->
            <div class="mt-6 flex items-center justify-between">
                <p class="text-slate-400 text-sm">Menampilkan <span id="showingCount">1-10</span> dari <span id="totalEntries">56</span> pendaftaran</p>
                <div class="flex space-x-2">
                    <button onclick="prevPage()" class="px-4 py-2 bg-slate-800 text-white rounded-lg hover:bg-slate-700 transition-colors">
                        <i class="fas fa-chevron-left"></i>
                    </button>
                    <button class="px-4 py-2 bg-orange-500 text-white rounded-lg">1</button>
                    <button class="px-4 py-2 bg-slate-800 text-white rounded-lg hover:bg-slate-700 transition-colors">2</button>
                    <button class="px-4 py-2 bg-slate-800 text-white rounded-lg hover:bg-slate-700 transition-colors">3</button>
                    <button onclick="nextPage()" class="px-4 py-2 bg-slate-800 text-white rounded-lg hover:bg-slate-700 transition-colors">
                        <i class="fas fa-chevron-right"></i>
                    </button>
                </div>
            </div>
        </main>
    </div>

    <!-- Detail Modal -->
    <div id="detailModal" class="modal fixed inset-0 bg-black/70 backdrop-blur-sm items-center justify-center z-50">
        <div class="bg-slate-900 rounded-2xl border border-slate-800 max-w-2xl w-full mx-4 max-h-[90vh] overflow-y-auto">
            <div class="p-6 border-b border-slate-800">
                <div class="flex items-center justify-between">
                    <h2 class="text-2xl font-bold text-white">Detail Pendaftaran</h2>
                    <button onclick="closeModal('detailModal')" class="text-slate-400 hover:text-white">
                        <i class="fas fa-times text-xl"></i>
                    </button>
                </div>
            </div>
            <div id="modalContent" class="p-6">
                <!-- Content will be inserted by JavaScript -->
            </div>
        </div>
    </div>

    <!-- Reject Modal -->
    <div id="rejectModal" class="modal fixed inset-0 bg-black/70 backdrop-blur-sm items-center justify-center z-50">
        <div class="bg-slate-900 rounded-2xl border border-slate-800 max-w-md w-full mx-4">
            <div class="p-6 border-b border-slate-800">
                <h2 class="text-xl font-bold text-white">Tolak Pendaftaran</h2>
            </div>
            <div class="p-6">
                <label class="text-slate-400 text-sm mb-2 block">Alasan Penolakan</label>
                <textarea id="rejectReason" rows="4" class="w-full bg-slate-800 border border-slate-700 rounded-xl px-4 py-2.5 text-white placeholder-slate-400 focus:outline-none focus:border-orange-500 resize-none" placeholder="Masukkan alasan penolakan..."></textarea>
            </div>
            <div class="p-6 border-t border-slate-800 flex space-x-3">
                <button onclick="closeModal('rejectModal')" class="flex-1 px-4 py-2.5 bg-slate-800 text-white rounded-xl hover:bg-slate-700 transition-colors">
                    Batal
                </button>
                <button onclick="confirmReject()" class="flex-1 px-4 py-2.5 bg-red-500 text-white rounded-xl hover:bg-red-600 transition-colors">
                    Tolak Pendaftaran
                </button>
            </div>
        </div>
    </div>

    <script>
        // Sample data
        let registrations = [
            { id: 1, name: 'Ahmad Fauzi', nis: '2024001', eskul: 'Basket', kelas: 'X RPL 1', phone: '081234567890', date: '2024-10-10', status: 'pending', reason: 'Tertarik dengan olahraga basket' },
            { id: 2, name: 'Siti Nurhaliza', nis: '2024002', eskul: 'Paduan Suara', kelas: 'X TKJ 2', phone: '081234567891', date: '2024-10-12', status: 'pending', reason: 'Suka menyanyi' },
            { id: 3, name: 'Budi Santoso', nis: '2024003', eskul: 'Paskibra', kelas: 'XI RPL 1', phone: '081234567892', date: '2024-10-09', status: 'approved', reason: 'Ingin mengembangkan kedisiplinan' },
            { id: 4, name: 'Dewi Lestari', nis: '2024004', eskul: 'Tari Tradisional', kelas: 'XI MM 1', phone: '081234567893', date: '2024-10-11', status: 'approved', reason: 'Mencintai budaya Indonesia' },
            { id: 5, name: 'Rudi Hermawan', nis: '2024005', eskul: 'Coding Club', kelas: 'X RPL 2', phone: '081234567894', date: '2024-10-13', status: 'pending', reason: 'Passion di programming' },
            { id: 6, name: 'Aisyah Putri', nis: '2024006', eskul: 'Basket', kelas: 'XII RPL 1', phone: '081234567895', date: '2024-10-08', status: 'rejected', reason: 'Kuota penuh', rejectionReason: 'Kuota ekstrakurikuler sudah penuh' },
            { id: 7, name: 'Farhan Malik', nis: '2024007', eskul: 'Coding Club', kelas: 'XI TKJ 1', phone: '081234567896', date: '2024-10-14', status: 'pending', reason: 'Ingin belajar web development' },
            { id: 8, name: 'Nadia Azzahra', nis: '2024008', eskul: 'Paduan Suara', kelas: 'X MM 2', phone: '081234567897', date: '2024-10-15', status: 'pending', reason: 'Hobi bernyanyi sejak kecil' }
        ];

        let currentId = null;

        function getStatusBadge(status) {
            const badges = {
                pending: '<span class="px-3 py-1 bg-yellow-500/20 text-yellow-400 rounded-full text-xs font-semibold">Menunggu</span>',
                approved: '<span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full text-xs font-semibold">Disetujui</span>',
                rejected: '<span class="px-3 py-1 bg-red-500/20 text-red-400 rounded-full text-xs font-semibold">Ditolak</span>'
            };
            return badges[status] || '';
        }

        function getEskulIcon(eskul) {
            const icons = {
                'Basket': 'fa-basketball-ball',
                'Paskibra': 'fa-flag',
                'Coding Club': 'fa-code',
                'Paduan Suara': 'fa-music',
                'Tari Tradisional': 'fa-masks-theater'
            };
            return icons[eskul] || 'fa-circle';
        }

        function renderTable() {
            const tbody = document.getElementById('tableBody');
            const filteredData = getFilteredData();
            
            tbody.innerHTML = filteredData.map(reg => `
                <tr class="hover:bg-slate-800/50 transition-colors">
                    <td class="px-6 py-4">
                        <input type="checkbox" class="row-checkbox rounded border-slate-600" value="${reg.id}">
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-10 h-10 bg-gradient-to-br from-orange-500 to-red-600 rounded-lg flex items-center justify-center">
                                <span class="text-white font-bold text-sm">${reg.name.charAt(0)}</span>
                            </div>
                            <div>
                                <p class="text-white font-semibold">${reg.name}</p>
                                <p class="text-slate-400 text-xs">NIS: ${reg.nis}</p>
                            </div>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-2">
                            <i class="fas ${getEskulIcon(reg.eskul)} text-orange-400"></i>
                            <span class="text-white">${reg.eskul}</span>
                        </div>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-slate-300">${reg.kelas}</span>
                    </td>
                    <td class="px-6 py-4">
                        <span class="text-slate-300">${formatDate(reg.date)}</span>
                    </td>
                    <td class="px-6 py-4">
                        ${getStatusBadge(reg.status)}
                    </td>
                    <td class="px-6 py-4">
                        <div class="flex items-center space-x-2">
                            <button onclick="viewDetail(${reg.id})" class="p-2 text-blue-400 hover:bg-blue-500/20 rounded-lg transition-colors" title="Detail">
                                <i class="fas fa-eye"></i>
                            </button>
                            ${reg.status === 'pending' ? `
                                <button onclick="approveRegistration(${reg.id})" class="p-2 text-green-400 hover:bg-green-500/20 rounded-lg transition-colors" title="Setujui">
                                    <i class="fas fa-check"></i>
                                </button>
                                <button onclick="openRejectModal(${reg.id})" class="p-2 text-red-400 hover:bg-red-500/20 rounded-lg transition-colors" title="Tolak">
                                    <i class="fas fa-times"></i>
                                </button>
                            ` : ''}
                        </div>
                    </td>
                </tr>
            `).join('');

            updateStats();
        }

        function formatDate(dateString) {
            const date = new Date(dateString);
            return date.toLocaleDateString('id-ID', { day: 'numeric', month: 'short', year: 'numeric' });
        }

        function getFilteredData() {
            let filtered = [...registrations];
            
            const statusFilter = document.getElementById('filterStatus').value;
            if (statusFilter !== 'all') {
                filtered = filtered.filter(r => r.status === statusFilter);
            }
            
            const eskulFilter = document.getElementById('filterEskul').value;
            if (eskulFilter !== 'all') {
                filtered = filtered.filter(r => r.eskul.toLowerCase().includes(eskulFilter));
            }
            
            const kelasFilter = document.getElementById('filterKelas').value;
            if (kelasFilter !== 'all') {
                filtered = filtered.filter(r => r.kelas.startsWith(kelasFilter));
            }
            
            const searchTerm = document.getElementById('searchInput').value.toLowerCase();
            if (searchTerm) {
                filtered = filtered.filter(r => 
                    r.name.toLowerCase().includes(searchTerm) ||
                    r.eskul.toLowerCase().includes(searchTerm) ||
                    r.nis.includes(searchTerm)
                );
            }
            
            return filtered;
        }

        function filterData() {
            renderTable();
        }

        function sortData() {
            const sortBy = document.getElementById('sortBy').value;
            
            if (sortBy === 'newest') {
                registrations.sort((a, b) => new Date(b.date) - new Date(a.date));
            } else if (sortBy === 'oldest') {
                registrations.sort((a, b) => new Date(a.date) - new Date(b.date));
            } else if (sortBy === 'name') {
                registrations.sort((a, b) => a.name.localeCompare(b.name));
            }
            
            renderTable();
        }

        function updateStats() {
            const pending = registrations.filter(r => r.status === 'pending').length;
            const approved = registrations.filter(r => r.status === 'approved').length;
            const rejected = registrations.filter(r => r.status === 'rejected').length;
            
            document.getElementById('pendingCount').textContent = pending;
            document.getElementById('approvedCount').textContent = approved;
            document.getElementById('rejectedCount').textContent = rejected;
            document.getElementById('totalCount').textContent = registrations.length;
        }

        function viewDetail(id) {
            const reg = registrations.find(r => r.id === id);
            if (!reg) return;
            
            const content = `
                <div class="space-y-6">
                    <div class="flex items-center space-x-4">
                        <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                            <span class="text-white font-bold text-2xl">${reg.name.charAt(0)}</span>
                        </div>
                        <div>
                            <h3 class="text-xl font-bold text-white">${reg.name}</h3>
                            <p class="text-slate-400">NIS: ${reg.nis}</p>
                        </div>
                    </div>
                    
                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-slate-400 text-sm mb-1">Ekstrakurikuler</p>
                            <p class="text-white font-semibold">${reg.eskul}</p>
                        </div>
                        <div>
                            <p class="text-slate-400 text-sm mb-1">Kelas</p>
                            <p class="text-white font-semibold">${reg.kelas}</p>
                        </div>
                        <div>
                            <p class="text-slate-400 text-sm mb-1">No. Telepon</p>
                            <p class="text-white font-semibold">${reg.phone}</p>
                        </div>
                        <div>
                            <p class="text-slate-400 text-sm mb-1">Tanggal Daftar</p>
                            <p class="text-white font-semibold">${formatDate(reg.date)}</p>
                        </div>
                    </div>
                    
                    <div>
                        <p class="text-slate-400 text-sm mb-2">Alasan Mendaftar</p>
                        <div class="bg-slate-800/50 rounded-xl p-4">
                            <p class="text-white">${reg.reason}</p>
                        </div>
                    </div>
                    
                    <div>
                        <p class="text-slate-400 text-sm mb-2">Status</p>
                        ${getStatusBadge(reg.status)}
                    </div>
                    
                    ${reg.status === 'rejected' && reg.rejectionReason ? `
                        <div>
                            <p class="text-slate-400 text-sm mb-2">Alasan Penolakan</p>
                            <div class="bg-red-500/10 border border-red-500/20 rounded-xl p-4">
                                <p class="text-red-400">${reg.rejectionReason}</p>
                            </div>
                        </div>
                    ` : ''}
                    
                    ${reg.status === 'pending' ? `
                        <div class="flex space-x-3 pt-4 border-t border-slate-800">
                            <button onclick="approveRegistration(${reg.id}); closeModal('detailModal')" class="flex-1 px-4 py-2.5 bg-green-500 text-white rounded-xl hover:bg-green-600 transition-colors">
                                <i class="fas fa-check mr-2"></i>Setujui
                            </button>
                            <button onclick="openRejectModal(${reg.id}); closeModal('detailModal')" class="flex-1 px-4 py-2.5 bg-red-500 text-white rounded-xl hover:bg-red-600 transition-colors">
                                <i class="fas fa-times mr-2"></i>Tolak
                            </button>
                        </div>
                    ` : ''}
                </div>
            `;
            
            document.getElementById('modalContent').innerHTML = content;
            document.getElementById('detailModal').classList.add('active');
        }

        function openRejectModal(id) {
            currentId = id;
            document.getElementById('rejectReason').value = '';
            document.getElementById('rejectModal').classList.add('active');
        }

        function closeModal(modalId) {
            document.getElementById(modalId).classList.remove('active');
        }

        function approveRegistration(id) {
            const reg = registrations.find(r => r.id === id);
            if (reg) {
                reg.status = 'approved';
                renderTable();
                showNotification('Pendaftaran berhasil disetujui!', 'success');
            }
        }

        function confirmReject() {
            const reason = document.getElementById('rejectReason').value.trim();
            if (!reason) {
                showNotification('Harap masukkan alasan penolakan!', 'error');
                return;
            }
            
            const reg = registrations.find(r => r.id === currentId);
            if (reg) {
                reg.status = 'rejected';
                reg.rejectionReason = reason;
                renderTable();
                closeModal('rejectModal');
                showNotification('Pendaftaran berhasil ditolak!', 'success');
            }
        }

        function toggleSelectAll() {
            const selectAll = document.getElementById('selectAll');
            const checkboxes = document.querySelectorAll('.row-checkbox');
            checkboxes.forEach(cb => cb.checked = selectAll.checked);
        }

        function showNotification(message, type) {
            const colors = {
                success: 'from-green-500 to-emerald-600',
                error: 'from-red-500 to-rose-600',
                info: 'from-blue-500 to-cyan-600'
            };
            
            const notification = document.createElement('div');
            notification.className = `fixed top-4 right-4 bg-gradient-to-r ${colors[type]} text-white px-6 py-4 rounded-xl shadow-lg z-50 animate-slide-in`;
            notification.innerHTML = `
                <div class="flex items-center space-x-3">
                    <i class="fas ${type === 'success' ? 'fa-check-circle' : type === 'error' ? 'fa-exclamation-circle' : 'fa-info-circle'} text-xl"></i>
                    <span class="font-semibold">${message}</span>
                </div>
            `;
            
            document.body.appendChild(notification);
            
            setTimeout(() => {
                notification.style.opacity = '0';
                notification.style.transform = 'translateX(100%)';
                notification.style.transition = 'all 0.3s ease-out';
                setTimeout(() => notification.remove(), 300);
            }, 3000);
        }

        function exportData() {
            showNotification('Data berhasil diekspor!', 'success');
        }

        function prevPage() {
            showNotification('Halaman sebelumnya', 'info');
        }

        function nextPage() {
            showNotification('Halaman selanjutnya', 'info');
        }

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', filterData);

        // Initialize
        renderTable();
        
        // Close modal when clicking outside
        document.getElementById('detailModal').addEventListener('click', function(e) {
            if (e.target === this) closeModal('detailModal');
        });
        
        document.getElementById('rejectModal').addEventListener('click', function(e) {
            if (e.target === this) closeModal('rejectModal');
        });
    </script>
</body>
</html>