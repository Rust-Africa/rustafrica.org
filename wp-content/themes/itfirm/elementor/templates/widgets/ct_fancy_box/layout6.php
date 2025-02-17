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
<div id="<?php echo esc_attr($html_id) ?>" class="ct-fancy-box ct-fancy-box-layout6 <?php echo esc_attr($settings['item_active']); ?> <?php echo esc_attr($settings['ct_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
    <div class="item--inner item--front">
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
        <?php if ( ! empty( $settings['item_link']['url'] ) ) : ?>
            <div class="item--button">
                <a <?php ct_print_html($widget->get_render_attribute_string( 'item_link' )); ?> class="icon-psb"><i class="flaticon-arrow-point-to-right"></i></a>
            </div>
        <?php endif; ?>
    </div>
    <div class="item--inner item--back">
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
        <?php if ( ! empty( $settings['item_link']['url'] ) ) : ?>
            <div class="item--button">
                <a <?php ct_print_html($widget->get_render_attribute_string( 'item_link' )); ?> class="icon-psb"><i class="flaticon-arrow-point-to-right"></i></a>
            </div>
        <?php endif; ?>
    </div>
</div>