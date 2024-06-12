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
  Your personal information
</h1>
        </header>
      
    

    
  <section id="content" class="page-content">
    
      
        
<aside id="notifications">
  <div class="container">
    
    
    
    </div>
</aside>
      
    
    
  
  
      

<form action="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/identity" id="customer-form" class="js-customer-form" method="post">
  <section>
    
              
          
  <div class="form-group row ">
    <label class="col-md-3 form-control-label" for="field-id_gender">
              Social title
          </label>
    <div class="col-md-6 form-control-valign">

      
        
                      <label class="radio-inline" for="field-id_gender-1">
              <span class="custom-radio">
                <input name="id_gender" id="field-id_gender-1" type="radio" value="1" checked="">
                <span></span>
              </span>
              Mr.
            </label>
                      <label class="radio-inline" for="field-id_gender-2">
              <span class="custom-radio">
                <input name="id_gender" id="field-id_gender-2" type="radio" value="2">
                <span></span>
              </span>
              Mrs.
            </label>
                  

      
      
              

    </div>

    <div class="col-md-3 form-control-comment">
      
              
    </div>
  </div>


        
              
          
  <div class="form-group row ">
    <label class="col-md-3 form-control-label required" for="field-firstname">
              First name
          </label>
    <div class="col-md-6">

      
        
          <input id="field-firstname" class="form-control" name="firstname" type="text" value="Jadolo" required="">
                      <span class="form-control-comment">
              Only letters and the dot (.) character, followed by a space, are allowed.
            </span>
                  

      
      
              

    </div>

    <div class="col-md-3 form-control-comment">
      
              
    </div>
  </div>


        
              
          
  <div class="form-group row ">
    <label class="col-md-3 form-control-label required" for="field-lastname">
              Last name
          </label>
    <div class="col-md-6">

      
        
          <input id="field-lastname" class="form-control" name="lastname" type="text" value="Manza" required="">
                      <span class="form-control-comment">
              Only letters and the dot (.) character, followed by a space, are allowed.
            </span>
                  

      
      
              

    </div>

    <div class="col-md-3 form-control-comment">
      
              
    </div>
  </div>


        
              
          
  <div class="form-group row ">
    <label class="col-md-3 form-control-label required" for="field-email">
              Email
          </label>
    <div class="col-md-6">

      
        
          <input id="field-email" class="form-control" name="email" type="email" value="jadolo@jadolo.com" required="">
                  

      
      
              

    </div>

    <div class="col-md-3 form-control-comment">
      
              
    </div>
  </div>


        
              
          
  <div class="form-group row ">
    <label class="col-md-3 form-control-label required" for="field-password">
              Password
          </label>
    <div class="col-md-6">

      
        
          <div class="input-group js-parent-focus">
            <input id="field-password" class="form-control js-child-focus js-visible-password" name="password" title="At least 5 characters long" aria-label="Password input of at least 5 characters" type="password" value="" pattern=".{5,}" required="">
            <span class="input-group-btn">
              <button class="btn" type="button" data-action="show-password" data-text-show="Show" data-text-hide="Hide">
                Show
              </button>
            </span>
          </div>
        

      
      
              

    </div>

    <div class="col-md-3 form-control-comment">
      
              
    </div>
  </div>


        
              
          
  <div class="form-group row ">
    <label class="col-md-3 form-control-label" for="field-new_password">
              New password
          </label>
    <div class="col-md-6">

      
        
          <div class="input-group js-parent-focus">
            <input id="field-new_password" class="form-control js-child-focus js-visible-password" name="new_password" title="At least 5 characters long" aria-label="Password input of at least 5 characters" type="password" value="" pattern=".{5,}">
            <span class="input-group-btn">
              <button class="btn" type="button" data-action="show-password" data-text-show="Show" data-text-hide="Hide">
                Show
              </button>
            </span>
          </div>
        

      
      
              

    </div>

    <div class="col-md-3 form-control-comment">
      
                 Optional
              
    </div>
  </div>


        
              
          
  <div class="form-group row ">
    <label class="col-md-3 form-control-label" for="field-birthday">
              Birthdate
          </label>
    <div class="col-md-6">

      
        
          <input id="field-birthday" class="form-control" name="birthday" type="text" value="" placeholder="MM/DD/YYYY">
                      <span class="form-control-comment">
              (E.g.: 05/31/1970)
            </span>
                  

      
      
              

    </div>

    <div class="col-md-3 form-control-comment">
      
                 Optional
              
    </div>
  </div>


        
              
          
  <div class="form-group row ">
    <label class="col-md-3 form-control-label" for="field-optin">
          </label>
    <div class="col-md-6">

      
        
          <span class="custom-checkbox">
            <label>
              <input name="optin" type="checkbox" value="1" checked="checked">
              <span><i class="material-icons rtl-no-flip checkbox-checked"></i></span>
              Receive offers from our partners
            </label>
          </span>
        

      
      
              

    </div>

    <div class="col-md-3 form-control-comment">
      
              
    </div>
  </div>


        
              
          
  <div class="form-group row ">
    <label class="col-md-3 form-control-label required" for="field-psgdpr">
          </label>
    <div class="col-md-6">

      
        
          <span class="custom-checkbox">
            <label>
              <input name="psgdpr" type="checkbox" value="1" required="">
              <span><i class="material-icons rtl-no-flip checkbox-checked"></i></span>
              I agree to the terms and conditions and the privacy policy
            </label>
          </span>
        

      
      
              

    </div>

    <div class="col-md-3 form-control-comment">
      
              
    </div>
  </div>


        
              
          
  <div class="form-group row ">
    <label class="col-md-3 form-control-label" for="field-newsletter">
          </label>
    <div class="col-md-6">

      
        
          <span class="custom-checkbox">
            <label>
              <input name="newsletter" type="checkbox" value="1" checked="checked">
              <span><i class="material-icons rtl-no-flip checkbox-checked"></i></span>
              Sign up for our newsletter<br><em>You may unsubscribe at any moment. For that purpose, please find our contact info in the legal notice.</em>
            </label>
          </span>
        

      
      
              

    </div>

    <div class="col-md-3 form-control-comment">
      
              
    </div>
  </div>


        
              
          
  <div class="form-group row ">
    <label class="col-md-3 form-control-label required" for="field-customer_privacy">
          </label>
    <div class="col-md-6">

      
        
          <span class="custom-checkbox">
            <label>
              <input name="customer_privacy" type="checkbox" value="1" required="">
              <span><i class="material-icons rtl-no-flip checkbox-checked"></i></span>
              Customer data privacy<br><em>The personal data you provide is used to answer queries, process orders or allow access to specific information. You have the right to modify and delete all the personal information found in the "My Account" page.</em>
            </label>
          </span>
        

      
      
              

    </div>

    <div class="col-md-3 form-control-comment">
      
              
    </div>
  </div>


        
            
    
  </section>

  
    <footer class="form-footer clearfix">
      <input type="hidden" name="submitCreate" value="1">
      
        <button class="btn btn-primary form-control-submit pull-xs-right" data-link-action="save-customer" type="submit">
          Save
        </button>
      
    </footer>
  

</form>



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