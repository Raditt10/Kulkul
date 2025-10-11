 // Tab Navigation
    const personalTab = document.getElementById('personalTab');
    const academicTab = document.getElementById('academicTab');

    const personalContent = document.getElementById('personalContent');
    const academicContent = document.getElementById('academicContent');
 

    personalTab.addEventListener('click', () => {
        personalTab.classList.add('bg-gradient-to-r', 'from-orange-500', 'to-red-600', 'text-white');
        academicTab.classList.remove('bg-gradient-to-r', 'from-orange-500', 'to-red-600', 'text-white');

        personalContent.classList.remove('hidden');
        academicContent.classList.add('hidden');
    });

    academicTab.addEventListener('click', () => {
        academicTab.classList.add('bg-gradient-to-r', 'from-orange-500', 'to-red-600', 'text-white');
        personalTab.classList.remove('bg-gradient-to-r', 'from-orange-500', 'to-red-600', 'text-white');

        academicContent.classList.remove('hidden');
        personalContent.classList.add('hidden');
    });