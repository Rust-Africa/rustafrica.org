<?php
// Register Video Player Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_particle_animate',
        'title' => esc_html__('Case Particle Animate', 'itfirm' ),
        'icon' => 'eicon-barcode',
        'categories' => array( Case_Theme_Core::CT_CATEGORY_NAME ),
        'scripts' => [
            'ct-elementor-js',
            'ct-inline-css-js',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'content_section',
                    'label' => esc_html__('Source Settings', 'itfirm'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'content_list',
                            'label' => esc_html__('Images', 'itfirm'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'default' => [],
                            'controls' => array(
                                array(
                                    'name' => 'particle',
                                    'label' => esc_html__( 'Particle', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::MEDIA,
                                ),
                                array(
                                    'name' => 'particle_animate',
                                    'label' => esc_html__('Animate', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'animate-none' => 'None',
                                        'shape-parallax' => 'Parallax',
                                        'shape-animate1' => 'Animate 1',
                                        'shape-animate2' => 'Animate 2',
                                        'shape-animate3' => 'Animate 3',
                                        'shape-animate4' => 'Animate 4',
                                        'shape-animate5' => 'Loop Top to Bottom',
                                        'shape-animate6' => 'Loop Bottom to Top',
                                    ],
                                    'default' => 'animate-none',
                                ),
                                array(
                                    'name' => 'type_position',
                                    'label' => esc_html__('Position', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'options' => [
                                        'top-left' => 'Top Left',
                                        'top-right' => 'Top Right',
                                        'bottom-left' => 'Bottom Left',
                                        'bottom-right' => 'Bottom Right',
                                    ],
                                    'default' => 'top-left',
                                ),
                                array(
                                    'name' => 'top_positioon',
                                    'label' => esc_html__('Top Position', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px', '%' ],
                                    'default' => [
                                        'size' => 0,
                                        'unit' => '%',
                                    ],
                                    'range' => [
                                        '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                        ],
                                    ],
                                    'condition' => [
                                        'type_position' => ['top-left', 'top-right'],
                                    ],
                                ),
                                array(
                                    'name' => 'left_positioon',
                                    'label' => esc_html__('Left Position', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px', '%' ],
                                    'default' => [
                                        'size' => 0,
                                        'unit' => '%',
                                    ],
                                    'range' => [
                                        '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                        ],
                                    ],
                                    'condition' => [
                                        'type_position' => ['top-left','bottom-left'],
                                    ],
                                ),
                                array(
                                    'name' => 'bottom_positioon',
                                    'label' => esc_html__('Bottom Position', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px', '%' ],
                                    'default' => [
                                        'size' => 0,
                                        'unit' => '%',
                                    ],
                                    'range' => [
                                        '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                        ],
                                    ],
                                    'condition' => [
                                        'type_position' => ['bottom-right','bottom-left'],
                                    ],
                                ),
                                array(
                                    'name' => 'right_positioon',
                                    'label' => esc_html__('Right Position', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::SLIDER,
                                    'size_units' => [ 'px', '%' ],
                                    'default' => [
                                        'size' => 0,
                                        'unit' => '%',
                                    ],
                                    'range' => [
                                        '%' => [
                                            'min' => 0,
                                            'max' => 100,
                                        ],
                                    ],
                                    'condition' => [
                                        'type_position' => ['top-right', 'bottom-right'],
                                    ],
                                ),
                            ),
                        ),
                        array(
                            'name' => 'image_visible',
                            'label' => esc_html__('Image Visible', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'img-below-content' => 'Below Content',
                                'img-above-content' => 'Above Content',
                            ],
                            'default' => 'img-below-content',
                        ),
                        array(
                            'name' => 'image_section',
                            'label' => esc_html__('Image Show Section', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'parents' => 'Main',
                                'inner' => 'Inner',
                            ],
                            'default' => 'parents',
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