<?php

 require_once 'includes/header.php';       

?>
<?php
 
    if (isset($_GET['dest_id'])) {
        $dest_id = $_GET['dest_id'];
        $delete_id = $getFromU->del_tour_package($dest_id);
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
          <div class="company_dashboard_body">
                <p class="howdy_dashboard">Your Search Results</p>
                <a>See the list, edit and save infromation right from your dashboard.</a>
            </div>    
            <div class="add_package">
              <button class="save_button" onclick="window.location.href='add-a-product.php'">Add a product</button>
            </div>                       
            <div class="notification_main_africa">
                
              <div class="visit_statistics">
                <?php
                    $get_inventory = $getFromU->countProductsNum("products");
                    $count_inventory = count($get_inventory);
                ?>
                <div class="form_sed">
                  <div class="form_sed_left">
                    <p>Total products: <span class="colc"><?php echo $count_inventory; ?></span></p>
                  </div>
                  <div class="invent_search">
                    <form action="" method="GET">
                      <input type="text" name="q" placeholder="Search an item here" required>
                      <button type="submit">Search</button>
                    </form>
                  </div>
                </div>
                <div class="table_scroll">
                  <table id="expan_table">
                    <tr>
                      <th></th>
                      <th>Product Name</th>
                      <th>Sku</th>
                      <th>Color</th>
                      <th>Price</th>
                      <th>Edit</th>
                      <th>Delete</th>
                    </tr>
                      <?php
                      $q = (isset($_GET['q']) ? $_GET['q'] : '');
                      if ($q!='') {

                          $getProducts = $getFromU->dataSearch($q);
                          foreach ($getProducts as $getProduct) {
                              $product_id = $getProduct->product_id;
                              $title = $getProduct->title;
                              $new_price= $getProduct->product_price;
                              $image_one = $getProduct->image_one;
                              $product_sku = $getProduct->sku;
                      ?>
                    <tr>
                      <td style="width: 11%;font-size:14px;"><div class="product_image"> <img src="../images/<?php echo $image_one; ?>" alt=""> </div></td>
                      <td style="width: 20%;font-size:14px;"><?php echo $title; ?></td>
                      <td style="width: 10%;font-size:14px;"><?php echo $product_sku; ?></td>
                              <td style="width: 10%; font-size: 14px;"><span  id="paid"><input type="color" style="border: 0; outline: 0;border-radius: 50%; cursor: disabled;" value="<?php echo $variation; ?>"></span></td>
                      <td style="width: 15%;font-size:14px;">Ksh <?php echo number_format($product_price); ?></td>
                      <td style="width: 12%;font-size:14px;"><a href="edit-a-product.php?product_id=<?php echo $product_id; ?>"><i class="fa fa-copy"></i> Edit</a></td>
                      <td style="width: 12%;font-size:14px;"><a href="delete-product.php?product_id=<?php echo $product_id; ?>"><i class="fa fa-trash-o"></i> Delete</a></td>
                    </tr>
                  <?php } }?>
                  </table>
                </div>
              </div>
            </div>
        </div>

<?php require_once 'includes/footer.php'; ?>