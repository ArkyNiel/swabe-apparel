<?php
session_start();
include '../../connection/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $stmt = $conn->prepare("SELECT * FROM account WHERE username = ?");
    $stmt->execute([$username]);

    if ($stmt->rowCount() === 1) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($password, $user['password'])) {
            // Store user data in session
            $_SESSION['user_id'] = $user['user_id'];
            $_SESSION['username'] = $user['username'];
            
            $_SESSION['alert'] = [
                'type' => 'success', 
                'message' => 'Hi, ' . $user['username'] . '!'
            ];
            
            // path
            header('Location: ../../user-side/links/home.php');
            exit;
        } else {
            $_SESSION['alert'] = [
                'type' => 'danger', 
                'message' => 'Incorrect password.'
            ];
        }
    } else {
        $_SESSION['alert'] = [
            'type' => 'danger', 
            'message' => 'Account not found.'
        ];
    }

    header('Location: ../../user-side/links/login.php');
    exit;
}
