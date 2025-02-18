<?php

// Register Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_carousel_arrow',
        'title' => esc_html__('Case Carousel Arrow', 'itfirm'),
        'icon' => 'eicon-animation',
        'categories' => array(Case_Theme_Core::CT_CATEGORY_NAME),
        'scripts' => array(),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'content_alignment_section',
                    'label' => esc_html__('Content Alignment', 'itfirm' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'style',
                            'label' => esc_html__('Style', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'style1' => 'Style 1',
                            ],
                            'default' => 'style1',
                        ),
                        array(
                            'name' => 'arrow_align',
                            'label' => esc_html__('Alignment', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                'start' => [
                                    'title' => esc_html__('Case Left', 'itfirm' ),
                                    'icon' => 'eicon-text-align-left',
                                ],
                                'center' => [
                                    'title' => esc_html__('Case Center', 'itfirm' ),
                                    'icon' => 'eicon-text-align-center',
                                ],
                                'flex-end' => [
                                    'title' => esc_html__('Case Right', 'itfirm' ),
                                    'icon' => 'eicon-text-align-right',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ct-nav-carousel' => 'justify-content: {{VALUE}};',
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);