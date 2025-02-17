<?php
$widget->add_render_attribute( 'counter', [
    'class' => 'ct-counter-number-value',
    'data-duration' => $settings['duration'],
    'data-to-value' => $settings['ending_number'],
] );

if ( ! empty( $settings['thousand_separator'] ) ) {
    $delimiter = empty( $settings['thousand_separator_char'] ) ? '' : $settings['thousand_separator_char'];
    $widget->add_render_attribute( 'counter', 'data-delimiter', $delimiter );
}

$widget->add_render_attribute( 'counter_icon', 'class' );
$has_icon = ! empty( $settings['counter_icon'] );
if ( $has_icon ) {
    $widget->add_render_attribute( 'i', 'class', $settings['counter_icon'] );
    $widget->add_render_attribute( 'i', 'aria-hidden', 'true' );
}

$is_new = \Elementor\Icons_Manager::is_migration_allowed();
$html_id = ct_get_element_id($settings);
?>
<div id="<?php echo esc_attr($html_id) ?>" class="ct-counter ct-counter-layout2 <?php echo esc_attr($settings['style_l2'].' '.$settings['ct_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
    <div class="ct-inline-css"  data-css="
        <?php if( !empty($settings['icon_color']) && !empty($settings['icon_color_gr']) ) : ?>
            #<?php echo esc_attr($html_id) ?>.ct-counter-layout2 .ct-counter-icon i,
            #<?php echo esc_attr($html_id) ?>.ct-counter-layout2 .ct-counter-hexagon.hexagon-broder:before {
                background-image: -webkit-gradient(linear, left top, right top, from(<?php echo esc_attr($settings['icon_color']); ?>), to(<?php echo esc_attr($settings['icon_color_gr']); ?>));
                background-image: -webkit-linear-gradient(to left, <?php echo esc_attr($settings['icon_color']); ?>, <?php echo esc_attr($settings['icon_color_gr']); ?>);
                background-image: -moz-linear-gradient(to left, <?php echo esc_attr($settings['icon_color']); ?>, <?php echo esc_attr($settings['icon_color_gr']); ?>);
                background-image: -ms-linear-gradient(to left, <?php echo esc_attr($settings['icon_color']); ?>, <?php echo esc_attr($settings['icon_color_gr']); ?>);
                background-image: -o-linear-gradient(to left, <?php echo esc_attr($settings['icon_color']); ?>, <?php echo esc_attr($settings['icon_color_gr']); ?>);
                background-image: linear-gradient(to left, <?php echo esc_attr($settings['icon_color']); ?>, <?php echo esc_attr($settings['icon_color_gr']); ?>);
                filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($settings['icon_color']); ?>', endColorStr='<?php echo esc_attr($settings['icon_color_gr']); ?>', gradientType='1');
            }
        <?php endif; ?>">
    </div>
    <div class="ct-counter-inner">
        <?php if($settings['ct_icon_type'] == 'icon' && !empty($settings['counter_icon'])): ?>
            <div class="ct-counter-icon">
                <?php if(!empty($settings['counter_icon'])): ?>
                    <?php
                    if($is_new):
                        \Elementor\Icons_Manager::render_icon( $settings['counter_icon'], [ 'aria-hidden' => 'true' ] );
                    else:
                        $widget->add_render_attribute( 'i', 'class', $settings['counter_icon'] );
                        $widget->add_render_attribute( 'i', 'aria-hidden', 'true' );
                    ?>
                        <i <?php ct_print_html($widget->get_render_attribute_string( 'i' )); ?>></i>
                    <?php endif; ?>
                <?php endif; ?>
                <div class="ct-counter-hexagon hexagon-broder"></div>
                <div class="ct-counter-hexagon hexagon-main"></div>
                <div class="ct-counter-hexagon hexagon-bg"></div>
            </div>
        <?php elseif($settings['ct_icon_type'] == 'image' && !empty($settings['icon_image']['id'])): ?>
            <div class="ct-counter-icon">
                <?php
                    if(!empty($settings['icon_image'])){
                        echo wp_get_attachment_image($settings['icon_image']['id']);
                    }
                ?>
            </div>
        <?php endif; ?>
        <div class="ct-counter-meta">
            <div class="ct-counter-number">
                <?php if(!empty($settings['prefix'])) : ?>
                    <span class="ct-counter-number-prefix"><?php echo ct_print_html($settings['prefix']); ?></span>
                <?php endif; ?>
                <span <?php ct_print_html($widget->get_render_attribute_string( 'counter' )); ?>><?php echo esc_html($settings['starting_number']); ?></span>
                <?php if(!empty($settings['suffix'])) : ?>
                    <span class="ct-counter-number-suffix"><?php echo ct_print_html($settings['suffix']); ?></span>
                <?php endif; ?>
            </div>
            <?php if ( $settings['title'] ) : ?>
                <div class="ct-counter-title"><?php echo ct_print_html($settings['title']); ?></div>
            <?php endif; ?>
        </div>
    </div>
</div>