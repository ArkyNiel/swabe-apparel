<?php
session_start();
include '../../connection/connection.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'Not logged in']);
    exit;
}

$user_id = $_SESSION['user_id'];

try {
    $stmt = $conn->prepare("SELECT `id`, `user_id`, `product_id`, `product_name`, `image`, `price`, `added_at` FROM `wishlist` WHERE user_id = ? ORDER BY added_at DESC");
    $stmt->execute([$user_id]);
    $wishlist_items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode(['wishlist' => $wishlist_items]);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database error']);
}
?>
