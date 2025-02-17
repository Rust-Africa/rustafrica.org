<?php

$html_id = ct_get_element_id($settings);
$source = $widget->get_setting('source', '');
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$post_ids = $widget->get_setting('post_ids', '');
extract(ct_get_posts_of_grid('portfolio', [
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

$img_size = $widget->get_setting('img_size', '');
$show_title = $widget->get_setting('show_title', '');
$show_address = $widget->get_setting('show_address', '');
$show_excerpt = $widget->get_setting('show_excerpt', '');
$num_words = $widget->get_setting('num_words', '');
$show_button = $widget->get_setting('show_button', '');
$button_text = $widget->get_setting('button_text', '');

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
?>
<?php if (is_array($posts)): ?>

<div id="<?php echo esc_attr($html_id) ?>" class="ct-portfolio-carousel2 ct-slick-slider slick-dots-line1 slick-arrows-1">
    <div class="ct-inline-css"  data-css="
        <?php if( !empty($settings['color_gr_from']) && !empty($settings['color_gr_to']) ) : ?>
            #<?php echo esc_attr($html_id) ?>.ct-portfolio-carousel2 .item--overlay,
            #<?php echo esc_attr($html_id) ?>.ct-portfolio-carousel2 .item--readmore i,
            #<?php echo esc_attr($html_id) ?>.ct-portfolio-carousel2 .item--title a:hover {
                background-image: -webkit-gradient(linear, left top, left bottom, from(<?php echo esc_attr($settings['color_gr_from']); ?>), to(<?php echo esc_attr($settings['color_gr_to']); ?>));
                background-image: -webkit-linear-gradient(to left, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                background-image: -moz-linear-gradient(to left, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                background-image: -ms-linear-gradient(to left, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                background-image: -o-linear-gradient(to left, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                background-image: linear-gradient(to left, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($settings['color_gr_from']); ?>', endColorStr='<?php echo esc_attr($settings['color_gr_to']); ?>');
            }
        <?php endif; ?>">
    </div>
    <div <?php ct_print_html($widget->get_render_attribute_string( 'inner' )); ?>>
        <div <?php ct_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
        <?php
            $default_size = '545x388'; 
            if(!empty($img_size)) {
                $default_size = $img_size;
            }
            foreach ($posts as $post): 
            $img_id = get_post_thumbnail_id($post->ID);
            $img = ct_get_image_by_size( array(
                'attach_id'  => $img_id,
                'thumb_size' => $default_size,
            ));
            $thumbnail = $img['thumbnail'];
            $portfolio_except = get_post_meta($post->ID, 'portfolio_except', true);
            $portfolio_address = get_post_meta($post->ID, 'portfolio_address', true);
            $portfolio_custom_link = get_post_meta($post->ID, 'portfolio_custom_link', true);
            if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                <div class="carousel-item slick-slide">
                    <div class="grid-item-inner <?php echo esc_attr($settings['ct_animate']); ?>">
                        <div class="item--featured">
                            <?php echo ct_print_html($thumbnail); ?>
                            <div class="item--overlay"></div>
                            <?php if($show_button == 'true') : ?>
                                <a class="item--readmore" href="<?php if(!empty($portfolio_custom_link)) { echo esc_url($portfolio_custom_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><i>+</i></a>
                            <?php endif; ?>
                        </div>
                        <div class="item--holder">
                            <?php if($show_title == 'true'): ?>
                                <h4 class="item--title">
                                    <?php if($show_button == 'true') : ?><a href="<?php if(!empty($portfolio_custom_link)) { echo esc_url($portfolio_custom_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php endif; ?>
                                        <?php echo esc_attr(get_the_title($post->ID)); ?>
                                    <?php if($show_button == 'true') : ?></a><?php endif; ?>
                                </h4>
                            <?php endif; ?>
                            <?php if(!empty($portfolio_address) && $show_address == 'true') : ?>
                                <div class="item--address">
                                    <i class="text-gradient flaticon-maps-and-flags"></i>
                                    <?php echo esc_attr($portfolio_address); ?>
                                </div>
                            <?php endif; ?>
                            <?php if($show_excerpt == 'true' && !empty($portfolio_except)): ?>
                                <div class="item--content">
                                    <?php echo wp_trim_words( $portfolio_except, $num_words, $more = null ); ?>
                                </div>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>
            <?php endif; ?>
        <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>