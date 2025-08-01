<?php
// Simple featured product loading
require_once __DIR__ . '/../../connection/connection.php';

try {
    $stmt = $conn->prepare("SELECT id, image_path, product_name, product_price FROM featured_products ORDER BY uploaded_at DESC");
    $stmt->execute();
    $featured = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $featured = []; // error handling
}
?>

<link rel="stylesheet" href="./../assets/css/shop_picture.css">

<div class="container-fluid" style="height: calc(100vh - 60px); overflow-y: auto; margin-top: 30px; padding: 24px;">
    <h2 class="mb-4">Update Featured Products</h2>

    <!-- Upload Form -->
    <form action="./../back-end/admin-side/add_featured.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3" style="max-width: 400px;">
            <label for="featured_img" class="form-label">Upload New Featured Product Image</label>
            <input class="form-control" type="file" name="featured_img" accept="image/*" required>
        </div>
        <div class="mb-3" style="max-width: 400px;">
            <label for="product_name" class="form-label">Product Name</label>
            <input class="form-control" type="text" name="product_name" required>
        </div>
        <div class="mb-3" style="max-width: 400px;">
            <label for="product_price" class="form-label">Price</label>
            <input class="form-control" type="number" name="product_price" placeholder="₱" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload Featured Product</button>
    </form>

    <!-- Featured Products Display -->
    <div class="mt-5">
        <h4>Current Featured Products</h4>
        <div class="row g-3">
            <?php if (empty($featured)): ?>
                <div class="col-12 text-center">
                    <p>No featured products uploaded yet.</p>
                </div>
            <?php else: ?>
                <?php foreach ($featured as $product): ?>
                    <div class="col-md-4 mb-3">
                        <div class="featured-card">
                            <img src="./../assets/img/<?php echo htmlspecialchars($product['image_path']); ?>" 
                                 class="featured-img" 
                                 alt="Featured Product"
                                 onerror="this.src='./../assets/img/temp1.jpg'">
                            <div class="featured-info">
                                <h5><?php echo htmlspecialchars($product['product_name']); ?></h5>
                                <p class="price">₱<?php echo htmlspecialchars($product['product_price']); ?></p>
                            </div>
                            <a href="./../back-end/admin-side/delete_featured.php?id=<?php echo $product['id']; ?>&filename=<?php echo urlencode($product['image_path']); ?>" 
                               class="btn btn-sm btn-danger delete-btn"
                               onclick="return confirm('Delete this featured product?')">
                                Delete
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
.featured-card {
    position: relative;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    background: white;
}

.featured-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.featured-info {
    padding: 15px;
}

.featured-info h5 {
    margin: 0 0 5px 0;
    font-size: 16px;
    color: #333;
}

.price {
    margin: 0;
    font-size: 18px;
    color: #ffc107;
    font-weight: 700;
}

.delete-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    opacity: 0;
    transition: opacity 0.3s;
}

.featured-card:hover .delete-btn {
    opacity: 1;
}
</style>
