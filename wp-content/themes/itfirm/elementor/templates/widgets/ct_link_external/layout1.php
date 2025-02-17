<?php
$default_settings = [
    'pxl_icon' => '',
    'item_link' => '',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = ct_get_element_id($settings);
if ( ! empty( $item_link['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $item_link['url'] );

    if ( $item_link['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $item_link['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
?>
<div class="ct-link-external1 <?php echo esc_attr($ct_animate); ?>">
    <a <?php ct_print_html($widget->get_render_attribute_string( 'button' )); ?>>
        <?php if ( !empty($item_link['url']) && !empty($pxl_icon['value']) ) :
            \Elementor\Icons_Manager::render_icon( $pxl_icon, [ 'aria-hidden' => 'true', 'class' => '' ], 'i' );
        endif; ?>
    </a>
</div>
