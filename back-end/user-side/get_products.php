<?php
$rootPath = dirname(dirname(__DIR__));
include $rootPath . '/connection/connection.php';

function getProducts($conn, $start, $limit, $imagePathPrefix = './uploads/', $category = null) {
    try {
        
        // Get total count first
        if ($category) {
            $countStmt = $conn->prepare("SELECT COUNT(*) as total FROM `inventory` WHERE `category` = :category");
            $countStmt->bindValue(':category', $category, PDO::PARAM_STR);
        } else {
            $countStmt = $conn->prepare("SELECT COUNT(*) as total FROM `inventory`");
        }
        $countStmt->execute();
        $totalCount = $countStmt->fetch(PDO::FETCH_ASSOC)['total'];

        if ($category) {
            $stmt = $conn->prepare("SELECT `id`, `product_name`, `category`, `size`, `color`, `stock`, `image_path`, `price`, `created_at` FROM `inventory` WHERE `category` = :category ORDER BY `id` DESC LIMIT :start, :limit");
            $stmt->bindValue(':category', $category, PDO::PARAM_STR);
        } else {
            $stmt = $conn->prepare("SELECT `id`, `product_name`, `category`, `size`, `color`, `stock`, `image_path`, `price`, `created_at` FROM `inventory` ORDER BY `id` DESC LIMIT :start, :limit");
        }
        $stmt->bindValue(':start', (int)$start, PDO::PARAM_INT);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
        foreach ($products as &$product) {
            if (!empty($product['image_path'])) {
                $product['image'] = $imagePathPrefix . $product['image_path'];
            } else {
                $product['image'] = '';
            }
            $product['name'] = $product['product_name'];
        }

        return [
            'products' => $products,
            'total' => $totalCount,
            'hasMore' => ($start + $limit) < $totalCount
        ];
    } catch(PDOException $e) {
        return ['error' => $e->getMessage()];
    }
}

// json output and path of image
// pre loaded new products/cards
if (basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {
    header('Content-Type: application/json');
    $start = isset($_GET['start']) ? (int)$_GET['start'] : 0;
    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 12;
    $prefix = isset($_GET['prefix']) ? $_GET['prefix'] : 'uploads/';
    $category = isset($_GET['category']) ? $_GET['category'] : null;
    echo json_encode(getProducts($conn, $start, $limit, $prefix, $category));
}
?>