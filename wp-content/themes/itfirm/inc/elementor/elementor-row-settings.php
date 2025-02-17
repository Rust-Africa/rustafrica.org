<?php
// Add custom field to section
if(!function_exists('itfirm_custom_section_params')){
    add_filter('ct-custom-section/custom-params', 'itfirm_custom_section_params'); 
    function itfirm_custom_section_params(){
        return array(
            'sections' => array(
                array(
                    'name'     => 'ct_row_settings',
                    'label'    => esc_html__( 'Case Settings', 'itfirm' ),
                    'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name'    => 'header_fixed_transparent',
                            'label'   => esc_html__( 'Header Fixed Transparent', 'itfirm' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => array(
                                'none'        => esc_html__( 'No', 'itfirm' ),
                                'transparent'   => esc_html__( 'Yes', 'itfirm' ),
                            ),
                            'prefix_class' => 'ct-header-fixed-',
                            'default'      => 'none',
                        ),

                        array(
                            'name'    => 'col_order',
                            'label'   => esc_html__( 'Column Order ( Screen < 1024px)', 'itfirm' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => array(
                                'none'        => esc_html__( 'No', 'itfirm' ),
                                'order'   => esc_html__( 'Yes', 'itfirm' ),
                            ),
                            'prefix_class' => 'ct-column-',
                            'default'      => 'none',
                        ),

                        array(
                            'name'    => 'row_scroll_fixed',
                            'label'   => esc_html__( 'Row Scroll - Column Fixed', 'itfirm' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => array(
                                'none'        => esc_html__( 'No', 'itfirm' ),
                                'fixed'   => esc_html__( 'Yes', 'itfirm' ),
                            ),
                            'prefix_class' => 'ct-row-scroll-',
                            'default'      => 'none',
                        ),

                        array(
                            'name'    => 'gradient_color',
                            'label'   => esc_html__( 'Case Gradient Background Color', 'itfirm' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => array(
                                'none'        => esc_html__( 'No', 'itfirm' ),
                                'multi'   => esc_html__( 'Yes', 'itfirm' ),
                            ),
                            'prefix_class' => 'ct-row-gradient--',
                            'default'      => 'none',
                        ),

                        array(
                            'name'    => 'row_container_max_width',
                            'label'   => esc_html__( 'Container Max Width', 'itfirm' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => array(
                                'none'        => esc_html__( 'No', 'itfirm' ),
                                'max-width'   => esc_html__( 'Yes', 'itfirm' ),
                            ),
                            'prefix_class' => 'ct-container-',
                            'default'      => 'none',
                            'condition' => [
                                'layout' => ['full_width'],
                            ],
                        ),
                        array(
                            'name' => 'row_container_custom_max_width',
                            'label' => esc_html__('Custom Container Max Width', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} > .elementor-container' => 'max-width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'row_container_max_width' => ['max-width'],
                                'layout' => ['full_width'],
                            ],
                        ),
                    ),
                ),
            ),
        );
    }
}