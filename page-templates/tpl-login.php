<?php
/**
 * Template Name: Login Template
 */
 get_header();
?>

<div id="ilm-page-contents" class="o-panel o-panel--page-contents">
    <div class="grid-container">
        <div class="grid-x">
            <div class="small-24 cell c-ilm-page__login">
                <?php get_template_part('includes/ilm', 'login-form'); ?>
            </div>
        </div>
    </div>
</div>

    
<?php get_footer(); ?>