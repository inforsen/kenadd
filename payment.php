<?php require_once "includes/item-header.php";
echo template_header('Cartsen® Order Payment');

if (!isset($_SESSION['customer_email'])) {
  header('location: index.php?page=cart');
}

$customer_session = $_SESSION['customer_email'];
$get_customer = $getFromU->view_customersByemail($customer_session);
$customer_id = $get_customer->customer_id;
                    
if (isset($_POST['address_id'])) {
    $_SESSION['address_id'] = $_POST['address_id'];
    header('location: index.php?page=order_shipping');
} 
 ?>

        
<aside id="notifications">
  <div class="container"></div>
</aside>
      
<section id="checkout">            
  <section id="wrapper">
  <nav data-depth="1" class="breadcrumb">
     <div class="container">
      <ol>
        <li>
          <span>Home</span>
        </li>
      </ol>
    </div>
  </nav>
        

  <div class="container"> 
  <div id="columns_inner">  
  <div id="content-wrapper" class="js-content-wrapper">
      
      
  <section id="content">
    <div class="row">
    <div class="col-md-8">






            <section id= "checkout-payment-step" class= "checkout-step -current -reachable js-current-step">
              <h1 class="step-title js-step-title h3">
                <i class="material-icons rtl-no-flip done">&#xE876;</i>
                <span class="step-number">4</span>
                Payment
                <span class="step-edit text-muted"><i class="material-icons edit">mode_edit</i> Edit</span>
              </h1>

              <div class="content">
                <div style="display:none" class="js-cart-payment-step-refresh"></div>  

                <form method="POST" action="send_mpesa.php">
                  <div class="payment-options ">
                    <div>
                      <div id="payment-option-1-container" class="payment-option clearfix">
                        <span class="custom-radio float-xs-left">
                          <input class="ps-shown-by-js " id="payment-option-1" data-module-name="ps_wirepayment" name="payment-option" type="radio" value="Pay by bank wire" required>
                          <span></span>
                        </span>

                        <label for="payment-option-1">
                          <span>Pay by bank wire</span>
                        </label>
                      </div>
                    </div>

                    <?php
                      $address_id = $_SESSION['address_id'];
                      $get_address = $getFromU->viewPayAddressByID($address_id);
                      //var_dump($get_addresses);
                        $alias = $get_address->alias;
                        $company = $get_address->company;
                        $address = $get_address->address;
                        $address_compliment = $get_address->address_compliment;
                        $city = $get_address->city;
                        $state = $get_address->state;
                        $zip = $get_address->zip;
                        $country = $get_address->country;
                        $phone = $get_address->phone;
                        $firstname = $get_address->firstname;
                        $lastname = $get_address->lastname;
                          
                              $address_name = $firstname .' '.$lastname;
                    ?>

                    <div id="payment-option-1-additional-information" class="js-additional-information definition-list additional-information ">
                      <section>
                        <p>Please transfer the invoice amount to our bank account. You will receive our order confirmation by email containing bank details and order number.</p>

                        <div class="" id="bankwire-modal" tabindex="-1" role="dialog" aria-labelledby="Bankwire information" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h2>Bankwire</h2>
                              </div>

                              <div class="modal-body">
                                <p>Payment is made by transfer of the invoice amount to the following account:</p>                      
                                <dl>
                                  <dt>Amount</dt>
                                  <dd>Kes <?php echo number_format((float)($tax = ($total * 16) / 100),2); ?> </dd>
                                  <dt>Payee</dt>
                                  <dd><?php echo $customer_name; ?></dd>
                                  <dt>Send your check to this address</dt>
                                  <dd>Cartsen Aviators Business Park, Cossim Fedha, Opposite Nyayo Estate Gate B &mdash; Store B24, Embakasi</dd>
                                </dl>                      
                              </div>
                            </div>
                          </div>
                        </div>
                      </section>
                    </div>
                  

                  <!--div id="payment-option-2-additional-information" class="js-additional-information definition-list additional-information ps-hidden">


                    <?php
                      /*$address_id = $_SESSION['address_id'];
                      $get_address = $getFromU->viewPayAddressByID($address_id);
                      //var_dump($get_addresses);
                        $alias = $get_address->alias;
                        $company = $get_address->company;
                        $address = $get_address->address;
                        $address_compliment = $get_address->address_compliment;
                        $city = $get_address->city;
                        $state = $get_address->state;
                        $zip = $get_address->zip;
                        $country = $get_address->country;
                        $phone = $get_address->phone;
                        $firstname = $get_address->firstname;
                        $lastname = $get_address->lastname;
                          
                              $address_name = $firstname .' '.$lastname;
*/
                    ?>





                    <section>
                      <p>Please send us your check including the following details:
                        <dl>
                          <dt>Amount</dt>
                          <dd>Kes <?php // echo number_format((float)($tax = ($total * 16) / 100),2); ?> </dd>
                          <dt>Payee</dt>
                          <dd><?php //echo $customer_name; ?></dd>
                          <dt>Send your check to this address</dt>
                          <dd><?php //echo $address_name; ?></dd>
                        </dl>
                      </p>
                    </section>
                  </div>--->
                  
                  <!---div id="pay-with-payment-option-2-form" class="js-payment-option-form  ps-hidden ">
                    <form id="payment-form" method="POST" action="index.phpmodule/ps_checkpayment/validation">
                      <button style="display:none" id="pay-with-payment-option-2" type="submit"></button>
                    </form>
                  </div>-->

                  <div>
                    <div id="payment-option-3-container" class="payment-option clearfix">
                      <span class="custom-radio float-xs-left">
                        <input class="ps-shown-by-js " id="payment-option-3" value="Safaricom M-pesa" data-module-name="ps_cashondelivery" name="payment-option" type="radio"
                          required>
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
                      <p>You receive an alert to the safaricom number you have provided above. Please follow the promtps to complete your purchase. Please note that the account reads <strong style="color: red;">Abinuzi Store</strong>.<br/><br/> If this fails, you can directly deposit funds to the business' M-Pesa Till Number <strong>863 8690</strong>.</p>
                    </section>
                  </div>
                  
                  <!--div id="pay-with-payment-option-3-form" class="js-payment-option-form  ps-hidden ">
                    <form id="payment-form" method="POST" action="index.phpmodule/ps_cashondelivery/validation">
                      <button style="display:none" id="pay-with-payment-option-3" type="submit"></button>
                    </form>
                  </div>--->
                </div>


                <div id="conditions-to-approve" class="js-conditions-to-approve">
                  <ul>
                    <li>
                      <div class="float-xs-left">
                        <span class="custom-checkbox">
                          <input  id    = "conditions_to_approve[terms-and-conditions]"
                                  name  = "conditions_to_approve[terms-and-conditions]"
                                  required
                                  type  = "checkbox"
                                  value = "1"
                                  class = "ps-shown-by-js"
                          >
                          <span><i class="material-icons rtl-no-flip checkbox-checked">&#xE5CA;</i></span>
                        </span>
                      </div>
                      <div class="condition-label">
                        <label class="js-terms" for="conditions_to_approve[terms-and-conditions]">
                          I agree to the <a href="index.php?page=terms-and-conditions-of-use" id="cta-terms-and-conditions-0">terms of service</a> and will adhere to them unconditionally.
                        </label>
                      </div>
                <p class="ps--by-js">By confirming the order, you certify that you have read and agree with all of the conditions below:</p>
                    </li>
                  </ul>
                </div>  
            
                <div id="payment-confirmation" class="js-payment-confirmation">
                  <div class="ps-shown-by-js">
                    <button type="submit" class="btn btn-primary center-block disabled" name="SubmitOrder">
                      Place order
                    </button>
                  </div>
                  <div class="ps-hidden-by-js"></div>
                </div> 

              </form>

              </div>
            </section>
      
    </div>

































    <div class="col-md-4">      
      <section id="js-checkout-summary" class="card js-cart" data-refresh-url="">
        <div class="card-block">
          <div class="cart-summary-top js-cart-summary-top"></div>
          <div class="cart-summary-products js-cart-summary-products">
              <p><?php echo $getFromU->count_product_by_ip($ip_add); ?> items</p>
              <p><a href="#" data-toggle="collapse" data-target="#cart-summary-product-list" class="js-show-details">show details<i class="material-icons">expand_more</i></a></p>
              
              <div class="collapse" id="cart-summary-product-list">
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

              ?>
              
                  <ul class="media-list">
                      <li class="media">
                          <div class="media-left">
                              <a href="" title="">
                                <img class="media-object" src="images/<?php echo $prooduct_img1; ?>" alt="" loading="lazy">
                              </a>
                          </div>
                          <div class="media-body">
                              <span class="product-name">
                                <a href="" target="_blank" rel="noopener noreferrer nofollow"><?php echo substr($prooduct_title, 0, 43); ?>..</a>
                              </span>
                              <span class="product-quantity">x<?php echo $prooduct_qty; ?></span>
                              <span class="product-price float-xs-right">Kes <?php echo number_format((float)$prooduct_price,2)?></span>
                              <br/>
                          </div>
                      </li>
                  </ul>
              

              <?php } } ?>
              </div>



          </div>


          <div class="card-block cart-summary-subtotals-container js-cart-summary-subtotals-container">
              <div class="cart-summary-line cart-summary-subtotals" id="cart-subtotal-products">
                  <span class="label">Subtotal</span>
                  <span class="value"><?php echo number_format((float)$total,2); ?></span>
              </div>
              <div class="cart-summary-line cart-summary-subtotals" id="cart-subtotal-shipping">
                  <span class="label">Shipping</span>
                  <span class="value">Kes <?php echo number_format((float)$shipping,2); ?></span>
              </div>
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
    

    
        
      <div class="block-promo">
        <div class="cart-voucher js-cart-voucher">
          
          <p class="promo-code-button display-promo">
            <a class="collapse-button" href="#promo-code">
              Have a promo code?
            </a>
          </p>

          <div id="promo-code" class="collapse">
            <div class="promo-code">
              
                <form action="" data-link-action="add-voucher" method="post">
                  <input type="hidden" name="token" value="">
                  <input type="hidden" name="addDiscount" value="1">
                  <input class="promo-input" type="text" name="discount_name" placeholder="Promo code">
                  <button type="submit" class="btn btn-primary"><span>Add</span></button>
                </form>
              

              
                <div class="alert alert-danger js-error" role="alert">
                  <i class="material-icons">&#xE001;</i><span class="ml-1 js-error-text"></span>
                </div>
              

              <a class="collapse-button promo-code-button cancel-promo" role="button" data-toggle="collapse" data-target="#promo-code" aria-expanded="true" aria-controls="promo-code">
                Close
              </a>
            </div>
          </div>

                </div>
      </div>
    
    

  </section>











      
                                <div class="blockreassurance_product">
                                    <div>
                                        <span class="item-product"><img class="svg" src="modules/security.svg"></span>
                                        <span class="block-title" style="color:#000000;">Security policy</span>
                                        <p style="color:#000000;">We value the trust that our customers, associates, representatives and service providers place in us when they give us personal information. We believe that privacy is more than an issue of compliance and endeavor to manage personal information in accordance with our core value of respect for an individual.</p>
                                    </div>
                                    <div class="clearfix"></div>
                                </div>
    </div>
    </div>
  </section>

      
    </div>


          
        </div>
          </div>
        
        </section>
    </section>
<?php require_once 'includes/footer.php'; ?>

    </main>

        <script type="text/javascript" src="themes/cartsen/assets/cache/bottom-e7108447.js" ></script>


    

    
      
    
  </body>

</html>