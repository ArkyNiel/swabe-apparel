<?php include __DIR__ . '/../components/successful.php'; ?>
<?php include __DIR__ . '/../components/error.php'; ?>

<div class="container-fluid p-4 rounded-4" style="background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h1 class="mb-0 fw-bold text-dark" style="font-size: 2.5rem; text-shadow: 0 2px 4px rgba(0,0,0,0.1);">Inventory Management</h1>
        <button class="btn btn-primary rounded-pill px-4 py-2 fw-semibold" data-bs-toggle="modal" data-bs-target="#addInventoryModal">
            <i class="fas fa-plus-circle me-2"></i>Add New Item
        </button>
    </div>

    <div class="card rounded-4 shadow-lg border-0 mb-4 bg-white">
        <div class="card-body rounded-4 p-4">
            <div class="row g-3">
                <div class="col-md-4">
                    <div class="input-group">
                        <span class="input-group-text bg-light border-end-0">
                            <i class="fas fa-search text-muted"></i>
                        </span>
                        <input type="text" class="form-control border-start-0 ps-0" placeholder="Search products...">
                    </div>
                </div>

                <div class="col-md-4">
                    <select class="form-select">
                        <option selected>All Categories</option>
                        <option value="shirts">Shirts</option>
                        <option value="shoes">Shoes</option>
                        <option value="collection">Collection</option>
                    </select>
                </div>

                <div class="col-md-4">
                    <select class="form-select">
                        <option selected>All Status</option>
                        <option value="in-stock">In Stock</option>
                        <option value="low-stock">Low Stock</option>
                        <option value="out-of-stock">Out of Stock</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <div class="card rounded-4 shadow-lg border-0 bg-white">
        <div class="card-body rounded-4 p-0">
            <div class="table-responsive rounded-4" style="overflow: hidden;">
                <div style="max-height: 600px; overflow-y: auto;">
                    <table class="table table-hover align-middle mb-0 table-striped">
                        <thead class="table-dark">
                            <tr>
                                <th class="py-3 px-4">Product ID</th>
                                <th class="py-3 px-4">Image</th>
                                <th class="py-3 px-4">Product Name</th>
                                <th class="py-3 px-4">Category</th>
                                <th class="py-3 px-4">Size</th>
                                <th class="py-3 px-4">Color</th>
                                <th class="py-3 px-4">Stock</th>
                                <th class="py-3 px-4">Price</th>
                                <th class="py-3 px-4">Status</th>
                                <th class="py-3 px-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody id="inventory-table-body">
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="pagination-controls" class="mt-3 d-flex justify-content-center p-3"></div>
        </div>
    </div>
</div>

<div class="modal fade" id="addInventoryModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-header bg-light rounded-top-4 border-0">
                <h5 class="modal-title fw-bold text-dark">Add New Inventory Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="./../back-end/admin-side/add_item.php" id="inventoryForm" enctype="multipart/form-data">
                    <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Product Name</label>
                            <input type="text" class="form-control" name="product_name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label fw-semibold">Category</label>
                            <select class="form-select" name="category" id="categorySelect" required>
                                <option value="">Select Category</option>
                                <option value="shirts">Shirts</option>
                                <option value="shoes">Shoes</option>
                                <option value="collection">Collection</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Size</label>
                            <select class="form-select" name="size[]" id="sizeSelect" multiple required></select>
                            <small class="form-text text-muted">Select one or more sizes for this product.</small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Color</label>
                            <input type="text" class="form-control" name="color" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Stock Quantity</label>
                            <input type="number" class="form-control" name="stock" required min="0">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label fw-semibold">Price</label>
                            <input
                                type="number"
                                step="0.01"
                                name="price"
                                class="form-control"
                                placeholder="Enter price"
                                required
                            >
                        </div>
                        <div class="col-12">
                            <label class="form-label fw-semibold">Product Image</label>
                            <input type="file" class="form-control" name="product_image" accept="image/*">
                        </div>
                    </div>
                    <input type="hidden" name="product_id" id="editProductId">
                    <div class="modal-footer border-0">
                        <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4">Add Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="successModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-body p-4"></div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-success rounded-pill px-4" data-bs-dismiss="modal">OK</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="errorModal" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-body p-4"></div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-danger rounded-pill px-4" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content rounded-4 border-0 shadow-lg">
            <div class="modal-header bg-light rounded-top-4 border-0">
                <h5 class="modal-title fw-bold text-dark" id="deleteConfirmModalLabel">Confirm Deletion</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body p-4">
                Are you sure you want to delete this product?
            </div>
            <div class="modal-footer border-0">
                <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-danger rounded-pill px-4" id="confirmDeleteBtn">Delete</button>
            </div>
        </div>
    </div>
</div>

<!-- Choices.js CSS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
<!-- Choices.js JS -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<!-- Your custom inventory JS -->
<script src="./../assets/js/inventory.js"></script>

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
</style>
