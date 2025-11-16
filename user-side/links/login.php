<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swabe apparel - login or sign up</title>
    <link rel="stylesheet" href="../../assets/bootswatch/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #f5f7fa 0%, #c3cfe2 100%);
            font-family: 'Arial', sans-serif;
        }

        .auth-container {
            min-height: 100vh;
        }
        .auth-branding {
            background: linear-gradient(135deg, #101820 0%, #2c3e50 100%);
            position: relative;
            overflow: hidden;
        }
        .auth-branding::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: url('data:image/svg+xml,<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 100 100"><circle cx="50" cy="50" r="2" fill="rgba(254,231,21,0.1)"/></svg>') repeat;
            opacity: 0.1;
        }
        .brand-logo {
            max-width: 120px;
            margin-bottom: 1rem;
            transition: transform 0.3s ease;
        }
        .brand-logo:hover {
            transform: scale(1.05);
        }
        .form-control {
            background-color: #e2e2cf !important;
            border: none;
            border-radius: 25px;
            padding-left: 15px;
            padding-right: 40px;
            transition: box-shadow 0.3s ease;
        }
        .input-container {
            position: relative;
        }
        .input-icon {
            position: absolute;
            left: 15px;
            top: 50%;
            transform: translateY(-50%);
            color: #666;
            z-index: 10;
        }
        .password-toggle-icon {
            position: absolute;
            right: 15px;
            top: 50%;
            transform: translateY(-50%);
            cursor: pointer;
            color: #666;
            z-index: 10;
        }
        .form-control:focus {
            background-color: #e2e2cf !important;
        }
        .input-group-text {
            background: transparent;
            border: none;
            color: #666;
        }
        .btn-dark {
            background: linear-gradient(135deg, #101820 0%, #2c3e50 100%) !important;
            border: none !important;
            border-radius: 25px;
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .btn-dark:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(0,0,0,0.3);
        }
        .auth-card {
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border-radius: 15px;
            overflow: hidden;
        }
        .form-label {
            font-weight: bold;
            color: #333;
        }
        .text-decoration-none:hover {
            text-decoration: underline !important;
            transition: color 0.3s ease;
        }
    </style>
</head>
<body>
<?php include('../components/loader.php'); ?>
    <div class="container-fluid auth-container d-flex align-items-center justify-content-center">
        <div class="row w-100 auth-card" style="max-width: 900px; height: 500px;">
            <!-- Branding -->
            <div class="col-md-6 d-none d-md-flex flex-column align-items-center justify-content-center auth-branding">
                <img src="../../assets/img/logo.jpg" alt="Swabe Apparel Logo" class="brand-logo mb-3">
                <h3 class="fw-bold text-center" style="color: #fee715 !important;">SWABE APPAREL</h3>
                <p class="text-muted text-center px-4" style="color: #fff !important;">Find your fashion. Shop the latest trends with Mr. Swabe Apparel & Collection</p>
            </div>
            <!-- Login Form -->
            <div class="col-md-6 bg-white d-flex align-items-center justify-content-center" style="background-color: #fcfcea !important;">
                <div class="w-100 p-4" style="max-width: 350px;">
                    <h2 class="mb-4 text-center">Login</h2>

                    <?php if (isset($_SESSION['alert'])): ?>
                        <div class="alert alert-<?php echo $_SESSION['alert']['type']; ?> alert-dismissible fade show" role="alert">
                            <?php echo $_SESSION['alert']['message']; ?>
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                        <?php unset($_SESSION['alert']); ?>
                    <?php endif; ?>

                    <form action="../../back-end/user-side/login_process.php" method="POST" autocomplete="off">
                        <div class="mb-3">
                            <label for="username" class="form-label"><i class="fas fa-user me-2"></i>Username</label>
                            <input type="text" class="form-control" id="username" name="username" placeholder="Enter your username" required autofocus>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label"><i class="fas fa-lock me-2"></i>Password</label>
                            <div class="input-container">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Enter your password" required>
                                <i class="fas fa-eye password-toggle-icon" id="eyeIcon"></i>
                            </div>
                        </div>
                        <button type="submit" class="btn btn-dark w-100" style="background: #101820 !important; border: 1px solid #000 !important;">Login</button>
                    </form>

                    <div class="mt-3 text-center">
                        <a href="create.php" class="text-decoration-none">Don't have an account? Create one</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.getElementById('eyeIcon').addEventListener('click', function() {
            const passwordInput = document.getElementById('password');
            const eyeIcon = document.getElementById('eyeIcon');
            if (passwordInput.type === 'password') {
                passwordInput.type = 'text';
                eyeIcon.classList.remove('fa-eye');
                eyeIcon.classList.add('fa-eye-slash');
            } else {
                passwordInput.type = 'password';
                eyeIcon.classList.remove('fa-eye-slash');
                eyeIcon.classList.add('fa-eye');
            }
        });
    </script>
</body>
</html>
