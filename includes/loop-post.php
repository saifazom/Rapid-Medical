<?php 
    $post_series_terms = wp_get_post_terms($post->ID, 'post_series', array( 'fields' => 'all' ));
    $category_terms = wp_get_post_terms($post->ID, 'category', array( 'fields' => 'all' ));
    $tag_terms = wp_get_post_terms($post->ID, 'post_tag', array( 'fields' => 'all' ));

    $post_thumb_url = get_the_post_thumbnail_url();
?>
<div class="c-posts__item c-post">
    <a class="c-post__image" href="<?php the_permalink(); ?>" style="background-image: url(<?php echo $post_thumb_url; ?>);">
        <?php if(has_post_thumbnail()){ 
            the_post_thumbnail('full'); ?> 
        <?php }else{ ?>  
            <img src="http://localhost:8888/maddhom-root/wp-content/uploads/woocommerce-placeholder.png" alt="Placehholder Image"> 
        <?php } ?>
    </a>
    <h4 class="c-post__title"><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>

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