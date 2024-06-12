<?php

 require_once 'includes/header.php';       

?>
<?php
  if (!isset($_SESSION['admin_email'])) {
    header('Location: ./login.php');
  }
  if (isset($_GET['invoice_no'])) {
      $invoice_no = $_GET['invoice_no'];

     $select_orders = $getFromU->printCustomerOrders('customer_orders', $invoice_no);
     foreach ($select_orders as $select_order) {
      $customer_id = $select_order->customer_id;
     }

      $view_customer = $getFromU->view_customer_by_id($customer_id);
      $customer_firstname = $view_customer->customer_firstname;
      $customer_lastname = $view_customer->customer_lastname;
      $customer_email = $view_customer->customer_email;
      $customer_name = $customer_firstname. ' ' .$customer_lastname;

      $customer_address = $view_customer->customer_address;
      $customer_contact = $view_customer->customer_contact;
      $customer_zip = $view_customer->customer_zip;
      $customer_city = $view_customer->customer_city;
      $customer_country = $view_customer->customer_country;

      date_default_timezone_set('Africa/Nairobi');
      $date = date('YmdHis');
      $printDate   =  date('jS F Y', strtotime($date));
?>

<div class="rightContainer">
    <nav>
        <div class="comHeader">
            <p>Admin Dashboard</p>
        </div>
        <div class="nav">
            <ul>
                <li class="list_dta"><span class="menu_open" id="open_dash_nav"><a href="javascript:void(0)" onclick="openDashNav()"><i class="fa fa-sliders"></i></a></span></li>
                <li><span class="menu_close" id="close_dash_nav"><a href="javascript:void(0)" onclick="closeDashNav()"><i class="fa fa-star-o"></i></a></span></li>
            </ul>
        </div>
    </nav>
        <div class="container">
        <div class="container_print">
          <div class="print_btn">
            <button onclick="PrintDiv()"><i class="fa fa-copy"></i> Print</button>
          </div>
            
            <div class="section_output" id="divToPrint">
              <div class="invoice_container">
                <div class="invoice_title invtle">
                  <p class="tit_print">Perfection Cosmetics</p>
                  <span class="tit_span"><strong>Date: </strong><?php echo $printDate; ?></span>
                  <span class="tit_span"><strong>Receipt No: </strong><?php echo $invoice_no; ?></span>
                </div>
              </div>
              <div class="print_date">
                <div class="invoice_logo">
                  <h3>Billed To:</h3>
                  <p><strong><?php echo $customer_name; ?></strong><br><?php echo $customer_address; ?><br><?php echo $customer_city; ?> - <?php echo $customer_zip; ?>, <?php echo $customer_country; ?><br><br><?php echo $customer_contact; ?><br><?php echo $customer_email; ?></p>
                </div>
                <div class="invoice_title">
                  <h3>Pay To:</h3>
                  <p><strong>Perfection Cosmetics</strong><br>Bee Center Manyanja Road,<br>Opposite Shell Petrol Station,<br>Nairobi, Kenya<br><br>0700 922964<br>www.perfectioncosmetics.co.ke</p>
                </div>
              </div>
              <div class="print_page">
                <div class="print_scroll">
                    <table>
                      <tr>
                        <th>Images</th>
                        <th>Items</th>
                        <th style="text-align: center;">Quantity</th>
                        <th style="text-align: right;">Price</th>
                        <th style="text-align: right;">Amount</th>
                      </tr>
                      <?php 
                          $total = 0;
                          $shipping = 0;
                          $select_orders = $getFromU->printCustomerOrders('customer_orders', $invoice_no);

                          foreach ($select_orders as $select_order) {
                          $customer_id = $select_order->customer_id;
                          $order_id = $select_order->order_id;
                          $product_id = $select_order->product_id;
                          $product_qty = $select_order->qty;

                          $get_products = $getFromU->viewProductByProductID($product_id);
                          foreach ($get_products as $get_product) {
                              $new_price= $get_product->product_price;
                              $title = $get_product->title;
                              $image = $get_product->image_one;
                              $sub_total = $new_price* $product_qty;
                              $total += $sub_total;

                              require_once './../mpesa/shipping.php';

                        
                      ?>
                        <tr>
                          <td style="width: 20%;"><div class="product_image"> <img src="../images/<?php echo $image; ?>" alt=""> </div></td>
                          <td style="width: 45%;"><?php echo $title; ?></td>
                          <td style="width: 5%; text-align: center;"><?php echo $product_qty; ?></td>
                          <td style="width: 20%; text-align: right;">Ksh <?php echo number_format($product_price); ?></td>
                          <td style="width: 20%; text-align: right;">Ksh <?php echo number_format($sub_total); ?></td>
                        </tr>
                      <?php } }?>
                  </table>
                </div>
                <div class="print_summ">
                  <div class="order_print">
                    <div class="order-sum-pop">
                      <div class="invoice_logo">
                        <p>Shipping</p>
                      </div>
                      <div class="invoice_title">
                      <p>Ksh <?php echo number_format($shipping); ?></p>
                      </div>
                    </div>
                    <div class="order-sum-pop">
                      <div class="invoice_logo">
                        <p  style="color: #A0A0A0;">Tax</p>
                      </div>
                      <div class="invoice_title">
                      <p style="color: #A0A0A0;">Ksh <?php echo number_format($tax = ($total * 16) / 100); ?></p>
                      </div>
                    </div>
                    <div class="order-sum-pop">
                      <div class="invoice_logo">
                        <p>TOTAL</p>
                      </div>
                      <div class="invoice_title">
                      <p>Ksh <?php echo number_format($total + $shipping); ?></p>
                      </div>
                    </div>
                    <div class="order-sum-pop am_due">
                      <div class="invoice_logo">
                        <p><strong>Amount Due (KSH)</strong></p>
                      </div>
                      <div class="invoice_title">
                      <p><strong>Ksh <?php echo number_format($total + $shipping); ?></strong></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="print_tns">
                <p>Thank you for shopping with us <span style="color: #330066;"><?php echo $customer_name; ?></span></p>
              </div>
            </div>

        </div>
        <div class="btn_print">
          <button onclick="PrintDiv()"><i class="fa fa-copy"></i> Print</button>
        </div>
      </div>
<?php } ?>
    <script type="text/javascript">     
    function PrintDiv() {    
       var divToPrint = document.getElementById('divToPrint').innerHTML;
       var popupWin = document.body.innerHTML;

       document.body.innerHTML = divToPrint;

       window.print();

       document.body.innerHTML = popupWin;

            }
 </script>
<?php require_once 'includes/footer.php'; ?>