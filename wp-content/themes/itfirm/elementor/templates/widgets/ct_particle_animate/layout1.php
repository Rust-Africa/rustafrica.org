<?php
$default_settings = [
    'content_list' => '',
    'image_section' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = ct_get_element_id($settings);
?>
<?php if(isset($content_list) && !empty($content_list) && count($content_list)): ?>
	<div class="ct-particle-animate el-move-<?php echo esc_attr($image_section); ?> <?php echo esc_attr($settings['image_visible'].' '.$settings['ct_animate']); ?>" data-wow-delay="<?php echo esc_attr($settings['ct_animate_delay']); ?>ms">
		<?php foreach ($content_list as $key => $value): 
			$particle  = ct_get_image_by_size( array(
                'attach_id'  => $value['particle']['id'],
                'thumb_size' => 'full',
            ) );
            $particle_tb    = $particle['thumbnail'];
            $parallax_speed = '6';
            $parallax_move = '60';
            if($value['particle_animate'] == 'shape-parallax') {
			    wp_enqueue_script('el-parallax', get_template_directory_uri() . '/assets/js/el-parallax.js', array('jquery'), 'all', true);
			}
			?>
		    <div id="<?php echo esc_attr($html_id.$key); ?>" class="<?php echo esc_attr($value['type_position']); ?> <?php echo esc_attr($value['particle_animate']); ?>" <?php if($value['particle_animate'] == 'shape-parallax') { ?>data-speed="<?php echo esc_attr($parallax_speed); ?>" data-move="<?php echo esc_attr($parallax_move); ?>"<?php } ?>>
		    	<?php if($value['type_position'] == 'top-left') : ?>
			    	<div class="ct-inline-css"  data-css="
			            .ct-particle-animate #<?php echo esc_attr($html_id.$key) ?> {
			                left: <?php echo esc_attr($value['left_positioon']['size']).esc_attr($value['left_positioon']['unit']); ?>;
			                top: <?php echo esc_attr($value['top_positioon']['size']).esc_attr($value['top_positioon']['unit']); ?>;
			            }">
			        </div>
			    <?php endif; ?>
			    <?php if($value['type_position'] == 'top-right') : ?>
			    	<div class="ct-inline-css"  data-css="
			            .ct-particle-animate #<?php echo esc_attr($html_id.$key) ?> {
			                right: <?php echo esc_attr($value['right_positioon']['size']).esc_attr($value['right_positioon']['unit']); ?>;
			                top: <?php echo esc_attr($value['top_positioon']['size']).esc_attr($value['top_positioon']['unit']); ?>;
			            }">
			        </div>
			    <?php endif; ?>
			    <?php if($value['type_position'] == 'bottom-left') : ?>
			    	<div class="ct-inline-css"  data-css="
			            .ct-particle-animate #<?php echo esc_attr($html_id.$key) ?> {
			                left: <?php echo esc_attr($value['left_positioon']['size']).esc_attr($value['left_positioon']['unit']); ?>;
			                bottom: <?php echo esc_attr($value['bottom_positioon']['size']).esc_attr($value['bottom_positioon']['unit']); ?>;
			            }">
			        </div>
			    <?php endif; ?>
			    <?php if($value['type_position'] == 'bottom-right') : ?>
			    	<div class="ct-inline-css"  data-css="
			            .ct-particle-animate #<?php echo esc_attr($html_id.$key) ?> {
			                right: <?php echo esc_attr($value['right_positioon']['size']).esc_attr($value['right_positioon']['unit']); ?>;
			                bottom: <?php echo esc_attr($value['bottom_positioon']['size']).esc_attr($value['bottom_positioon']['unit']); ?>;
			            }">
			        </div>
			    <?php endif; ?>
		    	<?php echo wp_kses_post($particle_tb); ?>		
		    </div>
		<?php endforeach; ?>
	</div>
<?php endif; ?>
