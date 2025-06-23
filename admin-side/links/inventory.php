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

<script>
document.addEventListener('DOMContentLoaded', function() {
    const categorySelect = document.getElementById('categorySelect');
    const sizeSelect = document.getElementById('sizeSelect');
    const colorInput = document.querySelector('input[name="color"]');

    // init choices
    const sizeChoices = new Choices(sizeSelect, {
        removeItemButton: true,
        placeholder: true,
        placeholderValue: 'Select Size(s)',
        searchEnabled: false
    });

    // options for sizes exp: s,m,l, adn 39,40 and so on
    function setSizeOptions(category) {
        let options = [];
        if (category === 'shoes') {
            for (let i = 39; i <= 45; i++) {
                options.push({ value: i, label: i });
            }
        } else if (category === 'shirts' || category === '') {
            options = [
                { value: 'S', label: 'S' },
                { value: 'M', label: 'M' },
                { value: 'L', label: 'L' },
                { value: 'XL', label: 'XL' }
            ];
        }
        // disabler function for not sizeable products
        sizeSelect.disabled = (category === 'collection');
        sizeChoices.clearChoices();
        if (category !== 'collection') {
            sizeChoices.setChoices(options, 'value', 'label', true);
        }
        // Disable color input for collection
        if (colorInput) {
            colorInput.disabled = (category === 'collection');
        }
    }

    // Initial load
    setSizeOptions(categorySelect.value);

    // categ changer
    categorySelect.addEventListener('change', function() {
        setSizeOptions(this.value);
    });

    const tableBody = document.getElementById('inventory-table-body');
    const pagination = document.getElementById('pagination-controls');
    const PRODUCTS_PER_PAGE = 5;

    function fetchProducts(page = 1) {
        fetch(`./../back-end/admin-side/get_inventory.php?page=${page}&limit=${PRODUCTS_PER_PAGE}`)
            .then(res => res.json())
            .then(data => {
                renderTable(data.products);
                renderPagination(data.page, Math.ceil(data.total / data.limit));
            });
    }

    function renderTable(products) {
        tableBody.innerHTML = '';
        if (!products.length) {
            tableBody.innerHTML = '<tr><td colspan="10" class="text-center">No products found.</td></tr>';
            return;
        }
        products.forEach(product => {
            // Format size as comma-separated with spaces
            let sizeDisplay = product.size ? product.size.split(',').map(s => s.trim()).join(', ') : '';
            tableBody.innerHTML += `
                <tr data-price="${product.price}">
                    <td>#${product.id}</td>
                    <td>
                      <img src="${product.image_path ? '../user-side/uploads/' + product.image_path : '../assets/images/products/sample.jpg'}" 
                           alt="Product" class="img-thumbnail" style="width: 50px; border-radius: 4px;">
                    </td>
                    <td>${product.product_name}</td>
                    <td>${product.category}</td>
                    <td>${sizeDisplay}</td>
                    <td>${product.color}</td>
                    <td>${product.stock}</td>
                    <td>${product.price}</td>
                    <td>
                        <span class="badge ${getStatusBadge(product.stock)}" style="border-radius: 12px;">
                            ${getStatusText(product.stock)}
                        </span>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-info me-1 edit-btn" style="border-radius: 5px;" title="Edit" data-bs-toggle="modal" data-bs-target="#addInventoryModal" data-category="${product.category}" data-size="${product.size}">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-sm btn-danger" style="border-radius: 5px;" title="Delete">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
            `;
        });
    }

    function getStatusBadge(stock) {
        if (stock == 0) return 'bg-danger';
        if (stock < 10) return 'bg-warning';
        return 'bg-success';
    }

    function getStatusText(stock) {
        if (stock == 0) return 'Out of Stock';
        if (stock < 10) return 'Low Stock';
        return 'In Stock';
    }

    function renderPagination(current, total) {
        let html = '';
        if (total <= 1) {
            pagination.innerHTML = '';
            return;
        }
        html += `<ul class="pagination pagination-sm m-0">`;
        html += `<li class="page-item${current === 1 ? ' disabled' : ''}"><a class="page-link" href="#" data-page="${current - 1}">«</a></li>`;
        for (let i = 1; i <= total; i++) {
            html += `<li class="page-item${i === current ? ' active' : ''}"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`;
        }
        html += `<li class="page-item${current === total ? ' disabled' : ''}"><a class="page-link" href="#" data-page="${current + 1}">»</a></li>`;
        html += `</ul>`;
        pagination.innerHTML = html;

        // Add click listeners
        pagination.querySelectorAll('a.page-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const page = parseInt(this.getAttribute('data-page'));
                if (!isNaN(page) && page >= 1 && page <= total) {
                    fetchProducts(page);
                }
            });
        });
    }

    // Helper to set required attributes
    function setFormRequired(isRequired) {
        const form = document.getElementById('inventoryForm');
        form.querySelectorAll('input, select').forEach(el => {
            if (isRequired) {
                if (el.name !== 'product_image') el.setAttribute('required', 'required');
            } else {
                el.removeAttribute('required');
            }
        });
    }

    // Edit button functionality
    document.getElementById('inventory-table-body').addEventListener('click', function(e) {
        const editBtn = e.target.closest('.edit-btn');
        if (editBtn) {
            const row = editBtn.closest('tr');
            if (!row) return;
            const cells = row.querySelectorAll('td');
            const productId = cells[0].textContent.replace('#', '').trim();
            const productName = cells[2].textContent.trim();
            const category = cells[3].textContent.trim();
            const size = cells[4].textContent.trim();
            const color = cells[5].textContent.trim();
            const stock = cells[6].textContent.trim();
            const price = row.getAttribute('data-price') || '';
            document.querySelector('#inventoryForm input[name="product_name"]').value = productName;
            document.querySelector('#inventoryForm select[name="category"]').value = category;
            const sizeSelect = document.querySelector('#inventoryForm select[name="size[]"]');
            if (sizeSelect) {
                for (let option of sizeSelect.options) {
                    option.selected = size.split(',').map(s => s.trim()).includes(option.value);
                }
            }
            document.querySelector('#inventoryForm input[name="color"]').value = color;
            document.querySelector('#inventoryForm input[name="stock"]').value = stock;
            document.querySelector('#inventoryForm input[name="price"]').value = price;
            document.querySelector('#inventoryForm input[name="product_id"]').value = productId;
            // Switch to update mode
            setFormRequired(false);
            document.querySelector('#inventoryForm .btn-primary').textContent = 'Update Item';
            document.querySelector('#inventoryForm').setAttribute('action', './../back-end/admin-side/update_item.php');
        }
    });

        // modal resetter
        document.getElementById('addInventoryModal').addEventListener('hidden.bs.modal', function() {
        document.getElementById('inventoryForm').reset();
        document.getElementById('inventoryForm').removeAttribute('data-edit-id');
        setFormRequired(true);
        document.querySelector('#inventoryForm .btn-primary').textContent = 'Add Item';
        document.querySelector('#inventoryForm').setAttribute('action', './../back-end/admin-side/add_item.php');
    });

    // submission for add/update
    document.getElementById('inventoryForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const form = this;
        const formData = new FormData(form);
        const action = form.getAttribute('action');
        fetch(action, {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                showSuccessAlert(data.message);
                // Close modal
                const modal = bootstrap.Modal.getInstance(document.getElementById('addInventoryModal'));
                if (modal) modal.hide();
                // Refresh table
                fetchProducts();
            } else {
                showErrorAlert(data.message || 'Something went wrong!');
            }
        })
        .catch(() => {
            showErrorAlert('Something went wrong!');
        });
    });

    // Search functionality
    const searchInput = document.querySelector('.input-group input[type="text"]');
    let searchTimeout = null;
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            clearTimeout(searchTimeout);
            const query = this.value.trim();
            if (query === '') {
                fetchProducts();
                return;
            }
            searchTimeout = setTimeout(() => {
                fetch(`./../back-end/admin-side/search.php?query=${encodeURIComponent(query)}`)
                    .then(res => res.json())
                    .then(data => {
                        renderTable(data.products);
                        // Hide pagination when searching
                        pagination.innerHTML = '';
                    })
                    .catch(() => {
                        showErrorAlert('Search failed!');
                    });
            }, 500);
        });
        // Optional: search on Enter
        searchInput.addEventListener('keydown', function(e) {
            if (e.key === 'Enter') {
                clearTimeout(searchTimeout);
                const query = this.value.trim();
                if (query === '') {
                    fetchProducts();
                    return;
                }
                fetch(`./../back-end/admin-side/search.php?query=${encodeURIComponent(query)}`)
                    .then(res => res.json())
                    .then(data => {
                        renderTable(data.products);
                        pagination.innerHTML = '';
                    })
                    .catch(() => {
                        showErrorAlert('Search failed!');
                    });
            }
        });
    }

    // Category filter functionality
    const categorySelectFilter = document.querySelector('.row select.form-select');
    if (categorySelectFilter) {
        categorySelectFilter.addEventListener('change', function() {
            const value = this.value;
            if (value === 'All Categories' || value === '') {
                fetchProducts();
                return;
            }
            fetch(`./../back-end/admin-side/category_selection.php?category=${encodeURIComponent(value)}`)
                .then(res => res.json())
                .then(data => {
                    renderTable(data.products);
                    pagination.innerHTML = '';
                })
                .catch(() => {
                    showErrorAlert('Category filter failed!');
                });
        });
    }

    // Status filter functionality
    const statusSelectFilter = document.querySelectorAll('.row select.form-select')[1];
    if (statusSelectFilter) {
        statusSelectFilter.addEventListener('change', function() {
            const value = this.value;
            if (value === 'All Status' || value === '') {
                fetchProducts();
                return;
            }
            fetch(`./../back-end/admin-side/product_status.php?status=${encodeURIComponent(value)}`)
                .then(res => res.json())
                .then(data => {
                    renderTable(data.products);
                    pagination.innerHTML = '';
                })
                .catch(() => {
                    showErrorAlert('Status filter failed!');
                });
        });
    }

    // Initial fetch
    fetchProducts();
});

// Success alert logic
function showSuccessAlert(message) {
    const alert = document.getElementById('success-alert');
    const msg = document.getElementById('success-alert-message');
    if (msg && message) msg.textContent = message;
    alert.style.display = 'block';
    alert.classList.add('show');
    setTimeout(() => {
        alert.classList.remove('show');
        setTimeout(() => { alert.style.display = 'none'; }, 500);
    }, 2000);
}

// pop up message * may bug potcha
(function() {
    const params = new URLSearchParams(window.location.search);
    if (params.has('success')) {
        let msg = 'Operation successful!';
        if (params.get('success') === 'add') msg = 'Product added successfully!';
        if (params.get('success') === 'update') msg = 'Product updated successfully!';
        showSuccessAlert(msg);
        window.history.replaceState({}, document.title, window.location.pathname);
    }
})();

function showErrorAlert(message) {
    const alert = document.getElementById('error-alert');
    const msg = document.getElementById('error-alert-message');
    if (msg && message) msg.textContent = message;
    alert.style.display = 'block';
    alert.classList.add('show');
    setTimeout(() => {
        alert.classList.remove('show');
        setTimeout(() => { alert.style.display = 'none'; }, 500);
    }, 2000);
}
</script>

<!-- Choices.js CSS * its just a library not a manual code-->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/choices.js/public/assets/styles/choices.min.css" />
<!-- Choices.js JS -->
<script src="https://cdn.jsdelivr.net/npm/choices.js/public/assets/scripts/choices.min.js"></script>
</body>
</html>