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
    <link rel="stylesheet" href="../../assets/css/swabe_apparel.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<style>
    body {
        background-color: #fcfcea !important;
    }
</style>

<body>
    <?php include('../components/navigation_bar.php'); ?>
    <?php
    include '../../back-end/user-side/get_products.php';
    $bannerProductsData = getProducts($conn, 0, 24, '../uploads/'); // fetch latest 24 products
    $bannerProducts = isset($bannerProductsData['products']) ? $bannerProductsData['products'] : $bannerProductsData;
    ?>
    
    <!-- Auto-show modal for swabe apparel -->
    <div id="swabeModal" class="modal fade" style="display: none;" tabindex="-1" role="dialog" aria-labelledby="swabeModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered" role="document">
            <div class="modal-content border-0 shadow">
                <div class="modal-header border-0 pb-0">
                    <button type="button" class="btn-close" onclick="closeSwabeModal()" aria-label="Close"></button>
                </div>
                <div class="modal-body p-0">
                </div>   
            </div>
        </div>
    </div>
    
    <!-- Modal backdrop -->
    <div id="modalBackdrop" class="modal-backdrop fade" style="display: none;"></div>
    
    <div id="productBannerSection">
        <?php
        if (isset($bannerProducts)) {
            include('../components/product_banner.php');
        } else {
            echo '<div class="text-danger">No banner products found.</div>';
        }
        ?>
    </div>

    <div class="section-content" style="background: #101820 !important; height: 52vh; padding-top: -70px; padding-left: 100px; padding-right: 100px;" id="section-content"
        style="margin-top: -120px;">
        <div class="row w-100">
            <div class="col-md-6 left-column" style="padding: 100px;">
                <div class="content-wrapper" style="max-width: 500px;">
                    <h1 class="text-warning" style="color: #fee715 !important;">Find Your Style</h1>
                    <h1 class="text-white" style="color: #fee715 !important;">Discover the latest trends and exclusive collections at Swabe Apparel</h1>
                    <p class="text-white" >Elevate your wardrobe with our carefully curated selection of premium clothing. From casual essentials to statement pieces, find the perfect addition to your style.</p>
                </div>
            </div>
            <div class="col-md-6 right-column d-flex align-items-center">
                <div class="text-center w-100">
                    <div class="row">
                        <div class="col-4 mb-4">
                            <div class="feature-icon-wrapper">
                                <i class="fas fa-tshirt fa-3x mb-3" style="color: #fee715 !important;"></i>
                                <p class="text-white">Premium Quality</p>
                            </div>
                        </div>
                        <div class="col-4 mb-4">
                            <div class="feature-icon-wrapper">
                                <i class="fas fa-truck-fast fa-3x mb-3" style="color: #fee715 !important;"></i>
                                <p class="text-white">Fast Delivery</p>
                            </div>
                        </div>
                        <div class="col-4 mb-4">
                            <div class="feature-icon-wrapper">
                                <i class="fas fa-tags fa-3x mb-3" style="color: #fee715 !important;"></i>
                                <p class="text-white">Best Prices</p>
                            </div>
                        </div>
                        <div class="col-4 mb-4">
                            <div class="feature-icon-wrapper">
                                <i class="fas fa-undo fa-3x mb-3" style="color: #fee715 !important;"></i>
                                <p class="text-white">Easy Returns</p>
                            </div>
                        </div>
                        <div class="col-4 mb-4">
                            <div class="feature-icon-wrapper">
                                <i class="fas fa-shield-alt fa-3x mb-3" style="color: #fee715 !important;"></i>
                                <p class="text-white">Secure Shopping</p>
                            </div>
                        </div>
                        <div class="col-4 mb-4">
                            <div class="feature-icon-wrapper">
                                <i class="fas fa-headset fa-3x mb-3" style="color: #fee715 !important;"></i>
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
        <div class="text-center my-4" id="load-more-container" >
            <button id="load-more-btn" class="btn btn-primary" style="background: #101820 !important; border: 1px solid #101820 !important;">
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
    <script src="../../assets/js/add_to_cart.js"></script>
    
    <script>
        function closeSwabeModal() {
            const modal = document.getElementById('swabeModal');
            const backdrop = document.getElementById('modalBackdrop');
            
            // bug sa backdrop
            modal.style.display = 'none';
            backdrop.style.display = 'none';
            
            modal.classList.remove('show', 'fade');
            backdrop.classList.remove('show', 'fade');
            
            document.body.classList.remove('modal-open');
            
            modal.removeAttribute('style');
            backdrop.removeAttribute('style');
            
            backdrop.style.zIndex = '-1';
            
            backdrop.style.backgroundColor = 'transparent';
            backdrop.style.background = 'transparent';
        }
        
        document.addEventListener('DOMContentLoaded', function() {
            const modal = document.getElementById('swabeModal');
            const backdrop = document.getElementById('modalBackdrop');
            
            modal.style.display = 'block';
            modal.classList.add('show');
            backdrop.style.display = 'block';
            backdrop.classList.add('show');
            document.body.classList.add('modal-open');
            
            modal.addEventListener('click', function(e) {
                if (e.target === modal) {
                    closeSwabeModal();
                }
            });
            
            // Close modal with Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeSwabeModal();
                }
            });
        });
    </script>

    <?php include('../components/footer.php'); ?>
    <?php include('../components/modal.php'); ?>
    <?php include('../components/add_to_cart.php'); ?>
    
</body>

</html>