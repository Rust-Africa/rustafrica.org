<?php
$default_settings = [
    'banner_image' => '',
    'banner_title' => '',
    'counter_number' => '',
    'counter_title' => '',
    'color_gr_from' => '',
    'color_gr_to' => '',
    'ct_animate' => '',
    'ct_animate_delay' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = ct_get_element_id($settings);
if(!empty($banner_image['id'])) : 

	$img = ct_get_image_by_size( array(
		'attach_id'  => $banner_image['id'],
		'thumb_size' => '650x650',
	));
	$thumbnail = $img['thumbnail'];

	?>
	<div id="<?php echo esc_attr($html_id) ?>" class="ct-banner ct-banner3 <?php echo esc_attr($ct_animate); ?>" data-wow-delay="<?php echo esc_attr($ct_animate_delay); ?>ms">
		<div class="ct-inline-css"  data-css="
	        <?php if( !empty($color_gr_from) && !empty($color_gr_to) ) : ?>
	            #<?php echo esc_attr($html_id) ?>.ct-banner3::before,
	            #<?php echo esc_attr($html_id) ?>.ct-banner3 .ct-banner-counter {
	                background-image: -webkit-gradient(linear, left top, right top, from(<?php echo esc_attr($color_gr_from); ?>), to(<?php echo esc_attr($color_gr_to); ?>));
	                background-image: -webkit-linear-gradient(to left, <?php echo esc_attr($color_gr_from); ?>, <?php echo esc_attr($color_gr_to); ?>);
	                background-image: -moz-linear-gradient(to left, <?php echo esc_attr($color_gr_from); ?>, <?php echo esc_attr($color_gr_to); ?>);
	                background-image: -ms-linear-gradient(to left, <?php echo esc_attr($color_gr_from); ?>, <?php echo esc_attr($color_gr_to); ?>);
	                background-image: -o-linear-gradient(to left, <?php echo esc_attr($color_gr_from); ?>, <?php echo esc_attr($color_gr_to); ?>);
	                background-image: linear-gradient(to left, <?php echo esc_attr($color_gr_from); ?>, <?php echo esc_attr($color_gr_to); ?>);
	                filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($color_gr_from); ?>', endColorStr='<?php echo esc_attr($color_gr_to); ?>', gradientType='1');
	            }
	        <?php endif; ?>">
	    </div>
		<div class="ct-banner-inner">
			<div class="ct-banner-image">
				<?php echo wp_kses_post($thumbnail); ?>
			</div>
			<?php if(!empty($counter_number)) : ?>
				<div class="ct-banner-counter">
					<div class="ct-counter-inner">
						<div class="ct-counter-title el-empty"><?php echo esc_attr($counter_title); ?></div>
						<div class="ct-counter-number-value" data-duration="2000" data-to-value="<?php echo esc_attr($counter_number); ?>" data-delimiter=""></div>
					</div>
				</div>
			<?php endif; ?>
			<div class="item--title el-empty"><?php echo esc_attr($banner_title); ?></div>
		</div>
	</div>
<?php endif; ?>