<?php

 require_once 'includes/header.php';
$get_admin = $getFromU->view_dismas_by_email($_SESSION['admin_email']);

    if (!isset($_SESSION['admin_email'])) {
        header('location: sign-in-admin.php');
    }
?>

<div class="rightContainer">
    <nav>
        <div class="comHeader">
            <p>Admin Dashboard</p>
        </div>
        <div class="nav">
            <ul>
                <li class="list_dta"><span class="menu_open" id="open_dash_nav"><a href="javascript:void(0)" onclick="openDashNav()"><i class="fa fa-sliders"></i></a></span></li>
                <li><span class="menu_close" id="close_dash_nav"><a href="javascript:void(0)" onclick="closeDashNav()"><i class="fa fa-star-o"></i></a></span></li>
            </ul>
        </div>
    </nav>

    <div class="container">
        <div class="account-log">
            <p>Coming Soon!</p>  
        </div>
    </div>
    <?php require_once 'includes/footer.php'; ?>
</div>