<?php
/**
 * Elementor case icon picker control.
 *
 * @since 1.0.0
 */
class Case_Theme_Core_Progressbar_Control extends \Elementor\Base_Data_Control {

    /**
     * Get emoji one area control type.
     *
     * Retrieve the control type, in this case `ct_progressbar`.
     *
     * @since 1.0.0
     * @access public
     *
     * @return string Control type.
     */
    public function get_type() {
        return 'ct_progressbar';
    }

    /**
     * Enqueue emoji one area control scripts and styles.
     *
     * Used to register and enqueue custom scripts and styles used by the emoji one
     * area control.
     *
     * @since 1.0.0
     * @access public
     */
    public function enqueue() {
        wp_register_script('ct_progressbar-control', CT_URL . 'assets/lib/iconpicker/ct-iconpicker.js', array('jquery', 'jquery.fonticonpicker.js'), '1.0.0');
        wp_enqueue_script( 'ct_progressbar-control' );
    }

    /**
     * Get emoji one area control default settings.
     *
     * Retrieve the default settings of the emoji one area control. Used to return
     * the default settings while initializing the emoji one area control.
     *
     * @since 1.0.0
     * @access protected
     *
     * @return array Control default settings.
     */
    protected function get_default_settings() {
        return [
            'label_block' => true,
        ];
    }

    /**
     * Render emoji one area control output in the editor.
     *
     * Used to generate the control HTML in the editor using Underscore JS
     * template. The variables for the class are available using `data` JS
     * object.
     *
     * @since 1.0.0
     * @access public
     */
    public function content_template() {
        $control_uid = $this->get_control_uid();
        ?>
        <div class="elementor-control-field">
            <# if ( data.label ) { #>
                <label for="<?php echo esc_attr( $control_uid ); ?>" class="elementor-control-title">{{{ data.label }}}</label>
            <# } #>
            <div class="elementor-control-input-wrapper">
                <textarea id="<?php echo esc_attr( $control_uid ); ?>" class="elementor-control-tag-area" data-setting="{{ data.name }}" style="display: none;"></textarea>
                <#
                var value = data.controlValue;
                #>
                <div class="ct-group">
                    <#
                        var template = '<div class="ct-group-item" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; position: relative"><a class="ct-group-delete" href="#" style="position: absolute; z-index: 9; right: 10px; top: 8px;">&times;</a><div class="elementor-control elementor-label-block"><div class="elementor-control-content"><div class="elementor-control-field"><label class="elementor-control-title"><?php esc_html_e('Title', CT_TEXT_DOMAIN)?></label><div class="elementor-control-input-wrapper"><input type="text" class="elementor-control-tag-area elementor-input ct-title-input" />';
                        template += '</div></div></div></div><div class="elementor-control elementor-label-block"><div class="elementor-control-content"><div class="elementor-control-field"><label class="elementor-control-title"><?php esc_html_e('Number', CT_TEXT_DOMAIN)?></label><div class="elementor-control-input-wrapper"><input type="text" class="elementor-control-tag-area elementor-input ct-number-input" /></div></div></div></div></div>';
                    #>
                    <textarea class="ct-template" style="display: none;">{{{ template }}}</textarea>
                    <#
                    if(data.controlValue){
                        var values = JSON.parse(data.controlValue);
                        _.each( values, function( item, index ) {
                            var title_val = item.title;
                            var number_val = item.number;
                    #>
                            <div class="ct-group-item" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 10px; position: relative;">
                                <a class="ct-group-delete" href="#" style="position: absolute; z-index: 9; right: 10px; top: 8px;">&times;</a>
                                <div class="elementor-control elementor-label-block">
                                    <div class="elementor-control-content">
                                        <div class="elementor-control-field">
                                            <label class="elementor-control-title"><?php esc_html_e('Title', CT_TEXT_DOMAIN)?></label>
                                            <div class="elementor-control-input-wrapper">
                                                <input type="text" class="elementor-control-tag-area elementor-input ct-title-input" value="{{ title_val }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="elementor-control elementor-label-block">
                                    <div class="elementor-control-content">
                                        <div class="elementor-control-field">
                                            <label class="elementor-control-title"><?php esc_html_e('Number', CT_TEXT_DOMAIN)?></label>
                                            <div class="elementor-control-input-wrapper">
                                                <input type="text" class="elementor-control-tag-area elementor-input ct-number-input" value="{{ number_val }}" />
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    <#
                        } );
                    }
                    #>
                </div>
                <div class="ct-group-actions" style="text-align: center;">
                    <button class="elementor-button elementor-button-default ct-group-add" type="button">
                        <i class="eicon-plus" aria-hidden="true"></i>
                        <span><?php esc_html_e('Add Progressbar', CT_TEXT_DOMAIN)?></span>
                    </button>
                </div>
            </div>
        </div>
        <# if ( data.description ) { #>
        <div class="elementor-control-field-description">{{{ data.description }}}</div>
        <# } #>
        <?php
    }

}