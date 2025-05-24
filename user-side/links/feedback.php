<?php 
define('LOADER_INCLUDED', true);
include("../../back-end/user-side/session_check.php");
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback | Swabe Apparel</title>
    <link rel="stylesheet" href="../../assets/bootswatch/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/custom-navbar.css">
    <style>
    .auth-container {
        min-height: 100vh;
    }

    .auth-branding {
        background: #f8f9fa;
    }

    .brand-logo {
        max-width: 150px;
        margin-bottom: 1rem;
    }

    .feedback-form {
        max-width: 100%;
        width: 100%;
    }

    .btn-submit {
        width: 100%;
        margin-top: 1.5rem;
    }
    </style>
</head>

<body>
    <?php include('../components/loader.php'); ?>

    <div class="container-fluid auth-container d-flex align-items-center justify-content-center">
        <div class="row w-100 shadow rounded-1 overflow-hidden" style="max-width: 1000px; height: 600px;">
            <!-- Branding -->
            <div class="col-md-6 d-none d-md-flex flex-column align-items-center justify-content-center auth-branding">
                <img src="../../assets/img/logo.jpg" alt="Swabe Apparel Logo" class="brand-logo mb-3">
                <h3 class="fw-bold text-center">SWABE APPAREL</h3>
                <p class="text-muted text-center px-4">Let swabe apparel know your shopping experience through checking
                    online!</p>
            </div>
            <!-- Feedback Form -->
            <div class="col-md-6 bg-white d-flex align-items-center justify-content-center">
                <div class="w-100 p-4" style="max-width: 450px;">
                    <h2 class="mb-4 text-center">USER FEEDBACK</h2>
                    <form class="feedback-form" id="feedbackForm" method="POST" action="submit_feedback.php">
                        <div class="mb-3">
                            <label for="feedbackText" class="form-label">How was your experience?</label>
                            <textarea class="form-control" id="feedbackText" name="feedback_text" rows="4" required
                                placeholder="Please share your experience with us..."></textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label d-block">Feedback Type</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="feedback_type" id="typeBug"
                                    value="bug" required>
                                <label class="form-check-label" for="typeBug">
                                    Bug Report
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="feedback_type" id="typeExperience"
                                    value="experience">
                                <label class="form-check-label" for="typeExperience">
                                    User Experience
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="feedback_type" id="typeStore"
                                    value="store">
                                <label class="form-check-label" for="typeStore">
                                    About the Store
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary btn-submit">
                            Submit Feedback
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>