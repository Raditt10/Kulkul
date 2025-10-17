// Isi file miniCalendar.js
document.addEventListener('DOMContentLoaded', () => {
    const monthNames = ["Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus","September","Oktober","November","Desember"];
    let currentDate = new Date();
    // Simpan tanggal hari ini untuk perbandingan
    const today = new Date(); 

    function renderCalendar() {
        const grid = document.getElementById('calendarGrid');
        const monthYear = document.getElementById('miniCurrentMonth');
        grid.innerHTML = '';

        const year = currentDate.getFullYear();
        const month = currentDate.getMonth();
        monthYear.textContent = `${monthNames[month]} ${year}`;
        
        // Cek apakah bulan yang sedang ditampilkan adalah bulan dan tahun saat ini
        const isCurrentMonth = year === today.getFullYear() && month === today.getMonth();

        const firstDay = new Date(year, month, 1).getDay();
        const daysInMonth = new Date(year, month + 1, 0).getDate();

        // Kosongkan awal grid
        for (let i = 0; i < (firstDay === 0 ? 6 : firstDay - 1); i++) {
            const empty = document.createElement('div');
            grid.appendChild(empty);
        }

        for (let day = 1; day <= daysInMonth; day++) {
            const dayEl = document.createElement('div');
            // Tambahkan kelas untuk menandai hari ini
            let dayClasses = `w-10 h-10 flex items-center justify-center rounded-lg font-semibold cursor-pointer transition-all duration-200 text-slate-300 hover:bg-slate-700`;
            
            const hasEvent = typeof ekskuls !== 'undefined' && ekskuls.some(e => parseInt(e.hari) === day && parseInt(e.bulan) === month + 1);
            
            if (hasEvent) {
                dayClasses = `w-10 h-10 flex items-center justify-center rounded-lg font-semibold cursor-pointer transition-all duration-200 bg-gradient-to-br from-orange-500 to-red-600 text-white shadow-lg hover:from-orange-400 hover:to-red-500`;
            } else if (isCurrentMonth && day === today.getDate()) {
                 // Tandai tanggal hari ini jika tidak ada event (agar tidak menimpa event highlight)
                dayClasses += ' border-2 border-orange-500 text-orange-400';
            }

            dayEl.className = dayClasses;
            dayEl.textContent = day;
            dayEl.onclick = () => selectDate(day, month + 1);
            grid.appendChild(dayEl);
        }
    }

    function selectDate(day, month) {
        // ... (Fungsi selectDate tidak berubah, sudah benar) ...
        const list = document.getElementById('scheduleList');
        list.innerHTML = '';

        if (typeof ekskuls === 'undefined') {
            list.innerHTML = `<p class="text-slate-400">Data jadwal belum dimuat.</p>`;
            return;
        }

        const filtered = ekskuls.filter(e => parseInt(e.hari) === day && parseInt(e.bulan) === month);

        if (filtered.length === 0) {
            list.innerHTML = `<p class="text-slate-400">Tidak ada jadwal untuk tanggal ini.</p>`;
            return;
        }

        filtered.forEach(e => {
            const div = document.createElement('div');
            div.className = 'glass rounded-2xl p-6 flex justify-between items-center hover-lift border border-orange-500/10';
            div.innerHTML = `
                <div>
                    <h3 class="text-xl font-bold text-orange-300">${e.nama_ekskul}</h3>
                    <p class="text-slate-400 text-sm">${e.hari} • ${e.jam_mulai_formatted ?? e.jam_mulai} - ${e.jam_selesai_formatted ?? e.jam_selesai} WIB</p>
                    <p class="text-slate-500 text-sm">Pembina: ${e.pembina}</p>
                </div>
                <span class="px-3 py-1 text-xs bg-gradient-to-r from-orange-500 to-rose-500 rounded-full shadow-lg capitalize">${e.kategori}</span>
            `;
            list.appendChild(div);
        });
    }

    // Event navigasi bulan - SOLUSI PERBAIKAN: setDate(1) sebelum setMonth()
    document.getElementById('prevMonth').onclick = () => {
        // Penting: Setel tanggal ke 1 sebelum mengubah bulan
        currentDate.setDate(1); 
        currentDate.setMonth(currentDate.getMonth() - 1);
        renderCalendar();
    };
    document.getElementById('nextMonth').onclick = () => {
        // Penting: Setel tanggal ke 1 sebelum mengubah bulan
        currentDate.setDate(1); 
        currentDate.setMonth(currentDate.getMonth() + 1);
        renderCalendar();
    };

    renderCalendar(); // inisialisasi
});