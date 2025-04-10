document.addEventListener("DOMContentLoaded", () => {
    let lastScrollTop = 0;
  
    // Scroll event for search section visibility
    window.addEventListener("scroll", function () {
      let searchSection = document.querySelector(".search-section");
      if (searchSection) {
        let sectionPosition = searchSection.getBoundingClientRect().top;
    
        if (window.pageYOffset > lastScrollTop) {
          // Scroll down
          if (sectionPosition < window.innerHeight - 100) {
            searchSection.classList.add("visible");
          } else {
            searchSection.classList.remove("visible");
          }
        } else {
          // Scroll up
          searchSection.classList.remove("visible");
        }
      }
  
      lastScrollTop = window.pageYOffset <= 0 ? 0 : window.pageYOffset;
    });
  
    // Card animation observer
    const observerOptions = {
      root: null,
      rootMargin: "0px",
      threshold: 0.1
    };

    let animatedCards = new Set(); // Keep track of animated cards

    function setupCardObserver() {
      const observer = new IntersectionObserver((entries) => {
        entries.forEach(entry => {
          const card = entry.target;
          
          if (entry.isIntersecting && !animatedCards.has(card)) {
            const cardIndex = Array.from(document.querySelectorAll('.card-container')).indexOf(card);
            const isRight = cardIndex >= 6;
            
            // Set initial position
            card.style.transform = isRight ? 'translateX(100px)' : 'translateX(-100px)';
            card.style.opacity = "0";
            card.style.transition = "all 0.5s ease-out";
            
            // Trigger animation after a small delay
            setTimeout(() => {
              card.style.transform = "translateX(0)";
              card.style.opacity = "1";
              animatedCards.add(card); // Mark this card as animated
            }, cardIndex % 6 * 100);
            
            observer.unobserve(card);
          }
        });
      }, observerOptions);

      // Observe all cards that haven't been animated yet
      document.querySelectorAll('.card-container').forEach(card => {
        if (!animatedCards.has(card)) {
          observer.observe(card);
        }
      });
    }

    // Initial setup
    setupCardObserver();

    // Create a MutationObserver to watch for new cards
    const mutationObserver = new MutationObserver((mutations) => {
      mutations.forEach((mutation) => {
        if (mutation.addedNodes.length) {
          setTimeout(() => {
            setupCardObserver(); // Re-run setup for new cards with a slight delay
          }, 100);
        }
      });
    });

    // Start observing the products container for changes
    const productsContainer = document.getElementById('products-container');
    if (productsContainer) {
      mutationObserver.observe(productsContainer, {
        childList: true,
        subtree: true
      });
    }
});
  