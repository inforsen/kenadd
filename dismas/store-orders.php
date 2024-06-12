<?php

 require_once 'includes/header.php'; 
?>
<?php
    $per_page = 25;
    if (isset($_GET['$page'])) {
        $page = $_GET['$page'];
    }else{
        $page = 1;
    }
    $start_from = ($page - 1) * $per_page;
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
            <div class="company_dashboard_body">
                <p class="howdy_dashboard">Welcome to Orders</p>
                <a>See your customer orders list right from your dashboard.</a>
            </div>                     
            <div class="notification_main_africa">
                
              <div class="visit_statistics">
                <?php
                    $get_orders = $getFromU->countCustomerOrders("customer_orders");
                    $count_orders = count($get_orders);
                ?>
                <p>Total orders: <span class="colc"><?php echo $count_orders; ?></span></p>
                <div class="table_scroll">
                  <table>
                  <tr>
                    <th>Tracking No.</th>
                    <th>Client</th>
                    <th>Product</th>
                    <th>Order Date</th>
                    <th>Quantity</th>
                    <th>Total</th>
                    <th>Print</th>
                  </tr>
                  <?php
                      $customer_orders = $getFromU->viewCustomerOrderss($start_from, $per_page);
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
                        <form method="POST">
                          <tr>
                            <td style="width: 14%; font-size: 14px;">#<?php echo $invoice_no; ?></td>
                            <td style="width: 16%; font-size: 14px;"><?php echo $customer_name; ?></td>
                            <td style="width: 18%; font-size: 14px;" class="ship_div"><?php echo $productname; ?></td>
                            <td style="width: 15%; font-size: 14px;"><?php echo $order_date; ?></td>
                            <td style="width: 12%; font-size: 14px;"><?php echo $qty; ?></td>
                            <td class="order_price" style="width: 15%; font-size: 14px;">Ksh <?php echo number_format($due_amount); ?></td>
                            <td style="width: 22%;"><a href="order.php">View</a></td>
                          </tr>
                      </form>
                  <?php } ?>
                  </table>
                  <div class="number-list">
                  <?php
                      $total_pages = $getFromU->countStoreOrders("customer_orders", $per_page);
                      if ($total_pages >=2) {
                  ?>
                      <a class="<?php if(isset($_GET['$page']) == 1) { echo 'active';}?>" href="store-orders.php?$page=1">1</a>
                  <?php
                          for ($i = 2; $i < $total_pages; $i++) {
                  ?>
                      <a class="<?php if(isset($_GET['$page']) == $i) { echo 'active';}?>" href="store-orders.php?$page=<?php echo $i; ?>"><?php echo substr($i, 0, 5); ?></a>
                  <?php } ?>
                      <a class="<?php if(isset($_GET['$page']) == $total_pages) { echo 'active';}?>" href="store-orders.php?$page=<?php echo $total_pages; ?>">Last</a>
                  <?php } ?>
                  </div>
                </div>
              </div>
            </div>
        </div>

<?php require_once 'includes/footer.php'; ?>