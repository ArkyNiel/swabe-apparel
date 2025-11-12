<?php
// Prevent any output before JSON
ob_start();
session_start();
include '../../connection/connection.php';
// Clean any output that might have been generated
ob_clean();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_to_cart') {
    $isAjax = isset($_POST['ajax']) && $_POST['ajax'] === '1';

    if (!isset($_SESSION['user_id'])) {
        $response = ['status' => 'login_required', 'message' => 'Please login to add items to cart!'];
        if ($isAjax) {
            // Clean any output before sending JSON
            ob_clean();
            header('Content-Type: application/json');
            echo json_encode($response);
            exit;
        } else {
            header('Location: ../../user-side/links/login.php?message=' . urlencode($response['message']));
            exit;
        }
    }

    $user_id = $_SESSION['user_id'];
    $product_name = $_POST['product_name'] ?? '';
    $image = $_POST['image'] ?? '';
    $size = $_POST['size'] ?? '';
    $price = $_POST['price'] ?? '';
    $quantity = (int)($_POST['quantity'] ?? 1);

    if (!$conn) {
        $result = ['status' => 'error', 'message' => 'Database connection failed.'];
    } else {
        try {
            $checkStmt = $conn->prepare("SELECT 1 FROM cart WHERE user_id = ? AND product_name = ? AND size = ? LIMIT 1");
            $checkStmt->execute([$user_id, $product_name, $size]);
            if ($checkStmt->fetch()) {
                $result = ['status' => 'error', 'message' => 'This product with the selected size is already in your cart. Please select a different size.'];
            } else {
                // Make a random ID for the cart item
                $random_id = rand(100000, 999999);

                // Check if this ID is already used
                $idCheckStmt = $conn->prepare("SELECT 1 FROM cart WHERE id = ? LIMIT 1");
                $idCheckStmt->execute([$random_id]);

                // If ID exists, make a new one
                if ($idCheckStmt->fetch()) {
                    $random_id = rand(100000, 999999);
                }

                // Put the item in the cart
                $stmt = $conn->prepare("INSERT INTO cart (id, user_id, product_name, image, size, price, quantity, added_at) VALUES (?, ?, ?, ?, ?, ?, ?, NOW())");

                // Try to add it
                if ($stmt->execute([$random_id, $user_id, $product_name, $image, $size, $price, $quantity])) {
                    $result = ['status' => 'success', 'message' => 'Product added to cart successfully!'];
                } else {
                    $result = ['status' => 'error', 'message' => 'Failed to add product to cart.'];
                }
            }
        } catch (PDOException $e) {
            $result = ['status' => 'error', 'message' => 'Database error: ' . $e->getMessage()];
        }
    }

    if ($isAjax) {
        // Clean any output before sending JSON
        ob_clean();
        header('Content-Type: application/json');
        echo json_encode($result);
        exit;
    } else {
        $_SESSION['alert'] = ['type' => $result['status'] === 'success' ? 'success' : 'danger', 'message' => $result['message']];
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit;
    }
}
