<link rel="stylesheet" href="./../assets/css/settings.css">

<div class="container-fluid mt-3" style="height: calc(100vh - 60px); overflow-y: auto;">
    <h2 class="mb-4 sticky-top bg-white py-3" style="z-index: 1000; margin-left: 10px; margin-right: 10px;">System Settings</h2>
    
    <div class="row" style="padding-left: 10px; padding-right: 10px;">
        <div class="col-md-8">
            <div class="card">
                <div class="card-body">
                    <form>
                        <h4 class="mb-3">General Settings</h4>
                        <div class="mb-3">
                            <label for="site_name" class="form-label">Site Name</label>
                            <input type="text" class="form-control" id="site_name" name="site_name" value="Swabe Apparel">
                        </div>
                        
                        <div class="mb-3">
                            <label for="site_email" class="form-label">Contact Email</label>
                            <input type="email" class="form-control" id="site_email" name="site_email" placeholder="Enter contact email">
                        </div>

                        <h4 class="mb-3 mt-4">Store Settings</h4>
                        <div class="mb-3">
                            <label for="currency" class="form-label">Currency</label>
                            <select class="form-select" id="currency" name="currency">
                                <option value="PHP">PHP (₱)</option>
                                <option value="USD">USD ($)</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="tax_rate" class="form-label">Tax Rate (%)</label>
                            <input type="number" class="form-control" id="tax_rate" name="tax_rate" step="0.01" placeholder="Enter tax rate">
                        </div>

                        <h4 class="mb-3 mt-4">Shipping Settings</h4>
                        <div class="mb-3">
                            <label for="shipping_fee" class="form-label">Default Shipping Fee</label>
                            <input type="number" class="form-control" id="shipping_fee" name="shipping_fee" step="0.01" placeholder="Enter shipping fee">
                        </div>

                        <h4 class="mb-3 mt-4">Social Media Links</h4>
                        <div class="mb-3">
                            <label for="facebook" class="form-label">Facebook</label>
                            <input type="url" class="form-control" id="facebook" name="facebook" placeholder="Enter Facebook URL">
                        </div>

                        <div class="mb-3">
                            <label for="instagram" class="form-label">Instagram</label>
                            <input type="url" class="form-control" id="instagram" name="instagram" placeholder="Enter Instagram URL">
                        </div>

                        <div class="mb-3">
                            <label for="twitter" class="form-label">Twitter</label>
                            <input type="url" class="form-control" id="twitter" name="twitter" placeholder="Enter Twitter URL">
                        </div>

                        <button type="submit" class="btn btn-primary mt-3 mb-4">
                            <i class="fas fa-save"></i> Save Settings
                        </button>
                    </form>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card mb-4 sticky-top" style="top: 80px; z-index: 999;">
                <div class="card-header">
                    <h5 class="card-title mb-0">Quick Actions</h5>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary">
                            <i class="fas fa-database"></i> Backup Database
                        </button>
                        <button class="btn btn-outline-warning">
                            <i class="fas fa-cache"></i> Clear Cache
                        </button>
                        <button class="btn btn-outline-info">
                            <i class="fas fa-sync"></i> Check for Updates
                        </button>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">System Information</h5>
                </div>
                <div class="card-body">
                    <ul class="list-unstyled">
                        <li class="mb-2">
                            <strong>PHP Version:</strong> 8.1.0
                        </li>
                        <li class="mb-2">
                            <strong>Server Software:</strong> Apache/2.4.41
                        </li>
                        <li class="mb-2">
                            <strong>Database Version:</strong> MySQL 8.0
                        </li>
                    </ul>
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
    });
});
</script>
