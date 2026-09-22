<?php
/**
 * Theme plugin configuration.
 *
 * Registers plugins recommended for WebsiteNI projects.
 */

defined('ABSPATH') || exit;


/**
 * TGM Plugin Activation.
 */
require_once get_template_directory()
	. '/modules/class-tgm-plugin-activation.php';


/**
 * Register WebsiteNI starter plugins.
 */
function websiteni_joints_bundled_plugins() {

	$plugins = array(

		array(
			'name'   => 'Advanced Custom Fields Pro',
			'slug'   => 'advanced-custom-fields-pro',
			'source' => get_stylesheet_directory()
				. '/modules/tgm/advanced-custom-fields-pro.zip',
		),

		array(
			'name'   => 'Formidable Forms',
			'slug'   => 'formidable',
			'source' => get_stylesheet_directory()
				. '/modules/tgm/formidable.zip',
		),

		array(
			'name'   => 'Formidable Forms Pro',
			'slug'   => 'formidable-forms-pro',
			'source' => get_stylesheet_directory()
				. '/modules/tgm/formidable-pro.zip',
		),

		array(
			'name'   => 'WPMU DEV Dashboard',
			'slug'   => 'wpmu-dev-dashboard',
			'source' => get_stylesheet_directory()
				. '/modules/tgm/wpmu-dev-dashboard.zip',
		),

		array(
			'name'   => 'Yoast SEO',
			'slug'   => 'yoast-seo',
			'source' => get_stylesheet_directory()
				. '/modules/tgm/yoast-seo.zip',
		),

		array(
			'name'   => 'Smush Pro',
			'slug'   => 'smush-pro',
			'source' => get_stylesheet_directory()
				. '/modules/tgm/smush-pro.zip',
		),

		array(
			'name'   => 'Custom Post Type UI',
			'slug'   => 'custom-post-type-ui',
			'source' => get_stylesheet_directory()
				. '/modules/tgm/custom-post-type-ui.zip',
		),

		array(
			'name'   => 'LiteSpeed Cache',
			'slug'   => 'litespeed-cache',
			'source' => get_stylesheet_directory()
				. '/modules/tgm/litespeed-cache.zip',
		),

		array(
			'name'   => 'Show Current Template',
			'slug'   => 'show-current-template',
			'source' => get_stylesheet_directory()
				. '/modules/tgm/show-current-template.zip',
		),
	);

	$config = array(
		'id'           => 'websiteni-plugins',
		'default_path' => '',
		'menu'         => 'tgmpa-install-plugins',
		'parent_slug'  => 'themes.php',
		'capability'   => 'edit_theme_options',
		'has_notices'  => true,
		'dismissable'  => true,
		'dismiss_msg'  => '',
		'is_automatic' => false,
		'message'      => '',
	);

	tgmpa(
		$plugins,
		$config
	);
}

add_action(
	'tgmpa_register',
	'websiteni_joints_bundled_plugins'
);