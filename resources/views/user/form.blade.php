<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Formulir Pendaftaran Ekstrakurikuler</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        slate: { 850: '#1a2234' }
                    },
                    animation: {
                        'slide-up': 'slideUp 0.5s ease-out',
                        'fade-in': 'fadeIn 0.5s ease-out',
                    }
                }
            }
        }
    </script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        @keyframes slideUp {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .card-hover {
            transition: all 0.3s ease;
        }
        .card-hover:hover {
            transform: translateY(-5px);
        }
        .step-circle {
            transition: all 0.3s ease;
        }
        .step-active {
            background: linear-gradient(135deg, #f97316, #dc2626);
        }
        .step-completed {
            background: linear-gradient(135deg, #10b981, #059669);
        }
    </style>
</head>
<body class="bg-slate-950 min-h-screen">

    <!-- Main Content -->
    <div class="max-w-5xl mx-auto px-6 py-12">
        
        <!-- Header -->
        <div class="text-center mb-12 animate-fade-in">
            <h1 class="text-5xl font-bold text-white mb-4">
                Daftar <span class="bg-gradient-to-r from-orange-500 to-red-600 bg-clip-text text-transparent">Ekstrakurikuler</span>
            </h1>
            <p class="text-slate-400 text-lg">Pilih dan daftar ekstrakurikuler sesuai minat dan bakatmu!</p>
        </div>

        <!-- Progress Steps -->
        <div class="mb-12">
            <div class="flex items-center justify-center">
                <div class="flex items-center space-x-4">
                    <!-- Step 1 -->
                    <div class="flex flex-col items-center">
                        <div id="step1Circle" class="step-circle step-active w-12 h-12 rounded-full flex items-center justify-center text-white font-bold mb-2">
                            1
                        </div>
                        <span id="step1Text" class="text-orange-400 text-sm font-semibold">Pilih Eskul</span>
                    </div>
                    <div class="w-24 h-1 bg-slate-800">
                        <div id="progress1" class="h-full bg-gradient-to-r from-orange-500 to-red-600 transition-all duration-500" style="width: 0%"></div>
                    </div>
                    
                    <!-- Step 2 -->
                    <div class="flex flex-col items-center">
                        <div id="step2Circle" class="step-circle w-12 h-12 bg-slate-800 rounded-full flex items-center justify-center text-slate-400 font-bold mb-2">
                            2
                        </div>
                        <span id="step2Text" class="text-slate-400 text-sm font-semibold">Data Diri</span>
                    </div>
                    <div class="w-24 h-1 bg-slate-800">
                        <div id="progress2" class="h-full bg-gradient-to-r from-orange-500 to-red-600 transition-all duration-500" style="width: 0%"></div>
                    </div>
                    
                    <!-- Step 3 -->
                    <div class="flex flex-col items-center">
                        <div id="step3Circle" class="step-circle w-12 h-12 bg-slate-800 rounded-full flex items-center justify-center text-slate-400 font-bold mb-2">
                            3
                        </div>
                        <span id="step3Text" class="text-slate-400 text-sm font-semibold">Konfirmasi</span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Form Container -->
        <div class="bg-slate-900/50 backdrop-blur-xl rounded-3xl border border-slate-800 overflow-hidden">
            
            <!-- Step 1: Pilih Ekstrakurikuler -->
            <div id="step1" class="p-8">
                <h2 class="text-2xl font-bold text-white mb-6">Pilih Ekstrakurikuler</h2>
                <p class="text-slate-400 mb-8">Pilih salah satu ekstrakurikuler yang ingin kamu ikuti</p>
                
                <div class="grid md:grid-cols-2 gap-6">
                    <!-- Eskul Card 1 -->
                    <div onclick="selectEskul('basket')" class="eskul-card card-hover cursor-pointer bg-gradient-to-br from-orange-500/10 to-red-500/10 border-2 border-slate-700 hover:border-orange-500 rounded-2xl p-6 transition-all">
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                                <i class="fas fa-basketball-ball text-white text-2xl"></i>
                            </div>
                            <div class="w-6 h-6 rounded-full border-2 border-slate-600 eskul-check hidden">
                                <i class="fas fa-check text-orange-500 text-xs"></i>
                            </div>
                        </div>
                        <h3 class="text-xl font-bold text-white mb-2">Basket</h3>
                        <p class="text-slate-400 text-sm mb-4">Latihan setiap Senin & Rabu, 15:00 - 17:00</p>
                        <div class="flex items-center justify-between text-xs">
                            <span class="text-slate-500"><i class="fas fa-users mr-1"></i>24 anggota</span>
                            <span class="px-3 py-1 bg-green-500/20 text-green-400 rounded-full">Tersedia</span>
                        </div>
                    </div>
                    @foreach($data_ekskul as $ekskul)

                    <div onclick="selectEskul('{{ $ekskul->nama }}')" 
                        class="eskul-card card-hover cursor-pointer bg-gradient-to-br from-orange-500/10 to-red-500/10 border-2 border-slate-700 hover:border-orange-500 rounded-2xl p-6 transition-all">
                        
                        <div class="flex items-start justify-between mb-4">
                            <div class="w-14 h-14 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                                <i class="{{ $ekskul->icon ?? 'fas fa-star' }} text-white text-2xl"></i>
                            </div>
                            <div class="w-10 h-10 rounded-full border-2 border-slate-600 eskul-check hidden">
                                <i class="fas fa-check text-orange-500 text-xs"></i>
                            </div>
                        </div>

                        <h3 class="text-xl font-bold text-white mb-2">{{ $ekskul->nama_ekskul }}</h3>
                        <p class="text-slate-400 text-sm mb-4">
                            Latihan setiap {{ $ekskul->hari }}, {{ $ekskul->jam_mulai }} - {{ $ekskul->jam_selesai }}
                        </p>

                        <div class="flex items-center justify-between text-xs">
                            <span class="text-slate-500">
                                <i class="fas fa-users mr-1"></i>{{ $ekskul->anggota}} anggota
                            </span>
                            <span class="px-3 py-1 rounded-full
                                {{'bg-green-500/20 text-green-400'}}">
                                {{ ucfirst($ekskul->status ?? 'tersedia') }}
                            </span>
                        </div>
                    </div>
                @endforeach
            </div>


                <div class="mt-8 flex justify-end">
                    <button onclick="nextStep(2)" id="btnNext1" disabled class="px-8 py-3 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-xl font-semibold hover:from-orange-400 hover:to-red-500 transition-all duration-300 disabled:opacity-50 disabled:cursor-not-allowed">
                        Lanjutkan <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>

            <!-- Step 2: Data Diri -->
            <div id="step2" class="p-8 hidden">
                <h2 class="text-2xl font-bold text-white mb-6">Lengkapi Data Diri</h2>
                <p class="text-slate-400 mb-8">Isi data diri kamu dengan lengkap dan benar</p>
                
                <form id="formData" class="space-y-6">
                    <div class="grid md:grid-cols-2 gap-6">
                        <!-- Nama Lengkap -->
                        <div>
                            <label class="text-slate-400 text-sm mb-2 block">Nama Lengkap <span class="text-red-500">*</span></label>
                            <input type="text" id="nama" required class="w-full bg-slate-800/50 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-orange-500 transition-colors">
                        </div>

                        <!-- NIS -->
                        <div>
                            <label class="text-slate-400 text-sm mb-2 block">NIS <span class="text-red-500">*</span></label>
                            <input type="text" id="nis" required class="w-full bg-slate-800/50 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-orange-500 transition-colors">
                        </div>

                        <!-- Kelas -->
                        <div>
                            <label class="text-slate-400 text-sm mb-2 block">Kelas <span class="text-red-500">*</span></label>
                            <select id="kelas" required class="w-full bg-slate-800/50 border border-slate-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-orange-500 transition-colors">
                                <option value="">Pilih Kelas</option>
                                <option value="X RPL 1">X RPL 1</option>
                                <option value="X RPL 2">X RPL 2</option>
                                <option value="X TKJ 1">X TKJ 1</option>
                                <option value="X TKJ 2">X TKJ 2</option>
                                <option value="X MM 1">X MM 1</option>
                                <option value="X MM 2">X MM 2</option>
                                <option value="XI RPL 1">XI RPL 1</option>
                                <option value="XI RPL 2">XI RPL 2</option>
                                <option value="XI TKJ 1">XI TKJ 1</option>
                                <option value="XI TKJ 2">XI TKJ 2</option>
                                <option value="XII RPL 1">XII RPL 1</option>
                                <option value="XII RPL 2">XII RPL 2</option>
                            </select>
                        </div>

                        <!-- No. Telepon -->
                        <div>
                            <label class="text-slate-400 text-sm mb-2 block">No. Telepon/WhatsApp <span class="text-red-500">*</span></label>
                            <input type="tel" id="phone" required class="w-full bg-slate-800/50 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-orange-500 transition-colors" placeholder="08xxxxxxxxxx">
                        </div>

                        <!-- Email -->
                        <div>
                            <label class="text-slate-400 text-sm mb-2 block">Email</label>
                            <input type="email" id="email" class="w-full bg-slate-800/50 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-orange-500 transition-colors" placeholder="email@example.com">
                        </div>

                        <!-- Jenis Kelamin -->
                        <div>
                            <label class="text-slate-400 text-sm mb-2 block">Jenis Kelamin <span class="text-red-500">*</span></label>
                            <select id="gender" required class="w-full bg-slate-800/50 border border-slate-700 rounded-xl px-4 py-3 text-white focus:outline-none focus:border-orange-500 transition-colors">
                                <option value="">Pilih</option>
                                <option value="L">Laki-laki</option>
                                <option value="P">Perempuan</option>
                            </select>
                        </div>
                    </div>

                    <!-- Alasan Mendaftar -->
                    <div>
                        <label class="text-slate-400 text-sm mb-2 block">Alasan Mendaftar <span class="text-red-500">*</span></label>
                        <textarea id="reason" required rows="4" class="w-full bg-slate-800/50 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-orange-500 transition-colors resize-none" placeholder="Ceritakan alasan kamu ingin bergabung dengan ekstrakurikuler ini..."></textarea>
                    </div>

                    <!-- Pengalaman -->
                    <div>
                        <label class="text-slate-400 text-sm mb-2 block">Pengalaman Terkait (Opsional)</label>
                        <textarea id="experience" rows="3" class="w-full bg-slate-800/50 border border-slate-700 rounded-xl px-4 py-3 text-white placeholder-slate-500 focus:outline-none focus:border-orange-500 transition-colors resize-none" placeholder="Ceritakan pengalaman kamu yang relevan dengan ekstrakurikuler ini..."></textarea>
                    </div>
                </form>

                <div class="mt-8 flex justify-between">
                    <button onclick="prevStep(1)" class="px-8 py-3 bg-slate-800 text-white rounded-xl font-semibold hover:bg-slate-700 transition-all duration-300">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </button>
                    <button onclick="nextStep(3)" class="px-8 py-3 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-xl font-semibold hover:from-orange-400 hover:to-red-500 transition-all duration-300">
                        Lanjutkan <i class="fas fa-arrow-right ml-2"></i>
                    </button>
                </div>
            </div>

            <!-- Step 3: Konfirmasi -->
            <div id="step3" class="p-8 hidden">
                <h2 class="text-2xl font-bold text-white mb-6">Konfirmasi Pendaftaran</h2>
                <p class="text-slate-400 mb-8">Pastikan semua data yang kamu masukkan sudah benar</p>
                
                <div class="bg-slate-800/30 rounded-2xl p-6 mb-6">
                    <div class="flex items-center space-x-4 mb-6 pb-6 border-b border-slate-700">
                        <div id="confirmEskulIcon" class="w-16 h-16 bg-gradient-to-br from-orange-500 to-red-600 rounded-xl flex items-center justify-center">
                            <i class="fas fa-basketball-ball text-white text-2xl"></i>
                        </div>
                        <div>
                            <h3 id="confirmEskulName" class="text-xl font-bold text-white">Basket</h3>
                            <p id="confirmEskulSchedule" class="text-slate-400 text-sm">Latihan setiap Senin & Rabu, 15:00 - 17:00</p>
                        </div>
                    </div>

                    <div class="grid md:grid-cols-2 gap-6">
                        <div>
                            <p class="text-slate-500 text-sm mb-1">Nama Lengkap</p>
                            <p id="confirmNama" class="text-white font-semibold">-</p>
                        </div>
                        <div>
                            <p class="text-slate-500 text-sm mb-1">NIS</p>
                            <p id="confirmNis" class="text-white font-semibold">-</p>
                        </div>
                        <div>
                            <p class="text-slate-500 text-sm mb-1">Kelas</p>
                            <p id="confirmKelas" class="text-white font-semibold">-</p>
                        </div>
                        <div>
                            <p class="text-slate-500 text-sm mb-1">No. Telepon</p>
                            <p id="confirmPhone" class="text-white font-semibold">-</p>
                        </div>
                        <div>
                            <p class="text-slate-500 text-sm mb-1">Email</p>
                            <p id="confirmEmail" class="text-white font-semibold">-</p>
                        </div>
                        <div>
                            <p class="text-slate-500 text-sm mb-1">Jenis Kelamin</p>
                            <p id="confirmGender" class="text-white font-semibold">-</p>
                        </div>
                    </div>

                    <div class="mt-6 pt-6 border-t border-slate-700">
                        <p class="text-slate-500 text-sm mb-2">Alasan Mendaftar</p>
                        <p id="confirmReason" class="text-white">-</p>
                    </div>

                    <div id="confirmExperienceSection" class="mt-4 hidden">
                        <p class="text-slate-500 text-sm mb-2">Pengalaman Terkait</p>
                        <p id="confirmExperience" class="text-white">-</p>
                    </div>
                </div>

                <div class="bg-blue-500/10 border border-blue-500/20 rounded-xl p-4 mb-6">
                    <div class="flex items-start space-x-3">
                        <i class="fas fa-info-circle text-blue-400 text-xl mt-1"></i>
                        <div>
                            <p class="text-blue-400 font-semibold mb-1">Informasi Penting</p>
                            <p class="text-slate-300 text-sm">Pendaftaran kamu akan diproses oleh admin. Kamu akan menerima notifikasi melalui WhatsApp setelah pendaftaran disetujui atau ditolak.</p>
                        </div>
                    </div>
                </div>

                <div class="mt-8 flex justify-between">
                    <button onclick="prevStep(2)" class="px-8 py-3 bg-slate-800 text-white rounded-xl font-semibold hover:bg-slate-700 transition-all duration-300">
                        <i class="fas fa-arrow-left mr-2"></i>Kembali
                    </button>
                    <button onclick="submitForm()" class="px-8 py-3 bg-gradient-to-r from-green-500 to-emerald-600 text-white rounded-xl font-semibold hover:from-green-400 hover:to-emerald-500 transition-all duration-300">
                        <i class="fas fa-check mr-2"></i>Kirim Pendaftaran
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!-- Success Modal -->
    <div id="successModal" class="fixed inset-0 bg-black/70 backdrop-blur-sm items-center justify-center z-50 hidden">
        <div class="bg-slate-900 rounded-3xl border border-green-500/30 max-w-md w-full mx-4 p-8 text-center animate-slide-up">
            <div class="w-20 h-20 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center mx-auto mb-6">
                <i class="fas fa-check text-white text-3xl"></i>
            </div>
            <h2 class="text-2xl font-bold text-white mb-3">Pendaftaran Berhasil!</h2>
            <p class="text-slate-400 mb-6">Pendaftaran ekstrakurikuler kamu telah berhasil dikirim. Admin akan memproses pendaftaran kamu dalam 1-2 hari kerja.</p>
            <button onclick="window.location.href = '{{ route('ekstrakurikuler') }}';" class="w-full px-6 py-3 bg-gradient-to-r from-orange-500 to-red-600 text-white rounded-xl font-semibold hover:from-orange-400 hover:to-red-500 transition-all duration-300">
                Kembali
            </button>
        </div>
    </div>

    <script src="{{ asset('js/sidebar.js') }}"></script>
    <script src="{{ asset('js/form.js') }}"></script>
    <script>
    const formUrl = "{{ route('form') }}";
    </script>
</body>
</html>