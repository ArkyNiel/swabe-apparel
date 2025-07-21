<?php
session_start();
?>
<link rel="stylesheet" href="../../assets/css/search.css">
<link rel="stylesheet" href="../../assets/css/navbar.css">


<style>
#searchInput {
    border: 1px solid #000 !important;
    outline: none !important;
    box-shadow: none !important;
}
#searchInput:focus {
    border: 1px solid #000 !important;
    outline: none !important;
}
</style>


<nav class="navbar navbar-expand-lg bg-body-tertiary custom-navbar sticky-top flex-column">
        <div class="w-100 py-2 border-bottom">
            <div class="d-flex justify-content-between align-items-center w-100 px-4">
                <div class="d-flex align-items-center">
                    <a class="navbar-brand fw-bold" href="../home.php" style="font-weight: 1000 !important; letter-spacing: 2px !important; color: #000 !important;">SWABE APPAREL</a>
                </div>
                <div class="search-container flex-grow-1 mx-4">
                    <form class="d-flex" role="search" id="searchForm">
                        <div class="input-group">
                            <input class="form-control" type="search" placeholder="Search products..." style="font-weight: 600 !important; color: #000 !important;"
                                aria-label="Search" id="searchInput" autocomplete="off" name="query">
                            <button class="btn btn-dark" type="submit" style="background: #000 !important; border: 1px solid #000 !important;">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </div>
                    </form>
                    <div class="search-results" id="searchResults">
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <li class="nav-item list-unstyled" style="margin-right: 5px !important;">
                        <a class="nav-link d-flex align-items-center" href="./links/cart.php">
                            <i class="fa-solid fa-cart-shopping" style="font-size: 20px; line-height: 1;"></i>
                        </a>
                    </li>
                    <li class="nav-item list-unstyled" style="margin-right: -10px !important;">
                        <a class="nav-link d-flex align-items-center" href="./links/wishlist.php">
                            <i class="fa-regular fa-heart" style="font-size: 20px; line-height: 1;"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown list-unstyled" style="margin-right: -10px !important;">
                        <a class="nav-link d-flex align-items-center" href="#" id="pagesDropdown"
                            role="button" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-store" style="font-size: 20px; line-height: 1;"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item link-hover" href="about_us.php" style="color: #000 !important; text-decoration: none !important; text-transform: uppercase !important;">About Us</a></li>
                            <li><a class="dropdown-item link-hover" href="location.php" style="color: #000 !important; text-decoration: none !important; text-transform: uppercase !important;">Location</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown list-unstyled">
                        <a class="nav-link d-flex align-items-center" href="#" id="accountDropdown"
                            role="button" data-bs-toggle="dropdown">
                            <i class="fa-regular fa-user" style="font-size: 20px; line-height: 1;"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <?php if(isset($_SESSION['user_id'])): ?>
                                <li><a class="dropdown-item link-hover" href="manageaccount.php" style="color: #000 !important; text-decoration: none !important; text-transform: uppercase !important;">Manage Account</a></li>
                                <li><a class="dropdown-item link-hover" href="feedback.php" style="color: #000 !important; text-decoration: none !important; text-transform: uppercase !important;">Give us Feedback</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item link-hover" href="logout.php" style="color: #000 !important; text-decoration: none !important; text-transform: uppercase !important;" >Log Out</a></li>
                            <?php else: ?>
                                <li><a class="dropdown-item link-hover" href="login.php" style="color: #000 !important; text-decoration: none !important; text-transform: uppercase !important;">Log In</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                </div>
            </div>
        </div>

        <!-- Bottom row navigation links -->
        <div class="w-100 bg-white">
            <div class="px-4">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav mx-auto my-2 my-lg-0 justify-content-center w-100">
                        <li class="nav-item"><a class="nav-link link-hover" href="hot_sales.php">Hot Sales 🔥</a></li>
                        <li class="nav-item"><a class="nav-link link-hover" href="all_products.php">All Products</a></li>
                        <li class="nav-item"><a class="nav-link link-hover" href="new_products.php">New Products</a></li>
                        <li class="nav-item">
                            <a class="nav-link icon-hover link-hover" href="shoes.php">
                                <span class="text">Shoes</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link icon-hover link-hover" href="shirts.php">
                                <span class="text">Shirts</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link icon-hover link-hover" href="collection.php">
                                <span class="text">Collection</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>

<script src="../../assets/js/navigation_bar_links.js"></script>
