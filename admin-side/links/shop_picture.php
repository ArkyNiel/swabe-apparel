<link rel="stylesheet" href="./../assets/css/shop_picture.css">

<div class="container-fluid" style="height: calc(100vh - 60px); overflow-y: auto; margin-top: 30px; padding: 24px;">
    <h2 class="mb-4">Update Swabe Page Banner</h2>

    <form id="bannerForm" enctype="multipart/form-data">
        <div class="mb-3" style="max-width: 400px;">
            <label for="banner_img" class="form-label">Upload New Banner Image</label>
            <input class="form-control" type="file" id="banner_img" name="banner_img" accept="image/*" required>
        </div>
        <button type="submit" class="btn btn-primary">Upload Banner</button>
    </form>

    <!-- alert and success message -->
    <div id="message" class="alert mt-3" style="display: none;"></div>

    <div class="mt-5">
        <h4>Current Banners</h4>
        <div class="row g-3" id="banners-container">
        </div>
    </div>
</div>

<script>
// global function * temporary
function deleteBanner(id, filename) {
    if (confirm('Delete this banner?')) {
        fetch('./../back-end/admin-side/delete_banner.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({id: id, filename: filename})
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Network response was not ok');
            }
            return response.json();
        })
        .then(data => {
            showMessage(data.success ? 'success' : 'danger', data.msg);
            if (data.success) {
                loadBanners();
            }
        })
        .catch(error => {
            showMessage('danger', 'Delete failed: ' + error.message);
        });
    }
}

function showMessage(type, text) {
    const messageDiv = document.getElementById('message');
    messageDiv.className = `alert alert-${type} mt-3`;
    messageDiv.textContent = text;
    messageDiv.style.display = 'block';
    
    setTimeout(() => {
        messageDiv.style.display = 'none';
    }, 3000);
}

function loadBanners() {
    fetch('./../back-end/admin-side/get_banners.php')
    .then(response => response.json())
    .then(data => {
        displayBanners(data.banners);
    })
    .catch(error => {
        showMessage('danger', 'Failed to load banners');
    });
}

function displayBanners(banners) {
    const container = document.getElementById('banners-container');
    container.innerHTML = '';
    
    if (banners.length === 0) {
        container.innerHTML = '<div class="col-12 text-center"><p>No banners uploaded yet.</p></div>';
        return;
    }
    
    banners.forEach(banner => {
        const bannerDiv = document.createElement('div');
        bannerDiv.className = 'col-md-4 mb-3';
        bannerDiv.innerHTML = `
            <div class="banner-card">
                <img src="./../assets/img/${banner.image_path}" 
                     class="banner-img" 
                     alt="Banner"
                     onerror="this.src='./../assets/img/Rise.jpg'">
                <button class="btn btn-sm btn-danger delete-btn" 
                        onclick="deleteBanner(${banner.id}, '${banner.image_path}')">
                    Delete
                </button>
            </div>
        `;
        container.appendChild(bannerDiv);
    });
}

// banner mgt
document.addEventListener('DOMContentLoaded', function() {
    
    loadBanners();
    
    // handler for form upload
    document.getElementById('bannerForm').addEventListener('submit', function(e) {
        e.preventDefault();
        uploadBanner();
    });
    
    function uploadBanner() {
        const formData = new FormData(document.getElementById('bannerForm'));
        const button = document.querySelector('button[type="submit"]');
        
        button.textContent = 'Uploading...';
        button.disabled = true;
        
        fetch('./../back-end/admin-side/add_shop_picture.php', {
            method: 'POST',
            body: formData
        })
        .then(response => response.json())
        .then(data => {
            showMessage(data.success ? 'success' : 'danger', data.msg);
            if (data.success) {
                document.getElementById('banner_img').value = '';
                loadBanners();
            }
        })
        .catch(error => {
            showMessage('danger', 'Upload failed');
        })
        .finally(() => {
            button.textContent = 'Upload Banner';
            button.disabled = false;
        });
    }
});
</script>

<style>
.banner-card {
    position: relative;
    border-radius: 8px;
    overflow: hidden;
    box-shadow: 0 2px 4px rgba(0,0,0,0.1);
}

.banner-img {
    width: 100%;
    height: 200px;
    object-fit: cover;
}

.delete-btn {
    position: absolute;
    top: 10px;
    right: 10px;
    opacity: 0;
    transition: opacity 0.3s;
}

.banner-card:hover .delete-btn {
    opacity: 1;
}
</style>

