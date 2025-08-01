<?php
require_once __DIR__ . '/../../connection/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $input = json_decode(file_get_contents('php://input'), true);
    $id = $input['id'] ?? null;
    $filename = $input['filename'] ?? null;

    // Check if we have the required data
    if (!$id || !$filename) {
        echo json_encode(['success' => false, 'msg' => 'Missing data']);
        exit;
    }

    try {
        // Delete from database first
        $stmt = $conn->prepare("DELETE FROM shop_banners WHERE id = ?");
        $result = $stmt->execute([$id]);
        
        if ($result && $stmt->rowCount() > 0) {
            // Delete file from server
            $filePath = __DIR__ . '/../../assets/img/' . $filename;
            if (file_exists($filePath)) {
                unlink($filePath);
            }
            
            // Make sure we send proper JSON response
            header('Content-Type: application/json');
            echo json_encode(['success' => true, 'msg' => 'Banner deleted successfully']);
        } else {
            header('Content-Type: application/json');
            echo json_encode(['success' => false, 'msg' => 'Banner not found in database']);
        }
        
    } catch (PDOException $e) {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'msg' => 'Database error: ' . $e->getMessage()]);
    } catch (Exception $e) {
        header('Content-Type: application/json');
        echo json_encode(['success' => false, 'msg' => 'Error: ' . $e->getMessage()]);
    }
} else {
    header('Content-Type: application/json');
    echo json_encode(['success' => false, 'msg' => 'Invalid request method']);
}
?> 