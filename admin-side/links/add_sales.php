<?php include __DIR__ . '/../components/successful.php'; ?>
<?php include __DIR__ . '/../components/error.php'; ?>

<div class="container-fluid p-4 rounded-4" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%); min-height: 100vh;">
    <h1 class="mb-4 fw-bold text-dark" style="font-size: 2.5rem; text-shadow: 0 2px 4px rgba(0,0,0,0.1);">Add Sales</h1>

    <div class="row g-4">
        <div class="col-12">
            <!-- Product Selection Card -->
            <div class="card rounded-4 shadow-lg border-0 mb-4 bg-white">
                <div class="card-header rounded-4 gradient-success text-white border-0 py-3">
                    <h5 class="mb-0 fw-bold"><i class="fas fa-cart-plus me-2"></i>Product Selection</h5>
                </div>
                <div class="card-body rounded-4 p-4">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Search Product</label>
                            <div class="input-group">
                                <span class="input-group-text bg-light border-end-0">
                                    <i class="fas fa-search text-muted"></i>
                                </span>
                                <input type="text" class="form-control border-start-0 ps-0" placeholder="Search for products..." id="productSearch">
                            </div>
                            <div id="searchResults" class="mt-3 rounded-3 shadow-sm border-0" style="display: none; background: white;">
                                <div class="list-group list-group-flush rounded-3">
                                    <a href="#" class="list-group-item list-group-item-action border-0 py-3 px-4 hover-item" data-product="Classic White Shirt" data-price="500">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fw-semibold">Classic White Shirt</span>
                                            <span class="badge bg-success rounded-pill px-3 py-2">₱500</span>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action border-0 py-3 px-4 hover-item" data-product="Black Polo Shirt" data-price="600">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fw-semibold">Black Polo Shirt</span>
                                            <span class="badge bg-success rounded-pill px-3 py-2">₱600</span>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action border-0 py-3 px-4 hover-item" data-product="Nike Air Jordan" data-price="2500">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fw-semibold">Nike Air Jordan</span>
                                            <span class="badge bg-success rounded-pill px-3 py-2">₱2,500</span>
                                        </div>
                                    </a>
                                    <a href="#" class="list-group-item list-group-item-action border-0 py-3 px-4 hover-item" data-product="Adidas Sneakers" data-price="1800">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <span class="fw-semibold">Adidas Sneakers</span>
                                            <span class="badge bg-success rounded-pill px-3 py-2">₱1,800</span>
                                        </div>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Size</label>
                            <select class="form-select">
                                <option selected>Size</option>
                                <option value="S">Small</option>
                                <option value="M">Medium</option>
                                <option value="L">Large</option>
                                <option value="XL">Extra Large</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label class="form-label fw-semibold">Quantity</label>
                            <input type="number" class="form-control" min="1" value="1">
                        </div>
                    </div>

                    <div class="mt-4">
                        <button class="btn btn-success rounded-pill px-4 py-2 fw-semibold">
                            <i class="fas fa-plus me-2"></i>Add to Cart
                        </button>
                    </div>
                </div>
            </div>

            <!-- Cart Items Card -->
            <div class="card rounded-4 shadow-lg border-0 mb-4 bg-white">
                <div class="card-header rounded-4 gradient-info text-white border-0 py-3">
                    <h5 class="mb-0 fw-bold"><i class="fas fa-shopping-bag me-2"></i>Cart Items</h5>
                </div>
                <div class="card-body rounded-4 p-0">
                    <div class="table-responsive rounded-4" style="overflow: hidden;">
                        <table class="table table-hover align-middle mb-0 table-striped">
                            <thead class="table-dark">
                                <tr>
                                    <th class="py-3 px-4">Product</th>
                                    <th class="py-3 px-4">Size</th>
                                    <th class="py-3 px-4">Quantity</th>
                                    <th class="py-3 px-4">Price</th>
                                    <th class="py-3 px-4">Total</th>
                                    <th class="py-3 px-4">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td class="py-3 px-4 fw-semibold">Classic White Shirt</td>
                                    <td class="py-3 px-4">M</td>
                                    <td class="py-3 px-4">2</td>
                                    <td class="py-3 px-4">₱500</td>
                                    <td class="py-3 px-4 fw-bold">₱1,000</td>
                                    <td class="py-3 px-4">
                                        <button class="btn btn-danger btn-sm rounded-pill">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="py-3 px-4 fw-semibold">Nike Air Jordan</td>
                                    <td class="py-3 px-4">42</td>
                                    <td class="py-3 px-4">1</td>
                                    <td class="py-3 px-4">₱2,500</td>
                                    <td class="py-3 px-4 fw-bold">₱2,500</td>
                                    <td class="py-3 px-4">
                                        <button class="btn btn-danger btn-sm rounded-pill">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>

            <!-- Order Summary Card -->
            <div class="card rounded-4 shadow-lg border-0 mb-4 bg-white">
                <div class="card-header rounded-4 gradient-warning text-dark border-0 py-3">
                    <h5 class="mb-0 fw-bold"><i class="fas fa-calculator me-2"></i>Order Summary</h5>
                </div>
                <div class="card-body rounded-4 p-4">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Payment Method</label>
                                <select class="form-select">
                                    <option selected>Cash</option>
                                    <option value="card">Credit Card</option>
                                    <option value="gcash">GCash</option>
                                    <option value="paymaya">PayMaya</option>
                                </select>
                            </div>
                            <div class="mb-3">
                                <label class="form-label fw-semibold">Delivery Method</label>
                                <select class="form-select">
                                    <option selected>Pickup</option>
                                    <option value="express">Express Delivery</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="bg-light rounded-3 p-4">
                                <div class="d-flex justify-content-between mb-3">
                                    <span class="fw-semibold">Subtotal:</span>
                                    <span class="fw-bold">₱3,500</span>
                                </div>
                                <div class="d-flex justify-content-between mb-3">
                                    <span class="fw-semibold">Delivery Fee:</span>
                                    <span class="fw-bold">₱100</span>
                                </div>
                                <hr class="my-3">
                                <div class="d-flex justify-content-between align-items-center">
                                    <span class="fw-bold fs-5">Total:</span>
                                    <span class="text-success fs-3 fw-bold">₱3,600</span>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="mt-4 d-flex gap-3">
                        <button class="btn btn-success rounded-pill px-4 py-2 fw-semibold flex-fill">
                            <i class="fas fa-check-circle me-2"></i>Complete Sale
                        </button>
                        <button class="btn btn-secondary rounded-pill px-4 py-2 fw-semibold">
                            <i class="fas fa-print me-2"></i>Print Receipt
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

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

.hover-item:hover {
    background-color: rgba(0,123,255,0.05) !important;
    transform: translateX(5px);
    transition: all 0.3s ease;
}

.table-striped tbody tr:nth-of-type(odd) {
    background-color: rgba(0,0,0,0.02);
}

.table-hover tbody tr:hover {
    background-color: rgba(0,123,255,0.05);
}

.btn-sm {
    padding: 0.25rem 0.5rem;
    font-size: 0.875rem;
    border-radius: 0.375rem;
}

.list-group-item {
    border: none !important;
    border-radius: 0 !important;
}

.list-group-item:first-child {
    border-top-left-radius: 0.375rem !important;
    border-top-right-radius: 0.375rem !important;
}

.list-group-item:last-child {
    border-bottom-left-radius: 0.375rem !important;
    border-bottom-right-radius: 0.375rem !important;
}
</style>
