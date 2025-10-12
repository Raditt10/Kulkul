    <!-- Footer -->
    <footer class="bg-slate-950 py-12 relative">
        <div class="container mx-auto px-4">
            <div class="grid md:grid-cols-4 gap-8 text-slate-400">
                <div>
                    <h4 class="text-white font-bold mb-4">SMKN 13 Bandung</h4>
                    <p class="text-sm">
                        Jl. Soekarno-Hatta KM.10 <br>
                        Bandung, Jawa Barat 40286
                    </p>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-4">Links</h4>
                    <ul class="space-y-2 text-sm">
                        <li><a href="#" class="hover:text-orange-400">Home</a></li>
                        <li><a href="{{ route('about') }}" class="hover:text-orange-400">About Us</a></li>
                        <li><a href="{{ route('services') }}" class="hover:text-orange-400">Services</a></li>
                    </ul>
                </div>
                <div>
                    <h4 class="text-white font-bold mb-4">Contact</h4>
                    <ul class="space-y-2 text-sm">
                        <li><i class="fas fa-phone mr-2"></i> (022) 7318960</li>
                        <li><i class="fas fa-envelope mr-2"></i> info@smkn13bdg.sch.id</li>
                    </ul>
                </div>  
                <div>
                    <h4 class="text-white font-bold mb-4">Follow Us</h4>
                    <div class="flex space-x-4">
                        <a href="       " class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-orange-500 transition-colors duration-300">
                            <i class="fab fa-facebook-f text-white"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-orange-500 transition-colors duration-300">
                            <i class="fab fa-twitter text-white"></i>
                        </a>
                        <a href="#" class="w-10 h-10 bg-slate-800 rounded-full flex items-center justify-center hover:bg-orange-500 transition-colors duration-300">
                            <i class="fab fa-instagram text-white"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="border-t border-slate-800 mt-12 pt-8 text-center text-sm text-slate-500">
                <p>&copy; 2025 SMKN 13 Bandung. All rights reserved.</p>
            </div>
        </div>
    </footer>