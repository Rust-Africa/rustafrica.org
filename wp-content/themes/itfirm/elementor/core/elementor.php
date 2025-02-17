<?php

$files = scandir(get_template_directory() . '/elementor/core/register');

foreach ($files as $file){
    $pos = strrpos($file, ".php");
    if($pos !== false){
        require_once get_template_directory() . '/elementor/core/register/' . $file;
    }
}

if(!function_exists('itfirm_register_icons_library')){
    add_filter('elementor/icons_manager/native', 'itfirm_register_icons_library');
    function itfirm_register_icons_library($tabs){
        $custom_tabs = [
            'extra_icon_version1' => [
                'name' => 'flaticon',
                'label' => esc_html__( 'Case Icons 1', 'itfirm' ),
                'url' => get_template_directory_uri() . '/assets/css/flaticon.css',
                'enqueue' => [  ],
                'prefix' => 'flaticon-',
                'displayPrefix' => 'flaticon',
                'labelIcon' => 'flaticon-cyber-security',
                'ver' => '1.0.0',
                'fetchJson' => get_template_directory_uri() . '/assets/fonts/js/flaticon.js',
                'native' => true,
            ],

            'extra_icon_version2' => [
                'name' => 'flaticon2',
                'label' => esc_html__( 'Case Icons 2', 'itfirm' ),
                'url' => get_template_directory_uri() . '/assets/css/flaticon2.css',
                'enqueue' => [  ],
                'prefix' => 'flaticon2-',
                'displayPrefix' => 'flaticon',
                'labelIcon' => 'flaticon2-vector-idea',
                'ver' => '1.0.0',
                'fetchJson' => get_template_directory_uri() . '/assets/fonts/js/flaticon2.js',
                'native' => true,
            ],

        ];

        $tabs = array_merge($custom_tabs, $tabs);

        return $tabs;
    }
}