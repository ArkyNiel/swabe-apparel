<nav class="navbar navbar-expand-lg bg-body-tertiary custom-navbar sticky-top flex-column">
        <div class="w-100 py-2 border-bottom">
            <div class="d-flex justify-content-between align-items-center w-100 px-4">
                <div class="d-flex align-items-center">
                    <a class="navbar-brand fw-bold" href="../home.php">SWABE APPAREL</a>
                </div>
                <div class="search-container flex-grow-1 mx-4">
                    <form class="d-flex" role="search">
                        <div class="input-group">
                            <input class="form-control" type="search" placeholder="Search products..."
                                aria-label="Search">
                            <button class="btn btn-dark" type="submit">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </div>
                    </form>
                </div>
                <div class="d-flex align-items-center">
                    <li class="nav-item list-unstyled me-3">
                        <a class="nav-link d-flex align-items-center" href="./links/cart.php">
                            <i class="fa-solid fa-cart-shopping" style="font-size: 25px; line-height: 1;"></i>
                        </a>
                    </li>
                    <li class="nav-item list-unstyled me-3">
                        <a class="nav-link d-flex align-items-center" href="./links/wishlist.php">
                            <i class="fa-regular fa-heart" style="font-size: 25px; line-height: 1;"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown list-unstyled">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="pagesDropdown"
                            role="button" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-store" style="font-size: 25px; line-height: 1;"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item link-hover" href="aboutus.php">About Us</a></li>
                            <li><a class="dropdown-item link-hover" href="location.php">Location</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown list-unstyled">
                        <a class="nav-link dropdown-toggle d-flex align-items-center" href="#" id="accountDropdown"
                            role="button" data-bs-toggle="dropdown">
                            <i class="fa-regular fa-user" style="font-size: 25px; line-height: 1;"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item link-hover" href="manageaccount.php">Manage Account</a>
                            </li>
                            <li><a class="dropdown-item link-hover" href="feedback.php">Give us Feedback</a>
                            </li>
                            <li>
                                <hr class="dropdown-divider">
                            </li>
                            <li><a class="dropdown-item link-hover" href="login.php">Log In</a></li>
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
                        <li class="nav-item"><a class="nav-link link-hover" href="hotsales.php">Hot Sales 🔥</a></li>
                        <li class="nav-item"><a class="nav-link link-hover" href="allproducts.php">All Products</a></li>
                        <li class="nav-item"><a class="nav-link link-hover" href="newproducts.php">New Products</a></li>
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