<?php
require '../../connection/connection.php';

$stmt = $conn->prepare("SELECT * FROM inventory");
$stmt->execute();
$result = $stmt->fetchAll(PDO::FETCH_ASSOC);

echo json_encode($result);
?>
