<div class="container-fluid p-4 rounded-4" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
    <h2 class="mb-4 fw-bold text-dark" style="font-size: 2.5rem; text-shadow: 0 2px 4px rgba(0,0,0,0.1);">Dashboard Overview</h2>

    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card text-white rounded-4 shadow-lg border-0 gradient-primary">
                <div class="card-body rounded-4 d-flex flex-column align-items-start p-4">
                    <div class="mb-3">
                        <i class="fas fa-shopping-cart fa-3x opacity-90"></i>
                    </div>
                    <h5 class="card-title fw-semibold mb-2">Total Orders</h5>
                    <h2 class="card-text fw-bold mb-0" style="font-size: 3rem;">150</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white rounded-4 shadow-lg border-0 gradient-success">
                <div class="card-body rounded-4 d-flex flex-column align-items-start p-4">
                    <div class="mb-3">
                        <i class="fas fa-tshirt fa-3x opacity-90"></i>
                    </div>
                    <h5 class="card-title fw-semibold mb-2">Total Products</h5>
                    <h2 class="card-text fw-bold mb-0" style="font-size: 3rem;">45</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card text-white rounded-4 shadow-lg border-0 gradient-info">
                <div class="card-body rounded-4 d-flex flex-column align-items-start p-4">
                    <div class="mb-3">
                        <i class="fas fa-users fa-3x opacity-90"></i>
                    </div>
                    <h5 class="card-title fw-semibold mb-2">Total Customers</h5>
                    <h2 class="card-text fw-bold mb-0" style="font-size: 3rem;">89</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card rounded-4 shadow-lg border-0 mb-4 bg-white">
        <div class="card-header rounded-4 bg-light border-0 py-3">
            <h5 class="mb-0 fw-bold text-dark" style="font-size: 1.5rem;">Recent Orders</h5>
        </div>
        <div class="card-body rounded-4 p-0">
            <div class="table-responsive rounded-4" style="overflow: hidden;">
                <table class="table table-hover align-middle mb-0 table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th class="py-3 px-4">Order ID</th>
                            <th class="py-3 px-4">Customer</th>
                            <th class="py-3 px-4">Date</th>
                            <th class="py-3 px-4">Status</th>
                            <th class="py-3 px-4">Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-3 px-4">#1001</td>
                            <td class="py-3 px-4">Niel Arky</td>
                            <td class="py-3 px-4">Mar 15, 2024</td>
                            <td class="py-3 px-4"><span class="badge bg-success rounded-pill px-3 py-2 fw-semibold">Completed</span></td>
                            <td class="py-3 px-4 fw-bold">₱2,500.00</td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4">#1002</td>
                            <td class="py-3 px-4">Niel Arky</td>
                            <td class="py-3 px-4">Mar 14, 2024</td>
                            <td class="py-3 px-4"><span class="badge bg-danger rounded-pill px-3 py-2 fw-semibold">Refund</span></td>
                            <td class="py-3 px-4 fw-bold">₱1,800.00</td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4">#1003</td>
                            <td class="py-3 px-4">Niel Arky</td>
                            <td class="py-3 px-4">Mar 14, 2024</td>
                            <td class="py-3 px-4"><span class="badge bg-success rounded-pill px-3 py-2 fw-semibold">Completed</span></td>
                            <td class="py-3 px-4 fw-bold">₱3,200.00</td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4">#1004</td>
                            <td class="py-3 px-4">Niel Arky</td>
                            <td class="py-3 px-4">Mar 13, 2024</td>
                            <td class="py-3 px-4"><span class="badge bg-danger rounded-pill px-3 py-2 fw-semibold">Refund</span></td>
                            <td class="py-3 px-4 fw-bold">₱4,500.00</td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4">#1005</td>
                            <td class="py-3 px-4">Niel Arky</td>
                            <td class="py-3 px-4">Mar 13, 2024</td>
                            <td class="py-3 px-4"><span class="badge bg-success rounded-pill px-3 py-2 fw-semibold">Completed</span></td>
                            <td class="py-3 px-4 fw-bold">₱1,950.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card rounded-4 shadow-lg border-0 bg-white">
                <div class="card-header rounded-4 bg-light border-0 py-3">
                    <h5 class="mb-0 fw-bold text-dark" style="font-size: 1.5rem;">Quick Actions</h5>
                </div>
                <div class="card-body rounded-4 p-4">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <a href="?page=inventory" class="text-decoration-none">
                                <div class="card h-100 border-0 rounded-4 shadow-sm hover-card bg-light">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="icon-circle bg-primary bg-opacity-10 me-3">
                                                <i class="fas fa-plus text-primary"></i>
                                            </div>
                                            <h6 class="card-title mb-0 fw-semibold text-dark">Add New Product</h6>
                                        </div>
                                        <p class="card-text text-muted small mb-0">Add new items to your product catalog</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="?page=orders" class="text-decoration-none">
                                <div class="card h-100 border-0 rounded-4 shadow-sm hover-card bg-light">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="icon-circle bg-success bg-opacity-10 me-3">
                                                <i class="fas fa-list text-success"></i>
                                            </div>
                                            <h6 class="card-title mb-0 fw-semibold text-dark">View All Orders</h6>
                                        </div>
                                        <p class="card-text text-muted small mb-0">Manage and track all customer orders</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="?page=customers" class="text-decoration-none">
                                <div class="card h-100 border-0 rounded-4 shadow-sm hover-card bg-light">
                                    <div class="card-body p-4">
                                        <div class="d-flex align-items-center mb-3">
                                            <div class="icon-circle bg-info bg-opacity-10 me-3">
                                                <i class="fas fa-users text-info"></i>
                                            </div>
                                            <h6 class="card-title mb-0 fw-semibold text-dark">Manage Customers</h6>
                                        </div>
                                        <p class="card-text text-muted small mb-0">View and manage customer information</p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.gradient-primary {
    background: linear-gradient(135deg, #007bff 0%, #0056b3 100%);
}

.gradient-success {
    background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);
}

.gradient-info {
    background: linear-gradient(135deg, #17a2b8 0%, #117a8b 100%);
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
