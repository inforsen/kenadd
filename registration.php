<?php include 'includes/item-header.php'; 
echo template_header('Create an Account'); 


    if (isset($_POST['submitCreate'])) {
        $id_gender = $getFromU->checkInput($_POST['id_gender']);
        $firstname = $getFromU->checkInput($_POST['firstname']);
        $lastname = $getFromU->checkInput($_POST['lastname']);
        $phone = $getFromU->checkInput($_POST['phone']);
        $maila = $getFromU->checkInput($_POST['email']);
        $pass = $getFromU->checkInput($_POST['password']);
        //$con_pass = $getFromU->checkInput($_POST['con_pass']);
        $customer_privacy = $getFromU->checkInput($_POST['customer_privacy']);
        $psgdpr = $getFromU->checkInput($_POST['psgdpr']);
        //$pass = password_hash($_POST['password'], PASSWORD_DEFAULT);
       

            $c_ip = $getFromU->getRealUserIp();
            $check_customer = $getFromU->check_customer_by_email($maila);

            if ($check_customer === true) {
              $_SESSION['exists'] = 'Account exists. Please login';
                header('location: index.php?page=login');
                //$error = "Email already Registered. Please login";
            } else {
                    $add_customer = $getFromU->create("customers", array("customer_firstname" => $firstname, "customer_lastname" => $lastname, "customer_contact" => $phone, "customer_email" => $maila, "customer_pass" => $pass, "customer_privacy" => $customer_privacy, "psgdpr" => $psgdpr, "id_gender_m" => $id_gender));

                    $to      = "$maila"; // Send email to our user
                    $subject = "Welcome to Kenadd"; // Give the email a subject 

                    // Our emessage above including the link
                    $headers   = array();
                    $headers[] = 'MIME-Version: 1.0';
                    $headers[] = "Content-type: text/html; charset=iso-8859-1";
                    //$headers[] = "From: Kenadd (store@kenadd.com)";
                    //$headers[] = 'Bcc: store@kenadd.com';
                    //$headers[] = "Subject: {$subject}";
                    $headers[] = "X-Mailer: PHP/".phpversion(); // Set from headers

                    /*$headers =  'Content-type: text/html; charset=iso-8859-1' . "\r\n" . 'From: store@kenadd.com' . "\r\n" . 'Bcc: store@kenadd.com' . "\r\n" . 'X-Mailer: PHP/' . phpversion();*/

                    
                    $advert = "https://www.kenadd.com/assets/images/logos.png";
                    $metas = "https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css";

                    //style you email
                    $emessage = "

                  <html>
                  <head>
                  <link rel='stylesheet' href=".$metas.">
                  </head>
                      <body style='font-family: verdana; background-color: #F3F3F3; padding: 20px;'>
                          <div style='width: 60%; margin: auto; background-color: #FFF; padding: 20px; border-radius: 5px; @media (max-width: 560px) {width: 80%;}'>
                              
                              <div style='padding-bottom: 20px;'>
                                  <img style='height: auto; width: 180px;' src=".$advert." alt='welcome'>
                              </div>
                              <div class='email-welcome'>
                                  <p style='padding: 10px 2px 30px 2px; font-size: 14px;'>Hello, ".$firstname."<br><br>Welcome to Kenadd! Enjoy shopping from our variety of items</p>
                              </div>
                              <div style='height: 2px; background-color: #131921;'></div>
                              <div style='padding: 16px 0 30px 0;'>
                                  <p style='color: #b3b3b5'>If you did not sign up for this account you can ignore the email and the account will automatically be deleted in 5 days.</p>
                              </div>
                              <div style='height: 2px; background-color: #c7d0d8;'></div>
                              <div style='padding: 16px 0 30px 0; font-size: 10px;'>
                                  <p style='color: #b3b3b5'>This email was sent to you as a registering member of <a style='text-decoration: none; color:lightblue;' href='https://kenadd.com'>Kenadd</a>. Use of the service and website is subject to our <a style='text-decoration: none; color:lightblue;' href='https://kenadd.com/index.php?page=faq'>Privacy and Terms of Use.</a></p>
                              </div>
                          </div>
                      </body>
                  </html>
                  ";

                    mail($to, $subject, $emessage, implode("\r\n", $headers));
                        
                    $_SESSION['customer_verify'] = $maila;
                    header ('location: index.php?page=cart');
                        
                }
            }



?>


        <section id="wrapper">



            <div class="columns container">

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
                                    <a itemprop="item" href="registration.html">
                                        <span itemprop="name">Create an account</span>
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
                                    <div class="product-item">
                                        <div class="left-part">

                                            <a href="beds-mattresses/1-40-hummingbird-printed-t-shirt.html#/1-size-s/19-dimension-40x60cm/26-chair_color-grey" class="thumbnail product-thumbnail">
                                                <img class="lazyload" data-src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/25-cart_default/hummingbird-printed-t-shirt.jpg" src="themes/PRS02048/assets/img/megnor/home_default_loading.gif" height="90" width="80" alt="Mid Century Modern Side Chair with Wood Legs">
                                            </a>


                                            <ul class="product-flags js-product-flags">
                                                <li class="product-flag discount">-20%</li>
                                                <li class="product-flag new">New</li>
                                            </ul>

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


                                                <h1 class="h3 product-title" itemprop="name"><a href="beds-mattresses/1-40-hummingbird-printed-t-shirt.html#/1-size-s/19-dimension-40x60cm/26-chair_color-grey">Mid Century Modern Side...</a></h1>


                                                <div class="product-price-and-shipping">
                                                    <span class="price">$127.20</span>


                                                    <span class="sr-only">Regular price</span>
                                                    <span class="regular-price">$159.00</span>



                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item">
                                        <div class="left-part">

                                            <a href="beds-mattresses/20-76-hummingbird-printed-t-shirt.html#/1-size-s/5-color-grey/19-dimension-40x60cm" class="thumbnail product-thumbnail">
                                                <img class="lazyload" data-src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/36-cart_default/hummingbird-printed-t-shirt.jpg" src="themes/PRS02048/assets/img/megnor/home_default_loading.gif" height="90" width="80" alt="Funnel Sweeper Dustpan For Brooms and Other Cleaning">
                                            </a>


                                            <ul class="product-flags js-product-flags">
                                                <li class="product-flag new">New</li>
                                            </ul>

                                        </div>
                                        <div class="right-part">
                                            <div class="product-description">

                                                <div class="comments_note">
                                                    <div class="star_content clearfix">
                                                        <div class="star star_on"></div>
                                                        <div class="star star_on"></div>
                                                        <div class="star "></div>
                                                        <div class="star "></div>
                                                        <div class="star "></div>
                                                    </div>
                                                </div>


                                                <h1 class="h3 product-title" itemprop="name"><a href="beds-mattresses/20-76-hummingbird-printed-t-shirt.html#/1-size-s/5-color-grey/19-dimension-40x60cm">Funnel Sweeper Dustpan For...</a></h1>


                                                <div class="product-price-and-shipping">
                                                    <span class="price">$129.00</span>



                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <div class="product-item">
                                        <div class="left-part">

                                            <a href="beds-mattresses/21-109-hummingbird-printed-t-shirt.html#/5-color-grey/19-dimension-40x60cm" class="thumbnail product-thumbnail">
                                                <img class="lazyload" data-src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/40-cart_default/hummingbird-printed-t-shirt.jpg" src="themes/PRS02048/assets/img/megnor/home_default_loading.gif" height="90" width="80" alt="Round coffee table, basse ronde vintage noyer massif">
                                            </a>


                                            <ul class="product-flags js-product-flags">
                                                <li class="product-flag new">New</li>
                                            </ul>

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


                                                <h1 class="h3 product-title" itemprop="name"><a href="beds-mattresses/21-109-hummingbird-printed-t-shirt.html#/5-color-grey/19-dimension-40x60cm">Round coffee table, basse...</a></h1>


                                                <div class="product-price-and-shipping">
                                                    <span class="price">$410.00</span>



                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <a href="2-home.html" class="allproducts">All products</a>
                            </div>
                        </div>

                    </div>



                    <div id="content-wrapper" class="js-content-wrapper left-column right-column col-sm-4 col-md-6">



                        <section id="main">

                          <?php if (isset($error)): ?>
                              <div class="account-add">
                                <?php echo $error; ?>
                              </div>
                          <?php endif ?> 
                          <?php if (isset($_SESSION['regos'])): ?>
                              <div class="account-add">
                                <?php echo $_SESSION['regos']; unset($_SESSION['regos']); ?>
                              </div>
                          <?php endif ?>       



                            <header class="page-header">
                                <h1 class="h1">
                                    Create an account
                                </h1>
                            </header>




                            <section id="content" class="page-content card card-block">




                                <section class="register-form">
                                    <p>Already have an account? <a href="login.html">Log in instead!</a></p>




                                    <form id="customer-form" class="js-customer-form" method="post">
                                        <section>



                                            <div class="form-group row ">
                                                <label class="col-md-3 form-control-label" for="field-id_gender">
                                                    Social title
                                                </label>
                                                <div class="col-md-6 form-control-valign">



                                                    <label class="radio-inline" for="field-id_gender-1">
                                                        <span class="custom-radio">
                                                            <input name="id_gender" id="field-id_gender-1" type="radio" value="1">
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



                                                    <input id="field-firstname" class="form-control" name="firstname" type="text" value="" required>
                                                    <span class="form-control-comment">
                                                        Only twenty five (25) characters, are allowed.
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



                                                    <input id="field-lastname" class="form-control" name="lastname" type="text" value="" required>
                                                    <span class="form-control-comment">
                                                        Only twenty five (25) characters, are allowed.
                                                    </span>






                                                </div>

                                                <div class="col-md-3 form-control-comment">


                                                </div>
                                            </div>
                            
                    <div class="form-group row ">
                      <label class="col-md-3 form-control-label required" for="field-phone">Phone</label>
                      <div class="col-md-6 js-input-column">
                         <input id="field-phone" class="form-control" placeholder="Start with 07 or 01...." maxlength="10" name="phone" type="number" value="" required>
                      </div>

                      <div class="col-md-3 form-control-comment"></div>
                    </div> 
                            





                                            <div class="form-group row ">
                                                <label class="col-md-3 form-control-label required" for="field-email">
                                                    Email
                                                </label>
                                                <div class="col-md-6">



                                                    <input id="field-email" class="form-control" name="email" type="email" value="" required>






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
                                                        <input id="field-password" class="form-control js-child-focus js-visible-password" name="password" title="At least 5 characters long" aria-label="Password input of at least 5 characters" type="password" value="" pattern=".{5,}" required>
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
                                                <label class="col-md-3 form-control-label required" for="field-psgdpr">
                                                </label>
                                                <div class="col-md-6">



                                                    <span class="custom-checkbox">
                                                        <label>
                                                            <input name="psgdpr" type="checkbox" value="1" required>
                                                            <span><i class="material-icons rtl-no-flip checkbox-checked">&#xE5CA;</i></span>
                                                            I agree to the terms and conditions and the privacy policy
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
                                                            <input name="customer_privacy" type="checkbox" value="1" required>
                                                            <span><i class="material-icons rtl-no-flip checkbox-checked">&#xE5CA;</i></span>
                                                            Customer data privacy<br><em>The personal data you provide is used to answer queries, process orders or allow access to specific information. You have the right to modify and delete all the personal information found in the "My Account" page.</em>
                                                        </label>
                                                    </span>






                                                </div>

                                                <div class="col-md-3 form-control-comment">


                                                </div>
                                            </div>





                                        </section>


                                        <footer class="form-footer clearfix">

                                            <button class="btn btn-primary form-control-submit pull-xs-right" name="submitCreate" data-link-action="save-customer" type="submit">
                                                Save
                                            </button>

                                        </footer>


                                    </form>


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