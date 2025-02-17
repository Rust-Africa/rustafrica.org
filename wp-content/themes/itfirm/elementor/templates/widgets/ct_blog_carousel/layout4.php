<?php

$html_id = ct_get_element_id($settings);
$source = $widget->get_setting('source', '');
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 6);
$post_ids = $widget->get_setting('post_ids', '');
extract(ct_get_posts_of_grid('post', [
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


$arrows = $widget->get_setting('arrows');
$dots = $widget->get_setting('dots');
$pause_on_hover = $widget->get_setting('pause_on_hover');
$autoplay = $widget->get_setting('autoplay');
$autoplay_speed = $widget->get_setting('autoplay_speed', '5000');
$infinite = $widget->get_setting('infinite');
$speed = $widget->get_setting('speed', '500');

$show_author = $widget->get_setting('show_author');
$show_date = $widget->get_setting('show_date');
$show_button = $widget->get_setting('show_button');
$button_text = $widget->get_setting('button_text');
$show_excerpt = $widget->get_setting('show_excerpt');
$num_words = $widget->get_setting('num_words');

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
    'data-dir' => $carousel_dir,
    'data-colxs' => $col_xs,
    'data-colsm' => $col_sm,
    'data-colmd' => $col_md,
    'data-collg' => $col_lg,
    'data-colxl' => $col_xl,
    'data-slidesToScroll' => $slides_to_scroll,
] );

$title_tag = $widget->get_setting('title_tag', 'h3');

$images_size = '600x413';
if(!empty($img_size)) {
    $images_size = $img_size;
}
if (is_array($posts)): ?>
<div id="<?php echo esc_attr($html_id) ?>" class="ct-blog-carousel ct-blog-carousel-layout4 ct-slick-slider slick-dots-style5">
    <div <?php ct_print_html($widget->get_render_attribute_string( 'inner' )); ?>>
        <div <?php ct_print_html($widget->get_render_attribute_string( 'carousel' )); ?>>

        <?php
            foreach ($posts as $post):
            $author = get_user_by('id', $post->post_author); 
            $comment_count = get_comments_number($post->ID); 
            if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):  
            $img_id       = get_post_thumbnail_id( $post->ID );
            $img          = ct_get_image_by_size( array(
                'attach_id'  => $img_id,
                'thumb_size' => $images_size,
            ) );
            $thumbnail    = $img['thumbnail'];
            ?>
            <div class="carousel-item slick-slide">
                <div class="grid-item-inner <?php echo esc_attr($settings['ct_animate']); ?>">
                    <div class="item--featured">
                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                    </div>
                    <div class="item--holder item--main">
                        <?php if($show_date == 'true' || $show_author == 'true' ) : ?>
                            <ul class="item--meta">
                                <?php if($show_date == 'true'): ?>
                                    <li class="item-date"><i class="caseicon-calendar"></i><?php $date_formart = get_option('date_format'); echo get_the_date($date_formart, $post->ID); ?></li>
                                <?php endif; ?>
                                <?php if($show_author == 'true'): ?>
                                    <li class="item-author">
                                        <i class="caseicon-user"></i><a href="<?php echo esc_url(get_author_posts_url($post->post_author, $author->user_nicename)); ?>"><?php echo esc_html($author->display_name); ?></a>
                                    </li>
                                <?php endif; ?>
                            </ul>
                        <?php endif; ?>
                        <h3 class="item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h3>
                    </div>
                    <div class="item--holder item--hover">
                        <h3 class="item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h3>
                        <?php if($show_excerpt == 'true'): ?>
                            <div class="item--content">
                                <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                            </div>
                        <?php endif; ?>
                        <?php if($show_button == 'true') : ?>
                            <div class="item--readmore">
                                <a class="btn btn-primary" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                    <span><?php if(!empty($button_text)) {
                                        echo esc_attr($button_text);
                                    } else {
                                        echo esc_html__('Read more', 'itfirm');
                                    } ?></span>
                                    <i class="caseicon-angle-arrow-right"></i>
                                </a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif;
        endforeach; ?>
        </div>
    </div>
</div>
<?php endif; ?>