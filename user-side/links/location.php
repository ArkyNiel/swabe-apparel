<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SWABE APPAREL | LOCATION</title>
    <link rel="stylesheet" href="../../assets/bootswatch/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/custom-navbar.css">
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
    .content-wrapper {
        flex: 1 0 auto;
    }
    .footer {
        flex-shrink: 0;
        width: 100%;
    }
    .container {
        width: 1300px;
    }
    .bg-dark h1,
    .bg-dark p {
        color: #fff !important;
    }
    .card-img-top {
        height: 250px;   
        width: 100%;       
        object-fit: cover;     
    }
</style>

<body>
<?php include('../components/loader.php'); ?>
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
                            <li><a class="dropdown-item link-hover" href="#location.php">Location</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown list-unstyled">
                        <a class="nav-link dropdown-toggle" href="#" id="accountDropdown" role="button" data-bs-toggle="dropdown">Account</a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item link-hover" href="manageaccount.php">Manage Account</a></li>
                            <li><a class="dropdown-item link-hover" href="feedback.php">Give us Feedback</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item link-hover" href="login.php"><i class="fas fa-sign-out-alt"></i> Log In</a></li>
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
                            <a class="nav-link icon-hover link-hover" href="shirts.php">
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

        <div class="container-fluid bg-white">
            <div class="container">
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarScroll">
                    <ul class="navbar-nav mx-auto my-2 my-lg-0 justify-content-center w-100">
                        <li class="nav-item"><a class="nav-link link-hover" href="#Products">Products</a></li>
                        <li class="nav-item"><a class="nav-link link-hover" href="#mens-latest">New Shirts</a></li>
                        <li class="nav-item">
                            <a class="nav-link icon-hover link-hover" href="/shoes">
                                <span class="text">Shoes</span>
                                <i class="fas fa-shoe-prints icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link icon-hover link-hover" href="/shirts">
                                <span class="text">Shirts</span>
                                <i class="fas fa-tshirt icon"></i>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link icon-hover link-hover" href="/collection">
                                <span class="text">Collection</span>
                                <i class="fas fa-box icon"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </nav>
    
    <div class="content-wrapper">
        <!-- Location Content -->
        <div class="container py-5 mt-5">
            <div class="row justify-content-center mb-4">
                <div class="col-lg-8 text-center">
                    <h1 class="display-5 fw-bold mb-3">Our Store Location</h1>
                    <p class="lead">
                        Visit Swabe Apparel at Rizal Avenue, Puerto Princesa City, Palawan.<br>
                        Find us easily with the details and images below!
                    </p>
                    <p>
                        <strong>Address:</strong> Rizal Avenue, Puerto Princesa City, Palawan<br>
                        <strong>Landmark:</strong> Front of Mc Donald.
                    </p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="../../assets/img/banner1.jpg" class="card-img-top" alt="Storefront">
                        <div class="card-body text-center">
                            <h5 class="card-title">Storefront</h5>
                            <p class="card-text">The main entrance of Swabe Apparel along Rizal Avenue.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="../../assets/img/insideview-1.jpg" class="card-img-top" alt="Inside View">
                        <div class="card-body text-center">
                            <h5 class="card-title">Inside View</h5>
                            <p class="card-text">A glimpse of our cozy and stylish interior.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="../../assets/img/front.png" class="card-img-top" alt="Nearby Landmark">
                        <div class="card-body text-center">
                            <h5 class="card-title">Nearby Landmark</h5>
                            <p class="card-text">Located near [Insert Landmark Here] for your convenience.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer class="bg-dark text-white py-5 mt-5" style="font-size: 0.95rem;">
        <div class="container text-center">
            <span>&copy; <?php echo date('Y'); ?> Swabe Apparel. All rights reserved.</span>
            <br>
            <a href="privacypolicy.php" class="text-warning text-decoration-none mx-2" target="_blank">Privacy Policy</a>
            <a href="termsofservice.php" class="text-warning text-decoration-none mx-2" target="_blank">Terms of Service</a>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
