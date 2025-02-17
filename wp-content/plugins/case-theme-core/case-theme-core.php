<?php
/**
 * Plugin Name: Case Theme Core
 * Description: Elementor Page Builder Extension.
 * Plugin URI:  http://casethemes.net/
 * Version:     1.2.5
 * Author:      Case-Themes
 * Author URI:  https://themeforest.net/user/case-themes/portfolio
 * Update URI:  https://demo.casethemes.net/
 * Text Domain: case-theme-core
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

define('CT_TEXT_DOMAIN', 'case-theme-core');
define('CT_PATH', plugin_dir_path(__FILE__));
define('CT_URL', plugin_dir_url(__FILE__));

if(file_exists(WP_PLUGIN_DIR . '/redux-framework/redux-framework.php')){
    $default_headers = array(
        'Name'        => 'Plugin Name',
        'PluginURI'   => 'Plugin URI',
        'Version'     => 'Version',
        'Description' => 'Description',
        'Author'      => 'Author',
        'AuthorURI'   => 'Author URI',
        'TextDomain'  => 'Text Domain',
        'DomainPath'  => 'Domain Path',
        'Network'     => 'Network',
        'RequiresWP'  => 'Requires at least',
        'RequiresPHP' => 'Requires PHP',
        // Site Wide Only is deprecated in favor of Network.
        '_sitewide'   => 'Site Wide Only',
    );
    $reduxFrameworkData = get_file_data( WP_PLUGIN_DIR . '/redux-framework/redux-framework.php', $default_headers, 'plugin' );
    if(!class_exists('ReduxFrameworkInstances') && version_compare( $reduxFrameworkData['Version'], '4.0.0', '>=' )){
        require_once CT_PATH . 'inc/redux/class-ReduxFrameworkInstances.php';
    }
}

final class Case_Theme_Core {

    const VERSION = '1.2.1';

    const MINIMUM_ELEMENTOR_VERSION = '2.0.0';

    const MINIMUM_PHP_VERSION = '7.0';

    const CT_CATEGORY_NAME = 'case-theme-core';

    const CT_CATEGORY_TITLE = 'Case Theme Core';

    const EMOJI_CONTROL = 'emojionearea';

    const LAYOUT_CONTROL = 'layoutcontrol';

    const ICONS_CONTROL = 'ct_icons';

    const LIST_CONTROL = 'ct_lists';

    const LIST_PRICING_CONTROL = 'ct_lists_pricing';

    const PROGRESSBAR_CONTROL = 'ct_progressbar';

    const CT_TAB_NAME = 'case_theme_core';

    const CT_TAB_TITLE = 'Case Theme Core';

    public $post_metabox = null;
    public $taxonomy_meta = null;
    private static $_instance = null;

    public static function instance() {

        if ( is_null( self::$_instance ) ) {
            self::$_instance = new self();
        }
        return self::$_instance;

    }

    public function __construct() {
        add_action( 'init', [ $this, 'load_scss_lib' ], 2 );
        add_action( 'init', [ $this, 'i18n' ] );
        add_action( 'plugins_loaded', [ $this, 'init' ] );
        // lack to elementor deprecate jquery-slick
        add_action('deprecated_file_included', [$this, 'deprecated_file_included'], 2);

        add_action('wp_enqueue_scripts', array($this, 'enqueue'));
        add_action('admin_enqueue_scripts', array($this, 'admin_enqueue'));

        add_action( 'redux/construct', [$this, 'pxl_validate_redux_framework'] );

        if (!class_exists('EFramework_CPT_Register')) {
            require_once CT_PATH . 'inc/class-cpt-register.php';
            EFramework_CPT_Register::get_instance();
        }

        if (!class_exists('EFramework_CTax_Register')) {
            require_once CT_PATH . 'inc/class-ctax-register.php';
            EFramework_CTax_Register::get_instance();
        }

        if (!class_exists('EFramework_MegaMenu_Register')) {
            require_once CT_PATH . 'inc/mega-menu/class-megamenu.php';
            EFramework_MegaMenu_Register::get_instance();
        }

        if (!class_exists('EFramework_menu_handle')) {
            require_once CT_PATH . 'inc/class-menu-hanlde.php';
        }

        if(!class_exists('CT_Ajax_Handle')){
            require_once CT_PATH . 'inc/class-ajax-handle.php';
        }
    }

    public function i18n() {
        load_plugin_textdomain( CT_TEXT_DOMAIN );

        if (!class_exists('ReduxFramework')) {
            add_action('admin_notices', array($this, 'redux_framework_notice'));
        } else {
            if (!class_exists('CT_Post_Metabox')) {
                require_once CT_PATH . 'inc/class-post-metabox.php';

                if (empty($this->post_metabox)) {
                    $this->post_metabox = new CT_Post_Metabox();
                }
            }
            if (!class_exists('CT_Taxonomy_Meta')) {
                require_once CT_PATH . 'inc/class-taxonomy-meta.php';

                if (empty($this->taxonomy_meta)) {
                    $this->taxonomy_meta = new CT_Taxonomy_Meta();
                }
            }
        }
    }

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

        if (class_exists('ReduxFramework') && !class_exists('CT_Redux_Extensions')) {
            require_once CT_PATH . 'inc/class-redux-extensions.php';
        }

        add_action( 'elementor/editor/before_enqueue_scripts', function() {
            wp_enqueue_style( 'ct-editor-css', CT_URL . '/assets/css/elementor-editor.css', array(), '1.0.0' );
        } );

        add_action('elementor/editor/v2/scripts/enqueue/after', function () {
            wp_enqueue_script('pxl-core-base', CT_URL . 'assets/js/base.js', [ 'jquery' ], '1.0.0', true);
        });

        // Include Helper
        require_once( __DIR__ . '/inc/helpers/resize-image.php' );
        require_once( __DIR__ . '/inc/helpers/common.php' );
        require_once( __DIR__ . '/inc/helpers/widget.php' );

        // Widget Categories
        add_action( 'elementor/elements/categories_registered', [ $this, 'add_elementor_widget_categories' ] );

        // Add Plugin actions
        add_action( 'elementor/widgets/register', [ $this, 'init_widgets' ] );
        add_action( 'elementor/controls/controls_registered', [ $this, 'init_controls' ] );

        add_action( 'elementor/elements/elements_registered', [ $this, 'elements_registered' ] );
    }

    function deprecated_file_included($file){
        if($file == 'jquery-slick'){
            add_filter( 'deprecated_file_trigger_error', function () {
                return false;
            }, 2 );
        }
    }

    public function load_scss_lib(){
        $scssc_lib = apply_filters('ct_scssc_lib', 'old');
        $ct_scssc_on = apply_filters('ct_scssc_on', false);
        if ($ct_scssc_on && $scssc_lib === 'old' && !class_exists('scssc')) {
            // scss compiler library v0.0.12
            require_once __DIR__ . '/lib/scss.inc.php';
        }
        if ($ct_scssc_on && $scssc_lib === 'new' && !class_exists('\Leafo\ScssPhp\Compiler')) {
            // scss compiler library v0.7.5
            require_once __DIR__ . '/lib/scss/scss.inc.php';
        }
    }

    public function enqueue(){
        /* Styles */
        wp_enqueue_style('ct-main-css', CT_URL . 'assets/css/main.css', [], '1.0.0');
        wp_enqueue_style('progressbar-lib-css', CT_URL . 'assets/css/lib/progressbar.min.css', [], '0.7.1');
        wp_enqueue_style('oc-css', CT_URL . 'assets/css/lib/owl.carousel.min.css', [], '2.2.1');
        wp_enqueue_style('ct-slick-css', CT_URL . 'assets/css/lib/slick.css', [], '1.0.0');

        /* Scripts */
        wp_register_script('waypoints', CT_URL . 'assets/js/lib/waypoints.min.js', [ 'jquery' ], '2.0.5');
        wp_register_script('imagesloaded', CT_URL . 'assets/js/lib/imagesloaded.pkgd.min.js', [ 'jquery' ], '3.1.8');
        wp_register_script('isotope', CT_URL . 'assets/js/lib/isotope.pkgd.min.js', [ 'jquery' ], '3.0.5');
        wp_register_script('counter-lib-js', CT_URL . 'assets/js/lib/counter.min.js', [ 'jquery' ], '');
        wp_register_script('oc-js', CT_URL . 'assets/js/lib/owl.carousel.min.js', [ 'jquery' ], '2.2.1');
        wp_register_script('progressbar-lib-js', CT_URL . 'assets/js/lib/progressbar.min.js', ['jquery'], '0.7.1');
        wp_register_script('easy-pie-chart-lib-js', CT_URL . 'assets/js/lib/easy-pie-chart.js', ['jquery'], '2.1.7');
        if(!wp_script_is('jquery-slick')){
            wp_register_script('jquery-slick', CT_URL . 'assets/js/lib/slick.min.js', ['jquery'], '1.8.1');
        }

        wp_enqueue_script('ct-core-main', CT_URL . 'assets/js/main.js', [ 'jquery', 'waypoints' ], '1.0.0', true);
    }

    public function admin_enqueue(){
        wp_enqueue_style('ct-admin-css', CT_URL . 'assets/css/admin.css', [], '1.0.0');
    }

    public function admin_notice_missing_main_plugin() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" to be installed and activated.', CT_TEXT_DOMAIN ),
            '<strong>' . esc_html__( 'Case Theme Core', CT_TEXT_DOMAIN ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor Plugin', CT_TEXT_DOMAIN ) . '</strong>'
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    public function admin_notice_minimum_elementor_version() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', CT_TEXT_DOMAIN ),
            '<strong>' . esc_html__( 'Case Theme Core', CT_TEXT_DOMAIN ) . '</strong>',
            '<strong>' . esc_html__( 'Elementor Plugin', CT_TEXT_DOMAIN ) . '</strong>',
            self::MINIMUM_ELEMENTOR_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    public function admin_notice_minimum_php_version() {

        if ( isset( $_GET['activate'] ) ) unset( $_GET['activate'] );

        $message = sprintf(
            esc_html__( '"%1$s" requires "%2$s" version %3$s or greater.', CT_TEXT_DOMAIN ),
            '<strong>' . esc_html__( 'Case Theme Core', CT_TEXT_DOMAIN ) . '</strong>',
            '<strong>' . esc_html__( 'PHP', CT_TEXT_DOMAIN ) . '</strong>',
            self::MINIMUM_PHP_VERSION
        );

        printf( '<div class="notice notice-warning is-dismissible"><p>%1$s</p></div>', $message );

    }

    /**
     * Redux Framework notices
     *
     * @since 1.0
     * @access public
     */
    function redux_framework_notice()
    {
        $plugin_name = '<strong>' . esc_html__("Case Theme Core", CT_TEXT_DOMAIN) . '</strong>';
        $redux_name = '<strong>' . esc_html__("Redux Framework", CT_TEXT_DOMAIN) . '</strong>';

        echo '<div class="notice notice-warning is-dismissible">';
        echo '<p>';
        printf(
            esc_html__('%1$s require %2$s installed and activated. Please active %3$s plugin', CT_TEXT_DOMAIN),
            $plugin_name,
            $redux_name,
            $redux_name
        );
        echo '</p>';
        printf('<button type="button" class="notice-dismiss"><span class="screen-reader-text">%s</span></button>', esc_html__('Dismiss this notice.', CT_TEXT_DOMAIN));
        echo '</div>';
    }

    public function elements_registered(){
        require_once( __DIR__ . '/inc/elementor/section.php' );
        require_once( __DIR__ . '/inc/elementor/column.php' );

        $elements_manager = \Elementor\Plugin::$instance->elements_manager;
        $elements_manager->unregister_element_type('section');
        $elements_manager->unregister_element_type('column');
        $elements_manager->register_element_type(new \Elementor\CT_Element_Section());
        $elements_manager->register_element_type(new \Elementor\CT_Element_Column());

        if (defined('ELEMENTOR_VERSION') && is_callable('Elementor\Plugin::instance')) {
            $e_font_icon_svg = \Elementor\Plugin::$instance->experiments->is_feature_active( 'e_font_icon_svg' );
            if ($e_font_icon_svg){
                update_option( 'elementor_experiment-e_font_icon_svg', 'inactive', 'yes' );
            }
        }
    }

    public function init_widgets() {

        // Include Widget files
        require_once( __DIR__ . '/inc/widgets/abstract-class-widget-base.php' );

        if(is_file(get_template_directory() . '/elementor/core/elementor.php')){
            require_once get_template_directory() . '/elementor/core/elementor.php';
        }
    }

    public function init_controls() {

        // Include Control files
        require_once( __DIR__ . '/inc/controls/class-control-emoji.php' );
        require_once( __DIR__ . '/inc/controls/class-control-layout.php' );
        require_once( __DIR__ . '/inc/controls/class-control-icons.php' );
        require_once( __DIR__ . '/inc/controls/class-control-list.php' );
        require_once( __DIR__ . '/inc/controls/class-control-list-pricing.php' );
        require_once( __DIR__ . '/inc/controls/class-control-progressbar.php' );

        $controls_manager = \Elementor\Plugin::$instance->controls_manager;

        // Register control
        $controls_manager->register_control( null, new Case_Theme_Core_EmojiOneArea_Control() );
        $controls_manager->register_control( null, new Case_Theme_Core_Layout_Control() );
        $controls_manager->register_control( null, new Case_Theme_Core_Icons_Control() );
        $controls_manager->register_control( null, new Case_Theme_Core_List_Control() );
        $controls_manager->register_control( null, new Case_Theme_Core_List_Pricing_Control() );
        $controls_manager->register_control( null, new Case_Theme_Core_Progressbar_Control() );

        // Add Tab
        $controls_manager->add_tab( self::CT_TAB_NAME, esc_html__(self::CT_TAB_TITLE, CT_TEXT_DOMAIN) );
    }

    function add_elementor_widget_categories( $elements_manager ) {

        $categories = apply_filters('ct_add_custom_categories', array(
            array(
                'name' => self::CT_CATEGORY_NAME,
                'title' => __( self::CT_CATEGORY_TITLE, CT_TEXT_DOMAIN ),
                'icon' => 'fa fa-plug',
            ),
        ));

        foreach ($categories as $cat){
            $elements_manager->add_category(
                $cat['name'],
                array(
                    'title' => $cat['title'],
                    'icon' => $cat['icon'],
                )
            );
        }
    }

    public function pxl_validate_redux_framework($redux){
        $redux->filesystem = Redux_Filesystem::get_instance( $redux );
    }
}

Case_Theme_Core::instance();

/*
    Plugin auto update filter
    update_plugins_demo.casethemes.net
    update_plugins_ + UpdateURI host name
*/
add_filter( 'update_plugins_demo.casethemes.net', 'pxl_update_plugins_api', 10, 4 );
function pxl_update_plugins_api($update, $plugin_data, $plugin_file, $locales){
    $url      = 'http://api.casethemes.net/';
    $http_url = $url;
    $ssl      = wp_http_supports( array( 'ssl' ) );
    if ( $ssl ) {
        $url = set_url_scheme( $url, 'https' );
    } 
    $raw_response = wp_remote_get(
        add_query_arg( ['action' => 'pxl_get_update_plugins', 'plugin_file' => $plugin_file], $url ),
        array( 'timeout' => 15 )
    );
    if ( $ssl && is_wp_error( $raw_response ) ) {
        $raw_response = wp_remote_get(
            add_query_arg( ['action' => 'pxl_get_update_plugins', 'plugin_file' => $plugin_file], $http_url ),
            array( 'timeout' => 15 )
        );
    }
    
    if ( is_wp_error( $raw_response ) || 200 !== wp_remote_retrieve_response_code( $raw_response ) ) {
        return $update;
    }
    $response = json_decode( wp_remote_retrieve_body( $raw_response ), true ); 
    if ( $response && is_array( $response ) ) {
        $update = [
            'version' => $response[$plugin_file]['version'],
            'package' => $response[$plugin_file]['package']
        ];
    }
    return $update;
} 