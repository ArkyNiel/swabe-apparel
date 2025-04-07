document.addEventListener("DOMContentLoaded", () => {
    let lastScrollTop = 0;
  
    // Scroll event for search section visibility
    window.addEventListener("scroll", function () {
      let searchSection = document.querySelector(".search-section");
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
  
      lastScrollTop = window.pageYOffset <= 0 ? 0 : window.pageYOffset;
    });
  
    const cards = document.querySelectorAll(".card-container");
  
    const observerOptions = {
      root: null,
      rootMargin: "0px",
      threshold: 0.5,
    };
  
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("visible");
        } else {
          entry.target.classList.remove("visible");
        }
      });
    }, observerOptions);
  
    cards.forEach((card) => {
      observer.observe(card);
    });
  
    // animation 
    function animateOnScroll() {
      const sectionTop = aboutSection.getBoundingClientRect().top;
      const sectionHeight = aboutSection.offsetHeight;
  
      if (sectionTop <= window.innerHeight - 150) {
        textElement.classList.add("animate-text");
  
        imgElements.forEach((img, index) => {
          setTimeout(() => {
            img.classList.add("animate-img");
          }, index * 300); 
        });
  
        window.removeEventListener("scroll", animateOnScroll);
      }
    }
  
    // scroll events
    window.addEventListener("scroll", animateOnScroll);
  
    // animation 
    animateOnScroll();
  
    const aboutObserver = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          textElement.classList.add("animate-text");
  
          imgElements.forEach((img, index) => {
            setTimeout(() => {
              img.classList.add("animate-img");
            }, index * 300); 
          });
        }
      });
    }, observerOptions);
  
    aboutObserver.observe(aboutSection);
  });
  