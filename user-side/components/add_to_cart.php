<link rel="stylesheet" href="../../assets/css/cart.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
  
</style>

<div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true" >
  <div class="modal-dialog">
    <div class="modal-content">
      <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
        <i class="bi bi-x"></i>
      </button>
      
      <div class="modal-body">
        <div class="modal-layout">
          <div class="image-column">
            <img id="cartModalProductImg" src="assets/img/shirt1.jpg" alt="Product Image">
          </div>
          
          <div class="details-column">
            <div class="product-header">
              <h3 id="cartModalProductName" class="product-name">Product Name</h3>
            </div>
            
            <div class="pricing-section">
              <div class="current-price">
                ₱<span id="cartModalProductPrice">444</span>
              </div>
            </div>
            
            <div class="size-section">
              <div class="size-label">Size</div>
              
              <div id="cartModalProductSizes" class="size-options">
              </div>
            </div>

            <div class="quantity-section">
              <div class="quantity-label">Quantity</div>
              <div class="quantity-controls">
                <button type="button" class="btn btn-outline-secondary" id="decreaseQuantity">
                  <i class="bi bi-dash"></i>
                </button>
                <input
                  type="number"
                  id="cartModalQuantity"
                  class="form-control"
                  value="1"
                  min="1"
                  max="99"
                >
                <button type="button" class="btn btn-outline-secondary" id="increaseQuantity">
                  <i class="bi bi-plus"></i>
                </button>
              </div>
            </div>
            
            <div class="action-buttons">
              <button type="button" class="btn-add-cart" id="addToCartButton">
                Add to Cart
              </button>
              <button type="button" class="btn-favorite">
                <i class="bi bi-heart"></i>
              </button>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="../../assets/js/add_to_cart.js"></script>