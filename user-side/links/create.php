<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up for swabe apparel</title>
    <link rel="stylesheet" href="../../assets/bootswatch/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/custom-navbar.css">
    <link rel="stylesheet" href="../../assets/css/global.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background-color: #fcfcea;
        }

        .auth-container {
            min-height: 100vh;
        }
        .auth-branding {
            background: #101820;
        }
        .brand-logo {
            max-width: 120px;
            margin-bottom: 1rem;
        }
    </style>
</head>
<body>
<?php include('../components/loader.php'); ?>
    <div class="container-fluid auth-container d-flex align-items-center justify-content-center">
        <div class="row w-100 shadow rounded-1 overflow-hidden" style="max-width: 1000px;">
            <!-- Branding -->
            <div class="col-md-6 d-none d-md-flex flex-column align-items-center justify-content-center auth-branding">
                <img src="../../assets/img/logo.jpg" alt="Swabe Apparel Logo" class="brand-logo mb-3">
                <h3 class="fw-bold text-center" style="color: #fee715 !important;">SWABE APPAREL</h3>
                <p class="text-muted text-center px-4" style="color: #fff !important;">Find your fashion. Shop the latest trends with us!</p>
            </div>
            <!-- Create Account Form -->
            <div class="col-md-6 bg-white d-flex align-items-center justify-content-center">
                <div class="w-100 p-4" style="max-width: 450px;" >
                    <h2 class="mb-4 text-center">Create Account</h2>

                    <?php if (isset($_SESSION['alert'])): ?>
                        <div class="alert alert-<?php echo $_SESSION['alert']['type']; ?> alert-dismissible fade show" role="alert">
                            <?php echo $_SESSION['alert']['message']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['alert']); ?>
                    <?php endif; ?>
                    <form action="../../back-end/user-side/register_process.php" method="POST" autocomplete="off">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="password" name="password" required minlength="6">
                                <button class="btn" type="button" id="togglePassword">
                                    <i class="fas fa-eye" id="eyeIcon"></i>
                                </button>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <div class="input-group">
                                <input type="password" class="form-control" id="confirm_password" name="confirm_password" required minlength="6">
                                <button class="btn" type="button" id="toggleConfirmPassword">
                                    <i class="fas fa-eye" id="confirmEyeIcon"></i>
                                </button>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark w-100" style="background: #172532 !important; border: 1px solid #101820 !important;">Create Account</button>
                    </form>
                    <div class="mt-3 text-center">
                        <a href="login.php" class="text-decoration-none">Already have an account? Log in</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../../assets/js/password_toggle.js"></script>
</body>
</html>
