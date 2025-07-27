<?php
require_once __DIR__ . '/../../connection/connection.php';

$message = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['banner_img'])) {
    $file = $_FILES['banner_img'];
    $allowedTypes = ['image/jpeg', 'image/png', 'image/gif', 'image/webp'];
    $maxSize = 5 * 1024 * 1024; // 5MB

    if ($file['error'] !== UPLOAD_ERR_OK) {
        $message = 'File upload error.';
    } elseif (!in_array($file['type'], $allowedTypes)) {
        $message = 'Invalid file type.';
    } elseif ($file['size'] > $maxSize) {
        $message = 'File is too large.';
    } else {
        $ext = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newName = uniqid('banner_', true) . '.' . $ext;
        $uploadDir = __DIR__ . '/../../assets/img/';
        $targetPath = $uploadDir . $newName;

        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            $imagePath = 'assets/img/' . $newName; // Relative path for web use
            $sql = "INSERT INTO shop_banners (image_path) VALUES (:image_path)";
            $stmt = $conn->prepare($sql);
            if ($stmt->execute(['image_path' => $imagePath])) {
                $message = 'Banner uploaded successfully!';
            } else {
                $message = 'Database error.';
                unlink($targetPath);
            }
        } else {
            $message = 'Failed to move uploaded file.';
        }
    }
    // Redirect back to the form with a message
    header("Location: ../../admin-side/links/shop_picture.php?message=" . urlencode($message));
    exit;
} else {
    // If accessed directly, redirect to form
    header("Location: ../../admin-side/links/shop_picture.php");
    exit;
}
