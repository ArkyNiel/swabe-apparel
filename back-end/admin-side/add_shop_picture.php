<?php
// Only run if this is included, not directly accessed
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['banner_img'])) {
    require_once __DIR__ . '/../../connection/connection.php';
    $msg = null;
    $success = null;

    if ($_FILES['banner_img']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/../../assets/img/';
        $fileName = uniqid('banner_') . basename($_FILES['banner_img']['name']);
        $targetFile = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES['banner_img']['tmp_name'], $targetFile)) {
            $imagePath = $fileName;
            $stmt = $conn->prepare("INSERT INTO shop_banners (image_path) VALUES (?)");
            if ($stmt->execute([$imagePath])) {
                $msg = "Banner uploaded successfully!";
                $success = true;
            } else {
                $msg = "File uploaded but failed to save to database.";
                $success = false;
            }
        } else {
            $msg = "Failed to move uploaded file.";
            $success = false;
        }
    } else {
        $msg = "No file uploaded or upload error.";
        $success = false;
    }
}
?>
