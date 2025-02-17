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
] );
?>
<?php if (is_array($posts)): ?>

<div id="<?php echo esc_attr($html_id) ?>" class="ct-portfolio-carousel5 ct-slick-slider" <?php if($settings['drap'] !== 'false') : ?>data-cursor-label="<?php echo esc_html('DRAG', 'itfirm'); ?>"<?php endif; ?>>
    <div <?php ct_print_html($widget->get_render_attribute_string( 'inner' )); ?>>
        <div <?php ct_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>
        <?php
            foreach ($posts as $post): 
                $portfolio_except = get_post_meta($post->ID, 'portfolio_except', true);
                $portfolio_custom_link = get_post_meta($post->ID, 'portfolio_custom_link', true); ?>
                <div class="carousel-item slick-slide">
                    <div class="grid-item-inner <?php echo esc_attr($settings['ct_animate']); ?>">
                        <div class="item--holder">
                            <?php if($show_title == 'true'): ?>
                                <h5 class="item--title">
                                    <?php if($show_button == 'true') : ?><a href="<?php if(!empty($portfolio_custom_link)) { echo esc_url($portfolio_custom_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php endif; ?>
                                        <?php echo esc_attr(get_the_title($post->ID)); ?>
                                    <?php if($show_button == 'true') : ?></a><?php endif; ?>
                                </h5>
                            <?php endif; ?>
                            <div class="item--backdrop">
                                <?php if($show_excerpt == 'true' && !empty($portfolio_except)): ?>
                                    <div class="item--content">
                                        <?php echo wp_trim_words( $portfolio_except, $num_words, $more = null ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if($show_button == 'true') : ?>
                                    <div class="item--readmore">
                                        <a class="btn-round-effect" href="<?php if(!empty($portfolio_custom_link)) { echo esc_url($portfolio_custom_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">
                                            <?php if(!empty($button_text)) { echo esc_attr($button_text); } else { echo esc_html__('Read More', 'itfirm'); } ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>