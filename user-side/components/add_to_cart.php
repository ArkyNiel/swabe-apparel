<?php
$showModal = false;
$productName = '';
$productImage = '';
$productPrice = '';
$productSizes = [];
$productId = '';
$productColor = '';

if (isset($_GET['add_to_cart'])) {
    $showModal = true;
    $productId = $_GET['id'] ?? '';
    $productName = $_GET['name'] ?? '';
    $productImage = $_GET['image'] ?? '';
    $productPrice = $_GET['price'] ?? '';
    $sizesStr = $_GET['size'] ?? '';
    $productSizes = explode(',', $sizesStr);
    $productColor = $_GET['color'] ?? '';
}
?>

<link rel="stylesheet" href="../../assets/css/cart.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

</style>

<div class="modal fade <?php echo $showModal ? 'show' : ''; ?>" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true" style="<?php echo $showModal ? 'display: block;' : ''; ?>">
  <div class="modal-dialog">
    <div class="modal-content">
      <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
        <i class="bi bi-x"></i>
      </button>

      <form action="../../back-end/user-side/add_tocart.php" method="post">
        <div class="modal-body">
          <div class="modal-layout">
            <div class="image-column">
              <img id="cartModalProductImg" src="<?php echo htmlspecialchars($productImage); ?>" alt="Product Image">
            </div>

            <div class="details-column">
              <div class="product-header">
                <h3 id="cartModalProductName" class="product-name"><?php echo htmlspecialchars($productName); ?></h3>
              </div>

              <div class="pricing-section">
                <div class="current-price">
                  ₱<span id="cartModalProductPrice"><?php echo htmlspecialchars($productPrice); ?></span>
                </div>
              </div>

              <div class="size-section">
                <div class="size-label">Size</div>

                <div id="cartModalProductSizes" class="size-options">
                  <?php foreach ($productSizes as $index => $size): ?>
                    <input type="radio" class="btn-check" name="size" id="size<?php echo $index; ?>" value="<?php echo htmlspecialchars(trim($size)); ?>" <?php echo $index === 0 ? 'checked' : ''; ?>>
                    <label class="btn btn-outline-primary" for="size<?php echo $index; ?>"><?php echo htmlspecialchars(trim($size)); ?></label>
                  <?php endforeach; ?>
                </div>
              </div>

              <div class="quantity-section">
                <div class="quantity-label">Quantity</div>
                <div class="quantity-controls">
                  <input
                    type="number"
                    name="quantity"
                    class="form-control"
                    value="1"
                    min="1"
                    max="99"
                  >
                </div>
              </div>

              <div class="action-buttons">
                <button type="submit" class="btn-add-cart">
                  Add to Cart
                </button>
                <button type="button" class="btn-favorite">
                  <i class="bi bi-heart"></i>
                </button>
              </div>
            </div>
          </div>
        </div>

        <input type="hidden" name="action" value="add_to_cart">
        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($productId); ?>">
        <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($productName); ?>">
        <input type="hidden" name="image" value="<?php echo htmlspecialchars($productImage); ?>">
        <input type="hidden" name="price" value="<?php echo htmlspecialchars($productPrice); ?>">
      </form>
    </div>
  </div>
</div>
