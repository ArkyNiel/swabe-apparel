<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SHIRTS | SWABE APPAREL</title>
    <link rel="stylesheet" href="../../assets/bootswatch/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/custom_navbar.css">
    <link rel="stylesheet" href="../../assets/css/products_card_animation.css">
    <link rel="stylesheet" href="../../assets/css/card_icons.css">
    <link rel="stylesheet" href="../../assets/css/cards_hover.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

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
          $limitedProducts = getProducts($conn, 0, $productsPerPage, '../uploads/', 'Shirts');
          
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
                <div class="card-actions">
                    <button class="btn favorite-btn" title="Add to Favorites">
                        <i class="far fa-heart"></i>
                    </button>
                    <button class="btn cart-btn" title="Add to Cart">
                        <i class="fas fa-cart-shopping"></i>
                    </button>
                </div>
            </div>
            <?php
          }
        ?>
        </div>

        <!-- Load More Button -->
        <div class="text-center my-4" id="load-more-container"
            style="display: <?php echo count($limitedProducts) >= $productsPerPage ? 'block' : 'none'; ?>">
            <button id="load-more-btn" class="btn btn-primary">
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
    // loadmore feature
    const productsData = <?php echo json_encode($limitedProducts ?? []); ?>;
    let offset = productsData.length;
    </script>
    <script src="../../assets/js/load-more.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Select all product cards
        const productCards = document.querySelectorAll('.product-card');
        productCards.forEach(card => {
            card.addEventListener('click', function() {
                // Set modal content
                document.getElementById('modalProductImage').src = this.getAttribute(
                    'data-image');
                document.getElementById('modalProductName').textContent = this.getAttribute(
                    'data-name');
                document.getElementById('modalProductColor').textContent = this.getAttribute(
                    'data-color');
                document.getElementById('modalProductSize').textContent = this.getAttribute(
                    'data-size');
                document.getElementById('modalProductPrice').textContent = this.getAttribute(
                    'data-price');
                // Show modal
                var modal = new bootstrap.Modal(document.getElementById('productModal'));
                modal.show();
            });
        });

        // Lightbox for full image view
        const imgContainer = document.querySelector('#productModal .img-hover-container');
        const img = document.getElementById('modalProductImage');
        const lightboxModal = new bootstrap.Modal(document.getElementById('lightboxModal'));
        const lightboxImage = document.getElementById('lightboxImage');

        if (imgContainer && img && lightboxImage) {
            imgContainer.addEventListener('click', function() {
                if (img.src) {
                    lightboxImage.src = img.src;
                    lightboxModal.show();
                }
            });
        }

        // Fix for lingering modal backdrop and modal-open class
        const modals = document.querySelectorAll('.modal');
        modals.forEach(function(modal) {
            modal.addEventListener('hidden.bs.modal', function() {
                // Remove any lingering backdrops
                document.querySelectorAll('.modal-backdrop').forEach(function(backdrop) {
                    backdrop.parentNode.removeChild(backdrop);
                });
                // Remove modal-open from body if no modals are open
                if (!document.querySelector('.modal.show')) {
                    document.body.classList.remove('modal-open');
                    document.body.style = '';
                }
            });
        });
    });
    </script>
    <footer class="footer bg-dark text-white py-5 mt-5" style="font-size: 0.95rem;">
        <div class="container text-center">
            <span>&copy; <?php echo date('Y'); ?> Swabe Apparel. All rights reserved.</span>
            <br>
            <a href="privacy_policy.php" class="text-warning text-decoration-none mx-2" target="_blank">Privacy
                Policy</a>
            <a href="terms_of_service.php" class="text-warning text-decoration-none mx-2" target="_blank">Terms of
                Service</a>
        </div>
    </footer>


    <?php include(__DIR__ . '/../components/modal.php'); ?>
</body>

</html>
