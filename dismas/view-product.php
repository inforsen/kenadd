<?php

require_once 'includes/header.php';  
if (isset($_GET['product_id'])) {
        $the_product_id = $_GET['product_id'];

        $get_products = $getFromU->viewVendorProductByProductID($the_product_id);
        //var_dump($get_products);

        foreach ($get_products as $get_product) {
            $product_id = $get_product->product_id;
            $title= $get_product->title;
            $new_price= $get_product->new_price;
            $old_price= $get_product->old_price;
            $sku= $get_product->sku;
            $brand= $get_product->brand;
            $image_one= $get_product->image_one;
            $image_two= $get_product->image_two;
            $image_three= $get_product->image_three;
            $description= $get_product->description;
            $features= $get_product->features;
            $store_name= $get_product->store_name;
            $product_description = strip_tags($description);
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
            <p>All Store Products Pending Approval</p>
            <a>See the list, edit and save infromation right from your dashboard.</a>
        </div>                      
        <div class="notification_main_africa">
            
          <div class="productAlign">
              <div class="prodImg">                
                <div class="prodImgMain">
                  <img id="main" src="../images/<?php echo $image_one; ?>" onerror="this.style.display='none'">
                </div>
                <div class="prodThumbs">
                  <div class="prodThumbsImg">
                    <img onclick="thumbnail(this)" src="../images/<?php echo $image_one; ?>" onerror="this.style.display='none'">
                  </div>
                  <div class="prodThumbsImg">
                    <img onclick="thumbnail(this)" src="../images/<?php echo $image_two; ?>" onerror="this.style.display='none'">
                  </div>
                  <div class="prodThumbsImg">
                    <img onclick="thumbnail(this)" src="../images/<?php echo $image_three; ?>" onerror="this.style.display='none'">
                  </div>
                </div>
              </div>
              <div class="prodTxt">
                <h3><?php echo $title?></h3>
                <a class="byStore">BY <span><?php echo $store_name; ?></span></a>
                <div class="prodTxtAlign">
                  <div class="prodPrice">
                    <span>Ksh</span>
                    <p><?php echo number_format($new_price); ?></p>
                  </div>
                </div>
                <div class="sku">
                  <p>SKU: <span><?php echo $sku; ?></span></p>
                </div>
                <div class="shortDesc">
                  <?php echo $description; ?>
                </div>
              </div>
            </div>            
            <div class="add_package_but">
                <button class="cancel_button" onclick="window.location.href='approvals.php'">Cancel</button>
                <button class="save_button" onclick="window.location.href='edit-vendor-product.php?product_id=<?php echo $product_id; ?>'">Edit</button>
            </div>  
          </div>
        </div>
    </div>
<script type="text/javascript">
    function thumbnail(imgs) {
    var main = document.getElementById('main');
    main.src = imgs.src
    main.parentElement.style.display = 'block';
}
</script>
    <?php } }  ?>
<?php require_once 'includes/footer.php'; ?>