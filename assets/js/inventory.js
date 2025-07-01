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
                        <button class="btn btn-sm btn-danger delete-btn" style="border-radius: 5px;" title="Delete" data-product-id="${product.id}">
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

    let productIdToDelete = null;

    document.getElementById('inventory-table-body').addEventListener('click', function (e) {
        if (e.target.closest('.delete-btn')) {
            const btn = e.target.closest('.delete-btn');
            productIdToDelete = btn.getAttribute('data-product-id');
            // Show the confirmation modal
            const deleteModal = new bootstrap.Modal(document.getElementById('deleteConfirmModal'));
            deleteModal.show();
        }
    });

    document.getElementById('confirmDeleteBtn').addEventListener('click', function () {
        if (!productIdToDelete) return;
        fetch('./../back-end/admin-side/delete_item.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/x-www-form-urlencoded'
            },
            body: 'product_id=' + encodeURIComponent(productIdToDelete)
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                fetchProducts();
                showSuccessAlert(data.message);
            } else {
                showErrorAlert(data.message);
            }
        })
        .catch(error => {
            showErrorAlert('Error deleting product.');
        })
        .finally(() => {
            const deleteModal = bootstrap.Modal.getInstance(document.getElementById('deleteConfirmModal'));
            if (deleteModal) deleteModal.hide();
            productIdToDelete = null;
        });
    });

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
