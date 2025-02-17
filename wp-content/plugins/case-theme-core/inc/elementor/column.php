<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

use Elementor\Core\Schemes;

/**
 * Elementor column element.
 *
 * Elementor column handler class is responsible for initializing the column
 * element.
 *
 * @since 1.0.0
 */
class CT_Element_Column extends Element_Column {
    public $custom_params = [];
    private $is_type_instance = true;
    public function __construct( array $data = [], array $args = null ) {
        if ( $data ) {
            $this->is_type_instance = false;
        } elseif ( $args ) {
            $this->default_args = $args;
        }

        parent::__construct( $data );
  
        $this->custom_params = apply_filters('ct-custom-column/custom-params', []);
    }

    /**
     * Register column controls.
     *
     * Used to add new controls to the column element.
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
     * Render column output in the editor.
     *
     * Used to generate the live preview, using a Backbone JavaScript template.
     *
     * @since 2.9.0
     * @access protected
     */
    protected function content_template() {
        ?>
        <#
        let custom_classes = elementor.hooks.applyFilters('ct-custom-column-classes', settings);
        custom_classes = _.isArray(custom_classes)?custom_classes:[];
        #>
        <div class="elementor-widget-wrap {{ custom_classes.join(' ') }}">
            <div class="elementor-background-overlay"></div>
        </div>
        <?php
    }

    /**
     * Before column rendering.
     *
     * Used to add stuff before the column element.
     *
     * @since 1.0.0
     * @access public
     */
    public function before_render() {
        $settings = $this->get_settings_for_display();

        $overlay_background = $settings['background_overlay_background'] ?? '';
        $overlay_hover_background = $settings['background_overlay_hover_background'] ?? '';

        $has_background_overlay = in_array( $overlay_background, [ 'classic', 'gradient' ], true ) ||
                                  in_array( $overlay_hover_background, [ 'classic', 'gradient' ], true );

        $column_wrap_classes = [ 'elementor-widget-wrap' ];

        if ( $this->get_children() ) {
            $column_wrap_classes[] = 'elementor-element-populated';
        }
        
        /*
        $has_background_overlay = in_array( $settings['background_overlay_background'], [ 'classic', 'gradient' ], true ) ||
                                  in_array( $settings['background_overlay_hover_background'], [ 'classic', 'gradient' ], true );
 
        $is_dom_optimization_active = Plugin::$instance->experiments->is_feature_active( 'e_dom_optimization' );

        $wrapper_attribute_string = $is_dom_optimization_active ? '_widget_wrapper' : '_inner_wrapper';
 
        $column_wrap_classes = $is_dom_optimization_active ? [ 'elementor-widget-wrap' ] : [ 'elementor-column-wrap' ];

        if ( $this->get_children() ) {
            $column_wrap_classes[] = 'elementor-widget-wrap elementor-element-populated';
        }*/

        $this->add_render_attribute( [
            '_inner_wrapper' => [
                'class' => $column_wrap_classes,
            ],
            '_widget_wrapper' => [
                'class' => $column_wrap_classes,
            ],
            '_background_overlay' => [
                'class' => [ 'elementor-background-overlay' ],
            ],
        ] );

        $custom_classes = apply_filters('ct-custom-column-classes', [], $settings);
        $custom_classes = is_array($custom_classes)?$custom_classes:[];
        //$this->add_render_attribute($wrapper_attribute_string, 'class', $custom_classes);
        $this->add_render_attribute('_widget_wrapper', 'class', $custom_classes);
        ?>
        <<?php echo $this->get_html_tag() . ' ' . $this->get_render_attribute_string( '_wrapper' ); ?>>
        <div <?php $this->print_render_attribute_string( '_widget_wrapper' ); ?>>
        <?php if ( $has_background_overlay ) : ?>
            <div <?php echo $this->get_render_attribute_string( '_background_overlay' ); ?>></div>
        <?php endif; ?>
            
        <?php
    }

    /**
     * After column rendering.
     *
     * Used to add stuff after the column element.
     *
     * @since 1.0.0
     * @access public
     */
    public function after_render() {
         ?>
            </div>
        </<?php echo $this->get_html_tag(); ?>>
        <?php
    }

    /**
     * Get HTML tag.
     *
     * Retrieve the column element HTML tag.
     *
     * @since 1.5.3
     * @access private
     *
     * @return string Column HTML tag.
     */
    private function get_html_tag() {
        $html_tag = $this->get_settings( 'html_tag' );

        if ( empty( $html_tag ) ) {
            $html_tag = 'div';
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
}
