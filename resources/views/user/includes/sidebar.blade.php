 <!-- Sidebar -->
  <div id="sidebar" class="fixed top-0 right-0 w-80 h-full overflow-y-auto backdrop-blur-xl text-white transform translate-x-full transition-transform duration-500 ease-in-out z-50 shadow-2xl border-l border-orange-500/20 bg-slate-900/95 flex flex-col">
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
                    @auth
                    <p class="font-bold text-white text-base">{{session('user')->name}}</p>
                    <p class="text-sm text-orange-300">NIS: {{session('user')->nis}}</p>
                    <p class="text-xs text-slate-400">Siswa Aktif</p>
                    @else
                    <p class="font-bold text-white text-base">guest</p>
                    <p class="text-sm text-orange-300">NIS: xxxxx</p>
                    <p class="text-xs text-slate-400">Belum login</p>
                    @endauth
                </div>
            </div>
        </div>

      <!-- Menu Items -->
        <ul class="px-6 py-6 space-y-3">
            <li>
                <a href="{{ route('home') }}" 
                @php 
                    if($page == 'home') {echo 'class="flex items-center space-x-4 text-white bg-orange-600/30 transition-all duration-300 hover-lift p-3 rounded-xl border border-orange-400/30"';}
                    else {echo 'class="flex items-center space-x-4 text-slate-300 hover:text-white hover:bg-orange-600/20 transition-all duration-300 hover-lift p-3 rounded-xl"';}
                @endphp
                >
                    <i class="fas fa-home text-orange-400 w-5"></i>
                    <span class="font-medium">Beranda</span>
                </a>
            </li>
            <li>
                <a href="{{ route('about') }}"
                @php 
                    if($page == 'about') {echo 'class="flex items-center space-x-4 text-white bg-orange-600/30 transition-all duration-300 hover-lift p-3 rounded-xl border border-orange-400/30"';}
                    else {echo 'class="flex items-center space-x-4 text-slate-300 hover:text-white hover:bg-orange-600/20 transition-all duration-300 hover-lift p-3 rounded-xl"';}
                @endphp
                >
                    <i class="fas fa-info-circle text-orange-400 w-5"></i>
                    <span class="font-medium">Tentang Kami</span>
                </a>
            </li>
            <li>
                <a href="{{ route('services') }}"
                @php 
                    if($page == 'services') {echo 'class="flex items-center space-x-4 text-white bg-orange-600/30 transition-all duration-300 hover-lift p-3 rounded-xl border border-orange-400/30"';}
                    else {echo 'class="flex items-center space-x-4 text-slate-300 hover:text-white hover:bg-orange-600/20 transition-all duration-300 hover-lift p-3 rounded-xl"';}
                @endphp
                >
                    <i class="fas fa-cogs text-orange-400 w-5"></i>
                    <span class="font-medium">Layanan</span>
                </a>
            </li>
            <li>
                <a href="{{ route('ekstrakurikuler') }}"
                @php 
                    if($page == 'eskul') {echo 'class="flex items-center space-x-4 text-white bg-orange-600/30 transition-all duration-300 hover-lift p-3 rounded-xl border border-orange-400/30"';}
                    else {echo 'class="flex items-center space-x-4 text-slate-300 hover:text-white hover:bg-orange-600/20 transition-all duration-300 hover-lift p-3 rounded-xl"';}
                @endphp
                >
                    <i class="fas fa-code text-orange-400 w-5"></i>
                    <span class="font-medium">Daftar Esktrakurikuler</span>
                </a>
            </li>
            @auth
            <li>
                <a href="{{ route('profile') }}"
                @php 
                    if($page == 'profile') {echo 'class="flex items-center space-x-4 text-white bg-orange-600/30 transition-all duration-300 hover-lift p-3 rounded-xl border border-orange-400/30"';}
                    else {echo 'class="flex items-center space-x-4 text-slate-300 hover:text-white hover:bg-orange-600/20 transition-all duration-300 hover-lift p-3 rounded-xl"';}
                @endphp
                >
                    <i class="fas fa-user-graduate text-orange-400 w-5"></i>
                    <span class="font-medium">Profil Saya</span>
                </a>
            </li>
            <li>
                <a href="{{ route('friends') }}"
                @php 
                    if($page == 'friends') {echo 'class="flex items-center space-x-4 text-white bg-orange-600/30 transition-all duration-300 hover-lift p-3 rounded-xl border border-orange-400/30"';}
                    else {echo 'class="flex items-center space-x-4 text-slate-300 hover:text-white hover:bg-orange-600/20 transition-all duration-300 hover-lift p-3 rounded-xl"';}
                @endphp
                >
                    <i class="fas fa-users text-orange-400 w-5"></i>
                    <span class="font-medium">Teman Saya</span>
                </a>
            </li>
            @endauth
            <li>
                <a href="{{ route('settings') }}"
                @php 
                    if($page == 'settings') {echo 'class="flex items-center space-x-4 text-white bg-orange-600/30 transition-all duration-300 hover-lift p-3 rounded-xl border border-orange-400/30"';}
                    else {echo 'class="flex items-center space-x-4 text-slate-300 hover:text-white hover:bg-orange-600/20 transition-all duration-300 hover-lift p-3 rounded-xl"';}
                @endphp
                >
                    <i class="fas fa-cog text-orange-400 w-5"></i>
                    <span class="font-medium">Pengaturan</span>
                </a>
            </li>
            @guest
            <li>
                <a href="{{ route('login') }}"
                @php 
                    if($page == 'login') {echo 'class="flex items-center space-x-4 text-white bg-orange-600/30 transition-all duration-300 hover-lift p-3 rounded-xl border border-orange-400/30"';}
                    else {echo 'class="flex items-center space-x-4 text-slate-300 hover:text-white hover:bg-orange-600/20 transition-all duration-300 hover-lift p-3 rounded-xl"';}
                @endphp
                >
                    <i class="fas fa-sign-in-alt text-orange-400 w-5"></i>
                    <span class="font-medium">Masuk</span>
                </a>
            </li>
            @endguest
            @auth
            <li class="pt-4 border-t border-orange-500/20">
                <form action="{{ route('logout') }}" method="POST" class="m-0 p-0">
                    @csrf
                    <button type="submit" 
                        class="flex items-center space-x-4 text-red-300 hover:text-red-200 hover:bg-red-600/20 transition-all duration-300 hover-lift p-3 rounded-xl w-full text-left">
                        <i class="fas fa-sign-out-alt text-red-400 w-5"></i>
                        <span class="font-medium">Keluar</span>
                    </button>
                </form>
            </li>
            @endauth
        </ul>
    </div>

    