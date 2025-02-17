<?php
// Add custom field to column
if(!function_exists('itfirm_custom_column_params')){
    add_filter('ct-custom-column/custom-params', 'itfirm_custom_column_params');
    function itfirm_custom_column_params(){
        return array(
            'sections' => array(
                array(
					'name'     => 'custom_section',
					'label'    => esc_html__( 'Case Settings', 'itfirm' ),
					'tab'      => \Elementor\Controls_Manager::TAB_LAYOUT,
					'controls' => array(
                        array(
							'name'    => 'col_sticky',
							'label'   => esc_html__( 'Column Sticky', 'itfirm' ),
							'type'    => \Elementor\Controls_Manager::SELECT,
							'options' => array(
								'none'           => esc_html__( 'No', 'itfirm' ),
								'sticky' => esc_html__( 'Yes', 'itfirm' ),
                            ),
                            'default' => 'none',
                            'prefix_class' => 'ct-column-'
                        ),
                        array(
                            'name'    => 'col_offset',
                            'label'   => esc_html__( 'Column Offset', 'itfirm' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => array(
                                'none'           => esc_html__( 'No', 'itfirm' ),
                                'left' => esc_html__( 'Left Container', 'itfirm' ),
                                'right' => esc_html__( 'Right Container', 'itfirm' ),
                                'left-xl' => esc_html__( 'Left XL', 'itfirm' ),
                                'right-xl' => esc_html__( 'Right XL', 'itfirm' ),
                            ),
                            'default' => 'none',
                            'prefix_class' => 'col-offset-'
                        ),
                        array(
                            'name'    => 'col_bg_color_offset',
                            'label'   => esc_html__( 'Column Box Color Offset', 'itfirm' ),
                            'type'    => \Elementor\Controls_Manager::SELECT,
                            'options' => array(
                                'none'           => esc_html__( 'No', 'itfirm' ),
                                'right' => esc_html__( 'Right', 'itfirm' ),
                            ),
                            'default' => 'none',
                            'prefix_class' => 'col-color-offset-'
                        )
                    )
                )
            )
        );
    }
}