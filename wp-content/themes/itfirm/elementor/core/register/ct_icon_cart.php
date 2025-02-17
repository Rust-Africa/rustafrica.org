<?php
// Register Button Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_icon_cart',
        'title' => esc_html__('Case Cart Sidebar', 'itfirm' ),
        'icon' => 'eicon-cart-medium',
        'scripts' => array(
            'ct-inline-css-js',
        ),
        'categories' => array( Case_Theme_Core::CT_CATEGORY_NAME ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source Settings', 'itfirm' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'icon_text_color',
                            'label' => esc_html__('Icon Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-sidebar-cart1' => 'color: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);