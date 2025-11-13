<?php
// Prevent any output before JSON
ob_start();
session_start();
include '../../connection/connection.php';
// Clean any output that might have been generated
ob_clean();

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action']) && $_POST['action'] === 'add_to_wishlist') {
    $isAjax = isset($_POST['ajax']) && $_POST['ajax'] === '1';

    if (!isset($_SESSION['user_id'])) {
        $response = ['status' => 'login_required', 'message' => 'Please login to add items to wishlist!'];
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
    $product_id = $_POST['product_id'] ?? '';
    $product_name = $_POST['product_name'] ?? '';
    $image = basename($_POST['image'] ?? '');
    $price = $_POST['price'] ?? '';

    if (!$conn) {
        $result = ['status' => 'error', 'message' => 'Database connection failed.'];
    } else {
        try {
            // Check if product is already in wishlist
            $checkStmt = $conn->prepare("SELECT 1 FROM wishlist WHERE user_id = ? AND product_id = ? LIMIT 1");
            $checkStmt->execute([$user_id, $product_id]);
            if ($checkStmt->fetch()) {
                $result = ['status' => 'error', 'message' => 'This product is already in your wishlist.'];
            } else {
                // Add to wishlist
                $stmt = $conn->prepare("INSERT INTO wishlist (user_id, product_id, product_name, image, price) VALUES (?, ?, ?, ?, ?)");
                $current_time = date('Y-m-d H:i:s');

                if ($stmt->execute([$user_id, $product_id, $product_name, $image, $price])) {
                    $result = ['status' => 'success', 'message' => 'Product added to wishlist successfully!'];
                } else {
                    $result = ['status' => 'error', 'message' => 'Failed to add product to wishlist.'];
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
