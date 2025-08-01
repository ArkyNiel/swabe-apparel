<?php
// Load featured products from database
require_once __DIR__ . '/../../connection/connection.php';

try {
    $stmt = $conn->prepare("SELECT image_path FROM featured_products ORDER BY uploaded_at DESC LIMIT 12");
    $stmt->execute();
    $featuredProducts = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $featuredProducts = []; // error handling
}
?>

<div class="parallax-container" style="padding-top: -50px; height: 90vh;" >
  <div class="parallax-images">
    <?php
    $totalImages = 12; // limit, i think this line is not needed, since i have desc limit 12 already at query
    $images = [];
    
    if (!empty($featuredProducts)) {
      // featured img
      for ($i = 0; $i < $totalImages; $i++) {
        $product = $featuredProducts[$i % count($featuredProducts)];
        if (!empty($product['image_path'])) {
          $images[] = '../../assets/img/' . $product['image_path'];
        }
      }
    } else {
      // fallback img
      $images = [
        "./assets/img/shirt1.jpg",
        "./assets/img/shirt2.jpg",
        "./assets/img/shirt3.jpg"
      ];
    }
    
    // Duplicate images for parallax effect
    foreach (array_merge($images, $images) as $i => $img): ?>
      <img src="<?php echo htmlspecialchars($img); ?>" 
           alt="Featured Product <?php echo $i + 2; ?>" 
           onerror="this.style.border='2px solid red';" />
    <?php endforeach; ?>
  </div>
</div>