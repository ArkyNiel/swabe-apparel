


// Simple alert function
function showAlert(msg, type) {
    document.querySelectorAll(".alert").forEach(a => a.remove());
    const alert = document.createElement("div");
    alert.className = `alert alert-${type} alert-dismissible fade show position-fixed`;
    alert.style.cssText = "top:20px;right:20px;z-index:9999;min-width:300px;";
    alert.innerHTML = `${msg}<button class="btn-close" data-bs-dismiss="alert"></button>`;
    document.body.appendChild(alert);
    setTimeout(() => alert.remove(), 5000);
}

// Load wishlist hearts if logged in
function loadWishlistHearts() {
    if (window.userLoggedIn) {
        fetch('../../back-end/user-side/get_wishlist.php')
            .then(response => response.json())
            .then(data => {
                if (data.wishlist) {
                    data.wishlist.forEach(item => {
                        const btn = document.querySelector(`.favorite-btn[data-id="${item.product_id}"]`);
                        if (btn) {
                            btn.querySelector('.fa-heart').classList.add('fas', 'red');
                            btn.querySelector('.fa-heart').classList.remove('far');
                        }
                    });
                }
            });
    }
}

// Attach favorite button handlers
function attachFavoriteBtnHandler() {
    document.querySelectorAll('.favorite-btn').forEach(btn => {
        btn.onclick = function(e) {
            e.stopPropagation();
            if (!window.userLoggedIn) {
                new bootstrap.Modal(document.getElementById('loginReqModal')).show();
                return;
            }
            const icon = this.querySelector('.fa-heart');
            const isFav = icon.classList.contains('fas');
            const data = new FormData();
            data.append("ajax", "1");
            data.append("product_id", this.getAttribute("data-id"));
            data.append("action", isFav ? "remove" : "add_to_wishlist");
            if (!isFav) {
                data.append("product_name", this.getAttribute("data-name"));
                data.append("image", this.getAttribute("data-image"));
                data.append("price", this.getAttribute("data-price"));
            }
            fetch("../../back-end/user-side/add_to_wishlist.php", { method: "POST", body: data })
                .then(response => response.text())
                .then(text => {
                    const res = JSON.parse(text);
                    if (res.status === "success" || res.success) {
                        icon.classList.toggle('fas');
                        icon.classList.toggle('far');
                        icon.classList.toggle('red');
                        showAlert(isFav ? "Removed from wishlist!" : "Added to wishlist!", "success");
                    } else {
                        showAlert(res.message, "danger");
                    }
                });
        };
    });
}

document.addEventListener('DOMContentLoaded', function() {
    const container = document.getElementById('products-container');
    const btn = document.getElementById('load-more-btn');
    const key = 'page_' + window.location.pathname;
    const lastPage = sessionStorage.getItem('lastPage');
    if (lastPage !== window.location.pathname) {
        sessionStorage.removeItem(key);
    }
    sessionStorage.setItem('lastPage', window.location.pathname);
    let page = parseInt(sessionStorage.getItem(key)) || 1;
    const perPage = 12;
    const url = window.GET_PRODUCTS_URL;
    const cat = window.PRODUCT_CATEGORY;
    const initCount = window.INITIAL_PRODUCTS_COUNT || 0;
    const query = window.SEARCH_QUERY || '';

    // Load previous products on reload
    if (page > 1) {
        for (let p = 1; p < page; p++) {
            const start = initCount + (p - 1) * perPage;
            let fetchUrl = query ? '../../back-end/user-side/search_products.php' : url;
            fetchUrl += `?start=${start}&limit=${perPage}`;
            if (query) fetchUrl += `&search=${encodeURIComponent(query)}`;
            if (cat) fetchUrl += `&category=${cat}`;
            if (window.UPLOAD_PREFIX) fetchUrl += `&prefix=${encodeURIComponent(window.UPLOAD_PREFIX)}`;

            fetch(fetchUrl)
                .then(r => r.json())
                .then(data => {
                    const prods = data.products || data;
                    prods.forEach(prod => {
                        const html = `
                            <div class="col-md-2 mb-4 product-item">
                                <div class="card-container">
                                    <div class="card product-card" style="width:100%;height:300px;cursor:pointer;" data-name="${prod.product_name}" data-image="${prod.image}" data-color="${prod.color}" data-size="${prod.size}" data-price="${prod.price}">
                                        <img src="${prod.image}" class="card-img-top" style="height:100%;object-fit:cover;" />
                                    </div>
                                </div>
                                <div class="card-actions d-flex justify-content-between mt-2">
                                    <h5>₱${prod.price}</h5>
                                    <div>
                                        <button class="btn favorite-btn" data-name="${prod.product_name}" data-image="${prod.image}" data-price="${prod.price}" data-id="${prod.id}">
                                            <i class="far fa-heart"></i>
                                        </button>
                                        <button class="btn cart-btn" data-name="${prod.product_name}" data-image="${prod.image}" data-size="${prod.size}" data-price="${prod.price}">
                                            <i class="fas fa-cart-shopping"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        `;
                        container.insertAdjacentHTML('beforeend', html);
                    });
                    document.dispatchEvent(new Event('productsAppended'));
                });
        }
    }

    // Modal for product
    const modal = new bootstrap.Modal(document.getElementById('productModal'));
    container.addEventListener('click', e => {
        const card = e.target.closest('.product-card');
        if (card) {
            document.getElementById('modalProductImage').src = card.dataset.image;
            document.getElementById('modalProductName').textContent = card.dataset.name;
            document.getElementById('modalProductColor').textContent = card.dataset.color;
            document.getElementById('modalProductSize').textContent = card.dataset.size;
            document.getElementById('modalProductPrice').textContent = card.dataset.price;
            modal.show();
        }
    });

    // Load more button
    btn.addEventListener('click', function() {
        const start = initCount + (page - 1) * perPage;
        let fetchUrl = query ? '../../back-end/user-side/search_products.php' : url;
        fetchUrl += `?start=${start}&limit=${perPage}`;
        if (query) fetchUrl += `&search=${encodeURIComponent(query)}`;
        if (cat) fetchUrl += `&category=${cat}`;
        if (window.UPLOAD_PREFIX) fetchUrl += `&prefix=${encodeURIComponent(window.UPLOAD_PREFIX)}`;

        fetch(fetchUrl)
            .then(r => r.json())
            .then(data => {
                const prods = data.products || data;
                const hasMore = data.hasMore || prods.length === perPage;
                prods.forEach(prod => {
                    const html = `
                        <div class="col-md-2 mb-4 product-item">
                            <div class="card-container">
                                <div class="card product-card" style="width:100%;height:300px;cursor:pointer;" data-name="${prod.product_name}" data-image="${prod.image}" data-color="${prod.color}" data-size="${prod.size}" data-price="${prod.price}">
                                    <img src="${prod.image}" class="card-img-top" style="height:100%;object-fit:cover;" />
                                </div>
                            </div>
                            <div class="card-actions d-flex justify-content-between mt-2">
                                <h5>₱${prod.price}</h5>
                                <div>
                                    <button class="btn favorite-btn" data-name="${prod.product_name}" data-image="${prod.image}" data-price="${prod.price}" data-id="${prod.id}">
                                        <i class="far fa-heart"></i>
                                    </button>
                                    <button class="btn cart-btn" data-name="${prod.product_name}" data-image="${prod.image}" data-size="${prod.size}" data-price="${prod.price}">
                                        <i class="fas fa-cart-shopping"></i>
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
                    container.insertAdjacentHTML('beforeend', html);
                });
                page++;
                sessionStorage.setItem(key, page);
                if (!hasMore) btn.style.display = 'none';
                document.dispatchEvent(new Event('productsAppended'));
            });
    });

    // Initial visibility
    setTimeout(() => {
        document.querySelectorAll('.card-container').forEach(c => c.classList.add('visible'));
    }, 100);

    loadWishlistHearts();
    attachFavoriteBtnHandler();
});

document.addEventListener('productsAppended', function() {
    attachFavoriteBtnHandler();
    loadWishlistHearts();
});


