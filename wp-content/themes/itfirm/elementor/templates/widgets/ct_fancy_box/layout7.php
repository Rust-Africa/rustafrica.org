<?php
$widget->add_render_attribute( 'selected_icon', 'class' );
$has_icon = ! empty( $settings['selected_icon'] );
if ( $has_icon ) {
    $widget->add_render_attribute( 'i', 'class', $settings['selected_icon'] );
    $widget->add_render_attribute( 'i', 'aria-hidden', 'true' );
}

$widget->add_render_attribute( 'description_text', 'class', 'item--description' );

$widget->add_inline_editing_attributes( 'title_text', 'none' );
$widget->add_inline_editing_attributes( 'description_text' );

$is_new = \Elementor\Icons_Manager::is_migration_allowed();
$html_id = ct_get_element_id($settings);
if ( ! empty( $settings['btn_link']['url'] ) ) {
    $widget->add_render_attribute( 'btn_link', 'href', $settings['btn_link']['url'] );

    if ( $settings['btn_link']['is_external'] ) {
        $widget->add_render_attribute( 'btn_link', 'target', '_blank' );
    }

    if ( $settings['btn_link']['nofollow'] ) {
        $widget->add_render_attribute( 'btn_link', 'rel', 'nofollow' );
    }
}
?>
<div id="<?php echo esc_attr($html_id) ?>" class="ct-fancy-box ct-fancy-box-layout7 <?php echo esc_attr($settings['style_l7'].' '.$settings['ct_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
    <div class="item--inner">
        <?php if ( $settings['icon_type'] == 'icon' && $has_icon ) : ?>
            <div class="item--icon">
                <?php if($is_new):
                    \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] );
                    else: ?>
                    <i <?php ct_print_html($widget->get_render_attribute_string( 'i' )); ?>></i>
                <?php endif; ?>
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
        <div <?php ct_print_html($widget->get_render_attribute_string( 'description_text' )); ?>><?php echo ct_print_html($settings['description_text']); ?></div>
        <?php if(!empty($settings['btn_text'])) : ?>
            <div class="item--button">
                <a <?php ct_print_html($widget->get_render_attribute_string( 'btn_link' )); ?> ><?php echo esc_attr($settings['btn_text']); ?>
                    <i class="more-icon-main flaticon-arrow-point-to-right"></i>
                    <i class="more-icon-hover flaticon-next"></i>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>