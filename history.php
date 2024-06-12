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
  Order history
</h1>
        </header>
      
    

    
  <section id="content" class="page-content">
    
      
        
<aside id="notifications">
  <div class="container">
    
    
    
    </div>
</aside>
      
    
    
  <h6>Here are the orders you've placed since your account was created.</h6>

      <table class="table table-striped table-bordered table-labeled hidden-sm-down">
      <thead class="thead-default">
        <tr>
          <th>Order reference</th>
          <th>Date</th>
          <th>Total price</th>
          <th class="hidden-md-down">Payment</th>
          <th class="hidden-md-down">Status</th>
          <th>Invoice</th>
          <th>&nbsp;</th>
        </tr>
      </thead>
      <tbody>
                  <tr>
            <th scope="row">WGKWXVMEO</th>
            <td>06/09/2024</td>
            <td class="text-xs-right">$417.00</td>
            <td class="hidden-md-down">Cash on delivery (COD)</td>
            <td>
              <span class="label label-pill bright" style="background-color:#34209E">
                Awaiting Cash On Delivery validation
              </span>
            </td>
            <td class="text-xs-center hidden-md-down">
                              -
                          </td>
            <td class="text-xs-center order-actions">
              <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/index.php?controller=order-detail&amp;id_order=10" data-link-action="view-order-details">
                Details
              </a>
                              <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/order?submitReorder=1&amp;id_order=10">Reorder</a>
                          </td>
          </tr>
              </tbody>
    </table>

    <div class="orders hidden-md-up">
              <div class="order">
          <div class="row">
            <div class="col-xs-10">
              <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/index.php?controller=order-detail&amp;id_order=10"><h3>WGKWXVMEO</h3></a>
              <div class="date">06/09/2024</div>
              <div class="total">$417.00</div>
              <div class="status">
                <span class="label label-pill bright" style="background-color:#34209E">
                  Awaiting Cash On Delivery validation
                </span>
              </div>
            </div>
            <div class="col-xs-2 text-xs-right">
                <div>
                  <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/index.php?controller=order-detail&amp;id_order=10" data-link-action="view-order-details" title="Details">
                    <i class="material-icons"></i>
                  </a>
                </div>
                                  <div>
                    <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/order?submitReorder=1&amp;id_order=10" title="Reorder">
                      <i class="material-icons"></i>
                    </a>
                  </div>
                            </div>
          </div>
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