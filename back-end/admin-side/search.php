<?php
require '../../connection/connection.php';

$query = isset($_GET['query']) ? trim($_GET['query']) : '';
$results = [];
if ($query !== '') {
    $like = '%' . $query . '%';
    $stmt = $conn->prepare("SELECT * FROM inventory WHERE product_name LIKE ? OR category LIKE ? OR color LIKE ? OR size LIKE ? LIMIT 50");
    $stmt->execute([$like, $like, $like, $like]);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

header('Content-Type: application/json');
echo json_encode(['products' => $results]);
?>
