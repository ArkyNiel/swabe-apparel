<?php
require_once __DIR__ . '/../../connection/connection.php';

$id = $_GET['id'] ?? null;
$filename = $_GET['filename'] ?? null;

if ($id && $filename) {
    try {
        // delete from database
        $stmt = $conn->prepare("DELETE FROM featured_products WHERE id = ?");
        $stmt->execute([$id]);
        
        // delete file
        $filePath = __DIR__ . '/../../assets/img/' . $filename;
        if (file_exists($filePath)) {
            unlink($filePath);
        }
        
        header('Location: ../../admin-side/main.php?page=featured_product&deleted=1');
        
    } catch (Exception $e) {
        header('Location: ../../admin-side/main.php?page=featured_product&error=delete');
    }
} else {
    header('Location: ../../admin-side/main.php?page=featured_product&error=missing');
}
?>
