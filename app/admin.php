<?php
/**
 * WordPress admin customisations.
 *
 * Handles the login screen, TinyMCE configuration,
 * dashboard customisation and editor settings.
 */

defined('ABSPATH') || exit;


/**
 * Custom WordPress login logo.
 */
function websiteni_changelogin_logo() {

	$logo_url = get_template_directory_uri()
		. '/assets/images/header/companylogo.svg';

	echo '<style type="text/css">

		h1 a {
			background-image: url("' . esc_url($logo_url) . '") !important;
			background-position: center;
			width: 100% !important;
			height: 30px !important;
			background-size: contain !important;
		}

		body.login {
			display: flex;
			align-content: center;
			justify-content: center;
		}

		#login {
			padding: 40px 0;
		}

		.wp-core-ui .button-primary {
			background: #000000;
			border-color: #000000;
		}

	</style>';
}

add_action(
	'login_head',
	'websiteni_changelogin_logo'
);


/**
 * TinyMCE colour palette.
 */
function websiteni_joints_tinymce_colours($init) {

	/**
	 * Update these colours for each project as required.
	 */
	$custom_colours = '
		"242e5c", "Navy",
		"e32121", "Red",
		"ededed", "Grey"
	';

	$init['textcolor_map']  = '[' . $custom_colours . ']';
	$init['textcolor_rows'] = 1;

	return $init;
}

add_filter(
	'tiny_mce_before_init',
	'websiteni_joints_tinymce_colours'
);


/**
 * TinyMCE custom formats.
 */
function websiteni_joints_tinymce_formats($init_array) {

	$init_array['formats'] = wp_json_encode(
		array(
			'buttonprimary' => array(
				'selector' => 'p',
				'block'    => 'p',
				'classes'  => 'buttonprimary',
			),

			'plarge' => array(
				'selector' => 'p',
				'block'    => 'p',
				'classes'  => 'plarge',
			),
		)
	);

	$block_formats = array(
		'Paragraph=p',
		'Paragraph Large=plarge',
		'Heading 1=h1',
		'Heading 2=h2',
		'Heading 3=h3',
		'Heading 4=h4',
		'Heading 5=h5',
		'Heading 6=h6',
		'Preformatted=pre',
		'Button Underline=buttonunderline',
	);

	$init_array['block_formats'] = implode(
		';',
		$block_formats
	);

	return $init_array;
}

add_filter(
	'tiny_mce_before_init',
	'websiteni_joints_tinymce_formats'
);


/**
 * Disable Gutenberg.
 */
add_filter(
	'use_block_editor_for_post',
	'__return_false'
);


/**
 * Remove WordPress welcome panel.
 */
remove_action(
	'welcome_panel',
	'wp_welcome_panel'
);


/**
 * Remove default dashboard widgets.
 */
function websiteni_joints_remove_dashboard_widgets() {

	remove_meta_box(
		'dashboard_right_now',
		'dashboard',
		'normal'
	);

	remove_meta_box(
		'dashboard_activity',
		'dashboard',
		'normal'
	);

	remove_meta_box(
		'dashboard_quick_press',
		'dashboard',
		'side'
	);

	remove_meta_box(
		'dashboard_primary',
		'dashboard',
		'side'
	);
}

add_action(
	'admin_init',
	'websiteni_joints_remove_dashboard_widgets'
);


/**
 * Add WebsiteNI dashboard widget.
 */
function websiteni_joints_custom_dashboard_widgets() {

	wp_add_dashboard_widget(
		'websiteni_joints_widget',
		'WebsiteNI - Do you need help?',
		'websiteni_joints_widget_dashboard'
	);
}

add_action(
	'wp_dashboard_setup',
	'websiteni_joints_custom_dashboard_widgets'
);


/**
 * WebsiteNI dashboard widget content.
 */
function websiteni_joints_widget_dashboard() {

	echo wp_kses_post(
		'Welcome to your new WordPress website. We hope everything is going well, but if it\'s not and you need a hand, feel free to reach out for some support. The contact email for your project is <a href="mailto:support@websiteni.com">support@websiteni.com</a>.'
	);
}


/**
 * Custom WordPress admin footer.
 */
function websiteni_joints_custom_dashboard_footer() {

	echo wp_kses_post(
		'Created by <a href="https://websiteni.com" target="_blank" rel="noopener noreferrer">WebsiteNI</a>'
	);
}

add_filter(
	'admin_footer_text',
	'websiteni_joints_custom_dashboard_footer'
);