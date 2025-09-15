<?php
session_start();
include '../../connection/connection.php';

function addToCart($user_id, $product_name, $image, $size, $price, $quantity) {
    global $conn;

    $checkStmt = $conn->prepare("SELECT 1 FROM cart WHERE user_id = ? AND product_name = ? AND size = ? LIMIT 1");
    $checkStmt->execute([$user_id, $product_name, $size]);
    if ($checkStmt->fetch()) {
        return ['status' => 'error', 'message' => 'This product with the selected size is already in your cart. Please select a different size.'];
    }

    $stmt = $conn->prepare("INSERT INTO cart (user_id, product_name, image, size, price, quantity, added_at) VALUES (?, ?, ?, ?, ?, ?, NOW())");
    if ($stmt->execute([$user_id, $product_name, $image, $size, $price, $quantity])) {
        return ['status' => 'success', 'message' => 'Product added to cart successfully!'];
    }
    return ['status' => 'error', 'message' => 'Failed to add product to cart.'];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && ($_POST['action'] ?? '') === 'add_to_cart') {
    if (!isset($_SESSION['user_id'])) {
        header('Location: ../../user-side/links/login.php?message=' . urlencode('Please login to add items to cart!'));
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $product_name = $_POST['product_name'] ?? '';
    $image = $_POST['image'] ?? '';
    $size = $_POST['size'] ?? '';
    $price = $_POST['price'] ?? '';
    $quantity = (int)($_POST['quantity'] ?? 1);

    $result = addToCart($user_id, $product_name, $image, $size, $price, $quantity);

    $_SESSION['alert'] = ['type' => $result['status'] === 'success' ? 'success' : 'danger', 'message' => $result['message']];
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit;
}
?>
