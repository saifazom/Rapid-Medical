<?php if(get_field('banner_image')): ?>
    <div id="ilm-page-title" class="o-panel o-panel--page-title js-background-parallax grid-container">
        <div class="u-parallax-wrap">
            <div class="u-parallax-inner" style="background-image: url('<?php echo get_field('banner_image'); ?>')"></div>
            <div class="grid-container c-page-title">
                <div class="grid-x align-middle c-page-title__grid">
                    <div class="small-24 cell">
                        <h1 class="c-page-title__text"><?php echo get_field('banner_heading'); ?></h1>
                    </div>
                </div>
            </div>  
        </div>
    </div>
<?php endif; ?>