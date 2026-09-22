<?php
/**
 * Theme activation setup.
 *
 * Handles one-time setup tasks when the theme is activated.
 */

defined('ABSPATH') || exit;


/**
 * Create a Home page and set it as the static front page.
 */
function websiteni_joints_theme_activation_setup() {

	$home_page = get_page_by_path(
		'home',
		OBJECT,
		'page'
	);

	/**
	 * Create the Home page if it does not already exist.
	 */
	if (!$home_page) {

		$home_page_id = wp_insert_post(
			array(
				'post_type'    => 'page',
				'post_title'   => 'Home',
				'post_name'    => 'home',
				'post_content' => '',
				'post_status'  => 'publish',
			)
		);

		if (
			is_wp_error($home_page_id)
			|| !$home_page_id
		) {
			return;
		}

	} else {

		$home_page_id = $home_page->ID;
	}

	/**
	 * Set Home as the static front page.
	 */
	update_option(
		'page_on_front',
		$home_page_id
	);

	update_option(
		'show_on_front',
		'page'
	);
}

add_action(
	'after_switch_theme',
	'websiteni_joints_theme_activation_setup'
);