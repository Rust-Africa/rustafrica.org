<?php
/*
 * Template Name: Cart
 * Description: A Page Template with a Page Builder design.
 */
$bastun_redux_demo = get_option('redux_demo');
get_header(); ?>
<?php if(isset($bastun_redux_demo['image_shop']['url']) && $bastun_redux_demo['image_shop']['url'] != ''){?>
<div class="breadcrumbarea" style="background: url(<?php echo esc_url($bastun_redux_demo['image_shop']['url']); ?>);">
<?php }else{ ?>
<div class="breadcrumbarea" style="background: url(<?php echo esc_url(get_template_directory_uri());?>/img/about/about__bg__1.jpg);">
<?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-xl-12" data-aos="fade-up" data-aos-duration="1500">
                <div class="breadcrumbarea__content__wraper">
                    <div class="breadcrumbarea__title">
                        <h2 class="heading"><?php if(isset($bastun_redux_demo['cart_title'])){?>
                            <?php echo html_entity_decode(esc_attr($bastun_redux_demo['cart_title']));?>
                            <?php }else{?>
                            <?php echo esc_html__( 'Cart', 'bastun' ); } ?></h2>
                    </div>
                    <div class="breadcrumbarea__inner">
                        <ul>
                            <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php if(isset($bastun_redux_demo['home'])){?>
                                <?php echo esc_attr($bastun_redux_demo['home']);?>
                                <?php }else{?>
                                <?php echo esc_html__( 'Home', 'bastun' ); } ?></a></li>
                            <li>// </li>
                            <li> <?php if(isset($bastun_redux_demo['cart_subtitle'])){?>
                                <?php echo html_entity_decode(esc_attr($bastun_redux_demo['cart_subtitle']));?>
                                <?php }else{?>
                                <?php echo esc_html__( 'Cart Page', 'bastun' ); } ?> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="cartarea sp_bottom_140 sp_top_100">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
            	<form class="woocommerce-cart-form" action="<?php echo esc_url( wc_get_cart_url() ); ?>" method="post">
                    <div class="cartarea__table__content table-responsive">
                    	<?php do_action( 'woocommerce_before_cart_table' ); ?>
                        <table>
                            <thead>
                                <tr>
                                    <th><?php esc_html_e( 'Image', 'bastun' ); ?></th>
                                    <th><?php esc_html_e( 'Product', 'bastun' ); ?></th>
                                    <th><?php esc_html_e( 'Price', 'bastun' ); ?></th>
                                    <th><?php esc_html_e( 'Quantity', 'bastun' ); ?></th>
                                    <th><?php esc_html_e( 'Subtotal', 'bastun' ); ?></th>
                                    <th><?php esc_html_e( 'Remove', 'bastun' ); ?></th>
                                </tr>
                            </thead>
                            <tbody>
                            	<?php do_action( 'woocommerce_before_cart_contents' ); ?>

								<?php
								foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
									$_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
									$product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );
									/**
									 * Filter the product name.
									 *
									 * @since 2.1.0
									 * @param string $product_name Name of the product in the cart.
									 * @param array $cart_item The product in the cart.
									 * @param string $cart_item_key Key for the product in the cart.
									 */
									$product_name = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );

									if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
										$product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
										?>
                                <tr class="woocommerce-cart-form__cart-item <?php echo esc_attr( apply_filters( 'woocommerce_cart_item_class', 'cart_item', $cart_item, $cart_item_key ) ); ?>">
                                    <td class="cartarea__product__thumbnail">
                                        <?php
										$thumbnail = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );

										if ( ! $product_permalink ) {
											echo wp_kses_post( $thumbnail ); // PHPCS: XSS ok.
										} else {
											printf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $thumbnail ); // PHPCS: XSS ok.
										}
										?>
                                    </td>
                                    <td class="cartarea__product__name">
                                    	<?php
										if ( ! $product_permalink ) {
											echo wp_kses_post( $product_name . '&nbsp;' );
										} else {
											/**
											 * This filter is documented above.
											 *
											 * @since 2.1.0
											 */
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_name', sprintf( '<a href="%s">%s</a>', esc_url( $product_permalink ), $_product->get_name() ), $cart_item, $cart_item_key ) );
										}

										do_action( 'woocommerce_after_cart_item_name', $cart_item, $cart_item_key );

										// Meta data.
										echo wc_get_formatted_cart_item_data( $cart_item ); // PHPCS: XSS ok.

										// Backorder notification.
										if ( $_product->backorders_require_notification() && $_product->is_on_backorder( $cart_item['quantity'] ) ) {
											echo wp_kses_post( apply_filters( 'woocommerce_cart_item_backorder_notification', '<p class="backorder_notification">' . esc_html__( 'Available on backorder', 'bastun' ) . '</p>', $product_id ) );
										}
										?>
                                    </td>
                                    <td class="cartarea__product__price__cart"><span class="amount">
                                    	<?php
											echo apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
										?>	
									</span></td>
                                    <td class="cartarea__product__quantity">
                                    	<?php
										if ( $_product->is_sold_individually() ) {
											$min_quantity = 1;
											$max_quantity = 1;
										} else {
											$min_quantity = 0;
											$max_quantity = $_product->get_max_purchase_quantity();
										}

										$product_quantity = woocommerce_quantity_input(
											array(
												'input_name'   => "cart[{$cart_item_key}][qty]",
												'input_value'  => $cart_item['quantity'],
												'max_value'    => $max_quantity,
												'min_value'    => $min_quantity,
												'product_name' => $product_name,
											),
											$_product,
											false
										);

										echo apply_filters( 'woocommerce_cart_item_quantity', $product_quantity, $cart_item_key, $cart_item ); // PHPCS: XSS ok.
										?>
                                      
                                    </td>
                                    <td class="cartarea__product__subtotal">
                                    	<?php
											echo apply_filters( 'woocommerce_cart_item_subtotal', WC()->cart->get_product_subtotal( $_product, $cart_item['quantity'] ), $cart_item, $cart_item_key ); // PHPCS: XSS ok.
										?>
                                    </td>
                                    <td class="cartarea__product__remove">
                                       <?php
											echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
												'woocommerce_cart_item_remove_link',
												sprintf(
													'<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><title>Trash</title><path d="M112 112l20 320c.95 18.49 14.4 32 32 32h184c17.67 0 30.87-13.51 32-32l20-320" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 112h352"/><path d="M192 112V72h0a23.93 23.93 0 0124-24h80a23.93 23.93 0 0124 24h0v40M256 176v224M184 176l8 224M328 176l-8 224" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg></a>',
													esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
													/* translators: %s is the product name */
													esc_attr( sprintf( __( 'Remove %s from cart', 'bastun' ), wp_strip_all_tags( $product_name ) ) ),
													esc_attr( $product_id ),
													esc_attr( $_product->get_sku() )
												),
												$cart_item_key
											);
										?>
                                    </td>
                                </tr>
                                
                                <?php
									}
								}
								?>

								<?php do_action( 'woocommerce_cart_contents' ); ?>
                            </tbody>
                        </table>
                        <?php do_action( 'woocommerce_after_cart_table' ); ?>
                    </div>
                </form>
            </div>
        </div>
        <?php do_action( 'woocommerce_before_cart_collaterals' ); ?>
        <div class="row">
            <div class="col-lg-12">
            <div class="cartarea__shiping__update__wrapper">
                <?php if ( wc_coupons_enabled() ) { ?>
					<div class="coupon">
						<label for="coupon_code" class="screen-reader-text"><?php esc_html_e( 'Coupon:', 'bastun' ); ?></label> <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="<?php esc_attr_e( 'Coupon code', 'bastun' ); ?>" /> <button type="submit" class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="apply_coupon" value="<?php esc_attr_e( 'Apply coupon', 'bastun' ); ?>"><?php esc_html_e( 'Apply coupon', 'bastun' ); ?></button>
						<?php do_action( 'woocommerce_cart_coupon' ); ?>
					</div>
				<?php } ?>
				<button type="submit" class="button<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" name="update_cart" value="<?php esc_attr_e( 'Update cart', 'bastun' ); ?>"><?php esc_html_e( 'Update cart', 'bastun' ); ?></button>

				<?php do_action( 'woocommerce_cart_actions' ); ?>

				<?php wp_nonce_field( 'woocommerce-cart', 'woocommerce-cart-nonce' ); ?>
            </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-lg-6 col-md-12 col-12"></div>
            <div class="col-lg-6 col-lg-6 col-md-12 col-12">
            	<div class="cartarea__grand__totall cartarea__tax cart-collaterals">
					<?php
						/**
						 * Cart collaterals hook.
						 *
						 * @hooked woocommerce_cross_sell_display
						 * @hooked woocommerce_cart_totals - 10
						 */
						do_action( 'woocommerce_cart_collaterals' );
					?>
				</div>
            </div>
        </div>
    </div>
</div>
<?php
get_footer();
?>