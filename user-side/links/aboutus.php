<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SWABE APPAREL | ABOUT US</title>
    <link rel="stylesheet" href="../../assets/bootswatch/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/custom-navbar.css">
    <link rel="stylesheet" href="../../assets/css/about-us.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<body>    
    <?php include('components/navigationbar.php'); ?>
    <?php include('../components/loader.php'); ?>
    
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
                        Swabe Apparel is a local fashion brand dedicated to providing stylish and affordable clothing
                        for everyone. Our mission is to help you express your unique style with confidence and comfort.
                    </p>
                </div>

                <div class="mb-4">
                    <h3 class="fw-semibold">Who We Are</h3>
                    <p>
                        Swabe Apparel was founded with the vision of making fashion accessible to all. We believe that
                        everyone deserves to look and feel their best, no matter their budget.
                    </p>
                </div>
                <div class="mb-4">
                    <h3 class="fw-semibold">Our Mission</h3>
                    <p>
                        To empower individuals to express themselves through affordable, high-quality, and trendy
                        clothing.
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
                    <img src="../../assets/img/Facebook-icon-black-PNG-large-size.png" alt="Facebook Logo"
                        style="width:32px; height:32px; vertical-align:middle; margin-right:-15px;">
                    <a href="https://www.facebook.com/swabecollection" target="_blank" class="btn"
                        style="margin-top:5px">
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


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
