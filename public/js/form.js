            let currentStep = 1;
            let selectedEskul = null;
            let selectedEskulData = null; 
            let selectedEskulId = null; 


            function selectEskul(ekskulId, event) {
                selectedEskulId = ekskulId;
                selectedEskulData = eskulData.find(e => e.id_ekskul == ekskulId);
                console.log(selectedEskulData);


                // Reset semua kartu
                document.querySelectorAll('.eskul-card').forEach(card => {
                    card.classList.remove('border-orange-500');
                    card.classList.add('border-slate-700');
                    card.querySelector('.eskul-check').classList.add('hidden');
                });

                // Tambahkan gaya aktif
                // event.currentTarget.classList.remove('border-slate-700');
                // event.currentTarget.classList.add('border-orange-500');
                // event.currentTarget.querySelector('.eskul-check').classList.remove('hidden');

                // Aktifkan tombol next
                document.getElementById('btnNext1').disabled = false;
            }

            // Step 3 konfirmasi
            function populateConfirmation() {
                if (selectedEskulData) {
                    document.getElementById('confirmEskulIcon').innerHTML = `<i class="fas ${selectedEskulData.icon} text-white text-2xl"></i>`;
                    document.getElementById('confirmEskulIcon').className = `w-16 h-16 bg-gradient-to-br ${selectedEskulData.warna} rounded-xl flex items-center justify-center`;
                    document.getElementById('confirmEskulName').textContent = selectedEskulData.nama_ekskul;
                    document.getElementById('confirmEskulSchedule').textContent = selectedEskulData.jam_mulai;
                } else {
                    document.getElementById('confirmEskulName').textContent = 'Belum memilih ekskul';
                    document.getElementById('confirmEskulSchedule').textContent = '-';
                }

                // Ambil data user
                const nama = document.getElementById('nama')?.value || '-';
                const nis = document.getElementById('nis')?.value || '-';
                const kelas = document.getElementById('kelas')?.value || '-';
                const phone = document.getElementById('phone')?.value || '-';
                const email = document.getElementById('email')?.value || '-';
                const gender = document.getElementById('gender')?.value || '-';
                const reason = document.getElementById('reason')?.value || '-';
                const experience = document.getElementById('experience')?.value || '';

                document.getElementById('confirmNama').textContent = nama;
                document.getElementById('confirmNis').textContent = nis;
                document.getElementById('confirmKelas').textContent = kelas;
                document.getElementById('confirmPhone').textContent = phone;
                document.getElementById('confirmEmail').textContent = email;
                document.getElementById('confirmGender').textContent = gender === 'L' ? 'Laki-laki' : 'Perempuan';
                document.getElementById('confirmReason').textContent = reason;

                const expSection = document.getElementById('confirmExperienceSection');
                if (experience.trim() !== '') {
                    expSection.classList.remove('hidden');
                    document.getElementById('confirmExperience').textContent = experience;
                } else {
                    expSection.classList.add('hidden');
                }
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
                if (selectedEskulData) {
                    document.getElementById('confirmEskulIcon').innerHTML = `<i class="fas ${selectedEskulData.icon} text-white text-2xl"></i>`;
                    document.getElementById('confirmEskulIcon').className = `w-16 h-16 bg-gradient-to-br ${selectedEskulData.warna} rounded-xl flex items-center justify-center`;
                    document.getElementById('confirmEskulName').textContent = selectedEskulData.nama_ekskul;
                    document.getElementById('confirmEskulSchedule').textContent = selectedEskulData.jam_mulai;
                } else {
                    document.getElementById('confirmEskulName').textContent = 'Belum memilih ekskul';
                    document.getElementById('confirmEskulSchedule').textContent = '-';
                }

                // Ambil data input pengguna
                const nama = document.getElementById('nama')?.value || '-';
                const nis = document.getElementById('nis')?.value || '-';
                const kelas = document.getElementById('kelas')?.value || '-';
                const phone = document.getElementById('phone')?.value || '-';
                const email = document.getElementById('email')?.value || '-';
                const gender = document.getElementById('gender')?.value || '-';
                const reason = document.getElementById('reason')?.value || '-';
                const experience = document.getElementById('experience')?.value || '';

                document.getElementById('confirmNama').textContent = nama;
                document.getElementById('confirmNis').textContent = nis;
                document.getElementById('confirmKelas').textContent = kelas;
                document.getElementById('confirmPhone').textContent = phone;
                document.getElementById('confirmEmail').textContent = email;
                document.getElementById('confirmGender').textContent =
                    gender === 'L' ? 'Laki-laki' : gender === 'P' ? 'Perempuan' : '-';
                document.getElementById('confirmReason').textContent = reason;

                const expSection = document.getElementById('confirmExperienceSection');
                if (experience.trim() !== '') {
                    expSection.classList.remove('hidden');
                    document.getElementById('confirmExperience').textContent = experience;
                } else {
                    expSection.classList.add('hidden');
                }
            }

            // function populateConfirmation() {
            //     // Ambil elemen form
            //     const form = document.getElementById('formData');

            //     // Ambil semua nilai input
            //     const nama = form.querySelector('#nama')?.value || '-';
            //     const nis = form.querySelector('#nis')?.value || '-';
            //     const kelas = form.querySelector('#kelas')?.value || '-';
            //     const phone = form.querySelector('#phone')?.value || '-';
            //     const email = form.querySelector('#email')?.value || '-';
            //     const gender = form.querySelector('#gender')?.value || '-';
            //     const reason = form.querySelector('#reason')?.value || '-';
            //     const experience = form.querySelector('#experience')?.value || '';

            //     // Ambil data eskul yang dipilih
            //     const eskul = eskulData[selectedEskul] || null;

            //     // Update informasi ekskul
            //     if (eskul) {
            //         document.getElementById('confirmEskulIcon').innerHTML = `<i class="fas ${eskul.icon} text-white text-2xl"></i>`;
            //         document.getElementById('confirmEskulIcon').className = `w-16 h-16 bg-gradient-to-br ${eskul.color} rounded-xl flex items-center justify-center`;
            //         document.getElementById('confirmEskulName').textContent = eskul.name;
            //         document.getElementById('confirmEskulSchedule').textContent = eskul.schedule;
            //     }

            //     // Isi ulang data personal ke halaman konfirmasi
            //     document.getElementById('confirmNama').textContent = nama;
            //     document.getElementById('confirmNis').textContent = nis;
            //     document.getElementById('confirmKelas').textContent = kelas;
            //     document.getElementById('confirmPhone').textContent = phone;
            //     document.getElementById('confirmEmail').textContent = email;
            //     document.getElementById('confirmGender').textContent = gender === 'L' ? 'Laki-laki' : gender === 'P' ? 'Perempuan' : '-';
            //     document.getElementById('confirmReason').textContent = reason;

            //     // Pengalaman hanya ditampilkan jika tidak kosong
            //     const expSection = document.getElementById('confirmExperienceSection');
            //     if (experience.trim() !== '') {
            //         expSection.classList.remove('hidden');
            //         document.getElementById('confirmExperience').textContent = experience;
            //     } else {
            //         expSection.classList.add('hidden');
            //     }
            // }


            function submitForm() {
                const form = document.getElementById('formData'); // kalau perlu reference form

                // Pastikan selectedEskulId sudah di-set saat pilih eskul di step 1
                fetch(form.action, {
                    method: 'POST',
                    headers: {
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content'),
                        'Accept': 'application/json',
                        'Content-Type': 'application/json'
                    },
                    credentials: 'same-origin', // penting supaya cookie session dikirim
                    body: JSON.stringify({
                        nis: document.querySelector('#nis').value,
                        ekskul_id: selectedEskulId,
                        alasan: document.querySelector('#reason').value,
                        experience: document.querySelector('#experience').value
                    })
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        document.getElementById('successModal').classList.remove('hidden');
                    } else {
                        alert('Gagal mengirim pendaftaran.');
                    }
                })
                .catch(err => console.error(err));
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

            Swal.fire({
            icon: 'success',
            title: 'Pendaftaran Berhasil!',
            html: '<p class="text-orange-300 font-semibold">Selamat bergabung di ekskul pilihanmu 🎉</p>',
            background: '#0f172a',
            color: '#fff',
            confirmButtonColor: '#f97316',
            position: 'center', // ⬅️ biar di tengah
            showConfirmButton: false,
            timer: 2500,
            });
