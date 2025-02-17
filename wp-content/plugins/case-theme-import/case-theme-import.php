<?php
/**
 * Plugin Name: Case Theme Import
 * Plugin URI: http://casethemes.net/
 * Description: Import demo data for clients site.
 * Version: 1.0.5
 * Author: Case-Themes
 * Author URI: https://themeforest.net/user/case-themes/portfolio
 * License: GPLv2
 * Text Domain: case-theme-import
 */
if (!defined('ABSPATH')) {
    exit();
}
define('CTI_TEXT_DOMAIN', 'case-theme-import');

if (!class_exists('CT_Import_Export')) {

    /**
     * Main Class CT_Import_Export
     *
     * @since 1.0.0
     *
     * @description: Public CT_Import_Export:: or GLOBAL ct_ie()
     *
     * @author: Case-Themes
     *
     * @create: 15 November, 2017
     */
    class CT_Import_Export
    {
        public $file;
        public $basename;
        public $plugin_dir;
        public $plugin_url;
        public $assets_dir;
        public $assets_url;
        public $theme_dir;
        public $theme_url;
        public $theme_name;
        public $theme_text_domain;
        public static $instance;

        /**
         * @return CT_Import_Export
         */
        public static function instance()
        {
            if (is_null(self::$instance)) {
                self::$instance = new CT_Import_Export();
                self::$instance->setup_globals();
                self::$instance->includes();
                self::$instance->setup_actions();
            }

            return self::$instance;
        }

        private function setup_globals()
        {
            $this->file = __FILE__;

            /* base name. */
            $this->basename = plugin_basename($this->file);

            /* base plugin. */
            $this->plugin_dir = plugin_dir_path($this->file);
            $this->plugin_url = plugin_dir_url($this->file);

            /* base assets. */
            $this->assets_dir = trailingslashit($this->plugin_dir . 'assets');
            $this->assets_url = trailingslashit($this->plugin_url . 'assets');

            $this->theme_dir = trailingslashit(get_template_directory() . '/inc/demo-data');
            $this->theme_url = trailingslashit(get_template_directory_uri() . '/inc/demo-data');

        }

        function ct_ie_menu_handle()
        {
            $current_theme = wp_get_theme();
            $this->theme_name = $current_theme->get('Name');
            $this->theme_text_domain = $current_theme->get('TextDomain');
            if (class_exists('Case_Theme_Core')) {
                add_submenu_page($this->theme_text_domain, esc_html__('Import Demo', CTI_TEXT_DOMAIN), esc_html__('Import Demo', CTI_TEXT_DOMAIN), 'manage_options', 'ct-import', array($this, 'ct_import_demo_page'));
            } else {
                add_submenu_page('tools.php', esc_html__('Import Demo', CTI_TEXT_DOMAIN), esc_html__('Import Demo', CTI_TEXT_DOMAIN), 'manage_options', 'ct-import', array($this, 'ct_import_demo_page'));
            }
        }

        public function ct_import_demo_page()
        {
            $export_mode = $this->ct_ie_enable_export_mode();
            include_once ct_ie()->plugin_dir . 'templates/import-page.php';
        }


        function ct_ie_enable_export_mode()
        {
            return apply_filters('ct_ie_export_mode', false);
        }

        private function includes()
        {
            global $wp_filesystem;

            add_action('admin_menu', array($this, 'ct_ie_menu_handle'),100);
            add_action('admin_enqueue_scripts', array($this, 'ct_ie_enqueue_scripts'));

            /**
             * Add WP_Filesystem Class
             *
             */
            if (!class_exists('WP_Filesystem')) {
                require_once(ABSPATH . 'wp-admin/includes/file.php');
                WP_Filesystem();
            }


            // Load Importer API
            require_once ABSPATH . 'wp-admin/includes/import.php';

            if (!class_exists('WP_Importer'))
                require_once ABSPATH . 'wp-admin/includes/class-wp-importer.php';


            require_once ABSPATH . 'wp-admin/includes/post.php';

            require_once ABSPATH . 'wp-admin/includes/comment.php';

            require_once ABSPATH . 'wp-admin/includes/media.php';

            require_once ABSPATH . 'wp-admin/includes/image.php';

            require_once ABSPATH . 'wp-admin/includes/taxonomy.php';

            // include WXR file parsers
            require ct_ie()->plugin_dir . 'includes/api/parsers.php';

            /* class WP_Import not exists */
            if (!class_exists('CT_Import'))
                require_once ct_ie()->plugin_dir . 'includes/api/wordpress-importer.php';

            /**
             * Require extra functions file
             */
            require_once $this->plugin_dir . 'includes/extra-functions.php';
            /**
             * Require export contents handle
             */
            require_once $this->plugin_dir . 'includes/export.php';

            /**
             * Require import contents handle
             */
            require_once $this->plugin_dir . 'includes/import-contents.php';

            /**
             * Require media handle
             */
            require_once $this->plugin_dir . 'includes/attachments.php';

            /**
             * Require zip file and download handle
             */
            require_once $this->plugin_dir . 'includes/zip-file-and-download.php';

            /**
             * Require widget handle
             */
            require_once $this->plugin_dir . 'includes/widgets.php';

            /**
             * Require theme options handle
             */
            require_once $this->plugin_dir . 'includes/settings.php';


            /**
             * Require wp options handle
             */
            require_once $this->plugin_dir . 'includes/options.php';


            /**
             * Require wp options handle
             */
            require_once $this->plugin_dir . 'includes/revslider.php';


            /**
             * Require clear tmp folder
             */
            require_once $this->plugin_dir . 'includes/clear-folder.php';


            /**
             * Require term handlers
             */
            require_once $this->plugin_dir . 'includes/term-handlers.php';

            /**
             * Require woocommerce attributes handles
             */
            require_once $this->plugin_dir . 'includes/woo_attributes_handles.php';


            /**
             * Require reset demo data
             */
            require_once $this->plugin_dir . 'includes/wp-reset.php';


            /**
             * Add CT_Import_Export_redirect_handle Class
             *
             */
            if (!class_exists('CT_Import_Export_handle')) {
                require_once($this->plugin_dir . 'includes/import-export-handle.php');
                new CT_Import_Export_handle();
            }

        }

        private function setup_actions()
        {
        }

        function pp_load_textdomain()
        {
            $language_folder = basename(dirname(__FILE__)) . '/languages';
            load_plugin_textdomain(CTI_TEXT_DOMAIN, false, $language_folder);
        }


        function get_all_demo_folder()
        {

            if (!is_dir($this->theme_dir))
                return false;

            $files = scandir($this->theme_dir, 1);

            return array_diff($files, array('..', '.', 'attachment'));
        }

        function ct_ie_enqueue_scripts()
        {
            if (isset($_REQUEST['page']) && $_REQUEST['page'] === 'ct-import') {
                wp_enqueue_style('ct-ie.css', $this->plugin_url . 'assets/ct-ie.css');
                wp_enqueue_script('ct-ie.js', $this->plugin_url . 'assets/ct-ie.js', array(), 'all', true);
            }
        }
    }

    function ct_ie()
    {
        return CT_Import_Export::instance();
    }

    $GLOBALS['ct_ie'] = ct_ie();
}