<?php
$widget->add_render_attribute( 'inner', [
    'class' => 'ct-carousel-inner ct-carousel-primary',
] );

$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');

$vertical = $widget->get_setting('vertical');
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
    'data-vertical'=> $vertical
] );
?>
<?php if(isset($settings['testimonial']) && !empty($settings['testimonial']) && count($settings['testimonial'])): ?>
    <div class="ct-testimonial ct-testimonial-carousel1 ct-slick-slider slick-dots-style2">
        <div class="ct-testimonial-inner">
            <div <?php ct_print_html($widget->get_render_attribute_string( 'inner' )); ?>>
                <div <?php ct_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                    <?php foreach ($settings['testimonial'] as $value): 
                        $title = isset($value['title']) ? $value['title'] : '';
                        $position = isset($value['position']) ? $value['position'] : '';
                        $description = isset($value['description']) ? $value['description'] : '';
                        $image = isset($value['image']) ? $value['image'] : '';
                        ?>
                            <div class="slick-slide">
                                <div class="item--inner <?php echo esc_attr($settings['ct_animate']); ?>">
                                    <div class="item--icon"><i class="flaticon-quotes"></i></div>
                                    <div class="item--holder">
                                        <div class="item--description"><?php echo ct_print_html($description); ?></div>
                                        <h3 class="item--title">    
                                            <?php echo esc_attr($title); ?>
                                        </h3>
                                        <div class="item--position"><?php echo esc_attr($position); ?></div>
                                    </div>
                               </div>
                            </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php if($dots == true) : ?>
                <div class="ct-slick-nav <?php if($vertical == true) { echo 'nav-vertical'; } ?>" data-dir="<?php echo esc_attr($carousel_dir); ?>" data-nav="20" data-infinite="false" data-dots="<?php echo esc_attr($dots); ?>">
                    <?php foreach ($settings['testimonial'] as $value_nav): 
                        $image = isset($value_nav['image']) ? $value_nav['image'] : '';
                         if(!empty($image['id'])) { ?>
                            <div class="slick-slide">
                                <div class="item--inner <?php echo esc_attr($settings['ct_animate']); ?>">
                                    <div class="item--holder">
                                        <?php
                                        $img = ct_get_image_by_size( array(
                                            'attach_id'  => $image['id'],
                                            'thumb_size' => '80x80',
                                        ));
                                        $thumbnail = $img['thumbnail']; 
                                        ?>
                                        <div class="item--image">
                                            <?php echo wp_kses_post($thumbnail); ?>
                                        </div>
                                    </div>
                               </div>
                            </div>
                        <?php } ?>
                    <?php endforeach; ?>
                </div>
            <?php endif; ?>
        </div>
    </div>
<?php endif; ?>