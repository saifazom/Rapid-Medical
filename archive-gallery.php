<?php get_header(); ?>

<div id="gallery-categories" class="o-panel o-panel--categories">
    <div class="c-gallery-category">
        <div class="grid-container">
            <div class="c-gallery-category__wrap">
                <div class="grid-x grid-padding-x">
                    <?php
                        $taxonomy = 'gallery-category';
                        $terms = get_terms($taxonomy);
                    ?>
                    <?php foreach ( $terms as $term ) : 

                        $image = get_field('gallery_category_thumbnail', $term);
                        $count_term = $term->count;
                    ?>
                        <div class="cell small-24 medium-8">
                            <a class="c-gallery-category__thumb taxonomy-page" href="<?php echo get_term_link($term->slug, $taxonomy); ?>">
                                <?php if($image) : ?>
                                    <div class="c-gallery-category__image" style="background-image: url(<?php echo $image; ?>);">
                                        <img class="placeholder-image" src="<?php echo TPL_THEME_URI; ?>/assets/img/no-image-icon.png" alt="">
                                    </div>
                                <?php else: ?>
                                    <div class="no-img">
                                        <img src="<?php echo TPL_THEME_URI; ?>/assets/img/no-image-icon.png" alt="">
                                    </div>
                                <?php endif; ?>
                                
                                <span class="u-button c-gallery-category__btn">View All Photos</span>
                            </a>
                            <div class="c-gallery-category__text">
                                <h3 class="c-gallery-category__name">
                                    <?php echo $term->name; ?>

                                    <?php if($count_term > 1) : ?>
                                        <span>(<?php echo $count_term; ?> Photos)</span>
                                    <?php else: ?>
                                        <span>(<?php echo $count_term; ?> Photo)</span>
                                    <?php endif; ?>
                                </h3>
                                <?php echo term_description($term); ?>
                            </div>

                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php get_footer(); ?>