	<div id="footer" class="o-panel o-panel--footer">
		<div class="c-footer">
			<div class="c-footer__widgets">
				<div class="grid-container">
						<div class="grid-x grid-padding-x">
							<!-- <div class="medium-6 cell">
								<h4 class="c-footer__title">Download</h4>

								<a class="c-footer__app-store" href="#"><img src="<?php //echo RM_THEME_URI; ?>/assets/img/google-play-badge.png" alt=""></a>
								<a class="c-footer__app-store" href="#"><img src="<?php //echo RM_THEME_URI; ?>/assets/img/app-store-badge.png" alt=""></a>
							</div> -->
							<div class="medium-7 cell">
								<h4 class="c-footer__title">Menu</h4>

								<?php
									$defaults = array(
										'theme_location'  => 'footer_menu',
										'menu'            => '',
										'container'       => '',
										'container_class' => '',
										'container_id'    => '',
										'menu_class'      => 's-footer-menu',
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
							<div class="medium-10 cell">
								<h4 class="c-footer__title">Contact Us</h4>
								<div class="c-footer__address">
									<?php echo get_field('footer_address', 'options'); ?>
								</div>
							</div>
							<div class="medium-6 cell">
								<div class="c-social-links">
									<h4 class="c-footer__title">Get in Touch</h4>

									<ul class="c-social-links__list">
										<?php if( have_rows('social_links', 'options') ): ?>
                           		<?php while( have_rows('social_links', 'options') ) : the_row(); ?>
												<li class="c-social-links__item">
													<a href="<?php the_sub_field('social_link', 'options'); ?>" class="c-social-links__link" target="_blank">
														<i class="fab fa-<?php the_sub_field('social_class', 'options'); ?> c-social-links__icon"></i>
													</a>
												</li>
											<?php endwhile; 
										endif; ?>
									</ul>
								</div>
							</div>
						</div>
				</div>
			</div>
		</div>
		<div class="c-footer__copyright-area">
			<div class="grid-container">
				<div class="c-footer__copyright">All images and content © <?php echo date('Y') ?> <a href="http://rapidmedicalbd.com">rapidmedicalbd<sup>®</sup></a>. Design by <a href="http://theprolancer.com" target="_blank">The Prolancer</a></div>
			</div>
		</div>
	</div><!-- End ILM footer -->

	<ul class="c-notification-footer">
		<li class="show-for-small-only">
			<a class="c-notification-footer__icon cart" href="<?php echo wc_get_cart_url(); ?>" target="_blank"><i class="fas fa-shopping-cart"></i></a>
		</li>
		<li>
			<a class="c-notification-footer__icon envelope" href="mailto:<?php echo get_field('email', 'options'); ?>" target="_blank">
				<i class="far fa-envelope"></i>
				<span>E-Mail</span>
			</a>
		</li>
		<li>
			<a class="c-notification-footer__icon skype" href="https://join.skype.com/invite/<?php echo get_field('skype_id', 'options'); ?>" target="_blank">
				<i class="fab fa-skype"></i>
				<span>Skype</span>
			</a>
		</li>
		<li>
			<a class="c-notification-footer__icon whatsapp" href="https://api.whatsapp.com/send?phone=<?php echo get_field('phone_number', 'options'); ?>" target="_blank">
				<i class="fab fa-whatsapp"></i>
				<span>WhatsApp</span>
			</a>
		</li>
		<!-- <li><a class="c-notification-footer__bell" href="#"><i class="far fa-bell"></i></a></li>
		<li><a class="c-notification-footer__chat" href="#"><i class="far fa-comment-dots"></i></a></li>
		<li><a class="c-notification-footer__user" href="#"><i class="far fa-user"></i></a></li> -->
	</ul>

	<?php wp_footer(); ?>
</body>
</html>