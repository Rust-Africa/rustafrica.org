<?php
$html_id = ct_get_element_id($settings);
if(isset($settings['progressbar_list']) && !empty($settings['progressbar_list'])): ?>
    <div id="<?php echo esc_attr($html_id) ?>" class="ct-progressbar ct-progressbar1 <?php echo esc_attr($settings['style_l1']); ?>">
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
                <?php if ( ! empty( $progressbar['title'] ) ) { ?>
                    <h5 class="ct-progress-title"><?php echo ct_print_html($progressbar['title']); ?></h5>
                <?php } ?>
                <div class="ct-progress-bar-wrap">
                    <div <?php ct_print_html($widget->get_render_attribute_string( $progress_bar_key )); ?>>
                        <div class="ct-progress-percentage"><?php echo esc_html($progressbar['percent']['size']); ?>%</div>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>