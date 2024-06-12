<?php include 'includes/item-header.php'; 
echo template_header('My Cart');
$ip_add = $getFromU->getRealUserIp();

    if (isset($_POST['calc'])) {
        $products_id = $_POST['product_id'];
        $products_qty = $_POST['product-quantity-spin'];
        $check_product_by_ip_id = $getFromU->update_cart($products_id, $products_qty);
    }
?>

<?php
    if (isset($_POST['remove'])) {
            $ip_add = $getFromU->getRealUserIp();
            $products_id = $_POST['product_id'];
            $delete_id = $getFromU->delete_from_cart_by_id($products_id, $ip_add);
            if ($delete_id) {
                $_SESSION['cart_remove_message'] = "Deleted Sucessfully";
                header ('location: index.php?page=cart', '_self');
            }
        }
?>

        <section id="wrapper">
            <div class="columns container">
                <aside id="notifications">
                    <div class="container">



                    </div>
                </aside>



                <div id="breadcrumb_wrapper">


                    <nav class="breadcrumb ">
                        <div class="container">
                            <ol data-depth="1" itemscope itemtype="http://schema.org/BreadcrumbList">

                                <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                                    <a itemprop="item" href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/">
                                        <span itemprop="name">Home</span>
                                    </a>
                                    <meta itemprop="position" content="1">
                                </li>

                            </ol>
                        </div>
                    </nav>

                </div>


                <div id="columns_inner">

                    <div id="left-column" class="col-xs-12 col-sm-4 col-md-3 hb-animate-element top-to-bottom">


                        <div id="cpleftbanner1" class="left-banner block">
                            <h4 class="block_title hidden-lg-up" data-target="#left_banner_toggle" data-toggle="collapse">Left Banner
                                <span class="pull-xs-right">
                                    <span class="navbar-toggler collapse-icons">
                                        <i class="material-icons add">&#xE313;</i>
                                        <i class="material-icons remove">&#xE316;</i>
                                    </span>
                                </span>
                            </h4>
                            <ul class="block_content collapse" id="left_banner_toggle">
                                <li class="slide cpleftbanner1-container">
                                    <a href="#" title="LeftBanner 1">
                                        <img class="lazyload" src="images/left-banner-1.jpg" alt="LeftBanner 1" title="LeftBanner 1" width="100%" height="100%" />
                                    </a>
                                    <div class="banner-description">
                                        <div class="left-offer-block">
                                            <div class="text1">New trending</div>
                                            <div class="text2">Flats Upto 60% Off</div>
                                        </div>
                                    </div>

                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-featured block">
                            <h4 class="block_title hidden-md-down">Most View Product</h4>
                            <h4 class="block_title hidden-lg-up" data-target="#block_latest_toggle_feature" data-toggle="collapse">Most View Product
                                <span class="pull-xs-right">
                                    <span class="navbar-toggler collapse-icons">
                                        <i class="material-icons add">&#xE313;</i>
                                        <i class="material-icons remove">&#xE316;</i>
                                    </span>
                                </span>
                            </h4>
                            <div class="block_content collapse" id="block_latest_toggle_feature">
                           <div class="products clearfix">

                              <?php 
                                   $getProducts = $getFromU->selectMostViewed();
                                   foreach ($getProducts as $getProduct) {
                                       $product_id = $getProduct->product_id;
                                       $product_title = $getProduct->product_title;
                                       $product_price = $getProduct->product_price;
                                       $product_img1 = $getProduct->product_img1;
                                       $product_img2 = $getProduct->product_img2;
                                       $product_rrp = $getProduct->rrp;
                                       $ribbon = $getProduct->ribbon;
                                       $choice = $getProduct->choice;
                                       $no_stock = $getProduct->no_stock;
                                       $product_ratingnum = $getProduct->ratingnum;
                                       $product_rating = $getProduct->rating;
                                       $no_stock = $getProduct->no_stock;
                                       $products_cat = $getProduct->product_category;
                               ?>
                              <div class="product-item">
                                 <div class="left-part">
                                    <a href="index.php?page=product&product_id=<?php echo $product_id;?>" class="thumbnail product-thumbnail">
                                    <img
                                       class="lazyload"
                                       data-src = "images/<?php echo $product_img1; ?>"
                                       src="images/<?php echo $product_img1; ?>"
                                       height = "90"
                                       width = "80"
                                       alt = "<?php echo $product_title; ?>"
                                       >
                                    </a>
                                    <?php if ($product_rrp > 0) {
                                               $get_product_price = number_format((float)(($product_price/$product_rrp) * 100), 1);
                                               $get_product_final_price = 100 - $get_product_price;
                                               echo "<li class='product-flag discount'>-$get_product_final_price% 
                                                      </li> ";
                                           }?>
                                    <!---ul class="product-flags js-product-flags">
                                       <li class="product-flag discount">-20%</li>
                                       <li class="product-flag new">New</li>
                                    </ul>--->
                                 </div>
                                 <div class="right-part">
                                    <div class="product-description">
                                       <div class="comments_note">
                                          <div class="star_content clearfix">
                                             <div class="star star_on"></div>
                                             <div class="star star_on"></div>
                                             <div class="star star_on"></div>
                                             <div class="star "></div>
                                             <div class="star "></div>
                                          </div>
                                       </div>
                                       <h1 class="h3 product-title" itemprop="name"><a href="index.php?page=product&product_id=<?php echo $product_id;?>"><?php echo substr($product_title, 0, 26);?>...</a></h1>
                                       <div class="product-price-and-shipping">
                                          <span class="price">Kes <?php echo number_format((float)$product_price,2)?></span>
                                          <span class="sr-only">Regular price</span>
                                          <span class="regular-price">Kes <?php echo number_format((float)$product_rrp,2)?></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                                  <?php } ?>








                           </div>
                           <a href="index.php?page=products" class="allproducts">All products</a>
                        </div>
                        </div>

                    </div>



                    <div id="content-wrapper" class="js-content-wrapper left-column col-xs-12 col-sm-8 col-md-9">


                        <section id="main">
                            <div class="topcolumntop">

                            </div>
                            <div class="card-block card-block-title">
                                <h1 class="h1">Shopping Cart</h1>
                            </div>
                            <div class="cart-grid row">
                                <!-- Left Block: cart product informations & shpping -->
                                <div class="cart-grid-body col-xs-12 col-lg-8">
                                    <!-- cart products detailed -->
                                    <div class="card cart-container">
                                        <hr>

                                        <?php
                                          $total = 0;
                                          $records = $getFromU->select_products_by_ip($ip_add);
                                          foreach ($records as $record) {
                                              $products_id = $record->p_id;
                                              $products_qty = $record->qty;
                                              $products_size = $record->size;
                                                                      
                                              $get_prices = $getFromU->viewProductByProductID($products_id);
                                              foreach ($get_prices as $get_price) {
                                                  $products_price = $get_price->product_price;
                                                  $products_img1 = $get_price->product_img1;
                                                  $products_title = $get_price->product_title;

                                                  $sub_total = $products_price * $products_qty;
                                                  $total += $sub_total;

                                              require_once 'mpesa/shipping.php';            

                                      ?>


                                        <div class="cart-overview js-cart" data-refresh-url="">
                                            <ul class="cart-items">
                                                <li class="cart-item">

                                                    <div class="product-line-grid">
                                                        <!--  product left content: image-->
                                                        <div class="product-line-grid-left col-md-2 col-xs-4">
                                                            <span class="product-image media-middle">
                                                                <img class="lazyload" data-src="images/<?php echo $products_img1; ?>" src="images/<?php echo $products_img1; ?>" height="90" width="80" alt="<?php echo $products_title; ?>" loading="lazy" width="80" height="80">
                                                            </span>
                                                        </div>

                                                        <!--  product left body: description -->
                                                        <div class="product-line-grid-body col-md-5 col-xs-8">
                                                            <div class="product-line-info">
                                                                <a class="label" href="index.php?page=product&product_id=<?php echo $products_id;?>" data-id_customization="0"><?php echo substr($products_title, 0, 123); ?>..</a>
                                                            </div>

                                                            <div class="product-line-info  product-price has-discount">
                                                                <div class="current-price">
                                                                    <span class="price">Kes <?php echo number_format((float)$products_price,2)?></span>
                                                                </div>
                                                                <div class="product-discount">
                                                                    <!---span class="discount discount-percentage">
                                                                        -20%
                                                                    </span>--->
                                                                    <span class="regular-price">Kes <?php echo number_format((float)$product_rrp,2)?></span>

                                                                </div>

                                                            </div>

                                                            <br />

                                                            <!---div class="product-line-info">
                                                                <span class="label">Chair Color:</span>
                                                                <span class="value">Grey </span>
                                                            </div>
                                                            <div class="product-line-info">
                                                                <span class="label">Size:</span>
                                                                <span class="value">S </span>
                                                            </div>
                                                            <div class="product-line-info">
                                                                <span class="label">Dimension:</span>
                                                                <span class="value">40x60cm</span>
                                                            </div>-->

                                                        </div>

                                                        <form method="post">
                                                            <!--  product left body: description -->
                                                            <div class="product-line-grid-right product-line-actions col-md-5 col-xs-12">
                                                                <div class="row">
                                                                    <div class="col-xs-4 hidden-md-up"></div>
                                                                    <div class="col-md-10 col-xs-6">
                                                                        <div class="row">
                                                                            <div class="col-md-6 col-xs-6 qty">
                                                                               <input type="hidden" name="product_id" value="<?php echo $products_id; ?>"/>
                                                                                <input class="js-cart-line-product-quantity" data-down-url="" data-up-url="" data-update-url="" data-product-id="1" type="text" inputmode="numeric" min="1" pattern="[1-9]*" value="<?php echo $products_qty; ?>" name="product-quantity-spin" aria-label="<?php echo $products_title; ?>" />
                                                                                <div class="update-btn">
                                                                                    <button type="submit" name="calc">update</button>
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-6 col-xs-2 price">
                                                                                <span class="product-price">
                                                                                    <strong>
                                                                                        Kes <?php echo number_format((float)$total,2)?>
                                                                                    </strong>
                                                                                </span>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <div class="col-md-2 col-xs-2 text-xs-right">
                                                                        <div class="cart-line-product-actions">
                                                                            <button type="submit" name="remove"><i class="fa fa-trash"></i></button>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </form>


                                                        <div class="clearfix"></div>
                                                    </div>

                                                </li>
                                            </ul>
                                        </div>

<?php } } ?>



                                    </div>

                                    <a class="label" href="index.php?page=products">
                                        <i class="material-icons">chevron_left</i>Continue shopping
                                    </a>

                                    <!-- shipping informations -->



                                </div>
                                <!-- Right Block: cart subtotal & cart total -->
                                <div class="cart-grid-right col-xs-12 col-lg-4">

                                    <div class="card cart-summary">





                                        <div class="cart-detailed-totals js-cart-detailed-totals">

                                            <div class="card-block cart-detailed-subtotals js-cart-detailed-subtotals">
                                                <div class="cart-summary-line" id="cart-subtotal-products">
                                                    <span class="label js-subtotal">
                                                        Items: <?php echo $getFromU->count_product_by_ip($ip_add); ?>
                                                    </span>
                                                    <span class="value">
                                                        Kes <?php echo number_format((float)$total,2); ?>
                                                    </span>
                                                </div>
                                                <div class="cart-summary-line" id="cart-subtotal-shipping">
                                                    <span class="label">
                                                        Shipping
                                                    </span>
                                                    <span class="value">
                                                        Kes <?php echo number_format((float)$shipping,2); ?>
                                                    </span>
                                                    <div><small class="value"></small></div>
                                                </div>
                                            </div>


                                            <div class="card-block cart-summary-totals js-cart-summary-totals">


                                                <div class="cart-summary-line">
                                                    <span class="label">Total&nbsp;(tax excl.)</span>
                                                    <span class="value">Kes <?php echo number_format((float)(($total + $shipping) - ($total * 16) / 100),2); ?></span>
                                                </div>
                                                <div class="cart-summary-line cart-total">
                                                    <span class="label">Total (tax incl.)</span>
                                                    <span class="value">Kes <?php echo number_format((float)($total + $shipping),2); ?></span>
                                                </div>



                                                <div class="cart-summary-line">
                                                    <span class="label sub">Taxes:</span>
                                                    <span class="value sub">Kes <?php echo number_format((float)($tax = ($total * 16) / 100),2); ?></span>
                                                </div>


                                            </div>




                                        </div>




                                        <div class="checkout cart-detailed-actions js-cart-detailed-actions card-block">
                                            <div class="text-xs-center">
                                                <a href="index.php?page=checkout" class="btn btn-primary">checkout</a>

                                            </div>
                                        </div>



                                    </div>

                                </div>
                            </div>
                        </section>


                    </div>

                </div>



            </div>
        </section>



        <?php include 'includes/footer.php' ?>

    </main>

    <script type="text/javascript" src="themes/PRS02048/assets/cache/bottom-d56eca6.js"></script>






</body>

</html>