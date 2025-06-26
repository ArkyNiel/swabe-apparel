<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inventory Management | Swabe Apparel</title>
    <link rel="stylesheet" href="../../assets/bootswatch/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../assets/css/dashboard.css">
    <link rel="stylesheet" href="../../assets/css/sidebar.css">
    <link rel="stylesheet" href="../../assets/css/settings.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
</head>
<body>
<?php include __DIR__ . '/../components/successful.php'; ?>
<?php include __DIR__ . '/../components/error.php'; ?>

<div class="container-fluid py-4">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 style="margin-left: 10px; margin-right: 10px;">Inventory Management</h2>
        <button class="btn btn-primary" style="border-radius: 25px; margin-right: 10px;" data-bs-toggle="modal" data-bs-target="#addInventoryModal">
            <i class="bi bi-plus-circle me-2"></i>Add New Item
        </button>
    </div>

    <!-- Filters section -->
    <div class="card mb-4" style="border-radius: 12px; margin-left: 10px; margin-right: 10px;">
        <div class="card-body" style="border-radius: 12px;">
            <div class="row g-3">
                <!-- Search bar -->
                <div class="col-md-4">
                    <div class="input-group" style="border-radius: 8px;">
                        <span class="input-group-text" style="border-radius: 8px 0 0 8px;">
                            <i class="bi bi-search"></i>
                        </span>
                        <input type="text" class="form-control" style="border-radius: 0 8px 8px 0;" placeholder="Search products...">
                    </div>
                </div>
                
                <!-- Category filter -->
                <div class="col-md-4">
                    <select class="form-select" style="border-radius: 8px;">
                        <option selected>All Categories</option>
                        <option value="shirts">Shirts</option>
                        <option value="shoes">Shoes</option>
                        <option value="collection">Collection</option>
                    </select>
                </div>

                <!-- Status Filter -->
                <div class="col-md-4">
                    <select class="form-select" style="border-radius: 8px;">
                        <option selected>All Status</option>
                        <option value="in-stock">In Stock</option>
                        <option value="low-stock">Low Stock</option>
                        <option value="out-of-stock">Out of Stock</option>
                    </select>
                </div>
            </div>
        </div>
    </div>

    <!-- Inventory table -->
    <div class="card" style="border-radius: 12px; margin-left: 10px; margin-right: 10px;">
        <div class="card-body" style="border-radius: 12px;">
            <div class="table-responsive" style="border-radius: 12px; overflow:hidden;">
                <div style="max-height: 600px; overflow-y: auto;">
                    <table class="table table-hover align-middle mb-0" style="border-radius: 12px;">
                        <thead class="table-light">
                            <tr>
                                <th>Product ID</th>
                                <th>Image</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Size</th>
                                <th>Color</th>
                                <th>Stock</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="inventory-table-body">
                            <!-- Products will be inserted here by JS -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div id="pagination-controls" class="mt-3 d-flex justify-content-center"></div>
        </div>
    </div>
</div>

<!-- Add New Inventory Modal -->
<div class="modal fade" id="addInventoryModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content" style="border-radius: 12px;">
            <div class="modal-header" style="border-radius: 12px;">
                <h5 class="modal-title">Add New Inventory Item</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body" style="border-radius: 12px;">
            <form method="POST" action="./../back-end/admin-side/add_item.php" id="inventoryForm" enctype="multipart/form-data">
                <div class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Product Name</label>
                            <input type="text" class="form-control" style="border-radius: 8px;" name="product_name" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Category</label>
                            <select class="form-select" style="border-radius: 8px;" name="category" id="categorySelect" required>
                                <option value="">Select Category</option>
                                <option value="shirts">Shirts</option>
                                <option value="shoes">Shoes</option>
                                <option value="collection">Collection</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Size</label>
                            <select class="form-select" name="size[]" id="sizeSelect" multiple required></select>
                            <small class="form-text text-muted">Select one or more sizes for this product.</small>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Color</label>
                            <input type="text" class="form-control" style="border-radius: 8px;" name="color" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Stock Quantity</label>
                            <input type="number" class="form-control" style="border-radius: 8px;" name="stock" required min="0">
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Price</label>
                            <input 
                                type="number" 
                                step="0.01" 
                                name="price" 
                                class="form-control" 
                                style="border-radius: 8px;" 
                                placeholder="Enter price" 
                                required
                            >
                        </div>
                        <div class="col-12">
                            <label class="form-label">Product Image</label>
                            <input type="file" class="form-control" style="border-radius: 8px;" name="product_image" accept="image/*">
                        </div>
                    </div>
                    <input type="hidden" name="product_id" id="editProductId">
                    <div class="modal-footer" style="border-radius: 12px;">
                        <button type="button" class="btn btn-secondary" style="border-radius: 8px;" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" style="border-radius: 8px;">Add Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Success Modal -->
<div class="modal fade" id="successModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-success" data-bs-dismiss="modal">OK</button>
      </div>
    </div>
  </div>
</div>
<!-- Error Modal -->
<div class="modal fade" id="errorModal" tabindex="-1">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-body"></div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<!-- Delete Confirmation Modal -->
<div class="modal fade" id="deleteConfirmModal" tabindex="-1" aria-labelledby="deleteConfirmModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content" style="border-radius: 12px;">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteConfirmModalLabel">Confirm Deletion</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this product?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <button type="button" class="btn btn-danger" id="confirmDeleteBtn">Delete</button>
      </div>
    </div>
  </div>
</div>

<!-- Choices.js CSS * its just a library not a manual code-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
<!-- Choices.js JS -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
<!-- Your custom inventory JS -->
<script src="./../assets/js/inventory.js"></script>
</body>
</html>