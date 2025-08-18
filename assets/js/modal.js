document.addEventListener("DOMContentLoaded", function () {
  const productModal = document.getElementById("productModal");
  if (!productModal) return;

  const imgContainer = productModal.querySelector(".img-hover-container");
  const productImage = document.getElementById("productModalProductImage");
  const lightboxModalEl = document.getElementById("lightboxModal");
  const lightboxImage = document.getElementById("lightboxImage");
  const priceElem = document.getElementById("productModalProductPrice");

  if (!lightboxModalEl) return;
  const lightboxModal = new bootstrap.Modal(lightboxModalEl);

  // Image hover effect and lightbox trigger
  if (imgContainer && productImage && lightboxImage) {
    imgContainer.addEventListener("mouseenter", function () {
      const overlay = imgContainer.querySelector(".img-hover-overlay");
      if (overlay) overlay.style.opacity = 1;
      productImage.style.transform = "scale(1.04)";
    });

    imgContainer.addEventListener("mouseleave", function () {
      const overlay = imgContainer.querySelector(".img-hover-overlay");
      if (overlay) overlay.style.opacity = 0;
      productImage.style.transform = "scale(1)";
    });

    imgContainer.addEventListener("click", function () {
      lightboxImage.src = productImage.src;
      lightboxModal.show();
    });
  }

  if (priceElem) {
    const observer = new MutationObserver(function () {
      if (!priceElem.textContent.trim().startsWith("₱")) {
        priceElem.textContent =
          "₱" + priceElem.textContent.replace(/^₱/, "").trim();
      }
    });
    observer.observe(priceElem, {
      childList: true,
      characterData: true,
      subtree: true,
    });
  }

  document.addEventListener("hidden.bs.modal", function () {
    if (document.querySelector(".modal.show")) {
      document.body.classList.add("modal-open");
    }
  });
});
