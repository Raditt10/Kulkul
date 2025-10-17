// // Sidebar Toggle
//     const sidebar = document.getElementById('sidebar');
//     const sidebarOverlay = document.getElementById('sidebarOverlay');
//     const sidebarToggle = document.getElementById('sidebarToggle');
//     const closeSidebar = document.getElementById('closeSidebar');

//     sidebarToggle.addEventListener('click', () => {
//         sidebar.classList.remove('translate-x-full');
//         sidebarOverlay.classList.remove('opacity-0', 'pointer-events-none');
//     });

//     closeSidebar.addEventListener('click', () => {
//         sidebar.classList.add('translate-x-full');
//         sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
//     });

//     sidebarOverlay.addEventListener('click', () => {
//         sidebar.classList.add('translate-x-full');
//         sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
//     });


    
//     const profileWrapper = document.getElementById('profileWrapper');
//     const loginButton = document.getElementById('loginButton');

//     profileWrapper.addEventListener('click', (e) => {
//         if (e.target.closest('#loginButton')) return;
//             sidebar.classList.remove('translate-x-full');
//             sidebarOverlay.classList.remove('opacity-0', 'pointer-events-none');
//     });
    

//     loginButton.addEventListener('click', (e) => {
//         e.stopImmediatePropagation();
//     });


// Sidebar Toggle
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const closeSidebar = document.getElementById('closeSidebar');
    const profileWrapper = document.getElementById('profileWrapper');
    const loginButton = document.getElementById('loginButton');

    // Tombol burger (kalau login)
    if (sidebarToggle) {
        sidebarToggle.addEventListener('click', (e) => {
            e.stopPropagation();
            sidebar.classList.remove('translate-x-full');
            sidebarOverlay.classList.remove('opacity-0', 'pointer-events-none');
        });
    }

    // Tombol close sidebar
    if (closeSidebar) {
        closeSidebar.addEventListener('click', () => {
            sidebar.classList.add('translate-x-full');
            sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
        });
    }

    // Klik overlay untuk nutup
    if (sidebarOverlay) {
        sidebarOverlay.addEventListener('click', () => {
            sidebar.classList.add('translate-x-full');
            sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
        });
    }

    // Klik di area profil untuk buka sidebar
    if (profileWrapper) {
        profileWrapper.addEventListener('click', (e) => {
            // kalo yang diklik adalah tombol login, abaikan
            if (e.target.closest('#loginButton')) return;
            sidebar.classList.remove('translate-x-full');
            sidebarOverlay.classList.remove('opacity-0', 'pointer-events-none');
        });
    }

    // Biar tombol login gak ikut trigger sidebar
    if (loginButton) {
        loginButton.addEventListener('click', (e) => {
            e.stopImmediatePropagation();
        });
    }
});
