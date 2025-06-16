<link rel="stylesheet" href="./../assets/css/customers.css">

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

    <section class="content" style="height: calc(100vh - 120px); overflow-y: auto;">
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