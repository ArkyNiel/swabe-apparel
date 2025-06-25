document.addEventListener('DOMContentLoaded', function() {
    const productsContainer = document.getElementById('products-container');
    const loadMoreBtn = document.getElementById('load-more-btn');
    let currentPage = 1;
    const productsPerPage = 12;
    const getProductsUrl = window.GET_PRODUCTS_URL;
    const productCategory = window.PRODUCT_CATEGORY;
    
    if (!getProductsUrl) {
        console.error('GET_PRODUCTS_URL is not set!');
        return;
    }
    
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
    
    if (!loadMoreBtn) {
        console.error('Load More button not found!');
        return;
    }
    
    loadMoreBtn.addEventListener('click', function() {
        console.log('Load More button clicked');
        const start = currentPage * productsPerPage;
        console.log('Fetching from:', getProductsUrl, 'with start:', start, 'and limit:', productsPerPage);
        let url = `${getProductsUrl}?start=${start}&limit=${productsPerPage}`;
        if (productCategory) {
            url += `&category=${productCategory}`;
        }
        if (window.UPLOAD_PREFIX) {
            url += `&prefix=${encodeURIComponent(window.UPLOAD_PREFIX)}`;
        }
        console.log('Fetching:', url);
        
        fetch(url)
            .then(response => response.json())
            .then(nextProducts => {
                console.log('Fetched products:', nextProducts);
                if (Array.isArray(nextProducts) && nextProducts.length > 0) {
                    nextProducts.forEach((product, index) => {
                        const isRight = (index % 12) >= 6 ? 'right' : '';
                        const imgSrc = product.image;
                        const productHTML = `
                            <div class="col-md-2 mb-4 product-item">
                                <div class="card-container ${isRight}">
                                    <div 
                                        class="card product-card" 
                                        style="width: 100%; height: 300px; cursor:pointer;"
                                        data-name="${product.product_name || ''}"
                                        data-image="${product.image || ''}"
                                        data-color="${product.color || 'N/A'}"
                                        data-size="${product.size || 'N/A'}"
                                        data-price="${product.price || 'N/A'}"
                                    >
                                        <img src="${product.image || ''}"
                                            class="card-img-top"
                                            alt="${product.product_name || ''}"
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
                    
                    if (nextProducts.length < productsPerPage) {
                        loadMoreBtn.style.display = 'none';
                    }
                } else {
                    loadMoreBtn.style.display = 'none';
                }
                const event = new Event('productsAppended');
                document.dispatchEvent(event);
            })
            .catch(error => {
                console.error('Error loading more products:', error);
            });
    });

    // Initial animation
    setTimeout(() => {
        document.querySelectorAll('.card-container').forEach(card => {
            card.classList.add('visible');
        });
    }, 100);
});
