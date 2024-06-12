<?php require_once "includes/item-header.php"; 
echo template_header('Kenadd bathroom');?>





         <section id="wrapper">
            <div class="columns container">
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
                  


                  <?php include 'categories/storage-and-organizers/bathroom/sidebar.php' ?>
                  <?php include 'categories/storage-and-organizers/bathroom/all.php' ?>


                  
               </div>
            </div>
         </section>
         <style>

/* NO BORDER SPINNER */
         .nb-spinner
      {
        text-align:center; 
        background: url('img/image_loading.svg') no-repeat center; 
        height: 150px;
      }
         /*#loading
         {
           text-align:center; 
           background: url('loader.gif') no-repeat center; 
           height: 150px;
         }*/
         </style>
         <script>
           function controlFromInput(fromSlider, fromInput, toInput, controlSlider) {
             const [from, to] = getParsed(fromInput, toInput);
             fillSlider(fromInput, toInput, '#E9E9E9', '#131921', controlSlider);
             if (from > to) {
                 fromSlider.value = to;
                 fromInput.value = to;
             } else {
                 fromSlider.value = from;
             }
         }
             
         function controlToInput(toSlider, fromInput, toInput, controlSlider) {
             const [from, to] = getParsed(fromInput, toInput);
             fillSlider(fromInput, toInput, '#E9E9E9', '#131921', controlSlider);
             setToggleAccessible(toInput);
             if (from <= to) {
                 toSlider.value = to;
                 toInput.value = to;
             } else {
                 toInput.value = from;
             }
         }

         function controlFromSlider(fromSlider, toSlider, fromInput) {
           const [from, to] = getParsed(fromSlider, toSlider);
           fillSlider(fromSlider, toSlider, '#E9E9E9', '#131921', toSlider);
           if (from > to) {
             fromSlider.value = to;
             fromInput.value = to;
           } else {
             fromInput.value = from;
           }
         }

         function controlToSlider(fromSlider, toSlider, toInput) {
           const [from, to] = getParsed(fromSlider, toSlider);
           fillSlider(fromSlider, toSlider, '#E9E9E9', '#131921', toSlider);
           setToggleAccessible(toSlider);
           if (from <= to) {
             toSlider.value = to;
             toInput.value = to;
           } else {
             toInput.value = from;
             toSlider.value = from;
           }
         }

         function getParsed(currentFrom, currentTo) {
           const from = parseInt(currentFrom.value, 10);
           const to = parseInt(currentTo.value, 10);
           return [from, to];
         }

         function fillSlider(from, to, sliderColor, rangeColor, controlSlider) {
             const rangeDistance = to.max-to.min;
             const fromPosition = from.value - to.min;
             const toPosition = to.value - to.min;
             controlSlider.style.background = `linear-gradient(
               to right,
               ${sliderColor} 0%,
               ${sliderColor} ${(fromPosition)/(rangeDistance)*100}%,
               ${rangeColor} ${((fromPosition)/(rangeDistance))*100}%,
               ${rangeColor} ${(toPosition)/(rangeDistance)*100}%, 
               ${sliderColor} ${(toPosition)/(rangeDistance)*100}%, 
               ${sliderColor} 100%)`;
         }

         function setToggleAccessible(currentTarget) {
           const toSlider = document.querySelector('#toSlider');
           if (Number(currentTarget.value) <= 0 ) {
             toSlider.style.zIndex = 2;
           } else {
             toSlider.style.zIndex = 0;
           }
         }

         const fromSlider = document.querySelector('#fromSlider');
         const toSlider = document.querySelector('#toSlider');
         const fromInput = document.querySelector('.fromInput');
         const toInput = document.querySelector('.toInput');
         fillSlider(fromSlider, toSlider, '#E9E9E9', '#131921', toSlider);
         setToggleAccessible(toSlider);

         fromSlider.oninput = () => controlFromSlider(fromSlider, toSlider, fromInput);
         toSlider.oninput = () => controlToSlider(fromSlider, toSlider, toInput);
         fromInput.oninput = () => controlFromInput(fromSlider, fromInput, toInput, toSlider);
         toInput.oninput = () => controlToInput(toSlider, fromInput, toInput, toSlider);
      </script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
      <script>
      $(document).ready(function(){

          filter_data();

          function filter_data()
          {
              $('.filter_data').html('<div class="nb-spinner" style="text-align: center;" ></div>');
              var action = 'fetch_data';
              var minimum_price = $('input.fromInput').val();
              var maximum_price = $('input.toInput').val();
              var brand = get_filter('brand');
              //var ram = get_filter('ram');
              //var storage = get_filter('storage');
              $.ajax({
                  url:"categories/storage-and-organizers/bathroom/fetch_data.php",
                  method:"POST",
                  data:{
                     action:action, 
                     brand:brand, 
                     minimum_price:minimum_price, 
                     maximum_price:maximum_price
                  },
                  success:function(data){
                    $('.filter_data').html(data);
                  }
              });
          }

          function get_filter(class_name)
          {
              var filter = [];
              $('.'+class_name+':checked').each(function(){
                  filter.push($(this).val());
              });
              return filter;
          }

          $('.common_selector').click(function(){
              filter_data();
          });

      });
      </script>
         <?php include 'includes/footer.php' ?>

      </main>
      <script type="text/javascript" src="themes/PRS02048/assets/cache/bottom-6634406.js" ></script>
         
   </body>
</html>