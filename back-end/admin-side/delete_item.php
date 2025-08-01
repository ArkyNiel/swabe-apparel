<?php
require_once __DIR__ . '/../../connection/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $product_id = $_POST['product_id'] ?? null;
    
    if ($product_id) {
        try {
            // information of prod
            $stmt = $conn->prepare("SELECT image_path FROM inventory WHERE id = ?");
            $stmt->execute([$product_id]);
            $product = $stmt->fetch(PDO::FETCH_ASSOC);
            
            // Delete from database
            $stmt = $conn->prepare("DELETE FROM inventory WHERE id = ?");
            $stmt->execute([$product_id]);
            
            // img path
            if ($product && $product['image_path']) {
                $filePath = __DIR__ . '/../../user-side/uploads/' . $product['image_path'];
                if (file_exists($filePath)) {
                    unlink($filePath);
                }
            }
            
            echo json_encode(['success' => true, 'message' => 'Product deleted successfully']);
            
        } catch (Exception $e) {
            echo json_encode(['success' => false, 'message' => 'Failed to delete product']);
        }
    } else {
        echo json_encode(['success' => false, 'message' => 'Product ID required']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Invalid request method']);
}
?>