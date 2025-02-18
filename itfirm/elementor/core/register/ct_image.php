<?php
// Register Video Player Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_image',
        'title' => esc_html__('Case Image', 'itfirm' ),
        'icon' => 'eicon-image',
        'categories' => array( Case_Theme_Core::CT_CATEGORY_NAME ),
        'scripts' => array(
            'elementor-waypoints',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'content_section',
                    'label' => esc_html__('Content', 'itfirm' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Choose Image', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'image_type',
                            'label' => esc_html__('Image Type', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'img' => 'Image',
                                'bg' => 'Background',
                            ],
                            'default' => 'img',
                        ),
                        array(
                            'name' => 'img_size',
                            'label' => esc_html__('Image Size', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'description' => 'Enter image size (Example: "thumbnail", "medium", "large", "full" or other sizes defined by theme). Alternatively enter size in pixels (Example: 200x100 (Width x Height).',
                            'condition' => [
                                'image_type' => 'img',
                            ],
                        ),
                        array(
                            'name' => 'image_overlay',
                            'label' => esc_html__('Image Overlay', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'range' => [
                                'px' => [
                                    'max' => 1,
                                    'step' => 0.01,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .ct-image-single::before' => 'opacity: {{SIZE}};',
                            ],
                        ),
                        array(
                            'name' => 'image_max_height',
                            'label' => esc_html__('Image Max Height', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'description' => esc_html__('Enter number.', 'itfirm' ),
                            'condition' => [
                                'image_type' => 'img',
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .ct-image-single img' => 'max-height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'image_height',
                            'label' => esc_html__('Image Height', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'description' => esc_html__('Enter number.', 'itfirm' ),
                            'condition' => [
                                'image_type' => 'bg',
                            ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 3000,
                                ],
                            ],
                            'control_type' => 'responsive',
                            'selectors' => [
                                '{{WRAPPER}} .ct-image-single .ct-image-bg' => 'height: {{SIZE}}{{UNIT}};',
                            ],
                        ),
                        array(
                            'name' => 'image_width',
                            'label' => esc_html__('Image Width', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::CHOOSE,
                            'control_type' => 'responsive',
                            'options' => [
                                '100%' => [
                                    'title' => esc_html__('100%', 'itfirm' ),
                                    'icon' => 'eicon-text-align-justify',
                                ],
                                'auto' => [
                                    'title' => esc_html__('Auto', 'itfirm' ),
                                    'icon' => 'eicon-h-align-stretch',
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ct-image-single img, {{WRAPPER}} .ct-image-single .ct-image-single--inner' => 'width: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'image_align',
                            'label' => esc_html__('Image Alignment', 'itfirm' ),
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
                                '{{WRAPPER}} .ct-image-single' => 'text-align: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'image_link',
                            'label' => esc_html__('Link', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                        array(
                            'name' => 'img_effect',
                            'label' => esc_html__('Image Effect', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'no-effect' => 'No',
                                'effect1' => 'Effect 1',
                                'effect2' => 'Effect 2 (Left/Right)',
                                'effect3' => 'Effect 3 (Spin)',
                                'pxl-image-bounce' => 'Bounce',
                                'slide-up-down' => 'Slide Up Down',
                            ],
                            'default' => 'no-effect',
                            'condition' => [
                                'image_type' => 'img',
                            ],
                        ),
                        array(
                            'name' => 'img_tilt',
                            'label' => esc_html__('Parallax Move Mouse', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'no' => 'No',
                                'yes' => 'Yes',
                            ],
                            'default' => 'no',
                            'condition' => [
                                'image_type' => 'img',
                            ],
                        ),
                        array(
                            'name' => 'img_parallax',
                            'label' => esc_html__('Parallax Scrolling', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                'no' => 'No',
                                'yes' => 'Yes',
                            ],
                            'default' => 'no',
                            'condition' => [
                                'image_type' => 'img',
                            ],
                        ),
                        array(
                            'name' => 'img_parallax_w',
                            'label' => esc_html__('Parallax Section Width', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'img_parallax' => 'yes',
                            ],
                            'default' => '1920',
                        ),
                        array(
                            'name' => 'img_parallax_h',
                            'label' => esc_html__('Parallax Section Height', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'condition' => [
                                'img_parallax' => 'yes',
                            ],
                            'default' => '490',
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