<?php 
    get_header();

    global $posts;
?>

<div id="gallery-categories" class="o-panel o-panel--categories">
    <div class="c-gallery-category">
        <div class="grid-container">
            <div class="c-gallery-category__wrap">
                <div class="grid-x grid-padding-x">
                    <?php
                        $taxonomy = 'gallery-category';
                        $terms = get_terms($taxonomy);
                    ?>
                    <?php foreach ( $terms as $term ) : ?>
                        <div class="cell small-12 medium-8">
                            <a class="c-gallery-category__thumb" href="<?php echo get_term_link($term->slug, $taxonomy); ?>">
                                <?php if(get_field('gallery_category_thumbnail')) : ?>
                                    <img src="<?php echo get_field('gallery_category_thumbnail', $current_term_id); ?>" alt="">
                                <?php else: ?>
                                    <div class="c-gallery-category__image no-img">
                                        <img src="<?php echo TPL_THEME_URI; ?>/assets/img/no-image-icon.png" alt="">
                                    </div>
                                <?php endif; ?>
                            </a>
                            <h3 class="c-gallery-category__name"><?php echo $term->name; ?></h3>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>