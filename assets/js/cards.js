document.addEventListener("DOMContentLoaded", function () {
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
        event.stopPropagation();
        console.log("Cart button clicked!", btn);

        var name = btn.getAttribute("data-name");
        var image = btn.getAttribute("data-image");
        var size = btn.getAttribute("data-size");
        var price = btn.getAttribute("data-price");

        console.log("Cart button data:", { name, image, size, price });

        // Create available sizes string from the single size
        var availableSizes = size || "S,M,L,XL"; // Default sizes if no size specified

        console.log("Calling populateCartModal with:", {
          name,
          image,
          price,
          availableSizes,
          size,
        });

        if (window.populateCartModal) {
          window.populateCartModal(name, image, price, availableSizes, size);
          console.log("populateCartModal called successfully");
        } else {
          console.error("populateCartModal function not found!");
        }

        var modal = new bootstrap.Modal(
          document.getElementById("addToCartModal")
        );
        modal.show();
        console.log("Modal should be shown now");
      }
    });

  document
    .getElementById("products-container")
    .addEventListener("click", function (event) {
      const btn = event.target.closest(".favorite-btn");
      if (btn) {
        event.stopPropagation();
        const icon = btn.querySelector(".fa-heart");
        icon.classList.toggle("red");
        icon.classList.toggle("fas");
        icon.classList.toggle("far");
      }
    });
});
