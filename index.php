<?php get_header(); ?>

<div id="rm-page-contents" class="o-panel o-panel--page-contents">
   <div class="grid-container">
      <div class="grid-x">
         <div class="small-24 cell">
            <div class="grid-x grid-margin-x c-events-page">
               <div class="cell medium-6 hide-for-small-only hide-for-medium-only">
                  <div class="c-category-nav">
                     <h4 class="c-category-nav__title">Top Category ==</h4>

                     <ul class="s-category-nav">
                        <li class="current-menu-item"> <a href="#">All Shops =</a></li>
                        <li class="menu-item-has-children"><a href="#">Campaigns =</a>
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
                        <li><a href="#0">Mega Days =</a></li>
                     </ul>
                  </div>
               </div><!-- End category nav -->

               <div class="auto cell">
                  <div class="c-posts">
                     <div class="grid-x grid-padding-x">
                        <?php if(have_posts()): ?>
                           <?php while(have_posts()): the_post(); ?>
                              <div class="cell medium-12 large-8">
                                 <?php get_template_part('includes/loop', 'post'); ?>
                              </div>
                           <?php endwhile; ?>

                           <?php echo '<div class="s-rm-pagination">';
                                 echo ilm_pagination();
                              echo '</div>';
                           else:
                              echo '<p>Sorry! No post found</p>'; 
                        endif; ?>
                     </div>
                  </div><!-- End Events -->
               </div>
            </div>
         </div>
      </div>
   </div>
</div><!-- End ILM home contents -->

<?php get_footer(); ?>

