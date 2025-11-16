// Product card interactions
document.addEventListener('DOMContentLoaded', function() {
    // Product modal click handler
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

    // Cart button click handler
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

    // Favorite button click handler
    document.getElementById('products-container').addEventListener('click', function(event) {
        const btn = event.target.closest('.favorite-btn');
        if (btn) {
            event.stopPropagation();

            // Check if user is logged in
            if (!window.userLoggedIn) {
                showAlert("Please login to add items to wishlist!", "warning");
                setTimeout(() => location.href = "../../user-side/links/login.php", 2000);
                return;
            }

            const icon = btn.querySelector('.fa-heart');
            const isInWishlist = icon.classList.contains('red');
            const id = btn.getAttribute('data-id');

            // Get product data
            const name = btn.getAttribute('data-name');
            const image = btn.getAttribute('data-image');
            const price = btn.getAttribute('data-price');
            const color = btn.getAttribute('data-color') || 'N/A';

            // Send to backend
            const data = new FormData();
            data.append('ajax', '1');
            data.append('product_id', id);

            if (isInWishlist) {
                // Remove from wishlist
                data.append('action', 'remove');
                data.append('id', id); 
            } else {
                // Add to wishlist
                data.append('action', 'add_to_wishlist');
                data.append('product_name', name);
                data.append('image', image);
                data.append('price', price);
            }

            fetch('../../back-end/user-side/add_to_wishlist.php', {
                method: 'POST',
                body: data
            })
            .then(response => response.text())
            .then(text => {
                try {
                    const data = JSON.parse(text);
                    if (data.status === 'login_required') {
                        showAlert(data.message, 'warning');
                        setTimeout(() => location.href = '../../user-side/links/login.php', 2000);
                    } else if (data.status === 'success' || data.success) {
                        // Toggle the heart appearance
                        icon.classList.toggle('red');
                        icon.classList.toggle('fas');
                        icon.classList.toggle('far');

                        // Show appropriate message
                        const message = isInWishlist ? 'Product removed from wishlist!' : 'Product added to wishlist successfully!';
                        const type = isInWishlist ? 'info' : 'success';
                        showAlert(message, type);
                    } else {
                        showAlert(data.message, 'danger');
                    }
                } catch (e) {
                    showAlert('Server error. Please try again.', 'danger');
                }
            })
            .catch(error => showAlert('Error occurred!', 'danger'));
        }
    });
});
