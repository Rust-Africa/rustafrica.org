<?php
// Register Button Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_icon_search',
        'title' => esc_html__('Case Search', 'itfirm' ),
        'icon' => 'eicon-search',
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
                            'name' => 'layout',
                            'label' => esc_html__('Layout', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '1' => 'Form',
                                '2' => 'Popup',
                            ],
                            'default' => '1',
                        ),
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
                            'condition' => [
                                'layout' => ['2'],
                            ],
                        ),
                        array(
                            'name' => 'search_text',
                            'label' => esc_html__('Search Text', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'search_text_color',
                            'label' => esc_html__('Text Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}}' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'search_text_typo',
                            'label' => esc_html__('Text Typography', 'itfirm' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}}',
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'selected_icon',
                            'label' => esc_html__('Icon', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'layout' => ['2'],
                            ],
                        ),
                        array(
                            'name' => 'box_color',
                            'label' => esc_html__('Box Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-search-popup1' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['2'],
                                'style' => ['style1'],
                            ],
                        ),
                        array(
                            'name' => 'icon_color_gr_from',
                            'label' => esc_html__('Icon Color Gradient From', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'layout' => ['2'],
                                'style' => ['style1'],
                            ],
                        ),
                        array(
                            'name' => 'icon_color_gr_to',
                            'label' => esc_html__('Icon Color Gradient To', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'layout' => ['2'],
                                'style' => ['style1'],
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-search-popup1.style2' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['2'],
                                'style' => ['style2'],
                            ],
                        ),
                        array(
                            'name' => 'icon_color_hover',
                            'label' => esc_html__('Icon Color Hover', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-search-popup1.style2:hover' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['2'],
                                'style' => ['style2'],
                            ],
                        ),
                        array(
                            'name' => 'icon_typography',
                            'label' => esc_html__('Icon Typography', 'itfirm' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-search-popup1.style2',
                            'condition' => [
                                'layout' => ['2'],
                                'style' => ['style2'],
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);