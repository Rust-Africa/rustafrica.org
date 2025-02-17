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
<?php
/**
 * Empty cart page
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/cart/cart-empty.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 7.0.1
 */

defined( 'ABSPATH' ) || exit;

/*
 * @hooked wc_empty_cart_message - 10
 */
do_action( 'woocommerce_cart_is_empty' );

if ( wc_get_page_id( 'shop' ) > 0 ) : ?>


	<p class="return-to-shop">
		<a class="button wc-backward<?php echo esc_attr( wc_wp_theme_get_element_class_name( 'button' ) ? ' ' . wc_wp_theme_get_element_class_name( 'button' ) : '' ); ?>" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
			<?php
				/**
				 * Filter "Return To Shop" text.
				 *
				 * @since 4.6.0
				 * @param string $default_text Default text.
				 */
				echo esc_html( apply_filters( 'woocommerce_return_to_shop_text', __( 'Return to shop', 'bastun' ) ) );
			?>
		</a>
	</p>
				

<?php endif; ?>
</div>
        </div>
        
    </div>
</div>