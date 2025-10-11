 // Data Ekstrakurikuler
    const eskulData = [{
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
