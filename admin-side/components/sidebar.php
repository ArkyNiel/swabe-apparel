
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="./../assets/css/sidebar.css">
<link rel="stylesheet" href="../assets/bootswatch/css/bootstrap.min.css">

<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark d-flex flex-column sidebar" style="height: 100vh; overflow-y: auto;">
    <!-- Header -->
    <div class="d-flex align-items-center justify-content-between p-3">
        <div class="d-flex align-items-center">
            <i class="fas fa-tshirt text-primary me-2 fs-4" style="color: #ffff !important; "></i>
            <span class="fw-bold fs-5 text-white d-none d-sm-inline" style="text-shadow: none; outline: none !important;">Swabe Apparel</span>
        </div>
        <button class="btn btn-link text-white p-1 d-sm-none" id="sidebarToggle">
            <i class="bi bi-x-lg fs-4"></i>
        </button>
    </div>

    <!-- Navigation -->
    <div class="flex-grow-1 overflow-auto">
        <ul class="nav nav-pills flex-column p-2">

            <!-- Dashboard -->
            <li class="nav-item mb-1">
                <a href="main.php?page=dashboard" class="nav-link text-white px-3 py-2 <?php echo (isset($_GET['page']) && $_GET['page'] == 'dashboard') ? 'active' : ''; ?>">
                    <i class="bi bi-speedometer2 me-2"></i>
                    <span class="d-none d-sm-inline">Dashboard</span>
                </a>
            </li>

            <!-- Product Management Section -->
            <li class="nav-item">
                <div class="px-3 py-2">
                    <small class="text-white fw-bold text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.5px;">
                        <i class="fas fa-boxes me-1"></i>Product Management
                    </small>
                </div>
            </li>
            <li class="nav-item mb-1">
                <a href="main.php?page=information" class="nav-link text-white px-3 py-2 <?php echo (isset($_GET['page']) && $_GET['page'] == 'information') ? 'active' : ''; ?>">
                    <i class="bi bi-info-circle me-2"></i>
                    <span class="d-none d-sm-inline">Information</span>
                </a>
            </li>
            <li class="nav-item mb-1">
                <a href="main.php?page=inventory" class="nav-link text-white px-3 py-2 <?php echo (isset($_GET['page']) && $_GET['page'] == 'inventory') ? 'active' : ''; ?>">
                    <i class="bi bi-box2 me-2"></i>
                    <span class="d-none d-sm-inline">Inventory</span>
                </a>
            </li>

            <!-- Sales & Orders Section -->
            <li class="nav-item mt-3">
                <div class="px-3 py-2">
                    <small class="text-white fw-bold text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.5px;">
                        <i class="fas fa-shopping-cart me-1"></i>Sales & Orders
                    </small>
                </div>
            </li>
            <li class="nav-item mb-1">
                <a href="main.php?page=orders" class="nav-link text-white px-3 py-2 <?php echo (isset($_GET['page']) && $_GET['page'] == 'orders') ? 'active' : ''; ?>">
                    <i class="bi bi-receipt me-2"></i>
                    <span class="d-none d-sm-inline">Orders</span>
                </a>
            </li>
            <li class="nav-item mb-1">
                <a href="main.php?page=add_sales" class="nav-link text-white px-3 py-2 <?php echo (isset($_GET['page']) && $_GET['page'] == 'add_sales') ? 'active' : ''; ?>">
                    <i class="bi bi-plus-circle me-2"></i>
                    <span class="d-none d-sm-inline">Add Sales</span>
                </a>
            </li>
            <li class="nav-item mb-1">
                <a href="main.php?page=customers" class="nav-link text-white px-3 py-2 <?php echo (isset($_GET['page']) && $_GET['page'] == 'customers') ? 'active' : ''; ?>">
                    <i class="bi bi-people me-2"></i>
                    <span class="d-none d-sm-inline">Customers</span>
                </a>
            </li>

            <!-- Reports Section -->
            <li class="nav-item mt-3">
                <div class="px-3 py-2">
                    <small class="text-white fw-bold text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.5px;">
                        <i class="fas fa-chart-line me-1"></i>Reports
                    </small>
                </div>
            </li>
            <li class="nav-item mb-1">
                <a href="main.php?page=sales_report" class="nav-link text-white px-3 py-2 <?php echo (isset($_GET['page']) && $_GET['page'] == 'sales_report') ? 'active' : ''; ?>">
                    <i class="bi bi-graph-up me-2"></i>
                    <span class="d-none d-sm-inline">Sales Report</span>
                </a>
            </li>

            <!-- Settings Section -->
            <li class="nav-item mt-3">
                <div class="px-3 py-2">
                    <small class="text-white fw-bold text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.5px;">
                        <i class="fas fa-cogs me-1"></i>Settings
                    </small>
                </div>
            </li>
            <li class="nav-item mb-1">
                <a href="main.php?page=settings" class="nav-link text-white px-3 py-2 <?php echo (isset($_GET['page']) && $_GET['page'] == 'settings') ? 'active' : ''; ?>">
                    <i class="bi bi-gear me-2"></i>
                    <span class="d-none d-sm-inline">Settings</span>
                </a>
            </li>

            <!-- Customization Section -->
            <li class="nav-item mt-3">
                <div class="px-3 py-2">
                    <small class="text-white fw-bold text-uppercase" style="font-size: 0.7rem; letter-spacing: 0.5px;">
                        <i class="fas fa-palette me-1"></i>Customization
                    </small>
                </div>
            </li>
            <li class="nav-item mb-1">
                <a href="main.php?page=shop_picture" class="nav-link text-white px-3 py-2 <?php echo (isset($_GET['page']) && $_GET['page'] == 'shop_picture') ? 'active' : ''; ?>">
                    <i class="bi bi-image me-2"></i>
                    <span class="d-none d-sm-inline">Shop Picture</span>
                </a>
            </li>
            <li class="nav-item mb-1">
                <a href="main.php?page=top_trends" class="nav-link text-white px-3 py-2 <?php echo (isset($_GET['page']) && $_GET['page'] == 'top_trends') ? 'active' : ''; ?>">
                    <i class="bi bi-fire me-2"></i>
                    <span class="d-none d-sm-inline">Top Trends</span>
                </a>
            </li>
            <li class="nav-item mb-1">
                <a href="main.php?page=featured_product" class="nav-link text-white px-3 py-2 <?php echo (isset($_GET['page']) && $_GET['page'] == 'featured_product') ? 'active' : ''; ?>">
                    <i class="bi bi-star me-2"></i>
                    <span class="d-none d-sm-inline">Featured Product</span>
                </a>
            </li>
        </ul>
    </div>

    <!-- Footer -->
    <div class="p-3">
        <small class="text-white text-center d-block" style="font-size: 0.7rem; outline: none;">© 2024 Swabe Apparel</small>
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
    overflow-y: auto;
}

#sidebarToggle {
    padding: 0.5rem;
    width: 40px;
    height: 40px;
    display: flex;
    align-items: center;
    justify-content: center;
    position: absolute;
    top: 1rem;
    left: 0.5rem;
    z-index: 1000;
    transition: all 0.3s ease;
}

#sidebarToggle:hover {
    transform: scale(1.1);
}

.nav-link {
    transition: all 0.3s ease;
    border-radius: 8px;
    margin: 2px 0;
}

.nav-link:hover {
    background-color: rgba(255, 255, 255, 0.1) !important;
    transform: translateX(5px);
}

.nav-link.active {
    background-color: rgba(255, 255, 255, 0.15) !important;
    color: #fff !important;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.2);
}

/* Custom scrollbar for sidebar */
.sidebar::-webkit-scrollbar {
    width: 6px;
}

.sidebar::-webkit-scrollbar-track {
    background: rgba(255, 255, 255, 0.1);
}

.sidebar::-webkit-scrollbar-thumb {
    background: rgba(255, 255, 255, 0.3);
    border-radius: 3px;
}

.sidebar::-webkit-scrollbar-thumb:hover {
    background: rgba(255, 255, 255, 0.5);
}
</style>