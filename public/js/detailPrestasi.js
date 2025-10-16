        // Sample Data
        let prestasiData = [
            { id: 1, nama_lomba: 'Lomba Basket Antar Sekolah', ekskul: 'Basket', tingkat: 'Kota', peringkat: 'Juara 1', tanggal: '2025-09-15', lokasi: 'GOR Pajajaran, Bandung', siswa: 'Tim Basket SMKN 13', pembina: 'Budi Santoso', deskripsi: 'Berhasil mengalahkan 15 tim dari berbagai sekolah di Kota Bandung' },
            { id: 2, nama_lomba: 'Festival Paduan Suara Nasional', ekskul: 'Paduan Suara', tingkat: 'Nasional', peringkat: 'Juara 2', tanggal: '2025-08-20', lokasi: 'Jakarta Convention Center', siswa: 'Paduan Suara SMKN 13', pembina: 'Siti Nurhaliza', deskripsi: 'Menampilkan lagu daerah dengan aransemen modern' },
            { id: 3, nama_lomba: 'Kompetisi Robotika Tingkat Provinsi', ekskul: 'Robotika', tingkat: 'Provinsi', peringkat: 'Juara 1', tanggal: '2025-07-10', lokasi: 'ITB Bandung', siswa: 'Ahmad Fauzi, Rina Kusuma', pembina: 'Irfan Hakim', deskripsi: 'Robot line follower dengan kecepatan tertinggi' },
            { id: 4, nama_lomba: 'Lomba Futsal Piala Walikota', ekskul: 'Futsal', tingkat: 'Kota', peringkat: 'Juara 3', tanggal: '2025-06-25', lokasi: 'Lapangan Futsal Saparua', siswa: 'Tim Futsal SMKN 13', pembina: 'Ahmad Rifai', deskripsi: 'Pertandingan sengit hingga adu penalti' },
            { id: 5, nama_lomba: 'Lomba Tari Tradisional Sunda', ekskul: 'Tari Tradisional', tingkat: 'Provinsi', peringkat: 'Juara 1', tanggal: '2025-05-18', lokasi: 'Gedung Sate Bandung', siswa: 'Kelompok Tari SMKN 13', pembina: 'Dewi Lestari', deskripsi: 'Menampilkan tari Jaipong dengan kostum tradisional' },
            { id: 6, nama_lomba: 'English Speech Contest', ekskul: 'Bahasa Inggris', tingkat: 'Nasional', peringkat: 'Juara 2', tanggal: '2025-04-30', lokasi: 'Universitas Indonesia, Depok', siswa: 'Sarah Putri', pembina: 'Sarah Johnson', deskripsi: 'Tema: Future of Technology' },
            { id: 7, nama_lomba: 'Battle of the Bands', ekskul: 'Band', tingkat: 'Kota', peringkat: 'Juara 1', tanggal: '2025-03-22', lokasi: 'Sabuga ITB', siswa: 'Band SMKN 13', pembina: 'Rian Maulana', deskripsi: 'Membawakan lagu original karya sendiri' },
            { id: 8, nama_lomba: 'Perkemahan Pramuka Nasional', ekskul: 'Pramuka', tingkat: 'Nasional', peringkat: 'Harapan', tanggal: '2025-08-12', lokasi: 'Cibubur, Jakarta', siswa: 'Kontingen SMKN 13', pembina: 'Eko Prasetyo', deskripsi: 'Juara dalam kategori pioneering' },
            { id: 9, nama_lomba: 'Turnamen Voli Antar SMK', ekskul: 'Voli', tingkat: 'Provinsi', peringkat: 'Juara 2', tanggal: '2025-09-05', lokasi: 'GOR Arcamanik', siswa: 'Tim Voli Putri SMKN 13', pembina: 'Diana Kusuma', deskripsi: 'Final yang menegangkan dengan skor ketat' },
            { id: 10, nama_lomba: 'Lomba Cipta Lagu Daerah', ekskul: 'Paduan Suara', tingkat: 'Kota', peringkat: 'Juara 1', tanggal: '2025-10-01', lokasi: 'Balai Kota Bandung', siswa: 'Kelompok Paduan Suara', pembina: 'Siti Nurhaliza', deskripsi: 'Lagu original dengan lirik bahasa Sunda' },
            { id: 11, nama_lomba: 'International Robotics Championship', ekskul: 'Robotika', tingkat: 'Internasional', peringkat: 'Juara 3', tanggal: '2024-11-15', lokasi: 'Singapore Expo', siswa: 'Tim Robotika SMKN 13', pembina: 'Irfan Hakim', deskripsi: 'Kompetisi dengan 20 negara peserta' },
        ];

        let currentFilter = {
            tingkat: 'all',
            ekskul: 'all',
            juara: 'all',
            tahun: 'all',
            search: ''
        };

        // Get medal color based on ranking
        function getMedalColor(peringkat) {
            switch(peringkat) {
                case 'Juara 1': return 'from-yellow-400 to-yellow-600';
                case 'Juara 2': return 'from-slate-400 to-slate-600';
                case 'Juara 3': return 'from-orange-700 to-orange-900';
                default: return 'from-blue-500 to-blue-700';
            }
        }

        // Get icon based on extracurricular
        function getEkskulIcon(ekskul) {
            const icons = {
                'Basket': 'fa-basketball-ball',
                'Futsal': 'fa-futbol',
                'Voli': 'fa-volleyball-ball',
                'Paduan Suara': 'fa-music',
                'Tari Tradisional': 'fa-users',
                'Band': 'fa-guitar',
                'Robotika': 'fa-robot',
                'Bahasa Inggris': 'fa-language',
                'Pramuka': 'fa-campground'
            };
            return icons[ekskul] || 'fa-trophy';
        }

        // Format date to Indonesian format
        function formatDate(dateString) {
            const months = ['Jan', 'Feb', 'Mar', 'Apr', 'Mei', 'Jun', 'Jul', 'Ags', 'Sep', 'Okt', 'Nov', 'Des'];
            const date = new Date(dateString);
            return `${date.getDate()} ${months[date.getMonth()]} ${date.getFullYear()}`;
        }

        // Render prestasi cards
        function renderPrestasi() {
            const grid = document.getElementById('prestasiGrid');
            const filtered = prestasiData.filter(item => {
                const matchTingkat = currentFilter.tingkat === 'all' || item.tingkat === currentFilter.tingkat;
                const matchEkskul = currentFilter.ekskul === 'all' || item.ekskul === currentFilter.ekskul;
                const matchJuara = currentFilter.juara === 'all' || item.peringkat === currentFilter.juara;
                const matchTahun = currentFilter.tahun === 'all' || item.tanggal.startsWith(currentFilter.tahun);
                const matchSearch = currentFilter.search === '' || 
                    item.nama_lomba.toLowerCase().includes(currentFilter.search.toLowerCase()) ||
                    item.siswa.toLowerCase().includes(currentFilter.search.toLowerCase()) ||
                    item.ekskul.toLowerCase().includes(currentFilter.search.toLowerCase());
                
                return matchTingkat && matchEkskul && matchJuara && matchTahun && matchSearch;
            });

            if (filtered.length === 0) {
                grid.innerHTML = `
                    <div class="col-span-full text-center py-12">
                        <i class="fas fa-search text-6xl text-slate-700 mb-4"></i>
                        <p class="text-slate-400 text-lg">Tidak ada prestasi yang ditemukan</p>
                    </div>
                `;
                return;
            }

            grid.innerHTML = filtered.map(item => `
                <div class="bg-gradient-to-br from-slate-900 to-slate-800 rounded-xl p-6 border border-slate-700 hover:border-orange-500 transition-all duration-300 hover:shadow-xl hover:shadow-orange-500/10">
                    <div class="flex items-start justify-between mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-12 h-12 bg-gradient-to-br ${getMedalColor(item.peringkat)} rounded-lg flex items-center justify-center">
                                <i class="fas ${getEkskulIcon(item.ekskul)} text-white text-xl"></i>
                            </div>
                            <div>
                                <span class="text-xs px-2 py-1 bg-orange-500/20 text-orange-400 rounded-full">${item.tingkat}</span>
                            </div>
                        </div>
                        <span class="text-xs px-3 py-1 bg-gradient-to-r ${getMedalColor(item.peringkat)} text-white rounded-full font-semibold">
                            ${item.peringkat}
                        </span>
                    </div>

                    <h3 class="text-white font-bold text-lg mb-2 line-clamp-2">${item.nama_lomba}</h3>
                    
                    <div class="space-y-2 mb-4">
                        <div class="flex items-center text-slate-400 text-sm">
                            <i class="fas fa-calendar-alt w-5"></i>
                            <span>${formatDate(item.tanggal)}</span>
                        </div>
                        <div class="flex items-center text-slate-400 text-sm">
                            <i class="fas fa-map-marker-alt w-5"></i>
                            <span class="line-clamp-1">${item.lokasi}</span>
                        </div>
                        <div class="flex items-center text-slate-400 text-sm">
                            <i class="fas fa-user w-5"></i>
                            <span class="line-clamp-1">${item.siswa}</span>
                        </div>
                    </div>

                    <div class="flex items-center space-x-2 pt-4 border-t border-slate-700">
                        <button onclick="viewDetail(${item.id})" class="flex-1 px-4 py-2 bg-slate-800 hover:bg-slate-700 text-white rounded-lg transition-colors text-sm font-medium">
                            <i class="fas fa-eye mr-2"></i>Detail
                        </button>
                        <button onclick="editPrestasi(${item.id})" class="px-4 py-2 bg-orange-500/20 hover:bg-orange-500/30 text-orange-400 rounded-lg transition-colors">
                            <i class="fas fa-edit"></i>
                        </button>
                        <button onclick="deletePrestasi(${item.id})" class="px-4 py-2 bg-red-500/20 hover:bg-red-500/30 text-red-400 rounded-lg transition-colors">
                            <i class="fas fa-trash"></i>
                        </button>
                    </div>
                </div>
            `).join('');

            updateStats();
        }

        // Update statistics
        function updateStats() {
            document.getElementById('totalPrestasi').textContent = prestasiData.length;
        }

        // Filter by tingkat
        function filterTingkat(tingkat) {
            currentFilter.tingkat = tingkat;
            
            document.querySelectorAll('.filter-btn').forEach(btn => {
                btn.classList.remove('active', 'bg-orange-500', 'text-white');
                btn.classList.add('bg-slate-800', 'text-slate-400');
            });
            
            event.target.classList.add('active', 'bg-orange-500', 'text-white');
            event.target.classList.remove('bg-slate-800', 'text-slate-400');
            
            renderPrestasi();
        }

        // Apply filters from dropdowns
        function applyFilters() {
            currentFilter.ekskul = document.getElementById('ekskulFilter').value;
            currentFilter.juara = document.getElementById('juaraFilter').value;
            currentFilter.tahun = document.getElementById('tahunFilter').value;
            renderPrestasi();
        }

        // Search functionality
        document.getElementById('searchInput').addEventListener('input', (e) => {
            currentFilter.search = e.target.value;
            renderPrestasi();
        });

        // Modal functions
        function openModal() {
            document.getElementById('prestasiModal').classList.add('active');
            document.getElementById('prestasiForm').reset();
        }

        function closeModal() {
            document.getElementById('prestasiModal').classList.remove('active');
        }

        function closeDetailModal() {
            document.getElementById('detailModal').classList.remove('active');
        }

        // View detail
        function viewDetail(id) {
            const item = prestasiData.find(p => p.id === id);
            if (!item) return;

            const content = `
                <div class="space-y-4">
                    <div class="flex items-center justify-between pb-4 border-b border-slate-700">
                        <span class="text-xs px-3 py-1 bg-orange-500/20 text-orange-400 rounded-full">${item.tingkat}</span>
                        <span class="px-4 py-1 bg-gradient-to-r ${getMedalColor(item.peringkat)} text-white rounded-full font-semibold">
                            ${item.peringkat}
                        </span>
                    </div>

                    <div>
                        <h3 class="text-white font-bold text-xl mb-4">${item.nama_lomba}</h3>
                    </div>

                    <div class="grid grid-cols-2 gap-4">
                        <div>
                            <p class="text-slate-500 text-sm mb-1">Ekstrakurikuler</p>
                            <p class="text-white font-medium">${item.ekskul}</p>
                        </div>
                        <div>
                            <p class="text-slate-500 text-sm mb-1">Tanggal</p>
                            <p class="text-white font-medium">${formatDate(item.tanggal)}</p>
                        </div>
                        <div>
                            <p class="text-slate-500 text-sm mb-1">Lokasi</p>
                            <p class="text-white font-medium">${item.lokasi}</p>
                        </div>
                        <div>
                            <p class="text-slate-500 text-sm mb-1">Tingkat</p>
                            <p class="text-white font-medium">${item.tingkat}</p>
                        </div>
                    </div>

                    <div class="pt-4 border-t border-slate-700">
                        <p class="text-slate-500 text-sm mb-1">Siswa/Tim</p>
                        <p class="text-white font-medium">${item.siswa}</p>
                    </div>

                    <div>
                        <p class="text-slate-500 text-sm mb-1">Pembina</p>
                        <p class="text-white font-medium">${item.pembina}</p>
                    </div>

                    <div class="pt-4 border-t border-slate-700">
                        <p class="text-slate-500 text-sm mb-2">Deskripsi</p>
                        <p class="text-slate-300 leading-relaxed">${item.deskripsi}</p>
                    </div>
                </div>
            `;

            document.getElementById('detailContent').innerHTML = content;
            document.getElementById('detailModal').classList.add('active');
        }

        // Edit prestasi
        function editPrestasi(id) {
            const item = prestasiData.find(p => p.id === id);
            if (!item) return;

            document.getElementById('namaLomba').value = item.nama_lomba;
            document.getElementById('ekskul').value = item.ekskul;
            document.getElementById('tingkat').value = item.tingkat;
            document.getElementById('peringkat').value = item.peringkat;
            document.getElementById('tanggalLomba').value = item.tanggal;
            document.getElementById('lokasi').value = item.lokasi;
            document.getElementById('namaSiswa').value = item.siswa;
            document.getElementById('pembina').value = item.pembina;
            document.getElementById('deskripsi').value = item.deskripsi;

            openModal();
        }

        // Delete prestasi
        function deletePrestasi(id) {
            if (confirm('Apakah Anda yakin ingin menghapus prestasi ini?')) {
                prestasiData = prestasiData.filter(p => p.id !== id);
                renderPrestasi();
            }
        }

        // Form submit
        document.getElementById('prestasiForm').addEventListener('submit', (e) => {
            e.preventDefault();
            
            const newPrestasi = {
                id: prestasiData.length + 1,
                nama_lomba: document.getElementById('namaLomba').value,
                ekskul: document.getElementById('ekskul').value,
                tingkat: document.getElementById('tingkat').value,
                peringkat: document.getElementById('peringkat').value,
                tanggal: document.getElementById('tanggalLomba').value,
                lokasi: document.getElementById('lokasi').value,
                siswa: document.getElementById('namaSiswa').value,
                pembina: document.getElementById('pembina').value,
                deskripsi: document.getElementById('deskripsi').value
            };

            prestasiData.unshift(newPrestasi);
            renderPrestasi();
            closeModal();
        });

        // Export data
        function exportData() {
            alert('Fitur export akan segera tersedia!');
        }

        // Initialize
        renderPrestasi();