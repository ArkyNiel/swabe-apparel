document.addEventListener("DOMContentLoaded", function () {
  // Load wishlist items on page load
  if (window.userLoggedIn) {
    fetch("../../back-end/user-side/get_wishlist.php")
      .then(response => response.json())
      .then(data => {
        if (data.wishlist) {
          data.wishlist.forEach(productId => {
            const favoriteBtn = document.querySelector(`.favorite-btn[data-id="${productId}"]`);
            if (favoriteBtn) {
              const icon = favoriteBtn.querySelector('.fa-heart');
              icon.classList.add('fas', 'red');
              icon.classList.remove('far');
            }
          });
        }
      })
      .catch(error => console.error('Error loading wishlist:', error));
  }

  // Show alert function
  function showAlert(msg, type) {
    document.querySelectorAll(".alert").forEach(a => a.remove());
    const alert = document.createElement("div");
    alert.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
    alert.style.cssText = "top:20px;right:20px;z-index:9999;min-width:300px;";
    alert.innerHTML = `${msg}<button class="btn-close" data-bs-dismiss="alert"></button>`;
    document.body.appendChild(alert);
    setTimeout(() => alert.remove(), 5000);
  }

  document
    .getElementById("products-container")
    .addEventListener("click", function (event) {
      const card = event.target.closest(".product-card");
      if (card && !event.target.closest(".card-actions")) {
        document.getElementById("productModalProductImage").src =
          card.getAttribute("data-image");
        document.getElementById("productModalProductName").textContent =
          card.getAttribute("data-name");
        document.getElementById("productModalProductColor").textContent =
          card.getAttribute("data-color");
        document.getElementById("productModalProductSize").textContent =
          card.getAttribute("data-size");
        document.getElementById("productModalProductPrice").textContent =
          card.getAttribute("data-price");
        var modal = new bootstrap.Modal(
          document.getElementById("productModal")
        );
        modal.show();
      }
    });

  // Define the populateCartModal function
  window.populateCartModal = function (
    name,
    image,
    price,
    availableSizes,
    selectedSize
  ) {
    console.log("populateCartModal called with:", {
      name,
      image,
      price,
      availableSizes,
      selectedSize,
    });

    // Populate modal fields
    document.getElementById("cartModalProductImg").src = image;
    document.getElementById("cartModalProductName").textContent = name;
    document.getElementById("cartModalProductPrice").textContent = price;

    // Handle sizes
    const sizesContainer = document.getElementById("cartModalProductSizes");
    if (sizesContainer) {
      sizesContainer.innerHTML = "";
      const sizes = availableSizes.split(",");
      sizes.forEach((size, index) => {
        const sizeTrimmed = size.trim();
        const input = document.createElement("input");
        input.type = "radio";
        input.className = "btn-check";
        input.name = "size";
        input.id = "size" + index;
        input.value = sizeTrimmed;
        if (sizeTrimmed === selectedSize || (index === 0 && !selectedSize)) {
          input.checked = true;
        }

        const label = document.createElement("label");
        label.className = "btn btn-outline-primary";
        label.htmlFor = "size" + index;
        label.textContent = sizeTrimmed;

        sizesContainer.appendChild(input);
        sizesContainer.appendChild(label);
      });
    }
  };

  document
    .getElementById("products-container")
    .addEventListener("click", function (event) {
      const btn = event.target.closest(".cart-btn");
      if (btn) {
        event.preventDefault();
        event.stopPropagation();

        const name = btn.getAttribute("data-name");
        const image = btn.getAttribute("data-image");
        const size = btn.getAttribute("data-size");
        const price = btn.getAttribute("data-price");
        const id = btn.getAttribute("data-id");
        const color = btn.getAttribute("data-color") || "N/A";

        // Populate modal fields
        const modal = document.getElementById("addToCartModal");
        if (!modal) {
          console.error("Modal not found!");
          return;
        }

        // Populate product info
        const nameEl = document.getElementById("cartModalProductName");
        const imgEl = document.getElementById("cartModalProductImg");
        const priceEl = document.getElementById("cartModalProductPrice");
        const colorEl = document.getElementById("cartModalProductColor");

        if (nameEl) nameEl.textContent = name;
        if (imgEl) imgEl.src = image;
        if (priceEl) priceEl.textContent = price;
        if (colorEl) colorEl.textContent = color;

        // Populate sizes
        const sizesContainer = document.getElementById("cartModalProductSizes");
        if (sizesContainer) {
          sizesContainer.innerHTML = "";
          const sizes = (size || "S,M,L,XL").split(",");
          sizes.forEach((s, index) => {
            const sizeTrimmed = s.trim();
            const radio = document.createElement("input");
            radio.type = "radio";
            radio.className = "btn-check";
            radio.name = "cartModalProductSize";
            radio.id = "size" + index;
            radio.value = sizeTrimmed;
            if (index === 0) radio.checked = true;

            const label = document.createElement("label");
            label.className = "btn btn-outline-primary";
            label.htmlFor = "size" + index;
            label.textContent = sizeTrimmed;

            sizesContainer.appendChild(radio);
            sizesContainer.appendChild(label);
          });
        }

        // Set hidden form fields
        const productIdInput = document.querySelector('input[name="product_id"]');
        const productNameInput = document.querySelector('input[name="product_name"]');
        const imageInput = document.querySelector('input[name="image"]');
        const priceInput = document.querySelector('input[name="price"]');

        if (productIdInput) productIdInput.value = id || "";
        if (productNameInput) productNameInput.value = name || "";
        if (imageInput) imageInput.value = image || "";
        if (priceInput) priceInput.value = price || "";

        // Show modal using Bootstrap if available, otherwise manual
        if (typeof bootstrap !== 'undefined' && bootstrap.Modal) {
          const bsModal = new bootstrap.Modal(modal);
          bsModal.show();
        } else {
          // Fallback to manual modal display
          modal.classList.add('show');
          modal.style.display = 'block';
          document.body.classList.add('modal-open');

          // Add backdrop if it doesn't exist
          let backdrop = document.querySelector('.modal-backdrop');
          if (!backdrop) {
            backdrop = document.createElement('div');
            backdrop.className = 'modal-backdrop fade show';
            backdrop.style.zIndex = '1040';
            document.body.appendChild(backdrop);
          }
        }
      }
    });

  document
    .getElementById("products-container")
    .addEventListener("click", function (event) {
      const btn = event.target.closest(".favorite-btn");
      if (btn) {
        event.stopPropagation();

        // Check if user is logged in
        if (!window.userLoggedIn) {
          showAlert("Please login to add items to wishlist!", "warning");
          setTimeout(() => location.href = "../../user-side/links/login.php", 2000);
          return;
        }

        const icon = btn.querySelector(".fa-heart");
        icon.classList.toggle("red");
        icon.classList.toggle("fas");
        icon.classList.toggle("far");

        // Get product data
        const name = btn.getAttribute("data-name");
        const image = btn.getAttribute("data-image");
        const price = btn.getAttribute("data-price");
        const id = btn.getAttribute("data-id");
        const color = btn.getAttribute("data-color") || "N/A";

        // Send to backend
        const data = new FormData();
        data.append("action", "add_to_wishlist");
        data.append("ajax", "1");
        data.append("product_id", id);
        data.append("product_name", name);
        data.append("image", image);
        data.append("price", price);

        fetch("../../back-end/user-side/add_to_wishlist.php", {
          method: "POST",
          body: data
        })
          .then(response => response.text())
          .then(text => {
            try {
              const data = JSON.parse(text);
              if (data.status === "login_required") {
                showAlert(data.message, "warning");
                setTimeout(() => location.href = "../../user-side/links/login.php", 2000);
              } else if (data.status === "success") {
                showAlert(data.message, "success");
              } else {
                showAlert(data.message, "danger");
              }
            } catch (e) {
              showAlert("Server error. Please try again.", "danger");
            }
          })
          .catch(error => showAlert("Error occurred!", "danger"));
      }
    });
});
