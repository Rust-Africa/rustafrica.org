<?php 
$default_settings = [
    'image' => '',
    'color' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
if(!empty($image['id'])) : 
    $img  = ct_get_image_by_size( array(
        'attach_id'  => $image['id'],
        'thumb_size' => 'full',
        'class' => 'no-lazyload img-main'
    ) );
    $thumbnail_url = $img['url']; ?>
    <div class="ct-section-background el-move-parents bg-image" style="background-image: url(<?php echo esc_url($thumbnail_url); ?>);background-color: <?php echo esc_attr($color); ?>;"></div>
<?php endif; ?>