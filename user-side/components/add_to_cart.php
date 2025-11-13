<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="../../assets/css/add_to_cart.css">

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
