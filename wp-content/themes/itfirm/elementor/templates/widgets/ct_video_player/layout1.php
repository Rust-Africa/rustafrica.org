<?php 
$default_settings = [
    'image' => '',
    'image_type' => '',
    'img_size' => '',
    'button_text' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);

if(empty($img_size)) {
    $img_size = 'full';
}

if ( ! empty( $button_link['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $button_link['url'] );

    if ( $button_link['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $button_link['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}
?>
<div class="ct-video-player ct-video-<?php echo esc_attr($settings['btn_video_style']); ?> <?php echo esc_attr($settings['ct_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
    <div class="ct-video-box">
        <?php if( $image_type != 'none' && ! empty( $image['url'] ) ) : 
            $img  = ct_get_image_by_size( array(
                'attach_id'  => $image['id'],
                'thumb_size' => $img_size,
            ) );
            $thumbnail    = $img['thumbnail'];
            ?>
            <div class="ct-video-holder">
                <?php if ($image_type == 'img') { ?>
                    <?php if ( ! empty( $image['url'] ) ) { echo wp_kses_post($thumbnail); } ?>
                <?php } else { ?>
                    <div class="ct-video-image-bg bg-image" style="background-image: url(<?php echo esc_url($image['url']); ?>);"></div>
                <?php } ?>
            </div>
        <?php endif; ?>
        <?php if(!empty($settings['video_link'])) : ?>
            <a class="ct-video-button <?php if ( ! empty( $image['url'] ) ) { echo 'img-active'; } ?> <?php echo esc_attr($settings['btn_video_style']); ?>" href="<?php echo esc_url($settings['video_link']); ?>">
                <?php if($settings['btn_video_style'] == 'style3') { ?>
                    <i class="flaticon2-play-button"></i>
                <?php } else { ?>
                    <i class="fa fa-play"></i>
                <?php } ?>
                <?php if($settings['btn_video_style'] == 'style2') : ?>
                    <span class="line-video-animation line-video-1"></span>
                    <span class="line-video-animation line-video-2"></span>
                    <span class="line-video-animation line-video-3"></span>
                <?php endif; ?>
                <span class="ct-video-text el-empty"><?php echo esc_attr($button_text); ?></span>
            </a>
        <?php endif; ?>
    </div>
</div>