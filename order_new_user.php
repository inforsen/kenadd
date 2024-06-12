<?php require_once "includes/item-header.php"; 
echo template_header('New Order User');


if (!isset($_SESSION['customer_email'])) {
  header('location: index.php?page=cart');

        $customer_session = $_SESSION['customer_email'];
        $get_customer = $getFromU->view_customer_by_email($customer_session);
        $c_id = $get_customer->customer_id;
        $customer_firstname = $get_customer->customer_firstname;
        $customer_lastname = $get_customer->customer_lastname;
    
    $customer_name = $customer_firstname .' '.$customer_lastname;
    


    }?>





   
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


                        <section id="checkout-personal-information-step" class="checkout-step -current -reachable js-current-step">
                            <h1 class="step-title js-step-title h3">
                                <i class="material-icons rtl-no-flip done">&#xE876;</i>
                                <span class="step-number">1</span>
                                Personal Information
                                <span class="step-edit text-muted"><i class="material-icons edit">mode_edit</i> Edit</span>
                            </h1>

                            <div class="content">




                                <ul class="nav nav-inline m-y-2" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" data-toggle="tab" href="#checkout-guest-form" role="tab" aria-controls="checkout-guest-form" aria-selected="true">
                                            Order as a guest
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link " data-link-action="show-login-form" data-toggle="tab" href="#checkout-login-form" role="tab" aria-controls="checkout-login-form">
                                            Sign in
                                        </a>
                                    </li>
                                </ul>

                                <div class="tab-content">
                                    <div class="tab-pane active" id="checkout-guest-form" role="tabpanel">




                                        <form action="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/order?action=show&amp;checkout" id="customer-form" class="js-customer-form" method="post">
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



                                                        <input id="field-lastname" class="form-control" name="lastname" type="text" value="" required>
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



                                                        <input id="field-email" class="form-control" name="email" type="email" value="" required>






                                                    </div>

                                                    <div class="col-md-3 form-control-comment">


                                                    </div>
                                                </div>





                                                <p class="form-informations">
                                                    <span class="font-weight-bold form-informations-title">Create an account</span> <span class="font-italic form-informations-option">(optional)</span>
                                                    <br>
                                                    <span class="text-muted form-informations-subtitle">And save time on your next order!</span>
                                                </p>


                                                <div class="form-group row ">
                                                    <label class="col-md-3 form-control-label" for="field-password">
                                                        Password
                                                    </label>
                                                    <div class="col-md-6">



                                                        <div class="input-group js-parent-focus">
                                                            <input id="field-password" class="form-control js-child-focus js-visible-password" name="password" title="At least 5 characters long" aria-label="Password input of at least 5 characters" type="password" value="" pattern=".{5,}">
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
                                                                <input name="optin" type="checkbox" value="1">
                                                                <span><i class="material-icons rtl-no-flip checkbox-checked">&#xE5CA;</i></span>
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
                                                    <label class="col-md-3 form-control-label" for="field-newsletter">
                                                    </label>
                                                    <div class="col-md-6">



                                                        <span class="custom-checkbox">
                                                            <label>
                                                                <input name="newsletter" type="checkbox" value="1">
                                                                <span><i class="material-icons rtl-no-flip checkbox-checked">&#xE5CA;</i></span>
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
                                                <input type="hidden" name="submitCreate" value="1">

                                                <button class="continue btn btn-primary pull-xs-right" name="continue" data-link-action="register-new-customer" type="submit" value="1">
                                                    Continue
                                                </button>

                                            </footer>


                                        </form>


                                    </div>
                                    <div class="tab-pane " id="checkout-login-form" role="tabpanel" aria-hidden="true">





                                        <form id="login-form" action="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/order?action=show&amp;checkout" method="post">

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
                                                    <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/password-recovery" rel="nofollow">
                                                        Forgot your password?
                                                    </a>
                                                </div>
                                            </section>


                                            <footer class="form-footer text-xs-center clearfix">
                                                <input type="hidden" name="submitLogin" value="1">

                                                <button class="continue btn btn-primary pull-xs-right" name="continue" data-link-action="sign-in" type="submit" value="1">
                                                    Continue
                                                </button>

                                            </footer>


                                        </form>


                                    </div>
                                </div>



                            </div>
                        </section>



                        <section class="checkout-step -unreachable" id="checkout-addresses-step">
                            <h1 class="step-title js-step-title h3">
                                <span class="step-number">2</span> Addresses
                            </h1>
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

                                                  $sub_total = $products_price * $products_qty;
                                                  $total += $sub_total;

                                              require_once 'mpesa/shipping.php';            

                                      ?>

                                    <div class="collapse in" id="cart-summary-product-list">
                                        <ul class="media-list">
                                            <li class="media">
                                                <div class="media-left">
                                                    <a href="index.php?page=product&product_id=<?php echo $prooduct_id;?>">
                                                        <img class="media-object lazyload" data-src="images/<?php echo $prooduct_img1; ?>" src="himages/<?php echo $prooduct_img1; ?>" alt="<?php echo $prooduct_title; ?>" loading="lazy" width="80" height="80">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <span class="product-name">
                                                        <a href="index.php?page=product&product_id=<?php echo $prooduct_id;?>" target="_blank" rel="noopener noreferrer nofollow"><?php echo substr($prooduct_title, 0, 43); ?>..</a>
                                                    </span>
                                                    <span class="product-quantity">x1</span>
                                                    <span class="product-price pull-xs-right">Kes <?php echo number_format((float)$total,2)?></span>

                                                    <div class="product-line-info product-line-info-secondary text-muted">
                                                        <span class="label">Chair Color:</span>
                                                        <span class="value">Grey </span>
                                                    </div>
                                                    <div class="product-line-info product-line-info-secondary text-muted">
                                                        <span class="label">Size:</span>
                                                        <span class="value">S </span>
                                                    </div>
                                                    <div class="product-line-info product-line-info-secondary text-muted">
                                                        <span class="label">Dimension:</span>
                                                        <span class="value">40x60cm</span>
                                                    </div>
                                                </div>

                                            </li>
                                        </ul>
                                    </div>

              <?php } } ?>

                                </div>




                                <div class="cart-summary-line cart-summary-subtotals" id="cart-subtotal-products">

                                    <span class="label">
                                        Subtotal
                                    </span>

                                    <span class="value">
                                        KES <?php echo number_format((float)$total,2); ?>
                                    </span>
                                </div>
                                <div class="cart-summary-line cart-summary-subtotals" id="cart-subtotal-shipping">

                                    <span class="label">
                                        Shipping
                                    </span>

                                    <span class="value">
                                        Kes <?php echo number_format((float)$shipping,2); ?>
                                    </span>
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





                        </section>


                    </div>

                </section>

            </div>

        </div>
    </section>

    <?php include 'includes/footer.php'; ?>


    <script type="text/javascript" src="themes/PRS02048/assets/cache/bottom-d56eca6.js"></script>








</body>

</html>