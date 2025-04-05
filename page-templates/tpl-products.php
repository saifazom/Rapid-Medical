<?php
/**
 * Template Name: Products Template
 */

 get_header();

 global $product;
?>

<div id="product-contents" class="o-panel o-panel--product-contents">
	<div class="grid-container">
		<div class="c-brand-product">
			<div class="c-brand-product__items">
				<ul class="tabs c-brand-product__tabs">
					<li><a href="#panel-1">Brands</a></li>
					<li><a href="#panel-2">Shops</a></li>
				</ul>

				<div class="c-brand-product__tab-panels">
					<div id="panel-1" class="panel c-brand-product__panel">
						<div class="grid-x grid-padding-x align-center c-brand-product__grid">
							<div class="cell small-12 medium-6 large-4">
								<a href="#" class="c-brand-product__box">
									<div class="c-brand-product__image">
										<img src="<?php echo TPL_THEME_URI; ?>/assets/img/product-img1.jpg" alt="">
									</div>

									<div class="c-brand-product__text">
										<h3>Product Title</h3>
									</div>
								</a>
							</div><!--/ Product item -->

							<div class="cell small-12 medium-6 large-4">
								<a href="#" class="c-brand-product__box">
									<div class="c-brand-product__image">
										<img src="<?php echo TPL_THEME_URI; ?>/assets/img/product-img2.jpg" alt="">
									</div>

									<div class="c-brand-product__text">
										<h3>Product Title</h3>
									</div>
								</a>
							</div><!--/ Product item -->

							<div class="cell small-12 medium-6 large-4">
								<a href="#" class="c-brand-product__box">
									<div class="c-brand-product__image">
										<img src="<?php echo TPL_THEME_URI; ?>/assets/img/product-img3.jpg" alt="">
									</div>

									<div class="c-brand-product__text">
										<h3>Product Title</h3>
									</div>
								</a>
							</div><!--/ Product item -->

							<div class="cell small-12 medium-6 large-4">
								<a href="#" class="c-brand-product__box">
									<div class="c-brand-product__image">
										<img src="<?php echo TPL_THEME_URI; ?>/assets/img/product-img4.jpg" alt="">
									</div>

									<div class="c-brand-product__text">
										<h3>Product Title</h3>
									</div>
								</a>
							</div><!--/ Product item -->

							<div class="cell small-12 medium-6 large-4">
								<a href="#" class="c-brand-product__box">
									<div class="c-brand-product__image">
										<img src="<?php echo TPL_THEME_URI; ?>/assets/img/product-img5.jpg" alt="">
									</div>

									<div class="c-brand-product__text">
										<h3>Product Title</h3>
									</div>
								</a>
							</div><!--/ Product item -->

							<div class="cell small-12 medium-6 large-4">
								<div class="c-brand-product__more-box">
									<a class="u-button" href="#">View All <i class="far fa-arrow-alt-circle-right"></i></a>
								</div>
							</div><!--/ Product item -->
						</div>
					</div><!-- End panel 1 -->

					<div id="panel-2" class="panel c-brand-product__panel">
						<div class="grid-x grid-padding-x align-center c-brand-product__grid">
							<div class="cell small-12 medium-6 large-4">
								<a href="#" class="c-brand-product__box">
									<div class="c-brand-product__image">
										<img src="<?php echo TPL_THEME_URI; ?>/assets/img/product-img1.jpg" alt="">
									</div>

									<div class="c-brand-product__text">
										<h3>Product Title</h3>
									</div>
								</a>
							</div><!--/ Product item -->
							<div class="cell small-12 medium-6 large-4">
								<a href="#" class="c-brand-product__box">
									<div class="c-brand-product__image">
										<img src="<?php echo TPL_THEME_URI; ?>/assets/img/product-img2.jpg" alt="">
									</div>

									<div class="c-brand-product__text">
										<h3>Product Title</h3>
									</div>
								</a>
							</div><!--/ Product item -->
							<div class="cell small-12 medium-6 large-4">
								<a href="#" class="c-brand-product__box">
									<div class="c-brand-product__image">
										<img src="<?php echo TPL_THEME_URI; ?>/assets/img/product-img3.jpg" alt="">
									</div>

									<div class="c-brand-product__text">
										<h3>Product Title</h3>
									</div>
								</a>
							</div><!--/ Product item -->
							<div class="cell small-12 medium-6 large-4">
								<a href="#" class="c-brand-product__box">
									<div class="c-brand-product__image">
										<img src="<?php echo TPL_THEME_URI; ?>/assets/img/product-img4.jpg" alt="">
									</div>

									<div class="c-brand-product__text">
										<h3>Product Title</h3>
									</div>
								</a>
							</div><!--/ Product item -->
							<div class="cell small-12 medium-6 large-4">
								<a href="#" class="c-brand-product__box">
									<div class="c-brand-product__image">
										<img src="<?php echo TPL_THEME_URI; ?>/assets/img/product-img5.jpg" alt="">
									</div>
									<div class="c-brand-product__text">
										<h3>Product Title</h3>
									</div>
								</a>
							</div><!--/ Product item -->
							<div class="cell small-12 medium-6 large-4">
								<div class="c-brand-product__more-box">
									<a class="u-button" href="#">View All <i class="far fa-arrow-alt-circle-right"></i></a>
								</div>
							</div><!--/ Product item -->
						</div>    
					</div><!-- End panel 2 -->
				</div>
			</div>
		</div>
	</div><!-- End Brand Products -->

	<div class="c-product">
		<div class="grid-container">
			<div class="c-product__header">
				<div class="grid-x grid-padding-x c-product__grid">
					<div class="cell auto">
						<h1 class="c-product__heading">Products</h1>
					</div>
					<div class="cell shrink">
						<a class="u-button c-product__button" href="<?php bloginfo( 'url' ); ?>/shop">View All</a>
					</div>
				</div>
			</div><!--/ Product header -->

			<div class="grid-x grid-padding-x">
				<?php
					$args = array(
						'post_type' => 'product',
						'posts_per_page' => 12,
					);
					$query = new WP_Query( $args );
				?>
				
				<?php if ( $query->have_posts() ) : ?>
					<?php while ($query->have_posts()) : $query->the_post(); ?>
						<?php get_template_part('includes/loop', 'product'); ?>
					<?php endwhile; 
				endif; ?>
				<?php wp_reset_query(); ?>
			</div>
		</div>
	</div><!-- End Product Panel -->
</div><!-- End product contents -->

<?php get_footer(); ?>
