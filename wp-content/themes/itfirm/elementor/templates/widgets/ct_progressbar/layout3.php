<?php
$html_id = ct_get_element_id($settings);
if(isset($settings['progressbar_list']) && !empty($settings['progressbar_list'])): ?>
    <div id="<?php echo esc_attr($html_id) ?>" class="ct-progressbar ct-progressbar3">
        <?php foreach ($settings['progressbar_list'] as $key => $progressbar):
            $wrapper_key = $widget->get_repeater_setting_key( 'wrapper', 'progressbar_list', $key );
            $progress_bar_key = $widget->get_repeater_setting_key( 'progress_bar', 'progressbar_list', $key );
            $inner_text_key = $widget->get_repeater_setting_key( 'inner_text', 'progressbar_list', $key );
            $widget->add_render_attribute( $progress_bar_key, [
                'class' => 'ct-progress-bar',
                'role' => 'progressbar',
                'data-valuetransitiongoal' => $progressbar['percent']['size'],
            ] );

            $widget->add_render_attribute( $inner_text_key, [
                'class' => 'ct-progress-text',
            ] );

            $widget->add_inline_editing_attributes( $inner_text_key ); ?>
            
            <div class="ct-progress-item">
                <div class="ct-progress-bar-meta">
                    <?php if ( ! empty( $progressbar['title'] ) ) { ?>
                        <h5 class="ct-progress-title"><?php echo esc_html($progressbar['percent']['size']); ?>% - <span><?php echo ct_print_html($progressbar['title']); ?></span></h5>
                    <?php } ?>
                </div>
                <div class="ct-progress-bar-wrap">
                    <div <?php ct_print_html($widget->get_render_attribute_string( $progress_bar_key )); ?>>
                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 16 16"><path d="M10.4,13.778Q-0.365,20.182,0,7.984q-0.365-12.2,10.4-5.793Q21.532,7.986,10.4,13.778Z"/></svg>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>