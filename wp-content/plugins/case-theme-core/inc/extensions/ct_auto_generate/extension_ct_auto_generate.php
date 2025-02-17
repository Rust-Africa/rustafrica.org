<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('CT_Redux_Extensions_ct_auto_generate')) {

    class CT_Redux_Extensions_ct_auto_generate {

        protected $parent;
        public $extension_url;
        public $extension_dir;
        public static $theInstance;
        public static $version = "1.0.0";
        public $is_field = false;
        public $field_name = 'ct_auto_generate';
        public function __construct($parent) {
            $this->parent = $parent;
             
            self::$theInstance = $this;

            $this->is_field = Redux_Helpers::is_field_in_use($parent, $this->field_name);

            add_filter('redux/' . $this->parent->args['opt_name'] . '/field/class/' . $this->field_name, array(
                $this,
                'overload_field_path'
            ));
        }

        public function overload_field_path($field) {
            return dirname(__FILE__) . '/inc/field_' . $this->field_name . '.php';
        }
    }
}
