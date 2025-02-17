<?php
if (!defined('ABSPATH')) {
    exit;
}

if (!class_exists('ReduxFramework_ct_auto_generate')) {
    class ReduxFramework_ct_auto_generate {
        function __construct($field = array(), $value = '', $parent) {
            $this->parent = $parent;
            $this->field = $field;
            $this->value = $value;

            $this->extension_url = ct_redux_extensions()->extensions_url . 'ct_auto_generate/';
        }

        /**
         * Field Render Function.
         * Takes the vars and outputs the HTML for the field in the settings
         *
         * @since ReduxFramework 1.0.0
         */
        function render() {
            ?>
                <input type="text" class="ct-auto-generate regular-text" name="<?php echo $this->field['name'] . $this->field['name_suffix']; ?>" value="<?php echo esc_attr($this->value) ?>" readonly />
                <span class="btn-regenerate" style="cursor: pointer;"><i class="fa fa-refresh" aria-hidden="true"></i></span>
            <?php
        }

        public function enqueue() {
            if (!wp_script_is('ct-auto-generate-js')) {
                wp_enqueue_script(
                    'ct-auto-generate-js',
                    $this->extension_url . 'inc/field_ct_auto_generate.js',
                    array('jquery'),
                    time(),
                    true
                );
                wp_localize_script('ct-auto-generate-js', 'ct_ajax_url', admin_url('admin-ajax.php'));
            }
        }
    }
}