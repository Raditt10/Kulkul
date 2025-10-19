<div id="comingSoonNotif" class="fixed top-20 right-1/2 transform -translate-x-1/2 z-50 w-full max-w-md px-4 animate-slideDown">
  	<div class="glass rounded-2xl p-6 shadow-2xl border border-orange-500/30 relative overflow-hidden">
		<!-- Animated Background -->
		<div class="absolute inset-0 bg-gradient-to-r from-orange-500/10 via-rose-500/10 to-orange-500/10 animate-pulse"></div>
      
		<!-- Content -->
		<div class="relative flex items-start gap-4">
			<div class="flex-shrink-0">
				<div class="w-12 h-12 bg-gradient-to-br from-orange-500 to-rose-600 rounded-full flex items-center justify-center animate-float">
					<i class="fas fa-tools text-white text-xl"></i>
				</div>
			</div>
        
			<div class="flex-1">
				<h3 class="text-lg font-bold text-white mb-1 flex items-center gap-2">
					Dalam Pengembangan
					<span class="inline-block w-2 h-2 bg-orange-400 rounded-full animate-pulse"></span>
				</h3>
				<p class="text-slate-300 text-sm leading-relaxed">
					Fitur ini masih dalam tahap pengembangan. Kami sedang bekerja keras untuk menghadirkan pengalaman terbaik untuk Anda!
				</p>
			
				<!-- Progress Bar -->
				<div class="mt-4 bg-slate-800/50 rounded-full h-2 overflow-hidden">
					<div class="h-full bg-gradient-to-r from-orange-500 to-rose-500 rounded-full animate-pulse" style="width: 65%"></div>
				</div>
				<p class="text-xs text-slate-400 mt-2">Progress: 65%</p>
			</div>
		</div>
	</div>
</div>

<div id="comingSoonModal" class="fixed inset-0 bg-black/70 flex backdrop-blur-sm hidden justify-center items-center z-50">
    <div class="glass-effect border border-orange-500/30 rounded-3xl p-6 text-center shadow-2xl max-w-sm animate-slide-up">
        <div class="text-5xl mb-3 animate-bounce-slow">🚧</div>
        <h2 class="text-2xl font-bold text-white mb-2">Coming Soon!</h2>
        <p class="text-slate-400 mb-4">Fitur ini sedang dalam pengembangan.</p>
        <button onclick="toggleComingSoon(false)" 
            class="bg-gradient-to-r from-orange-500 to-red-600 text-white font-bold px-6 py-2 rounded-xl hover:from-orange-400 hover:to-red-500 transition">
            Oke
        </button>
    </div>
</div>