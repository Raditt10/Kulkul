<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <title>Admin Ekstrakurikuler Kulkul</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: { slate: { 850: '#1a2234' } }
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
    @php $site = 'eskul' @endphp

    @include('admin/includes.sidebar')

    @include('admin.includes.notif')

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
                            <h3 id="countOlahraga" class="text-2xl font-bold text-white">0</h3>
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
                            <h3 id="countSeni" class="text-2xl font-bold text-white">0</h3>
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
                            <h3 id="countAkademik" class="text-2xl font-bold text-white">0</h3>
                        </div>
                        <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-lg flex items-center justify-center">
                            <i class="fas fa-book text-white text-xl"></i>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Filter Buttons -->
            <div class="mb-6 flex items-center space-x-3">
                <button onclick="filterCategory('all', event)" class="filter-btn active px-4 py-2 bg-slate-800 text-white rounded-lg hover:bg-slate-700 transition-colors">Semua</button>
                <button onclick="filterCategory('olahraga', event)" class="filter-btn px-4 py-2 bg-slate-800 text-slate-400 rounded-lg hover:bg-slate-700 transition-colors">Olahraga</button>
                <button onclick="filterCategory('seni', event)" class="filter-btn px-4 py-2 bg-slate-800 text-slate-400 rounded-lg hover:bg-slate-700 transition-colors">Seni & Budaya</button>
                <button onclick="filterCategory('akademik', event)" class="filter-btn px-4 py-2 bg-slate-800 text-slate-400 rounded-lg hover:bg-slate-700 transition-colors">Akademik</button>
            </div>

            <!-- Ekstrakurikuler Grid -->
            <div id="ekskulGrid" class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6"></div>
        </main>
    </div>

    <!-- Modal Add/Edit -->
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
                            <option value="seni">Seni</option>
                            <option value="akademik">Akademik</option>
                            <option value="tekhnologi">Tekhnologi</option>
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
                            <option>Senin</option><option>Selasa</option><option>Rabu</option>
                            <option>Kamis</option><option>Jumat</option><option>Sabtu</option>
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
                    <button type="button" onclick="closeModal()" class="px-6 py-3 bg-slate-800 text-white rounded-xl hover:bg-slate-700 transition-all duration-300 font-semibold">Batal</button>
                </div>
            </form>
        </div>
    </div>

<script>
let ekskulData = @json($data_ekskul);
console.log(ekskulData);
ekskulData = ekskulData.map(e => ({
    ...e,
    id: e.id_ekskul,
    nama: e.nama_ekskul,
    kategori: e.kategori,
    waktu: `${e.jam_mulai} - ${e.jam_selesai}`
}));

let currentFilter = 'all';
let editMode = false;
let editId = null;

const categoryColors = {
    olahraga: 'from-blue-500 to-cyan-600',
    seni: 'from-purple-500 to-pink-600',
    akademik: 'from-green-500 to-emerald-600',
    tekhnologi: 'from-orange-100 to-setle-500'
};
const categoryIcons = {
    olahraga: 'fa-basketball-ball',
    seni: 'fa-music',
    akademi: 'fa-book',
    tekhnologi: 'fas fa-code'    
};

// ======= RENDER CARD =======
function renderCards(data) {
    const grid = document.getElementById('ekskulGrid');
    grid.innerHTML = '';
    data.forEach(item => {
        const card = document.createElement('div');
        card.className = 'bg-slate-900/50 backdrop-blur-xl rounded-2xl p-6 border border-slate-800 hover:border-orange-500/40 hover:scale-[1.02] transition-all duration-300 shadow-lg hover:shadow-orange-500/20';
        card.innerHTML = `
            <div class="flex items-start justify-between mb-4">
                <div class="w-14 h-14 bg-gradient-to-br ${categoryColors[item.kategori]} rounded-xl flex items-center justify-center shadow-md">
                    <i class="fas ${categoryIcons[item.kategori]} text-white text-2xl"></i>
                </div>
                <div class="flex space-x-2">
                    <button onclick="editEkskul(${item.id})" class="p-2 text-slate-400 hover:text-orange-400 transition-colors">
                        <i class="fas fa-edit"></i>
                    </button>
                    <button onclick="deleteEkskul(${item.id})" class="p-2 text-slate-400 hover:text-red-400 transition-colors">
                        <i class="fas fa-trash"></i>
                    </button>
                </div>
            </div>
            <h3 class="text-xl font-bold text-white mb-2">${item.nama}</h3>
            <p class="text-slate-400 text-sm mb-4">${item.deskripsi}</p>
            <div class="space-y-2 mb-4">
                <div class="flex items-center text-sm"><i class="fas fa-user-tie text-orange-400 w-5"></i><span class="text-slate-300">${item.pembina}</span></div>
                <div class="flex items-center text-sm"><i class="fas fa-calendar text-orange-400 w-5"></i><span class="text-slate-300">${item.hari}</span></div>
                <div class="flex items-center text-sm"><i class="fas fa-clock text-orange-400 w-5"></i><span class="text-slate-300">${item.waktu}</span></div>
            </div>
            <div class="pt-4 border-t border-slate-800 flex items-center justify-between">
                <div class="flex items-center space-x-2">
                    <i class="fas fa-users text-slate-400"></i>
                    <span class="text-white font-semibold">${item.anggota} Anggota</span>
                </div>
                <button class="px-4 py-2 bg-gradient-to-r from-orange-500 to-red-600 hover:from-orange-400 hover:to-red-500 text-white rounded-lg transition-all text-sm font-medium shadow-md hover:shadow-orange-500/20">Detail</button>
            </div>
        `;
        grid.appendChild(card);
    });
    
}

function updateTotals() {
    const counts = { olahraga: 0, seni: 0, akademik: 0 };

    ekskulData.forEach(e => {
        if (counts[e.kategori] !== undefined) counts[e.kategori]++;
    });

    document.getElementById('totalEkskul').textContent = ekskulData.length;
    document.getElementById('countOlahraga').textContent = counts.olahraga;
    document.getElementById('countSeni').textContent = counts.seni;
    document.getElementById('countAkademik').textContent = counts.akademik;
}


// ======= FILTER =======
function filterCategory(category, event) {
    currentFilter = category;
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.classList.remove('bg-orange-500','text-white');
        btn.classList.add('text-slate-400');
    });
    event.target.classList.add('bg-orange-500','text-white');
    event.target.classList.remove('text-slate-400');

    const filtered = category === 'all' ? ekskulData : ekskulData.filter(e => e.kategori === category);
    renderCards(filtered);
    
}

// ======= SEARCH =======
document.getElementById('searchInput').addEventListener('input', e => {
    const term = e.target.value.toLowerCase();
    let filtered = currentFilter === 'all' ? ekskulData : ekskulData.filter(e => e.kategori === currentFilter);
    filtered = filtered.filter(e => e.nama.toLowerCase().includes(term) || e.pembina.toLowerCase().includes(term));
    renderCards(filtered);
});

// ======= MODAL =======
function openModal(isEdit=false) {
    const modal = document.getElementById('ekskulModal');
    modal.classList.add('active');
    editMode = isEdit;
    modal.querySelector('h2').textContent = isEdit ? 'Edit Ekskul' : 'Tambah Ekstrakurikuler';
}
function closeModal() {
    const modal = document.getElementById('ekskulModal');
    modal.classList.remove('active');
    editMode = false;
    editId = null;
    document.getElementById('ekskulForm').reset();
}

// ======= FORM SUBMIT =======
document.getElementById('ekskulForm').addEventListener('submit', async e => {
    e.preventDefault();
     console.log('Tombol simpan diklik!');
    const data = {
        id: editMode ? editId : ekskulData.length + 1,
        nama: document.getElementById('namaEkskul').value,
        kategori: document.getElementById('kategoriEkskul').value,
        pembina: document.getElementById('pembinaEkskul').value,
        hari: document.getElementById('hariEkskul').value,
        waktu: document.getElementById('waktuEkskul').value,
        anggota: parseInt(document.getElementById('anggotaEkskul').value),
        deskripsi: document.getElementById('deskripsiEkskul').value
    };


    // 💡 Ganti bagian ini
    try {
        let res, result;

        if (editMode) {
            // UPDATE DATA
            res = await fetch(`/admin/ekstrakurikuler/${editId}`, {
                method: 'PUT',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(data)
            });
        } else {
            // TAMBAH DATA
            res = await fetch(`/admin/ekstrakurikuler`, {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                },
                body: JSON.stringify(data)
            });
        }

        result = await res.json();

        if (result.success) {
            if (editMode) {
                const index = ekskulData.findIndex(e => e.id === editId);
                ekskulData[index] = { ...ekskulData[index], ...data, id: editId };
                alert('✅ Data berhasil diperbarui!');
            } else {
                ekskulData.push({ ...data, id: result.data.id_ekskul });
                alert('✅ Data berhasil ditambahkan!');
            }

            renderCards(ekskulData);
            updateTotals(); // <--- update jumlah total & kategori 
            closeModal();
        } else {
            alert('⚠️ Gagal menyimpan data!');
        }

    } catch (error) {
        console.error(error);
        alert('❌ Terjadi kesalahan. Cek console untuk detail.');
    }
});

// ======= EDIT =======
function editEkskul(id){
    const ekskul = ekskulData.find(e=>e.id===id);
    if(!ekskul) return;

    document.getElementById('namaEkskul').value = ekskul.nama;
    document.getElementById('kategoriEkskul').value = ekskul.kategori;
    document.getElementById('pembinaEkskul').value = ekskul.pembina;
    document.getElementById('hariEkskul').value = ekskul.hari;
    document.getElementById('waktuEkskul').value = ekskul.waktu;
    document.getElementById('anggotaEkskul').value = ekskul.anggota;
    document.getElementById('deskripsiEkskul').value = ekskul.deskripsi;

    editId = id;
    openModal(true);
    // contoh di deleteEkskul()
    ekskulData = ekskulData.filter(e => e.id !== id);
    renderCards(ekskulData);
    updateTotals();
}

// ======= DELETE =======
function deleteEkskul(id){
    if(confirm('Apakah Anda yakin ingin menghapus ekstrakurikuler ini?')){
        fetch(`/admin/ekstrakurikuler/${id}`, {
            method: 'DELETE',
            headers: {
                'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                'Content-Type': 'application/json'
            }
        })
        .then(res => res.json())
        .then(result => {
            if(result.success){
                // Hapus dari local array supaya UI update
                ekskulData = ekskulData.filter(e => e.id !== id);
                renderCards(ekskulData);
                updateTotals();
                alert('🗑️ Data ekskul telah dihapus.');
            } else {
                alert('⚠️ Gagal menghapus data.');
            }
        })
        .catch(err => {
            console.error(err);
            alert('❌ Terjadi kesalahan saat menghapus.');
        });
    }
    // contoh di deleteEkskul()
    ekskulData = ekskulData.filter(e => e.id !== id);
    renderCards(ekskulData);
    updateTotals();

}

// ======= INITIAL RENDER =======
renderCards(ekskulData);
updateTotals();

</script>

</body>
</html>
