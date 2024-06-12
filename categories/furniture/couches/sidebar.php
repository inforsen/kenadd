<div id="left-column" class="col-xs-12 col-sm-4 col-md-3 hb-animate-element top-to-bottom">
                     
                     <div id="search_filters_wrapper" class="hidden-md-down block">
                        <div id="search_filter_controls" class="hidden-lg-up"> 
                           <span id="_mobile_search_filters_clear_all"></span> 
                           <button class="btn btn-secondary ok">
                           <i class="material-icons rtl-no-flip">&#xE876;</i>
                           OK
                           </button>
                        </div>
                        <div id="search_filters">
                           <p class="text-uppercase h6 hidden-sm-down">Filter By</p>
                           <section class="facet clearfix heightside">
                              <p class="h6 facet-title hidden-sm-down">Size</p>
                              <div class="title hidden-md-up" data-target="#facet_50774" data-toggle="collapse">
                                 <p class="h6 facet-title">Size</p>
                                 <span class="navbar-toggler collapse-icons">
                                 <i class="material-icons add">&#xE313;</i>
                                 <i class="material-icons remove">&#xE316;</i>
                                 </span>
                              </div>
                              <ul id="facet_50774" class="collapse">
                                 <?php
                                 $cats = $getFromU->viewcouchessBrand("products");
                                 foreach ($cats as $cat) {
                                    $brandname = $cat->brand_name;
                                    $brand_id = $cat->brand_id;

                                    $get_brands = $getFromU->countcouchessBrand("products", $brandname);
                                    $count_brands = count($get_brands);
                              ?>
                                 <li>
                                    <label class="facet-label" for="facet_input_50774_0">
                                    <span class="custom-checkbox">
                                    <input
                                       id="facet_input_50774_0"
                                       data-search-url=""
                                       type="checkbox"
                                        value="<?php echo $brandname; ?>"
                                       >
                                    <span  class="ps-shown-by-js" ><i class="material-icons rtl-no-flip checkbox-checked">&#xE5CA;</i></span>
                                    </span>
                                    <a
                                       href="index.php?page=couches&brand_id=<?php echo $brand_id; ?>"
                                       class="_gray-darker search-link"
                                       rel="nofollow"
                                       >
                                    <?php echo $brandname; ?>
                                    <span class="magnitude">(<?php echo $count_brands; ?>)</span>
                                    </a>
                                    </label>
                                 </li>
                              <?php } ?>
                              </ul>
                           </section>
                           

                           <section class="facet clearfix">
                              <div class="range_container">
                                <div class="sliders_control">
                                    <input id="fromSlider" class="fromsSlider" type="range" value="0" min="0" max="100000"/>
                                    <input id="toSlider" class="tosSlider" type="range" value="100000" min="0" max="100000"/>
                                </div>
                                <div class="form_control">
                                    <div class="form_control_container">
                                        <div class="form_control_container__time">Min</div>
                                        <input class="form_control_container__time__input fromInput" type="number" id="fromInput" value="0" min="0" max="100000"/>
                                    </div>
                                    <div class="form_control_container">
                                        <div class="form_control_container__time">Max</div>
                                        <input class="form_control_container__time__input toInput" type="number" id="toInput" value="100000" min="0" max="100000"/>
                                    </div>
                                </div>
                            </div>
                           </section>






                        </div>
                     </div>
                     <div id="cpleftbanner1" class="left-banner block">
                        <h4 class="block_title hidden-lg-up" data-target="#left_banner_toggle" data-toggle="collapse">Left Banner
                           <span class="pull-xs-right">
                           <span class="navbar-toggler collapse-icons">
                           <i class="material-icons add">&#xE313;</i>
                           <i class="material-icons remove">&#xE316;</i>
                           </span>
                           </span>
                        </h4>
                        <ul class="block_content collapse" id="left_banner_toggle">
                           <li class="slide cpleftbanner1-container">
                              <a href="#" title="LeftBanner 1">
                              <img class="lazyload" src="images/left-banner-1.jpg" alt="LeftBanner 1" title="LeftBanner 1" width="100%" height="100%" />
                              </a>
                              <div class="banner-description">
                                 <div class="left-offer-block">
                                    <div class="text1">New trending</div>
                                    <div class="text2">Flats Upto 60% Off</div>
                                 </div>
                              </div>
                           </li>
                        </ul>
                     </div>
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

                              <?php 
                                   $getProducts = $getFromU->selectMostViewed();
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
                              <div class="product-item">
                                 <div class="left-part">
                                    <a href="index.php?page=product&product_id=<?php echo $product_id;?>" class="thumbnail product-thumbnail">
                                    <img
                                       class="lazyload"
                                       data-src = "images/<?php echo $product_img1; ?>"
                                       src="images/<?php echo $product_img1; ?>"
                                       height = "90"
                                       width = "80"
                                       alt = "<?php echo $product_title; ?>"
                                       >
                                    </a>
                                    <?php if ($product_rrp > 0) {
                                               $get_product_price = number_format((float)(($product_price/$product_rrp) * 100), 1);
                                               $get_product_final_price = 100 - $get_product_price;
                                               echo "<li class='product-flag discount'>-$get_product_final_price% 
                                                      </li> ";
                                           }?>
                                    <!---ul class="product-flags js-product-flags">
                                       <li class="product-flag discount">-20%</li>
                                       <li class="product-flag new">New</li>
                                    </ul>--->
                                 </div>
                                 <div class="right-part">
                                    <div class="product-description">
                                       <div class="comments_note">
                                          <div class="star_content clearfix">
                                             <div class="star star_on"></div>
                                             <div class="star star_on"></div>
                                             <div class="star star_on"></div>
                                             <div class="star "></div>
                                             <div class="star "></div>
                                          </div>
                                       </div>
                                       <h1 class="h3 product-title" itemprop="name"><a href="index.php?page=product&product_id=<?php echo $product_id;?>"><?php echo substr($product_title, 0, 26);?>...</a></h1>
                                       <div class="product-price-and-shipping">
                                          <span class="price">Kes <?php echo number_format((float)$product_price,2)?></span>
                                          <span class="sr-only">Regular price</span>
                                          <span class="regular-price">Kes <?php echo number_format((float)$product_rrp,2)?></span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                                  <?php } ?>








                           </div>
                           <a href="index.php?page=products" class="allproducts">All products</a>
                        </div>
                     </div>
                  </div>