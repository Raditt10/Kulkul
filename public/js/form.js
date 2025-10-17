     let currentStep = 1;
     let selectedEskul = null;
        
        const eskulData = {
            basket: {
                name: 'Basket',
                icon: 'fa-basketball-ball',
                schedule: 'Latihan setiap Senin & Rabu, 15:00 - 17:00',
                color: 'from-orange-500 to-red-600'
            }
        };

        function selectEskul(eskul) {
            selectedEskul = eskul;
            
            // Remove selection from all cards
            document.querySelectorAll('.eskul-card').forEach(card => {
                card.classList.remove('border-orange-500', 'border-blue-500', 'border-purple-500', 'border-green-500', 'border-yellow-500', 'border-red-500');
                card.classList.add('border-slate-700');
                card.querySelector('.eskul-check').classList.add('hidden');
            });
            
            // Add selection to clicked card
            event.currentTarget.classList.remove('border-slate-700');
            
            // Add appropriate border color based on eskul
            const colorMap = {
                seni: 'border-orange-500',
                olahraga: 'border-blue-500',
                tekhnologi: 'border-purple-500',
                akademi: 'border-green-500',
            };
            event.currentTarget.classList.add(colorMap[eskul]);
            event.currentTarget.querySelector('.eskul-check').classList.remove('hidden');
            
            // Enable next button
            document.getElementById('btnNext1').disabled = false;
        }

        function nextStep(step) {
            // Validate current step
            if (currentStep === 2) {
                const form = document.getElementById('formData');
                if (!form.checkValidity()) {
                    form.reportValidity();
                    return;
                }
            }
            
            // Hide current step
            document.getElementById(`step${currentStep}`).classList.add('hidden');
            
            // Update progress
            updateProgress(currentStep, 'completed');
            
            // Show next step
            currentStep = step;
            document.getElementById(`step${step}`).classList.remove('hidden');
            
            // Update step indicators
            updateProgress(step, 'active');
            
            // If going to step 3, populate confirmation
            if (step === 3) {
                populateConfirmation();
            }
            
            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function prevStep(step) {
            // Hide current step
            document.getElementById(`step${currentStep}`).classList.add('hidden');
            
            // Update progress
            updateProgress(currentStep, 'inactive');
            
            // Show previous step
            currentStep = step;
            document.getElementById(`step${step}`).classList.remove('hidden');
            
            // Update step indicators
            updateProgress(step, 'active');
            
            // Update previous progress bar
            if (step === 1) {
                document.getElementById('progress1').style.width = '0%';
            } else if (step === 2) {
                document.getElementById('progress2').style.width = '0%';
            }
            
            // Scroll to top
            window.scrollTo({ top: 0, behavior: 'smooth' });
        }

        function updateProgress(step, status) {
            const circle = document.getElementById(`step${step}Circle`);
            const text = document.getElementById(`step${step}Text`);
            
            if (status === 'active') {
                circle.classList.remove('bg-slate-800', 'step-completed');
                circle.classList.add('step-active');
                circle.classList.remove('text-slate-400');
                circle.classList.add('text-white');
                text.classList.remove('text-slate-400', 'text-green-400');
                text.classList.add('text-orange-400');
                
                // Animate progress bar
                if (step === 2) {
                    setTimeout(() => {
                        document.getElementById('progress1').style.width = '100%';
                    }, 100);
                } else if (step === 3) {
                    setTimeout(() => {
                        document.getElementById('progress2').style.width = '100%';
                    }, 100);
                }
            } else if (status === 'completed') {
                circle.classList.remove('bg-slate-800', 'step-active');
                circle.classList.add('step-completed');
                circle.innerHTML = '<i class="fas fa-check text-white"></i>';
                text.classList.remove('text-slate-400', 'text-orange-400');
                text.classList.add('text-green-400');
            } else if (status === 'inactive') {
                circle.classList.remove('step-active', 'step-completed');
                circle.classList.add('bg-slate-800', 'text-slate-400');
                circle.textContent = step;
                text.classList.remove('text-orange-400', 'text-green-400');
                text.classList.add('text-slate-400');
            }
        }

        function populateConfirmation() {
            const eskul = eskulData[selectedEskul];
            
            // Update eskul info
            document.getElementById('confirmEskulIcon').innerHTML = `<i class="fas ${eskul.icon} text-white text-2xl"></i>`;
            document.getElementById('confirmEskulIcon').className = `w-16 h-16 bg-gradient-to-br ${eskul.color} rounded-xl flex items-center justify-center`;
            document.getElementById('confirmEskulName').textContent = eskul.name;
            document.getElementById('confirmEskulSchedule').textContent = eskul.schedule;
            
            // Update personal data
            document.getElementById('confirmNama').textContent = document.getElementById('nama').value;
            document.getElementById('confirmNis').textContent = document.getElementById('nis').value;
            document.getElementById('confirmKelas').textContent = document.getElementById('kelas').value;
            document.getElementById('confirmPhone').textContent = document.getElementById('phone').value;
            
            const email = document.getElementById('email').value;
            document.getElementById('confirmEmail').textContent = email || '-';
            
            const gender = document.getElementById('gender').value;
            document.getElementById('confirmGender').textContent = gender === 'L' ? 'Laki-laki' : 'Perempuan';
            
            document.getElementById('confirmReason').textContent = document.getElementById('reason').value;
            
            const experience = document.getElementById('experience').value;
            if (experience) {
                document.getElementById('confirmExperienceSection').classList.remove('hidden');
                document.getElementById('confirmExperience').textContent = experience;
            } else {
                document.getElementById('confirmExperienceSection').classList.add('hidden');
            }
        }

        function submitForm() {
            // Simulate form submission
            showLoading();
            
            setTimeout(() => {
                hideLoading();
                document.getElementById('successModal').classList.remove('hidden');
                document.getElementById('successModal').classList.add('flex');
                
                // Save to local storage (simulation)
                const formData = {
                    eskul: selectedEskul,
                    nama: document.getElementById('nama').value,
                    nis: document.getElementById('nis').value,
                    kelas: document.getElementById('kelas').value,
                    phone: document.getElementById('phone').value,
                    email: document.getElementById('email').value,
                    gender: document.getElementById('gender').value,
                    reason: document.getElementById('reason').value,
                    experience: document.getElementById('experience').value,
                    date: new Date().toISOString(),
                    status: 'pending'
                };
                
                console.log('Form submitted:', formData);
            }, 2000);
        }

        function showLoading() {
            const loading = document.createElement('div');
            loading.id = 'loadingOverlay';
            loading.className = 'fixed inset-0 bg-black/70 backdrop-blur-sm flex items-center justify-center z-50';
            loading.innerHTML = `
                <div class="text-center">
                    <div class="w-16 h-16 border-4 border-orange-500 border-t-transparent rounded-full animate-spin mx-auto mb-4"></div>
                    <p class="text-white font-semibold">Mengirim pendaftaran...</p>
                </div>
            `;
            document.body.appendChild(loading);
        }

        function hideLoading() {
            const loading = document.getElementById('loadingOverlay');
            if (loading) {
                loading.remove();
            }
        }

        // Form validation
        document.getElementById('phone').addEventListener('input', function(e) {
            let value = e.target.value.replace(/\D/g, '');
            if (value.length > 13) value = value.slice(0, 13);
            e.target.value = value;
        });

        // Initialize
        document.addEventListener('DOMContentLoaded', function() {
            // Add smooth scroll behavior
            document.documentElement.style.scrollBehavior = 'smooth';
        });