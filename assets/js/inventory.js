document.addEventListener('DOMContentLoaded', function() {
    // Simple variables
    const tableBody = document.getElementById('inventory-table-body');
    const categorySelect = document.getElementById('categorySelect');
    const sizeSelect = document.getElementById('sizeSelect');
    let currentPage = 1;

    // Load products on page load
    loadProducts();

    // Category change - update sizes
    categorySelect.addEventListener('change', function() {
        updateSizes(this.value);
    });

    // Update sizes based on category
    function updateSizes(category) {
        let sizes = [];
        if (category === 'shoes') {
            for (let i = 39; i <= 45; i++) {
                sizes.push({ value: i, label: i });
            }
        } else {
            sizes = [
                { value: 'S', label: 'S' },
                { value: 'M', label: 'M' },
                { value: 'L', label: 'L' },
                { value: 'XL', label: 'XL' }
            ];
        }
        
        sizeSelect.disabled = (category === 'collection');
        const choices = new Choices(sizeSelect, {
            removeItemButton: true,
            placeholder: true,
            placeholderValue: 'Select Size(s)',
            searchEnabled: false
        });
        choices.clearChoices();
        if (category !== 'collection') {
            choices.setChoices(sizes, 'value', 'label', true);
        }
    }

    // Load products from server
    function loadProducts(page = 1) {
        fetch(`./../back-end/admin-side/get_inventory.php?page=${page}&limit=5`)
            .then(res => res.json())
            .then(data => {
                showProducts(data.products);
                showPagination(data.page, Math.ceil(data.total / data.limit));
            })
            .catch(error => {
                showError('Failed to load products');
            });
    }

    // Show products in table
    function showProducts(products) {
        tableBody.innerHTML = '';
        
        if (!products.length) {
            tableBody.innerHTML = '<tr><td colspan="10" class="text-center">No products found.</td></tr>';
            return;
        }

        products.forEach(product => {
            const sizes = product.size ? product.size.split(',').join(', ') : '';
            const status = getStatus(product.stock);
            
            tableBody.innerHTML += `
                <tr>
                    <td>#${product.id}</td>
                    <td>
                        <img src="${product.image_path ? '../user-side/uploads/' + product.image_path : '../assets/images/products/sample.jpg'}" 
                             alt="Product" class="img-thumbnail" style="width: 50px;">
                    </td>
                    <td>${product.product_name}</td>
                    <td>${product.category}</td>
                    <td>${sizes}</td>
                    <td>${product.color}</td>
                    <td>${product.stock}</td>
                    <td>${product.price}</td>
                    <td>
                        <span class="badge ${status.badge}">${status.text}</span>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-info me-1 edit-btn" data-id="${product.id}">
                            <i class="bi bi-pencil"></i>
                        </button>
                        <button class="btn btn-sm btn-danger delete-btn" data-id="${product.id}">
                            <i class="bi bi-trash"></i>
                        </button>
                    </td>
                </tr>
            `;
        });
    }

    // Get status badge and text
    function getStatus(stock) {
        if (stock == 0) return { badge: 'bg-danger', text: 'Out of Stock' };
        if (stock < 10) return { badge: 'bg-warning', text: 'Low Stock' };
        return { badge: 'bg-success', text: 'In Stock' };
    }

    // Show pagination
    function showPagination(current, total) {
        const pagination = document.getElementById('pagination-controls');
        if (total <= 1) {
            pagination.innerHTML = '';
            return;
        }

        let html = '<ul class="pagination pagination-sm m-0">';
        html += `<li class="page-item${current === 1 ? ' disabled' : ''}"><a class="page-link" href="#" data-page="${current - 1}">«</a></li>`;
        
        for (let i = 1; i <= total; i++) {
            html += `<li class="page-item${i === current ? ' active' : ''}"><a class="page-link" href="#" data-page="${i}">${i}</a></li>`;
        }
        
        html += `<li class="page-item${current === total ? ' disabled' : ''}"><a class="page-link" href="#" data-page="${current + 1}">»</a></li>`;
        html += '</ul>';
        
        pagination.innerHTML = html;

        // Add click listeners
        pagination.querySelectorAll('a.page-link').forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const page = parseInt(this.getAttribute('data-page'));
                if (page >= 1 && page <= total) {
                    loadProducts(page);
                }
            });
        });
    }

    // Search functionality
    const searchInput = document.querySelector('.input-group input[type="text"]');
    if (searchInput) {
        searchInput.addEventListener('input', function() {
            const query = this.value.trim();
            if (query === '') {
                loadProducts();
                return;
            }
            
            fetch(`./../back-end/admin-side/search.php?query=${encodeURIComponent(query)}`)
                .then(res => res.json())
                .then(data => {
                    showProducts(data.products);
                    document.getElementById('pagination-controls').innerHTML = '';
                })
                .catch(() => showError('Search failed'));
        });
    }

    // Category filter
    const categoryFilter = document.querySelector('.row select.form-select');
    if (categoryFilter) {
        categoryFilter.addEventListener('change', function() {
            const category = this.value;
            if (category === 'All Categories') {
                loadProducts();
                return;
            }
            
            fetch(`./../back-end/admin-side/category_selection.php?category=${encodeURIComponent(category)}`)
                .then(res => res.json())
                .then(data => {
                    showProducts(data.products);
                    document.getElementById('pagination-controls').innerHTML = '';
                })
                .catch(() => showError('Filter failed'));
        });
    }

    // Status filter
    const statusFilter = document.querySelectorAll('.row select.form-select')[1];
    if (statusFilter) {
        statusFilter.addEventListener('change', function() {
            const status = this.value;
            if (status === 'All Status') {
                loadProducts();
                return;
            }
            
            fetch(`./../back-end/admin-side/product_status.php?status=${encodeURIComponent(status)}`)
                .then(res => res.json())
                .then(data => {
                    showProducts(data.products);
                    document.getElementById('pagination-controls').innerHTML = '';
                })
                .catch(() => showError('Filter failed'));
        });
    }

    // Edit button
    tableBody.addEventListener('click', function(e) {
        if (e.target.closest('.edit-btn')) {
            const btn = e.target.closest('.edit-btn');
            const row = btn.closest('tr');
            const cells = row.querySelectorAll('td');
            
            // Fill form with product data
            document.querySelector('input[name="product_name"]').value = cells[2].textContent;
            document.querySelector('select[name="category"]').value = cells[3].textContent;
            document.querySelector('input[name="color"]').value = cells[5].textContent;
            document.querySelector('input[name="stock"]').value = cells[6].textContent;
            document.querySelector('input[name="price"]').value = cells[7].textContent;
            document.querySelector('input[name="product_id"]').value = btn.getAttribute('data-id');
            
            // Change form to update mode
            document.querySelector('.btn-primary').textContent = 'Update Item';
            document.querySelector('form').setAttribute('action', './../back-end/admin-side/update_item.php');
        }
    });

    // Delete button
    tableBody.addEventListener('click', function(e) {
        if (e.target.closest('.delete-btn')) {
            const btn = e.target.closest('.delete-btn');
            const id = btn.getAttribute('data-id');
            
            if (confirm('Delete this product?')) {
                fetch('./../back-end/admin-side/delete_item.php', {
                    method: 'POST',
                    headers: { 'Content-Type': 'application/x-www-form-urlencoded' },
                    body: 'product_id=' + id
                })
                .then(res => res.json())
                .then(data => {
                    if (data.success) {
                        loadProducts();
                        showSuccess(data.message);
                    } else {
                        showError(data.message);
                    }
                })
                .catch(() => showError('Delete failed'));
            }
        }
    });

    // Form submission
    document.getElementById('inventoryForm').addEventListener('submit', function(e) {
        e.preventDefault();
        const formData = new FormData(this);
        
        fetch(this.getAttribute('action'), {
            method: 'POST',
            body: formData
        })
        .then(res => res.json())
        .then(data => {
            if (data.success) {
                showSuccess(data.message);
                bootstrap.Modal.getInstance(document.getElementById('addInventoryModal')).hide();
                loadProducts();
            } else {
                showError(data.message);
            }
        })
        .catch(() => showError('Operation failed'));
    });

    // Reset modal
    document.getElementById('addInventoryModal').addEventListener('hidden.bs.modal', function() {
        document.getElementById('inventoryForm').reset();
        document.querySelector('.btn-primary').textContent = 'Add Item';
        document.querySelector('form').setAttribute('action', './../back-end/admin-side/add_item.php');
    });

    // Simple alert functions
    function showSuccess(message) {
        const alert = document.getElementById('success-alert');
        const msg = document.getElementById('success-alert-message');
        if (msg) msg.textContent = message;
        alert.style.display = 'block';
        setTimeout(() => alert.style.display = 'none', 2000);
    }

    function showError(message) {
        const alert = document.getElementById('error-alert');
        const msg = document.getElementById('error-alert-message');
        if (msg) msg.textContent = message;
        alert.style.display = 'block';
        setTimeout(() => alert.style.display = 'none', 2000);
    }
});