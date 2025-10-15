// Data Ekstrakurikuler
const eskulData = [
    {
        id: 1,
        name: 'Basket',
        category: 'olahraga',
        icon: 'fa-basketball-ball',
        gradient: 'from-orange-500 to-red-600',
        schedule: 'Senin & Rabu, 15:00 - 17:00',
        members: 24,
        coach: 'Bapak Agus Santoso',
        description: 'Ekstrakurikuler basket untuk mengembangkan kemampuan bermain basket dan kerjasama tim.',
        achievements: ['Juara 1 Basket Antar Sekolah 2024', 'Juara 2 Piala Gubernur'],
        available: true
    },
    {
        id: 2,
        name: 'Paskibra',
        category: 'olahraga',
        icon: 'fa-flag',
        gradient: 'from-blue-500 to-cyan-600',
        schedule: 'Selasa & Kamis, 14:00 - 16:00',
        members: 18,
        coach: 'Ibu Siti Nurhaliza',
        description: 'Pasukan Pengibar Bendera untuk melatih kedisiplinan dan keterampilan baris-berbaris.',
        achievements: ['Peleton Inti HUT RI 2024', 'Juara 1 LKBB Tingkat Kota'],
        available: true
    },
    {
        id: 3,
        name: 'Coding Club',
        category: 'teknologi',
        icon: 'fa-code',
        gradient: 'from-purple-500 to-pink-600',
        schedule: 'Rabu & Jumat, 15:00 - 17:00',
        members: 32,
        coach: 'Bapak Dedi Kurniawan',
        description: 'Belajar programming, web development, dan pengembangan aplikasi.',
        achievements: ['Juara 2 Hackathon Jabar 2024', 'Best App Innovation'],
        available: true
    },
    {
        id: 4,
        name: 'Paduan Suara',
        category: 'seni',
        icon: 'fa-music',
        gradient: 'from-green-500 to-emerald-600',
        schedule: 'Senin & Kamis, 15:30 - 17:30',
        members: 28,
        coach: 'Ibu Dewi Lestari',
        description: 'Mengembangkan kemampuan vokal dan harmonisasi dalam bernyanyi bersama.',
        achievements: ['Juara 1 Choir Competition 2024', 'Best Vocal Group'],
        available: true
    },
    {
        id: 5,
        name: 'Tari Tradisional',
        category: 'seni',
        icon: 'fa-masks-theater',
        gradient: 'from-yellow-500 to-orange-600',
        schedule: 'Selasa & Jumat, 14:30 - 16:30',
        members: 20,
        coach: 'Ibu Rina Wulandari',
        description: 'Melestarikan budaya Indonesia melalui seni tari tradisional Nusantara.',
        achievements: ['Juara 1 Festival Tari 2024', 'Penampilan Terbaik'],
        available: true
    },
    {
        id: 6,
        name: 'Futsal',
        category: 'olahraga',
        icon: 'fa-futbol',
        gradient: 'from-red-500 to-rose-600',
        schedule: 'Rabu & Sabtu, 15:00 - 17:00',
        members: 30,
        coach: 'Bapak Rudi Hermawan',
        description: 'Ekstrakurikuler futsal untuk meningkatkan skill dan strategi bermain.',
        achievements: ['Juara 3 Liga Futsal Pelajar 2024'],
        available: false
    },
    {
        id: 7,
        name: 'Robotik',
        category: 'teknologi',
        icon: 'fa-robot',
        gradient: 'from-indigo-500 to-purple-600',
        schedule: 'Senin & Kamis, 14:00 - 16:00',
        members: 15,
        coach: 'Bapak Ahmad Fauzi',
        description: 'Belajar merancang, membuat, dan memprogram robot untuk berbagai kompetisi.',
        achievements: ['Juara 2 Kompetisi Robot Nasional 2024'],
        available: true
    },
    {
        id: 8,
        name: 'Jurnalistik',
        category: 'akademik',
        icon: 'fa-newspaper',
        gradient: 'from-teal-500 to-cyan-600',
        schedule: 'Rabu & Jumat, 14:00 - 16:00',
        members: 22,
        coach: 'Ibu Farida Hanum',
        description: 'Mengembangkan kemampuan menulis, fotografi, dan membuat konten media.',
        achievements: ['Best School Magazine 2024', 'Juara 1 Lomba Jurnalistik'],
        available: true
    },
    {
        id: 9,
        name: 'English Club',
        category: 'akademik',
        icon: 'fa-language',
        gradient: 'from-pink-500 to-rose-600',
        schedule: 'Selasa & Kamis, 15:00 - 17:00',
        members: 25,
        coach: 'Miss Sarah Johnson',
        description: 'Meningkatkan kemampuan berbahasa Inggris melalui conversation dan public speaking.',
        achievements: ['Juara 1 Debate Competition 2024', 'Best Speaker Award'],
        available: true
    },
    {
        id: 10,
        name: 'Seni Lukis',
        category: 'seni',
        icon: 'fa-paint-brush',
        gradient: 'from-amber-500 to-orange-600',
        schedule: 'Senin & Rabu, 14:30 - 16:30',
        members: 18,
        coach: 'Bapak Budi Santoso',
        description: 'Mengembangkan kreativitas dan kemampuan melukis dengan berbagai media.',
        achievements: ['Juara 2 Lomba Lukis Tingkat Provinsi'],
        available: true
    }
];

// Filter function
function filterEskul(category) {
    const filtered = category === 'all' 
        ? eskulData 
        : eskulData.filter(eskul => eskul.category === category);
    
    renderEskulCards(filtered);
    
    // Update active filter button
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.classList.remove('active', 'bg-gradient-to-r', 'from-orange-500', 'to-red-600');
        btn.classList.add('bg-slate-800');
    });
    
    event.target.classList.add('active', 'bg-gradient-to-r', 'from-orange-500', 'to-red-600');
    event.target.classList.remove('bg-slate-800');
}

// Render Eskul Cards
function renderEskulCards(data) {
    const grid = document.getElementById('eskulGrid');
    
    grid.innerHTML = data.map(eskul => `
        <div class="eskul-card bg-gradient-to-br from-slate-800/50 to-slate-900/50 backdrop-blur-xl rounded-3xl border border-slate-700 overflow-hidden hover-lift glass-effect group" data-category="${eskul.category}">
            <!-- Header with Icon -->
            <div class="relative bg-gradient-to-br ${eskul.gradient} p-8">
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-16 -mt-16"></div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-white/20 backdrop-blur-xl rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas ${eskul.icon} text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-2">${eskul.name}</h3>
                    <p class="text-white/80 text-sm">
                        <i class="fas fa-clock mr-2"></i>${eskul.schedule}
                    </p>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <!-- Stats -->
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="bg-slate-800/50 rounded-xl p-3 text-center">
                        <i class="fas fa-users text-orange-400 mb-2"></i>
                        <p class="text-white font-bold">${eskul.members}</p>
                        <p class="text-slate-400 text-xs">Anggota</p>
                    </div>
                    <div class="bg-slate-800/50 rounded-xl p-3 text-center">
                        <i class="fas fa-chalkboard-teacher text-blue-400 mb-2"></i>
                        <p class="text-white font-bold text-sm">${eskul.coach.split(' ').slice(0, 2).join(' ')}</p>
                        <p class="text-slate-400 text-xs">Pembina</p>
                    </div>
                </div>

                <!-- Description -->
                <p class="text-slate-300 text-sm mb-4 line-clamp-3">${eskul.description}</p>

                <!-- Achievements -->
                <div class="mb-6">
                    <p class="text-slate-400 text-xs font-semibold mb-2">
                        <i class="fas fa-trophy text-yellow-400 mr-1"></i>Prestasi Terbaru:
                    </p>
                    ${eskul.achievements.map(achievement => `
                        <span class="inline-block bg-gradient-to-r from-orange-500/10 to-red-500/10 border border-orange-500/20 text-orange-300 text-xs px-3 py-1 rounded-full mb-2 mr-2">
                            ${achievement}
                        </span>
                    `).join('')}
                </div>

                <!-- Status Badge -->
                <div class="mb-4">
                    ${eskul.available 
                        ? '<span class="inline-flex items-center px-3 py-1 bg-green-500/20 text-green-400 text-xs font-semibold rounded-full"><i class="fas fa-check-circle mr-2"></i>Tersedia</span>'
                        : '<span class="inline-flex items-center px-3 py-1 bg-red-500/20 text-red-400 text-xs font-semibold rounded-full"><i class="fas fa-times-circle mr-2"></i>Kuota Penuh</span>'
                    }
                </div>

                <!-- Action Button -->
                <button onclick="viewDetail(${eskul.id})" class="w-full px-4 py-3 bg-slate-800 hover:bg-slate-700 text-white font-semibold rounded-xl transition-all duration-300 border border-slate-700 hover:border-orange-500">
                    <i class="fas fa-info-circle mr-2"></i>Lihat Detail
                </button>
            </div>
        </div>
    `).join('');
}

// View Detail Function
function viewDetail(id) {
    const eskul = eskulData.find(e => e.id === id);
    if (!eskul) return;

    // Create modal
    const modal = document.createElement('div');
    modal.id = 'detailModal';
    modal.className = 'fixed inset-0 bg-black/80 backdrop-blur-sm flex items-center justify-center z-50 p-4';
    modal.innerHTML = `
        <div class="bg-slate-900 rounded-3xl border border-slate-700 max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <!-- Header -->
            <div class="relative bg-gradient-to-br ${eskul.gradient} p-8">
                <button onclick="closeModal()" class="absolute top-4 right-4 w-10 h-10 bg-white/20 backdrop-blur-xl rounded-full flex items-center justify-center text-white hover:bg-white/30 transition-colors">
                    <i class="fas fa-times"></i>
                </button>
                <div class="flex items-center space-x-4">
                    <div class="w-20 h-20 bg-white/20 backdrop-blur-xl rounded-2xl flex items-center justify-center">
                        <i class="fas ${eskul.icon} text-white text-4xl"></i>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-white mb-2">${eskul.name}</h2>
                        <p class="text-white/80"><i class="fas fa-clock mr-2"></i>${eskul.schedule}</p>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-8 space-y-6">
                <!-- Description -->
                <div>
                    <h3 class="text-xl font-bold text-white mb-3">Deskripsi</h3>
                    <p class="text-slate-300">${eskul.description}</p>
                </div>

                <!-- Info Grid -->
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="bg-slate-800/50 rounded-xl p-4">
                        <p class="text-slate-400 text-sm mb-1">Jumlah Anggota</p>
                        <p class="text-white font-bold text-lg"><i class="fas fa-users text-orange-400 mr-2"></i>${eskul.members} Siswa</p>
                    </div>
                    <div class="bg-slate-800/50 rounded-xl p-4">
                        <p class="text-slate-400 text-sm mb-1">Pembina</p>
                        <p class="text-white font-bold text-lg"><i class="fas fa-chalkboard-teacher text-blue-400 mr-2"></i>${eskul.coach}</p>
                    </div>
                    <div class="bg-slate-800/50 rounded-xl p-4">
                        <p class="text-slate-400 text-sm mb-1">Kategori</p>
                        <p class="text-white font-bold text-lg capitalize"><i class="fas fa-tag text-purple-400 mr-2"></i>${eskul.category}</p>
                    </div>
                    <div class="bg-slate-800/50 rounded-xl p-4">
                        <p class="text-slate-400 text-sm mb-1">Status</p>
                        <p class="text-white font-bold text-lg">
                            ${eskul.available 
                                ? '<i class="fas fa-check-circle text-green-400 mr-2"></i><span class="text-green-400">Tersedia</span>'
                                : '<i class="fas fa-times-circle text-red-400 mr-2"></i><span class="text-red-400">Kuota Penuh</span>'
                            }
                        </p>
                    </div>
                </div>

                <!-- Achievements -->
                <div>
                    <h3 class="text-xl font-bold text-white mb-3"><i class="fas fa-trophy text-yellow-400 mr-2"></i>Prestasi</h3>
                    <div class="space-y-2">
                        ${eskul.achievements.map(achievement => `
                            <div class="bg-gradient-to-r from-orange-500/10 to-red-500/10 border border-orange-500/20 rounded-xl p-3">
                                <p class="text-orange-300"><i class="fas fa-medal text-yellow-400 mr-2"></i>${achievement}</p>
                            </div>
                        `).join('')}
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-3 pt-4">
                    <button onclick="closeModal()" class="flex-1 px-6 py-3 bg-slate-800 hover:bg-slate-700 text-white font-semibold rounded-xl transition-colors">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    `;

    document.body.appendChild(modal);
    
    // Close on backdrop click
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });
}

// Daftar Eskul Function
function daftarEskul(id) {
    const eskul = eskulData.find(e => e.id === id);
    if (!eskul) return;

    // Close detail modal if open
    closeModal();

    // Store selected eskul in sessionStorage
    const eskulKey = eskul.name.toLowerCase().replace(/\s+/g, '-');
    sessionStorage.setItem('selectedEskul', eskulKey);
    sessionStorage.setItem('selectedEskulData', JSON.stringify(eskul));

    // Redirect to registration form
    window.location.href = '/form';
}

// Close Modal Function
function closeModal() {
    const modal = document.getElementById('detailModal');
    if (modal) {
        modal.remove();
    }
}

// Create Floating Action Button for Quick Registration
function createFloatingButton() {
    const fab = document.createElement('div');
    fab.id = 'floatingActionButton';
    fab.className = 'fixed bottom-8 right-8 z-40';
    fab.innerHTML = `
        <button onclick="goToRegistrationForm()" class="w-16 h-16 bg-gradient-to-r from-orange-500 to-red-600 rounded-full shadow-2xl hover:shadow-orange-500/50 hover:scale-110 transition-all duration-300 flex items-center justify-center group">
            <i class="fas fa-user-plus text-white text-2xl group-hover:scale-110 transition-transform"></i>
        </button>
    `;
    document.body.appendChild(fab);
}

// Go to Registration Form without pre-selection
function goToRegistrationForm() {
    window.location.href = '/form';
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    renderEskulCards(eskulData);
    createFloatingButton();
});

// Filter function
function filterEskul(category) {
    const filtered = category === 'all' 
        ? eskulData 
        : eskulData.filter(eskul => eskul.category === category);
    
    renderEskulCards(filtered);
    
    // Update active filter button
    document.querySelectorAll('.filter-btn').forEach(btn => {
        btn.classList.remove('active', 'bg-gradient-to-r', 'from-orange-500', 'to-red-600');
        btn.classList.add('bg-slate-800');
    });
    
    event.target.classList.add('active', 'bg-gradient-to-r', 'from-orange-500', 'to-red-600');
    event.target.classList.remove('bg-slate-800');
}

// Render Eskul Cards
function renderEskulCards(data) {
    const grid = document.getElementById('eskulGrid');
    
    grid.innerHTML = data.map(eskul => `
        <div class="eskul-card bg-gradient-to-br from-slate-800/50 to-slate-900/50 backdrop-blur-xl rounded-3xl border border-slate-700 overflow-hidden hover-lift glass-effect group" data-category="${eskul.category}">
            <!-- Header with Icon -->
            <div class="relative bg-gradient-to-br ${eskul.gradient} p-8">
                <div class="absolute top-0 right-0 w-32 h-32 bg-white/10 rounded-full -mr-16 -mt-16"></div>
                <div class="relative z-10">
                    <div class="w-16 h-16 bg-white/20 backdrop-blur-xl rounded-2xl flex items-center justify-center mb-4 group-hover:scale-110 transition-transform duration-300">
                        <i class="fas ${eskul.icon} text-white text-3xl"></i>
                    </div>
                    <h3 class="text-2xl font-bold text-white mb-2">${eskul.name}</h3>
                    <p class="text-white/80 text-sm">
                        <i class="fas fa-clock mr-2"></i>${eskul.schedule}
                    </p>
                </div>
            </div>

            <!-- Content -->
            <div class="p-6">
                <!-- Stats -->
                <div class="grid grid-cols-2 gap-4 mb-6">
                    <div class="bg-slate-800/50 rounded-xl p-3 text-center">
                        <i class="fas fa-users text-orange-400 mb-2"></i>
                        <p class="text-white font-bold">${eskul.members}</p>
                        <p class="text-slate-400 text-xs">Anggota</p>
                    </div>
                    <div class="bg-slate-800/50 rounded-xl p-3 text-center">
                        <i class="fas fa-chalkboard-teacher text-blue-400 mb-2"></i>
                        <p class="text-white font-bold text-sm">${eskul.coach.split(' ').slice(0, 2).join(' ')}</p>
                        <p class="text-slate-400 text-xs">Pembina</p>
                    </div>
                </div>

                <!-- Description -->
                <p class="text-slate-300 text-sm mb-4 line-clamp-3">${eskul.description}</p>

                <!-- Achievements -->
                <div class="mb-6">
                    <p class="text-slate-400 text-xs font-semibold mb-2">
                        <i class="fas fa-trophy text-yellow-400 mr-1"></i>Prestasi Terbaru:
                    </p>
                    ${eskul.achievements.map(achievement => `
                        <span class="inline-block bg-gradient-to-r from-orange-500/10 to-red-500/10 border border-orange-500/20 text-orange-300 text-xs px-3 py-1 rounded-full mb-2 mr-2">
                            ${achievement}
                        </span>
                    `).join('')}
                </div>

                <!-- Status Badge -->
                <div class="mb-4">
                    ${eskul.available 
                        ? '<span class="inline-flex items-center px-3 py-1 bg-green-500/20 text-green-400 text-xs font-semibold rounded-full"><i class="fas fa-check-circle mr-2"></i>Tersedia</span>'
                        : '<span class="inline-flex items-center px-3 py-1 bg-red-500/20 text-red-400 text-xs font-semibold rounded-full"><i class="fas fa-times-circle mr-2"></i>Kuota Penuh</span>'
                    }
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-3">
                    <button onclick="viewDetail(${eskul.id})" class="flex-1 px-4 py-3 bg-slate-800 hover:bg-slate-700 text-white font-semibold rounded-xl transition-all duration-300 border border-slate-700 hover:border-orange-500">
                        <i class="fas fa-info-circle mr-2"></i>Lihat Detail
                    </button>
                    }
                </div>
            </div>
        </div>
    `).join('');
}

// View Detail Function
function viewDetail(id) {
    const eskul = eskulData.find(e => e.id === id);
    if (!eskul) return;

    // Create modal
    const modal = document.createElement('div');
    modal.id = 'detailModal';
    modal.className = 'fixed inset-0 bg-black/80 backdrop-blur-sm flex items-center justify-center z-50 p-4';
    modal.innerHTML = `
        <div class="bg-slate-900 rounded-3xl border border-slate-700 max-w-2xl w-full max-h-[90vh] overflow-y-auto">
            <!-- Header -->
            <div class="relative bg-gradient-to-br ${eskul.gradient} p-8">
                <button onclick="closeModal()" class="absolute top-4 right-4 w-10 h-10 bg-white/20 backdrop-blur-xl rounded-full flex items-center justify-center text-white hover:bg-white/30 transition-colors">
                    <i class="fas fa-times"></i>
                </button>
                <div class="flex items-center space-x-4">
                    <div class="w-20 h-20 bg-white/20 backdrop-blur-xl rounded-2xl flex items-center justify-center">
                        <i class="fas ${eskul.icon} text-white text-4xl"></i>
                    </div>
                    <div>
                        <h2 class="text-3xl font-bold text-white mb-2">${eskul.name}</h2>
                        <p class="text-white/80"><i class="fas fa-clock mr-2"></i>${eskul.schedule}</p>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="p-8 space-y-6">
                <!-- Description -->
                <div>
                    <h3 class="text-xl font-bold text-white mb-3">Deskripsi</h3>
                    <p class="text-slate-300">${eskul.description}</p>
                </div>

                <!-- Info Grid -->
                <div class="grid md:grid-cols-2 gap-4">
                    <div class="bg-slate-800/50 rounded-xl p-4">
                        <p class="text-slate-400 text-sm mb-1">Jumlah Anggota</p>
                        <p class="text-white font-bold text-lg"><i class="fas fa-users text-orange-400 mr-2"></i>${eskul.members} Siswa</p>
                    </div>
                    <div class="bg-slate-800/50 rounded-xl p-4">
                        <p class="text-slate-400 text-sm mb-1">Pembina</p>
                        <p class="text-white font-bold text-lg"><i class="fas fa-chalkboard-teacher text-blue-400 mr-2"></i>${eskul.coach}</p>
                    </div>
                    <div class="bg-slate-800/50 rounded-xl p-4">
                        <p class="text-slate-400 text-sm mb-1">Kategori</p>
                        <p class="text-white font-bold text-lg capitalize"><i class="fas fa-tag text-purple-400 mr-2"></i>${eskul.category}</p>
                    </div>
                    <div class="bg-slate-800/50 rounded-xl p-4">
                        <p class="text-slate-400 text-sm mb-1">Status</p>
                        <p class="text-white font-bold text-lg">
                            ${eskul.available 
                                ? '<i class="fas fa-check-circle text-green-400 mr-2"></i><span class="text-green-400">Tersedia</span>'
                                : '<i class="fas fa-times-circle text-red-400 mr-2"></i><span class="text-red-400">Kuota Penuh</span>'
                            }
                        </p>
                    </div>
                </div>

                <!-- Achievements -->
                <div>
                    <h3 class="text-xl font-bold text-white mb-3"><i class="fas fa-trophy text-yellow-400 mr-2"></i>Prestasi</h3>
                    <div class="space-y-2">
                        ${eskul.achievements.map(achievement => `
                            <div class="bg-gradient-to-r from-orange-500/10 to-red-500/10 border border-orange-500/20 rounded-xl p-3">
                                <p class="text-orange-300"><i class="fas fa-medal text-yellow-400 mr-2"></i>${achievement}</p>
                            </div>
                        `).join('')}
                    </div>
                </div>

                <!-- Action Buttons -->
                <div class="flex gap-3 pt-4">
                    <button onclick="closeModal()" class="flex-1 px-6 py-3 bg-slate-800 hover:bg-slate-700 text-white font-semibold rounded-xl transition-colors">
                        Tutup
                    </button>
                </div>
            </div>
        </div>
    `;

    document.body.appendChild(modal);
    
    // Close on backdrop click
    modal.addEventListener('click', (e) => {
        if (e.target === modal) closeModal();
    });
}

// Daftar Eskul Function
function daftarEskul(id) {
    const eskul = eskulData.find(e => e.id === id);
    if (!eskul) return;

    // Close detail modal if open
    closeModal();

    // Store selected eskul in sessionStorage
    const eskulKey = eskul.name.toLowerCase().replace(/\s+/g, '-');
    sessionStorage.setItem('selectedEskul', eskulKey);
    sessionStorage.setItem('selectedEskulData', JSON.stringify(eskul));

    // Redirect to registration form
    window.location.href = '/pendaftaran-eskul';
}

// Close Modal Function
function closeModal() {
    const modal = document.getElementById('detailModal');
    if (modal) {
        modal.remove();
    }
}

// Initialize on page load
document.addEventListener('DOMContentLoaded', function() {
    renderEskulCards(eskulData);
});