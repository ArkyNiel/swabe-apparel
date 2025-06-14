<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="mt-4">Customers Management</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content">
        <div class="container-fluid">
            <!-- Customer Stats Cards -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>1,250</h3>
                            <p>Total Customers</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>150</h3>
                            <p>New This Month</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>₱45,000</h3>
                            <p>Average Order Value</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>85%</h3>
                            <p>Customer Retention</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Customers Table Card -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Customer List</h3>
                    <div class="card-tools">
                        <div class="search-container">
                            <input type="text" name="table_search" class="search-input" placeholder="Search customers...">
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
                                    <th>Customer ID</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Total Orders</th>
                                    <th>Total Spent</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>#CUST-2024-001</td>
                                    <td>Niel Arky</td>
                                    <td>sample.gmail@arayko</td>
                                    <td>+63 912 345 6789</td>
                                    <td>15</td>
                                    <td>₱45,000</td>
                                    <td><span class="badge badge-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-info" title="View Details"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-primary" title="Edit"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#CUST-2024-002</td>
                                    <td>Niel Arky</td>
                                    <td>sample.gmail@arayko</td>
                                    <td>+63 923 456 7890</td>
                                    <td>8</td>
                                    <td>₱28,500</td>
                                    <td><span class="badge badge-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-info" title="View Details"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-primary" title="Edit"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#CUST-2024-003</td>
                                    <td>Niel Arky</td>
                                    <td>sample.gmail@arayko</td>
                                    <td>+63 934 567 8901</td>
                                    <td>3</td>
                                    <td>₱12,000</td>
                                    <td><span class="badge badge-warning">Inactive</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-info" title="View Details"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-primary" title="Edit"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>#CUST-2024-004</td>
                                    <td>Niel Arky</td>
                                    <td>sample.gmail@arayko</td>
                                    <td>+63 945 678 9012</td>
                                    <td>20</td>
                                    <td>₱75,000</td>
                                    <td><span class="badge badge-success">Active</span></td>
                                    <td>
                                        <button class="btn btn-sm btn-info" title="View Details"><i class="fas fa-eye"></i></button>
                                        <button class="btn btn-sm btn-primary" title="Edit"><i class="fas fa-edit"></i></button>
                                        <button class="btn btn-sm btn-danger" title="Delete"><i class="fas fa-trash"></i></button>
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

.small-box {
    border-radius: 10px;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    margin-bottom: 20px;
    position: relative;
    overflow: hidden;
    text-align: center;
    padding: 40px;
}

.small-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
    border-radius: 15px;
}

.small-box .inner {
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    height: 100%;
}

.small-box h3 {
    font-size: 2.2rem;
    font-weight: 700;
    margin: 0;
    white-space: nowrap;
    padding: 0;
    color: #fff;
}

.small-box p {
    font-size: 1.1rem;
    margin-top: 5px;
    color: #fff;
    opacity: 0.9;
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

.btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
    border-radius: 0.2rem;
    margin: 0 2px;
    transition: all 0.3s ease;
}

.btn-sm:hover {
    transform: translateY(-2px);
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

/* Responsive adjustments */
@media (max-width: 768px) {
    .search-container {
        width: 100%;
        margin-top: 10px;
    }
    
    .card-header {
        flex-direction: column;
        align-items: stretch;
    }
    
    .table-responsive {
        overflow-x: auto;
    }
}
</style>
