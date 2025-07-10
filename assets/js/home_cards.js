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

            document.getElementById('cartModalProductName').textContent = name;
            document.getElementById('cartModalProductImg').src = image;
            document.getElementById('cartModalProductPrice').textContent = price;

            var sizeSelect = document.getElementById('cartModalProductSize');
            if (sizeSelect) {
                for (let i = 0; i < sizeSelect.options.length; i++) {
                    if (sizeSelect.options[i].value === size) {
                        sizeSelect.selectedIndex = i;
                        break;
                    }
                }
            }
            var qty = document.getElementById('cartModalQuantity');
            if (qty) qty.value = 1;

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