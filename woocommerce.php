<?php get_header(); ?>

<div id="rm-page-contents" class="o-panel o-panel--page-contents">
    <div class="grid-container">
        <?php if(is_shop()): ?>
            <?php //woocommerce_content(); ?>
            <?php get_template_part('includes/shop', 'products'); ?>
        <?php elseif ( is_product_category() ): ?>
            <?php get_template_part('includes/shop', 'category'); ?>
        <?php else: ?>
            <?php woocommerce_content(); ?> 
        <?php endif; ?>
    </div>
</div>

<?php get_footer(); ?>