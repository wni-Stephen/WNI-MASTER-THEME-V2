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
require_once get_template_directory() . '/app/setup.php';
require_once get_template_directory() . '/app/activation.php';
require_once get_template_directory() . '/app/assets.php';
require_once get_template_directory() . '/app/admin.php';
require_once get_template_directory() . '/app/security.php';
require_once get_template_directory() . '/app/acf.php';
require_once get_template_directory() . '/app/plugins.php';
require_once get_template_directory() . '/app/helpers.php';


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