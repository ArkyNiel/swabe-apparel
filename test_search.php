<?php
include 'connection/connection.php';

echo "=== Testing Search Functionality ===\n";

$stmt = $conn->query("SELECT COUNT(*) FROM inventory");
$total = $stmt->fetchColumn();
echo "Total products in database: $total\n";

$searchTerm = "shoes";
echo "\nSearching for: '$searchTerm'\n";

$stmt = $conn->prepare("SELECT COUNT(*) FROM inventory WHERE 
    product_name LIKE :search OR 
    category LIKE :search OR 
    color LIKE :search OR 
    size LIKE :search");
$stmt->bindValue(':search', "%$searchTerm%", PDO::PARAM_STR);
$stmt->execute();
$count = $stmt->fetchColumn();
echo "Products matching '$searchTerm': $count\n";

include 'back-end/user-side/search_products.php';
$result = searchProducts($conn, $searchTerm, 0, 5, './uploads/');
echo "\nSearch function result:\n";
print_r($result);

echo "\n=== Testing HTTP Endpoint ===\n";
$url = "http://localhost/swabe-apparel/back-end/user-side/search_products.php?search=$searchTerm&limit=5&prefix=./uploads/";
echo "Testing URL: $url\n";

$context = stream_context_create([
    'http' => [
        'method' => 'GET',
        'header' => 'Content-Type: application/json'
    ]
]);

$response = file_get_contents($url, false, $context);
echo "Response: $response\n";
?> 