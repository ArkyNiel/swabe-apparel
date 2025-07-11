// loadmore feature
const productsData = window.productsData || [];
const initialProductsCount = window.initialProductsCount || 0;

window.GET_PRODUCTS_URL = '../back-end/user-side/get_products.php';
window.UPLOAD_PREFIX = 'uploads/';
window.INITIAL_PRODUCTS_COUNT = initialProductsCount;

document.addEventListener('DOMContentLoaded', function() {
    document.getElementById('products-container').addEventListener('click', function(event) {
        const card = event.target.closest('.product-card');
        if (card && !event.target.closest('.card-actions')) {
            document.getElementById('productModalProductImage').src = card.getAttribute('data-image');
            document.getElementById('productModalProductName').textContent = card.getAttribute('data-name');
            document.getElementById('productModalProductColor').textContent = card.getAttribute('data-color');
            document.getElementById('productModalProductSize').textContent = card.getAttribute('data-size');
            document.getElementById('productModalProductPrice').textContent = card.getAttribute('data-price');
            var modal = new bootstrap.Modal(document.getElementById('productModal'));
            modal.show();
        }
    });

    document.getElementById('products-container').addEventListener('click', function(event) {
        const btn = event.target.closest('.cart-btn');
        if (btn) {
            event.stopPropagation();
            var name = btn.getAttribute('data-name');
            var image = btn.getAttribute('data-image');
            var size = btn.getAttribute('data-size');
            var price = btn.getAttribute('data-price');

            // Use the global function to populate the modal
            if (window.populateCartModal) {
                window.populateCartModal(name, image, price, size, size);
            }

            var modal = new bootstrap.Modal(document.getElementById('addToCartModal'));
            modal.show();
        }
    });

    document.getElementById('products-container').addEventListener('click', function(event) {
        const btn = event.target.closest('.favorite-btn');
        if (btn) {
            event.stopPropagation(); 
            const icon = btn.querySelector('.fa-heart');
            icon.classList.toggle('red');
            icon.classList.toggle('fas'); 
            icon.classList.toggle('far'); 
        }
    });
});