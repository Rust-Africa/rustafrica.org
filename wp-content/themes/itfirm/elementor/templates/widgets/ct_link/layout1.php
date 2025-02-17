<?php
$default_settings = [
    'menu_item' => '',
    'style' => '',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
?>
<?php if(isset($menu_item) && !empty($menu_item) && count($menu_item)): ?>
    <div class="ct-link1 <?php echo esc_attr($style.' '.$ct_animate); ?>">
        <ul class="ct-link-items">
            <?php
            	foreach ($menu_item as $key => $item):

                    $link_key = $widget->get_repeater_setting_key( 'title', 'value', $key );
                    if ( ! empty( $item['link']['url'] ) ) {
                        $widget->add_render_attribute( $link_key, 'href', $item['link']['url'] );

                        if ( $item['link']['is_external'] ) {
                            $widget->add_render_attribute( $link_key, 'target', '_blank' );
                        }

                        if ( $item['link']['nofollow'] ) {
                            $widget->add_render_attribute( $link_key, 'rel', 'nofollow' );
                        }
                    }
                    $link_attributes = $widget->get_render_attribute_string( $link_key );
                    $icon_key = $widget->get_repeater_setting_key( 'ct_icon', 'icons', $key );
                    $widget->add_render_attribute( $icon_key, [
                        'class' => $item['ct_icon'],
                        'aria-hidden' => 'true',
                    ] );
                    ?>
                    <li>
                        <a <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                            <?php if ( $is_new ):
                                \Elementor\Icons_Manager::render_icon( $item['ct_icon'], [ 'aria-hidden' => 'true' ] );
                            elseif(!empty($item['pxl_icon'])): ?>
                                <i class="<?php echo esc_attr( $item['ct_icon'] ); ?>" aria-hidden="true"></i>
                            <?php endif; ?>
                            <?php echo ct_print_html($item['text']); ?>
                        </a>
                    </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
