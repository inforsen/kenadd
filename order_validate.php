<!doctype html>
<html lang="en">

<head>


    <meta charset="utf-8">


    <meta http-equiv="x-ua-compatible" content="ie=edge">



    <link rel="icon" type="image/vnd.microsoft.icon" href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/img/favicon.ico?1683626859">
    <link rel="shortcut icon" type="image/x-icon" href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/img/favicon.ico?1683626859">



    <link rel="stylesheet" href="themes/PRS02048/assets/cache/theme-0455d67.css" type="text/css" media="all">






    <script type="text/javascript">
        var CPBORDER_RADIUS = "0";
        var CPBOX_LAYOUT = "0";
        var CPDISPLAY_PRODUCT_VARIANTS = "1";
        var CPSTICKY_HEADER = "1";
        var buttoncompare_title_add = "Add to Compare";
        var buttoncompare_title_remove = "Remove from Compare";
        var buttonwishlist_title_add = "Add to Wishlist";
        var buttonwishlist_title_remove = "Remove from WishList";
        var comparator_max_item = 3;
        var compared_products = [];
        var isLogged = false;
        var prestashop = {};
    </script>



    <link href="//fonts.googleapis.com/css?family=Karla:300,400,500,600,700,800,900&display=swap" rel="stylesheet" id="body_font">


    <link href="#" rel="stylesheet" id="title_font">






</head>

<body id="checkout" class="lang-en country-us currency-usd layout-both-columns page-order tax-display-disabled">





    <header id="header">
        <div class="header-banner">
        </div>
        <!---nav class="header-nav">
               <div class="container">
                  <div class="left-nav">
                     <div id="cpheadercms1">
                        <div class="contact-link">Get Up To 50% OFF New Season Styles, Limited Time Only.</div>
                     </div>
                  </div>
                  <div class="right-nav">
                     <div id="_desktop_language_selector">
                        <div class="language-selector-wrapper">
                           <div class="language-selector dropdown js-dropdown">
                              <span class="expand-more " data-toggle="dropdown">en</span>
                              <span data-target="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" >
                              <i class="material-icons expand-more">&#xE313;</i>
                              </span>
                              <ul class="dropdown-menu">
                                 <li  class="current" >
                                    <a href="index.php" class="dropdown-item"><img src="img/l/1.jpg" alt="en" width="16" height="11" />English</a>
                                 </li>
                                 <li >
                                    <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/ar/" class="dropdown-item"><img src="img/l/3.jpg" alt="ar" width="16" height="11" />اللغة العربية</a>
                                 </li>
                                 <li >
                                    <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/fr/" class="dropdown-item"><img src="img/l/4.jpg" alt="fr" width="16" height="11" />Français</a>
                                 </li>
                                 <li >
                                    <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/it/" class="dropdown-item"><img src="img/l/5.jpg" alt="it" width="16" height="11" />Italiano</a>
                                 </li>
                                 <li >
                                    <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/es/" class="dropdown-item"><img src="img/l/6.jpg" alt="es" width="16" height="11" />Español</a>
                                 </li>
                              </ul>
                              <select class="link hidden-lg-up hidden-md-down">
                                 <option value="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/" selected="selected">English</option>
                                 <option value="https://prestashop.coderplace.com/PRS02/PRS02048/demo/ar/">اللغة العربية</option>
                                 <option value="https://prestashop.coderplace.com/PRS02/PRS02048/demo/fr/">Français</option>
                                 <option value="https://prestashop.coderplace.com/PRS02/PRS02048/demo/it/">Italiano</option>
                                 <option value="https://prestashop.coderplace.com/PRS02/PRS02048/demo/es/">Español</option>
                              </select>
                           </div>
                        </div>
                     </div>
                     <div class="link hidden-lg-up vertical_language">
                        <ul class="dropdown-menu">
                           <li  class="current" >
                              <a href="index.php" class="dropdown-item"><img src="img/l/1.jpg" alt="en" width="16" height="16" />en</a>
                           </li>
                           <li >
                              <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/ar/" class="dropdown-item"><img src="img/l/3.jpg" alt="ar" width="16" height="16" />ar</a>
                           </li>
                           <li >
                              <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/fr/" class="dropdown-item"><img src="img/l/4.jpg" alt="fr" width="16" height="16" />fr</a>
                           </li>
                           <li >
                              <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/it/" class="dropdown-item"><img src="img/l/5.jpg" alt="it" width="16" height="16" />it</a>
                           </li>
                           <li >
                              <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/es/" class="dropdown-item"><img src="img/l/6.jpg" alt="es" width="16" height="16" />es</a>
                           </li>
                        </ul>
                     </div>
                     <div id="_desktop_currency_selector">
                        <div class="currency-selector dropdown js-dropdown">
                           <span class="expand-more _gray-darker " data-toggle="dropdown">$ USD</span>
                           <span data-target="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-haspopup="true" aria-expanded="false" aria-label="Currency dropdown">
                           <i class="material-icons expand-more">&#xE313;</i>
                           </span>
                           <ul class="dropdown-menu" aria-labelledby="currency-selector-label">
                              <li >
                                 <a title="Euro" rel="nofollow" href="indexfcc6.html?SubmitCurrency=1&amp;id_currency=3" class="dropdown-item">EUR (€)</a>
                              </li>
                              <li  class="current" >
                                 <a title="US Dollar" rel="nofollow" href="indexe3c8.html?SubmitCurrency=1&amp;id_currency=1" class="dropdown-item">USD ($)</a>
                              </li>
                           </ul>
                           <select class="link hidden-lg-up  hidden-md-down" aria-labelledby="currency-selector-label">
                              <option value="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/?SubmitCurrency=1&amp;id_currency=3">EUR (€)</option>
                              <option value="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/?SubmitCurrency=1&amp;id_currency=1" selected="selected">USD ($)</option>
                           </select>
                        </div>
                     </div>
                     <div class="link hidden-lg-up vertical_currency" aria-labelledby="currency-selector-label">
                        <ul class="dropdown-menu" aria-labelledby="currency-selector-label">
                           <li >
                              <a title="Euro" rel="nofollow" href="indexfcc6.html?SubmitCurrency=1&amp;id_currency=3" class="dropdown-item">EUR</a>
                           </li>
                           <li  class="current" >
                              <a title="US Dollar" rel="nofollow" href="indexe3c8.html?SubmitCurrency=1&amp;id_currency=1" class="dropdown-item">USD</a>
                           </li>
                        </ul>
                     </div>---
                     <div id="_desktop_user_info">
                        <a class="locator top-link" href="stores.html">
                        <i class="locator-icon"></i>
                        <span>Store Locator</span>
                        </a>
                        <a class="track-order top-link" href="login856b.html">
                        <i class="track-icon"></i>
                        <span>Track Your Order</span>
                        </a>
                        <a
                           class="sign-in account top-link"
                           href="loginfd9a.html"
                           title="Log in to your customer account"
                           rel="nofollow"
                           >
                        <i class="account-icon"></i>
                        <span>My Account</span>
                        </a>
                     </div>
                     <div class="user-info-side" id="verticalmenu_desktop_user_info">
                        <a
                           href="loginfd9a.html"
                           title="Log in to your customer account"
                           rel="nofollow"
                           >
                        <span>Sign in</span>
                        </a>
                     </div>
                  </div>
               </div>
            </nav>--->
        <div class="header-top">
            <div class="header-div">
                <div class="container">
                    <div class="header-left">
                        <div class="header_logo" id="_desktop_logo">
                            <a href="index.php">KENADD
                                <!---img
                              class="logo"
                              src="img/logo-1683626859.jpg"
                              alt="Demo Store"
                              loading="lazy">--->
                            </a>
                        </div>
                    </div>
                    <div class="header-center">
                        <div class="text-xs-center mobile">
                            <div class="menu-container">
                                <div class="menu-icon">
                                    <div class="cat-title"> <i class="material-icons menu-open">&#xE5D2;</i></div>
                                </div>
                            </div>
                        </div>
                        <div id="cp_sidevertical_menu_top" class="tmvm-contener sidevertical-menu clearfix col-lg-12  hb-animate-element top-to-bottom">
                            <div class="title_main_menu">
                                <div class="title_menu">Menu</div>
                                <div class="menu-icon active">
                                    <div class="cat-title title2">
                                        <i class="material-icons menu-close">&#xE5CD;</i>
                                    </div>
                                </div>
                            </div>
                            <div class="menu sidevertical-menu js-top-menu position-static" id="sidevertical_menu">
                                <div class="js-top-menu mobile">
                                    <ul class="top-menu" id="top-menu" data-depth="0">
                                        <li class="category" id="cpcategory-3">
                                            <a class="dropdown-item" href="index.php?page=products" data-depth="0">
                                                <span class="pull-xs-right">
                                                    <span data-target="#top_sub_menu_5074" data-toggle="collapse" class="navbar-toggler collapse-icons">
                                                        <i class="material-icons add">&#xe145;</i>
                                                        <i class="material-icons remove">&#xE15B;</i>
                                                    </span>
                                                </span>
                                                Bedroom
                                            </a>
                                            <div class="popover sub-menu js-sub-menu collapse" id="top_sub_menu_5074">
                                                <ul class="top-menu" data-depth="1">
                                                    <li class="category" id="cpcategory-4">
                                                        <a class="dropdown-item dropdown-submenu" href="index.php?page=products" data-depth="1">
                                                            <span class="pull-xs-right">
                                                                <span data-target="#top_sub_menu_37379" data-toggle="collapse" class="navbar-toggler collapse-icons">
                                                                    <i class="material-icons add">&#xe145;</i>
                                                                    <i class="material-icons remove">&#xE15B;</i>
                                                                </span>
                                                            </span>
                                                            Beds &amp; Mattresses
                                                        </a>
                                                        <div class="collapse" id="top_sub_menu_37379">
                                                            <ul class="top-menu" data-depth="2">
                                                                <li class="category" id="cpcategory-16">
                                                                    <a class="dropdown-item" href="index.php?page=products" data-depth="2">
                                                                        Divan Beds
                                                                    </a>
                                                                </li>
                                                                <li class="category" id="cpcategory-17">
                                                                    <a class="dropdown-item" href="index.php?page=products" data-depth="2">
                                                                        Storage Beds
                                                                    </a>
                                                                </li>
                                                                <li class="category" id="cpcategory-18">
                                                                    <a class="dropdown-item" href="index.php?page=products" data-depth="2">
                                                                        Bed Frame
                                                                    </a>
                                                                </li>
                                                                <li class="category" id="cpcategory-19">
                                                                    <a class="dropdown-item" href="index.php?page=products" data-depth="2">
                                                                        Guest Beds
                                                                    </a>
                                                                </li>
                                                                <li class="category" id="cpcategory-20">
                                                                    <a class="dropdown-item" href="index.php?page=products" data-depth="2">
                                                                        Mattresses
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                    <li class="category" id="cpcategory-5">
                                                        <a class="dropdown-item dropdown-submenu" href="5-bedroom-chairs.html" data-depth="1">
                                                            <span class="pull-xs-right">
                                                                <span data-target="#top_sub_menu_13682" data-toggle="collapse" class="navbar-toggler collapse-icons">
                                                                    <i class="material-icons add">&#xe145;</i>
                                                                    <i class="material-icons remove">&#xE15B;</i>
                                                                </span>
                                                            </span>
                                                            Bedroom Chairs
                                                        </a>
                                                        <div class="collapse" id="top_sub_menu_13682">
                                                            <ul class="top-menu" data-depth="2">
                                                                <li class="category" id="cpcategory-21">
                                                                    <a class="dropdown-item" href="index.php?page=products" data-depth="2">
                                                                        Dining Chairs
                                                                    </a>
                                                                </li>
                                                                <li class="category" id="cpcategory-22">
                                                                    <a class="dropdown-item" href="index.php?page=products" data-depth="2">
                                                                        Bar Stools
                                                                    </a>
                                                                </li>
                                                                <li class="category" id="cpcategory-23">
                                                                    <a class="dropdown-item" href="index.php?page=products" data-depth="2">
                                                                        Bar Height Stools
                                                                    </a>
                                                                </li>
                                                                <li class="category" id="cpcategory-24">
                                                                    <a class="dropdown-item" href="index.php?page=productsl" data-depth="2">
                                                                        Short Bar Stools
                                                                    </a>
                                                                </li>
                                                                <li class="category" id="cpcategory-25">
                                                                    <a class="dropdown-item" href="index.php?page=products" data-depth="2">
                                                                        Office Chairs
                                                                    </a>
                                                                </li>
                                                            </ul>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="category" id="cpcategory-6">
                                            <a class="dropdown-item" href="index.php?page=products" data-depth="0">
                                                <span class="pull-xs-right">
                                                    <span data-target="#top_sub_menu_77602" data-toggle="collapse" class="navbar-toggler collapse-icons">
                                                        <i class="material-icons add">&#xe145;</i>
                                                        <i class="material-icons remove">&#xE15B;</i>
                                                    </span>
                                                </span>
                                                Dining Room
                                            </a>
                                            <div class="popover sub-menu js-sub-menu collapse" id="top_sub_menu_77602">
                                                <ul class="top-menu" data-depth="1">
                                                    <li class="category" id="cpcategory-7">
                                                        <a class="dropdown-item dropdown-submenu" href="index.php?page=products" data-depth="1">
                                                            Rugs and Runners
                                                        </a>
                                                    </li>
                                                    <li class="category" id="cpcategory-8">
                                                        <a class="dropdown-item dropdown-submenu" href="index.php?page=products" data-depth="1">
                                                            Cushions
                                                        </a>
                                                    </li>
                                                    <li class="category" id="cpcategory-31">
                                                        <a class="dropdown-item dropdown-submenu" href="index.php?page=products" data-depth="1">
                                                            Blankets and Throws
                                                        </a>
                                                    </li>
                                                    <li class="category" id="cpcategory-32">
                                                        <a class="dropdown-item dropdown-submenu" href="index.php?page=products" data-depth="1">
                                                            Curtains and Blinds
                                                        </a>
                                                    </li>
                                                    <li class="category" id="cpcategory-33">
                                                        <a class="dropdown-item dropdown-submenu" href="index.php?page=products" data-depth="1">
                                                            Kids Furnishings
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="category" id="cpcategory-9">
                                            <a class="dropdown-item" href="9-living-room.html" data-depth="0">
                                                <span class="pull-xs-right">
                                                    <span data-target="#top_sub_menu_28251" data-toggle="collapse" class="navbar-toggler collapse-icons">
                                                        <i class="material-icons add">&#xe145;</i>
                                                        <i class="material-icons remove">&#xE15B;</i>
                                                    </span>
                                                </span>
                                                Living Room
                                            </a>
                                            <div class="popover sub-menu js-sub-menu collapse" id="top_sub_menu_28251">
                                                <ul class="top-menu" data-depth="1">
                                                    <li class="category" id="cpcategory-34">
                                                        <a class="dropdown-item dropdown-submenu" href="index.php?page=products" data-depth="1">
                                                            Sofas
                                                        </a>
                                                    </li>
                                                    <li class="category" id="cpcategory-35">
                                                        <a class="dropdown-item dropdown-submenu" href="index.php?page=products" data-depth="1">
                                                            Coffee Tables
                                                        </a>
                                                    </li>
                                                    <li class="category" id="cpcategory-36">
                                                        <a class="dropdown-item dropdown-submenu" href="index.php?page=products" data-depth="1">
                                                            TV Units
                                                        </a>
                                                    </li>
                                                    <li class="category" id="cpcategory-37">
                                                        <a class="dropdown-item dropdown-submenu" href="index.php?page=products" data-depth="1">
                                                            Side Tables
                                                        </a>
                                                    </li>
                                                </ul>
                                            </div>
                                        </li>
                                        <li class="category" id="cpcategory-10">
                                            <a class="dropdown-item" href="index.php?page=products" data-depth="0">
                                                Home Office
                                            </a>
                                        </li>
                                        <li class="category" id="cpcategory-11">
                                            <a class="dropdown-item" href="index.php?page=products" data-depth="0">
                                                Outdoor
                                            </a>
                                        </li>
                                        <li class="category" id="cpcategory-12">
                                            <a class="dropdown-item" href="index.php?page=products" data-depth="0">
                                                Garden
                                            </a>
                                        </li>
                                        <li class="category" id="cpcategory-13">
                                            <a class="dropdown-item" href="index.php?page=products" data-depth="0">
                                                Sofas &amp; Armchairs
                                            </a>
                                        </li>
                                        <li class="category" id="cpcategory-14">
                                            <a class="dropdown-item" href="index.php?page=products" data-depth="0">
                                                Home Accessories
                                            </a>
                                        </li>
                                        <li class="category" id="cpcategory-22">
                                            <a class="dropdown-item" href="index.php?page=products" data-depth="0">
                                                Bar Stools
                                            </a>
                                        </li>
                                        <li class="category" id="cpcategory-24">
                                            <a class="dropdown-item" href="index.php?page=productsl" data-depth="0">
                                                Short Bar Stools
                                            </a>
                                        </li>
                                        <li class="category" id="cpcategory-27">
                                            <a class="dropdown-item" href="index.php?page=products" data-depth="0">
                                                Divan Beds
                                            </a>
                                        </li>
                                        <li class="category" id="cpcategory-35">
                                            <a class="dropdown-item" href="index.php?page=products" data-depth="0">
                                                Coffee Tables
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="verticalmenu-side">
                                <div class="vertical-side-top-text">
                                    <div id="_desktop_user_info">
                                        <a class="locator top-link" href="stores.html">
                                            <i class="locator-icon"></i>
                                            <span>Store Locator</span>
                                        </a>
                                        <a class="track-order top-link" href="login856b.html">
                                            <i class="track-icon"></i>
                                            <span>Track Your Order</span>
                                        </a>
                                        <a class="sign-in account top-link" href="loginfd9a.html" title="Log in to your customer account" rel="nofollow">
                                            <i class="account-icon"></i>
                                            <span>My Account</span>
                                        </a>
                                    </div>
                                    <div class="user-info-side" id="verticalmenu_desktop_user_info">
                                        <a href="loginfd9a.html" title="Log in to your customer account" rel="nofollow">
                                            <span>Sign in</span>
                                        </a>
                                    </div>
                                    <div class="head-wishlist">
                                        <a class="ap-btn-wishlist" href="login4fdf.html" title="Wishlist" rel="nofollow">
                                            <i class="material-icons">&#xE87E;</i>
                                            <span>Wishlist</span>
                                        </a>
                                        <span class="ap-total-wishlist" data-total-wishlist="0">0</span>
                                    </div>
                                    <div class="head-compare">
                                        <a class="ap-btn-compare" href="module/stfeature/productscompare.html" title="Compare" rel="nofollow">
                                            <i class="material-icons">&#xE863;</i>
                                            <span>Compare</span>
                                        </a>
                                        <span class="ap-total-compare ap-total">0</span>
                                    </div>
                                </div>
                                <div id="_desktop_currency_selector">
                                    <div class="currency-selector dropdown js-dropdown">
                                        <span class="expand-more _gray-darker " data-toggle="dropdown">$ USD</span>
                                        <span data-target="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" aria-haspopup="true" aria-expanded="false" aria-label="Currency dropdown">
                                            <i class="material-icons expand-more">&#xE313;</i>
                                        </span>
                                        <ul class="dropdown-menu" aria-labelledby="currency-selector-label">
                                            <li>
                                                <a title="Euro" rel="nofollow" href="indexfcc6.html?SubmitCurrency=1&amp;id_currency=3" class="dropdown-item">EUR (€)</a>
                                            </li>
                                            <li class="current">
                                                <a title="US Dollar" rel="nofollow" href="indexe3c8.html?SubmitCurrency=1&amp;id_currency=1" class="dropdown-item">USD ($)</a>
                                            </li>
                                        </ul>
                                        <select class="link hidden-lg-up  hidden-md-down" aria-labelledby="currency-selector-label">
                                            <option value="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/?SubmitCurrency=1&amp;id_currency=3">EUR (€)</option>
                                            <option value="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/?SubmitCurrency=1&amp;id_currency=1" selected="selected">USD ($)</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="link hidden-lg-up vertical_currency" aria-labelledby="currency-selector-label">
                                    <ul class="dropdown-menu" aria-labelledby="currency-selector-label">
                                        <li>
                                            <a title="Euro" rel="nofollow" href="indexfcc6.html?SubmitCurrency=1&amp;id_currency=3" class="dropdown-item">EUR</a>
                                        </li>
                                        <li class="current">
                                            <a title="US Dollar" rel="nofollow" href="indexe3c8.html?SubmitCurrency=1&amp;id_currency=1" class="dropdown-item">USD</a>
                                        </li>
                                    </ul>
                                </div>
                                <div id="_desktop_language_selector">
                                    <div class="language-selector-wrapper">
                                        <div class="language-selector dropdown js-dropdown">
                                            <span class="expand-more " data-toggle="dropdown">en</span>
                                            <span data-target="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                <i class="material-icons expand-more">&#xE313;</i>
                                            </span>
                                            <ul class="dropdown-menu">
                                                <li class="current">
                                                    <a href="index.php" class="dropdown-item"><img src="img/l/1.jpg" alt="en" width="16" height="11" />English</a>
                                                </li>
                                                <li>
                                                    <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/ar/" class="dropdown-item"><img src="img/l/3.jpg" alt="ar" width="16" height="11" />اللغة العربية</a>
                                                </li>
                                                <li>
                                                    <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/fr/" class="dropdown-item"><img src="img/l/4.jpg" alt="fr" width="16" height="11" />Français</a>
                                                </li>
                                                <li>
                                                    <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/it/" class="dropdown-item"><img src="img/l/5.jpg" alt="it" width="16" height="11" />Italiano</a>
                                                </li>
                                                <li>
                                                    <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/es/" class="dropdown-item"><img src="img/l/6.jpg" alt="es" width="16" height="11" />Español</a>
                                                </li>
                                            </ul>
                                            <select class="link hidden-lg-up hidden-md-down">
                                                <option value="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/" selected="selected">English</option>
                                                <option value="https://prestashop.coderplace.com/PRS02/PRS02048/demo/ar/">اللغة العربية</option>
                                                <option value="https://prestashop.coderplace.com/PRS02/PRS02048/demo/fr/">Français</option>
                                                <option value="https://prestashop.coderplace.com/PRS02/PRS02048/demo/it/">Italiano</option>
                                                <option value="https://prestashop.coderplace.com/PRS02/PRS02048/demo/es/">Español</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                                <div class="link hidden-lg-up vertical_language">
                                    <ul class="dropdown-menu">
                                        <li class="current">
                                            <a href="index.php" class="dropdown-item"><img src="img/l/1.jpg" alt="en" width="16" height="16" />en</a>
                                        </li>
                                        <li>
                                            <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/ar/" class="dropdown-item"><img src="img/l/3.jpg" alt="ar" width="16" height="16" />ar</a>
                                        </li>
                                        <li>
                                            <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/fr/" class="dropdown-item"><img src="img/l/4.jpg" alt="fr" width="16" height="16" />fr</a>
                                        </li>
                                        <li>
                                            <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/it/" class="dropdown-item"><img src="img/l/5.jpg" alt="it" width="16" height="16" />it</a>
                                        </li>
                                        <li>
                                            <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/es/" class="dropdown-item"><img src="img/l/6.jpg" alt="es" width="16" height="16" />es</a>
                                        </li>
                                    </ul>
                                </div>
                                <div id="cpheadercms1">
                                    <div class="contact-link">Get Up To 50% OFF New Season Styles, Limited Time Only.</div>
                                </div>
                            </div>
                        </div>
                        <script type="text/javascript">
                            var moreCategoriesText = "More";
                            var lessCategoriesText = "Less";
                        </script><!-- Block search module TOP -->
                        <div id="search_block_top" class="col-sm-5">
                            <span class="search_button"></span>
                            <div class="searchtoggle">
                                <form id="searchbox" method="get" action="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/search">
                                    <div class="cpsearch-main">
                                        <input type="hidden" name="controller" value="search">
                                        <input type="hidden" name="orderby" value="position" />
                                        <input type="hidden" name="orderway" value="desc" />
                                        <input class="search_query form-control" type="text" id="search_query_top" name="s" placeholder="Search Product Here..." value="" />
                                        <div class="select-wrapper">
                                            <select id="search_category" name="search_category" class="form-control">
                                                <option value="all">All Categories</option>
                                                <option value="3">Bedroom</option>
                                                <option value="6">Dining Room</option>
                                                <option value="9">Living Room</option>
                                                <option value="10">Home Office</option>
                                                <option value="11">Outdoor</option>
                                                <option value="12">Garden</option>
                                                <option value="13">Sofas & Armchairs</option>
                                                <option value="14">Home Accessories</option>
                                            </select>
                                        </div>
                                        <div id="cp_url_ajax_search" style="display:none">
                                            <input type="hidden" value="https://prestashop.coderplace.com/PRS02/PRS02048/demo/modules/cp_blocksearch/controller_ajax_search.php" class="url_ajax" />
                                        </div>
                                    </div>
                                    <button type="submit" class="btn btn-primary">
                                        <div class="submit-text">Search</div>
                                    </button>
                                </form>
                            </div>
                        </div>
                        <script type="text/javascript">
                            var limit_character = "<p class='limit'>Number of characters at least are 3</p>";
                        </script>
                        <!-- /Block search module TOP -->
                        <div id="cpheadercms3">
                            <div class="callus">(+254)72 656 0714</div>
                        </div>
                    </div>
                    <div class="header-right">
                        <div class="head-wishlist">
                            <a class="ap-btn-wishlist" href="login4fdf.html" title="Wishlist" rel="nofollow">
                                <i class="material-icons">&#xE87E;</i>
                                <span>Wishlist</span>
                            </a>
                            <span class="ap-total-wishlist" data-total-wishlist="0">0</span>
                        </div>
                        <div class="overlay"></div>
                        <div id="_desktop_cart">
                            <div class="blockcart" data-refresh-url="//prestashop.coderplace.com/PRS02/PRS02048/demo/en/module/ps_shoppingcart/ajax">
                                <div class="header blockcart-header">
                                    <span class="icon_menu">
                                        <span class="carthome" rel="nofollow"></span>
                                        <span class="cart-products-counthome">0</span>
                                        <span rel="nofollow" class="cart_custom">
                                        </span>
                                    </span>
                                    <div class="cart_block block exclusive">
                                        <div class="top-block-cart">
                                            <div class="toggle-title">Shopping Cart (0)</div>
                                            <div class="close-icon">close</div>
                                        </div>
                                        <div class="block_content">
                                            <div class="no-more-item">
                                                <div class="no-img"><img src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/themes/PRS02048/assets/img/megnor/empty-cart.svg" width="80" height="111"></div>
                                                <div class="empty-text">There are no more items in your cart </div>
                                                <a rel="nofollow" href="index.php" class="continue"><button type="button" class="btn btn-secondary btn-primary">Continue shopping</button></a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-top-main bg_main">
            <div class="container">
                <div id="cp_vertical_menu_top" class="cpvm-contener">
                    <div class="block-title">
                        <i class="material-icons menu-open">&#xE5D2;</i>
                        <div class="menu-title">All Departments</div>
                    </div>
                    <div class="menu vertical-menu js-top-menu position-static" id="_desktop_top_menu">
                        <ul class="cp_sf-menu top-menu" id="top-menu" data-depth="0">
                            <li class="category " id="cpcategory-3">
                                <a href="index.php?page=products" class="dropdown-item" data-depth="0"><span class="pull-xs-right"><i class="material-icons left">&#xE315;</i><i class="material-icons right">&#xE314;</i></span>Bedroom</a>
                                <div class="popover sub-menu js-sub-menu collapse" id="top_sub_menu_93928">
                                    <ul class="cp_sf-menu top-menu" data-depth="1">
                                        <li class="category " id="cpcategory-4">
                                            <a href="index.php?page=products" class="dropdown-item dropdown-submenu" data-depth="1"><span class="pull-xs-right"><i class="material-icons left">&#xE315;</i><i class="material-icons right">&#xE314;</i></span>Beds &amp; Mattresses</a>
                                            <div class="popover sub-menu js-sub-menu second_depth collapse" id="top_sub_menu_95410">
                                                <ul class="cp_sf-menu top-menu" data-depth="2">
                                                    <li class="category " id="cpcategory-16"><a href="index.php?page=products" class="dropdown-item" data-depth="2">Divan Beds</a></li>
                                                    <li class="category " id="cpcategory-17"><a href="index.php?page=products" class="dropdown-item" data-depth="2">Storage Beds</a></li>
                                                    <li class="category " id="cpcategory-18"><a href="index.php?page=products" class="dropdown-item" data-depth="2">Bed Frame</a></li>
                                                    <li class="category " id="cpcategory-19"><a href="index.php?page=products" class="dropdown-item" data-depth="2">Guest Beds</a></li>
                                                    <li class="category " id="cpcategory-20"><a href="index.php?page=products" class="dropdown-item" data-depth="2">Mattresses</a></li>
                                                </ul>
                                                <div class="menu-images-container"></div>
                                            </div>
                                        </li>
                                        <li class="category " id="cpcategory-5">
                                            <a href="5-bedroom-chairs.html" class="dropdown-item dropdown-submenu" data-depth="1"><span class="pull-xs-right"><i class="material-icons left">&#xE315;</i><i class="material-icons right">&#xE314;</i></span>Bedroom Chairs</a>
                                            <div class="popover sub-menu js-sub-menu second_depth collapse" id="top_sub_menu_995">
                                                <ul class="cp_sf-menu top-menu" data-depth="2">
                                                    <li class="category " id="cpcategory-21"><a href="index.php?page=products" class="dropdown-item" data-depth="2">Dining Chairs</a></li>
                                                    <li class="category " id="cpcategory-22"><a href="index.php?page=products" class="dropdown-item" data-depth="2">Bar Stools</a></li>
                                                    <li class="category " id="cpcategory-23"><a href="index.php?page=products" class="dropdown-item" data-depth="2">Bar Height Stools</a></li>
                                                    <li class="category " id="cpcategory-24"><a href="index.php?page=productsl" class="dropdown-item" data-depth="2">Short Bar Stools</a></li>
                                                    <li class="category " id="cpcategory-25"><a href="index.php?page=products" class="dropdown-item" data-depth="2">Office Chairs</a></li>
                                                </ul>
                                                <div class="menu-images-container"></div>
                                            </div>
                                        </li>
                                    </ul>
                                    <div class="menu-images-container"><img class="lazyload" data-src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/img/c/3-0_thumb.jpg"></div>
                                </div>
                            </li>
                            <li class="category " id="cpcategory-6">
                                <a href="index.php?page=products" class="dropdown-item" data-depth="0"><span class="pull-xs-right"><i class="material-icons left">&#xE315;</i><i class="material-icons right">&#xE314;</i></span>Dining Room</a>
                                <div class="popover sub-menu js-sub-menu collapse" id="top_sub_menu_22032">
                                    <ul class="cp_sf-menu top-menu" data-depth="1">
                                        <li class="category " id="cpcategory-7"><a href="index.php?page=products" class="dropdown-item dropdown-submenu" data-depth="1">Rugs and Runners</a></li>
                                        <li class="category " id="cpcategory-8"><a href="index.php?page=products" class="dropdown-item dropdown-submenu" data-depth="1">Cushions</a></li>
                                        <li class="category " id="cpcategory-31"><a href="index.php?page=products" class="dropdown-item dropdown-submenu" data-depth="1">Blankets and Throws</a></li>
                                        <li class="category " id="cpcategory-32"><a href="index.php?page=products" class="dropdown-item dropdown-submenu" data-depth="1">Curtains and Blinds</a></li>
                                        <li class="category " id="cpcategory-33"><a href="index.php?page=products" class="dropdown-item dropdown-submenu" data-depth="1">Kids Furnishings</a></li>
                                    </ul>
                                    <div class="menu-images-container"></div>
                                </div>
                            </li>
                            <li class="category " id="cpcategory-10"><a href="index.php?page=products" class="dropdown-item" data-depth="0">Home Office</a></li>
                            <li class="category " id="cpcategory-11"><a href="index.php?page=products" class="dropdown-item" data-depth="0">Outdoor</a></li>
                            <li class="category " id="cpcategory-12"><a href="index.php?page=products" class="dropdown-item" data-depth="0">Garden</a></li>
                            <li class="category " id="cpcategory-13"><a href="index.php?page=products" class="dropdown-item" data-depth="0">Sofas &amp; Armchairs</a></li>
                            <li class="category " id="cpcategory-14"><a href="index.php?page=products" class="dropdown-item" data-depth="0">Home Accessories</a></li>
                            <li class="category " id="cpcategory-20"><a href="index.php?page=products" class="dropdown-item" data-depth="0">Mattresses</a></li>
                            <li class="category " id="cpcategory-36"><a href="index.php?page=products" class="dropdown-item" data-depth="0">TV Units</a></li>
                        </ul>
                    </div>
                </div>
                <script type="text/javascript">
                    var moreCategoriesText = "More";
                    var lessCategoriesText = "Less";
                </script>
                <div class="menu col-lg-8 col-md-7 js-top-menu position-static" id="_top_main_menu">
                    <ul class="top-menu" id="top-menu" data-depth="0">
                        <li class="category" id="category-3">
                            <a class="dropdown-item" href="index.php?page=products" data-depth="0">
                                <span class="pull-xs-right hidden-xs-up">
                                    <span data-target="#top_sub_menu_60475" data-toggle="collapse" class="navbar-toggler collapse-icons">
                                        <i class="material-icons add">&#xE313;</i>
                                        <i class="material-icons remove">&#xE316;</i>
                                    </span>
                                </span>
                                Bedroom
                            </a>
                            <div class="popover sub-menu js-sub-menu collapse" id="top_sub_menu_60475">
                                <ul class="top-menu" data-depth="1">
                                    <li class="category" id="category-4">
                                        <a class="dropdown-item dropdown-submenu" href="index.php?page=products" data-depth="1">
                                            <span class="pull-xs-right hidden-xs-up">
                                                <span data-target="#top_sub_menu_93005" data-toggle="collapse" class="navbar-toggler collapse-icons">
                                                    <i class="material-icons add">&#xE313;</i>
                                                    <i class="material-icons remove">&#xE316;</i>
                                                </span>
                                            </span>
                                            Beds &amp; Mattresses
                                        </a>
                                        <div class="collapse" id="top_sub_menu_93005">
                                            <ul class="top-menu" data-depth="2">
                                                <li class="category" id="category-16">
                                                    <a class="dropdown-item" href="index.php?page=products" data-depth="2">
                                                        Divan Beds
                                                    </a>
                                                </li>
                                                <li class="category" id="category-17">
                                                    <a class="dropdown-item" href="index.php?page=products" data-depth="2">
                                                        Storage Beds
                                                    </a>
                                                </li>
                                                <li class="category" id="category-18">
                                                    <a class="dropdown-item" href="index.php?page=products" data-depth="2">
                                                        Bed Frame
                                                    </a>
                                                </li>
                                                <li class="category" id="category-19">
                                                    <a class="dropdown-item" href="index.php?page=products" data-depth="2">
                                                        Guest Beds
                                                    </a>
                                                </li>
                                                <li class="category" id="category-20">
                                                    <a class="dropdown-item" href="index.php?page=products" data-depth="2">
                                                        Mattresses
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="menu-banners"></div>
                                        </div>
                                    </li>
                                    <li class="category" id="category-5">
                                        <a class="dropdown-item dropdown-submenu" href="5-bedroom-chairs.html" data-depth="1">
                                            <span class="pull-xs-right hidden-xs-up">
                                                <span data-target="#top_sub_menu_83600" data-toggle="collapse" class="navbar-toggler collapse-icons">
                                                    <i class="material-icons add">&#xE313;</i>
                                                    <i class="material-icons remove">&#xE316;</i>
                                                </span>
                                            </span>
                                            Bedroom Chairs
                                        </a>
                                        <div class="collapse" id="top_sub_menu_83600">
                                            <ul class="top-menu" data-depth="2">
                                                <li class="category" id="category-21">
                                                    <a class="dropdown-item" href="index.php?page=products" data-depth="2">
                                                        Dining Chairs
                                                    </a>
                                                </li>
                                                <li class="category" id="category-22">
                                                    <a class="dropdown-item" href="index.php?page=products" data-depth="2">
                                                        Bar Stools
                                                    </a>
                                                </li>
                                                <li class="category" id="category-23">
                                                    <a class="dropdown-item" href="index.php?page=products" data-depth="2">
                                                        Bar Height Stools
                                                    </a>
                                                </li>
                                                <li class="category" id="category-24">
                                                    <a class="dropdown-item" href="index.php?page=productsl" data-depth="2">
                                                        Short Bar Stools
                                                    </a>
                                                </li>
                                                <li class="category" id="category-25">
                                                    <a class="dropdown-item" href="index.php?page=products" data-depth="2">
                                                        Office Chairs
                                                    </a>
                                                </li>
                                            </ul>
                                            <div class="menu-banners"></div>
                                        </div>
                                    </li>
                                </ul>
                                <div class="menu-banners">
                                    <div class="menu-banner">
                                        <img src="img/c/3-0_thumb.jpg" alt="" />
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="category" id="category-8">
                            <a class="dropdown-item" href="index.php?page=products" data-depth="0">
                                Cushions
                            </a>
                        </li>
                        <li class="category" id="category-11">
                            <a class="dropdown-item" href="index.php?page=products" data-depth="0">
                                Outdoor
                            </a>
                        </li>
                        <li class="category" id="category-34">
                            <a class="dropdown-item" href="index.php?page=products" data-depth="0">
                                Sofas
                            </a>
                        </li>
                        <li class="manufacturers" id="manufacturers">
                            <a class="dropdown-item" href="brands.html" data-depth="0">
                                <span class="pull-xs-right hidden-xs-up">
                                    <span data-target="#top_sub_menu_2909" data-toggle="collapse" class="navbar-toggler collapse-icons">
                                        <i class="material-icons add">&#xE313;</i>
                                        <i class="material-icons remove">&#xE316;</i>
                                    </span>
                                </span>
                                All brands
                            </a>
                            <div class="popover sub-menu js-sub-menu collapse" id="top_sub_menu_2909">
                                <ul class="top-menu" data-depth="1">
                                    <li class="manufacturer" id="manufacturer-7">
                                        <a class="dropdown-item dropdown-submenu" href="brand/7-dots-tech.html" data-depth="1">
                                            DOTS Tech
                                        </a>
                                    </li>
                                    <li class="manufacturer" id="manufacturer-6">
                                        <a class="dropdown-item dropdown-submenu" href="brand/6-george.html" data-depth="1">
                                            George
                                        </a>
                                    </li>
                                    <li class="manufacturer" id="manufacturer-4">
                                        <a class="dropdown-item dropdown-submenu" href="brand/4-minimal.html" data-depth="1">
                                            Minimal
                                        </a>
                                    </li>
                                    <li class="manufacturer" id="manufacturer-8">
                                        <a class="dropdown-item dropdown-submenu" href="brand/8-retro-design.html" data-depth="1">
                                            Retro design
                                        </a>
                                    </li>
                                    <li class="manufacturer" id="manufacturer-5">
                                        <a class="dropdown-item dropdown-submenu" href="brand/5-the-human.html" data-depth="1">
                                            The Human
                                        </a>
                                    </li>
                                    <li class="manufacturer" id="manufacturer-3">
                                        <a class="dropdown-item dropdown-submenu" href="brand/3-vintage.html" data-depth="1">
                                            Vintage
                                        </a>
                                    </li>
                                </ul>
                                <div class="menu-banners"></div>
                            </div>
                        </li>
                        <li class="link" id="lnk-news">
                            <a class="dropdown-item" href="blog.html" data-depth="0">
                                News
                            </a>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
                <script type="text/javascript">
                    var moreCategoriesText = "More";
                </script>
                <div id="cpheadercms2">
                    <div class="offer-link"><a href="#">Latest offer zone</a></div>
                </div>
            </div>
        </div>
    </header>



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


                                    <div class="collapse in" id="cart-summary-product-list">
                                        <ul class="media-list">
                                            <li class="media">
                                                <div class="media-left">
                                                    <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/beds-mattresses/1-40-hummingbird-printed-t-shirt.html#/1-size-s/19-dimension-40x60cm/26-chair_color-grey" title="Mid Century Modern Side Chair with Wood Legs">
                                                        <img class="media-object lazyload" data-src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/25-cart_default/hummingbird-printed-t-shirt.jpg" src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/themes/PRS02048/assets/img/megnor/home_default_loading.gif" alt="Mid Century Modern Side Chair with Wood Legs" loading="lazy" width="80" height="80">
                                                    </a>
                                                </div>
                                                <div class="media-body">
                                                    <span class="product-name">
                                                        <a href="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/beds-mattresses/1-40-hummingbird-printed-t-shirt.html#/1-size-s/19-dimension-40x60cm/26-chair_color-grey" target="_blank" rel="noopener noreferrer nofollow">Mid Century Modern Side Chair with Wood Legs</a>
                                                    </span>
                                                    <span class="product-quantity">x1</span>
                                                    <span class="product-price pull-xs-right">$127.20</span>

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

                                </div>




                                <div class="cart-summary-line cart-summary-subtotals" id="cart-subtotal-products">

                                    <span class="label">
                                        Subtotal
                                    </span>

                                    <span class="value">
                                        $127.20
                                    </span>
                                </div>
                                <div class="cart-summary-line cart-summary-subtotals" id="cart-subtotal-shipping">

                                    <span class="label">
                                        Shipping
                                    </span>

                                    <span class="value">
                                        $7.00
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