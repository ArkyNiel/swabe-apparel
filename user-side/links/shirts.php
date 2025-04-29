<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/bootswatch/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/custom-navbar.css">
    <link rel="stylesheet" href="../../assets/css/products-card-animation.css">
    <link rel="stylesheet" href="../../assets/css/item-cards.css">
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary custom-navbar sticky-top flex-column">
        <div class="container py-2 border-bottom">
            <div class="d-flex justify-content-between align-items-center w-100">
                <div class="d-flex align-items-center">
                    <a class="navbar-brand fw-bold" href="../home.php">SWABE APPAREL</a>
                </div>
                <div class="search-container flex-grow-1 mx-4">
                    <form class="d-flex" role="search">
                        <div class="input-group">
                            <input class="form-control" type="search" placeholder="Search products..." aria-label="Search">
                            <button class="btn btn-dark" type="submit">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </div>
                    </form>
                </div>
                <div class="d-flex align-items-center">
                    <li class="nav-item dropdown list-unstyled">
                        <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown">Pages</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item link-hover" href="aboutus.php">About Us</a></li>
                            <li><a class="dropdown-item link-hover" href="location.php">Location</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown list-unstyled">
                        <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown">Account</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item link-hover" href="/manage-account">Manage Account</a></li>
                            <li><a class="dropdown-item link-hover" href="/feedback">Give us Feedback</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item link-hover" href="/login"><i class="fas fa-sign-out-alt"></i> Log In</a></li>
                        </ul>
                    </li>
                </div>
            </div>
        </div>

        <!-- Bottom row navigation links -->
        <div class="container-fluid bg-white">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav mx-auto my-2 my-lg-0 justify-content-center w-100">
                        <li class="nav-item"><a class="nav-link link-hover" href="hotsales.php">Hot Sales 🔥</a></li>
                        <li class="nav-item"><a class="nav-link link-hover" href="allproducts.php">All Products</a></li>
                        <li class="nav-item"><a class="nav-link link-hover" href="newproducts.php">New Products</a></li>
                        <li class="nav-item">
                            <a class="nav-link icon-hover link-hover" href="shoes.php">
                                <span class="text">Shoes</span>
                                <i class="fas fa-shoe-prints icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link icon-hover link-hover" href="#shirts.php">
                                <span class="text">Shirts</span>
                                <i class="fas fa-tshirt icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link icon-hover link-hover" href="collection.php">
                                <span class="text">Collection</span>
                                <i class="fas fa-box icon"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

    <!-- cards -->
    <div class="container section-content">
      <h1 class="mb-4 mt-5">SHIRTS</h1>
      <div class="row" id="products-container">
        <?php
          include '../../assets/js/products.php'; 
          
          $productsPerPage = 12; // 12 per page meaning 2 row per load
          $limitedProducts = array_slice($products, 0, $productsPerPage);
          
          foreach ($limitedProducts as $index => $product) {
            $isLeft = $index < 6 ? 'left' : 'right';
        ?>
            <div class="col-md-2 mb-4 product-item">
              <div class="card-container <?php echo $isLeft; ?>">
                <div class="card" style="width: 100%; height: 300px">
                  <img
                    src="<?php echo $product['image']; ?>"
                    class="card-img-top"
                    alt="<?php echo $product['name']; ?>"
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
    <script src="../../assets/js/load-more.js"></script>
    <?php include('./../components/footer.php'); ?>
</body>
</html>
