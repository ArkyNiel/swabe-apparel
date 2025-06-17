<?php
include '../connection/connection.php';

function getInitialProducts($conn, $limit) {
    try {
        $stmt = $conn->prepare("SELECT `id`, `product_name`, `category`, `size`, `color`, `stock`, `image_path`, `created_at` FROM `inventory` LIMIT ?");
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        // Format the image paths to be relative to the current page
        foreach ($products as &$product) {
            // Convert the stored path to be relative to the current page
            if (strpos($product['image_path'], '../../') === 0) {
                $product['image_path'] = $product['image_path'];
            } else {
                $product['image_path'] = '../../' . $product['image_path'];
            }
        }
        
        return $products;
    } catch(PDOException $e) {
        return ['error' => $e->getMessage()];
    }
}
?>