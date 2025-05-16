<?php
session_start();
include '../../connection/connection.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'];
    $old_password = $_POST['old_password'];
    $new_password = $_POST['new_password'];
    $confirm_password = $_POST['confirm_password'];

    // the password requires upto 6 lenght
    if (strlen($new_password) < 6) {
        $_SESSION['alert'] = [
            'type' => 'warning',
            'message' => 'Password must be at least 6 characters long!'
        ];
        header('Location: ../../user-side/links/manageaccount.php');
        exit;
    }
    
    // Verify account and old password
    $stmt = $conn->prepare("SELECT * FROM account WHERE username = ?");
    $stmt->execute([$username]);
    
    if ($stmt->rowCount() === 1) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        
        if (password_verify($old_password, $user['password'])) {
            if ($new_password === $confirm_password) {
                // Check if new password is same as old password
                if ($new_password === $old_password) {
                    $_SESSION['alert'] = [
                        'type' => 'warning',
                        'message' => 'New password cannot be the same as your current password!'
                    ];
                } else {
                    // Update password
                    $hashedPassword = password_hash($new_password, PASSWORD_DEFAULT);
                    $update = $conn->prepare("UPDATE account SET password = ? WHERE username = ?");
                    
                    if ($update->execute([$hashedPassword, $username])) {
                        $_SESSION['alert'] = [
                            'type' => 'success',
                            'message' => 'Password updated successfully! ✨'
                        ];
                    } else {
                        $_SESSION['alert'] = [
                            'type' => 'danger',
                            'message' => 'Failed to update password. Please try again.'
                        ];
                    }
                }
            } else {
                $_SESSION['alert'] = [
                    'type' => 'danger',
                    'message' => 'New passwords do not match!'
                ];
            }
        } else {
            $_SESSION['alert'] = [
                'type' => 'danger',
                'message' => 'Incorrect old password!'
            ];
        }
    } else {
        $_SESSION['alert'] = [
            'type' => 'danger',
            'message' => 'Account not found!'
        ];
    }
    
    header('Location: ../../user-side/links/manageaccount.php');
    exit;
}
?>
