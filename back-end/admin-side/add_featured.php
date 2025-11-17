<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once __DIR__ . '/../../connection/connection.php';
    
    // validation
    if ($_FILES['featured_img']['error'] !== UPLOAD_ERR_OK) {
        header('Location: ../../admin-side/main.php?page=featured_product&error=upload');
        exit;
    }
    
    // Check file type
    $allowed = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
    if (!in_array($_FILES['featured_img']['type'], $allowed)) {
        header('Location: ../../admin-side/main.php?page=featured_product&error=type');
        exit;
    }
    
    try {
        // Upload directory
        $uploadDir = __DIR__ . '/../../assets/img/';
        
        // create filename
        $extension = pathinfo($_FILES['featured_img']['name'], PATHINFO_EXTENSION);
        $filename = 'featured_' . uniqid() . '.' . $extension;
        $filepath = $uploadDir . $filename;
        
        // Move file
        if (move_uploaded_file($_FILES['featured_img']['tmp_name'], $filepath)) {
            // generated id
            $id = mt_rand(1000000, 9999999);
            $stmt = $conn->prepare("INSERT INTO featured_products (id, image_path, product_name, product_price, uploaded_at) VALUES (?, ?, ?, ?, NOW())");
            $stmt->execute([$id, $filename, $_POST['product_name'], $_POST['product_price']]);

            header('Location: ../../admin-side/main.php?page=featured_product&success=1');
        } else {
            header('Location: ../../admin-side/main.php?page=featured_product&error=move');
        }
        
    } catch (Exception $e) {
        if (isset($filepath) && file_exists($filepath)) {
            unlink($filepath);
        }
        header('Location: ../../admin-side/main.php?page=featured_product&error=db');
    }
}
?>