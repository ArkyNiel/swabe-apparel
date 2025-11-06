<link rel="stylesheet" href="../../assets/css/cart.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<style>

</style>

<div class="modal fade" id="addToCartModal" tabindex="-1" aria-labelledby="addToCartModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <button type="button" class="close-btn" data-bs-dismiss="modal" aria-label="Close">
        <i class="bi bi-x"></i>
      </button>

      <form action="../../back-end/user-side/add_tocart.php" method="post">
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
        <input type="hidden" name="product_id" value="">
        <input type="hidden" name="product_name" value="">
        <input type="hidden" name="image" value="">
        <input type="hidden" name="price" value="">
      </form>
    </div>
  </div>
</div>

<script>
// Handle cart button clicks
document.addEventListener('click', function(e) {
    if (e.target.closest('.cart-btn')) {
        e.preventDefault();
        const btn = e.target.closest('.cart-btn');
        const name = btn.dataset.name;
        const image = btn.dataset.image;
        const size = btn.dataset.size;
        const price = btn.dataset.price;
        const id = btn.dataset.id;
        const color = btn.dataset.color;

        if (!window.userLoggedIn) {
            const loginModal = new bootstrap.Modal(document.getElementById('loginReqModal'));
            loginModal.show();
            return;
        }

        // Populate modal
        document.getElementById('cartModalProductName').textContent = name;
        document.getElementById('cartModalProductImg').src = image;
        document.getElementById('cartModalProductPrice').textContent = price;

        // Sizes
        const sizes = size.split(',');
        let sizesHtml = '';
        sizes.forEach((s, i) => {
            sizesHtml += `<input type="radio" class="btn-check" name="size" id="size${i}" value="${s.trim()}" ${i === 0 ? 'checked' : ''}>
<label class="btn btn-outline-primary" for="size${i}">${s.trim()}</label>`;
        });
        document.getElementById('cartModalProductSizes').innerHTML = sizesHtml;

        // Hidden inputs
        document.querySelector('input[name="product_id"]').value = id;
        document.querySelector('input[name="product_name"]').value = name;
        document.querySelector('input[name="image"]').value = image;
        document.querySelector('input[name="price"]').value = price;

        // Reset quantity
        document.getElementById('quantityInput').value = 1;

        // Show modal
        const modal = new bootstrap.Modal(document.getElementById('addToCartModal'));
        modal.show();
    }
});

// Handle form submit
document.addEventListener('submit', function(e) {
    if (e.target.closest('#addToCartModal form')) {
        e.preventDefault();
        const form = e.target.closest('#addToCartModal form');
        const formData = new FormData(form);

        fetch(form.action, {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            if (data.status === 'success') {
                // Hide modal
                bootstrap.Modal.getInstance(document.getElementById('addToCartModal')).hide();
                // Show success alert
                showAlert(data.message, 'success');
            } else {
                showAlert(data.message, 'danger');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            showAlert('An error occurred. Please try again.', 'danger');
        });
    }
});

// Modal close function
document.addEventListener('DOMContentLoaded', function() {
    const modal = document.getElementById('addToCartModal');
    const closeBtn = modal.querySelector('.close-btn');

    closeBtn.addEventListener('click', function() {
        bootstrap.Modal.getInstance(modal).hide();
    });
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

function showAlert(message, type) {
    const alertDiv = document.createElement('div');
    alertDiv.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
    alertDiv.style.cssText = 'top:20px;right:20px;z-index:9999;min-width:300px;';
    alertDiv.innerHTML = `${message}<button class="btn-close" data-bs-dismiss="alert"></button>`;
    document.body.appendChild(alertDiv);
    setTimeout(() => alertDiv.remove(), 5000);
}
</script>
