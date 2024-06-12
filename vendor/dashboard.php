<?php

require_once 'includes/header.php';
$get_admin = $getFromU->view_vendor_by_email($_SESSION['vendor_email']);
$vendor_email = $_SESSION['vendor_email'];
$get_vendor = $getFromU->view_vendor_by_email($vendor_email);
$vendor_id = $get_vendor->vendor_id;      

    if (!isset($_SESSION['vendor_email'])) {
        header('location: sign-in-vendor.php');
    }
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
        <div class="dashAlign">
            <div class="dashAlignContainer lineDashOne">                           
                <?php
                    $get_customers = $getFromU->countVendorDashCustomers("customer_orders", $vendor_id);
                    $count_customers = count($get_customers);
                ?>
                <div class="appData">
                    <p>Total Customers</p>
                    <a><?php echo $count_customers; ?></a>
                </div>
                <div class="appIcon">
                    <i class="fa fa-users"></i>
                </div>
            </div>
            <div class="dashAlignContainer dashFit lineDashtwo">
                <?php
                    $get_pending_orders = $getFromU->viewVendorDaCustomerOrders("customer_orders", $vendor_id);
                    $count_orders = count($get_pending_orders);
                ?>
                <div class="appData">
                    <p>Total Orders</p>
                    <a><?php echo $count_orders; ?></a>
                </div>
                <div class="appIcon">
                    <i class="fa fa-sitemap"></i>
                </div>
            </div>
            <div class="dashAlignContainer dashFit lineDashthree">
                <?php
                    $get_order_totals = $getFromU->viewOrderPayments();
                    $count_sales = $get_order_totals;
                ?>   
                <?php
                    $get_inventory = $getFromU->countVendorDashProductsNum("products", $vendor_id);
                    $count_inventory = count($get_inventory);
                ?>                          
                <div class="appData">
                    <p>Total Products</p>
                    <a><?php echo $count_inventory; ?></a>
                </div>
                <div class="appIcon">
                    <i class="fa fa-credit-card"></i>
                </div>
            </div>
        </div>                    
        <div class="dashOrders">
          <div class="visit_statistics">
            <h3>Latest Orders</h3>
            <p>Orders: <span class="colc"><?php echo $count_orders; ?></span> | Revenue: <span class="colc">Ksh <?php echo number_format($count_sales); ?></span></p>
            <div class="table_scroll">
              <table>
                <tr>
                    <th>Invoice No.</th>
                    <th>Client</th>
                    <th>Product</th>
                    <th>Order Date</th>
                    <th>Quantity</th>
                    <th>Total</th>
                </tr>
                <?php
                    $customer_orders = $getFromU->viewVendorDashCustomerOrderss($vendor_id);
                    $count_products = count($customer_orders);
                      if ($count_products == 0) {
                      ?>
                      <div class="account-log">
                        <a>No Orders Here</a>
                      </div>
                  <?php
                  } else {
                    foreach ($customer_orders as $customer_order) {
                        $order_id = $customer_order->order_id;
                        $customer_id = $customer_order->customer_id;
                        $qty = $customer_order->qty;
                        $invoice_no = $customer_order->invoice_no;

                          $view_customer = $getFromU->view_customer_by_id($customer_id);
                          $customer_firstname = $view_customer->customer_firstname;
                          $customer_lastname = $view_customer->customer_lastname;
                          $customer_name = $customer_firstname. ' ' .$customer_lastname;

                          $view_customer_order = $getFromU->view_customer_order_by_order_id($order_id);
                          $order_date = $view_customer_order->order_date;
                          $due_amount = $view_customer_order->due_amount;
                          $productname = $view_customer_order->productname;

                        
                ?>
                <tr>
                  <td style="width: 10%; font-size: 14px;">#00<?php echo $invoice_no; ?></td>
                  <td style="width: 12%; font-size: 14px;"><?php echo $customer_name; ?></td>
                  <td style="width: 23%; font-size: 14px;"><span id="not_shipped"><?php echo $productname; ?></span></td>
                  <td style="width: 25%; font-size: 14px;"><?php echo $order_date; ?></td>
                  <td style="width: 15%; font-size: 14px;"><span  id="paid"><?php echo $qty; ?></span></td>
                  <td style="width: 15%; font-size: 14px;">Ksh <?php echo number_format($due_amount); ?></td>
                </tr>
              <?php } } ?>
              </table>
            </div>
          </div>
      </div>
    </div>
    <?php require_once 'includes/footer.php'; ?>
</div>