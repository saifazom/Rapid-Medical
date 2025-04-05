<?php get_header(); ?>

<div id="rm-page-contents" class="o-panel o-panel--page-contents">
   <div class="grid-container">
      <div class="grid-x">
         <div class="small-24 cell">
            <div class="grid-x grid-margin-x c-events-page">
               <div class="cell medium-6 hide-for-small-only hide-for-medium-only">
                  <div class="c-category-nav">
                     <h4 class="c-category-nav__title">Top Category</h4>

                     <ul class="s-category-nav">
                        <li class="current-menu-item"> <a href="#">All Shops</a></li>
                        <li class="menu-item-has-children"><a href="#">Campaigns</a>
                           <ul class="sub-menu">
                              <li><a href="#">Product</a></li>
                              <li class="current-menu-item"><a href="#">Collection</a>
                                 <ul>
                                    <li><a href="#">Product</a></li>
                                    <li class="current-menu-item"><a href="#">Collection</a>
                                       <ul>
                                          <li><a href="#">Product</a></li>
                                          <li><a href="#">Collection</a></li>
                                          <li><a href="#">Electronics</a></li>
                                       </ul>
                                    </li>
                                    <li><a href="#">Electronics</a></li>
                                 </ul>
                              </li>
                              <li><a href="#">Electronics</a></li>
                           </ul>
                        </li>
                        <li><a href="#0">Mega Days</a></li>
                     </ul>
                  </div>
               </div><!-- End category nav -->

               <div class="auto cell">
                  <!-- <h2><?php //echo get_the_archive_title(); ?></h2> -->
                  <div class="c-single-post">
                     <?php 
                        if(have_posts()):
                           while(have_posts()): the_post(); ?>
                              <?php 
                                 $post_series_terms = wp_get_post_terms($post->ID, 'post_series', array( 'fields' => 'all' ));
                                 $category_terms = wp_get_post_terms($post->ID, 'category', array( 'fields' => 'all' ));
                                 $tag_terms = wp_get_post_terms($post->ID, 'post_tag', array( 'fields' => 'all' ));

                                 $post_thumb_url = get_the_post_thumbnail_url();
                              ?>
                              <div class="c-single-post__item c-post">
                                 <div class="c-post__image" style="background-image: url(<?php echo $post_thumb_url; ?>);">
                                    <?php if(has_post_thumbnail()){ 
                                          the_post_thumbnail('full'); ?> 
                                       <?php }else{ ?>  
                                             <img src="http://localhost:8888/maddhom-root/wp-content/uploads/woocommerce-placeholder.png" alt="Placehholder Image"> 
                                       <?php } ?>
                                    </div>
                                 <h4 class="c-post__title"><?php the_title(); ?></h4>

                                 <div class="c-post__meta-wrap">
                                    <div class="c-post__meta c-post__meta--date u-clearfix">
                                          <span class="c-post__meta-label">Date:</span> 
                                          <span class="c-post__meta-content"><?php echo get_the_date('F d, Y'); ?></span>
                                    </div>

                                    <div class="c-post__meta c-post__meta--author u-clearfix">
                                          <span class="c-post__meta-label">Author:</span> 
                                          <span class="c-post__meta-content"><?php echo get_the_author(); ?></span>
                                    </div>

                                    <?php if(!is_wp_error($post_series_terms)): ?>
                                          <div class="c-post__meta c-post__meta--series u-clearfix">
                                             <span class="c-post__meta-label">Post Series:</span> 
                                             <span class="c-post__meta-content">
                                                <?php echo tax_array_to_link_list($post_series_terms); ?>
                                             </span>
                                          </div>
                                    <?php endif; ?>

                                    <?php if(!is_wp_error($category_terms)): ?>
                                          <div class="c-post__meta c-post__meta--cat u-clearfix">
                                             <span class="c-post__meta-label">Category:</span> 
                                             <span class="c-post__meta-content">
                                                <?php echo tax_array_to_link_list($category_terms); ?>
                                             </span>
                                          </div>
                                    <?php endif; ?>

                                    <?php if(!is_wp_error($tag_terms)): ?>
                                          <div class="c-post__meta c-post__meta--tag u-clearfix">
                                             <span class="c-post__meta-label">Tags:</span> 
                                             <span class="c-post__meta-content">
                                                <?php echo tax_array_to_link_list($tag_terms); ?>
                                             </span>
                                          </div>
                                    <?php endif; ?>
                                 </div>

                                 <div class="c-post__details">
                                    <?php the_content(); ?>
                                 </div>
                              </div><!-- End Event -->
                          <?php endwhile; 

                           echo '<div class="s-rm-pagination">';
                              echo ilm_pagination();
                           echo '</div>';
                        else:
                           echo '<p>Sorry! No post found</p>';
                        endif; 
                     ?>
                  </div><!-- End Events -->
               </div>
            </div>
         </div>
      </div>

      <div class="c-related-posts">
         <div class="grid-x grid-padding-x align-center">
            <?php
               $related = get_posts( 
                  array( 
                     'category__in' => wp_get_post_categories($post->ID), 
                     'posts_per_page' => 4, 
                     'post__not_in' => array($post->ID) 
                  ) 
               );
               if( $related ) foreach( $related as $post ) {
               setup_postdata($post); ?>
                  <div class="cell medium-12 large-6">
                     <div class="c-related-posts__img">
                        <?php if(has_post_thumbnail()){ 
                           the_post_thumbnail('full'); ?> 
                        <?php }else{ ?>  
                           <img src="http://localhost:8888/maddhom-root/wp-content/uploads/woocommerce-placeholder.png" alt="Placehholder Image"> 
                        <?php } ?>
                     </div>
                     <h3 class="c-related-posts__title">
                        <a href="<?php the_permalink() ?>">
                           <?php the_title(); ?>
                        </a>
                     </h3>
                     <div class="c-related-posts__text">
                        <?php the_excerpt('Read the rest of this entry &raquo;'); ?>
                     </div>   
                  </div>   
               <?php }
               wp_reset_postdata(); ?>
         </div>
      </div><!-- End Post -->
   </div>
</div><!-- End ILM home contents -->

<?php get_footer(); ?>