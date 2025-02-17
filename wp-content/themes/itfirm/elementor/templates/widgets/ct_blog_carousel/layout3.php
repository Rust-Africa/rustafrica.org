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

$show_comment = $widget->get_setting('show_comment');
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

$images_size = '600x405';
if(!empty($img_size)) {
    $images_size = $img_size;
}
if (is_array($posts)): ?>
<div id="<?php echo esc_attr($html_id) ?>" class="ct-blog-carousel ct-blog-carousel-layout3 ct-slick-slider slick-dots-style2">
    <div class="ct-inline-css"  data-css="
        <?php if( !empty($settings['color_gr_from']) && !empty($settings['color_gr_to']) ) : ?>
            #<?php echo esc_attr($html_id) ?>.ct-blog-carousel-layout3 .item--readmore .btn:before {
                background-image: -webkit-gradient(linear, left top, left bottom, from(<?php echo esc_attr($settings['color_gr_from']); ?>), to(<?php echo esc_attr($settings['color_gr_to']); ?>));
                background-image: -webkit-linear-gradient(to left, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                background-image: -moz-linear-gradient(to left, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                background-image: -ms-linear-gradient(to left, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                background-image: -o-linear-gradient(to left, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                background-image: linear-gradient(to left, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($settings['color_gr_from']); ?>', endColorStr='<?php echo esc_attr($settings['color_gr_to']); ?>');
            }
            #<?php echo esc_attr($html_id) ?>.ct-blog-carousel-layout3 .item-date,
            #<?php echo esc_attr($html_id) ?>.ct-blog-carousel-layout3 .item--meta .item-icon-box i {
                background-image: -webkit-linear-gradient(125deg, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                background-image: -moz-linear-gradient(125deg, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                background-image: -ms-linear-gradient(125deg, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                background-image: -o-linear-gradient(125deg, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                background-image: linear-gradient(125deg, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($settings['color_gr_from']); ?>', endColorStr='<?php echo esc_attr($settings['color_gr_to']); ?>');
            }
            #<?php echo esc_attr($html_id) ?>.ct-blog-carousel-layout3 .item--meta .item-icon-box {
                background-color: <?php echo esc_attr(itfirm_hex_to_rgba($settings['color_gr_from'], 0.15)); ?>;
            }
        <?php endif; ?>">
    </div>
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
                        <?php if($show_date == 'true' ) : ?>
                            <div class="item-date">
                                <div class="item-date-inner">
                                    <div class="item-date--day"><?php echo get_the_date('d', $post->ID); ?></div>
                                    <div class="item-date--month"><?php echo get_the_date('M', $post->ID); ?></div>
                                </div>
                            </div>
                        <?php endif; ?>
                    </div>
                    <div class="item--holder">
                        <div class="item--meta">
                            <?php if($show_author == 'true' ) : ?>
                                <div class="item-author">
                                    <a href="<?php echo esc_url(get_author_posts_url($post->post_author, $author->user_nicename)); ?>">
                                        <span class="item-icon-box"><i class="caseicon-user"></i></span>
                                        <?php echo esc_html($author->display_name); ?>
                                    </a>
                                </div>
                            <?php endif; ?>
                            <?php if($show_comment == 'true' ) : ?>
                                <div class="item-comment">
                                    <span class="item-icon-box"><i class="caseicon-comment"></i></span>
                                    <?php echo esc_attr($comment_count ); ?>
                                    <?php if($comment_count > 1) { echo esc_html__('Comments', 'itfirm'); } ?>
                                    <?php if($comment_count == 1 || $comment_count == 0) { echo esc_html__('Comment', 'itfirm'); } ?>
                                </div>
                            <?php endif; ?>
                        </div>
                        <h4 class="item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h4>
                        <?php if($show_excerpt == 'true'): ?>
                            <div class="item--content">
                                <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                            </div>
                        <?php endif; ?>
                        <?php if($show_button == 'true') : ?>
                            <div class="item--readmore">
                                <a class="btn btn-dark1" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                    <span><?php if(!empty($button_text)) {
                                        echo esc_attr($button_text);
                                    } else {
                                        echo esc_html__('Read More', 'itfirm');
                                    } ?></span>
                                    <i class="ct-icon-plus size-sm space-left"></i>
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