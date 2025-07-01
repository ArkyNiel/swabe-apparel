<link rel="stylesheet" href="../../assets/css/add_to_cart.css">
<div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true">
  <div class="modal-dialog" style="max-width:900px;">
    <div class="modal-content" style="width:900px; height:700px;">
      <div class="modal-header">
        <h5 class="modal-title" id="addToCartModalLabel">Add to Cart</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body h-100">
        <div class="row h-100">
          <div class="col-md-6 d-flex align-items-center justify-content-center" style="border-right:1px solid #eee;">
            <img id="cartModalProductImg" src="assets/img/shirt1.jpg" alt="Product Image" style="max-width:100%; max-height:500px; object-fit:contain;">
          </div>
          <div class="col-md-6 d-flex flex-column justify-content-center">
            <h3 id="cartModalProductName">Product Name</h3>
            <p class="mb-2">Size:
              <select id="cartModalProductSize" class="form-select w-auto d-inline-block ms-2">
                <option>Small</option>
                <option>Medium</option>
                <option>Large</option>
                <option>XL</option>
              </select>
            </p>
            <h4 class="text-success mb-4">₱<span id="cartModalProductPrice">999.00</span></h4>
            <div class="mb-4">
              <label for="cartModalQuantity" class="form-label me-2">Quantity:</label>
              <button type="button" class="btn btn-outline-secondary btn-sm" id="decreaseQuantity">-</button>
              <input type="number" id="cartModalQuantity" class="form-control d-inline-block text-center" value="1" min="1" max="99" style="width:60px; display:inline-block;">
              <button type="button" class="btn btn-outline-secondary btn-sm" id="increaseQuantity">+</button>
            </div>
          </div>
        </div>
      </div>
      <div class="modal-footer p-0" style="border-top:none;">
        <button type="button" class="btn btn-success btn-lg w-100 m-0" id="addToCartButton">
          ADD TO CART
        </button>
      </div>
    </div>
  </div>
</div>

<script>
  document.addEventListener('DOMContentLoaded', function () {
    const decreaseBtn = document.getElementById('decreaseQuantity');
    const increaseBtn = document.getElementById('increaseQuantity');
    const quantityInput = document.getElementById('cartModalQuantity');

    if (decreaseBtn && increaseBtn && quantityInput) {
      decreaseBtn.addEventListener('click', function () {
        let value = parseInt(quantityInput.value, 10);
        if (value > 1) quantityInput.value = value - 1;
      });
      increaseBtn.addEventListener('click', function () {
        let value = parseInt(quantityInput.value, 10);
        if (value < 99) quantityInput.value = value + 1;
      });
    }
  });
</script>