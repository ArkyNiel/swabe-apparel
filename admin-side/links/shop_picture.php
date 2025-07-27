<?php
include __DIR__ . '/../../back-end/admin-side/add_shop_picture.php';
?>
<link rel="stylesheet" href="./../assets/css/shop_picture.css">

<div class="container-fluid"
     style="height: calc(100vh - 60px); overflow-y: auto; margin-top: 30px; padding-left: 24px; padding-right: 24px;">
    <h2 class="mb-4">Update Swabe Page Banner</h2>

    <form id="bannerForm" method="POST" enctype="multipart/form-data">
        <div class="mb-3" style="max-width: 400px;">
            <label for="banner_img" class="form-label">Upload New Banner Image</label>
            <input class="form-control" type="file" id="banner_img" name="banner_img" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload Banner</button>
    </form>

    <?php if (isset($msg)): ?>
        <div class="alert alert-<?php echo $success ? 'success' : 'danger'; ?> mt-3">
            <?php echo htmlspecialchars($msg); ?>
        </div>
    <?php endif; ?>

    <div class="mt-5">
        <h4>Current Banners</h4>
        <div class="row g-3">
            <div class="banner-col">
                <img src="./../assets/img/temp1.jpg" class="img-fluid rounded landscape-img" alt="Current Banner 1">
            </div>
            <div class="banner-col">
                <img src="./../assets/img/temp1.jpg" class="img-fluid rounded landscape-img" alt="Current Banner 2">
            </div>
            <div class="banner-col">
                <img src="./../assets/img/temp1.jpg" class="img-fluid rounded landscape-img" alt="Current Banner 3">
            </div>
            <div class="banner-col">
                <img src="./../assets/img/temp1.jpg" class="img-fluid rounded landscape-img" alt="Current Banner 4">
            </div>
            <div class="banner-col">
                <img src="./../assets/img/temp1.jpg" class="img-fluid rounded landscape-img" alt="Current Banner 5">
            </div>
        </div>
    </div>

    <div class="mt-5">
        <h4>Banner Gallery</h4>
        <div class="row g-3">
            <div class="banner-col">
                <img src="./../assets/img/temp1.jpg" class="img-fluid rounded landscape-img" alt="Banner 1">
            </div>
            <div class="banner-col">
                <img src="./../assets/img/temp1.jpg" class="img-fluid rounded landscape-img" alt="Banner 2">
            </div>
            <div class="banner-col">
                <img src="./../assets/img/temp1.jpg" class="img-fluid rounded landscape-img" alt="Banner 3">
            </div>
            <div class="banner-col">
                <img src="./../assets/img/temp1.jpg" class="img-fluid rounded landscape-img" alt="Banner 4">
            </div>
            <div class="banner-col">
                <img src="./../assets/img/temp1.jpg" class="img-fluid rounded landscape-img" alt="Banner 5">
            </div>
            <div class="banner-col">
                <img src="./../assets/img/temp1.jpg" class="img-fluid rounded landscape-img" alt="Banner 6">
            </div>
            <div class="banner-col">
                <img src="./../assets/img/temp1.jpg" class="img-fluid rounded landscape-img" alt="Banner 7">
            </div>
        </div>
    </div>
</div>
