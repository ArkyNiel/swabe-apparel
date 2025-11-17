<div class="container-fluid p-4 rounded-4" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
    <h1 class="mb-4 fw-bold text-dark" style="font-size: 2.5rem; text-shadow: 0 2px 4px rgba(0,0,0,0.1);">Orders Management</h1>

    <div class="card rounded-4 shadow-lg border-0 bg-white">
        <div class="card-header rounded-4 bg-light border-0 py-3 d-flex justify-content-between align-items-center">
            <h3 class="card-title mb-0 fw-bold text-dark" style="font-size: 1.5rem;">Recent Orders</h3>
            <div class="search-container">
                <div class="input-group">
                    <span class="input-group-text bg-light border-end-0">
                        <i class="fas fa-search text-muted"></i>
                    </span>
                    <input type="text" name="table_search" class="form-control border-start-0 ps-0" placeholder="Search orders...">
                </div>
            </div>
        </div>
        <div class="card-body rounded-4 p-0">
            <div class="table-responsive rounded-4" style="overflow: hidden;">
                <table class="table table-hover align-middle mb-0 table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th class="py-3 px-4">Order ID</th>
                            <th class="py-3 px-4">Date</th>
                            <th class="py-3 px-4">Items</th>
                            <th class="py-3 px-4">Total Amount</th>
                            <th class="py-3 px-4">Status</th>
                            <th class="py-3 px-4">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="py-3 px-4">#ORD-2024-001</td>
                            <td class="py-3 px-4">2024-03-15</td>
                            <td class="py-3 px-4">3 items</td>
                            <td class="py-3 px-4 fw-bold">₱3,500</td>
                            <td class="py-3 px-4"><span class="badge bg-success rounded-pill px-3 py-2 fw-semibold">Completed</span></td>
                            <td class="py-3 px-4">
                                <button class="btn btn-info btn-sm rounded-pill me-1"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-primary btn-sm rounded-pill me-1"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm rounded-pill"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4">#ORD-2024-002</td>
                            <td class="py-3 px-4">2024-03-15</td>
                            <td class="py-3 px-4">2 items</td>
                            <td class="py-3 px-4 fw-bold">₱2,800</td>
                            <td class="py-3 px-4"><span class="badge bg-danger rounded-pill px-3 py-2 fw-semibold">Refund</span></td>
                            <td class="py-3 px-4">
                                <button class="btn btn-info btn-sm rounded-pill me-1"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-primary btn-sm rounded-pill me-1"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm rounded-pill"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4">#ORD-2024-003</td>
                            <td class="py-3 px-4">2024-03-14</td>
                            <td class="py-3 px-4">5 items</td>
                            <td class="py-3 px-4 fw-bold">₱5,200</td>
                            <td class="py-3 px-4"><span class="badge bg-success rounded-pill px-3 py-2 fw-semibold">Completed</span></td>
                            <td class="py-3 px-4">
                                <button class="btn btn-info btn-sm rounded-pill me-1"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-primary btn-sm rounded-pill me-1"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm rounded-pill"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                        <tr>
                            <td class="py-3 px-4">#ORD-2024-004</td>
                            <td class="py-3 px-4">2024-03-14</td>
                            <td class="py-3 px-4">1 item</td>
                            <td class="py-3 px-4 fw-bold">₱1,200</td>
                            <td class="py-3 px-4"><span class="badge bg-warning rounded-pill px-3 py-2 fw-semibold">Cancelled</span></td>
                            <td class="py-3 px-4">
                                <button class="btn btn-info btn-sm rounded-pill me-1"><i class="fas fa-eye"></i></button>
                                <button class="btn btn-primary btn-sm rounded-pill me-1"><i class="fas fa-edit"></i></button>
                                <button class="btn btn-danger btn-sm rounded-pill"><i class="fas fa-trash"></i></button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card-footer rounded-4 bg-light border-0 p-3">
            <nav aria-label="Orders pagination">
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
