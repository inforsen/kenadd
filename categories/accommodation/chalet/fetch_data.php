<?php
include('../../../core/init.php');
if(isset($_POST["action"]))
{
$minimum = (isset($_POST['minimum_price']) ? $_POST['minimum_price'] : '');
$maximum = (isset($_POST['maximum_price']) ? $_POST['maximum_price'] : '');
$brand = (isset($_POST['brand']) ? $_POST['brand'] : '');

if ($minimum !='' && $maximum !='') {

  $getProducts = $getFromU->selectchaletAll($minimum, $maximum);
}


if ($brand !='') {
    $brand_filter = implode("','", $brand);
    //print_r($brand_filter);
    $getProducts = $getFromU->viewchaletBrand("products", $brand_filter);
}
if ($getProducts != '') {
              
  foreach ($getProducts as $getProduct) {
      $product_id = $getProduct->product_id;
      $product_title = $getProduct->product_title;
      $product_price = $getProduct->product_price;
      $product_img1 = $getProduct->product_img1;
      $product_img2 = $getProduct->product_img2;
      $product_img3 = $getProduct->product_img3;
      $product_desc = $getProduct->product_desc;
      $product_rrp = $getProduct->rrp;
      $ribbon = $getProduct->ribbon;
      $choice = $getProduct->choice;
      $no_stock = $getProduct->no_stock;
      $product_ratingnum = $getProduct->ratingnum;
      $product_rating = $getProduct->rating;
      $no_stock = $getProduct->no_stock;
      $products_cat = $getProduct->product_category;
      echo '
      <article class="product_item col-xs-12 col-sm-6 col-md-6 col-lg-3">
             <div class="product-miniature js-product-miniature" data-id-product="20" data-id-product-attribute="76">
                <div class="row">
                   <div class="thumbnail-container">
                      <a href="index.php?page=product&product_id='.$product_id.'" class="thumbnail product-thumbnail">
                      <img
                         class="img-fluid lazyload"
                         data-src="images/'.$product_img1.'"
                         src="images/'.$product_img1.'"
                         height="285"
                         width="254"
                         alt="'.$product_title.'"
                         loading="lazy"
                         data-full-size-image-url="images/'.$product_img1.'"
                         />
                      <img class="replace-2x img_1 img-responsive lazyload" data-src="images/'.$product_img2.'" data-full-size-image-url="images/'.$product_img2.'" alt="" />
                      </a>';

                      if ($product_rrp > 0) {
                           $get_product_price = number_format((float)(($product_price/$product_rrp) * 100), 1);
                           $get_product_final_price = 100 - $get_product_price;
                           echo "<li class='product-flag discount'>-".$get_product_final_price."%</li>";
                       }



                       echo'
                      <!---ul class="product-flags js-product-flags">
                         <li class="product-flag discount">-10%</li>
                         <li class="product-flag new">New</li>
                      </ul>
                      <div class="product-actions-main">
                         <form action="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/cart" method="post" class="add-to-cart-or-refresh">
                            <input type="hidden" name="token" value="d0fa0a5af269cfb80db3930b891e232d">
                            <input type="hidden" name="id_product" value="24" class="product_page_product_id">
                            <input type="hidden" name="id_customization" value="0" class="product_customization_id">
                            <a class="quick-view btn btn-primary" href="#" data-link-action="quickview" data-toggle="tooltip" title="Quickview">
                            </a>
                            <div class="compare">
                               <a class="st-compare-button btn-product btn" href="#" data-id-product="24" title="Add to Compare">
                               <span class="st-compare-bt-content">
                               <i class="fa fa-area-chart"></i>           
                               <span class="st-compare-title">Add to Compare</span>
                               </span>
                               </a>
                            </div>
                            <div class="wishlist">
                               <a class="st-wishlist-button btn-product btn" href="#" data-id-wishlist="" data-id-product="24" data-id-product-attribute="204" title="Add to Wishlist">
                               <span class="st-wishlist-bt-content">
                               <i class="fa fa-heart" aria-hidden="true"></i>               
                               <span class="st-wishlist-title">Add to Wishlist</span>
                               </span>
                               </a>
                            </div>
                         </form>
                      </div>--->
                      <div class="highlighted-informations hidden-sm-down">
                         <div class="variant-links">
                            <a href="index.php?page=product&product_id='.$product_id.'""
                               class="texture color"
                               title="Grey"
                               aria-label="Grey"
                               style="background-image: url(images/'.$product_img1.')" 
                               ></a>
                            <a href="index.php?page=product&product_id='.$product_id.'""
                               class="texture color"
                               title="Green"
                               aria-label="Green"
                               style="background-image: url(images/'.$product_img2.')" 
                               ></a>
                            <a href="index.php?page=product&product_id='.$product_id.'""
                               class="texture color"
                               title="Coffee"
                               aria-label="Coffee"
                               style="background-image: url(images/'.$product_img3.')" 
                               ></a>
                            <span class="js-count count"></span>
                         </div>
                      </div>
                   </div>
                   





                   <div class="product-description">
                      <span class="product-brand">'.$products_cat.'</span>         
                      <span class="h3 product-title"><a href="index.php?page=product&product_id='.$product_id.'" content="index.php?page=product&product_id='.$product_id.'">'.$product_title.'</a></span>
                      <div class="product-detail">
                         <p>'.$product_desc.'</p>
                      </div>
                      <!---div class="product-actions-main">
                         <form action="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/cart" method="post" class="add-to-cart-or-refresh">
                            <input type="hidden" name="token" value="d0fa0a5af269cfb80db3930b891e232d">
                            <input type="hidden" name="id_product" value="24" class="product_page_product_id">
                            <input type="hidden" name="id_customization" value="0" class="product_customization_id">
                            <!-- <button class="btn btn-primary view_detail" data-button-action="add-to-cart" type="submit"  data-toggle="tooltip" title="Add to cart">
                               add to cart
                               </button> --
                            <a class="quick-view btn btn-primary" href="#" data-link-action="quickview" data-toggle="tooltip" title="Quickview">
                            </a>
                            <div class="compare">
                               <a class="st-compare-button btn-product btn" href="#" data-id-product="24" title="Add to Compare">
                               <span class="st-compare-bt-content">
                               <i class="fa fa-area-chart"></i>           
                               <span class="st-compare-title">Add to Compare</span>
                               </span>
                               </a>
                            </div>
                            <div class="wishlist">
                               <a class="st-wishlist-button btn-product btn" href="#" data-id-wishlist="" data-id-product="24" data-id-product-attribute="204" title="Add to Wishlist">
                               <span class="st-wishlist-bt-content">
                               <i class="fa fa-heart" aria-hidden="true"></i>               
                               <span class="st-wishlist-title">Add to Wishlist</span>
                               </span>
                               </a>
                            </div>
                         </form>
                      </div>-->
                   </div>
                   



                   <div class="product-bottom">
                      <div class="product-price-and-shipping">
                         <span class="price">KES '.number_format((float)$product_price,2).'</span>
                         <span class="sr-only">Regular price</span>
                         <span class="regular-price">KES '.number_format((float)$product_rrp,2).'</span>
                      </div>




                      <!---div class="add-to-cart-button">
                         <form action="https://prestashop.coderplace.com/PRS02/PRS02048/demo/en/cart" method="post" class="add-to-cart-or-refresh">
                            <input type="hidden" name="token" value="d0fa0a5af269cfb80db3930b891e232d">
                            <input type="hidden" name="id_product" value="24" class="product_page_product_id">
                            <input type="hidden" name="id_customization" value="0" class="product_customization_id">
                            <button class="btn btn-primary add-to-cart" data-button-action="add-to-cart" type="submit"  data-toggle="tooltip"  title="Add to cart" >
                            add to cart
                            </button>
                         </form>
                      </div>--->
                   </div>
                </div>


                
             </div>
          </article>';
        } 
    } else {
        echo "<div class='ajax_container'>";
     echo "<div class='ajax_txt'><p>No product found.</p></div>";
    echo "</div>";
    }

}
?>