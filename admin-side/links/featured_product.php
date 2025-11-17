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

<div class="container-fluid p-4 rounded-4" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); min-height: 100vh;">
    <h1 class="mb-4 fw-bold text-dark" style="font-size: 2.5rem; text-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <i class="fas fa-star me-3 text-warning"></i>Update Featured Products
    </h1>

    <!-- Upload Section -->
    <div class="card rounded-4 shadow-lg border-0 mb-4 bg-white">
        <div class="card-header rounded-4 bg-light border-0 py-3">
            <h4 class="card-title mb-0 fw-bold text-dark" style="font-size: 1.5rem;">
                <i class="fas fa-plus-circle me-2 text-success"></i>Add New Featured Product
            </h4>
        </div>
        <div class="card-body rounded-4 p-4">
            <form action="./../back-end/admin-side/add_featured.php" method="POST" enctype="multipart/form-data">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="featured_img" class="form-label fw-semibold">Product Image</label>
                        <input class="form-control rounded-pill" type="file" name="featured_img" accept="image/*" required>
                        <div class="form-text text-muted mt-2">
                            <i class="fas fa-info-circle me-1"></i>Supported formats: JPEG, JPG, PNG. Maximum size: 5MB
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="product_name" class="form-label fw-semibold">Product Name</label>
                        <input class="form-control rounded-pill" type="text" name="product_name" placeholder="Enter product name" required>
                    </div>
                    <div class="col-md-3">
                        <label for="product_price" class="form-label fw-semibold">Price</label>
                        <div class="input-group">
                            <span class="input-group-text rounded-pill rounded-end-0">₱</span>
                            <input class="form-control rounded-pill rounded-start-0" type="number" name="product_price" placeholder="0.00" step="0.01" required>
                        </div>
                    </div>
                </div>
                <div class="d-flex justify-content-end mt-4">
                    <button type="submit" class="btn btn-success rounded-pill px-4 py-2 fw-semibold">
                        <i class="fas fa-upload me-2"></i>Add Featured Product
                    </button>
                </div>
            </form>
        </div>
    </div>

    <!-- Current Featured Products Section -->
    <div class="card rounded-4 shadow-lg border-0 bg-white">
        <div class="card-header rounded-4 bg-light border-0 py-3">
            <h4 class="card-title mb-0 fw-bold text-dark" style="font-size: 1.5rem;">
                <i class="fas fa-th-large me-2 text-info"></i>Current Featured Products
                <span class="badge bg-warning rounded-pill ms-2" id="featured-count"><?php echo count($featured); ?></span>
            </h4>
        </div>
        <div class="card-body rounded-4 p-4">
            <div class="row g-4">
                <?php if (empty($featured)): ?>
                    <div class="col-12 text-center py-5">
                        <i class="fas fa-star-half-alt text-muted" style="font-size: 4rem; opacity: 0.3;"></i>
                        <h5 class="text-muted mt-3">No featured products yet</h5>
                        <p class="text-muted">Add your first featured product to showcase it on the homepage</p>
                    </div>
                <?php else: ?>
                    <?php foreach ($featured as $index => $product): ?>
                        <div class="col-lg-4 col-md-6 mb-4">
                            <div class="featured-card card rounded-4 shadow-lg border-0 h-100" style="cursor: pointer; transition: all 0.3s ease;">
                                <div class="position-relative overflow-hidden rounded-top-4">
                                    <img src="./../assets/img/<?php echo htmlspecialchars($product['image_path']); ?>"
                                         class="featured-img card-img-top rounded-top-4"
                                         alt="Featured Product"
                                         onerror="this.src='./../assets/img/temp1.jpg'"
                                         style="height: 200px; object-fit: cover; transition: transform 0.3s ease;">
                                    <div class="featured-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center opacity-0" style="background: rgba(0,0,0,0.7); transition: opacity 0.3s ease;">
                                        <a href="./../back-end/admin-side/delete_featured.php?id=<?php echo $product['id']; ?>&filename=<?php echo urlencode($product['image_path']); ?>"
                                           class="btn btn-danger rounded-pill px-3 py-2 fw-semibold delete-btn"
                                           onclick="return confirm('Are you sure you want to delete this featured product? This action cannot be undone.')">
                                            <i class="fas fa-trash me-1"></i>Delete Product
                                        </a>
                                    </div>
                                    <div class="featured-number position-absolute top-0 end-0 m-3">
                                        <span class="badge bg-warning rounded-pill px-2 py-1 fw-semibold"><?php echo $index + 1; ?></span>
                                    </div>
                                </div>
                                <div class="card-body rounded-bottom-4 p-3">
                                    <h6 class="card-title mb-2 fw-semibold text-dark"><?php echo htmlspecialchars($product['product_name']); ?></h6>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <span class="h5 mb-0 fw-bold text-success">₱<?php echo number_format($product['product_price'], 2); ?></span>
                                        <small class="text-muted">
                                            <i class="fas fa-calendar me-1"></i>Featured
                                        </small>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>

<style>
.featured-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
}

.featured-card:hover .featured-img {
    transform: scale(1.05);
}

.featured-overlay {
    transition: opacity 0.3s ease;
}

.featured-card:hover .featured-overlay {
    opacity: 1 !important;
}

.featured-number {
    z-index: 2;
}

.form-control:focus, .input-group-text:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    transition: all 0.3s ease;
}

.input-group-text {
    background-color: #f8f9fa;
    border-color: #dee2e6;
}
</style>
