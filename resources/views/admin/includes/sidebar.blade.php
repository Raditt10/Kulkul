  <!-- Sidebar -->
    <aside id="sidebar" class="fixed left-0 top-0 h-screen w-64 bg-gradient-to-b from-slate-900 to-slate-950 border-r border-orange-500/20 z-50 transition-transform duration-300 sidebar-scroll overflow-y-auto">
        <!-- Logo Header -->
        <div class="p-6 border-b border-orange-500/20">
            <div class="flex items-center space-x-3">
                <div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                   <img src="{{ asset('images/logo.png') }}" alt="Logo SMKN 13 Bandung" class="w-10 h-10 object-contain">
                </div>
                <div>
                    <h1 class="text-white font-bold text-lg">Kulkul Admin</h1>
                    <p class="text-slate-400 text-xs">SMKN 13 Bandung</p>
                </div>
            </div>
        </div>

        <!-- Navigation Menu -->
        <nav class="p-4 space-y-2">
            <!-- Dashboard -->
            <a href="{{ route('admin.dashboard') }}" class="
            @php if($page == "dashboard") echo ("flex items-center space-x-3 px-4 py-3 rounded-xl bg-gradient-to-r from-orange-500/20 to-red-500/20 text-orange-400 border border-orange-500/30 transition-all duration-300"); 
            else echo ("flex items-center space-x-3 px-4 py-3 rounded-xl  text-slate-400 hover:text-white hover:bg-slate-800/50 transition-all duration-300"); @endphp">
                <i class="fas fa-home text-lg"></i>
                <span class="font-semibold">Dashboard</span>
            </a>

            <!-- Ekstrakurikuler -->
            <a href="{{ route('admin.ekstrakurikuler') }}" class="
            @php if($page == "eskul") echo ("flex items-center space-x-3 px-4 py-3 rounded-xl bg-gradient-to-r from-orange-500/20 to-red-500/20 text-orange-400 border border-orange-500/30 transition-all duration-300"); 
            else echo ("flex items-center space-x-3 px-4 py-3 rounded-xl  text-slate-400 hover:text-white hover:bg-slate-800/50 transition-all duration-300"); @endphp">
                <i class="fas fa-users text-lg"></i>
                <span class="font-medium">Ekstrakurikuler</span>
            </a>

            <!-- Siswa -->
            <a href="{{ route('admin.siswa') }}" class="
            @php if($page == "siswa") echo ("flex items-center space-x-3 px-4 py-3 rounded-xl bg-gradient-to-r from-orange-500/20 to-red-500/20 text-orange-400 border border-orange-500/30 transition-all duration-300"); 
            else echo ("flex items-center space-x-3 px-4 py-3 rounded-xl  text-slate-400 hover:text-white hover:bg-slate-800/50 transition-all duration-300"); @endphp">
                <i class="fas fa-user-graduate text-lg"></i>
                <span class="font-medium">Siswa</span>
            </a>

            <!-- Pembina -->
            <a href="{{ route('admin.pembina') }}" class="
            @php if($page == "pembina") echo ("flex items-center space-x-3 px-4 py-3 rounded-xl bg-gradient-to-r from-orange-500/20 to-red-500/20 text-orange-400 border border-orange-500/30 transition-all duration-300"); 
            else echo ("flex items-center space-x-3 px-4 py-3 rounded-xl  text-slate-400 hover:text-white hover:bg-slate-800/50 transition-all duration-300"); @endphp">
                <i class="fas fa-chalkboard-teacher text-lg"></i>
                <span class="font-medium">Pembina</span>
            </a>

            <!-- Jadwal -->
            <a href="{{ route('admin.jadwal') }}" class="
            @php if($page == "jadwal") echo ("flex items-center space-x-3 px-4 py-3 rounded-xl bg-gradient-to-r from-orange-500/20 to-red-500/20 text-orange-400 border border-orange-500/30 transition-all duration-300"); 
            else echo ("flex items-center space-x-3 px-4 py-3 rounded-xl  text-slate-400 hover:text-white hover:bg-slate-800/50 transition-all duration-300"); @endphp">
                <i class="fas fa-calendar-alt text-lg"></i>
                <span class="font-medium">Jadwal</span>
            </a>

            <!-- Prestasi -->
            <a href="{{ route('admin.prestasi') }}" class="
            @php if($page == "prestasi") echo ("flex items-center space-x-3 px-4 py-3 rounded-xl bg-gradient-to-r from-orange-500/20 to-red-500/20 text-orange-400 border border-orange-500/30 transition-all duration-300"); 
            else echo ("flex items-center space-x-3 px-4 py-3 rounded-xl  text-slate-400 hover:text-white hover:bg-slate-800/50 transition-all duration-300"); @endphp">
                <i class="fas fa-trophy text-lg"></i>
                <span class="font-medium">Prestasi</span>
            </a>

            <!-- Laporan -->
            <a href="{{ route('admin.laporan') }}" class="
            @php if($page == "laporan") echo ("flex items-center space-x-3 px-4 py-3 rounded-xl bg-gradient-to-r from-orange-500/20 to-red-500/20 text-orange-400 border border-orange-500/30 transition-all duration-300"); 
            else echo ("flex items-center space-x-3 px-4 py-3 rounded-xl  text-slate-400 hover:text-white hover:bg-slate-800/50 transition-all duration-300"); @endphp">
                <i class="fas fa-file-alt text-lg"></i>
                <span class="font-medium">Laporan</span>
            </a>

            <a href="{{ route('admin.form') }}" class="
            @php if($page == "form") echo ("flex items-center space-x-3 px-4 py-3 rounded-xl bg-gradient-to-r from-orange-500/20 to-red-500/20 text-orange-400 border border-orange-500/30 transition-all duration-300"); 
            else echo ("flex items-center space-x-3 px-4 py-3 rounded-xl  text-slate-400 hover:text-white hover:bg-slate-800/50 transition-all duration-300"); @endphp"> 
                <i class="fas fa-file-alt text-lg"></i>
                <span class="font-medium">Data Formulir Pendaftaran</span>
            </a>    
            <!-- Divider -->
            <div class="my-4 border-t border-slate-800"></div>

            <!-- Pengaturan -->
            <a href="{{ route('admin.settings') }}" class="
            @php if($page == "settings") echo ("flex items-center space-x-3 px-4 py-3 rounded-xl bg-gradient-to-r from-orange-500/20 to-red-500/20 text-orange-400 border border-orange-500/30 transition-all duration-300"); 
            else echo ("flex items-center space-x-3 px-4 py-3 rounded-xl  text-slate-400 hover:text-white hover:bg-slate-800/50 transition-all duration-300"); @endphp">
                <i class="fas fa-cog text-lg"></i>
                <span class="font-medium">Pengaturan</span>
            </a>

            <!-- Logout -->
            <a href="#" class="flex items-center space-x-3 px-4 py-3 rounded-xl text-red-400 hover:text-red-300 hover:bg-red-500/10 transition-all duration-300">
                <i class="fas fa-sign-out-alt text-lg"></i>
                <span class="font-medium">Logout</span>
            </a>
        </nav>
    </aside>