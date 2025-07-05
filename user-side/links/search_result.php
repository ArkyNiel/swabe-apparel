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
        <?php include('components/navigation_bar.php'); ?>
        <?php include('../components/loader.php'); ?>

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
                    $stmt = $conn->prepare("SELECT COUNT(*) FROM inventory WHERE product_name LIKE :search OR category LIKE :search OR color LIKE :search OR size LIKE :search");
                    $stmt->execute(['search' => "%$searchQuery%"]);
                    $totalProducts = $stmt->fetchColumn();

                    $stmt = $conn->prepare("SELECT * FROM inventory WHERE product_name LIKE :search OR category LIKE :search OR color LIKE :search OR size LIKE :search LIMIT :offset, :limit");
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
                ?>
                    <div class="col-md-2 mb-4 product-item">
                        <div class="card-container <?php echo $isLeft; ?>">
                            <div class="card product-card" style="width: 100%; height: 300px; cursor:pointer;"
                                data-name="<?php echo htmlspecialchars($product['product_name'] ?? ''); ?>"
                                data-image="<?php echo htmlspecialchars($product['image'] ?? ''); ?>"
                                data-color="<?php echo htmlspecialchars($product['color'] ?? 'N/A'); ?>"
                                data-size="<?php echo htmlspecialchars($product['size'] ?? 'N/A'); ?>"
                                data-price="<?php echo htmlspecialchars($product['price'] ?? 'N/A'); ?>">
                                <img src="<?php echo htmlspecialchars($product['image'] ?? ''); ?>" class="card-img-top"
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
        document.querySelectorAll('.product-card').forEach(function(card) {
            card.addEventListener('click', function() {
                document.getElementById('productModalProductImage').src = this.getAttribute('data-image');
                document.getElementById('productModalProductName').textContent = this.getAttribute('data-name');
                document.getElementById('productModalProductColor').textContent = this.getAttribute('data-color');
                document.getElementById('productModalProductSize').textContent = this.getAttribute('data-size');
                document.getElementById('productModalProductPrice').textContent = this.getAttribute('data-price');
                var modal = new bootstrap.Modal(document.getElementById('productModal'));
                modal.show();
            });
        });

        document.querySelectorAll('.cart-btn').forEach(function(btn) {
            btn.addEventListener('click', function(event) {
                event.stopPropagation(); 
                var name = this.getAttribute('data-name');
                var image = this.getAttribute('data-image');
                var size = this.getAttribute('data-size');
                var price = this.getAttribute('data-price');

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
            });
        });
    });
    </script>

    <footer class="footer bg-dark text-white py-5" style="font-size: 0.95rem; background: #000 !important;">
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
    <?php include(__DIR__ . '/../components/add_to_cart.php'); ?>
</body>

</html>