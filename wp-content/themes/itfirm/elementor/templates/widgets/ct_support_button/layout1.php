<?php 
$default_settings = [
    'btn_text' => '',
    'btn_link' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings); 
if ( ! empty( $settings['btn_link']['url'] ) ) {
    $widget->add_render_attribute( 'btn_link', 'href', $settings['btn_link']['url'] );

    if ( $settings['btn_link']['is_external'] ) {
        $widget->add_render_attribute( 'btn_link', 'target', '_blank' );
    }

    if ( $settings['btn_link']['nofollow'] ) {
        $widget->add_render_attribute( 'btn_link', 'rel', 'nofollow' );
    }
}
if(!empty($btn_text)) : ?>
	<div class="ct-support-button el-move-child active">
		<i class="flaticon-headphone"></i>
	    <div class="item--text"><?php echo esc_attr($btn_text); ?></div>
	    <a <?php ct_print_html($widget->get_render_attribute_string( 'btn_link' )); ?> class="item--link"></a>
	</div>
<?php endif; ?>