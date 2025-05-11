<?php
session_start();
include '../../connection/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $user_id = date("y") . rand(100000000, 999999999);

    $stmt = $conn->prepare("SELECT * FROM account WHERE username = ?");
    $stmt->execute([$username]);

    if ($stmt->rowCount() > 0) {
        $_SESSION['alert'] = ['type' => 'danger', 'message' => 'Username already taken.'];
    } else {
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
        $insert = $conn->prepare("INSERT INTO account (user_id, username, password) VALUES (?, ?, ?)");
        if ($insert->execute([$user_id, $username, $hashedPassword])) {
            $_SESSION['alert'] = ['type' => 'success', 'message' => 'Account created successfully!'];
        } else {
            $_SESSION['alert'] = ['type' => 'danger', 'message' => 'Failed to create account.'];
        }
    }

    header('Location: ../../user-side/links/create.php');
    exit;
}
?>
