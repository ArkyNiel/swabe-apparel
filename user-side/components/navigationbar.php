<nav class="navbar navbar-expand-lg bg-body-tertiary custom-navbar sticky-top flex-column">
    <!-- Top row links -->
    <div class="container py-2 border-bottom">
        <div class="d-flex justify-content-between align-items-center w-100">
            <div class="d-flex align-items-center">
                <a class="navbar-brand fw-bold" href="./home.php">SWABE APPAREL</a>
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
                        <li><a class="dropdown-item link-hover" href="./links/aboutus.php">About Us</a></li>
                        <li><a class="dropdown-item link-hover" href="./links/location.php">Location</a></li>
                    </ul>
                </li>
                <li class="nav-item dropdown list-unstyled">
                    <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown">Account</a>
                    <ul class="dropdown-menu">
                        <li><a class="dropdown-item link-hover" href="/manage-account">Manage Account</a></li>
                        <li><a class="dropdown-item link-hover" href="/feedback">Give us Feedback</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item link-hover" href="./links/login.php"><i class="fas fa-sign-out-alt"></i> Log In</a></li>
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
                    <li class="nav-item"><a class="nav-link link-hover" href="./links/hotsales.php">Hot Sales 🔥</a></li>
                    <li class="nav-item"><a class="nav-link link-hover" href="./links/allproducts.php">All Products</a></li>
                    <li class="nav-item"><a class="nav-link link-hover" href="./links/newproducts.php">New products</a></li>
                    <li class="nav-item">
                        <a class="nav-link icon-hover link-hover" href="./links/shoes.php">
                            <span class="text">Shoes</span>
                            <i class="fas fa-shoe-prints icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link icon-hover link-hover" href="./links/shirts.php">
                            <span class="text">Shirts</span>
                            <i class="fas fa-tshirt icon"></i>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link icon-hover link-hover" href="./links/collection.php">
                            <span class="text">Collection</span>
                            <i class="fas fa-box icon"></i>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>



