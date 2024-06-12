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
                            Log in to your account
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




                    <section id="content" class="page-content card card-block">



                        <section class="login-form">





                            <form id="login-form" method="post">

                                <section>




                                    <input type="hidden" name="back" value="">






                                    <div class="form-group row ">
                                        <label class="col-md-3 form-control-label required" for="field-email">
                                            Email
                                        </label>
                                        <div class="col-md-6">



                                            <input id="field-email" class="form-control" name="email" type="email" value="" autocomplete="email" required>






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
                                                <input id="field-password" class="form-control js-child-focus js-visible-password" name="password" title="At least 5 characters long" aria-label="Password input of at least 5 characters" type="password" autocomplete="current-password" value="" pattern=".{5,}" required>
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




                                    <div class="forgot-password">
                                        <a href="password-recovery.html" rel="nofollow">
                                            Forgot your password?
                                        </a>
                                    </div>
                                </section>


                                <footer class="form-footer text-xs-center clearfix">
                                    <input type="hidden" name="submitLogin" value="1">

                                    <button id="submit-login"  name="login_user" class="btn btn-primary" data-link-action="sign-in" type="submit" class="form-control-submit">
                                        Sign in
                                    </button>

                                </footer>


                            </form>


                        </section>
                        <hr />



                        <div class="no-account">
                            <a href="index.php?page=registration" data-link-action="display-register-form">
                                No account? Create one here
                            </a>
                        </div>


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