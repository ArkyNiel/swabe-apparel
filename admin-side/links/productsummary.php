<?php
include '../includes/header.php';
include '../includes/sidebar.php';
?>

<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">Product Summary</h1>
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
                        <div class="icon">
                            <i class="fas fa-box"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>₱250,000</h3>
                            <p>Total Inventory Value</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-money-bill-wave"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>5</h3>
                            <p>Low Stock Items</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-exclamation-triangle"></i>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>2</h3>
                            <p>Out of Stock</p>
                        </div>
                        <div class="icon">
                            <i class="fas fa-times-circle"></i>
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
/* Custom scrollbar styling */
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

/* Ensure tables are responsive */
.table-responsive {
    overflow-x: auto;
    -webkit-overflow-scrolling: touch;
}

/* Add some padding at the bottom for better scrolling experience */
.content {
    padding-bottom: 20px;
}
</style>

<?php include '../includes/footer.php'; ?> 