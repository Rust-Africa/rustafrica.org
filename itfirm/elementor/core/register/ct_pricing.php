<?php
ct_add_custom_widget(
    array(
        'name' => 'ct_pricing',
        'title' => esc_html__('Case Pricing', 'itfirm'),
        'icon' => 'eicon-settings',
        'categories' => array(Case_Theme_Core::CT_CATEGORY_NAME),
        'scripts' => array(
            'ct-inline-css-js',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_list_monthly',
                    'label' => esc_html__('Pricing Monthly', 'itfirm'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'tab_title_monthly',
                            'label' => esc_html__('Tab Title', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'tab_label_monthly',
                            'label' => esc_html__('Tab Label', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'col_monthly',
                            'label' => esc_html__('Column', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                            ],
                            'default' => '4',
                        ),
                        array(
                            'name' => 'ct_animate',
                            'label' => esc_html__('Case Animate', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => itfirm_animate(),
                            'default' => '',
                        ),
                        array(
                            'name' => 'content_monthly',
                            'label' => esc_html__('Content', 'itfirm'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'sub_title',
                                    'label' => esc_html__('Sub Title', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::TEXTAREA,
                                ),
                                array(
                                    'name' => 'price',
                                    'label' => esc_html__('Price', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'time',
                                    'label' => esc_html__('Time', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'feature',
                                    'label' => esc_html__( 'Feature', 'itfirm' ),
                                    'type' => Case_Theme_Core::LIST_PRICING_CONTROL,
                                ),
                                array(
                                    'name' => 'button_text',
                                    'label' => esc_html__('Button Text', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'default' => '',
                                ),
                                array(
                                    'name' => 'button_link',
                                    'label' => esc_html__('Button Link', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::URL,
                                ),
                                array(
                                    'name' => 'popular',
                                    'label' => esc_html__('Popular Text', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_list_year',
                    'label' => esc_html__('Pricing Year', 'itfirm'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'tab_title_year',
                            'label' => esc_html__('Tab Title', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'tab_label_year',
                            'label' => esc_html__('Tab Label', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'col_year',
                            'label' => esc_html__('Column', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '1' => '1',
                                '2' => '2',
                                '3' => '3',
                                '4' => '4',
                            ],
                            'default' => '4',
                        ),
                        array(
                            'name' => 'content_year',
                            'label' => esc_html__('Content', 'itfirm'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'title',
                                    'label' => esc_html__('Title', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'sub_title',
                                    'label' => esc_html__('Sub Title', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'price',
                                    'label' => esc_html__('Price', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'time',
                                    'label' => esc_html__('Time', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                                array(
                                    'name' => 'feature',
                                    'label' => esc_html__( 'Feature', 'itfirm' ),
                                    'type' => Case_Theme_Core::LIST_PRICING_CONTROL,
                                ),
                                array(
                                    'name' => 'button_text',
                                    'label' => esc_html__('Button Text', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'default' => '',
                                ),
                                array(
                                    'name' => 'button_link_y',
                                    'label' => esc_html__('Button Link', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::URL,
                                ),
                                array(
                                    'name' => 'popular',
                                    'label' => esc_html__('Popular Text', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                ),
                            ),
                            'title_field' => '{{{ title }}}',
                        ),
                    ),
                ),
                array(
                    'name' => 'section_style_style',
                    'label' => esc_html__('Style', 'itfirm' ),
                    'tab' => \Elementor\Controls_Manager::TAB_STYLE,
                    'controls' => array(
                        array(
                            'name' => 'color_gr_from',
                            'label' => esc_html__('Color Gradient From', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),
                        array(
                            'name' => 'color_gr_to',
                            'label' => esc_html__('Color Gradient To', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);