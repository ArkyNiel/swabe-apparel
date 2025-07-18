document.addEventListener('DOMContentLoaded', function() {
    // Image hover effect
    var imgContainer = document.querySelector('#productModal .img-hover-container');
    var img = document.getElementById('productModalProductImage');
    var lightboxModal = new bootstrap.Modal(document.getElementById('lightboxModal'));
    var lightboxImage = document.getElementById('lightboxImage');
    var priceElem = document.getElementById('productModalProductPrice');

    if (imgContainer) {
        imgContainer.addEventListener('mouseenter', function() {
            var overlay = imgContainer.querySelector('.img-hover-overlay');
            if (overlay) overlay.style.opacity = 1;
            img.style.transform = 'scale(1.04)';
        });
        imgContainer.addEventListener('mouseleave', function() {
            var overlay = imgContainer.querySelector('.img-hover-overlay');
            if (overlay) overlay.style.opacity = 0;
            img.style.transform = 'scale(1)';
        });
    }

    const viewPictureBtn = document.getElementById('viewPictureBtn');
    const productImg = document.getElementById('productModalProductImage');
    const lightboxImg = document.getElementById('lightboxImage');

    if (viewPictureBtn && productImg && lightboxImg) {
        viewPictureBtn.addEventListener('click', function () {
            lightboxImg.src = productImg.src;
            const lightboxModal = new bootstrap.Modal(document.getElementById('lightboxModal'));
            lightboxModal.show();
        });
    }

    // piso
    if (priceElem) {
        priceElem.addEventListener('DOMSubtreeModified', function() {
            if (!priceElem.textContent.trim().startsWith('₱')) {
                priceElem.textContent = '₱' + priceElem.textContent.replace(/^₱/, '').trim();
            }
        });
    }

    document.addEventListener('hidden.bs.modal', function () {
        var backdrops = document.querySelectorAll('.modal-backdrop');
        backdrops.forEach(function(el) { el.remove(); });
        document.body.classList.remove('modal-open');
        document.body.style.overflow = '';
    });

    // Ensure DOM is loaded
    document.addEventListener('DOMContentLoaded', function () {
        // Get elements
        const productImage = document.getElementById('productModalProductImage');
        const imgHoverContainer = document.querySelector('.img-hover-container');
        const lightboxModal = document.getElementById('lightboxModal');
        const lightboxImage = document.getElementById('lightboxImage');

        if (imgHoverContainer && productImage && lightboxModal && lightboxImage) {
            const imgHoverOverlay = imgHoverContainer.querySelector('.img-hover-overlay');
            imgHoverContainer.addEventListener('mouseenter', function () {
                if (imgHoverOverlay) imgHoverOverlay.style.opacity = 1;
            });
            imgHoverContainer.addEventListener('mouseleave', function () {
                if (imgHoverOverlay) imgHoverOverlay.style.opacity = 0;
            });

            imgHoverContainer.addEventListener('click', function () {
                lightboxImage.src = productImage.src;
                if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
                    const modal = new bootstrap.Modal(lightboxModal);
                    modal.show();
                } else {
                    $(lightboxModal).modal('show');
                }
            });
        }
    });
}); 