<?php
/**
 * Theme plugin configuration.
 *
 * Handles bundled plugin registration and
 * starter-theme plugin housekeeping.
 */

defined('ABSPATH') || exit;


/**
 * Goodbye Dolly.
 */
function website_joints_goodbye_dolly() {

	if (!file_exists(WP_PLUGIN_DIR . '/hello.php')) {
		return;
	}

	require_once ABSPATH . 'wp-admin/includes/plugin.php';
	require_once ABSPATH . 'wp-admin/includes/file.php';

	delete_plugins(
		array(
			'hello.php',
		)
	);
}

add_action(
	'admin_init',
	'website_joints_goodbye_dolly'
);


/**
 * TGM Plugin Activation.
 */
require_once get_template_directory()
	. '/modules/class-tgm-plugin-activation.php';


/**
 * Register bundled plugins.
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
			'name'   => 'Litespeed Cache',
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
		'id'           => 'tgmpa',
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


/**
 * Activate Akismet Anti-Spam.
 */
function websiteni_joints_activate_akismet_anti_spam($plugin) {

	if (!function_exists('activate_plugin')) {
		require_once ABSPATH . 'wp-admin/includes/plugin.php';
	}

	if (!is_plugin_active($plugin)) {
		activate_plugin($plugin);
	}
}

websiteni_joints_activate_akismet_anti_spam(
	'akismet/akismet.php'
);