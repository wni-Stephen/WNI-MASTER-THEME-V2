<?php
/**
* WebsiteNI Joints
* WebsiteNI Starter Theme built on JointsWP; http://jointswp.com/.
* Created by WebsiteNI.
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
		<meta name="author" content="WebsiteNI">

		<?php wp_head(); ?>
		
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hamburgers/1.1.3/hamburgers.min.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css">
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
	</head>
	<body>
		<div id="wrapper" class="wrapper">
			<div id="skip-navigation-link">
				<a href="#content">Skip to Main Content</a>
			</div>
			<div class="navigation-overlay">
				<nav>
					<?php wp_nav_menu(array('theme_location' => 'primary-navigation', 'menu_class' => 'primary-menu')); ?>
				</nav>
			</div>

			<div id="wrapper-inner"  <?php if (!is_search()) : body_class(); else : body_class('wrapper-inner'); endif; ?>>

			<header class="navigation wow fadeIn">
				<div class="grid-container full">
					<div class="grid-container">
						<div class="grid-x grid-padding-x">
							<div class="cell small-6 large-3 companylogo websiteni-flex websiteni-flex-hs-sm websiteni-flex-vc-sm">
								<a class="company-logo" href="<?php echo esc_url(home_url('/')); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/header/companylogo.svg" alt="<?php bloginfo('name'); ?>" />
								</a>
							</div>

							<div class="cell small-6 hide-for-large websiteni-flex websiteni-flex-he-sm websiteni-flex-vc-sm">
								<img class="search-open" src="<?php echo get_template_directory_uri(); ?>/assets/images/header/search.svg" alt="<?php bloginfo('name'); ?>" />
								<button class="hamburger hamburger--slider-r" type="button" aria-label="Hamburger">
									<span class="hamburger-box">
										<span class="hamburger-inner"></span>
									</span>
								</button>
							</div>								
							
							<div class="cell large-8 large-offset-1 show-for-large websiteni-flex websiteni-flex-he-sm websiteni-flex-vc-sm">
								<nav>
									<?php wp_nav_menu(array('theme_location' => 'secondary-navigation', 'menu_class' => 'secondary-menu')); ?>
								</nav>
								<a class="search-open" href="#">
									<img src="<?php echo get_template_directory_uri(); ?>/assets/images/header/search.svg" alt="<?php bloginfo('name'); ?>" />
								</a>
							</div>							
						</div>
					</div>
				</div>
			</header>