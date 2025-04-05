<?php
/**
 * Template Name: Homepage Template
 */

 get_header();
?>

<div id="home-contents" class="o-panel o-panel--home-contents">
	<div id="hero" class="o-panel o-panel--hero">
		<div class="grid-container">
			<div class="grid-x grid-padding-x c-home-slide-area">
				<div class="cell medium-7 hide-for-small-only hide-for-medium-only">
					<div class="c-category-nav">
						<h4 class="c-category-nav__title">Top Category-</h4>

						<?php
							$defaults = array(
									'theme_location'  => 'top_category_sidebar',
									'menu'            => '',
									'container'       => '',
									'container_class' => '',
									'container_id'    => '',
									'menu_class'      => 's-category-nav',
									'menu_id'         => '',
									'echo'            => true,
									'fallback_cb'     => 'wp_page_menu',
									'before'          => '',
									'after'           => '',
									'link_before'     => '',
									'link_after'      => '',
									'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
									'depth'           => 0,
									'walker'          => ''
							);

							wp_nav_menu( $defaults );
						?>
					</div>
				</div><!-- End category nav -->

				<div class="cell auto">
					<div class="c-home-slideshow">
						<div class="js-home-slideshow">
							<?php if( have_rows('hero_slider') ):
								while( have_rows('hero_slider') ) : the_row(); ?>
									<div class="c-home-slideshow__item" style="background-image: url(<?php the_sub_field('slider_image'); ?>);">
										<a href="<?php the_sub_field('slider_link'); ?>"><img src="<?php site_url(); ?>/wp-content/uploads/2023/08/main1.jpg" alt="Slideshow placeholder" /></a>
									</div>
								<?php endwhile;
							endif; ?>
						</div>

						<div class="s-home-slideshow-controller c-home-slideshow__controller"></div>
					</div>
				</div><!-- End home slideshow -->
			</div>
		</div>
	</div><!-- End home hero -->

	<div id="benefits" class="o-panel o-panel--benefits">
		<div class="c-benefits">
			<div class="grid-container">
				<div class="grid-x grid-padding-x c-benefits__grid">
					<?php if( have_rows('benefits') ):
						while( have_rows('benefits') ) : the_row(); ?>
							<div class="cell medium-24 large-8">
								<div class="c-benefits__box">
									<div class="c-benefits__icon">
										<i class="fas fa-<?php the_sub_field('benefits_icon_class'); ?>"></i>
									</div>
									<div class="c-benefits__text">
										<h3><?php the_sub_field('benefits_title'); ?></h3>
										<?php the_sub_field('benefits_text'); ?>
									</div>
								</div>
							</div><!--/ benefits box -->
						<?php endwhile;
					endif; ?>
				</div>
			</div>
		</div>
	</div><!-- End Benefits Section -->

	<div id="top-categories" class="o-panel o-panel--categories">
		<div class="c-top-category">
			<div class="grid-container">
				<div class="c-top-category__wrap">
					<h2 class="c-top-category__heading"><?php echo get_field('home_top_heading'); ?></h2>

					<div class="grid-x grid-padding-x">
						<?php if( have_rows('home_top_categories') ):
							while( have_rows('home_top_categories') ) : the_row(); ?>
							<?php
								$top_cat = get_sub_field('select_category');
								$cat_slug = $top_cat->slug;

								$thumbnail_id = get_woocommerce_term_meta( $top_cat->term_id, 'thumbnail_id', true );
								$carThumb = wp_get_attachment_url( $thumbnail_id );
								// var_dump($top_cat);
							?>
							<div class="cell small-12 medium-8 large-4">
								<a class="c-top-category__box" href="<?php echo get_term_link($top_cat->term_id); ?>">
									<div class="c-top-category__thumb <?php if(!$carThumb) { echo 'no-img'; } ?>" style="background-image: url(<?php echo $carThumb; ?>);">
										<?php if($carThumb) : ?>
											<img src="<?php echo TPL_THEME_URI; ?>/assets/img/no-image-icon.png" alt="">
										<?php else : ?>
											<img src="<?php echo TPL_THEME_URI; ?>/assets/img/no-image-icon.png" alt="">
										<?php endif; ?>
									</div>
									<span class="c-top-category__name"><?php echo $top_cat->name; ?></span>
								</a>
							</div>
							<?php endwhile;
						endif; ?>
					</div>
				</div>
			</div>
		</div>
	</div><!-- End Top Categories -->

	<div id="featured-banner" class="o-panel o-panel--featured-banner">
		<div class="c-featured-banner">
			<div class="grid-container">
				<div class="c-featured-banner__header">
					<h3 class="u-section-sub-heading c-featured-banner__small-title"><?php echo get_field('fb_sub_heading'); ?></h3>
					<h2 class="u-section-heading c-featured-banner__heading"><?php echo get_field('fb_heading'); ?></h2>
				</div>

				<div class="grid-x grid-padding-x">
					<?php if(have_rows('featured_banner')) :
						while(have_rows('featured_banner')) : the_row(); ?>
							<div class="cell medium-12 large-8 c-featured-banner__cell">
								<div class="c-featured-banner__box" style="background-image: url(<?php the_sub_field('fb_background_image'); ?>);">
									<h3 class="c-featured-banner__title"><?php the_sub_field('fb_title'); ?></h3>

									<?php if(get_sub_field('fb_logo')) : ?>
									<div class="c-featured-banner__logo">
										<img src="<?php the_sub_field('fb_logo'); ?>" alt="">
									</div>
									<?php endif; ?>
									<?php if(get_sub_field('fb_sub_title')) : ?>
									<h4 class="c-featured-banner__sub-title"><?php the_sub_field('fb_sub_title'); ?></h4>
									<?php endif; ?>

									<div class="c-featured-banner__text">
										<p><?php the_sub_field('fb_text'); ?></p>

										<a class="u-button c-featured-banner__btn" href="<?php the_sub_field('fb_button_link'); ?>"><?php the_sub_field('fb_button_label'); ?></a>
									</div>
								</div>
							</div>
						<?php endwhile;
					endif; ?>
				</div>
			</div>
		</div>
	</div><!-- End Featured Banner -->

	<div id="product-categories" class="o-panel o-panel--categories">
		<div class="c-product-by-category">
			<?php if( have_rows('home_product_category') ): ?>
				<?php while( have_rows('home_product_category') ) : the_row(); ?>
					<?php
						global $product;
						$product_tex = get_sub_field('select_product_category');
						$term_slug = $product_tex->slug;

						$args = array(
							'post_type' => 'product',
							'posts_per_page' => -8,
							'tax_query' => array(
								array(
									'taxonomy' => 'product_cat',
									'field'    => 'slug',
									'terms'    => $term_slug
								)
							)
						);
						$query = new WP_Query( $args );
					?>
					<div class="c-product-by-category__row">
						<div class="grid-container">
							<div class="grid-x grid-padding-x align-middle c-product-by-category__header">
								<div class="cell small-24 medium-auto">
									<h1 class="c-product-by-category__heading"><?php echo $product_tex->name; ?></h1>
								</div>

								<div class="cell small-24 medium-shrink grid-x align-middle c-product-by-category__form-col">
									<a class="u-button c-product-by-category__view-all" href="<?php echo get_term_link($product_tex->term_id); ?>">View All</a>
								</div>
							</div><!--/ Heading Arrea -->

							<div class="grid-x grid-padding-x">
								<?php if ( $query->have_posts() ) : ?>
									<?php while ($query->have_posts()) : $query->the_post(); ?>
										<?php get_template_part('includes/loop', 'product'); ?>
									<?php endwhile;
								endif; ?>
								<?php wp_reset_query(); ?>
							</div>
						</div>
					</div><!--/ Product Row -->
				<?php endwhile;
			endif; ?>
		</div>
	</div><!-- End Product Categories -->

	<div id="top-brands" class="o-panel o-panel--top-brands">
		<div class="c-top-brands">
			<div class="grid-container">
				<div class="c-top-brands__header text-center">
					<h3 class="u-section-sub-heading"><?php echo get_field('tb_sub_heading'); ?></h3>
					<h2 class="u-section-heading"><?php echo get_field('tb_heading'); ?></h2>
				</div>
				<div class="c-top-brands__carousel">
					<div class="js-top-brrands">
						<?php if(have_rows('brands_logo')) :
							while(have_rows('brands_logo')) : the_row();  ?>
								<div class="c-top-brands__logo">
									<img src="<?php the_sub_field('tb_logo') ?>" alt="">
								</div>
							<?php endwhile;
						endif; ?>
					</div>
					<div class="c-top-brands__navs">
						<button id="top-brrands-prev" class="prev"><i class="fas fa-arrow-left"></i></button>
						<button id="top-brrands-next" class="next"><i class="fas fa-arrow-right"></i></button>
					</div>
				</div>
			</div>
		</div>
	</div><!-- End Top Brands -->

	<?php if(!get_field('hide_the_testimonial_slider')): ?>
		<div id="testimonials" class="o-panel o-panel--testimonials">
			<div class="grid-container">
				<div class="c-testimonials">
					<?php if(get_field('testimonial_heading')): ?>
						<h3 class="u-section-sub-heading u-section-sub-heading--testimonials">
							<?php echo get_field('testimonial_heading'); ?>
						</h3>
					<?php endif; ?>

					<?php if(get_field('testimonial_sub_heading')): ?>
						<h2 class="u-section-heading u-section-heading--testimonials">
							<?php echo get_field('testimonial_sub_heading'); ?>
						</h2>
					<?php endif; ?>

					<div class="c-testimonials__slider js-testimonials-slider">
						<?php while(have_rows('testimonials')): the_row('testimonials'); ?>
							<div class="c-testimonials__slide">
								<div class="c-testimonials__slide-inner">
									<div class="c-testimonials__details">
										<?php the_sub_field('details'); ?>
									</div>
									<h5 class="c-testimonials__author">
										<?php the_sub_field('author'); ?>
									</h5>
									<h6 class="c-testimonials__designation">
										<?php the_sub_field('designation'); ?>
									</h6>
								</div>
							</div>
						<?php endwhile; ?>
					</div>
				</div>
			</div>
		</div>
	<?php endif; ?>
</div><!-- End ILM home contents -->

<?php get_footer(); ?>
