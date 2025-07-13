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
        imgContainer.addEventListener('click', function() {
            if (img.src) {
                lightboxImage.src = img.src;
                lightboxModal.show();
            }
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
}); 