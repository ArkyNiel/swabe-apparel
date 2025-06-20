<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>NEW PRODUCTS | SWABE APPAREL</title>
    <link rel="stylesheet" href="../../assets/bootswatch/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/custom-navbar.css">
    <link rel="stylesheet" href="../../assets/css/products-card-animation.css">
    <link rel="stylesheet" href="../../assets/css/item-cards.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>
    <?php include('components/navigationbar.php'); ?>
    <?php include('../components/loader.php'); ?>

    <!-- cards -->
    <div class="container section-content">
        <h1 class="mb-5 mt-5 text-center">recommend items</h1>
        <div class="row" id="products-container">
        </div>

        <!-- Load More Button -->
        <div class="text-center my-4" id="load-more-container" style="display: block;">
            <button id="load-more-btn" class="btn btn-primary">
                <i class="fas fa-chevron-down"></i> Load More
            </button>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
    <script>
    const productsPerPage = 12;
    let currentStart = 0;
    let allProductsLoaded = false;

    function renderProducts(products) {
        const container = document.getElementById('products-container');
        products.forEach((product, index) => {
            // Fix image path
            if (product.image && product.image.startsWith('./uploads/')) {
                product.image = '../uploads/' + product.image.substring('./uploads/'.length);
            }
            console.log(product.image); // Debug: see the image path
            const isLeft = ((currentStart + index) < 6) ? 'left' : 'right';
            const productHTML = `
                <div class="col-md-2 mb-4 product-item">
                    <div class="card-container ${isLeft}">
                        <div class="card product-card" style="width: 100%; height: 300px; cursor:pointer;"
                            data-name="${product.name || ''}"
                            data-image="${product.image || ''}"
                            data-color="${product.color || 'N/A'}"
                            data-size="${product.size || 'N/A'}"
                            data-price="${product.price || 'N/A'}">
                            <img src="${product.image || ''}" class="card-img-top"
                                alt="${product.name || ''}" style="min-height: 150px; height: 100%; width: 100%; object-fit: cover; border: 2px solid red;" />
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
            `;
            container.insertAdjacentHTML('beforeend', productHTML);
        });
    }

    function loadProducts() {
        if (allProductsLoaded) return;
        fetch(`../../back-end/user-side/get_products.php?start=${currentStart}&limit=${productsPerPage}`)
            .then(response => response.json())
            .then(products => {
                if (products.length < productsPerPage) {
                    allProductsLoaded = true;
                    document.getElementById('load-more-container').style.display = 'none';
                }
                renderProducts(products);
                currentStart += products.length;
            });
    }

    document.addEventListener('DOMContentLoaded', function() {
        loadProducts();
        document.getElementById('load-more-btn').addEventListener('click', loadProducts);
    });
    </script>
    <!-- Modal JS -->
    <script>
    document.addEventListener('DOMContentLoaded', function() {
        // Event delegation for product cards
        document.getElementById('products-container').addEventListener('click', function(e) {
            const card = e.target.closest('.product-card');
            if (card) {
                document.getElementById('modalProductImage').src = card.getAttribute('data-image');
                document.getElementById('modalProductName').textContent = card.getAttribute('data-name');
                document.getElementById('modalProductColor').textContent = card.getAttribute('data-color');
                document.getElementById('modalProductSize').textContent = card.getAttribute('data-size');
                document.getElementById('modalProductPrice').textContent = card.getAttribute('data-price');
                var modal = new bootstrap.Modal(document.getElementById('productModal'));
                modal.show();
            }
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
                document.querySelectorAll('.modal-backdrop').forEach(function(backdrop) {
                    backdrop.parentNode.removeChild(backdrop);
                });
                if (!document.querySelector('.modal.show')) {
                    document.body.classList.remove('modal-open');
                    document.body.style = '';
                }
            });
        });
    });
    </script>
    <footer class="bg-dark text-white py-5 mt-5" style="font-size: 0.95rem;">
        <div class="container text-center">
            <span>&copy; <?php echo date('Y'); ?> Swabe Apparel. All rights reserved.</span>
            <br>
            <a href="privacypolicy.php" class="text-warning text-decoration-none mx-2" target="_blank">Privacy
                Policy</a>
            <a href="termsofservice.php" class="text-warning text-decoration-none mx-2" target="_blank">Terms of
                Service</a>
        </div>
    </footer>

    <?php include(__DIR__ . '/../components/modal.php'); ?>
</body>

</html>
