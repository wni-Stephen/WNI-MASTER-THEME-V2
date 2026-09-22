<?php
/**
 * Advanced Custom Fields configuration.
 */

defined('ABSPATH') || exit;


/**
 * Register ACF Options pages.
 *
 * ACF plugins are loaded before the active theme,
 * so the ACF functions are normally available by
 * the time this module is required.
 */
if (function_exists('acf_add_options_page')) {


	acf_add_options_page(
		array(
			'page_title' => 'Global Settings',
			'menu_title' => 'Global Settings',
			'menu_slug'  => 'general-settings',
		)
	);

	acf_add_options_sub_page(
		array(
			'page_title'  => 'General Settings',
			'menu_title'  => 'General Settings',
			'parent_slug' => 'general-settings',
		)
	);

	acf_add_options_sub_page(
		array(
			'page_title'  => 'Footer Settings',
			'menu_title'  => 'Footer Settings',
			'parent_slug' => 'general-settings',
		)
	);
}