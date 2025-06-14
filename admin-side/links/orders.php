<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="mt-4">Orders Management</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Orders</h3>
                    <div class="card-tools">
                        <div class="search-container">
                            <input type="text" name="table_search" class="search-input" placeholder="Search orders...">
                            <button type="submit" class="search-button">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Order ID</th>
                                    <th>Date</th>
                                    <th>Items</th>
                                    <th>Total Amount</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#ORD-2024-001</td>
                                    <td>2024-03-15</td>
                                    <td>3 items</td>
                                    <td>₱3,500</td>
                                    <td><span class="badge badge-success">Completed</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#ORD-2024-002</td>
                                    <td>2024-03-15</td>
                                    <td>2 items</td>
                                    <td>₱2,800</td>
                                    <td><span class="badge badge-warning">Processing</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#ORD-2024-003</td>
                                    <td>2024-03-14</td>
                                    <td>5 items</td>
                                    <td>₱5,200</td>
                                    <td><span class="badge badge-info">Shipped</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#ORD-2024-004</td>
                                    <td>2024-03-14</td>
                                    <td>1 item</td>
                                    <td>₱1,200</td>
                                    <td><span class="badge badge-danger">Cancelled</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-info"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-primary"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="card-footer clearfix">
                    <ul class="pagination pagination-sm m-0 float-right">
                        <li class="page-item"><a class="page-link" href="#">«</a></li>
                        <li class="page-item active"><a class="page-link" href="#">1</a></li>
                        <li class="page-item"><a class="page-link" href="#">2</a></li>
                        <li class="page-item"><a class="page-link" href="#">3</a></li>
                        <li class="page-item"><a class="page-link" href="#">»</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
.card {
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
    border: none;
}

.card-header {
    background-color: #fff;
    border-bottom: 1px solid rgba(0, 0, 0, 0.1);
    padding: 15px 20px;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.card-title {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 600;
    color: #333;
}

.table {
    margin-bottom: 0;
}

.table thead th {
    background-color: #f8f9fa;
    border-bottom: 2px solid #dee2e6;
    font-weight: 600;
    padding: 12px 15px;
    color: #495057;
}

.table td {
    padding: 12px 15px;
    vertical-align: middle;
}

.table tbody tr:hover {
    background-color: #f8f9fa;
}

/* Badge styling */
.badge {
    padding: 6px 12px;
    font-weight: 500;
    border-radius: 20px;
}

.badge-success {
    background-color: #28a745;
}

.badge-warning {
    background-color: #ffc107;
    color: #000;
}

.badge-info {
    background-color: #17a2b8;
}

.badge-danger {
    background-color: #dc3545;
}

.btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
    border-radius: 0.2rem;
    margin: 0 2px;
}

.input-group-sm > .form-control {
    border-radius: 10px 0 0 10px;
    border: 1px solid #ced4da;
}

.input-group-sm > .input-group-append > .btn {
    border-radius: 0 10px 10px 0;
    border: 1px solid #ced4da;
}

.pagination {
    margin: 0;
}

.page-link {
    padding: 0.5rem 0.75rem;
    color: #007bff;
    background-color: #fff;
    border: 1px solid #dee2e6;
}

.page-item.active .page-link {
    background-color: #007bff;
    border-color: #007bff;
}

@media (max-width: 768px) {
    .card-header {
        flex-direction: column;
        gap: 10px;
    }
    
    .card-tools {
        width: 100%;
    }
    
    .input-group {
        width: 100% !important;
    }
}

.search-container {
    position: relative;
    width: 300px;
}

.search-input {
    width: 100%;
    padding: 10px 45px 10px 20px;
    border: 2px solid #e0e0e0;
    border-radius: 25px;
    font-size: 14px;
    transition: all 0.3s ease;
    background-color: #f8f9fa;
    color: #495057;
}

.search-input:focus {
    outline: none;
    border-color: #007bff;
    box-shadow: 0 0 0 3px rgba(0, 123, 255, 0.1);
    background-color: #fff;
}

.search-input::placeholder {
    color: #adb5bd;
    font-weight: 400;
}

.search-button {
    position: absolute;
    right: 5px;
    top: 50%;
    transform: translateY(-50%);
    background: none;
    border: none;
    color: #6c757d;
    padding: 8px 12px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.search-button:hover {
    color: #007bff;
}

.search-button i {
    font-size: 16px;
}

@media (max-width: 768px) {
    .search-container {
        width: 100%;
        margin-top: 10px;
    }
    
    .card-header {
        flex-direction: column;
        align-items: stretch;
    }
}
</style>
