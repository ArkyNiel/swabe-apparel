<?php
$showModal = false;
$productName = '';
$productImage = '';
$productPrice = '';
$productSizes = [];

if (isset($_GET['add_to_cart'])) {
    $showModal = true;
    $productName = $_GET['name'] ?? '';
    $productImage = $_GET['image'] ?? '';
    $productPrice = $_GET['price'] ?? '';
    $sizesStr = $_GET['size'] ?? '';
    $productSizes = explode(',', $sizesStr);
}
?>

<link rel="stylesheet" href="../../assets/css/cart.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

</style>

<?php
$userLoggedIn = isset($_SESSION['user_id']) && !empty($_SESSION['user_id']);
?>

<div class="modal fade <?php echo $showModal && $userLoggedIn ? 'show' : ''; ?>" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true" style="<?php echo $showModal && $userLoggedIn ? 'display: block;' : ''; ?>">
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
                  <button type="button" class="btn btn-outline-secondary quantity-btn" onclick="decreaseQuantity()">-</button>
                  <input
                    type="number"
                    name="quantity"
                    id="quantityInput"
                    class="form-control"
                    value="1"
                    min="1"
                    max="30"
                    readonly
                    style="-moz-appearance: textfield; appearance: textfield;"
                    onkeydown="return false;"
                  >
                  <button type="button" class="btn btn-outline-secondary quantity-btn" onclick="increaseQuantity()">+</button>
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
        <input type="hidden" name="product_id" value="<?php echo htmlspecialchars($_GET['id'] ?? ''); ?>">
        <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($productName); ?>">
        <input type="hidden" name="image" value="<?php echo htmlspecialchars($productImage); ?>">
        <input type="hidden" name="price" value="<?php echo htmlspecialchars($productPrice); ?>">
      </form>
    </div>
  </div>
</div>

<?php if ($showModal && $userLoggedIn): ?>
<div class="modal-backdrop fade show" style="z-index: 1040;"></div>
<?php elseif ($showModal && !$userLoggedIn): ?>
  <?php include('login_req.php'); ?>
  <script>
    var loginReqModal = new bootstrap.Modal(document.getElementById('loginReqModal'));
    loginReqModal.show();
  </script>
<?php endif; ?>

<script>
// modal function
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('addToCartModal');
    const closeBtn = modal.querySelector('.close-btn');

    closeBtn.addEventListener('click', function() {
        modal.classList.remove('show');
        modal.style.display = 'none';
        document.body.classList.remove('modal-open');
        window.location.href = window.location.pathname;
    });

    if (modal.classList.contains('show')) {
        document.body.classList.add('modal-open');
    }
});

function increaseQuantity() {
    const input = document.getElementById('quantityInput');
    let value = parseInt(input.value);
    if (value < 99) {
        input.value = value + 1;
    }
}

function decreaseQuantity() {
    const input = document.getElementById('quantityInput');
    let value = parseInt(input.value);
    if (value > 1) {
        input.value = value - 1;
    }
}
</script>
