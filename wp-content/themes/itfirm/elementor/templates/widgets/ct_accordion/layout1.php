<?php
$default_settings = [
    'style' => '',
    'active_section' => '',
    'ct_accordion' => '',
    'main_icon' => '',
    'icon_active' => '',
    'title_html_tag' => 'div',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = ct_get_element_id($settings);
$active_section = intval($active_section);
$accordions = $widget->get_settings('ct_accordion');
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
if(!empty($accordions)) : ?>
    <div id="<?php echo esc_attr($html_id); ?>" class="ct-accordion ct-accordion1  <?php echo esc_attr($ct_animate.' '.$style); ?>" data-wow-duration="1.2s">
        <?php foreach ($accordions as $key => $value):
            $is_active = ($key + 1) == $active_section;
            $_id = isset($value['_id']) ? $value['_id'] : '';
            $ac_title = isset($value['ac_title']) ? $value['ac_title'] : '';
            $ac_content = isset($value['ac_content']) ? $value['ac_content'] : '';

            $title_key = $widget->get_repeater_setting_key( 'ac_title', 'ct_accordion', $key );
            $widget->add_render_attribute( $title_key, [
                'class' => [ 'ct-ac-title-text' ],
            ] );
            $widget->add_inline_editing_attributes( $title_key, 'basic' );

            $content_key = $widget->get_repeater_setting_key( 'ac_content', 'ct_accordion', $key );
            $widget->add_render_attribute( $content_key, [
                'id' => $_id.$html_id,
                'class' => [ 'ct-ac-content' ],
            ] );
            if($is_active){
                $widget->add_render_attribute( $content_key, 'style', 'display:block;' );
            }
            $widget->add_inline_editing_attributes( $content_key, 'basic' );
        ?>
            <div class="ct-accordion-item <?php echo esc_attr($is_active?'active':''); ?>">
                <<?php ct_print_html($title_html_tag); ?> class="ct-ac-title <?php echo esc_attr($is_active?'active':''); ?>" data-target="<?php echo esc_attr('#' . $_id.$html_id); ?>">
                    <a <?php ct_print_html($widget->get_render_attribute_string( $title_key )); ?>><?php echo wp_kses_post($ac_title); ?>
                        <i class="ct-accordion-icon-plus"></i>
                    </a>
                </<?php ct_print_html($title_html_tag); ?>>
                <div <?php ct_print_html($widget->get_render_attribute_string( $content_key )); ?>><?php echo wp_kses_post(nl2br($ac_content)); ?></div>
            </div>
        <?php
            endforeach;
        ?>
    </div>
<?php endif; ?>