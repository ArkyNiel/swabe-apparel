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
                    <div class="d-flex flex-wrap gap-3">
                        <a href="?page=inventory" class="btn btn-primary rounded-4 px-4 py-2 d-flex align-items-center gap-2 shadow-sm">
                            <i class="fas fa-plus"></i> Add New Product
                        </a>
                        <a href="?page=orders" class="btn btn-success rounded-4 px-4 py-2 d-flex align-items-center gap-2 shadow-sm">
                            <i class="fas fa-list"></i> View All Orders
                        </a>
                        <a href="?page=customers" class="btn btn-info rounded-4 px-4 py-2 d-flex align-items-center gap-2 shadow-sm">
                            <i class="fas fa-users"></i> Manage Customers
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
