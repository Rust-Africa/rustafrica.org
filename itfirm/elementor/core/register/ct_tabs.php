<?php
$elementor_templates = get_posts([
    'post_type' => 'elementor_library',
    'numberposts' => -1,
    'post_status' => 'publish',
]);
$elementor_templates_opt = [
    '' => esc_html__( 'Select Template', 'itfirm' ),
];
if($elementor_templates){
    foreach ($elementor_templates as $template) {
        $elementor_templates_opt[$template->ID] = $template->post_title;
    }
}
// Register Tabs Widget
ct_add_custom_widget(
    array(
        'name' => 'ct_tabs',
        'title' => esc_html__( 'Case Tabs', 'itfirm' ),
        'icon' => 'eicon-tabs',
        'categories' => array( Case_Theme_Core::CT_CATEGORY_NAME ),
        'scripts' => [
          'ct-tabs-widget-js',
          'ct-inline-css-js',
        ],
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_tabs',
                    'label' => esc_html__( 'Tabs', 'itfirm' ),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Layout', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '1' => 'Layout 1',
                                '2' => 'Layout 2',
                                '3' => 'Layout 3',
                            ],
                            'default' => '1',
                        ),
                        array(
                            'name' => 'active_tab',
                            'label' => esc_html__( 'Active Tab', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::NUMBER,
                            'default' => 1,
                            'separator' => 'after',
                        ),
                        array(
                            'name' => 'wg_title',
                            'label' => esc_html__( 'Widget Title', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => ['2']
                            ],
                        ),
                        array(
                            'name' => 'wg_title_typography',
                            'label' => esc_html__('Widget Title Typography', 'itfirm' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-tabs .ct-widget-title',
                            'condition' => [
                                'layout' => ['2']
                            ],
                        ),
                        array(
                            'name' => 'wg_desc',
                            'label' => esc_html__( 'Widget Description', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::TEXTAREA,
                            'condition' => [
                                'layout' => ['2']
                            ],
                        ),
                        array(
                            'name' => 'wg_desc_typography',
                            'label' => esc_html__('Widget Description Typography', 'itfirm' ),
                            'type' => \Elementor\Group_Control_Typography::get_type(),
                            'control_type' => 'group',
                            'selector' => '{{WRAPPER}} .ct-tabs .ct-widget-desc',
                            'condition' => [
                                'layout' => ['2']
                            ],
                        ),
                        array(
                            'name' => 'tabs',
                            'label' => esc_html__( 'Tabs Items', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'controls' => array(
                                array(
                                    'name' => 'ct_icon',
                                    'label' => esc_html__('Icon', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                ),
                                array(
                                    'name' => 'tab_title',
                                    'label' => esc_html__( 'Title', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::TEXT,
                                    'default' => esc_html__( 'Tab Title', 'itfirm' ),
                                    'placeholder' => esc_html__( 'Tab Title', 'itfirm' ),
                                    'label_block' => true,
                                ),
                                array(
                                    'name' => 'content_type',
                                    'label' => esc_html__( 'Content Type', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => 'text_editor',
                                    'options' => [
                                        'text_editor' => esc_html__( 'Text Editor', 'itfirm' ),
                                        'template' => esc_html__( 'Template', 'itfirm' ),
                                    ],
                                ),
                                array(
                                    'name' => 'tab_content',
                                    'label' => esc_html__( 'Content', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                                    'default' => esc_html__( 'Tab Content', 'itfirm' ),
                                    'placeholder' => esc_html__( 'Tab Content', 'itfirm' ),
                                    'show_label' => false,
                                    'condition' => [
                                        'content_type' => 'text_editor'
                                    ],
                                ),
                                array(
                                    'name' => 'tab_content_template',
                                    'label' => esc_html__( 'Template', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::SELECT,
                                    'default' => '',
                                    'options' => $elementor_templates_opt,
                                    'condition' => [
                                        'content_type' => 'template'
                                    ],
                                ),
                            ),
                            'title_field' => '{{{ tab_title }}}',
                        ),
                        array(
                            'name' => 'title_color',
                            'label' => esc_html__('Title Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-tabs .ct-tabs-title .ct-tab-title' => 'color: {{VALUE}};',
                            ],
                        ),
                        array(
                            'name' => 'title_active_color',
                            'label' => esc_html__('Title Active Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-tabs .ct-tabs-title .ct-tab-title.active' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['1']
                            ],
                        ),
                        array(
                            'name' => 'content_color',
                            'label' => esc_html__('Content Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-tabs .ct-tabs-content .ct-tab-content' => 'color: {{VALUE}};',
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