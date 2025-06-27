<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SWABE APPAREL | ONLINE STORE</title>
    <link rel="stylesheet" href="../assets/bootswatch/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/products_card_animation.css">
    <link rel="stylesheet" href="../assets/css/icons.css">
    <link rel="stylesheet" href="../assets/css/card_icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>


<body>
    <?php include('./components/navigation_bar.php'); ?>
    <?php include('./components/loader.php'); ?>
    <?php
    include '../back-end/user-side/get_products.php';
    $bannerProducts = getProducts($conn, 0, 12, './uploads/'); // fetch latest 12 products
    ?>
    <?php include('./components/product_banner.php'); ?>

    <div class="section-content mb-0 bg-primary" id="section-content"
        style="margin-top: -120px;">
        <div class="row w-100">
            <div class="col-md-6 left-column" style="padding: 100px;">
                <div class="content-wrapper" style="max-width: 500px;">
                    <h1 class="text-warning"">Find Your Style</h1>
                    <h1 class="text-warning">Discover the latest trends and exclusive collections at Swabe Apparel</h1>
                    <p class="text">Elevate your wardrobe with our carefully curated selection of premium clothing. From casual essentials to statement pieces, find the perfect addition to your style.</p>
                </div>
            </div>
            <div class="col-md-6 right-column d-flex align-items-center">
                <div class="text-center w-100">
                    <div class="row">
                        <div class="col-4 mb-4">
                            <div class="feature-icon-wrapper">
                                <i class="fas fa-tshirt fa-3x text-warning mb-3"></i>
                                <p class="text-white">Premium Quality</p>
                            </div>
                        </div>
                        <div class="col-4 mb-4">
                            <div class="feature-icon-wrapper">
                                <i class="fas fa-truck-fast fa-3x text-warning mb-3"></i>
                                <p class="text-white">Fast Delivery</p>
                            </div>
                        </div>
                        <div class="col-4 mb-4">
                            <div class="feature-icon-wrapper">
                                <i class="fas fa-tags fa-3x text-warning mb-3"></i>
                                <p class="text-white">Best Prices</p>
                            </div>
                        </div>
                        <div class="col-4 mb-4">
                            <div class="feature-icon-wrapper">
                                <i class="fas fa-undo fa-3x text-warning mb-3"></i>
                                <p class="text-white">Easy Returns</p>
                            </div>
                        </div>
                        <div class="col-4 mb-4">
                            <div class="feature-icon-wrapper">
                                <i class="fas fa-shield-alt fa-3x text-warning mb-3"></i>
                                <p class="text-white">Secure Shopping</p>
                            </div>
                        </div>
                        <div class="col-4 mb-4">
                            <div class="feature-icon-wrapper">
                                <i class="fas fa-headset fa-3x text-warning mb-3"></i>
                                <p class="text-white">24/7 Support</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- cards -->
    <div class="container section-content">
        <h1 class="mb-5 mt-5 text-center">recommend items</h1>
        <div class="row" id="products-container">
            <?php
            $productsPerPage = 24;
            $limitedProducts = getProducts($conn, 0, $productsPerPage, './uploads/');
            
            if (isset($limitedProducts['error'])) {
                echo '<div class="col-12 text-center"><p class="text-danger">Error loading products: ' . $limitedProducts['error'] . '</p></div>';
            } else {
                foreach ($limitedProducts as $index => $product) {
                    $isLeft = $index < 6 ? 'left' : 'right';
                    include './components/product_card.php';
                }
            }
            ?>
        </div>
        <!-- Load More Button -->
        <div class="text-center my-4" id="load-more-container">
            <button id="load-more-btn" class="btn btn-primary">
                <i class="fas fa-chevron-down"></i> Load More
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
    // loadmore feature
    const productsData = <?php echo json_encode($limitedProducts ?? []); ?>;
    </script>
    <script>
    window.GET_PRODUCTS_URL = '../back-end/user-side/get_products.php';
    window.UPLOAD_PREFIX = 'uploads/';
    </script>
    <script src="../assets/js/load-more.js"></script>
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        const productCards = document.querySelectorAll('.product-card');
        productCards.forEach(card => {
            card.addEventListener('click', function() {
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
                var modal = new bootstrap.Modal(document.getElementById('productModal'));
                modal.show();
            });
        });
    });
    </script>
    <?php include('./components/footer.php'); ?>
    <?php include('./components/modal.php'); ?>
</body>

</html>