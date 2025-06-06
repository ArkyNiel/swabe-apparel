document.addEventListener('DOMContentLoaded', function() {
    const productsContainer = document.getElementById('products-container');
    const loadMoreBtn = document.getElementById('load-more-btn');
    let currentPage = 1;
    const productsPerPage = 12;
    let allProducts = productsData; // json products
    
    // Create modal instance once
    const productModal = new bootstrap.Modal(document.getElementById('productModal'));
    
    productsContainer.addEventListener('click', function(e) {
        const productCard = e.target.closest('.product-card');
        if (productCard) {
            document.getElementById('modalProductImage').src = productCard.getAttribute('data-image');
            document.getElementById('modalProductName').textContent = productCard.getAttribute('data-name');
            document.getElementById('modalProductColor').textContent = productCard.getAttribute('data-color');
            document.getElementById('modalProductSize').textContent = productCard.getAttribute('data-size');
            document.getElementById('modalProductPrice').textContent = productCard.getAttribute('data-price');
            productModal.show();
        }
    });
    
    if (allProducts.length > productsPerPage) {
        loadMoreBtn.style.display = 'block';
        loadMoreBtn.style.opacity = '1';
    }
    
    loadMoreBtn.addEventListener('click', function() {
        const start = currentPage * productsPerPage;
        const end = start + productsPerPage;
        const nextProducts = allProducts.slice(start, end);
        
        if (nextProducts.length > 0) {
            nextProducts.forEach((product, index) => {
                const isRight = (start + index) >= (start + 6) ? 'right' : '';
                const productHTML = `
                    <div class="col-md-2 mb-4 product-item">
                        <div class="card-container ${isRight}">
                            <div 
                                class="card product-card" 
                                style="width: 100%; height: 300px; cursor:pointer;"
                                data-name="${product.name || ''}"
                                data-image="${product.image || ''}"
                                data-color="${product.color || 'N/A'}"
                                data-size="${product.size || 'N/A'}"
                                data-price="${product.price || 'N/A'}"
                            >
                                <img
                                    src="${product.image}"
                                    class="card-img-top"
                                    alt="${product.name}"
                                    style="height: 100%; object-fit: cover"
                                />
                            </div>
                            <div class="buy-text">View</div>
                        </div>
                        <div class="card-actions">
                            <button class="btn favorite-btn" title="Add to Favorites">
                                <i class="far fa-heart"></i>
                            </button>
                            <button class="btn cart-btn" title="Add to Cart">
                                <i class="fas fa-cart-shopping"></i>
                            </button>
                        </div>
                    </div>
                `;
                productsContainer.insertAdjacentHTML('beforeend', productHTML);
            });
            
            // manipulate css
            setTimeout(() => {
                document.querySelectorAll('.card-container:not(.visible)').forEach(card => {
                    card.classList.add('visible');
                });
            }, 100);
            
            currentPage++;
            
            if (end >= allProducts.length) {
                loadMoreBtn.style.display = 'none';
            }
        }
    });

    // once a time/load animation
    setTimeout(() => {
        document.querySelectorAll('.card-container').forEach(card => {
            card.classList.add('visible');
        });
    }, 100);
});
