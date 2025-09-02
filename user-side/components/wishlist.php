<style>
.dropdown-menu {
    min-width: 450px !important;
    max-height: 400px !important;
    overflow-y: auto !important;
}

.dropdown-menu::-webkit-scrollbar {
    width: 6px;
}

.dropdown-menu::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 3px;
}

.dropdown-menu::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 3px;
}

.dropdown-menu::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}

.wishlist-item {
    padding: 12px 16px;
    border-bottom: 1px solid #f0f0f0;
    transition: background-color 0.2s ease;
    flex-shrink: 0;
    color: #101820 !important;
    cursor: pointer;
}

.wishlist-item:hover {
    background-color: #f8f9fa !important;
}

.wishlist-item:last-child {
    border-bottom: none;
}

.wishlist-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 4px;
}

.wishlist-title {
    font-weight: 600;
    color: #101820 !important;
    font-size: 13px;
    text-transform: uppercase;
}

.wishlist-time {
    font-size: 11px;
    color: #666 !important;
}

.wishlist-content {
    color: #101820 !important;
    font-size: 12px;
    line-height: 1.4;
}

.wishlist-header-text {
    display: flex;
    align-items: center;
    color: #101820 !important;
    text-decoration: none !important;
    text-transform: uppercase !important;
    font-weight: 600;
    font-size: 13px;
    padding: 8px 16px;
    border-bottom: 1px solid #e9ecef;
    position: sticky;
    top: 0;
    background-color: #fcfcea;
    z-index: 1;
}

.remove-wishlist {
    color: #dc3545;
    cursor: pointer;
    font-size: 14px;
    margin-left: 10px;
}
</style>

<div class="nav-item dropdown">
    <a class="nav-link" href="#" id="wishlistDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside">
        <i class="fa-solid fa-heart" style="color: #fee715;"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" style="background-color: #fcfcea !important;">
        <li class="wishlist-header-text">
            <i class="fa-solid fa-heart" style="margin-right: 8px; color: #fee715;"></i>
            Wishlist
        </li>
        <li class="wishlist-item">
            <div class="wishlist-header">
                <span class="wishlist-title">
                    Nike Air Max Added
                </span>
                <span class="wishlist-time">Just now</span>
                <i class="fa-solid fa-heart remove-wishlist" title="Remove from wishlist"></i>
            </div>
            <div class="wishlist-content">
                <img src="../../assets/img/logo.jpg" alt="Nike Air Max" style="width: 50px; height: 50px; margin-right: 10px; float: left;">
                Nike Air Max shoes added to wishlist. Size: 10.
            </div>
        </li>
        <li class="wishlist-item">
            <div class="wishlist-header">
                <span class="wishlist-title">
                    Polo Shirt Added
                </span>
                <span class="wishlist-time">5m ago</span>
                <i class="fa-solid fa-heart remove-wishlist" title="Remove from wishlist"></i>
            </div>
            <div class="wishlist-content">
                <img src="../../assets/img/logo.jpg" alt="Polo Shirt" style="width: 50px; height: 50px; margin-right: 10px; float: left;">
                Polo Ralph Lauren shirt added to wishlist. Size: M.
            </div>
        </li>
        <li class="wishlist-item">
            <div class="wishlist-header">
                <span class="wishlist-title">
                    Air Jordan Added
                </span>
                <span class="wishlist-time">10m ago</span>
                <i class="fa-solid fa-heart remove-wishlist" title="Remove from wishlist"></i>
            </div>
            <div class="wishlist-content">
                <img src="../../assets/img/logo.jpg" alt="Air Jordan" style="width: 50px; height: 50px; margin-right: 10px; float: left;">
                Air Jordan sneakers added to wishlist. Size: 9.
            </div>
        </li>
        <li class="wishlist-item">
            <div class="wishlist-header">
                <span class="wishlist-title">
                    Supreme Hoodie Added
                </span>
                <span class="wishlist-time">1h ago</span>
                <i class="fa-solid fa-heart remove-wishlist" title="Remove from wishlist"></i>
            </div>
            <div class="wishlist-content">
                <img src="../../assets/img/logo.jpg" alt="Supreme Hoodie" style="width: 50px; height: 50px; margin-right: 10px; float: left;">
                Supreme hoodie added to wishlist. Size: L.
            </div>
        </li>
        <li class="wishlist-item">
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
