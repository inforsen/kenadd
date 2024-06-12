<?php include 'includes/header.php' ?>

         
         <section id="wrapper-top">
            <div class="flexslider" data-interval="5500" data-pause="true">
               <div class="loadingdiv spinner"></div>
               <ul class="slides">
                  <li class="slide">
                     <a href="#" title="sample-1">
                     <img class="lazyload image" height="300" data-src="images/ken10s.jpg" alt="sample-1" title="Sample 1" />
                     </a>
                     <div class="caption-description">
                        <div class="slide-text">
                           <div class="slidertext1">Get 50% Discount On</div>
                           <div class="slidertext2">Latest Wooden <br />Dining Chair</div>
                           <div class="slidertext3">Buy dining table &amp; chair online Upto 50% OFF today only.</div>
                           <a href="#" class="sliderbutton btn btn-primary">Shop Now</a>
                        </div>
                     </div>
                  </li>
                  <li class="slide">
                     <a href="#" title="sample-2">
                     <img class="lazyload image" data-src="images/ken9s.jpg" alt="sample-2" title="Sample 2" />
                     </a>
                     <div class="caption-description">
                        <div class="slide-text">
                           <div class="slidertext1">Dining Room Design</div>
                           <div class="slidertext2">New Design<br />Dining Table</div>
                           <div class="slidertext3">There are many variations of passages of Lorem..</div>
                           <a href="#" class="sliderbutton btn btn-primary">Shop Now</a>
                        </div>
                     </div>
                  </li>
                  <li class="slide">
                     <a href="#" title="sample-3">
                     <img class="lazyload image" data-src="images/ken13s.jpg" alt="sample-3" title="Sample 3" />
                     </a>
                     <div class="caption-description">
                        <div class="slide-text">
                           <div class="slidertext1">Chair For Living Room</div>
                           <div class="slidertext2">Modern Chair<br />Design</div>
                           <div class="slidertext3">There are Many variation of passages of Lorem...</div>
                           <a href="#" class="sliderbutton btn btn-primary">Shop Now</a>
                        </div>
                     </div>
                  </li>
               </ul>
            </div>
         </section>
         <section id="wrapper">
            <div class="container-home">
            <aside id="notifications">
               <div class="container">
               </div>
            </aside>
            <div id="breadcrumb_wrapper">
               <nav class="breadcrumb ">
                  <div class="container">
                     <ol data-depth="1" itemscope itemtype="http://schema.org/BreadcrumbList">
                        <li itemprop="itemListElement" itemscope itemtype="http://schema.org/ListItem">
                           <a itemprop="item" href="index.php">
                           <span itemprop="name">Home</span>
                           </a>
                           <meta itemprop="position" content="1">
                        </li>
                     </ol>
                  </div>
               </nav>
            </div>
            <div id="columns_inner">
            <div id="content-wrapper" class="js-content-wrapper">
            <section id="main">
               <section id="content" class="page-home">
                  <section id="cpcmsbanner1">
                     <div class="container">
                        <div class="products-section-title">
                           <h2 class="title">Trending Category</h2>
                           <span>In publishing and graphic design, Lorem ipsum is a placeholder text </span>
                        </div>
                        <div id="cpcmsbanner1_block1">
                           <div class="left-side main-content">
                              <div class="cms_content dis_none">
                                 <a href="#"><img class="lazyload" src="modules/cp_cmsbanner1/views/img/cms-banner1.jpg" alt="cms-banner-1.jpg" width="350" height="285" /> </a>
                                 <div class="cms-block">
                                    <div class="offer-text1">Clock</div>
                                    <div class="offer-button"><a href="index.php?page=accessories">shop Now</a></div>
                                 </div>
                              </div>
                              <div class="cms_content">
                                 <a href="#"><img class="lazyload" src="modules/cp_cmsbanner1/views/img/cms-banner2.jpg" alt="cms-banner-1.jpg" width="350" height="285" /> </a>
                                 <div class="cms-block">
                                    <div class="offer-text1">Lighting</div>
                                    <div class="offer-button"><a href="#">shop Now</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="center-side main-content">
                              <div class="cms_content">
                                 <a href="#"> <img class="lazyload" src="modules/cp_cmsbanner1/views/img/cms-banner3.jpg" alt="cms-banner-2.jpg" width="660" height="590" /> </a>
                                 <div class="cms-block">
                                    <div class="offer-text1">Wooden Chair</div>
                                    <div class="offer-button"><a href="#">shop Now</a></div>
                                 </div>
                              </div>
                           </div>
                           <div class="right-side main-content dis_none">
                              <div class="cms_content">
                                 <a href="#"> <img class="lazyload" src="modules/cp_cmsbanner1/views/img/cms-banner4.jpg" alt="cms-banner-3.jpg" width="350" height="285" /> </a>
                                 <div class="cms-block">
                                    <div class="offer-text1">Accessories</div>
                                    <div class="offer-button"><a href="#">shop Now</a></div>
                                 </div>
                              </div>
                              <div class="cms_content">
                                 <a href="#"> <img class="lazyload" src="modules/cp_cmsbanner1/views/img/cms-banner5.jpg" alt="cms-banner-3.jpg" width="350" height="285" /> </a>
                                 <div class="cms-block">
                                    <div class="offer-text1">Toys</div>
                                    <div class="offer-button"><a href="#">shop Now</a></div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section id="featured-products">
                     <div class="container">
                     <div class="products-section-title">
                        <h2 class="title">Featured Products</h2>
                        <span>In publishing and graphic design, Lorem ipsum is a placeholder text</span>
                     </div>
                     <div id="spe_res">
                     <div class="products">
                     <!-- Define Number of product for SLIDER -->
                     <div id="feature-carousel" class="cp-carousel product_list">

                         <?php
                          $getProducts = $getFromU->selectFeaturedProducts();
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
                              <!--ul class="product-flags js-product-flags">
                                 <li class="product-flag discount">-20%</li>
                                 <li class="product-flag new">New</li>
                              </ul>
                              <div class="product-actions-main">
                                 <form action="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/cart" method="post" class="add-to-cart-or-refresh">
                                    <input type="hidden" name="token" value="d0fa0a5af269cfb80db3930b891e232d">
                                    <input type="hidden" name="id_product" value="1" class="product_page_product_id">
                                    <input type="hidden" name="id_customization" value="0" class="product_customization_id">
                                    <a class="quick-view btn btn-primary" href="#" data-link-action="quickview" data-toggle="tooltip" title="Quickview">
                                    </a>
                                    <div class="wishlist">
                                       <a class="st-wishlist-button btn-product btn" href="#" data-id-wishlist="" data-id-product="1" data-id-product-attribute="40" title="Add to Wishlist">
                                       <span class="st-wishlist-bt-content">
                                       <i class="fa fa-heart" aria-hidden="true"></i>               
                                       <span class="st-wishlist-title">Add to Wishlist</span>
                                       </span>
                                       </a>
                                    </div>
                                    <div class="compare">
                                       <a class="st-compare-button btn-product btn" href="#" data-id-product="1" title="Add to Compare">
                                       <span class="st-compare-bt-content">
                                       <i class="fa fa-area-chart"></i>           
                                       <span class="st-compare-title">Add to Compare</span>
                                       </span>
                                       </a>
                                    </div>
                                 </form>
                              </div>--->
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
                              <!---div class="add-to-cart-button">
                                 <form action="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/cart" method="post" class="add-to-cart-or-refresh">
                                    <input type="hidden" name="token" value="d0fa0a5af269cfb80db3930b891e232d">
                                    <input type="hidden" name="id_product" value="1" class="product_page_product_id">
                                    <input type="hidden" name="id_customization" value="0" class="product_customization_id">  
                                    <button class="btn btn-primary add-to-cart" data-button-action="add-to-cart" type="submit"  data-toggle="tooltip"  title="Add to cart" >
                                    add to cart
                                    </button>
                                 </form>
                              </div>--->
                           </div>
                        </article>
                     </article>
                  <?php } } ?>





                     

                     
                     
                     
                     </div>
                     <div class="customNavigation">
                     <i class="btn prev feature_prev">&nbsp;</i>
                     <i class="btn next feature_next">&nbsp;</i>
                     </div>
                     </div>
                     </div>
                     </div>
                  </section>
                  <section id="cpserviceblock">
                     <div class="container">
                        <div class="service-cms-banner-list service-1">
                           <div class="service_block_inner">
                              <div class="service_image"></div>
                              <div class="service_content">
                                 <div class="service_title1">Easy free delivery</div>
                                 <div class="service_title2">On all items free shipping order on $100*</div>
                              </div>
                           </div>
                        </div>
                        <div class="service-cms-banner-list service-2">
                           <div class="service_block_inner">
                              <div class="service_image"></div>
                              <div class="service_content">
                                 <div class="service_title1">Premium warranty</div>
                                 <div class="service_title2">Protection plan can be worth the investment</div>
                              </div>
                           </div>
                        </div>
                        <div class="service-cms-banner-list service-3">
                           <div class="service_block_inner">
                              <div class="service_image"></div>
                              <div class="service_content">
                                 <div class="service_title1">Easy free return</div>
                                 <div class="service_title2">Create your own return and refund policy</div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </section>
                  <section class="bestseller-products">
                     <div class="container">
                     <div class="products-section-title">
                        <h2 class="title">Bestseller Products</h2>
                        <span>In publishing and graphic design, Lorem ipsum is a placeholder text</span>
                     </div>
                     <div id="spe_res">
                     <div class="products">
                     <!-- Define Number of product for SLIDER -->       
                     <div class="customNavigation">
                        <i class="btn prev bestseller_prev">&nbsp;</i>
                        <i class="btn next bestseller_next">&nbsp;</i>
                     </div>




                     <div id="bestseller-carousel" class="cp-carousel product_list">

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
                              <!--ul class="product-flags js-product-flags">
                                 <li class="product-flag discount">-20%</li>
                                 <li class="product-flag new">New</li>
                              </ul>
                              <div class="product-actions-main">
                                 <form action="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/cart" method="post" class="add-to-cart-or-refresh">
                                    <input type="hidden" name="token" value="d0fa0a5af269cfb80db3930b891e232d">
                                    <input type="hidden" name="id_product" value="1" class="product_page_product_id">
                                    <input type="hidden" name="id_customization" value="0" class="product_customization_id">
                                    <a class="quick-view btn btn-primary" href="#" data-link-action="quickview" data-toggle="tooltip" title="Quickview">
                                    </a>
                                    <div class="wishlist">
                                       <a class="st-wishlist-button btn-product btn" href="#" data-id-wishlist="" data-id-product="1" data-id-product-attribute="40" title="Add to Wishlist">
                                       <span class="st-wishlist-bt-content">
                                       <i class="fa fa-heart" aria-hidden="true"></i>               
                                       <span class="st-wishlist-title">Add to Wishlist</span>
                                       </span>
                                       </a>
                                    </div>
                                    <div class="compare">
                                       <a class="st-compare-button btn-product btn" href="#" data-id-product="1" title="Add to Compare">
                                       <span class="st-compare-bt-content">
                                       <i class="fa fa-area-chart"></i>           
                                       <span class="st-compare-title">Add to Compare</span>
                                       </span>
                                       </a>
                                    </div>
                                 </form>
                              </div>--->
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
                              <!---div class="add-to-cart-button">
                                 <form action="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/cart" method="post" class="add-to-cart-or-refresh">
                                    <input type="hidden" name="token" value="d0fa0a5af269cfb80db3930b891e232d">
                                    <input type="hidden" name="id_product" value="1" class="product_page_product_id">
                                    <input type="hidden" name="id_customization" value="0" class="product_customization_id">  
                                    <button class="btn btn-primary add-to-cart" data-button-action="add-to-cart" type="submit"  data-toggle="tooltip"  title="Add to cart" >
                                    add to cart
                                    </button>
                                 </form>
                              </div>--->
                           </div>
                        </article>
                     </article>
                  <?php } } ?>
                     






                     </div> 
                     </div>
                     </div>
                     </div>
                  </section>
                  <section class="testimonial-block-part">
                  <div class="container">
                  <div id="spe_res">
                  <div id="cptestimonial" class="cp-carousel product_list">
                  <article class="slide cptestimonial-container">
                  <div class="cptestimonial-container-inner">
                  <div class="testimonial-banner-description">
                  <span class="review-img"></span>
                  <p>“I’m never stressing over acquiring any home fixtures, decor items and hardware items manufactured 
locally or even from the international market, Kenadd made everything easy you can access a wide 
variety of décor items from their website and have them delivered to wherever you want. So far I’m 
loving the kitchen hood shipped in recently to me by them.”</p>
                  </div>
                  <a class="testimonial-img" href="#" title="Grace Omondi">
                  <img class="lazyload" data-src="" alt="Grace Omondi" title="Grace Omondi" width="47" height="47"/>                
                  </a>
                  <span class="testi-title">Grace Omondi</span>    
                  </div>  
                  </article>
                  <article class="slide cptestimonial-container">
                  <div class="cptestimonial-container-inner">
                  <div class="testimonial-banner-description">
                  <span class="review-img"></span>
                  <p>“I’m a plumber and I will be honest enough to credit some of the beautiful work I have done out there to 
Kenadd, they are my number one source of beautiful faucets, showers, sinks and toilet bowls, even 
when I’m out of ideas Kenadd will always have something exceptional every time I visit their website.”</p>
                  </div>
                  <a class="testimonial-img" href="#" title="Joe plumber smart">
                  <img class="lazyload" data-src="" alt="Joe plumber smart" title="Joe plumber smart" width="47" height="47"/>                
                  </a>
                  <span class="testi-title">Joe plumber smart</span>    
                  </div>  
                  </article>
                  <article class="slide cptestimonial-container">
                  <div class="cptestimonial-container-inner">
                  <div class="testimonial-banner-description">
                  <span class="review-img"></span>
                  <p>“As an interior designer, Kenadd became a great tool the moment I discovered them. Apart from items 
they have listed, they have helped me acquire tailored décor fixtures inspired by client’s needs that I
have not managed to find from local suppliers here in Kenya, for the designers who have not discovered 
the secret, you have it today.”</p>
                  </div>
                  <a class="testimonial-img" href="#" title="Kennedy Mijungu">
                  <img class="lazyload" data-src="" alt="Kennedy Mijungu" title="Kennedy Mijungu" width="47" height="47"/>                
                  </a>
                  <span class="testi-title">Kennedy Mijungu</span>    
                  </div>  
                  </article>
                  
                  <article class="slide cptestimonial-container">
                  <div class="cptestimonial-container-inner">
                  <div class="testimonial-banner-description">
                  <span class="review-img"></span>
                  <p>“No lies, at first I thought they were a bunch of scammers, so much is said about online based 
businesses we all know that, well I have a beautiful led mirror in my bathroom courtesy of Kenadd, I
recommend their products with no doubt.”</p>
                  </div>
                  <a class="testimonial-img" href="#" title="Grace Omondi">
                  <img class="lazyload" data-src="" alt="Grace Omondi" title="Grace Omondi" width="47" height="47"/>                
                  </a>
                  <span class="testi-title">Grace Omondi</span>    
                  </div>  
                  </article>
                  
                  <article class="slide cptestimonial-container">
                  <div class="cptestimonial-container-inner">
                  <div class="testimonial-banner-description">
                  <span class="review-img"></span>
                  <p>“I love their transparency, I ordered some dining furniture set listed on their website but unfortunately 
at the moment it was out of stock, they gave me a restock lead time and enrolled me on a preorder 
notification, my dinner set arrived exactly at the agreed time.”</p>
                  </div>
                  <a class="testimonial-img" href="#" title="Fred Rabai">
                  <img class="lazyload" data-src="" alt="Fred Rabai" title="Fred Rabai" width="47" height="47"/>                
                  </a>
                  <span class="testi-title">Fred Rabai</span>    
                  </div>  
                  </article>

                  </div>
                  <div class="customNavigation">
                  <i class="btn prev cptesti_prev">&nbsp;</i>
                  <i class="btn next cptesti_next">&nbsp;</i>
                  </div>
                  </div>
                  </div>    
                  </section>  
                  <section class="special-products">
                  <div class=" special_container container">
                  <div class="products-section-title">
                  <h2 class="title">Deals of the week</h2>
                  <span>In publishing and graphic design, Lorem ipsum is a placeholder text</span>
                  </div>
                  <div class="special_inner">         
                  <div id="spe_res">
                  <div class="products">
                  <!-- Define Number of product for SLIDER -->
                  <div class="product-carousel">   
                  <div id="special-carousel" class="cp-carousel product_list">        
                  <article class="item">    
                  <div class="product-miniature1 js-product-miniature" data-id-product="22" data-id-product-attribute="126" itemscope itemtype="http://schema.org/Product">
                  <div class="thumbnail-container col-sm-12 col-md-5">
                  <div class="special_block">
                  <div class="image-block">
                  <a href="beds-mattresses/22-126-hummingbird-printed-t-shirt.html#/1-size-s/19-dimension-40x60cm/29-modern_color-camel" class="thumbnail product-thumbnail">
                  <img
                     class="img-fluid lazyload"
                     data-src="../64-medium_default/hummingbird-printed-t-shirt.jpg"
                     src="themes/PRS02048/assets/img/megnor/home_default_loading.gif"               
                     height="230"               
                     width="205"
                     alt="Echasse Smoke Brushed Brass Frame Glass Vase"
                     loading="lazy"
                     data-full-size-image-url="../64-large_default/hummingbird-printed-t-shirt.jpg"
                     />
                  <img class="replace-2x img_1 img-responsive lazyload" data-src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/65-home_default/hummingbird-printed-t-shirt.jpg" data-full-size-image-url="https://prestashop.coderplace.com/PRS02/PRS02048/demo/65-large_default/hummingbird-printed-t-shirt.jpg" alt="" />
                  </a>
                  </div>
                  <ul class="product-flags js-product-flags">
                  <li class="product-flag discount">-15%</li>
                  <li class="product-flag new">New</li>
                  </ul>
                  <div class="highlighted-informations hidden-sm-down">
                  <div class="variant-links">
                  <a href="beds-mattresses/24-204-hummingbird-printed-t-shirt.html#/1-size-s/19-dimension-40x60cm/34-vase_color-grey"
                        class="texture color"
                        title="Grey"
                        aria-label="Grey"
                        style="background-image: url(../img/co/34.jpg)" 
                        ></a>
                     <a href="beds-mattresses/24-216-hummingbird-printed-t-shirt.html#/1-size-s/19-dimension-40x60cm/35-vase_color-green"
                        class="texture color"
                        title="Green"
                        aria-label="Green"
                        style="background-image: url(../img/co/35.jpg)" 
                        ></a>
                     <a href="beds-mattresses/24-228-hummingbird-printed-t-shirt.html#/2-size-m/19-dimension-40x60cm/36-vase_color-coffee"
                        class="texture color"
                        title="Coffee"
                        aria-label="Coffee"
                        style="background-image: url(../img/co/36.jpg)" 
                        ></a>
                  <span class="js-count count"></span>
                  </div>
                  </div>
                  </div>
                  <div class="product-description col-sm-12 col-md-7">         
                  <span class="h3 product-title" itemprop="name"><a href="beds-mattresses/22-126-hummingbird-printed-t-shirt.html#/1-size-s/19-dimension-40x60cm/29-modern_color-camel" title="Armen Living Panda Dining Chair with Wood Finish">Armen Living Panda Dining Chair with Wood Finish</a></span>
                  <div class="comments_note">
                  <div class="star_content clearfix">
                  <div class="star star_on"></div>
                  <div class="star "></div>
                  <div class="star "></div>
                  <div class="star "></div>
                  <div class="star "></div>
                  </div>
                  </div>
                  <div class="product-price-and-shipping">
                  <span itemprop="price" class="price">$433.50</span>
                  <span class="sr-only">Regular price</span>
                  <span class="regular-price">$510.00</span>
                  </div>
                  <div class="qtyprogress">
                  <span class="QuantityAvailable">Available:</span>
                  <span class="quantity">69</span>
                  <div class="progress">
                  <div class="progress-bar" aria-label="qty-progress" role="progressbar"></div>
                  </div>
                  </div>
                  <div class="countdown show" data-Date="2025-06-24 00:00:00">
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
                  </div>
                  </div>
                  </div>
                  </article>
                  <article class="item">    
                  <div class="product-miniature1 js-product-miniature" data-id-product="24" data-id-product-attribute="204" itemscope itemtype="http://schema.org/Product">
                  <div class="thumbnail-container col-sm-12 col-md-5">
                  <div class="special_block">
                  <div class="image-block">
                  <a href="beds-mattresses/24-204-hummingbird-printed-t-shirt.html#/1-size-s/19-dimension-40x60cm/34-vase_color-grey" class="thumbnail product-thumbnail">
                  <img
                     class="img-fluid lazyload"
                     data-src="../64-medium_default/hummingbird-printed-t-shirt.jpg"
                     src="themes/PRS02048/assets/img/megnor/home_default_loading.gif"               
                     height="230"               
                     width="205"
                     alt="Echasse Smoke Brushed Brass Frame Glass Vase"
                     loading="lazy"
                     data-full-size-image-url="../64-large_default/hummingbird-printed-t-shirt.jpg"
                     />
                  <img class="replace-2x img_1 img-responsive lazyload" data-src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/65-home_default/hummingbird-printed-t-shirt.jpg" data-full-size-image-url="https://prestashop.coderplace.com/PRS02/PRS02048/demo/65-large_default/hummingbird-printed-t-shirt.jpg" alt="" />
                  </a>
                  </div>
                  <ul class="product-flags js-product-flags">
                  <li class="product-flag discount">-10%</li>
                  <li class="product-flag new">New</li>
                  </ul>
                  <div class="highlighted-informations hidden-sm-down">
                  <div class="variant-links">
                  <a href="beds-mattresses/24-204-hummingbird-printed-t-shirt.html#/1-size-s/19-dimension-40x60cm/34-vase_color-grey"
                     class="texture color"
                     title="Grey"
                     aria-label="Grey"
                     style="background-image: url(../img/co/34.jpg)" 
                     ></a>
                  <a href="beds-mattresses/24-216-hummingbird-printed-t-shirt.html#/1-size-s/19-dimension-40x60cm/35-vase_color-green"
                     class="texture color"
                     title="Green"
                     aria-label="Green"
                     style="background-image: url(../img/co/35.jpg)" 
                     ></a>
                  <a href="beds-mattresses/24-228-hummingbird-printed-t-shirt.html#/2-size-m/19-dimension-40x60cm/36-vase_color-coffee"
                     class="texture color"
                     title="Coffee"
                     aria-label="Coffee"
                     style="background-image: url(../img/co/36.jpg)" 
                     ></a>
                  <span class="js-count count"></span>
                  </div>
                  </div>
                  </div>
                  <div class="product-description col-sm-12 col-md-7">         
                  <span class="h3 product-title" itemprop="name"><a href="beds-mattresses/24-204-hummingbird-printed-t-shirt.html#/1-size-s/19-dimension-40x60cm/34-vase_color-grey" title="Echasse Smoke Brushed Brass Frame Glass Vase">Echasse Smoke Brushed Brass Frame Glass Vase</a></span>
                  <div class="comments_note">
                  <div class="star_content clearfix">
                  <div class="star star_on"></div>
                  <div class="star star_on"></div>
                  <div class="star star_on"></div>
                  <div class="star star_on"></div>
                  <div class="star "></div>
                  </div>
                  </div>
                  <div class="product-price-and-shipping">
                  <span itemprop="price" class="price">$198.00</span>
                  <span class="sr-only">Regular price</span>
                  <span class="regular-price">$220.00</span>
                  </div>
                  <div class="qtyprogress">
                  <span class="QuantityAvailable">Available:</span>
                  <span class="quantity">49</span>
                  <div class="progress">
                  <div class="progress-bar" aria-label="qty-progress" role="progressbar"></div>
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
                  </div>
                  </div>
                  </div>
                  </article>
                  <article class="item">    
                  <div class="product-miniature1 js-product-miniature" data-id-product="1" data-id-product-attribute="40" itemscope itemtype="http://schema.org/Product">
                  <div class="thumbnail-container col-sm-12 col-md-5">
                  <div class="special_block">
                  <div class="image-block">
                  <a href="beds-mattresses/1-40-hummingbird-printed-t-shirt.html#/1-size-s/19-dimension-40x60cm/26-chair_color-grey" class="thumbnail product-thumbnail">
                  <img
                     class="img-fluid lazyload"
                     data-src="../64-medium_default/hummingbird-printed-t-shirt.jpg"
                     src="themes/PRS02048/assets/img/megnor/home_default_loading.gif"               
                     height="230"               
                     width="205"
                     alt="Echasse Smoke Brushed Brass Frame Glass Vase"
                     loading="lazy"
                     data-full-size-image-url="../64-large_default/hummingbird-printed-t-shirt.jpg"
                     />
                  <img class="replace-2x img_1 img-responsive lazyload" data-src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/65-home_default/hummingbird-printed-t-shirt.jpg" data-full-size-image-url="https://prestashop.coderplace.com/PRS02/PRS02048/demo/65-large_default/hummingbird-printed-t-shirt.jpg" alt="" />
                  </a>
                  </div>
                  <ul class="product-flags js-product-flags">
                  <li class="product-flag discount">-20%</li>
                  <li class="product-flag new">New</li>
                  </ul>
                  <div class="highlighted-informations hidden-sm-down">
                  <div class="variant-links">
                  <a href="beds-mattresses/24-204-hummingbird-printed-t-shirt.html#/1-size-s/19-dimension-40x60cm/34-vase_color-grey"
                        class="texture color"
                        title="Grey"
                        aria-label="Grey"
                        style="background-image: url(../img/co/34.jpg)" 
                        ></a>
                     <a href="beds-mattresses/24-216-hummingbird-printed-t-shirt.html#/1-size-s/19-dimension-40x60cm/35-vase_color-green"
                        class="texture color"
                        title="Green"
                        aria-label="Green"
                        style="background-image: url(../img/co/35.jpg)" 
                        ></a>
                     <a href="beds-mattresses/24-228-hummingbird-printed-t-shirt.html#/2-size-m/19-dimension-40x60cm/36-vase_color-coffee"
                        class="texture color"
                        title="Coffee"
                        aria-label="Coffee"
                        style="background-image: url(../img/co/36.jpg)" 
                        ></a>
                  <span class="js-count count"></span>
                  </div>
                  </div>
                  </div>
                  <div class="product-description col-sm-12 col-md-7">         
                  <span class="h3 product-title" itemprop="name"><a href="beds-mattresses/1-40-hummingbird-printed-t-shirt.html#/1-size-s/19-dimension-40x60cm/26-chair_color-grey" title="Mid Century Modern Side Chair with Wood Legs">Mid Century Modern Side Chair with Wood Legs</a></span>
                  <div class="comments_note">
                  <div class="star_content clearfix">
                  <div class="star star_on"></div>
                  <div class="star star_on"></div>
                  <div class="star star_on"></div>
                  <div class="star "></div>
                  <div class="star "></div>
                  </div>
                  </div>
                  <div class="product-price-and-shipping">
                  <span itemprop="price" class="price">$127.20</span>
                  <span class="sr-only">Regular price</span>
                  <span class="regular-price">$159.00</span>
                  </div>
                  <div class="qtyprogress">
                  <span class="QuantityAvailable">Available:</span>
                  <span class="quantity">60</span>
                  <div class="progress">
                  <div class="progress-bar" aria-label="qty-progress" role="progressbar"></div>
                  </div>
                  </div>
                  <div class="countdown show" data-Date="2029-07-27 00:00:00">
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
                  </div>
                  </div>
                  </div>
                  </article>
                  <article class="item">    
                  <div class="product-miniature1 js-product-miniature" data-id-product="26" data-id-product-attribute="240" itemscope itemtype="http://schema.org/Product">
                  <div class="thumbnail-container col-sm-12 col-md-5">
                  <div class="special_block">
                  <div class="image-block">
                  <a href="beds-mattresses/26-240-hummingbird-printed-t-shirt.html#/5-color-grey/19-dimension-40x60cm/22-paper_type-ruled" class="thumbnail product-thumbnail">
                  <img
                     class="img-fluid lazyload"
                     data-src="../64-medium_default/hummingbird-printed-t-shirt.jpg"
                     src="themes/PRS02048/assets/img/megnor/home_default_loading.gif"               
                     height="230"               
                     width="205"
                     alt="Echasse Smoke Brushed Brass Frame Glass Vase"
                     loading="lazy"
                     data-full-size-image-url="../64-large_default/hummingbird-printed-t-shirt.jpg"
                     />
                  <img class="replace-2x img_1 img-responsive lazyload" data-src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/65-home_default/hummingbird-printed-t-shirt.jpg" data-full-size-image-url="https://prestashop.coderplace.com/PRS02/PRS02048/demo/65-large_default/hummingbird-printed-t-shirt.jpg" alt="" />
                  </a>
                  </div>
                  <ul class="product-flags js-product-flags">
                  <li class="product-flag discount">-15%</li>
                  <li class="product-flag new">New</li>
                  </ul>
                  <div class="highlighted-informations hidden-sm-down">
                  <div class="variant-links">
                  <a href="beds-mattresses/24-204-hummingbird-printed-t-shirt.html#/1-size-s/19-dimension-40x60cm/34-vase_color-grey"
                        class="texture color"
                        title="Grey"
                        aria-label="Grey"
                        style="background-image: url(../img/co/34.jpg)" 
                        ></a>
                     <a href="beds-mattresses/24-216-hummingbird-printed-t-shirt.html#/1-size-s/19-dimension-40x60cm/35-vase_color-green"
                        class="texture color"
                        title="Green"
                        aria-label="Green"
                        style="background-image: url(../img/co/35.jpg)" 
                        ></a>
                     <a href="beds-mattresses/24-228-hummingbird-printed-t-shirt.html#/2-size-m/19-dimension-40x60cm/36-vase_color-coffee"
                        class="texture color"
                        title="Coffee"
                        aria-label="Coffee"
                        style="background-image: url(../img/co/36.jpg)" 
                        ></a>
                  <span class="js-count count"></span>
                  </div>
                  </div>
                  </div>
                  <div class="product-description col-sm-12 col-md-7">         
                  <span class="h3 product-title" itemprop="name"><a href="beds-mattresses/26-240-hummingbird-printed-t-shirt.html#/5-color-grey/19-dimension-40x60cm/22-paper_type-ruled" title="Bottle grinder mill set of 2 spice with solid handle">Bottle grinder mill set of 2 spice with solid handle</a></span>
                  <div class="comments_note">
                  <div class="star_content clearfix">
                  <div class="star star_on"></div>
                  <div class="star star_on"></div>
                  <div class="star "></div>
                  <div class="star "></div>
                  <div class="star "></div>
                  </div>
                  </div>
                  <div class="product-price-and-shipping">
                  <span itemprop="price" class="price">$75.65</span>
                  <span class="sr-only">Regular price</span>
                  <span class="regular-price">$89.00</span>
                  </div>
                  <div class="qtyprogress">
                  <span class="QuantityAvailable">Available:</span>
                  <span class="quantity">59</span>
                  <div class="progress">
                  <div class="progress-bar" aria-label="qty-progress" role="progressbar"></div>
                  </div>
                  </div>
                  <div class="countdown show" data-Date="2024-03-13 00:00:00">
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
                  </div>
                  </div>
                  </div>
                  </article>
                  </div>
                  </div>
                  </div>
                  </div>
                  </div>
                  <div class="customNavigation">
                  <i class="btn prev special_prev"></i>
                  <i class="btn next special_next"></i>
                  </div>
                  </div>
                  </section>


                  <section id="cpcmsbanner2">
                  <div class="container">    
                  <div id="cpcmsbanner2_block1">
                  
                  <div class="left-side main-content">
                  <div class="cms_content"><a href="#"><img class="lazyload" src="modules/cp_cmsbanner2/views/img/cms-banner1.jpg" alt="cms-banner-1.jpg" width="690" height="250" /> </a>
                  <div class="cms-block">
                  <div class="offer-text1">There are many</div>
                  <div class="offer-text2">Modern Chair <br />Classic Design</div>
                  <div class="offer-button"><a href="#">shop Now</a></div>
                  </div>
                  </div>
                  </div>


                  <div class="right-side main-content dis_none">
                  <div class="cms_content"><a href="#"> <img class="lazyload" src="modules/cp_cmsbanner2/views/img/cms-banner2.jpg" alt="cms-banner-2.jpg" width="690" height="250" /> </a>
                  <div class="cms-block">
                  <div class="offer-text1">Today offer only</div>
                  <div class="offer-text2">Modern Wooden <br />Pendant Lamp</div>
                  <div class="offer-button"><a href="#">shop Now</a></div>
                  </div>
                  </div>
                  </div>


                  </div>    
                  </div>
                  </section>


                  <section class="homepage-latest-blog">
                  <div class="container">
                  <div class="block ets_block_latest ets_blog_ltr_mode page_home ets_block_slider">
                  <div class="products-section-title">
                  <h2 class="title title_blog title_block">Get Latest Update &amp; News</h2>
                  <span>Get Latest Update &amp; News</span>
                  </div>
                  <div class="block_content row">
                  <ul class="owl-rtl owl-carousel">
                  <li class="col-xs-12 col-sm-4 col-lg-3"> 
                  <div class="blog-item">
                  <a class="ets_item_img" href="blog/post/6-morbi-condimentum-molestie-nam-enim-odio-sodales.html">
                  <img class="lazyload" data-src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/img/ets_blog/post/06.jpg" src="themes/PRS02048/assets/img/megnor/home_default_loading.gif" alt="Morbi condimentum molestie Nam enim odio sodales" title="Morbi condimentum molestie Nam enim odio sodales" />
                  </a>
                  <div class="ets-blog-latest-post-content">
                  <div class="ets-blog-sidear-post-meta">
                  <span class="post-date">
                  <span>
                  <time class="date" datetime="2023">
                  May <!-- month-->
                  9, <!-- day of month -->
                  2023    <!-- year -->
                  </time>
                  </span>
                  </span>
                  </div>
                  <a class="h3 ets_title_block" href="blog/post/6-morbi-condimentum-molestie-nam-enim-odio-sodales.html">Morbi condimentum molestie Nam enim odio sodales</a>
                  <a class="read_more" href="blog/post/6-morbi-condimentum-molestie-nam-enim-odio-sodales.html">Read more</a>
                  </div>
                  </div>
                  </li>
                  <li class="col-xs-12 col-sm-4 col-lg-3"> 
                  <div class="blog-item">
                  <a class="ets_item_img" href="blog/post/5-nemo-enim-ipsam-voluptatem-quia-voluptas-sit-aspernatur-aut.html">
                  <img class="lazyload" data-src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/img/ets_blog/post/05.jpg" src="themes/PRS02048/assets/img/megnor/home_default_loading.gif" alt="Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut" title="Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut" />
                  </a>
                  <div class="ets-blog-latest-post-content">
                  <div class="ets-blog-sidear-post-meta">
                  <span class="post-date">
                  <span>
                  <time class="date" datetime="2023">
                  May <!-- month-->
                  9, <!-- day of month -->
                  2023    <!-- year -->
                  </time>
                  </span>
                  </span>
                  </div>
                  <a class="h3 ets_title_block" href="blog/post/5-nemo-enim-ipsam-voluptatem-quia-voluptas-sit-aspernatur-aut.html">Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut</a>
                  <a class="read_more" href="blog/post/5-nemo-enim-ipsam-voluptatem-quia-voluptas-sit-aspernatur-aut.html">Read more</a>
                  </div>
                  </div>
                  </li>
                  <li class="col-xs-12 col-sm-4 col-lg-3"> 
                  <div class="blog-item">
                  <a class="ets_item_img" href="blog/post/4-urna-pretium-elit-mauris-cursus-curabitur-at-elit-vestibulum.html">
                  <img class="lazyload" data-src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/img/ets_blog/post/04.jpg" src="themes/PRS02048/assets/img/megnor/home_default_loading.gif" alt="Urna pretium elit mauris cursus Curabitur at elit Vestibulum" title="Urna pretium elit mauris cursus Curabitur at elit Vestibulum" />
                  </a>
                  <div class="ets-blog-latest-post-content">
                  <div class="ets-blog-sidear-post-meta">
                  <span class="post-date">
                  <span>
                  <time class="date" datetime="2023">
                  May <!-- month-->
                  9, <!-- day of month -->
                  2023    <!-- year -->
                  </time>
                  </span>
                  </span>
                  </div>
                  <a class="h3 ets_title_block" href="blog/post/4-urna-pretium-elit-mauris-cursus-curabitur-at-elit-vestibulum.html">Urna pretium elit mauris cursus Curabitur at elit Vestibulum</a>
                  <a class="read_more" href="blog/post/4-urna-pretium-elit-mauris-cursus-curabitur-at-elit-vestibulum.html">Read more</a>
                  </div>
                  </div>
                  </li>
                  <li class="col-xs-12 col-sm-4 col-lg-3"> 
                  <div class="blog-item">
                  <a class="ets_item_img" href="blog/post/3-ipsum-cursus-vestibulum-at-interdum-vivamus.html">
                  <img class="lazyload" data-src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/img/ets_blog/post/03.jpg" src="themes/PRS02048/assets/img/megnor/home_default_loading.gif" alt="Ipsum cursus vestibulum at interdum Vivamus" title="Ipsum cursus vestibulum at interdum Vivamus" />
                  </a>
                  <div class="ets-blog-latest-post-content">
                  <div class="ets-blog-sidear-post-meta">
                  <span class="post-date">
                  <span>
                  <time class="date" datetime="2023">
                  May <!-- month-->
                  9, <!-- day of month -->
                  2023    <!-- year -->
                  </time>
                  </span>
                  </span>
                  </div>
                  <a class="h3 ets_title_block" href="blog/post/3-ipsum-cursus-vestibulum-at-interdum-vivamus.html">Ipsum cursus vestibulum at interdum Vivamus</a>
                  <a class="read_more" href="blog/post/3-ipsum-cursus-vestibulum-at-interdum-vivamus.html">Read more</a>
                  </div>
                  </div>
                  </li>
                  <li class="col-xs-12 col-sm-4 col-lg-3"> 
                  <div class="blog-item">
                  <a class="ets_item_img" href="blog/post/2-turpis-at-eleifend-ps-mi-elit-aenean-porta-ac-sed-faucibus.html">
                  <img class="lazyload" data-src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/img/ets_blog/post/02.jpg" src="themes/PRS02048/assets/img/megnor/home_default_loading.gif" alt="Turpis at eleifend ps mi elit Aenean porta ac sed faucibus" title="Turpis at eleifend ps mi elit Aenean porta ac sed faucibus" />
                  </a>
                  <div class="ets-blog-latest-post-content">
                  <div class="ets-blog-sidear-post-meta">
                  <span class="post-date">
                  <span>
                  <time class="date" datetime="2023">
                  May <!-- month-->
                  9, <!-- day of month -->
                  2023    <!-- year -->
                  </time>
                  </span>
                  </span>
                  </div>
                  <a class="h3 ets_title_block" href="blog/post/2-turpis-at-eleifend-ps-mi-elit-aenean-porta-ac-sed-faucibus.html">Turpis at eleifend ps mi elit Aenean porta ac sed faucibus</a>
                  <a class="read_more" href="blog/post/2-turpis-at-eleifend-ps-mi-elit-aenean-porta-ac-sed-faucibus.html">Read more</a>
                  </div>
                  </div>
                  </li>
                  <li class="col-xs-12 col-sm-4 col-lg-3"> 
                  <div class="blog-item">
                  <a class="ets_item_img" href="blog/post/1-at-risus-pretium-urna-tortor-metus-fringilla.html">
                  <img class="lazyload" data-src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/img/ets_blog/post/01.jpg" src="themes/PRS02048/assets/img/megnor/home_default_loading.gif" alt="At risus pretium urna tortor metus fringilla" title="At risus pretium urna tortor metus fringilla" />
                  </a>
                  <div class="ets-blog-latest-post-content">
                  <div class="ets-blog-sidear-post-meta">
                  <span class="post-date">
                  <span>
                  <time class="date" datetime="2023">
                  May <!-- month-->
                  9, <!-- day of month -->
                  2023    <!-- year -->
                  </time>
                  </span>
                  </span>
                  </div>
                  <a class="h3 ets_title_block" href="blog/post/1-at-risus-pretium-urna-tortor-metus-fringilla.html">At risus pretium urna tortor metus fringilla</a>
                  <a class="read_more" href="blog/post/1-at-risus-pretium-urna-tortor-metus-fringilla.html">Read more</a>
                  </div>
                  </div>
                  </li>
                  </ul>
                  </div>
                  <div class="clear"></div>
                  </div>
                  </div>
                  </section>
                  <section class="brands">
                  <div class="container">
                  <div class="products">
                  <!-- Define Number of product for SLIDER -->
                  <div class="customNavigation">
                  <i class="btn prev brand_prev">&nbsp;</i>
                  <i class="btn next brand_next">&nbsp;</i>
                  </div>
                  <div id="brand-carousel" class="cp-carousel product_list">
                  <article class="item">
                  <div class="brand-image">
                  <a href="brand/7-dots-tech.html" title="DOTS Tech">
                  <img class="lazyload" data-src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/img/m/7.jpg" alt="DOTS Tech" />
                  </a>
                  </div>
                  </article>
                  <article class="item">
                  <div class="brand-image">
                  <a href="brand/6-george.html" title="George">
                  <img class="lazyload" data-src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/img/m/6.jpg" alt="George" />
                  </a>
                  </div>
                  </article>
                  <article class="item">
                  <div class="brand-image">
                  <a href="brand/4-minimal.html" title="Minimal">
                  <img class="lazyload" data-src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/img/m/4.jpg" alt="Minimal" />
                  </a>
                  </div>
                  </article>
                  <article class="item">
                  <div class="brand-image">
                  <a href="brand/8-retro-design.html" title="Retro design">
                  <img class="lazyload" data-src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/img/m/8.jpg" alt="Retro design" />
                  </a>
                  </div>
                  </article>
                  <article class="item">
                  <div class="brand-image">
                  <a href="brand/5-the-human.html" title="The Human">
                  <img class="lazyload" data-src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/img/m/5.jpg" alt="The Human" />
                  </a>
                  </div>
                  </article>
                  <article class="item">
                  <div class="brand-image">
                  <a href="brand/3-vintage.html" title="Vintage">
                  <img class="lazyload" data-src="https://prestashop.coderplace.com/PRS02/PRS02048/demo/img/m/3.jpg" alt="Vintage" />
                  </a>
                  </div>
                  </article>
                  </div>
                  </div>
                  </div>
                  </section>
               </section>
               <footer class="page-footer">
               <!-- Footer content -->
               </footer>
            </section>
            </div>
            </div>
            <div class="foote-top">
            </div>
            </div>       
         </section>
         

<div class="newsletter-main" style="">
                              <div class="cp-newsletter-popup-close">
                                 <a class="cp_close" href="javascript:void(0)" onclick="closeDialog(cookies_time)">
                                 <i class="material-icons clear">&#xe14c;</i>
                                 </a>
                              </div>
                              <div class="left-block" style="background:#000 url(../modules/cpcouponpop/views/img/newsletter-banner.jpg);" height="250" width="500">
                                 <div class="clearfix newsletter-content">
                                    <div class="innerbox-newsletter">
                                       <h3 class="newsletter_title">Get 50% Off</h3>
                                       <div class="newsletter-text">
                                          <p>On your first purchase</p>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                              <div class="right-block">
                                 <div class="inner">
                                    <div class="newsletter-form">
                                       <h4 class="block_title ">Subscribe Our Newsletter</h4>
                                       <div class="newsletter-popup-form">
                                          <div class="input-wrapper">
                                             <input class="newsletter-input-email" id="newsletter_input_email" id="" type="text" name="email" size="18" placeholder="Enter your email address..." value="" />
                                             <a onclick="regisNewsletter()" name="submitNewsletter" class="btn btn-default button">Subscribe
                                             <i class="material-icons arrow_forward">&#xe5c8;</i>
                                             </a>
                                          </div>
                                       </div>
                                       <div id="regisNewsletterMessage"></div>
                                       <div class="coupon-side clearfix">
                                          <div class="coupon-wrapper clearfix">
                                             <div id="coupon-element" class="coupon" >
                                                <div class="dashed-border">
                                                   <span id="coupon-text-before"  style="display: block;">
                                                   Your Coupon code shown here</span>
                                                   <span id="coupon-text-after" style="display: none;">Coupon Code: SAVE20</span>
                                                </div>
                                             </div>
                                          </div>
                                       </div>
                                       <div class="newsletter-checkbox">
                                          <div class="checkbox">
                                             <input id="notshow" name="notshow" type="checkbox" value="1">
                                             Do not show this popup again
                                          </div>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>


         <?php include 'includes/footer.php' ?>





      </main>
      <script type="text/javascript" src="themes/PRS02048/assets/cache/bottom-f3c4866.js" ></script>
   </body>
</html>