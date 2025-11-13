<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<style>
  #addToCartModal .modal-dialog {
    max-width: 800px !important;
    width: 800px !important;
    height: 470px !important;
  }

  #addToCartModal .modal-content {
    background: #ffffff !important;
    width: 800px !important;
    height: 500px !important;
    border-radius: 8px !important;
    border: none !important;
    overflow: hidden !important;
  }

  #addToCartModal .modal-dialog {
    border-radius: 8px !important;
    overflow: hidden !important;
  }

  #addToCartModal .modal-body {
    background: #ffffff !important;
    overflow: visible !important;
    border-radius: 8px !important;
    padding: 0 !important;
    height: 100%;
  }

  #addToCartModal .modal-layout {
    height: 500px !important;
    display: flex !important;
  }

  #addToCartModal .image-column {
    background: #ffffff !important;
    width: 40% !important;
    padding: 1.5rem !important;
  }

  #addToCartModal .details-column {
    background: #ffffff !important;
    width: 60% !important;
    padding: 1.5rem !important;
    gap: 1rem !important;
    display: flex !important;
    flex-direction: column !important;
    position: relative;
    height: 100%;
    overflow-y: auto;
  }

  #cartModalProductImg {
    max-height: 350px !important;
  }

  #addToCartModal .product-name {
    font-size: 1.25rem !important;
    margin-bottom: 0.5rem !important;
  }

  #addToCartModal .current-price {
    font-size: 1.25rem !important;
    margin-bottom: 0.5rem !important;
  }

  #addToCartModal .pricing-section {
    margin-bottom: 1rem;
  }

  #addToCartModal .size-section {
    margin-bottom: 1rem;
  }

  #addToCartModal .size-label,
  #addToCartModal .quantity-label {
    font-size: 0.875rem;
    font-weight: 600;
    color: #374151;
    margin-bottom: 0.5rem;
    display: block;
  }

  #addToCartModal .quantity-section {
    margin-bottom: 0.5rem;
  }

  #addToCartModal .quantity-controls {
    display: flex;
    align-items: center;
    gap: 0.5rem;
  }

  #addToCartModal .btn-outline-secondary {
    width: 32px;
    height: 32px;
    border: 1px solid #d1d5db;
    color: #6b7280;
    border-radius: 50px !important;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 0;
    background: #ffffff;
    transition: all 0.2s ease;
    font-size: 1rem;
    font-weight: bold;
  }

  #addToCartModal .btn-outline-secondary:hover {
    background-color: #f3f4f6;
    border-color: #9ca3af;
    color: #374151;
    border-radius: 50px !important;
  }

  #cartModalQuantity {
    width: 50px;
    text-align: center;
    padding: 0.4rem;
    border: 1px solid #d1d5db;
    color: #101820;
    border-radius: 3px;
    font-size: 0.9rem;
    font-weight: 500;
    background: #ffffff;
  }

  #addToCartModal .action-buttons {
    margin-top: 10px !important;
    display: flex !important;
    gap: 1rem;
    align-items: center;
    justify-content: space-between;
    padding-top: 0.5rem;
    width: 100%;
    flex-shrink: 0;
    visibility: visible !important;
    opacity: 1 !important;
    border-radius: 50px !important;
  }

  #addToCartModal .btn-add-cart {
    background: #ffffff !important;
    border: 1px solid #000000 !important;
    color: #000000 !important;
    font-size: 0.875rem;
    font-weight: 600;
    padding: 0.6rem 1.25rem;
    transition: all 0.2s ease;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    cursor: pointer;
    display: flex !important;
    align-items: center;
    gap: 0.4rem;
    height: 50px;
    visibility: visible !important;
    opacity: 1 !important;
    position: relative;
    z-index: 10;
    border-radius: 50px;
  }

  #addToCartModal .btn-add-cart:hover {
    background: #f9fafb;
    border-color: #000000;
  }

  #addToCartModal .btn-favorite {
    background: #ffffff !important;
    border: 1px solid #000000;
    color: #000000;
    padding: 0.6rem;
    border-radius: 30px;
    transition: all 0.2s ease;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 1rem;
  }

  #addToCartModal .btn-favorite:hover {
    background: #f9fafb !important;
    border-color: #000000;
  }

  #addToCartModal .size-options {
    gap: 0.4rem !important;
    margin-bottom: 0.5rem !important;
  }

  #cartModalProductSizes .btn {
    background: #ffffff !important;
    border: 1px solid #000000;
    color: #000000;
    padding: 0.4rem 0.6rem !important;
    font-size: 0.8rem !important;
    min-height: 32px !important;
  }

  #cartModalProductSizes .btn:hover {
    background: #ffffff !important;
    border-color: #000000;
    color: #000000;
  }

  #cartModalProductSizes .btn-check:checked + .btn {
    background: #101820 !important;
    color: #ffffff;
    border-color: #101820;
  }

  #addToCartModal .close-btn {
    background: #ffffff !important;
    border: 1px solid #000000;
    color: #000000;
  }

  #addToCartModal .close-btn:hover {
    background: #f9fafb !important;
    border-color: #000000;
    color: #000000;
  }

  @media (max-width: 768px) {
    #addToCartModal .modal-dialog {
      max-width: 95vw !important;
      width: 95vw !important;
      height: auto !important;
      max-height: 90vh !important;
    }

    #addToCartModal .modal-content {
      width: 100% !important;
      height: auto !important;
      max-height: 90vh !important;
    }

    #addToCartModal .modal-layout {
      flex-direction: column !important;
      height: auto !important;
    }

    #addToCartModal .image-column {
      width: 100% !important;
      padding: 1rem !important;
      min-height: 200px !important;
    }

    #addToCartModal .details-column {
      width: 100% !important;
      padding: 1rem !important;
    }

    #cartModalProductImg {
      max-height: 250px !important;
    }
  }
</style>

<div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true" style="border-ra">
  <div class="modal-dialog">
    <div class="modal-content">
      <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
        <i class="bi bi-x"></i>
      </button>

      <form id="addToCartForm" action="../../back-end/user-side/add_to_cart.php" method="post" enctype="multipart/form-data">
        <div class="modal-body">
          <div class="modal-layout">
            <div class="image-column">
              <img id="cartModalProductImg" src="" alt="Product Image">
            </div>

            <div class="details-column">
              <div class="product-header">
                <h3 id="cartModalProductName" class="product-name"></h3>
              </div>

              <div class="pricing-section">
                <div class="current-price">
                  ₱<span id="cartModalProductPrice"></span>
                </div>
              </div>

              <div class="size-section">
                <div class="size-label">Size</div>
                <div id="cartModalProductSizes" class="size-options">
                  <?php foreach ($productSizes as $index => $size): ?>
                    <input type="radio" class="btn-check" name="cartModalProductSize" id="size<?php echo $index; ?>" value="<?php echo htmlspecialchars(trim($size)); ?>" <?php echo $index === 0 ? 'checked' : ''; ?>>
                    <label class="btn btn-outline-primary" for="size<?php echo $index; ?>"><?php echo htmlspecialchars(trim($size)); ?></label>
                  <?php endforeach; ?>
                </div>
              </div>

              <div class="quantity-section">
                <div class="quantity-label">Quantity</div>
                <div class="quantity-controls">
                  <button type="button" class="btn btn-outline-secondary quantity-btn" id="decreaseQuantity">-</button>
                  <input
                    type="number"
                    name="quantity"
                    id="cartModalQuantity"
                    class="form-control"
                    value="1"
                    min="1"
                    max="99"
                    readonly
                    style="-moz-appearance: textfield; appearance: textfield;"
                    onkeydown="return false;"
                  >
                  <button type="button" class="btn btn-outline-secondary quantity-btn" id="increaseQuantity">+</button>
                </div>
              </div>

              <div class="action-buttons">
                <button type="submit" class="btn-add-cart" id="addToCartButton">
                  <i class="bi bi-cart-plus"></i>
                  Add to Cart
                </button>
              </div>
            </div>
          </div>
        </div>

        <input type="hidden" name="action" value="add_to_cart">
        <input type="hidden" name="product_id" value="">
        <input type="hidden" name="product_name" value="">
        <input type="hidden" name="image" value="">
        <input type="hidden" name="price" value="">
      </form>
    </div>
  </div>
</div>

<script>
let closeModalFunction;

document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('addToCartModal');
    const closeBtn = modal.querySelector('.close-btn');

    closeModalFunction = function() {
        modal.classList.remove('show');
        modal.style.display = 'none';
        document.body.classList.remove('modal-open');
        const backdrop = document.querySelector('.modal-backdrop');
        if (backdrop) backdrop.remove();
    };

    if (closeBtn) {
        closeBtn.addEventListener('click', closeModalFunction);
    }

    // Quantity controls
    const decreaseBtn = document.getElementById('decreaseQuantity');
    const increaseBtn = document.getElementById('increaseQuantity');
    const quantityInput = document.getElementById('cartModalQuantity');

    if (decreaseBtn && quantityInput) {
        decreaseBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            let value = parseInt(quantityInput.value) || 1;
            if (value > 1) {
                quantityInput.value = value - 1;
            }
        });
    }

    if (increaseBtn && quantityInput) {
        increaseBtn.addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            let value = parseInt(quantityInput.value) || 1;
            if (value < 99) {
                quantityInput.value = value + 1;
            }
        });
    }

    document.addEventListener('click', function(e) {
        if (e.target.closest('.cart-btn')) {
            e.preventDefault();
            const btn = e.target.closest('.cart-btn');
            const name = btn.dataset.name;
            const image = btn.dataset.image;
            const size = btn.dataset.size;
            const price = btn.dataset.price;
            const id = btn.dataset.id;
            const color = btn.dataset.color || 'N/A';

            // Populate modal
            document.getElementById('cartModalProductName').textContent = name;
            document.getElementById('cartModalProductImg').src = image;
            document.getElementById('cartModalProductPrice').textContent = price;

            // Populate sizes
            const sizesContainer = document.getElementById('cartModalProductSizes');
            sizesContainer.innerHTML = '';
            size.split(',').forEach((s, index) => {
                const radio = document.createElement('input');
                radio.type = 'radio';
                radio.className = 'btn-check';
                radio.name = 'cartModalProductSize';
                radio.id = 'size' + index;
                radio.value = s.trim();
                if (index === 0) radio.checked = true;

                const label = document.createElement('label');
                label.className = 'btn btn-outline-primary';
                label.htmlFor = 'size' + index;
                label.textContent = s.trim();

                sizesContainer.appendChild(radio);
                sizesContainer.appendChild(label);
            });

            // Reset quantity
            const quantityInput = document.getElementById('cartModalQuantity');
            if (quantityInput) {
                quantityInput.value = 1;
            }

            // Set hidden fields
            document.querySelector('input[name="product_id"]').value = id;
            document.querySelector('input[name="product_name"]').value = name;
            document.querySelector('input[name="image"]').value = image;
            document.querySelector('input[name="price"]').value = price;

            // Show modal
            modal.classList.add('show');
            modal.style.display = 'block';
            document.body.classList.add('modal-open');

            // Add backdrop
            const backdrop = document.createElement('div');
            backdrop.className = 'modal-backdrop fade show';
            backdrop.style.zIndex = '1040';
            document.body.appendChild(backdrop);
        }
    });

    // Handle form submission via AJAX
    document.getElementById('addToCartForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);

        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: { 'X-Requested-With': 'XMLHttpRequest' }
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'login_required') {
                showAlert(data.message, 'warning');
                setTimeout(() => location.href = '../../user-side/links/login.php', 2000);
            } else if (data.status === 'success') {
                showAlert(data.message, 'success');
                if (closeModalFunction) closeModalFunction();
            } else {
                showAlert(data.message, 'danger');
            }
        })
        .catch(error => showAlert('Error: ' + error.message, 'danger'));
    });
});

function addToCart() {
    const form = document.getElementById('addToCartForm');
    if (form) {
        form.dispatchEvent(new Event('submit'));
    }
}


function showAlert(message, type) {
    // Remove existing alerts
    document.querySelectorAll('.alert').forEach(alert => alert.remove());

    const alert = document.createElement('div');
    alert.className = `alert alert-${type} alert-dismissible fade show`;
    alert.style.cssText = 'position: fixed; top: 20px; left: 50%; transform: translateX(-50%); z-index: 1060; min-width: 300px;';
    alert.innerHTML = `${message}<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>`;
    document.body.appendChild(alert);

    // Auto remove after 5 seconds
    setTimeout(() => {
        if (alert.parentNode) {
            alert.remove();
        }
    }, 5000);
}
</script>
