<?php
require_once __DIR__ . '/../../connection/connection.php';

$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$per_page = isset($_GET['limit']) ? intval($_GET['limit']) : 10;
$offset = ($page - 1) * $per_page;

// pagination[bugg heree]]
$count_sql = "SELECT COUNT(*) FROM `shop_banners`";
$total_banners = $conn->query($count_sql)->fetchColumn();
$total_pages = ceil($total_banners / $per_page);

// Fetch only the current
$sql = "SELECT `id`, `image_path`, `uploaded_at` FROM `shop_banners` ORDER BY `uploaded_at` DESC LIMIT :limit OFFSET :offset";
$stmt = $conn->prepare($sql);
$stmt->bindValue(':limit', $per_page, PDO::PARAM_INT);
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->execute();
$banner_images = $stmt->fetchAll(PDO::FETCH_ASSOC);

header('Content-Type: application/json');
echo json_encode([
    'banners' => $banner_images,
    'page' => $page,
    'total_pages' => $total_pages
]);