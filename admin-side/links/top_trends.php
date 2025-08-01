<?php
// Simple trend loading
require_once __DIR__ . '/../../connection/connection.php';

try {
    $stmt = $conn->prepare("SELECT id, image_path, product_name, product_price FROM top_trends ORDER BY uploaded_at DESC");
    $stmt->execute();
    $trends = $stmt->fetchAll(PDO::FETCH_ASSOC);
} catch (Exception $e) {
    $trends = []; // error handling
}
?>

<link rel="stylesheet" href="./../assets/css/shop_picture.css">

<div class="container-fluid" style="height: calc(100vh - 60px); overflow-y: auto; margin-top: 30px; padding: 24px;">
    <h2 class="mb-4">Update Top Trends</h2>

    <!-- Upload Form -->
    <form action="./../back-end/admin-side/add_trends.php" method="POST" enctype="multipart/form-data">
        <div class="mb-3" style="max-width: 400px;">
            <label for="trend_img" class="form-label">Upload New Trend Image</label>
            <input class="form-control" type="file" name="trend_img" accept="image/*" required>
        </div>
        <div class="mb-3" style="max-width: 400px;">
            <label for="product_name" class="form-label">Product Name</label>
            <input class="form-control" type="text" name="product_name" required>
        </div>
        <div class="mb-3" style="max-width: 400px;">
            <label for="product_price" class="form-label">Price</label>
            <input class="form-control" type="number" name="product_price" placeholder="₱" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload Trend</button>
    </form>

    <!-- Trends Display -->
    <div class="mt-5">
        <h4>Current Trends</h4>
        <div class="row g-3">
            <?php if (empty($trends)): ?>
                <div class="col-12 text-center">
                    <p>No trends uploaded yet.</p>
                </div>
            <?php else: ?>
                <?php foreach ($trends as $trend): ?>
                    <div class="col-md-4 mb-3">
                        <div class="trend-card">
                            <img src="./../assets/img/<?php echo htmlspecialchars($trend['image_path']); ?>" 
                                 class="trend-img" 
                                 alt="Trend"
                                 onerror="this.src='./../assets/img/temp1.jpg'">
                            <div class="trend-info">
                                <h5><?php echo htmlspecialchars($trend['product_name']); ?></h5>
                                <p class="price">₱<?php echo htmlspecialchars($trend['product_price']); ?></p>
                            </div>
                            <a href="./../back-end/admin-side/delete_trend.php?id=<?php echo $trend['id']; ?>&filename=<?php echo urlencode($trend['image_path']); ?>" 
                               class="btn btn-sm btn-danger delete-btn"
                               onclick="return confirm('Delete this trend?')">
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
.trend-card {
    position: relative;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
    background: white;
}

.trend-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.trend-info {
    padding: 15px;
}

.trend-info h5 {
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

.trend-card:hover .delete-btn {
    opacity: 1;
}
</style>
