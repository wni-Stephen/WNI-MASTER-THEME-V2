<?php
/**
* wni Joints
* wni Starter Theme built on JointsWP; http://jointswp.com/.
* Created by wni.
*/
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
	<head>
		<meta charset="<?php bloginfo('charset'); ?>" />
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=0">
		<meta name="author" content="wni">

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
				<div class="cookie-policy" style="display: none;">
				<div class="grid-x grid-padding-x flex align-center paddingtopsml paddingbottomsml">
					<div class="small-2 cell marginbottomxsml cookie">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/header/cookie.svg" alt="Cookie"/>
					</div>
					<div class="cell small-10 marginbottomxsml">
						<h5>Your privacy is important to us.</h5>
					</div>
					<div class="cell small-12">
						<p>
							This website uses cookies to help deliver its services. By using this website, you agree to the use of cookies as outlined in our <a href="<?php echo esc_url(home_url('/privacy-policy/')); ?>">Privacy Notice</a>.
						</p>
						<button class="button inverse">
							Okay, Got It
						</button>
					</div>
				</div> 
         	</div>
			<div class="navigation-overlay">
				<nav>
					<?php wp_nav_menu(array('theme_location' => 'primary-navigation', 'menu_class' => 'primary-menu')); ?>
				</nav>
			</div>

			<div id="wrapper-inner"  <?php if (!is_search()) : body_class(); else : body_class('wrapper-inner'); endif; ?>>

			<header class="navigation">
    <div class="grid-container full">
        <div class="grid-container">
            <div class="grid-x grid-padding-x">

                <!-- Logo -->
                <div class="cell small-6 large-3 companylogo wni-flex wni-flex-justify-start wni-flex-align-center">
                    <a class="company-logo" href="<?php echo esc_url(home_url('/')); ?>" 
                       title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/header/companylogo.svg" 
                             alt="<?php bloginfo('name'); ?>" />
                    </a>
                </div>

                <!-- Mobile search + hamburger -->
                <div class="cell small-6 hide-for-large wni-flex wni-flex-justify-end wni-flex-align-center">
                    <img class="search-open" src="<?php echo get_template_directory_uri(); ?>/assets/images/header/search.svg" alt="<?php bloginfo('name'); ?>" />
                    <button class="hamburger hamburger--slider-r" type="button" aria-label="Hamburger">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"></span>
                        </span>
                    </button>
                </div>								

                <!-- Desktop navigation + search -->
                <div class="cell large-8 large-offset-1 show-for-large wni-flex wni-flex-justify-end wni-flex-align-center">
                    <nav>
                        <?php wp_nav_menu(array(
                            'theme_location' => 'secondary-navigation', 
                            'menu_class' => 'secondary-menu'
                        )); ?>
                    </nav>
                    <a class="search-open" href="#">
                        <img src="<?php echo get_template_directory_uri(); ?>/assets/images/header/search.svg" 
                             alt="<?php bloginfo('name'); ?>" />
                    </a>
                </div>							

            </div>
        </div>
    </div>
</header>