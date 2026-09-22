<?php
/**
 * WordPress security and front-end cleanup.
 */

defined('ABSPATH') || exit;


/**
 * Enable automatic plugin updates.
 */
add_filter(
	'auto_update_plugin',
	'__return_true'
);


/**
 * Disable XML-RPC.
 */
add_filter(
	'xmlrpc_enabled',
	'__return_false'
);


/**
 * Hide WordPress version.
 */
function websiteni_joints_hide_wordpress_version() {
	return '';
}

add_filter(
	'the_generator',
	'websiteni_joints_hide_wordpress_version'
);


/**
 * Obscure WordPress login errors.
 */
function websiteni_joints_obscure_login_errors() {
	return 'Something wasn\'t quite right there, please try again.';
}

add_filter(
	'login_errors',
	'websiteni_joints_obscure_login_errors'
);


/**
 * Disable WordPress emoji assets.
 */
function websiteni_joints_disable_emoji_mess() {

	remove_action(
		'admin_print_styles',
		'print_emoji_styles'
	);

	remove_action(
		'wp_head',
		'print_emoji_detection_script',
		7
	);

	remove_action(
		'admin_print_scripts',
		'print_emoji_detection_script'
	);

	remove_action(
		'wp_print_styles',
		'print_emoji_styles'
	);

	remove_filter(
		'wp_mail',
		'wp_staticize_emoji_for_email'
	);

	remove_filter(
		'the_content_feed',
		'wp_staticize_emoji'
	);

	remove_filter(
		'comment_text_rss',
		'wp_staticize_emoji'
	);

	add_filter(
		'emoji_svg_url',
		'__return_false'
	);
}

add_action(
	'init',
	'websiteni_joints_disable_emoji_mess'
);


/**
 * Emoji TinyMCE helper.
 *
 * Retained from the existing starter theme.
 */
function websiteni_joints_disable_emoji_tinymce($plugins) {

	return is_array($plugins)
		? array_diff($plugins, array('wpemoji'))
		: array();
}


/**
 * Remove obsolete type attributes from enqueued CSS/JS.
 */
function websiteni_joints_remove_type_attributes($tag, $handle) {

	return preg_replace(
		"/type=['\"]text\/(javascript|css)['\"]/",
		'',
		$tag
	);
}

add_filter(
	'style_loader_tag',
	'websiteni_joints_remove_type_attributes',
	10,
	2
);

add_filter(
	'script_loader_tag',
	'websiteni_joints_remove_type_attributes',
	10,
	2
);


/**
 * Remove jQuery Migrate from the front end.
 */
add_action(
	'wp_default_scripts',
	function($scripts) {

		if (empty($scripts->registered['jquery'])) {
			return;
		}

		$scripts->registered['jquery']->deps = array_diff(
			$scripts->registered['jquery']->deps,
			array('jquery-migrate')
		);
	}
);