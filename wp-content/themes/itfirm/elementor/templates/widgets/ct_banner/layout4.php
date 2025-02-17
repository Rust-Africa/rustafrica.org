<?php
$default_settings = [
    'banner_image' => '',
    'banner_image2' => '',
    'banner_title' => '',
    'ct_animate' => '',
    'ct_animate_delay' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = ct_get_element_id($settings);
if(!empty($banner_image['id'])) : 

	$img = ct_get_image_by_size( array(
		'attach_id'  => $banner_image['id'],
		'thumb_size' => 'full',
	));
	$thumbnail = $img['thumbnail'];

	?>
	<div id="<?php echo esc_attr($html_id) ?>" class="ct-banner ct-banner4 <?php echo esc_attr($ct_animate); ?>" data-wow-delay="<?php echo esc_attr($ct_animate_delay); ?>ms">
		<div class="ct-banner-inner">
			<div class="ct-banner-image">
				<?php echo wp_kses_post($thumbnail); ?>
			</div>
			<?php if(!empty($banner_image2['id'])) : 
				$img_sm = ct_get_image_by_size( array(
					'attach_id'  => $banner_image2['id'],
					'thumb_size' => 'full',
				));
				$thumbnail_sm = $img_sm['thumbnail']; ?>
				<div class="ct-banner-image-sm">
					<?php echo wp_kses_post($thumbnail_sm); ?>
				</div>
			<?php endif; ?>
			<h5 class="item--title el-empty"><?php echo esc_attr($banner_title); ?></h5>
		</div>
	</div>
<?php endif; ?>