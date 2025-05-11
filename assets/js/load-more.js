document.addEventListener('DOMContentLoaded', function() {
    const productsContainer = document.getElementById('products-container');
    const loadMoreBtn = document.getElementById('load-more-btn');
    let currentPage = 1;
    const productsPerPage = 12;
    let allProducts = productsData; // json
    
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
                            <div class="card" style="width: 100%; height: 300px">
                                <img
                                    src="${product.image}"
                                    class="card-img-top"
                                    alt="${product.name}"
                                    style="height: 100%; object-fit: cover"
                                />
                            </div>
                            <div class="buy-text">Buy Now</div>
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
