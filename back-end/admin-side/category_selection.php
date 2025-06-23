<?php
require '../../connection/connection.php';

$category = isset($_GET['category']) ? trim($_GET['category']) : '';
$results = [];
if ($category !== '') {
    $stmt = $conn->prepare("SELECT * FROM inventory WHERE category LIKE ? LIMIT 50");
    $stmt->execute(['%' . $category . '%']);
    $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
}

header('Content-Type: application/json');
echo json_encode(['products' => $results]);
?>
