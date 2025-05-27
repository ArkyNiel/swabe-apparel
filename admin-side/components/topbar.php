<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

<nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
    <div class="container-fluid">
        <div class="d-flex align-items-center">
            <span class="navbar-brand mb-0 h1">Dashboard</span>
        </div>

        <div class="d-flex align-items-center">
            <div class="dropdown me-3">
                <button class="btn btn-link text-dark position-relative" type="button" id="notificationDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <i class="bi bi-bell fs-5"></i>
                    <span class="position-absolute top-0 start-100 translate-middle badge rounded-pill bg-danger">
                        3
                    </span>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="notificationDropdown">
                    <li><h6 class="dropdown-header">Notifications</h6></li>
                    <li><a class="dropdown-item" href="#">New order received</a></li>
                    <li><a class="dropdown-item" href="#">Low stock alert</a></li>
                    <li><a class="dropdown-item" href="#">New customer registered</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item text-center" href="#">View all</a></li>
                </ul>
            </div>

            <div class="dropdown">
                <button class="btn btn-link text-dark d-flex align-items-center" type="button" id="userDropdown" data-bs-toggle="dropdown" aria-expanded="false">
                    <img src="../assets/images/admin-avatar.png" alt="Admin" class="rounded-circle me-2" style="width: 32px; height: 32px;">
                    <span class="d-none d-md-inline">Admin User</span>
                    <i class="bi bi-chevron-down ms-1"></i>
                </button>
                <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                    <li><a class="dropdown-item" href="./profile.php"><i class="bi bi-person me-2"></i>Profile</a></li>
                    <li><a class="dropdown-item" href="./settings.php"><i class="bi bi-gear me-2"></i>Settings</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="../back-end/logout.php"><i class="bi bi-box-arrow-right me-2"></i>Logout</a></li>
                </ul>
            </div>
        </div>
    </div>
</nav>

<style>
.navbar {
    padding: 0.5rem 1rem;
    height: 60px;
    display: block;
    background-color: #fff;
}

.navbar-brand {
    font-size: 1.25rem;
    font-weight: 600;
}

.dropdown-menu {
    border: none;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
}

.dropdown-item {
    padding: 0.5rem 1rem;
}

.dropdown-item:hover {
    background-color: #f8f9fa;
}

.btn-link {
    text-decoration: none;
    padding: 0.5rem;
}

.btn-link:hover {
    background-color: #f8f9fa;
    border-radius: 0.375rem;
}

.badge {
    font-size: 0.5rem;
    padding: 0.25rem 0.5rem;
}
</style>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
