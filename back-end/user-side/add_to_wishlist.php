<?php
// Prevent any output before JSON
ob_start();
session_start();
include '../../connection/connection.php';
// Clean any output that might have been generated
ob_clean();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'] ?? '';

    if ($action === 'add_to_wishlist') {
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

        $user_id = (int)$_SESSION['user_id'];
        $product_id = (int)($_POST['product_id'] ?? 0);
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
                $exists = $checkStmt->fetch();

                if ($exists) {
                    $result = ['status' => 'error', 'message' => 'This product is already in your wishlist.'];
                } else {
                    // Product not in wishlist, so add it
                    // generated id ito ha
                    do {
                        $id = mt_rand(10000000, 99999999);
                        $stmt = $conn->prepare("INSERT INTO wishlist (id, user_id, product_id, product_name, image, price, added_at) VALUES (?, ?, ?, ?, ?, ?, NOW())");
                        $success = $stmt->execute([$id, $user_id, $product_id, $product_name, $image, $price]);
                        if (!$success) {
                            $errorCode = $stmt->errorInfo()[1];
                        }
                    } while (!$success && $errorCode == 1062); 

                    if ($success) {
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
    } elseif ($action === 'remove') {
        if (!isset($_SESSION['user_id'])) {
            echo json_encode(['success' => false, 'message' => 'Not logged in']);
            exit;
        }

        $user_id = (int)$_SESSION['user_id'];
        $product_id = (int)($_POST['product_id'] ?? 0);

        try {
            $stmt = $conn->prepare("DELETE FROM wishlist WHERE product_id = ? AND user_id = ?");
            $stmt->execute([$product_id, $user_id]);
            // Always return success for remove action, even if item wasn't in wishlist
            echo json_encode(['success' => true]);
        } catch (PDOException $e) {
            echo json_encode(['success' => false, 'message' => 'Database error']);
        }
        exit;
    }
}
