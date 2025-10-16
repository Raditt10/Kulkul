     let siswaData = [
        { id: 1, nis: '2024001', nisn: '0051234567', nama: 'Ahmad Fauzi', kelas: 'X', jurusan: 'RPL', rombel: '1', jk: 'L', tempat_lahir: 'Bandung', tgl_lahir: '2008-05-15', telepon: '081234567890', alamat: 'Jl. Raya Bandung No. 123', ekskul: ['Basket', 'Robotika'], status: 'active' },
        { id: 2, nis: '2024002', nisn: '0051234568', nama: 'Siti Nurhaliza', kelas: 'X', jurusan: 'TKJ', rombel: '2', jk: 'P', tempat_lahir: 'Bandung', tgl_lahir: '2008-08-20', telepon: '081234567891', alamat: 'Jl. Merdeka No. 45', ekskul: ['Paduan Suara'], status: 'active' },
        { id: 3, nis: '2024003', nisn: '0051234569', nama: 'Budi Santoso', kelas: 'XI', jurusan: 'RPL', rombel: '1', jk: 'L', tempat_lahir: 'Jakarta', tgl_lahir: '2007-03-10', telepon: '081234567892', alamat: 'Jl. Sudirman No. 78', ekskul: ['Futsal', 'Pramuka'], status: 'inactive' },
    ];

    const modal = document.getElementById('siswaModal');
    const modalTitle = modal.querySelector('h2');
    const form = document.getElementById('siswaForm');
    let editingId = null;

    // 🔸 Open Modal
    function openModal(id = null) {
        modal.classList.add('active');

        if (id) {
            const siswa = siswaData.find(s => s.id === id);
            modalTitle.textContent = 'Edit Data Siswa';
            editingId = id;

            // Isi form
            document.getElementById('nis').value = siswa.nis;
            document.getElementById('nisn').value = siswa.nisn;
            document.getElementById('namaLengkap').value = siswa.nama;
            document.getElementById('kelas').value = siswa.kelas;
            document.getElementById('jurusan').value = siswa.jurusan;
            document.getElementById('rombel').value = siswa.rombel;
            document.getElementById('jenisKelamin').value = siswa.jk;
            document.getElementById('tempatLahir').value = siswa.tempat_lahir;
            document.getElementById('tanggalLahir').value = siswa.tgl_lahir;
            document.getElementById('noTelepon').value = siswa.telepon;
            document.getElementById('alamat').value = siswa.alamat;

            // Checkbox ekskul
            document.querySelectorAll('#siswaModal input[type="checkbox"]').forEach(chk => {
                chk.checked = siswa.ekskul.includes(chk.value);
            });
        } else {
            modalTitle.textContent = 'Tambah Siswa';
            editingId = null;
            form.reset();
            document.querySelectorAll('#siswaModal input[type="checkbox"]').forEach(chk => chk.checked = false);
        }
    }

    // 🔸 Close Modal
    function closeModal() {
        modal.classList.remove('active');
        form.reset();
        editingId = null;
    }

    // 🔸 Save Data (Tambah/Edit)
    form.addEventListener('submit', e => {
        e.preventDefault();

        const ekskulTerpilih = Array.from(document.querySelectorAll('#siswaModal input[type="checkbox"]:checked')).map(chk => chk.value);

        const siswaBaru = {
            id: editingId || siswaData.length + 1,
            nis: document.getElementById('nis').value,
            nisn: document.getElementById('nisn').value,
            nama: document.getElementById('namaLengkap').value,
            kelas: document.getElementById('kelas').value,
            jurusan: document.getElementById('jurusan').value,
            rombel: document.getElementById('rombel').value,
            jk: document.getElementById('jenisKelamin').value,
            tempat_lahir: document.getElementById('tempatLahir').value,
            tgl_lahir: document.getElementById('tanggalLahir').value,
            telepon: document.getElementById('noTelepon').value,
            alamat: document.getElementById('alamat').value,
            ekskul: ekskulTerpilih,
            status: 'active',
        };

        if (editingId) {
            // Edit mode
            const index = siswaData.findIndex(s => s.id === editingId);
            siswaData[index] = siswaBaru;
        } else {
            // Tambah mode
            siswaData.push(siswaBaru);
        }

        renderTable();
        closeModal();
    });

    // 🔸 Render Table
    function renderTable() {
        const tbody = document.getElementById('siswaTableBody');
        tbody.innerHTML = '';

        siswaData.forEach(siswa => {
            const row = document.createElement('tr');
            row.className = 'hover:bg-slate-800/50 transition-all duration-300';
            row.innerHTML = `
                <td class="px-6 py-3"><input type="checkbox" class="rounded border-slate-600 text-orange-500"></td>
                <td class="px-6 py-3 text-slate-300">${siswa.nis}</td>
                <td class="px-6 py-3 text-white font-semibold">${siswa.nama}</td>
                <td class="px-6 py-3 text-slate-300">${siswa.kelas}</td>
                <td class="px-6 py-3 text-slate-300">${siswa.jurusan}</td>
                <td class="px-6 py-3 text-slate-300">${siswa.ekskul.join(', ') || '-'}</td>
                <td class="px-6 py-3">
                    <span class="px-3 py-1 rounded-full text-xs font-medium ${siswa.status === 'active' ? 'bg-green-600/20 text-green-400' : 'bg-red-600/20 text-red-400'}">${siswa.status}</span>
                </td>
                <td class="px-6 py-3 space-x-2">
                    <button onclick='openDetailModal(${JSON.stringify(siswa)})' class="text-cyan-400 hover:text-cyan-300 transition"><i class="fas fa-eye"></i></button>
                    <button onclick="openModal(${siswa.id})" class="text-orange-400 hover:text-orange-300 transition"><i class="fas fa-edit"></i></button>
                    <button onclick="deleteSiswa(${siswa.id})" class="text-red-500 hover:text-red-400 transition"><i class="fas fa-trash"></i></button>
                </td>
            `;
            tbody.appendChild(row);
        });

        document.getElementById('totalSiswa').textContent = siswaData.length;
    }

    // 🔸 Delete Function
    function deleteSiswa(id) {
        if (confirm('Yakin ingin menghapus data siswa ini?')) {
            siswaData = siswaData.filter(s => s.id !== id);
            renderTable();
        }
    }

    // 🔸 Detail Modal
    function openDetailModal(siswa) {
        const detailModal = document.getElementById('detailModal');
        const detailContent = document.getElementById('detailContent');
        detailContent.innerHTML = `
            <div class="space-y-2 text-slate-300">
                <p><strong class="text-white">Nama:</strong> ${siswa.nama}</p>
                <p><strong class="text-white">NIS:</strong> ${siswa.nis}</p>
                <p><strong class="text-white">Jurusan:</strong> ${siswa.jurusan}</p>
                <p><strong class="text-white">Kelas:</strong> ${siswa.kelas}</p>
                <p><strong class="text-white">Ekskul:</strong> ${siswa.ekskul.join(', ') || '-'}</p>
            </div>
        `;
        detailModal.classList.add('active');
    }

    function closeDetailModal() {
        document.getElementById('detailModal').classList.remove('active');
    }

    // 🔸 Init
    renderTable();
