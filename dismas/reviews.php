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
	        <div class="dashHeader">
                <p class="howdy_dashboard">Welcome to Customer Reviews</p>
                <a>See the list and delete irrelevant ratings right from here.</a>
            </div>                          
            <div class="notification_main_africa">
                <?php
                    $getRatings = $getFromU->viewRatingAllData($start_from, $per_page);
                    $count_pay = count($getRatings);
                    if ($count_pay == 0) {
                    ?>
                    <div class="account-log">
                      <a>No Ratings Here</a>
                    </div>
                <?php
                } else {
                
                foreach ($getRatings as $getRating) {
                    $rating_id = $getRating->rating_id;
                    $rating_number = $getRating->rating_number;
                    $user_name = $getRating->user_name;
                    $rating_message = $getRating->rating_message;
                ?>
                <div class="item__rate_span_icons">
                    <div class="rating_rev_data">
                        <h4><?php echo $user_name;?></h4>
                    </div>
                    <div class="ray__num">
                        <p><?php echo $rating_number;?></p>
                    </div> 
                    <div class="rating_data">
                        <p><?php echo $rating_message;?></p>
                    </div> 
                    <div class="item__span__icons">
                        <span><a href="ratings.php?rating_id=<?php echo $rating_id;?>"><i class="fa fa-trash"></i>Delete</a></span>
                    </div>
                </div>
            <?php } } ?> 
            </div>            
            <div class="number-list">
              <?php
                  $total_pages = $getFromU->countRatingsNum("ratings", $per_page);
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

<?php require_once 'includes/footer.php'; ?>