<?php
// Check if user is not logged in
// manageaccount*
// addtocart*

if (!isset($_SESSION['user_id'])) {
    $_SESSION['alert'] = [
        'type' => 'warning',
        'message' => 'Please login to access this page!'
    ];
    header('Location: ../../user-side/links/login.php');
    exit;
}
?>