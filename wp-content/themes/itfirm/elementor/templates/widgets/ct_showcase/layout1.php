<?php 
$default_settings = [
    'title' => '',
    'image' => '',
    'img_size' => '',
    'btn_link' => '',
    'btn_link2' => '',
    'btn_text2' => '',
    'ct_animate' => '',
    'style' => '',
    'soon' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$size = 'full';
if(!empty($img_size)) {
    $size = $img_size;
} else {
    $size = 'full';
}
$img  = ct_get_image_by_size( array(
    'attach_id'  => $image['id'],
    'thumb_size' => $size,
) );
$thumbnail    = $img['thumbnail'];
if ( ! empty( $btn_link['url'] ) ) {
    $widget->add_render_attribute( 'btn_link', 'href', $btn_link['url'] );

    if ( $btn_link['is_external'] ) {
        $widget->add_render_attribute( 'btn_link', 'target', '_blank' );
    }

    if ( $btn_link['nofollow'] ) {
        $widget->add_render_attribute( 'btn_link', 'rel', 'nofollow' );
    }
}

if ( ! empty( $btn_link2['url'] ) ) {
    $widget->add_render_attribute( 'btn_link2', 'href', $btn_link2['url'] );

    if ( $btn_link2['is_external'] ) {
        $widget->add_render_attribute( 'btn_link2', 'target', '_blank' );
    }

    if ( $btn_link2['nofollow'] ) {
        $widget->add_render_attribute( 'btn_link2', 'rel', 'nofollow' );
    }
}

?>
<div class="ct-showcase <?php echo esc_attr($soon.' '.$style.' '.$ct_animate); ?>" data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
    <div class="item--image">
        <?php echo wp_kses_post($thumbnail); ?>
        <div class="ct-btn-group">
            <a class="btn item--link active" <?php ct_print_html($widget->get_render_attribute_string( 'btn_link' )); ?>><?php echo esc_attr($settings['btn_text']); ?></a>
            <?php if(!empty($btn_text2)) : ?>
                <a class="btn item--link" <?php ct_print_html($widget->get_render_attribute_string( 'btn_link2' )); ?>><?php echo esc_attr($btn_text2); ?></a>
            <?php endif; ?>
        </div>
    </div>
    <div class="item--title"><?php echo ct_print_html($title); ?></div>
</div>