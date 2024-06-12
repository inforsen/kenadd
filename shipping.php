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
                         
                        <div class="col-md-8">
                          
                              
  <section  id    = "checkout-personal-information-step"
            class = "checkout-step -reachable -complete"
  >
    <h1 class="step-title js-step-title h3">
      <i class="material-icons rtl-no-flip done">&#xE876;</i>
      <span class="step-number">1</span>
      Personal Information
      <span class="step-edit text-muted"><i class="material-icons edit">mode_edit</i> Edit</span>
    </h1>

    <div class="content">
      
  

  
    <p class="identity">
            Connected as <a href='https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/identity'>Jadolo Manza</a>.
    </p>
    <p>
            Not you? <a href='https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/?mylogout='>Log out</a>
    </p>
          <p><small>If you sign out now, your cart will be emptied.</small></p>
    
    <div class="clearfix">
      <form method="GET" action="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/order">
        <button
          class="continue btn btn-primary float-xs-right"
          name="controller"
          type="submit"
          value="order"
        >
          Continue
        </button>
      </form>

    </div>

  
    </div>
  </section>


  
  <section  id    = "checkout-addresses-step"
            class = "checkout-step -reachable -complete"
  >
    <h1 class="step-title js-step-title h3">
      <i class="material-icons rtl-no-flip done">&#xE876;</i>
      <span class="step-number">2</span>
      Addresses
      <span class="step-edit text-muted"><i class="material-icons edit">mode_edit</i> Edit</span>
    </h1>

    <div class="content">
      
  <div class="js-address-form">
    <form
      method="POST"
      action="//prestashop.coderplace.com/PRS02/PRS02048/demo/en/order?id_address=0"
      data-refresh-url="//prestashop.coderplace.com/PRS02/PRS02048/demo/en/order?ajax=1&action=addressForm"
    >

              <p>
                    The selected address will be used both as your personal address (for invoice) and as your delivery address.
                  </p>
      
              <div id="delivery-addresses" class="address-selector js-address-selector">
          
      <article
      class="js-address-item address-item selected"
      id="id_address_delivery-address-14"
    >
      <header>
        <label class="radio-block">
          <span class="custom-radio">
            <input
              type="radio"
              name="id_address_delivery"
              value="14"
              checked            >
            <span></span>
          </span>
          <span class="address-alias">My Address</span>
          <div class="address">Jadolo Manza<br>124klux qs<br>Idaho Falls, Idaho 12458<br>United States</div>
        </label>
      </header>
      <hr>
      <footer class="address-footer">
                  <a
            class="edit-address text-muted"
            data-link-action="edit-address"
            href="//prestashop.coderplace.com/PRS02/PRS02048/demo/en/order?id_address=14&editAddress=delivery&token=54de7a86aa627f4743a0578a6e7571dc"
          >
            <i class="material-icons edit">&#xE254;</i>Edit
          </a>
          <a
            class="delete-address text-muted"
            data-link-action="delete-address"
            href="//prestashop.coderplace.com/PRS02/PRS02048/demo/en/order?id_address=14&deleteAddress=1&token=54de7a86aa627f4743a0578a6e7571dc"
          >
            <i class="material-icons delete">&#xE872;</i>Delete
          </a>
              </footer>
    </article>
        <p>
      <button class="ps-hidden-by-js form-control-submit center-block" type="submit">Save</button>
    </p>
  
        </div>

                  <p class="alert alert-danger js-address-error" name="alert-delivery" style="display: none">Your address is incomplete, please update it.</p>
        
        <p class="add-address">
          <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/order?newAddress=delivery"><i class="material-icons">&#xE145;</i>add new address</a>
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


  
  <section  id    = "checkout-delivery-step"
            class = "checkout-step -current -reachable js-current-step"
  >
    <h1 class="step-title js-step-title h3">
      <i class="material-icons rtl-no-flip done">&#xE876;</i>
      <span class="step-number">3</span>
      Shipping Method
      <span class="step-edit text-muted"><i class="material-icons edit">mode_edit</i> Edit</span>
    </h1>

    <div class="content">
      
  <div id="hook-display-before-carrier">
    
  </div>

  <div class="delivery-options-list">
          <form
        class="clearfix"
        id="js-delivery"
        data-url-update="//prestashop.coderplace.com/PRS02/PRS02048/demo/en/order?ajax=1&action=selectDeliveryOption"
        method="post"
      >
        <div class="form-fields">
          
            <div class="delivery-options">
                                <div class="row delivery-option js-delivery-option">
                    <div class="col-sm-1">
                      <span class="custom-radio pull-xs-left">
                        <input type="radio" name="delivery_option[14]" id="delivery_option_2" value="2," checked>
                        <span></span>
                      </span>
                    </div>
                    <label for="delivery_option_2" class="col-sm-11 delivery-option-2">
                      <div class="row">
                        <div class="col-sm-5 col-xs-12">
                          <div class="row carrier carrier-hasLogo">
                                                        <div class="col-xs-3 carrier-logo">
                                <img class="lazyload" data-src="/PRS02/PRS02048/demo/img/s/2.jpg" alt="My carrier" src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/themes/PRS02048/assets/img/megnor/home_default_loading.gif" loading="lazy"/>
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


  
  <section class="checkout-step -unreachable" id="checkout-payment-step">
    <h1 class="step-title js-step-title h3">
      <span class="step-number">4</span> Payment
    </h1>
  </section>



                          
                        </div>
                        <div class="col-md-4">

                          
                            <section id="js-checkout-summary" class="card js-cart" data-refresh-url="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/cart?ajax=1&action=refresh">
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
              <img class="media-object lazyload" data-src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/40-cart_default/hummingbird-printed-t-shirt.jpg" src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/themes/PRS02048/assets/img/megnor/home_default_loading.gif" alt="Round coffee table, basse ronde vintage noyer massif" loading="lazy" width="80" height="80">
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