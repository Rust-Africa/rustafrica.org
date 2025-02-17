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
<div id="<?php echo esc_attr($html_id) ?>" class="ct-fancy-box ct-fancy-box-layout4 <?php echo esc_attr($settings['ct_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
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
        <?php endif; ?>">
    </div>
    <div class="item--inner">
        <?php if ( $settings['icon_type'] == 'icon' && $has_icon ) : ?>
            <div class="item--icon icon-psb">
                <?php if($is_new):
                    \Elementor\Icons_Manager::render_icon( $settings['selected_icon'], [ 'aria-hidden' => 'true' ] );
                    else: ?>
                    <i <?php ct_print_html($widget->get_render_attribute_string( 'i' )); ?>></i>
                <?php endif; ?>
            </div>
        <?php endif; ?>
        <?php if ( $settings['icon_type'] == 'image' && !empty($settings['icon_image']['id']) ) : ?>
            <div class="item--icon icon-psb">
                <?php $img_icon  = ct_get_image_by_size( array(
                        'attach_id'  => $settings['icon_image']['id'],
                        'thumb_size' => 'full',
                    ) );
                    $thumbnail_icon    = $img_icon['thumbnail'];
                echo ct_print_html($thumbnail_icon); ?>
            </div>
        <?php endif; ?>
        <div class="item--meta">
            <h4 class="item--title">
                <?php echo ct_print_html($settings['title_text']); ?>
            </h4>
            <div <?php ct_print_html($widget->get_render_attribute_string( 'description_text' )); ?>><?php echo ct_print_html($settings['description_text']); ?></div>
            <?php if(!empty($settings['btn_text'])) : ?>
                <div class="item--button">
                    <a <?php ct_print_html($widget->get_render_attribute_string( 'btn_link' )); ?> class="btn btn-primary"><?php echo esc_attr($settings['btn_text']); ?></a>
                </div>
            <?php endif; ?>
        </div>
        <div class="item--meta-hover">
            <?php if(!empty($settings['item_image']['id'])) : ?>
                <div class="item--image bg-image" style="background-image: url(<?php echo esc_url($settings['item_image']['url']); ?>);"></div>
            <?php endif; ?>
            <div class="item--meta-inner">
                <div class="item--description-hover el-empty"><?php echo ct_print_html($settings['description_hover']); ?></div>
                <?php if(!empty($settings['btn_text'])) : ?>
                    <div class="item--button">
                        <a <?php ct_print_html($widget->get_render_attribute_string( 'btn_link' )); ?> class="btn btn-primary"><?php echo esc_attr($settings['btn_text']); ?></a>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>