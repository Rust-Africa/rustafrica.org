<?php
/**
 * Functions and definitions
 *
 * @package Itfirm
 */

if(!defined('DEV_MODE')){
	if ( is_user_logged_in() ) {
    	define('DEV_MODE', true);
    } else {
    	define('DEV_MODE', false);
    }
}

if(!function_exists('itfirm_require_folder')){
    function itfirm_require_folder($foldername,$path = '')
    {
        if($path === '') $path = get_template_directory();
        $dir = $path . DIRECTORY_SEPARATOR . $foldername;
        if (!is_dir($dir)) {
            return;
        }
        $files = array_diff(scandir($dir), array('..', '.'));
        foreach ($files as $file) {
            $patch = $dir . DIRECTORY_SEPARATOR . $file;
            if (file_exists($patch) && strpos($file, ".php") !== false) {
                require_once $patch;
            }
        }
    }
}

if ( ! function_exists( 'itfirm_setup' ) ) :
	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 */
	function itfirm_setup() {
		// Make theme available for translation.
		load_theme_textdomain( 'itfirm', get_template_directory() . '/languages' );

		// Custom Header
		add_theme_support( 'custom-header' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Let WordPress manage the document title.
		add_theme_support( 'title-tag' );

		// Enable support for Post Thumbnails on posts and pages.
		add_theme_support( 'post-thumbnails' );

		// This theme uses wp_nav_menu() in one location.
		register_nav_menus( array(
			'primary' => esc_html__( 'Primary', 'itfirm' ),
			'mobile-menu' => esc_html__( 'Mobile Menu', 'itfirm' ),
		) );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'search-form',
			'comment-form',
			'comment-list',
			'gallery',
			'caption',
		) );

		// Set up the WordPress core custom background feature.
		add_theme_support( 'custom-background', apply_filters( 'itfirm_custom_background_args', array(
			'default-color' => 'ffffff',
			'default-image' => '',
		) ) );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Add support for core custom logo.
		add_theme_support( 'custom-logo', array(
			'height'      => 250,
			'width'       => 250,
			'flex-width'  => true,
			'flex-height' => true,
		) );
		add_theme_support( 'post-formats', array (
			'',
		) );

        // Enable support for Post Thumbnails on posts and pages.
        add_theme_support('post-thumbnails');
        add_image_size( 'itfirm-avatar', 90, 90, true );
        add_image_size( 'itfirm-nav', 61, 52, true );
        add_image_size( 'itfirm-thumbnail', 58, 68, true );
        add_image_size( 'itfirm-post', 870, 457, true );
        add_image_size( 'itfirm-portfolio', 370, 362, true );

		add_theme_support( 'woocommerce' );
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		remove_theme_support('widgets-block-editor');
	}
endif;
add_action( 'after_setup_theme', 'itfirm_setup' );

/**
 * Set the content width in pixels, based on the theme's design and stylesheet.
 *
 * Priority 0 to make it available to lower priority callbacks.
 *
 */
function itfirm_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'itfirm_content_width', 640 );
}

add_action( 'after_setup_theme', 'itfirm_content_width', 0 );

/**
 * Register widget area.
 */
function itfirm_widgets_init() {
	register_sidebar( array(
		'name'          => esc_html__( 'Blog Sidebar', 'itfirm' ),
		'id'            => 'sidebar-blog',
		'description'   => esc_html__( 'Add widgets here.', 'itfirm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title"><span>',
		'after_title'   => '</span></h2>',
	) );

	if (class_exists('ReduxFramework')) {
		register_sidebar( array(
			'name'          => esc_html__( 'Page Sidebar', 'itfirm' ),
			'id'            => 'sidebar-page',
			'description'   => esc_html__( 'Add widgets here.', 'itfirm' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		) );
	}

	register_sidebar( array(
		'name'          => esc_html__( 'Header Hidden Sidebar', 'itfirm' ),
		'id'            => 'sidebar-hidden',
		'description'   => esc_html__( 'Add widgets here.', 'itfirm' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
		'after_widget'  => '</div></section>',
		'before_title'  => '<h2 class="widget-title">',
		'after_title'   => '</h2>',
	) );

	if ( class_exists( 'Woocommerce' ) ) {
		register_sidebar( array(
			'name'          => esc_html__( 'Shop Sidebar', 'itfirm' ),
			'id'            => 'sidebar-shop',
			'description'   => esc_html__( 'Add widgets here.', 'itfirm' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s"><div class="widget-content">',
			'after_widget'  => '</div></section>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		) );
	}
}

add_action( 'widgets_init', 'itfirm_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function itfirm_scripts() {
	$theme = wp_get_theme( get_template() );

	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css', array(), '4.0.0' );
	wp_enqueue_style( 'caseicon', get_template_directory_uri() . '/assets/css/caseicon.css', array(), $theme->get( 'Version' ) );
	wp_enqueue_style( 'flaticon', get_template_directory_uri() . '/assets/css/flaticon.css', array(), $theme->get( 'Version' ) );
	wp_enqueue_style( 'flaticon2', get_template_directory_uri() . '/assets/css/flaticon2.css', array(), $theme->get( 'Version' ) );
	wp_enqueue_style( 'magnific-popup', get_template_directory_uri() . '/assets/css/magnific-popup.css', array(), '1.0.0' );
	wp_enqueue_style( 'animate', get_template_directory_uri() . '/assets/css/animate.css', array(), '1.0.0' );
	wp_enqueue_style( 'itfirm-theme', get_template_directory_uri() . '/assets/css/theme.css', array(), $theme->get( 'Version' ) );
	wp_add_inline_style( 'itfirm-theme', itfirm_inline_styles() );
	wp_enqueue_style( 'itfirm-style', get_stylesheet_uri() );
	wp_enqueue_style( 'itfirm-google-fonts', itfirm_fonts_url() );

	/* Lib JS */
	wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.min.js', array( 'jquery' ), '4.0.0', true );
    wp_enqueue_script( 'nice-select', get_template_directory_uri() . '/assets/js/nice-select.min.js', array( 'jquery' ), 'all', true );
    wp_enqueue_script( 'match-height', get_template_directory_uri() . '/assets/js/match-height-min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'magnific-popup', get_template_directory_uri() . '/assets/js/magnific-popup.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'progressbar', get_template_directory_uri() . '/assets/js/progressbar.min.js', array( 'jquery' ), '1.0.0', true );
    wp_enqueue_script( 'wow', get_template_directory_uri() . '/assets/js/wow.min.js', array( 'jquery' ), '1.0.0', true );
    wp_register_script( 'ct-cookie', get_template_directory_uri() . '/assets/js/jquery.cookie.js', array( 'jquery' ), '1.4.1', true );

    /* Theme JS */
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	wp_enqueue_script( 'itfirm-main', get_template_directory_uri() . '/assets/js/main.js', array( 'jquery' ), $theme->get( 'Version' ), true );
	wp_enqueue_script( 'itfirm-woocommerce', get_template_directory_uri() . '/woocommerce/woocommerce.js', array( 'jquery' ), $theme->get( 'Version' ), true );

    /*
     * Elementor Widget JS
     */
    wp_register_script( 'ct-elementor-js', get_template_directory_uri() . '/elementor/js/ct-elementor.js', [ 'jquery' ], $theme->get( 'Version' ) );
    // Inline CSS
    wp_register_script( 'ct-inline-css-js', get_template_directory_uri() . '/elementor/js/ct-inline-css.js', [ 'jquery' ], $theme->get( 'Version' ) );
    // Typing Out
    wp_register_script( 'ct-typing-out-js', get_template_directory_uri() . '/elementor/js/ct-typingout.js', [ 'jquery' ], $theme->get( 'Version' ) );
    // Counter Widget
    wp_register_script( 'ct-counter-widget-js', get_template_directory_uri() . '/elementor/js/ct-counter-widget.js', [ 'jquery' ], $theme->get( 'Version' ) );
    // Progress Bar Widget
    wp_register_script( 'ct-progressbar-widget-js', get_template_directory_uri() . '/elementor/js/ct-progressbar-widget.js', [ 'jquery' ], $theme->get( 'Version' ) );
    // Pie Charts Widget
    wp_register_script( 'ct-piecharts-widget-js', get_template_directory_uri() . '/elementor/js/ct-piecharts-widget.js', [ 'jquery' ], $theme->get( 'Version' ) );
    // Line Charts Widget
    wp_register_script( 'chart-js', get_template_directory_uri() . '/elementor/js/chart.min.js', array( 'jquery' ), '2.9.4', true );
    wp_register_script( 'ct-linecharts-widget-js', get_template_directory_uri() . '/elementor/js/ct-linecharts-widget.js', [ 'jquery' ], $theme->get( 'Version' ) );
    // Text Circle Type Widget
    wp_register_script( 'circletype-js', get_template_directory_uri() . '/elementor/js/circletype.min.js', array( 'jquery' ), '2.3.2', true );
    wp_register_script( 'ct-circletype-js', get_template_directory_uri() . '/elementor/js/ct-circletype.js', [ 'jquery' ], $theme->get( 'Version' ) );
    // Countdown Widget
    wp_register_script('ct-countdown', get_template_directory_uri() . '/elementor/js/ct-countdown.js', [ 'jquery' ], $theme->get( 'Version' ) );
    // Post Carousel Widget
    wp_register_script( 'ct-post-carousel-widget-js', get_template_directory_uri() . '/elementor/js/ct-post-carousel-widget.js', [ 'jquery' ], $theme->get( 'Version' ) );
	wp_register_script('ct-post-masonry-widget-js', get_template_directory_uri() . '/elementor/js/ct-post-masonry-widget.js', [ 'isotope', 'jquery' ], $theme->get( 'Version' ), true);
    wp_register_script('ct-post-grid-widget-js', get_template_directory_uri() . '/elementor/js/ct-post-grid-widget.js', [ 'isotope', 'jquery' ], $theme->get( 'Version' ), true);
    wp_register_script('ct-toggle-widget-js', get_template_directory_uri() . '/elementor/js/ct-toggle-widget.js', [ 'jquery' ], $theme->get( 'Version' ), true);
    wp_register_script('ct-accordion-widget-js', get_template_directory_uri() . '/elementor/js/ct-accordion-widget.js', [ 'jquery' ], $theme->get( 'Version' ), true);
    wp_register_script('ct-alert-widget-js', get_template_directory_uri() . '/elementor/js/ct-alert-widget.js', [ 'jquery' ], $theme->get( 'Version' ), true);
    wp_register_script('ct-tabs-widget-js', get_template_directory_uri() . '/elementor/js/ct-tabs-widget.js', [ 'jquery' ], $theme->get( 'Version' ), true);
    wp_localize_script( 'ct-post-masonry-widget-js', 'main_data', array( 'ajax_url' => admin_url( 'admin-ajax.php' ) ) );
}

add_action( 'wp_enqueue_scripts', 'itfirm_scripts' );

/* add admin styles */
function itfirm_admin_style() {
	$theme = wp_get_theme( get_template() );
	wp_enqueue_style( 'itfirm-admin-style', get_template_directory_uri() . '/assets/css/admin.css', array(), $theme->get( 'Version' ) );
	wp_enqueue_style( 'font-flaticon', get_template_directory_uri() . '/assets/css/flaticon.css', array(), $theme->get( 'Version' ) );
	wp_enqueue_style( 'font-flaticon2', get_template_directory_uri() . '/assets/css/flaticon2.css', array(), $theme->get( 'Version' ) );
	wp_enqueue_script( 'itfirm-main-admin', get_template_directory_uri() . '/assets/js/main-admin.js', array( 'jquery' ), $theme->get( 'Version' ), true );
}

add_action( 'admin_enqueue_scripts', 'itfirm_admin_style' );

/**
 * Helper functions for this theme.
 */
require_once get_template_directory() . '/inc/template-functions.php';

/**
 * Theme options
 */
require_once get_template_directory() . '/inc/theme-options.php';

/**
 * Page options
 */
require_once get_template_directory() . '/inc/page-options.php';

/**
 * Theme Configs
 */
require_once get_template_directory() . '/inc/theme-config.php';

/**
 * CSS Generator.
 */
if ( ! class_exists( 'CSS_Generator' ) ) {
	require_once get_template_directory() . '/inc/classes/class-css-generator.php';
}

/**
 * Breadcrumb.
 */
require_once get_template_directory() . '/inc/classes/class-breadcrumb.php';

/**
 * Custom template tags for this theme.
 */
require_once get_template_directory() . '/inc/template-tags.php';

/* Load list require plugins */
require_once get_template_directory() . '/inc/require-plugins.php';


/**
 * Additional widgets for the theme
 */
require_once get_template_directory() . '/widgets/widget-recent-posts.php';
require_once get_template_directory() . '/widgets/widget-social.php';
require_once get_template_directory() . '/widgets/widget-getintouch.php';
require_once get_template_directory() . '/widgets/class.widget-extends.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require_once get_template_directory() . '/inc/extends.php';

/**
 * Elementor
*/
itfirm_require_folder('inc/elementor');
if (did_action('elementor/loaded')) 
	require_once get_template_directory() . '/inc/elementor/elementor-actions.php';


if ( ! function_exists( 'itfirm_fonts_url' ) ) :
	/**
	 * Register Google fonts.
	 *
	 * Create your own itfirm_fonts_url() function to override in a child theme.
	 *
	 * @since league 1.1
	 *
	 * @return string Google fonts URL for the theme.
	 */
	function itfirm_fonts_url() {
		$fonts_url = '';
		$fonts     = array();
		$subsets   = 'latin,latin-ext';

		if ( 'off' !== _x( 'on', 'Roboto font: on or off', 'itfirm' ) ) {
			$fonts[] = 'Roboto:ital,wght@0,400;0,500;0,600;0,700';
		}

		if ( 'off' !== _x( 'on', 'Nunito font: on or off', 'itfirm' ) ) {
			$fonts[] = 'Nunito:ital,wght@0,400;0,500;0,600;0,700;0,800';
		}

		if ( 'off' !== _x( 'on', 'Fira Sans font: on or off', 'itfirm' ) ) {
			$fonts[] = 'Fira Sans:ital,wght@0,400;0,500;0,600;0,700;0,800';
		}

		if ( 'off' !== _x( 'on', 'Saira font: on or off', 'itfirm' ) ) {
			$fonts[] = 'Saira:ital,wght@0,400;0,500;0,600;0,700';
		}

		if ( 'off' !== _x( 'on', 'Poppins font: on or off', 'itfirm' ) ) {
			$fonts[] = 'Poppins:ital,wght@0,400;0,500;0,600;0,700';
		}

		if ( 'off' !== _x( 'on', 'Playfair Display font: on or off', 'itfirm' ) ) {
			$fonts[] = 'Playfair Display:ital,wght@0,700;1,700';
		}

		if ( $fonts ) {
			$fonts_url = add_query_arg( array(
				'family' => implode( '&family=', $fonts ),
                'subset' => urlencode( $subsets ),
			), '//fonts.googleapis.com/css2' );
		}
		return $fonts_url;
	}
endif;