     // sample Data
        let siswaData = [
            { id: 1, nis: '2024001', nisn: '0051234567', nama: 'Ahmad Fauzi', kelas: 'X', jurusan: 'RPL', rombel: '1', jk: 'L', tempat_lahir: 'Bandung', tgl_lahir: '2008-05-15', telepon: '081234567890', alamat: 'Jl. Raya Bandung No. 123', ekskul: ['Basket', 'Robotika'], status: 'active' },
            { id: 2, nis: '2024002', nisn: '0051234568', nama: 'Siti Nurhaliza', kelas: 'X', jurusan: 'TKJ', rombel: '2', jk: 'P', tempat_lahir: 'Bandung', tgl_lahir: '2008-08-20', telepon: '081234567891', alamat: 'Jl. Merdeka No. 45', ekskul: ['Paduan Suara'], status: 'active' },
            { id: 3, nis: '2024003', nisn: '0051234569', nama: 'Budi Santoso', kelas: 'XI', jurusan: 'RPL', rombel: '1', jk: 'L', tempat_lahir: 'Jakarta', tgl_lahir: '2007-03-10', telepon: '081234567892', alamat: 'Jl. Sudirman No. 78', ekskul: ['Futsal', 'Pramuka'], status: 'active' },
        ];

        let detailModal = document.getElementById('detailModal');
        let detailContent = document.getElementById('detailContent');

        function openDetailModal(siswa) {
            detailContent.innerHTML = `
                <p><strong>NIS:</strong> ${siswa.nis}</p>
                <p><strong>NISN:</strong> ${siswa.nisn}</p>
                <p><strong>Nama:</strong> ${siswa.nama}</p>
                <p><strong>Kelas:</strong> ${siswa.kelas}</p>
                <p><strong>Jurusan:</strong> ${siswa.jurusan}</p>
                <p><strong>Rombel:</strong> ${siswa.rombel}</p>
                <p><strong>Jenis Kelamin:</strong> ${siswa.jk}</p>
                <p><strong>Tempat Lahir:</strong> ${siswa.tempat_lahir}</p>
                <p><strong>Tanggal Lahir:</strong> ${siswa.tgl_lahir}</p>
                <p><strong>Telepon:</strong> ${siswa.telepon}</p>
                <p><strong>Alamat:</strong> ${siswa.alamat}</p>
                <p><strong>Ekskul:</strong> ${siswa.ekskul.join(', ')}</p>
                <p><strong>Status:</strong> ${siswa.status}</p>
            `;

            detailModal.style.display = 'flex';
        }

        function closeDetailModal() {
            detailModal.style.display = 'none';
        }

        function openModal() {
            document.getElementById('addModal').style.display = 'flex';
        }

        function closeModal() {
            document.getElementById('addModal').style.display = 'none';
        }

        function addSiswa() {
            const newSiswa = {
                id: siswaData.length + 1,
                nis: document.getElementById('nis').value,
                nisn: document.getElementById('nisn').value,
                nama: document.getElementById('nama').value,
                kelas: document.getElementById('kelas').value,
                jurusan: document.getElementById('jurusan').value,
                rombel: document.getElementById('rombel').value,
                jk: document.getElementById('jk').value,
                tempat_lahir: document.getElementById('tempat_lahir').value,
                tgl_lahir: document.getElementById('tgl_lahir').value,
                telepon: document.getElementById('telepon').value,
                alamat: document.getElementById('alamat').value,
                ekskul: [],
                status: 'active'
            };

            siswaData.push(newSiswa);
            document.getElementById('totalSiswa').textContent = siswaData.length;
            renderCards(siswaData);
            closeModal();
        }