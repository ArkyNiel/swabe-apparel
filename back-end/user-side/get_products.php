<?php
$rootPath = dirname(dirname(__DIR__));
include $rootPath . '/connection/connection.php';

function getProducts($conn, $start, $limit, $imagePathPrefix = './uploads/') {
    try {
        $stmt = $conn->prepare("SELECT `id`, `product_name`, `category`, `size`, `color`, `stock`, `image_path`, `price`, `created_at` FROM `inventory` LIMIT :start, :limit");
        $stmt->bindValue(':start', (int)$start, PDO::PARAM_INT);
        $stmt->bindValue(':limit', (int)$limit, PDO::PARAM_INT);
        $stmt->execute();
        $products = $stmt->fetchAll(PDO::FETCH_ASSOC);
 
        // path and keys
        foreach ($products as &$product) {
            if (!empty($product['image_path'])) {
                $product['image'] = $imagePathPrefix . $product['image_path'];
            } else {
                $product['image'] = '';
            }
            $product['name'] = $product['product_name'];
            // bug here, kelangan ma display yung image
        }

        return $products;
    } catch(PDOException $e) {
        return ['error' => $e->getMessage()];
    }
}

// json output and path of image

if (basename(__FILE__) == basename($_SERVER['SCRIPT_FILENAME'])) {
    header('Content-Type: application/json');
    $start = isset($_GET['start']) ? (int)$_GET['start'] : 0;
    $limit = isset($_GET['limit']) ? (int)$_GET['limit'] : 12;
    echo json_encode(getProducts($conn, $start, $limit, './uploads/'));
}
?>