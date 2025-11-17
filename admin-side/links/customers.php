<div class="container-fluid p-4 rounded-4" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); min-height: 100vh;">
    <h1 class="mb-4 fw-bold text-dark" style="font-size: 2.5rem; text-shadow: 0 2px 4px rgba(0,0,0,0.1);">Customers Management</h1>

    <!-- Customer Stats Cards -->
    <div class="row g-4 mb-4">
        <div class="col-lg-3 col-6">
            <div class="card rounded-4 shadow-lg border-0 gradient-info text-white h-100" style="cursor: pointer; transition: all 0.3s ease;">
                <div class="card-body rounded-4 p-4 text-center">
                    <div class="d-flex flex-column align-items-center justify-content-center h-100">
                        <h2 class="mb-2 fw-bold" style="font-size: 2.5rem;">1,250</h2>
                        <p class="mb-0 opacity-75 fw-semibold">Total Customers</p>
                        <i class="fas fa-users mt-3 opacity-50" style="font-size: 2rem;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="card rounded-4 shadow-lg border-0 gradient-success text-white h-100" style="cursor: pointer; transition: all 0.3s ease;">
                <div class="card-body rounded-4 p-4 text-center">
                    <div class="d-flex flex-column align-items-center justify-content-center h-100">
                        <h2 class="mb-2 fw-bold" style="font-size: 2.5rem;">150</h2>
                        <p class="mb-0 opacity-75 fw-semibold">New This Month</p>
                        <i class="fas fa-user-plus mt-3 opacity-50" style="font-size: 2rem;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="card rounded-4 shadow-lg border-0 gradient-warning text-white h-100" style="cursor: pointer; transition: all 0.3s ease;">
                <div class="card-body rounded-4 p-4 text-center">
                    <div class="d-flex flex-column align-items-center justify-content-center h-100">
                        <h2 class="mb-2 fw-bold" style="font-size: 2.5rem;">₱45,000</h2>
                        <p class="mb-0 opacity-75 fw-semibold">Average Order Value</p>
                        <i class="fas fa-dollar-sign mt-3 opacity-50" style="font-size: 2rem;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="card rounded-4 shadow-lg border-0 gradient-danger text-white h-100" style="cursor: pointer; transition: all 0.3s ease;">
                <div class="card-body rounded-4 p-4 text-center">
                    <div class="d-flex flex-column align-items-center justify-content-center h-100">
                        <h2 class="mb-2 fw-bold" style="font-size: 2.5rem;">85%</h2>
                        <p class="mb-0 opacity-75 fw-semibold">Customer Retention</p>
                        <i class="fas fa-chart-line mt-3 opacity-50" style="font-size: 2rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Customers Table Card -->
    <div class="card rounded-4 shadow-lg border-0 bg-white">
        <div class="card-header rounded-4 bg-light border-0 py-3 d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0 fw-bold text-dark" style="font-size: 1.5rem;">Customer List</h3>
            <div class="search-container">
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-search text-muted"></i>
                    </span>
                    <input type="text" name="table_search" class="form-control border-start-0 ps-0" placeholder="Search customers...">
                </div>
            </div>
        </div>
        <div class="card-body rounded-4 p-0">
            <div class="table-responsive rounded-4" style="overflow: hidden;">
                <table class="table table-hover align-middle mb-0 table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th class="py-3 px-4">Customer ID</th>
                            <th class="py-3 px-4">Name</th>
                            <th class="py-3 px-4">Email</th>
                            <th class="py-3 px-4">Phone</th>
                            <th class="py-3 px-4">Total Orders</th>
                            <th class="py-3 px-4">Total Spent</th>
                            <th class="py-3 px-4">Status</th>
                            <th class="py-3 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-3 px-4 fw-semibold">#CUST-2054-001</td>
                            <td class="py-3 px-4 fw-semibold">Niel Arky</td>
                            <td class="py-3 px-4">sample.gmail@arayko</td>
                            <td class="py-3 px-4">+63 912 345 6789</td>
                            <td class="py-3 px-4">15</td>
                            <td class="py-3 px-4 fw-bold">₱45,000</td>
                            <td class="py-3 px-4"><span class="badge bg-success rounded-pill px-3 py-2 fw-semibold">Active</span></td>
                            <td class="py-3 px-4">
                                <button class="btn btn-info btn-sm rounded-pill me-1" title="View Details"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-primary btn-sm rounded-pill me-1" title="Edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm rounded-pill" title="Delete"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4 fw-semibold">#CUST-2025-002</td>
                            <td class="py-3 px-4 fw-semibold">Niel Arky</td>
                            <td class="py-3 px-4">sample.gmail@arayko</td>
                            <td class="py-3 px-4">+63 923 456 7890</td>
                            <td class="py-3 px-4">8</td>
                            <td class="py-3 px-4 fw-bold">₱28,500</td>
                            <td class="py-3 px-4"><span class="badge bg-success rounded-pill px-3 py-2 fw-semibold">Active</span></td>
                            <td class="py-3 px-4">
                                <button class="btn btn-info btn-sm rounded-pill me-1" title="View Details"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-primary btn-sm rounded-pill me-1" title="Edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm rounded-pill" title="Delete"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4 fw-semibold">#CUST-2025-003</td>
                            <td class="py-3 px-4 fw-semibold">Niel Arky</td>
                            <td class="py-3 px-4">sample.gmail@arayko</td>
                            <td class="py-3 px-4">+63 934 567 8901</td>
                            <td class="py-3 px-4">3</td>
                            <td class="py-3 px-4 fw-bold">₱12,000</td>
                            <td class="py-3 px-4"><span class="badge bg-warning rounded-pill px-3 py-2 fw-semibold">Inactive</span></td>
                            <td class="py-3 px-4">
                                <button class="btn btn-info btn-sm rounded-pill me-1" title="View Details"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-primary btn-sm rounded-pill me-1" title="Edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm rounded-pill" title="Delete"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4 fw-semibold">#CUST-2025-004</td>
                            <td class="py-3 px-4 fw-semibold">Niel Arky</td>
                            <td class="py-3 px-4">sample.gmail@arayko</td>
                            <td class="py-3 px-4">+63 945 678 9012</td>
                            <td class="py-3 px-4">20</td>
                            <td class="py-3 px-4 fw-bold">₱75,000</td>
                            <td class="py-3 px-4"><span class="badge bg-success rounded-pill px-3 py-2 fw-semibold">Active</span></td>
                            <td class="py-3 px-4">
                                <button class="btn btn-info btn-sm rounded-pill me-1" title="View Details"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-primary btn-sm rounded-pill me-1" title="Edit"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm rounded-pill" title="Delete"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer rounded-4 bg-light border-0 p-3">
            <nav aria-label="Customers pagination">
                <ul class="pagination pagination-sm justify-content-center m-0">
                    <li class="page-item"><a class="page-link text-dark rounded-pill" href="#">«</a></li>
                    <li class="page-item active"><a class="page-link bg-dark border-dark rounded-pill" href="#">1</a></li>
                    <li class="page-item"><a class="page-link text-dark rounded-pill" href="#">2</a></li>
                    <li class="page-item"><a class="page-link text-dark rounded-pill" href="#">3</a></li>
                    <li class="page-item"><a class="page-link text-dark rounded-pill" href="#">»</a></li>
                </ul>
            </nav>
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
    background: linear-gradient(135deg, #dc3545 0%, #bd2130 100%);
}

.card:hover {
    transform: translateY(-5px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.15) !important;
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

.btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
    border-radius: 0.375rem;
}
</style>
