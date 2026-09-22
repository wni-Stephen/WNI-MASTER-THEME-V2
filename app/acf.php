<?php
/**
 * Advanced Custom Fields configuration.
 */

defined('ABSPATH') || exit;


/**
 * Register ACF Options pages.
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


/**
 * Save ACF field groups to the theme.
 */
function websiteni_joints_acf_json_save_point($path) {

	return get_template_directory() . '/acf-json';
}

add_filter(
	'acf/settings/save_json',
	'websiteni_joints_acf_json_save_point'
);


/**
 * Load ACF field groups from the theme.
 */
function websiteni_joints_acf_json_load_point($paths) {

	$paths[] = get_template_directory() . '/acf-json';

	return $paths;
}

add_filter(
	'acf/settings/load_json',
	'websiteni_joints_acf_json_load_point'
);