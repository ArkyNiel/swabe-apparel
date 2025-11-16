<?php
include '../../connection/connection.php';

if (isset($_SESSION['user_id'])) {
    $user_id = $_SESSION['user_id'];
    $stmt = $conn->prepare("SELECT id, user_id, product_name, image, size, price, quantity, added_at FROM cart WHERE user_id = ? ORDER BY added_at DESC LIMIT 5");
    $stmt->execute([$user_id]);
    $cart_items = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else {
    $cart_items = [];
}

function timeAgo($datetime) {
    $now = new DateTime();
    $ago = new DateTime($datetime);
    $diff = $now->diff($ago);

    if ($diff->d > 0) return $diff->d . 'd ago';
    if ($diff->h > 0) return $diff->h . 'h ago';
    if ($diff->i > 0) return $diff->i . 'm ago';
    if ($diff->s > 0) return $diff->s . 's ago';
    return 'Just now';
}
?>
