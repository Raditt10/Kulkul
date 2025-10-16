<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SMKN 13 Bandung - Footer</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        @keyframes fadeInUp {
            from {
                opacity: 0;
                transform: translateY(20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        .fade-in-up {
            animation: fadeInUp 0.6s ease-out forwards;
        }
        
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        
        .hover-lift:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(249, 115, 22, 0.2);
        }
        
        .gradient-text {
            background: linear-gradient(135deg, #f97316 0%, #fb923c 100%);
            -webkit-background-clip: text;
            -webkit-text-fill-color: transparent;
            background-clip: text;
        }
        
        .pattern-dots {
            background-image: radial-gradient(circle, rgba(249, 115, 22, 0.1) 1px, transparent 1px);
            background-size: 20px 20px;
        }
    </style>
</head>
<body class="bg-gray-100">

    <footer class="bg-gradient-to-br from-slate-950 via-slate-900 to-slate-950 relative overflow-hidden">
        <!-- Pattern Background -->
        <div class="absolute inset-0 pattern-dots opacity-30"></div>
        
        <!-- Decorative Elements -->
        <div class="absolute top-0 left-0 w-64 h-64 bg-orange-500/10 rounded-full blur-3xl"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-orange-600/10 rounded-full blur-3xl"></div>
        
        <div class="container mx-auto px-4 py-16 relative z-10">
            <!-- Main Footer Content -->
            <div class="grid md:grid-cols-4 gap-12 mb-12">
                
                <!-- SMKN 13 Info -->
                <div class="fade-in-up space-y-4">
                    <div class="flex items-center space-x-3 mb-6">
                        <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-orange-600 rounded-xl flex items-center justify-center shadow-lg shadow-orange-500/30">
                          <img src="{{ asset('images/logo.png') }}" alt="Logo SMKN 13 Bandung" class="w-12 h-12 object-contain">
                        </div>
                        <div>
                            <h4 class="text-white font-bold text-lg">SMKN 13</h4>
                            <p class="text-orange-400 text-sm">Bandung</p>
                        </div>
                    </div>
                    <p class="text-slate-400 text-sm leading-relaxed">
                        <i class="fas fa-map-marker-alt text-orange-500 mr-2"></i>
                        Jl. Soekarno-Hatta KM.10<br>
                        <span class="ml-6">Bandung, Jawa Barat 40286</span>
                    </p>
                    <p class="text-slate-500 text-xs italic">
                        "Berdaya suai, Kompeten, dan Berahlak Mulia"
                    </p>
                </div>
                
                <!-- Quick Links -->
                <div class="fade-in-up" style="animation-delay: 0.1s;">
                    <h4 class="text-white font-bold mb-6 text-lg flex items-center">
                        <span class="w-1 h-6 bg-gradient-to-b from-orange-500 to-orange-600 rounded-full mr-3"></span>
                        Quick Links
                    </h4>
                    <ul class="space-y-3">
                        <li>
                            <a href="{{ route('home') }}" class="text-slate-400 hover:text-orange-400 transition-colors duration-300 flex items-center group text-sm">
                                <i class="fas fa-chevron-right text-orange-500 mr-2 text-xs transform group-hover:translate-x-1 transition-transform"></i>
                                Home
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('about') }}" class="text-slate-400 hover:text-orange-400 transition-colors duration-300 flex items-center group text-sm">
                                <i class="fas fa-chevron-right text-orange-500 mr-2 text-xs transform group-hover:translate-x-1 transition-transform"></i>
                                Tentang Kami
                            </a>
                        </li>
                        <li>
                            <a href="{{ route('services') }}" class="text-slate-400 hover:text-orange-400 transition-colors duration-300 flex items-center group text-sm">
                                <i class="fas fa-chevron-right text-orange-500 mr-2 text-xs transform group-hover:translate-x-1 transition-transform"></i>
                                Program Kami 
                            </a>
                        </li>
                    </ul>
                </div>
                
                <!-- Contact Info -->
                <div class="fade-in-up" style="animation-delay: 0.2s;">
                    <h4 class="text-white font-bold mb-6 text-lg flex items-center">
                        <span class="w-1 h-6 bg-gradient-to-b from-orange-500 to-orange-600 rounded-full mr-3"></span>
                        Hubungi Kami
                    </h4>
                    <ul class="space-y-4">
                        <li class="flex items-start space-x-3 group">
                            <div class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center group-hover:bg-orange-500 transition-colors duration-300 flex-shrink-0">
                                <i class="fas fa-phone text-orange-400 group-hover:text-white transition-colors"></i>
                            </div>
                            <div>
                                <p class="text-slate-500 text-xs">Telepon</p>
                                <a href="tel:0227318960" class="text-slate-300 hover:text-orange-400 transition-colors text-sm">(022) 7318960</a>
                            </div>
                        </li>
                        <li class="flex items-start space-x-3 group">
                            <div class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center group-hover:bg-orange-500 transition-colors duration-300 flex-shrink-0">
                                <i class="fas fa-envelope text-orange-400 group-hover:text-white transition-colors"></i>
                            </div>
                            <div>
                                <p class="text-slate-500 text-xs">Email</p>
                                <a href="mailto:info@smkn13bdg.sch.id" class="text-slate-300 hover:text-orange-400 transition-colors text-sm break-all">info@smkn13bdg.sch.id</a>
                            </div>
                        </li>
                        <li class="flex items-start space-x-3 group">
                            <div class="w-10 h-10 bg-slate-800 rounded-lg flex items-center justify-center group-hover:bg-orange-500 transition-colors duration-300 flex-shrink-0">
                                <i class="fas fa-clock text-orange-400 group-hover:text-white transition-colors"></i>
                            </div>
                            <div>
                                <p class="text-slate-500 text-xs">Jam Kerja</p>
                                <p class="text-slate-300 text-sm">Senin - Jumat<br>07:00 - 16:00 WIB</p>
                            </div>
                        </li>
                    </ul>
                </div>
                
                <!-- Social Media & Logo -->
                <div class="fade-in-up" style="animation-delay: 0.3s;">
                    <h4 class="text-white font-bold mb-6 text-lg flex items-center">
                        <span class="w-1 h-6 bg-gradient-to-b from-orange-500 to-orange-600 rounded-full mr-3"></span>
                        Ikuti Kami
                    </h4>
                    <div class="flex flex-wrap gap-3 mb-8">
                        <a href="#" class="w-12 h-12 bg-slate-800 rounded-xl flex items-center justify-center hover:bg-gradient-to-br hover:from-blue-600 hover:to-blue-700 transition-all duration-300 hover-lift group">
                            <i class="fab fa-facebook-f text-slate-400 group-hover:text-white transition-colors"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-slate-800 rounded-xl flex items-center justify-center hover:bg-gradient-to-br hover:from-sky-500 hover:to-sky-600 transition-all duration-300 hover-lift group">
                            <i class="fab fa-twitter text-slate-400 group-hover:text-white transition-colors"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-slate-800 rounded-xl flex items-center justify-center hover:bg-gradient-to-br hover:from-pink-600 hover:to-rose-600 transition-all duration-300 hover-lift group">
                            <i class="fab fa-instagram text-slate-400 group-hover:text-white transition-colors"></i>
                        </a>
                        <a href="#" class="w-12 h-12 bg-slate-800 rounded-xl flex items-center justify-center hover:bg-gradient-to-br hover:from-red-600 hover:to-red-700 transition-all duration-300 hover-lift group">
                            <i class="fab fa-youtube text-slate-400 group-hover:text-white transition-colors"></i>
                        </a>
                    </div>
                    
                    <!-- School Logo -->
                    <div class="flex items-center space-x-4">
                        <img src="{{ asset('images/logo2.png') }}" alt="Logo SMKN 13 Bandung" class="w-100 h-100 object-contain flex-shrink-0">
                    </div>
                </div>
                
            </div>
            
            <!-- Bottom Bar -->
            <div class="border-t border-slate-800/50 pt-8">
                <div class="flex flex-col md:flex-row justify-between items-center space-y-4 md:space-y-0">
                    <p class="text-slate-500 text-sm">
                        &copy; 2025 <span class="text-orange-400 font-semibold">SMKN 13 Bandung</span>. All rights reserved.
                    </p>
                    <div class="flex items-center space-x-6 text-sm">
                        <a href="#" class="text-slate-500 hover:text-orange-400 transition-colors duration-300">Privacy Policy</a>
                        <span class="text-slate-700">|</span>
                        <a href="#" class="text-slate-500 hover:text-orange-400 transition-colors duration-300">Terms of Service</a>
                        <span class="text-slate-700">|</span>
                        <a href="#" class="text-slate-500 hover:text-orange-400 transition-colors duration-300">Sitemap</a>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Back to Top Button -->
        <button onclick="window.scrollTo({top: 0, behavior: 'smooth'})" 
                class="fixed bottom-8 right-8 w-12 h-12 bg-gradient-to-br from-orange-500 to-orange-600 rounded-full flex items-center justify-center shadow-lg shadow-orange-500/30 hover:shadow-orange-500/50 transition-all duration-300 hover:scale-110 z-50 group">
            <i class="fas fa-arrow-up text-white group-hover:animate-bounce"></i>
        </button>
    </footer>

</body>
</html>