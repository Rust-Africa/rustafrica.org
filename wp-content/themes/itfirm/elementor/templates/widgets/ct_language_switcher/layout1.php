<?php
$default_settings = [
    'current' => '',
    'menu_item' => '',
    'dropdown_position' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
?>
<?php if(!empty($current) && isset($menu_item) && !empty($menu_item) && count($menu_item)): ?>
    <div class="ct-language-switcher1 <?php echo esc_attr($dropdown_position); ?>">
        <div class="current--item">
            <svg height="22" viewBox="0 0 32 32" width="22" xmlns="http://www.w3.org/2000/svg" data-name="Layer 3"><path d="m21.386 10c-1.055-4.9-3.305-8-5.386-8s-4.331 3.1-5.386 8z"/><path d="m10 16a30.013 30.013 0 0 0 .267 4h11.466a30.013 30.013 0 0 0 .267-4 30.013 30.013 0 0 0 -.267-4h-11.466a30.013 30.013 0 0 0 -.267 4z"/><path d="m10.614 22c1.055 4.9 3.305 8 5.386 8s4.331-3.1 5.386-8z"/><path d="m23.434 10h6.3a15.058 15.058 0 0 0 -10.449-8.626c1.897 1.669 3.385 4.755 4.149 8.626z"/><path d="m30.453 12h-6.7a32.332 32.332 0 0 1 .247 4 32.332 32.332 0 0 1 -.248 4h6.7a14.9 14.9 0 0 0 0-8z"/><path d="m19.285 30.626a15.058 15.058 0 0 0 10.451-8.626h-6.3c-.766 3.871-2.254 6.957-4.151 8.626z"/><path d="m8.566 22h-6.3a15.058 15.058 0 0 0 10.451 8.626c-1.899-1.669-3.387-4.755-4.151-8.626z"/><path d="m12.715 1.374a15.058 15.058 0 0 0 -10.451 8.626h6.3c.766-3.871 2.254-6.957 4.151-8.626z"/><path d="m8 16a32.332 32.332 0 0 1 .248-4h-6.7a14.9 14.9 0 0 0 0 8h6.7a32.332 32.332 0 0 1 -.248-4z"/></svg>
            <label><?php echo esc_attr($current); ?></label>
        </div>
        <ul>
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
                    ?>
                    <li>
                        <a <?php echo implode( ' ', [ $link_attributes ] ); ?>>
                            <?php echo ct_print_html($item['text']); ?>
                        </a>
                    </li>
            <?php endforeach; ?>
        </ul>
    </div>
<?php endif; ?>
