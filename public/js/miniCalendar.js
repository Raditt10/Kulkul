       // Sample schedule data
        const scheduleData = [
            { day: 'Senin', date: '1 Agustus', activity: 'IRMA', time: '15:45 - 17:00' },
            { day: 'Kamis', date: '4 Agustus', activity: 'BANZAI', time: '15:45 - 17:00' },
            { day: 'Sabtu', date: '6 Agustus', activity: 'PASKIBRA', time: '15:45 - 17:00' },
            { day: 'Senin', date: '8 Agustus', activity: 'IRMA', time: '15:45 - 17:00' },
            { day: 'Rabu', date: '10 Agustus', activity: 'BASKET', time: '16:00 - 18:00' },
            { day: 'Jumat', date: '12 Agustus', activity: 'FUTSAL', time: '15:30 - 17:30' }
        ];

        // Generate calendar
        function generateCalendar() {
            const grid = document.getElementById('calendarGrid');
            const days = [1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, 26, 27, 28, 29, 30];
            
            days.forEach(day => {
                const dayEl = document.createElement('div');
                dayEl.className = `w-8 h-8 flex items-center justify-center rounded-lg text-sm font-semibold cursor-pointer transition-all duration-200 ${
                    day === 17 
                        ? 'bg-gradient-to-br from-orange-500 to-red-600 text-white shadow-lg' 
                        : 'text-slate-700 hover:bg-orange-200'
                }`;
                dayEl.textContent = day;
                dayEl.onclick = () => selectDate(day);
                grid.appendChild(dayEl);
            });
        }

        // Generate schedule list
        function generateSchedule() {
            const list = document.getElementById('scheduleList');
            
            scheduleData.forEach((item, index) => {
                const scheduleItem = document.createElement('div');
                scheduleItem.className = 'relative group hover-lift';
                scheduleItem.style.animationDelay = `${index * 0.1}s`;
                
                scheduleItem.innerHTML = `
                    <div class="absolute -inset-0.5 bg-gradient-to-r from-orange-500 to-red-500 rounded-2xl blur opacity-20 group-hover:opacity-40 transition duration-500"></div>
                    <div class="relative bg-slate-800 border border-orange-500/20 rounded-2xl p-6 cursor-pointer hover:border-orange-500/40 transition-all duration-300">
                        <div class="flex flex-col md:flex-row md:items-center justify-between gap-4">
                            <div>
                                <h3 class="text-lg font-bold text-white mb-1">${item.day} ${item.date}</h3>
                                <div class="flex items-center gap-3">
                                    <span class="px-4 py-2 bg-gradient-to-r from-orange-400 to-yellow-400 text-slate-900 font-bold rounded-full text-sm shadow-lg">
                                        ${item.activity}
                                    </span>
                                </div>
                            </div>
                            <div class="flex items-center gap-2 text-orange-400 font-bold text-lg">
                                <i class="fas fa-clock"></i>
                                ${item.time}
                            </div>
                        </div>
                    </div>
                `;
                
                list.appendChild(scheduleItem);
            });
        }

        function selectDate(day) {
            alert(`Selected date: ${day} Agustus 2025`);
        }

        // Initialize
        generateCalendar();
        generateSchedule(); 