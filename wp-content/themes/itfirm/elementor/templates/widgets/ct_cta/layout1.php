<?php
$default_settings = [
    'author_image' => '',
    'author_title' => '',
    'author_position' => '',
    'wg_title' => '',
    'btn_text' => '',
    'btn_link' => '',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = ct_get_element_id($settings);
if ( ! empty( $btn_link['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $btn_link['url'] );

    if ( $btn_link['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $btn_link['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
?>
<div class="ct-cta1 <?php echo esc_attr($ct_animate); ?> <?php echo esc_attr($settings['style_l1']); ?>">
    <div class="ct-cta--inner">
        <div class="item--author">
            <?php if(!empty($author_image['id'])) {
                $img = ct_get_image_by_size( array(
                    'attach_id'  => $author_image['id'],
                    'thumb_size' => '180x180',
                ));
                $thumbnail = $img['thumbnail']; ?>
                <div class="item--image"><?php echo wp_kses_post($thumbnail); ?></div>
            <?php } ?>
            <div class="item--meta">
                <h6 class="item--autitle el-empty"><?php echo esc_attr($author_title); ?></h6>
                <div class="item--position el-empty"><?php echo esc_attr($author_position); ?></div>
            </div>
        </div>
        <div class="item--wgtitle el-empty"><?php echo esc_attr($wg_title); ?></div>
        <?php if(!empty($btn_text)) : ?>
            <div class="item--button">
                <a class="btn" <?php ct_print_html($widget->get_render_attribute_string( 'button' )); ?>>
                    <?php echo esc_attr($btn_text); ?>
                </a>
            </div>
        <?php endif; ?>
    </div>
</div>
