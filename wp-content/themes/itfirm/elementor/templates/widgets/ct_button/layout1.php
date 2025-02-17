<?php
$widget->add_render_attribute( 'wrapper', 'class', 'ct-button-wrapper ct-button-layout1' );

if ( ! empty( $settings['link']['url'] ) ) {
    $widget->add_render_attribute( 'button', 'href', $settings['link']['url'] );

    if ( $settings['link']['is_external'] ) {
        $widget->add_render_attribute( 'button', 'target', '_blank' );
    }

    if ( $settings['link']['nofollow'] ) {
        $widget->add_render_attribute( 'button', 'rel', 'nofollow' );
    }
}

$widget->add_render_attribute( 'button', 'class', 'btn '.$settings['style'].' '.$settings['ct_animate'].' icon-ps-'.$settings['icon_align'].' ' );

if ( ! empty( $settings['button_css_id'] ) ) {
    $widget->add_render_attribute( 'button', 'id', $settings['button_css_id'] );
}

$is_new = \Elementor\Icons_Manager::is_migration_allowed();
$html_id = ct_get_element_id($settings);
$btn_g_rotate = '90deg';
if(!empty($settings['btn_gradient_rotate']['size'])) {
    $btn_g_rotate = $settings['btn_gradient_rotate']['size'].'deg';
}
?>
<div id="<?php echo esc_attr($html_id); ?>" <?php ct_print_html($widget->get_render_attribute_string( 'wrapper' )); ?>>
    <div class="ct-inline-css"  data-css="
        <?php if( !empty($settings['btn_bg_color']) && !empty($settings['btn_bg_color_gradient']) ) : ?>
            #<?php echo esc_attr($html_id) ?>.ct-button-wrapper .btn {
                background-image: -webkit-linear-gradient(<?php echo esc_attr($btn_g_rotate); ?>, <?php echo esc_attr($settings['btn_bg_color']); ?> 0%, <?php echo esc_attr($settings['btn_bg_color_gradient']); ?> 50%, <?php echo esc_attr($settings['btn_bg_color']); ?>) !important;
                background-image: -moz-linear-gradient(<?php echo esc_attr($btn_g_rotate); ?>, <?php echo esc_attr($settings['btn_bg_color']); ?> 0%, <?php echo esc_attr($settings['btn_bg_color_gradient']); ?> 50%, <?php echo esc_attr($settings['btn_bg_color']); ?>) !important;
                background-image: -ms-linear-gradient(<?php echo esc_attr($btn_g_rotate); ?>, <?php echo esc_attr($settings['btn_bg_color']); ?> 0%, <?php echo esc_attr($settings['btn_bg_color_gradient']); ?> 50%, <?php echo esc_attr($settings['btn_bg_color']); ?>) !important;
                background-image: -o-linear-gradient(<?php echo esc_attr($btn_g_rotate); ?>, <?php echo esc_attr($settings['btn_bg_color']); ?> 0%, <?php echo esc_attr($settings['btn_bg_color_gradient']); ?> 50%, <?php echo esc_attr($settings['btn_bg_color']); ?>) !important;
                background-image: linear-gradient(<?php echo esc_attr($btn_g_rotate); ?>, <?php echo esc_attr($settings['btn_bg_color']); ?> 0%, <?php echo esc_attr($settings['btn_bg_color_gradient']); ?> 50%, <?php echo esc_attr($settings['btn_bg_color']); ?>) !important;
                filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($settings['btn_bg_color']); ?>', endColorStr='<?php echo esc_attr($settings['btn_bg_color_gradient']); ?>') !important;
                background-color: transparent !important;

            }
        <?php endif; ?>">
    </div>

    <?php if(!empty($settings['btn_icon'])) : ?>
        <span class="ct-icon-active"></span>
    <?php endif; ?>
    <a <?php ct_print_html($widget->get_render_attribute_string( 'button' )); ?> data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
        <?php
        $widget->add_render_attribute( [
			'icon-align' => [
				'class' => [
					'ct-button-icon ' . $settings['icon_rotate'],
					'ct-align-icon-' . $settings['icon_align'],
				],
			],
			'text' => [
				'class' => 'ct-button-text',
			],
		] );

		$widget->add_inline_editing_attributes( 'text', 'none' ); ?>
        <?php if ( $is_new ): ?>
            <span <?php ct_print_html($widget->get_render_attribute_string( 'icon-align' )); ?>>
                <?php \Elementor\Icons_Manager::render_icon( $settings['btn_icon'], [ 'aria-hidden' => 'true' ] ); ?>
            </span>
        <?php elseif(!empty($settings['btn_icon'])): ?>
            <span <?php ct_print_html($widget->get_render_attribute_string( 'icon-align' )); ?>>
                <i class="<?php echo esc_attr( $settings['icon'] ); ?>" aria-hidden="true"></i>
            </span>
        <?php endif; ?>
        <span <?php ct_print_html($widget->get_render_attribute_string( 'text' )); ?>>
            <?php if($settings['style'] == 'btn-outline-gradient') { ?>
                <span class="pxl--btn-text" data-text="<?php echo esc_attr($settings['text']); ?>">
                    <?php 
                        $chars = str_split($settings['text']); 
                        foreach ($chars as $value) {
                            if($value == ' ') {
                                echo '<span class="spacer">&nbsp;</span>';
                            } else {
                                echo '<span>'.$value.'</span>';
                            }
                        } 
                    ?>
                </span>
            <?php } else {
                echo ct_print_html($settings['text']);
            } ?>
        </span>
    </a>
</div>