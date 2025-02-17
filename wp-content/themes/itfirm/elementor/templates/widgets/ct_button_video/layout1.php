<?php 
$default_settings = [
    'btn_text' => '',
    'video_link' => '',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
?>
<div class="ct-button-video1 <?php echo esc_attr($ct_animate); ?>" data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
    <div class="ct-video-box">
        <?php if(!empty($btn_text) && !empty($video_link)) : ?>
            <a class="el-btn-video btn" href="<?php echo esc_url($video_link); ?>">
                <?php echo esc_attr($btn_text); ?>
                <span>
                    <i class="fa fa-play"></i>
                </span>
            </a>
        <?php endif; ?>
    </div>
</div>