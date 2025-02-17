<?php
$html_id = ct_get_element_id($settings);
if(isset($settings['progressbar_list']) && !empty($settings['progressbar_list'])): ?>
    <div id="<?php echo esc_attr($html_id) ?>" class="ct-progressbar ct-progressbar2">
        <div class="ct-inline-css"  data-css="
            <?php if( !empty($settings['bar_color']) && !empty($settings['bar_color_gradient']) ) : ?>
                #<?php echo esc_attr($html_id) ?>.ct-progressbar2 .ct-progress-bar {
                    background-image: -webkit-gradient(linear, left top, left bottom, from(<?php echo esc_attr($settings['bar_color']); ?>), to(<?php echo esc_attr($settings['bar_color_gradient']); ?>));
                    background-image: -webkit-linear-gradient(to right, <?php echo esc_attr($settings['bar_color']); ?>, <?php echo esc_attr($settings['bar_color_gradient']); ?>);
                    background-image: -moz-linear-gradient(to right, <?php echo esc_attr($settings['bar_color']); ?>, <?php echo esc_attr($settings['bar_color_gradient']); ?>);
                    background-image: -ms-linear-gradient(to right, <?php echo esc_attr($settings['bar_color']); ?>, <?php echo esc_attr($settings['bar_color_gradient']); ?>);
                    background-image: -o-linear-gradient(to right, <?php echo esc_attr($settings['bar_color']); ?>, <?php echo esc_attr($settings['bar_color_gradient']); ?>);
                    background-image: linear-gradient(to right, <?php echo esc_attr($settings['bar_color']); ?>, <?php echo esc_attr($settings['bar_color_gradient']); ?>);
                    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($settings['bar_color']); ?>', endColorStr='<?php echo esc_attr($settings['bar_color_gradient']); ?>');
                }
            <?php endif; ?>">
        </div>
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
                <div class="ct-progress-bar-wrap">
                    <div <?php ct_print_html($widget->get_render_attribute_string( $progress_bar_key )); ?>></div>
                </div>
                <div class="ct-progress-bar-meta">
                    <?php if ( ! empty( $progressbar['title'] ) ) { ?>
                        <h5 class="ct-progress-title"><?php echo ct_print_html($progressbar['title']); ?></h5>
                    <?php } ?>
                    <div class="ct-progress-percentage"><?php echo esc_html($progressbar['percent']['size']); ?>%</div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>