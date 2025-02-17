<?php
$widget->add_render_attribute( 'selected_icon', 'class' );
$has_icon = ! empty( $settings['selected_icon'] );
if ( $has_icon ) {
    $widget->add_render_attribute( 'i', 'class', $settings['selected_icon'] );
    $widget->add_render_attribute( 'i', 'aria-hidden', 'true' );
}

$widget->add_render_attribute( 'description_text', 'class', 'item--description el-empty' );

$widget->add_inline_editing_attributes( 'title_text', 'none' );
$widget->add_inline_editing_attributes( 'description_text' );

$is_new = \Elementor\Icons_Manager::is_migration_allowed();
$html_id = ct_get_element_id($settings);
if ( ! empty( $settings['item_link']['url'] ) ) {
    $widget->add_render_attribute( 'item_link', 'href', $settings['item_link']['url'] );

    if ( $settings['item_link']['is_external'] ) {
        $widget->add_render_attribute( 'item_link', 'target', '_blank' );
    }

    if ( $settings['item_link']['nofollow'] ) {
        $widget->add_render_attribute( 'item_link', 'rel', 'nofollow' );
    }
}
?>
<div id="<?php echo esc_attr($html_id) ?>" class="ct-fancy-box ct-fancy-box-layout5 <?php echo esc_attr($settings['ct_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
    <div class="ct-inline-css"  data-css="
        <?php if( !empty($settings['icon_color']) && !empty($settings['icon_color_gradient']) ) : ?>
            #<?php echo esc_attr($html_id) ?>.ct-fancy-box .item--icon i {
                background-image: -webkit-gradient(linear, left top, right top, from(<?php echo esc_attr($settings['icon_color']); ?>), to(<?php echo esc_attr($settings['icon_color_gradient']); ?>));
                background-image: -webkit-linear-gradient(to left, <?php echo esc_attr($settings['icon_color']); ?>, <?php echo esc_attr($settings['icon_color_gradient']); ?>);
                background-image: -moz-linear-gradient(to left, <?php echo esc_attr($settings['icon_color']); ?>, <?php echo esc_attr($settings['icon_color_gradient']); ?>);
                background-image: -ms-linear-gradient(to left, <?php echo esc_attr($settings['icon_color']); ?>, <?php echo esc_attr($settings['icon_color_gradient']); ?>);
                background-image: -o-linear-gradient(to left, <?php echo esc_attr($settings['icon_color']); ?>, <?php echo esc_attr($settings['icon_color_gradient']); ?>);
                background-image: linear-gradient(to left, <?php echo esc_attr($settings['icon_color']); ?>, <?php echo esc_attr($settings['icon_color_gradient']); ?>);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($settings['icon_color']); ?>', endColorStr='<?php echo esc_attr($settings['icon_color_gradient']); ?>', gradientType='1');
                background-color: transparent !important;
            }
        <?php endif; ?>
        <?php if( !empty($settings['hover_box_color']) && !empty($settings['hover_box_color_gr']) ) : ?>
            #<?php echo esc_attr($html_id) ?>.ct-fancy-box .item--inner .item--overlay:before {
                background-image: -webkit-gradient(linear, left top, right top, from(<?php echo esc_attr($settings['hover_box_color_gr']); ?>), to(<?php echo esc_attr($settings['hover_box_color']); ?>));
                background-image: -webkit-linear-gradient(to left, <?php echo esc_attr($settings['hover_box_color_gr']); ?>, <?php echo esc_attr($settings['hover_box_color']); ?>);
                background-image: -moz-linear-gradient(to left, <?php echo esc_attr($settings['hover_box_color_gr']); ?>, <?php echo esc_attr($settings['hover_box_color']); ?>);
                background-image: -ms-linear-gradient(to left, <?php echo esc_attr($settings['hover_box_color_gr']); ?>, <?php echo esc_attr($settings['hover_box_color']); ?>);
                background-image: -o-linear-gradient(to left, <?php echo esc_attr($settings['hover_box_color_gr']); ?>, <?php echo esc_attr($settings['hover_box_color']); ?>);
                background-image: linear-gradient(to left, <?php echo esc_attr($settings['hover_box_color_gr']); ?>, <?php echo esc_attr($settings['hover_box_color']); ?>);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($settings['hover_box_color_gr']); ?>', endColorStr='<?php echo esc_attr($settings['hover_box_color']); ?>', gradientType='1');
                background-color: transparent !important;
            }
        <?php endif; ?>">
    </div>
    <div class="item--inner">
        <?php if ( $settings['icon_type'] == 'icon' && $has_icon ) : ?>
            <div class="item--icon">
                <?php if($is_new):
                    \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] );
                endif; ?>
            </div>
        <?php endif; ?>
        <?php if ( $settings['icon_type'] == 'image' && !empty($settings['icon_image']['id']) ) : ?>
            <div class="item--icon">
                <?php $img_icon  = ct_get_image_by_size( array(
                        'attach_id'  => $settings['icon_image']['id'],
                        'thumb_size' => 'full',
                    ) );
                    $thumbnail_icon    = $img_icon['thumbnail'];
                echo ct_print_html($thumbnail_icon); ?>
            </div>
        <?php endif; ?>
        <h4 class="item--title">
            <?php echo ct_print_html($settings['title_text']); ?>
        </h4>
        <?php if ( ! empty( $settings['item_link']['url'] ) ) { ?><a class="item--link" <?php ct_print_html($widget->get_render_attribute_string( 'item_link' )); ?>></a><?php } ?>
        <div class="item--overlay"></div>
    </div>
</div>