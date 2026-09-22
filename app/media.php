<?php
/**
 * Media configuration.
 *
 * Handles additional media types used by WebsiteNI projects.
 */

defined('ABSPATH') || exit;


/**
 * Allow SVG uploads for administrators only.
 *
 * SVG files can contain executable content, so they should
 * not be available to general WordPress users by default.
 */
function websiteni_joints_add_svg_to_upload_mimes($upload_mimes) {

	if (!current_user_can('manage_options')) {
		return $upload_mimes;
	}

	$upload_mimes['svg']  = 'image/svg+xml';
	$upload_mimes['svgz'] = 'image/svg+xml';

	return $upload_mimes;
}

add_filter(
	'upload_mimes',
	'websiteni_joints_add_svg_to_upload_mimes'
);


/**
 * Help WordPress recognise SVG file types.
 */
function websiteni_joints_check_svg_filetype($data, $file, $filename, $mimes) {

	if (!current_user_can('manage_options')) {
		return $data;
	}

	$filetype = wp_check_filetype(
		$filename,
		$mimes
	);

	if ('svg' === $filetype['ext']) {

		$data['ext']  = 'svg';
		$data['type'] = 'image/svg+xml';
	}

	if ('svgz' === $filetype['ext']) {

		$data['ext']  = 'svgz';
		$data['type'] = 'image/svg+xml';
	}

	return $data;
}

add_filter(
	'wp_check_filetype_and_ext',
	'websiteni_joints_check_svg_filetype',
	10,
	4
);