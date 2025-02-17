<?php

// Register Progress Bar Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_progressbar',
        'title' => esc_html__( 'Case Progress Bar', 'itfirm' ),
        'icon' => 'eicon-skill-bar',
        'categories' => array( Case_Theme_Core::CT_CATEGORY_NAME ),
        'scripts' => array(
            'progressbar',
            'ct-progressbar-widget-js',
            'ct-inline-css-js',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'source_section',
                    'label' => esc_html__( 'Source Settings', 'itfirm' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Layout', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '1' => 'Layout 1',
                                '2' => 'Layout 2',
                                '3' => 'Layout 3',
                            ],
                            'default' => '1',
                        ),
                        array(
                            'name' => 'style_l1',
                            'label' => esc_html__('Style', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                            ],
                            'default' => 'style1',
                            'condition' => [
                                'layout' => '1',
                            ],
                        ),
                        array(
                            'name' => 'progressbar_list',
                            'label' => esc_html__( 'Progress Bar Lists', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__( 'Title', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'percent',
                                    'label' => esc_html__( 'Percentage', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'default' => [
                                        'size' => 50,
                                        'unit' => '%',
                                    ],
                                    'label_block' => true,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_title',
                    'label' => esc_html__( 'Style', 'itfirm' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__( 'Title Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-progressbar .ct-progress-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'typography',
                            'label' => esc_html__( 'Title Typography', 'itfirm' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-progressbar .ct-progress-title',
                        ),
                        array(
                            'name' => 'percent_color',
                            'label' => esc_html__( 'Percentage Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-progressbar .ct-progress-percentage' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'percentage_typography',
                            'label' => esc_html__( 'Percentage Typography', 'itfirm' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-progressbar .ct-progress-percentage',
                        ),
                        array(
                            'name' => 'bar_color',
                            'label' => esc_html__( 'Bar Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-progressbar .ct-progress-bar' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'bar_color_gradient',
                            'label' => esc_html__( 'Bar Color Gradient', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),
                        array(
                            'name' => 'bar_bg_color',
                            'label' => esc_html__( 'Bar Background Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-progressbar .ct-progress-bar-wrap' => 'background: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);