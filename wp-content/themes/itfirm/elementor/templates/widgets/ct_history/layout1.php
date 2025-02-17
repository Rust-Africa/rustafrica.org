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
] );
$html_id = ct_get_element_id($settings);
?>
<?php if(isset($settings['history']) && !empty($settings['history']) && count($settings['history'])): ?>
    <div class="ct-history ct-history-carousel1 ct-slick-slider">
        <div <?php ct_print_html($widget->get_render_attribute_string( 'inner' )); ?>>
            <div <?php ct_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
                <?php foreach ($settings['history'] as $key => $value): 
                    $title = isset($value['title']) ? $value['title'] : '';
                    $year = isset($value['year']) ? $value['year'] : '';
                    $year_box_color = isset($value['year_box_color']) ? $value['year_box_color'] : '';
                    $description = isset($value['description']) ? $value['description'] : '';
                    $image = isset($value['image']) ? $value['image'] : '';
                    $thumbnail_url = wp_get_attachment_image_src($image['id'], 'itfirm-history', false);?>
                        <div class="slick-slide">
                            <div id="<?php echo esc_attr($html_id.$key); ?>" class="item--inner <?php echo esc_attr($settings['ct_animate']); ?>">
                                <div class="ct-inline-css"  data-css="
                                    <?php if( !empty($year_box_color) ) : ?>
                                        .ct-history #<?php echo esc_attr($html_id.$key); ?> .item--year {
                                            background-color: <?php echo esc_attr($year_box_color); ?>;
                                        }
                                        .ct-history #<?php echo esc_attr($html_id.$key); ?> .item--year:before {
                                            border-color: transparent transparent transparent <?php echo esc_attr($year_box_color); ?>;
                                        }
                                        .ct-history #<?php echo esc_attr($html_id.$key); ?> .item--year span:before {
                                            border-color: <?php echo esc_attr($year_box_color); ?> <?php echo esc_attr($year_box_color); ?> transparent transparent;
                                        }
                                        .ct-history #<?php echo esc_attr($html_id.$key); ?> .item--year span:after {
                                            border-color: transparent <?php echo esc_attr($year_box_color); ?> <?php echo esc_attr($year_box_color); ?> transparent;
                                        }
                                    <?php endif; ?>">
                                </div>
                                <?php if(!empty($image)) { ?>
                                    <div class="item--image">
                                        <div class="item--mask bg-image" style="background-image: url(<?php echo esc_url($thumbnail_url[0]); ?>);"></div>
                                    </div>
                                <?php } ?>
                                <div class="item--holder">
                                    <div class="item--year">
                                        <span><?php echo esc_html($year); ?></span>
                                    </div>
                                    <h3 class="item--title">    
                                        <?php echo ct_print_html($title); ?>
                                    </h3>
                                    <div class="item--description"><?php echo esc_html($description); ?></div>
                                </div>
                            </div>
                        </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>