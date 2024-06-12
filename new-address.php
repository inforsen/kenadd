<?php include 'includes/item-header.php';
echo template_header('Login');

if (isset($_POST['login_user'])) {
        $customer_email = $getFromU->checkInput($_POST['email']);
        $customer_pass = $getFromU->checkInput($_POST['password']);

        $login = $getFromU->login($customer_email, $customer_pass);
        if ($login === false) {
            $errsor = "Wrong email or password or you're not registered!";
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
                    <ol data-depth="2" itemscope itemtype="http://schema.org/BreadcrumbList">

                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="index.php">
                                <span itemprop="name">Home</span>
                            </a>
                            <meta itemprop="position" content="1">
                        </li>


                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                            <a itemprop="item" href="login.html">
                                <span itemprop="name">Log in to your account</span>
                            </a>
                            <meta itemprop="position" content="2">
                        </li>

                    </ol>
                </div>
            </nav>

        </div>


        <div id="columns_inner">

            <div id="left-column" class="col-xs-12 col-sm-4 col-md-3 hb-animate-element top-to-bottom">

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

                          <div id="contact_rich_toggle" class="block_content collapse">
                  <div class="">
                      <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
                      <div class="data">Kenadd Supplies<br />First Floor Kalsi House, <br>Luthuli Ave, Nairobi</div>
                  </div>
                        
                  <hr>

                    <div class="">
                      <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
                      <div class="data">
                        Call us:<br>
                        <a href="tel: (+91) 9876-543-210"> (+254)72 656 0714</a>
                       </div>
                    </div>
                    
                  <hr>

                    <div class="">
                      <div class="icon"><i class="fa fa-envelope-o" aria-hidden="true"></i></div>
                      <div class="data email">
                        Email us:<br>
                       <script type="text/javascript">document.write(unescape('store@cartsen.com'))</script>store@cartsen.com
                       </div>          
                    </div>
                </div>

                        </div>
                    </div>
                </div>

            </div>

            



            <div id="content-wrapper" class="js-content-wrapper left-column right-column col-sm-4 col-md-6">                  
                                
                  

  <section id="main">

    
      
        <header class="page-header">
          <h1 class="h1">
      New address
  </h1>
        </header>
      
    

    
  <section id="content" class="page-content">
    
      
        
<aside id="notifications">
  <div class="container">
    
    
    
    </div>
</aside>
      
    
    
  <div class="address-form">
    
  <div class="js-address-form">
    
    
    <form method="POST" action="//prestashop.coderplace.com/PRS02/PRS02048/demo/en/address?id_address=0" data-id-address="0" data-refresh-url="//prestashop.coderplace.com/PRS02/PRS02048/demo/en/address?ajax=1&amp;action=addressForm">
    

      
        <section class="form-fields">
          
                          
                
  
    <input type="hidden" name="back" value="">
  


              
                          
                
  
    <input type="hidden" name="token" value="54de7a86aa627f4743a0578a6e7571dc">
  


              
                          
                
  <div class="form-group row ">
    <label class="col-md-3 form-control-label" for="field-alias">
              Alias
          </label>
    <div class="col-md-6">

      
        
          <input id="field-alias" class="form-control" name="alias" type="text" value="" maxlength="32">
                  

      
      
              

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

      
        
          <input id="field-address1" class="form-control" name="address1" type="text" value="" maxlength="128" required="">
                  

      
      
              

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

      
        
          <input id="field-city" class="form-control" name="city" type="text" value="" maxlength="64" required="">
                  

      
      
              

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
                          <option value="15">Idaho</option>
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

      
        
          <input id="field-postcode" class="form-control" name="postcode" type="text" value="" maxlength="12" required="">
                  

      
      
              

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


              
                      
        </section>
      

      
      <footer class="form-footer clearfix">
        <input type="hidden" name="submitAddress" value="1">
        
          <button class="btn btn-primary pull-xs-right" type="submit">
            Save
          </button>
        
      </footer>
      

    </form>
  </div>


  </div>

  </section>


    
      <footer class="page-footer">
        
  
    
  <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/my-account" class="account-link">
    <i class="material-icons"></i>
    <span>Back to your account</span>
  </a>
  <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/" class="account-link">
    <i class="material-icons"></i>
    <span>Home</span>
  </a>

  

      </footer>
    

  </section>


                  
              </div>


            







            

        </div>



    </div>
</section>

<?php include 'includes/footer.php'; ?>

</main>

<script type="text/javascript" src="themes/PRS02048/assets/cache/bottom-d56eca6.js"></script>






</body>

</html>