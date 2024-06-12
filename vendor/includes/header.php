<?php require_once '../core/init.php'; ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="author" content="">
        <meta name="description" content="">
        <meta name="keywords" content="">
        <meta name="theme-color" content="">
        <meta name="msapplication-TileColor" content="">
        <meta name="msapplication-navbutton-color" content="">
        <meta name="apple-mobile-web-app-status-bar-style" content="">
        <link rel="icon" type="image/png" href="../images/favicon.png">
        <link rel="stylesheet" type="text/css" href="assets/css/styles.css?v=<?php echo time()?>" >
        <link rel="stylesheet" type="text/css" href="assets/css/responsive.css?v=<?php echo time()?>" >
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
        <link href="https://fonts.googleapis.com/css2?family=Enriqueta&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@300&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=Kanit:wght@300&display=swap" rel="stylesheet">
        <script src="assets/tinymce/tinymce.min.js"></script>
        <script>tinymce.init({ selector:'#description', height: 180 });</script>
        <script>tinymce.init({ selector:'#features', height: 180 });</script>
        <title>The Dashboard</title>
    </head>
    <body>
        <section class="headerContainer">
            <div class="menuContainer" id="dash_menu">
                <div class="panelData">
                    <p>Kenadd Store</p>
                    <a><strong>Role:</strong> Owner</a>
                </div>
                <div class="leftDataContent">
                    <div class="leftData">
                        <h4>Start</h4>
                        <a href="dashboard.php"><i class="fa fa-language"></i>Dashboard</a>
                    </div>
                    <div class="leftData">
                        <h4>Organize and Manage</h4>
                        <a href="inventory.php"><i class="fa fa-life-ring"></i>My Inventory</a>
                        <a href="waiting-approval.php"><i class="fa fa-life-ring"></i>Waiting approval</a>
                        <a href="store-orders.php"><i class="fa fa-sitemap"></i>Customer Orders</a>
                        <a href="coupon.php"><i class="fa fa-creative-commons"></i>Coupons</a>
                    </div>
                    <div class="leftData">
                        <h4>Extras</h4>
                        <a href="logout.php"><i class="fa fa-dot-circle-o"></i>Logout</a>
                    </div>
                </div>
            </div>