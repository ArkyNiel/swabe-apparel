<div class="container-fluid p-4 rounded-4" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); min-height: 100vh;">
    <h1 class="mb-4 fw-bold text-dark" style="font-size: 2.5rem; text-shadow: 0 2px 4px rgba(0,0,0,0.1);">
        <i class="fas fa-images me-3 text-primary"></i>Update Swabe Page Banner
    </h1>

    <!-- Upload Section -->
    <div class="card rounded-4 shadow-lg border-0 mb-4 bg-white">
        <div class="card-header rounded-4 bg-light border-0 py-3">
            <h4 class="card-title mb-0 fw-bold text-dark" style="font-size: 1.5rem;">
                <i class="fas fa-upload me-2 text-success"></i>Upload New Banner Image
            </h4>
        </div>
        <div class="card-body rounded-4 p-4">
            <form id="bannerForm" enctype="multipart/form-data">
                <div class="row g-3 align-items-end">
                    <div class="col-md-8">
                        <label for="banner_img" class="form-label fw-semibold">Select Banner Image</label>
                        <input class="form-control rounded-pill" type="file" id="banner_img" name="banner_img" accept="image/*" required>
                        <div class="form-text text-muted mt-2">
                            <i class="fas fa-info-circle me-1"></i>Supported formats: JPEG, JPG, PNG. Maximum size: 5MB
                        </div>
                    </div>
                    <div class="col-md-4">
                        <button type="submit" class="btn btn-success rounded-pill px-4 py-2 fw-semibold w-100">
                            <i class="fas fa-cloud-upload-alt me-2"></i>Upload Banner
                        </button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Alert and Success Message -->
    <div id="message" class="alert rounded-pill border-0 shadow-sm" style="display: none;"></div>

    <!-- Current Banners Section -->
    <div class="card rounded-4 shadow-lg border-0 bg-white">
        <div class="card-header rounded-4 bg-light border-0 py-3">
            <h4 class="card-title mb-0 fw-bold text-dark" style="font-size: 1.5rem;">
                <i class="fas fa-th-large me-2 text-info"></i>Current Banners
                <span class="badge bg-primary rounded-pill ms-2" id="banner-count">0</span>
            </h4>
        </div>
        <div class="card-body rounded-4 p-4">
            <div class="row g-4" id="banners-container">
                <!-- Banners will be loaded here -->
            </div>
        </div>
    </div>
</div>

<script>
// Global function for banner management
function deleteBanner(id, filename) {
    if (confirm('Are you sure you want to delete this banner? This action cannot be undone.')) {
        const deleteBtn = event.target;
        const originalText = deleteBtn.innerHTML;
        deleteBtn.innerHTML = '<i class="fas fa-spinner fa-spin me-1"></i>Deleting...';
        deleteBtn.disabled = true;

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
        })
        .finally(() => {
            deleteBtn.innerHTML = originalText;
            deleteBtn.disabled = false;
        });
    }
}

function showMessage(type, text) {
    const messageDiv = document.getElementById('message');
    messageDiv.className = `alert alert-${type} rounded-pill border-0 shadow-sm`;
    messageDiv.innerHTML = `<i class="fas fa-${type === 'success' ? 'check-circle' : 'exclamation-triangle'} me-2"></i>${text}`;
    messageDiv.style.display = 'block';

    setTimeout(() => {
        messageDiv.style.display = 'none';
    }, 5000);
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
    const countBadge = document.getElementById('banner-count');
    container.innerHTML = '';

    // Update banner count
    countBadge.textContent = banners.length;

    if (banners.length === 0) {
        container.innerHTML = `
            <div class="col-12 text-center py-5">
                <i class="fas fa-images text-muted" style="font-size: 4rem; opacity: 0.3;"></i>
                <h5 class="text-muted mt-3">No banners uploaded yet</h5>
                <p class="text-muted">Upload your first banner to get started</p>
            </div>
        `;
        return;
    }

    banners.forEach((banner, index) => {
        const bannerDiv = document.createElement('div');
        bannerDiv.className = 'col-lg-4 col-md-6 mb-4';
        bannerDiv.innerHTML = `
            <div class="banner-card card rounded-4 shadow-lg border-0 h-100" style="cursor: pointer; transition: all 0.3s ease;">
                <div class="position-relative overflow-hidden rounded-top-4">
                    <img src="./../assets/img/${banner.image_path}"
                         class="banner-img card-img-top rounded-top-4"
                         alt="Banner ${index + 1}"
                         onerror="this.src='./../assets/img/Rise.jpg'"
                         style="height: 200px; object-fit: cover; transition: transform 0.3s ease;">
                    <div class="banner-overlay position-absolute top-0 start-0 w-100 h-100 d-flex align-items-center justify-content-center opacity-0" style="background: rgba(0,0,0,0.7); transition: opacity 0.3s ease;">
                        <button class="btn btn-danger rounded-pill px-3 py-2 fw-semibold delete-btn"
                                onclick="deleteBanner(${banner.id}, '${banner.image_path}')">
                            <i class="fas fa-trash me-1"></i>Delete Banner
                        </button>
                    </div>
                    <div class="banner-number position-absolute top-0 end-0 m-3">
                        <span class="badge bg-primary rounded-pill px-2 py-1 fw-semibold">${index + 1}</span>
                    </div>
                </div>
                <div class="card-body rounded-bottom-4 p-3">
                    <h6 class="card-title mb-2 fw-semibold text-dark">Banner ${index + 1}</h6>
                    <small class="text-muted">
                        <i class="fas fa-calendar me-1"></i>Uploaded recently
                    </small>
                </div>
            </div>
        `;
        container.appendChild(bannerDiv);
    });
}

// Banner management
document.addEventListener('DOMContentLoaded', function() {
    loadBanners();

    // Form upload handler
    document.getElementById('bannerForm').addEventListener('submit', function(e) {
        e.preventDefault();
        uploadBanner();
    });

    function uploadBanner() {
        const formData = new FormData(document.getElementById('bannerForm'));
        const button = document.querySelector('button[type="submit"]');
        const originalText = button.innerHTML;

        button.innerHTML = '<i class="fas fa-spinner fa-spin me-2"></i>Uploading...';
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
            showMessage('danger', 'Upload failed. Please try again.');
        })
        .finally(() => {
            button.innerHTML = originalText;
            button.disabled = false;
        });
    }
});

</script>

<style>
.banner-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
}

.banner-card:hover .banner-img {
    transform: scale(1.05);
}

.banner-overlay {
    transition: opacity 0.3s ease;
}

.banner-card:hover .banner-overlay {
    opacity: 1 !important;
}

.banner-number {
    z-index: 2;
}

.form-control:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    transition: all 0.3s ease;
}

.alert {
    animation: slideIn 0.3s ease-out;
}

@keyframes slideIn {
    from {
        transform: translateY(-20px);
        opacity: 0;
    }
    to {
        transform: translateY(0);
        opacity: 1;
    }
}
</style>

