<?php
$menus = get_terms( 'nav_menu', array( 'hide_empty' => false ) );
$custom_menus = array(
    '' => esc_html__('Default', 'itfirm')
);
if ( is_array( $menus ) && ! empty( $menus ) ) {
    foreach ( $menus as $single_menu ) {
        if ( is_object( $single_menu ) && isset( $single_menu->name, $single_menu->slug ) ) {
            $custom_menus[ $single_menu->slug ] = $single_menu->name;
        }
    }
} else {
    $custom_menus = '';
}
ct_add_custom_widget(
    array(
        'name' => 'ct_menu',
        'title' => esc_html__('Case Nav Menu', 'itfirm'),
        'icon' => 'eicon-nav-menu',
        'categories' => array(Case_Theme_Core::CT_CATEGORY_NAME),
        'scripts' => [
            'ct-inline-css-js',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source Settings', 'itfirm'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'menu',
                            'label' => esc_html__('Select Menu', 'itfirm'),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => $custom_menus,
                        ),
                        array(
                            'name' => 'style_l1',
                            'label' => esc_html__('Style', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Box',
                                'style2' => 'Divider 1',
                                'style3' => 'Divider 2',
                                'style-divider3' => 'Divider 3',
                                'style-default' => 'Default',
                            ],
                            'default' => 'style1',
                        ),
                        array(
                            'name' => 'align',
                            'label' => esc_html__('Alignment', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'left' => [
                                    'title' => esc_html__('Left', 'itfirm' ),
                                    'icon' => 'fa fa-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__('Center', 'itfirm' ),
                                    'icon' => 'fa fa-align-center',
                                ],
                                'right' => [
                                    'title' => esc_html__('Right', 'itfirm' ),
                                    'icon' => 'fa fa-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ct-nav-menu .ct-main-menu' => 'text-align: {{VALUE}};',
                                '{{WRAPPER}} .ct-nav-menu .ct-main-menu > li' => 'float: none;',
                            ],
                        ),
                        array(
                            'name' => 'menu_bg_color',
                            'label' => esc_html__('Menu Box Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-nav-menu1.style1' => 'background-color: {{VALUE}};',
                            ],
                            'condition' => [
                                'style_l1' => ['style1'],
                            ],
                        ),
                        array(
                            'name' => 'flex_grow',
                            'label' => esc_html__('Flex Grow', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'options' => [
                                'inherit' => [
                                    'title' => esc_html__( 'Inherit', 'itfirm' ),
                                    'icon' => 'fas fa-arrows-alt-v',
                                ],
                                '1' => [
                                    'title' => esc_html__( 'Full', 'itfirm' ),
                                    'icon' => 'fas fa-arrows-alt-h',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}}' => 'flex-grow: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'first_section',
                    'label' => esc_html__('Style First Level', 'itfirm'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'hover_active_style',
                            'label' => esc_html__('Item Hover/Active Style', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'hv-style1' => 'Default',
                                'hv-style2' => 'Gradient Round',
                                'hv-style3' => 'Divider',
                            ],
                            'default' => 'hv-style1',
                            'condition' => [
                                'style_l1' => ['style1'],
                            ],
                        ),
                        array(
                            'name' => 'divider_color',
                            'label' => esc_html__('Color Divider', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-nav-menu1.hv-style3 .ct-main-menu > li > a .ct-menu--line::before, {{WRAPPER}} .ct-nav-menu1.hv-style3 .ct-main-menu > li > a .ct-menu--line::after' => 'background-color: {{VALUE}} !important;',
                            ],
                            'condition' => [
                                'hover_active_style' => ['hv-style3'],
                            ],
                        ),
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-nav-menu .ct-main-menu > li > a' => 'color: {{VALUE}};',
                                '{{WRAPPER}} .ct-nav-menu1 .ct-menu--plus::before, {{WRAPPER}} .ct-nav-menu1 .ct-menu--plus::after' => 'background-color: {{VALUE}} !important;',
                            ],
                        ),
                        array(
                            'name' => 'color_hover',
                            'label' => esc_html__('Color Hover', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-nav-menu .ct-main-menu > li > a:hover' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'color_active',
                            'label' => esc_html__('Color Active', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-nav-menu .ct-main-menu > li.current-menu-parent > a, {{WRAPPER}} .ct-nav-menu .ct-main-menu > li.current_page_item > a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'line_color_gr_from',
                            'label' => esc_html__('Divider Gradient Color From', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'style_l1' => ['style2', 'style3'],
                            ],
                        ),
                        array(
                            'name' => 'line_color_gr_to',
                            'label' => esc_html__('Divider Gradient Color To', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'style_l1' => ['style2', 'style3'],
                            ],
                        ),
                        array(
                            'name' => 'line_height',
                            'label' => esc_html__('Divider Height', 'itfirm' ),
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
                                '{{WRAPPER}} .ct-nav-menu1.style2 .ct-main-menu > li > a::before, {{WRAPPER}} .ct-nav-menu1.style3 .ct-main-menu > li > a::before' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'style_l1' => ['style2', 'style3'],
                            ],
                        ),
                        array(
                            'name' => 'typography',
                            'label' => esc_html__('Typography', 'itfirm' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-nav-menu .ct-main-menu > li > a',
                        ),
                        array(
                            'name' => 'item_space',
                            'label' => esc_html__('Item Space', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%', 'rem' ],
                            'selectors' => [
                                '{{WRAPPER}} .ct-nav-menu .ct-main-menu > li' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
                array(
                    'name' => 'sub_section',
                    'label' => esc_html__('Style Sub Level', 'itfirm'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'mega_fullwidth',
                            'label' => esc_html__('Mega Menu Full Width', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'no' => 'No',
                                'yes' => 'Yes',
                            ],
                            'default' => 'no',
                        ),
                        array(
                            'name' => 'sub_hover_active_style',
                            'label' => esc_html__('Item Hover/Active Style', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'sub-hv-style1' => 'Default',
                                'sub-hv-style2' => 'Gradient Round',
                                'sub-hv-style3' => 'Primary Line',
                            ],
                            'default' => 'sub-hv-style1',
                        ),
                        array(
                            'name' => 'sub_color',
                            'label' => esc_html__('Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-nav-menu .ct-main-menu li .sub-menu li > a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_color_hover',
                            'label' => esc_html__('Color Hover/Actvie', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-nav-menu .ct-main-menu li .sub-menu li:hover > a, {{WRAPPER}} .ct-nav-menu .ct-main-menu li .sub-menu li.current_page_item > a, {{WRAPPER}} .ct-nav-menu .ct-main-menu li .sub-menu li.current-menu-item > a, {{WRAPPER}} .ct-nav-menu .ct-main-menu li .sub-menu li.current_page_ancestor > a, {{WRAPPER}} .ct-nav-menu .ct-main-menu li .sub-menu li.current-menu-ancestor > a' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_typography',
                            'label' => esc_html__('Typography', 'itfirm' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-nav-menu .ct-main-menu li .sub-menu a',
                        ),
                        array(
                            'name' => 'sub_item_space',
                            'label' => esc_html__('Item Space', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%', 'rem' ],
                            'selectors' => [
                                '{{WRAPPER}} .ct-nav-menu .ct-main-menu li .sub-menu > li > a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'sub_border_radius',
                            'label' => esc_html__('Box Border Radius', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::DIMENSIONS,
                            'size_units' => [ 'px', 'em', '%', 'rem' ],
                            'selectors' => [
                                '{{WRAPPER}} .ct-nav-menu .ct-main-menu li .sub-menu' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);