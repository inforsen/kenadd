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


  
  <section id="checkout-addresses-step" class="checkout-step -current -reachable -complete js-current-step -clickable">
    <h1 class="step-title js-step-title h3">
      <i class="material-icons rtl-no-flip done"></i>
      <span class="step-number">2</span>
      Addresses
      <span class="step-edit text-muted"><i class="material-icons edit">mode_edit</i> Edit</span>
    </h1>

    <div class="content">
      
  <div class="js-address-form">
    <form method="POST" action="//prestashop.coderplace.com/PRS02/PRS02048/demo/en/order?id_address=14" data-refresh-url="//prestashop.coderplace.com/PRS02/PRS02048/demo/en/order?ajax=1&amp;action=addressForm">

              <p>
                    The selected address will be used both as your personal address (for invoice) and as your delivery address.
                  </p>
      
              <div id="delivery-address">
          
  <div class="js-address-form">
    
    
    


      
        <section class="form-fields">
          
                          
      
                
  
    <input type="hidden" name="back" value="">
  


              
  
                          
      
                
  
    <input type="hidden" name="token" value="54de7a86aa627f4743a0578a6e7571dc">
  


              
  
                          
      
                
  <div class="form-group row ">
    <label class="col-md-3 form-control-label" for="field-alias">
              Alias
          </label>
    <div class="col-md-6">

      
        
          <input id="field-alias" class="form-control" name="alias" type="text" value="My Address" maxlength="32">
                  

      
      
              

    </div>

    <div class="col-md-3 form-control-comment">
      
                 Optional
              
    </div>
  </div>


              
  
                          
      
                
  <div class="form-group row ">
    <label class="col-md-3 form-control-label required" for="field-firstname">
              First name
          </label>
    <div class="col-md-6">

      
        
          <input id="field-firstname" class="form-control" name="firstname" type="text" value="Jadolo" maxlength="255" required="">
                  

      
      
              

    </div>

    <div class="col-md-3 form-control-comment">
      
              
    </div>
  </div>


              
  
                          
      
                
  <div class="form-group row ">
    <label class="col-md-3 form-control-label required" for="field-lastname">
              Last name
          </label>
    <div class="col-md-6">

      
        
          <input id="field-lastname" class="form-control" name="lastname" type="text" value="Manza" maxlength="255" required="">
                  

      
      
              

    </div>

    <div class="col-md-3 form-control-comment">
      
              
    </div>
  </div>


              
  
                          
      
                
  <div class="form-group row ">
    <label class="col-md-3 form-control-label" for="field-company">
              Company
          </label>
    <div class="col-md-6">

      
        
          <input id="field-company" class="form-control" name="company" type="text" value="" maxlength="255">
                  

      
      
              

    </div>

    <div class="col-md-3 form-control-comment">
      
                 Optional
              
    </div>
  </div>


              
  
                          
      
                
  <div class="form-group row ">
    <label class="col-md-3 form-control-label required" for="field-address1">
              Address
          </label>
    <div class="col-md-6">

      
        
          <input id="field-address1" class="form-control" name="address1" type="text" value="124klux qs" maxlength="128" required="">
                  

      
      
              

    </div>

    <div class="col-md-3 form-control-comment">
      
              
    </div>
  </div>


              
  
                          
      
                
  <div class="form-group row ">
    <label class="col-md-3 form-control-label" for="field-address2">
              Address Complement
          </label>
    <div class="col-md-6">

      
        
          <input id="field-address2" class="form-control" name="address2" type="text" value="" maxlength="128">
                  

      
      
              

    </div>

    <div class="col-md-3 form-control-comment">
      
                 Optional
              
    </div>
  </div>


              
  
                          
      
                
  <div class="form-group row ">
    <label class="col-md-3 form-control-label required" for="field-city">
              City
          </label>
    <div class="col-md-6">

      
        
          <input id="field-city" class="form-control" name="city" type="text" value="Idaho Falls" maxlength="64" required="">
                  

      
      
              

    </div>

    <div class="col-md-3 form-control-comment">
      
              
    </div>
  </div>


              
  
                          
      
                
  <div class="form-group row ">
    <label class="col-md-3 form-control-label required" for="field-id_state">
              State
          </label>
    <div class="col-md-6">

      
        
          <select id="field-id_state" class="form-control form-control-select" name="id_state" required="">
            <option value="" disabled="" selected="">Please choose</option>
                          <option value="1">AA</option>
                          <option value="2">AE</option>
                          <option value="4">Alabama</option>
                          <option value="5">Alaska</option>
                          <option value="3">AP</option>
                          <option value="6">Arizona</option>
                          <option value="7">Arkansas</option>
                          <option value="8">California</option>
                          <option value="9">Colorado</option>
                          <option value="10">Connecticut</option>
                          <option value="11">Delaware</option>
                          <option value="56">District of Columbia</option>
                          <option value="12">Florida</option>
                          <option value="13">Georgia</option>
                          <option value="14">Hawaii</option>
                          <option value="15" selected="">Idaho</option>
                          <option value="16">Illinois</option>
                          <option value="17">Indiana</option>
                          <option value="18">Iowa</option>
                          <option value="19">Kansas</option>
                          <option value="20">Kentucky</option>
                          <option value="21">Louisiana</option>
                          <option value="22">Maine</option>
                          <option value="23">Maryland</option>
                          <option value="24">Massachusetts</option>
                          <option value="25">Michigan</option>
                          <option value="26">Minnesota</option>
                          <option value="27">Mississippi</option>
                          <option value="28">Missouri</option>
                          <option value="29">Montana</option>
                          <option value="30">Nebraska</option>
                          <option value="31">Nevada</option>
                          <option value="32">New Hampshire</option>
                          <option value="33">New Jersey</option>
                          <option value="34">New Mexico</option>
                          <option value="35">New York</option>
                          <option value="36">North Carolina</option>
                          <option value="37">North Dakota</option>
                          <option value="38">Ohio</option>
                          <option value="39">Oklahoma</option>
                          <option value="40">Oregon</option>
                          <option value="41">Pennsylvania</option>
                          <option value="54">Puerto Rico</option>
                          <option value="42">Rhode Island</option>
                          <option value="43">South Carolina</option>
                          <option value="44">South Dakota</option>
                          <option value="45">Tennessee</option>
                          <option value="46">Texas</option>
                          <option value="55">US Virgin Islands</option>
                          <option value="47">Utah</option>
                          <option value="48">Vermont</option>
                          <option value="49">Virginia</option>
                          <option value="50">Washington</option>
                          <option value="51">West Virginia</option>
                          <option value="52">Wisconsin</option>
                          <option value="53">Wyoming</option>
                      </select>
        

      
      
              

    </div>

    <div class="col-md-3 form-control-comment">
      
              
    </div>
  </div>


              
  
                          
      
                
  <div class="form-group row ">
    <label class="col-md-3 form-control-label required" for="field-postcode">
              Zip/Postal Code
          </label>
    <div class="col-md-6">

      
        
          <input id="field-postcode" class="form-control" name="postcode" type="text" value="12458" maxlength="12" required="">
                  

      
      
              

    </div>

    <div class="col-md-3 form-control-comment">
      
              
    </div>
  </div>


              
  
                          
      
                
  <div class="form-group row ">
    <label class="col-md-3 form-control-label required" for="field-id_country">
              Country
          </label>
    <div class="col-md-6">

      
        
          <select id="field-id_country" class="form-control form-control-select js-country" name="id_country" required="">
            <option value="" disabled="" selected="">Please choose</option>
                          <option value="8">France</option>
                          <option value="10">Italy</option>
                          <option value="186">Saudi Arabia</option>
                          <option value="6">Spain</option>
                          <option value="21" selected="">United States</option>
                      </select>
        

      
      
              

    </div>

    <div class="col-md-3 form-control-comment">
      
              
    </div>
  </div>


              
  
                          
      
                
  <div class="form-group row ">
    <label class="col-md-3 form-control-label" for="field-phone">
              Phone
          </label>
    <div class="col-md-6">

      
        
          <input id="field-phone" class="form-control" name="phone" type="tel" value="" maxlength="32">
                  

      
      
              

    </div>

    <div class="col-md-3 form-control-comment">
      
                 Optional
              
    </div>
  </div>


              
  
                      
  <input type="hidden" name="saveAddress" value="delivery">
      <div class="form-group row">
      <div class="col-md-9 col-md-offset-3">
        <input name="use_same_address" id="use_same_address" type="checkbox" value="1" checked="">
        <label for="use_same_address">Use this address for invoice too</label>
      </div>
    </div>
  
        </section>
      

      
      <footer class="form-footer clearfix">
        <input type="hidden" name="submitAddress" value="1">
        
      
      <button type="submit" class="continue btn btn-primary pull-xs-right" name="confirm-addresses" value="1">
          Continue
      </button>
              <a class="js-cancel-address cancel-address pull-xs-right" href="//prestashop.coderplace.com/PRS02/PRS02048/demo/en/order?cancelAddress=delivery">Cancel</a>
          
  
      </footer>
      

    
  </div>


        </div></form>
      
      
      
    
  </div>

    </div>
  </section>


  
  <section class="checkout-step -unreachable" id="checkout-delivery-step">
    <h1 class="step-title js-step-title h3">
      <span class="step-number">3</span> Shipping Method
    </h1>
  </section>


  
  <section class="checkout-step -unreachable" id="checkout-payment-step">
    <h1 class="step-title js-step-title h3">
      <span class="step-number">4</span> Payment
    </h1>
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