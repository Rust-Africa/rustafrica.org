<?php
$html_id = ct_get_element_id($settings);
$tax = ['portfolio-category'];
$source = $widget->get_setting('source', '');
$orderby = $widget->get_setting('orderby', 'date');
$order = $widget->get_setting('order', 'desc');
$limit = $widget->get_setting('limit', 8);
$post_ids = $widget->get_setting('post_ids', '');
extract(ct_get_posts_of_grid('portfolio', [
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
]));
$filter_default_title = $widget->get_setting('filter_default_title', 'All');
$col_xl = 12 / intval($widget->get_setting('col_xl', 4));
$col_lg = 12 / intval($widget->get_setting('col_lg', 4));
$col_md = 12 / intval($widget->get_setting('col_md', 3));
$col_sm = 12 / intval($widget->get_setting('col_sm', 2));
$col_xs = 12 / intval($widget->get_setting('col_xs', 1));
$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$gap = intval($widget->get_setting('gap', 30));
$gap_item = intval($gap / 2);
$grid_class = '';
$layout_type = $widget->get_setting('layout_type', 'masonry');
if ($layout_type == 'masonry') {
    $grid_class = 'ct-grid-inner ct-grid-masonry row';
} else {
    $grid_class = 'ct-grid-inner row';
}
$filter = $widget->get_setting('filter', 'false');
$img_size = $widget->get_setting('img_size', '');
$pagination_type = $widget->get_setting('pagination_type', 'pagination');
$show_title = $widget->get_setting('show_title');
$show_button = $widget->get_setting('show_button');
$show_excerpt = $widget->get_setting('show_excerpt');
$num_words = $widget->get_setting('num_words');
$ct_animate = $widget->get_setting('ct_animate');
$item_space = $widget->get_setting('item_space');
$grid_masonry = $widget->get_setting('grid_masonry');
$load_more = array(
    'posttype' => 'portfolio',
    'startPage' => $paged,
    'maxPages'  => $max,
    'total'     => $total,
    'perpage'   => $limit,
    'nextLink'  => $next_link,
    'source' => $source,
    'orderby' => $orderby,
    'order' => $order,
    'limit' => $limit,
    'post_ids' => $post_ids,
    'col_xl'    => $col_xl,
    'col_lg'    => $col_lg,
    'col_md'    => $col_md,
    'col_sm'    => $col_sm,
    'col_xs'    => $col_xs,
    'img_size'  => $img_size,
    'pagination_type' => $pagination_type,
    'show_title' => $show_title,
    'show_button' => $show_button,
    'show_excerpt' => $show_excerpt,
    'num_words' => $num_words,
    'grid_masonry' => $grid_masonry,
    'ct_animate' => $ct_animate,
    'template_type' => 'portfolio_layout2',
);
?>

<div id="<?php echo esc_attr($html_id) ?>" class="ct-grid ct-portfolio ct-portfolio-grid2 ct-grid-filter-style2 item--<?php echo esc_attr($item_space); ?>" data-layout="<?php echo esc_attr($layout_type); ?>" data-start-page="<?php echo esc_attr($paged); ?>" data-max-pages="<?php echo esc_attr($max); ?>" data-total="<?php echo esc_attr($total); ?>" data-perpage="<?php echo esc_attr($limit); ?>" data-next-link="<?php echo esc_attr($next_link); ?>">
    <div class="ct-inline-css"  data-css="
        <?php if( !empty($settings['color_gr_from']) && !empty($settings['color_gr_to']) ) : ?>
            #<?php echo esc_attr($html_id) ?>.ct-grid-filter-style2 .grid-filter-wrap span::before,
            #<?php echo esc_attr($html_id) ?>.ct-portfolio-grid2 .item--readmore a i {
                background-image: -webkit-gradient(linear, left top, left bottom, from(<?php echo esc_attr($settings['color_gr_from']); ?>), to(<?php echo esc_attr($settings['color_gr_to']); ?>));
                background-image: -webkit-linear-gradient(to left, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                background-image: -moz-linear-gradient(to left, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                background-image: -ms-linear-gradient(to left, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                background-image: -o-linear-gradient(to left, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                background-image: linear-gradient(to left, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($settings['color_gr_from']); ?>', endColorStr='<?php echo esc_attr($settings['color_gr_to']); ?>');
            }
            #<?php echo esc_attr($html_id) ?>.ct-portfolio-grid2 .item--holder::before {
                background-image: -webkit-gradient(linear, left top, left bottom, from(<?php echo esc_attr($settings['color_gr_from']); ?> 50%), to(rgba(18, 39, 184, 0)));
                background-image: -webkit-linear-gradient(to bottom, <?php echo esc_attr($settings['color_gr_from']); ?> 50%, rgba(18, 39, 184, 0));
                background-image: -moz-linear-gradient(to bottom, <?php echo esc_attr($settings['color_gr_from']); ?> 50%, rgba(18, 39, 184, 0));
                background-image: -ms-linear-gradient(to bottom, <?php echo esc_attr($settings['color_gr_from']); ?> 50%, rgba(18, 39, 184, 0));
                background-image: -o-linear-gradient(to bottom, <?php echo esc_attr($settings['color_gr_from']); ?> 50%, rgba(18, 39, 184, 0));
                background-image: linear-gradient(to bottom, <?php echo esc_attr($settings['color_gr_from']); ?> 50%, rgba(18, 39, 184, 0));
                filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($settings['color_gr_from']); ?> 50%', endColorStr='rgba(18, 39, 184, 0)');
            }
        <?php endif; ?>">
    </div>

    <?php if ($filter == "true" and $layout_type == 'masonry'): ?>
        <div class="grid-filter-wrap">
            <span class="filter-item active" data-filter="*"><?php echo esc_html($filter_default_title); ?></span>
            <?php foreach ($categories as $category): ?>
                <?php $category_arr = explode('|', $category); ?>
                <?php $tax[] = $category_arr[1]; ?>
                <?php $term = get_term_by('slug',$category_arr[0], $category_arr[1]); ?>

                <span class="filter-item" data-filter="<?php echo esc_attr('.' . $term->slug); ?>">
                    <?php echo esc_html($term->name); ?>
                </span>
            <?php endforeach; ?>
        </div>
    <?php endif; ?>

    <div class="<?php echo esc_attr($grid_class); ?> animate-time" data-gutter="<?php echo esc_attr($gap_item); ?>">
        <?php
        $load_more['tax'] = $tax;
        itfirm_get_post_grid($posts, $load_more);
        ?>
        <?php if ($layout_type == 'masonry') : ?>
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        <?php endif; ?>
    </div>
    <?php if ($layout_type == 'masonry' && $pagination_type == 'pagination') { ?>
        <div class="ct-grid-pagination" data-loadmore="<?php echo esc_attr(json_encode($load_more)); ?>" data-query="<?php echo esc_attr(json_encode($args)); ?>">
            <?php itfirm_posts_pagination($query, true); ?>
        </div>
    <?php } ?>
    <?php if (!empty($next_link) && $layout_type == 'masonry' && $pagination_type == 'loadmore') { ?>
        <div class="ct-load-more text-center <?php echo esc_attr($ct_animate); ?>" data-wow-duration="1.2s" data-loadmore="<?php echo esc_attr(json_encode($load_more)); ?>">
            <span class="btn btn-primary btn-dark1 btn-grid-loadmore">
                <?php echo esc_html__('Load More', 'itfirm') ?>
                <i class="ct-icon-plus size-sm"></i>
            </span>
        </div>
    <?php } ?>
</div>