<?php 
$default_settings = [
    'btn_text' => '',
    'video_link' => '',
    'video_image' => '',
    'video_shape' => '',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = ct_get_element_id($settings);
if(!empty($video_image['url'])) : 
    $img  = ct_get_image_by_size( array(
        'attach_id'  => $video_image['id'],
        'thumb_size' => 'full',
    ) );
    $thumbnail    = $img['thumbnail'];
    ?>
    <div id="<?php echo esc_attr($html_id) ?>" class="ct-button-video2 <?php echo esc_attr($ct_animate); ?>" data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
        <div class="ct-inline-css"  data-css="
            <?php if( !empty($settings['btn_color_gr_from']) && !empty($settings['btn_color_gr_to']) ) : ?>
                #<?php echo esc_attr($html_id) ?>.ct-button-video2 .el-btn-video {
                    background-image: -webkit-gradient(linear, left top, right top, from(<?php echo esc_attr($settings['btn_color_gr_from']); ?>), to(<?php echo esc_attr($settings['btn_color_gr_to']); ?>));
                    background-image: -webkit-linear-gradient(to left, <?php echo esc_attr($settings['btn_color_gr_from']); ?>, <?php echo esc_attr($settings['btn_color_gr_to']); ?>);
                    background-image: -moz-linear-gradient(to left, <?php echo esc_attr($settings['btn_color_gr_from']); ?>, <?php echo esc_attr($settings['btn_color_gr_to']); ?>);
                    background-image: -ms-linear-gradient(to left, <?php echo esc_attr($settings['btn_color_gr_from']); ?>, <?php echo esc_attr($settings['btn_color_gr_to']); ?>);
                    background-image: -o-linear-gradient(to left, <?php echo esc_attr($settings['btn_color_gr_from']); ?>, <?php echo esc_attr($settings['btn_color_gr_to']); ?>);
                    background-image: linear-gradient(to left, <?php echo esc_attr($settings['btn_color_gr_from']); ?>, <?php echo esc_attr($settings['btn_color_gr_to']); ?>);
                    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($settings['btn_color_gr_from']); ?>', endColorStr='<?php echo esc_attr($settings['btn_color_gr_to']); ?>', gradientType='1');
                }
            <?php endif; ?>">
        </div>
        <div class="ct-video-image">
            <?php echo wp_kses_post($thumbnail); ?>
        </div>
        <?php if(!empty($video_link)) : ?>
            <a class="el-btn-video" href="<?php echo esc_url($video_link); ?>">
                <i class="fa fa-play"></i>
            </a>
        <?php endif; ?>
        <?php if(!empty($video_shape['url'])) : 
            $img_shape  = ct_get_image_by_size( array(
                'attach_id'  => $video_shape['id'],
                'thumb_size' => 'full',
            ) );
            $thumbnail_shape    = $img_shape['thumbnail'];
            ?>
            <div class="ct-video-shape">
                <?php echo wp_kses_post($thumbnail_shape); ?>
            </div>
        <?php endif; ?>
    </div>
<?php endif; ?>