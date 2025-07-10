<div class="parallax-container" style="padding-top: -50px; height: 90vh;" >
  <div class="parallax-images">
    <?php
    $totalImages = 12;
    $images = [];
    if (isset($bannerProducts) && is_array($bannerProducts) && count($bannerProducts) > 0) {
      for ($i = 0; $i < $totalImages; $i++) {
        $product = $bannerProducts[$i % count($bannerProducts)];
        if (!empty($product['image'])) {
          $images[] = $product['image'];
        }
      }
    } else {
      $images = [
        "../assets/img/shirt1.jpg",
        "../assets/img/shirt2.jpg",
        "../assets/img/shirt3.jpg"
      ];
    }
    foreach (array_merge($images, $images) as $i => $img): ?>
      <img src="<?php echo htmlspecialchars($img); ?>" alt="Product <?php echo $i + 1; ?>" />
    <?php endforeach; ?>
  </div>
</div>