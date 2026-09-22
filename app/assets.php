<?php
/**
 * Front-end assets.
 *
 * Handles WebsiteNI theme styles, scripts and font loading.
 */

defined('ABSPATH') || exit;


/**
 * Enqueue front-end styles and scripts.
 */
function websiteni_joints_styles_and_scripts() {

	$theme_uri  = get_template_directory_uri();
	$theme_path = get_template_directory();

	$style_path  = $theme_path . '/assets/dist/style.css';
	$script_path = $theme_path . '/assets/dist/script.js';


	/**
	 * Main Vite stylesheet.
	 */
	wp_enqueue_style(
		'wni-main',
		$theme_uri . '/assets/dist/style.css',
		array(),
		file_exists($style_path) ? filemtime($style_path) : null
	);


	/**
	 * Hamburger menu styles.
	 */
	wp_enqueue_style(
		'wni-hamburgers',
		'https://cdnjs.cloudflare.com/ajax/libs/hamburgers/1.1.3/hamburgers.min.css',
		array(),
		'1.1.3'
	);


	/**
	 * Magnific Popup styles.
	 */
	wp_enqueue_style(
		'wni-magnific-popup',
		'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/magnific-popup.min.css',
		array(),
		'1.1.0'
	);


	/**
	 * Magnific Popup.
	 */
	wp_enqueue_script(
		'wni-magnific-popup',
		'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js',
		array('jquery'),
		'1.1.0',
		true
	);


	/**
	 * GSAP.
	 */
	wp_enqueue_script(
		'wni-gsap',
		'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/gsap.min.js',
		array(),
		'3.12.2',
		true
	);


	/**
	 * GSAP ScrollTrigger.
	 */
	wp_enqueue_script(
		'wni-gsap-scrolltrigger',
		'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollTrigger.min.js',
		array('wni-gsap'),
		'3.12.2',
		true
	);


	/**
	 * GSAP ScrollSmoother.
	 */
	wp_enqueue_script(
		'wni-gsap-scrollsmoother',
		'https://cdnjs.cloudflare.com/ajax/libs/gsap/3.12.2/ScrollSmoother.min.js',
		array(
			'wni-gsap',
			'wni-gsap-scrolltrigger',
		),
		'3.12.2',
		true
	);


	/**
	 * Main Vite JavaScript bundle.
	 *
	 * Includes:
	 * - Foundation
	 * - What Input
	 * - WebsiteNI theme JavaScript
	 */
	wp_enqueue_script(
		'wni-main',
		$theme_uri . '/assets/dist/script.js',
		array(
			'jquery',
			'wni-magnific-popup',
			'wni-gsap',
			'wni-gsap-scrolltrigger',
			'wni-gsap-scrollsmoother',
		),
		file_exists($script_path) ? filemtime($script_path) : null,
		true
	);
}

add_action(
	'wp_enqueue_scripts',
	'websiteni_joints_styles_and_scripts'
);


/**
 * Load Google Fonts.
 */
function websiteni_joints_google_fonts() {

	wp_enqueue_style(
		'wni-google-fonts',
		'https://fonts.googleapis.com/css2?family=Open+Sans:wght@300;400;500;600;700;800&display=swap',
		array(),
		null
	);
}

add_action(
	'wp_enqueue_scripts',
	'websiteni_joints_google_fonts'
);


/**
 * Add Google Fonts preconnect.
 */
function websiteni_joints_preconnect_google_fonts($urls, $relation_type) {

	if ('preconnect' !== $relation_type) {
		return $urls;
	}

	if (!wp_style_is('wni-google-fonts', 'queue')) {
		return $urls;
	}

	$urls[] = array(
		'href'        => 'https://fonts.gstatic.com',
		'crossorigin' => 'anonymous',
	);

	return $urls;
}

add_filter(
	'wp_resource_hints',
	'websiteni_joints_preconnect_google_fonts',
	10,
	2
);