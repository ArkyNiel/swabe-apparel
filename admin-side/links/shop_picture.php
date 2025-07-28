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

    <?php if (isset($msg) && $success): ?>
        <div id="successPopup" class="alert alert-success alert-dismissible animated-fade"
             role="alert"
             style="position: fixed; top: 30px; left: 50%; transform: translateX(-50%); z-index: 9999; min-width: 300px; max-width: 90vw;">
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

<style>

</style>
<script>
document.addEventListener('DOMContentLoaded', function() {
    var popup = document.getElementById('successPopup');
    if (popup) {
        setTimeout(function() {
            popup.classList.add('show');
        }, 10); // fade in

        setTimeout(function() {
            popup.classList.remove('show');
            setTimeout(function() {
                if (popup.parentNode) popup.parentNode.removeChild(popup);
            }, 300); // fade out
        }, 2500);
    }
});
</script>
