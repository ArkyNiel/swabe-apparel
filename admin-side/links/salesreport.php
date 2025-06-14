<link rel="stylesheet" href="./../assets/css/salesreport.css">

<?php
$topProducts = [
    ["product" => "Nike Air Max", "category" => "Shoes", "units" => 320, "sales" => "₱1,920,000"],
    ["product" => "Classic White Tee", "category" => "Shirts", "units" => 210, "sales" => "₱209,790"],
    ["product" => "Summer Collection Set", "category" => "Collections", "units" => 150, "sales" => "₱374,850"],
];
$recentSales = [
    ["date" => "2024-03-15", "order_id" => "#ORD-2024-001", "customer" => "Niel Arky", "amount" => "₱3,500", "status" => "Completed"],
    ["date" => "2024-03-15", "order_id" => "#ORD-2024-002", "customer" => "Niel Arky", "amount" => "₱2,800", "status" => "Processing"],
    ["date" => "2024-03-14", "order_id" => "#ORD-2024-004", "customer" => "Niel Arky", "amount" => "₱1,200", "status" => "Cancelled"],
];
$statusBadge = [
    "Completed" => "success",
    "Processing" => "warning",
    "Cancelled" => "danger"
];
?>
<div class="content-wrapper">
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="mt-4">Sales Report</h1>
                </div>
                <div class="col-sm-6 mt-3">
                    <div class="date-filter float-right">
                        <select class="form-control modern-select" id="reportPeriod">
                            <option value="today">Today</option>
                            <option value="week">This Week</option>
                            <option value="month" selected>This Month</option>
                            <option value="year">This Year</option>
                            <option value="custom">Custom Range</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <section class="content main-scrollable">
        <div class="container-fluid mt-3">
            <!-- Sales Summary Cards -->
            <div class="row">
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>₱250,000</h3>
                            <p>Total Sales</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>1,200</h3>
                            <p>Total Orders</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>₱208</h3>
                            <p>Average Order Value</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-danger">
                        <div class="inner">
                            <h3>₱15,000</h3>
                            <p>Refunds</p>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Sales Chart -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Sales Overview</h3>
                </div>
                <div class="card-body">
                    <canvas id="salesChart" height="100"></canvas>
                </div>
            </div>
            <!-- Top Products Table -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Top Selling Products</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Category</th>
                                    <th>Units Sold</th>
                                    <th>Total Sales</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($topProducts as $prod): ?>
                                <tr>
                                    <td><?= htmlspecialchars($prod["product"]) ?></td>
                                    <td><?= htmlspecialchars($prod["category"]) ?></td>
                                    <td><?= htmlspecialchars($prod["units"]) ?></td>
                                    <td><?= htmlspecialchars($prod["sales"]) ?></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales Table -->
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Recent Sales</h3>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Order ID</th>
                                    <th>Customer</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($recentSales as $sale): ?>
                                <tr>
                                    <td><?= htmlspecialchars($sale["date"]) ?></td>
                                    <td><?= htmlspecialchars($sale["order_id"]) ?></td>
                                    <td><?= htmlspecialchars($sale["customer"]) ?></td>
                                    <td><?= htmlspecialchars($sale["amount"]) ?></td>
                                    <td><span class="badge badge-<?= $statusBadge[$sale["status"]] ?>"><?= htmlspecialchars($sale["status"]) ?></span></td>
                                </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
document.addEventListener("DOMContentLoaded", function() {
    var ctx = document.getElementById('salesChart').getContext('2d');
    var salesChart = new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Mar 1', 'Mar 5', 'Mar 10', 'Mar 15', 'Mar 20', 'Mar 25', 'Mar 30'],
            datasets: [{
                label: 'Sales (₱)',
                data: [12000, 18000, 15000, 22000, 20000, 25000, 30000],
                backgroundColor: 'rgba(0, 123, 255, 0.1)',
                borderColor: '#007bff',
                borderWidth: 3,
                pointBackgroundColor: '#007bff',
                pointRadius: 5,
                fill: true,
                tension: 0.4
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: { display: false }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: { color: '#495057' }
                },
                x: {
                    ticks: { color: '#495057' }
                }
            }
        }
    });
});
</script>

