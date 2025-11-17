<?php
$topProducts = [
    ["product" => "Head and Shoulder", "category" => "Shoes", "units" => 320, "sales" => "₱1,920,000"],
    ["product" => "Head and Shoulder", "category" => "Shirts", "units" => 210, "sales" => "₱209,790"],
    ["product" => "Head and Shoulder", "category" => "Collections", "units" => 150, "sales" => "₱374,850"],
];
$recentSales = [
    ["date" => "2025-03-15", "order_id" => "#ORD-2024-001", "customer" => "Niel Arky", "amount" => "₱3,500", "status" => "Completed"],
    ["date" => "2025-03-15", "order_id" => "#ORD-2024-002", "customer" => "Niel Arky", "amount" => "₱2,800", "status" => "Processing"],
    ["date" => "2025-03-14", "order_id" => "#ORD-2024-004", "customer" => "Niel Arky", "amount" => "₱1,200", "status" => "Cancelled"],
];
$statusBadge = [
    "Completed" => "success",
    "Processing" => "warning",
    "Cancelled" => "danger"
];
?>

<div class="container-fluid p-4 rounded-4" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); min-height: 100vh;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="fw-bold text-dark mb-0" style="font-size: 2.5rem; text-shadow: 0 2px 4px rgba(0,0,0,0.1);">Sales Report</h1>
        <div class="date-filter">
            <select class="form-select rounded-pill px-4 py-2 border-0 shadow-sm" id="reportPeriod" style="background: white;">
                <option value="today">Today</option>
                <option value="week">This Week</option>
                <option value="month" selected>This Month</option>
                <option value="year">This Year</option>
                <option value="custom">Custom Range</option>
            </select>
        </div>
    </div>

    <!-- Sales Summary Cards -->
    <div class="row g-4 mb-4">
        <div class="col-lg-3 col-6">
            <div class="card rounded-4 shadow-lg border-0 gradient-success text-white h-100" style="cursor: pointer; transition: all 0.3s ease;">
                <div class="card-body rounded-4 p-4 text-center">
                    <div class="d-flex flex-column align-items-center justify-content-center h-100">
                        <h2 class="mb-2 fw-bold" style="font-size: 2rem;">₱250,000</h2>
                        <p class="mb-0 opacity-75 fw-semibold">Total Sales</p>
                        <i class="fas fa-chart-line mt-3 opacity-50" style="font-size: 2rem;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="card rounded-4 shadow-lg border-0 gradient-info text-white h-100" style="cursor: pointer; transition: all 0.3s ease;">
                <div class="card-body rounded-4 p-4 text-center">
                    <div class="d-flex flex-column align-items-center justify-content-center h-100">
                        <h2 class="mb-2 fw-bold" style="font-size: 2rem;">1,200</h2>
                        <p class="mb-0 opacity-75 fw-semibold">Total Orders</p>
                        <i class="fas fa-shopping-cart mt-3 opacity-50" style="font-size: 2rem;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="card rounded-4 shadow-lg border-0 gradient-warning text-white h-100" style="cursor: pointer; transition: all 0.3s ease;">
                <div class="card-body rounded-4 p-4 text-center">
                    <div class="d-flex flex-column align-items-center justify-content-center h-100">
                        <h2 class="mb-2 fw-bold" style="font-size: 2rem;">₱208</h2>
                        <p class="mb-0 opacity-75 fw-semibold">Average Order Value</p>
                        <i class="fas fa-calculator mt-3 opacity-50" style="font-size: 2rem;"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-6">
            <div class="card rounded-4 shadow-lg border-0 gradient-danger text-white h-100" style="cursor: pointer; transition: all 0.3s ease;">
                <div class="card-body rounded-4 p-4 text-center">
                    <div class="d-flex flex-column align-items-center justify-content-center h-100">
                        <h2 class="mb-2 fw-bold" style="font-size: 2rem;">₱15,000</h2>
                        <p class="mb-0 opacity-75 fw-semibold">Refunds</p>
                        <i class="fas fa-undo mt-3 opacity-50" style="font-size: 2rem;"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Sales Chart -->
    <div class="card rounded-4 shadow-lg border-0 mb-4 bg-white">
        <div class="card-header rounded-4 bg-light border-0 py-3">
            <h3 class="card-title mb-0 fw-bold text-dark" style="font-size: 1.5rem;">Sales Overview</h3>
        </div>
        <div class="card-body rounded-4 p-4">
            <canvas id="salesChart" height="100"></canvas>
        </div>
    </div>

    <!-- Top Products Table -->
    <div class="card rounded-4 shadow-lg border-0 mb-4 bg-white">
        <div class="card-header rounded-4 bg-light border-0 py-3">
            <h3 class="card-title mb-0 fw-bold text-dark" style="font-size: 1.5rem;">Top Selling Products</h3>
        </div>
        <div class="card-body rounded-4 p-0">
            <div class="table-responsive rounded-4" style="overflow: hidden;">
                <table class="table table-hover align-middle mb-0 table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th class="py-3 px-4">Product</th>
                            <th class="py-3 px-4">Category</th>
                            <th class="py-3 px-4">Units Sold</th>
                            <th class="py-3 px-4">Total Sales</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($topProducts as $prod): ?>
                        <tr>
                            <td class="py-3 px-4 fw-semibold"><?= htmlspecialchars($prod["product"]) ?></td>
                            <td class="py-3 px-4"><span class="badge bg-primary rounded-pill px-3 py-2 fw-semibold"><?= htmlspecialchars($prod["category"]) ?></span></td>
                            <td class="py-3 px-4 fw-bold text-success"><?= htmlspecialchars($prod["units"]) ?></td>
                            <td class="py-3 px-4 fw-bold text-primary">₱<?= number_format(str_replace(['₱', ','], '', $prod["sales"]), 0) ?></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Recent Sales Table -->
    <div class="card rounded-4 shadow-lg border-0 mb-4 bg-white">
        <div class="card-header rounded-4 bg-light border-0 py-3">
            <h3 class="card-title mb-0 fw-bold text-dark" style="font-size: 1.5rem;">Recent Sales</h3>
        </div>
        <div class="card-body rounded-4 p-0">
            <div class="table-responsive rounded-4" style="overflow: hidden;">
                <table class="table table-hover align-middle mb-0 table-striped">
                    <thead class="table-dark">
                        <tr>
                            <th class="py-3 px-4">Date</th>
                            <th class="py-3 px-4">Order ID</th>
                            <th class="py-3 px-4">Customer</th>
                            <th class="py-3 px-4">Amount</th>
                            <th class="py-3 px-4">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($recentSales as $sale): ?>
                        <tr>
                            <td class="py-3 px-4 fw-semibold"><?= htmlspecialchars($sale["date"]) ?></td>
                            <td class="py-3 px-4 fw-semibold text-primary"><?= htmlspecialchars($sale["order_id"]) ?></td>
                            <td class="py-3 px-4 fw-semibold"><?= htmlspecialchars($sale["customer"]) ?></td>
                            <td class="py-3 px-4 fw-bold text-success">₱<?= number_format(str_replace(['₱', ','], '', $sale["amount"]), 0) ?></td>
                            <td class="py-3 px-4"><span class="badge bg-<?= $statusBadge[$sale["status"]] ?> rounded-pill px-3 py-2 fw-semibold"><?= htmlspecialchars($sale["status"]) ?></span></td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
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

<style>
.gradient-success {
    background: linear-gradient(135deg, #28a745 0%, #1e7e34 100%);
}

.gradient-info {
    background: linear-gradient(135deg, #17a2b8 0%, #117a8b 100%);
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

