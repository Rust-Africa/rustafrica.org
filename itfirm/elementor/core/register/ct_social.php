<?php
ct_add_custom_widget(
    array(
        'name' => 'ct_social',
        'title' => esc_html__('Case Social Icons', 'itfirm'),
        'icon' => 'eicon-social-icons',
        'categories' => array(Case_Theme_Core::CT_CATEGORY_NAME),
        'scripts' => array(
            'ct-inline-css-js',
        ),
        'params' => array(
            'sections' => array(
                array(
                    'name' => 'section_icon',
                    'label' => esc_html__('Icons', 'itfirm'),
                    'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
                    'controls' => array(
                        array(
                            'name' => 'layout',
                            'label' => esc_html__('Style', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SELECT,
                            'options' => [
                                '1' => 'Layout 1',
                                '2' => 'Layout 2',
                                '3' => 'Layout 3',
                            ],
                            'default' => '1',
                        ),
                        array(
                            'name' => 'icons',
                            'label' => esc_html__('Icons', 'itfirm'),
                            'type' => \Elementor\Controls_Manager::REPEATER,
                            'condition' => [
                                'layout' => ['1', '2', '3'],
                            ],
                            'controls' => array(
                                array(
                                    'name' => 'ct_icon',
                                    'label' => esc_html__('Icon', 'itfirm' ),
                                    'type' => \Elementor\Controls_Manager::ICONS,
                                    'fa4compatibility' => 'icon',
                                    'default' => [
                                        'value' => 'fas fa-star',
                                        'library' => 'fa-solid',
                                    ],
                                    'recommended' => [
                                    'fa-brands' => [
                                        'android',
                                        'apple',
                                        'behance',
                                        'bitbucket',
                                        'codepen',
                                        'delicious',
                                        'deviantart',
                                        'digg',
                                        'dribbble',
                                        'elementor',
                                        'facebook',
                                        'flickr',
                                        'foursquare',
                                        'free-code-camp',
                                        'github',
                                        'gitlab',
                                        'globe',
                                        'houzz',
                                        'instagram',
                                        'jsfiddle',
                                        'linkedin',
                                        'medium',
                                        'meetup',
                                        'mix',
                                        'mixcloud',
                                        'odnoklassniki',
                                        'pinterest',
                                        'product-hunt',
                                        'reddit',
                                        'shopping-cart',
                                        'skype',
                                        'slideshare',
                                        'snapchat',
                                        'soundcloud',
                                        'spotify',
                                        'stack-overflow',
                                        'steam',
                                        'telegram',
                                        'thumb-tack',
                                        'tripadvisor',
                                        'tumblr',
                                        'twitch',
                                        'twitter',
                                        'viber',
                                        'vimeo',
                                        'vk',
                                        'weibo',
                                        'weixin',
                                        'whatsapp',
                                        'wordpress',
                                        'xing',
                                        'yelp',
                                        'youtube',
                                        '500px',
                                    ],
                                    'fa-solid' => [
                                        'envelope',
                                        'link',
                                        'rss',
                                    ],
                                ],
                                ),
                                array(
                                    'name' => 'icon_link',
                                    'label' => esc_html__('Icon Link', 'itfirm'),
                                    'type' => \Elementor\Controls_Manager::URL,
                                ),
                            ),
                        ),
                        array(
                            'name' => 'icon_space',
                            'label' => esc_html__('Icon Spacer', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::SLIDER,
                            'control_type' => 'responsive',
                            'size_units' => [ 'px' ],
                            'range' => [
                                'px' => [
                                    'min' => 0,
                                    'max' => 300,
                                ],
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .ct-social-icon1 a' => 'margin-right: {{SIZE}}{{UNIT}};',
                                '{{WRAPPER}} .ct-social-icon3 a + a' => 'margin-left: {{SIZE}}{{UNIT}};',
                            ],
                            'condition' => [
                                'layout' => ['1', '3'],
                            ],
                        ),
                        array(
                            'name' => 'social_label',
                            'label' => esc_html__('Label', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::TEXT,
                            'condition' => [
                                'layout' => ['2'],
                            ],
                        ),
                        array(
                            'name' => 'color_gr_from',
                            'label' => esc_html__('Color Gradient From', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'layout' => ['1', '2'],
                            ],
                        ),
                        array(
                            'name' => 'color_gr_to',
                            'label' => esc_html__('Color Gradient To', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'condition' => [
                                'layout' => ['1', '2'],
                            ],
                        ),
                        array(
                            'name' => 'icon_color',
                            'label' => esc_html__('Icon Color', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-social-icon3 a' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['3'],
                            ],
                        ),
                        array(
                            'name' => 'icon_color_hover',
                            'label' => esc_html__('Icon Color Hover', 'itfirm' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'selectors' => [
                                '{{WRAPPER}} .ct-social-icon3 a:hover' => 'color: {{VALUE}};',
                            ],
                            'condition' => [
                                'layout' => ['3'],
                            ],
                        ),
                    ),
                ),
            ),
        ),
    ),
    get_template_directory() . '/elementor/core/widgets/'
);