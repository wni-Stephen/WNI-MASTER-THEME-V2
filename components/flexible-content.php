<?php
/**
 * Flexible Content Renderer.
 *
 * Renders ACF Page Content layouts from individual
 * component files inside /components/layouts/.
 */

defined('ABSPATH') || exit;


if (!function_exists('have_rows')) {
	return;
}

if (!have_rows('page_content')) {
	return;
}


while (have_rows('page_content')) {

	the_row();

	$layout = get_row_layout();

	if (!$layout) {
		continue;
	}

	/**
	 * ACF layout names should be simple slugs,
	 * but sanitise before using as a template path.
	 */
	$layout = sanitize_file_name($layout);

	$template = get_template_directory()
		. '/components/layouts/'
		. $layout
		. '.php';

	if (file_exists($template)) {
		include $template;
	}
}