<?php
session_start();
?>

<link rel="stylesheet" href="../../assets/css/search.css">
<link rel="stylesheet" href="../../assets/css/navbar.css">

<style>
    .search-container {
  position: relative;
}

.search-results {
  position: absolute;
  top: 100%;
  left: 0;
  right: 0;
  background: white;
  border: 1px solid #ddd;
  border-top: none;
  border-radius: 0 0 8px 8px;
  box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
  z-index: 1000;
  max-height: 400px;
  overflow-y: auto;
  display: none;
}

.search-result-item {
  display: flex;
  align-items: center;
  padding: 10px 15px;
  border-bottom: 1px solid #f0f0f0;
  cursor: pointer;
  transition: background-color 0.2s;
}

.search-result-item:hover {
  background-color: #f8f9fa;
}

.search-result-item:last-child {
  border-bottom: none;
}

.search-result-image {
  width: 50px;
  height: 50px;
  object-fit: cover;
  border-radius: 4px;
  margin-right: 12px;
}

.search-result-info {
  flex: 1;
}

.search-result-name {
  font-weight: 500;
  color: #000 !important;
  margin-bottom: 2px;
  font-size: 14px;
}

.search-result-details {
  font-size: 12px;
  color: #000 !important;
}

.search-result-price {
  font-weight: 600;
  color: #000 !important;
  font-size: 14px;
}

.no-results {
  padding: 15px;
  text-align: center;
  color: #000 !important;
  font-style: italic;
}

.search-loading {
  padding: 15px;
  text-align: center;
  color: #666;
}

.search-loading::after {
  content: '';
  display: inline-block;
  width: 16px;
  height: 16px;
  border: 2px solid #ddd;
  border-radius: 50%;
  border-top-color: #007bff;
  animation: spin 1s ease-in-out infinite;
  margin-left: 8px;
}

@keyframes spin {
  to { transform: rotate(360deg); }
}

#searchInput:focus {
  outline: none;
  box-shadow: 0 0 0 1px #000;
  border-color: #000;
  transition: all 0.3s ease;
}
#searchForm .btn:focus, #searchForm .btn:active {
  outline: none;
  box-shadow: 0 0 0 2px #000;
  border-color: #000;
  background-color: #000;
  transition: all 0.3s ease;
}

#searchInput {
  border: 1px solid #ccc !important;
  outline: none !important;
  box-shadow: none !important;
}
#searchInput:focus {
  border: 1px solid #000 !important;
  outline: none !important;
}
</style>

<nav class="navbar navbar-expand-lg bg-body-tertiary custom-navbar sticky-top flex-column pt-1" style="margin-bottom: -20px; background: #101820 !important;">
        <div class="w-100 py-2 border-bottom">
            <div class="d-flex justify-content-between align-items-center w-100 px-4">
                <div class="d-flex align-items-center">
                    <a class="navbar-brand fw-bold" href="home.php" style="font-weight: 1000 !important; letter-spacing: 2px !important; color: #fcfcea !important;">SWABE APPAREL</a>
                </div>
                <div class="search-container flex-grow-1 mx-4">
                    <form class="d-flex" role="search" id="searchForm" action="../../user-side/links/search_result.php" method="get">
                        <div class="input-group">
                            <input class="form-control" type="search" placeholder="Search products..." style="color: #101820 !important;"
                                aria-label="Search" id="searchInput" autocomplete="off" name="search">
                            <button class="btn btn-dark" type="submit" style= "background: #fee715 !important; border: 1px solid #fee715 !important; color: #101820 !important; ">
                                <i class="fas fa-search" style="color: #101820 !important;"></i> Search
                            </button>
                        </div>
                    </form>
                    <div class="search-results" id="searchResults">
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <li class="nav-item list-unstyled" style="margin-right: 5px !important;">
                        <a class="nav-link d-flex align-items-center" href="../../user-side/links/cart.php">
                            <i class="fa-solid fa-cart-shopping" style="font-size: 16px; line-height: 1; color: #fcfcea !important;"></i>
                        </a>
                    </li>
                    <li class="nav-item list-unstyled" style="margin-right: -10px !important;">
                        <a class="nav-link d-flex align-items-center" href="../../user-side/links/wishlist.php">
                            <i class="fa-regular fa-heart" style="font-size: 16px; line-height: 1; color: #fcfcea !important;"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown list-unstyled" style="margin-right: -10px !important;" >
                        <a class="nav-link d-flex align-items-center" href="#" id="pagesDropdown"
                            role="button" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-store" style="font-size: 16px; line-height: 1; color: #fcfcea !important; "></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" style="background-color: #fcfcea !important;">
                            <li><a class="dropdown-item link-hover" href="../../user-side/links/about_us.php" style="color: #101820 !important; text-decoration: none !important; text-transform: uppercase !important;">About Us</a></li>
                            <li><a class="dropdown-item link-hover" href="../../user-side/links/location.php" style="color: #101820 !important; text-decoration: none !important; text-transform: uppercase !important;">Location</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown list-unstyled">
                        <a class="nav-link d-flex align-items-center" href="#" id="accountDropdown"
                            role="button" data-bs-toggle="dropdown" >
                            <i class="fa-regular fa-user" style="font-size: 16px; line-height: 1; color: #fcfcea !important;"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end"  style="background-color: #fcfcea !important;">
                            <?php if(isset($_SESSION['user_id'])): ?>
                                <li><a class="dropdown-item link-hover" href="../../user-side/links/manage_account.php" style=" color: #101820 !important; text-decoration: none !important; text-transform: uppercase !important;">Manage Account</a></li>
                                <li><a class="dropdown-item link-hover" href="../../user-side/links/feedback.php" style="color: #101820 !important; text-decoration: none !important; text-transform: uppercase !important;">Give us Feedback</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item link-hover" href="../../user-side/links/logout.php" style="color: #101820 !important; text-decoration: none !important; text-transform: uppercase !important;">Log Out</a></li>
                            <?php else: ?>
                                <li><a class="dropdown-item link-hover" href="../../user-side/links/login.php" style="color: #101820 !important; text-decoration: none !important; text-transform: uppercase !important;">Log In</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                </div>
            </div>
        </div>


    <!-- Bottom row navigation links -->
    <div class="w-100 bg-white" style="background: #101820 !important; margin-top: -1px;">
        <div class="px-4">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll" >
                <ul class="navbar-nav mx-auto my-2 my-lg-0 justify-content-center w-100" >
                    <li class="nav-item"><a class="nav-link link-hover"  style="color: #fcfcea !important;" href="../../user-side/links/hot_sales.php">Hot Sales</a>
                    </li>
                    <li class="nav-item"><a class="nav-link link-hover" style="color: #fcfcea;" href="../../user-side/links/all_products.php">All Products</a>
                    </li>
                    <li class="nav-item"><a class="nav-link link-hover" style="color: #fcfcea;" href="../../user-side/links/new_products.php">New products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-hover" href="../../user-side/links/shoes.php" style="color: #fcfcea;">
                            Shoes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-hover" href="../../user-side/links/shirts.php" style="color: #fcfcea;">
                            Shirts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-hover" href="../../user-side/links/collection.php" style="color: #fcfcea;">
                            Collection
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<script src="../../assets/js/navigation_bar.js"></script>
