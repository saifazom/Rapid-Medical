<?php get_header(); ?>

<div id="ilm-page-contents" class="o-panel o-panel--page-contents">
    <div class="grid-container">
        <div class="grid-x">
            <div class="small-24 cell">
                <div class="s-page-content s-page-content--404">
                    <div class="c-404">
                        <div class="c-404__heading">
                            <span class="c-404__title">Oops</span>
                            <i class="fas fa-exclamation"></i>
                        </div>
                        <div class="c-404__contents">
                            <div class="c-404__text1">We Can't seem to find the page you're looking for.</div>
                            <div class="c-404__text2">Error code: 404</div>

                            <div class="c-404__form-wrap">
                                <div class="c-404__form-label">Search for a audio, video or articles:</div>
                                <form class="c-404__form" action="<?php bloginfo('url'); ?>" method="get">
                                    <div class="c-404__form-field-wrap">
                                        <input type="text" name="s" placeholder="Search...." class="c-404__search-field" />
                                    </div>
                                    <div class="c-404__submit-field-wrap">
                                        <input type="submit" value="Search" class="c-404__submit-button" />
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div><!-- End ILM home contents -->

<?php get_footer(); ?>

