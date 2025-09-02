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

.cart-item {
    padding: 12px 16px;
    border-bottom: 1px solid #f0f0f0;
    transition: background-color 0.2s ease;
    flex-shrink: 0;
    color: #101820 !important;
    cursor: pointer;
}

.cart-item:hover {
    background-color: #f8f9fa !important;
}

.cart-item:last-child {
    border-bottom: none;
}

.cart-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 4px;
}

.cart-title {
    font-weight: 600;
    color: #101820 !important;
    font-size: 13px;
    text-transform: uppercase;
}

.cart-time {
    font-size: 11px;
    color: #666 !important;
}

.cart-content {
    color: #101820 !important;
    font-size: 12px;
    line-height: 1.4;
}

.cart-badge {
    background-color: #dc3545;
    color: white;
    border-radius: 50%;
    width: 8px;
    height: 8px;
    display: inline-block;
    margin-right: 8px;
}

.cart-header-text {
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
</style>

<div class="nav-item dropdown">
    <a class="nav-link" href="#" id="cartDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside">
        <i class="fa-solid fa-cart-shopping"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" style="background-color: #fcfcea !important;">
        <li class="cart-header-text">
            <i class="fa-solid fa-cart-shopping" style="margin-right: 8px; color: #101820;"></i>
            Cart
        </li>
        <li class="cart-item">
            <div class="cart-header">
                <span class="cart-title">
                    Nike Air Max Added
                </span>
                <span class="cart-time">Just now</span>
            </div>
            <div class="cart-content">
                <img src="../../assets/img/logo.jpg" alt="Nike Air Max" style="width: 50px; height: 50px; margin-right: 10px; float: left;">
                Nike Air Max shoes have been added to your cart. Size: 10, Qty: 1.
            </div>
        </li>
        <li class="cart-item">
            <div class="cart-header">
                <span class="cart-title">
                    Polo Shirt Added
                </span>
                <span class="cart-time">5m ago</span>
            </div>
            <div class="cart-content">
                <img src="../../assets/img/logo.jpg" alt="Polo Shirt" style="width: 50px; height: 50px; margin-right: 10px; float: left;">
                Polo Ralph Lauren shirt added to cart. Size: M, Qty: 2.
            </div>
        </li>
        <li class="cart-item">
            <div class="cart-header">
                <span class="cart-title">
                    Air Jordan Added
                </span>
                <span class="cart-time">10m ago</span>
            </div>
            <div class="cart-content">
                <img src="../../assets/img/logo.jpg" alt="Air Jordan" style="width: 50px; height: 50px; margin-right: 10px; float: left;">
                Air Jordan sneakers added to cart. Size: 9, Qty: 1.
            </div>
        </li>
        <li class="cart-item">
            <div class="cart-header">
                <span class="cart-title">
                    Air Jordan Added
                </span>
                <span class="cart-time">10m ago</span>
            </div>
            <div class="cart-content">
                <img src="../../assets/img/logo.jpg" alt="Air Jordan" style="width: 50px; height: 50px; margin-right: 10px; float: left;">
                Air Jordan sneakers added to cart. Size: 9, Qty: 1.
            </div>
        </li>
        <li class="cart-item">
            <div class="cart-header">
                <span class="cart-title">
                    Air Jordan Added
                </span>
                <span class="cart-time">10m ago</span>
            </div>
            <div class="cart-content">
                <img src="../../assets/img/logo.jpg" alt="Air Jordan" style="width: 50px; height: 50px; margin-right: 10px; float: left;">
                Air Jordan sneakers added to cart. Size: 9, Qty: 1.
            </div>
        </li>
        <li class="cart-item">
            <div class="cart-header">
                <span class="cart-title">
                    Air Jordan Added
                </span>
                <span class="cart-time">10m ago</span>
            </div>
            <div class="cart-content">
                <img src="../../assets/img/logo.jpg" alt="Air Jordan" style="width: 50px; height: 50px; margin-right: 10px; float: left;">
                Air Jordan sneakers added to cart. Size: 9, Qty: 1.
            </div>
        </li>
        <li class="cart-item">
            <div class="cart-header">
                <span class="cart-title">
                    View Full Cart
                </span>
                <span class="cart-time"></span>
            </div>
            <div class="cart-content">
                <a href="../../user-side/components/cart.php" style="color: #101820; text-decoration: underline;">Click here to view your full cart</a>
            </div>
        </li>
        
    </ul>
</div>
