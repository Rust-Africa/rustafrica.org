<?php
$default_settings = [
    'menu_item' => '',
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
?>
<?php if(isset($menu_item) && !empty($menu_item) && count($menu_item)): ?>
    <ul class="ct-menu-item <?php echo esc_attr($style.' '.$ct_animate); ?>">
        <?php
        	foreach ($menu_item as $key => $item):
                $icon_key = $widget->get_repeater_setting_key( 'ct_icon', 'icons', $key );
                $has_icon = ! empty( $item['ct_icon'] );
                $widget->add_render_attribute( $icon_key, [
                    'class' => $item['ct_icon'],
                    'aria-hidden' => 'true',
                ] );

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
                ?>
                <li>
                    <a <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                        <?php if ( $has_icon ) : ?>
                            <?php
                                if($is_new):
                                    \Elementor\Icons_Manager::render_icon( $item['ct_icon'], [ 'aria-hidden' => 'true' ] );
                            ?>
                            <?php else: ?>
                                <i <?php ct_print_html($widget->get_render_attribute_string( $icon_key )); ?>></i>
                            <?php endif; ?>
                        <?php endif; ?>
                        <?php echo ct_print_html($item['text']); ?>
                        <?php if(!empty($item['label'])) : ?>
                            <cite><?php echo esc_attr($item['label']); ?></cite>
                        <?php endif; ?>
                    </a>
                </li>
        <?php endforeach; ?>
    </ul>
<?php endif; ?>
