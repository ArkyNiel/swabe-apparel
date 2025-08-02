<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Sales | Swabe Apparel</title>
    <link rel="stylesheet" href="../../assets/bootswatch/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
    <link rel="stylesheet" href="../../assets/css/sidebar.css">
    <link rel="stylesheet" href="../../assets/css/settings.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<?php include __DIR__ . '/../components/successful.php'; ?>
<?php include __DIR__ . '/../components/error.php'; ?>

<div class="container-fluid py-4" style="height: 100vh; overflow-y: auto;">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="margin-left: 10px; margin-right: 10px;">Add Sales</h2>
    </div>

    <div class="row" style="min-height: calc(100vh - 120px);">
        <div class="col-12">
            <div class="card" style="margin-left: 10px; margin-right: 10px;">
                <div class="card-header bg-success text-white">
                    <h5 class="mb-0"><i class="bi bi-cart me-2"></i>Product Selection</h5>
                </div>
                <div class="card-body">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Search Product</label>
                            <div class="input-group">
                                <input type="text" class="form-control" placeholder="Search for products..." id="productSearch">
                                <button class="btn btn-outline-secondary" type="button" id="searchBtn">
                                    <i class="bi bi-search"></i>
                                </button>
                            </div>
                            <div id="searchResults" class="mt-2" style="display: none;">
                                <div class="list-group">
                                    <a href="#" class="list-group-item list-group-item-action" data-product="Classic White Shirt" data-price="500">
                                        <div class="d-flex justify-content-between">
                                            <span>Classic White Shirt</span>
                                            <span class="text-success">₱500</span>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action" data-product="Black Polo Shirt" data-price="600">
                                        <div class="d-flex justify-content-between">
                                            <span>Black Polo Shirt</span>
                                            <span class="text-success">₱600</span>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action" data-product="Nike Air Jordan" data-price="2500">
                                        <div class="d-flex justify-content-between">
                                            <span>Nike Air Jordan</span>
                                            <span class="text-success">₱2,500</span>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action" data-product="Adidas Sneakers" data-price="1800">
                                        <div class="d-flex justify-content-between">
                                            <span>Adidas Sneakers</span>
                                            <span class="text-success">₱1,800</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Size</label>
                            <select class="form-select">
                                <option selected>Size</option>
                                <option value="S">Small</option>
                                <option value="M">Medium</option>
                                <option value="L">Large</option>
                                <option value="XL">Extra Large</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label">Quantity</label>
                            <input type="number" class="form-control" min="1" value="1">
                        </div>
                    </div>
                    
                    <div class="mt-3">
                        <button class="btn btn-outline-success">
                            <i class="bi bi-plus me-2"></i>Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <div class="card mt-3" style="margin-left: 10px; margin-right: 10px;">
                <div class="card-header bg-info text-white">
                    <h5 class="mb-0"><i class="bi bi-bag me-2"></i>Cart Items</h5>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Product</th>
                                    <th>Size</th>
                                    <th>Quantity</th>
                                    <th>Price</th>
                                    <th>Total</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Classic White Shirt</td>
                                    <td>M</td>
                                    <td>2</td>
                                    <td>₱500</td>
                                    <td>₱1,000</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td>Nike Air Jordan</td>
                                    <td>42</td>
                                    <td>1</td>
                                    <td>₱2,500</td>
                                    <td>₱2,500</td>
                                    <td>
                                        <button class="btn btn-sm btn-danger">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

                         <div class="card mt-3" style="margin-left: 10px; margin-right: 10px;">
                 <div class="card-header" style="background-color: #ffc107; color: #000;">
                     <h5 class="mb-0"><i class="bi bi-calculator me-2"></i>Order Summary</h5>
                 </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Payment Method</label>
                                <select class="form-select">
                                    <option selected>Cash</option>
                                    <option value="card">Credit Card</option>
                                    <option value="gcash">GCash</option>
                                    <option value="paymaya">PayMaya</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label">Delivery Method</label>
                                <select class="form-select">
                                    <option selected>Pickup</option>
                                    <option value="express">Express Delivery</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="d-flex justify-content-between mb-2">
                                <span>Subtotal:</span>
                                <span>₱3,500</span>
                            </div>
                            <div class="d-flex justify-content-between mb-2">
                                <span>Delivery Fee:</span>
                                <span>₱100</span>
                            </div>
                            <hr>
                            <div class="d-flex flex-column">
                                <span class="fw-bold">Total:</span>
                                <span class="text-success fs-4 fw-bold">₱3,600</span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="mt-3 d-flex gap-2">
                        <button class="btn btn-success flex-fill">
                            <i class="bi bi-check-circle me-2"></i>Complete Sale
                        </button>
                        <button class="btn btn-secondary">
                            <i class="bi bi-printer me-2"></i>Print Receipt
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="../../assets/bootswatch/js/bootstrap.bundle.min.js"></script>



<style>
.container-fluid::-webkit-scrollbar {
    width: 8px;
}

.container-fluid::-webkit-scrollbar-track {
    background: #f1f1f1;
    border-radius: 4px;
}

.container-fluid::-webkit-scrollbar-thumb {
    background: #c1c1c1;
    border-radius: 4px;
}

.container-fluid::-webkit-scrollbar-thumb:hover {
    background: #a8a8a8;
}

.card {
    max-height: 100%;
    overflow: hidden;
}

.card-body {
    overflow-y: auto;
    max-height: 400px;
}

@media (max-width: 768px) {
    .container-fluid {
        height: auto !important;
        overflow-y: visible !important;
    }
    
    .row {
        min-height: auto !important;
    }
    
    .card-body {
        max-height: 300px;
    }
}
</style>
</body>
</html>