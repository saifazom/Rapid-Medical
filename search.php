<?php get_header(); 

    $s=get_search_query();
    $args = array(
        's' =>$s
    );
?>
    <div class="c-product-by-category">
        <?php if(have_posts()): while(have_posts()): the_post(); ?>
            <div class="c-product-by-category__row">
                <div class="grid-container">
                    <div class="grid-x grid-padding-x">
                        <?php get_template_part('includes/loop', 'product'); ?>
                    </div>
                </div>
            </div>
        <?php endwhile; ?>            
        <?php else: ?>
            <div class="c-product-by-category__row">  
                <div class="grid-container">
                    <h3 class="c-search__title__not-found">No Search Results Found</h3>
                </div>
            </div>
        <?php endif; ?>
    </div>

<?php get_footer(); ?>