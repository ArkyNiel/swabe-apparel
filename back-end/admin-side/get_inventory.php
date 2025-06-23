<?php
require '../../connection/connection.php';

$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 5;
$offset = ($page - 1) * $limit;

$stmt = $conn->prepare("SELECT * FROM inventory LIMIT :limit OFFSET :offset");
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Get total count for pagination
$totalStmt = $conn->query("SELECT COUNT(*) as total FROM inventory");
$total = $totalStmt->fetch(PDO::FETCH_ASSOC)['total'];

echo json_encode([
    'products' => $result,
    'total' => $total,
    'page' => $page,
    'limit' => $limit
]);
?>
