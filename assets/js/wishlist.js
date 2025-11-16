document.addEventListener('DOMContentLoaded', function() {
    const wishlistMenu = document.getElementById('wishlistMenu');
    const noWishlistItems = document.getElementById('noWishlistItems');
    const viewFullWishlist = document.getElementById('viewFullWishlist');

    function loadWishlist() {
        fetch('../../back-end/user-side/get_wishlist.php')
            .then(response => response.json())
            .then(data => {
                if (data.error) {
                    console.error(data.error);
                    return;
                }

                // Remove existing wishlist items except header and view full
                const existingItems = wishlistMenu.querySelectorAll('.wishlist-item:not(#noWishlistItems):not(#viewFullWishlist)');
                existingItems.forEach(item => item.remove());

                const wishlist = data.wishlist;
                if (wishlist.length === 0) {
                    noWishlistItems.style.display = 'block';
                    viewFullWishlist.style.display = 'none';
                } else {
                    noWishlistItems.style.display = 'none';
                    viewFullWishlist.style.display = 'block';

                    wishlist.slice(0, 4).forEach(item => {
                        const li = document.createElement('li');
                        li.className = 'wishlist-item';
                        li.innerHTML = `
                            <div class="wishlist-header">
                                <span class="wishlist-title">${item.product_name} Added</span>
                                <span class="wishlist-time">${getTimeAgo(item.added_at)}</span>
                                <i class="fa-solid fa-heart remove-wishlist red" title="Remove from wishlist" data-id="${item.product_id}"></i>
                            </div>
                            <div class="wishlist-content">
                                ${item.product_name} added to wishlist. Price: ₱${item.price}
                            </div>
                        `;
                        wishlistMenu.insertBefore(li, viewFullWishlist);
                    });
                }
            })
            .catch(error => console.error('Error loading wishlist:', error));
    }

    function getTimeAgo(dateString) {
        const now = new Date();
        const addedAt = new Date(dateString);
        const diffMs = now - addedAt;
        const diffMins = Math.floor(diffMs / 60000);
        const diffHours = Math.floor(diffMins / 60);
        const diffDays = Math.floor(diffHours / 24);

        if (diffMins < 1) return 'Just now';
        if (diffMins < 60) return `${diffMins}m ago`;
        if (diffHours < 24) return `${diffHours}h ago`;
        return `${diffDays}d ago`;
    }

    // Load wishlist when dropdown is shown
    document.getElementById('wishlistDropdown').addEventListener('show.bs.dropdown', loadWishlist);

    // Handle remove from wishlist
    wishlistMenu.addEventListener('click', function(e) {
        if (e.target.classList.contains('remove-wishlist')) {
            const itemId = e.target.getAttribute('data-id');
            // Remove without confirmation for better UX
            fetch('../../back-end/user-side/add_to_wishlist.php', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/x-www-form-urlencoded',
                },
                body: `product_id=${itemId}&action=remove`
            })
            .then(response => response.json())
            .then(data => {
                if (data.success) {
                    loadWishlist(); // Reload wishlist
                } else {
                    alert('Error removing item from wishlist');
                }
            })
            .catch(error => console.error('Error:', error));
        }
    });
});
