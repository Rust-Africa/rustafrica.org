<?php
use Elementor\Icons_Manager;
Icons_Manager::enqueue_shim();
$default_settings = [
    'style' => '',
    'btn_gradient_from' => '',
    'btn_gradient_to' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = ct_get_element_id($settings);
if(class_exists('MC4WP_Container')) : ?>
	<div id="<?php echo esc_attr($html_id); ?>" class="ct-mailchimp ct-mailchimp1 <?php echo esc_attr($style); ?>">
		<div class="ct-inline-css"  data-css="
	        <?php if( !empty($btn_gradient_from) && !empty($btn_gradient_to) ) : ?>
	            #<?php echo esc_attr($html_id) ?>.ct-mailchimp1.style1 .ct-field-group::before {
	                background-image: -webkit-gradient(linear, left top, left bottom, from(<?php echo esc_attr($btn_gradient_from); ?>), to(<?php echo esc_attr($btn_gradient_to); ?>));
                    background-image: -webkit-linear-gradient(to left, <?php echo esc_attr($btn_gradient_from); ?>, <?php echo esc_attr($btn_gradient_to); ?>);
                    background-image: -moz-linear-gradient(to left, <?php echo esc_attr($btn_gradient_from); ?>, <?php echo esc_attr($btn_gradient_to); ?>);
                    background-image: -ms-linear-gradient(to left, <?php echo esc_attr($btn_gradient_from); ?>, <?php echo esc_attr($btn_gradient_to); ?>);
                    background-image: -o-linear-gradient(to left, <?php echo esc_attr($btn_gradient_from); ?>, <?php echo esc_attr($btn_gradient_to); ?>);
                    background-image: linear-gradient(to left, <?php echo esc_attr($btn_gradient_from); ?>, <?php echo esc_attr($btn_gradient_to); ?>);
                    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($btn_gradient_from); ?>', endColorStr='<?php echo esc_attr($btn_gradient_to); ?>');

	            }
	        <?php endif; ?>">
	    </div>
		<?php echo do_shortcode('[mc4wp_form]'); ?>
	</div>
<?php endif; ?>
