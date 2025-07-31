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

    <div class="mt-5">
        <h4>Current Banners</h4>
        <div class="row g-3" id="current-banners">
            <div class="col-md-4 mb-3">
                <div class="banner-col">
                    <img src="./../assets/img/banner1.jpg" 
                         class="img-fluid rounded landscape-img"
                         alt="Current Banner 1">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="banner-col">
                    <img src="./../assets/img/banner1.jpg" 
                         class="img-fluid rounded landscape-img"
                         alt="Current Banner 2">
                </div>
            </div>
            <div class="col-md-4 mb-3">
                <div class="banner-col">
                    <img src="./../assets/img/banner1.jpg" 
                         class="img-fluid rounded landscape-img"
                         alt="Current Banner 3">
                </div>
            </div>
        </div>
    </div>
</div>

