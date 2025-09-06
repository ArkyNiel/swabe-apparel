<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ALL PRODUCTS | SWABE APPAREL</title>
    <link rel="stylesheet" href="../../assets/bootswatch/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/products-card-animation.css">
    <link rel="stylesheet" href="../../assets/css/card_icons.css">
    <link rel="stylesheet" href="../../assets/css/cards_hover.css">
    <link rel="stylesheet" href="../../assets/css/fav_icons.css">
    <link rel="stylesheet" href="../../assets/css/cards_radius.css">
    <link rel="stylesheet" href="../../assets/css/global.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

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
        margin-top: auto;
    }
    footer a:hover {
        text-decoration: underline !important;
    }
</style>

<body>
    <div class="content-wrap">
        <?php
        session_start();
        include('../components/navigation_bar.php');
        include('../components/loader.php');
        ?>

        <!-- cards -->
        <div class="container section-content">
            <h1 class="mb-5 mt-5 text-center">related search</h1>
            <div class="row" id="products-container">
                <?php
                include '../../connection/connection.php';
                include '../../back-end/user-side/get_products.php';

                $productsPerPage = 24;
                $totalProducts = 0;
                $searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';

                if ($searchQuery !== '') {
                    $stmt = $conn->prepare("SELECT COUNT(*) FROM inventory WHERE product_name LIKE :search");
                    $stmt->execute(['search' => "%$searchQuery%"]);
                    $totalProducts = $stmt->fetchColumn();

                    $stmt = $conn->prepare("SELECT * FROM inventory WHERE product_name LIKE :search LIMIT :offset, :limit");
                    $offset = 0;
                    $stmt->bindValue(':search', "%$searchQuery%", PDO::PARAM_STR);
                    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
                    $stmt->bindValue(':limit', $productsPerPage, PDO::PARAM_INT);
                    $stmt->execute();
                    $rawProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    
                    $products = [];
                    foreach ($rawProducts as $product) {
                        if (!empty($product['image_path'])) {
                            $product['image'] = '../uploads/' . $product['image_path'];
                        } else {
                            $product['image'] = '';
                        }
                        $products[] = $product;
                    }
                } else {
                    $stmt = $conn->query("SELECT COUNT(*) FROM inventory");
                    if ($stmt) {
                        $totalProducts = $stmt->fetchColumn();
                    }
                    $productsData = getProducts($conn, 0, $productsPerPage, '../uploads/');
                    
                    $products = isset($productsData['products']) ? $productsData['products'] : $productsData;
                }

                if (is_array($products) && count($products) > 0) {
                    foreach ($products as $index => $product) {
                        $isLeft = $index < 6 ? 'left' : 'right';
                        include '../components/product_card.php';
                    }
                } else {
                    echo '<div class="col-12 text-center"><p class="text-muted">No products found.</p></div>';
                }
                ?>
            </div>

            <!-- Load More Button -->
            <div class="text-center my-4" id="load-more-container"
                style="display: <?php echo (is_array($products) && count($products) >= $productsPerPage) ? 'block' : 'none'; ?>;">
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
    const productsData = <?php echo json_encode($products ?? []); ?>;
    </script>
    <script>
    window.GET_PRODUCTS_URL = '../../back-end/user-side/get_products.php';
    window.UPLOAD_PREFIX = '../uploads/';
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

            // Use the global function to populate the modal
            if (window.populateCartModal) {
                window.populateCartModal(name, image, price, size, size);
            }

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

    <?php if (isset($_SESSION['alert'])): ?>
        <div id="successAlert" class="alert alert-<?php echo $_SESSION['alert']['type']; ?> fade show" role="alert" style="position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 1060;">
            <?php echo htmlspecialchars($_SESSION['alert']['message']); ?>
        </div>
        <?php unset($_SESSION['alert']); ?>
    <?php endif; ?>

    <script>
    setTimeout(() => {
        const alert = document.getElementById('successAlert');
        if (alert) {
            alert.classList.remove('show');
            setTimeout(() => alert.remove(), 150);
        }
    }, 5000);
    </script>

    <?php include(__DIR__ . '/../components/footer.php'); ?>
    <?php include(__DIR__ . '/../components/modal.php'); ?>
    <?php include(__DIR__ . '/../components/add_to_cart.php'); ?>
</body>

</html>