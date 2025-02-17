<?php
$default_settings = [
    'style' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings); ?>
<div class="ct-nav-carousel <?php echo esc_attr($style); ?>">
    <div class="nav-slick nav-prev"><i class="caseicon-angle-arrow-left pxl-rtl-icon"></i></div>
    <div class="nav-slick nav-next"><i class="caseicon-angle-arrow-right pxl-rtl-icon"></i></div>
</div>