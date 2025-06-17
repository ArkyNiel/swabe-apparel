<?php
require '../../connection/connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name     = $_POST['product_name'];
    $category = $_POST['category'];
    $size     = $_POST['size'] ?? null;
    $color    = $_POST['color'];
    $stock    = (int)$_POST['stock'];
    $price    = (float)$_POST['price'];
    
    $imagePath = null;
    if (!empty($_FILES['product_image']['tmp_name'])) {
        $uploadDir = '../../user-side/uploads/';
        $fileName = basename($_FILES['product_image']['name']);
        $targetPath = $uploadDir . time() . '_' . $fileName;

        if (move_uploaded_file($_FILES['product_image']['tmp_name'], $targetPath)) {
            // Store the path relative to the root
            $imagePath = 'user-side/uploads/' . time() . '_' . $fileName;
        }
    }

    // execute SQL
    $stmt = $conn->prepare("INSERT INTO inventory (product_name, category, size, color, stock, price, image_path) VALUES (?, ?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $category, $size, $color, $stock, $price, $imagePath]);

    header("Location: ../../admin-side/main.php?page=inventory");
    exit;
}
?>
