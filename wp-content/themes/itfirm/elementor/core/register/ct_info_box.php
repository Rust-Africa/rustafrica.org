<?php
ct_add_custom_widget(
    array(
        'name' => 'ct_info_box',
        'title' => esc_html__('Case Info Box', 'itfirm'),
        'icon' => 'eicon-info-circle-o',
        'categories' => array(Case_Theme_Core::CT_CATEGORY_NAME),
        'scripts' => array(
            'ct-inline-css-js',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_layout',
                    'label' => esc_html__('Layout', 'itfirm'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Layout', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '1' => 'Layout 1',
                                '2' => 'Layout 2',
                            ],
                            'default' => '1',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_contact_info',
                    'label' => esc_html__('Content', 'itfirm'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
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
                            'name' => 'icon_color_gr_from',
                            'label' => esc_html__('Icon Color Gradient From', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'layout' => ['2'],
                                'style_l2' => ['style1'],
                            ],
                        ),
                        array(
                            'name' => 'icon_color_gr_to',
                            'label' => esc_html__('Icon Color Gradient To', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'layout' => ['2'],
                                'style_l2' => ['style1'],
                            ],
                        ),
                        array(
                            'name' => 'icon_box_gr_from',
                            'label' => esc_html__('Icon Box Gradient From', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'layout' => ['2'],
                                'style_l2' => ['style2'],
                            ],
                        ),
                        array(
                            'name' => 'icon_box_gr_to',
                            'label' => esc_html__('Icon Box Gradient To', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'layout' => ['2'],
                                'style_l2' => ['style2'],
                            ],
                        ),
                        array(
                            'name' => 'icon_box_color',
                            'label' => esc_html__('Icon Box Gradient To', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'layout' => ['2'],
                                'style_l2' => ['style3'],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ct-info-box2.style3 .item--icon' => 'background-color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_title',
                            'label' => esc_html__('Sub Title', 'itfirm'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'sub_title_color',
                            'label' => esc_html__('Sub Title Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-info-box .item--subtitle' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'title',
                            'label' => esc_html__('Title', 'itfirm'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-info-box .item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'phone_number',
                            'label' => esc_html__('Phone Number', 'itfirm'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'phone_number_color',
                            'label' => esc_html__('Phone Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-info-box .item--phone' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'phone_typography',
                            'label' => esc_html__('Phone Typography', 'itfirm' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-info-box .item--phone',
                        ),
                        array(
                            'name' => 'desc',
                            'label' => esc_html__('Description', 'itfirm'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'desc_color',
                            'label' => esc_html__('Description Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-info-box .item--desc' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'btn_text',
                            'label' => esc_html__('Button Text', 'itfirm'),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'btn_link',
                            'label' => esc_html__('Button Link', 'itfirm'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'box_image',
                            'label' => esc_html__('Box Image', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'item_link',
                            'label' => esc_html__('Item Link', 'itfirm'),
                            'type' => \Elementor\Controls_Manager::URL,
                            'condition' => [
                                'layout' => ['2'],
                            ],
                        ),
                        array(
                            'name' => 'style_l2',
                            'label' => esc_html__('Style', 'itfirm' ),
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
                    ),
                ),

                array(
                    'name' => 'section_animate',
                    'label' => esc_html__('Animate', 'itfirm'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
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