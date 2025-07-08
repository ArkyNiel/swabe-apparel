<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHIRTS | SWABE APPAREL</title>
    <link rel="stylesheet" href="../../assets/bootswatch/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/custom_navbar.css">
    <link rel="stylesheet" href="../../assets/css/products_card_animation.css">
    <link rel="stylesheet" href="../../assets/css/fav_icons.css">
    <link rel="stylesheet" href="../../assets/css/cards_hover.css"> 
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<!-- footer style -->
<style>
    html, body {
    height: 100%;
    margin: 0;
    padding: 0;
}
body {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
}
.content-wrap {
    flex: 1 0 auto;
}
footer {
    flex-shrink: 0;
}
footer a:hover {
    text-decoration: underline !important;
}
.favorite-btn .fa-heart.red {
    color: red !important;
}
</style>

<body>
    <div class="content-wrap">
    <?php include('components/navigation_bar.php'); ?>
    <?php include('../components/loader.php'); ?>

    <!-- cards -->
    <div class="container section-content">
        <h1 class="mb-5 mt-5 text-center">recommend items</h1>
        <div class="row" id="products-container">
            <?php
          include '../../connection/connection.php';
          include '../../back-end/user-side/get_products.php';
          
          $productsPerPage = 24; // 12 per page meaning 2 row per load
          $limitedProductsData = getProducts($conn, 0, $productsPerPage, '../uploads/', 'Shirts');
          $limitedProducts = isset($limitedProductsData['products']) ? $limitedProductsData['products'] : $limitedProductsData;
          
          if (is_array($limitedProducts)) {
            foreach ($limitedProducts as $index => $product) {
              $isLeft = $index < 6 ? 'left' : 'right';
        ?>
            <div class="col-md-2 mb-4 product-item">
                <div class="card-container <?php echo $isLeft; ?>">
                    <div class="card product-card" style="width: 100%; height: 300px; cursor:pointer;"
                        data-name="<?php echo htmlspecialchars($product['product_name'] ?? ''); ?>"
                        data-image="<?php echo htmlspecialchars($product['image'] ?? ''); ?>"
                        data-color="<?php echo htmlspecialchars($product['color'] ?? 'N/A'); ?>"
                        data-size="<?php echo htmlspecialchars($product['size'] ?? 'N/A'); ?>"
                        data-price="<?php echo htmlspecialchars($product['price'] ?? 'N/A'); ?>">
                        <img src="<?php echo $product['image'] ?? ''; ?>" class="card-img-top"
                            alt="<?php echo $product['product_name'] ?? ''; ?>" style="height: 100%; object-fit: cover" />
                    </div>
                    <div class="buy-text">View</div>
                </div>
                <div class="card-actions d-flex justify-content-between align-items-center mt-2">
                    <h5 class="product-price">₱<?php echo htmlspecialchars($product['price'] ?? 'N/A'); ?></h5>
                    <div>
                        <button class="btn favorite-btn" title="Add to Favorites">
                            <i class="far fa-heart"></i>
                        </button>
                        <button 
                            class="btn cart-btn" 
                            title="Add to Cart"
                            data-name="<?php echo htmlspecialchars($product['product_name'] ?? ''); ?>"
                            data-image="<?php echo htmlspecialchars($product['image'] ?? ''); ?>"
                            data-size="<?php echo htmlspecialchars($product['size'] ?? 'N/A'); ?>"
                            data-price="<?php echo htmlspecialchars($product['price'] ?? 'N/A'); ?>"
                        >
                            <i class="fas fa-cart-shopping"></i>
                        </button>
                    </div>
                </div>
            </div>
            <?php
            }
          } else {
            echo '<div class="col-12 text-center"><p class="text-danger">Error: Invalid product data format</p></div>';
          }
        ?>
        </div>

        <!-- Load More Button -->
        <div class="text-center my-4" id="load-more-container"
            style="display: <?php echo (is_array($limitedProducts) && count($limitedProducts) >= $productsPerPage) ? 'block' : 'none'; ?>">
            <button id="load-more-btn" class="btn btn-primary" style="background: #000 !important; border: 1px solid #000 !important;">
                <i class="fas fa-chevron-down"></i> Load More
            </button>
        </div>
    </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
    <script>
    window.GET_PRODUCTS_URL = '../../back-end/user-side/get_products.php';
    window.UPLOAD_PREFIX = '../uploads/';
    window.PRODUCT_CATEGORY = 'Shirts';
    const productsData = <?php echo json_encode($limitedProducts ?? []); ?>;
    let offset = productsData.length;
    </script>
    <script src="../../assets/js/load-more.js"></script>
    <script>
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
</script>
    <footer class="footer bg-dark text-white py-5 mt-5" style="font-size: 0.95rem; background: #000 !important; ">
        <div class="container text-center">
            <span>&copy; <?php echo date('Y'); ?> Swabe Apparel. All rights reserved.</span>
            <br>
            <a href="privacy_policy.php" class="text-warning text-decoration-none mx-2" target="_blank">Privacy
                Policy</a>
            <a href="terms_of_service.php" class="text-warning text-decoration-none mx-2" target="_blank">Terms of
                Service</a>
        </div>
    </footer>

    <style>
        footer a:hover {
            text-decoration: underline !important;
        }
    </style>


    <?php include(__DIR__ . '/../components/modal.php'); ?>
    <?php include(__DIR__ . '/../components/add_to_cart.php'); ?>
</body>

</html>
