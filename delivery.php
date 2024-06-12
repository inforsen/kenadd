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

                
                  
                    <header class="page-header">
                      <h1 class="h1">
              Delivery
            </h1>
                    </header>

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
                  
                

                
                  <section id="content" class="page-content page-cms page-cms-1">

                    
                      <h2>Shipments and returns</h2><h3>Your pack shipment</h3><p>Packages are generally dispatched within 2 days after receipt of payment and are shipped via UPS with tracking and drop-off without signature. If you prefer delivery by UPS Extra with required signature, an additional cost will be applied, so please contact us before choosing this method. Whichever shipment choice you make, we will provide you with a link to track your package online.</p><p>Shipping fees include handling and packing fees as well as postage costs. Handling fees are fixed, whereas transport fees vary according to total weight of the shipment. We advise you to group your items in one order. We cannot group two distinct orders placed separately, and shipping fees will apply to each of them. Your package will be dispatched at your own risk, but special care is taken to protect fragile objects.<br><br>Boxes are amply sized and your items are well-protected.</p>
                    
                    

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