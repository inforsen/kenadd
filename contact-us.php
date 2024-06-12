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



                    




        <section id="content" class=" ">

                                
                  

              <section id="main">

                
                 

                    <?php if (isset($errsor)): ?>
                            <div class="account-add">
                              <?php echo $errsor; ?>
                            </div>
                        <?php endif ?>       
                          <?php if (isset($_SESSION['exists'])): ?>
                              <div class="account-add">
                                  <span><?php echo $_SESSION['exists']; unset($_SESSION['exists']); ?></span>
                              </div>
                          <?php endif ?>
                  
                

                
<section id="content" class="page-content card card-block">
        
        
  <section class="contact-form">
  <form action="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/contact-us" method="post" enctype="multipart/form-data">

    
        <section class="form-fields">

      <div class="form-group row">
        <div class="col-md-9 col-md-offset-3">
            <h1 class="h1">Contact us</h1>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-md-3 form-control-label" for="id_contact">Subject</label>
        <div class="col-md-6">
          <select name="id_contact" id="id_contact" class="form-control form-control-select">
                          <option value="2">Customer service</option>
                          <option value="1">Webmaster</option>
                      </select>
        </div>
      </div>

      <div class="form-group row">
        <label class="col-md-3 form-control-label" for="email">Email address</label>
        <div class="col-md-6">
          <input class="form-control" name="from" type="email" value="" placeholder="your@email.com">
        </div>
      </div>

      
              <div class="form-group row">
          <label class="col-md-3 form-control-label" for="file-upload">Attachment</label>
          <div class="col-md-6">
              <input id="file-upload" type="file" name="fileUpload" class="filestyle" data-buttontext="Choose file" tabindex="-1" style="position: absolute; clip: rect(0px, 0px, 0px, 0px);"><div class="bootstrap-filestyle input-group"> <span class="group-span-filestyle input-group-btn" tabindex="0"><label for="file-upload" class="btn btn-default "><span class="icon-span-filestyle glyphicon glyphicon-folder-open"></span> <span class="buttonText">Choose file</span></label></span></div>
          </div>
          <span class="col-md-3 form-control-comment">
            optional
          </span>
        </div>
      
      <div class="form-group row">
        <label class="col-md-3 form-control-label" for="contactform-message">Message</label>
        <div class="col-md-9">
          <textarea id="contactform-message" class="form-control" name="message" placeholder="How can we help?" rows="3"></textarea>
        </div>
      </div>

                  <div class="form-group row">
            <div class="offset-md-3">
              
            </div>
          </div>
        
    </section>

      <footer class="form-footer text-sm-right">
<style>
          input[name=url] {
            display: none !important;
          }
        </style>
        <input type="text" name="url" value="">
        <input type="hidden" name="token" value="a3ed6dbf459cac44053a1cd018706e7d">
      <input class="btn btn-primary" type="submit" name="submitMessage" value="Send">
    </footer>
    
  </form>
</section>


      </section>


                
                  <footer class="page-footer">
                    
                      <!-- Footer content -->
                    
                  </footer>
                

              </section>


                  
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

<script type="text/javascript" src="themes/PRS02048/assets/cache/bottom-d56eca6.js"></script>






</body>

</html>