<?php
session_start();
include '../../connection/connection.php';

function addToCart($user_id, $product_name, $image, $size, $price, $quantity) {
    global $conn;

    $stmt = $conn->prepare("INSERT INTO cart (user_id, product_name, image, size, price, quantity, added_at) VALUES (?, ?, ?, ?, ?, ?, NOW())");
    $stmt->execute([$user_id, $product_name, $image, $size, $price, $quantity]);

    if ($stmt->rowCount() > 0) {
        return json_encode([
            'status' => 'success',
            'message' => 'Product added to cart successfully!'
        ]);
    } else {
        return json_encode([
            'status' => 'error',
            'message' => 'Failed to add product to cart.'
        ]);
    }
}

// Handle AJAX POST request
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_to_cart') {
    // Check if user is logged in
    if (!isset($_SESSION['user_id'])) {
        echo json_encode([
            'status' => 'login_required',
            'message' => 'Please login to add items to cart!'
        ]);
        exit;
    }

    $user_id = $_SESSION['user_id'];
    $product_name = $_POST['product_name'] ?? '';
    $image = $_POST['image'] ?? '';
    $size = $_POST['size'] ?? '';
    $price = $_POST['price'] ?? '';
    $quantity = (int)($_POST['quantity'] ?? 1);

    echo addToCart($user_id, $product_name, $image, $size, $price, $quantity);
    exit;
}
?>
