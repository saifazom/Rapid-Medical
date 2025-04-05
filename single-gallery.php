<?php 
    get_header();

    global $posts;
?>

    <?php if(have_posts()): while(have_posts()): the_post(); ?>
        <a data-fancybox="gallery" data-src="<?php echo get_the_post_thumbnail_url($post->ID, 'full'); ?>" href="javascript:void(0)">
            <?php if (has_post_thumbnail( $post->ID )){ ?>
                <?php the_post_thumbnail('full'); ?>
            <?php } else { ?>
                <img src="<?php echo TPL_THEME_URI; ?>/assets/img/no-image-icon.png" alt="">
            <?php } ?>
        </a>
    <?php endwhile; endif; ?>

<?php get_footer(); ?>