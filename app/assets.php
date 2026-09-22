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

	$theme_uri = get_template_directory_uri();
	$theme_path = get_template_directory();

	$style_path = $theme_path
		. '/assets/dist/style.css';

	$script_path = $theme_path
		. '/assets/dist/script.js';


	/**
	 * Main Vite stylesheet.
	 *
	 * Includes:
	 * - WebsiteNI theme styles
	 * - Hamburgers
	 */
	wp_enqueue_style(
		'wni-main',
		$theme_uri . '/assets/dist/style.css',
		array(),
		file_exists($style_path)
			? filemtime($style_path)
			: null
	);


	/**
	 * Main Vite JavaScript bundle.
	 *
	 * Includes:
	 * - Foundation
	 * - What Input
	 * - GSAP
	 * - ScrollTrigger
	 * - ScrollSmoother
	 * - WebsiteNI theme JavaScript
	 *
	 * jQuery is provided by WordPress and is
	 * externalised from the Vite bundle.
	 */
	wp_enqueue_script(
		'wni-main',
		$theme_uri . '/assets/dist/script.js',
		array(
			'jquery',
		),
		file_exists($script_path)
			? filemtime($script_path)
			: null,
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
function websiteni_joints_preconnect_google_fonts(
	$urls,
	$relation_type
) {

	if ('preconnect' !== $relation_type) {
		return $urls;
	}

	if (
		!wp_style_is(
			'wni-google-fonts',
			'queue'
		)
	) {
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