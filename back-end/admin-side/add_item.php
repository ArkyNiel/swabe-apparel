<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../../connection/connection.php';
    
    // validation
    if ($_FILES['product_image']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['success' => false, 'message' => 'Upload error']);
        exit;
    }
    
    // Check file type
    $allowed = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
    if (!in_array($_FILES['product_image']['type'], $allowed)) {
        echo json_encode(['success' => false, 'message' => 'Invalid file type']);
        exit;
    }
    
    try {
        // dir
        $uploadDir = __DIR__ . '/../../user-side/uploads/';
        
        // create filename
        $extension = pathinfo($_FILES['product_image']['name'], PATHINFO_EXTENSION);
        $filename = 'product_' . uniqid() . '.' . $extension;
        $filepath = $uploadDir . $filename;
        
        // Move file
        if (move_uploaded_file($_FILES['product_image']['tmp_name'], $filepath)) {
            // generated id
            $id = mt_rand(1000000, 9999999);
            $name = $_POST['product_name'] ?? '';
            $category = $_POST['category'] ?? '';
            $size = isset($_POST['size']) ? (is_array($_POST['size']) ? implode(',', $_POST['size']) : $_POST['size']) : '';
            $color = $_POST['color'] ?? '';
            $stock = isset($_POST['stock']) ? (int)$_POST['stock'] : 0;
            $price = isset($_POST['price']) ? (float)$_POST['price'] : 0;

            $stmt = $conn->prepare("INSERT INTO inventory (id, product_name, category, size, color, stock, price, image_path) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
            $stmt->execute([$id, $name, $category, $size, $color, $stock, $price, $filename]);
            
            echo json_encode(['success' => true, 'message' => 'Product added successfully!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Failed to upload file']);
        }
        
    } catch (Exception $e) {
        if (isset($filepath) && file_exists($filepath)) {
            unlink($filepath);
        }
        echo json_encode(['success' => false, 'message' => 'Database error']);
    }
}
?>