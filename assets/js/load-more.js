document.addEventListener('DOMContentLoaded', function() {
    const productsContainer = document.getElementById('products-container');
    const loadMoreBtn = document.getElementById('load-more-btn');
    let currentPage = 1;
    const productsPerPage = 12;
    const getProductsUrl = window.GET_PRODUCTS_URL;
    const productCategory = window.PRODUCT_CATEGORY;
    const initialProductsCount = window.INITIAL_PRODUCTS_COUNT || 0;
    const searchQuery = window.SEARCH_QUERY || '';
    
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
        
        // Determine which endpoint to use based on search query
        let url;
        if (searchQuery) {
            // Use search endpoint
            url = '../../back-end/user-side/search_products.php';
            url += `?start=${start}&limit=${productsPerPage}&search=${encodeURIComponent(searchQuery)}`;
        } else {
            // Use regular products endpoint
            url = `${getProductsUrl}?start=${start}&limit=${productsPerPage}`;
            if (productCategory) {
                url += `&category=${productCategory}`;
            }
        }
        
        if (window.UPLOAD_PREFIX) {
            url += `&prefix=${encodeURIComponent(window.UPLOAD_PREFIX)}`;
        }
        console.log('Fetching:', url);
        
        fetch(url)
            .then(response => response.json())
            .then(data => {
                console.log('Fetched data:', data);
                
                // Check if we have an error
                if (data.error) {
                    console.error('Error from server:', data.error);
                    return;
                }
                
                const nextProducts = data.products || data; // Handle both new and old format
                const hasMore = data.hasMore !== undefined ? data.hasMore : (nextProducts.length === productsPerPage);
                
                console.log('Fetched products:', nextProducts);
                console.log('Has more products:', hasMore);
                
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
                                <div class="card-actions d-flex justify-content-between align-items-center mt-2">
                                    <h5 class="product-price">₱${product.price || 'N/A'}</h5>
                                    <div>
                                        <button class="btn favorite-btn" title="Add to Favorites">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <button 
                                            class="btn cart-btn" 
                                            title="Add to Cart"
                                            data-name="${product.product_name || ''}"
                                            data-image="${product.image || ''}"
                                            data-size="${product.size || 'N/A'}"
                                            data-price="${product.price || 'N/A'}"
                                        >
                                            <i class="fas fa-cart-shopping"></i>
                                        </button>
                                    </div>
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
                    
                    // Hide button if no more products
                    if (!hasMore) {
                        loadMoreBtn.style.display = 'none';
                        console.log('No more products to load, hiding button');
                    }
                } else {
                    loadMoreBtn.style.display = 'none';
                    console.log('No products returned, hiding button');
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