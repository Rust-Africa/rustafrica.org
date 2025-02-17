<?php 
$default_settings = [
    'icon_text_color' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
if ( class_exists( 'Woocommerce' ) ) { ?>
	<div class="ct-sidebar-cart1 h-btn-cart">
		<i class="flaticon2-shopping-cart"></i>
        <span class="widget_cart_counter"><?php echo sprintf (_n( '%d', '%d', WC()->cart->cart_contents_count, 'itfirm' ), WC()->cart->cart_contents_count ); ?></span>
	</div>
<?php } ?>