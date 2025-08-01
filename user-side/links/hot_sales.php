<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOT SALES | SWABE APPAREL</title>
    <link rel="stylesheet" href="../../assets/bootswatch/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/custom_navbar.css">
    <link rel="stylesheet" href="../../assets/css/fav_icons.css">
    <link rel="stylesheet" href="../../assets/css/products_card_animation.css">
    <link rel="stylesheet" href="../../assets/css/cards_hover.css">
    <link rel="stylesheet" href="../../assets/css/cards_radius.css">
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

</style>

<body>
    <div class="content-wrap">
    <?php include('../components/navigation_bar.php'); ?>
    <?php include('../components/loader.php'); ?>

    <!-- cards -->
    <div class="container section-content">
        <h1 class="mb-5 mt-5 text-center">hot sales</h1>
        <div class="row" id="products-container">
            <?php
            include '../../connection/connection.php';
            include '../../back-end/user-side/get_products.php';
            
            $productsPerPage = 24;
            $limitedProductsData = getProducts($conn, 0, $productsPerPage, '../uploads/', null);
            $limitedProducts = isset($limitedProductsData['products']) ? $limitedProductsData['products'] : $limitedProductsData;
            
            if (is_array($limitedProducts)) {
              foreach ($limitedProducts as $index => $product) {
                $isLeft = $index < 6 ? 'left' : 'right';
                include '../components/product_card.php';
              }
            } else {
              echo '<div class="col-12 text-center"><p class="text-danger">Error: Invalid product data format</p></div>';
            }
            ?>
        </div>

        <!-- Load More Button -->
        <div class="text-center my-4" id="load-more-container"
            style="display: <?php echo count($limitedProducts) >= $productsPerPage ? 'block' : 'none'; ?>">
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
    const productsData = <?php echo json_encode($limitedProducts ?? []); ?>;
    let offset = productsData.length;
    </script>
    <script src="../../assets/js/load-more.js"></script>  
    <script src="../../assets/js/cards.js"></script>

    
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

    <?php include('../components/modal.php'); ?>
    <?php include('../components/add_to_cart.php'); ?>
</body>
</html>
