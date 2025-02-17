<?php 
$default_settings = [
    'selected_icon' => '',
    'icon_color_gr_from' => '',
    'icon_color_gr_to' => '',
    'style' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);

$widget->add_render_attribute( 'selected_icon', 'class' );
if ( !empty( $selected_icon["value"] ) ) { 
    $widget->add_render_attribute( 'i', 'class', $selected_icon );
    $widget->add_render_attribute( 'i', 'aria-hidden', 'true' );
}
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
$html_id = ct_get_element_id($settings);
?>
<div id="<?php echo esc_attr($html_id) ?>" class="ct-search-popup ct-search-popup1 <?php echo esc_attr($style); ?>">
	<div class="ct-inline-css"  data-css="
        <?php if( $style == 'style1' && !empty($settings['icon_color_gr_from']) && !empty($settings['icon_color_gr_to']) ) : ?>
            #<?php echo esc_attr($html_id) ?>.ct-search-popup1 i {
                background-image: -webkit-gradient(linear, left top, right top, from(<?php echo esc_attr($settings['icon_color_gr_from']); ?>), to(<?php echo esc_attr($settings['icon_color_gr_to']); ?>));
                background-image: -webkit-linear-gradient(to left, <?php echo esc_attr($settings['icon_color_gr_from']); ?>, <?php echo esc_attr($settings['icon_color_gr_to']); ?>);
                background-image: -moz-linear-gradient(to left, <?php echo esc_attr($settings['icon_color_gr_from']); ?>, <?php echo esc_attr($settings['icon_color_gr_to']); ?>);
                background-image: -ms-linear-gradient(to left, <?php echo esc_attr($settings['icon_color_gr_from']); ?>, <?php echo esc_attr($settings['icon_color_gr_to']); ?>);
                background-image: -o-linear-gradient(to left, <?php echo esc_attr($settings['icon_color_gr_from']); ?>, <?php echo esc_attr($settings['icon_color_gr_to']); ?>);
                background-image: linear-gradient(to left, <?php echo esc_attr($settings['icon_color_gr_from']); ?>, <?php echo esc_attr($settings['icon_color_gr_to']); ?>);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($settings['icon_color_gr_from']); ?>', endColorStr='<?php echo esc_attr($settings['icon_color_gr_to']); ?>', gradientType='1');
            }
        <?php endif; ?>">
    </div>
	<?php if ( !empty( $selected_icon["value"] ) ) { ?>
        <?php if($is_new):
            \Elementor\Icons_Manager::render_icon( $selected_icon, [ 'aria-hidden' => 'true' ] );
            else: ?>
            <i <?php ct_print_html($widget->get_render_attribute_string( 'i' )); ?>></i>
        <?php endif; ?>
    <?php } else { ?>
    	<i class="caseicon-search"></i>
    <?php } ?>
</div>