<?php
/**
 * WebsiteNI Starter Theme
 *
 * Built on JointsWP.
 * Created by WebsiteNI.
 */
defined('ABSPATH') || exit;
$theme_uri = get_template_directory_uri();
$site_name = get_bloginfo(
	'name',
	'display'
);
$custom_logo_id = get_theme_mod(
	'custom_logo'
);
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="author" content="WebsiteNI">
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="wrapper" class="wrapper">
		<div id="skip-navigation-link">
			<a href="#content">
				Skip to Main Content
			</a>
		</div>
		<div class="cookie-policy" style="display: none;">
			<div class="grid-x grid-padding-x flex paddingtopsml paddingbottomsml">
				<div class="cell small-10">
					<h5>
						Your privacy is important to us.
					</h5>
				</div>
				<div class="cell small-12">
					<p>
						This website uses cookies to help deliver its services.
						By using this website, you agree to the use of cookies as
						outlined in our
						<a href="<?php echo esc_url(
							home_url('/privacy-policy/')
						); ?>">
							Privacy Notice
						</a>.
					</p>
					<button class="button inverse" type="button">
						Okay, Got It
					</button>
				</div>
			</div>
		</div>
		<div class="navigation-overlay">
			<nav aria-label="Primary navigation">
				<a class="close" href="#" aria-label="Close menu">
					<img src="<?php echo esc_url(
						$theme_uri
						. '/assets/images/header/close.svg'
					); ?>" alt="">
				</a>
				<?php
				wp_nav_menu(
					array(
						'theme_location' => 'primary-navigation',
						'menu_class' => 'primary-menu',
					)
				);
				?>
			</nav>
		</div>
		<div id="wrapper-inner" class="wrapper-inner">
			<header class="navigation">
				<div class="grid-container full">
					<div class="grid-container">
						<div class="grid-x grid-padding-x">
							<!-- Logo -->
							<div
								class="cell small-6 large-3 companylogo wni-flex wni-flex-justify-start wni-flex-align-center">
								<a class="company-logo" href="<?php echo esc_url(
									home_url('/')
								); ?>" title="<?php echo esc_attr(
								 	$site_name
								 ); ?>" rel="home">
									<?php if ($custom_logo_id): ?>
										<?php
										echo wp_get_attachment_image(
											$custom_logo_id,
											'full',
											false,
											array(
												'class' => 'custom-logo',
												'alt' => $site_name,
											)
										);
										?>
									<?php else: ?>
										<img src="<?php echo esc_url(
											$theme_uri
											. '/assets/images/header/companylogo.svg'
										); ?>" alt="<?php echo esc_attr(
										 	$site_name
										 ); ?>">
									<?php endif; ?>
								</a>
							</div>
							<!-- Mobile search + hamburger -->
							<div
								class="cell small-6 hide-for-large wni-flex wni-flex-justify-end wni-flex-align-center">
								<button class="search-open" type="button" aria-label="Open search">
									<img src="<?php echo esc_url(
										$theme_uri
										. '/assets/images/header/search.svg'
									); ?>" alt="">
								</button>
								<button class="hamburger hamburger--slider-r" type="button" aria-label="Open menu">
									<span class="hamburger-box">
										<span class="hamburger-inner"></span>
									</span>
								</button>
							</div>
							<!-- Desktop navigation + search -->
							<div
								class="cell large-8 large-offset-1 show-for-large wni-flex wni-flex-justify-end wni-flex-align-center">
								<nav aria-label="Secondary navigation">
									<?php
									wp_nav_menu(
										array(
											'theme_location' => 'secondary-navigation',
											'menu_class' => 'secondary-menu',
										)
									);
									?>
								</nav>
								<button class="search-open" type="button" aria-label="Open search">
									<img src="<?php echo esc_url(
										$theme_uri
										. '/assets/images/header/search.svg'
									); ?>" alt="">
								</button>
							</div>
						</div>
					</div>
				</div>
			</header>