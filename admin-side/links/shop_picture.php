<?php
include __DIR__ . '/../../back-end/admin-side/add_shop_picture.php';
if (!isset($conn)) {
    include __DIR__ . '/../../connection/connection.php';
}
?>
<link rel="stylesheet" href="./../assets/css/shop_picture.css">

<div class="container-fluid"
     style="height: calc(100vh - 60px); overflow-y: auto; margin-top: 30px; padding-left: 24px; padding-right: 24px;">
    <h2 class="mb-4">Update Swabe Page Banner</h2>

    <form id="bannerForm" method="POST" enctype="multipart/form-data" action="shop_picture.php">
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
        </div>
    </div>

    <div class="mt-5">
        <h4>Banner Gallery</h4>
        <div class="row g-3" id="banner-gallery">
        </div>
        <div class="mt-3 d-flex justify-content-center" id="banner-pagination">
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

function renderBanners(banners) {
    const gallery = document.getElementById('banner-gallery');
    gallery.innerHTML = '';
    if (!banners.length) {
        gallery.innerHTML = '<div class="col-12"><p class="text-muted">No banners in the gallery yet.</p></div>';
        return;
    }
    banners.forEach(banner => {
        gallery.innerHTML += `
            <div class="banner-col">
                <img src="./../assets/img/${banner.image_path}" 
                     class="img-fluid rounded landscape-img"
                     alt="Banner ${banner.id}"
                     loading="lazy">
            </div>
        `;
    });
}

function renderPagination(current, total) {
    const pag = document.getElementById('banner-pagination');
    if (total <= 1) {
        pag.innerHTML = '';
        return;
    }
    let html = `<nav><ul class="pagination pagination-sm m-0">`;
    html += `<li class="page-item${current <= 1 ? ' disabled' : ''}">
                <a class="page-link" href="#" data-page="${current - 1}">Previous</a>
            </li>`;
    for (let i = 1; i <= total; i++) {
        html += `<li class="page-item${i === current ? ' active' : ''}">
                    <a class="page-link" href="#" data-page="${i}">${i}</a>
                 </li>`;
    }
    html += `<li class="page-item${current >= total ? ' disabled' : ''}">
                <a class="page-link" href="#" data-page="${current + 1}">Next</a>
            </li>`;
    html += `</ul></nav>`;
    pag.innerHTML = html;

    pag.querySelectorAll('a.page-link').forEach(link => {
        link.addEventListener('click', function(e) {
            e.preventDefault();
            const page = parseInt(this.getAttribute('data-page'));
            if (!isNaN(page) && page >= 1 && page <= total) {
                loadBanners(page);
            }
        });
    });
}

function loadBanners(page = 1) {
    fetch('./../back-end/admin-side/get_banners.php?page=' + page)
        .then(res => res.json())
        .then(data => {
            renderBanners(data.banners);
            renderPagination(data.page, data.total_pages);
        });
}

function loadCurrentBanners() {
    fetch('./../back-end/admin-side/get_banners.php?page=1&limit=5')
        .then(res => res.json())
        .then(data => {
            renderCurrentBanners(data.banners);
        });
}

function renderCurrentBanners(banners) {
    const current = document.getElementById('current-banners');
    current.innerHTML = '';
    if (!banners.length) {
        current.innerHTML = '<div class="col-12"><p class="text-muted">No banners uploaded yet.</p></div>';
        return;
    }
    banners.forEach(banner => {
        current.innerHTML += `
            <div class="banner-col">
                <img src="${getBannerImgPath(banner.image_path)}" 
                     class="img-fluid rounded landscape-img"
                     alt="Current Banner ${banner.id}">
            </div>
        `;
    });
}

function getBannerImgPath(imagePath) {
    imagePath = imagePath.replace(/^\/+/, '');
    return './../assets/img/' + imagePath;
}

document.addEventListener('DOMContentLoaded', function() {
    loadCurrentBanners();
    loadBanners();
});
</script>
