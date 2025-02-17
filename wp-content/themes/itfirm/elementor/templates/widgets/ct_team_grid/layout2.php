<?php

$default_settings = [
    'col_xl' => '4',
    'col_lg' => '4',
    'col_md' => '3',
    'col_sm' => '2',
    'col_xs' => '1',
    'content_list_l2' => '',
    'thumbnail_size' => '',
    'thumbnail_custom_dimension' => '',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$col_xl = 12 / intval($col_xl);
$col_lg = 12 / intval($col_lg);
$col_md = 12 / intval($col_md);
$col_sm = 12 / intval($col_sm);
$col_xs = 12 / intval($col_xs);
$grid_sizer = "col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
$item_class = "grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
if($thumbnail_size != 'custom'){
    $img_size = $thumbnail_size;
}
elseif(!empty($thumbnail_custom_dimension['width']) && !empty($thumbnail_custom_dimension['height'])){
    $img_size = $thumbnail_custom_dimension['width'] . 'x' . $thumbnail_custom_dimension['height'];
}
else {
    $img_size = '260x260';
}
$html_id = ct_get_element_id($settings);
?>
<?php if(isset($content_list_l2) && !empty($content_list_l2) && count($content_list_l2)): ?>
    <div id="<?php echo esc_attr($html_id); ?>" class="ct-grid ct-team ct-team-grid2">
        <div class="ct-inline-css"  data-css="
            <?php if( !empty($settings['color_gr_from']) && !empty($settings['color_gr_to']) ) : ?>
                #<?php echo esc_attr($html_id) ?>.ct-team-grid2 .item--holder-hover::before{
                    background-image: -webkit-linear-gradient(-45deg, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                    background-image: -moz-linear-gradient(-45deg, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                    background-image: -ms-linear-gradient(-45deg, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                    background-image: -o-linear-gradient(-45deg, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                    background-image: linear-gradient(-45deg, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($settings['color_gr_from']); ?>', endColorStr='<?php echo esc_attr($settings['color_gr_to']); ?>');
                }
                #<?php echo esc_attr($html_id) ?>.ct-team-grid2 .item--social a:hover i,
                #<?php echo esc_attr($html_id) ?>.ct-team-grid2 .item--holder .item--details i,
                #<?php echo esc_attr($html_id) ?>.ct-team-grid2 .item--image::before {
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
        <div class="ct-grid-inner ct-grid-masonry row animate-time" data-gutter="7">
            <?php foreach ($content_list_l2 as $key => $value):
    			$title = isset($value['title']) ? $value['title'] : '';
                $position = isset($value['position']) ? $value['position'] : '';
    			$image = isset($value['image']) ? $value['image'] : '';
                $image_bg = isset($value['image_bg']) ? $value['image_bg'] : '';
                $description = isset($value['description']) ? $value['description'] : '';
                $btn_text = isset($value['btn_text']) ? $value['btn_text'] : '';
                $link = isset($value['link']) ? $value['link'] : '';
    			$img = ct_get_image_by_size( array(
                    'attach_id'  => $image['id'],
                    'thumb_size' => $img_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
                $social = isset($value['social']) ? $value['social'] : '';
                $link_key = $widget->get_repeater_setting_key( 'title', 'value', $key );
                if ( ! empty( $link['url'] ) ) {
                    $widget->add_render_attribute( $link_key, 'href', $link['url'] );

                    if ( $link['is_external'] ) {
                        $widget->add_render_attribute( $link_key, 'target', '_blank' );
                    }

                    if ( $link['nofollow'] ) {
                        $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                    }
                }
                $link_attributes = $widget->get_render_attribute_string( $link_key );
            	?>
                <div class="<?php echo esc_attr($item_class); ?>">
                    <div class="item--inner <?php echo esc_attr($ct_animate); ?>" data-wow-duration="1.2s">
                        <div class="item--holder">
                            <?php if(!empty($image)) { ?>
                                <div class="item--image">
                                    <?php if ( ! empty( $link['url'] ) ) { ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?><?php echo wp_kses_post($thumbnail); ?><?php if ( ! empty( $link['url'] ) ) { ?></a><?php } ?>
                                </div>
                            <?php } ?>
                            <h4 class="item--title el-empty">    
                                <?php echo ct_print_html($title); ?>
                            </h4>
                            <div class="item--position el-empty"><?php echo ct_print_html($position); ?></div>
                            <?php if ( ! empty( $btn_text ) ) { ?>
                                <a class="item--details" <?php echo implode( ' ', [ $link_attributes ] ); ?>><i>+</i></a>
                            <?php } ?>
                        </div>

                        <div class="item--holder-hover bg-image" <?php if(!empty($image_bg['url'])) : ?>style="background-image: url(<?php echo esc_url($image_bg['url']); ?>);"<?php endif; ?>>
                            <div class="item--holder-inner">
                                <div class="item--desc el-empty">
                                    <?php echo ct_print_html($description); ?>
                                </div>
                                <h4 class="item--title el-empty">    
                                    <?php if ( ! empty( $link['url'] ) ) { ?><a <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php } ?><?php echo ct_print_html($title); ?><?php if ( ! empty( $link['url'] ) ) { ?></a><?php } ?>
                                </h4>
                                <div class="item--position el-empty"><?php echo ct_print_html($position); ?></div>
                                <?php if(!empty($social)):
                                    $team_social = json_decode($social, true); ?>
                                    <div class="item--social">
                                        <?php foreach ($team_social as $value): ?>
                                            <a href="<?php echo esc_url($value['url']); ?>" target="_blank"><i class="<?php echo esc_attr($value['icon']); ?>"></i></a>
                                        <?php endforeach; ?>
                                    </div>
                                <?php endif; ?>
                                <?php if ( ! empty( $btn_text ) ) { ?>
                                    <a class="item--details btn btn-primary" <?php echo implode( ' ', [ $link_attributes ] ); ?>><?php echo esc_attr($btn_text); ?><i class="ct-icon-plus size-sm"></i></a>
                                <?php } ?>
                            </div>
                        </div>
                   </div>
                </div>
            <?php endforeach; ?>
            <div class="grid-sizer <?php echo esc_attr($grid_sizer); ?>"></div>
        </div>
    </div>
<?php endif; ?>
