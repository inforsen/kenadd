<?php require_once "includes/item-header.php"; 
echo template_header('Order Successful');?>


         <section id="wrapper">
            <div class="columns container">
            <aside id="notifications">
               <div class="container">
               </div>
            </aside>
            <div id="breadcrumb_wrapper">
               <nav class="breadcrumb ">
                  <div class="container">
                     <ol data-depth="2" itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                           <a itemprop="item" href="">
                           <span itemprop="name">Home</span>
                           </a>
                           <meta itemprop="position" content="1">
                        </li>
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                           <a itemprop="item">
                           <span itemprop="name">Order confirmation</span>
                           </a>
                           <meta itemprop="position" content="2">
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
            <div id="content-wrapper" class="js-content-wrapper left-column right-column col-sm-4 col-md-6">
            <section id="main">
               <section id="content-hook_order_confirmation" class="card">
                  <div class="card-block">
                     <div class="row">
                        <div class="col-md-12">
                           <h3 class="h1 card-title">
                              <i class="material-icons rtl-no-flip done">&#xE876;</i>Your order is confirmed
                           </h3>
                           <p>
                              Your order on Kenadd Store is complete and will be sent very soon. An email has been sent to the ricdzee@gmail.com address. For any questions or for further information, please contact our <a href="index.php?page=contact-us" rel="nofollow">customer support</a>.
                           </p>
                        </div>
                     </div>
                  </div>
               </section>
               <section id="content" class="page-content page-order-confirmation card">
                  <div class="card-block">
                     <div class="row">
                        <div id="order-items" class="col-md-8">
                           <h3 class="card-title h3 col-md-6 col-12">Order items</h3>
                           <h3 class="card-title h3 col-md-2 text-md-center _desktop-title">Unit price</h3>
                           <h3 class="card-title h3 col-md-2 text-md-center _desktop-title">Quantity</h3>
                           <h3 class="card-title h3 col-md-2 text-md-center _desktop-title">Total products</h3>
                           

                  

                           <div class="order-confirmation-table">
                                       <?php
            $total = 0;  

            $customer_session = $_SESSION['customer_email'];
            $get_customer = $getFromU->view_customer_by_email($customer_session);
            $customer_id = $get_customer->customer_id;

            /*$customer_order = $getFromU->viewSessionOrders('customer_orders');
            $tokensess = $customer_order->token_session;*/

            $get_orders = $getFromU->view_customer_orders_by_id($customer_id);
            foreach ($get_orders as $get_order) {
                $prod_id = $get_order->product_id;
                $due_amount = $get_order->due_amount;
                $invoice_no = $get_order->invoice_no;
                
                $product_qty = $get_order->qty;
                $shipping_method = $get_order->shipping_method;


                $records = $getFromU->viewProductByProductID($prod_id);
                foreach ($records as $record) {
                  $product_id = $record->product_id;
                  $product_price = $record->product_price;
                  $products_img1 = $record->product_img1;
                  $product_title = $record->product_title;
                  $sku = $record->sku;

                  $sub_total = $product_price * $product_qty;
                  $total += $sub_total;

                  require_once 'mpesa/shipping.php';            

          ?>
                              <div class="order-line row">
                                 <div class="col-sm-2 col-xs-3">
                                    <span class="image">
                                    <img data-src="images/<?php echo $products_img1; ?>" src="images/<?php echo $products_img1; ?>" class="lazyload" loading="lazy" />
                                    </span>
                                 </div>
                                 <div class="col-sm-4 col-xs-9 details">
                                    <span><?php echo $product_title; ?></span>
                                 </div>
                                 <div class="col-sm-6 col-xs-12 qty">
                                    <div class="row">
                                       <div class="col-xs-4 text-sm-center text-xs-left">Kes <?php echo number_format((float)($product_price), 2); ?></div>
                                       <div class="col-xs-4 text-xs-center"><?php echo $product_qty; ?></div>
                                       <div class="col-xs-4 text-xs-center bold">Kes <?php echo number_format((float)($sub_total), 2); ?></div>
                                    </div>
                                 </div>
                              </div>
      <?php } }?>
                              <hr>
                              <table>
                                 <tr>
                                    <td>Subtotal</td>
                                    <td>Kes <?php echo number_format((float)$total,2); ?></td>
                                 </tr>
                                 <tr>
                                    <td>Shipping and handling</td>
                                    <td>Kes <?php echo number_format((float)$shipping,2); ?></td>
                                 </tr>
                                 <tr>
                                    <td><span class="text-uppercase">Total&nbsp;(tax excl.)</span></td>
                                    <td>Kes <?php echo number_format((float)(($total + $shipping) - ($total * 16) / 100),2); ?></td>
                                 </tr>
                                 <tr class="total-value font-weight-bold">
                                    <td><span class="text-uppercase">Total (tax incl.)</span></td>
                                    <td>Kes <?php echo number_format((float)($total + $shipping),2); ?></td>
                                 </tr>
                                 <tr class="sub taxes">
                                    <td colspan="2"><span class="label">Tax:</span>&nbsp;<span class="value">Kes <?php echo number_format((float)($tax = ($total * 16) / 100),2); ?></span></td>
                                 </tr>
                              </table>
                           </div>



                        </div>
                        <div id="order-details" class="col-md-4">
                           <h3 class="h3 card-title">Order details:</h3>
                           <ul>
                              <li id="order-reference-value">Order reference: <?php echo $invoice_no; ?></li>
                              <li>Payment method: M-Pesa Pay</li>
                              
                           </ul>
                        </div>
                     </div>
                  </div>
               </section>




               <footer class="page-footer">
               <!-- Footer content -->
               </footer>
            </section>
            </div>
            </div>
            </div>       
         </section>
         <?php include 'includes/footer.php'; ?>
      </main>
      <script type="text/javascript" src="themes/PRS02048/assets/cache/bottom-d56eca6.js" ></script>
   </body>
</html>