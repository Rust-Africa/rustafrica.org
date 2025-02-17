<?php
$default_settings = [
    'list_number' => '',
    'list_content' => '',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = ct_get_element_id($settings);
?>
<?php if(!empty($list_content)): ?>
    <div id="<?php echo esc_attr($html_id) ?>" class="ct-list-single">
        <div class="ct-inline-css"  data-css="
            <?php if( !empty($settings['color_gr_from']) && !empty($settings['color_gr_to']) ) : ?>
                #<?php echo esc_attr($html_id) ?>.ct-list-single .ct-list-number {
                    background-image: -webkit-gradient(linear, left top, left bottom, from(<?php echo esc_attr($settings['color_gr_from']); ?>), to(<?php echo esc_attr($settings['color_gr_to']); ?>));
                    background-image: -webkit-linear-gradient(to right, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                    background-image: -moz-linear-gradient(to right, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                    background-image: -ms-linear-gradient(to right, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                    background-image: -o-linear-gradient(to right, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                    background-image: linear-gradient(to right, <?php echo esc_attr($settings['color_gr_from']); ?>, <?php echo esc_attr($settings['color_gr_to']); ?>);
                    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($settings['color_gr_from']); ?>', endColorStr='<?php echo esc_attr($settings['color_gr_to']); ?>');
                    box-shadow: 0 10px 13px <?php echo esc_attr(itfirm_hex_to_rgba($settings['color_gr_to'], 0.21)); ?>;
                    -webkit-box-shadow: 0 10px 13px <?php echo esc_attr(itfirm_hex_to_rgba($settings['color_gr_to'], 0.21)); ?>;
                }
            <?php endif; ?>">
        </div>
        <div class="ct-list-number el-empty"><?php echo esc_attr($list_number); ?></div>
        <div class="ct-list-content"><?php echo wp_kses_post($list_content); ?></div>
    </div>
<?php endif; ?>
