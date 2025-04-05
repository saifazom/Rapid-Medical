<?php 
    $category_terms = get_terms( 'category', array(
        'hide_empty' => false,
    ) );

    $tag_terms = get_terms( 'post_tag', array(
        'hide_empty' => false,
    ) );

    $post_series_terms = get_terms( 'post_series', array(
        'hide_empty' => false,
    ) );
?>

<div id="ilm-content-filters" class="c-content-filters">
    <form method="get" action="">
        <div class="grid-x grid-margin-x">
            <div class="small-24 cell c-content-filters__field-wrap">
                <label class="c-content-filters__label">Category</label>
                <select id="filter-category" js-filter-move-on-select class="c-content-filters__field c-content-filters__field-select">
                    <?php foreach( $category_terms as $category ): ?>
                        <option value="<?php echo get_term_link($category->term_id); ?>"><?php echo $category->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="small-24 cell c-content-filters__field-wrap">
                <label class="c-content-filters__label">Tags</label>
                <select id="filter-tags" js-filter-move-on-select class="c-content-filters__field c-content-filters__field-select">
                    <?php foreach( $tag_terms as $tag ): ?>
                        <option value="<?php echo get_term_link($tag->term_id); ?>"><?php echo $tag->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>

            <div class="small-24 cell c-content-filters__field-wrap">
                <label class="c-content-filters__label">Post Series</label>
                <select id="filter-post-series" js-filter-move-on-select class="c-content-filters__field c-content-filters__field-select">
                    <?php foreach( $post_series_terms as $post_series ): ?>
                        <option value="<?php echo get_term_link($post_series->term_id); ?>"><?php echo $post_series->name; ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
        </div>
    </form>
</div><!-- End ILM Content Filters -->