<?php
/**
 * Plugin Name: Bastun Elementor
 * Description: Create unlimited widgets with Elementor Page Builder.
 * Plugin URI:  http://shtheme.com/
 * Version:     1.0.0
 * Author:      Nasir Uddin Mandal
 * Author URI:  http://shtheme.com
 * Text Domain: bdevs-elementor
 * Domain Path: /languages/
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly.
}

/**
 * Main Bdevs Elementor Class
 *
 * The main class that initiates and runs the plugin.
 *
 * @since 1.0.0
 */
final class BdevsElementor {

	/**
	 * Plugin Version
	 *
	 * @since 1.0.0
	 *
	 * @var string The plugin version.
	 */
	const VERSION = '1.0.0';

	/**
	 * Minimum Elementor Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum Elementor version required to run the plugin.
	 */
	const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

	/**
	 * Minimum PHP Version
	 *
	 * @since 1.0.0
	 *
	 * @var string Minimum PHP version required to run the plugin.
	 */
	const MINIMUM_PHP_VERSION = '5.5';

	/**
	 * Instance
	 *
	 * @since 1.0.0
	 *
	 * @access private
	 * @static
	 *
	 * @var BdevsElementor The single instance of the class.
	 */
	private static $_instance = null;

	/**
	 * Instance
	 *
	 * Ensures only one instance of the class is loaded or can be loaded.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 * @static
	 *
	 * @return BdevsElementor An instance of the class.
	 */
	public static function instance() {

		if ( is_null( self::$_instance ) ) {
			self::$_instance = new self();
		}
		return self::$_instance;

	}

	/**
	 * Constructor
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function __construct() {

		add_action( 'init', [ $this, 'i18n' ] );
		add_action( 'plugins_loaded', [ $this, 'init' ] );

	}

	/**
	 * Load Textdomain
	 *
	 * Load plugin localization files.
	 *
	 * Fired by `init` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function i18n() {

		load_plugin_textdomain( 'bdevs-elementor' );

	}

	/**
	 * Initialize the plugin
	 *
	 * Load the plugin only after Elementor (and other plugins) are loaded.
	 * Checks for basic plugin requirements, if one check fail don't continue,
	 * if all check have passed load the files required to run the plugin.
	 *
	 * Fired by `plugins_loaded` action hook.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init() {

		// Check if Elementor installed and activated
		if ( ! did_action( 'elementor/loaded' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_missing_main_plugin' ] );
			return;
		}

		// Check for required Elementor version
		if ( ! version_compare( ELEMENTOR_VERSION, self::MINIMUM_ELEMENTOR_VERSION, '>=' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_elementor_version' ] );
			return;
		}

		// Check for required PHP version
		if ( version_compare( PHP_VERSION, self::MINIMUM_PHP_VERSION, '<' ) ) {
			add_action( 'admin_notices', [ $this, 'admin_notice_minimum_php_version' ] );
			return;
		}

		add_action( 'elementor/init', [ $this, 'add_elementor_category' ], 1 );

		// Add Plugin actions
		add_action( 'elementor/frontend/after_register_scripts', [ $this, 'register_frontend_scripts' ], 10 );

		// Register Widget Styles
		add_action( 'elementor/frontend/after_enqueue_styles', [ $this, 'register_frontend_styles' ] );

		add_action( 'elementor/widgets/widgets_registered', [ $this, 'init_widgets' ] );

		// Register controls
		//add_action( 'elementor/controls/controls_registered', [ $this, 'register_controls' ] );
	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have Elementor installed or activated.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_missing_main_plugin() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor */
			esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', 'bdevs-elementor' ),
			'<strong>' . esc_html__( 'Bastun Elementor', 'bdevs-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'bdevs-elementor' ) . '</strong>'
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required Elementor version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_elementor_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: Elementor 3: Required Elementor version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'bdevs-elementor' ),
			'<strong>' . esc_html__( 'Bastun Elementor', 'bdevs-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'Elementor', 'bdevs-elementor' ) . '</strong>',
			 self::MINIMUM_ELEMENTOR_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Admin notice
	 *
	 * Warning when the site doesn't have a minimum required PHP version.
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function admin_notice_minimum_php_version() {

		if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

		$message = sprintf(
			/* translators: 1: Plugin name 2: PHP 3: Required PHP version */
			esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', 'bdevs-elementor' ),
			'<strong>' . esc_html__( 'Bastun Elementor', 'bdevs-elementor' ) . '</strong>',
			'<strong>' . esc_html__( 'PHP', 'bdevs-elementor' ) . '</strong>',
			 self::MINIMUM_PHP_VERSION
		);

		printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

	}

	/**
	 * Add Elementor category.
	 */
	public function add_elementor_category() {
    	\Elementor\Plugin::instance()->elements_manager->add_category('blog-elementor',
	      	array(
					'title' => __( 'Details Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('home-elementor',
	      	array(
					'title' => __( 'Home Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('home-2-elementor',
	      	array(
					'title' => __( 'Home 2 Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('home-3-elementor',
	      	array(
					'title' => __( 'Home 3 Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('home-4-elementor',
	      	array(
					'title' => __( 'Home 4 Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('home-5-elementor',
	      	array(
					'title' => __( 'Home 5 Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('home-6-elementor',
	      	array(
					'title' => __( 'Home 6 Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('home-7-elementor',
	      	array(
					'title' => __( 'Home 7 Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('home-8-elementor',
	      	array(
					'title' => __( 'Home 8 Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('home-9-elementor',
	      	array(
					'title' => __( 'Home 9 Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('home-10-elementor',
	      	array(
					'title' => __( 'Home 10 Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('home-11-elementor',
	      	array(
					'title' => __( 'Home 11 Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('home-12-elementor',
	      	array(
					'title' => __( 'Home 12 Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('home-13-elementor',
	      	array(
					'title' => __( 'Home 13 Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('home-14-elementor',
	      	array(
					'title' => __( 'Home 14 Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('home-15-elementor',
	      	array(
					'title' => __( 'Home 15 Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('home-16-elementor',
	      	array(
					'title' => __( 'Home 16 Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('home-18-elementor',
	      	array(
					'title' => __( 'Home 18 Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('home-19-elementor',
	      	array(
					'title' => __( 'Home 19 Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	    \Elementor\Plugin::instance()->elements_manager->add_category('other-pages-elementor',
	      	array(
					'title' => __( 'Other Pages Elementor', 'bdevs-elementor' ),
					'icon'  => 'fa fa-plug',
	      	) 
	    );
	}

	/**
	* Register Frontend Scripts
	*
	*/
	public function register_frontend_scripts() {
	wp_register_script( 'bdevs-elementor', plugin_dir_url( __FILE__ ) . 'assets/js/bdevs-elementor.js', array( 'jquery' ), self::VERSION );
	}


	/**
	* Register Frontend styles
	*
	*/
	public function register_frontend_styles() {
	wp_register_style( 'bdevs-elementor', plugin_dir_url( __FILE__ ) . 'assets/css/bdevs-elementor.css', self::VERSION );
	}




	/**
	 * Init Widgets
	 *
	 * Include widgets files and register them
	 *
	 * @since 1.0.0
	 *
	 * @access public
	 */
	public function init_widgets() {

		// Blog
		require_once plugin_dir_path( __FILE__ ) . 'widgets/blog/banner-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/blog/blog-grid-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/blog/content-service-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/blog/content-project-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/blog/related-projects-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/blog/content-team-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/blog/content-team-list-widget.php';

		// Home
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home/slider-home1-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home/service-home1-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home/video-home1-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home/about-home1-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home/team-home1-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home/project-home1-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home/testimonial-home1-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home/brand-home1-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home/blog-home1-widget.php';
		
		// Home 2
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home2/slider-home2-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home2/brand-home2-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home2/about-home2-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home2/service-home2-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home2/facts-home2-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home2/team-home2-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home2/project-home2-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home2/testimonials-home2-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home2/blog-home2-widget.php';
		
		// Home 3
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home3/slider-home3-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home3/service-home3-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home3/about-home3-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home3/facts-home3-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home3/team-home3-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home3/work-process-home3-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home3/working-start-home3-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home3/project-home3-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home3/testimonial-home3-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home3/blog-home3-widget.php';

		// Home 4
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home4/slider-home4-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home4/brand-home4-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home4/about-home4-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home4/service-home4-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home4/team-home4-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home4/cta-area-home4-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home4/project-home4-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home4/testimonial-home4-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home4/pricing-home4-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home4/blog-home4-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home4/banner-home4-widget.php';

		// Home 5
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home5/slider-home5-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home5/brand-home5-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home5/about-home5-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home5/skillarea-home5-widget.php';

		// Home 6
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home6/features-home6-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home6/team-home6-widget.php';
		
		// Home 7
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home7/slider-home7-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home7/about-home7-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home7/service-home7-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home7/video-home7-widget.php';

		// Home 8
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home8/slider-home8-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home8/service-home8-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home8/contact-home8-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home8/blog-home8-widget.php';

		// Home 9
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home9/slider-home9-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home9/banners-home9-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home9/brand-home9-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home9/product-home9-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home9/popup-product-home9-widget.php';
		// Home 10
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home10/slider-home10-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home10/about-home10-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home10/contact-home10-widget.php';
		// Home 11
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home11/slider-home11-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home11/service-home11-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home11/about-home11-widget.php';
		// Home 12
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home12/slider-home12-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home12/project-home12-widget.php';
		// Home 13
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home13/slider-home13-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home13/work-process-home13-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home13/about-home13-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home13/pricing-home13-widget.php';
		// Home 14
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home14/slider-home14-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home14/about-home14-widget.php';
		// Home 15
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home15/slider-home15-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home15/skillarea-home15-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home15/contact-home15-widget.php';
		// Home 16
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home16/slider-home16-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home16/faq-home16-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home16/blog-home16-widget.php';
		// Home 18
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home18/slider-home18-widget.php';
		// Home 19
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home19/slider-home19-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/home19/service-home19-widget.php';
		// Home 20


		// Other Pages
		require_once plugin_dir_path( __FILE__ ) . 'widgets/other-pages/about-other-pages-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/other-pages/testimonial-other-pages-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/other-pages/team-pages-other-pages-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/other-pages/service-other-pages-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/other-pages/project-other-pages-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/other-pages/faq-other-pages-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/other-pages/contact-other-pages-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/other-pages/shop-other-pages-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/other-pages/wishlist-other-pages-widget.php';
		require_once plugin_dir_path( __FILE__ ) . 'widgets/other-pages/login-other-pages-widget.php';

		// Blog
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBannerBlog() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBlogGrid() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsContentService() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsContentProject() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsRelatedProject() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsContentTeam() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsContentTeamList() );

		// Home
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSliderHome1() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsServiceHome1() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsVideoHome1() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsAboutHome1() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsTeamHome1() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsProjectHome1() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsTestimonialHome1() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBrandHome1() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBlogHome1() );
		
		// Home 2
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSliderHome2() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBrandHome2() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsAboutHome2() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsServiceHome2() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsFactsHome2() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsTeamHome2() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsProjectHome2() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsTestimonialsHome2() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBlogHome2() );
		
		
		// Home 3
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSliderHome3() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsAboutHome3() );
		
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsServiceHome3() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsFactsHome3() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsTeamHome3() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsWorkProcessHome3() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsWorkingStartHome3() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsProjectHome3() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsTestimonialHome3() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBlogHome3() );
		// Home 4
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSliderHome4() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBrandHome4() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsAboutHome4() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsServiceHome4() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsTeamHome4() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsCTAHome4() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsProjectHome4() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsTestimonialHome4() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsPricingHome4() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBlogHome4() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBannerHome4() );

		// Home 5
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSliderHome5() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBrandHome5() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsAboutHome5() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSkillareaHome5() );
		
		// Home 6
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsFeaturesHome6() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsTeamHome6() );

		// Home 7
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSliderHome7() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsAboutHome7() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsServiceHome7() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsVideoHome7() );

		// Home 8
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSliderHome8() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsServiceHome8() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsContactHome8() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBlogHome8() );

		// Home 9
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSliderHome9() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBannersHome9() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBrandHome9() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsProductHome9() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsPopUpProductHome9() );
		// Home 10
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSliderHome10() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsAboutHome10() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsContactHome10() );
		// Home 11
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSliderHome11() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsServiceHome11() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsAboutHome11() );
		// Home 12
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSliderHome12() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsProjectHome12() );
		// Home 13
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSliderHome13() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsWorkProcessHome13() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsAboutHome13() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsPricingHome13() );
		// Home 14
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSliderHome14() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsAboutHome14() );
		// Home 15
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSliderHome15() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSkillareaHome15() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsContactHome15() );
		// Home 16
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSliderHome16() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsFAQHome16() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsBlogHome16() );
		// Home 18
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSliderHome18() );
		// Home 19
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsSliderHome19() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsServiceHome19() );
		// Home 20


		// Other Pages
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsAboutPages() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsTestimonialaboutPages() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsTeamPagesOtherPages() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsServicePages() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsProjectPages() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsFaqPagesOtherPages() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsContactPages() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsShopPages() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsWishlistPages() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \BdevsElementor\Widget\BdevsLoginPages() );
	}

	/** 
	 * register_controls description
	 * @return [type] [description]
	 */
	public function register_controls() {

		$controls_manager = \Elementor\Plugin::$instance->controls_manager;
		$controls_manager->register_control( 'slider-widget', new Test_Control1() );
	
	}

	/**
	 * Prints the Elementor Page content.
	 */
	public static function get_content( $id = 0 ) {
		if ( class_exists( '\ElementorPro\Plugin' ) ) {
			echo do_shortcode( '[elementor-template id="' . $id . '"]' );
		} else {
			echo \Elementor\Plugin::instance()->frontend->get_builder_content_for_display( $id );
		}
	}

}

BdevsElementor::instance();
