// Function to load wishlist hearts on page load
function loadWishlistHearts() {
    if (window.userLoggedIn) {
        fetch('../../back-end/user-side/get_wishlist.php')
            .then(response => response.json())
            .then(data => {
                if (data.wishlist) {
                    data.wishlist.forEach(item => {
                        const favoriteBtn = document.querySelector(`.favorite-btn[data-id="${item.product_id}"]`);
                        if (favoriteBtn) {
                            const icon = favoriteBtn.querySelector('.fa-heart');
                            icon.classList.add('fas', 'red');
                            icon.classList.remove('far');
                        }
                    });
                }
            })
            .catch(error => console.error('Error loading wishlist:', error));
    }
}

// Load wishlist hearts when DOM is ready
document.addEventListener('DOMContentLoaded', loadWishlistHearts);
