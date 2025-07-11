<?php
require '../../connection/connection.php';

$sizes = [];
if (isset($_GET['product_id']) && is_numeric($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $stmt = $conn->prepare("SELECT size FROM inventory WHERE id = ?");
    $stmt->execute([$product_id]);
    if ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        // Split comma-separated sizes and trim whitespace
        $sizes = array_map('trim', explode(',', $row['size']));
    }
}
echo json_encode($sizes);
?>