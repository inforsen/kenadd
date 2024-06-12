<?php require_once 'includes/header.php'; ?>
<?php 
if (!isset($_SESSION['vendor_email'])) {
       header('location: sign-in-vendor.php');
    } else {
        header('location: dashboard.php');
    }

?>
<?php
// Page is set to home (home.php) by default, so when the visitor visits that will be the page they see.
$page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'sign-in-vendor';
// Include and show the requested page
include $page . '.php';
?>