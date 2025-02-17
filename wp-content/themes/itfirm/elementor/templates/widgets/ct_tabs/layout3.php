<?php
$html_id = ct_get_element_id($settings);
$wg_title = $widget->get_setting('wg_title');
$active_tab = $widget->get_setting('active_tab', 1);
$tabs = $widget->get_setting('tabs', '');
$tabs_title = [];
$tabs_content = [];
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
foreach ($tabs as $key => $tab){
    $title_key = $widget->get_repeater_setting_key( 'tab_title', 'tabs', $key );
    $content_key = $widget->get_repeater_setting_key( 'tab_content', 'tabs', $key );

    $tabs_title[$title_key] = $tab['tab_title'];
    $tabs_content[$content_key] = '';
    if($tab['content_type'] == 'template'){
        if(!empty($tab['tab_content_template'])){
            $content = \Elementor\Plugin::$instance->frontend->get_builder_content( $tab['tab_content_template'] );
            $tabs_content[$content_key] = $content;
        }
    }
    $form_class = '';
    if($tab['content_type'] == 'form') {
        $form_class = 'ct-contact-form-layout1';
        if(!empty($tab['form_id'])) {
            $tabs_content[$content_key] = do_shortcode('[contact-form-7 id="'.esc_attr( $tab['form_id'] ).'"]');
        }
    }
    elseif($tab['content_type'] == 'text_editor'){
        $tabs_content[$content_key] = $tab['tab_content'];
    }

    $widget->add_render_attribute( $title_key, [
        'class' => [ 'ct-tab-title' ],
        'data-target' => '#' . $html_id.'-'.$tab['_id'],
    ] );

    $widget->add_inline_editing_attributes( $title_key, 'basic' );
    $widget->add_render_attribute( $content_key, [
        'class' => [ 'ct-tab-content', $form_class ],
        'id' => $html_id.'-'.$tab['_id'],
    ] );
    if($tab['content_type'] == 'text_editor'){
        $widget->add_inline_editing_attributes( $content_key, 'advanced' );
    }

    if($active_tab == $key + 1){
        $widget->add_render_attribute( $content_key, 'style', 'display:block;');
        $widget->add_render_attribute( $title_key, 'class', 'active');
    }
} ?>
<div class="ct-tabs ct-tabs3 <?php echo esc_attr($settings['ct_animate']); ?> content-type-<?php echo esc_attr($tab['content_type']); ?>" data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
    <div class="ct-tabs--main">
        <div class="ct-tabs-title">
            <?php foreach ($tabs as $key => $tab) : 
                $icon_key = $widget->get_repeater_setting_key( 'ct_icon', 'icons', $key );
                $has_icon = ! empty( $tab['ct_icon'] );
                $widget->add_render_attribute( $icon_key, [
                    'class' => $tab['ct_icon'],
                    'aria-hidden' => 'true',
                ] );
                ?>
                <span class="ct-tab-title <?php if($active_tab == $key + 1) { echo 'active'; } ?>" data-target="#<?php echo esc_attr($html_id.'-'.$tab['_id']); ?>">
                    <?php
                        if($is_new):
                            \Elementor\Icons_Manager::render_icon( $tab['ct_icon'], [ 'aria-hidden' => 'true' ] );
                    ?>
                    <?php else: ?>
                        <i <?php ct_print_html($widget->get_render_attribute_string( $icon_key )); ?>></i>
                    <?php endif; ?>
                    <?php echo ct_print_html($tab['tab_title']); ?>        
                </span>
            <?php endforeach; ?>
        </div>

        <div class="ct-tabs-content">
            <?php foreach ($tabs_content as $content_key => $tab_content): ?>
                <div <?php ct_print_html($widget->get_render_attribute_string( $content_key )); ?>><?php ct_print_html($tab_content); ?></div>
            <?php endforeach; ?>
        </div>
    </div>
</div>