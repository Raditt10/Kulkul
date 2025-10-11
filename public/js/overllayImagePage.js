(function () {
    const texts = ['Berdaya suai', 'Kompeten', 'Berahlak Mulia'];
    const el = document.getElementById('rotating-title');
    let idx = 0;
    const fadeDuration = 500; // harus sinkron dengan duration-500 di class tailwind (ms)
    const displayInterval = 2500; // berapa lama tiap teks ditampilkan (ms)
    let intervalId = null;
    let isPaused = false;

    function showNext() {
      // fade out
      el.classList.add('opacity-0');
      setTimeout(() => {
        idx = (idx + 1) % texts.length;
        el.textContent = texts[idx];
        // fade in
        el.classList.remove('opacity-0');
      }, fadeDuration);
    }

    function start() {
      if (intervalId) return;
      intervalId = setInterval(() => {
        if (!isPaused) showNext();
      }, displayInterval);
    }

    function stop() {
      clearInterval(intervalId);
      intervalId = null;
    }

    // pause on hover of the whole card (".group") supaya pembaca dapat memfokuskan teks
    const card = el.closest('.group');
    if (card) {
      card.addEventListener('mouseenter', () => { isPaused = true; });
      card.addEventListener('mouseleave', () => { isPaused = false; });
    }

    // start after DOM siap
    if (document.readyState === 'loading') {
      document.addEventListener('DOMContentLoaded', start);
    } else {
      start();
    }
  })();