<link rel="stylesheet" href="../../assets/css/cart.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content p-0">
      <div class="modal-title-bar position-relative py-3" style="background-color: #101820 !important;">
        <h5 class="modal-title text-center w-100 m-0" id="addToCartModalLabel" style="font-weight:600; letter-spacing:1px; color: #fcfcea;">Add to Cart</h5>
        <button type="button" class="btn-close position-absolute top-50 end-0 translate-middle-y me-3" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body h-100 p-0">
        <div class="d-flex flex-column h-100">
          <div class="flex-shrink-0 d-flex align-items-center justify-content-center img-container" style="background:#fafafa; border-bottom:1px solid #eee;">
            <img id="cartModalProductImg" src="assets/img/shirt1.jpg" alt="Product Image">
          </div>
          <div class="flex-grow-1 d-flex flex-column justify-content-end px-5 py-4" style="min-height: 0; ">
            <h3 id="cartModalProductName" class="mb-3" style="font-size:1.5rem; font-weight:500; ">Product Name</h3>
            <div class="mb-3 d-flex align-items-center">
              <span class="me-2" style="font-weight:500;">Size:</span>
              <div id="cartModalProductSizes" class="btn-group" role="group" aria-label="Product sizes">
              </div>
            </div>
            <div class="mb-4 d-flex align-items-center">
              <label for="cartModalQuantity" class="form-label me-2 mb-0" style="font-weight:500;">Quantity:</label>
              <button type="button" class="btn btn-outline-secondary btn-sm d-flex align-items-center justify-content-center" id="decreaseQuantity" style="width:32px; height:32px;">
                <i class="bi bi-dash"></i>
              </button>
              <input
                type="number"
                id="cartModalQuantity"
                class="form-control mx-2 text-center"
                value="1"
                min="1"
                max="99"
                style="width:60px; min-width: 50px; padding-left: 0.5rem; padding-right: 0.5rem; display:inline-block;"
              >
              <button type="button" class="btn btn-outline-secondary btn-sm d-flex align-items-center justify-content-center" id="increaseQuantity" style="width:32px; height:32px;">
                <i class="bi bi-plus"></i>
              </button>
            </div>
            <h4 class="mb-4" style="font-size:1.3rem; color: #000000;"><span style="color: #000000;">₱</span><span id="cartModalProductPrice">999.00</span></h4>
          </div>
        </div>
      </div>
      <div class="modal-footer p-0" style="border-top:none;">
        <button type="button" class="btn btn-success btn-lg w-100 m-0" id="addToCartButton" style="font-size:1.1rem; font-weight:500;">
          ADD TO CART
        </button>
      </div>
    </div>
  </div>
</div>

<script src="../../assets/js/add_to_cart.js"></script>

<style>

</style>