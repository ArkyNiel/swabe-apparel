<div class="container-fluid p-4 rounded-4" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
    <h1 class="mb-4 fw-bold text-dark" style="font-size: 2.5rem; text-shadow: 0 2px 4px rgba(0,0,0,0.1);">Product Summary</h1>

    <!-- Summary Cards -->
    <div class="row g-4 mb-4">
        <div class="col-lg-3 col-6">
            <div class="card text-white rounded-4 shadow-lg border-0 gradient-info">
                <div class="card-body rounded-4 d-flex flex-column align-items-start p-4">
                    <div class="mb-3">
                        <i class="fas fa-box fa-3x opacity-90"></i>
                    </div>
                    <h3 class="card-title fw-semibold mb-2">150</h3>
                    <p class="card-text mb-0">Total Products</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="card text-white rounded-4 shadow-lg border-0 gradient-success">
                <div class="card-body rounded-4 d-flex flex-column align-items-start p-4">
                    <div class="mb-3">
                        <i class="fas fa-peso-sign fa-3x opacity-90"></i>
                    </div>
                    <h3 class="card-title fw-semibold mb-2">₱250,000</h3>
                    <p class="card-text mb-0">Total Inventory Value</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="card text-white rounded-4 shadow-lg border-0 gradient-warning">
                <div class="card-body rounded-4 d-flex flex-column align-items-start p-4">
                    <div class="mb-3">
                        <i class="fas fa-exclamation-triangle fa-3x opacity-90"></i>
                    </div>
                    <h3 class="card-title fw-semibold mb-2">5</h3>
                    <p class="card-text mb-0">Low Stock Items</p>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="card text-white rounded-4 shadow-lg border-0 gradient-danger">
                <div class="card-body rounded-4 d-flex flex-column align-items-start p-4">
                    <div class="mb-3">
                        <i class="fas fa-times-circle fa-3x opacity-90"></i>
                    </div>
                    <h3 class="card-title fw-semibold mb-2">2</h3>
                    <p class="card-text mb-0">Out of Stock</p>
                </div>
            </div>
        </div>
    </div>

    <!-- Category-wise Statistics -->
    <div class="card rounded-4 shadow-lg border-0 mb-4 bg-white">
        <div class="card-header rounded-4 bg-light border-0 py-3">
            <h3 class="card-title mb-0 fw-bold text-dark" style="font-size: 1.5rem;">Category-wise Inventory Summary</h3>
        </div>
        <div class="card-body rounded-4 p-0">
            <div class="table-responsive rounded-4" style="overflow: hidden;">
                <table class="table table-hover align-middle mb-0 table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th class="py-3 px-4">Category</th>
                            <th class="py-3 px-4">Number of Products</th>
                            <th class="py-3 px-4">Total Quantity</th>
                            <th class="py-3 px-4">Total Value (₱)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-3 px-4">Shoes</td>
                            <td class="py-3 px-4">45</td>
                            <td class="py-3 px-4">120</td>
                            <td class="py-3 px-4 fw-bold">₱120,000</td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4">Shirts</td>
                            <td class="py-3 px-4">75</td>
                            <td class="py-3 px-4">250</td>
                            <td class="py-3 px-4 fw-bold">₱75,000</td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4">Collections</td>
                            <td class="py-3 px-4">30</td>
                            <td class="py-3 px-4">80</td>
                            <td class="py-3 px-4 fw-bold">₱55,000</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Low Stock Alert -->
    <div class="card rounded-4 shadow-lg border-0 mb-4 bg-white">
        <div class="card-header rounded-4 bg-light border-0 py-3">
            <h3 class="card-title mb-0 fw-bold text-dark" style="font-size: 1.5rem;">Low Stock Alert</h3>
        </div>
        <div class="card-body rounded-4 p-0">
            <div class="table-responsive rounded-4" style="overflow: hidden;">
                <table class="table table-hover align-middle mb-0 table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th class="py-3 px-4">Product Name</th>
                            <th class="py-3 px-4">Category</th>
                            <th class="py-3 px-4">Remaining Quantity</th>
                            <th class="py-3 px-4">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-3 px-4">Head and Shoulder</td>
                            <td class="py-3 px-4">Shoes</td>
                            <td class="py-3 px-4">3</td>
                            <td class="py-3 px-4"><span class="badge bg-danger rounded-pill px-3 py-2 fw-semibold">Critical</span></td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4">Head and Shoulder</td>
                            <td class="py-3 px-4">Shirts</td>
                            <td class="py-3 px-4">7</td>
                            <td class="py-3 px-4"><span class="badge bg-warning rounded-pill px-3 py-2 fw-semibold">Low</span></td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4">Head and Shoulder</td>
                            <td class="py-3 px-4">Collections</td>
                            <td class="py-3 px-4">4</td>
                            <td class="py-3 px-4"><span class="badge bg-danger rounded-pill px-3 py-2 fw-semibold">Critical</span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Top Selling Products -->
    <div class="card rounded-4 shadow-lg border-0 mb-4 bg-white">
        <div class="card-header rounded-4 bg-light border-0 py-3">
            <h3 class="card-title mb-0 fw-bold text-dark" style="font-size: 1.5rem;">Top Selling Products</h3>
        </div>
        <div class="card-body rounded-4 p-4">
            <div class="row g-4">
                <div class="col-md-4">
                    <div class="card h-100 border-0 rounded-4 shadow-sm hover-card bg-light">
                        <div class="card-body p-4 d-flex align-items-center">
                            <div class="icon-circle bg-primary bg-opacity-10 me-4">
                                <i class="fas fa-shoe-prints text-primary fa-2x"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1 fw-semibold text-dark">Head and Shoulder</h5>
                                <p class="card-text text-muted small mb-1">Shoes Category</p>
                                <h4 class="mb-1 fw-bold">₱5,999</h4>
                                <p class="text-success mb-0 fw-semibold">Sold: 45 units</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 rounded-4 shadow-sm hover-card bg-light">
                        <div class="card-body p-4 d-flex align-items-center">
                            <div class="icon-circle bg-info bg-opacity-10 me-4">
                                <i class="fas fa-tshirt text-info fa-2x"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1 fw-semibold text-dark">Head and Shoulder</h5>
                                <p class="card-text text-muted small mb-1">Shirts Category</p>
                                <h4 class="mb-1 fw-bold">₱999</h4>
                                <p class="text-success mb-0 fw-semibold">Sold: 78 units</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card h-100 border-0 rounded-4 shadow-sm hover-card bg-light">
                        <div class="card-body p-4 d-flex align-items-center">
                            <div class="icon-circle bg-warning bg-opacity-10 me-4">
                                <i class="fas fa-box-open text-warning fa-2x"></i>
                            </div>
                            <div>
                                <h5 class="card-title mb-1 fw-semibold text-dark">Head and Shoulder</h5>
                                <p class="card-text text-muted small mb-1">Collections Category</p>
                                <h4 class="mb-1 fw-bold">₱2,499</h4>
                                <p class="text-success mb-0 fw-semibold">Sold: 32 units</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.gradient-info {
    background: linear-gradient(135deg, #17a2b8 0%, #117a8b 100%);
}

.gradient-success {
    background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);
}

.gradient-warning {
    background: linear-gradient(135deg, #ffc107 0%, #e0a800 100%);
}

.gradient-danger {
    background: linear-gradient(135deg, #dc3545 0%, #c82333 100%);
}

.hover-card {
    transition: all 0.4s ease;
    border: 1px solid rgba(0,0,0,0.05);
}

.hover-card:hover {
    transform: translateY(-8px) scale(1.02);
    box-shadow: 0 12px 25px rgba(0,0,0,0.15) !important;
    border-color: rgba(0,123,255,0.3);
}

.icon-circle {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.icon-circle:hover {
    transform: scale(1.1);
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(0,0,0,0.02);
}

.table-hover tbody tr:hover {
    background-color: rgba(0,123,255,0.05);
}

.badge {
    font-size: 0.85rem;
}
</style>
