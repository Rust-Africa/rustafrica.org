<?php
// Register Support Button Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_support_button',
        'title' => esc_html__('Case Support Button', 'itfirm' ),
        'icon' => 'eicon-dual-button',
        'scripts' => array(
            'ct-elementor-js',
            'ct-inline-css-js',
        ),
        'categories' => array( Case_Theme_Core::CT_CATEGORY_NAME ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'source_section',
                    'label' => esc_html__('Source Settings', 'itfirm' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'btn_text',
                            'label' => esc_html__('Button Text', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                        ),
                        array(
                            'name' => 'btn_link',
                            'label' => esc_html__('Button Link', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::URL,
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);