<?php
ct_add_custom_widget(
    array(
        'name' => 'ct_link_scroll_section',
        'title' => esc_html__('Asri Scroll To Section', 'itfirm' ),
        'icon' => 'eicon-scroll',
        'categories' => array( Case_Theme_Core::CT_CATEGORY_NAME ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_content',
                    'label' => esc_html__('Content', 'itfirm' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'pxl_id',
                            'label' => esc_html__('ID', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'label_block' => true,
                            'description' => 'For example: #about'
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);