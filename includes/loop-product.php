<?php 
global $product; 
?>

   <div class="cell small-24 medium-8 large-6">
      <div class="c-product__box">
         <?php woocommerce_show_product_sale_flash($post, $product); ?>
         
         <div class="c-product__image">
            <a href="<?php the_permalink(); ?>">
               <?php the_post_thumbnail('product-thumb'); ?>
            </a>
         </div>

         <div class="c-product__text">
               <h3>
                  <a href="<?php the_permalink(); ?>">
                     <?php the_title(); ?>
                  </a>
               </h3>
               <span class="c-product__price">
                  <?php echo $product->get_price_html(); ?>
               </span>
               <div class="u-inner-button">
                  <?php 										
                     // if ( !function_exists( 'woocommerce_template_loop_add_to_cart' ) ) { 
                     // 	require_once '/includes/wc-template-functions.php'; 
                     // } 
                           
                     // The args. 
                     $args = array(); 
                           
                     // NOTICE! Understand what this does before running. 
                     $result = woocommerce_template_loop_add_to_cart($args); 
                  ?>
                  <?php //woocommerce_template_loop_add_to_cart($query->post, $product); ?>
               </div>
         </div>
      </div>
   </div><!--/ Product item -->
