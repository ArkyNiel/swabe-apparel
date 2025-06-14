<div class="container-fluid py-4">
    <!-- Header Section -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2>Inventory Management</h2>
        <button class="btn btn-primary" style="border-radius: 8px;" data-bs-toggle="modal" data-bs-target="#addInventoryModal">
            <i class="bi bi-plus-circle me-2"></i>Add New Item
        </button>
    </div>

    <!-- Filters section -->
    <div class="card mb-4" style="border-radius: 12px;">
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
    <div class="card" style="border-radius: 12px;">
        <div class="card-body" style="border-radius: 12px;">
            <div class="table-responsive" style="border-radius: 12px; overflow:hidden;">
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
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Sample Row 1 -->
                        <tr>
                            <td>#001</td>
                            <td><img src="../assets/images/products/sample.jpg" alt="Product" class="img-thumbnail" style="width: 50px; border-radius: 4px;"></td>
                            <td>Classic White T-Shirt</td>
                            <td>Shirts</td>
                            <td>M</td>
                            <td>White</td>
                            <td>50</td>
                            <td><span class="badge bg-success" style="border-radius: 12px;">In Stock</span></td>
                            <td>
                                <button class="btn btn-sm btn-info me-1" style="border-radius: 5px;" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" style="border-radius: 5px;" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Sample Row 2 -->
                        <tr>
                            <td>#002</td>
                            <td><img src="../assets/images/products/sample.jpg" alt="Product" class="img-thumbnail" style="width: 50px; border-radius: 4px;"></td>
                            <td>Black Sneakers</td>
                            <td>Shoes</td>
                            <td>42</td>
                            <td>Black</td>
                            <td>25</td>
                            <td><span class="badge bg-warning" style="border-radius: 12px;">Low Stock</span></td>
                            <td>
                                <button class="btn btn-sm btn-info me-1" style="border-radius: 5px;" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" style="border-radius: 5px;" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Sample Row 3 -->
                        <tr>
                            <td>#003</td>
                            <td><img src="../assets/images/products/sample.jpg" alt="Product" class="img-thumbnail" style="width: 50px; border-radius: 4px;"></td>
                            <td>Summer Collection Dress</td>
                            <td>Collection</td>
                            <td>S</td>
                            <td>Blue</td>
                            <td>0</td>
                            <td><span class="badge bg-danger" style="border-radius: 12px;">Out of Stock</span></td>
                            <td>
                                <button class="btn btn-sm btn-info me-1" style="border-radius: 5px;" title="Edit">
                                    <i class="bi bi-pencil"></i>
                                </button>
                                <button class="btn btn-sm btn-danger" style="border-radius: 5px;" title="Delete">
                                    <i class="bi bi-trash"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
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
                <form method="POST" action="" id="inventoryForm">
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
                            <select class="form-select" style="border-radius: 8px;" name="size" id="sizeSelect" required>
                                <option value="">Select Size</option>
                                <?php
                                // Default sizes
                                $sizes = ['S', 'M', 'L', 'XL'];
                                foreach ($sizes as $size) {
                                    echo "<option value='$size'>$size</option>";
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Color</label>
                            <input type="text" class="form-control" style="border-radius: 8px;" name="color" required>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">Stock Quantity</label>
                            <input type="number" class="form-control" style="border-radius: 8px;" name="stock" required min="0">
                        </div>
                        <div class="col-12">
                            <label class="form-label">Product Image</label>
                            <input type="file" class="form-control" style="border-radius: 8px;" name="product_image" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer" style="border-radius: 12px;">
                        <button type="button" class="btn btn-secondary" style="border-radius: 8px;" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-primary" style="border-radius: 8px;">Add Item</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const categorySelect = document.getElementById('categorySelect');
    const sizeSelect = document.getElementById('sizeSelect');

    categorySelect.addEventListener('change', function() {
        const selectedCategory = this.value;
        
        // Clear current options
        sizeSelect.innerHTML = '<option value="">Select Size</option>';
        
        if (selectedCategory === 'collection') {
            // Disable size select for collection
            sizeSelect.disabled = true;
            sizeSelect.value = ''; // Clear the value
        } else {
            // Enable size select for other categories
            sizeSelect.disabled = false;
            
            if (selectedCategory === 'shoes') {
                // Add shoe sizes
                for (let i = 39; i <= 45; i++) {
                    const option = document.createElement('option');
                    option.value = i;
                    option.textContent = i;
                    sizeSelect.appendChild(option);
                }
            } else {
                // Add regular sizes
                const regularSizes = ['S', 'M', 'L', 'XL'];
                regularSizes.forEach(size => {
                    const option = document.createElement('option');
                    option.value = size;
                    option.textContent = size;
                    sizeSelect.appendChild(option);
                });
            }
        }
    });
});
</script>