<?php

 require_once 'includes/header.php';       

    if (isset($_GET['product_id'])) {
        $product_id             = $_GET['product_id'];
        $view_product      = $getFromU->viewVendorsProductByProductID($product_id);

        $title= $view_product->title;
        $description= $view_product->description;
        $new_price= $view_product->new_price;
        $old_price= $view_product->old_price;
        $sku= $view_product->sku;
        $image_one= $view_product->image_one;
        $image_two= $view_product->image_two;
        $image_three= $view_product->image_three;

        $productimg1= $view_product->image_one;
        $productimg2= $view_product->image_two;
        $productimg3= $view_product->image_three;

        $cat_id= $view_product->cat_id;
        $brand= $view_product->brand;
        $weight= $view_product->weight;
        $store_name= $view_product->store_name;
        $features= $view_product->features;
        $vendor_id= $view_product->vendor_id;
        
    }


    if (isset($_POST['save_edit'])) {
        $title = $_POST['title'];
        $new_price = $_POST['new_price'];        
        $old_price = $_POST['old_price'];
        $brand = $_POST['brand'];
        $sku = $_POST['sku'];
        $weight = $_POST['weight'];
        $store_name = $_POST['store_name'];
        $description = $_POST['description'];
        $features = $_POST['features'];
        $cat_id = $_POST['cat_id'];
        $homecat_id = $_POST['homecat_id'];

        $path = "../images/$sku";
        if (!is_dir($path)) {
            mkdir($path);
        }

        $image_one = "$sku/". $_FILES['image_one']['name'];
        $image_two ="$sku/". $_FILES['image_two']['name'];
        $image_three ="$sku/". $_FILES['image_three']['name'];
        $productimgs = "$sku/";

        if ($image_one == $productimgs && $image_two ==$productimgs && $image_three ==$productimgs) {
            $image_one = $productimg1;
            $image_two = $productimg2;
            $image_three = $productimg3;
        } 
        else{

            $temp_name1 = $_FILES['image_one']['tmp_name'];
            $temp_name2 = $_FILES['image_two']['tmp_name'];
            $temp_name3 = $_FILES['image_three']['tmp_name'];

            move_uploaded_file($temp_name1, "../images/$image_one");
            move_uploaded_file($temp_name2, "../images/$image_two");
            move_uploaded_file($temp_name3, "../images/$image_three");
        }

        $insert_package = $getFromU->create("products", array("title" => $title, "new_price" => $new_price, "old_price" => $old_price, "brand" => $brand, "sku" => $sku, "weight" => $weight, "store_name" => $store_name, "description" => $description, "features" => $features, "cat_id" => $cat_id, "homecat_id" => $homecat_id, "image_one" => $image_one, "image_two" => $image_two, "image_three" => $image_three, "vendor_id" => $vendor_id, "add_date" => date("Y-m-d H:i:s")));

        $deleteVendorProduct = $getFromU->deleteVendorProduct($product_id);
        
        if ($insert_package) {
            header('Location: inventory.php');
            $_SESSION['new_item_add'] = "Product has been added sucessfully";
        }

    }
?>
<div class="rightContainer">
    <nav>
        <div class="comHeader">
            <p>Vendor Dashboard</p>
        </div>
        <div class="nav">
            <ul>
                <li class="list_dta"><span class="menu_open" id="open_dash_nav"><a href="javascript:void(0)" onclick="openDashNav()"><i class="fa fa-sliders"></i></a></span></li>
                <li><span class="menu_close" id="close_dash_nav"><a href="javascript:void(0)" onclick="closeDashNav()"><i class="fa fa-star-o"></i></a></span></li>
            </ul>
        </div>
    </nav> 
        <form method="POST" enctype="multipart/form-data">                         
            <div class="container">
                <div class="company_dashboard_body">
                    <p class="howdy_dashboard">Edit this product</p>
                    <a>Fill all the information and click the save button below to add a new product.</a>
                </div>       
                <div class="add_package">
                    <span class="cancel_button" onclick="window.location.href='approvals.php'">Cancel</span>
                    <button class="save_button" type="submit" name="save_edit">Save</button>
                </div> 
                <div class="dashboard_layout">
                    <div class="itemLabelContainer">
                        <div class="item_input">
                            <label>Product Title</label>
                            <input type="text" name="title" placeholder="<?php echo $title; ?>" value="<?php echo $title; ?>">
                        </div>
                        <div class="item_input">
                            <label>Product Images</label>
                            <div class="destination_image_layout">
                                <div class="destination_one_image">
                                    <p>Image one</p>
                                    <div class="destination_image_pad">
                                        <input type="file" name="image_one">
                                    </div>
                                </div>
                                <div class="destination_one_image">
                                    <p>Image two</p>
                                    <div class="destination_image_pad">
                                        <input type="file" name="image_two">
                                    </div>
                                </div>
                                <div class="destination_one_image">
                                    <p>Image three</p>
                                    <div class="destination_image_pad">
                                        <input type="file" name="image_three">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="itemLabelAlign">
                            <div class="itemLabel">
                                <div class="item_input">
                                    <label>New Price</label>
                                    <input type="number" name="new_price" placeholder="<?php echo $new_price; ?>" value="<?php echo $new_price; ?>">
                                </div>
                            </div>
                            <div class="itemLabel">
                                <div class="item_input">
                                    <label>Old price</label>
                                    <input type="number" name="old_price" placeholder="<?php echo $old_price; ?>" value="<?php echo $old_price; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="itemLabelAlign">
                            <div class="itemLabel">
                                <div class="item_input">
                                    <label>Brand</label>
                                    <input type="text" name="brand" placeholder="<?php echo $brand; ?>" value="<?php echo $brand; ?>">
                                </div>
                            </div>
                            <div class="itemLabel">
                                <div class="item_input">
                                    <label>SKU (<strong>Mandatory and should be unique</strong>)</label>
                                    <input type="text" name="sku" placeholder="<?php echo $sku; ?>" value="<?php echo $sku; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="itemLabelAlign">
                            <div class="itemLabel">
                                <div class="item_input">
                                    <label>Weight</label>
                                    <input type="text" name="weight" placeholder="<?php echo $weight; ?>" value="<?php echo $weight; ?>">
                                </div>
                            </div>
                            <div class="itemLabel">
                                <div class="item_input">
                                    <label>Name of your store</label>
                                    <input type="text" name="store_name" placeholder="<?php echo $store_name; ?>" value="<?php echo $store_name; ?>">
                                </div>
                            </div>
                        </div>
                        <div class="itemLabelAlign">
                            <div class="itemLabel">
                                <div class="item_input">
                                    <label>Description</label>
                                    <textarea type="text" name="description" id="description" value="<?php echo $description; ?>"><?php echo $description; ?></textarea>
                                </div>
                            </div>
                            <div class="itemLabel">
                                <div class="item_input">
                                    <label>Features</label>
                                    <textarea type="text" name="features" id="features" value="<?php echo $features; ?>"><?php echo $features; ?></textarea>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="catLabelContainer">
                        <div class="collection_styling">
                            <div class="collection_name_main">
                              <p>Home Categories</p>
                            </div>
                            <div class="collection_description">                                
                                <div class="product_catpromotion">
                                  <?php
                                    $homecategories = $getFromU->viewHomeCatFromTable("homecat");
                                    foreach ($homecategories as $homecategory) {
                                        $homecat_id = $homecategory->homecat_id;
                                        $homecat_name = $homecategory->homecat_name;
                                  ?>

                                  <div class="product_col_name">
                                    <input type="checkbox" name="homecat_id" value="<?php echo $homecat_id; ?>" >
                                    <label><?php echo $homecat_name; ?></label>
                                  </div>                        
                                <?php } ?>
                                </div>
                            </div>
                            <div class="collection_name_main">
                              <p>Categories <strong>(Reselect product category)</strong></p>
                            </div>
                            <div class="collection_description">
                                <?php
                                    $categories = $getFromU->viewProductCategor("categories", $cat_id);
                                    foreach ($categories as $category) {
                                        $cat_name = $category->cat_name;
                                    ?>
                                  <div class="product_col_name">
                                    <p ><strong>Currently:</strong> <?php echo $cat_name; ?> </p>
                                  </div>                        
                                <?php } ?>
                                <div class="product_promotion">
                                  <?php
                                    $categories = $getFromU->viewAllFromTable("categories");
                                    foreach ($categories as $category) {
                                        $cat_id = $category->cat_id;
                                        $cat_name = $category->cat_name;
                                  ?>
                                  <div class="product_col_name">
                                    <input type="checkbox" name="cat_id" value="<?php echo $cat_id; ?>" >
                                    <label><?php echo $cat_name; ?></label>
                                  </div>                        
                                <?php } ?>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div>
                    <div class="add_package_but">
                        <button class="cancel_button" onclick="window.location.href='approvals.php'">Cancel</button>
                        <button class="save_button" type="submit" name="save_edit">Save</button>
                    </div>  
                </div>
        </form>  
    </div>

<?php require_once 'includes/footer.php'; ?>