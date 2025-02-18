<?php
// Register Icon Box Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_fancy_box',
        'title' => esc_html__('Case Fancy Box', 'itfirm' ),
        'icon' => 'eicon-icon-box',
        'categories' => array( Case_Theme_Core::CT_CATEGORY_NAME ),
        'scripts' => array(
            'ct-inline-css-js',
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
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_fancy_box/layout-image/layout1.jpg'
                                ],
                                '2' => [
                                    'label' => esc_html__('Layout 2', 'itfirm' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_fancy_box/layout-image/layout2.jpg'
                                ],
                                '3' => [
                                    'label' => esc_html__('Layout 3', 'itfirm' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_fancy_box/layout-image/layout3.jpg'
                                ],
                                '4' => [
                                    'label' => esc_html__('Layout 4', 'itfirm' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_fancy_box/layout-image/layout4.jpg'
                                ],
                                '5' => [
                                    'label' => esc_html__('Layout 5', 'itfirm' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_fancy_box/layout-image/layout5.jpg'
                                ],
                                '6' => [
                                    'label' => esc_html__('Layout 6', 'itfirm' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_fancy_box/layout-image/layout6.jpg'
                                ],
                                '7' => [
                                    'label' => esc_html__('Layout 7', 'itfirm' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_fancy_box/layout-image/layout7.jpg'
                                ],
                                '8' => [
                                    'label' => esc_html__('Layout 8', 'itfirm' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_fancy_box/layout-image/layout8.jpg'
                                ],
                                '9' => [
                                    'label' => esc_html__('Layout 9', 'itfirm' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_fancy_box/layout-image/layout9.jpg'
                                ],
                                '10' => [
                                    'label' => esc_html__('Layout 10', 'itfirm' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_fancy_box/layout-image/layout10.jpg'
                                ],
                                '11' => [
                                    'label' => esc_html__('Layout 11', 'itfirm' ),
                                    'image' => get_template_directory_uri() . '/elementor/templates/widgets/ct_fancy_box/layout-image/layout11.jpg'
                                ],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'itfirm' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'item_active',
                            'label' => esc_html__('Item Active', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'ct--item-deactive' => 'No',
                                'ct--item-active' => 'Yes',
                            ],
                            'default' => 'ct--item-deactive',
                            'condition' => [
                                'layout' => ['6'],
                            ],
                        ),
                        array(
                            'name' => 'icon_type',
                            'label' => esc_html__('Icon Type', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'icon' => 'Icon',
                                'image' => 'Image',
                            ],
                            'default' => 'icon',
                        ),
                        array(
                            'name' => 'selected_icon',
                            'label' => esc_html__('Icon', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::ICONS,
                            'fa4compatibility' => 'icon',
                            'condition' => [
                                'icon_type' => 'icon',
                            ],
                        ),
                        array(
                            'name' => 'icon_image',
                            'label' => esc_html__( 'Icon Image', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'description' => esc_html__('Select image icon.', 'itfirm'),
                            'condition' => [
                                'icon_type' => 'image',
                            ],
                        ),
                        array(
                            'name' => 'title_text',
                            'label' => esc_html__('Title', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__('Enter your title', 'itfirm' ),
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'category',
                            'label' => esc_html__('Category', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'placeholder' => esc_html__('Enter your category', 'itfirm' ),
                            'label_block' => true,
                            'condition' => [
                                'layout' => ['9'],
                            ],
                        ),
                        array(
                            'name' => 'description_text',
                            'label' => esc_html__('Description', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'placeholder' => esc_html__('Enter your description', 'itfirm' ),
                            'rows' => 10,
                            'show_label' => false,
                            'condition' => [
                                'layout' => ['1','2','4','6','7','8','9','10','11'],
                            ],
                        ),
                        array(
                            'name' => 'description_hover',
                            'label' => esc_html__('Description Hover', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'rows' => 10,
                            'show_label' => false,
                            'condition' => [
                                'layout' => ['4'],
                            ],
                        ),
                        array(
                            'name' => 'btn_text',
                            'label' => esc_html__('Button Text', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'layout' => ['4','7','8','9','10'],
                            ],
                        ),
                        array(
                            'name' => 'btn_link',
                            'label' => esc_html__('Button Link', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'condition' => [
                                'layout' => ['4','7','8','9','10'],
                            ],
                        ),
                        array(
                            'name' => 'item_image',
                            'label' => esc_html__('Image', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'layout' => ['4'],
                            ],
                        ),
                        array(
                            'name' => 'item_link',
                            'label' => esc_html__('Item Link', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::URL,
                            'condition' => [
                                'layout' => ['5', '6', '11'],
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style',
                    'label' => esc_html__('Style', 'itfirm'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-fancy-box .item--title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_color_box_hover',
                            'label' => esc_html__('Title Color - Box Hover', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-fancy-box .item--inner:hover .item--title' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['7'],
                            ],
                        ),
                        array(
                            'name' => 'title_typography',
                            'label' => esc_html__('Title Typography', 'itfirm' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-fancy-box .item--title',
                        ),
                        array(
                            'name' => 'title_space_top',
                            'label' => esc_html__('Title Top Spacer', 'itfirm' ),
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
                                '{{WRAPPER}} .ct-fancy-box .item--title' => 'margin-top: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'title_space_bottom',
                            'label' => esc_html__('Title Bottom Spacer', 'itfirm' ),
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
                                '{{WRAPPER}} .ct-fancy-box .item--title' => 'margin-bottom: {{SIZE}}{{UNIT}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'desc_color',
                            'label' => esc_html__('Description Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-fancy-box .item--description' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1','2','4','6','7','8','9','10'],
                            ],
                        ),
                        array(
                            'name' => 'desc_color_box_hover',
                            'label' => esc_html__('Description Color - Box Hover', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-fancy-box .item--inner:hover .item--description' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['7'],
                            ],
                        ),
                        array(
                            'name' => 'desc_typography',
                            'label' => esc_html__('Description Typography', 'itfirm' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-fancy-box .item--description',
                            'condition' => [
                                'layout' => ['1','2','4','6','7','8','9','10'],
                            ],
                        ),
                        array(
                            'name' => 'btn_text_color',
                            'label' => esc_html__('Button Text Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-fancy-box .item--button a' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['7','8','9'],
                            ],
                        ),
                        array(
                            'name' => 'btn_text_typography',
                            'label' => esc_html__('Button Typography', 'itfirm' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-fancy-box .item--button a',
                            'condition' => [
                                'layout' => ['10'],
                            ],
                        ),
                        array(
                            'name' => 'btn_text_color_box_hover',
                            'label' => esc_html__('Button Text Color - Box Hover', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-fancy-box .item--inner:hover .item--button a' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['7'],
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-fancy-box .item--icon i' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'icon_bg_color',
                            'label' => esc_html__('Icon Background Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-fancy-box .item--icon' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['9','11'],
                            ],
                        ),
                        array(
                            'name' => 'icon_color_box_hover',
                            'label' => esc_html__('Icon Color - Box Hover', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-fancy-box .item--inner:hover .item--icon i' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['7'],
                            ],
                        ),
                        array(
                            'name' => 'icon_box_color',
                            'label' => esc_html__('Icon Box Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-fancy-box-layout1.style2 .item--icon, {{WRAPPER}} .ct-fancy-box-layout1.style3 .item--icon' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1'],
                                'style_l1' => ['style2','style3'],
                            ],
                        ),
                        array(
                            'name' => 'icon_color_gradient',
                            'label' => esc_html__('Icon Color Gradient', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'layout' => ['1','2','3','4','5','6'],
                            ],
                        ),
                        array(
                            'name' => 'icon_font_size',
                            'label' => esc_html__('Icon Font Size', 'itfirm' ),
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
                                '{{WRAPPER}}  .ct-fancy-box .item--icon i' => 'font-size: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}}  .ct-fancy-box-layout1 .item--icon' => 'min-width: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'icon_type' => 'icon',
                            ],
                        ),
                        array(
                            'name' => 'icon_img_max_height',
                            'label' => esc_html__('Icon Image Max Height', 'itfirm' ),
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
                                '{{WRAPPER}} .ct-fancy-box .item--icon img' => 'max-height: {{SIZE}}{{UNIT}} !important;',
                            ],
                            'condition' => [
                                'icon_type' => 'image',
                            ],
                        ),
                        array(
                            'name' => 'hover_box_color',
                            'label' => esc_html__('Hover Box Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'layout' => ['5'],
                            ],
                        ),
                        array(
                           'name' => 'hover_box_color_gr',
                            'label' => esc_html__('Hover Box Color Gradient', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'layout' => ['5'],
                            ],
                        ),
                        array(
                            'name' => 'style_l1',
                            'label' => esc_html__('Style', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                                'style3' => 'Style 3',
                                'style4' => 'Style 4',
                                'style5' => 'Style 5',
                                'style6' => 'Style 6',
                            ],
                            'default' => 'style1',
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'style_l8',
                            'label' => esc_html__('Style', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                            ],
                            'default' => 'style1',
                            'condition' => [
                                'layout' => ['8'],
                            ],
                        ),
                        array(
                            'name' => 'style_l3',
                            'label' => esc_html__('Style', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                            ],
                            'default' => 'style1',
                            'condition' => [
                                'layout' => ['3'],
                            ],
                        ),
                        array(
                            'name' => 'style_l7',
                            'label' => esc_html__('Style', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                                'style2' => 'Style 2',
                            ],
                            'default' => 'style1',
                            'condition' => [
                                'layout' => ['7'],
                            ],
                        ),
                        array(
                            'name' => 'l6_box_color',
                            'label' => esc_html__('Box Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-fancy-box-layout6 .item--inner' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['6'],
                            ],
                        ),
                        array(
                            'name' => 'l6_box_color_hover',
                            'label' => esc_html__('Box Color Hover', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-fancy-box-layout6 .item--inner.item--back, {{WRAPPER}} .ct-fancy-box-layout7 .item--inner:hover' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['6','7'],
                            ],
                        ),
                        array(
                            'name' => 'l6_circle_color',
                            'label' => esc_html__('Circle Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-fancy-box-layout6 .item--inner:before' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['6'],
                            ],
                        ),
                        array(
                            'name' => 'l6_circle_color_hover',
                            'label' => esc_html__('Circle Color Hover', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-fancy-box-layout6 .item--inner.item--back:before' => 'border-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['6'],
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