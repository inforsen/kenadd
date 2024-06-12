<?php

 require_once 'includes/header.php';       

?>
<?php

    if (isset($_GET['rating_id'])) {
        $rating_id = $_GET['rating_id'];
        $delete_id = $getFromU->deleteRating($rating_id);
    }
?>
<?php
    $per_page = 20;
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
                <p class="howdy_dashboard">Welcome to Customer Payments</p>
                <a>See the list of payments you have received from your customers.</a>
            </div>                          
            <div class="notification_main_africa">
                    <div class="visit_statistics">
                        <div class="table_scroll">
                            <table>
                                <tr>
                                    <th>Customer</th>
                                    <th>Email</th>
                                    <th>Payment Status</th>
                                    <th>Address</th>
                                </tr>
                                <?php
                                    $get_payments = $getFromU->view_payments();
                                    $count_pay = count($get_payments);
                                    if ($count_pay == 0) {
                                    ?>
                                    <div class="account-log">
                                      <a>No Payments Made</a>
                                    </div>
                            <?php
                            } else {

                            foreach ($get_payments as $get_payment) {
                                $payment_id = $get_payment->payment_id;
                                $name = $get_payment->name;
                                $email = $get_payment->email;
                                $address = $get_payment->address;
                                ?>
                                <tr>
                                    <td style="width: 25%;"><?php echo $name; ?></td>
                                    <td style="width: 25%;"><?php echo $email; ?></td>
                                    <td style="width: 25%;">Paid</td>
                                    <td style="width: 25%;"><?php echo $address; ?></td>
                                </tr>
                            <?php } } ?>
                            </table>
                        </div>
                    </div>  
                <div class="number-list">
                  <?php
                      $total_pages = $getFromU->countPaymentssNum("ratings", $per_page);
                      if ($total_pages >=2) {
                  ?>
                      <a class="<?php if(isset($_GET['$page']) == 1) { echo 'active';}?>" href="ratings.php?$page=1">1</a>
                  <?php
                          for ($i = 2; $i < $total_pages; $i++) {
                  ?>
                      <a class="<?php if(isset($_GET['$page']) == $i) { echo 'active';}?>" href="ratings.php?$page=<?php echo $i; ?>"><?php echo substr($i, 0, 5); ?></a>
                  <?php } ?>
                      <a class="<?php if(isset($_GET['$page']) == $total_pages) { echo 'active';}?>" href="ratings.php?$page=<?php echo $total_pages; ?>">Last</a>
                  <?php } ?>
                </div>
            </div>
        </div>

<?php require_once 'includes/footer.php'; ?>