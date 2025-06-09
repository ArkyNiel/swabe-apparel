<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="../assets/css/sidebar.css">


<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark py-5 d-flex flex-column sidebar" style="height: 100vh;">
    <button class="btn btn-link text-white" id="sidebarToggle" style="position: absolute; top: 1rem; left: 1rem; z-index: 1000;">
        <i class="bi bi-list fs-4"></i>
    </button>

    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white flex-grow-1" style="margin-top: 2rem;">
        <h3 class="d-flex align-items-center pb-3 mb-md-0 me-md-auto text-white text-decoration-none">
            <span class="fs-5 d-none d-sm-inline">Swabe Apparel</span>
        </h3>

        <ul class="nav nav-pills flex-column mb-sm-auto mb-0 align-items-center align-items-sm-start w-100">
            <li class="nav-item w-100">
                <a href="main.php?page=dashboard" class="nav-link text-white <?php echo (isset($_GET['page']) && $_GET['page'] == 'dashboard') ? 'active' : ''; ?>">
                    <i class="bi bi-speedometer2 me-2"></i>
                    <span class="ms-1 d-none d-sm-inline">Dashboard</span>
                </a>
            </li>

            <small class="mt-3 ms-0 d-block" style="font-weight: 600; text-transform: uppercase;">Product Management</small>
            <li class="nav-item w-100 mt-3">
                <a href="main.php?page=products" class="nav-link text-white <?php echo (isset($_GET['page']) && $_GET['page'] == 'products') ? 'active' : ''; ?>">
                    <i class="bi bi-box-seam me-2"></i>
                    <span class="ms-1 d-none d-sm-inline">All Products</span>
                </a>
            </li>

            <li class="nav-item w-100 mt-2">
                <a href="main.php?page=categories" class="nav-link text-white <?php echo (isset($_GET['page']) && $_GET['page'] == 'categories') ? 'active' : ''; ?>">
                    <i class="bi bi-tags me-2"></i>
                    <span class="ms-1 d-none d-sm-inline">Categories</span>
                </a>
            </li>

            <li class="nav-item w-100 mt-2">
                <a href="main.php?page=inventory" class="nav-link text-white <?php echo (isset($_GET['page']) && $_GET['page'] == 'inventory') ? 'active' : ''; ?>">
                    <i class="bi bi-box2 me-2"></i>
                    <span class="ms-1 d-none d-sm-inline">Inventory</span>
                </a>
            </li>

            <small class="mt-3 ms-0 d-block" style="font-weight: 600; text-transform: uppercase;">Sales & Orders</small>
            <li class="nav-item w-100 mt-3">
                <a href="main.php?page=orders" class="nav-link text-white">
                    <i class="bi bi-cart3 me-2"></i>
                    <span class="ms-1 d-none d-sm-inline">Orders</span>
                </a>
            </li>

            <li class="nav-item w-100 mt-2">
                <a href="main.php?page=customers" class="nav-link text-white">
                    <i class="bi bi-people me-2"></i>
                    <span class="ms-1 d-none d-sm-inline">Customers</span>
                </a>
            </li>

            <small class="mt-3 ms-0 d-block" style="font-weight: 600; text-transform: uppercase;">Reports</small>
            <li class="nav-item w-100 mt-3">
                <a href="main.php?page=sales-report" class="nav-link text-white">
                    <i class="bi bi-graph-up me-2"></i>
                    <span class="ms-1 d-none d-sm-inline">Sales Report</span>
                </a>
            </li>

            <li class="nav-item w-100 mt-2">
                <a href="main.php?page=inventory-report" class="nav-link text-white">
                    <i class="bi bi-clipboard-data me-2"></i>
                    <span class="ms-1 d-none d-sm-inline">Inventory Report</span>
                </a>
            </li>

            <small class="mt-3 ms-0 d-block" style="font-weight: 600; text-transform: uppercase;">Settings</small>
            <li class="nav-item w-100 mt-3">
                <a href="main.php?page=settings" class="nav-link text-white">
                    <i class="bi bi-gear me-2"></i>
                    <span class="ms-1 d-none d-sm-inline">Settings</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="mt-auto">
        <ul class="nav flex-column align-items-center">
            <li class="nav-item w-100">
                <a href="../back-end/logout.php" class="nav-link text-white">
                    <i class="bi bi-box-arrow-right me-2"></i>
                    <span class="ms-1 d-none d-sm-inline">Logout</span>
                </a>
            </li>
        </ul>
    </div>
</div>

<script>
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.querySelector('.sidebar');
    const sidebarToggle = document.getElementById('sidebarToggle');
    
    sidebarToggle.addEventListener('click', function() {
        sidebar.classList.toggle('collapsed');
    });
});
</script>

<style>
.sidebar {
    transition: all 0.3s ease;
    position: relative;
}

#sidebarToggle {
    background-color: rgba(0, 0, 0, 0.2);
    border-radius: 4px;
    padding: 0.5rem;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
}

#sidebarToggle:hover {
    background-color: rgba(255, 255, 255, 0.1);
}

.nav-link.active {
    background-color: rgba(255, 255, 255, 0.1) !important;
    color: #fff !important;
}

.nav-link:hover {
    background-color: rgba(255, 255, 255, 0.05);
}

// ... rest of your existing styles ...
</style>