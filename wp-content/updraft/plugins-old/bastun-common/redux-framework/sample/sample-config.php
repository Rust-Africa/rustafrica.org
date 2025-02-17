<?php
/**
 * ReduxFramework Sample Config File
 * For full documentation, please visit: http://devs.redux.io/
 *
 * @package Redux Framework
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'Redux' ) ) {
	return;
}

// This is your option name where all the Redux data is stored.
$opt_name = 'redux_demo';  // YOU MUST CHANGE THIS.  DO NOT USE 'redux_demo' IN YOUR PROJECT!!!

// Uncomment to disable demo mode.
/* Redux::disable_demo(); */  // phpcs:ignore Squiz.PHP.CommentedOutCode

$dir = __DIR__ . DIRECTORY_SEPARATOR;

/*
 * --> Used within different fields. Simply examples. Search for ACTUAL DECLARATION for field examples
 */

// Background Patterns Reader.
$sample_patterns_path = Redux_Core::$dir . '../sample/patterns/';
$sample_patterns_url  = Redux_Core::$url . '../sample/patterns/';
$sample_patterns      = array();

if ( is_dir( $sample_patterns_path ) ) {
	$sample_patterns_dir = opendir( $sample_patterns_path );

	if ( $sample_patterns_dir ) {

		// phpcs:ignore WordPress.CodeAnalysis.AssignmentInCondition
		while ( false !== ( $sample_patterns_file = readdir( $sample_patterns_dir ) ) ) {
			if ( stristr( $sample_patterns_file, '.png' ) !== false || stristr( $sample_patterns_file, '.jpg' ) !== false ) {
				$name              = explode( '.', $sample_patterns_file );
				$name              = str_replace( '.' . end( $name ), '', $sample_patterns_file );
				$sample_patterns[] = array(
					'alt' => $name,
					'img' => $sample_patterns_url . $sample_patterns_file,
				);
			}
		}
	}
}

// Used to except HTML tags in description arguments where esc_html would remove.
$kses_exceptions = array(
	'a'      => array(
		'href' => array(),
	),
	'strong' => array(),
	'br'     => array(),
	'code'   => array(),
);

/*
 * ---> BEGIN ARGUMENTS
 */

/**
 * All the possible arguments for Redux.
 * For full documentation on arguments, please refer to: https://devs.redux.io/core/arguments/
 */
$theme = wp_get_theme(); // For use with some settings. Not necessary.

// TYPICAL -> Change these values as you need/desire.
$args = array(
	// This is where your data is stored in the database and also becomes your global variable name.
	'opt_name'                  => $opt_name,

	// Name that appears at the top of your panel.
	'display_name'              => $theme->get( 'Name' ),

	// Version that appears at the top of your panel.
	'display_version'           => $theme->get( 'Version' ),

	// Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only).
	'menu_type'                 => 'menu',

	// Show the sections below the admin menu item or not.
	'allow_sub_menu'            => true,

	// The text to appear in the admin menu.
	'menu_title'                => esc_html__( 'Bastun Options', 'your-textdomain-here' ),

	// The text to appear on the page title.
	'page_title'                => esc_html__( 'Bastun Options', 'your-textdomain-here' ),

	// Disable to create your own Google fonts loader.
	'disable_google_fonts_link' => false,

	// Show the panel pages on the admin bar.
	'admin_bar'                 => true,

	// Icon for the admin bar menu.
	'admin_bar_icon'            => 'dashicons-portfolio',

	// Priority for the admin bar menu.
	'admin_bar_priority'        => 50,

	// Sets a different name for your global variable other than the opt_name.
	'global_variable'           => $opt_name,

	// Show the time the page took to load, etc. (forced on while on localhost or when WP_DEBUG is enabled).
	'dev_mode'                  => false,

	// Enable basic customizer support.
	'customizer'                => true,

	// Allow the panel to open expanded.
	'open_expanded'             => false,

	// Disable the save warning when a user changes a field.
	'disable_save_warn'         => false,

	// Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
	'page_priority'             => 90,

	// For a full list of options, visit: http://codex.wordpress.org/Function_Reference/add_submenu_page#Parameters.
	'page_parent'               => 'themes.php',

	// Permissions needed to access the options panel.
	'page_permissions'          => 'manage_options',

	// Specify a custom URL to an icon.
	'menu_icon'                 => '',

	// Force your panel to always open to a specific tab (by id).
	'last_tab'                  => '',

	// Icon displayed in the admin panel next to your menu_title.
	'page_icon'                 => 'icon-themes',

	// Page slug used to denote the panel, will be based off page title, then menu title, then opt_name if not provided.
	'page_slug'                 => $opt_name,

	// On load save the defaults to DB before user clicks save.
	'save_defaults'             => true,

	// Display the default value next to each field when not set to the default value.
	'default_show'              => false,

	// What to print by the field's title if the value shown is default.
	'default_mark'              => '*',

	// Shows the Import/Export panel when not used as a field.
	'show_import_export'        => true,

	// The time transients will expire when the 'database' arg is set.
	'transient_time'            => 60 * MINUTE_IN_SECONDS,

	// Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output.
	'output'                    => true,

	// Allows dynamic CSS to be generated for customizer and google fonts,
	// but stops the dynamic CSS from going to the page head.
	'output_tag'                => true,

	// Disable the footer credit of Redux. Please leave if you can help it.
	'footer_credit'             => '',

	// If you prefer not to use the CDN for ACE Editor.
	// You may download the Redux Vendor Support plugin to run locally or embed it in your code.
	'use_cdn'                   => true,

	// Set the theme of the option panel.  Use 'wp' to use a more modern style, default is classic.
	'admin_theme'               => 'wp',

	// Enable or disable flyout menus when hovering over a menu with submenus.
	'flyout_submenus'           => true,

	// Mode to display fonts (auto|block|swap|fallback|optional)
	// See: https://developer.mozilla.org/en-US/docs/Web/CSS/@font-face/font-display.
	'font_display'              => 'swap',

	// HINTS.
	'hints'                     => array(
		'icon'          => 'el el-question-sign',
		'icon_position' => 'right',
		'icon_color'    => 'lightgray',
		'icon_size'     => 'normal',
		'tip_style'     => array(
			'color'   => 'red',
			'shadow'  => true,
			'rounded' => false,
			'style'   => '',
		),
		'tip_position'  => array(
			'my' => 'top left',
			'at' => 'bottom right',
		),
		'tip_effect'    => array(
			'show' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'mouseover',
			),
			'hide' => array(
				'effect'   => 'slide',
				'duration' => '500',
				'event'    => 'click mouseleave',
			),
		),
	),

	// FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
	// Possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
	'database'                  => '',
	'network_admin'             => true,
	'search'                    => true,
);


// ADMIN BAR LINKS -> Setup custom links in the admin bar menu as external items.
// PLEASE CHANGE THESE SETTINGS IN YOUR THEME BEFORE RELEASING YOUR PRODUCT!!
// If these are left unchanged, they will not display in your panel!
$args['admin_bar_links'][] = array(
	'id'    => 'redux-docs',
	'href'  => '//devs.redux.io/',
	'title' => __( 'Documentation', 'your-textdomain-here' ),
);

$args['admin_bar_links'][] = array(
	'id'    => 'redux-support',
	'href'  => '//github.com/ReduxFramework/redux-framework/issues',
	'title' => __( 'Support', 'your-textdomain-here' ),
);

// SOCIAL ICONS -> Setup custom links in the footer for quick links in your panel footer icons.
// PLEASE CHANGE THESE SETTINGS IN YOUR THEME BEFORE RELEASING YOUR PRODUCT!!
// If these are left unchanged, they will not display in your panel!
$args['share_icons'][] = array(
	'url'   => '//github.com/ReduxFramework/ReduxFramework',
	'title' => 'Visit us on GitHub',
	'icon'  => 'el el-github',
);
$args['share_icons'][] = array(
	'url'   => '//www.facebook.com/pages/Redux-Framework/243141545850368',
	'title' => 'Like us on Facebook',
	'icon'  => 'el el-facebook',
);
$args['share_icons'][] = array(
	'url'   => '//twitter.com/reduxframework',
	'title' => 'Follow us on Twitter',
	'icon'  => 'el el-twitter',
);
$args['share_icons'][] = array(
	'url'   => '//www.linkedin.com/company/redux-framework',
	'title' => 'Find us on LinkedIn',
	'icon'  => 'el el-linkedin',
);

// Panel Intro text -> before the form.
if ( ! isset( $args['global_variable'] ) || false !== $args['global_variable'] ) {
	if ( ! empty( $args['global_variable'] ) ) {
		$v = $args['global_variable'];
	} else {
		$v = str_replace( '-', '_', $args['opt_name'] );
	}

	// translators:  Panel opt_name.
	$args['intro_text'] = '<p>' . sprintf( esc_html__( 'Did you know that Redux sets a global variable for you? To access any of your saved options from within your code you can use your global variable: $%1$s', 'your-textdomain-here' ), '<strong>' . $v . '</strong>' ) . '<p>';
} else {
	$args['intro_text'] = '<p>' . esc_html__( 'This text is displayed above the options panel. It isn\'t required, but more info is always better! The intro_text field accepts all HTML.', 'your-textdomain-here' ) . '</p>';
}

// Add content after the form.
$args['footer_text'] = '<p>' . esc_html__( 'This text is displayed below the options panel. It isn\'t required, but more info is always better! The footer_text field accepts all HTML.', 'your-textdomain-here' ) . '</p>';

Redux::set_args( $opt_name, $args );

/*
 * ---> END ARGUMENTS
 */

/*
 * ---> START HELP TABS
 */
$help_tabs = array(
	array(
		'id'      => 'redux-help-tab-1',
		'title'   => esc_html__( 'Theme Information 1', 'your-textdomain-here' ),
		'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'your-textdomain-here' ) . '</p>',
	),
	array(
		'id'      => 'redux-help-tab-2',
		'title'   => esc_html__( 'Theme Information 2', 'your-textdomain-here' ),
		'content' => '<p>' . esc_html__( 'This is the tab content, HTML is allowed.', 'your-textdomain-here' ) . '</p>',
	),
);
Redux::set_help_tab( $opt_name, $help_tabs );

// Set the help sidebar.
$content = '<p>' . esc_html__( 'This is the sidebar content, HTML is allowed.', 'your-textdomain-here' ) . '</p>';

Redux::set_help_sidebar( $opt_name, $content );

/*
 * <--- END HELP TABS
 */

/*
 * ---> START SECTIONS
 */

// -> START Basic Fields
Redux::setSection($opt_name, array(
                'icon' => 'el-icon-cogs',
                'title' => __('General Settings', 'bastun'),
                'fields' => array(  
                    array(
                        'id' => 'favicon',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Favicon Upload', 'bastun'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('', 'bastun'),
                        'subtitle' => __('Upload your Favicon.', 'bastun'),
                        'default' => ''
                    ), 
                    array(
                        'id' => 'preloader',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Preloader Image ', 'bastun'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('', 'bastun'),
                        'subtitle' => __('Upload your Preloader Image', 'bastun'),
                        'default' => ''
                    ), 
                    array(
                        'id' => 'logo',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Logo', 'bastun'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('', 'bastun'),
                        'subtitle' => __('Upload your Logo Image', 'bastun'),
                        'default' => ''
                    ), 
                    array(
                        'id' => 'logo2',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Logo 2', 'bastun'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('', 'bastun'),
                        'subtitle' => __('Upload your Logo Dark Image', 'bastun'),
                        'default' => ''
                    ), 
                    array(
                        'id' => 'home',
                        'type' => 'text',
                        'title' => __('Home', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'Home'
                     ),
                    array(
                        'id' => 'link_facebook',
                        'type' => 'text',
                        'title' => __('Link Facebook', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'https://www.facebook.com/'
                     ),
                    array(
                        'id' => 'link_twitter',
                        'type' => 'text',
                        'title' => __('Link Twitter', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'https://x.com/'
                    ),
                    array(
                        'id' => 'link_skype',
                        'type' => 'text',
                        'title' => __('Link Skype', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'https://www.skype.com/'
                    ),
                    array(
                        'id' => 'link_linkedin',
                        'type' => 'text',
                        'title' => __('Link Linkedin', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'https://www.linkedin.com/'
                    ),
                )
            ));
            Redux::setSection($opt_name, array(
                'icon' => 'el-icon-list',
                'title' => __('Blog Settings', 'bastun'),
                'fields' => array(
                	array(
                        'id' => 'image_single',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Single Image', 'bastun'),
                        'compiler' => 'true',
                        'desc' => __('', 'bastun'),
                        'subtitle' => __('Upload your Single Image', 'bastun'),
                        'default' => ''
                    ), 
                    array(
                        'id' => 'title_single',
                        'type' => 'text',
                        'title' => __('Title Single', 'bastun'),
                        'subtitle' => __('Title Single', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'Blog Details'
                     ),
                    array(
                        'id' => 'subtitle_single',
                        'type' => 'text',
                        'title' => __('Subtitle Single', 'bastun'),
                        'subtitle' => __('Subtitle Single', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'Blog Details'
                     ),
                    array(
                        'id' => 'share',
                        'type' => 'text',
                        'title' => __('Share', 'bastun'),
                        'subtitle' => __('Share', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'Share:'
                     ),
                    array(
                        'id' => 'facebook',
                        'type' => 'text',
                        'title' => __('Facebook', 'bastun'),
                        'subtitle' => __('Facebook', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'https://www.facebook.com/'
                     ),
                    array(
                        'id' => 'twitter',
                        'type' => 'text',
                        'title' => __('Twitter', 'bastun'),
                        'subtitle' => __('Twitter', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'https://twitter.com/'
                     ),
                    array(
                        'id' => 'skype',
                        'type' => 'text',
                        'title' => __('Skype', 'bastun'),
                        'subtitle' => __('Skype', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'https://www.skype.com/'
                     ),
                    array(
                        'id' => 'linkedin',
                        'type' => 'text',
                        'title' => __('Linkedin', 'bastun'),
                        'subtitle' => __('Linkedin', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'https://www.linkedin.com/'
                     ),
                    array(
                        'id' => 'image_blog',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Blog Image', 'bastun'),
                        'compiler' => 'true',
                        'desc' => __('', 'bastun'),
                        'subtitle' => __('Upload your Blog Image', 'bastun'),
                        'default' => ''
                    ), 
                    array(
                        'id' => 'blog_title',
                        'type' => 'text',
                        'title' => __('Blog Title', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'Blog'
                     ),
                    array(
                        'id' => 'blog_subtitle',
                        'type' => 'text',
                        'title' => __('Blog Subtitle', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'Blog'
                     ),
                    array(
                        'id' => 'blog_excerpt',
                        'type' => 'text',
                        'title' => __('Blog custom excerpt leng', 'bastun'),
                        'subtitle' => __('Input Blog custom excerpt leng', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => '40'
                    ),
                    array(
                        'id' => 'blog_excerpt3',
                        'type' => 'text',
                        'title' => __('Blog Home 1 custom excerpt leng', 'bastun'),
                        'subtitle' => __('Input Blog Home 1 custom excerpt leng', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => '10'
                    ),
                    array(
                        'id' => 'service_excerpt',
                        'type' => 'text',
                        'title' => __('Service custom excerpt leng', 'bastun'),
                        'subtitle' => __('Input Blog custom excerpt leng', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => '10'
                    ),
                    array(
                        'id' => 'read_more',
                        'type' => 'text',
                        'title' => __('Read More', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'Read More'
                     ),
                )
            ));
			Redux::setSection($opt_name, array(
                'icon' => 'el-icon-graph',
                'title' => __('Product Settings', 'bastun'),
                'fields' => array(
                	array(
                        'id' => 'image_product',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Background Image Product', 'bastun'),
                        'compiler' => 'true',
                        'desc' => __('', 'bastun'),
                        'subtitle' => __('Upload your Background Image Product', 'bastun'),
                        'default' => ''
                    ), 
                    array(
                        'id' => 'product_details',
                        'type' => 'text',
                        'title' => __('Product Details', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'Product Details'
                    ),
                    array(
                        'id' => 'image_shop',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Background Image Shop', 'bastun'),
                        'compiler' => 'true',
                        'desc' => __('', 'bastun'),
                        'subtitle' => __('Upload your Background Image Product', 'bastun'),
                        'default' => ''
                    ), 
                    array(
                        'id' => 'shop_title',
                        'type' => 'text',
                        'title' => __('Shop Details', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'Shop'
                    ),
                    array(
                        'id' => 'cart_title',
                        'type' => 'text',
                        'title' => __('Cart Title', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'Cart'
                    ),
                    array(
                        'id' => 'cart_subtitle',
                        'type' => 'text',
                        'title' => __('Cart Subtitle', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'Cart Page'
                    ),
                 )
            ));
            Redux::setSection($opt_name, array(
                'icon' => 'el-icon-graph',
                'title' => __('404 Settings', 'bastun'),
                'fields' => array(
                	array(
                        'id' => 'bg_image_404',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Background Image 404', 'bastun'),
                        'compiler' => 'true',
                        'desc' => __('', 'bastun'),
                        'subtitle' => __('Upload your Background Image 404', 'bastun'),
                        'default' => ''
                    ), 
                    array(
                        'id' => 'error_title',
                        'type' => 'text',
                        'title' => __('Title Error', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'Page Not Found'
                    ),
                    array(
                        'id' => 'image_404',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Image 404', 'bastun'),
                        'compiler' => 'true',
                        'desc' => __('', 'bastun'),
                        'subtitle' => __('Upload your Image 404', 'bastun'),
                        'default' => ''
                    ), 
                    array(
                        'id' => 'page_not_found',
                        'type' => 'textarea',
                        'title' => __('Page Not Found', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => '404 - Nothing to see here !'
                     ),
                    
                    array(
                        'id' => 'home_page',
                        'type' => 'text',
                        'title' => __('Back to home', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'Back to Home Page'
                     ),
                 )
            ));
            Redux::setSection($opt_name, array(
                'icon' => ' el-icon-credit-card',
                'title' => __('Header Settings', 'bastun'),
                'fields' => array(
    //             	array(
				// 		'id'            => 'repeater-animate',
				// 		'type'          => 'repeater',
				// 		'title'         => esc_html__( 'Header Repeater Animate', 'bastun' ),
				// 		'subtitle'      => esc_html__( '', 'bastun' ),
				// 		'desc'          => esc_html__( '', 'bastun' ),
				// 		'group_values' 	=> true,
				// 		'fields'        => array(
				// 			array(
				// 				'id'          => 'icon',
				// 				'type'        => 'media',
				// 				'placeholder' => esc_html__( 'Image Icon', 'bastun' ),
				// 			),
				// 			array(
				// 				'id'          => 'title_icon',
				// 				'type'        => 'text',
				// 				'placeholder' => esc_html__( 'Title Icon', 'bastun' ),
				// 			),
				// 		)
				// 	),
                	array(
                        'id' => 'cart',
                        'type' => 'checkbox',
                        'title' => __('Enable edit Cart', 'bastun'),
                        'subtitle' => '',
                        'desc' => '',
                        'default' => '0'// 1 = on | 0 = off
                    ),
                    array(
                        'id' => 'mini-cart-btn-1',
                        'type' => 'text',
                        'title' => __('Mini Cart Button 1', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'View Cart'
                    ),
                    array(
                        'id' => 'mini-cart-link-1',
                        'type' => 'text',
                        'title' => __('Mini Cart Link Button 1', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => '#'
                    ),
                    array(
                        'id' => 'mini-cart-btn-2',
                        'type' => 'text',
                        'title' => __('Mini Cart Button 2', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'CHECKOUT'
                    ),
                    array(
                        'id' => 'mini-cart-link-2',
                        'type' => 'text',
                        'title' => __('Mini Cart Link Button 2', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => '#'
                    ),
                	array(
                        'id' => 'light',
                        'type' => 'text',
                        'title' => __('Light', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'Light'
                    ),
                    array(
                        'id' => 'dark',
                        'type' => 'text',
                        'title' => __('Dark', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'Dark'
                    ),
                    array(
                        'id' => 'header_phone',
                        'type' => 'text',
                        'title' => __('Phone', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => '(000) 967-237-96'
                    ),
                    array(
                        'id' => 'header_mail',
                        'type' => 'text',
                        'title' => __('Mail', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'bastunwp@gmail.com'
                    ),
                    array(
                        'id' => 'header_address',
                        'type' => 'text',
                        'title' => __('Address', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => '2650 Cottage Ct #LOPark City, Utah(UT), 84098'
                    ),
                    array(
                        'id' => 'title_address_offcavas',
                        'type' => 'text',
                        'title' => __('Title Address Offcanvas', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'Contact Information'
                    ),
                    array(
                        'id' => 'header_address_offcavas',
                        'type' => 'text',
                        'title' => __('Address Offcanvas', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'Times Square, Za #999-859 Nid Road, Atlanta, USA'
                    ),
                    array(
                        'id' => 'title_phone_offcavas',
                        'type' => 'text',
                        'title' => __('Title Phone Offcanvas', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'We are Available 24/7. Call Now.'
                    ),
                    array(
                        'id' => 'header_phone1_offcavas',
                        'type' => 'text',
                        'title' => __('Phone 1 Offcanvas', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => '(888) 456-2790'
                    ),
                    array(
                        'id' => 'header_phone2_offcavas',
                        'type' => 'text',
                        'title' => __('Phone 2 Offcanvas', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => '(121) 255-53333'
                    ),
                    array(
                        'id' => 'title_social_offcavas',
                        'type' => 'text',
                        'title' => __('Title Social Offcanvas', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'Find us here'
                    ),
                    array(
                        'id' => 'button',
                        'type' => 'text',
                        'title' => __('Button', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'GET FREE QUOTE'
                    ),
                    array(
                        'id' => 'link_button',
                        'type' => 'text',
                        'title' => __('Link Button', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => '#'
                    ),
                    array(
                        'id' => 'button_mobile',
                        'type' => 'text',
                        'title' => __('Button Mobile', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'QUOTE'
                    ),
                    array(
                        'id' => 'link_button_mobile',
                        'type' => 'text',
                        'title' => __('Link Button Mobile', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => '#'
                    ),
                    array(
                        'id' => 'login_mobile',
                        'type' => 'text',
                        'title' => __('Login / Register', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'Login / Register'
                    ),
                    array(
                        'id' => 'link_login_mobile',
                        'type' => 'text',
                        'title' => __('Link Login / Register', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => '#'
                    ),
                    
                    
                )
            ));
            
            Redux::setSection($opt_name, array(
                'icon' => ' el-icon-credit-card',
                'title' => __('Footer Settings', 'bastun'),
                'fields' => array(
    //             	array(
				// 		'id'            => 'repeater-animate-footer',
				// 		'type'          => 'repeater',
				// 		'title'         => esc_html__( 'Header Repeater Animate', 'bastun' ),
				// 		'subtitle'      => esc_html__( '', 'bastun' ),
				// 		'desc'          => esc_html__( '', 'bastun' ),
				// 		'group_values' 	=> true,
				// 		'fields'        => array(
				// 			array(
				// 				'id'          => 'image',
				// 				'type'        => 'media',
				// 				'placeholder' => esc_html__( 'Image Icon', 'bastun' ),
				// 			),
				// 		)
				// 	),
					array(
                        'id' => 'logo1_footer',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Logo Light ', 'bastun'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('', 'bastun'),
                        'subtitle' => __('Upload your Logo Image', 'bastun'),
                        'default' => ''
                    ), 
                    array(
                        'id' => 'logo2_footer',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Logo Dark ', 'bastun'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('', 'bastun'),
                        'subtitle' => __('Upload your Logo Image', 'bastun'),
                        'default' => ''
                    ), 
                    array(
                        'id' => 'image_footer_home',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Background Footer Home ', 'bastun'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('', 'bastun'),
                        'subtitle' => __('Upload your Background Footer', 'bastun'),
                        'default' => ''
                    ),
                    array(
                        'id' => 'image_footer_home16',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Background Footer Home 2', 'bastun'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('', 'bastun'),
                        'subtitle' => __('Upload your Background Footer', 'bastun'),
                        'default' => ''
                    ),
                    array(
                        'id' => 'brand__badge',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Brand Badge Home ', 'bastun'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('', 'bastun'),
                        'subtitle' => __('Upload your Brand Badge', 'bastun'),
                        'default' => ''
                    ),
                    array(
                        'id' => 'brand__badge_inner',
                        'type' => 'media',
                        'url' => true,
                        'title' => __('Brand Badge Inner Home ', 'bastun'),
                        'compiler' => 'true',
                        //'mode' => false, // Can be set to false to allow any media type, or can also be set to any mime type.
                        'desc' => __('', 'bastun'),
                        'subtitle' => __('Upload your Brand Badge Inner', 'bastun'),
                        'default' => ''
                    ),
                    array(
                        'id' => 'footer_copyright',
                        'type' => 'text',
                        'title' => __('Copyright', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'Copyright © 2024 All Rights Reserved by Shtheme'
                    ),  
                    array(
                        'id' => 'privacy_policy',
                        'type' => 'text',
                        'title' => __('Privacy & Policy', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'Privacy & Policy'
                    ),  
                    array(
                        'id' => 'link_privacy_policy',
                        'type' => 'text',
                        'title' => __('Link Privacy & Policy', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => '#'
                    ), 
                    array(
                        'id' => 'icon_footer',
                        'type' => 'text',
                        'title' => __('Icon Footer', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => '||'
                    ), 
                    array(
                        'id' => 'terms_conditions',
                        'type' => 'text',
                        'title' => __('Terms & Conditions', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => 'Terms & Conditions'
                    ),  
                    array(
                        'id' => 'link_terms_conditions',
                        'type' => 'text',
                        'title' => __('Link Terms & Conditions', 'bastun'),
                        'subtitle' => __('', 'bastun'),
                        'desc' => __('', 'bastun'),
                        'default' => '#'
                    ),  
                    
                )
            ));
            
            Redux::setSection($opt_name, array(
                'icon' => 'el-icon-website',
                'title' => __('Styling Options', 'bastun'),
                'fields' => array(
                    array(
                        'id' => 'chosen-color',
                        'type' => 'checkbox',
                        'title' => __('Enable edit color', 'bastun'),
                        'subtitle' => '',
                        'desc' => '',
                        'default' => '0'// 1 = on | 0 = off
                    ),
                    array(
                        'id' => 'main-color-1',
                        'type' => 'color',
                        'title' => __('Theme Main Color 1', 'bastun'),
                        'subtitle' => __('Pick the main color for the theme (default: #FE0094).', 'bastun'),
                        'default' => '#FE0094',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'main-color-2',
                        'type' => 'color',
                        'title' => __('Theme Main Color 2', 'bastun'),
                        'subtitle' => __('Pick the main color for the theme (default: #18239D).', 'bastun'),
                        'default' => '#18239D',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'main-color-3',
                        'type' => 'color',
                        'title' => __('Theme Main Color Gradient Color', 'bastun'),
                        'subtitle' => __('Select the first color for the theme as Gradient color (default: #00229E).', 'bastun'),
                        'default' => '#00229E',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'main-color-4',
                        'type' => 'color',
                        'title' => __('Theme Main Color Gradient Color', 'bastun'),
                        'subtitle' => __('Select a second color for the theme as Gradient color (default: #6E1299).', 'bastun'),
                        'default' => '#6E1299',
                        'validate' => 'color',
                    ),
                    array(
                        'id' => 'main-color-5',
                        'type' => 'color',
                        'title' => __('Theme Main Color Gradient Color', 'bastun'),
                        'subtitle' => __('Choose the third color for the theme as Gradient color (default: #FE0094).', 'bastun'),
                        'default' => '#FE0094',
                        'validate' => 'color',
                    ),
                )
            ));

/**
 * Raw README
 */
if ( file_exists( $dir . '/../README.md' ) ) {
	$section = array(
		'icon'   => 'el el-list-alt',
		'title'  => esc_html__( 'Documentation', 'your-textdomain-here' ),
		'fields' => array(
			array(
				'id'           => 'opt-raw-documentation',
				'type'         => 'raw',
				'markdown'     => true,
				'content_path' => __DIR__ . '/../README.md', // FULL PATH, not relative, please.
			),
		),
	);

	Redux::set_section( $opt_name, $section );
}

Redux::set_section(
	$opt_name,
	array(
		'icon'            => 'el el-list-alt',
		'title'           => esc_html__( 'Customizer Only', 'your-textdomain-here' ),
		'desc'            => '<p class="description">' . esc_html__( 'This Section should be visible only in Customizer', 'your-textdomain-here' ) . '</p>',
		'customizer_only' => true,
		'fields'          => array(
			array(
				'id'              => 'opt-customizer-only',
				'type'            => 'select',
				'title'           => esc_html__( 'Customizer Only Option', 'your-textdomain-here' ),
				'subtitle'        => esc_html__( 'The subtitle is NOT visible in customizer', 'your-textdomain-here' ),
				'desc'            => esc_html__( 'The field desc is NOT visible in customizer.', 'your-textdomain-here' ),
				'customizer_only' => true,
				'options'         => array(
					'1' => esc_html__( 'Opt 1', 'your-textdomain-here' ),
					'2' => esc_html__( 'Opt 2', 'your-textdomain-here' ),
					'3' => esc_html__( 'Opt 3', 'your-textdomain-here' ),
				),
				'default'         => '2',
			),
		),
	)
);

/*
 * <--- END SECTIONS
 */

/*
 * YOU MUST PREFIX THE FUNCTIONS BELOW AND ACTION FUNCTION CALLS OR OTHER CONFIGS MAY OVERRIDE YOUR CODE.
 */

/*
 * --> Action hook examples.
 */

// Function to test the compiler hook and demo CSS output.
// Above 10 is a priority, but 2 is necessary to include the dynamically generated CSS to be sent to the function.
// add_filter('redux/options/' . $opt_name . '/compiler', 'compiler_action', 10, 3);
//
// Change the arguments after they've been declared, but before the panel is created.
// add_filter('redux/options/' . $opt_name . '/args', 'change_arguments' );
//
// Change the default value of a field after it's been set, but before it's been used.
// add_filter('redux/options/' . $opt_name . '/defaults', 'change_defaults' );
//
// Dynamically add a section.
// It can be also used to modify sections/fields.
// add_filter('redux/options/' . $opt_name . '/sections', 'dynamic_section');
// .
if ( ! function_exists( 'compiler_action' ) ) {
	/**
	 * This is a test function that will let you see when the compiler hook occurs.
	 * It only runs if a field's value has changed and compiler=>true is set.
	 *
	 * @param array  $options        Options values.
	 * @param string $css            Compiler selector CSS values  compiler => array( CSS SELECTORS ).
	 * @param array  $changed_values Any values changed since last save.
	 */
	function compiler_action( array $options, string $css, array $changed_values ) {
		echo '<h1>The compiler hook has run!</h1>';
		echo '<pre>';
		// phpcs:ignore WordPress.PHP.DevelopmentFunctions
		print_r( $changed_values ); // Values that have changed since the last save.
		// echo '<br/>';
		// print_r($options); //Option values.
		// echo '<br/>';
		// print_r($css); // Compiler selector CSS values compiler => array( CSS SELECTORS ).
		echo '</pre>';
	}
}

if ( ! function_exists( 'redux_validate_callback_function' ) ) {
	/**
	 * Custom function for the callback validation referenced above
	 *
	 * @param array $field          Field array.
	 * @param mixed $value          New value.
	 * @param mixed $existing_value Existing value.
	 *
	 * @return array
	 */
	function redux_validate_callback_function( array $field, $value, $existing_value ): array {
		$error   = false;
		$warning = false;

		// Do your validation.
		if ( 1 === (int) $value ) {
			$error = true;
			$value = $existing_value;
		} elseif ( 2 === (int) $value ) {
			$warning = true;
			$value   = $existing_value;
		}

		$return['value'] = $value;

		if ( true === $error ) {
			$field['msg']    = 'your custom error message';
			$return['error'] = $field;
		}

		if ( true === $warning ) {
			$field['msg']      = 'your custom warning message';
			$return['warning'] = $field;
		}

		return $return;
	}
}


if ( ! function_exists( 'dynamic_section' ) ) {
	/**
	 * Custom function for filtering the section array.
	 * Good for child themes to override or add to the sections.
	 * Simply include this function in the child themes functions.php file.
	 * NOTE: the defined constants for URLs and directories will NOT be available at this point in a child theme,
	 * so you must use get_template_directory_uri() if you want to use any of the built-in icons.
	 *
	 * @param array $sections Section array.
	 *
	 * @return array
	 */
	function dynamic_section( array $sections ): array {
		$sections[] = array(
			'title'  => esc_html__( 'Section via hook', 'your-textdomain-here' ),
			'desc'   => '<p class="description">' . esc_html__( 'This is a section created by adding a filter to the sections array. Can be used by child themes to add/remove sections from the options.', 'your-textdomain-here' ) . '</p>',
			'icon'   => 'el el-paper-clip',

			// Leave this as a blank section, no options just some intro text set above.
			'fields' => array(),
		);

		return $sections;
	}
}

if ( ! function_exists( 'change_arguments' ) ) {
	/**
	 * Filter hook for filtering the args.
	 * Good for child themes to override or add to the args array.
	 * It can also be used in other functions.
	 *
	 * @param array $args Global arguments array.
	 *
	 * @return array
	 */
	function change_arguments( array $args ): array {
		$args['dev_mode'] = true;

		return $args;
	}
}

if ( ! function_exists( 'change_defaults' ) ) {
	/**
	 * Filter hook for filtering the default value of any given field. Very useful in development mode.
	 *
	 * @param array $defaults Default value array.
	 *
	 * @return array
	 */
	function change_defaults( array $defaults ): array {
		$defaults['str_replace'] = esc_html__( 'Testing filter hook!', 'your-textdomain-here' );

		return $defaults;
	}
}

if ( ! function_exists( 'redux_custom_sanitize' ) ) {
	/**
	 * Function to be used if the field sanitizes argument.
	 * Return value MUST be formatted or cleaned text to display.
	 *
	 * @param string $value Value to evaluate or clean.  Required.
	 *
	 * @return string
	 */
	function redux_custom_sanitize( string $value ): string {
		$return = '';

		foreach ( explode( ' ', $value ) as $w ) {
			foreach ( str_split( $w ) as $k => $v ) {
				if ( ( $k + 1 ) % 2 !== 0 && ctype_alpha( $v ) ) {
					$return .= mb_strtoupper( $v );
				} else {
					$return .= $v;
				}
			}

			$return .= ' ';
		}

		return $return;
	}
}
