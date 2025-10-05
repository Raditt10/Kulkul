                            <!DOCTYPE html>
                            <html lang="id">
                            <head>
                                <meta charset="UTF-8">
                                <meta name="viewport" content="width=device-width, initial-scale=1.0">
                                <title>Eskul List - Kulkul SMKN 13 BANDUNG</title>
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
                                                        '0%, 100%': { transform: 'translateY(0px)' },
                                                        '50%': { transform: 'translateY(-20px)' }
                                                    },
                                                    glow: {
                                                        '0%': { boxShadow: '0 0 20px rgba(251, 146, 60, 0.4)' },
                                                        '100%': { boxShadow: '0 0 40px rgba(251, 146, 60, 0.8)' }
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
                                /* Custom Scrollbar untuk Sidebar */
                                    .sidebar-scroll::-webkit-scrollbar {
                                        width: 6px;
                                    }
                                    .sidebar-scroll::-webkit-scrollbar-track {
                                        background: rgba(51, 65, 85, 0.3);
                                        border-radius: 10px;
                                    }
                                    .sidebar-scroll::-webkit-scrollbar-thumb {
                                        background: linear-gradient(to bottom, #f97316, #dc2626);
                                        border-radius: 10px;
                                    }
                                    .sidebar-scroll::-webkit-scrollbar-thumb:hover {
                                        background: linear-gradient(to bottom, #fb923c, #ef4444);
                                    }

                                </style>
                            </head>
                            <body class="bg-slate-950 overflow-x-hidden">
                            <!-- Navigation Bar -->
                            <nav class="glass-effect fixed w-full z-50 transition-all duration-500 border-b border-orange-500/20 bg-slate-900/80">
                                <div class="container mx-auto px-4">
                                    <div class="flex items-center justify-between h-20">
                                                        <div class="flex items-center space-x-6">
                                            <!-- Logo -->
                                            <div class="relative group">
                                                <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center animate-glow hover:scale-110 transition-all duration-300 shadow-xl">
                                                    <img src="{{ asset('images/logo.png') }}" alt="Logo SMKN 13 Bandung" class="w-10 h-10 object-contain">
                                                </div>
                                                <!-- Efek hover overlay -->
                                                <div class="absolute inset-0 bg-gradient-to-br from-orange-400 to-red-500 rounded-2xl opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
                                            </div>

                                            <!-- Brand Text -->
                                            <div class="hidden md:block">
                                                <h1 class="text-xl font-bold text-white">SMKN 13 Bandung</h1>
                                                <p class="text-sm text-orange-300">Excellence in Education</p>
                                            </div>
                                        </div>

                                        <!-- Navigation Menu -->
                                        <div class="hidden md:flex items-center space-x-8">
                                            <a href="{{ route('home') }}" class="group flex items-center text-slate-300 hover:text-white font-medium transition-all duration-300 hover-lift">
                                                <i class="fas fa-home mr-2 group-hover:animate-bounce text-orange-400"></i>
                                                <span class="relative">
                                                    BERANDA
                                                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-orange-400 transition-all duration-300 group-hover:w-full"></span>
                                                </span>
                                            </a>
                                            <a href="{{ route('about') }}" class="group flex items-center text-white font-medium transition-all duration-300 hover-lift">
                                                <i class="fas fa-info-circle mr-2 group-hover:animate-pulse text-orange-400"></i>
                                                <span class="relative">
                                                    TENTANG KAMI
                                                    <span class="absolute -bottom-1 left-0 w-full h-0.5 bg-orange-400"></span>
                                                </span>
                                            </a>    
                                            <a href="{{ route('services') }}" class="group flex items-center text-slate-300 hover:text-white font-medium transition-all duration-300 hover-lift">
                                                <i class="fas fa-cogs mr-2 group-hover:animate-spin text-orange-400"></i>
                                                <span class="relative">
                                                    LAYANAN
                                                    <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-orange-400 transition-all duration-300 group-hover:w-full"></span>
                                                </span>
                                            </a>
                                        </div>

                                        <!-- User Profile -->
                                        <div class="flex items-center">
                                            <div class="bg-gradient-to-r from-orange-500 to-red-600 rounded-2xl p-1 shadow-xl">
                                                <div class="bg-slate-900/90 rounded-2xl p-3 flex items-center space-x-3 hover-lift">
                                                    <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-red-500 rounded-full overflow-hidden animate-pulse-slow shadow-lg">
                                                        <div class="w-full h-full bg-gradient-to-br from-orange-300 to-red-400 flex items-center justify-center">
                                                            <i class="fas fa-user text-white text-lg"></i>
                                                        </div>
                                                    </div>
                                                    <div class="hidden sm:block">
                                                        <div class="text-sm font-bold text-white">Username</div>
                                                        <div class="text-xs text-orange-300">NIS : 2080710</div>
                                                    </div>
                                                    <button id="sidebarToggle" class="text-slate-300 hover:text-white transition-colors duration-300 hover:rotate-90">
                                                        <i class="fas fa-bars text-lg"></i>
                                                    </button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </nav>

                                <!-- Sidebar -->
                            <div id="sidebar" class="fixed top-0 right-0 w-80 h-full backdrop-blur-xl text-white transform translate-x-full transition-transform duration-500 ease-in-out z-50 shadow-2xl border-l border-orange-500/20 bg-slate-900/95 flex flex-col">
                                    <!-- Header (Fixed) -->
                                    <div class="flex items-center justify-between px-6 py-4 border-b border-orange-500/30 bg-gradient-to-r from-orange-600/20 to-red-600/20 flex-shrink-0">
                                        <h2 class="text-xl font-bold text-white">Menu Navigasi</h2>
                                        <button id="closeSidebar" class="text-slate-300 hover:text-white transition-colors duration-300 hover:rotate-90">
                                            <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
                                            </svg>
                                        </button>
                                    </div>

                                    <!-- Profile Card -->
                                    <div class="px-6 py-4 border-b border-orange-500/30 flex-shrink-0">
                                        <div class="flex items-center space-x-4 hover-lift bg-gradient-to-r from-orange-600/10 to-red-600/10 p-4 rounded-xl border border-orange-500/20">
                                            <div class="w-16 h-16 rounded-full bg-gradient-to-br from-orange-400 to-red-500 flex items-center justify-center animate-pulse-slow shadow-lg">
                                                <i class="fas fa-user text-white text-xl"></i>
                                            </div>
                                            <div>
                                                <p class="font-bold text-white text-base">Username</p>
                                                <p class="text-sm text-orange-300">NIS: 2080710</p>
                                                <p class="text-xs text-slate-400">Siswa Aktif</p>
                                            </div>
                                        </div>
                                    </div>

                                    <!-- Menu Items -->
                                    <ul class="flex-1 overflow-y-auto sidebar-scroll px-6 py-4 space-y-3">
                                        <li>
                                            <a href="{{ route('home') }}" class="flex items-center space-x-4 text-white bg-orange-600/30 transition-all duration-300 hover-lift p-3 rounded-xl border border-orange-400/30">
                                                <i class="fas fa-home text-orange-400 w-5"></i>
                                                <span class="font-medium">Beranda</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('about') }}" class="flex items-center space-x-4 text-slate-300 hover:text-white hover:bg-orange-600/20 transition-all duration-300 hover-lift p-3 rounded-xl">
                                                <i class="fas fa-info-circle text-orange-400 w-5"></i>
                                                <span class="font-medium">Tentang Kami</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('services') }}" class="flex items-center space-x-4 text-slate-300 hover:text-white hover:bg-orange-600/20 transition-all duration-300 hover-lift p-3 rounded-xl">
                                                <i class="fas fa-cogs text-orange-400 w-5"></i>
                                                <span class="font-medium">Layanan</span>
                                            </a>
                                        </li> 
                                        <li>
                                            <a href="{{ route('eskul') }}" class="flex items-center space-x-4 text-slate-300 hover:text-white hover:bg-orange-600/20 transition-all duration-300 hover-lift p-3 rounded-xl">
                                                <i class="fas fa-list text-orange-400 w-5"></i>
                                            <span class="font-medium">Eskul list</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('profile') }}" class="flex items-center space-x-4 text-slate-300 hover:text-white hover:bg-orange-600/20 transition-all duration-300 hover-lift p-3 rounded-xl">
                                                <i class="fas fa-user-graduate text-orange-400 w-5"></i>
                                                <span class="font-medium">Profil Saya</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="flex items-center space-x-4 text-slate-300 hover:text-white hover:bg-orange-600/20 transition-all duration-300 hover-lift p-3 rounded-xl">
                                                <i class="fas fa-users text-orange-400 w-5"></i>
                                                <span class="font-medium">Teman Saya</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#" class="flex items-center space-x-4 text-slate-300 hover:text-white hover:bg-orange-600/20 transition-all duration-300 hover-lift p-3 rounded-xl">
                                                <i class="fas fa-cog text-orange-400 w-5"></i>
                                                <span class="font-medium">Pengaturan</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('login') }}" class="flex items-center space-x-4 text-slate-300 hover:text-white hover:bg-orange-600/20 transition-all duration-300 hover-lift p-3 rounded-xl">
                                                <i class="fas fa-sign-in-alt text-green-400 w-5"></i>
                                                <span class="font-medium">Masuk</span>
                                        </li>
                                        <li class="pt-4 border-t border-orange-500/20">
                                            <a href="#" class="flex items-center space-x-4 text-red-300 hover:text-red-200 hover:bg-red-600/20 transition-all duration-300 hover-lift p-3 rounded-xl">
                                                <i class="fas fa-sign-out-alt text-red-400 w-5"></i>
                                                <span class="font-medium">Keluar</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>



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

                                <!-- Footer -->
                                <footer class="bg-slate-950 py-12">
                                    <div class="container mx-auto px-4">
                                        <div class="grid md:grid-cols-4 gap-8 text-slate-400">
                                            <div>
                                                <h4 class="text-white font-bold mb-4">SMKN 13 Bandung</h4>
                                                <p class="text-sm">Jl. Soekarno-Hatta KM.10<br>Bandung, Jawa Barat 40286</p>
                                            </div>
                                            <div>
                                                <h4 class="text-white font-bold mb-4">Links</h4>
                                                <ul class="space-y-2 text-sm">
                                                    <li><a href="#" class="hover:text-orange-400">Home</a></li>
                                                    <li><a href="#" class="hover:text-orange-400">About Us</a></li>
                                                    <li><a href="#" class="hover:text-orange-400">Eskul List</a></li>
                                                </ul>
                                            </div>
                                            <div>
                                                <h4 class="text-white font-bold mb-4">Contact</h4>
                                                <ul class="space-y-2 text-sm">
                                                    <li><i class="fas fa-phone mr-2"></i>(022) 7318960</li>
                                                    <li><i class="fas fa-envelope mr-2"></i>info@smkn13bdg.sch.id</li>
                                                </ul>
                                            </div>
                                            <div>
                                                <h4 class="text-white font-bold mb-4">Follow Us</h4>
                                                <div class="flex space-x-4">
                                                    <a href="#" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-orange-500 transition-colors duration-300">
                                                        <i class="fab fa-facebook-f text-white"></i>
                                                    </a>
                                                    <a href="#" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-orange-500 transition-colors duration-300">
                                                        <i class="fab fa-instagram text-white"></i>
                                                    </a>
                                                    <a href="#" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-orange-500 transition-colors duration-300">
                                                        <i class="fab fa-youtube text-white"></i>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="border-t border-slate-800 mt-12 pt-8 text-center text-sm text-slate-500">
                                            <p>&copy; 2025 SMKN 13 Bandung. All rights reserved.</p>
                                        </div>
                                    </div>
                                </footer>

                                <script>
                                    // Sidebar Toggle
                                    const sidebar = document.getElementById('sidebar');
                                    const sidebarToggle = document.getElementById('sidebarToggle');
                                    const closeSidebar = document.getElementById('closeSidebar');
                                    sidebarToggle.addEventListener('click', () => {
                                        sidebar.classList.toggle('translate-x-full');
                                    });
                                    closeSidebar.addEventListener('click', () => {
                                        sidebar.classList.add('translate-x-full');
                                    });

                                    // Data Ekstrakurikuler
                                    const eskulData = [
                                        {
                                            name: 'Basket',
                                            category: 'olahraga',
                                            icon: 'fas fa-basketball-ball',
                                            color: 'from-orange-500 to-red-600',
                                            members: 45,
                                            schedule: 'Senin & Kamis',
                                            description: 'Latihan basket untuk mengasah kemampuan tim dan strategi bermain'
                                        },
                                        {
                                            name: 'Futsal',
                                            category: 'olahraga',
                                            icon: 'fas fa-futbol',
                                            color: 'from-green-500 to-emerald-600',
                                            members: 52,
                                            schedule: 'Selasa & Jumat',
                                            description: 'Ekstrakurikuler futsal dengan pelatih berpengalaman'
                                        },
                                        {
                                            name: 'Voli',
                                            category: 'olahraga',
                                            icon: 'fas fa-volleyball-ball',
                                            color: 'from-blue-500 to-cyan-600',
                                            members: 38,
                                            schedule: 'Rabu & Sabtu',
                                            description: 'Melatih kerjasama tim melalui permainan bola voli'
                                        },
                                        {
                                            name: 'Badminton',
                                            category: 'olahraga',
                                            icon: 'fas fa-shuttlecock',
                                            color: 'from-yellow-500 to-orange-600',
                                            members: 30,
                                            schedule: 'Kamis & Sabtu',
                                            description: 'Bermain dan berlatih bulutangkis dengan teknik yang tepat'
                                        },
                                        {
                                            name: 'Pramuka',
                                            category: 'akademik',
                                            icon: 'fas fa-campground',
                                            color: 'from-amber-600 to-yellow-700',
                                            members: 65,
                                            schedule: 'Jumat',
                                            description: 'Membentuk karakter pemimpin dan jiwa petualang'
                                        },
                                        {
                                            name: 'PMR',
                                            category: 'akademik',
                                            icon: 'fas fa-plus-square',
                                            color: 'from-red-500 to-rose-600',
                                            members: 40,
                                            schedule: 'Rabu',
                                            description: 'Palang Merah Remaja untuk melatih kepedulian sosial'
                                        },
                                        {
                                            name: 'Seni Tari',
                                            category: 'seni',
                                            icon: 'fas fa-drum',
                                            color: 'from-pink-500 to-rose-600',
                                            members: 28,
                                            schedule: 'Senin & Rabu',
                                            description: 'Melestarikan budaya melalui tarian tradisional dan modern'
                                        },
                                        {
                                            name: 'Musik',
                                            category: 'seni',
                                            icon: 'fas fa-music',
                                            color: 'from-purple-500 to-pink-600',
                                            members: 35,
                                            schedule: 'Selasa & Kamis',
                                            description: 'Belajar berbagai alat musik dan tampil di acara sekolah'
                                        },
                                        {
                                            name: 'Teater',
                                            category: 'seni',
                                            icon: 'fas fa-theater-masks',
                                            color: 'from-indigo-500 to-purple-600',
                                            members: 25,
                                            schedule: 'Rabu',
                                            description: 'Mengasah kemampuan akting dan ekspresi diri'
                                        },
                                        {
                                            name: 'Fotografi',
                                            category: 'seni',
                                            icon: 'fas fa-camera',
                                            color: 'from-slate-500 to-gray-600',
                                            members: 30,
                                            schedule: 'Jumat',
                                            description: 'Belajar teknik fotografi dan videografi profesional'
                                        },
                                        {
                                            name: 'Robotika',
                                            category: 'teknologi',
                                            icon: 'fas fa-robot',
                                            color: 'from-cyan-500 to-blue-600',
                                            members: 32,
                                            schedule: 'Senin & Kamis',
                                            description: 'Merancang dan membuat robot untuk kompetisi'
                                        },
                                        {
                                            name: 'Musi',
                                            category: 'teknologi',
                                            icon: 'fas fa-code',
                                            color: 'from-green-600 to-teal-600',
                                            members: 42,
                                            schedule: 'Rabu & Jumat',
                                            description: 'Belajar coding dan pengembangan aplikasi'
                                        },
                                        {
                                            name: 'Desain Grafis',
                                            category: 'teknologi',
                                            icon: 'fas fa-pen-nib',
                                            color: 'from-violet-500 to-purple-600',
                                            members: 38,
                                            schedule: 'Selasa',
                                            description: 'Menguasai software desain untuk membuat karya visual'
                                        },
                                        {
                                            name: 'KIR',
                                            category: 'akademik',
                                            icon: 'fas fa-flask',
                                            color: 'from-emerald-500 to-green-600',
                                            members: 28,
                                            schedule: 'Kamis',
                                            description: 'Karya Ilmiah Remaja untuk mengembangkan penelitian'
                                        },
                                        {
                                            name: 'Jurnalistik',
                                            category: 'akademik',
                                            icon: 'fas fa-newspaper',
                                            color: 'from-blue-600 to-indigo-600',
                                            members: 26,
                                            schedule: 'Senin',
                                            description: 'Menulis berita dan mengelola media sekolah'
                                        },
                                        {
                                            name: 'English Club',
                                            category: 'akademik',
                                            icon: 'fas fa-comments',
                                            color: 'from-sky-500 to-blue-600',
                                            members: 35,
                                            schedule: 'Rabu',
                                            description: 'Meningkatkan kemampuan berbahasa Inggris'
                                        },
                                        {
                                            name: 'Pencak Silat',
                                            category: 'olahraga',
                                            icon: 'fas fa-hand-rock',
                                            color: 'from-red-600 to-orange-700',
                                            members: 33,
                                            schedule: 'Selasa & Kamis',
                                            description: 'Bela diri tradisional Indonesia yang membangun mental'
                                        },
                                        {
                                            name: 'E-Sports',
                                            category: 'teknologi',
                                            icon: 'fas fa-gamepad',
                                            color: 'from-purple-600 to-pink-700',
                                            members: 40,
                                            schedule: 'Jumat',
                                            description: 'Kompetisi game profesional dan strategi tim'
                                        }
                                    ];

                                    // Render Eskul Cards
                                    function renderEskul(data) {
                                        const grid = document.getElementById('eskulGrid');
                                        grid.innerHTML = data.map(eskul => `
                                            <div class="eskul-card hover-lift" data-category="${eskul.category}">
                                                <div class="relative group">
                                                    <div class="absolute -inset-1 bg-gradient-to-r ${eskul.color} rounded-2xl blur opacity-25 group-hover:opacity-50 transition duration-1000"></div>
                                                    <div class="relative bg-slate-800 border border-orange-500/20 rounded-2xl overflow-hidden">
                                                        <!-- Header -->
                                                        <div class="bg-gradient-to-r ${eskul.color} p-6 text-center">
                                                            <div class="w-20 h-20 mx-auto bg-white/20 backdrop-blur-xl rounded-full flex items-center justify-center mb-4 animate-float">
                                                                <i class="${eskul.icon} text-white text-3xl"></i>
                                                            </div>
                                                            <h3 class="text-2xl font-bold text-white">${eskul.name}</h3>
                                                        </div>
                                                        
                                                        <!-- Content -->
                                                        <div class="p-6 space-y-4">
                                                            <p class="text-slate-300 text-sm leading-relaxed">${eskul.description}</p>
                                                            
                                                            <div class="space-y-3">
                                                                <div class="flex items-center text-slate-300">
                                                                    <i class="fas fa-users text-orange-400 mr-3 w-5"></i>
                                                                    <span class="text-sm">${eskul.members} Anggota</span>
                                                                </div>
                                                                <div class="flex items-center text-slate-300">
                                                                    <i class="fas fa-calendar text-orange-400 mr-3 w-5"></i>
                                                                    <span class="text-sm">${eskul.schedule}</span>
                                                                </div>
                                                                <div class="flex items-center text-slate-300">
                                                                    <i class="fas fa-tag text-orange-400 mr-3 w-5"></i>
                                                                    <span class="text-sm capitalize">${eskul.category}</span>
                                                                </div>
                                                            </div>

                                                            <!-- Action Button -->
                                                            <button class="w-full mt-6 px-6 py-3 bg-gradient-to-r ${eskul.color} text-white font-bold rounded-xl hover:shadow-lg transition-all duration-300">
                                                                <i class="fas fa-info-circle mr-2"></i>
                                                                Lihat Detail
                                                            </button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        `).join('');
                                    }

                                    // Filter Function
                                    function filterEskul(category) {
                                        const cards = document.querySelectorAll('.eskul-card');
                                        const buttons = document.querySelectorAll('.filter-btn');
                                        
                                        // Update active button
                                        buttons.forEach(btn => {
                                            btn.classList.remove('active', 'bg-gradient-to-r', 'from-orange-500', 'to-red-600', 'text-white');
                                            btn.classList.add('bg-slate-800', 'text-slate-300');
                                        });
                                        
                                        event.target.closest('.filter-btn').classList.add('active', 'bg-gradient-to-r', 'from-orange-500', 'to-red-600', 'text-white');
                                        event.target.closest('.filter-btn').classList.remove('bg-slate-800', 'text-slate-300');
                                        
                                        // Filter cards with animation
                                        cards.forEach((card, index) => {
                                            setTimeout(() => {
                                                if (category === 'all' || card.dataset.category === category) {
                                                    card.style.display = 'block';
                                                    card.style.animation = 'slideUp 0.5s ease-out';
                                                } else {
                                                    card.style.display = 'none';
                                                }
                                            }, index * 50);
                                        });
                                    }

                                    // Initial render
                                    renderEskul(eskulData);

                                    // Set initial active button
                                    document.querySelector('.filter-btn').classList.add('bg-gradient-to-r', 'from-orange-500', 'to-red-600', 'text-white');
                                </script>
                            </body>
                            </html>