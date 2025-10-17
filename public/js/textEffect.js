(function() {
    const phrases = [
        "Excellence in Education",
        "Unggul dalam Pendidikan",
        "Inovasi & Kreativitas",
        "Membentuk Generasi Hebat"
    ];
    
    let phraseIndex = 0;
    let charIndex = 0;
    let isDeleting = false;
    
    function type() {
        const element = document.getElementById('typingText');
        if (!element) {
            setTimeout(type, 100);
            return;
        }
        
        const current = phrases[phraseIndex];
        
        if (isDeleting) {
            element.textContent = current.substring(0, charIndex - 1);
            charIndex--;
        } else {
            element.textContent = current.substring(0, charIndex + 1);
            charIndex++;
        }
        
        let speed = isDeleting ? 50 : 100;
        
        if (!isDeleting && charIndex === current.length) {
            speed = 2000;
            isDeleting = true;
        } else if (isDeleting && charIndex === 0) {
            isDeleting = false;
            phraseIndex = (phraseIndex + 1) % phrases.length;
            speed = 500;
        }
        
        setTimeout(type, speed);
    }
    
    type();
})();
