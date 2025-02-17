<?php
$default_settings = [
    'title' => '',
    'phone_number' => '',
    'icon_color_gr_from' => '',
    'icon_color_gr_to' => '',
    'style_l2' => '',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);

if ( ! empty( $item_link['url'] ) ) {
    $widget->add_render_attribute( 'item_link', 'href', $item_link['url'] );

    if ( $item_link['is_external'] ) {
        $widget->add_render_attribute( 'item_link', 'target', '_blank' );
    }

    if ( $item_link['nofollow'] ) {
        $widget->add_render_attribute( 'item_link', 'rel', 'nofollow' );
    }
}

$widget->add_render_attribute( 'selected_icon', 'class' );
$has_icon = ! empty( $settings['selected_icon'] );
if ( $has_icon ) {
    $widget->add_render_attribute( 'i', 'class', $settings['selected_icon'] );
    $widget->add_render_attribute( 'i', 'aria-hidden', 'true' );
}

$is_new = \Elementor\Icons_Manager::is_migration_allowed();
$html_id = ct_get_element_id($settings);
?>
<div id="<?php echo esc_attr($html_id) ?>" class="ct-info-box ct-info-box2 <?php echo esc_attr($ct_animate.' '.$style_l2); ?>" data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
    <div class="ct-inline-css"  data-css="
        <?php if( !empty($settings['icon_color_gr_from']) && !empty($settings['icon_color_gr_to']) && $style_l2 == 'style1' ) : ?>
            #<?php echo esc_attr($html_id) ?>.ct-info-box2 .item--icon i {
                background-image: -webkit-gradient(linear, left top, right top, from(<?php echo esc_attr($settings['icon_color_gr_from']); ?>), to(<?php echo esc_attr($settings['icon_color_gr_to']); ?>));
                background-image: -webkit-linear-gradient(to left, <?php echo esc_attr($settings['icon_color_gr_from']); ?>, <?php echo esc_attr($settings['icon_color_gr_to']); ?>);
                background-image: -moz-linear-gradient(to left, <?php echo esc_attr($settings['icon_color_gr_from']); ?>, <?php echo esc_attr($settings['icon_color_gr_to']); ?>);
                background-image: -ms-linear-gradient(to left, <?php echo esc_attr($settings['icon_color_gr_from']); ?>, <?php echo esc_attr($settings['icon_color_gr_to']); ?>);
                background-image: -o-linear-gradient(to left, <?php echo esc_attr($settings['icon_color_gr_from']); ?>, <?php echo esc_attr($settings['icon_color_gr_to']); ?>);
                background-image: linear-gradient(to left, <?php echo esc_attr($settings['icon_color_gr_from']); ?>, <?php echo esc_attr($settings['icon_color_gr_to']); ?>);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($settings['icon_color_gr_from']); ?>', endColorStr='<?php echo esc_attr($settings['icon_color_gr_to']); ?>', gradientType='1');
            }
        <?php endif; ?>
        <?php if( !empty($settings['icon_box_gr_from']) && !empty($settings['icon_box_gr_to']) && $style_l2 == 'style2' ) : ?>
            #<?php echo esc_attr($html_id) ?>.ct-info-box2 .item--icon {
                background-image: -webkit-gradient(linear, left top, right top, from(<?php echo esc_attr($settings['icon_box_gr_from']); ?>), to(<?php echo esc_attr($settings['icon_box_gr_to']); ?>));
                background-image: -webkit-linear-gradient(to left, <?php echo esc_attr($settings['icon_box_gr_from']); ?>, <?php echo esc_attr($settings['icon_box_gr_to']); ?>);
                background-image: -moz-linear-gradient(to left, <?php echo esc_attr($settings['icon_box_gr_from']); ?>, <?php echo esc_attr($settings['icon_box_gr_to']); ?>);
                background-image: -ms-linear-gradient(to left, <?php echo esc_attr($settings['icon_box_gr_from']); ?>, <?php echo esc_attr($settings['icon_box_gr_to']); ?>);
                background-image: -o-linear-gradient(to left, <?php echo esc_attr($settings['icon_box_gr_from']); ?>, <?php echo esc_attr($settings['icon_box_gr_to']); ?>);
                background-image: linear-gradient(to left, <?php echo esc_attr($settings['icon_box_gr_from']); ?>, <?php echo esc_attr($settings['icon_box_gr_to']); ?>);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($settings['icon_box_gr_from']); ?>', endColorStr='<?php echo esc_attr($settings['icon_box_gr_to']); ?>', gradientType='1');
            }
        <?php endif; ?>">
    </div>
	<div class="ct-infobox-inner">
        <?php if ( $has_icon ) : ?>
            <div class="item--icon el-bounce">
                <?php if($is_new):
                    \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] );
                endif; ?>
                <?php if ( ! empty( $item_link['url'] ) ) { ?>
                    <a class="ct-info-link" <?php ct_print_html($widget->get_render_attribute_string( 'item_link' )); ?>><?php echo esc_attr($btn_text); ?></a>
                <?php } ?>
            </div>
        <?php endif; ?>
		<div class="item--meta">
    		<div class="item--title el-empty"><?php echo esc_attr($title); ?></div>
    		<div class="item--phone el-empty"><?php echo esc_attr($phone_number); ?></div>
        </div>
	</div>
</div>