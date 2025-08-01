<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../../connection/connection.php';
    
    // validation
    if ($_FILES['trend_img']['error'] !== UPLOAD_ERR_OK) {
        header('Location: ../../admin-side/main.php?page=top_trends&error=upload');
        exit;
    }
    
    // Check file type
    $allowed = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
    if (!in_array($_FILES['trend_img']['type'], $allowed)) {
        header('Location: ../../admin-side/main.php?page=top_trends&error=type');
        exit;
    }
    
    try {
        // Upload directory
        $uploadDir = __DIR__ . '/../../assets/img/';
        
        // create filename
        $extension = pathinfo($_FILES['trend_img']['name'], PATHINFO_EXTENSION);
        $filename = 'trend_' . uniqid() . '.' . $extension;
        $filepath = $uploadDir . $filename;
        
        // Move file
        if (move_uploaded_file($_FILES['trend_img']['tmp_name'], $filepath)) {
            // save to database
            $stmt = $conn->prepare("INSERT INTO top_trends (image_path, product_name, product_price, uploaded_at) VALUES (?, ?, ?, NOW())");
            $stmt->execute([$filename, $_POST['product_name'], $_POST['product_price']]);
            
            header('Location: ../../admin-side/main.php?page=top_trends&success=1');
        } else {
            header('Location: ../../admin-side/main.php?page=top_trends&error=move');
        }
        
    } catch (Exception $e) {
        if (isset($filepath) && file_exists($filepath)) {
            unlink($filepath);
        }
        header('Location: ../../admin-side/main.php?page=top_trends&error=db');
    }
}
?>