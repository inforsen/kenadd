<?php

require_once 'includes/header.php';       
$vendor_email = $_SESSION['vendor_email'];
$get_vendor = $getFromU->view_vendor_by_email($vendor_email);
$vendor_id = $get_vendor->vendor_id;

    $per_page = 25;
    if (isset($_GET['$page'])) {
        $page = $_GET['$page'];
    }else{
        $page = 1;
    }
    $start_from = ($page - 1) * $per_page;
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
      <div class="dashHeader">
            <p>All Your Approved Products</p>
            <a>See the list, edit and save infromation right from your dashboard.</a>
        </div>    
        <div class="add_package">
          <button class="save_button" onclick="window.location.href='add-a-product.php'">Add a product</button>
        </div>                       
        <div class="notification_main_africa">
            
          <div class="visit_statistics">
            <?php
                $get_inventory = $getFromU->countVendorProductsNum("products", $vendor_id);
                $count_inventory = count($get_inventory);
            ?>
            <div class="form_sed">
              <div class="form_sed_left">
                <p>Total products: <span class="colc"><?php echo $count_inventory; ?></span></p>
              </div>
              <div class="invent_search">
                <form action="search.php" method="GET">
                  <input type="text" name="q" placeholder="Search an item here" required>
                  <button type="submit">Search</button>
                </form>
              </div>
            </div>
            <div class="table_scroll">
              <table id="expan_table">
                <tr>
                  <th>Image</th>
                  <th>Product Name</th>
                  <th>Sku</th>
                  <th>Price</th>
                </tr>
                  <?php
                      $view_products = $getFromU->viewVendorProductsFromTable('products', $start_from, $per_page, $vendor_id);
                      $count_products = count($view_products);
                      if ($count_products == 0) {
                      ?>
                      <div class="account-log">
                        <a>No products Here</a>
                      </div>
                  <?php
                  } else {
                      foreach ($view_products as $view_product) {
                          $product_id = $view_product->product_id;
                          $title = $view_product->title;
                          $image_one = $view_product->image_one;
                          $product_sku = $view_product->sku;
                          $new_price= $view_product->new_price;
                  ?>
                <tr>
                  <td style="width: 6%;font-size:14px;"><div class="product_image"> <img src="../images/<?php echo $image_one; ?>" alt=""> </div></td>
                  <td style="width: 20%;font-size:14px;"><?php echo $title; ?></td>
                  <td style="width: 10%;font-size:14px;"><?php echo $product_sku; ?></td>
                  <td style="width: 15%;font-size:14px;">Ksh <?php echo number_format($new_price); ?></td>
                </tr>
              <?php } } ?>
              </table>

                <div class="number-list">
              <?php
                  $total_pages = $getFromU->countProducts("products", $per_page);
                  if ($total_pages >=2) {
              ?>
                  <a class="<?php if(isset($_GET['$page']) == 1) { echo 'active';}?>" href="inventory.php?$page=1">1</a>
              <?php
                      for ($i = 2; $i < $total_pages; $i++) {
              ?>
                  <a class="<?php if(isset($_GET['$page']) == $i) { echo 'active';}?>" href="inventory.php?$page=<?php echo $i; ?>"><?php echo substr($i, 0, 5); ?></a>
              <?php } ?>
                  <a class="<?php if(isset($_GET['$page']) == $total_pages) { echo 'active';}?>" href="inventory.php?$page=<?php echo $total_pages; ?>">Last</a>
              <?php } ?>
              </div>
            </div>
          </div>
        </div>
    </div>
<?php require_once 'includes/footer.php'; ?>
</div>