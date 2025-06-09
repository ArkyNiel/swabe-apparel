<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Swabe Apparel - Admin Dashboard</title>
    <link rel="stylesheet" href="../assets/bootswatch/css/bootstrap.min.css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
</head>
<body>
    <div class="d-flex">
        <?php include('components/sidebar.php'); ?>
        
        <!-- Main Content Area -->
        <div class="flex-grow-1">
            <?php
            $page = isset($_GET['page']) ? $_GET['page'] : 'dashboard';
            
            // page copntent from links folder
            $page_path = "links/{$page}.php";
            if (file_exists($page_path)) {
                include($page_path);
            } else {
                include('links/dashboard.php');
            }
            ?>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>