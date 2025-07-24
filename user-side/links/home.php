<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SWABE APPAREL | ONLINE STORE</title>
    <link rel="stylesheet" href="../../assets/bootswatch/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/icons.css">
    <link rel="stylesheet" href="../../assets/css/fav_icons.css">
    <link rel="stylesheet" href="../../assets/css/cards_hover.css"> 
    <link rel="stylesheet" href="../../assets/css/add_to_cart.css">
    <link rel="stylesheet" href="../../assets/css/toggle_switch.css">
    <link rel="stylesheet" href="../../assets/css/products_card_animation.css">
    <link rel="stylesheet" href="../../assets/css/cart.css">
    <link rel="stylesheet" href="../../assets/css/modal.css">
    <link rel="stylesheet" href="../../assets/css/cards_radius.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>


<body>
    <?php include('../components/navigation_bar.php'); ?>
    <div class="toggle-peek-container switch-box bg-white p-4 rounded shadow-sm d-flex flex-column align-items-center mt-5">
        <div class="form-check form-switch mb-2" style="display: flex; align-items: center;">
            <input class="form-check-input" type="checkbox" id="themeSwitch">
            <label class="form-check-label ms-2" for="themeSwitch" style="font-size: 1.1rem;">
                <span id="toggleLabelText">Show Banner</span>
            </label>
        </div>
        <small class="text-muted text-center">Toggle between information and product</small>
    </div>
    
    <?php
    include '../../back-end/user-side/get_products.php';
    $bannerProductsData = getProducts($conn, 0, 24, './uploads/'); // fetch latest 24 products
    $bannerProducts = isset($bannerProductsData['products']) ? $bannerProductsData['products'] : $bannerProductsData;
    ?>
    <div id="swabeApparelSection">
        <?php include('../components/swabe_apparel.php'); ?>
    </div>
    <div id="productBannerSection" style="display: none;">
        <?php include('../components/product_banner.php'); ?>
    </div>

    <div class="section-content" style="background: #000 !important; height: 52vh; padding-top: -70px; padding-left: 100px; padding-right: 100px;" id="section-content"
        style="margin-top: -120px;">
        <div class="row w-100">
            <div class="col-md-6 left-column" style="padding: 100px;">
                <div class="content-wrapper" style="max-width: 500px;">
                    <h1 class="text-warning">Find Your Style</h1>
                    <h1 class="text-white">Discover the latest trends and exclusive collections at Swabe Apparel</h1>
                    <p class="text-white">Elevate your wardrobe with our carefully curated selection of premium clothing. From casual essentials to statement pieces, find the perfect addition to your style.</p>
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
            $limitedProducts = getProducts($conn, 0, $productsPerPage, '../uploads/');
            
            if (isset($limitedProducts['error'])) {
                echo '<div class="col-12 text-center"><p class="text-danger">Error loading products: ' . $limitedProducts['error'] . '</p></div>';
            } else {
                $products = isset($limitedProducts['products']) ? $limitedProducts['products'] : $limitedProducts;
                
                if (is_array($products)) {
                    foreach ($products as $index => $product) {
                        $isLeft = $index < 6 ? 'left' : 'right';
                        include '../components/product_card.php';
                    }
                } else {
                    echo '<div class="col-12 text-center"><p class="text-danger">Error: Invalid product data format</p></div>';
                }
            }
            ?>
        </div>
        <!-- Load More Button -->
        <div class="text-center my-4" id="load-more-container">
            <button id="load-more-btn" class="btn btn-primary" style="background: #000 !important; border: 1px solid #000 !important;">
                <i class="fas fa-chevron-down"></i> Load More
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script>
        window.productsData = <?php echo json_encode(isset($limitedProducts['products']) ? $limitedProducts['products'] : ($limitedProducts ?? [])); ?>;
        window.initialProductsCount = <?php echo count(isset($limitedProducts['products']) ? $limitedProducts['products'] : ($limitedProducts ?? [])); ?>;
    </script>
    <script>
        window.GET_PRODUCTS_URL = "../../back-end/user-side/get_products.php";
        window.UPLOAD_PREFIX = "../uploads/"; 
        window.PRODUCT_CATEGORY = ""; 
        window.INITIAL_PRODUCTS_COUNT = <?php echo isset($limitedProducts['products']) ? count($limitedProducts['products']) : 0; ?>;
        window.SEARCH_QUERY = ""; 
    </script>
    <script src="../../assets/js/load-more.js"></script>
    <script src="../../assets/js/cards.js"></script>
    <script src="../../assets/js/toggle_switch.js"></script>
    <script src="../../assets/js/add_to_cart.js"></script>

    <?php include('../components/footer.php'); ?>
    <?php include('../components/modal.php'); ?>
    <?php include('../components/add_to_cart.php'); ?>
    
</body>

</html>