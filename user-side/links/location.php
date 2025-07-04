<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>LOCATION | SWABE APPAREL</title>
    <link rel="stylesheet" href="../../assets/bootswatch/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/custom_navbar.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>

<style>
html,
body {
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
    <?php include('components/navigation_bar.php'); ?>
    <?php include('../components/loader.php'); ?>

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
                        <div class="card-body text-center" style="background: #000 !important; color: #fff !important;" >
                            <h5 class="card-title mt-2">Storefront</h5>
                            <p class="card-text">The main entrance of Swabe Apparel along Rizal Avenue.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="../../assets/img/insideview-1.jpg" class="card-img-top" alt="Inside View">
                        <div class="card-body text-center" style="background: #000 !important; color: #fff !important;" >
                            <h5 class="card-title mt-2">Inside View</h5>
                            <p class="card-text">A glimpse of our cozy and stylish interior.</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100">
                        <img src="../../assets/img/front.png" class="card-img-top" alt="Nearby Landmark">
                        <div class="card-body text-center" style="background: #000 !important; color: #fff !important;" >
                            <h5 class="card-title mt-2">Nearby Landmark</h5>
                            <p class="card-text">Located near Mc Donald for your convenience.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <footer class="footer bg-dark text-white py-5 mt-5" style="font-size: 0.95rem; background: #000 !important; ">
        <div class="container text-center">
            <span>&copy; <?php echo date('Y'); ?> Swabe Apparel. All rights reserved.</span>
            <br>
            <a href="privacy_policy.php" class="text-warning text-decoration-none mx-2" target="_blank">Privacy
                Policy</a>
            <a href="terms_of_service.php" class="text-warning text-decoration-none mx-2" target="_blank">Terms of
                Service</a>
        </div>
    </footer>

    <style>
        footer a:hover {
            text-decoration: underline !important;
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>
