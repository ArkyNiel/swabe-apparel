<?php
require_once __DIR__ . '/../../connection/connection.php';

$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$per_page = isset($_GET['limit']) ? intval($_GET['limit']) : 10;
$offset = ($page - 1) * $per_page;

// pagination * need to delete this
$count_sql = "SELECT COUNT(*) FROM `top_trends`";
$total_trends = $conn->query($count_sql)->fetchColumn();
$total_pages = ceil($total_trends / $per_page);

// current
$sql = "SELECT `id`, `image_path`, `product_name`, `product_price`, `uploaded_at` FROM `top_trends` ORDER BY `uploaded_at` DESC LIMIT :limit OFFSET :offset";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':limit', $per_page, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$trend_images = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode([
    'trends' => $trend_images,
    'page' => $page,
    'total_pages' => $total_pages
]);
?> 