<?php require_once './core/init.php';$ip_add=$getFromU->getRealUserIp();
   function template_header($title) {
       
   echo <<<EOT
   <!DOCTYPE html>
   <html lang="en">
     <head>
         <title>$title</title>      
     </head>
   EOT;
   }

   $mydate=getdate(date("U"));

   $total=0;
   $records=$getFromU->select_products_by_ip($ip_add);
   foreach($records as $record){
      $products_id=$record->p_id;
      $products_qty=$record->qty;

      $get_prices=$getFromU->viewProductByProductID($products_id);
      foreach($get_prices as $get_price){
         $products_price=$get_price->product_price;
         $sub_total=$products_price*$products_qty;
         $total+=$sub_total;
      }
   }
   
   if(isset($_POST['delprod'])){
      $products_id=$_POST['product_id'];
      $delete_id=$getFromU->delete_from_cart_by_id($products_id,$ip_add);

      if($delete_id){
         $error="Deleted Sucessfully";
      }
   }
   if(isset($_POST['subscribe_now'])){
      $email=$getFromU->checkInput($_POST['email']);
      $consent=$getFromU->checkInput($_POST['psgdpr_consent_checkbox']);
      $success="You Have Successfully Subscribed!";
      $subscribe=$getFromU->create("subscribers",array("email"=>$email,"consent"=>$consent));
      $to="store@kenadd.com";
      $subject="New Website Subscription";
      $mes="The following email has subscribed to your site. <br><br> You can send them seasonal offers and discounts, etc: <br><br> Email: ".$email."";
      $headers=array();
      $headers[]="MIME-Version: 1.0";
      $headers[]="Content-type: text/html; charset=iso-8859-1";
      $headers[]="From: Kenadd Website <store@kenadd.com>";
      $headers[]="Subject: {$subject}";
      $headers[]="X-Mailer: PHP/".phpversion();mail($to,$subject,$mes,implode("\r\n",$headers));

      $_SESSION['rfqSucc']='You have Successfully Subscribed';
   }

   if(isset($_POST['submitMessage'])){
      $subject=$getFromU->checkInput($_POST['subject']);
      $email=$getFromU->checkInput($_POST['email']);
      $message=$getFromU->checkInput($_POST['message']);
      $attachment=$_FILES['fileUpload']["name"];
      $success="Your Message Has Been Sent!";
      $to="store@kenadd.com, festus@kenadd.com";
      $subject="New Website Contact Form Message";
      $txt="You have received an email from: <br><br> Email: ".$email." <br>Subject: ".$subject."  <br><br><strong> Message: </strong><br> ".$message."";$headers=array();$headers[]="MIME-Version: 1.0";$headers[]="Content-type: text/html; charset=iso-8859-1";
      $headers[]="From: Kenadd Webmail <contact@kenadd.com>";
      $headers[]="Subject: {$subject}";
      $headers[]="X-Mailer: PHP/".phpversion();mail($to,$subject,$txt,implode("\r\n",$headers));

      $_SESSION['rfqSucc']='<div class="alerts-success"><p class="mb-0 ls-normal">You message has been received.</p></div>';} ?>

<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta content="ie=edge"http-equiv="x-ua-compatible">
      <title>Welcome to Kenadd Store</title>
      <meta content="Shop powered by Inforsen"name="description">
      <meta content=""name="keywords">
      <link href="index.php"rel="alternate"hreflang="en-us">
      <meta content="Kenadd"property="og:title">
      <meta content="Shop powered by Inforsen"property="og:description">
      <meta content="https://inforsen.com/"property="og:url">
      <meta content="Kenadd"property="og:site_name">
      <meta content="website"property="og:type">
      <meta content="width=device-width,initial-scale=1"name="viewport">
      <link href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/img/favicon.ico?1683626859"rel="icon"type="image/vnd.microsoft.icon">
      <link href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/img/favicon.ico?1683626859"rel="shortcut icon"type="image/x-icon">
      <link href="themes/PRS02048/assets/cache/theme-0438367.css"rel="stylesheet"type="text/css"media="all">
      <link href="themes/PRS02048/assets/cache/theme-8239c57.css"rel="stylesheet"type="text/css"media="all">
      <link href="themes/PRS02048/assets/cache/theme-0455d67.css"rel="stylesheet"type="text/css"media="all">
      <link href="https://fonts.googleapis.com"rel="preconnect">
      <script crossorigin="anonymous"src="https://kit.fontawesome.com/9187ea3dab.js"></script>
      <link href="https://fonts.gstatic.com"rel="preconnect"crossorigin>
      <link href="https://fonts.googleapis.com/icon?family=Material+Icons"rel="stylesheet">
      <script type="text/javascript">var CPBORDER_RADIUS="0",CPBOX_LAYOUT="0",CPDISPLAY_PRODUCT_VARIANTS="1",CPSTICKY_HEADER="1",buttoncompare_title_add="Add to Compare",buttoncompare_title_remove="Remove from Compare",buttonwishlist_title_add="Add to Wishlist",buttonwishlist_title_remove="Remove from WishList",comparator_max_item=3,compared_products=[],isLogged=!1,prestashop={}</script>
      <link href="http://fonts.googleapis.com/css?family=Karla:300,400,500,600,700,800,900&display=swap"rel="stylesheet"id="body_font">
      <link href="#"rel="stylesheet"id="title_font">
   </head>
   <body id="category" class="lang-en country-us currency-usd layout-both-columns page-category tax-display-disabled category-id-2 category-home category-id-parent-1 category-depth-level-1">
      <main id="page">
      <header id="header">
         <div class="header-banner"></div>
         <nav class="header-nav">
            <div class="container">
               <div class="left-nav">
                  <div id="cpheadercms1">
                     <div class="contact-link">Get Up To 50% OFF New Season Styles, Limited Time Only.</div>
                  </div>
               </div>
               <div class="right-nav">
                  <div id="_desktop_user_info"><!---a class="top-link locator"href="index.php?page=contact-us"><i class="locator-icon"></i> <span>Store Locator</span> </a>---><a class="top-link track-order"href="index.php?page=login"><i class="track-icon"></i> <span>Track Your Order</span> </a>

                     <?php 
                        if (!isset($_SESSION['customer_email'])) {
                            echo '
                            <a class="top-link account sign-in"href="index.php?page=my-account"rel="nofollow"title="Log in to your customer account"><i class="account-icon"></i> <span>My Account</span></a>
                            ';
                        } else {
                            $customer = $getFromU->view_customer_by_email($_SESSION['customer_email']);
                            $customer_name = $customer->customer_firstname;
                            $firstname = $customer->customer_firstname;
                            $lastname = $customer->customer_lastname;
                            $customer_name_echo = substr($customer_name, 0, 8);
                            echo '
                            <a class="top-link account sign-in"href="index.php?page=my-account"rel="nofollow"title="Log in to your customer account"><i class="account-icon"></i> <span>Hello '.$customer_name_echo.'...</span></a>

                            ';
                        }
                        ?>

                  </div>
                  <!---div class="user-info-side"id="verticalmenu_desktop_user_info"><a href="index.php?page=login"rel="nofollow"title="Log in to your customer account"><span>Sign in</span></a></div>--->
               </div>
            </div>
         </nav>
         <div class="header-top">
            <div class="header-div">
               <div class="container">
                  <div class="header-left">
                     <div class="header_logo"id="_desktop_logo"><a href="index.php"><img src="images/biglogo.png"alt="Kenadd Logo"class="logo"loading="lazy"></a></div>
                  </div>
                  <div class="header-center">
                     <div class="mobile text-xs-center">
                        <div class="menu-container">
                           <div class="menu-icon">
                              <div class="cat-title"><i class="material-icons menu-open"></i></div>
                           </div>
                        </div>
                     </div>
                     <div class="clearfix col-lg-12 hb-animate-element sidevertical-menu tmvm-contener top-to-bottom"id="cp_sidevertical_menu_top">
                        <div class="title_main_menu">
                           <div class="title_menu">Menu</div>
                           <div class="menu-icon active">
                              <div class="cat-title title2"><i class="material-icons menu-close"></i></div>
                           </div>
                        </div>
                        <div class="js-top-menu menu position-static sidevertical-menu"id="sidevertical_menu">
                           <div class="js-top-menu mobile">
                              <ul class="top-menu"data-depth="0"id="top-menu">
                                 <li class="category"id="cpcategory-6">
                                    <a class="dropdown-item"data-depth="0"href="index.php?page=products"><span class="pull-xs-right"><span class="collapse-icons navbar-toggler"data-target="#top_sub_menu_77602"data-toggle="collapse"><i class="material-icons add"></i> <i class="material-icons remove"></i> </span></span>Furniture</a>
                                    <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_77602">
                                       <ul class="top-menu"data-depth="1">
                                          <li class="category"id="cpcategory-7"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=chairs">Chairs</a></li>
                                          <li class="category"id="cpcategory-8"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=couches">Couches</a></li>
                                          <li class="category"id="cpcategory-31"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=beds">Beds</a></li>
                                          <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=stools">Stools</a></li>
                                          <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=dining">Dinning</a></li>
                                          <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=kids-furniture">Kids furniture</a></li>
                                          <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=animals-and-pets">Animals and pets</a></li>
                                          <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=ottoman">Ottoman</a></li>
                                          <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=wall-units">Wall units</a></li>
                                          <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=tv-stands">Tv stands</a></li>
                                       </ul>
                                    </div>
                                 </li>
                                 <li class="category"id="cpcategory-9">
                                    <a class="dropdown-item"data-depth="0"href=""><span class="pull-xs-right"><span class="collapse-icons navbar-toggler"data-target="#top_sub_menu_28251"data-toggle="collapse"><i class="material-icons add"></i> <i class="material-icons remove"></i> </span></span>Art and prints</a>
                                    <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_28251">
                                       <ul class="top-menu"data-depth="1">
                                          <li class="category"id="cpcategory-34"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=paintings">Paintings</a></li>
                                          <li class="category"id="cpcategory-35"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=photography">Photography</a></li>
                                          <li class="category"id="cpcategory-36"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=printings">Printings</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=etching">Etching</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=wood-art">Wood art</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=screen-prints">Screen prints</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=linocut">Linocut</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=engraving">Engraving</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=tapestries">Tapestries</a></li>
                                       </ul>
                                    </div>
                                 </li>
                                 <li class="category"id="cpcategory-9">
                                    <a class="dropdown-item"data-depth="0"><span class="pull-xs-right"><span class="collapse-icons navbar-toggler"data-target="#top_sub_menu_28250"data-toggle="collapse"><i class="material-icons add"></i> <i class="material-icons remove"></i> </span></span>Plants and planters</a>
                                    <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_28250">
                                       <ul class="top-menu"data-depth="1">
                                          <li class="category"id="cpcategory-34"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=artificial-plants">Artificial plants</a></li>
                                          <li class="category"id="cpcategory-35"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=live-plants">Live plants</a></li>
                                          <li class="category"id="cpcategory-36"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=wooden-plnaters">Wooden planters</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=plastic-planters">Plastic planters</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=fiberglass-planters">Fiberglass planters</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=ceramic-plants">Ceramic planters</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=concrete-planters">Concrete planters</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=pots">Pots</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=resin-planters">Resin planters</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=metallic-planters">Metallic planters</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=hanging-planters">Hanging planters</a></li>
                                       </ul>
                                    </div>
                                 </li>
                                 <li class="category"id="cpcategory-9">
                                    <a class="dropdown-item"data-depth="0"><span class="pull-xs-right"><span class="collapse-icons navbar-toggler"data-target="#top_sub_menu_28252"data-toggle="collapse"><i class="material-icons add"></i> <i class="material-icons remove"></i> </span></span>Storage and organizers</a>
                                    <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_28252">
                                       <ul class="top-menu"data-depth="1">
                                          <li class="category"id="cpcategory-34"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=closets-and-organizers">closets and organizers</a></li>
                                          <li class="category"id="cpcategory-35"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=cabinet-storages">cabinet storages</a></li>
                                          <li class="category"id="cpcategory-36"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=bedroom-organizers">Bedroom organizers</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=gadget-organizers">Gadget organizers</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=bathroom">Bathroom</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=drawer">Drawer</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=pantry">Pantry</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=spices">Spices</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=kitchen">Kitchen</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=food">Food</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=garage">Garage</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=fluids">Fluids</a></li>
                                       </ul>
                                    </div>
                                 </li>
                                 <li class="category"id="cpcategory-9">
                                    <a class="dropdown-item"data-depth="0"><span class="pull-xs-right"><span class="collapse-icons navbar-toggler"data-target="#top_sub_menu_28253"data-toggle="collapse"><i class="material-icons add"></i> <i class="material-icons remove"></i> </span></span>Textiles and rags</a>
                                    <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_28253">
                                       <ul class="top-menu"data-depth="1">
                                          <li class="category"id="cpcategory-34"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=cotton">Cotton</a></li>
                                          <li class="category"id="cpcategory-35"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=wool">Wool</a></li>
                                          <li class="category"id="cpcategory-36"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=linen">Linen</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=nylon">Nylon</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=jute">Jute</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=polyester">Polyester</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=acrylic-fiber">Acrylic fiber</a></li>
                                       </ul>
                                    </div>
                                 </li>
                                 <li class="category"id="cpcategory-9">
                                    <a class="dropdown-item"data-depth="0"><span class="pull-xs-right"><span class="collapse-icons navbar-toggler"data-target="#top_sub_menu_28254"data-toggle="collapse"><i class="material-icons add"></i> <i class="material-icons remove"></i> </span></span>Pet supplies</a>
                                    <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_28254">
                                       <ul class="top-menu"data-depth="1">
                                          <li class="category"id="cpcategory-34"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=pet-clothing">Pet clothing</a></li>
                                          <li class="category"id="cpcategory-35"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=beds">Beds</a></li>
                                          <li class="category"id="cpcategory-36"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=dog-collars">Dog collars</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=leashes">Leashes</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=toys">Toys</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=litter">Litter</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=birds">Birds</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=small-pets">Small pets</a></li>
                                       </ul>
                                    </div>
                                 </li>
                                 <li class="category"id="cpcategory-9">
                                    <a class="dropdown-item"data-depth="0"><span class="pull-xs-right"><span class="collapse-icons navbar-toggler"data-target="#top_sub_menu_28255"data-toggle="collapse"><i class="material-icons add"></i> <i class="material-icons remove"></i> </span></span>Lighting</a>
                                    <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_28255">
                                       <ul class="top-menu"data-depth="1">
                                          <li class="category"id="cpcategory-34"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=accent-lighting">Accent lighting</a></li>
                                          <li class="category"id="cpcategory-35"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=ceiling-lights">Ceiling lights</a></li>
                                          <li class="category"id="cpcategory-36"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=chandeliers">Chandeliers</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=downlights">Downlights</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=luminaire">Luminaire</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=scons">Scones</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=led-stripes">Led stripes</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=track-lighting">Track lighting</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=desk-lights">Desk lights</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=ambient-lights">Ambient lights</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=bias-lights">Bias lights</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=fill-lights">Fill lights</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=recessed-lights">Recessed lights</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=arm-lights">Arm lights</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=grow-lights">Grow lights</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=halogen-bulbs">Halogen bulbs</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=outdoor-lights">Outdoor lights</a></li>
                                       </ul>
                                    </div>
                                 </li>
                                 <li class="category"id="cpcategory-9">
                                    <a class="dropdown-item"data-depth="0"><span class="pull-xs-right"><span class="collapse-icons navbar-toggler"data-target="#top_sub_menu_28256"data-toggle="collapse"><i class="material-icons add"></i> <i class="material-icons remove"></i> </span></span>Kitchen</a>
                                    <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_28256">
                                       <ul class="top-menu"data-depth="1">
                                          <li class="category"id="cpcategory-34"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=kitchen-hoods">Kitchen hoods</a></li>
                                          <li class="category"id="cpcategory-35"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=sinks">Sinks</a></li>
                                          <li class="category"id="cpcategory-36"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=faucets">Faucets</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=cookware">Cookware</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=accessories">Accessories</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=appliances">Appliances</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=fittings-and-handles">Fittings and handles</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=cutlery">Cutlery</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=ovens">Ovens</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=waste-containers">Waste containers</a></li>
                                       </ul>
                                    </div>
                                 </li>
                                 <li class="category"id="cpcategory-9">
                                    <a class="dropdown-item"data-depth="0"><span class="pull-xs-right"><span class="collapse-icons navbar-toggler"data-target="#top_sub_menu_28257"data-toggle="collapse"><i class="material-icons add"></i> <i class="material-icons remove"></i> </span></span>Toilet</a>
                                    <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_28257">
                                       <ul class="top-menu"data-depth="1">
                                          <li class="category"id="cpcategory-34"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=bathtubs">Bathtubs</a></li>
                                          <li class="category"id="cpcategory-35"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=sinks">Sinks</a></li>
                                          <li class="category"id="cpcategory-36"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=toilets">Toilets</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=faucets">Faucets</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=wall-mounts-and-cabinets">Wall mounts and cabinets</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=fittings">Fittings</a></li>
                                       </ul>
                                    </div>
                                 </li>
                                 <li class="category"id="cpcategory-9">
                                    <a class="dropdown-item"data-depth="0"><span class="pull-xs-right"><span class="collapse-icons navbar-toggler"data-target="#top_sub_menu_28258"data-toggle="collapse"><i class="material-icons add"></i> <i class="material-icons remove"></i> </span></span>Bathroom</a>
                                    <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_28258">
                                       <ul class="top-menu"data-depth="1">
                                          <li class="category"id="cpcategory-34"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=mirrors">Mirrors</a></li>
                                          <li class="category"id="cpcategory-35"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=showers">Showers</a></li>
                                          <li class="category"id="cpcategory-36"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=shelves">Shelves</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=towel-rings">Towel rings</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=soap-dishes">Soap dishes</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=toothbrush-holders">Toothbrush holders</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=dispensers">Dispensers</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=accessories">Accessories</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=rob-hooks">Rob hooks</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=organizers">Organizers</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=curtains">Curtains</a></li>
                                       </ul>
                                    </div>
                                 </li>
                                 <li class="category"id="cpcategory-9">
                                    <a class="dropdown-item"data-depth="0"><span class="pull-xs-right"><span class="collapse-icons navbar-toggler"data-target="#top_sub_menu_28259"data-toggle="collapse"><i class="material-icons add"></i> <i class="material-icons remove"></i> </span></span>Outdoor</a>
                                    <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_28259">
                                       <ul class="top-menu"data-depth="1">
                                          <li class="category"id="cpcategory-34"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=rugs">Rugs</a></li>
                                          <li class="category"id="cpcategory-35"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=lighting">Lighting</a></li>
                                          <li class="category"id="cpcategory-36"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=furniture">Furniture</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=fireplace-and-warmth">Fireplace and warmth</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=planters">Planters</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=garden-statues-and-fixtures">Garden statues and fixtures</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=fountains">Fountains</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=landscaping-supplies">Landscaping supplies</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=decorative-items">Decorative items</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=cushions">Cushions</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=trellises">Trellises</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=garden-decor">Garden décor</a></li>
                                       </ul>
                                    </div>
                                 </li>
                                 <li class="category"id="cpcategory-9">
                                    <a class="dropdown-item"data-depth="0"><span class="pull-xs-right"><span class="collapse-icons navbar-toggler"data-target="#top_sub_menu_28260"data-toggle="collapse"><i class="material-icons add"></i> <i class="material-icons remove"></i> </span></span>Office furniture</a>
                                    <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_28260">
                                       <ul class="top-menu"data-depth="1">
                                          <li class="category"id="cpcategory-34"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=furniture">Furniture</a></li>
                                          <li class="category"id="cpcategory-35"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=lighting">Lighting</a></li>
                                          <li class="category"id="cpcategory-36"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=organizers">Organizers</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=rugs">Rugs</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=fixtures">Fixtures</a></li>
                                       </ul>
                                    </div>
                                 </li>
                                 <li class="category"id="cpcategory-9">
                                    <a class="dropdown-item"data-depth="0"><span class="pull-xs-right"><span class="collapse-icons navbar-toggler"data-target="#top_sub_menu_28261"data-toggle="collapse"><i class="material-icons add"></i> <i class="material-icons remove"></i> </span></span>Health and wellness</a>
                                    <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_28261">
                                       <ul class="top-menu"data-depth="1">
                                          <li class="category"id="cpcategory-34"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=fitness">Fitness</a></li>
                                          <li class="category"id="cpcategory-35"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=weight-care">Weight care</a></li>
                                          <li class="category"id="cpcategory-36"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=lifestyle">Lifestyle</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=sexual-wellness">Sexual wellness</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=beauty-and-grooming">Beauty and grooming</a></li>
                                          <li class="category"id="cpcategory-36"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=cosmetics">Cosmetics</a></li>
                                          <li class="category"id="cpcategory-36"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=social">Social</a></li>
                                          <li class="category"id="cpcategory-36"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=healthy-living">Healthy living</a></li>
                                          <li class="category"id="cpcategory-36"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=mental-health">Mental health</a></li>
                                          <li class="category"id="cpcategory-36"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=intellectual">Intellectual</a></li>
                                          <li class="category"id="cpcategory-36"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=sleep">Sleep</a></li>
                                          <li class="category"id="cpcategory-36"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=spirituality">Spirituality</a></li>
                                          <li class="category"id="cpcategory-36"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=personalized">Personalized</a></li>
                                       </ul>
                                    </div>
                                 </li>
                                 <li class="category"id="cpcategory-9">
                                    <a class="dropdown-item"data-depth="0"><span class="pull-xs-right"><span class="collapse-icons navbar-toggler"data-target="#top_sub_menu_28262"data-toggle="collapse"><i class="material-icons add"></i> <i class="material-icons remove"></i> </span></span>Accommodation</a>
                                    <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_28262">
                                       <ul class="top-menu"data-depth="1">
                                          <li class="category"id="cpcategory-34"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=hotels">Hotels</a></li>
                                          <li class="category"id="cpcategory-36"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=bed-and-breakfast">Bed and breakfast</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=cottages">Cottages</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=motels">Motels</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=guest-houses">Guest houses</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=apartments">Apartments</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=camps-and-campsites">Camps and Campsites</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=lodgings">Lodgings</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=chalet">Chalet</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=boutique-hotels">Boutique Hotels</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=bungalow">Bungalow</a></li>
                                          <li class="category"id="cpcategory-37"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=homestays">Homestays</a></li>
                                       </ul>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                        <div class="verticalmenu-side">
                           <div class="vertical-side-top-text">
                              <div id="_desktop_user_info"><!---a class="top-link locator"href="stores.html"><i class="locator-icon"></i> <span>Store Locator</span> </a>---><a class="top-link track-order"href="login856b.html"><i class="track-icon"></i> <span>Track Your Order</span> </a>

                                 <?php 
                                    if (!isset($_SESSION['customer_email'])) {
                                        echo '
                                        <a class="top-link account sign-in"href="index.php?page=login"rel="nofollow"title="Log in to your customer account"><i class="account-icon"></i> <span>My Account</span></a>
                                        ';
                                    } else {
                                        $customer = $getFromU->view_customer_by_email($_SESSION['customer_email']);
                                        $customer_name = $customer->customer_firstname;
                                        $firstname = $customer->customer_firstname;
                                        $lastname = $customer->customer_lastname;
                                        $customer_name_echo = substr($customer_name, 0, 8);
                                        echo '
                                        <a class="top-link account sign-in"href="index.php?page=my-account"rel="nofollow"title="Log in to your customer account"><i class="account-icon"></i> <span>Hello '.$customer_name_echo.'...</span></a>

                                        ';
                                    }
                                    ?>

                              </div>
                              <!---div class="user-info-side"id="verticalmenu_desktop_user_info"><a href="loginfd9a.html"rel="nofollow"title="Log in to your customer account"><span>Sign in</span></a></div>--->
                           </div>
                           <div id="cpheadercms1">
                              <div class="contact-link">Get Up To 50% OFF New Season Styles, Limited Time Only.</div>
                           </div>
                        </div>
                     </div>
                     <script type="text/javascript">var moreCategoriesText="More",lessCategoriesText="Less"</script>
                     <div class="col-sm-5"id="search_block_top">
                        <span class="search_button"></span>
                        <div class="searchtoggle">
                           <form action="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/search"id="searchbox">
                              <div class="cpsearch-main">
                                 <input value="search"name="controller"type="hidden"> <input value="position"name="orderby"type="hidden"> <input value="desc"name="orderway"type="hidden"> <input value=""name="s"class="form-control search_query"id="search_query_top"placeholder="Search Product Here...">
                                 <div class="select-wrapper">
                                    <select class="form-control"id="search_category"name="search_category">
                                       <option value="all">All Categories</option>
                                       <option value="3">Bedroom</option>
                                       <option value="6">Furniture</option>
                                       <option value="9">Living Room</option>
                                       <option value="10">Art and prints</option>
                                       <option value="11">Outdoor</option>
                                       <option value="12">Garden</option>
                                       <option value="13">Sofas & Armchairs</option>
                                       <option value="14">Home Accessories</option>
                                    </select>
                                 </div>
                                 <div id="cp_url_ajax_search"style="display:none"><input value="https://prestashop.coderplace.com/PRS02/PRS02048/demo/modules/cp_blocksearch/controller_ajax_search.php"type="hidden"class="url_ajax"></div>
                              </div>
                              <button type="submit"class="btn btn-primary">
                                 <div class="submit-text">Search</div>
                              </button>
                           </form>
                        </div>
                     </div>
                     <script type="text/javascript">var limit_character="<p class='limit'>Number of characters at least are 3</p>"</script>
                     <div id="cpheadercms3">
                        <div class="callus">(+254)72 656 0714</div>
                     </div>
                  </div>
                  <div class="header-right">
                     <div class="head-wishlist"><a class="ap-btn-wishlist"href="login4fdf.html"rel="nofollow"title="Wishlist"><i class="material-icons"></i> <span>Wishlist</span> </a><span class="ap-total-wishlist"data-total-wishlist="0">0</span></div>
                     <div class="overlay"></div>
                     <div id="_desktop_cart">
                        <div class="blockcart"data-refresh-url="//prestashop.coderplace.com/PRS02/PRS02048/demo/en/module/ps_shoppingcart/ajax">
                           <div class="blockcart-header header">
                              <span class="icon_menu"><span class="carthome"rel="nofollow"></span> <span class="cart-products-counthome"><?php echo $getFromU->count_product_by_ip($ip_add); ?></span><span class="cart_custom"rel="nofollow"></span></span>
                              <div class="block cart_block exclusive">
                                 <div class="top-block-cart">
                                    <div class="toggle-title">Shopping Cart (<?php echo $getFromU->count_product_by_ip($ip_add); ?>)</div>
                                    <div class="close-icon">close</div>
                                 </div>
                                 <?php if(empty($records)): ?>
                                 <div class="block_content">
                                    <div class="no-more-item">
                                       <div class="no-img"><img src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/themes/PRS02048/assets/img/megnor/empty-cart.svg"height="111"width="80"></div>
                                       <div class="empty-text">There are no more items in your cart</div>
                                       <a class="continue"href="index.php"rel="nofollow"><button type="button"class="btn btn-primary btn-secondary">Continue shopping</button></a>
                                    </div>
                                 </div>
                                 <?php endif  ?>
                                 <div class="block_content">
                                    <?php $total=0;$shipping=0;$records=$getFromU->select_products_by_ip($ip_add);foreach($records as $record){$products_id=$record->p_id;$products_qty=$record->qty;$products_size=$record->size;$get_prices=$getFromU->viewProductByProductID($products_id);foreach($get_prices as $get_price){$products_price=$get_price->product_price;$products_img1=$get_price->product_img1;$products_title=$get_price->product_title;$sub_total=$products_price*$products_qty;$total+=$sub_total;require_once 'mpesa/shipping.php'; ?>
                                    <div class="cart_block_list">
                                       <form method="post">
                                          <div class="cart-item">
                                             <div class="cart-image"><a href=""><img src="images/<?php echo $products_img1; ?>"alt="<?php echo $products_title; ?>"class="lazyload"height="93"width="90"></a></div>
                                             <div class="cart-info">
                                                <span class="product-name"><a href="index.php?page=product&product_id=<?php echo $products_id; ?>"><?php echo substr($products_title,0,43); ?>..</a></span>
                                                <div><input value="<?php echo $products_id; ?>"name="product_id"type="hidden"> <span class="product-quantity"><?php echo $products_qty; ?> x</span> <span class="product-price">Kes<?php echo number_format((float)$products_price,2) ?></span></div>
                                                <div class="remove-from-cart"><button type="submit"name="delprod"style="border:0!important;color:#000;outline:0!important;background-color:transparent!important"><i class="fa fa-trash"></i></button></div>
                                             </div>
                                          </div>
                                       </form>
                                    </div>
                                    <?php }} ?>
                                 </div>
                                 <div class="card cart-summary">
                                    <div class="card-block">
                                       <div class="cart-summary-line"id="cart-subtotal-products"><span class="label js-subtotal">Items:<?php echo $getFromU->count_product_by_ip($ip_add); ?></span><span class="value">Kes<?php echo number_format((float)$total,2); ?></span></div>
                                       <div class="cart-summary-line"id="cart-subtotal-shipping">
                                          <span class="label">Shipping</span> <span class="value">Kes<?php echo number_format((float)$shipping,2); ?></span>
                                          <div><small class="value"></small></div>
                                       </div>
                                    </div>
                                    <div class="card-block">
                                       <div class="cart-summary-line"><span class="label">Total (tax excl.)</span> <span class="value">Kes<?php echo number_format((float)(($total+$shipping)-($total*16)/100),2); ?></span></div>
                                       <div class="cart-summary-line cart-total"><span class="label">Total (tax incl.)</span> <span class="value">Kes<?php echo number_format((float)($total+$shipping),2); ?></span></div>
                                       <div class="cart-summary-line"><span class="label sub">Taxes:</span> <span class="value sub">Kes<?php echo number_format((float)($tax=($total*16)/100),2); ?></span></div>
                                    </div>
                                 </div>
                                 <div class="card-block checkout"><a class="viewcart"href="index.php?page=cart"rel="nofollow"><button type="button"class="btn btn-primary">View Cart</button> </a><?php if(empty($records)): ?><a class="checkout"href="index.php?page=products"rel="nofollow"><button type="button"class="btn btn-primary checkout_button">Add Items to Cart</button></a><?php else: ?><a class="checkout"href="index.php?page=checkout"rel="nofollow"><button type="button"class="btn btn-primary checkout_button">CheckOut</button></a><?php endif  ?></div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
         <div class="bg_main header-top-main">
            <div class="container">
               <div class="cpvm-contener"id="cp_vertical_menu_top">
                  <div class="block-title">
                     <i class="material-icons menu-open"></i>
                     <div class="menu-title">All Departments</div>
                  </div>
                  <div class="js-top-menu menu position-static vertical-menu"id="_desktop_top_menu">
                     <ul class="top-menu cp_sf-menu"data-depth="0"id="top-menu">
                        <li class="category"id="cpcategory-6">
                           <a class="dropdown-item"data-depth="0"><span class="pull-xs-right"><i class="material-icons left"></i><i class="material-icons right"></i></span>Furniture</a>
                           <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_22032">
                              <ul class="top-menu cp_sf-menu"data-depth="1">
                                 <li class="category"id="cpcategory-7"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=chairs">Chairs</a></li>
                                 <li class="category"id="cpcategory-8"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=couches">Couches</a></li>
                                 <li class="category"id="cpcategory-31"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=beds">Beds</a></li>
                                 <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=tables">Tables</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=desks">Desks</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=stools">Stools</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=dinning">Dinning</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=kids-furniture">Kids furniture</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=animals-and-pets">Animals and pets</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=ottoman">Ottoman</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=dressers">Dressers</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=wall-units">Wall units</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=tv-stands">Tv stands</a></li>
                              </ul>
                              <div class="menu-images-container"></div>
                           </div>
                        </li>
                        <li class="category"id="cpcategory-6">
                           <a class="dropdown-item"data-depth="0"><span class="pull-xs-right"><i class="material-icons left"></i><i class="material-icons right"></i></span> Art and prints</a>
                           <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_22032">
                              <ul class="top-menu cp_sf-menu"data-depth="1">
                                 <li class="category"id="cpcategory-7"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=painting">Paintings</a></li>
                                 <li class="category"id="cpcategory-8"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=photography">Photography</a></li>
                                 <li class="category"id="cpcategory-31"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=printing">Printings</a></li>
                                 <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=etching">Etching</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=wood-art">Wood art</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=screen-prints">Screen prints</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=linocut">Linocut</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=engraving">Engraving</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=tapestries">Tapestries</a></li>
                              </ul>
                              <div class="menu-images-container"></div>
                           </div>
                        </li>
                        <li class="category"id="cpcategory-6">
                           <a class="dropdown-item"data-depth="0"><span class="pull-xs-right"><i class="material-icons left"></i><i class="material-icons right"></i></span> Plants and planters</a>
                           <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_22032">
                              <ul class="top-menu cp_sf-menu"data-depth="1">
                                 <li class="category"id="cpcategory-7"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=artificial-plants">Artificial plants</a></li>
                                 <li class="category"id="cpcategory-8"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=live-plants">Live plants</a></li>
                                 <li class="category"id="cpcategory-31"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=wooden-plnaters">Wooden planters</a></li>
                                 <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=plastic-planters">Plastic planters</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=fiberglass-planters">Fiberglass planters</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=ceramic-plants">Ceramic planters</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=concrete-planters">Concrete planters</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=pots">Pots</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=resin-planters">Resin planters</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=metallic-planters">Metallic planters</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=hanging-planters">Hanging planters</a></li>
                              </ul>
                              <div class="menu-images-container"></div>
                           </div>
                        </li>
                        <li class="category"id="cpcategory-6">
                           <a class="dropdown-item"data-depth="0"><span class="pull-xs-right"><i class="material-icons left"></i><i class="material-icons right"></i></span> Storage and organizers</a>
                           <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_22032">
                              <ul class="top-menu cp_sf-menu"data-depth="1">
                                 <li class="category"id="cpcategory-7"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=closets-and-organizers">closets and organizers</a></li>
                                 <li class="category"id="cpcategory-8"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=cabinet-storages">cabinet storages</a></li>
                                 <li class="category"id="cpcategory-31"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=bedroom-organizers">Bedroom organizers</a></li>
                                 <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=gadget-organizers">Gadget organizers</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=bathroom">Bathroom</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=drawer">Drawer</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=pantry">Pantry</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=pots">Pots</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=spices">Spices</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=kitchen">Kitchen</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=food">Food</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=garage">Garage</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=fluids">Fluids</a></li>
                              </ul>
                              <div class="menu-images-container"></div>
                           </div>
                        </li>
                        <li class="category"id="cpcategory-6">
                           <a class="dropdown-item"data-depth="0"><span class="pull-xs-right"><i class="material-icons left"></i><i class="material-icons right"></i></span> Textiles and rags</a>
                           <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_22032">
                              <ul class="top-menu cp_sf-menu"data-depth="1">
                                 <li class="category"id="cpcategory-7"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=cotton">Cotton</a></li>
                                 <li class="category"id="cpcategory-8"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=wool">Wool</a></li>
                                 <li class="category"id="cpcategory-31"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=linen">Linen</a></li>
                                 <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=nylon">Nylon</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=jute">Jute</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=polyester">Polyester</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=acrylic-fiber">Acrylic fiber</a></li>
                              </ul>
                              <div class="menu-images-container"></div>
                           </div>
                        </li>
                        <li class="category"id="cpcategory-6">
                           <a class="dropdown-item"data-depth="0"><span class="pull-xs-right"><i class="material-icons left"></i><i class="material-icons right"></i></span> Pet supplies</a>
                           <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_22032">
                              <ul class="top-menu cp_sf-menu"data-depth="1">
                                 <li class="category"id="cpcategory-7"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=pet-clothing">Pet clothing</a></li>
                                 <li class="category"id="cpcategory-8"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=beds">Beds</a></li>
                                 <li class="category"id="cpcategory-31"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=dog-collars">Dog collars</a></li>
                                 <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=leashes">Leashes</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=birds">Birds</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=small-pets">Small pets</a></li>
                              </ul>
                              <div class="menu-images-container"></div>
                           </div>
                        </li>
                        <li class="category"id="cpcategory-6">
                           <a class="dropdown-item"data-depth="0"><span class="pull-xs-right"><i class="material-icons left"></i><i class="material-icons right"></i></span> Lighting</a>
                           <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_22032">
                              <ul class="top-menu cp_sf-menu"data-depth="1">
                                 <li class="category"id="cpcategory-7"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=accent-lighting">Accent lighting</a></li>
                                 <li class="category"id="cpcategory-8"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=ceiling-lights">Ceiling lights</a></li>
                                 <li class="category"id="cpcategory-31"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=chandeliers">Chandeliers</a></li>
                                 <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=downlights">Downlights</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=luminaire">Luminaire</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=scones">Scones</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=led-stripes">Led stripes</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=track-lighting">Track lighting</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=desk-lights">Desk lights</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=ambient-lights">Ambient lights</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=bias-lights">Bias lights</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=fill-lights">Fill lights</a></li>
                                 <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=recessed-lights">Recessed lights</a></li>
                                 <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=arm-lights">Arm lights</a></li>
                                 <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=grow-lights">Grow lights</a></li>
                                 <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=halogen-bulbs">Halogen bulbs</a></li>
                                 <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=outdoor-lights">Outdoor lights</a></li>
                              </ul>
                              <div class="menu-images-container"></div>
                           </div>
                        </li>
                        <li class="category"id="cpcategory-6">
                           <a class="dropdown-item"data-depth="0"><span class="pull-xs-right"><i class="material-icons left"></i><i class="material-icons right"></i></span> Kitchen</a>
                           <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_22032">
                              <ul class="top-menu cp_sf-menu"data-depth="1">
                                 <li class="category"id="cpcategory-7"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=kitchen-hoods">Kitchen hoods</a></li>
                                 <li class="category"id="cpcategory-8"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=sinks">Sinks</a></li>
                                 <li class="category"id="cpcategory-31"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=faucets">Faucets</a></li>
                                 <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=cookware">Cookware</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=accessories">Accessories</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=fittings-and-handles">Fittings and handles</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=cutlery">Cutlery</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=ovens">Ovens</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=waste-containers">Waste containers</a></li>
                              </ul>
                              <div class="menu-images-container"></div>
                           </div>
                        </li>
                        <li class="category"id="cpcategory-6">
                           <a class="dropdown-item"data-depth="0"><span class="pull-xs-right"><i class="material-icons left"></i><i class="material-icons right"></i></span> Toilet</a>
                           <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_22032">
                              <ul class="top-menu cp_sf-menu"data-depth="1">
                                 <li class="category"id="cpcategory-7"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=bathtubs">Bathtubs</a></li>
                                 <li class="category"id="cpcategory-8"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=sinks">Sinks</a></li>
                                 <li class="category"id="cpcategory-31"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=toilets">Toilets</a></li>
                                 <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=paper-holders">paper holders</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=faucets">Faucets</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=fittings-and-handles">Fittings and handles</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=wall-mounts-and-cabinets">Wall mounts and cabinets</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=fittings">Fittings</a></li>
                              </ul>
                              <div class="menu-images-container"></div>
                           </div>
                        </li>
                        <li class="category"id="cpcategory-6">
                           <a class="dropdown-item"data-depth="0"><span class="pull-xs-right"><i class="material-icons left"></i><i class="material-icons right"></i></span> Bathroom</a>
                           <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_22032">
                              <ul class="top-menu cp_sf-menu"data-depth="1">
                                 <li class="category"id="cpcategory-7"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=mirrors">Mirrors</a></li>
                                 <li class="category"id="cpcategory-8"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=showers">Showers</a></li>
                                 <li class="category"id="cpcategory-31"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=shelves">Shelves</a></li>
                                 <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=towel-rings">Towel rings</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=soap-dishes">Soap dishes</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=toothbrush-holders">Toothbrush holders</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=dispensers">Dispensers</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=accessories">Accessories</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=rob-hooks">Rob hooks</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=organizers">Organizers</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=curtains">Curtains</a></li>
                              </ul>
                              <div class="menu-images-container"></div>
                           </div>
                        </li>
                        <li class="category"id="cpcategory-6">
                           <a class="dropdown-item"data-depth="0"><span class="pull-xs-right"><i class="material-icons left"></i><i class="material-icons right"></i></span> Outdoor</a>
                           <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_22032">
                              <ul class="top-menu cp_sf-menu"data-depth="1">
                                 <li class="category"id="cpcategory-7"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=rugs">Rugs</a></li>
                                 <li class="category"id="cpcategory-8"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=lighting">Lighting</a></li>
                                 <li class="category"id="cpcategory-31"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=furniture">Furniture</a></li>
                                 <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=fireplace-and-warmth">Fireplace and warmth</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=garden-statues-and-fixtures">Garden statues and fixtures</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=fountains">Fountains</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=landscaping-supplies">Landscaping supplies</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=decorative-items">Decorative items</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=cushions">Cushions</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=trellises">Trellises</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=garden-decor">Garden décor</a></li>
                              </ul>
                              <div class="menu-images-container"></div>
                           </div>
                        </li>
                        <li class="category"id="cpcategory-6">
                           <a class="dropdown-item"data-depth="0"><span class="pull-xs-right"><i class="material-icons left"></i><i class="material-icons right"></i></span> Office furniture</a>
                           <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_22032">
                              <ul class="top-menu cp_sf-menu"data-depth="1">
                                 <li class="category"id="cpcategory-7"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=furniture">Furniture</a></li>
                                 <li class="category"id="cpcategory-8"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=lighting">Lighting</a></li>
                                 <li class="category"id="cpcategory-31"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=organizers">Organizers</a></li>
                                 <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=rugs">Rugs</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=fixtures">Fixtures</a></li>
                              </ul>
                              <div class="menu-images-container"></div>
                           </div>
                        </li>
                        <li class="category"id="cpcategory-6">
                           <a class="dropdown-item"data-depth="0"><span class="pull-xs-right"><i class="material-icons left"></i><i class="material-icons right"></i></span> Health and wellness</a>
                           <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_22032">
                              <ul class="top-menu cp_sf-menu"data-depth="1">
                                 <li class="category"id="cpcategory-7"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=fitness">Fitness</a></li>
                                 <li class="category"id="cpcategory-8"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=lifestyle">Lifestyle</a></li>
                                 <li class="category"id="cpcategory-31"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=sexual-wellness">Sexual wellness</a></li>
                                 <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=cosmetics">Cosmetics</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=social">Social</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=healthy-living">Healthy living</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=mental-health">Mental health</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=intellectual">Intellectual</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=sleep">Sleep</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=spirituality">Spirituality</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=personalized">Personalized</a></li>
                              </ul>
                              <div class="menu-images-container"></div>
                           </div>
                        </li>
                        <li class="category"id="cpcategory-6">
                           <a class="dropdown-item"data-depth="0"><span class="pull-xs-right"><i class="material-icons left"></i><i class="material-icons right"></i></span> Accommodation</a>
                           <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_22032">
                              <ul class="top-menu cp_sf-menu"data-depth="1">
                                 <li class="category"id="cpcategory-7"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=hotels">Hotels</a></li>
                                 <li class="category"id="cpcategory-8"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=bed-and-breakfast">Bed and breakfast</a></li>
                                 <li class="category"id="cpcategory-31"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=cottages">Cottages</a></li>
                                 <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=motels">Motels</a></li>
                                 <li class="category"id="cpcategory-33"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=guest-houses">Guest houses</a></li>
                                 <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=apartments">Apartments</a></li>
                                 <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=camps-and-campsites">Camps and Campsites</a></li>
                                 <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=lodgings">Lodgings</a></li>
                                 <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=chalet">Chalet</a></li>
                                 <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=boutique-hotels">Boutique hotels</a></li>
                                 <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=bungalow">Bungalow</a></li>
                                 <li class="category"id="cpcategory-32"><a class="dropdown-item dropdown-submenu"data-depth="1"href="index.php?page=homestays">homestays</a></li>
                              </ul>
                              <div class="menu-images-container"></div>
                           </div>
                        </li>
                     </ul>
                  </div>
               </div>
               <script type="text/javascript">var moreCategoriesText="More",lessCategoriesText="Less"</script>
               <div class="js-top-menu menu position-static col-lg-8 col-md-7"id="_top_main_menu">
                  <ul class="top-menu"data-depth="0"id="top-menu">
                     <li class="category"id="category-3">
                        <a class="dropdown-item"data-depth="0"><span class="pull-xs-right hidden-xs-up"><span class="collapse-icons navbar-toggler"data-target="#top_sub_menu_60475"data-toggle="collapse"><i class="material-icons add"></i> <i class="material-icons remove"></i> </span></span>Furniture</a>
                        <div class="collapse js-sub-menu popover sub-menu"id="top_sub_menu_60475">
                           <ul class="top-menu"data-depth="1">
                              <li class="category"id="category-4">
                                 <a class="dropdown-item dropdown-submenu"data-depth="1"><span class="pull-xs-right hidden-xs-up"><span class="collapse-icons navbar-toggler"data-target="#top_sub_menu_93005"data-toggle="collapse"><i class="material-icons add"></i> <i class="material-icons remove"></i> </span></span>In House</a>
                                 <div class="collapse"id="top_sub_menu_93005">
                                    <ul class="top-menu"data-depth="2">
                                       <li class="category"id="category-16"><a class="dropdown-item"data-depth="2"href="index.php?page=chairs">Chairs</a></li>
                                       <li class="category"id="category-17"><a class="dropdown-item"data-depth="2"href="index.php?page=couches">Couches</a></li>
                                       <li class="category"id="category-18"><a class="dropdown-item"data-depth="2"href="index.php?page=beds">Beds</a></li>
                                       <li class="category"id="category-19"><a class="dropdown-item"data-depth="2"href="index.php?page=tables">Tables</a></li>
                                       <li class="category"id="category-20"><a class="dropdown-item"data-depth="2"href="index.php?page=desks">Desks</a></li>
                                       <li class="category"id="category-25"><a class="dropdown-item"data-depth="2"href="index.php?page=tv-stands">Tv stands</a></li>
                                    </ul>
                                    <div class="menu-banners"></div>
                                 </div>
                              </li>
                              <li class="category"id="category-5">
                                 <a class="dropdown-item dropdown-submenu"data-depth="1"><span class="pull-xs-right hidden-xs-up"><span class="collapse-icons navbar-toggler"data-target="#top_sub_menu_83600"data-toggle="collapse"><i class="material-icons add"></i> <i class="material-icons remove"></i> </span></span>Extras</a>
                                 <div class="collapse"id="top_sub_menu_83600">
                                    <ul class="top-menu"data-depth="2">
                                       <li class="category"id="category-21"><a class="dropdown-item"data-depth="2"href="index.php?page=stools">Stools</a></li>
                                       <li class="category"id="category-22"><a class="dropdown-item"data-depth="2"href="index.php?page=dinning">Dinning</a></li>
                                       <li class="category"id="category-23"><a class="dropdown-item"data-depth="2"href="index.php?page=kids-furniture">Kids furniture</a></li>
                                       <li class="category"id="category-24"><a class="dropdown-item"data-depth="2"href="index.php?page=ottoman">Ottoman</a></li>
                                       <li class="category"id="category-25"><a class="dropdown-item"data-depth="2"href="index.php?page=dressers">Dressers</a></li>
                                       <li class="category"id="category-25"><a class="dropdown-item"data-depth="2"href="index.php?page=wall-units">Wall units</a></li>
                                    </ul>
                                    <div class="menu-banners"></div>
                                 </div>
                              </li>
                           </ul>
                           <div class="menu-banners">
                              <div class="menu-banner"><img src="img/c/3-0_thumb.jpg"alt=""></div>
                           </div>
                        </div>
                     </li>
                     <li class="category"id="category-8"><a class="dropdown-item"data-depth="0"href="index.php?page=deals">DEALS</a></li>
                     <li class="category"id="category-11"><a class="dropdown-item"data-depth="0"href="index.php?page=new-arrivals">New Arrivals</a></li>
                     <li class="link"id="lnk-news"><a class="dropdown-item"data-depth="0"href="blog.html">News</a></li>
                  </ul>
                  <div class="clearfix"></div>
               </div>
               <script type="text/javascript">var moreCategoriesText="More"</script>
               <div id="cpheadercms2">
                  <div class="offer-link"><a href="#">Latest offer zone</a></div>
               </div>
            </div>
         </div>
      </header>
      <div class="container">
         <?php if(isset($error)): ?>
         <div class="account-add"><?php echo $error; ?></div>
         <?php endif  ?><?php if(isset($_SESSION['rfqSucc'])): ?>
         <div class="account-add"><span><?php echo $_SESSION['rfqSucc'];unset($_SESSION['rfqSucc']); ?></span></div>
         <?php endif  ?><?php if(isset($_SESSION[''])): ?>
         <div class="account-add"><span><?php echo $_SESSION['rfqXucc'];unset($_SESSION['rfqXucc']); ?></span></div>
         <?php endif  ?>
      </div>