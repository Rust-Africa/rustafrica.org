<?php
ct_add_custom_widget(
    array(
        'name' => 'ct_mailchimp_form',
        'title' => esc_html__('Case Mailchimp Form', 'itfirm'),
        'icon' => 'eicon-email-field',
        'categories' => array(Case_Theme_Core::CT_CATEGORY_NAME),
        'scripts' => [
            'ct-inline-css-js',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Color Settings', 'itfirm'),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Layout', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                                'style3' => 'Style 3',
                            ],
                            'default' => 'style1',
                        ),
                        array(
                            'name' => 'input_color',
                            'label' => esc_html__('Input Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-mailchimp.ct-mailchimp1 .mc4wp-form .mc4wp-form-fields input[type="email"]' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'input_bg_color',
                            'label' => esc_html__('Input Background Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-mailchimp.ct-mailchimp1 .mc4wp-form .mc4wp-form-fields input[type="email"]' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'input_typography',
                            'label' => esc_html__('Input Typography', 'itfirm' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-mailchimp.ct-mailchimp1 .mc4wp-form .mc4wp-form-fields input[type="email"]',
                        ),

                        array(
                            'name' => 'btn_gradient_from',
                            'label' => esc_html__('Button Color Gradient From', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'style' => ['style1'],
                            ],
                        ),
                        array(
                            'name' => 'btn_gradient_to',
                            'label' => esc_html__('Button Color Gradient To', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'style' => ['style1'],
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color',
                            'label' => esc_html__('Button Background Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-mailchimp1.style2 form [type="submit"]' => 'background: {{VALUE}};',
                            ],
                            'condition' => [
                                'style' => ['style2'],
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color_hover',
                            'label' => esc_html__('Button Background Color Hover', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-mailchimp1.style2 form [type="submit"]:hover' => 'background: {{VALUE}};',
                            ],
                            'condition' => [
                                'style' => ['style2'],
                            ],
                        ),
                        array(
                            'name' => 'button_typography',
                            'label' => esc_html__('Button Typography', 'itfirm' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-mailchimp.ct-mailchimp1 .mc4wp-form .mc4wp-form-fields input[type="submit"]',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);