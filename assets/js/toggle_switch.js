document.addEventListener('DOMContentLoaded', function() {
    const toggle = document.getElementById('themeSwitch');
    const swabeApparel = document.getElementById('swabeApparelSection');
    const productBanner = document.getElementById('productBannerSection');
    const toggleLabelText = document.getElementById('toggleLabelText');
    const toggleContainer = document.querySelector('.toggle-peek-container');

    let lastScrollTop = 0;
    const scrollThreshold = 100;

    window.addEventListener('scroll', function() {
        const scrollTop = window.pageYOffset || document.documentElement.scrollTop;
        
        if (scrollTop <= 50) {
            toggleContainer.style.opacity = '0.98';
            toggleContainer.style.pointerEvents = 'auto';
        }
        else if (scrollTop > lastScrollTop && scrollTop > scrollThreshold) {
            toggleContainer.style.opacity = '0';
            toggleContainer.style.pointerEvents = 'none';
        }
        else if (scrollTop < lastScrollTop && scrollTop <= scrollThreshold) {
            toggleContainer.style.opacity = '0.98';
            toggleContainer.style.pointerEvents = 'auto';
        }
        
        lastScrollTop = scrollTop;
    });

    function updateDisplay() {
        if (toggle.checked) {
            swabeApparel.style.display = 'none';
            productBanner.style.display = 'block';
            toggleLabelText.textContent = 'Show Information';
        } else {
            swabeApparel.style.display = 'block';
            productBanner.style.display = 'none';
            toggleLabelText.textContent = 'Show Banner';
        }
    }
    // init
    toggle.addEventListener('change', updateDisplay);
    updateDisplay();
});