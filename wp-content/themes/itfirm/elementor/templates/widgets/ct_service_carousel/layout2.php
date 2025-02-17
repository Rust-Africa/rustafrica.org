<?php

$html_id = ct_get_element_id($settings);
$source = $widget->get_setting('source', '');
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$post_ids = $widget->get_setting('post_ids', '');
extract(ct_get_posts_of_grid('service', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));

$widget->add_render_attribute( 'inner', [
    'class' => 'ct-carousel-inner',
] );

$col_xs = $widget->get_setting('col_xs', '');
$col_sm = $widget->get_setting('col_sm', '');
$col_md = $widget->get_setting('col_md', '');
$col_lg = $widget->get_setting('col_lg', '');
$col_xl = $widget->get_setting('col_xl', '');
$slides_to_scroll = $widget->get_setting('slides_to_scroll', '');

$show_title = $widget->get_setting('show_title');
$show_button = $widget->get_setting('show_button');
$button_text = $widget->get_setting('button_text');
$show_excerpt = $widget->get_setting('show_excerpt');
$num_words = $widget->get_setting('num_words');

$arrows = $widget->get_setting('arrows');
$dots = $widget->get_setting('dots');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay');
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
if (is_array($posts)): ?>
    <div id="<?php echo esc_attr($html_id) ?>" class="ct-service-carousel2 ct-slick-slider slick-boxshadow slick-dots-line1 slick-arrows-1">
        <div <?php ct_print_html($widget->get_render_attribute_string( 'inner' )); ?>>
            <div <?php ct_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
            <?php
                foreach ($posts as $post):
                $icon_type = get_post_meta($post->ID, 'icon_type', true);
                $service_icon = get_post_meta($post->ID, 'service_icon', true);
                $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                $service_except = get_post_meta($post->ID, 'service_except', true);
                $service_custom_link = get_post_meta($post->ID, 'service_custom_link', true);
                $service_feature = get_post_meta($post->ID, 'service_feature', true);
                $result_feature = count($service_feature);
                ?>
                <div class="carousel-item slick-slide">
                    <div class="grid-item-inner <?php echo esc_attr($settings['ct_animate']); ?>" data-wow-duration="1.2s"> 
                        <?php if($icon_type == 'icon' && !empty($service_icon)) : ?>
                            <div class="item--icon icon-psb"><i class="<?php echo esc_attr($service_icon); ?>"></i></div>
                        <?php endif; ?>
                        <?php if($icon_type == 'image' && !empty($service_icon_img)) : 
                            $icon_img = ct_get_image_by_size( array(
                                'attach_id'  => $service_icon_img['id'],
                                'thumb_size' => 'full',
                            ));
                            $icon_thumbnail = $icon_img['thumbnail'];
                            ?>
                            <div class="item--icon icon-psb">
                                <?php echo wp_kses_post($icon_thumbnail); ?>
                            </div>
                        <?php endif; ?>
                        <?php if($show_title == 'true'): ?>
                            <h3 class="item--title">
                                <?php echo esc_attr(get_the_title($post->ID)); ?>
                            </h3>
                        <?php endif; ?>
                        <?php if($show_excerpt == 'true' && !empty($service_except)): ?>
                            <div class="item--content">
                                <?php echo wp_trim_words( $service_except, $num_words, $more = null ); ?>
                            </div>
                        <?php endif; ?>
                        <?php if (!empty($service_feature)) : ?>
                            <ul class="item--feature">
                                <?php for($i=0; $i<$result_feature; $i++) { ?>
                                    <li><i class="fa fa-check"></i><?php echo isset($service_feature[$i])?esc_html( $service_feature[$i] ):''; ?></li>
                                <?php } ?>
                            </ul>
                        <?php endif; ?>
                        <?php if($show_button == 'true') : ?>
                            <div class="item-readmore">
                                <a class="btn" href="<?php if(!empty($service_custom_link)) { echo esc_url($service_custom_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php if(!empty($button_text)) { echo esc_attr($button_text); } else { echo esc_html__('More Details', 'itfirm'); } ?><span class="ct-icon-rotate"><i class="flaticon flaticon-next"></i></span></a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            <?php endforeach; ?>
            </div>
        </div>
    </div>
<?php endif; ?>