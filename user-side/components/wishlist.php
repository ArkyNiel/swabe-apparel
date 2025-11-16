<link rel="stylesheet" href="../../assets/css/wishlist.css">
<div class="nav-item dropdown">
    <a class="nav-link" href="#" id="wishlistDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside">
        <i class="fa-solid fa-heart" style="color: #fee715;"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" style="background-color: #fcfcea !important;" id="wishlistMenu">
        <li class="wishlist-header-text">
            <i class="fa-solid fa-heart" style="margin-right: 8px; color: #fee715;"></i>
            Wishlist
        </li>
        <!-- Wishlist items will be loaded here via JavaScript -->
        <li class="wishlist-item" id="noWishlistItems" style="display: none;">
            <div class="wishlist-content">
                No items in wishlist
            </div>
        </li>
        <li class="wishlist-item" id="viewFullWishlist">
            <div class="wishlist-header">
                <span class="wishlist-title">
                    View Full Wishlist
                </span>
                <span class="wishlist-time"></span>
            </div>
            <div class="wishlist-content">
                <a href="../../user-side/links/wishlist.php" style="color: #101820; text-decoration: underline;">Click here to view your full wishlist</a>
            </div>
        </li>
    </ul>
</div>

<script src="../../assets/js/wishlist.js"></script>
