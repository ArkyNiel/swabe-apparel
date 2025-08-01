<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
<link rel="stylesheet" href="./../assets/css/sidebar.css">
<link rel="stylesheet" href="../assets/bootswatch/css/bootstrap.min.css">


<div class="col-auto col-md-3 col-xl-2 px-sm-2 px-0 bg-dark py-5 d-flex flex-column sidebar" style="height: 100vh;">
    <button class="btn btn-link text-white" id="sidebarToggle" style="margin-left: 15px; background-color: none; border: none; outline: none;">
        <i class="bi bi-list fs-4"></i>
    </button>

    <div class="d-flex flex-column align-items-center align-items-sm-start px-3 pt-2 text-white flex-grow-1" style="margin-top: 2rem; overflow-y: auto;">
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

            <li class="nav-item w-100 mt-2">
                <a href="main.php?page=information" class="nav-link text-white <?php echo (isset($_GET['page']) && $_GET['page'] == 'category') ? 'active' : ''; ?>">
                    <i class="bi bi-tags me-2"></i>
                    <span class="ms-1 d-none d-sm-inline">Information</span>
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
                <a href="main.php?page=sales_report" class="nav-link text-white">
                    <i class="bi bi-graph-up me-2"></i>
                    <span class="ms-1 d-none d-sm-inline">Sales Report</span>
                </a>
            </li>

            <small class="mt-3 ms-0 d-block" style="font-weight: 600; text-transform: uppercase;">Settings</small>
            <li class="nav-item w-100 mt-3">
                <a href="main.php?page=settings" class="nav-link text-white">
                    <i class="bi bi-gear me-2"></i>
                    <span class="ms-1 d-none d-sm-inline">Settings</span>
                </a>
            </li>

            <!-- Customization Section -->
            <small class="mt-3 ms-0 d-block" style="font-weight: 600; text-transform: uppercase;">Customization</small>
            <li class="nav-item w-100 mt-3">
                <a href="main.php?page=shop_picture" class="nav-link text-white <?php echo (isset($_GET['page']) && $_GET['page'] == 'shop_picture') ? 'active' : ''; ?>">
                    <i class="bi bi-image me-2"></i>
                    <span class="ms-1 d-none d-sm-inline">Shop Picture</span>
                </a>
            </li>

            <li class="nav-item w-100 mt-2">
                <a href="main.php?page=top_trends" class="nav-link text-white <?php echo (isset($_GET['page']) && $_GET['page'] == 'top_trends') ? 'active' : ''; ?>">
                    <i class="bi bi-graph-up-arrow me-2"></i>
                    <span class="ms-1 d-none d-sm-inline">Top Trends</span>
                </a>
            </li>

            <li class="nav-item w-100 mt-2">
                <a href="main.php?page=featured_product" class="nav-link text-white <?php echo (isset($_GET['page']) && $_GET['page'] == 'featured_product') ? 'active' : ''; ?>">
                    <i class="bi bi-star me-2"></i>
                    <span class="ms-1 d-none d-sm-inline">Featured Product</span>
                </a>
            </li>
        </ul>
    </div>

    <div class="mt-5">
       
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