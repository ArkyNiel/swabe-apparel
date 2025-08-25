<link rel="stylesheet" href="../../assets/css/cart.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>
  #addToCartModal .modal-dialog {
  position: fixed !important;
  top: 50% !important;
  left: 50% !important;
  transform: translate(-50%, -50%) !important;
  margin: 0 !important;
  max-width: 800px !important;
  width: 800px !important;
  height: auto !important;
  max-height: 70vh !important;
}

#addToCartModal .modal-content {
  width: 100% !important;
  height: auto !important;
  border-radius: 12px !important;
  box-shadow: 0 20px 40px rgba(0, 0, 0, 0.15);
  background: #fcfcea;
  border: none;
  overflow: hidden;
}

#addToCartModal .modal-title-bar {
  display: none;
}

#addToCartModal .modal-body {
  padding: 0;
  margin: 0;
  background: #fcfcea;
}

#addToCartModal .modal-layout {
  display: flex;
  min-height: 400px; 
}

#addToCartModal .image-column {
  width: 45%;
  background: #fcfcea;
  border-right: 1px solid #e5e7eb;
  position: relative;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 2rem;
}

#cartModalProductImg {
  width: 100%;
  height: 300px;
  object-fit: cover;
  border-radius: 8px;
}

#addToCartModal .details-column { 
  width: 55%;
  padding: 2rem;
  background: #fcfcea;
  display: flex;
  flex-direction: column;
}

#addToCartModal .product-header {
  margin-bottom: 1.5rem;
}

#addToCartModal .product-name {
  color: #101820;
  font-size: 1.25rem;
  font-weight: 500;
  margin: 0 0 1rem 0;
  line-height: 1.4;
}

#addToCartModal .pricing-section {
  margin-bottom: 1.5rem;
}

#addToCartModal .current-price {
  color: #101820;
  font-size: 1.75rem;
  font-weight: 700;
  margin: 0;
}

#addToCartModal .size-section {
  margin-bottom: 1.5rem;
}

#addToCartModal .size-label {
  font-weight: 600;
  color: #374151;
  font-size: 0.875rem;
  margin-bottom: 0.75rem;
  display: block;
}

#addToCartModal .size-options {
  display: grid;
  grid-template-columns: repeat(3, 1fr);
  gap: 0.5rem;
  margin-bottom: 1rem;
}

#cartModalProductSizes .btn {
  border: 1px solid #d1d5db;
  background: #fcfcea;
  color: #101820;
  font-size: 0.875rem;
  font-weight: 500;
  padding: 0.75rem 0.5rem;
  border-radius: 4px;
  transition: all 0.2s ease;
  text-align: center;
  min-height: 44px;
}

#cartModalProductSizes .btn:hover {
  border-color: #101820;
  background: #fcfcea;
  color: #101820;
}

#cartModalProductSizes .btn-check:checked + .btn {
  background: #101820;
  color: #fcfcea;
  border-color: #101820;
}

#addToCartModal .quantity-section {
  margin-bottom: 2rem;
}

#addToCartModal .quantity-label {
  font-weight: 600;
  color: #374151;
  font-size: 0.875rem;
  margin-bottom: 0.75rem;
  display: block;
}

#addToCartModal .quantity-controls {
  display: flex;
  align-items: center;
  gap: 0.75rem;
}

#addToCartModal .btn-outline-secondary {
  border: 1px solid #d1d5db;
  color: #6b7280;
  border-radius: 4px;
  width: 36px;
  height: 36px;
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0;
  background: #ffffff;
  transition: all 0.2s ease;
}

#addToCartModal .btn-outline-secondary:hover {
  background-color: #f3f4f6;
  border-color: #9ca3af;
  color: #374151;
}

#cartModalQuantity {
  width: 60px;
  text-align: center;
  padding: 0.5rem;
  border: 1px solid #d1d5db;
  color: #101820;
  border-radius: 4px;
  font-size: 1rem;
  font-weight: 500;
  background: #fcfcea;
}

#cartModalQuantity:focus {
  border-color: #3b82f6;
  box-shadow: 0 0 0 3px rgba(59, 130, 246, 0.1);
  outline: none;
}

#addToCartModal .action-buttons {
  margin-top: auto;
  display: flex;
  gap: 1rem;
  align-items: center;
}

#addToCartModal .btn-add-cart {
  flex: 1;
  background: #101820;
  border: none;
  color: #fcfcea;
  font-size: 1rem;
  font-weight: 600;
  padding: 1rem 2rem;
  border-radius: 6px;
  transition: all 0.2s ease;
  text-transform: uppercase;
  letter-spacing: 0.5px;
}

#addToCartModal .btn-add-cart:hover {
  background: #374151;
  transform: translateY(-1px);
}

#addToCartModal .btn-favorite {
  width: 48px;
  height: 48px;
  border: 1px solid #101820;
  background: #fcfcea;
  color: #101820;
  border-radius: 6px;
  display: flex;
  align-items: center;
  justify-content: center;
  transition: all 0.2s ease;
  cursor: pointer;
}

#addToCartModal .btn-favorite:hover {
  border-color: #fee715;
  color: #fee715;
  background: #fcfcea;
}

#addToCartModal .btn-favorite.active {
  border-color: #fee715;
  color: #fee715;
  background: #fee715;
}

#addToCartModal .close-btn {
  position: absolute;
  top: 1rem;
  right: 1rem;
  background: rgba(252, 252, 234, 0.9);
  border: 1px solid #e5e7eb;
  border-radius: 50%;
  width: 32px;
  height: 32px;
  display: flex;
  align-items: center;
  justify-content: center;
  cursor: pointer;
  transition: all 0.2s ease;
  color: #6b7280;
  z-index: 10;
}

#addToCartModal .close-btn:hover {
  background: #fcfcea;
  border-color: #3b82f6;
  color: #3b82f6;
}

@media (max-width: 991.98px) {
  #addToCartModal .modal-dialog {
    position: fixed !important;
    top: 50% !important;
    left: 50% !important;
    transform: translate(-50%, -50%) !important;
    margin: 0 !important;
    max-width: 95vw !important;
    width: 95vw !important;
  }
  
  #addToCartModal .modal-layout {
    flex-direction: column;
    min-height: auto;
  }
  
  #addToCartModal .image-column {
    width: 100%;
    border-right: none;
    border-bottom: 1px solid #e5e7eb;
    min-height: 250px;
    padding: 1.5rem;
  }
  
  #addToCartModal .details-column {
    width: 100%;
    padding: 1.5rem;
  }

  #addToCartModal .size-options {
    grid-template-columns: repeat(2, 1fr);
  }
}
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