<!DOCTYPE html>
<html lang="id">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Eskul List - Kulkul SMKN 13 BANDUNG</title>
<link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
<script src="https://cdn.tailwindcss.com"></script>
<script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    slate: {
                        850: '#1a2234'
                    }
                },
                animation: {
                    'float': 'float 6s ease-in-out infinite',
                    'glow': 'glow 2s ease-in-out infinite alternate',
                    'slide-up': 'slideUp 1s ease-out',
                    'pulse-slow': 'pulse 4s infinite',
                },
                keyframes: {
                    float: {
                        '0%, 100%': {
                            transform: 'translateY(0px)'
                        },
                        '50%': {
                            transform: 'translateY(-20px)'
                        }
                    },
                    glow: {
                        '0%': {
                            boxShadow: '0 0 20px rgba(251, 146, 60, 0.4)'
                        },
                        '100%': {
                            boxShadow: '0 0 40px rgba(251, 146, 60, 0.8)'
                        }
                    },
                    slideUp: {
                        '0%': {
                            transform: 'translateY(100px)',
                            opacity: '0'
                        },
                        '100%': {
                            transform: 'translateY(0)',
                            opacity: '1'
                        }
                    }
                }
            }
        }
    }
</script>
<style href="{{ asset('css/sidebarscroll.css') }}"></style>
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
<style>
    .hover-lift {
        transition: all 0.3s ease;
    }

    .hover-lift:hover {
        transform: translateY(-8px);
    }

    .glass-effect {
        backdrop-filter: blur(16px);
    }
    @keyframes bounce-slow {
  0%, 100% { transform: translateY(0); }
  50% { transform: translateY(-4px); }
}
.animate-bounce-slow {
  animation: bounce-slow 2s infinite;
}

/* Hover tombol scale */
.group:hover .relative {
  transform: scale(1.05);
  transition: transform 0.3s ease;
}
</style>
</head>

<body class="bg-slate-950 overflow-x-hidden">

    @include('user/includes.navbar')
  
    @include('user/includes.sidebar')

<!-- Hero Section -->
<section class="relative bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 pt-32 pb-20">
    <div class="absolute inset-0">
        <div class="absolute inset-0 bg-gradient-to-r from-orange-600/5 via-red-600/5 to-orange-600/5 animate-pulse-slow"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="text-center max-w-4xl mx-auto mb-12 animate-slide-up">
            <div class="flex items-center justify-center mb-6">
                <div class="w-20 h-1 bg-gradient-to-r from-orange-500 to-red-500 mr-4"></div>
                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-full flex items-center justify-center shadow-xl">
                    <img src="{{ asset('images/logo.png') }}" alt="Logo SMKN 13 Bandung" class="w-10 h-10 object-contain filter drop-shadow-lg">
                </div>
                <div class="w-20 h-1 bg-gradient-to-r from-red-500 to-orange-500 ml-4"></div>
            </div>
            <h1 class="text-5xl md:text-6xl font-bold text-white mb-6">
                Daftar <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-400">Ekstrakurikuler</span>
            </h1>
            <p class="text-xl text-slate-300 leading-relaxed">
                Temukan passion-mu dan kembangkan bakat terbaikmu bersama berbagai pilihan ekstrakurikuler di SMKN 13 Bandung
            </p>
       <div class="mt-8 flex flex-wrap justify-center gap-6">
            <a href="{{ route('otime') }}" 
            class="relative inline-block px-8 py-4 font-bold text-white rounded-full overflow-hidden group shadow-lg">
                <span class="absolute inset-0 bg-gradient-to-r from-orange-500 to-red-600 transition-all duration-500 ease-in-out group-hover:from-red-500 group-hover:to-orange-500"></span>
                <span class="relative flex items-center gap-2">
                    <i class="fas fa-stopwatch animate-bounce-slow"></i>
                    Lihat Jadwal O' Time
                </span>
                <span class="absolute -inset-0.5 rounded-full bg-gradient-to-r from-orange-500 to-red-600 blur opacity-30 group-hover:opacity-50 transition duration-500"></span>
            </a>
         </div>
       </div>
    
        <!-- Filter Section -->
        <div class="flex flex-wrap justify-center gap-4 mb-12">
            <button onclick="filterEskul('all')" class="filter-btn active px-6 py-3 rounded-full font-bold transition-all duration-300 bg-gradient-to-r from-orange-500 to-red-600 text-white">
                <i class="fas fa-th-large mr-2"></i>Semua
            </button>
            <button onclick="filterEskul('olahraga')" class="filter-btn px-6 py-3 rounded-full font-bold transition-all duration-300 bg-slate-800 text-white">
                <i class="fas fa-running mr-2"></i>Olahraga
            </button>
            <button onclick="filterEskul('seni')" class="filter-btn px-6 py-3 rounded-full font-bold transition-all duration-300 bg-slate-800 text-white">
                <i class="fas fa-palette mr-2"></i>Seni & Budaya
            </button>
            <button onclick="filterEskul('akademik')" class="filter-btn px-6 py-3 rounded-full font-bold transition-all duration-300 bg-slate-800 text-white">
                <i class="fas fa-brain mr-2"></i>Akademik
            </button>
            <button onclick="filterEskul('teknologi')" class="filter-btn px-6 py-3 rounded-full font-bold transition-all duration-300 bg-slate-800 text-white">
                <i class="fas fa-laptop-code mr-2"></i>Teknologi
            </button>
        </div>
    </div>
</section>

<!-- Eskul Cards Section -->
<section class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-20">
    <div class="container mx-auto px-4">
        <div id="eskulGrid" class="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            <!-- Card will be generated by JavaScript -->
        </div>
    </div>
</section>

  @include('user/includes.footer')

  <script src="{{ asset('js/sidebar.js') }}"></script>
  <script src="{{ asset('js/dataEkstrakurikuler.js') }}"></script>
</body>
</html> 