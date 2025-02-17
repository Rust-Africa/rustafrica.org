<?php 
namespace BdevsElementor\Helper;

// BDT Position
function element_pack_position() {
    $position_options = [
        ''              => esc_html__('Default', 'bdevs-elementor'),
        'top-left'      => esc_html__('Top Left', 'bdevs-elementor') ,
        'top-center'    => esc_html__('Top Center', 'bdevs-elementor') ,
        'top-right'     => esc_html__('Top Right', 'bdevs-elementor') ,
        'center'        => esc_html__('Center', 'bdevs-elementor') ,
        'center-left'   => esc_html__('Center Left', 'bdevs-elementor') ,
        'center-right'  => esc_html__('Center Right', 'bdevs-elementor') ,
        'bottom-left'   => esc_html__('Bottom Left', 'bdevs-elementor') ,
        'bottom-center' => esc_html__('Bottom Center', 'bdevs-elementor') ,
        'bottom-right'  => esc_html__('Bottom Right', 'bdevs-elementor') ,
    ];

    return $position_options;
}