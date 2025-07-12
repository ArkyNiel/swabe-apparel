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