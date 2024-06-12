<?php

 require_once 'includes/header.php';       

?>  
<?php 
if (isset($_POST['addProduct'])) {
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
        
        $image_four ="$sku/". $_FILES['image_four']['name'];
        $image_five ="$sku/". $_FILES['image_five']['name'];
        $image_six ="$sku/". $_FILES['image_six']['name'];

        $temp_name1 = $_FILES['image_one']['tmp_name'];
        $temp_name2 = $_FILES['image_two']['tmp_name'];
        $temp_name3 = $_FILES['image_three']['tmp_name'];

        $temp_name4 = $_FILES['image_four']['tmp_name'];
        $temp_name5 = $_FILES['image_five']['tmp_name'];
        $temp_name6 = $_FILES['image_six']['tmp_name'];


        move_uploaded_file($temp_name1, "../images/$image_one");
        move_uploaded_file($temp_name2, "../images/$image_two");
        move_uploaded_file($temp_name3, "../images/$image_three");

        move_uploaded_file($temp_name4, "../images/$image_four");
        move_uploaded_file($temp_name5, "../images/$image_five");
        move_uploaded_file($temp_name6, "../images/$image_six");

        $insert_package = $getFromU->create("products", array("title" => $title, "new_price" => $new_price, "old_price" => $old_price, "brand" => $brand, "sku" => $sku, "weight" => $weight, "store_name" => $store_name, "description" => $description, "features" => $features, "cat_id" => $cat_id, "homecat_id" => $homecat_id, "image_one" => $image_one, "image_two" => $image_two, "image_three" => $image_three, "image_four" => $image_four, "image_five" => $image_five, "image_six" => $image_six, "add_date" => date("Y-m-d H:i:s")));
        
        if ($insert_package) {
            header('Location: inventory.php');
            $_SESSION['new_item_add'] = "Product has been added sucessfully";
        }

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
        <form method="POST" enctype="multipart/form-data">                         
            <div class="container">
                <div class="company_dashboard_body">
                    <p class="howdy_dashboard">Add a new product</p>
                    <a>Fill all the information and click the save button below to add a new product.</a>
                </div>       
                <div class="add_package">
                    <span class="cancel_button" onclick="window.location.href='inventory.php'">Cancel</span>
                    <button class="save_button" type="submit" name="addProduct">Save</button>
                </div> 
                <div class="dashboard_layout">
                    <div class="itemLabelContainer">
                        <div class="item_input">
                            <label>Product Title</label>
                            <input type="text" name="title" placeholder="Type the product title">
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
                        <div class="">
                            <div class="destination_image_layout">
                                <div class="destination_one_image">
                                    <p>Image four</p>
                                    <div class="destination_image_pad">
                                        <input type="file" name="image_four">
                                    </div>
                                </div>
                                <div class="destination_one_image">
                                    <p>Image five</p>
                                    <div class="destination_image_pad">
                                        <input type="file" name="image_five">
                                    </div>
                                </div>
                                <div class="destination_one_image">
                                    <p>Image six</p>
                                    <div class="destination_image_pad">
                                        <input type="file" name="image_six">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="itemLabelAlign">
                            <div class="itemLabel">
                                <div class="item_input">
                                    <label>New Price</label>
                                    <input type="number" name="new_price" placeholder="Actual price">
                                </div>
                            </div>
                            <div class="itemLabel">
                                <div class="item_input">
                                    <label>Old price</label>
                                    <input type="number" name="old_price" placeholder="Price before increase">
                                </div>
                            </div>
                        </div>
                        <div class="itemLabelAlign">
                            <div class="itemLabel">
                                <div class="item_input">
                                    <label>Brand</label>
                                    <input type="text" name="brand" placeholder="Write the product brand">
                                </div>
                            </div>
                            <div class="itemLabel">
                                <div class="item_input">
                                    <label>SKU (<strong>Mandatory and should be unique</strong>)</label>
                                    <input type="text" name="sku" placeholder="e.g SQL23KENADD" required>
                                </div>
                            </div>
                        </div>
                        <div class="itemLabelAlign">
                            <div class="itemLabel">
                                <div class="item_input">
                                    <label>Weight</label>
                                    <input type="text" name="weight" placeholder="Write the product weight">
                                </div>
                            </div>
                            <div class="itemLabel">
                                <div class="item_input">
                                    <label>Name of your store</label>
                                    <input type="text" name="store_name" placeholder="Write the product title">
                                </div>
                            </div>
                        </div>
                        <div class="itemLabelAlign">
                            <div class="itemLabel">
                                <div class="item_input">
                                    <label>Description</label>
                                    <textarea type="text" name="description" id="description" placeholder=""></textarea>
                                </div>
                            </div>
                            <div class="itemLabel">
                                <div class="item_input">
                                    <label>Features</label>
                                    <textarea type="text" name="features" id="features" placeholder="" ></textarea>
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
                              <p>Categories</p>
                            </div>
                            <div class="collection_description">
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
                        <button class="cancel_button" onclick="window.location.href='inventory.php'">Cancel</button>
                        <button class="save_button" type="submit" name="addProduct">Save</button>
                    </div>  
                </div>
        </form>  
    </div>

<?php require_once 'includes/footer.php'; ?>