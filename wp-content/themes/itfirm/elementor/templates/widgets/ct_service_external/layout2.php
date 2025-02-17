<?php
$widget->add_render_attribute( 'inner', [
    'class' => 'ct-carousel-inner',
] );

$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');

$box_overlay_img = $widget->get_setting('box_overlay_img');
$img_size = $widget->get_setting('img_size');
$arrows = $widget->get_setting('arrows');
$dots = $widget->get_setting('dots');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay', '');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite');
$speed = $widget->get_setting('speed', '500');
if (is_rtl()) {
    $carousel_dir = 'true';
} else {
    $carousel_dir = 'false';
}
$img_size_default = '370x430';
if(!empty($img_size)) {
    $img_size_default = $img_size;
}
$widget->add_render_attribute( 'carousel', [
    'class' => 'ct-slick-carousel',
    'data-arrows' => $arrows,
    'data-dots' => $dots,
    'data-pauseOnHover' => $pause_on_hover,
    'data-autoplay' => $autoplay,
    'data-autoplaySpeed' => $autoplay_speed,
    'data-infinite' => $infinite,
    'data-speed' => $speed,
    'data-colxs' => $col_xs,
    'data-colsm' => $col_sm,
    'data-colmd' => $col_md,
    'data-collg' => $col_lg,
    'data-colxl' => $col_xl,
    'data-dir' => $carousel_dir,
    'data-slidesToScroll' => $slides_to_scroll,
] );
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
$html_id = ct_get_element_id($settings);
?>
<?php if(isset($settings['service']) && !empty($settings['service']) && count($settings['service'])): ?>
    <div id="<?php echo esc_attr($html_id); ?>" class="ct-service-external ct-service-external2 ct-slick-slider slick-boxshadow slick-dots-style7">
        <div <?php ct_print_html($widget->get_render_attribute_string( 'inner' )); ?>>
            <div <?php ct_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <?php foreach ($settings['service'] as $key => $value): 
                    $title = isset($value['title']) ? $value['title'] : '';
                    $btn_text = isset($value['btn_text']) ? $value['btn_text'] : '';
                    $description = isset($value['description']) ? $value['description'] : ''; 

                    $link_key = $widget->get_repeater_setting_key( 'title', 'value', $key );
                    if ( ! empty( $value['btn_link']['url'] ) ) {
                        $widget->add_render_attribute( $link_key, 'href', $value['btn_link']['url'] );

                        if ( $value['btn_link']['is_external'] ) {
                            $widget->add_render_attribute( $link_key, 'target', '_blank' );
                        }

                        if ( $value['btn_link']['nofollow'] ) {
                            $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                        }
                    }
                    $link_attributes = $widget->get_render_attribute_string( $link_key );

                    $icon_type = isset($value['icon_type']) ? $value['icon_type'] : '';
                    $selected_icon = isset($value['selected_icon']) ? $value['selected_icon'] : '';
                    $icon_image = isset($value['icon_image']) ? $value['icon_image'] : '';
                    $has_icon = ! empty( $selected_icon );
                    if ( $has_icon ) {
                        $widget->add_render_attribute( 'i', 'class', $selected_icon );
                        $widget->add_render_attribute( 'i', 'aria-hidden', 'true' );
                    }
                    ?>
                        <div class="slick-slide">
                            <div class="item--inner <?php echo esc_attr($settings['ct_animate']); ?>">
                                <?php if ( $icon_type == 'icon' && $has_icon ) : ?>
                                    <div class="item--icon">
                                        <?php if($is_new):
                                            \Elementor\Icons_Manager::render_icon( $selected_icon, [ 'aria-hidden' => 'true' ] );
                                            else: ?>
                                            <i <?php ct_print_html($widget->get_render_attribute_string( 'i' )); ?>></i>
                                        <?php endif; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ( $icon_type == 'image' && !empty($icon_image['id']) ) : ?>
                                    <div class="item--icon">
                                        <?php $img_icon  = ct_get_image_by_size( array(
                                                'attach_id'  => $icon_image['id'],
                                                'thumb_size' => 'full',
                                            ) );
                                            $thumbnail_icon    = $img_icon['thumbnail'];
                                        echo ct_print_html($thumbnail_icon); ?>
                                    </div>
                                <?php endif; ?>
                                <h3 class="item--title">    
                                    <?php echo esc_attr($title); ?>
                                </h3>
                                <div class="item--description"><?php echo esc_html($description); ?></div>
                                <?php if(!empty($btn_text)) : ?>
                                    <div class="item--readmore">
                                        <a class="btn btn-primary" <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php echo esc_attr($btn_text); ?></a>
                                    </div>
                                <?php endif; ?>
                           </div>
                        </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>