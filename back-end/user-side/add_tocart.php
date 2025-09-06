<?php
session_start();
include '../../connection/connection.php';

function addToCart($user_id, $product_id, $product_name, $image, $size, $price, $quantity) {
    global $conn;

    // Check if the product with the same size is already in the cart for this user
    $checkStmt = $conn->prepare("SELECT COUNT(*) FROM cart WHERE user_id = ? AND id = ? AND size = ?");
    $checkStmt->execute([$user_id, $product_id, $size]);
    $count = $checkStmt->fetchColumn();

    if ($count > 0) {
        return [
            'status' => 'error',
            'message' => 'This product is in your cart already'
        ];
    }

    $stmt = $conn->prepare("INSERT INTO cart (user_id, id, product_name, image, size, price, quantity, added_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");
    $stmt->execute([$user_id, $product_id, $product_name, $image, $size, $price, $quantity]);

    if ($stmt->rowCount() > 0) {
        return [
            'status' => 'success',
            'message' => 'Product added to cart successfully!'
        ];
    } else {
        return [
            'status' => 'error',
            'message' => 'Failed to add product to cart.'
        ];
    }
}

// Handle POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_to_cart') {
    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        header('Location: ../../user-side/links/login.php?message=' . urlencode('Please login to add items to cart!'));
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $product_id = $_POST['product_id'] ?? '';
    $product_name = $_POST['product_name'] ?? '';
    $image = $_POST['image'] ?? '';
    $size = $_POST['size'] ?? '';
    $price = $_POST['price'] ?? '';
    $quantity = (int)($_POST['quantity'] ?? 1);

    $result = addToCart($user_id, $product_id, $product_name, $image, $size, $price, $quantity);

    if ($result['status'] === 'success') {
        $_SESSION['alert'] = ['type' => 'success', 'message' => $result['message']];
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    } else {
        $_SESSION['alert'] = ['type' => 'danger', 'message' => $result['message']];
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }
    exit;
}
?>
