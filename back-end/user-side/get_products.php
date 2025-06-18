<?php
// Use __DIR__ to get the absolute path to this file's directory
$rootPath = dirname(dirname(__DIR__));
include $rootPath . '/connection/connection.php';

function getInitialProducts($conn, $limit, $imagePathPrefix = './uploads/') {
    try {
        $stmt = $conn->prepare("SELECT `id`, `product_name`, `category`, `size`, `color`, `stock`, `image_path`, `price`, `created_at` FROM `inventory` LIMIT ?");
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Format the image paths to be relative to the current page
        foreach ($products as &$product) {
            if (!empty($product['image_path'])) {
                // Use the provided path prefix
                $product['image_path'] = $imagePathPrefix . $product['image_path'];
            }
        }
        
        return $products;
    } catch(PDOException $e) {
        return ['error' => $e->getMessage()];
    }
}
?>