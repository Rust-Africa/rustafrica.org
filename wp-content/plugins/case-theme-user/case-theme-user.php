<?php
/**
 * Plugin Name: Case Theme User
 * Plugin URI: https://themeforest.net/user/case-themes
 * Description: A wordpress login
 * Version: 1.0.2
 * Author: Case-Themes
 * Author URI: https://themeforest.net/user/case-themes
 * License: GPLv2 or later
 * Text Domain: case-theme-user
 */
if (! defined('ABSPATH')) {
    exit();
}

/**
 * Main Class
 *
 * @class Case_Theme_User
 *
 * @version 1.0.0
 */

if (! class_exists('Case_Theme_User')) {

    final class Case_Theme_User
    {
        /**
         * Action argument used by the nonce validating the AJAX request.
         *
         * @var string
         */
        const NONCE = 'up-nonce-ajax';

        public static function instance()
        {
            static $instance = null;
            
            if (null === $instance) {
                
                $instance = new Case_Theme_User();
                
                // globals.
                $instance->setup_globals();
                
                // includes.
                $instance->includes();
                
                // actions.
                $instance->setup_actions();
            }
            return $instance;
        }

        /**
         * globals value.
         *
         * @package WR
         * @global path + uri.
         */
        public function setup_globals()
        {
            $this->file = __FILE__;
            $this->basename = plugin_basename($this->file);
            $this->plugin_dir = plugin_dir_path($this->file);
            $this->plugin_url = plugin_dir_url($this->file);
            
            $this->templates_dir = trailingslashit($this->plugin_dir . 'templates');
            $this->templates_url = trailingslashit($this->plugin_url . 'templates');
            
            $this->acess_dir = trailingslashit($this->plugin_dir . 'acess');
            $this->acess_url = trailingslashit($this->plugin_url . 'acess');
            
            $this->theme_dir = trailingslashit(get_template_directory() . '/userpress');
            $this->theme_url = trailingslashit(get_template_directory_uri() . '/userpress');
        }

        /**
         * setup all actions + filter.
         *
         * @package WR
         * @version 1.0.0
         */
        private function setup_actions()
        {
            /* add front-end scripts. */
            add_action('wp_enqueue_scripts', array(
                $this,
                'add_scrips'
            ));
            
            /* add template scripts. */
            add_action('wp_enqueue_scripts', array(
                $this,
                'add_template_script'
            ));
            
            /* add admin scripts. */
            add_action('admin_enqueue_scripts', array(
                $this,
                'add_admin_script'
            ));
            
            /* add widgets. */
            add_action('widgets_init', array(
                $this,
                'add_widgets'
            ));
        }

        /**
         * include files.
         *
         * @package WR
         * @version 1.0.0
         */
        private function includes()
        {
            require_once userpress()->plugin_dir . 'inc/class.ajax.php';
            require_once userpress()->plugin_dir . 'inc/class.hook.php';
            require_once userpress()->plugin_dir . 'admin/class.admin.php';
            require_once userpress()->plugin_dir . 'inc/templates.php';
            require_once userpress()->plugin_dir . 'inc/class.shortcodes.php';
            require_once userpress()->plugin_dir . 'inc/class.widgets.php';
            require_once userpress()->plugin_dir . 'inc/class.core.php';
        }

        /**
         * add front-end scripts.
         *
         * @package WR
         * @version 1.0.0
         */
        function add_scrips()
        {
            $app_id = array(
                'facebook'  => get_option('user_press_face_api_key', ''),
                'google'    => get_option('user_press_google_api_key', '')
            );
            /* load jquery. */
            wp_enqueue_script('jquery');
            /* jquery lib. */
            wp_enqueue_script( 'notify', userpress()->acess_url . 'js/notify.min.js', array('jquery'), '1.0.0' , true);
            
            $layout = get_option( 'user_press_layout', 'default');
            
            /* load Remodal popup */
            wp_enqueue_style('remodal', $this->acess_url . 'css/remodal.css');
            wp_enqueue_style('remodal-default-theme', $this->acess_url . 'css/remodal-default-theme.css');
            wp_enqueue_script('remodal', $this->acess_url . 'js/remodal.min.js', array('jquery'), '1.0.0' , true);
            
            wp_register_script( 'ct-user-form', userpress()->acess_url . 'js/ct-user-form.js', array('jquery'), '1.0.0' , true);
            wp_localize_script( 'ct-user-form', 'userpress', array( 'ajax' => admin_url('admin-ajax.php'), 'nonce' => wp_create_nonce(Case_Theme_User::NONCE) ) );
            wp_enqueue_script( 'ct-user-form');
        }

        /**
         * add back-end scripts.
         *
         * @package Case_Theme_User
         * @version 1.0.0
         */
        function add_admin_script()
        {
            
            $screen = get_current_screen();
            // if page not ct-user-form_admin.
            if(!isset($screen->base))
                return ;
            
            if($screen->base != 'users_page_ct-user-form_admin')
                return ;
                
            // load media scripts.
            wp_enqueue_media();
            wp_enqueue_script('media-upload');
            
            // admin custom script
            wp_enqueue_script('admin.options', userpress()->acess_url . 'js/admin.options.js');
            wp_enqueue_script('jquery-minicoler', userpress()->acess_url . 'js/jquery.minicolors.js');
            
            wp_enqueue_style('css-minicoler', userpress()->acess_url . 'css/jquery.minicolors.css');
            wp_enqueue_style('admin.options', userpress()->acess_url . 'css/admin.options.css');
        }
        
        /**
         * load custom template scripts.
         * 
         * @author CaseThemes Team
         * @version 1.0.0
         */
        function add_template_script(){
            
            global $post;
            
            if(!is_a( $post, 'WP_Post' ))
                return ;
            
            if(!has_shortcode( $post->post_content, 'ct-user-form'))
                return ;
            
            preg_match_all ("/\[ct-user-form(.*)\]/U", $post->post_content, $matches);
            
            if(empty($matches[0]))
                return ;
            
            foreach ($matches[0] as $item){
            
                preg_match_all('/layout="([^"]+)"/', $item, $_matches);
            
                $layout = isset($_matches[1][0]) ? $_matches[1][0] : 'default' ;
            
                up_get_template_css($layout);
            }
        }

        /**
         * Add user press widgets.
         *
         * @package Case_Theme_User
         * @version 1.0.0
         */
        function add_widgets()
        {
            register_widget('Case_Theme_User_Widget');
        }

    }
    
    if (! function_exists('userpress')) {

        function userpress()
        {
            return Case_Theme_User::instance();
        }
    }
    
    if (defined('USERPRESS_LATE_LOAD')) {
        
        add_action('plugins_loaded', 'userpress', (int) USERPRESS_LATE_LOAD);
    } else {
        userpress();
    }
}