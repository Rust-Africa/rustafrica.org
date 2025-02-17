<?php
$default_settings = [
    'sub_title' => '',
    'title' => '',
    'phone_number' => '',
    'desc' => '',
    'btn_text' => '',
    'btn_link' => '',
    'box_image' => '',
    'ct_animate' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);

if ( ! empty( $btn_link['url'] ) ) {
    $widget->add_render_attribute( 'btn_link', 'href', $btn_link['url'] );

    if ( $btn_link['is_external'] ) {
        $widget->add_render_attribute( 'btn_link', 'target', '_blank' );
    }

    if ( $btn_link['nofollow'] ) {
        $widget->add_render_attribute( 'btn_link', 'rel', 'nofollow' );
    }
}

$is_new = \Elementor\Icons_Manager::is_migration_allowed();

?>
<div class="ct-info-box ct-info-box1 bg-image <?php echo esc_attr($ct_animate); ?>" <?php if(!empty($box_image['url'])) : ?>style="background-image:url(<?php echo esc_url($box_image['url']); ?>);"<?php endif; ?> data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
	<div class="ct-infobox-inner">
		<div class="item--subtitle el-empty"><?php echo esc_attr($sub_title); ?></div>
		<div class="item--title el-empty"><?php echo esc_attr($title); ?></div>
		<div class="item--phone el-empty"><?php echo esc_attr($phone_number); ?></div>
		<div class="item--desc el-empty"><?php echo esc_attr($desc); ?></div>
		<?php if ( ! empty( $btn_text ) ) { ?>
			<a class="ct-info-button" <?php ct_print_html($widget->get_render_attribute_string( 'btn_link' )); ?>><?php echo esc_attr($btn_text); ?><i class="fas fa-link"></i></a>
		<?php } ?>
	</div>
</div>