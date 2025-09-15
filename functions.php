<?php
/**
* WebsiteNI Joints
* WebsiteNI Starter Theme built on JointsWP; http://jointswp.com/.
* Created by WebsiteNI.
*/


//add_filter( 'login_display_language_dropdown', '__return_false' ); add_filter( 'login_display_language_dropdown', '__return_false' );


// CUSTOM LOGIN URL
function websiteni_changelogin_logo() {
	echo "<style type='text/css'>
	h1 a {
		background-image: url(". get_bloginfo('template_directory') ."/assets/images/header/companylogo.svg) !important;
		background-positon: center;
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
	</style>";
}
add_action('login_head', 'websiteni_changelogin_logo');

function my_mce4_options($init) {
	//update these colours to your most commonly used colours - add and remove as needed
    $custom_colours = '
        "242e5c", "Navy", 
        "e32121", "Red",
        "ededed", "Grey",
    ';

    // build colour grid default+custom colors
    $init['textcolor_map'] = '['.$custom_colours.']';

    // change the number of rows in the grid if the number of colors changes
    // 8 swatches per row
    $init['textcolor_rows'] = 1;

    return $init;
}
add_filter('tiny_mce_before_init', 'my_mce4_options');

add_filter('tiny_mce_before_init', function($init_array) {
    $init_array['formats'] = json_encode([
        // add new format to formats
        'buttonprimary' => [
            'selector' => 'p',
            'block'    => 'p',
            'classes'  => 'buttonprimary',
        ],
        'plarge' => [
            'selector' => 'p',
            'block'    => 'p',
            'classes'  => 'plarge',
        ],
    ], JSON_THROW_ON_ERROR);

    // remove from that array not needed formats
    $block_formats = [
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
    ];
    $init_array['block_formats'] = implode(';', $block_formats);

    return $init_array;
});
/**
* Security.
*/
add_filter('auto_update_plugin', '__return_true');
add_filter('xmlrpc_enabled', '__return_false');

function websiteni_joints_hide_wordpress_version() {
	return '';
}

add_filter('the_generator', 'websiteni_joints_hide_wordpress_version');

function websiteni_joints_obscure_login_errors() {
	return 'Something wasn\'t quite right there, please try again.';
}

add_filter('login_errors', 'websiteni_joints_obscure_login_errors');

/**
* Add Theme Support.
*/
add_theme_support('title-tag');
add_theme_support('post-thumbnails');


//ACF Options
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'    => 'Global Settings',
        'menu_slug'     => 'general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'General Settings',
        'parent_slug'   => 'general-settings',
    ));
    acf_add_options_sub_page(array(
        'page_title' => 'Footer Settings',
        'parent_slug'   => 'general-settings',
    ));
}

/**
* Enqueue Styles, Scripts and Non-Google Fonts.
*/
function websiteni_joints_styles_and_scripts() {
	wp_enqueue_style('css', get_template_directory_uri() . '/assets/styles/style.css', array());
	wp_enqueue_script('js', get_template_directory_uri() . '/assets/scripts/script.js', array('jquery'), '', true);
	
	wp_enqueue_script('wow', 'https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.min.js', array('jquery'), '', true);
	wp_enqueue_script('slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', array('jquery'), '', true);
	wp_enqueue_script('magnific', 'https://cdnjs.cloudflare.com/ajax/libs/magnific-popup.js/1.1.0/jquery.magnific-popup.min.js', array('jquery'), '', true);
	wp_enqueue_script('functions', get_template_directory_uri() . '/assets/scripts/functions.js', array('jquery'), '', true);
	// wp_enqueue_style('fonts', get_template_directory_uri() . '/assets/fonts/fonts.css', array());

	// Example of how to load Styles and Scripts Conditionally.
	// Specify the Condition.
	// if (is_front_page()) {
	// if (is_page('example')) {
	// if (is_single('example')) {
		// If Condition is met load these Styles and Scripts.
		// wp_enqueue_style('css', get_template_directory_uri() . '/assets/styles/specific-style.css', array());
		// wp_enqueue_script('js', get_template_directory_uri() . '/assets/scripts/specific-script.js', array('jquery'), '', true);
	// } else {
		// If Condition is not met load Global Styles and Scripts.
		// wp_enqueue_style('css', get_template_directory_uri() . '/assets/styles/global-style.css', array());
		// wp_enqueue_script('js', get_template_directory_uri() . '/assets/scripts/global-script.js', array('jquery'), '', true);
	// }
}
add_action('wp_enqueue_scripts', 'websiteni_joints_styles_and_scripts');

/**
* Preconnect and Enqueue Google Fonts.
*/
function websiteni_joints_preconnect_google_fonts($urls, $relation_type) {
		if (wp_style_is('enqueue_font_id', 'queue') && 'preconnect' === $relation_type) {
			if (version_compare($GLOBALS['wp_version'], '4.7-alpha', '>=')) {
				$urls[] = array(
					'href' => 'https://fonts.gstatic.com',
					'crossorigin',
				);
			} else {
				$urls[] = 'https://fonts.gstatic.com';
			}
		}

		return $urls;
	}

	add_filter('wp_resource_hints', 'websiteni_joints_preconnect_google_fonts', 10, 2);

function websiteni_joints_google_fonts() {
	wp_register_style('OpenSans', 'https://fonts.googleapis.com/css?family=Open+Sans:100,200,300,400,500,600,700,800,900');
	wp_enqueue_style('OpenSans');
}

add_action('wp_enqueue_scripts', 'websiteni_joints_google_fonts');

/**
* Disable Emoji Mess.
*/
function websiteni_joints_disable_emoji_mess() {
	remove_action('admin_print_styles', 'print_emoji_styles');
    remove_action('wp_head', 'print_emoji_detection_script', 7);
    remove_action('admin_print_scripts', 'print_emoji_detection_script');
    remove_action('wp_print_styles', 'print_emoji_styles');
    remove_filter('wp_mail', 'wp_staticize_emoji_for_email');
    remove_filter('the_content_feed', 'wp_staticize_emoji');
    remove_filter('comment_text_rss', 'wp_staticize_emoji');
    add_filter('emoji_svg_url', '__return_false');
}

add_action('init', 'websiteni_joints_disable_emoji_mess');

function websiteni_joints_disable_emoji_tinymce($plugins) {
	return is_array($plugins) ? array_diff($plugins, array('wpemoji')) : array();
}

/**
* Remove Query Strings.
*/
function websiteni_joints_remove_query_strings($src) {
	$parts = explode('?ver', $src);
	return $parts[0];
}

add_filter('style_loader_src', 'websiteni_joints_remove_query_strings', 15, 1);
add_filter('script_loader_src', 'websiteni_joints_remove_query_strings', 15, 1);

/**
* Remove Type Attributes.
*/
function websiteni_joints_remove_type_attributes($tag, $handle) {
	return preg_replace("/type=['\"]text\/(javascript|css)['\"]/", '', $tag);
}

add_filter('style_loader_tag', 'websiteni_joints_remove_type_attributes', 10, 2);
add_filter('script_loader_tag', 'websiteni_joints_remove_type_attributes', 10, 2);

/**
* Disable jQuery Migrate Message.
*/
add_action('wp_default_scripts', function($scripts) {
    if (!empty($scripts->registered['jquery'])) {
        $scripts->registered['jquery']->deps = array_diff($scripts->registered['jquery']->deps, ['jquery-migrate']);
    }
});

/**
* Disable Gutenberg.
*/
add_filter('use_block_editor_for_post', '__return_false');

/**
* Remove Welcome Panel.
*/
remove_action('welcome_panel', 'wp_welcome_panel');

/**
* Remove Dashboard Widgets.
*/
function websiteni_joints_remove_dashboard_widgets() {
	remove_meta_box('dashboard_right_now', 'dashboard', 'normal');
    remove_meta_box('dashboard_activity', 'dashboard', 'normal');
    remove_meta_box('dashboard_quick_press', 'dashboard', 'side');
    remove_meta_box('dashboard_primary', 'dashboard', 'side');
}

add_action('admin_init', 'websiteni_joints_remove_dashboard_widgets');

/**
* Custom Dashboard Widget and Footer.
*/
add_action('wp_dashboard_setup', 'websiteni_joints_custom_dashboard_widgets');

function websiteni_joints_custom_dashboard_widgets() {
	global $wp_meta_boxes;

	wp_add_dashboard_widget('websiteni_joints_widget', 'WebsiteNI, "Do you need help?".', 'websiteni_joints_widget_dashboard');
}

function websiteni_joints_widget_dashboard() {
	echo 'Welcome to your new WordPress website. We hope everything is going well, but if it\'s not and you need a hand, feel free to reach out for some support. The contact email for your project is <a href="mailto:support@websiteni.com">support@websiteni.com</a>.';
}

function websiteni_joints_custom_dashboard_footer() {
	echo 'Created by <a href="https://websiteni.com" target="_blank">WebsiteNI</a>';
}

add_filter('admin_footer_text', 'websiteni_joints_custom_dashboard_footer');

/**
* Goodbye Dolly.
*/
function website_joints_goodbye_dolly() {
	if (file_exists(WP_PLUGIN_DIR . '/hello.php')) {
		require_once(ABSPATH . 'wp-admin/includes/plugin.php');
		require_once(ABSPATH . 'wp-admin/includes/file.php');
		delete_plugins(array('hello.php'));
	}
}
add_action('admin_init', 'website_joints_goodbye_dolly');

/**
* Bundled Plugins.
*/
require_once get_template_directory() . '/modules/class-tgm-plugin-activation.php';

add_action('tgmpa_register', 'websiteni_joints_bundled_plugins');

function websiteni_joints_bundled_plugins() {
	/*
	 * Array of plugin arrays. Required keys are name and slug.
	 * If the source is NOT from the .org repo, then source is also required.
	 */
	$plugins = array(

		// This is an example of how to include a plugin bundled with a theme.
		array(
			'name'				 =>	'Advanced Custom Fields Pro',
			'slug'				 =>	'advanced-custom-fields-pro',
			'source'             => get_stylesheet_directory() . '/modules/tgm/advanced-custom-fields-pro.zip', // The plugin source.
		),
		array(
			'name'		=>	'Formidable Forms',
			'slug'		=>	'formidable',
			'source'	=>	get_stylesheet_directory() . '/modules/tgm/formidable.zip',
		),
		array(
			'name'		=>	'Formidable Forms Pro',
			'slug'		=>	'formidable-forms-pro',
			'source'	=>	get_stylesheet_directory() . '/modules/tgm/formidable-pro.zip',
		),
		array(
			'name'		=>	'WPMU DEV Dashboard',
			'slug'		=>	'wpmu-dev-dashboard',
			'source'	=>	get_stylesheet_directory() . '/modules/tgm/wpmu-dev-dashboard.zip',
		),
		array(
			'name'		=>	'Yoast SEO',
			'slug'		=>	'yoast-seo',
			'source'	=>	get_stylesheet_directory() . '/modules/tgm/yoast-seo.zip',
		),
		array(
			'name'		=>	'Smush Pro',
			'slug'		=>	'smush-pro',
			'source'	=>	get_stylesheet_directory() . '/modules/tgm/smush-pro.zip',
		),
		array(
			'name'		=>	'Custom Post Type UI',
			'slug'		=>	'custom-post-type-ui',
			'source'	=>	get_stylesheet_directory() . '/modules/tgm/custom-post-type-ui.zip',
		),
		array(
			'name'		=>	'Litespeed Cache',
			'slug'		=>	'litespeed-cache',
			'source'	=>	get_stylesheet_directory() . '/modules/tgm/litespeed-cache.zip',
		),
		array(
			'name'		=>	'Show Current Template',
			'slug'		=>	'show-current-template',
			'source'	=>	get_stylesheet_directory() . '/modules/tgm/show-current-template.zip',
		),

	);
	$config = array(
		'id'           => 'tgmpa',                 // Unique ID for hashing notices for multiple instances of TGMPA.
		'default_path' => '',                      // Default absolute path to bundled plugins.
		'menu'         => 'tgmpa-install-plugins', // Menu slug.
		'parent_slug'  => 'themes.php',            // Parent menu slug.
		'capability'   => 'edit_theme_options',    // Capability needed to view plugin install page, should be a capability associated with the parent menu used.
		'has_notices'  => true,                    // Show admin notices or not.
		'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
		'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
		'is_automatic' => false,                   // Automatically activate plugins after installation or not.
		'message'      => '',                      // Message to output right before the plugins table.
	);

	tgmpa( $plugins, $config );
}
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

websiteni_joints_activate_akismet_anti_spam('akismet/akismet.php');
/**
* Create and Set Front Page.
*/
if (isset($_GET['activated']) && is_admin()) {
	$new_page_title = 'Home';
	$new_page_content = '';
	$new_page_template = '';

	$page_check = get_page_by_title($new_page_title);

	$new_page = array(
		'post_type'			=>	'page',
		'post_title'		=>	$new_page_title,
		'post_content'		=>	$new_page_content,
		'post_status'		=>	'publish',
		'post_author'		=>	1,
	);

	if (!isset($page_check->ID)) {
		$new_page_id = wp_insert_post($new_page);

		if (!empty($new_page_template)) {
			update_post_meta($new_page_id, '_wp_page_template', $new_page_template);
		}
	}
}

function websiteni_joints_set_front_page() {
	$home = get_page_by_title('Home');
	if ($home) {
		update_option('page_on_front', $home->ID);
		update_option('show_on_front', 'page');
	}
}

add_action('after_setup_theme', 'websiteni_joints_set_front_page');

/**
* Enable SVG's.
*/
function websiteni_joints_add_svg_to_upload_mimes($upload_mimes) {
	$upload_mimes['svg'] = 'image/svg+xml';
	$upload_mimes['svgz'] = 'image/svg+xml';
	return $upload_mimes;
}

add_filter('upload_mimes', 'websiteni_joints_add_svg_to_upload_mimes', 10, 1);

/**
* Custom 404 Page Title.
*/
function websiteni_joints_new_404_title($title) {
	if (is_404()) {
		$title = "Error 404 | Not Found | Project Name";
	}
	return $title;
}

add_filter('wp_title', 'websiteni_joints_new_404_title', 50);

/**
* Create Navigation Menus.
*/
function websiteni_joints_register_navigation_menus() {
	register_nav_menu('primary-navigation', __('Primary Navigation', 'websiteni-foundation'));
	register_nav_menu('secondary-navigation', __('Secondary Navigation', 'websiteni-foundation'));
}

add_action('init', 'websiteni_joints_register_navigation_menus');

/**
* Create Post Types.
*/
// function websiteni_joints_create_post_type() {
// 	register_post_type('example',
// 		array(
// 			'labels' => array(
// 				'name' => __('Examples'),
// 				'singular_name' => __('Example')
// 			),
// 			'public' => true,
// 			'has_archive' => true,
// 			'taxonomies' => array('category'),
// 			'rewrite' => array('slug' => 'example'),
// 			'supports' => array('title', 'editor', 'thumbnail'),
// 		)
// 	);
// }

// add_action('init', 'websiteni_joints_create_post_type');

/**
* Create Taxonomy.
*/
// function websiteni_joints_create_taxonomy() {
// 	$labels = array(
// 		'name'					=> _x('Examples', 'Taxonomy General Name'),
// 		'menu_name'				=> __('Examples'),
// 		'singular_name'			=> _x('Example', 'Taxonomy Singular Name'),
// 		'add_new_item'			=> __('Add New Example'),
// 		'new_item_name'			=> __('New Example Name'),
// 		'edit_item'				=> __('Edit Example'),
// 		'update_item'			=> __('Update Example'),
// 		'all_items'				=> __('All Examples'),
// 		'parent_item'			=> __('Parent Example'),
// 		'parent_item_colon'		=> __('Parent Example:'),
// 		'search_items'			=> __('Search Examples'),
// 	);

// 	register_taxonomy('examples', array('post_type'), array(
// 		'labels'			=>	$labels,
// 		'show_ui'			=>	true,
// 		'show_admin_column'	=>	true,
// 		'query_var'			=>	true,
// 		'hierarchical'		=>	true,
// 		'has_archive'		=>	true,
// 		'rewrite'			=>	array('slug'	=>	'examples')
// 	));
// }

// add_action('init', 'websiteni_joints_create_taxonomy', 0);

/**
* Create Widgets.
*/
// function websiteni_joints_register_widgets() {
// 	register_sidebar(
// 		array(
// 			'id'				=>	'example-widget',
// 			'name'				=>	'Example Widget',
// 			'before_widget'		=>	'<div>',
// 			'after_widget'		=>	'</div>',
// 			'before_title'		=>	'<h1>',
// 			'after_title'		=>	'</h1>'
// 		)
// 	);
// }

// add_action('widgets_init', 'websiteni_joints_register_widgets');

/**
* Create Custom Post Excerpt.
*/
function websiteni_joints_excerpt($limit) {
	$excerpt = explode(' ', get_the_excerpt(), $limit);

	if (count($excerpt) >= $limit) {
		array_pop($excerpt);
		$excerpt = implode(' ', $excerpt) . '';
	} else {
		$excerpt = implode(' ', $excerpt);
	}

	$excerpt = preg_replace('`\[[^\]]*\]`', '', $excerpt);

	return $excerpt;
}
/**
* Move Comment Field.
*/
function websiteni_joints_comment_form_comment_field_to_bottom($fields) {
	$comment_field = $fields['comment'];
	unset($fields['comment']);
	$fields['comment'] = $comment_field;
	return $fields;
}

add_filter('comment_form_fields', 'websiteni_joints_comment_form_comment_field_to_bottom');

/**
* Exclude a Post Type from Search.
*/
// function websiteni_joints_exclude_post_type_from_search($query) {
// 	if ($query->is_search) {
// 		$query->set('post_type', 'example');
// 	}

// 	return $query;
// }

// add_filter('pre_get_posts', 'websiteni_joints_exclude_post_type_from_search');