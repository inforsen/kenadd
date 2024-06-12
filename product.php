<?php include 'includes/item-header.php';
   $ips_add = $getFromU->getRealUserIp();
   $couns = mt_rand(0, 98);
   if (isset($_GET['product_id'])) {
       $the_product_id = $_GET['product_id'];
   
       $get_products = $getFromU->viewProductByProductID($the_product_id);
       //var_dump($get_products);
   
       foreach ($get_products as $get_product) {
           $products_title = $get_product->product_title;
           $products_price = $get_product->product_price;
           $products_desc = $get_product->product_desc;
           $productdescstrip = strip_tags($products_desc);
           $products_img1 = $get_product->product_img1;
           $products_img2 = $get_product->product_img2;
           $products_img3 = $get_product->product_img3;
           $products_img4 = $get_product->product_img4;
           $products_img5 = $get_product->product_img5;
           
           //echo templates_header($product_title, $product_img1);
           //echo template_desc($product_title);
   
           $product_brandname = $get_product->brand_name;
           $product_cat_title = $get_product->cat_id;
           $product_cat = $get_product->product_category;
           $product_rating = $get_product->rating;
           $product_ratingnum = $get_product->ratingnum;
           $product_type_one = $get_product->product_type_one;
           $products_rrp = $get_product->rrp;
           $product_brand = $get_product->brand_name;
           $product_type = $get_product->product_type;
           $product_quality = $get_product->quality;
           $keyfeatures = $get_product->keyfeatures;
           $product_boxcontent = $get_product->boxcontent;
           $product_sku = $get_product->sku;
           $ribbon = $get_product->ribbon;
           $product_weight = $get_product->weight;
           $product_shop = $get_product->store_name;
           $product_deliveryinfo = $get_product->deliveryinfo;
           $product_returnpolicy = $get_product->returnpolicy;
   
           $ribbon = $get_product->ribbon;
           $choice = $get_product->choice;
           $no_stock = $get_product->no_stock;
           $mega_deal = $get_product->mega_deal;
   
           $get_viewed = $getFromU->selectViewed($ip_add, $the_product_id);
           if ($get_viewed == false) {
               $insert_cart = $getFromU->create("viewed", array("p_id" => $the_product_id, "ip_add" => $ip_add, "product_price" =>$products_price));
           } 
   
          
   
   
   echo template_header($products_title);
   
   
   if (isset($_POST['add_to_cart'])) {
       $p_id = $_POST['product_id'];
       $ip_add = $getFromU->getRealUserIp();
       $product_qty = $_POST['product_qty'];
   
       $check_product_by_ip_id = $getFromU->check_product_by_ip_id($ip_add, $p_id);
       if ($check_product_by_ip_id === true) {
           $_SESSION['rfqXucc'] = "Product already in cart";
   
           header('location: index.php?page=product&product_id='.$the_product_id.'', '_self');
   
       } else {
           $insert_cart = $getFromU->create("cart", array("p_id" => $p_id, "ip_add" => $ip_add, "qty" =>$product_qty, "product_price" =>$products_price));
           $_SESSION['rfqSucc'] = "Product successfully added to cart";
   
           header('location: index.php?page=product&product_id='.$the_product_id.'', '_self');
       }
   
   }
   
   
   
   if (isset($_POST['addWish'])) {
       if (!isset($_SESSION['customer_email'])) {
           $error = "You are not signed in";           
       } else {
           $c_email = $_SESSION['customer_email'];
       
   
       $p_id = $_POST['p_id'];
       //$c_email = $_POST['c_email'];
       $wishlist_id = $p_id;
   
       $checkWishByid = $getFromU->checkWishByid($c_email, $p_id);
       if ($checkWishByid === true) {
           $error = "Product exists in your wishlist";
   
           header('location: index.php?page=product&product_id='.$the_product_id.'', '_self');
   
       } else {
           $insert_wish = $getFromU->create("wish", array("p_id" => $p_id, "c_email" => $c_email, 'wishlist_id' => $wishlist_id));
           $success = "Product successfully added to your wishlist";
   
           header('location: index.php?page=product&product_id='.$the_product_id.'', '_self');
       }
   
   }
   
   }
   ?>
<section id="wrapper">
   <div class="columns container" id="product">
   <aside id="notifications">
      <div class="container">
      </div>
   </aside>
   <div id="breadcrumb_wrapper">
      <nav class="breadcrumb ">
         <div class="container">
            <ol data-depth="4" itemscope itemtype="http://schema.org/BreadcrumbList">
               <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                  <a itemprop="item" href="../index.php">
                  <span itemprop="name">Home</span>
                  </a>
                  <meta itemprop="position" content="1">
               </li>
               <!--li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                  <a itemprop="item" href="../3-bedroom.html">
                  <span itemprop="name">Bedroom</span>
                  </a>
                  <meta itemprop="position" content="2">
                  </li>
                  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                  <a itemprop="item" href="../4-beds-mattresses.html">
                  <span itemprop="name">Beds &amp; Mattresses</span>
                  </a>
                  <meta itemprop="position" content="3">
                  </li>
                  <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                  <a itemprop="item" href="24-204-hummingbird-printed-t-shirt.html#/size-s/dimension-40x60cm/vase_color-grey">
                  <span itemprop="name">Echasse Smoke Brushed Brass Frame Glass Vase</span>
                  </a>
                  <meta itemprop="position" content="4">
                  </li>--->
            </ol>
         </div>
      </nav>
   </div>
   <div id="columns_inner">
   <div id="" class="js-content-wrapper">
      <section id="main">
         <div class="row product-page product-container js-product-container">
            <div class="col-md-5">
               <section class="page-content" id="content">
                  <div class="product-leftside">
                     <div class="images-container js-images-container">
                        <div class="product-cover">
                           <img          
                              class="js-qv-product-cover img-fluid zoom-product lazyload"
                              data-zoom-image="images/<?php echo $products_img1; ?>"
                              data-src="images/<?php echo $products_img1; ?>"
                              src="images/<?php echo $products_img1; ?>"
                              height="1000"
                              width="890"
                              alt="<?php echo $products_title; ?>"
                              title="<?php echo $products_title; ?>"
                              loading="lazy"
                              >
                           <div class="layer hidden-sm-down" data-toggle="modal" data-target="#product-modal">
                              <i class="material-icons zoom-in">&#xE8FF;</i>
                           </div>
                           <ul class="product-flags js-product-flags">
                              <li class="product-flag discount">-10%</li>
                              <li class="product-flag new">New</li>
                           </ul>
                        </div>
                        <!-- Define Number of product for SLIDER -->
                        <!-- Horizontal Carousel Slider  -->
                        <div class="js-qv-mask mask additional_grid">
                           <ul id="additional-grid" class="product_list grid row gridcount additional-image-slider">
                              <li class="thumb-container product_item col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                 <a href="javaScript:void(0)" class="elevatezoom-gallery" data-image="images/<?php echo $products_img1; ?>" data-zoom-image="images/<?php echo $products_img1; ?>">
                                 <img
                                    class="thumb js-thumb lazyload  selected js-thumb-selected "
                                    data-image-medium-src="images/<?php echo $products_img1; ?>"
                                    data-image-large-src="images/<?php echo $products_img1; ?>"
                                    data-src="images/<?php echo $products_img1; ?>"      
                                    src="images/<?php echo $products_img1; ?>"                      
                                    alt="<?php echo $products_title; ?>"
                                    title="<?php echo $products_title; ?>"
                                    width="80"
                                    height="90"
                                    itemprop="image"
                                    loading="lazy"
                                    >
                                 </a>
                              </li>
                              <li class="thumb-container product_item col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                 <a href="javaScript:void(0)" class="elevatezoom-gallery" data-image="<?php echo $products_img2; ?>" data-zoom-image="<?php echo $products_img2; ?>">
                                 <img
                                    class="thumb js-thumb lazyload "
                                    data-image-medium-src="images/<?php echo $products_img2; ?>"
                                    data-image-large-src="images/<?php echo $products_img2; ?>"
                                    data-src="images/<?php echo $products_img2; ?>"      
                                    src="images/<?php echo $products_img2; ?>"                      
                                    alt="<?php echo $products_title; ?>"
                                    title="<?php echo $products_title; ?>"
                                    width="80"
                                    height="90"
                                    itemprop="image"
                                    onerror="this.style.display='none'"
                                    loading="lazy"
                                    >
                                 </a>
                              </li>
                              <li class="thumb-container product_item col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                 <a href="javaScript:void(0)" class="elevatezoom-gallery" data-image="<?php echo $products_img3; ?>" data-zoom-image="<?php echo $products_img3; ?>">
                                 <img
                                    class="thumb js-thumb lazyload "
                                    data-image-medium-src="images/<?php echo $products_img3; ?>"
                                    data-image-large-src="images/<?php echo $products_img3; ?>"
                                    data-src="images/<?php echo $products_img3; ?>"      
                                    src="images/<?php echo $products_img3; ?>"                      
                                    alt="<?php echo $products_title; ?>"
                                    title="<?php echo $products_title; ?>"
                                    width="80"
                                    height="90"
                                    itemprop="image"
                                    onerror="this.style.display='none'"
                                    loading="lazy"
                                    >
                                 </a>
                              </li>
                              <li class="thumb-container product_item col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                 <a href="javaScript:void(0)" class="elevatezoom-gallery" data-image="<?php echo $products_img4; ?>" data-zoom-image="<?php echo $products_img4; ?>">
                                 <img
                                    class="thumb js-thumb lazyload "
                                    data-image-medium-src="images/<?php echo $products_img4; ?>"
                                    data-image-large-src="images/<?php echo $products_img4; ?>"
                                    data-src="images/<?php echo $products_img4; ?>"      
                                    src="images/<?php echo $products_img4; ?>"                      
                                    alt="<?php echo $products_title; ?>"
                                    title="<?php echo $products_title; ?>"
                                    width="80"
                                    height="90"
                                    itemprop="image"
                                    onerror="this.style.display='none'"
                                    loading="lazy"
                                    >
                                 </a>
                              </li>
                              <li class="thumb-container product_item col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                 <a href="javaScript:void(0)" class="elevatezoom-gallery" data-image="<?php echo $products_img5; ?>" data-zoom-image="<?php echo $products_img5; ?>">
                                 <img
                                    class="thumb js-thumb lazyload "
                                    data-image-medium-src="images/<?php echo $products_img5; ?>"
                                    data-image-large-src="images/<?php echo $products_img5; ?>"
                                    data-src="images/<?php echo $products_img5; ?>"      
                                    src="images/<?php echo $products_img5; ?>"                      
                                    alt="<?php echo $products_title; ?>"
                                    title="<?php echo $products_title; ?>"
                                    width="80"
                                    height="90"
                                    itemprop="image"
                                    onerror="this.style.display='none'"
                                    loading="lazy"
                                    >
                                 </a>
                              </li>
                              <li class="thumb-container product_item col-xs-12 col-sm-6 col-md-4 col-lg-3">
                                 <a href="javaScript:void(0)" class="elevatezoom-gallery" data-image="<?php echo $products_img6; ?>" data-zoom-image="<?php echo $products_img6; ?>">
                                 <img
                                    class="thumb js-thumb lazyload "
                                    data-image-medium-src="images/<?php echo $products_img6; ?>"
                                    data-image-large-src="images/<?php echo $products_img6; ?>"
                                    data-src="images/<?php echo $products_img6; ?>"      
                                    src="images/<?php echo $products_img6; ?>"                      
                                    alt="<?php echo $products_title; ?>"
                                    title="<?php echo $products_title; ?>"
                                    width="80"
                                    height="90"
                                    itemprop="image"
                                    onerror="this.style.display='none'"
                                    loading="lazy"
                                    >
                                 </a>
                              </li>
                           </ul>
                        </div>
                        <!-- vertical Carousel Slider -->
                        <div class="image-block_slider">
                           <aside id="thumbnails" class="thumbnails js-thumbnails text-xs-center">
                              <div class="js-modal-mask mask  nomargin ">
                                 <ul id="gallery_cp" class="product-images js-modal-product-images additional-image-slider">
                                    <li class="thumb-container">
                                       <a href="javaScript:void(0)" class="elevatezoom-gallery" data-image="images/<?php echo $products_img1; ?>" data-zoom-image="images/<?php echo $products_img1; ?>">
                                       <img                      
                                          class="thumb js-thumb lazyload  selected js-thumb-selected "
                                          data-image-medium-src="images/<?php echo $products_img1; ?>"
                                          data-image-large-src="images/<?php echo $products_img1; ?>"
                                          data-src="images/<?php echo $products_img1; ?>"      
                                          src="images/<?php echo $products_img1; ?>"                      
                                          alt="<?php echo $products_title; ?>"
                                          title="<?php echo $products_title; ?>"
                                          width="80"
                                          height="90"
                                          itemprop="image"
                                          >
                                       </a>
                                    </li>
                                    <li class="thumb-container">
                                       <a href="javaScript:void(0)" class="elevatezoom-gallery" data-image="images/<?php echo $products_img2; ?>" data-zoom-image="images/<?php echo $products_img2; ?>">
                                       <img                      
                                          class="thumb js-thumb lazyload "
                                          data-image-medium-src="images/<?php echo $products_img2; ?>"
                                          data-image-large-src="images/<?php echo $products_img2; ?>"
                                          data-src="images/<?php echo $products_img2; ?>"      
                                          src="images/<?php echo $products_img2; ?>"                      
                                          alt="<?php echo $products_title; ?>"
                                          title="<?php echo $products_title; ?>"
                                          width="80"
                                          height="90"
                                          itemprop="image"
                                          onerror="this.style.display='none'"
                                          >
                                       </a>
                                    </li>
                                    <li class="thumb-container">
                                       <a href="javaScript:void(0)" class="elevatezoom-gallery" data-image="images/<?php echo $products_img3; ?>" data-zoom-image="images/<?php echo $products_img3; ?>">
                                       <img                      
                                          class="thumb js-thumb lazyload "
                                          data-image-medium-src="images/<?php echo $products_img3; ?>"
                                          data-image-large-src="images/<?php echo $products_img3; ?>"
                                          data-src="images/<?php echo $products_img3; ?>"      
                                          src="images/<?php echo $products_img3; ?>"                      
                                          alt="<?php echo $products_title; ?>"
                                          title="<?php echo $products_title; ?>"
                                          width="80"
                                          height="90"
                                          itemprop="image"
                                          onerror="this.style.display='none'"
                                          >
                                       </a>
                                    </li>
                                    <li class="thumb-container">
                                       <a href="javaScript:void(0)" class="elevatezoom-gallery" data-image="images/<?php echo $products_img4; ?>" data-zoom-image="images/<?php echo $products_img4; ?>">
                                       <img                      
                                          class="thumb js-thumb lazyload "
                                          data-image-medium-src="images/<?php echo $products_img4; ?>"
                                          data-image-large-src="images/<?php echo $products_img4; ?>"
                                          data-src="images/<?php echo $products_img4; ?>"      
                                          src="images/<?php echo $products_img4; ?>"                      
                                          alt="<?php echo $products_title; ?>"
                                          title="<?php echo $products_title; ?>"
                                          width="80"
                                          height="90"
                                          itemprop="image"
                                          onerror="this.style.display='none'"
                                          >
                                       </a>
                                    </li>
                                    <li class="thumb-container">
                                       <a href="javaScript:void(0)" class="elevatezoom-gallery" data-image="images/<?php echo $products_img5; ?>" data-zoom-image="images/<?php echo $products_img5; ?>">
                                       <img                      
                                          class="thumb js-thumb lazyload "
                                          data-image-medium-src="images/<?php echo $products_img5; ?>"
                                          data-image-large-src="images/<?php echo $products_img5; ?>"
                                          data-src="images/<?php echo $products_img5; ?>"      
                                          src="images/<?php echo $products_img5; ?>"                      
                                          alt="<?php echo $products_title; ?>"
                                          title="<?php echo $products_title; ?>"
                                          width="80"
                                          height="90"
                                          itemprop="image"
                                          onerror="this.style.display='none'"
                                          >
                                       </a>
                                    </li>
                                    <li class="thumb-container">
                                       <a href="javaScript:void(0)" class="elevatezoom-gallery" data-image="images/<?php echo $products_img6; ?>" data-zoom-image="images/<?php echo $products_img6; ?>">
                                       <img                      
                                          class="thumb js-thumb lazyload "
                                          data-image-medium-src="images/<?php echo $products_img6; ?>"
                                          data-image-large-src="images/<?php echo $products_img6; ?>"
                                          data-src="images/<?php echo $products_img6; ?>"      
                                          src="images/<?php echo $products_img6; ?>"                      
                                          alt="<?php echo $products_title; ?>"
                                          title="<?php echo $products_title; ?>"
                                          width="80"
                                          height="90"
                                          itemprop="image"
                                          onerror="this.style.display='none'"
                                          >
                                       </a>
                                    </li>
                                 </ul>
                              </div>
                           </aside>
                        </div>
                     </div>
                     <div class="scroll-box-arrows">
                        <i class="material-icons left">&#xE314;</i>
                        <i class="material-icons right">&#xE315;</i>
                     </div>
               </section>
               </div>
               <div class="col-md-7">
                  <h1 class="productpage_title"><?php echo $products_title; ?></h1>
                  <div class="hook-reviews">
                     <div class="comments_note">
                        <div class="star_content clearfix">
                           <div class="star star_on"></div>
                           <div class="star star_on"></div>
                           <div class="star star_on"></div>
                           <div class="star star_on"></div>
                           <div class="star "></div>
                        </div>
                     </div>
                  </div>
                  <div class="productpage-attributes-items">
                     <div class="brand-infos">
                        <label class="label">Brand :</label>
                        <a><?php echo $product_brandname; ?> </a>
                     </div>
                     <div class="product-reference">
                        <label class="label">Reference :</label>
                        <span itemprop="sku"><?php echo $product_sku; ?></span>
                     </div>
                     <div class="product-condition">
                        <label class="label">Condition :</label>
                        <link itemprop="itemCondition" href="https://schema.org/NewCondition"/>
                        <span>New</span>
                     </div>
                  </div>
                  <div class="product-information">
                     <div class="product-short-description" id="product-description-short-24">
                        <p><?php echo substr($productdescstrip, 0, 160); ?>...</p>
                     </div>
                     <div class="product-actions js-product-actions">
                        <form  method="post" id="">
                           <input type="hidden" name="token" value="d0fa0a5af269cfb80db3930b891e232d">
                           <input type="hidden" name="id_product" value="24" id="product_page_product_id">
                           <input type="hidden" name="id_customization" value="0" id="product_customization_id" class="js-product-customization-id">
                           <div class="product-variants js-product-variants">
                              <!--div class="clearfix product-variants-item">
                                 <span class="control-label">Vase Color : 
                                 Grey                                                      </span>
                                 <ul id="group_8">
                                    <li class="pull-xs-left input-container">
                                       <label aria-label="Grey">
                                       <input class="input-color" type="radio" data-product-attribute="8" name="group[8]" value="34" title="Grey" checked="checked">
                                       <span
                                          class="color texture" style="background-image: url(../img/co/34.jpg)"
                                          ><span class="attribute-name sr-only">Grey</span></span>
                                       </label>
                                    </li>
                                    <li class="pull-xs-left input-container">
                                       <label aria-label="Green">
                                       <input class="input-color" type="radio" data-product-attribute="8" name="group[8]" value="35" title="Green">
                                       <span
                                          class="color texture" style="background-image: url(../img/co/35.jpg)"
                                          ><span class="attribute-name sr-only">Green</span></span>
                                       </label>
                                    </li>
                                    <li class="pull-xs-left input-container">
                                       <label aria-label="Coffee">
                                       <input class="input-color" type="radio" data-product-attribute="8" name="group[8]" value="36" title="Coffee">
                                       <span
                                          class="color texture" style="background-image: url(../img/co/36.jpg)"
                                          ><span class="attribute-name sr-only">Coffee</span></span>
                                       </label>
                                    </li>
                                 </ul>
                                 </div>
                                 <div class="clearfix product-variants-item">
                                 <span class="control-label">Size : 
                                 S                                                                            </span>
                                 <ul id="group_1">
                                    <li class="input-container pull-xs-left">
                                       <label> 
                                       <input class="input-radio" type="radio" data-product-attribute="1" name="group[1]" value="1"title="S"  checked="checked">
                                       <span class="radio-label">S</span>
                                       </label>
                                    </li>
                                    <li class="input-container pull-xs-left">
                                       <label> 
                                       <input class="input-radio" type="radio" data-product-attribute="1" name="group[1]" value="2"title="M" >
                                       <span class="radio-label">M</span>
                                       </label>
                                    </li>
                                    <li class="input-container pull-xs-left">
                                       <label> 
                                       <input class="input-radio" type="radio" data-product-attribute="1" name="group[1]" value="3"title="L" >
                                       <span class="radio-label">L</span>
                                       </label>
                                    </li>
                                    <li class="input-container pull-xs-left">
                                       <label> 
                                       <input class="input-radio" type="radio" data-product-attribute="1" name="group[1]" value="4"title="XL" >
                                       <span class="radio-label">XL</span>
                                       </label>
                                    </li>
                                 </ul>
                                 </div>
                                 <div class="clearfix product-variants-item">
                                 <span class="control-label">Dimension : 
                                 40x60cm                                                      </span>
                                 <ul id="group_3">
                                    <li class="input-container pull-xs-left">
                                       <label> 
                                       <input class="input-radio" type="radio" data-product-attribute="3" name="group[3]" value="19"title="40x60cm"  checked="checked">
                                       <span class="radio-label">40x60cm</span>
                                       </label>
                                    </li>
                                    <li class="input-container pull-xs-left">
                                       <label> 
                                       <input class="input-radio" type="radio" data-product-attribute="3" name="group[3]" value="20"title="60x90cm" >
                                       <span class="radio-label">60x90cm</span>
                                       </label>
                                    </li>
                                    <li class="input-container pull-xs-left">
                                       <label> 
                                       <input class="input-radio" type="radio" data-product-attribute="3" name="group[3]" value="21"title="80x120cm" >
                                       <span class="radio-label">80x120cm</span>
                                       </label>
                                    </li>
                                 </ul>
                                 </div>--->
                              <div class="js-product-availability-source">
                                 <span id="product-availability">
                                 <span class="product-availability product-available alert alert-success">
                                 <i class="material-icons">check</i>&nbsp;In Stock
                                 </span>
                                 </span>                
                              </div>
                              <div class="qtyprogress">
                                 <span class="quantityavailable">
                                 <span>Hurry! only <strong class="quantity"><?php echo $couns; ?> </strong>items left in stock.</span>
                                 </span>      
                                 <div class="progress">
                                    <div class="progress-bar" role="progressbar"></div>
                                 </div>
                              </div>
                           </div>
                           <div class="countdown show" data-Date="2025-12-24 00:00:00">
                              <div class="running is-couwntdown">
                                 <timer class="countdown-row countdown-show4">
                                    <span class="countdown-section">
                                    <span class="countdown-amount days"></span>
                                    <span class="countdown-period">Days</span>
                                    </span>
                                    <span class="countdown-section">
                                    <span class="countdown-amount hours"></span>
                                    <span class="countdown-period">Hrs</span>
                                    </span>
                                    <span class="countdown-section">
                                    <span class="countdown-amount minutes"></span>
                                    <span class="countdown-period">Mins</span>
                                    </span>
                                    <span class="countdown-section">
                                    <span class="countdown-amount seconds"></span>
                                    <span class="countdown-period">Secs</span>
                                    </span>
                                 </timer>
                              </div>
                           </div>
                           <section class="product-discounts js-product-discounts"></section>
                           <div class="product-prices js-product-prices">
                              <div
                                 class="product-price h5 has-discount">
                                 <div class="current-price">
                                    <span class='current-price-value' content="<?php echo number_format((float)$products_price,2)?>">
                                    Kes <?php echo number_format((float)$products_price,2)?>
                                    </span>
                                 </div>
                              </div>
                              <div class="product-discount">
                                 <span class="regular-price">Kes <?php echo number_format((float)($products_rrp),2); ?></span>
                              </div>
                              <span class="disc-price">
                              <span class="discount discount-percentage">
                              <?php
                                 if ($products_rrp == 0) {
                                    echo '';
                                 } else {
                                     echo 'Save'.' '. number_format((float)($tax = ($products_rrp - $products_price)),2);
                                 }  
                                 ?></span>
                              </span>
                              <div class="tax-shipping-delivery-label">
                              </div>
                              <span class="delivery-information">Free Shipping (Est. Delivery Time 2-3 Days)</span>
                           </div>
                           <div class="product-add-to-cart js-product-add-to-cart">
                              <div class="product-quantity">
                                 <div class="product-double-quantity">
                                    <span class="control-label">Quantity</span>
                                    <div class="qty">
                                       <input type="hidden" name="product_id" value="<?php echo $the_product_id; ?>">
                                       <input
                                          type="text"
                                          name="product_qty"
                                          id="quantity_wanted"
                                          inputmode="numeric"
                                          pattern="[0-9]*"
                                          value="1"
                                          min="1"
                                          class="input-group"
                                          aria-label="Quantity"
                                          >
                                    </div>
                                 </div>
                                 <div class="add">  

                                    <?php 
                                                                            $checkProd = $getFromU->checkProd($ip_add, $the_product_id);
                                                                             if ($checkProd === true) {
                                                                                 echo '<div class="add">
                                                                                        <span class="btn btn-primary in-to-cart">In Cart</span>
                                                                                        </div>';
                                                                            } else if ($ribbon == 'Out of Stock') {
                                                                                echo '<div class="add">
                                                                                        <button class="btn btn-primary out-to-cart">Out of Stock</button>
                                                                                        </div>';
                                                                            } else {
                                                                                echo '<button
                                       class="btn btn-primary add-to-cart"
                                       name="add_to_cart"
                                       type="submit"
                                       >
                                    <i class="material-icons shopping-cart">&#xE547;</i>
                                    Add to cart
                                    </button>';
                                                                            }
                                                                        ?>




                                 </div>
                                 <p class="product-minimal-quantity js-product-minimal-quantity"></p>
                                 <div id="product-availability" class="js-product-availability js-product-availability-source"></div>
                                 <div class="wish-comp">
                                    <div class="wishlist">
                                       <form method="POST">  
                                                                                    <input type="hidden" name="p_id" value="<?php echo $the_product_id;?>">
                                                                                    <button style="border: 0 !important;
    outline: 0 !important;
    background-color: transparent !important;" class="ajax_wishlist_text" type="submit" name="addWish"><a class="st-wishlist-button btn-product btn" href="#" data-id-wishlist="" title="Add to Wishlist">
                                       <span class="st-wishlist-bt-content">
                                       <i class="fa fa-heart" aria-hidden="true"></i>               
                                       <span class="st-wishlist-title">Add to Wishlist</span>
                                       </span>
                                       </a></button>
                                                                                </form>
                                       
                                    </div>
                                 </div>
                              </div>
                              <div class="clearfix"></div>
                           </div>
                        </form>
                        <div class="product-additional-info js-product-additional-info">
                           <div class="social-sharing">
                              <span>Share</span>
                              <ul>
                                 <li class="facebook icon-gray"><a href="https://www.facebook.com/sharer.php?u=https%3A%2F%2Fprestashop.coderplace.com%2FPRS02%2FPRS02048%2Fdemo%2Fen%2Fbeds-mattresses%2F24-hummingbird-printed-t-shirt.html" class="text-hide" title="Share" target="_blank" rel="noopener noreferrer">Share</a></li>
                                 <li class="twitter icon-gray"><a href="https://twitter.com/intent/tweet?text=Echasse+Smoke+Brushed+Brass+Frame+Glass+Vase%20https%3A%2F%2Fprestashop.coderplace.com%2FPRS02%2FPRS02048%2Fdemo%2Fen%2Fbeds-mattresses%2F24-hummingbird-printed-t-shirt.html" class="text-hide" title="Tweet" target="_blank" rel="noopener noreferrer">Tweet</a></li>
                                 <li class="pinterest icon-gray"><a href="https://www.pinterest.com/pin/create/button/?media=https%3A%2F%2Fprestashop.coderplace.com%2FPRS02%2FPRS02048%2Fdemo%2F64%2Fhummingbird-printed-t-shirt.jpg&amp;url=https%3A%2F%2Fprestashop.coderplace.com%2FPRS02%2FPRS02048%2Fdemo%2Fen%2Fbeds-mattresses%2F24-hummingbird-printed-t-shirt.html" class="text-hide" title="Pinterest" target="_blank" rel="noopener noreferrer">Pinterest</a></li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <section class="product-tabcontent">
               <div class="tabs">
                  <ul class="nav nav-tabs" role="tablist">
                     <li class="nav-item">
                        <a
                           class="nav-link active js-product-nav-active"
                           data-toggle="tab"
                           href="#description"
                           role="tab"
                           aria-controls="description"
                           aria-selected="true">Description</a>
                     </li>
                     <li class="nav-item">
                        <a
                           class="nav-link"
                           data-toggle="tab"
                           href="#product-details"
                           role="tab"
                           aria-controls="product-details"
                           >Product Details</a>
                     </li>
                     <li class="nav-item">
                        <a
                           class="nav-link"
                           data-toggle="tab"
                           href="#shippingcmsblock"
                           role="tab"
                           aria-controls="shippingcmsblock">Shipping</a>
                     </li>
                     <!---li class="nav-item">
                        <a
                           class="nav-link"
                           data-toggle="tab"
                           href="#sizechartcmsblock"
                           role="tab"
                           aria-controls="sizechartcmsblock">Size Chart</a>
                        </li>-->
                  </ul>
                  <div class="tab-content" id="tab-content">
                     <div class="tab-pane fade in active js-product-tab-active" id="description" role="tabpanel">
                        <div class="product-description">
                           <?php echo $productdescstrip; ?>
                        </div>

                        <div style="padding-top: 30px;">
                           <h3 style="font-weight: 800;">Product Features</h3>
                            <?php echo $keyfeatures; ?>
                        </div>
                     </div>
                     <div class="tab-pane fade"
                        id="product-details"
                        role="tabpanel"
                        >
                        <div class="js-product-attributes-source">
                           <div class="product-manufacturer">
                              <a href="../brand/4-minimal.html">
                              <img src="img/m/4.jpg" class="img img-thumbnail manufacturer-logo" alt="Minimal" loading="lazy">
                              </a>
                           </div>
                           <div class="product-reference">
                              <label class="label">Reference </label>
                              <span itemprop="sku">: FURN-44-148-369</span>
                           </div>
                           <div class="product-quantities">
                              <label class="label">In stock</label>
                              <span data-stock="49" data-allow-oosp="0">: 49 Items</span>
                           </div>
                           <div class="product-out-of-stock">
                           </div>
                           <div class="qtyprogress">
                              <span class="quantityavailable">
                              <span>Hurry! only <strong class="quantity">49 </strong>items left in stock.</span>
                              </span>      
                              <div class="progress">
                                 <div class="progress-bar" role="progressbar"></div>
                              </div>
                           </div>
                        </div>
                        <div class="product-condition">
                           <label class="label">Condition </label>
                           <link itemprop="itemCondition" href="https://schema.org/NewCondition"/>
                           <span>New</span>
                        </div>
                        <!---section class="product-features">
                           <h3 class="h6">Data sheet</h3>
                           <dl class="data-sheet">
                              <dt class="name">Composition</dt>
                              <dd class="value">Recycled cardboard</dd>
                              <dt class="name">Property</dt>
                              <dd class="value">Long sleeves</dd>
                              <dt class="name">Manufacturer Part Number</dt>
                              <dd class="value">MAN44-005-399</dd>
                              <dt class="name">Material</dt>
                              <dd class="value">Still</dd>
                              <dt class="name">Product Weight</dt>
                              <dd class="value">10 LB</dd>
                              <dt class="name">Room Type</dt>
                              <dd class="value">Kitchen, Dining Room</dd>
                              <dt class="name">Maximum recommended load</dt>
                              <dd class="value">100 Pounds</dd>
                              <dt class="name">Country of Origin</dt>
                              <dd class="value">China</dd>
                              <dt class="name">Assembly required</dt>
                              <dd class="value">Yes</dd>
                              <dt class="name">Number of pieces</dt>
                              <dd class="value">1</dd>
                              <dt class="name">Assembled Product Dimensions (L x W x H)</dt>
                              <dd class="value">30.00 x 20.00 x 40.00 Inches</dd>
                           </dl>
                           </section>-->
                           <div class="product-description">
                           <p style="text-align:center;"><img src="images/<?php echo $products_img1; ?>" style="margin-left:auto;margin-right:auto;" alt="<?php echo $products_title; ?>" width="800" height="800" /></p>
                           <p style="text-align:center;"><img src="images/<?php echo $products_img2; ?>" style="margin-left:auto;margin-right:auto;" alt="<?php echo $products_title; ?>" width="800" height="800" /></p>
                        </div>
                     </div>
                     <div class="tab-pane fade in js-product-tab-active" id="shippingcmsblock" role="tabpanel">
                        <div class="product-description">
                           <div id="cpcmsshipping_block">
                              <?php echo $product_deliveryinfo; ?>

                           </div>
                        </div>
                     </div>
                     <!---div class="tab-pane fade in js-product-tab-active" id="sizechartcmsblock" role="tabpanel">
                        <div class="product-description">
                           <div id="cpcmssizechart_block">
                              <div id="sizeguide" class="tab">
                                 <table class="size_guide_table">
                                    <tbody>
                                       <tr>
                                          <th>Size</th>
                                          <th>S</th>
                                          <th>M</th>
                                          <th>L</th>
                                          <th>XL</th>
                                       </tr>
                                       <tr>
                                          <td>Men</td>
                                          <td>7-10</td>
                                          <td>10-13</td>
                                          <td>13-15</td>
                                          <td>15-17</td>
                                       </tr>
                                       <tr>
                                          <td>Women</td>
                                          <td>7-9</td>
                                          <td>10-12</td>
                                          <td>13-14</td>
                                          <td>15-16</td>
                                       </tr>
                                    </tbody>
                                 </table>
                                 <br /><strong>Example Shown :</strong> SIZE XL, Hem to Hem 84cm OR 33 ,SIZE L, Hem to Hem 84cm OR 33 ,SIZE M, Hem to Hem 84cm OR 33 ,SIZE S, Hem to Hem 84cm OR 33
                              </div>
                           </div>
                        </div>
                        </div>--->
                  </div>
               </div>
            </section>
            <!-- Define Number of product for SLIDER -->
            <section class="product-accessories clearfix">
               <div class="products-section-title">
                  <h2 class="title">You might also like</h2>
               </div>
               <div id="spe_res">
                  <div class="products">
                     <div id="accessories-carousel" class="tm-carousel product_list">
                        <?php
                           $getProducts = $getFromU->selectBestSellerProducts();
                               $count_product = count($getProducts);
                               if ($count_product == 0) {
                               ?>
                        <div class="account-add">
                           <p>No items in this category yet</p>
                        </div>
                        <?php
                           } else {
                                foreach ($getProducts as $getProduct) {
                                $product_id = $getProduct->product_id;
                                $product_title = $getProduct->product_title;
                                $product_price = $getProduct->product_price;
                                $product_img1 = $getProduct->product_img1;
                                $product_img2 = $getProduct->product_img2;
                                $product_rrp = $getProduct->rrp;
                                $ribbon = $getProduct->ribbon;
                                $choice = $getProduct->choice;
                                $no_stock = $getProduct->no_stock;
                                $product_ratingnum = $getProduct->ratingnum;
                                $product_rating = $getProduct->rating;
                                $no_stock = $getProduct->no_stock;
                                $products_cat = $getProduct->product_category;
                           ?>
                        <article class="item">
                           <div class="product">
                              <article class="product-miniature js-product-miniature" data-id-product="1" data-id-product-attribute="40">
                                 <div class="thumbnail-container">
                                    <a href="index.php?page=product&product_id=<?php echo $product_id;?>" class="thumbnail product-thumbnail">
                                    <img
                                       class="img-fluid lazyload"
                                       data-src="images/<?php echo $product_img1; ?>"
                                       src="images/<?php echo $product_img1; ?>"
                                       height="500"
                                       width="500"
                                       alt="<?php echo $product_title;?>"
                                       loading="lazy"
                                       data-full-size-image-url="images/<?php echo $product_img1; ?>"
                                       />
                                    <img class="replace-2x img_1 img-responsive lazyload" data-src="images/<?php echo $product_img1; ?>" data-full-size-image-url="images/<?php echo $product_img1; ?>" alt="" />
                                    </a>     
                                    <div class="highlighted-informations hidden-sm-down">
                                       <div class="variant-links">
                                          <a href="index.php?page=product&product_id=<?php echo $product_id;?>"
                                             class="texture color"
                                             title="Grey"
                                             aria-label="Grey"
                                             style="background-image: url(<?php echo $product_img1; ?>)" 
                                             ></a>
                                          <a href="index.php?page=product&product_id=<?php echo $product_id;?>"
                                             class="texture color"
                                             title="Black"
                                             aria-label="Black"
                                             style="background-image: url(<?php echo $product_img2; ?>)" 
                                             ></a>
                                          <a href="index.php?page=product&product_id=<?php echo $product_id;?>"
                                             class="texture color"
                                             title="Cream"
                                             aria-label="Cream"
                                             style="background-image: url(<?php echo $product_img3; ?>)" 
                                             ></a>
                                          <span class="js-count count"></span>
                                       </div>
                                    </div>
                                 </div>
                                 <div class="product-description">
                                    <span class="product-brand"><?php echo $products_cat; ?></span>       
                                    <span class="h3 product-title"><a href="index.php?page=product&product_id=<?php echo $product_id;?>" content="<?php echo $product_title;?>"><?php echo substr($product_title, 0, 26);?>...</a></span>
                                 </div>
                                 <div class="product-bottom">
                                    <div class="product-price-and-shipping">
                                       <span class="price">Kes <?php echo number_format((float)$product_price,2)?></span>
                                       <span class="sr-only">Regular price</span>
                                       <span class="regular-price">Kes <?php echo number_format((float)$product_rrp,2)?></span>
                                    </div>
                                 </div>
                              </article>
                        </article>
                        <?php } } ?>
                        </div>
                        <div class="customNavigation">
                           <i class="btn prev accessories_prev">&nbsp;</i>
                           <i class="btn next accessories_next">&nbsp;</i>
                        </div>
                     </div>
                  </div>
            </section>
            <script type="text/javascript">
               var myprestacomments_controller_url = '../module/myprestacomments/default.html';
               var confirm_report_message = 'Are you sure that you want to report this comment?';
               var secure_key = '63ed7f46b93b3a343abeca5c8172c63a';
               var myprestacomments_url_rewrite = '1';
               var MyprestaComment_added = 'Your comment has been added!';
               var MyprestaComment_added_moderation = 'Your comment has been submitted and will be available once approved by a moderator.';
               var MyprestaComment_title = 'New comment';
               var MyprestaComment_ok = 'OK';
               var moderation_active = 0;
            </script>
            <div id="myprestacommentsBlock" itemscope="" itemtype="http://schema.org/product">
   <meta itemprop="name" content="Echasse Smoke Brushed Brass Frame Glass Vase">
   <meta itemprop="url" content="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/beds-mattresses/24-hummingbird-printed-t-shirt.html">
   <div class="products-section-title">
      <h2 class="title">Reviews</h2>
   </div>
   <div class="tabs">
      <div id="new_comment_form_ok" class="alert alert-success" style="display:none;padding:15px 25px"></div>
      <div id="product_comments_block_tab">
         <div class="comment clearfix" itemprop="review" itemscope itemtype="https://schema.org/Review">
            <div class="comment_author">
               <span>Grade&nbsp</span>
               <div class="star_content clearfix"  itemprop="reviewRating" itemscope itemtype="https://schema.org/Rating" >
                  <div class="star star_on"></div>
                  <div class="star star_on"></div>
                  <div class="star star_on"></div>
                  <div class="star star_on"></div>
                  <div class="star"></div>
                  <meta itemprop="worstRating" content="0"/>
                  <meta itemprop="ratingValue" content="4"/>
                  <meta itemprop="bestRating" content="5"/>
               </div>
               <div class="criterions_grade">
                  Quality
                  <br/>
                  <div class="criterion star star_on"></div>
                  <div class="criterion star star_on"></div>
                  <div class="criterion star star_on"></div>
                  <div class="criterion star star_on"></div>
                  <div class="criterion star"></div>
                  <br/>
               </div>
               <div class="comment_author_infos">
                  <span itemprop="author" itemscope itemtype="https://schema.org/Person">
                  <strong itemprop="name">admin t</strong><br/>
                  </span>
                  <em>05/10/2023</em>
                  <meta itemprop="datePublished" content="05/10/2023"/>
               </div>
            </div>
            <div class="comment_details">
               <h4 class="title_block" itemprop="name"><?php echo $products_title; ?></h4>
               <p itemprop="reviewBody"><?php echo substr($productdescstrip, 0, 46); ?>...</p>
               <ul>
               </ul>
            </div>
         </div>
      </div>
      <div class="clearfix pull-right">
         <a class="open-comment-form btn btn-primary" href="#new_comment_form">Write your review</a>
      </div>
   </div>
   <!-- Fancybox -->
   <div style="display:none">
      <div id="new_comment_form">
         <form id="id_new_comment_form" enctype="multipart/form-data">
            <h2 class="title">Write your review</h2>
            <div class="product clearfix">
               <div class="product_desc">
                  <p class="product_name"><strong><?php echo $products_title; ?></strong></p>
                  <p><?php echo $productdescstrip; ?></p>
               </div>
            </div>
            <div class="new_comment_form_content">
               <h2>Write your review</h2>
               <div id="new_comment_form_error" class="error" style="display:none;padding:15px 25px">
                  <ul></ul>
               </div>
               <ul id="criterions_list">
                  <li>
                     <label>Quality</label>
                     <div class="star_content">
                        <input class="star" type="radio" name="criterion[1]" value="1"/>
                        <input class="star" type="radio" name="criterion[1]" value="2"/>
                        <input class="star" type="radio" name="criterion[1]" value="3"/>
                        <input class="star" type="radio" name="criterion[1]" value="4"/>
                        <input class="star" type="radio" name="criterion[1]" value="5" checked="checked"/>
                     </div>
                     <div class="clearfix"></div>
                  </li>
               </ul>
               <label for="comment_title">Title for your review<sup class="required">*</sup></label>
               <input id="comment_title" name="title" type="text" value=""/>
               <label for="content">Your review<sup class="required">*</sup></label>
               <textarea id="content" name="content"></textarea>
               <label>Your name<sup class="required">*</sup></label>
               <input id="commentCustomerName" name="customer_name" type="text" value=""/>
               <label>Your email<sup class="required">*</sup></label>
               <input id="commentCustomerEmail" name="customer_email" type="text" value=""/>
               <div id="new_comment_form_footer">
                  <input id="id_product_comment_send" name="id_product" type="hidden" value='24'/>
                  <p class="row required"><sup>*</sup> Required fields</p>
                  <p class="fr">
                     <input onchange="if($(this).is(':checked')){$('#submitNewMessage').removeClass('gdpr_disabled'); $('#submitNewMessage').removeAttr('disabled'); rebindClickButton();}else{$('#submitNewMessage').addClass('gdpr_disabled'); $('#submitNewMessage').off('click'); $('#submitNewMessage').attr('disabled', 1); }" id="gdpr_checkbox" type="checkbox">
                     I accept 
                     <a target="_blank" href="../content/1-delivery.html">privacy policy</a>
                     rules
                     <button disabled class="btn btn-primary gdpr_disabled" id="submitNewMessage" name="submitMessage" type="submit">Send</button>&nbsp;
                     or&nbsp;<a href="#" onclick="$.fancybox.close();">Cancel</a>
                  </p>
                  <div class="clearfix"></div>
               </div>
            </div>
         </form>
         <!-- /end new_comment_form_content -->
      </div>
   </div>
   <!-- End fancybox -->
</div>
            <div class="modal fade js-product-images-modal" id="product-modal">
   <div class="modal-dialog" role="document">
      <div class="modal-content">
         <div class="modal-body">
            <figure>
               <img
                  class="js-modal-product-cover product-cover-modal"
                  width="890"
                  src="images/<?php echo $products_img1; ?>"
                  alt="<?php echo $products_title; ?>"
                  title="<?php echo $products_title; ?>"
                  height="1000"
                  >
            </figure>
            <aside id="thumbnails" class="thumbnails js-thumbnails text-xs-center">
               <div class="js-modal-mask mask  nomargin ">
                  <ul class="product-images js-modal-product-images">
                     <li class="thumb-container js-thumb-container">
                        <img
                           data-image-large-src="images/<?php echo $products_img1; ?>"
                           class="thumb js-modal-thumb"
                           src="images/<?php echo $products_img1; ?>"
                           alt="<?php echo $products_title; ?>"
                           title="<?php echo $products_title; ?>"
                           >
                     </li>
                     <li class="thumb-container js-thumb-container">
                        <img
                           data-image-large-src="images/<?php echo $products_img2; ?>"
                           class="thumb js-modal-thumb"
                           src="images/<?php echo $products_img2; ?>"
                           alt="<?php echo $products_title; ?>"
                           title="<?php echo $products_title; ?>"
                           >
                     </li>
                  </ul>
               </div>
            </aside>
         </div>
      </div>
      <!-- /.modal-content -->
   </div>
   <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
            <footer class="page-footer">
            <!-- Footer content -->
            </footer>
      </section>
      </div>
      </div>
   </div>
</section>
<?php } } ?>
<?php include 'includes/footer.php'; ?>
</main> 
<script type="text/javascript" src="themes/PRS02048/assets/cache/bottom-d56eca6.js" ></script>
</body>
<!-- Mirrored from prestashop.coderplace.com/PRS02/PRS02048/demo/en/beds-mattresses/24-204-hummingbird-printed-t-shirt.html by HTTrack Website Copier/3.x [XR&CO'2014], Mon, 11 Mar 2024 20:40:52 GMT -->
</html>