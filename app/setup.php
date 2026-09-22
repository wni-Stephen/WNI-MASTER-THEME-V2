<?php
/**
 * Theme setup.
 *
 * Registers WordPress theme support and navigation menus.
 */

defined('ABSPATH') || exit;


/**
 * Configure theme features.
 */
function websiteni_joints_theme_setup() {

	/**
	 * Let WordPress manage the document title.
	 */
	add_theme_support('title-tag');

	/**
	 * Enable featured images.
	 */
	add_theme_support('post-thumbnails');

	/**
	 * Register navigation menu locations.
	 */
	register_nav_menus(
		array(
			'primary-navigation' => __(
				'Primary Navigation',
				'websiteni-foundation'
			),

			'secondary-navigation' => __(
				'Secondary Navigation',
				'websiteni-foundation'
			),
		)
	);
}

add_action(
	'after_setup_theme',
	'websiteni_joints_theme_setup'
);