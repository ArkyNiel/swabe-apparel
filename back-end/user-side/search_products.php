<?php
$rootPath = dirname(dirname(__DIR__));
include $rootPath . '/connection/connection.php';

header('Content-Type: application/json');

try {
    $searchTerm = isset($_GET['search']) ? trim($_GET['search']) : (isset($_GET['q']) ? trim($_GET['q']) : '');
    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 10;
    
    if (empty($searchTerm)) {
        echo json_encode([]);
        exit;
    }
    
    $stmt = $conn->prepare("
        SELECT `id`, `product_name`, `category`, `size`, `color`, `stock`, `image_path`, `price`, `created_at` 
        FROM `inventory` 
        WHERE (`product_name` LIKE :search 
        OR `category` LIKE :search)
        AND `stock` > 0
        ORDER BY 
            CASE 
                WHEN `product_name` = :exact_search THEN 1
                WHEN `product_name` LIKE :start_search THEN 2
                WHEN `product_name` LIKE :search THEN 3
                ELSE 4
            END,
            `product_name` ASC
        LIMIT :limit
    ");
    
    $searchPattern = '%' . $searchTerm . '%';
    $exactSearch = $searchTerm;
    $startSearch = $searchTerm . '%';
    
    $stmt->bindValue(':search', $searchPattern, PDO::PARAM_STR);
    $stmt->bindValue(':exact_search', $exactSearch, PDO::PARAM_STR);
    $stmt->bindValue(':start_search', $startSearch, PDO::PARAM_STR);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    
    $stmt->execute();
    $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
    $imagePrefix = isset($_GET['prefix']) ? $_GET['prefix'] : '../uploads/';
    foreach ($products as &$product) {
        if (!empty($product['image_path'])) {
            $product['image'] = $imagePrefix . $product['image_path'];
        } else {
            $product['image'] = '';
        }
        $product['name'] = $product['product_name'];
    }
    
    echo json_encode($products);
    
} catch(PDOException $e) {
    echo json_encode(['error' => $e->getMessage()]);
}
?>