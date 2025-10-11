<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Time'O - Kulkul SMKN 13 BANDUNG</title>
    <link rel="icon" type="image/png" href="{{ asset('images/logo.png') }}">
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <script src="https://cdn.jsdelivr.net/npm/fullcalendar@6.1.11/index.global.min.js"></script>

    <script>
    tailwind.config = {
        theme: {
            extend: {
                colors: {
                    slate: { 850: '#1a2234' }
                },
                animation: {
                    'glow': 'glow 2s ease-in-out infinite alternate',
                    'slide-up': 'slideUp 1s ease-out',
                },
                keyframes: {
                    glow: {
                        '0%': { boxShadow: '0 0 20px rgba(251, 146, 60, 0.4)' },
                        '100%': { boxShadow: '0 0 40px rgba(251, 146, 60, 0.8), 0 0 60px rgba(234, 88, 12, 0.3)' }
                    },
                    slideUp: {
                        '0%': { transform: 'translateY(100px)', opacity: '0' },
                        '100%': { transform: 'translateY(0)', opacity: '1' }
                    }
                }
            }
        }
    }
    </script>
</head>

<body class="bg-slate-950 overflow-x-hidden">

    <!-- Include same navbar & sidebar as your Home page -->
    @include('layouts.navbar')
    @include('layouts.sidebar')

    <!-- Hero Section -->
    <section class="relative bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-24">
        <div class="container mx-auto px-4 relative z-10 text-center animate-slide-up">
            <h1 class="text-6xl md:text-7xl font-bold text-white mb-6">
                Jadwal <span class="text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-400">Ekstrakurikuler</span>
            </h1>
            <p class="text-slate-300 text-lg max-w-2xl mx-auto">
                Lihat jadwal kegiatan ekstrakurikuler SMKN 13 Bandung di bawah ini — tetap semangat dan atur waktumu dengan baik!
            </p>
        </div>

        <!-- Floating Glow Icon -->
        <div class="absolute top-10 left-10 w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-full flex items-center justify-center animate-glow shadow-xl">
            <i class="fas fa-calendar text-white text-2xl"></i>
        </div>

        <!-- Wave Decoration -->
        <div class="absolute -bottom-1 left-0 w-full overflow-hidden">
            <svg class="relative block w-full h-[100px]" viewBox="0 0 1440 120" preserveAspectRatio="none">
                <defs>
                    <linearGradient id="wave-gradient" gradientTransform="rotate(90)">
                        <stop offset="0%" stop-color="#0f172a"/>
                        <stop offset="100%" stop-color="#1e293b"/>
                    </linearGradient>
                </defs>
                <path d="M0,96L34.3,85.3C68.6,75,137,53,206,48C274.3,43,343,53,411,58.7C480,64,549,64,617,69.3C685.7,75,754,85,823,90.7C891.4,96,960,96,1029,90.7C1097.1,85,1166,75,1234,69.3C1302.9,64,1371,64,1406,64L1440,64L1440,120L0,120Z" fill="url(#wave-gradient)" />
            </svg>
        </div>
    </section>

    <!-- Calendar Section -->
    <section class="bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900 py-24">
        <div class="container mx-auto px-4">
            <div class="bg-slate-800/70 backdrop-blur-xl rounded-3xl p-8 border border-orange-500/20 shadow-2xl animate-slide-up">
                <h2 class="text-3xl font-bold text-white mb-6 text-center">
                    <i class="fas fa-calendar-alt text-orange-400 mr-2"></i> Kalender Kegiatan
                </h2>

                <div id="calendar" class="bg-slate-900 rounded-xl p-4 shadow-inner border border-orange-400/20"></div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    @include('layouts.footer')

    <!-- FullCalendar Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var calendarEl = document.getElementById('calendar');
        var calendar = new FullCalendar.Calendar(calendarEl, {
            themeSystem: 'standard',
            initialView: 'dayGridMonth',
            height: 'auto',
            headerToolbar: {
                left: 'prev,next today',
                center: 'title',
                right: 'dayGridMonth,timeGridWeek,listWeek'
            },
            events: [
                {
                    title: 'Latihan Basket',
                    start: '2025-10-10T15:00:00',
                    backgroundColor: '#f97316'
                },
                {
                    title: 'Rapat OSIS',
                    start: '2025-10-12T10:00:00',
                    backgroundColor: '#dc2626'
                },
                {
                    title: 'Lomba Band Sekolah',
                    start: '2025-10-15',
                    end: '2025-10-17',
                    backgroundColor: '#f59e0b'
                }
            ],
            eventDisplay: 'block',
            displayEventTime: true,
            editable: false,
        });
        calendar.render();
    });
    </script>

    <!-- Sidebar toggle script -->
    <script>
        const sidebar = document.getElementById('sidebar');
        const sidebarOverlay = document.getElementById('sidebarOverlay');
        const sidebarToggle = document.getElementById('sidebarToggle');
        const closeSidebar = document.getElementById('closeSidebar');

        sidebarToggle?.addEventListener('click', () => {
            sidebar.classList.remove('translate-x-full');
            sidebarOverlay.classList.remove('opacity-0', 'pointer-events-none');
        });

        closeSidebar?.addEventListener('click', () => {
            sidebar.classList.add('translate-x-full');
            sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
        });

        sidebarOverlay?.addEventListener('click', () => {
            sidebar.classList.add('translate-x-full');
            sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
        });
    </script>

</body>
</html>
