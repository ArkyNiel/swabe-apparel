<?php
require '../../connection/connection.php';

function send_json($success, $message) {
    header('Content-Type: application/json');
    echo json_encode(['success' => $success, 'message' => $message]);
    exit;
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Get the product ID from POST data
    $product_id = isset($_POST['product_id']) ? (int)$_POST['product_id'] : 0;

    if ($product_id > 0) {
        // Prepare and execute the delete statement
        $stmt = $conn->prepare("DELETE FROM inventory WHERE id = ?");
        $success = $stmt->execute([$product_id]);

        if ($success) {
            send_json(true, "Product deleted successfully.");   
        } else {
            send_json(false, "Failed to delete product.");
        }
    } else {
        send_json(false, "Invalid product ID.");
    }
} else {
    send_json(false, "Invalid request method.");
}
?>
