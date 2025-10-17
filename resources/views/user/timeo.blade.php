<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
  <title>Time 'O Kulkul</title>

  <!-- Tailwind & FontAwesome -->
  <script src="https://cdn.tailwindcss.com"></script>
  <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">

  <script>
    tailwind.config = {
      theme: {
        extend: {
          colors: {
            slate: { 850: '#141a28' },
            brand: { orange: '#fb923c', red: '#f43f5e' }
          },
          animation: {
            float: 'float 6s ease-in-out infinite',
            glow: 'glow 2s ease-in-out infinite alternate',
            fadeIn: 'fadeIn 1s ease-in forwards'
          },
          keyframes: {
            float: {
              '0%,100%': { transform: 'translateY(0)' },
              '50%': { transform: 'translateY(-10px)' }
            },
            glow: {
              '0%': { boxShadow: '0 0 20px rgba(251,146,60,0.4)' },
              '100%': { boxShadow: '0 0 40px rgba(251,146,60,0.9)' }
            },
            fadeIn: {
              '0%': { opacity: 0, transform: 'translateY(20px)' },
              '100%': { opacity: 1, transform: 'translateY(0)' }
            }
          }
        }
      }
    }
  </script>

  <style>
    html, body {
      height: auto;
      min-height: 100vh;
      overflow-y: auto;
      scroll-behavior: smooth;
      background: radial-gradient(circle at top right, #1e293b, #0f172a 70%);
    }
    .glass {
      background: rgba(255, 255, 255, 0.05);
      backdrop-filter: blur(20px);
      border: 1px solid rgba(255, 255, 255, 0.1);
    }
    .hover-lift {
      transition: all 0.3s ease;
    }
    .hover-lift:hover {
      transform: translateY(-8px) scale(1.02);
      filter: brightness(1.1);
    }
    .glow-border {
      position: relative;
    }
    .glow-border::before {
      content: "";
      position: absolute;
      inset: -2px;
      border-radius: 1rem;
      background: linear-gradient(90deg, rgba(251,146,60,0.8), rgba(244,63,94,0.8));
      z-index: -1;
      opacity: 0;
      transition: opacity 0.3s;
    }
    .glow-border:hover::before {
      opacity: 1;
      filter: blur(8px);
    }
     .event-card {
      position: relative;
      overflow: hidden;
    }
    .event-card::before {
      content: "";
      position: absolute;
      top: 0;
      left: -100%;
      width: 100%;
      height: 100%;
      background: linear-gradient(90deg, transparent, rgba(251,146,60,0.3), transparent);
      transition: left 0.5s;
    }
    .event-card:hover::before {
      left: 100%;
    }
  </style>
</head>
<body class="bg-slate-950 overflow-x-hidden overflow-y-auto min-h-screen">
  @php $page = 'eskul' @endphp
  <!-- Navbar -->
  @include('user/includes.navbar')

  <!-- Sidebar -->
  @include('user/includes.sidebar')

  @include('user/includes.notif')
        
        <!-- Close Button -->
        <button onclick="closeNotification()" class="flex-shrink-0 w-8 h-8 rounded-full hover:bg-slate-700/50 transition-colors flex items-center justify-center group">
          <i class="fas fa-times text-slate-400 group-hover:text-white transition-colors"></i>
        </button>
      </div>
    </div>
  </div>

  <!-- Main Content -->
  <main class="pt-24 pb-12 px-10 max-w-7xl mx-auto">
    <div class="grid lg:grid-cols-12 gap-10 w-full">
      
      <!-- Left Sidebar -->
      <div class="lg:col-span-4 space-y-8">
        <div class="glass rounded-3xl p-8 shadow-2xl relative overflow-hidden">
          <div class="absolute inset-0 bg-gradient-to-br from-orange-500/10 to-red-500/10 blur-2xl"></div>

          <!-- Logo -->
          <div class="relative flex justify-center mb-6">
            <div class="w-20 h-20 bg-gradient-to-br from-orange-500 to-rose-600 rounded-2xl flex items-center justify-center shadow-xl animate-float">
              <img src="{{ asset('images/logo.png') }}" alt="Logo" class="w-12 h-12 object-contain drop-shadow-lg">
            </div>
          </div>

          <!-- Date -->
          <div class="text-center mb-6 relative">
            <h2 id="currentMonth" class="text-3xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-rose-400">
              17 AGUSTUS 2025
            </h2>
            <p class="text-slate-400 text-sm tracking-wide">Hari Kemerdekaan 🇮🇩</p>
          </div>

          <!-- Mini Calendar -->
          <div class="mb-8">
            <div class="flex justify-between items-center mb-3">
            <button id="prevMonth" class="text-orange-400 font-bold">&lt;</button>
            <h3 id="miniCurrentMonth" class="text-xl font-bold text-orange-300"></h3>
            <button id="nextMonth" class="text-orange-400 font-bold">&gt;</button>
            </div>  
            <div class="grid grid-cols-7 gap-2 text-center mb-3">
              <div class="text-xs font-semibold text-orange-300">S</div>
              <div class="text-xs font-semibold text-orange-300">S</div>
              <div class="text-xs font-semibold text-orange-300">R</div>
              <div class="text-xs font-semibold text-orange-300">K</div>
              <div class="text-xs font-semibold text-orange-300">J</div>
              <div class="text-xs font-semibold text-orange-300">S</div>
              <div class="text-xs font-semibold text-orange-300">M</div>
            </div>
            <div id="calendarGrid" class="grid grid-cols-7 gap-2 text-center">
              <!-- Calendar here -->
            </div>
          </div>

          <!-- Buttons -->
          <div class="space-y-3">
            <button class="w-full py-3 bg-gradient-to-r from-orange-500 to-rose-500 text-white font-bold rounded-full shadow-lg hover:opacity-90 hover:scale-105 transition flex items-center justify-center gap-2">
              <i class="fas fa-plus-circle"></i> Tambah Jadwal
            </button>
            <button class="w-full py-3 border border-orange-500 text-orange-400 font-bold rounded-full hover:bg-orange-500/20 transition flex items-center justify-center gap-2">
              <i class="fas fa-eye"></i> Lihat Detail
            </button>
          </div>

          <!-- User Badge -->
          <div class="mt-8 text-center">
            <div class="inline-flex items-center gap-3 glass rounded-full px-6 py-3 shadow-md hover-lift">
              <div class="w-10 h-10 bg-gradient-to-br from-orange-400 to-red-500 rounded-full flex items-center justify-center">
                <i class="fas fa-user text-white"></i>
              </div>
              <div class="text-left">
                <p class="text-sm font-bold text-white">{{ session('user')->name }}</p>
                <p class="text-xs text-slate-400">{{ session('user')->nis }}</p>
              </div>
            </div>
          </div>
        </div>
      </div>

      <!-- Right Content -->
      <div class="lg:col-span-8 space-y-8 animate-fadeIn">
        <div class="glass border border-orange-400/20 rounded-2xl p-6 relative hover-lift">
          <h2 class="text-4xl font-extrabold text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-rose-400">
            Jadwal Bulan Agustus
          </h2>
          <p class="text-slate-400 mt-2">Lihat semua kegiatan ekskul dan event penting bulan ini.</p>
        </div>

       <!-- Schedule Cards -->
          <div id="scheduleList" class="space-y-6">
            @foreach ($ekskuls as $e)
              <div class="glass rounded-2xl p-6 flex justify-between items-center hover-lift border border-orange-500/10">
                <div>
                  <h3 class="text-xl font-bold text-orange-300">{{ $e->nama_ekskul }}</h3>
                  <p class="text-slate-400 text-sm">
                    {{ $e->hari }} • {{ $e->jam_mulai_formatted ?? $e->jam_mulai }} - {{ $e->jam_selesai_formatted ?? $e->jam_selesai }} WIB
                  </p>
                  <p class="text-slate-500 text-sm">Pembina: {{ $e->pembina }}</p>
                </div>
                <span class="px-3 py-1 text-xs bg-gradient-to-r from-orange-500 to-rose-500 rounded-full shadow-lg capitalize">
                  {{ $e->kategori }}
                </span>
              </div>
            @endforeach
          </div>
      </div>
    </div>
  </main>

  <!-- Footer -->
  @include('user/includes.footer')

  <script src="{{ asset('js/miniCalendar.js') }}"></script>
  <script src="{{ asset('js/sidebar.js') }}"></script>
  <script src="{{ asset('js/notif.js') }}"></script>
</body>
</html>
