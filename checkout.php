<?php require_once 'includes/item-header.php';
echo template_header('Checkout'); 

    if (!isset($_SESSION['customer_email'])) {
        header('location: index.php?page=login');
    }

        $customer_session = $_SESSION['customer_email'];
        $get_customer = $getFromU->view_customer_by_email($customer_session);
        $c_id = $get_customer->customer_id;
        $customer_firstname = $get_customer->customer_firstname;
        $customer_lastname = $get_customer->customer_lastname;
        $customer_email = $get_customer->customer_email;
        $customer_country = $get_customer->customer_country;
        $customer_city = $get_customer->customer_city;
        $customer_zip = $get_customer ->customer_zip;
        $customer_contact = $get_customer->customer_contact;
        $customer_address = $get_customer->customer_address;
        $customer_birthday = $get_customer->birthday;
        $customer_pass = $get_customer->customer_pass;
    
    $customer_name = $customer_firstname .' '.$customer_lastname;
      
    
?>
            
    <section id="wrapper">
      
      <div class="columns container">

                <div id="breadcrumb_wrapper">

          
      <nav data-depth="3" class="breadcrumb">
         <div class="container">
          <ol>
          
                
                <li>
                                        <a href="index.php"><span>Home</span></a>
                            </li>
            
                
                <li>
                                        <a href="index.php?page=my-account"><span>Your account</span></a>
                            </li>
            
                
                <li>
                                        <a><span>Update your Address</span></a>
                            </li>
            
              
        </ol>
        </div>
      </nav>
    </div>
  </div>
      
<form action="send_pesa.php" id="customer-form" class="js-customer-form" method="post">
    <div class="container"> 
      
      <div id="columns_inner" class="row">
        
        
  <div class="col-md-8">
    
    

  <section id="main">
        <?php if (isset($success)): ?>
            <div class="account-add">
              <?php echo $success; ?>
            </div>
        <?php endif ?> 


          <section id="content" class="page-content" > 
            <aside id="notifications">
              <div class="container"></div>
            </aside>

            
              
              <div>  


                      
                            
                        
                <div class="form-group row ">
                  <label class="col-md-3 form-control-label required" for="field-firstname">First name</label>
                  <div class="col-md-6 js-input-column">
                    <input id="field-firstname" class="form-control" name="firstname" type="text" value="<?php echo $customer_firstname?>" required>
                      <span class="form-control-comment">
                        Only twenty five (25) characters, are allowed.
                      </span>
                  </div>
                  <div class="col-md-3 form-control-comment"></div>
                </div>    
                        
                <div class="form-group row ">
                  <label class="col-md-3 form-control-label required" for="field-lastname">Last name</label>
                  <div class="col-md-6 js-input-column">        
                    <input id="field-lastname" class="form-control" name="lastname" type="text" value="<?php echo $customer_lastname?>" required>
                      <span class="form-control-comment">Only twenty five (25) characters, are allowed.</span>
                  </div>
                  <div class="col-md-3 form-control-comment"></div>
                </div>


                      
                            
                        
                <div class="form-group row ">
                  <label class="col-md-3 form-control-label required" for="field-email">Email</label>
                    <div class="col-md-6 js-input-column">
                        <input id="field-email" class="form-control" name="email" type="email" value="<?php echo $customer_email?>" required>
                    </div>
                  <div class="col-md-3 form-control-comment"></div>
                </div>
                      
                            
                        
                <div class="form-group row ">
                  <label class="col-md-3 form-control-label required" for="field-phone">Phone</label>
                    <div class="col-md-6 js-input-column">
                        <input id="field-phone" class="form-control" name="phone" type="text" value="<?php echo $customer_contact?>" required>
                    </div>
                  <div class="col-md-3 form-control-comment"></div>
                </div>
                      
                            
                        
                <div class="form-group row ">
                  <label class="col-md-3 form-control-label required" for="field-address">Address</label>
                    <div class="col-md-6 js-input-column">
                        <input id="field-address" class="form-control" name="address" type="text" value="<?php echo $customer_address?>" required>
                    </div>
                  <div class="col-md-3 form-control-comment"></div>
                </div>
                      
                            
                        
                <div class="form-group row ">
                  <label class="col-md-3 form-control-label required" for="field-zip">Zip Code</label>
                    <div class="col-md-6 js-input-column">
                        <input id="field-zip" class="form-control" name="zip" type="number" value="<?php echo $customer_zip?>" required>
                    </div>
                  <div class="col-md-3 form-control-comment"></div>
                </div>
                      
                            
                        
                <div class="form-group row ">
                  <label class="col-md-3 form-control-label required" for="field-city">City</label>
                    <div class="col-md-6 js-input-column">
                        <input id="field-city" class="form-control" name="city" type="text" value="<?php echo $customer_city?>" required>
                    </div>
                  <div class="col-md-3 form-control-comment"></div>
                </div>
                      
                            
                        
                <div class="form-group row ">
                  <label class="col-md-3 form-control-label required" for="field-country">Country</label>
                    <div class="col-md-6 js-input-column">
                        <input id="field-country" class="form-control" name="country" type="text" value="<?php echo $customer_country?>" required>
                    </div>
                  <div class="col-md-3 form-control-comment"></div>
                </div>


              
                
              
            </section>


    
      <footer class="page-footer">
        
  
    
        <a href="index.php?page=my-account" class="account-link">
          <i class="material-icons">&#xE5CB;</i>
          <span>Back to your account</span>
        </a>
        <a href="index.php" class="account-link">
          <i class="material-icons">&#xE88A;</i>
          <span>Home</span>
        </a>

  

      </footer>
    

  </section>


    
  </div>


  <div class="col-md-4">
            
            <section id="js-checkout-summary" class="card js-cart" data-refresh-url="h">
                            <div class="card-block">

                                <div class="cart-summary-top js-cart-summary-top">

                                </div>




                                <div class="cart-summary-products js-cart-summary-products">
                                    <p>1 item</p>

                                    <p>
                                        <a href="#" data-toggle="collapse" data-target="#cart-summary-product-list" class="js-show-details">
                                            show details
                                            <i class="material-icons">expand_more</i>
                                        </a>
                                    </p>

                                    <?php
                                          $records = $getFromU->select_products_by_ip($ip_add);
                                          foreach ($records as $record) {
                                              $prooduct_id = $record->p_id;
                                              $prooduct_qty = $record->qty;
                                              $prooduct_size = $record->size;
                                                                      
                                              $get_prices = $getFromU->viewProductByProductID($prooduct_id);
                                              foreach ($get_prices as $get_price) {
                                                  $prooduct_price = $get_price->product_price;
                                                  $prooduct_img1 = $get_price->product_img1;
                                                  $prooduct_title = $get_price->product_title;

                                                  $sub_total = $products_price * $products_qty;
                                                  $total += $sub_total;

                                              require_once 'mpesa/shipping.php';            

                                      ?>

                                    <div class="collapse in" id="cart-summary-product-list">
                                        <ul class="media-list">
                                            <li class="media">
                                                <div class="media-left">
                                                    <a href="index.php?page=product&product_id=<?php echo $prooduct_id;?>">
                                                        <img class="media-object lazyload" data-src="images/<?php echo $prooduct_img1; ?>" src="himages/<?php echo $prooduct_img1; ?>" alt="<?php echo $prooduct_title; ?>" loading="lazy" width="80" height="80">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <span class="product-name">
                                                        <a href="index.php?page=product&product_id=<?php echo $prooduct_id;?>" target="_blank" rel="noopener noreferrer nofollow"><?php echo substr($prooduct_title, 0, 43); ?>..</a>
                                                    </span>
                                                    <span class="product-quantity">x1</span>
                                                    <span class="product-price pull-xs-right">Kes <?php echo number_format((float)$total,2)?></span>

                                                    <div class="product-line-info product-line-info-secondary text-muted">
                                                        <span class="label">Chair Color:</span>
                                                        <span class="value">Grey </span>
                                                    </div>
                                                    <div class="product-line-info product-line-info-secondary text-muted">
                                                        <span class="label">Size:</span>
                                                        <span class="value">S </span>
                                                    </div>
                                                    <div class="product-line-info product-line-info-secondary text-muted">
                                                        <span class="label">Dimension:</span>
                                                        <span class="value">40x60cm</span>
                                                    </div>
                                                </div>

                                            </li>
                                        </ul>
                                    </div>

              <?php } } ?>

                                </div>




                                <div class="cart-summary-line cart-summary-subtotals" id="cart-subtotal-products">

                                    <span class="label">
                                        Subtotal
                                    </span>

                                    <span class="value">
                                        KES <?php echo number_format((float)$total,2); ?>
                                    </span>
                                </div>
                                <div class="cart-summary-line cart-summary-subtotals" id="cart-subtotal-shipping">

                                    <span class="label">
                                        Shipping
                                    </span>

                                    <span class="value">
                                        Kes <?php echo number_format((float)$shipping,2); ?>
                                    </span>
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


                                <div style="padding-top: 30px; border-top: 1px solid #e5e5e5; margin-top: 30px;">
                    <div id="payment-option-3-container" class="payment-option clearfix">
                      <span class="custom-radio float-xs-left">
                        <input class="ps-shown-by-js " id="payment-option-3" value="Safaricom M-pesa" data-module-name="ps_cashondelivery" name="payment-option" type="radio"
                          checked>
                        <span></span>
                      </span>
                      
                      <label for="payment-option-3">
                        <span>Pay by <span style="color: green;">Safaricom M-pesa</span></span>
                      </label>

                    </div>
                  </div>

                  <div id="payment-option-3-additional-information" class="js-additional-information definition-list additional-information ps-hidden "
                    >

                    <div style="padding: 20px 0;">
                      <div class="form-group row " style="text-align: left;">
                        <label class="form-control-label required" style="float: left;" for="field-phone"><strong>Phone Number</strong></label>
                        <div class="col-md-6 js-input-column">
                          <input id="field-phone" class="form-control" name="phone" type="tel" value="" maxlength="10" data-maxlength="10" placeholder="e.g 07... or 01..." autocomplete="email" pattern=".{5,10}" required>
                          <input type="hidden" name="amount" value="<?php echo ($total + $shipping); ?>">
                        </div>
                        <div class="col-md-3 form-control-comment"></div>
                      </div>  
                    </div>

                    <section id="ps_cashondelivery-paymentOptions-additionalInformation">
                      <p>You receive an alert to the safaricom number you have provided above. Please follow the promtps to complete your purchase. <br/><br/> If this fails, you can directly deposit funds to the business' M-Pesa Paybill Number <strong>--- ---</strong> Use your phone number as the account number.</p>
                    </section>
                  </div>


                            </div>







                        </section>

                        <footer class="form-footer clearfix">
                  <!--input type="hidden" name="submitCreate" value="1">-->
                    <button class="btn btn-primary form-control-submit float-xs-right" name="submitCreate" data-link-action="save-customer" type="submit">
                      Place Your Order
                    </button>
                </footer>
          </div>


        
      </div>
        </div>
      </form>
      </section>
<?php require_once 'includes/footer.php'; ?>
    </main>
    <script type="text/javascript" src="themes/PRS02048/assets/cache/bottom-d56eca6.js"></script>

    

    
      
    
  </body>

</html>