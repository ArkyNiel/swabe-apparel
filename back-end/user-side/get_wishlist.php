<?php
session_start();
include '../../connection/connection.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['error' => 'Not logged in']);
    exit;
}

$user_id = $_SESSION['user_id'];

try {
    $stmt = $conn->prepare("SELECT product_id FROM wishlist WHERE user_id = ?");
    $stmt->execute([$user_id]);
    $wishlist_items = $stmt->fetchAll(PDO::FETCH_COLUMN);

    echo json_encode(['wishlist' => $wishlist_items]);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Database error']);
}
?>
