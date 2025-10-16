<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
  <title>Admin Laporan Prestasi Kulkul</title>
  <script src="https://cdn.tailwindcss.com"></script>
  <script>
    tailwind.config = { theme: { extend: { colors: { slate: { 850: '#1a2234' } } } } };
  </script>

  <!-- Font Awesome -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
  <!-- Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
  <!-- jsPDF + autoTable for PDF export -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf-autotable/3.5.28/jspdf.plugin.autotable.min.js"></script>

  <style>
    .sidebar-scroll::-webkit-scrollbar { width: 6px; }
    .sidebar-scroll::-webkit-scrollbar-track { background: rgba(51,65,85,0.3); border-radius: 10px; }
    .sidebar-scroll::-webkit-scrollbar-thumb { background: linear-gradient(to bottom,#f97316,#dc2626); border-radius: 10px; }
    .modal { display: none; }
    .modal.active { display: flex; }
  </style>
</head>
<body class="bg-slate-950 text-white">

 @include('admin/includes.sidebar')

  <!-- Main content -->
  <div class="ml-64 min-h-screen">
    <header class="bg-gradient-to-r from-slate-900 to-slate-950 border-b border-orange-500/20 sticky top-0 z-40">
      <div class="px-8 py-4 flex items-center justify-between">
        <div class="flex-1 max-w-xl">
          <div class="relative">
            <input id="globalSearch" type="text" placeholder="Cari laporan, nama siswa, ekskul..." class="w-full bg-slate-800/50 border border-slate-700 rounded-xl px-4 py-2.5 pl-10 text-white placeholder-slate-400 focus:outline-none focus:border-orange-500 transition-colors">
            <i class="fas fa-search absolute left-3 top-3.5 text-slate-400"></i>
          </div>
        </div>

        <div class="flex items-center space-x-4 ml-6">
          <button id="exportPdfBtn" class="px-4 py-2 bg-slate-800 rounded-lg hover:bg-slate-700 transition-colors text-white"><i class="fas fa-file-pdf mr-2"></i>Export PDF</button>
        </div>
      </div>
    </header>

    <main class="p-8">
      <div class="mb-6 flex items-center justify-between">
        <div>
          <h1 class="text-4xl font-bold">Laporan Prestasi</h1>
          <p class="text-slate-400">Rekap dan cetak laporan prestasi ekstrakurikuler</p>
        </div>
      </div>

      <!-- Stats cards -->
      <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6" id="statsCards">
        <!-- Cards rendered by JS -->
      </div>

      <div class="grid grid-cols-1 lg:grid-cols-3 gap-6 mb-6">
        <div class="lg:col-span-2">
          <div class="bg-slate-900 rounded-xl p-6 border border-slate-800">
            <h2 class="text-lg font-semibold mb-4">Grafik: Prestasi per Ekstrakurikuler</h2>
            <canvas id="barChart" height="120"></canvas>
          </div>
        </div>

        <div>
          <div class="bg-slate-900 rounded-xl p-6 border border-slate-800 h-full">
            <h2 class="text-lg font-semibold mb-4">Filter</h2>
            <div class="space-y-3">
              <select id="filterTingkat" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-3 py-2 text-white">
                <option value="all">Semua Tingkat</option>
                <option value="Kota">Kota</option>
                <option value="Provinsi">Provinsi</option>
                <option value="Nasional">Nasional</option>
                <option value="Internasional">Internasional</option>
              </select>

              <select id="filterEkskul" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-3 py-2 text-white">
                <option value="all">Semua Ekstrakurikuler</option>
              </select>

              <input id="filterTahun" type="number" placeholder="Tahun (contoh: 2025)" class="w-full bg-slate-800 border border-slate-700 rounded-lg px-3 py-2 text-white">

              <button id="applyFilters" class="w-full px-3 py-2 bg-orange-500 rounded-lg font-semibold">Terapkan</button>
              <button id="resetFilters" class="w-full px-3 py-2 bg-slate-800 rounded-lg">Reset</button>
            </div>
          </div>
        </div>
      </div>

      <!-- Table -->
      <div class="bg-slate-900 rounded-xl p-4 border border-slate-800">
        <h2 class="text-lg font-semibold mb-4">Daftar Prestasi</h2>
        <div class="overflow-x-auto">
          <table id="laporanTable" class="min-w-full divide-y divide-slate-700 text-sm">
            <thead>
              <tr class="text-left text-slate-400">
                <th class="px-4 py-2">#</th>
                <th class="px-4 py-2">Nama Lomba</th>
                <th class="px-4 py-2">Ekstrakurikuler</th>
                <th class="px-4 py-2">Tingkat</th>
                <th class="px-4 py-2">Peringkat</th>
                <th class="px-4 py-2">Tanggal</th>
                <th class="px-4 py-2">Pembina</th>
                <th class="px-4 py-2">Lokasi</th>
              </tr>
            </thead>
            <tbody class="divide-y divide-slate-800" id="tableBody">
              <!-- rows injected by JS -->
            </tbody>
          </table>
        </div>
      </div>

    </main>
  </div>

  <script>
    // ---------- Configuration ----------
    // API endpoint expected to return JSON array of laporan objects
    // Example object:
    // { id, nama_lomba, ekskul, tingkat, peringkat, tanggal, lokasi, siswa, pembina, deskripsi }
    const API_URL = '/api/laporan'; // <-- sesuaikan di backend

    // Fallback dummy data (used when fetch fails)
    const dummyData = [
      { id:1, nama_lomba:'Lomba Basket Antar Sekolah', ekskul:'Basket', tingkat:'Kota', peringkat:'Juara 1', tanggal:'2025-09-15', lokasi:'GOR Pajajaran', siswa:'Tim Basket SMKN 13', pembina:'Budi Santoso', deskripsi:'Menang telak' },
      { id:2, nama_lomba:'Festival Paduan Suara Nasional', ekskul:'Paduan Suara', tingkat:'Nasional', peringkat:'Juara 2', tanggal:'2025-08-20', lokasi:'JCC Jakarta', siswa:'Paduan Suara', pembina:'Siti Nurhaliza', deskripsi:'Penampilan apik' },
      { id:3, nama_lomba:'Kompetisi Robotika', ekskul:'Robotika', tingkat:'Provinsi', peringkat:'Juara 1', tanggal:'2025-07-10', lokasi:'ITB', siswa:'Tim Robotika', pembina:'Irfan Hakim', deskripsi:'Robot line follower' }
    ];

    // app state
    let laporanData = [];
    let filtered = [];
    let barChart = null;

    // ---------- Helpers ----------
    function formatDate(dateStr){
      try{ const d = new Date(dateStr); return d.toLocaleDateString(); } catch(e){ return dateStr; }
    }

    function fetchData(){
      return fetch(API_URL).then(r=>{
        if(!r.ok) throw new Error('Network response not ok');
        return r.json();
      });
    }

    // ---------- Render ----------
    function renderStats(data){
      const total = data.length;
      const ju1 = data.filter(d=>d.peringkat && d.peringkat.toLowerCase().includes('juara 1')).length;
      const ju2 = data.filter(d=>d.peringkat && d.peringkat.toLowerCase().includes('juara 2')).length;
      const ju3 = data.filter(d=>d.peringkat && d.peringkat.toLowerCase().includes('juara 3')).length;
      const cardsHtml = `
        <div class="bg-gradient-to-br from-yellow-500/10 to-orange-500/10 backdrop-blur-xl rounded-xl p-6 border border-yellow-500/20">
          <p class="text-slate-400 text-sm">Total Prestasi</p>
          <h3 class="text-3xl font-bold text-white">${total}</h3>
        </div>
        <div class="bg-gradient-to-br from-yellow-400/10 to-yellow-600/10 backdrop-blur-xl rounded-xl p-6 border border-yellow-400/20">
          <p class="text-slate-400 text-sm">Juara 1</p>
          <h3 class="text-3xl font-bold text-white">${ju1}</h3>
        </div>
        <div class="bg-gradient-to-br from-slate-400/10 to-slate-600/10 backdrop-blur-xl rounded-xl p-6 border border-slate-400/20">
          <p class="text-slate-400 text-sm">Juara 2</p>
          <h3 class="text-3xl font-bold text-white">${ju2}</h3>
        </div>
        <div class="bg-gradient-to-br from-orange-700/10 to-orange-900/10 backdrop-blur-xl rounded-xl p-6 border border-orange-700/20">
          <p class="text-slate-400 text-sm">Juara 3</p>
          <h3 class="text-3xl font-bold text-white">${ju3}</h3>
        </div>
      `;
      document.getElementById('statsCards').innerHTML = cardsHtml;
    }

    function renderTable(data){
      const tbody = document.getElementById('tableBody');
      tbody.innerHTML = '';
      data.forEach((row, idx)=>{
        const tr = document.createElement('tr');
        tr.innerHTML = `
          <td class="px-4 py-3">${idx+1}</td>
          <td class="px-4 py-3">${row.nama_lomba}</td>
          <td class="px-4 py-3">${row.ekskul || '-'} </td>
          <td class="px-4 py-3">${row.tingkat || '-'} </td>
          <td class="px-4 py-3">${row.peringkat || '-'} </td>
          <td class="px-4 py-3">${formatDate(row.tanggal)}</td>
          <td class="px-4 py-3">${row.pembina || '-'} </td>
          <td class="px-4 py-3">${row.lokasi || '-'} </td>
        `;
        tbody.appendChild(tr);
      });
    }

    function renderFilters(data){
      const ekskulSet = new Set(data.map(d=>d.ekskul).filter(Boolean));
      const ekskulSel = document.getElementById('filterEkskul');
      ekskulSel.innerHTML = '<option value="all">Semua Ekstrakurikuler</option>' + [...ekskulSet].map(e=>`<option value="${e}">${e}</option>`).join('\n');
    }

    function renderChart(data){
      const counts = {};
      data.forEach(d=>{ counts[d.ekskul] = (counts[d.ekskul]||0)+1; });
      const labels = Object.keys(counts);
      const values = labels.map(l=>counts[l]);

      const ctx = document.getElementById('barChart').getContext('2d');
      if(barChart) barChart.destroy();
      barChart = new Chart(ctx, {
        type: 'bar',
        data: { labels, datasets: [{ label: 'Jumlah Prestasi', data: values }] },
        options: {
          responsive: true,
          scales: { y: { beginAtZero: true } }
        }
      });
    }

    // ---------- Filter logic ----------
    function applyFilterState(){
      const tingkat = document.getElementById('filterTingkat').value;
      const ekskul = document.getElementById('filterEkskul').value;
      const tahun = document.getElementById('filterTahun').value;
      const q = document.getElementById('globalSearch').value.toLowerCase().trim();

      filtered = laporanData.filter(item=>{
        if(tingkat!=='all' && item.tingkat!==tingkat) return false;
        if(ekskul!=='all' && item.ekskul!==ekskul) return false;
        if(tahun && item.tanggal && !String(item.tanggal).startsWith(String(tahun))) return false;
        if(q){
          const s = `${item.nama_lomba} ${item.ekskul} ${item.pembina} ${item.siswa} ${item.lokasi} ${item.peringkat}`.toLowerCase();
          if(!s.includes(q)) return false;
        }
        return true;
      });

      renderStats(filtered);
      renderTable(filtered);
      renderChart(filtered);
    }

    // ---------- Exports ----------
    function exportToCSV(filename = 'laporan.csv'){
      const rows = filtered.length ? filtered : laporanData;
      const header = ['id','nama_lomba','ekskul','tingkat','peringkat','tanggal','siswa','pembina','lokasi','deskripsi'];
      const csv = [header.join(',')].concat(rows.map(r=>header.map(h=>`"${(r[h]||'').toString().replace(/"/g,'""')}"`).join(','))).join('\n');
      const blob = new Blob([csv], { type: 'text/csv;charset=utf-8;' });
      const link = document.createElement('a');
      link.href = URL.createObjectURL(blob);
      link.download = filename;
      link.click();
      URL.revokeObjectURL(link.href);
    }

    function exportToPDF(filename = 'laporan.pdf'){
      const { jsPDF } = window.jspdf;
      const doc = new jsPDF();
      const rows = (filtered.length?filtered:laporanData).map((r,idx)=>[
        idx+1, r.nama_lomba, r.ekskul||'-', r.tingkat||'-', r.peringkat||'-', formatDate(r.tanggal), r.pembina||'-'
      ]);
      doc.setFontSize(14);
      doc.text('Laporan Prestasi - Kulkul SMKN 13', 14, 20);
      doc.autoTable({ startY: 28, head: [['#','Nama Lomba','Ekskul','Tingkat','Peringkat','Tanggal','Pembina']], body: rows, styles:{ fontSize:8 } });
      doc.save(filename);
    }

    // ---------- Init ----------
    async function init(){
      try{
        const data = await fetchData();
        laporanData = Array.isArray(data)?data:dummyData;
      }catch(e){
        console.warn('Fetch failed, using dummy data',e);
        laporanData = dummyData;
      }
      filtered = [...laporanData];
      renderStats(filtered);
      renderTable(filtered);
      renderFilters(laporanData);
      renderChart(filtered);
    }

    // event listeners
    document.getElementById('applyFilters').addEventListener('click', applyFilterState);
    document.getElementById('resetFilters').addEventListener('click', ()=>{ document.getElementById('filterTingkat').value='all'; document.getElementById('filterEkskul').value='all'; document.getElementById('filterTahun').value=''; document.getElementById('globalSearch').value=''; filtered = [...laporanData]; renderStats(filtered); renderTable(filtered); renderChart(filtered); });

    document.getElementById('globalSearch').addEventListener('input', ()=>{ applyFilterState(); });
    document.getElementById('exportPdfBtn').addEventListener('click', ()=>exportToPDF('laporan_prestasi.pdf'));

    // start
    init();
  </script>
</body>
</html>
