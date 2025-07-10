<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SWABE APPAREL | ONLINE STORE</title>
    <link rel="stylesheet" href="../assets/bootswatch/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/icons.css">
    <link rel="stylesheet" href="../assets/css/fav_icons.css">
    <link rel="stylesheet" href="../assets/css/cards_hover.css"> 
    <link rel="stylesheet" href="../assets/css/add_to_cart.css">
    <link rel="stylesheet" href="../assets/css/toggle_switch.css">
    <link rel="stylesheet" href="../assets/css/products_card_animation.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>

</style>
</head>


<body>
    <?php include('./components/navigation_bar.php'); ?>
    <div class="toggle-peek-container switch-box bg-white p-4 rounded shadow-sm d-flex flex-column align-items-center mt-5">
        <div class="form-check form-switch mb-2" style="display: flex; align-items: center;">
            <input class="form-check-input" type="checkbox" id="themeSwitch">
            <label class="form-check-label ms-2" for="themeSwitch" style="font-size: 1.1rem;">
                <span id="toggleLabelText">Show Banner</span>
            </label>
        </div>
        <small class="text-muted text-center">Toggle between information and banner</small>
    </div>
    
    <?php
    include '../back-end/user-side/get_products.php';
    $bannerProductsData = getProducts($conn, 0, 24, './uploads/'); // fetch latest 24 products
    $bannerProducts = isset($bannerProductsData['products']) ? $bannerProductsData['products'] : $bannerProductsData;
    ?>
    <div id="swabeApparelSection">
        <?php include('./components/swabe_apparel.php'); ?>
    </div>
    <div id="productBannerSection" style="display: none;">
        <?php include('./components/product_banner.php'); ?>
    </div>

    <div class="section-content" style="background: #000 !important; height: 52vh; padding-top: -70px; padding-left: 100px; padding-right: 100px;" id="section-content"
        style="margin-top: -120px;">
        <div class="row w-100">
            <div class="col-md-6 left-column" style="padding: 100px;">
                <?php include('./components/find_your_style.php'); ?>
            </div>
            <div class="col-md-6 right-column d-flex align-items-center">
                <?php include('./components/feature_icons.php'); ?>
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
                $products = isset($limitedProducts['products']) ? $limitedProducts['products'] : $limitedProducts;
                
                if (is_array($products)) {
                    foreach ($products as $index => $product) {
                        $isLeft = $index < 6 ? 'left' : 'right';
                        include './components/product_card.php';
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
    <script src="../assets/js/load-more.js"></script>
    <script src="../assets/js/home_cards.js"></script>
    <script src="../assets/js/toggle_switch.js"></script>
    <?php include('./components/footer.php'); ?>
    <?php include('./components/modal.php'); ?>
    <?php include('./components/add_to_cart.php'); ?>
</body>

</html>