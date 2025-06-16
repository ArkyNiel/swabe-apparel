<div class="container-fluid p-4 rounded-4" style="background: #f8f9fa; height: 100vh; overflow-y: auto;">
    <h2 class="mb-4 fw-bold text-dark">Dashboard Overview</h2>
    
    <div class="row g-4 mb-4">
        <div class="col-md-4">
            <div class="card bg-primary text-white rounded-4 shadow-sm border-0">
                <div class="card-body rounded-4 d-flex flex-column align-items-start" style="padding: 40px;">
                    <div class="mb-2">
                        <i class="fas fa-shopping-cart fa-2x opacity-75"></i>
                    </div>
                    <h5 class="card-title fw-semibold">Total Orders</h5>
                    <h2 class="card-text fw-bold">150</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-success text-white rounded-4 shadow-sm border-0">
                <div class="card-body rounded-4 d-flex flex-column align-items-start" style="padding: 40px;">
                    <div class="mb-2">
                        <i class="fas fa-tshirt fa-2x opacity-75"></i>
                    </div>
                    <h5 class="card-title fw-semibold">Total Products</h5>
                    <h2 class="card-text fw-bold">45</h2>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-info text-white rounded-4 shadow-sm border-0">
                <div class="card-body rounded-4 d-flex flex-column align-items-start" style="padding: 40px;">
                    <div class="mb-2">
                        <i class="fas fa-users fa-2x opacity-75"></i>
                    </div>
                    <h5 class="card-title fw-semibold">Total Customers</h5>
                    <h2 class="card-text fw-bold">89</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="card rounded-4 shadow-sm border-0 mb-4">
        <div class="card-header rounded-4 bg-white border-0">
            <h5 class="mb-0 fw-bold text-dark">Recent Orders</h5>
        </div>
        <div class="card-body rounded-4">
            <div class="table-responsive rounded-4" style="overflow:hidden;">
                <table class="table table-hover align-middle rounded-4 mb-0">
                    <thead class="table-light">
                        <tr>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>#1001</td>
                            <td>Niel Arky</td>
                            <td>Mar 15, 2024</td>
                            <td><span class="badge bg-success rounded-pill px-3 py-2">Completed</span></td>
                            <td>₱2,500.00</td>
                        </tr>
                        <tr>
                            <td>#1002</td>
                            <td>Niel Arky</td>
                            <td>Mar 14, 2024</td>
                            <td><span class="badge bg-danger rounded-pill px-3 py-2">Refund</span></td>
                            <td>₱1,800.00</td>
                        </tr>
                        <tr>
                            <td>#1003</td>
                            <td>Niel Arky</td>
                            <td>Mar 14, 2024</td>
                            <td><span class="badge bg-success rounded-pill px-3 py-2">Completed</span></td>
                            <td>₱3,200.00</td>
                        </tr>
                        <tr>
                            <td>#1004</td>
                            <td>Niel Arky</td>
                            <td>Mar 13, 2024</td>
                            <td><span class="badge bg-danger rounded-pill px-3 py-2">Refund</span></td>
                            <td>₱4,500.00</td>
                        </tr>
                        <tr>
                            <td>#1005</td>
                            <td>Niel Arky</td>
                            <td>Mar 13, 2024</td>
                            <td><span class="badge bg-success rounded-pill px-3 py-2">Completed</span></td>
                            <td>₱1,950.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <div class="row mt-4">
        <div class="col-md-12">
            <div class="card rounded-4 shadow-sm border-0">
                <div class="card-header rounded-4 bg-white border-0">
                    <h5 class="mb-0 fw-bold text-dark">Quick Actions</h5>
                </div>
                <div class="card-body rounded-4">
                    <div class="row g-4">
                        <div class="col-md-4">
                            <a href="?page=inventory" class="text-decoration-none">
                                <div class="card h-100 border-0 rounded-4 shadow-sm hover-card">
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
                                <div class="card h-100 border-0 rounded-4 shadow-sm hover-card">
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
                                <div class="card h-100 border-0 rounded-4 shadow-sm hover-card">
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
.hover-card {
    transition: all 0.3s ease;
}

.hover-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 15px rgba(0,0,0,0.1) !important;
}

.icon-circle {
    width: 40px;
    height: 40px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
}

.icon-circle i {
    font-size: 1.2rem;
}
</style>
