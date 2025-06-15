<?php
require '../../connection/connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $name     = $_POST['product_name'];
    $category = $_POST['category'];
    $size     = $_POST['size'] ?? null;
    $color    = $_POST['color'];
    $stock    = (int)$_POST['stock'];
    
    $imagePath = null;
    if (!empty($_FILES['product_image']['tmp_name'])) {
        $uploadDir = '../../user-side/uploads/';
        $fileName = basename($_FILES['product_image']['name']);
        $targetPath = $uploadDir . time() . '_' . $fileName;

        if (move_uploaded_file($_FILES['product_image']['tmp_name'], $targetPath)) {
            $imagePath = $targetPath;
        }
    }

    // execute SQL
    $stmt = $conn->prepare("INSERT INTO inventory (product_name, category, size, color, stock, image_path) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$name, $category, $size, $color, $stock, $imagePath]);

    header("Location: ../../admin-side/main.php?page=inventory");
    exit;
}
?>
