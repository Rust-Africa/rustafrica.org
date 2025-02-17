<?php
ct_add_custom_widget(
    array(
        'name' => 'ct_steps',
        'title' => esc_html__('Case Steps', 'itfirm'),
        'icon' => 'eicon-time-line',
        'categories' => array(Case_Theme_Core::CT_CATEGORY_NAME),
        'scripts' => array(
            'ct-inline-css-js',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_list',
                    'label' => esc_html__('Content', 'itfirm'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'steps',
                            'label' => esc_html__('List', 'itfirm'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'icon_image',
                                    'label' => esc_html__( 'Icon Image', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                    'description' => esc_html__('Select image icon.', 'itfirm'),
                                ),
                                array(
                                    'name' => 'number',
                                    'label' => esc_html__('Number', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'content',
                                    'label' => esc_html__('Content', 'itfirm'),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'btn_text',
                                    'label' => esc_html__('Button Text', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'btn_link',
                                    'label' => esc_html__('Button Link', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::URL,
                                ),
                                array(
                                    'name' => 'box_number_color',
                                    'label' => esc_html__('Box Number Color', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                ),
                                array(
                                    'name' => 'box_number_circle_color',
                                    'label' => esc_html__('Box Number Circle Color', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::COLOR,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                        array(
                            'name' => 'ct_animate',
                            'label' => esc_html__('Case Button Animate', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => itfirm_animate(),
                            'default' => '',
                        ),
                    ),
                ),
                array(
                    'name' => 'style_section',
                    'label' => esc_html__('Style', 'itfirm' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-list-single .ct-list-content' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'itfirm' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-list-single .ct-list-content',
                        ),
                        array(
                            'name' => 'content_color',
                            'label' => esc_html__('Content Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-list-single .ct-list-content' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'content_typography',
                            'label' => esc_html__('Content Typography', 'itfirm' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-list-single .ct-list-content',
                        ),
                        array(
                            'name' => 'btn_bg_color',
                            'label' => esc_html__('Button Background Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-steps-layout1 .btn.btn-circle-text::before' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'btn_bg_color_hover',
                            'label' => esc_html__('Button Background Color Hover', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-steps-layout1 .btn.btn-circle-text:hover:before' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);