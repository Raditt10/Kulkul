<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Jadwal - Kulkul SMKN 13 BANDUNG</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        slate: { 850: '#1a2234' }
                    },
                    animation: {
                        'float': 'float 6s ease-in-out infinite',
                        'glow': 'glow 2s ease-in-out infinite alternate',
                        'slide-up': 'slideUp 1s ease-out',
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
    <style>
        .hover-lift {
            transition: transform 0.3s ease;
        }
        .hover-lift:hover {
            transform: translateY(-10px);
        }
        .glass-effect {
            background: rgba(255, 255, 255, 0.05);
            backdrop-filter: blur(10px);
        }
    </style>
</head>
<body class="bg-slate-950 overflow-x-hidden">
    @include('user/includes.navbar')

    <div class="container mx-auto px-4 py-12 mt-16" style="margin-top: 0;">
        @include('user/includes.sidebar')

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-12 mt-16" >
         <div class="grid lg:grid-cols-12 gap-8 max-w-7xl mx-auto">
            
            <!-- Left Sidebar - Calendar -->
            <div class="lg:col-span-4">
                <div class="relative group hover-lift animate-slide-up">
                    <div class="absolute -inset-1 bg-gradient-to-br from-orange-400 to-red-400 rounded-3xl blur opacity-30 group-hover:opacity-50 transition duration-500"></div>
                    <div class="relative bg-gradient-to-br from-orange-50 via-yellow-50 to-orange-100 rounded-3xl p-8 shadow-2xl">
                        
                        <!-- Logo -->
                        <div class="flex justify-center mb-6">
                            <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center shadow-lg">
                               <img src="{{ asset('images/logo.png') }}" alt="Logo SMKN 13 Bandung" class="w-10 h-10 object-contain filter drop-shadow-lg">
                            </div>
                        </div>

                        <!-- Date Display -->
                        <div class="text-center mb-8">
                            <h2 class="text-3xl font-bold text-slate-900 mb-2" id="currentMonth">17 AGUSTUS 2025</h2>
                        </div>

                        <!-- Mini Calendar -->
                        <div class="mb-8">
                            <div class="grid grid-cols-7 gap-2 text-center mb-4">
                                <div class="text-xs font-bold text-slate-600">S</div>
                                <div class="text-xs font-bold text-slate-600">S</div>
                                <div class="text-xs font-bold text-slate-600">R</div>
                                <div class="text-xs font-bold text-slate-600">K</div>
                                <div class="text-xs font-bold text-slate-600">J</div>
                                <div class="text-xs font-bold text-slate-600">S</div>
                                <div class="text-xs font-bold text-slate-600">M</div>
                            </div>
                            <div id="calendarGrid" class="grid grid-cols-7 gap-2 text-center">
                                <!-- Calendar will be generated here -->
                            </div>
                        </div>

                        <!-- Action Buttons -->
                        <div class="space-y-3">
                            <button class="w-full py-3 bg-gradient-to-r from-orange-500 to-red-600 text-white font-bold rounded-full hover:from-orange-400 hover:to-red-500 transition-all duration-300 shadow-lg flex items-center justify-center gap-2">
                                <i class="fas fa-plus-circle"></i>
                                ADD
                            </button>
                            <button class="w-full py-3 border-2 border-orange-500 text-orange-600 font-bold rounded-full hover:bg-orange-50 transition-all duration-300 flex items-center justify-center gap-2">
                                <i class="fas fa-info-circle"></i>
                                DETAIL
                            </button>
                        </div>

                        <!-- User Badge -->
                        <div class="mt-8 text-center">
                            <div class="inline-flex items-center gap-3 bg-white/50 backdrop-blur rounded-full px-6 py-3 shadow">
                                <div class="w-10 h-10 bg-gradient-to-br from-orange-400 to-red-500 rounded-full flex items-center justify-center">
                                    <i class="fas fa-user text-white"></i>
                                </div>
                                <div class="text-left">
                                    <p class="text-sm font-bold text-slate-900">Username</p>
                                    <p class="text-xs text-slate-600">NiS : 2080710</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Right Content - Schedule -->
            <div class="lg:col-span-8 space-y-6">
                
                <!-- Month Header -->
                <div class="relative group hover-lift">
                    <div class="absolute -inset-1 bg-gradient-to-r from-orange-500 to-red-500 rounded-2xl blur opacity-25"></div>
                    <div class="relative bg-slate-800 border border-orange-500/20 rounded-2xl p-6">
                        <h2 class="text-3xl font-bold text-transparent bg-clip-text bg-gradient-to-r from-orange-400 to-red-400">
                            AGUSTUS
                        </h2>
                    </div>
                </div>

                <!-- Schedule Items -->
                <div id="scheduleList" class="space-y-6">
                    <!-- Schedule items will be generated here -->
                </div>

            </div>
        </div>
    </div>

    @include('user/includes.footer')

    <script src="{{ asset('js/miniCalendar.js') }}"></script>
    <script src="{{ asset('js/sidebar.js') }}"></script>

</body>
</html>