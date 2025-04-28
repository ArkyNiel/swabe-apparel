<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us | Swabe Apparel</title>
    <link rel="stylesheet" href="../../assets/bootswatch/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/custom-navbar.css">
    <link rel="stylesheet" href="../../assets/css/about-us.css">
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
                            <li><a class="dropdown-item link-hover" href="#aboutus.php">About Us</a></li>
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
    
    <!--contents-->
    <div class="container py-3 mt-5">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="mb-5 p-5 rounded bg-dark aboutus-bg">
                    <div class="text-center mb-3">
                        <h1 class="display-4 fw-bold mb-2">About Swabe Apparel</h1>
                        <p class="lead mb-0">Express Your Unique Style with Confidence and Comfort</p>
                    </div>
                    <p class="fs-5 text-center mb-0">
                        Swabe Apparel is a local fashion brand dedicated to providing stylish and affordable clothing for everyone. Our mission is to help you express your unique style with confidence and comfort.
                    </p>
                </div>

                <div class="mb-4">
                    <h3 class="fw-semibold">Who We Are</h3>
                    <p>
                        Swabe Apparel was founded with the vision of making fashion accessible to all. We believe that everyone deserves to look and feel their best, no matter their budget.
                    </p>
                </div>
                <div class="mb-4">
                    <h3 class="fw-semibold">Our Mission</h3>
                    <p>
                        To empower individuals to express themselves through affordable, high-quality, and trendy clothing.
                    </p>
                </div>
                <div class="mb-4">
                    <h3 class="fw-semibold">Our Values</h3>
                    <ul>
                        <li>Inclusivity and diversity in fashion</li>
                        <li>Quality and affordability</li>
                        <li>Customer satisfaction</li>
                        <li>Continuous innovation</li>
                    </ul>
                </div>
                <div class="mb-4">
                    <h3 class="fw-semibold">Store Location</h3>
                    <p>Rizal Avenue, Puerto Prince City, Palawan</p>
                </div>
                <div class="mb-4">
                    <h3 class="fw-semibold">Owner</h3>
                    <p>Paulo Esteban</p>
                    <h3 class="fw-semibold">Year Established</h3>
                    <p>2019</p>
                </div>
                <div class="mb-4">
                    <h3 class="fw-semibold">Connect with Us</h3>
                    <img src="../../assets/img/Facebook-icon-black-PNG-large-size.png" alt="Facebook Logo" style="width:32px; height:32px; vertical-align:middle; margin-right:-15px;">
                    <a href="https://www.facebook.com/swabecollection" target="_blank" class="btn" style="margin-top:5px">
                        Visit our Facebook Page
                    </a>
                </div>
                <div class="text-center mt-5">
                    <p class="text-muted">
                        Thank you for supporting Swabe Apparel.<br>
                        We look forward to being part of your fashion journey!
                    </p>
                </div>
            </div>
        </div>
    </div>

    <?php include('./../components/footer.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>
</html>
