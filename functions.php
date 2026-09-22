<?php
/**
 * WebsiteNI Joints
 *
 * WebsiteNI Starter Theme built on JointsWP.
 * Created by WebsiteNI.
 */

defined('ABSPATH') || exit;


/**
 * Theme modules.
 */
require_once get_template_directory() . '/app/assets.php';
require_once get_template_directory() . '/app/admin.php';
require_once get_template_directory() . '/app/security.php';


/**
 * Theme support.
 */
add_theme_support('title-tag');
add_theme_support('post-thumbnails');


/**
 * ACF Options.
 */
if (function_exists('acf_add_options_page')) {

	acf_add_options_page(
		array(
			'page_title' => 'Global Settings',
			'menu_slug'  => 'general-settings',
		)
	);

	acf_add_options_sub_page(
		array(
			'page_title'  => 'General Settings',
			'parent_slug' => 'general-settings',
		)
	);

	acf_add_options_sub_page(
		array(
			'page_title'  => 'Footer Settings',
			'parent_slug' => 'general-settings',
		)
	);
}


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


/**
 * Create Home page on theme activation.
 */
if (isset($_GET['activated']) && is_admin()) {

	$new_page_title    = 'Home';
	$new_page_content  = '';
	$new_page_template = '';

	$page_check = get_page_by_title(
		$new_page_title
	);

	$new_page = array(
		'post_type'    => 'page',
		'post_title'   => $new_page_title,
		'post_content' => $new_page_content,
		'post_status'  => 'publish',
		'post_author'  => 1,
	);

	if (!isset($page_check->ID)) {

		$new_page_id = wp_insert_post(
			$new_page
		);

		if (!empty($new_page_template)) {

			update_post_meta(
				$new_page_id,
				'_wp_page_template',
				$new_page_template
			);
		}
	}
}


/**
 * Set Home as the front page.
 */
function websiteni_joints_set_front_page() {

	$home = get_page_by_title('Home');

	if (!$home) {
		return;
	}

	update_option(
		'page_on_front',
		$home->ID
	);

	update_option(
		'show_on_front',
		'page'
	);
}

add_action(
	'after_setup_theme',
	'websiteni_joints_set_front_page'
);


/**
 * Enable SVG uploads.
 */
function websiteni_joints_add_svg_to_upload_mimes($upload_mimes) {

	$upload_mimes['svg']  = 'image/svg+xml';
	$upload_mimes['svgz'] = 'image/svg+xml';

	return $upload_mimes;
}

add_filter(
	'upload_mimes',
	'websiteni_joints_add_svg_to_upload_mimes',
	10,
	1
);


/**
 * Custom 404 Page Title.
 */
function websiteni_joints_new_404_title($title) {

	if (is_404()) {
		$title = 'Error 404 | Not Found | Project Name';
	}

	return $title;
}

add_filter(
	'wp_title',
	'websiteni_joints_new_404_title',
	50
);


/**
 * Navigation Menus.
 */
function websiteni_joints_register_navigation_menus() {

	register_nav_menu(
		'primary-navigation',
		__(
			'Primary Navigation',
			'websiteni-foundation'
		)
	);

	register_nav_menu(
		'secondary-navigation',
		__(
			'Secondary Navigation',
			'websiteni-foundation'
		)
	);
}

add_action(
	'init',
	'websiteni_joints_register_navigation_menus'
);


/**
 * Example Custom Post Type.
 *
 * Uncomment and customise when required.
 */
// function websiteni_joints_create_post_type() {
//
// 	register_post_type(
// 		'example',
// 		array(
// 			'labels' => array(
// 				'name'          => __('Examples'),
// 				'singular_name' => __('Example'),
// 			),
// 			'public'      => true,
// 			'has_archive' => true,
// 			'taxonomies'  => array('category'),
// 			'rewrite'     => array(
// 				'slug' => 'example',
// 			),
// 			'supports' => array(
// 				'title',
// 				'editor',
// 				'thumbnail',
// 			),
// 		)
// 	);
// }
//
// add_action(
// 	'init',
// 	'websiteni_joints_create_post_type'
// );


/**
 * Example Taxonomy.
 *
 * Uncomment and customise when required.
 */
// function websiteni_joints_create_taxonomy() {
//
// 	$labels = array(
// 		'name' => _x(
// 			'Examples',
// 			'Taxonomy General Name'
// 		),
//
// 		'menu_name' => __('Examples'),
//
// 		'singular_name' => _x(
// 			'Example',
// 			'Taxonomy Singular Name'
// 		),
//
// 		'add_new_item'      => __('Add New Example'),
// 		'new_item_name'     => __('New Example Name'),
// 		'edit_item'         => __('Edit Example'),
// 		'update_item'       => __('Update Example'),
// 		'all_items'         => __('All Examples'),
// 		'parent_item'       => __('Parent Example'),
// 		'parent_item_colon' => __('Parent Example:'),
// 		'search_items'      => __('Search Examples'),
// 	);
//
// 	register_taxonomy(
// 		'examples',
// 		array('post_type'),
// 		array(
// 			'labels'            => $labels,
// 			'show_ui'           => true,
// 			'show_admin_column' => true,
// 			'query_var'         => true,
// 			'hierarchical'      => true,
// 			'has_archive'       => true,
// 			'rewrite'           => array(
// 				'slug' => 'examples',
// 			),
// 		)
// 	);
// }
//
// add_action(
// 	'init',
// 	'websiteni_joints_create_taxonomy',
// 	0
// );


/**
 * Example Widget.
 *
 * Uncomment and customise when required.
 */
// function websiteni_joints_register_widgets() {
//
// 	register_sidebar(
// 		array(
// 			'id'            => 'example-widget',
// 			'name'          => 'Example Widget',
// 			'before_widget' => '<div>',
// 			'after_widget'  => '</div>',
// 			'before_title'  => '<h1>',
// 			'after_title'   => '</h1>',
// 		)
// 	);
// }
//
// add_action(
// 	'widgets_init',
// 	'websiteni_joints_register_widgets'
// );


/**
 * Custom Post Excerpt.
 */
function websiteni_joints_excerpt($limit) {

	$excerpt = explode(
		' ',
		get_the_excerpt(),
		$limit
	);

	if (count($excerpt) >= $limit) {

		array_pop($excerpt);

		$excerpt = implode(
			' ',
			$excerpt
		);

	} else {

		$excerpt = implode(
			' ',
			$excerpt
		);
	}

	$excerpt = preg_replace(
		'`\[[^\]]*\]`',
		'',
		$excerpt
	);

	return $excerpt;
}


/**
 * Move Comment Field.
 */
function websiteni_joints_comment_form_comment_field_to_bottom($fields) {

	if (empty($fields['comment'])) {
		return $fields;
	}

	$comment_field = $fields['comment'];

	unset($fields['comment']);

	$fields['comment'] = $comment_field;

	return $fields;
}

add_filter(
	'comment_form_fields',
	'websiteni_joints_comment_form_comment_field_to_bottom'
);


/**
 * Example: Exclude a Post Type from Search.
 *
 * Uncomment and customise when required.
 */
// function websiteni_joints_exclude_post_type_from_search($query) {
//
// 	if ($query->is_search) {
//
// 		$query->set(
// 			'post_type',
// 			'example'
// 		);
// 	}
//
// 	return $query;
// }
//
// add_filter(
// 	'pre_get_posts',
// 	'websiteni_joints_exclude_post_type_from_search'
// );