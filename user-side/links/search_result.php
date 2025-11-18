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
    <link rel="stylesheet" href="../../assets/css/footer.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <div class="content-wrap">
        <?php
        session_start();
        include('../components/navigation_bar.php');
        include('../components/loader.php');
        ?>

        <!-- cards -->
        <div class="container section-content">
            <?php
            $searchQuery = isset($_GET['search']) ? trim($_GET['search']) : '';
            ?>
            <h1 class="mb-5 mt-5 text-center">result for "<?php echo htmlspecialchars($searchQuery); ?>"</h1>
            <div class="row" id="products-container">
                <?php
                include '../../connection/connection.php';
                include '../../back-end/user-side/get_products.php';

                $productsPerPage = 24;
                $totalProducts = 0;

                if ($searchQuery !== '') {
                    $searchTerm = "%$searchQuery%";
                    $stmt = $conn->prepare("SELECT COUNT(*) FROM inventory WHERE LOWER(product_name) LIKE LOWER(:search) OR LOWER(category) LIKE LOWER(:search)");
                    $stmt->execute(['search' => $searchTerm]);
                    $totalProducts = $stmt->fetchColumn();

                    $stmt = $conn->prepare("SELECT * FROM inventory WHERE LOWER(product_name) LIKE LOWER(:search) OR LOWER(category) LIKE LOWER(:search) ORDER BY
                        CASE
                            WHEN LOWER(product_name) LIKE LOWER(:exact) THEN 1
                            WHEN LOWER(category) LIKE LOWER(:exact) THEN 2
                            ELSE 3
                        END, product_name LIMIT :offset, :limit");
                    $stmt->bindValue(':search', $searchTerm, PDO::PARAM_STR);
                    $stmt->bindValue(':exact', $searchQuery, PDO::PARAM_STR);
                    $stmt->bindValue(':offset', 0, PDO::PARAM_INT);
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
    window.SEARCH_QUERY = '<?php echo htmlspecialchars($searchQuery); ?>';
    window.INITIAL_PRODUCTS_COUNT = <?php echo count($products); ?>;
    window.PRODUCT_CATEGORY = '';
    </script>
    <script src="../../assets/js/load-more.js"></script>
    <script src="../../assets/js/cards.js"></script>
    <script src="../../assets/js/set_timeout.js"></script>
    <script>
    window.userLoggedIn = <?php echo isset($_SESSION['user_id']) ? 'true' : 'false'; ?>;
    </script>
    <script src="../../assets/js/alert.js"></script>
    <script src="../../assets/js/load_wishlist_hearts.js"></script>
    <script src="../../assets/js/product_interactions.js"></script>

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
    <?php include(__DIR__ . '/../components/login_req.php'); ?>
    <script src="../../assets/js/add_to_cart.js"></script>
</body>

</html>