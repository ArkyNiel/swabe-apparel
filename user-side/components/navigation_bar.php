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

.custom-navbar {
  padding: 0;
}

#navbarScroll .nav-link {
  padding-left: 1rem;
  padding-right: 1rem;
}

.search-container {
  max-width: 800px;
}

.navbar .nav-link {
  color: #000;
  font-size: 14px;
  padding: 0.5rem 0.1rem;
}

.navbar .nav-link:hover {
  color: #333;
}

.navbar .nav-item .nav-link {
  color: #000;
}

.input-group .form-control {
  border-right: none;
}

.input-group .btn {
  border-left: none;
}

.nav-item.dropdown {
  margin-left: 1rem;
}

.navbar .d-flex.align-items-center > li {
  margin-right: 0 !important;
}

.navbar .d-flex.align-items-center > li:last-child {
  margin-right: 0 !important;
}

#notificationDropdown {
  margin-right: 0 !important;
}

#accountDropdown {
  margin-left: 0 !important;
}

.list-unstyled {
  margin-bottom: 0;
}

.dropdown-toggle {
  padding: 0.5rem 1rem;
}

.dropdown-menu {
  position: absolute !important;
  right: 0;
  left: auto !important;
  min-width: 200px;
  box-shadow: 0 0.2rem 1rem rgba(0, 0, 0, 0.1);
  padding: 0.25rem 0;
}

.dropdown-item {
  padding: 0.25rem 1rem;
}

.dropdown-menu.show {
  display: block;
  transform: translate3d(0px, 13px, 0px) !important;
}

@media (max-width: 991.98px) {
  .dropdown-menu {
    position: static !important;
    float: none;
    width: auto;
    margin-top: 0;
    background-color: transparent;
    border: 0;
    box-shadow: none;
  }
}

.fa-cart-shopping,
.fa-heart {
  color: #333;
  transition: color 0.2s ease;
}

.fa-cart-shopping:hover,
.fa-heart:hover {
  color: #1b1b1b;
}

.cart-badge {
  position: absolute;
  top: -5px;
  right: -5px;
  background-color: #dc3545;
  color: white;
  border-radius: 50%;
  padding: 0.25rem 0.5rem;
  font-size: 0.75rem;
}

.navbar .nav-link i {
transition: transform 0.2s cubic-bezier(.4,0,.2,1), color 0.2s;
}

.navbar .nav-link:hover i,
.navbar .nav-link:focus i {
transform: scale(1.2) rotate(-8deg);
color: #1b1b1b;
}

.dropdown-menu {
opacity: 0;
transform: translateY(20px) scale(0.97);
pointer-events: none;
transition: 
  opacity 0.3s cubic-bezier(.4,0,.2,1),
  transform 0.3s cubic-bezier(.4,0,.2,1);
display: none !important;
min-width: 220px;
border-radius: 14px;
box-shadow: 0 8px 32px rgba(60,60,60,0.18), 0 1.5px 6px rgba(0,0,0,0.08);
background: #fff;
border: none;
margin-top: 12px !important;
padding: 0.5rem 0;
z-index: 1000;
}

.dropdown-menu.show {
opacity: 1;
transform: translateY(0) scale(1);
pointer-events: auto;
display: block !important;
}

.dropdown-menu::before {
content: "";
display: block;
position: absolute;
top: -10px;
right: 24px;
width: 16px;
height: 16px;
background: #fff;
transform: rotate(45deg);
box-shadow: -2px -2px 6px rgba(60,60,60,0.08);
z-index: -1;
}

.dropdown-item {
padding: 0.6rem 1.2rem;
border-radius: 8px;
color: #222 !important;
font-weight: 500;
transition: background 0.18s, color 0.18s;
}

.dropdown-item:hover, .dropdown-item:focus {
background: #f5f5f5 !important;
color: #000 !important;
}

.dropdown-divider {
margin: 0.3rem 0;
border-top: 1px solid #ececec;
}

@media (min-width: 992px) {
.navbar .nav-item.dropdown .dropdown-menu {
  margin-top: 0;
}
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

.dropdown-icon {
  transition: transform 0.3s cubic-bezier(.4,2,.6,1);
  display: inline-block;
}

.dropdown.show .dropdown-icon,
.dropdown-menu.show .dropdown-icon {
  transform: rotate(180deg);
}

.navbar-icons {
    display: flex;
    align-items: center;
    gap: 0px;
}

.navbar-icons .nav-item {
    margin: 0 !important;
}

.navbar-icons .nav-link {
    padding: 6px;
    border-radius: 4px;
    transition: background-color 0.2s ease;
}

.navbar-icons .nav-link:hover {
    background-color: rgba(252, 252, 234, 0.1);
}

.navbar-icons .nav-link i {
    font-size: 16px;
    line-height: 1;
    color: #fcfcea !important;
}

.navbar .d-flex.align-items-center > li {
    margin-right: 0 !important;
}

.navbar .d-flex.align-items-center > li:last-child {
    margin-right: 0 !important;
}

#notificationDropdown {
    margin-right: 0 !important;
}

#accountDropdown {
    margin-left: 0 !important;
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
                <div class="navbar-icons">
                    <a class="nav-link" href="../../user-side/links/cart.php">
                        <i class="fa-solid fa-cart-shopping"></i>
                    </a>
                    <a class="nav-link" href="../../user-side/links/wishlist.php">
                        <i class="fa-regular fa-heart"></i>
                    </a>
                    <div class="nav-item dropdown">
                        <a class="nav-link" href="#" id="pagesDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-store"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" style="background-color: #fcfcea !important;">
                            <li><a class="dropdown-item link-hover" href="../../user-side/links/about_us.php" style="color: #101820 !important; text-decoration: none !important; text-transform: uppercase !important;">About Us</a></li>
                            <li><a class="dropdown-item link-hover" href="../../user-side/links/location.php" style="color: #101820 !important; text-decoration: none !important; text-transform: uppercase !important;">Location</a></li>
                        </ul>
                    </div>
                    <!-- Notification path-->
                    <?php include 'notification.php'; ?>
                    <div class="nav-item dropdown">
                        <a class="nav-link" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown">
                            <i class="fa-regular fa-user"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end" style="background-color: #fcfcea !important;">
                            <?php if(isset($_SESSION['user_id'])): ?>
                                <li><a class="dropdown-item link-hover" href="../../user-side/links/manage_account.php" style="color: #101820 !important; text-decoration: none !important; text-transform: uppercase !important;">Manage Account</a></li>
                                <li><a class="dropdown-item link-hover" href="../../user-side/links/feedback.php" style="color: #101820 !important; text-decoration: none !important; text-transform: uppercase !important;">Give us Feedback</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item link-hover" href="../../user-side/links/logout.php" style="color: #101820 !important; text-decoration: none !important; text-transform: uppercase !important;">Log Out</a></li>
                            <?php else: ?>
                                <li><a class="dropdown-item link-hover" href="../../user-side/links/login.php" style="color: #101820 !important; text-decoration: none !important; text-transform: uppercase !important;">Log In</a></li>
                            <?php endif; ?>
                        </ul>
                    </div>
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
