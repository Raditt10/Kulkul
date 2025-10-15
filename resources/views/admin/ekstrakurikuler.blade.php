<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ekstrakurikuler - Kulkul SMKN 13</title>
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
                        <input type="text" id="searchInput" placeholder="Cari ekstrakurikuler..." 
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
                    <h1 class="text-4xl font-bold text-white mb-2">Ekstrakurikuler</h1>
                    <p class="text-slate-400">Kelola data ekstrakurikuler sekolah</p>
                </div>
                <button onclick="openModal()" class="px-6 py-3 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-xl hover:from-orange-400 hover:to-red-500 transition-all duration-300 font-semibold">
                    <i class="fas fa-plus mr-2"></i>Tambah Ekstrakurikuler
                </button>
            </div>

            <!-- Filter & Stats -->
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
                <div class="bg-gradient-to-br from-orange-500/10 to-red-500/10 backdrop-blur-xl rounded-xl p-4 border border-orange-500/20">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400 text-sm">Total Ekskul</p>
                            <h3 class="text-2xl font-bold text-white" id="totalEkskul">25</h3>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-users text-white text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-blue-500/10 to-cyan-500/10 backdrop-blur-xl rounded-xl p-4 border border-blue-500/20">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400 text-sm">Olahraga</p>
                            <h3 class="text-2xl font-bold text-white">8</h3>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-blue-500 to-cyan-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-basketball-ball text-white text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-purple-500/10 to-pink-500/10 backdrop-blur-xl rounded-xl p-4 border border-purple-500/20">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400 text-sm">Seni & Budaya</p>
                            <h3 class="text-2xl font-bold text-white">10</h3>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-music text-white text-xl"></i>
                        </div>
                    </div>
                </div>

                <div class="bg-gradient-to-br from-green-500/10 to-emerald-500/10 backdrop-blur-xl rounded-xl p-4 border border-green-500/20">
                    <div class="flex items-center justify-between">
                        <div>
                            <p class="text-slate-400 text-sm">Akademik</p>
                            <h3 class="text-2xl font-bold text-white">7</h3>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-book text-white text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter Buttons -->
            <div class="mb-6 flex items-center space-x-3">
                <button onclick="filterCategory('all')" class="filter-btn active px-4 py-2 bg-slate-800 text-white rounded-lg hover:bg-slate-700 transition-colors">
                    Semua
                </button>
                <button onclick="filterCategory('olahraga')" class="filter-btn px-4 py-2 bg-slate-800 text-slate-400 rounded-lg hover:bg-slate-700 transition-colors">
                    Olahraga
                </button>
                <button onclick="filterCategory('seni')" class="filter-btn px-4 py-2 bg-slate-800 text-slate-400 rounded-lg hover:bg-slate-700 transition-colors">
                    Seni & Budaya
                </button>
                <button onclick="filterCategory('akademik')" class="filter-btn px-4 py-2 bg-slate-800 text-slate-400 rounded-lg hover:bg-slate-700 transition-colors">
                    Akademik
                </button>
            </div>

            <!-- Ekstrakurikuler Grid -->
            <div id="ekskulGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                <!-- Cards will be inserted here by JavaScript -->
            </div>
        </main>
    </div>

    <!-- Modal Add/Edit Ekstrakurikuler -->
    <div id="ekskulModal" class="modal fixed inset-0 bg-black/70 backdrop-blur-sm items-center justify-center z-50">
        <div class="bg-slate-900 rounded-2xl p-8 max-w-2xl w-full mx-4 border border-slate-800">
            <div class="flex items-center justify-between mb-6">
                <h2 class="text-2xl font-bold text-white">Tambah Ekstrakurikuler</h2>
                <button onclick="closeModal()" class="text-slate-400 hover:text-white transition-colors">
                    <i class="fas fa-times text-2xl"></i>
                </button>
            </div>

            <form id="ekskulForm" class="space-y-4">
                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Nama Ekstrakurikuler</label>
                    <input type="text" id="namaEkskul" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">Kategori</label>
                        <select id="kategoriEkskul" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                            <option value="olahraga">Olahraga</option>
                            <option value="seni">Seni & Budaya</option>
                            <option value="akademik">Akademik</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">Pembina</label>
                        <input type="text" id="pembinaEkskul" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                    </div>
                </div>

                <div class="grid grid-cols-2 gap-4">
                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">Hari</label>
                        <select id="hariEkskul" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                            <option value="Senin">Senin</option>
                            <option value="Selasa">Selasa</option>
                            <option value="Rabu">Rabu</option>
                            <option value="Kamis">Kamis</option>
                            <option value="Jumat">Jumat</option>
                            <option value="Sabtu">Sabtu</option>
                        </select>
                    </div>

                    <div>
                        <label class="block text-slate-400 text-sm font-medium mb-2">Waktu</label>
                        <input type="text" id="waktuEkskul" placeholder="15:00 - 17:00" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                    </div>
                </div>

                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Anggota</label>
                    <input type="number" id="anggotaEkskul" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors">
                </div>
                <div>
                    <label class="block text-slate-400 text-sm font-medium mb-2">Deskripsi</label>
                    <textarea id="deskripsiEkskul" rows="3" required class="w-full bg-slate-800 border border-slate-700 rounded-lg px-4 py-2.5 text-white focus:outline-none focus:border-orange-500 transition-colors"></textarea>
                </div>

                <div class="flex space-x-3 pt-4">
                    <button type="submit" class="flex-1 px-6 py-3 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-xl hover:from-orange-400 hover:to-red-500 transition-all duration-300 font-semibold">
                        <i class="fas fa-save mr-2"></i>Simpan
                    </button>
                    <button type="button" onclick="closeModal()" class="px-6 py-3 bg-slate-800 text-white rounded-xl hover:bg-slate-700 transition-all duration-300 font-semibold">
                        Batal
                    </button>
                </div>
            </form>
        </div>
    </div>

   <script>
    // ======== DATA SAMPLE ========
    let ekskulData = [
        { id: 1, nama: 'Basket', kategori: 'olahraga', pembina: 'Budi Santoso', hari: 'Senin & Kamis', waktu: '15:00 - 17:00', anggota: 45, deskripsi: 'Ekstrakurikuler basket untuk melatih kerjasama tim dan kebugaran' },
        { id: 2, nama: 'Futsal', kategori: 'olahraga', pembina: 'Ahmad Rifai', hari: 'Selasa & Jumat', waktu: '15:30 - 17:30', anggota: 52, deskripsi: 'Melatih keterampilan bermain futsal dan sportivitas' },
        { id: 3, nama: 'Paduan Suara', kategori: 'seni', pembina: 'Siti Nurhaliza', hari: 'Rabu', waktu: '14:00 - 16:00', anggota: 38, deskripsi: 'Mengembangkan kemampuan vokal dan harmonisasi' },
        { id: 4, nama: 'Robotika', kategori: 'akademik', pembina: 'Irfan Hakim', hari: 'Jumat', waktu: '13:00 - 15:00', anggota: 35, deskripsi: 'Belajar pemrograman dan merakit robot' },
    ];

    let currentFilter = 'all';
    let editMode = false;
    let editId = null;

    // ======== RENDER KARTU EKSKUL ========
    function renderCards(data) {
        const grid = document.getElementById('ekskulGrid');
        grid.innerHTML = '';

        const categoryColors = {
            olahraga: 'from-blue-500 to-cyan-600',
            seni: 'from-purple-500 to-pink-600',
            akademik: 'from-green-500 to-emerald-600'
        };

        const categoryIcons = {
            olahraga: 'fa-basketball-ball',
            seni: 'fa-music',
            akademik: 'fa-book'
        };

        data.forEach(ekskul => {
            const card = document.createElement('div');
            card.className = 'bg-slate-900/50 backdrop-blur-xl rounded-2xl p-6 border border-slate-800 hover:border-orange-500/40 hover:scale-[1.02] transition-all duration-300 shadow-lg hover:shadow-orange-500/20';
            card.innerHTML = `
                <div class="flex items-start justify-between mb-4">
                    <div class="w-14 h-14 bg-gradient-to-br ${categoryColors[ekskul.kategori]} rounded-xl flex items-center justify-center shadow-md">
                        <i class="fas ${categoryIcons[ekskul.kategori]} text-white text-2xl"></i>
                    </div>
                    <div class="flex space-x-2">
                        <button onclick="editEkskul(${ekskul.id})" class="p-2 text-slate-400 hover:text-orange-400 transition-colors">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button onclick="deleteEkskul(${ekskul.id})" class="p-2 text-slate-400 hover:text-red-400 transition-colors">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
                
                <h3 class="text-xl font-bold text-white mb-2">${ekskul.nama}</h3>
                <p class="text-slate-400 text-sm mb-4">${ekskul.deskripsi}</p>
                
                <div class="space-y-2 mb-4">
                    <div class="flex items-center text-sm"><i class="fas fa-user-tie text-orange-400 w-5"></i><span class="text-slate-300">${ekskul.pembina}</span></div>
                    <div class="flex items-center text-sm"><i class="fas fa-calendar text-orange-400 w-5"></i><span class="text-slate-300">${ekskul.hari}</span></div>
                    <div class="flex items-center text-sm"><i class="fas fa-clock text-orange-400 w-5"></i><span class="text-slate-300">${ekskul.waktu}</span></div>
                </div>
                
                <div class="pt-4 border-t border-slate-800 flex items-center justify-between">
                    <div class="flex items-center space-x-2">
                        <i class="fas fa-users text-slate-400"></i>
                        <span class="text-white font-semibold">${ekskul.anggota} Anggota</span>
                    </div>
                    <button class="px-4 py-2 bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-400 hover:to-red-500 text-white rounded-lg transition-all text-sm font-medium shadow-md hover:shadow-orange-500/20">
                        Detail
                    </button>
                </div>
            `;
            grid.appendChild(card);
        });
    }

    // ======== FILTER KATEGORI ========
    function filterCategory(category, event) {
        currentFilter = category;
        document.querySelectorAll('.filter-btn').forEach(btn => {
            btn.classList.remove('bg-orange-500', 'text-white');
            btn.classList.add('text-slate-400');
        });
        event.target.classList.add('bg-orange-500', 'text-white');
        event.target.classList.remove('text-slate-400');

        const filtered = category === 'all' ? ekskulData : ekskulData.filter(e => e.kategori === category);
        renderCards(filtered);
    }

    // ======== PENCARIAN ========
    document.getElementById('searchInput').addEventListener('input', e => {
        const searchTerm = e.target.value.toLowerCase();
        let filtered = currentFilter === 'all' ? ekskulData : ekskulData.filter(e => e.kategori === currentFilter);
        filtered = filtered.filter(e => 
            e.nama.toLowerCase().includes(searchTerm) ||
            e.pembina.toLowerCase().includes(searchTerm)
        );
        renderCards(filtered);
    });

    // ======== MODAL ========
    function openModal(isEdit = false) {
    const modal = document.getElementById('ekskulModal');
    const modalTitle = modal.querySelector('h2');

    modal.classList.add('active');
    editMode = isEdit;

    // 🔥 Ubah judul modal tergantung mode
    modalTitle.textContent = isEdit ? 'Edit Ekskul' : 'Tambah Ekskul';
}

function closeModal() {
    const modal = document.getElementById('ekskulModal');
    const modalTitle = modal.querySelector('h2');

    modal.classList.remove('active');
    editMode = false;
    editId = null;

    // 🔥 Balikin judul ke default
    modalTitle.textContent = 'Tambah Ekskul';

    document.getElementById('ekskulForm').reset();
}


    function closeModal() {
        document.getElementById('ekskulModal').classList.remove('active');
        editMode = false;
        editId = null;
        document.getElementById('ekskulForm').reset();
    }

    // ======== FORM TAMBAH / EDIT ========
    const form = document.getElementById('ekskulForm');
    form.addEventListener('submit', e => {
        e.preventDefault();

        const newData = {
            id: editMode ? editId : ekskulData.length + 1,
            nama: document.getElementById('namaEkskul').value,
            kategori: document.getElementById('kategoriEkskul').value,
            pembina: document.getElementById('pembinaEkskul').value,
            hari: document.getElementById('hariEkskul').value,
            waktu: document.getElementById('waktuEkskul').value,
            anggota: parseInt(document.getElementById('anggotaEkskul').value),
            deskripsi: document.getElementById('deskripsiEkskul').value
        };

        if (editMode) {
            const index = ekskulData.findIndex(e => e.id === editId);
            ekskulData[index] = newData;
            alert('✅ Data ekskul berhasil diperbarui!');
        } else {
            ekskulData.push(newData);
            alert('✅ Ekstrakurikuler baru berhasil ditambahkan!');
        }

        renderCards(ekskulData);
        closeModal();
    });

    // ======== EDIT EKSKUL ========
    function editEkskul(id) {
        const ekskul = ekskulData.find(e => e.id === id);
        if (!ekskul) return;

        document.getElementById('namaEkskul').value = ekskul.nama;
        document.getElementById('kategoriEkskul').value = ekskul.kategori;
        document.getElementById('pembinaEkskul').value = ekskul.pembina;
        document.getElementById('hariEkskul').value = ekskul.hari;
        document.getElementById('waktuEkskul').value = ekskul.waktu;
        document.getElementById('anggotaEkskul').value = ekskul.anggota;
        document.getElementById('deskripsiEkskul').value = ekskul.deskripsi;

        editId = id;
        openModal(true);
    }

    // ======== HAPUS EKSKUL ========
    function deleteEkskul(id) {
        if (confirm('Apakah Anda yakin ingin menghapus ekstrakurikuler ini?')) {
            ekskulData = ekskulData.filter(e => e.id !== id);
            alert('🗑️ Data ekskul telah dihapus.');
            renderCards(ekskulData);
        }
    }

    // ======== AWAL RENDER ========
    renderCards(ekskulData);
</script>

</body>
</html>