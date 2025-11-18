function showAlert(msg, type) {
    document.querySelectorAll(".alert").forEach(a => a.remove());
    const alert = document.createElement("div");
    alert.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
    alert.style.cssText = "top:20px;right:20px;z-index:9999;min-width:300px;";
    alert.innerHTML = `${msg}<button class="btn-close" data-bs-dismiss="alert"></button>`;
    document.body.appendChild(alert);
    setTimeout(() => alert.remove(), 5000);
}

// Function to load wishlist hearts
function loadWishlistHearts() {
    if (window.userLoggedIn) {
        fetch('../../back-end/user-side/get_wishlist.php')
            .then(response => response.json())
            .then(data => {
                if (data.wishlist) {
                    data.wishlist.forEach(item => {
                        const favoriteBtn = document.querySelector(`.favorite-btn[data-id="${item.product_id}"]`);
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
}

document.addEventListener('DOMContentLoaded', function() {
    const productsContainer = document.getElementById('products-container');
    const loadMoreBtn = document.getElementById('load-more-btn');
    let currentPage = 2;
    const productsPerPage = 12;
    const getProductsUrl = window.GET_PRODUCTS_URL;
    const productCategory = window.PRODUCT_CATEGORY;
    const initialProductsCount = window.INITIAL_PRODUCTS_COUNT || 0;
    const searchQuery = window.SEARCH_QUERY || '';

    if (!getProductsUrl) {
        console.error('GET_PRODUCTS_URL is not set!');
        return;
    }

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
        
        let url;
        if (searchQuery) {
            url = '../../back-end/user-side/search_products.php';
            url += `?start=${start}&limit=${productsPerPage}&search=${encodeURIComponent(searchQuery)}`;
        } else {
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
                
                if (data.error) {
                    console.error('Error from server:', data.error);
                    return;
                }
                
                const nextProducts = data.products || data; 
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
                                </div>
                                <div class="card-actions d-flex justify-content-between align-items-center mt-2">
                                    <h5 class="product-price">₱${product.price || 'N/A'}</h5>
                                    <div>
                                        <button class="btn favorite-btn" title="Add to Favorites"
                                            data-name="${product.product_name || ''}"
                                            data-image="${product.image || ''}"
                                            data-price="${product.price || 'N/A'}"
                                            data-id="${product.id || ''}"
                                            data-color="${product.color || 'N/A'}"
                                        >
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

    setTimeout(() => {
        document.querySelectorAll('.card-container').forEach(card => {
            card.classList.add('visible');
        });
    }, 100);

    // Load wishlist hearts for initial products
    loadWishlistHearts();
});

function attachFavoriteBtnHandler() {
    document.querySelectorAll('.favorite-btn').forEach(function(btn) {
        btn.onclick = function(event) {
            event.stopPropagation();

            // Check if user is logged in
            if (!window.userLoggedIn) {
                const loginModal = new bootstrap.Modal(document.getElementById('loginReqModal'));
                loginModal.show();
                return;
            }

            const icon = this.querySelector('.fa-heart');
            const isFavorited = icon.classList.contains('fas');

            // Get product data
            const name = this.getAttribute("data-name");
            const image = this.getAttribute("data-image");
            const price = this.getAttribute("data-price");
            const id = this.getAttribute("data-id");
            const color = this.getAttribute("data-color") || "N/A";

            // Send to backend
            const data = new FormData();
            data.append("ajax", "1");
            data.append("product_id", id);
            if (isFavorited) {
                data.append("action", "remove");
            } else {
                data.append("action", "add_to_wishlist");
                data.append("product_name", name);
                data.append("image", image);
                data.append("price", price);
            }

            fetch("../../back-end/user-side/add_to_wishlist.php", {
                method: "POST",
                body: data
            })
                .then(response => response.text())
                .then(text => {
                    try {
                        const responseData = JSON.parse(text);
                        if (responseData.status === "login_required") {
                            showAlert(responseData.message, "warning");
                            setTimeout(() => location.href = "../../user-side/links/login.php", 2000);
                        } else if (responseData.status === "success" || responseData.success) {
                            // Toggle the icon only on success
                            icon.classList.toggle('red');
                            icon.classList.toggle('fas');
                            icon.classList.toggle('far');
                            if (isFavorited) {
                                showAlert("Product removed from wishlist!", "success");
                            } else {
                                showAlert("Product added to wishlist!", "success");
                            }
                        } else if (responseData.status === "error" && responseData.message === "This product is already in your wishlist.") {
                            // If already in wishlist, ensure icon is colored
                            icon.classList.add('fas', 'red');
                            icon.classList.remove('far');
                            showAlert(responseData.message, "warning");
                        } else {
                            showAlert(responseData.message, "danger");
                        }
                    } catch (e) {
                        showAlert("Server error. Please try again.", "danger");
                    }
                })
                .catch(error => showAlert("Error occurred!", "danger"));
        };
    });
}

document.addEventListener('productsAppended', function() {
    attachFavoriteBtnHandler();
    loadWishlistHearts();
});


