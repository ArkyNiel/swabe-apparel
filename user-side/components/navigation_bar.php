<?php
session_start();
?>

<link rel="stylesheet" href="./navigationbar.css">
<link rel="stylesheet" href="./../assets/css/search.css">
<link rel="stylesheet" href="./../assets/css/navbar.css">


<nav class="navbar navbar-expand-lg bg-body-tertiary custom-navbar sticky-top flex-column" style="margin-bottom: -20px;">
        <div class="w-100 py-2 border-bottom">
            <div class="d-flex justify-content-between align-items-center w-100 px-4">
                <div class="d-flex align-items-center">
                    <a class="navbar-brand fw-bold" href="#" style="font-weight: 1000 !important; letter-spacing: 2px !important; color: #000 !important;">SWABE APPAREL</a>
                </div>
                <div class="search-container flex-grow-1 mx-4">
                    <form class="d-flex" role="search" id="searchForm">
                        <div class="input-group">
                            <input class="form-control" type="search" placeholder="Search products..."
                                aria-label="Search" id="searchInput" autocomplete="off">
                            <button class="btn btn-dark" type="submit" style="background: #000 !important; border: 1px solid #000 !important;">
                                <i class="fas fa-search"></i> Search
                            </button>
                        </div>
                    </form>
                    <div class="search-results" id="searchResults">
                    </div>
                </div>
                <div class="d-flex align-items-center">
                    <li class="nav-item list-unstyled" style="margin-right: 5px !important;">
                        <a class="nav-link d-flex align-items-center" href="./links/cart.php">
                            <i class="fa-solid fa-cart-shopping" style="font-size: 20px; line-height: 1;"></i>
                        </a>
                    </li>
                    <li class="nav-item list-unstyled" style="margin-right: -10px !important;">
                        <a class="nav-link d-flex align-items-center" href="./links/wishlist.php">
                            <i class="fa-regular fa-heart" style="font-size: 20px; line-height: 1;"></i>
                        </a>
                    </li>
                    <li class="nav-item dropdown list-unstyled" style="margin-right: -10px !important;">
                        <a class="nav-link d-flex align-items-center" href="#" id="pagesDropdown"
                            role="button" data-bs-toggle="dropdown">
                            <i class="fa-solid fa-store" style="font-size: 20px; line-height: 1;"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item link-hover" href="./links/about_us.php" style="color: #000 !important; text-decoration: none !important; text-transform: uppercase !important;">About Us</a></li>
                            <li><a class="dropdown-item link-hover" href="./links/location.php" style="color: #000 !important; text-decoration: none !important; text-transform: uppercase !important;">Location</a></li>
                        </ul>
                    </li>
                    <li class="nav-item dropdown list-unstyled">
                        <a class="nav-link d-flex align-items-center" href="#" id="accountDropdown"
                            role="button" data-bs-toggle="dropdown">
                            <i class="fa-regular fa-user" style="font-size: 20px; line-height: 1;"></i>
                        </a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <?php if(isset($_SESSION['user_id'])): ?>
                                <li><a class="dropdown-item link-hover" href="./links/manage_account.php" style="color: #000 !important; text-decoration: none !important; text-transform: uppercase !important;">Manage Account</a></li>
                                <li><a class="dropdown-item link-hover" href="./links/feedback.php" style="color: #000 !important; text-decoration: none !important; text-transform: uppercase !important;">Give us Feedback</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item link-hover" href="./links/logout.php" style="color: #000 !important; text-decoration: none !important; text-transform: uppercase !important;">Log Out</a></li>
                            <?php else: ?>
                                <li><a class="dropdown-item link-hover" href="./links/login.php" style="color: #000 !important; text-decoration: none !important; text-transform: uppercase !important;">Log In</a></li>
                            <?php endif; ?>
                        </ul>
                    </li>
                </div>
            </div>
        </div>


    <!-- Bottom row navigation links -->
    <div class="w-100 bg-white">
        <div class="px-4">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarScroll">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarScroll">
                <ul class="navbar-nav mx-auto my-2 my-lg-0 justify-content-center w-100">
                    <li class="nav-item"><a class="nav-link link-hover" href="./links/hot_sales.php">Hot Sales 🔥</a>
                    </li>
                    <li class="nav-item"><a class="nav-link link-hover" href="./links/all_products.php">All Products</a>
                    </li>
                    <li class="nav-item"><a class="nav-link link-hover" href="./links/new_products.php">New products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-hover" href="./links/shoes.php">
                            Shoes
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-hover" href="./links/shirts.php">
                            Shirts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link link-hover" href="./links/collection.php">
                            Collection
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">

<script>
document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('searchInput');
    const searchResults = document.getElementById('searchResults');
    const searchForm = document.getElementById('searchForm');
    let searchTimeout;
    let currentSearchRequest;

    searchInput.addEventListener('input', function() {
        const query = this.value.trim();
        
        clearTimeout(searchTimeout);
        
        if (currentSearchRequest) {
            currentSearchRequest.abort();
        }
        
        if (query.length < 2) {
            searchResults.style.display = 'none';
            return;
        }
        
        searchResults.innerHTML = '<div class="search-loading">Searching...</div>';
        searchResults.style.display = 'block';
        
        searchTimeout = setTimeout(() => {
            performSearch(query);
        }, 300);
    });

    searchForm.addEventListener('submit', function(e) {
        e.preventDefault();
        const query = searchInput.value.trim();
        if (query) {
            window.location.href = `./links/search_result.php?search=${encodeURIComponent(query)}`;
        }
    });

    document.addEventListener('click', function(e) {
        if (!searchInput.contains(e.target) && !searchResults.contains(e.target)) {
            searchResults.style.display = 'none';
        }
    });

    searchResults.addEventListener('click', function(e) {
        const resultItem = e.target.closest('.search-result-item');
        if (resultItem) {
            window.location.href = `./links/search_result.php?search=${encodeURIComponent(resultItem.dataset.productName)}`;
        }
    });

    function performSearch(query) {
        const searchUrl = '../back-end/user-side/search_products.php';
        const url = `${searchUrl}?search=${encodeURIComponent(query)}&limit=8&prefix=./uploads/`;
        
        const controller = new AbortController();
        currentSearchRequest = controller;
        
        fetch(url, { signal: controller.signal })
            .then(response => response.json())
            .then(data => {
                if (controller.signal.aborted) return;
                
                displaySearchResults(data, query);
            })
            .catch(error => {
                if (error.name === 'AbortError') return;
                
                console.error('Search error:', error);
                searchResults.innerHTML = '<div class="no-results">Error occurred while searching</div>';
            });
    }

    function displaySearchResults(products, query) {
        if (!Array.isArray(products) || products.length === 0) {
            searchResults.innerHTML = '<div class="no-results">No products found for "' + query + '"</div>';
            return;
        }

        const resultsHTML = products.map(product => `
            <div class="search-result-item" 
                 data-product-id="${product.id}" 
                 data-product-name="${product.product_name}"
                 data-product-image="${product.image || './assets/img/logo.jpg'}"
                 data-product-color="${product.color || 'N/A'}"
                 data-product-size="${product.size || 'N/A'}"
                 data-product-price="${product.price || 'N/A'}">
                <img src="${product.image || './assets/img/logo.jpg'}" 
                     alt="${product.product_name}" 
                     class="search-result-image"
                     onerror="this.src='./assets/img/logo.jpg'">
                <div class="search-result-info">
                    <div class="search-result-name">${product.product_name}</wdiv>
                    <div class="search-result-details">
                        ${product.category} • ${product.color} • ${product.size}
                    </div>
                </div>
                <div class="search-result-price">₱${product.price}</div>
            </div>
        `).join('');

        searchResults.innerHTML = resultsHTML;
    }
});
</script>
