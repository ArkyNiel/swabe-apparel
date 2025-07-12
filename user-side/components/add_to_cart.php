

<div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content p-0">
      <div class="modal-title-bar position-relative py-3">
        <h5 class="modal-title text-center w-100 m-0" id="addToCartModalLabel" style="font-weight:600; letter-spacing:1px;">Add to Cart</h5>
        <button type="button" class="btn-close position-absolute top-50 end-0 translate-middle-y me-3" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body h-100 p-0">
        <div class="d-flex flex-column h-100">
          <div class="flex-shrink-0 d-flex align-items-center justify-content-center img-container" style="background:#fafafa; border-bottom:1px solid #eee;">
            <img id="cartModalProductImg" src="assets/img/shirt1.jpg" alt="Product Image">
          </div>
          <div class="flex-grow-1 d-flex flex-column justify-content-end px-5 py-4" style="min-height: 0;">
            <h3 id="cartModalProductName" class="mb-3" style="font-size:1.5rem; font-weight:500;">Product Name</h3>
            <div class="mb-3 d-flex align-items-center">
              <span class="me-2" style="font-weight:500;">Size:</span>
              <div id="cartModalProductSizes" class="btn-group" role="group" aria-label="Product sizes">
                <!-- Size options will be dynamically generated -->
              </div>
            </div>
            <h4 class="text-success mb-4" style="font-size:1.3rem;">₱<span id="cartModalProductPrice">999.00</span></h4>
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

<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

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

    function populateSizeOptions(availableSizes, selectedSize) {
      const sizeContainer = document.getElementById('cartModalProductSizes');
      sizeContainer.innerHTML = '';
      
      const sizes = availableSizes.split(',').map(s => s.trim());
      
      sizes.forEach((size, index) => {
        const inputId = `size${index}`;
        const isChecked = size === selectedSize;
        
        const input = document.createElement('input');
        input.type = 'radio';
        input.className = 'btn-check';
        input.name = 'cartModalProductSize';
        input.id = inputId;
        input.value = size;
        input.autocomplete = 'off';
        if (isChecked) input.checked = true;
        
        const label = document.createElement('label');
        label.className = 'btn btn-outline-primary';
        label.htmlFor = inputId;
        label.textContent = size;
        
        sizeContainer.appendChild(input);
        sizeContainer.appendChild(label);
      });
    }

    // Global function to be called from other scripts
    window.populateCartModal = function(name, image, price, availableSizes, selectedSize) {
      document.getElementById('cartModalProductName').textContent = name;
      document.getElementById('cartModalProductImg').src = image;
      document.getElementById('cartModalProductPrice').textContent = price;
      populateSizeOptions(availableSizes, selectedSize);
      
      // Reset quantity
      const qty = document.getElementById('cartModalQuantity');
      if (qty) qty.value = 1;
    };

    const modal = document.getElementById('addToCartModal');
    if (modal) {
      modal.addEventListener('show.bs.modal', function () {
        setTimeout(function() {
          modal.classList.add('slide-in');
        }, 10); 
      });
      modal.addEventListener('hide.bs.modal', function () {
        modal.classList.remove('slide-in');
      });
      modal.addEventListener('hidden.bs.modal', function () {
        modal.classList.remove('slide-in');
      });
    }
  });
</script>

<style>
  #addToCartModal .modal-dialog {
    max-width: 650px !important;
    width: 650px !important;
    height: 100vh !important;
    margin: 0;
    position: fixed;
    left: 0;
    top: 0;
    transform: none;
    display: flex;
    align-items: stretch;
  }
  #addToCartModal .modal-content {
    width: 100% !important;
    height: 100vh !important;
    min-height: 100vh !important;
    border-radius: 0 !important;
    box-shadow: 0 0 24px rgba(0,0,0,0.12);
    display: flex;
    flex-direction: column;
    background: #fff;
  }
  #addToCartModal .modal-title-bar {
    border-bottom: 1px solid #eee;
    background: #fff;
    position: relative;
    min-height: 56px;
    display: flex;
    align-items: center;
    justify-content: center;
  }
  #addToCartModal .modal-title {
    font-size: 1.4rem;
    font-weight: 600;
    letter-spacing: 1px;
    margin: 0 auto;
    text-align: center;
    width: 100%;
    color: #000;
  }
  #addToCartModal .btn-close {
    z-index: 2;
  }
  #addToCartModal .modal-header {
    display: none;
  }
  #addToCartModal .modal-body {
    flex: 1 1 auto;
    height: 100%;
    padding: 0;
    overflow-y: auto;
    background: #fff;
    display: flex;
    flex-direction: column;
  }
  #addToCartModal .img-container {
    min-height: 300px;
    max-height: 50vh;
    padding: 24px 0 16px 0;
    display: flex;
    align-items: center;
    justify-content: center;
    background: #fafafa;
    border-bottom: 1px solid #eee;
  }
  #cartModalProductImg {
    max-width: 75%;
    max-height: 100%;
    width: auto;
    height: auto;
    display: block;
    margin: 0 auto;
    object-fit: contain;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.03);
  }
  #addToCartModal .modal-footer {
    border-radius: 0 !important;
    background: #fff;
    padding: 1.25rem 2rem;
    border-top: 1px solid #eee;
  }
  #addToCartModal .flex-grow-1 {
    color: #000;
  }
  #addToCartModal .flex-grow-1 h3 {
    color: #000;
  }
  #addToCartModal .flex-grow-1 h4 {
    color: #ffc107;
  }
  #addToCartModal .flex-grow-1 span {
    color: #000;
  }
  #addToCartModal .flex-grow-1 label {
    color: #000;
  }
  #addToCartModal .btn-outline-secondary {
    border-color: #ddd;
    color: #000;
    border-radius: 50% !important;
    width: 32px !important;
    height: 32px !important;
    display: flex !important;
    align-items: center !important;
    justify-content: center !important;
    padding: 0 !important;
  }
  #addToCartModal .btn-outline-secondary:hover {
    background-color: #f8f9fa;
    border-color: #ddd;
    color: #000;
  }
  #addToCartModal .btn-outline-secondary .bi {
    font-size: 1.2rem !important;
    font-weight: bold;
  }
  #addToCartModal .btn-outline-secondary .bi-dash {
    font-size: 1.4rem !important;
  }
  #addToCartModal .btn-outline-secondary .bi-plus {
    font-size: 1.4rem !important;
  }
  #addToCartModal .btn-success {
    background-color: #ffc107;
    border-color: #ffc107;
    color: #000;
  }
  #addToCartModal .btn-success:hover {
    background-color: #e0a800;
    border-color: #e0a800;
    color: #000;
  }
  @media (max-width: 991.98px) {
    #addToCartModal .modal-content,
    #addToCartModal .modal-dialog {
      width: 100vw !important;
      max-width: 100vw !important;
      height: 100vh !important;
      left: 0 !important;
      top: 0 !important;
      transform: none !important;
      position: fixed !important;
    }
    #addToCartModal .img-container {
      min-height: 160px;
      padding: 12px 0 8px 0;
    }
    #cartModalProductImg {
      max-width: 90%;
    }
    #addToCartModal .modal-footer {
      padding: 1rem 0.5rem;
    }
    #addToCartModal .flex-grow-1 {
      padding-left: 1rem !important;
      padding-right: 1rem !important;
    }
  }
  #cartModalQuantity {
    width: 60px !important;
    min-width: 50px !important;
    text-align: center;
    padding-left: 0.5rem;
    padding-right: 0.5rem;
    display: inline-block;
    vertical-align: middle;
    font-size: 1rem;
    font-weight: 500;
    background: #fff;
    border: 1px solid #ddd;
    color: #000;
    border-radius: 8px !important;
  }
  #cartModalQuantity:focus {
    background: #fff;
    border-color: #ffc107;
    color: #000;
    box-shadow: 0 0 0 0.2rem rgba(255, 193, 7, 0.25);
  }
  #cartModalQuantity::-webkit-outer-spin-button,
  #cartModalQuantity::-webkit-inner-spin-button {
    -webkit-appearance: none;
    margin: 0;
  }
  #cartModalQuantity[type=number] {
    -moz-appearance: textfield;
  }

  #addToCartModal.slide-modal .modal-dialog {
    transition: transform 0.4s cubic-bezier(0.4, 0, 0.2, 1);
    transform: translateX(100%);
    opacity: 1 !important;
  }
  #addToCartModal.slide-modal.slide-in .modal-dialog {
    transform: translateX(0);
  }
  .modal-backdrop.show {
    opacity: 0.5;
    transition: opacity 0.2s linear;
  }
  #cartModalProductSizes .btn {
    border-radius: 8px;
    min-width: 48px;
    margin-right: 4px;
    font-weight: 500;
    padding: 0.375rem 0.75rem;
    border: 1px solid #ddd;
    background: #fff;
    color: #000;
    box-shadow: none;
    transition: background 0.2s, color 0.2s, border-color 0.2s;
  }
  #cartModalProductSizes .btn:hover {
    background: #f8f9fa;
    border-color: #ffc107;
  }
  #cartModalProductSizes .btn-check:checked + .btn {
    background: #ffc107;
    color: #000;
    border-color: #ffc107;
  }
</style>