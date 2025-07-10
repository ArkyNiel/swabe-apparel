<?php
require '../../connection/connection.php';

$sizes = [];
if (isset($_GET['product_id']) && is_numeric($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $stmt = $conn->prepare("SELECT size FROM product_sizes WHERE product_id = ?");
    $stmt->execute([$product_id]);
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $sizes[] = $row['size'];
    }
}
echo json_encode($sizes);
?>