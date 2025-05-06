<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SWABE APPAREL | ONLINE STORE</title>
    <link rel="stylesheet" href="../assets/bootswatch/css/bootstrap.min.css">
    <link rel="stylesheet" href="../assets/css/custom-navbar.css">
    <link rel="stylesheet" href="../assets/css/products-card-animation.css">
    <link rel="stylesheet" href="../assets/css/item-cards.css">
</head>
<body>
    <?php include('./components/navigationbar.php'); ?>
    <?php include('./components/productscard.php'); ?>

    <div
      class="section-content mb-0 bg-primary"
      id="section-content"
      style="padding: 0px 70px; min-height: 0px; display: flex; align-items: center; margin-top: -130px;"
    >
      <div class="row w-100">
        <div class="col-md-6 left-column" style="padding: 70px;">
          <div class="content-wrapper" style="max-width: 500px;">
            <h1 class="text-warning" style="font-size: 2rem; font-weight: bold; margin-bottom: 20px;">Find Your Fashion</h1>
            <h1 class="text-warning" style="font-size: 1.5rem; font-weight: bold;">By scrolling in swabe apparel & collections</h1>
          </div>
        </div>
        <div class="col-md-6 right-column d-flex align-items-center">
          <p class="text mt-2" style="font-size: 1.5rem; letter-spacing: 1px; color: #ffff; margin-bottom: 0;">
            Lorem ipsum dolor sit amet consectetur adipisicing elit. Error unde architecto totam, molestias perferendis rem!
          </p>
        </div>
      </div>
    </div>

    <!-- cards -->
    <div class="container section-content">
      <h1 class="mb-4 mt-5">FOR YOUR FASHION</h1>
      <div class="row" id="products-container">
        <?php
          include '../assets/js/products.php'; 
          
          $productsPerPage = 12; // 12 per page meaning 2 row per load
          $limitedProducts = array_slice($products, 0, $productsPerPage);
          
          foreach ($limitedProducts as $index => $product) {
            $isLeft = $index < 6 ? 'left' : 'right';
        ?>
            <div class="col-md-2 mb-4 product-item">
              <div class="card-container <?php echo $isLeft; ?>">
                <div 
                  class="card product-card" 
                  style="width: 100%; height: 300px; cursor:pointer;"
                  data-name="<?php echo htmlspecialchars($product['name'] ?? ''); ?>"
                  data-image="<?php echo htmlspecialchars($product['image'] ?? ''); ?>"
                  data-color="<?php echo htmlspecialchars($product['color'] ?? 'N/A'); ?>"
                  data-size="<?php echo htmlspecialchars($product['size'] ?? 'N/A'); ?>"
                  data-price="<?php echo htmlspecialchars($product['price'] ?? 'N/A'); ?>"
                >
                  <img
                    src="<?php echo $product['image'] ?? ''; ?>"
                    class="card-img-top"
                    alt="<?php echo $product['name'] ?? ''; ?>"
                    style="height: 100%; object-fit: cover"
                  />
                </div>
                <div class="buy-text">View</div>
              </div>
            </div>
        <?php
          }
        ?>
      </div>
      <!-- Load More Button -->
      <div class="text-center my-4" id="load-more-container" style="display: <?php echo count($products) > $productsPerPage ? 'block' : 'none'; ?>">
        <button id="load-more-btn" class="btn btn-primary">
          <i class="fas fa-chevron-down"></i> Load More
        </button>
      </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
    <script src="https://kit.fontawesome.com/your-font-awesome-kit.js"></script>
    <script>
        // loadmore feature
        const productsData = <?php echo json_encode($products); ?>;
    </script>
    <script src="../assets/js/load-more.js"></script>
    <script>
      document.addEventListener('DOMContentLoaded', function() {
        const productCards = document.querySelectorAll('.product-card');
        productCards.forEach(card => {
          card.addEventListener('click', function() {
            document.getElementById('modalProductImage').src = this.getAttribute('data-image');
            document.getElementById('modalProductName').textContent = this.getAttribute('data-name');
            document.getElementById('modalProductColor').textContent = this.getAttribute('data-color');
            document.getElementById('modalProductSize').textContent = this.getAttribute('data-size');
            document.getElementById('modalProductPrice').textContent = this.getAttribute('data-price');
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
