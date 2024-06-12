


                  <div id="content-wrapper" class="js-content-wrapper left-column right-column col-sm-4 col-md-6">
                     <section id="main">
                        <div id="js-product-list-header">
                           <div class="block-category card card-block">
                              <h1 class="h1">kitchen hoods</h1>
                              <div class="block-category-inner"></div>
                           </div>
                        </div>
                        <section id="products">
                           <div id="" class="hidden-sm-down">
                              <section id="js-active-search-filters" class="hide">
                                 <p class="h6 hidden-xs-up">Active filters</p>
                              </section>
                           </div>
                           <div id="">
                              <div id="js-product-list-top" class="products-selection">
                                 <div class="col-md-6 hidden-md-down total-products">
                                    <ul class="display hidden-xs grid_list">
                                       <li id="grid"><a href="#" title="Grid">Grid</a></li>
                                       <li id="list"><a href="#" title="List">List</a></li>
                                    </ul>
                                    <?php 
                                      $get_prods = $getFromU->viewkitchenhoodssBrand("products");
                                      $count_prods = count($get_prods);
                                    ?>
                                    <p>There are <?php echo $count_prods; ?> products.</p>
                                 </div>
                                 
                                 
                                 <div class="col-md-6 product_sort">
                                    <span class="col-sm-3 col-md-3 hidden-sm-down sort-by">Sort by:</span>
                                    <div class="col-sm-9 col-xs-8 col-md-9 products-sort-order dropdown">
                                       <button
                                          class="btn-unstyle select-title"
                                          rel="nofollow"
                                          data-toggle="dropdown"
                                          aria-label="Sort by selection"
                                          aria-haspopup="true"
                                          aria-expanded="false">
                                       Relevance    <i class="material-icons pull-xs-right">&#xE5C5;</i>
                                       </button>
                                       <div class="dropdown-menu">
                                          <a
                                             rel="nofollow"
                                             href="2-homee563.html?order=product.sales.desc"
                                             class="select-list js-search-link"
                                             >
                                          Sales, highest to lowest
                                          </a>
                                          <a
                                             rel="nofollow"
                                             href="2-homef917.html?order=product.position.asc"
                                             class="select-list current js-search-link"
                                             >
                                          Relevance
                                          </a>
                                          <a
                                             rel="nofollow"
                                             href="2-homefe2d.html?order=product.name.asc"
                                             class="select-list js-search-link"
                                             >
                                          Name, A to Z
                                          </a>
                                          <a
                                             rel="nofollow"
                                             href="2-home0279.html?order=product.name.desc"
                                             class="select-list js-search-link"
                                             >
                                          Name, Z to A
                                          </a>
                                          <a
                                             rel="nofollow"
                                             href="2-home8eb3.html?order=product.price.asc"
                                             class="select-list js-search-link"
                                             >
                                          Price, low to high
                                          </a>
                                          <a
                                             rel="nofollow"
                                             href="2-home04e6.html?order=product.price.desc"
                                             class="select-list js-search-link"
                                             >
                                          Price, high to low
                                          </a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>





                           <div>
                              <div id="js-product-list">
                                 <div id="spe_res">
                                    <div class="products">
                                       <div class="product_list grid gridcount filter_data">
                                          <!-- removed product_grid-->
                                          
                                       </div>
                                    </div>
                                 </div>
                                 



                                 <!---nav class="pagination row">
                                    <div class="col-md-4">
                                       Showing 1-<?php //echo $count_prods; ?> of <?php //echo $count_prods; ?> item(s)
                                    </div>
                                    <div class="col-md-8">
                                       <ul class="page-list clearfix text-xs-right">
                                          <?php
                                              //$total_pages = $getFromU->countkitchenhoodsBrand("products", $per_page);
                                              //if ($total_pages >=2) {
                                            ?>
                                          <li  class="current <?php// if(isset($_GET['$page']) == 1) { echo 'active';}?>" >
                                             <a
                                                rel="nofollow"
                                                href="index.php?page=kitchenhoods&$page=1"
                                                
                                                >
                                             1
                                             </a>
                                          </li>
                                          <?php
                                             //for ($i = 2; $i < $total_pages; $i++) {
                                            ?>
                                          <li  class="current <?php// if(isset($_GET['$page']) == 1) { echo 'active';}?>" >
                                             <a
                                                rel="nofollow"
                                                href="index.php?page=kitchenhoods&$page=<?php //echo $i; ?>"
                                                
                                                >
                                             <?php// echo $i; ?>
                                             </a>
                                          </li>
                                          <?php //} ?>
                                          <li  class="current <?php //if(isset($_GET['$page']) == $total_pages) { echo 'active';}?>" >
                                             <a
                                                rel="nofollow"
                                                href="index.php?page=kitchenhoods&$page=<?php //echo $total_pages; ?>"
                                                
                                                >
                                             <?php //echo $total_pages; ?>
                                             </a>
                                          </li>
                                          <?php //} ?>
                                       </ul>
                                    </div>
                                 </nav>-->




                              </div>
                           </div>
                           <div id="js-product-list-bottom">
                              <div id="js-product-list-bottom"></div>
                           </div>
                        </section>
                     </section>
                  </div>
