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