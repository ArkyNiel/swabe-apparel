<?php
require '../../connection/connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name     = $_POST['product_name'] ?? '';
    $category = $_POST['category'] ?? '';
    $size     = isset($_POST['size']) ? (is_array($_POST['size']) ? implode(',', $_POST['size']) : $_POST['size']) : '';
    $color    = $_POST['color'] ?? '';
    $stock    = isset($_POST['stock']) ? (int)$_POST['stock'] : 0;
    $price    = isset($_POST['price']) ? (float)$_POST['price'] : 0;
    
    $image = '';
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
        $target_dir = "../../user-side/uploads/"; 
        $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
        
        // file checker & format identification
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif']; 
        
        if (in_array($imageFileType, $allowed_types)) {
            // Move the uploaded file to the server directory
            if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
                $image = basename($_FILES["product_image"]["name"]);
            } else {
                echo "Error uploading file.";
                exit();
            }
        } else {
            echo "Invalid file format. Only JPG, JPEG, PNG, and GIF are allowed.";
            exit();
        }
    }

    // execute 
    $stmt = $conn->prepare("INSERT INTO inventory (product_name, category, size, color, stock, price, image_path) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $category, $size, $color, $stock, $price, $image]);

    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'message' => 'Product added successfully!']);
    exit;
}
?>
