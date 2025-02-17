<?php
$default_settings = [
    'list' => '',
    'selected_icon' => '',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$has_icon = ! empty( $selected_icon );
if ( $has_icon ) {
    $widget->add_render_attribute( 'i', 'class', $selected_icon );
    $widget->add_render_attribute( 'i', 'aria-hidden', 'true' );
}
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
?>
<?php if(isset($list) && !empty($list) && count($list)): ?>
    <div class="ct-list">
        <?php
        	foreach ($list as $key => $ct_list): ?>
            <div class="ct-list-item <?php echo esc_attr($ct_animate); ?>">
                <?php if ( $has_icon ) : ?>
                    <div class="ct-list-icon">
                        <?php if($is_new):
                            \Elementor\Icons_Manager::render_icon( $selected_icon, [ 'aria-hidden' => 'true' ] );
                            else: ?>
                            <i <?php ct_print_html($widget->get_render_attribute_string( 'i' )); ?>></i>
                        <?php endif; ?>
                    </div>
                <?php endif; ?>
            	<div class="ct-list-content">
	            	<?php echo ct_print_html($ct_list['content'])?>
	            </div>
           </div>
        <?php endforeach; ?>
    </div>
<?php endif; ?>
