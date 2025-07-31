<?php
include __DIR__ . '/../../back-end/admin-side/add_shop_picture.php';
if (!isset($conn)) {
    include __DIR__ . '/../../connection/connection.php';
}

// --- PHP Banner Fetching Logic ---
// Pagination setup
$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$limit = 12; // banners per page
$offset = ($page - 1) * $limit;

// Fetch total banners count
$totalStmt = $conn->query("SELECT COUNT(*) FROM shop_banners");
$total_banners = $totalStmt->fetchColumn();
$total_pages = ceil($total_banners / $limit);

// Fetch banners for gallery
$stmt = $conn->prepare("SELECT * FROM shop_banners ORDER BY id DESC LIMIT :offset, :limit");
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->execute();
$banners = $stmt->fetchAll(PDO::FETCH_ASSOC);

// Fetch current banners (e.g., latest 5)
$currentStmt = $conn->query("SELECT * FROM shop_banners ORDER BY id DESC LIMIT 5");
$current_banners = $currentStmt->fetchAll(PDO::FETCH_ASSOC);
?>
<link rel="stylesheet" href="./../assets/css/shop_picture.css">

<div class="container-fluid"
     style="height: calc(100vh - 60px); overflow-y: auto; margin-top: 30px; padding-left: 24px; padding-right: 24px;">
    <h2 class="mb-4">Update Swabe Page Banner</h2>

    <form id="bannerForm" method="POST" enctype="multipart/form-data" action="../admin-side/links/shop_picture.php">
        <div class="mb-3" style="max-width: 400px;">
            <label for="banner_img" class="form-label">Upload New Banner Image</label>
            <input class="form-control" type="file" id="banner_img" name="banner_img" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload Banner</button>
    </form>

    <?php if (isset($msg) && $success): ?>
        <div id="successPopup" class="alert alert-success alert-dismissible animated-fade"
             role="alert"
             style="position: fixed; top: 30px; left: 50%; transform: translateX(-50%); z-index: 9999; min-width: 300px; max-width: 90vw;">
            <?php echo htmlspecialchars($msg); ?>
        </div>
    <?php endif; ?>

    <div class="mt-5">
        <h4>Current Banners</h4>
        <div class="row g-3" id="current-banners">
            <?php if (empty($current_banners)): ?>
                <div class="col-12"><p class="text-muted">No banners uploaded yet.</p></div>
            <?php else: ?>
                <?php foreach ($current_banners as $banner): ?>
                    <div class="banner-col">
                        <img src="<?php echo './../assets/img/' . ltrim($banner['image_path'], '/'); ?>"
                             class="img-fluid rounded landscape-img"
                             alt="Current Banner <?php echo $banner['id']; ?>">
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>

    <div class="mt-5">
        <h4>Banner Gallery</h4>
        <div class="row g-3" id="banner-gallery">
            <?php if (empty($banners)): ?>
                <div class="col-12"><p class="text-muted">No banners in the gallery yet.</p></div>
            <?php else: ?>
                <?php foreach ($banners as $banner): ?>
                    <div class="banner-col">
                        <img src="<?php echo './../assets/img/' . ltrim($banner['image_path'], '/'); ?>"
                             class="img-fluid rounded landscape-img"
                             alt="Banner <?php echo $banner['id']; ?>"
                             loading="lazy">
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
        <div class="mt-3 d-flex justify-content-center" id="banner-pagination">
            <?php if ($total_pages > 1): ?>
                <nav>
                    <ul class="pagination pagination-sm m-0">
                        <li class="page-item<?php if ($page <= 1) echo ' disabled'; ?>">
                            <a class="page-link" href="#" data-page="<?php echo $page - 1; ?>">Previous</a>
                        </li>
                        <?php for ($i = 1; $i <= $total_pages; $i++): ?>
                            <li class="page-item<?php if ($i == $page) echo ' active'; ?>">
                                <a class="page-link" href="#" data-page="<?php echo $i; ?>"><?php echo $i; ?></a>
                            </li>
                        <?php endfor; ?>
                        <li class="page-item<?php if ($page >= $total_pages) echo ' disabled'; ?>">
                            <a class="page-link" href="#" data-page="<?php echo $page + 1; ?>">Next</a>
                        </li>
                    </ul>
                </nav>
            <?php endif; ?>
        </div>
    </div>
</div>

<style>
.landscape-img {
    height: 160px;
    width: 100%;
    object-fit: cover;
    display: block;
}
</style>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Delegate click for pagination links
    document.getElementById('banner-pagination').addEventListener('click', function(e) {
        if (e.target.classList.contains('page-link')) {
            e.preventDefault();
            const page = e.target.getAttribute('data-page');
            if (page) {
                fetchGallery(page);
            }
        }
    });
});

function fetchGallery(page) {
    fetch('banner_gallery_partial.php?page=' + page)
        .then(res => res.text())
        .then(html => {
            // Replace the gallery and pagination
            const temp = document.createElement('div');
            temp.innerHTML = html;
            document.getElementById('banner-gallery').parentNode.innerHTML = temp.innerHTML;
        });
}
</script>
