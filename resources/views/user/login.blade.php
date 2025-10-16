<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login - Kulkul SMKN 13 BANDUNG</title>
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
                        'slide-left': 'slideLeft 1s ease-out',
                        'slide-right': 'slideRight 1s ease-out',
                        'pulse-slow': 'pulse 4s infinite',
                        'bounce-slow': 'bounce 3s infinite',
                        'spin-slow': 'spin 8s linear infinite',
                        'wiggle': 'wiggle 1s ease-in-out infinite',
                    },
                    keyframes: {
                        float: {
                            '0%, 100%': { transform: 'translateY(0px)' },
                            '50%': { transform: 'translateY(-20px)' }
                        },
                        glow: {
                            '0%': { boxShadow: '0 0 20px rgba(251, 146, 60, 0.4)' },
                            '100%': { boxShadow: '0 0 40px rgba(251, 146, 60, 0.8), 0 0 60px rgba(234, 88, 12, 0.3)' }
                        },
                        slideUp: {
                            '0%': { transform: 'translateY(100px)', opacity: '0' },
                            '100%': { transform: 'translateY(0)', opacity: '1' }
                        },
                        slideLeft: {
                            '0%': { transform: 'translateX(-100px)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' }
                        },
                        slideRight: {
                            '0%': { transform: 'translateX(100px)', opacity: '0' },
                            '100%': { transform: 'translateX(0)', opacity: '1' }
                        },
                        wiggle: {
                            '0%, 100%': { transform: 'rotate(-3deg)' },
                            '50%': { transform: 'rotate(3deg)' }
                        }
                    }
                }
            }
        }
    </script>
    <style>
        .hover-lift {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .hover-lift:hover {
            transform: translateY(-5px);
        }
        .glass-effect {
            backdrop-filter: blur(20px);
            background: rgba(30, 41, 59, 0.8);
        }
        .input-focus {
            transition: all 0.3s ease;
        }
        .input-focus:focus {
            transform: scale(1.01);
            box-shadow: 0 0 20px rgba(251, 146, 60, 0.3);
        }
        .particle {
            position: absolute;
            border-radius: 50%;
            pointer-events: none;
        }
        @keyframes particle-float {
            0% {
                transform: translateY(0) translateX(0) scale(1);
                opacity: 0;
            }
            10% {
                opacity: 1;
            }
            90% {
                opacity: 1;
            }
            100% {
                transform: translateY(-100vh) translateX(50px) scale(0.5);
                opacity: 0;
            }
        }
        .shake {
            animation: shake 0.5s;
        }
        @keyframes shake {
            0%, 100% { transform: translateX(0); }
            25% { transform: translateX(-10px); }
            75% { transform: translateX(10px); }
        }
        .success-pulse {
            animation: success-pulse 0.6s;
        }
        @keyframes success-pulse {
            0% { transform: scale(1); }
            50% { transform: scale(1.05); }
            100% { transform: scale(1); }
        }
        .ripple {
            position: absolute;
            border-radius: 50%;
            background: rgba(251, 146, 60, 0.5);
            transform: scale(0);
            animation: ripple-effect 0.6s ease-out;
            pointer-events: none;
        }
        @keyframes ripple-effect {
            to {
                transform: scale(4);
                opacity: 0;
            }
        }
        .error-message {
            animation: slideUp 0.3s ease-out;
        }
    </style>
</head>
<body class="bg-slate-950 min-h-screen flex items-center justify-center overflow-hidden relative">
    <!-- Animated Background -->
    <div class="absolute inset-0 overflow-hidden">
        <div class="absolute inset-0 bg-gradient-to-br from-slate-900 via-slate-800 to-slate-900"></div>
        <div class="absolute inset-0 bg-gradient-to-r from-orange-600/5 via-red-600/5 to-orange-600/5 animate-pulse-slow"></div>
        
        <!-- Animated Circles Background -->
        <div class="absolute top-0 left-0 w-96 h-96 bg-orange-500/10 rounded-full blur-3xl animate-float"></div>
        <div class="absolute bottom-0 right-0 w-96 h-96 bg-red-500/10 rounded-full blur-3xl animate-float" style="animation-delay: 2s"></div>
        <div class="absolute top-1/2 left-1/2 w-64 h-64 bg-orange-400/5 rounded-full blur-3xl animate-spin-slow"></div>
        
        <!-- Floating Particles -->
        <div id="particleContainer"></div>
    </div>

    <div class="container mx-auto px-4 relative z-10">
        <div class="max-w-md mx-auto">
            <div class="animate-slide-up">
                <div class="relative group hover-lift">
                    <div class="absolute -inset-1 bg-gradient-to-r from-orange-500 via-red-500 to-orange-600 rounded-3xl blur opacity-30 group-hover:opacity-50 transition duration-1000 animate-glow"></div>
                    <div id="loginCard" class="relative glass-effect rounded-3xl p-6 border border-orange-500/20 shadow-2xl">
                        <!-- Header -->
                        <div class="text-center mb-6">
                            <h2 class="text-3xl font-bold text-white mb-2">
                                Selamat Datang Kembali
                            </h2>
                            <p class="text-slate-400 text-sm">Masuk untuk melanjutkan petualanganmu</p>
                        </div>

                        <!-- Error Message Container -->
                        <div id="errorContainer" class="hidden mb-4 p-3 bg-red-500/20 border border-red-500 rounded-lg">
                            <p id="errorMessage" class="text-red-400 text-sm text-center font-medium"></p>
                        </div>

                        <!-- Login Form -->
                        <form id="loginForm" method="POST" action="{{ route('login.post') }}" class="space-y-4">
                            @csrf
                            <!-- Username/NIS Field -->
                            <div class="space-y-2">
                                <label for="username" class="block text-xs font-semibold text-slate-300 uppercase tracking-wide">
                                    NIS / Username
                                </label>
                                <div class="relative">
                                    <input 
                                        type="text" 
                                        id="username" 
                                        name="username"
                                        required
                                        class="input-focus w-full px-4 py-3 bg-slate-800/50 border-2 border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-orange-500 transition-all duration-300"
                                        placeholder="Masukkan NIS atau Username"
                                    >
                                    <div class="absolute right-3 top-1/2 -translate-y-1/2">
                                        <div id="usernameStatus" class="w-2.5 h-2.5 bg-slate-600 rounded-full transition-all duration-300"></div>
                                    </div>
                                </div>
                                <p id="usernameError" class="text-red-400 text-xs hidden error-message"></p>
                            </div>

                            <!-- Password Field -->
                            <div class="space-y-2">
                                <label for="password" class="block text-xs font-semibold text-slate-300 uppercase tracking-wide">
                                    Password
                                </label>
                                <div class="relative">
                                    <input 
                                        type="password" 
                                        id="password" 
                                        name="password"
                                        required
                                        class="input-focus w-full px-4 py-3 bg-slate-800/50 border-2 border-slate-700 rounded-xl text-white placeholder-slate-500 focus:outline-none focus:border-orange-500 transition-all duration-300"
                                        placeholder="Masukkan Password"
                                    >
                                    <button 
                                        type="button"
                                        id="togglePassword"
                                        class="absolute right-3 top-1/2 -translate-y-1/2 text-slate-400 hover:text-orange-400 transition-all duration-300 hover:scale-110 text-xs font-bold"
                                    >
                                        <span id="toggleText">SHOW</span>
                                    </button>
                                </div>
                                <p id="passwordError" class="text-red-400 text-xs hidden error-message"></p>
                            </div>

                            <!-- Remember Me & Forgot Password -->
                            <div class="flex items-center justify-between text-xs pt-2">
                                <label class="flex items-center text-slate-300 cursor-pointer group">
                                    <div class="relative">
                                        <input 
                                            type="checkbox" 
                                            id="rememberMe"
                                            name="remember"
                                            class="sr-only peer"
                                        >
                                        <div class="w-9 h-5 bg-slate-700 rounded-full peer peer-checked:bg-gradient-to-r peer-checked:from-orange-500 peer-checked:to-red-600 transition-all duration-300"></div>
                                        <div class="absolute left-0.5 top-0.5 w-4 h-4 bg-white rounded-full transition-all duration-300 peer-checked:translate-x-4"></div>
                                    </div>
                                    <span class="ml-2 group-hover:text-orange-400 transition-colors duration-300 font-medium">Ingat Saya</span>
                                </label>
                                <a href="#" class="text-orange-400 hover:text-orange-300 transition-all duration-300 hover:underline font-medium">
                                    Lupa Password?
                                </a>
                            </div>

                            <!-- Login Button -->
                            <button 
                                type="submit"
                                id="loginBtn"
                                class="relative w-full px-6 py-3.5 bg-gradient-to-r from-orange-500 to-red-600 text-white font-bold rounded-xl hover-lift hover:from-orange-400 hover:to-red-500 transition-all duration-300 shadow-xl overflow-hidden group mt-6"
                            >
                                <span class="relative z-10" id="btnText">MASUK SEKARANG</span>
                                <div class="absolute inset-0 bg-gradient-to-r from-red-600 to-orange-500 opacity-0 group-hover:opacity-100 transition-opacity duration-300"></div>
                            </button>

                            <!-- Loading Bar -->
                            <div id="loadingBar" class="h-1 bg-slate-800 rounded-full overflow-hidden hidden">
                                <div class="h-full bg-gradient-to-r from-orange-500 to-red-600 rounded-full transition-all duration-300" style="width: 0%"></div>
                            </div>

                            <!-- Divider -->
                            <div class="relative my-6">
                                <div class="absolute inset-0 flex items-center">
                                    <div class="w-full border-t border-slate-700"></div>
                                </div>
                                <div class="relative flex justify-center">
                                    <span class="px-3 bg-slate-800/80 text-slate-500 text-xs font-medium">ATAU</span>
                                </div>
                            </div>

                            <!-- Register Link -->
                            <div class="text-center p-4 bg-slate-800/30 rounded-xl border border-slate-700 hover:border-orange-500/50 transition-all duration-300">
                                <p class="text-slate-300 text-sm mb-2">Belum punya akun?</p>
                                <a href="" class="inline-block px-6 py-2 bg-slate-800 hover:bg-slate-700 text-orange-400 text-sm font-bold rounded-lg transition-all duration-300 hover-lift border border-orange-500/30">
                                    DAFTAR SEKARANG
                                </a>
                            </div>
                        </form>
                    </div>
                </div>

                <!-- Additional Info -->
                <div class="text-center mt-6 text-slate-400 text-xs">
                    <p class="mb-3">© 2025 SMKN 13 Bandung. All rights reserved.</p>
                    <div class="flex items-center justify-center gap-4">
                        <a href="#" class="hover:text-orange-400 transition-all duration-300 hover:scale-110 font-medium">
                            FACEBOOK
                        </a>
                        <span class="text-slate-700">•</span>
                        <a href="#" class="hover:text-orange-400 transition-all duration-300 hover:scale-110 font-medium">
                            TWITTER
                        </a>
                        <span class="text-slate-700">•</span>
                        <a href="#" class="hover:text-orange-400 transition-all duration-300 hover:scale-110 font-medium">
                            INSTAGRAM
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        // Create floating particles
        function createParticles() {
            const container = document.getElementById('particleContainer');
            for (let i = 0; i < 20; i++) {
                const particle = document.createElement('div');
                particle.className = 'particle';
                const size = Math.random() * 4 + 2;
                particle.style.width = size + 'px';
                particle.style.height = size + 'px';
                particle.style.left = Math.random() * 100 + '%';
                particle.style.bottom = '-10px';
                particle.style.background = Math.random() > 0.5 ? 
                    'rgba(251, 146, 60, 0.6)' : 'rgba(239, 68, 68, 0.6)';
                particle.style.animation = `particle-float ${Math.random() * 10 + 10}s linear infinite`;
                particle.style.animationDelay = Math.random() * 5 + 's';
                container.appendChild(particle);
            }
        }
        createParticles();

        // Get CSRF token
        const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

        // Toggle Password Visibility
        const togglePassword = document.getElementById('togglePassword');
        const passwordInput = document.getElementById('password');
        const toggleText = document.getElementById('toggleText');

        togglePassword.addEventListener('click', function() {
            const type = passwordInput.getAttribute('type') === 'password' ? 'text' : 'password';
            passwordInput.setAttribute('type', type);
            toggleText.textContent = type === 'password' ? 'SHOW' : 'HIDE';
            this.classList.add('scale-110');
            setTimeout(() => this.classList.remove('scale-110'), 200);
        });

        // Input validation with visual feedback
        const usernameInput = document.getElementById('username');
        const usernameStatus = document.getElementById('usernameStatus');

        usernameInput.addEventListener('input', function() {
            if (this.value.length > 0) {
                if (this.value.length >= 3) {
                    usernameStatus.className = 'w-2.5 h-2.5 bg-green-400 rounded-full animate-pulse transition-all duration-300';
                } else {
                    usernameStatus.className = 'w-2.5 h-2.5 bg-yellow-400 rounded-full animate-pulse transition-all duration-300';
                }
            } else {
                usernameStatus.className = 'w-2.5 h-2.5 bg-slate-600 rounded-full transition-all duration-300';
            }
        });

        // Create ripple effect
        function createRipple(e) {
            const button = e.currentTarget;
            const ripple = document.createElement('span');
            const rect = button.getBoundingClientRect();
            const size = Math.max(rect.width, rect.height);
            const x = e.clientX - rect.left - size / 2;
            const y = e.clientY - rect.top - size / 2;
            
            ripple.className = 'ripple';
            ripple.style.width = ripple.style.height = size + 'px';
            ripple.style.left = x + 'px';
            ripple.style.top = y + 'px';
            
            button.appendChild(ripple);
            
            setTimeout(() => ripple.remove(), 600);
        }

        document.getElementById('loginBtn').addEventListener('click', createRipple);

        // Show error message
        function showError(message) {
            const errorContainer = document.getElementById('errorContainer');
            const errorMessage = document.getElementById('errorMessage');
            errorMessage.textContent = message;
            errorContainer.classList.remove('hidden');
            
            const loginCard = document.getElementById('loginCard');
            loginCard.classList.add('shake');
            setTimeout(() => loginCard.classList.remove('shake'), 500);
        }

        // Hide error message
        function hideError() {
            document.getElementById('errorContainer').classList.add('hidden');
        }

        // Create success particles
        function createSuccessParticles() {
            for (let i = 0; i < 30; i++) {
                setTimeout(() => {
                    const particle = document.createElement('div');
                    particle.className = 'particle';
                    particle.style.width = '8px';
                    particle.style.height = '8px';
                    particle.style.left = '50%';
                    particle.style.top = '50%';
                    particle.style.background = 'rgba(74, 222, 128, 0.8)';
                    particle.style.position = 'fixed';
                    particle.style.zIndex = '9999';
                    document.body.appendChild(particle);
                    
                    const angle = (Math.PI * 2 * i) / 30;
                    const velocity = 5;
                    const vx = Math.cos(angle) * velocity;
                    const vy = Math.sin(angle) * velocity;
                    
                    let posX = window.innerWidth / 2;
                    let posY = window.innerHeight / 2;
                    
                    const animate = () => {
                        posX += vx;
                        posY += vy;
                        particle.style.left = posX + 'px';
                        particle.style.top = posY + 'px';
                        particle.style.opacity = parseFloat(particle.style.opacity || 1) - 0.02;
                        
                        if (parseFloat(particle.style.opacity) > 0) {
                            requestAnimationFrame(animate);
                        } else {
                            particle.remove();
                        }
                    };
                    animate();
                }, i * 10);
            }
        }

        // Form Submission with AJAX
        const loginForm = document.getElementById('loginForm');
        const loginCard = document.getElementById('loginCard');
        const loadingBar = document.getElementById('loadingBar');
        
        loginForm.addEventListener('submit', async function(e) {
            e.preventDefault();
            
            hideError();
            
            const username = usernameInput.value;
            const password = passwordInput.value;
            const remember = document.getElementById('rememberMe').checked;

            // Client-side validation
            if (username.length < 3) {
                showError('NIS atau Username minimal 3 karakter');
                usernameInput.focus();
                return;
            }

            if (password.length < 3) {
                showError('Password minimal 3 karakter');
                passwordInput.focus();
                return;
            }

            // Show loading state
            const submitBtn = document.getElementById('loginBtn');
            const btnText = document.getElementById('btnText');
            const originalText = btnText.textContent;
            
            btnText.textContent = 'MEMPROSES...';
            submitBtn.disabled = true;
            submitBtn.classList.add('opacity-75', 'cursor-not-allowed');
            
            // Show loading bar
            loadingBar.classList.remove('hidden');
            const loadingBarFill = loadingBar.querySelector('div');
            let progress = 0;
            const loadingInterval = setInterval(() => {
                progress += 5;
                loadingBarFill.style.width = progress + '%';
                if (progress >= 90) {
                    clearInterval(loadingInterval);
                }
            }, 30);

            // Simulate API call
            try {
                const response = await fetch("{{ route('login.post') }}", {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        'Accept': 'application/json'
                    },
                    body: new FormData(loginForm)
                });

                const result = await response.json();
                clearInterval(loadingInterval);
                loadingBarFill.style.width = '100%';

                if(result.success){
                    loginCard.classList.add('success-pulse');
                    btnText.textContent = '✓ BERHASIL!';
                    submitBtn.classList.remove('opacity-75');
                    submitBtn.classList.add('bg-green-600');

                    for (let i = 0; i < 30; i++) {
                    setTimeout(() => {
                        const particle = document.createElement('div');
                        particle.className = 'particle';
                        particle.style.width = '8px';
                        particle.style.height = '8px';
                        particle.style.left = '50%';
                        particle.style.top = '50%';
                        particle.style.background = 'rgba(74, 222, 128, 0.8)';
                        particle.style.position = 'fixed';
                        particle.style.zIndex = '9999';
                        document.body.appendChild(particle);
                        
                        const angle = (Math.PI * 2 * i) / 30;
                        const velocity = 5;
                        const vx = Math.cos(angle) * velocity;
                        const vy = Math.sin(angle) * velocity;
                        
                        let posX = window.innerWidth / 2;
                        let posY = window.innerHeight / 2;
                        
                        const animate = () => {
                            posX += vx;
                            posY += vy;
                            particle.style.left = posX + 'px';
                            particle.style.top = posY + 'px';
                            particle.style.opacity = parseFloat(particle.style.opacity || 1) - 0.02;
                            
                            if (parseFloat(particle.style.opacity) > 0) {
                                requestAnimationFrame(animate);
                            } else {
                                particle.remove();
                            }
                        };
                        animate();
                    }, i * 10);
                    }
                    if(result.admin){
                        window.location.href = "{{ route('admin') }}"
                    }
                    setTimeout(() => {
                        // Redirect ke halaman home
                        window.location.href = "{{ route('home') }}"  // Ubah baris ini
                    }, 2000);
                }else{
                    console.log(result);
                    btnText.textContent = 'COBA LAGI';
                    submitBtn.disabled = false;
                    submitBtn.classList.remove('opacity-75', 'cursor-not-allowed');
                    loginCard.classList.add('shake');
                    usernameInput.focus();
                    setTimeout(() => loginCard.classList.remove('shake'), 500);
                }
            }catch (error) {
                console.error(error);
                alert('Terjadi kesalahan pada server.');
            };
        });

        // Add hover effects to inputs
        const inputs = document.querySelectorAll('input[type="text"], input[type="password"]');
        inputs.forEach(input => {
            input.addEventListener('focus', function() {
                this.parentElement.classList.add('scale-[1.01]');
            });
            input.addEventListener('blur', function() {
                this.parentElement.classList.remove('scale-[1.01]');
            });
        });

        // Keyboard shortcuts
        document.addEventListener('keydown', function(e) {
            if (e.ctrlKey && e.key === 'Enter') {
                loginForm.dispatchEvent(new Event('submit'));
            }
        });    
    </script>
</body>
</html>