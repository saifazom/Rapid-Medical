<?php get_header(); ?>

<?php
    global $post;
?>

<?php //include TPL_THEME_DIR . '/includes/page-banner.php'; ?>    

<div id="rm-page-contents" class="o-panel o-panel--page-contents">
    <div class="grid-container">
        <div class="s-page-content c-<?php echo $post->post_name ?>-page">
            <?php if(have_posts()): while(have_posts()): the_post(); ?>
                <h2 class="s-page-content__heading c-<?php echo $post->post_name ?>-page__heading"><?php the_title(); ?></h2>
                
                <div class="s-page-content__text c-<?php echo $post->post_name ?>content__text">
                    <?php the_content(); ?>
                </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</div>

<?php get_footer(); ?>

