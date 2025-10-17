// Sidebar Toggle
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const sidebarOverlay = document.getElementById('sidebarOverlay');
    const sidebarToggle = document.getElementById('sidebarToggle');
    const profileWrapper = document.getElementById('profileWrapper');
    const loginButton = document.getElementById('loginButton');
    const closeSidebar = document.getElementById('closeSidebar');

    sidebarToggle.addEventListener('click', () => {
        sidebar.classList.remove('translate-x-full');
        sidebarOverlay.classList.remove('opacity-0', 'pointer-events-none');
    });

    closeSidebar.addEventListener('click', () => {
        sidebar.classList.add('translate-x-full');
        sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
    });

    sidebarOverlay.addEventListener('click', () => {
        sidebar.classList.add('translate-x-full');
        sidebarOverlay.classList.add('opacity-0', 'pointer-events-none');
    });

    if (profileWrapper) {
        profileWrapper.addEventListener('click', () => {
            if (e.target.closest('#loginButton')) return;
            sidebar.classList.remove('translate-x-full');
            sidebarOverlay.classList.remove('opacity-0', 'pointer-events-none');
        });
    }
    
    if (loginButton) {
            loginButton.addEventListener('click', (e) => {
                e.stopImmediatePropagation(); // 😎 ini bagian penting
                // biar pas klik login gak ikut manggil toggleSidebar
                window.location.href = loginButton.href;
            });
        }
}); 