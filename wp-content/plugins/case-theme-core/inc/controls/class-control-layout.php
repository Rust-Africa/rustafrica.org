<?php

class Case_Theme_Core_Layout_Control extends \Elementor\Base_Data_Control {

    public function get_type() {
        return 'layoutcontrol';
    }

    public function enqueue() {
        wp_enqueue_style( 'layout-control-css', CT_URL . 'assets/css/layout-control.css', [], '1.0.0' );
        wp_enqueue_script( 'layout-control-js', CT_URL . 'assets/js/layout-control.js', [ 'jquery' ], '1.0.0' );
    }

    protected function get_default_settings() {
        return [
            'label_block' => true,
            'rows' => 3,
            'layoutcontrol_options' => [],
        ];
    }

    public function content_template() {
        $control_uid = $this->get_control_uid();
        ?>
        <div class="elementor-control-field">
            <label for="<?php echo esc_attr( $control_uid ); ?>" class="elementor-control-title">{{{ data.label }}}</label>
            <div class="elementor-control-input-wrapper">
                <#
                if ( data.options ) {
                    _.each( data.options, function( value, key ) {
                        var selected = '';
                        if(data.controlValue == key){
                            selected = 'selected';
                        }
                #>
                <div class="radio-image-item {{ selected }}">
                    <input id="{{ data.name }}-{{ key }}" type="radio" class="field-radio-image" value="{{ key }}" name="{{ data.name }}" data-setting="{{ data.name }}" {{ selected }} />
                    <label for="{{ data.name }}-{{ key }}">
                        <img src="{{ value.image }}" alt="{{ value.label }}">
                    </label>
                </div>
                <#
                    });
                }
                #>
            </div>
        </div>
        <# if ( data.description ) { #>
        <div class="elementor-control-field-description">{{{ data.description }}}</div>
        <# } #>
        <?php
    }

}
