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
                <p class="howdy_dashboard">Your Vendors</p>
                <a>See your Vendor's right from your dashboard.</a>
            </div>                     
            <div class="notification_main_africa">
                <div class="visit_statistics">
                    <?php
                        $get_customers = $getFromU->countCustomers("vendor");
                        $count_customers = count($get_customers);
                    ?>
                    <p>Total Customers: <span class="colc"><?php echo $count_customers; ?></span></p>

                    <div class="table_scroll">
                      <table>
                        <tr>
                          <th></th>
                          <th>Name</th>
                          <th>Phone</th>
                          <th>Email</th>
                          <th>Country</th>
                        </tr>
                        <?php
                              $i =0;
                              $view_customers = $getFromU->viewVendorssFromTables($start_from, $per_page);
                              foreach ($view_customers as $view_customer) {
                                  $vendor_name = $view_customer->vendor_name;
                                  $vendor_email = $view_customer->vendor_email;
                                  $vendor_contact = $view_customer->vendor_contact;
                                  $vendor_country = $view_customer->vendor_country;
                                  $vendor_job = $view_customer->vendor_job;
                                  $vendor_about = $view_customer->vendor_about;
                                  $i++;
                          ?>
                        <tr>
                          <td style="width: 6%;font-size:14px;">#00<?php echo $i; ?></td>
                          <td style="width: 18%;font-size:14px;"><?php echo $vendor_name; ?></td>
                          <td style="width: 12%;font-size:14px;"><?php echo $vendor_contact; ?></td>
                          <td style="width: 20%;font-size:14px;"><?php echo $vendor_email; ?></td>
                          <td style="width: 24%;font-size:14px;"><?php echo $vendor_country; ?></td>
                        </tr>
                      <?php } ?>
                      </table>

                    <div class="number-list">
                      <?php
                          $total_pages = $getFromU->countCustomersNum("vendor", $per_page);
                          if ($total_pages >=2) {
                      ?>
                          <a class="<?php if(isset($_GET['$page']) == 1) { echo 'active';}?>" href="vendors.php?$page=1">1</a>
                      <?php
                              for ($i = 2; $i < $total_pages; $i++) {
                      ?>
                          <a class="<?php if(isset($_GET['$page']) == $i) { echo 'active';}?>" href="vendors.php?$page=<?php echo $i; ?>"><?php echo substr($i, 0, 5); ?></a>
                      <?php } ?>
                          <a class="<?php if(isset($_GET['$page']) == $total_pages) { echo 'active';}?>" href="vendors.php?$page=<?php echo $total_pages; ?>">Last</a>
                      <?php } ?>
                          </div>
                        </div>
                    </div>

                  </div>
            </div>

<?php require_once 'includes/footer.php'; ?>
