<?php

// Register Contact Form 7 Widget
if(class_exists('WPCF7')) {
    $cf7 = get_posts('post_type="wpcf7_contact_form"&numberposts=-1');

    $contact_forms = array();
    if ($cf7) {
        foreach ($cf7 as $cform) {
            $contact_forms[$cform->ID] = $cform->post_title;
        }
    } else {
        $contact_forms[esc_html__('No contact forms found', 'itfirm')] = 0;
    }


    ct_add_custom_widget(
        array(
            'name' => 'ct_contact_form',
            'title' => esc_html__('Case Contact Form', 'itfirm'),
            'icon' => 'eicon-form-horizontal',
            'categories' => array(Case_Theme_Core::CT_CATEGORY_NAME),
            'scripts' => array(
                'jquery-ui-slider',
                'ct-elementor-js',
            ),
            'params' => array(
                'sections' => array(
                    array(
                        'name' => 'source_section',
                        'label' => esc_html__('Source Settings', 'itfirm'),
                        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                        'controls' => array(
                            array(
                                'name' => 'form_id',
                                'label' => esc_html__('Select Form', 'itfirm'),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => $contact_forms,
                            ),
                            array(
                                'name' => 'title',
                                'label' => esc_html__('Title', 'itfirm' ),
                                'type' => \Elementor\Controls_Manager::TEXT,
                                'label_block' => true,
                            ),
                            array(
                                'name' => 'description',
                                'label' => esc_html__('Description', 'itfirm' ),
                                'type' => \Elementor\Controls_Manager::TEXTAREA,
                                'rows' => 10,
                                'show_label' => false,
                            ),
                            array(
                                'name' => 'style',
                                'label' => esc_html__('Style', 'itfirm' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => [
                                    'style1' => 'Default',
                                    'style2' => 'Style Border Gray 1',
                                    'style3' => 'Style Border Gray 2',
                                    'style-border-gray3' => 'Style Border Gray 3',
                                    'style-box-gray1' => 'Style Box Gray 1',
                                    'style4' => 'Style Border Bottom',
                                ],
                                'default' => 'style1',
                            ),
                            array(
                                'name' => 'title_color',
                                'label' => esc_html__('Title Color', 'itfirm' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .ct-contact-form .ct-contact-meta h3' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'title_typography',
                                'label' => esc_html__('Title Typography', 'itfirm' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .ct-contact-form .ct-contact-meta h3',
                            ),
                            array(
                                'name' => 'desc_color',
                                'label' => esc_html__('Description Color', 'itfirm' ),
                                'type' => \Elementor\Controls_Manager::COLOR,
                                'selectors' => [
                                    '{{WRAPPER}} .ct-contact-form .ct-contact-meta p' => 'color: {{VALUE}};',
                                ],
                            ),
                            array(
                                'name' => 'desc_typography',
                                'label' => esc_html__('Description Typography', 'itfirm' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .ct-contact-form .ct-contact-meta p',
                            ),
                            array(
                                'name' => 'ct_animate',
                                'label' => esc_html__('Case Animate', 'itfirm' ),
                                'type' => \Elementor\Controls_Manager::SELECT,
                                'options' => itfirm_animate(),
                                'default' => '',
                            ),
                        ),
                    ),
                    
                    array(
                        'name' => 'form_style',
                        'label' => esc_html__('Form Style', 'itfirm' ),
                        'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                        'controls' => array(
                            array(
                                'name' => 'input_typography',
                                'label' => esc_html__('Input Typography', 'itfirm' ),
                                'type' => \Elementor\Group_Control_Typography::get_type(),
                                'control_type' => 'group',
                                'selector' => '{{WRAPPER}} .ct-contact-form .wpcf7-form-control',
                            ),
                        ),
                    ),
                ),
            ),
        ),
        get_template_directory() . '/elementor/core/widgets/'
    );
}