<!-- Navigation Bar -->
<nav class="fixed w-full z-50 bg-slate-900/80 backdrop-blur border-b border-orange-500/20">
  <div class="container mx-auto px-6">
    <div class="flex items-center justify-between h-24">
      
      <!-- Kiri: Logo & Brand -->
      <div class="flex items-center space-x-8">
        <!-- Logo -->
        <div class="relative group">
          <div class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-2xl flex items-center justify-center animate-glow hover:scale-110 transition-all duration-300 shadow-xl">
            <img src="{{ asset('images/logo.png') }}" alt="Logo SMKN 13 Bandung" class="w-10 h-10 object-contain">
          </div>
          <div class="absolute inset-0 bg-gradient-to-br from-orange-400 to-red-500 rounded-2xl opacity-0 group-hover:opacity-20 transition-opacity duration-300"></div>
        </div>

        <!-- Brand Text dengan Typing Effect -->
        <div class="hidden md:block">
          <h1 class="text-2xl font-extrabold text-white">SMKN 13 Bandung</h1>
          <p class="text-sm text-orange-300 mt-1 h-6">
            <span id="typingText"></span>
            <span class="animate-pulse">|</span>
          </p>
        </div>
      </div>

      <!-- Tengah: Menu -->
      <div class="hidden md:flex items-center space-x-10">
        <a href="{{ route('home') }}" class="group flex items-center text-slate-300 hover:text-white font-medium transition-all duration-300">
          <i class="fas fa-home mr-2 text-orange-400 group-hover:animate-bounce"></i>
          <span class="relative">
            BERANDA
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-orange-400 transition-all duration-300 group-hover:w-full"></span>
          </span>
        </a>

        <a href="{{ route('about') }}" class="group flex items-center text-slate-300 hover:text-white font-medium transition-all duration-300">
          <i class="fas fa-info-circle mr-2 text-orange-400 group-hover:animate-pulse"></i>
          <span class="relative">
            TENTANG KAMI
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-orange-400 transition-all duration-300 group-hover:w-full"></span>
          </span>
        </a>

        <a href="{{ route('services') }}" class="group flex items-center text-slate-300 hover:text-white font-medium transition-all duration-300">
          <i class="fas fa-cogs mr-2 text-orange-400 group-hover:animate-spin"></i>
          <span class="relative">
            LAYANAN
            <span class="absolute -bottom-1 left-0 w-0 h-0.5 bg-orange-400 transition-all duration-300 group-hover:w-full"></span>
          </span>
        </a>
      </div>

      <!-- Kanan: User Profile -->
      <div class="flex items-center">
        <div class="bg-gradient-to-r from-orange-500 to-red-600 rounded-2xl p-1 shadow-xl">
          <div id="profileWrapper" class="bg-slate-900/90 rounded-2xl p-4 flex items-center space-x-4">
            
            <div class="w-12 h-12 bg-gradient-to-br from-orange-400 to-red-500 rounded-full overflow-hidden animate-pulse-slow shadow-lg flex items-center justify-center">
              <i class="fas fa-user text-white text-lg"></i>
            </div>

            <div class="hidden sm:block">
              @auth
                <div class="text-sm font-bold text-white">{{ session('user')->name }}</div>
                <div class="text-xs text-orange-300">NIS : {{ session('user')->nis }}</div>
              @endauth
              @guest
                <div class="text-sm font-bold text-white">Guest</div>
              @endguest
            </div>

            @auth
              <button id="sidebarToggle" class="text-slate-300 hover:text-white transition-transform duration-300 hover:rotate-90">
                <i class="fas fa-bars text-lg"></i>
              </button>
            @endauth

            @guest
              <a href="{{ route('login') }}" class="bg-gradient-to-r from-orange-500 to-red-600 text-white px-4 py-2 rounded-full font-medium hover:from-red-600 hover:to-orange-500 transition-all duration-300 shadow-lg">
                Login
              </a>
            @endguest
            
          </div>
        </div>
      </div>
    </div>
  </div>
</nav>
<script src="{{ asset('js/textEffect.js') }}"></script>
