<?php
require '../../connection/connection.php';

$status = isset($_GET['status']) ? trim($_GET['status']) : '';
$results = [];
if ($status !== '') {
    if ($status === 'in-stock') {
        $stmt = $conn->prepare("SELECT * FROM inventory WHERE stock > 9 LIMIT 50");
        $stmt->execute();
    } elseif ($status === 'low-stock') {
        $stmt = $conn->prepare("SELECT * FROM inventory WHERE stock > 0 AND stock <= 9 LIMIT 50");
        $stmt->execute();
    } elseif ($status === 'out-of-stock') {
        $stmt = $conn->prepare("SELECT * FROM inventory WHERE stock = 0 LIMIT 50");
        $stmt->execute();
    } else {
        $stmt = null;
    }
    if ($stmt) {
        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}

header('Content-Type: application/json');
echo json_encode(['products' => $results]);
?>
