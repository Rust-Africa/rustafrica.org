<?php
// Register Video Player Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_button_video',
        'title' => esc_html__('Case Button Video', 'itfirm' ),
        'icon' => 'eicon-play',
        'categories' => array( Case_Theme_Core::CT_CATEGORY_NAME ),
        'scripts' => array(
            'ct-inline-css-js',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'content_section',
                    'label' => esc_html__('Button Video', 'itfirm' ),
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
                        array(
                            'name' => 'btn_text',
                            'label' => esc_html__('Button Text', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'video_link',
                            'label' => esc_html__('Video Link', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                        ),
                        array(
                            'name' => 'btn_typography',
                            'label' => esc_html__('Typography', 'itfirm' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-button-video1 a',
                            'condition' => [
                                'layout' => ['1'],
                            ],
                        ),
                        array(
                            'name' => 'video_image',
                            'label' => esc_html__('Video Image', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'layout' => ['2'],
                            ],
                        ),
                        array(
                            'name' => 'video_shape',
                            'label' => esc_html__('Video Shape', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                            'condition' => [
                                'layout' => ['2'],
                            ],
                        ),
                        array(
                            'name' => 'btn_color_gr_from',
                            'label' => esc_html__('Button Color Gradient From', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'layout' => ['2'],
                            ],
                        ),
                        array(
                            'name' => 'btn_color_gr_to',
                            'label' => esc_html__('Button Color Gradient To', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'layout' => ['2'],
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