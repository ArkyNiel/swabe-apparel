<div class="container-fluid p-4 rounded-4" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); min-height: 100vh;">
    <h1 class="mb-4 fw-bold text-dark" style="font-size: 2.5rem; text-shadow: 0 2px 4px rgba(0,0,0,0.1);">System Settings</h1>

    <div class="row g-4">
        <div class="col-md-8">
            <div class="card rounded-4 shadow-lg border-0 bg-white">
                <div class="card-header rounded-4 bg-light border-0 py-3">
                    <h4 class="card-title mb-0 fw-bold text-dark" style="font-size: 1.5rem;"><i class="fas fa-cog me-2 text-primary"></i>Configuration Settings</h4>
                </div>
                <div class="card-body rounded-4 p-4">
                    <form>
                        <h5 class="mb-4 fw-bold text-primary border-bottom pb-2"><i class="fas fa-globe me-2"></i>General Settings</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="site_name" class="form-label fw-semibold">Site Name</label>
                                <input type="text" class="form-control rounded-pill" id="site_name" name="site_name" value="Swabe Apparel">
                            </div>
                            <div class="col-md-6">
                                <label for="site_email" class="form-label fw-semibold">Contact Email</label>
                                <input type="email" class="form-control rounded-pill" id="site_email" name="site_email" placeholder="Enter contact email">
                            </div>
                        </div>

                        <h5 class="mb-4 fw-bold text-success border-bottom pb-2"><i class="fas fa-store me-2"></i>Store Settings</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="currency" class="form-label fw-semibold">Currency</label>
                                <select class="form-select rounded-pill" id="currency" name="currency">
                                    <option value="PHP">PHP (₱)</option>
                                    <option value="USD">USD ($)</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label for="tax_rate" class="form-label fw-semibold">Tax Rate (%)</label>
                                <input type="number" class="form-control rounded-pill" id="tax_rate" name="tax_rate" step="0.01" placeholder="Enter tax rate">
                            </div>
                        </div>

                        <h5 class="mb-4 fw-bold text-info border-bottom pb-2"><i class="fas fa-truck me-2"></i>Shipping Settings</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-6">
                                <label for="shipping_fee" class="form-label fw-semibold">Default Shipping Fee</label>
                                <input type="number" class="form-control rounded-pill" id="shipping_fee" name="shipping_fee" step="0.01" placeholder="Enter shipping fee">
                            </div>
                        </div>

                        <h5 class="mb-4 fw-bold text-warning border-bottom pb-2"><i class="fas fa-share-alt me-2"></i>Social Media Links</h5>
                        <div class="row g-3 mb-4">
                            <div class="col-md-4">
                                <label for="facebook" class="form-label fw-semibold"><i class="fab fa-facebook text-primary me-1"></i>Facebook</label>
                                <input type="url" class="form-control rounded-pill" id="facebook" name="facebook" placeholder="Enter Facebook URL">
                            </div>
                            <div class="col-md-4">
                                <label for="instagram" class="form-label fw-semibold"><i class="fab fa-instagram text-danger me-1"></i>Instagram</label>
                                <input type="url" class="form-control rounded-pill" id="instagram" name="instagram" placeholder="Enter Instagram URL">
                            </div>
                            <div class="col-md-4">
                                <label for="twitter" class="form-label fw-semibold"><i class="fab fa-twitter text-info me-1"></i>Twitter</label>
                                <input type="url" class="form-control rounded-pill" id="twitter" name="twitter" placeholder="Enter Twitter URL">
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-success rounded-pill px-4 py-2 fw-semibold">
                                <i class="fas fa-save me-2"></i>Save Settings
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card rounded-4 shadow-lg border-0 mb-4 bg-white sticky-top" style="top: 20px;">
                <div class="card-header rounded-4 gradient-primary text-white border-0 py-3">
                    <h5 class="card-title mb-0 fw-bold"><i class="fas fa-bolt me-2"></i>Quick Actions</h5>
                </div>
                <div class="card-body rounded-4 p-4">
                    <div class="d-grid gap-3">
                        <button class="btn btn-primary rounded-pill py-2 fw-semibold" id="backup-db-btn">
                            <i class="fas fa-database me-2"></i>Backup Database
                        </button>
                        <button class="btn btn-warning rounded-pill py-2 fw-semibold">
                            <i class="fas fa-cache me-2"></i>Clear Cache
                        </button>
                        <button class="btn btn-info rounded-pill py-2 fw-semibold">
                            <i class="fas fa-sync me-2"></i>Check for Updates
                        </button>
                    </div>
                </div>
            </div>

            <div class="card rounded-4 shadow-lg border-0 bg-white">
                <div class="card-header rounded-4 gradient-secondary text-white border-0 py-3">
                    <h5 class="card-title mb-0 fw-bold"><i class="fas fa-server me-2"></i>System Information</h5>
                </div>
                <div class="card-body rounded-4 p-4">
                    <div class="list-group list-group-flush">
                        <div class="list-group-item border-0 px-0 py-3 d-flex justify-content-between align-items-center">
                            <span class="fw-semibold text-muted">PHP Version:</span>
                            <span class="badge bg-success rounded-pill px-3 py-2">8.1.0</span>
                        </div>
                        <div class="list-group-item border-0 px-0 py-3 d-flex justify-content-between align-items-center">
                            <span class="fw-semibold text-muted">Server Software:</span>
                            <span class="badge bg-info rounded-pill px-3 py-2">Apache/2.4.41</span>
                        </div>
                        <div class="list-group-item border-0 px-0 py-3 d-flex justify-content-between align-items-center">
                            <span class="fw-semibold text-muted">Database Version:</span>
                            <span class="badge bg-warning rounded-pill px-3 py-2">MySQL 8.0</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Form validation
    const form = document.querySelector('form');
    form.addEventListener('submit', function(e) {
        // Add form validation logic here
    });

    // Backup Database button
    document.getElementById('backup-db-btn').addEventListener('click', function(e) {
        e.preventDefault();
        window.location.href = './../back-end/admin-side/backup_db.php';
    });
});
</script>

<style>
.gradient-primary {
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
}

.gradient-secondary {
    background: linear-gradient(135deg, #6c757d 0%, #495057 100%);
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
    transition: all 0.3s ease;
}

.form-control:focus, .form-select:focus {
    border-color: #007bff;
    box-shadow: 0 0 0 0.2rem rgba(0, 123, 255, 0.25);
}

.btn:hover {
    transform: translateY(-2px);
    box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    transition: all 0.3s ease;
}

.list-group-item {
    background: transparent !important;
}

.border-bottom {
    border-color: rgba(0,0,0,0.1) !important;
}
</style>
