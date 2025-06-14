

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="mt-4">Product Summary</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="content" style="height: calc(100vh - 120px); overflow-y: auto;">
        <div class="container-fluid">
            <!-- Summary Cards -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>150</h3>
                            <p>Total Products</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>₱250,000</h3>
                            <p>Total Inventory Value</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>5</h3>
                            <p>Low Stock Items</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>2</h3>
                            <p>Out of Stock</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Category-wise Statistics -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Category-wise Inventory Summary</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Category</th>
                                            <th>Number of Products</th>
                                            <th>Total Quantity</th>
                                            <th>Total Value (₱)</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Shoes</td>
                                            <td>45</td>
                                            <td>120</td>
                                            <td>₱120,000</td>
                                        </tr>
                                        <tr>
                                            <td>Shirts</td>
                                            <td>75</td>
                                            <td>250</td>
                                            <td>₱75,000</td>
                                        </tr>
                                        <tr>
                                            <td>Collections</td>
                                            <td>30</td>
                                            <td>80</td>
                                            <td>₱55,000</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Low Stock Alert -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Low Stock Alert</h3>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>Product Name</th>
                                            <th>Category</th>
                                            <th>Remaining Quantity</th>
                                            <th>Status</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Nike Air Max</td>
                                            <td>Shoes</td>
                                            <td>3</td>
                                            <td><span class="badge badge-danger">Critical</span></td>
                                        </tr>
                                        <tr>
                                            <td>Classic White Tee</td>
                                            <td>Shirts</td>
                                            <td>7</td>
                                            <td><span class="badge badge-warning">Low</span></td>
                                        </tr>
                                        <tr>
                                            <td>Summer Collection Set</td>
                                            <td>Collections</td>
                                            <td>4</td>
                                            <td><span class="badge badge-danger">Critical</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Top Selling Products -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Top Selling Products</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h5>Nike Air Max</h5>
                                            <p class="text-muted">Shoes Category</p>
                                            <h4>₱5,999</h4>
                                            <p class="text-success">Sold: 45 units</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h5>Classic White Tee</h5>
                                            <p class="text-muted">Shirts Category</p>
                                            <h4>₱999</h4>
                                            <p class="text-success">Sold: 78 units</p>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-4">
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <h5>Summer Collection Set</h5>
                                            <p class="text-muted">Collections Category</p>
                                            <h4>₱2,499</h4>
                                            <p class="text-success">Sold: 32 units</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<style>
.content::-webkit-scrollbar {
    width: 8px;
}

.content::-webkit-scrollbar-track {
    background: #f1f1f1;
}

.content::-webkit-scrollbar-thumb {
    background: #888;
    border-radius: 4px;
}

.content::-webkit-scrollbar-thumb:hover {
    background: #555;
}

.table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

.content {
    padding-bottom: 20px;
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
    margin-top: 10px;
}

.small-box:hover {
    transform: translateY(-5px);
    box-shadow: 0 6px 12px rgba(0, 0, 0, 0.15);
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

/* Remove icon styles since we're removing the icons */
.small-box .icon {
    display: none;
}

/* Card styling for category-wise statistics and other sections */
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
}

.card-title {
    margin: 0;
    font-size: 1.25rem;
    font-weight: 600;
    color: #333;
}

.card-body {
    padding: 20px;
}

/* Table styling */
.table {
    margin-bottom: 0;
}

.table thead th {
    background-color: #f8f9fa;
    border-bottom: 2px solid #dee2e6;
    font-weight: 600;
}

.table td, .table th {
    padding: 12px 15px;
    vertical-align: middle;
}

/* Badge styling */
.badge {
    padding: 6px 12px;
    font-weight: 500;
    border-radius: 20px;
}

.badge-danger {
    background-color: #dc3545;
}

.badge-warning {
    background-color: #ffc107;
    color: #000;
}

/* Top selling products cards */
.col-md-4 .card {
    transition: transform 0.3s ease;
}

.col-md-4 .card:hover {
    transform: translateY(-5px);
}

.col-md-4 .card-body {
    padding: 25px;
}

.col-md-4 .card h5 {
    font-size: 1.2rem;
    font-weight: 600;
    margin-bottom: 10px;
}

.col-md-4 .card h4 {
    color: #28a745;
    font-weight: 700;
    margin: 15px 0;
}

.col-md-4 .card .text-success {
    font-weight: 500;
}
</style>

