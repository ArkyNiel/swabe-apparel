<?php
include __DIR__ . '/../../connection/connection.php';

$page = isset($_GET['page']) ? max(1, intval($_GET['page'])) : 1;
$limit = 12;
$offset = ($page - 1) * $limit;

$totalStmt = $conn->query("SELECT COUNT(*) FROM shop_banners");
$total_banners = $totalStmt->fetchColumn();
$total_pages = ceil($total_banners / $limit);

$stmt = $conn->prepare("SELECT * FROM shop_banners ORDER BY id DESC LIMIT :offset, :limit");
$stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
$stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
$stmt->execute();
$banners = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

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