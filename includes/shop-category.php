<?php
global $product;
?>

<?php
   $term = get_queried_object();
   $term_slug = $term->slug;

   $page_title = $term->name;

   $paged = ( get_query_var('paged') ) ? get_query_var('paged') : 1;
   $args = array(
      'post_type' => 'product',
      'posts_per_page' => 12,
      'paged' => $paged,
      'tax_query' => array(
         array(
            'taxonomy' => 'product_cat',
            'field'    => 'slug',
            'terms'    => $term_slug
         )
      )
   );
   $query = new WP_Query( $args );
?>
<?php if ( $query->have_posts() ) : ?>
   <div class="c-product c-product--shop">
      <h2 class="c-product__heading"><?= $page_title ?></h2>

      <div class="grid-x grid-padding-x">
         <?php while ($query->have_posts()) : $query->the_post(); ?>
            <?php get_template_part('includes/loop', 'product'); ?>
         <?php endwhile; ?> 
      </div>

      <div class="c-pagination">
         <?php 
         $total_pages = $query->max_num_pages;

            if ($total_pages > 1){
               $big = 999999999; // need an unlikely integer
               echo paginate_links( array(
                  'base' => str_replace( $big, '%#%', get_pagenum_link( $big ) ),
                  'format' => '?paged=%#%',
                  'current' => max( 1, get_query_var('paged') ),
                  'total' => $query->max_num_pages,
                  'prev_text'    => __(' '),
                  'next_text'    => __(' ')
               ) );
            }    
         ?>
      </div>
      <?php wp_reset_query(); ?>
   </div><!-- End home categories panel -->
<?php endif; ?>