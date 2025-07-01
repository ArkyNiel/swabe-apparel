<?php 
  session_start();
  include("../../back-end/user-side/session_check.php");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swabe apparel - manage account</title>
    <link rel="stylesheet" href="../../assets/bootswatch/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/custom-navbar.css">
    <!-- Add Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <style>
    .auth-container {
        min-height: 100vh;
    }

    .auth-branding {
        background: #f8f9fa;
    }

    .brand-logo {
        max-width: 120px;
        margin-bottom: 1rem;
    }

    /* Alert animations */
    .alert {
        animation: slideIn 0.3s ease-out;
    }

    @keyframes slideIn {
        from {
            transform: translateY(-20px);
            opacity: 0;
        }

        to {
            transform: translateY(0);
            opacity: 1;
        }
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
                <h3 class="fw-bold text-center">SWABE APPAREL</h3>
                <p class="text-muted text-center px-4">Configure your account</p>
            </div>

            <!-- Manage Account Form -->
            <div class="col-md-6 bg-white d-flex align-items-center justify-content-center">
                <div class="w-100 p-4" style="max-width: 450px;">
                    <h2 class="mb-4 text-center">Manage account</h2>

                    <!-- Alert Messages -->
                    <?php if (isset($_SESSION['alert'])): ?>
                    <?php if ($_SESSION['alert']['type'] === 'success'): ?>
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="fas fa-check-circle me-2"></i>
                        <?php echo $_SESSION['alert']['message']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php elseif ($_SESSION['alert']['type'] === 'danger'): ?>
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-circle me-2"></i>
                        <?php echo $_SESSION['alert']['message']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php elseif ($_SESSION['alert']['type'] === 'warning'): ?>
                    <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        <?php echo $_SESSION['alert']['message']; ?>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    <?php endif; ?>
                    <?php unset($_SESSION['alert']); ?>
                    <?php endif; ?>

                    <form action="../../back-end/user-side/update_account_process.php" method="POST" autocomplete="off">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" id="username" name="username" required>
                        </div>
                        <div class="mb-3">
                            <label for="old_password" class="form-label">Old Password</label>
                            <input type="password" class="form-control" id="old_password" name="old_password" required
                                minlength="6">
                        </div>
                        <div class="mb-3">
                            <label for="new_password" class="form-label">New Password</label>
                            <input type="password" class="form-control" id="new_password" name="new_password" required
                                minlength="6">
                        </div>
                        <div class="mb-3">
                            <label for="confirm_password" class="form-label">Confirm Password</label>
                            <input type="password" class="form-control" id="confirm_password" name="confirm_password"
                                required minlength="6">
                        </div>
                        <button type="submit" class="btn btn-dark w-100">Update Account</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>