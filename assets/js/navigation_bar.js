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
                    <div class="search-result-name">${product.product_name}</div>
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