document.addEventListener("DOMContentLoaded", function () {
  console.log("Home page Add to cart JS loaded");

  // Quantity controls
  const qty = document.getElementById("cartModalQuantity");
  const decreaseBtn = document.getElementById("decreaseQuantity");
  const increaseBtn = document.getElementById("increaseQuantity");

  //di rin gumagana ampt
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

  // class add to cart
  const addToCartBtn = document.querySelector(".btn-add-cart");
  console.log("Add to Cart Button element:", addToCartBtn);

  if (addToCartBtn) {
    addToCartBtn.addEventListener("click", function (event) {
      console.log("Add to Cart button clicked inside modal!");
      // may bug sa post request
    });
    console.log("Event listener attached to Add to Cart button");
  } else {
    console.error("Add to Cart button not found!");
  }
});
