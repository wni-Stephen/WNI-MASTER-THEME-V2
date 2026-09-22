<?php
/**
 * Theme helper functions.
 */

defined('ABSPATH') || exit;


/**
 * Custom 404 page title.
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
 * Custom post excerpt.
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
 * Move comment field to the bottom of the comment form.
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