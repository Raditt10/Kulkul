 setTimeout(() => {
      closeNotification();
    }, 8000);

    function closeNotification() {
      const notif = document.getElementById('comingSoonNotif');
      notif.style.animation = 'slideUp 0.5s ease-out forwards';
      setTimeout(() => {
        notif.style.display = 'none';
      }, 500);
    }

function toggleComingSoon(show = true) {
    document.getElementById('comingSoonModal').classList.toggle('hidden', !show);
}