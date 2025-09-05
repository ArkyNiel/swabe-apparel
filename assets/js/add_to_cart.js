document.addEventListener("DOMContentLoaded", function () {
  console.log("Add to cart JS loaded");

  // Quantity controls
  const qty = document.getElementById("cartModalQuantity");
  const decreaseBtn = document.getElementById("decreaseQuantity");
  const increaseBtn = document.getElementById("increaseQuantity");

  if (decreaseBtn && increaseBtn && qty) {
    console.log("Quantity controls found");
    decreaseBtn.onclick = () => (qty.value = Math.max(1, qty.value - 1));
    increaseBtn.onclick = () =>
      (qty.value = Math.min(99, parseInt(qty.value) + 1));
  } else {
    console.error("Quantity controls not found:", {
      decreaseBtn,
      increaseBtn,
      qty,
    });
  }

  // Populate size options
  window.populateCartModal = (name, image, price, sizes, selected) => {
    document.getElementById("cartModalProductName").textContent = name;
    document.getElementById("cartModalProductImg").src = image;
    document.getElementById("cartModalProductPrice").textContent = price;
    document.getElementById("cartModalProductSizes").innerHTML = sizes
      .split(",")
      .map(
        (s, i) =>
          `<input type="radio" class="btn-check" name="cartModalProductSize" id="size${i}" value="${s.trim()}" ${
            s.trim() === selected ? "checked" : ""
          }>
       <label class="btn btn-outline-primary" for="size${i}">${s.trim()}</label>`
      )
      .join("");
    qty.value = 1;
  };

  // Add to cart
  const addToCartBtn = document.getElementById("addToCartButton");
  console.log("Add to Cart Button element:", addToCartBtn);

  if (addToCartBtn) {
    addToCartBtn.addEventListener("click", function () {
      console.log("Add to Cart button clicked inside modal!");

      const size = document.querySelector(
        'input[name="cartModalProductSize"]:checked'
      );
      console.log("Selected size:", size);

      if (!size) {
        console.log("No size selected");
        return showAlert("Select size!", "warning");
      }

      const productName = document.getElementById(
        "cartModalProductName"
      ).textContent;
      const productImage = document.getElementById("cartModalProductImg").src;
      const productPrice = document.getElementById(
        "cartModalProductPrice"
      ).textContent;
      const quantity = qty.value;

      console.log("Form data:", {
        productName,
        productImage,
        productPrice,
        quantity,
        size: size.value,
      });

      const data = new FormData();
      data.append("action", "add_to_cart");
      data.append("product_name", productName);
      data.append("image", productImage);
      data.append("size", size.value);
      data.append("price", productPrice);
      data.append("quantity", quantity);

      console.log("Sending fetch request...");

      fetch("../../back-end/user-side/add_to_cart.php", {
        method: "POST",
        body: data,
      })
        .then((response) => {
          console.log("Fetch response:", response);
          return response.json();
        })
        .then((data) => {
          console.log("Response data:", data);
          if (data.status === "login_required") {
            showAlert(data.message, "warning");
            setTimeout(
              () => (location.href = "../../user-side/links/login.php"),
              2000
            );
          } else if (data.status === "success") {
            showAlert(data.message, "success");
            bootstrap.Modal.getInstance(
              document.getElementById("addToCartModal")
            ).hide();
          } else {
            showAlert(data.message, "danger");
          }
        })
        .catch((error) => {
          console.error("Fetch error:", error);
          showAlert("Error occurred!", "danger");
        });
    });
    console.log("Event listener attached to Add to Cart button");
  } else {
    console.error("Add to Cart button not found!");
  }

  // Bootstrap alert
  function showAlert(msg, type) {
    document.querySelectorAll(".alert").forEach((a) => a.remove());
    const alert = document.createElement("div");
    alert.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
    alert.style.cssText = "top:20px;right:20px;z-index:9999;min-width:300px;";
    alert.innerHTML = `${msg}<button class="btn-close" data-bs-dismiss="alert"></button>`;
    document.body.appendChild(alert);
    setTimeout(() => alert.remove(), 5000);
  }

  // Modal animations
  const modal = document.getElementById("addToCartModal");
  modal.addEventListener("show.bs.modal", () =>
    setTimeout(() => modal.classList.add("slide-in"), 10)
  );
  modal.addEventListener("hide.bs.modal", () =>
    modal.classList.remove("slide-in")
  );
});
