<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['banner_img'])) {
    require_once __DIR__ . '/../../connection/connection.php';
    
    // validation
    if ($_FILES['banner_img']['error'] !== UPLOAD_ERR_OK) {
        echo json_encode(['success' => false, 'msg' => 'Upload error']);
        exit;
    }
    
    // Check file type
    $allowed = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
    if (!in_array($_FILES['banner_img']['type'], $allowed)) {
        echo json_encode(['success' => false, 'msg' => 'Invalid file type']);
        exit;
    }
    
    if ($_FILES['banner_img']['size'] > 5 * 1024 * 1024) {
        echo json_encode(['success' => false, 'msg' => 'File too large']);
        exit;
    }
    
    try {
        // Upload directory, need to change folder, * temporary folder
        $uploadDir = __DIR__ . '/../../assets/img/';
        
        // create
        $extension = pathinfo($_FILES['banner_img']['name'], PATHINFO_EXTENSION);
        $filename = 'banner_' . uniqid() . '.' . $extension;
        $filepath = $uploadDir . $filename;
        
        // Move file
        if (move_uploaded_file($_FILES['banner_img']['tmp_name'], $filepath)) {
            // generated id
            $id = mt_rand(1000000, 9999999);
            $stmt = $conn->prepare("INSERT INTO shop_banners (id, image_path, uploaded_at) VALUES (?, ?, NOW())");
            $stmt->execute([$id, $filename]);

            echo json_encode(['success' => true, 'msg' => 'Banner uploaded!']);
        } else {
            echo json_encode(['success' => false, 'msg' => 'Upload failed']);
        }
        
    } catch (Exception $e) {
        // Delete file if exists
        if (isset($filepath) && file_exists($filepath)) {
            unlink($filepath);
        }
        echo json_encode(['success' => false, 'msg' => 'Database error']);
    }
}
?>
