<!doctype html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<title><?php wp_title('|', true, 'right'); ?> Rapid Medical</title>

	<!-- Google tag (gtag.js) -->
	<script async src="https://www.googletagmanager.com/gtag/js?id=G-R3VN8EV872"></script>
	<script>
	  window.dataLayer = window.dataLayer || [];
	  function gtag(){dataLayer.push(arguments);}
	  gtag('js', new Date());

	  gtag('config', 'G-R3VN8EV872');
	</script>

	<link rel="shortcut icon" type="image/png" href="<?php echo TPL_THEME_URI; ?>/assets/img/ew.png"/>
	<meta http-equiv="x-ua-compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<div id="header" class="o-panel o-panel--header">
		<div class="grid-container">
			<div class="grid-x grid-padding-x align-middle c-header">
				<div class="cell medium-shrink">
					<div class="c-site-logo">
						<a href="<?php bloginfo( 'url' ); ?>" class="c-site-logo__link">
							<img src="<?php echo TPL_THEME_URI; ?>/assets/img/site-logo-b.png" class="c-site-logo__image" alt="Rapid Medical" />
						</a>
					</div>
				</div>
				<div class="cell medium-auto">
					<div class="c-header-search">
						<form class="c-header-search__form" action="<?php bloginfo( 'url' ); ?>" method="get">
							<div class="c-header-search__field-wrap">
								<input type="text" name="s" placeholder="Search" id="search" class="c-header-search__text-field" />
								<button type="submit" class="c-header-search__submit"><i class="fas fa-search"></i></button>
							</div>
						</form>
					</div>
				</div>
				<div class="cell shrink">
					<ul class="c-notification hide-for-small-only">
						<li class="hide-for-small-only">
							<a class="c-notification__cart" href="<?php echo wc_get_cart_url(); ?>">
								<i class="fas fa-shopping-cart"></i>

								<span><?php echo WC()->cart->get_cart_contents_count(); ?></span>
							</a>
						</li>
					</ul>
				</div>
			</div>
		</div>

		<div id="primary-nav" class="o-panel o-panel--primary-nav">
			<div class="grid-container">
				<div class="grid-x grid-padding-x align-middle c-primary-nav">
					<div class="cell shrink c-primary-nav__cell">
						<button class="u-hamburger-icon js-sidebar-nav-open"><i class="fas fa-bars"></i></button>
					</div>
					<?php
						$defaults = array(
							'theme_location'  => 'primary_nav',
							'menu'            => '',
							'container'       => '',
							'container_class' => '',
							'container_id'    => '',
							'menu_class'      => 'cell auto c-primary-nav__cell s-primary-nav',
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

					<div class="cell shrink c-secondary-nav hide-for-small-only">
						<button class="c-secondary-nav__dot"><i class="fas fa-ellipsis-v"></i></button>

						<ul class="c-secondary-nav__items">
							<li><a href="https://rapidmedicalbd.com/contact-us/">Contact Us</a></li>
							<li class="c-secondary-nav__user-staus">
								<?php if ( is_user_logged_in() ) { ?>
									<a href="<?php echo wp_logout_url(); ?>"><i class="fas fa-unlock-alt"></i> Logout</a>
								<?php } else { ?>
									<a href="/wp-login.php" rel="home"><i class="fas fa-lock"></i> Login</a>
								<?php } ?>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div><!-- End RM primary nav-->
	</div><!-- End RM Header -->


	<div id="sidebar-nav" class="o-panel o-panel--sidebar-nav">
		<div class="grid-container">
			<div class="c-site-logo__in-sidebar">
				<button class="u-hamgurger-menu-close js-sidebar-nav-close">
					<i class="fas fa-times"></i>
				</button>
				<a href="<?php bloginfo( 'url' ); ?>">
					<img src="<?php echo TPL_THEME_URI; ?>/assets/img/site-logo-b.png" alt="">
				</a>
			</div>

			<div class="c-e-wallet">
				<div class="c-e-wallet__wrap">
					<!-- <div class="c-e-wallet__balance">
						<img src="<?php //echo TPL_THEME_URI; ?>/assets/img/ew.png" alt="">
						<span>Balance</span>
					</div> -->

					<div class="c-e-wallet__button" href="#">
						<?php wp_loginout( $_SERVER['REQUEST_URI'] ); ?>
					</div>
				</div>
			</div>
			<?php
				$defaults = array(
					'theme_location'  => 'top_category_sidebar',
					'menu'            => '',
					'container'       => '',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => 's-sidebar-nav',
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
	</div><!-- End ILM Sidebar nav-->