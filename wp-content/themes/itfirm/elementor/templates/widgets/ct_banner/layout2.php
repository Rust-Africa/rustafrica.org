<?php
$default_settings = [
    'banner_image' => '',
    'banner_shape' => '',
    'ct_animate' => '',
    'ct_animate_delay' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$is_new = \Elementor\Icons_Manager::is_migration_allowed();
if(!empty($banner_image['id'])) : 

	$img = ct_get_image_by_size( array(
		'attach_id'  => $banner_image['id'],
		'thumb_size' => '600x473',
	));
	$thumbnail = $img['thumbnail'];

	?>
	<div class="ct-banner ct-banner2 <?php echo esc_attr($ct_animate); ?>" data-wow-delay="<?php echo esc_attr($ct_animate_delay); ?>ms">
		<div class="ct-banner-inner">
			<div class="ct-banner-image">
				<?php echo wp_kses_post($thumbnail); ?>
			</div>
			<?php if(!empty($banner_shape['id'])) : 
				$img_shape = ct_get_image_by_size( array(
					'attach_id'  => $banner_shape['id'],
					'thumb_size' => 'full',
				));
				$thumbnail_shape = $img_shape['thumbnail'];
				?>
				<div class="ct-banner-shape">
					<?php echo wp_kses_post($thumbnail_shape); ?>
				</div>
			<?php endif; ?>
		</div>
	</div>
<?php endif; ?>