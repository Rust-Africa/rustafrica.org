<?php
// Register Video Player Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_background',
        'title' => esc_html__('Case Background', 'itfirm' ),
        'icon' => 'eicon-image',
        'categories' => array( Case_Theme_Core::CT_CATEGORY_NAME ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'content_section',
                    'label' => esc_html__('Content', 'itfirm' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'image',
                            'label' => esc_html__('Background Image', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::MEDIA,
                        ),
                        array(
                            'name' => 'color',
                            'label' => esc_html__('Background Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);