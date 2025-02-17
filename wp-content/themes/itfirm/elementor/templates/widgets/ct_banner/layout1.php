<?php
$default_settings = [
    'banner_icon' => '',
    'banner_image' => '',
    'banner_title' => '',
    'banner_desc' => '',
    'counter_number' => '',
    'counter_title' => '',
    'ct_animate' => '',
    'ct_animate_delay' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
if(!empty($banner_image['id'])) : 

	$img = ct_get_image_by_size( array(
		'attach_id'  => $banner_image['id'],
		'thumb_size' => '800x530',
	));
	$thumbnail = $img['thumbnail'];

	?>
	<div class="ct-banner ct-banner1 <?php echo esc_attr($ct_animate); ?>" data-wow-delay="<?php echo esc_attr($ct_animate_delay); ?>ms">
		<div class="ct-banner-inner">
			<div class="ct-banner-image">
				<?php echo wp_kses_post($thumbnail); ?>
				<?php if(!empty($counter_number)) : ?>
					<div class="ct-banner-counter">
						<div class="ct-counter-inner">
							<div class="ct-counter-number-value" data-duration="2000" data-to-value="<?php echo esc_attr($counter_number); ?>" data-delimiter=""></div>
							<div class="ct-counter-title el-empty"><?php echo esc_attr($counter_title); ?></div>
						</div>
					</div>
				<?php endif; ?>
			</div>
			<div class="ct-banner-holder">
				<?php if(!empty($banner_icon)) : ?>
					<div class="item--icon el-empty">
						<?php if($is_new):
		                    \Elementor\Icons_Manager::render_icon( $banner_icon, [ 'aria-hidden' => 'true' ] );
		                    else: ?>
		                    <i <?php ct_print_html($widget->get_render_attribute_string( 'i' )); ?>></i>
		                <?php endif; ?>
					</div>
				<?php endif; ?>
				<div class="ct-banner-meta">
					<h5 class="item--title el-empty"><?php echo esc_attr($banner_title); ?></h5>
					<div class="item--desc el-empty"><?php echo esc_attr($banner_desc); ?></div>
				</div>
			</div>

		</div>
	</div>
<?php endif; ?>