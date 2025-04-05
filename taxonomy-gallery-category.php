<?php 
/* File name: taxonomy-gallery.php */

get_header();

    $cat_slug = get_queried_object()->slug;
   	$cat_name = get_queried_object()->name;
?>

<div id="gallery-categories" class="o-panel o-panel--categories">
    <div class="c-gallery-category">
        <div class="grid-container">
            <div class="c-gallery-category__wrap">
                <div class="grid-x grid-padding-x">
                    <div class="cell">
                        <div class="c-gallery-category__header">
                            <h2><?php echo $cat_name; ?></h2>
                            <a class="c-gallery-category__more" href="<?php bloginfo('url'); ?>/gallery"><i class="fas fa-arrow-left"></i> See all galleries</a>
                        </div>
                    </div>
                    <?php
                        $args = array(  
                            'post_type' => 'gallery', 
                            'posts_per_page' => -1, 
                            'tax_query' => array(
                                array(
                                    'taxonomy' => 'gallery-category',
                                    'field'    => 'slug',
                                    'terms' => $cat_slug
                                ),
                            )
                        );
                        $new_query = new WP_Query($args);
                    ?>
                    <?php if($new_query->have_posts()): 
                        while($new_query->have_posts()): $new_query->the_post(); ?>
                            <div class="cell small-12 medium-8 large-6">
                                <div class="c-gallery-category__thumb" data-fancybox="gallery" data-src="<?php echo get_the_post_thumbnail_url($post->ID, 'full') ?>">
                                    <?php if(has_post_thumbnail( $post->ID )) : ?>
                                        <div class="c-gallery-category__image" style="background-image: url(<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>);">
                                            <?php the_post_thumbnail('gallery-thumb'); ?>
                                            <!-- <img class="placeholder-image" src="<?php //echo TPL_THEME_URI; ?>/assets/img/no-image-icon.png" alt=""> -->
                                        </div>
                                    <?php else: ?>
                                        <div class="no-img">
                                            <img src="<?php echo TPL_THEME_URI; ?>/assets/img/no-image-icon.png" alt="">
                                        </div>
                                    <?php endif; ?>
                                    
                                    <span class="c-gallery-category__icon"><i class="far fa-eye"></i></span>
                                </div>
                            </div>
                        <?php endwhile; 
                    endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php get_footer(); ?>