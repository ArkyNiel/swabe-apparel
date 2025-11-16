<?php
include '../../back-end/user-side/get_cart.php';
?>

<link rel="stylesheet" href="../../assets/css/cart_notif.css">

<div class="nav-item dropdown">
    <a class="nav-link" href="#" id="cartDropdown" role="button" data-bs-toggle="dropdown" data-bs-auto-close="outside">
        <i class="fa-solid fa-cart-shopping"></i>
    </a>
    <ul class="dropdown-menu dropdown-menu-end" style="background-color: #fcfcea !important;">
        <li class="cart-header-text">
            <i class="fa-solid fa-cart-shopping" style="margin-right: 8px; color: #101820;"></i>
            Cart
        </li>
        <?php if (empty($cart_items)): ?>
        <li class="cart-item">
            <div class="cart-content">Your cart is empty.</div>
        </li>
        <?php else: ?>
        <?php foreach ($cart_items as $item): ?>
        <li class="cart-item">
            <div class="cart-header">
                <span class="cart-title">
                    <?php echo htmlspecialchars($item['product_name']); ?> Added
                </span>
                <span class="cart-time"><?php echo timeAgo($item['added_at']); ?></span>
            </div>
            <div class="cart-content">
                <?php echo htmlspecialchars($item['product_name']); ?> added to cart. Size: <?php echo htmlspecialchars($item['size']); ?>, Qty: <?php echo htmlspecialchars($item['quantity']); ?>.
            </div>
        </li>
        <?php endforeach; ?>
        <?php endif; ?>
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
