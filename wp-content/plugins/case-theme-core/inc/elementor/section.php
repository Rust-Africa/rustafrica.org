<?php
/**
 * This file was cloned from file /plugins/elementor/includes/elements/section.php to custom elementor section.
 */

namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

use Elementor\Core\Schemes;

/**
 * Elementor section element.
 *
 * Elementor section handler class is responsible for initializing the section
 * element.
 *
 * @since 1.0.0
 */
class CT_Element_Section extends Element_Section {
    public $custom_params = [];
    public $custom_presets = [];
    private $is_type_instance = true;
    public function __construct( array $data = [], array $args = null ) {
        if ( $data ) {
            $this->is_type_instance = false;
        } elseif ( $args ) {
            $this->default_args = $args;
        }

        parent::__construct( $data );

        $this->custom_params = apply_filters('ct-custom-section/custom-params', []);
        $this->custom_presets = apply_filters('ct-custom-section/custom-presets', []);
    }

    /**
     * Get initial config.
     *
     * Retrieve the current section initial configuration.
     *
     * Adds more configuration on top of the controls list, the tabs assigned to
     * the control, element name, type, icon and more. This method also adds
     * section presets.
     *
     * @since 2.9.0
     * @access protected
     *
     * @return array The initial config.
     */
    protected function get_initial_config() {
        $config = parent::get_initial_config();

        $presets = $config['presets'];
        $custom_presets = is_array($this->custom_presets)?$this->custom_presets:[];

        foreach ( range( 1, 10 ) as $columns_count ) {
            if ( ! empty( $custom_presets[ $columns_count ] ) ) {
                $presets[ $columns_count ] = array_merge( $presets[ $columns_count ], $custom_presets[ $columns_count ] );
            }

            foreach ( $presets[ $columns_count ] as $preset_index => & $preset ) {
                $preset['key'] = $columns_count . $preset_index;
            }
        }

        $config['presets'] = $presets;

        return $config;
    }

    /**
     * Register section controls.
     *
     * Used to add new controls to the section element.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls() {
        parent::register_controls();

        if(!empty($this->custom_params)){
            $params = $this->custom_params;
            if(isset($params['sections']) && !empty($params['sections'])){
                $sections = $params['sections'];
                foreach($sections as $section){
                    if(isset($section['controls']) && !empty($section['controls'])){
                        $controls = isset($section['controls'])?$section['controls']:[];
                        $this->start_controls_section(
                            $section['name'],
                            [
                                'label' => $section['label'],
                                'tab' => $section['tab'],
                                'condition' => isset($section['condition'])?$section['condition']:'',
                            ]
                        );
                        foreach ($controls as $control){
                            $control_type = isset($control['control_type'])?$control['control_type']:'';
                            if($control_type == 'responsive'){
                                $args = $this->convert_args($control);
                                $this->add_responsive_control($control['name'], $args);
                            }
                            elseif($control_type == 'group'){
                                $args = $this->convert_args($control);
                                $args['name'] = $control['name'];
                                $this->add_group_control(
                                    $control['type'],
                                    $args
                                );
                            }
                            elseif($control_type == 'tab'){
                                if(isset($control['tabs']) && !empty($control['tabs'])){
                                    $this->start_controls_tabs( $control['name'] );
                                    foreach ($control['tabs'] as $tab){
                                        if(isset($tab['controls']) && !empty($tab['controls'])){
                                            $this->start_controls_tab(
                                                $tab['name'],
                                                [
                                                    'label' => $tab['label'],
                                                ]
                                            );
                                            foreach ($tab['controls'] as $tab_control){
                                                $tab_control_type = isset($tab_control['control_type'])?$tab_control['control_type']:'';
                                                if($tab_control_type == 'responsive'){
                                                    $args = $this->convert_args($tab_control);
                                                    $this->add_responsive_control($tab_control['name'], $args);
                                                }
                                                elseif($tab_control_type == 'group'){
                                                    $args = $this->convert_args($tab_control);
                                                    $args['name'] = $tab_control['name'];
                                                    $this->add_group_control(
                                                        $tab_control['type'],
                                                        $args
                                                    );
                                                }
                                                else{
                                                    $args = $this->convert_args($tab_control);
                                                    $this->add_control($tab_control['name'], $args);
                                                }
                                            }
                                            $this->end_controls_tab();
                                        }
                                    }
                                    $this->end_controls_tabs();
                                }
                            }
                            else{
                                if($control['type'] == \Elementor\Controls_Manager::REPEATER){
                                    $repeater = new \Elementor\Repeater();
                                    if(isset($control['controls']) && !empty($control['controls'])){
                                        foreach ($control['controls'] as $rp_control){
                                            $args = $this->convert_args($rp_control);
                                            $repeater->add_control($rp_control['name'], $args);
                                        }
                                    }
                                    $this->add_control($control['name'], [
                                        'label' => isset($control['label'])?$control['label']:'',
                                        'type' => isset($control['type'])?$control['type']:'',
                                        'fields' => $repeater->get_controls(),
                                        'default' => isset($control['default'])?$control['default']:[],
                                        'description' => isset($control['description'])?$control['description']:'',
                                        'condition' => isset($control['condition'])?$control['condition']:'',
                                        'title_field' => isset($control['title_field'])?$control['title_field']:'',
                                    ]);
                                }
                                else{
                                    $args = $this->convert_args($control);
                                    $this->add_control($control['name'], $args);
                                }
                            }
                        }
                        $this->end_controls_section();
                    }
                }
            }
        }
    }

    /**
     * Render section output in the editor.
     *
     * Used to generate the live preview, using a Backbone JavaScript template.
     *
     * @since 2.9.0
     * @access protected
     */
    protected function content_template() {
        $beforeElementorRow = apply_filters('ct-custom-section/before-elementor-row', '', []);
        if(!empty($beforeElementorRow)){
            $beforeElementorRow = preg_replace( "/\r|\n/", "", $beforeElementorRow );
        }
        ?>
        <#
        let beforeElementorRow = '<?php echo $beforeElementorRow ?>';
        let custom_classes = elementor.hooks.applyFilters('ct-custom-section-classes', settings);
        custom_classes = _.isArray(custom_classes)?custom_classes:[];
        if ( settings.background_video_link ) {
            let videoAttributes = 'autoplay muted playsinline';

            if ( ! settings.background_play_once ) {
                videoAttributes += ' loop';
            }

            view.addRenderAttribute( 'background-video-container', 'class', 'elementor-background-video-container' );

            if ( ! settings.background_play_on_mobile ) {
                view.addRenderAttribute( 'background-video-container', 'class', 'elementor-hidden-phone' );
            }
        #>
            <div {{{ view.getRenderAttributeString( 'background-video-container' ) }}}>
                <div class="elementor-background-video-embed"></div>
                <video class="elementor-background-video-hosted elementor-html5-video" {{ videoAttributes }}></video>
            </div>
        <# } #>
        <div class="elementor-background-overlay"></div>
        <div class="elementor-shape elementor-shape-top"></div>
        <div class="elementor-shape elementor-shape-bottom"></div>
        {{{ beforeElementorRow }}}
        <div class="elementor-container elementor-column-gap-{{ settings.gap }} {{ custom_classes.join(' ') }}"></div>
        <?php
    }

    /**
     * Before section rendering.
     *
     * Used to add stuff before the section element.
     *
     * @since 1.0.0
     * @access public
     */
    public function before_render() {
        $settings = $this->get_settings_for_display();
        ?>
        <<?php echo esc_html( $this->get_html_tag() ); ?> <?php $this->print_render_attribute_string( '_wrapper' ); ?>>
            <?php
            if ( 'video' === $settings['background_background'] ) :
                if ( $settings['background_video_link'] ) :
                    $video_properties = Embed::get_video_properties( $settings['background_video_link'] );

                    $this->add_render_attribute( 'background-video-container', 'class', 'elementor-background-video-container' );

                    if ( ! $settings['background_play_on_mobile'] ) {
                        $this->add_render_attribute( 'background-video-container', 'class', 'elementor-hidden-phone' );
                    }
                    ?>
                    <div <?php echo $this->get_render_attribute_string( 'background-video-container' ); ?>>
                        <?php if ( $video_properties ) : ?>
                            <div class="elementor-background-video-embed"></div>
                            <?php
                        else :
                            $video_tag_attributes = 'autoplay muted playsinline';
                            if ( 'yes' !== $settings['background_play_once'] ) :
                                $video_tag_attributes .= ' loop';
                            endif;
                            ?>
                            <video class="elementor-background-video-hosted elementor-html5-video" <?php echo $video_tag_attributes; ?>></video>
                        <?php endif; ?>
                    </div>
                    <?php
                endif;
            endif;

            $overlay_background = $settings['background_overlay_background'] ?? '';
            $overlay_hover_background = $settings['background_overlay_hover_background'] ?? '';

            $has_background_overlay = in_array( $overlay_background, [ 'classic', 'gradient' ], true ) ||
                                        in_array( $overlay_hover_background, [ 'classic', 'gradient' ], true );

            if ( $has_background_overlay ) :
                ?>
                <div class="elementor-background-overlay"></div>
                <?php
            endif;

            if ( $settings['shape_divider_top'] ) {
                $this->print_shape_divider( 'top' );
            }

            if ( $settings['shape_divider_bottom'] ) {
                $this->print_shape_divider( 'bottom' );
            }

            $custom_classes = apply_filters('ct-custom-section-classes', [], $settings);
            $custom_classes = is_array($custom_classes)?$custom_classes:[];

            $beforeElementorRow = apply_filters('ct-custom-section/before-elementor-row', '', $settings);
            ?>

            <?php echo $beforeElementorRow; ?>
            <div class="elementor-container elementor-column-gap-<?php echo esc_attr( $settings['gap'] ); ?> <?php echo esc_attr(implode(' ', $custom_classes)) ?>">
            <?php  
    }

    /**
     * After section rendering.
     *
     * Used to add stuff after the section element.
     *
     * @since 1.0.0
     * @access public
     */
    public function after_render() {
        ?>
            </div>
        </<?php
            // PHPCS - the method get_html_tag is safe.
            echo $this->get_html_tag(); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
        ?>>
        <?php
    } 

    /**
     * Get HTML tag.
     *
     * Retrieve the section element HTML tag.
     *
     * @since 1.5.3
     * @access private
     *
     * @return string Section HTML tag.
     */
    protected function get_html_tag() {
        $html_tag = $this->get_settings( 'html_tag' );

        if ( empty( $html_tag ) ) {
            $html_tag = 'section';
        }

        return $html_tag;
    }

    public function convert_args( $control = [] ){
        $args = [];
        $args_index = [
            'label',
            'type',
            'input_type',
            'options',
            'default',
            'description',
            'placeholder',
            'multiple',
            'rows',
            'min',
            'max',
            'step',
            'label_on',
            'label_off',
            'return_value',
            'show_external',
            'size_units',
            'range',
            'toggle',
            'raw',
            'content_classes',
            'language',
            'label_block',
            'show_label',
            'selectors',
            'selector',
            'separator',
            'condition',
            'prefix_class',
            'types',
            'allowed_dimensions',
            'fa4compatibility',
            'recommended',
        ];
        foreach ($args_index as $index){
            if(isset($control[$index]) && !empty($control[$index])){
                $args[$index] = $control[$index];
            }
        }
        switch ($control['type']){
            case \Elementor\Controls_Manager::MEDIA :
                if(!isset($control['default']) ){
                    $args['default'] = [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ];
                }
                break;
            case \Elementor\Controls_Manager::SWITCHER :
                $args['return_value'] = isset($control['return_value'])?$control['return_value']:'true';
                $args['default'] = isset($control['default'])?$control['default']:'';
                break;
        }

        return $args;
    }

    /**
     * Print section shape divider.
     *
     * Used to generate the shape dividers HTML.
     *
     * @since 1.3.0
     * @access private
     *
     * @param string $side Shape divider side, used to set the shape key.
     */
    protected function print_shape_divider( $side ) {
        $settings = $this->get_active_settings();
        $base_setting_key = "shape_divider_$side";
        $negative = ! empty( $settings[ $base_setting_key . '_negative' ] );
        $shape_path = Shapes::get_shape_path( $settings[ $base_setting_key ], $negative );
        if ( ! is_file( $shape_path ) || ! is_readable( $shape_path ) ) {
            return;
        }
        ?>
        <div class="elementor-shape elementor-shape-<?php echo esc_attr( $side ); ?>" data-negative="<?php echo var_export( $negative ); ?>">
            <?php echo file_get_contents( $shape_path ); ?>
        </div>
        <?php
    }
}
