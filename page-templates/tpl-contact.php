<?php
/*
* Template Name: Contact Page Template
*/

get_header();

?>

<div id="contact-hero" class="o-panel o-panel--contact-hero">
	<div class="c-contact-hero">
		<div class="grid-container">
			<div class="c-contact-hero__text text-center">
				<h2 class="c-contact-hero__title">Get in touch with us!</h2>
			</div>
		</div>
	</div>
</div><!-- End Contact Hero -->

<div id="contact" class="o-panel o-panel--contact">
	<div class="c-contact">
		<div class="grid-container text-center">
			<div class="c-contact-form">				
				<?php echo do_shortcode('[gravityform id="1" title=false description=false ajax=true tabindex="70"]'); ?>
			</div>
		</div><!--/ Contact Form -->
		
		<div class="c-contact-items">
			<div class="grid-x grid-padding-x">
				<div class="cell medium-8 c-contact-items__col">
					<div class="c-contact-items__cotent-box">
						<div class="c-contact-items__icon">
							<i class="fas fa-mobile-alt"></i>
						</div>
						<h3 class="c-contact-items__title">Phone</h3>
						<a href="tel:+88<?php echo get_field('phone_number'); ?>">+88<?php echo get_field('phone_number'); ?></a>
					</div>
				</div><!--/ Contact Item -->

				<div class="cell medium-8 c-contact-items__col">
					<div class="c-contact-items__cotent-box">
						<div class="c-contact-items__icon">
							<i class="fas fa-map-marker-alt"></i>
						</div>
						<h3 class="c-contact-items__title">Address</h3>

						<span><?php echo get_field('address'); ?></span>
					</div>
				</div><!--/ Contact Item -->

				<div class="cell medium-8 c-contact-items__col">
					<div class="c-contact-items__cotent-box">
						<div class="c-contact-items__icon">
							<i class="far fa-envelope"></i>
						</div>
						<h3 class="c-contact-items__title">Email</h3>
						<a href="mailto:<?php echo get_field('email_address'); ?>"><?php echo get_field('email_address'); ?></a>
					</div>
				</div>
			</div>
		</div><!--/ Contact Items -->
	</div>
</div>

<div class="c-contact-map">
	<div class="c-contact-map__embed">
		<?php echo get_field('embed_code'); ?>
	</div>
</div><!--/ Contact Map -->

<?php get_footer(); ?>