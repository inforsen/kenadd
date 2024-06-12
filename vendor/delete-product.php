<?php require_once '../core/init.php'; ?>
<?php
	if (isset($_GET['product_id'])) {
    $product_id = $_GET['product_id'];
    $delete_id = $getFromU->deleteVendorsproduct($product_id);
      header ('location: inventory.php', '_self');
    }
?>
