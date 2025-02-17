<?php
$default_settings = [
    'contact_info' => '',
    'icon_color' => '',
    'icon_color_gr' => '',
    'style' => '',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$has_icon = ! empty( $settings['ct_icon'] );
if ( $has_icon ) {
    $widget->add_render_attribute( 'i', 'class', $settings['ct_icon'] );
    $widget->add_render_attribute( 'i', 'aria-hidden', 'true' );
}
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
$html_id = ct_get_element_id($settings);
?>
<?php if(isset($settings['contact_info']) && !empty($settings['contact_info']) && count($settings['contact_info'])): ?>
    <div id="<?php echo esc_attr($html_id); ?>" class="ct-contact-info ct-contact-info1 <?php echo esc_attr($style.' '.$ct_animate); ?>" data-wow-duration="1.2s">
        <div class="ct-inline-css"  data-css="
            <?php if( !empty($icon_color) && !empty($icon_color_gr) ) : ?>
                #<?php echo esc_attr($html_id) ?>.ct-contact-info .ct-contact-icon i {
                    background-image: -webkit-gradient(linear, left top, left bottom, from(<?php echo esc_attr($icon_color); ?>), to(<?php echo esc_attr($icon_color_gr); ?>));
                    background-image: -webkit-linear-gradient(to left, <?php echo esc_attr($icon_color); ?>, <?php echo esc_attr($icon_color_gr); ?>);
                    background-image: -moz-linear-gradient(to left, <?php echo esc_attr($icon_color); ?>, <?php echo esc_attr($icon_color_gr); ?>);
                    background-image: -ms-linear-gradient(to left, <?php echo esc_attr($icon_color); ?>, <?php echo esc_attr($icon_color_gr); ?>);
                    background-image: -o-linear-gradient(to left, <?php echo esc_attr($icon_color); ?>, <?php echo esc_attr($icon_color_gr); ?>);
                    background-image: linear-gradient(to left, <?php echo esc_attr($icon_color); ?>, <?php echo esc_attr($icon_color_gr); ?>);
                    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($icon_color); ?>', endColorStr='<?php echo esc_attr($icon_color_gr); ?>');
                    background-color: transparent;
                    background-clip: text;
                    -o-background-clip: text;
                    -ms-background-clip: text;
                    -moz-background-clip: text;
                    -webkit-background-clip: text;
                    text-fill-color: transparent;
                    -o-text-fill-color: transparent;
                    -ms-text-fill-color: transparent;
                    -moz-text-fill-color: transparent;
                    -webkit-text-fill-color: transparent;
                }
            <?php endif; ?>">

        </div>
        <?php
        	foreach ($settings['contact_info'] as $key => $ct_info):
        		$icon_key = $widget->get_repeater_setting_key( 'ct_icon', 'contact_info', $key );

        		$has_icon = ! empty( $ct_info['ct_icon'] );
        		$widget->add_render_attribute( $icon_key, [
	                'class' => $ct_info['ct_icon'],
	                'aria-hidden' => 'true',
	            ] );

                $link_key = $widget->get_repeater_setting_key( 'title', 'value', $key );
                if ( ! empty( $ct_info['link']['url'] ) ) {
                    $widget->add_render_attribute( $link_key, 'href', $ct_info['link']['url'] );

                    if ( $ct_info['link']['is_external'] ) {
                        $widget->add_render_attribute( $link_key, 'target', '_blank' );
                    }

                    if ( $ct_info['link']['nofollow'] ) {
                        $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                    }
                }
                $link_attributes = $widget->get_render_attribute_string( $link_key );
    			?>
                <div class="item--contact-info">
                	<?php if ( $has_icon ) : ?>
    			        <span class="ct-contact-icon">
    		                <?php
    		                    if($is_new):
    		                        \Elementor\Icons_Manager::render_icon( $ct_info['ct_icon'], [ 'aria-hidden' => 'true' ] );
    		                ?>
    		                <?php else: ?>
    		                    <i <?php ct_print_html($widget->get_render_attribute_string( $icon_key )); ?>></i>
    		                <?php endif; ?>
    			        </span>
    			    <?php endif; ?>
                    <span class="ct-contact-content">
                	   <?php echo ct_print_html($ct_info['content'])?>
                    </span>
                    <?php if ( ! empty( $ct_info['link']['url'] ) ) { ?>
                        <a class="pxl-item--link" <?php echo implode( ' ', [ $link_attributes ] ); ?>></a>
                    <?php } ?>
               </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
