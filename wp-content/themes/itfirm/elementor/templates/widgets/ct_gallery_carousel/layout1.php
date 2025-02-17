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

$fade = $widget->get_setting('fade');
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
$widget->add_render_attribute( 'carousel', [
    'class' => 'ct-slick-carousel slick-shadow',
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
    'data-fade' => $fade,
] );
$img_size = '840x630';
if(!empty($settings['img_size'])) {
    $img_size = $settings['img_size'];
}
?>
<?php if(isset($settings['image']) && !empty($settings['image']) && count($settings['image'])): ?>
    <div class="ct-gallery-carousel1 ct-slick-slider slick-dots-style3 <?php echo esc_attr($settings['style']); ?>">
        <div <?php ct_print_html($widget->get_render_attribute_string( 'inner' )); ?>>
            <div <?php ct_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <?php foreach ($settings['image'] as $value): 
                    $img = ct_get_image_by_size( array(
                        'attach_id'  => $value['id'],
                        'thumb_size' => $img_size,
                    ));
                    $thumbnail = $img['thumbnail']; 
                    $thumbnail_url = wp_get_attachment_image_src($value['id'], 'full');
                    ?>
                    <div class="carousel-item slick-slide">
                        <div class="item--inner">
                            <a href="<?php echo esc_url($thumbnail_url[0]); ?>">
                                <?php echo wp_kses_post($thumbnail); ?>
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>
