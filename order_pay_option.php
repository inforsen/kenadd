<?php include 'includes/item-header.php'; ?>

    
      
<aside id="notifications">
  <div class="container">
    
    
    
    </div>
</aside>

<section id="wrapper">
      
      <div class="container">
        <div id="columns_inner">
              
                <section id="content">
                      <div class="topcolumntop">
                            
                        </div>
                               
                        <div id="breadcrumb_wrapper" class="">       
                          
                            
<nav class="breadcrumb ">
  <div class="container">
    <ol data-depth="1" itemscope="" itemtype="http://schema.org/BreadcrumbList">
              
                      <li itemprop="itemListElement" itemscope="" itemtype="http://schema.org/ListItem">
              <a itemprop="item" href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/">
                  <span itemprop="name">Home</span>
              </a>
              <meta itemprop="position" content="1">
            </li>
                  
          </ol>
  </div>
</nav>
                          
                        </div>
                         
                        <div class="col-md-8">
                          
                              
  <section id="checkout-personal-information-step" class="checkout-step -reachable -complete -clickable">
    <h1 class="step-title js-step-title h3">
      <i class="material-icons rtl-no-flip done"></i>
      <span class="step-number">1</span>
      Personal Information
      <span class="step-edit text-muted"><i class="material-icons edit">mode_edit</i> Edit</span>
    </h1>

    <div class="content">
      
  

  
    <p class="identity">
            Connected as <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/identity">Jadolo Manza</a>.
    </p>
    <p>
            Not you? <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/?mylogout=">Log out</a>
    </p>
          <p><small>If you sign out now, your cart will be emptied.</small></p>
    
    <div class="clearfix">
      <form method="GET" action="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/order">
        <button class="continue btn btn-primary float-xs-right" name="controller" type="submit" value="order">
          Continue
        </button>
      </form>

    </div>

  
    </div>
  </section>


  
  <section id="checkout-addresses-step" class="checkout-step -reachable -complete -clickable">
    <h1 class="step-title js-step-title h3">
      <i class="material-icons rtl-no-flip done"></i>
      <span class="step-number">2</span>
      Addresses
      <span class="step-edit text-muted"><i class="material-icons edit">mode_edit</i> Edit</span>
    </h1>

    <div class="content">
      
  <div class="js-address-form">
    <form method="POST" action="//prestashop.coderplace.com/PRS02/PRS02048/demo/en/order?id_address=0" data-refresh-url="//prestashop.coderplace.com/PRS02/PRS02048/demo/en/order?ajax=1&amp;action=addressForm">

              <p>
                    The selected address will be used both as your personal address (for invoice) and as your delivery address.
                  </p>
      
              <div id="delivery-addresses" class="address-selector js-address-selector">
          
      <article class="js-address-item address-item selected" id="id_address_delivery-address-14">
      <header>
        <label class="radio-block">
          <span class="custom-radio">
            <input type="radio" name="id_address_delivery" value="14" checked="">
            <span></span>
          </span>
          <span class="address-alias">My Address</span>
          <div class="address">Jadolo Manza<br>124klux qs<br>Idaho Falls, Idaho 12458<br>United States</div>
        </label>
      </header>
      <hr>
      <footer class="address-footer">
                  <a class="edit-address text-muted" data-link-action="edit-address" href="//prestashop.coderplace.com/PRS02/PRS02048/demo/en/order?id_address=14&amp;editAddress=delivery&amp;token=54de7a86aa627f4743a0578a6e7571dc">
            <i class="material-icons edit"></i>Edit
          </a>
          <a class="delete-address text-muted" data-link-action="delete-address" href="//prestashop.coderplace.com/PRS02/PRS02048/demo/en/order?id_address=14&amp;deleteAddress=1&amp;token=54de7a86aa627f4743a0578a6e7571dc">
            <i class="material-icons delete"></i>Delete
          </a>
              </footer>
    </article>
        <p>
      <button class="ps-hidden-by-js form-control-submit center-block" type="submit" style="display: none;">Save</button>
    </p>
  
        </div>

                  <p class="alert alert-danger js-address-error" name="alert-delivery" style="display: none">Your address is incomplete, please update it.</p>
        
        <p class="add-address">
          <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/order?newAddress=delivery"><i class="material-icons"></i>add new address</a>
        </p>

                  <p>
            <a data-link-action="different-invoice-address" href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/order?use_same_address=0">
              Billing address differs from shipping address
            </a>
          </p>
        
      
      
              <div class="clearfix">
          <button type="submit" class="btn btn-primary continue pull-xs-right" name="confirm-addresses" value="1">
              Continue
          </button>
          <input type="hidden" id="not-valid-addresses" class="js-not-valid-addresses" value="">
        </div>
      
    </form>
  </div>

    </div>
  </section>


  
  <section id="checkout-delivery-step" class="checkout-step -reachable -complete -clickable">
    <h1 class="step-title js-step-title h3">
      <i class="material-icons rtl-no-flip done"></i>
      <span class="step-number">3</span>
      Shipping Method
      <span class="step-edit text-muted"><i class="material-icons edit">mode_edit</i> Edit</span>
    </h1>

    <div class="content">
      
  <div id="hook-display-before-carrier">
    
  </div>

  <div class="delivery-options-list">
          <form class="clearfix" id="js-delivery" data-url-update="//prestashop.coderplace.com/PRS02/PRS02048/demo/en/order?ajax=1&amp;action=selectDeliveryOption" method="post">
        <div class="form-fields">
          
            <div class="delivery-options">
                                <div class="row delivery-option js-delivery-option">
                    <div class="col-sm-1">
                      <span class="custom-radio pull-xs-left">
                        <input type="radio" name="delivery_option[14]" id="delivery_option_2" value="2," checked="">
                        <span></span>
                      </span>
                    </div>
                    <label for="delivery_option_2" class="col-sm-11 delivery-option-2">
                      <div class="row">
                        <div class="col-sm-5 col-xs-12">
                          <div class="row carrier carrier-hasLogo">
                                                        <div class="col-xs-3 carrier-logo">
                                <img class="lazyload" data-src="/PRS02/PRS02048/demo/img/s/2.jpg" alt="My carrier" src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/themes/PRS02048/assets/img/megnor/home_default_loading.gif" loading="lazy">
                            </div>
                                                        <div class="col-xs-9">
                              <span class="h6 carrier-name">My carrier</span>
                            </div>
                          </div>
                        </div>
                        <div class="col-sm-4 col-xs-12">
                          <span class="carrier-delay">Delivery next day!</span>
                        </div>
                        <div class="col-sm-3 col-xs-12">
                          <span class="carrier-price">$7.00</span>
                        </div>
                      </div>
                    </label>
                  </div>
                  <div class="row carrier-extra-content js-carrier-extra-content">
                    
                  </div>
                  <div class="clearfix"></div>
                          </div>
          
          <div class="order-options">
            <div id="delivery">
              <label for="delivery_message">If you would like to add a comment about your order, please write it in the field below.</label>
              <textarea rows="2" cols="120" id="delivery_message" name="delivery_message"></textarea>
            </div>

                        
          </div>
        </div>
        <button type="submit" class="continue btn btn-primary pull-xs-right" name="confirmDeliveryOption" value="1">
          Continue
        </button>
      </form>
      </div>

  <div id="hook-display-after-carrier">
    
  </div>

  <div id="extra_carrier"></div>

    </div>
  </section>


  
  <section id="checkout-payment-step" class="checkout-step -current -reachable js-current-step -clickable">
    <h1 class="step-title js-step-title h3">
      <i class="material-icons rtl-no-flip done"></i>
      <span class="step-number">4</span>
      Payment
      <span class="step-edit text-muted"><i class="material-icons edit">mode_edit</i> Edit</span>
    </h1>

    <div class="content">
      

  

  <div style="display:none" class="js-cart-payment-step-refresh"></div>

  
    <div class="payment-options ">
                  <div>
          <div id="payment-option-1-container" class="payment-option clearfix">
                        <span class="custom-radio pull-xs-left">
              <input class="ps-shown-by-js " id="payment-option-1" data-module-name="ps_wirepayment" name="payment-option" type="radio" required="">
              <span></span>
            </span>
                        <form method="GET" class="ps-hidden-by-js" style="display: none;">
                              <button class="ps-hidden-by-js" type="submit" name="select_payment_option" value="payment-option-1" style="display: none;">
                  Choose
                </button>
                          </form>

            <label for="payment-option-1">
              <span>Pay by bank wire</span>
                          </label>

          </div>
        </div>

                  <div id="payment-option-1-additional-information" class="js-additional-information definition-list additional-information ps-hidden " style="display: none;">
            <section>
  <p>
    Please transfer the invoice amount to our bank account. You will receive our order confirmation by email containing bank details and order number.
          </p>

  <div class="modal fade" id="bankwire-modal" tabindex="-1" role="dialog" aria-labelledby="Bankwire information" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">×</span>
          </button>
          <h2>Bankwire</h2>
        </div>
        <div class="modal-body">
          <p>Payment is made by transfer of the invoice amount to the following account:</p>
          
<dl>
    <dt>Amount</dt>
    <dd>$417.00 (tax incl.)</dd>
    <dt>Name of account owner</dt>
    <dd>___________</dd>
    <dt>Please include these details</dt>
    <dd>___________</dd>
    <dt>Bank name</dt>
    <dd>___________</dd>
</dl>
          
        </div>
      </div>
    </div>
  </div>
</section>

          </div>
        
        <div id="pay-with-payment-option-1-form" class="js-payment-option-form  ps-hidden " style="display: none;">
                      <form id="payment-payment-option-1-form" method="POST" action="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/module/ps_wirepayment/validation">
                            <button style="display:none" id="pay-with-payment-option-1" type="submit"></button>
            </form>
                  </div>
                        <div>
          <div id="payment-option-2-container" class="payment-option clearfix">
                        <span class="custom-radio pull-xs-left">
              <input class="ps-shown-by-js " id="payment-option-2" data-module-name="ps_checkpayment" name="payment-option" type="radio" required="">
              <span></span>
            </span>
                        <form method="GET" class="ps-hidden-by-js" style="display: none;">
                              <button class="ps-hidden-by-js" type="submit" name="select_payment_option" value="payment-option-2" style="display: none;">
                  Choose
                </button>
                          </form>

            <label for="payment-option-2">
              <span>Pay by Check</span>
                          </label>

          </div>
        </div>

                  <div id="payment-option-2-additional-information" class="js-additional-information definition-list additional-information ps-hidden " style="display: none;">
            <section>
  <p>Please send us your check including the following details:
    </p><dl>
      <dt>Amount</dt>
      <dd>$417.00 </dd>
      <dt>Payee</dt>
      <dd>___________</dd>
      <dt>Send your check to this address</dt>
      <dd>___________</dd>
    </dl>
  <p></p>
</section>

          </div>
        
        <div id="pay-with-payment-option-2-form" class="js-payment-option-form  ps-hidden " style="display: none;">
                      <form id="payment-payment-option-2-form" method="POST" action="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/module/ps_checkpayment/validation">
                            <button style="display:none" id="pay-with-payment-option-2" type="submit"></button>
            </form>
                  </div>
                        <div>
          <div id="payment-option-3-container" class="payment-option clearfix">
                        <span class="custom-radio pull-xs-left">
              <input class="ps-shown-by-js " id="payment-option-3" data-module-name="ps_cashondelivery" name="payment-option" type="radio" required="">
              <span></span>
            </span>
                        <form method="GET" class="ps-hidden-by-js" style="display: none;">
                              <button class="ps-hidden-by-js" type="submit" name="select_payment_option" value="payment-option-3" style="display: none;">
                  Choose
                </button>
                          </form>

            <label for="payment-option-3">
              <span>Pay by Cash on Delivery</span>
                          </label>

          </div>
        </div>

                  <div id="payment-option-3-additional-information" class="js-additional-information definition-list additional-information ps-hidden " style="display: none;">
            <section id="ps_cashondelivery-paymentOptions-additionalInformation">
  <p>You pay for the merchandise upon delivery</p>
</section>

          </div>
        
        <div id="pay-with-payment-option-3-form" class="js-payment-option-form  ps-hidden " style="display: none;">
                      <form id="payment-payment-option-3-form" method="POST" action="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/module/ps_cashondelivery/validation">
                            <button style="display:none" id="pay-with-payment-option-3" type="submit"></button>
            </form>
                  </div>
            </div>

      <p class="ps-hidden-by-js" style="display: none;">
            By confirming the order, you certify that you have read and agree with all of the conditions below:
    </p>

    <form id="conditions-to-approve" class="js-conditions-to-approve" method="GET">
      <ul>
                  <li>
            <div class="pull-xs-left">
              <span class="custom-checkbox">
                <input id="conditions_to_approve[terms-and-conditions]" name="conditions_to_approve[terms-and-conditions]" required="" type="checkbox" value="1" class="ps-shown-by-js">
                <span><i class="material-icons rtl-no-flip checkbox-checked"></i></span>
              </span>
            </div>
            <div class="condition-label">
              <label class="js-terms" for="conditions_to_approve[terms-and-conditions]">
                I agree to the <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/content/3-terms-and-conditions-of-use" id="cta-terms-and-conditions-0">terms of service</a> and will adhere to them unconditionally.
              </label>
            </div>
          </li>
              </ul>
    </form>
  
  
  <div id="payment-confirmation" class="js-payment-confirmation">
    <div class="ps-shown-by-js">
      <button type="submit" class="btn btn-primary center-block disabled" disabled="disabled">
        Place order
      </button>
          </div>
    <div class="ps-hidden-by-js" style="display: none;">
          </div>
  </div>

  

  <div class="modal fade" id="modal">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
        <div class="js-modal-content"></div>
      </div>
    </div>
  </div>

    </div>
  </section>



                          
                        </div>
                        <div class="col-md-4">

                          
                            <section id="js-checkout-summary" class="card js-cart" data-refresh-url="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/cart?ajax=1&amp;action=refresh">
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

  
    <div class="collapse in" id="cart-summary-product-list">
      <ul class="media-list">
                  <li class="media">
  <div class="media-left">
    <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/beds-mattresses/21-109-hummingbird-printed-t-shirt.html#/5-color-grey/19-dimension-40x60cm" title="Round coffee table, basse ronde vintage noyer massif">
              <img class="media-object ls-is-cached lazyloaded" data-src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/40-cart_default/hummingbird-printed-t-shirt.jpg" src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/40-cart_default/hummingbird-printed-t-shirt.jpg" alt="Round coffee table, basse ronde vintage noyer massif" loading="lazy" width="80" height="80">
          </a>
  </div>
  <div class="media-body">
    <span class="product-name">
        <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/beds-mattresses/21-109-hummingbird-printed-t-shirt.html#/5-color-grey/19-dimension-40x60cm" target="_blank" rel="noopener noreferrer nofollow">Round coffee table, basse ronde vintage noyer massif</a>
    </span>
    <span class="product-quantity">x1</span>
    <span class="product-price pull-xs-right">$410.00</span>
    
         <div class="product-line-info product-line-info-secondary text-muted">
            <span class="label">Color:</span>
            <span class="value">Grey </span>
        </div>
            <div class="product-line-info product-line-info-secondary text-muted">
            <span class="label">Dimension:</span>
            <span class="value">40x60cm</span>
        </div>
      </div>

</li>
              </ul>
    </div>
  
</div>
    

    
      
            <div class="cart-summary-line cart-summary-subtotals" id="cart-subtotal-products">

        <span class="label">
            Subtotal
        </span>

        <span class="value">
          $410.00
        </span>
      </div>
                      <div class="cart-summary-line cart-summary-subtotals" id="cart-subtotal-shipping">

        <span class="label">
            Shipping
        </span>

        <span class="value">
          $7.00
        </span>
      </div>
            


        
      </div>

  
    <div class="card-block cart-summary-totals js-cart-summary-totals">

  
          <div class="cart-summary-line">
        <span class="label">Total&nbsp;(tax excl.)</span>
        <span class="value">$417.00</span>
      </div>
      <div class="cart-summary-line cart-total">
        <span class="label">Total (tax incl.)</span>
        <span class="value">$417.00</span>
      </div>
      

  
        <div class="cart-summary-line">
        <span class="label sub">Taxes:</span>
      <span class="value sub">$0.00</span>
    </div>
      

</div>
    

  
      

</section>
                          
                          
                        </div>
                  
                </section>
              
        </div>
        
      </div>
    </section>


        <?php include 'includes/footer.php'; ?>
      
    </main>

    <script type="text/javascript" src="themes/PRS02048/assets/cache/bottom-d56eca7.js" ></script>


    

    
      
    

  </body>

</html>