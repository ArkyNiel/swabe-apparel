<div class="col-md-2 mb-4 product-item">
    <div class="card-container <?php echo $isLeft; ?>">
        <div class="card product-card" style="width: 100%; height: 300px; cursor:pointer;"
            data-name="<?php echo htmlspecialchars($product['product_name']); ?>"
            data-image="<?php echo htmlspecialchars($product['image_path']); ?>"
            data-color="<?php echo htmlspecialchars($product['color']); ?>"
            data-size="<?php echo htmlspecialchars($product['size']); ?>"
            data-price="Price not available">
            <img src="<?php echo htmlspecialchars($product['image_path']); ?>" 
                 class="card-img-top"
                 alt="<?php echo htmlspecialchars($product['product_name']); ?>" 
                 style="height: 100%; object-fit: cover" 
                 onerror="this.src='./../assets/img/placeholder.jpg'" />
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