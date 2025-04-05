<div class="c-product__share">
   <?php
      global $product;

      $product->get_id();
      //$product_obj = wc_get_product( $product->get_id() );

      // var_dump($product_obj);
      
      $share_url = get_permalink( $product->get_id() );
      $share_title = $product->get_name();
      $share_description = $product->get_short_description();
   ?>

   <span>Share this :</span> 
   <div class="c-product__share-media">
      <a href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $share_url; ?>" target="_blank">
         <i class="fab fa-facebook-f"></i>
      </a>
      <a href="https://twitter.com/intent/tweet?text=<?php echo $share_title; ?>&url=<?php echo $share_url; ?>" target="_blank">
         <i class="fab fa-twitter"></i>
      </a>
      <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?php echo $share_url; ?>&title=<?php echo $share_title; ?>" target="_blank">
            <i class="fab fa-linkedin-in"></i>
      </a>
      <a href="mailto:?&subject=<?php echo $share_title; ?>&body=<?php echo $share_url; ?>" target="_blank">
         <i class="fas fa-envelope"></i>
      </a>
   </div>
</div>