<?php
require '../../connection/connection.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id       = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;
    $name     = $_POST['product_name'] ?? '';
    $category = $_POST['category'] ?? '';
    $size     = isset($_POST['size']) ? (is_array($_POST['size']) ? implode(',', $_POST['size']) : $_POST['size']) : '';
    $color    = $_POST['color'] ?? '';
    $stock    = isset($_POST['stock']) ? (int)$_POST['stock'] : 0;
    $price    = isset($_POST['price']) ? (float)$_POST['price'] : 0;

    // Fetch current image_path
    $stmt = $conn->prepare("SELECT image_path FROM inventory WHERE id = ?");
    $stmt->execute([$id]);
    $current = $stmt->fetch(PDO::FETCH_ASSOC);
    $image = $current ? $current['image_path'] : '';

    // Handle image upload if a new image is provided
    if (isset($_FILES['product_image']) && $_FILES['product_image']['error'] == 0) {
        $target_dir = "../../user-side/uploads/";
        $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
        $allowed_types = ['jpg', 'jpeg', 'png', 'gif'];
        if (in_array($imageFileType, $allowed_types)) {
            if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
                $image = basename($_FILES["product_image"]["name"]);
            }
        }
    }

    // Update the inventory item
    $stmt = $conn->prepare("UPDATE inventory SET product_name=?, category=?, size=?, color=?, stock=?, price=?, image_path=? WHERE id=?");
    $stmt->execute([$name, $category, $size, $color, $stock, $price, $image, $id]);

    header('Content-Type: application/json');
    echo json_encode(['success' => true, 'message' => 'Product updated successfully!']);
    exit;
}
?>
