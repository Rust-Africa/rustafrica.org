<?php
ct_add_custom_widget(
    array(
        'name' => 'ct_banner',
        'title' => esc_html__('Case Banner Box', 'itfirm'),
        'icon' => 'eicon-posts-ticker',
        'categories' => array(Case_Theme_Core::CT_CATEGORY_NAME),
        'scripts' => array(
            'ct-inline-css-js',
            'elementor-waypoints',
            'jquery-numerator',
            'ct-counter-widget-js',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'layout_section',
                    'label' => esc_html__('Layout', 'itfirm' ),
                    'tab' => \Elementor\Controls_Manager::TAB_LAYOUT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Templates', 'itfirm' ),
                            'type' => Case_Theme_Core::LAYOUT_CONTROL,
                            'default' => '1',
                            'options' => [
                                '1' => [
                                    'label' => esc_html__('Layout 1', 'itfirm' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_banner/layout-image/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'itfirm' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_banner/layout-image/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'itfirm' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_banner/layout-image/layout3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__('Layout 4', 'itfirm' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_banner/layout-image/layout4.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'itfirm'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'banner_image',
                            'label' => esc_html__('Banner Image', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'banner_image2',
                            'label' => esc_html__('Banner Image Small', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'layout' => ['4'],
                            ],
                        ),
                        array(
                            'name' => 'banner_shape',
                            'label' => esc_html__('Banner Shape', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'layout' => ['2'],
                            ],
                        ),
                        array(
                            'name' => 'banner_icon',
                            'label' => esc_html__('Banner Icon', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'banner_title',
                            'label' => esc_html__('Banner Title', 'itfirm'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => ['1','3','4'],
                            ],
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Banner Title Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-banner .item--title' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1','3','4'],
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Banner Title Typography', 'itfirm' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-banner .item--title',
                            'condition' => [
                                'layout' => ['1','3','4'],
                            ],
                        ),
                        array(
                            'name' => 'banner_desc',
                            'label' => esc_html__('Banner Description', 'itfirm'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'desc_color',
                            'label' => esc_html__('Banner Description Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-banner .item--desc' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'counter_number',
                            'label' => esc_html__('Box Counter Number', 'itfirm'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => ['1','3'],
                            ],
                        ),
                        array(
                            'name' => 'counter_number_typography',
                            'label' => esc_html__('Counter Number Typography', 'itfirm' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-banner .ct-banner-counter .ct-counter-number-value',
                            'condition' => [
                                'layout' => ['1','3'],
                            ],
                        ),
                        array(
                            'name' => 'counter_title',
                            'label' => esc_html__('Box Counter Title', 'itfirm'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => ['1','3'],
                            ],
                        ),
                        array(
                            'name' => 'counter_title_typography',
                            'label' => esc_html__('Counter Title Typography', 'itfirm' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-banner .ct-banner-counter .ct-counter-title',
                            'condition' => [
                                'layout' => ['1','3'],
                            ],
                        ),
                        array(
                            'name' => 'box_height',
                            'label' => esc_html__('Box Height', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ct-banner3' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => ['3'],
                            ],
                        ),
                        array(
                            'name' => 'color_gr_from',
                            'label' => esc_html__('Color Gradient From', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'layout' => ['3'],
                            ],
                        ),
                        array(
                            'name' => 'color_gr_to',
                            'label' => esc_html__('Color Gradient To', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'layout' => ['3'],
                            ],
                        ),
                        array(
                            'name' => 'ct_animate',
                            'label' => esc_html__('Case Animate', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => itfirm_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'ct_animate_delay',
                            'label' => esc_html__('Animate Delay', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'default' => '0',
                            'description' => 'Enter number. Default 0ms',
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);