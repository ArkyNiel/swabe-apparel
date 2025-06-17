<?php
include '../connection/connection.php';

function getInitialProducts($conn, $limit) {
    try {
        $stmt = $conn->prepare("SELECT `id`, `product_name`, `category`, `size`, `color`, `stock`, `image_path`, `created_at` FROM `inventory` LIMIT ?");
        $stmt->bindValue(1, $limit, PDO::PARAM_INT);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    } catch(PDOException $e) {
        return ['error' => $e->getMessage()];
    }
}
?>