<?php
/**
 * The template for displaying product content within loops
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see     https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 3.6.0
 */

defined( 'ABSPATH' ) || exit;

global $product;

// Ensure visibility.
if ( empty( $product ) || ! $product->is_visible() ) {
	return;
}
?>
<div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 column__custom__class column__custom__class_4_column ">
    <div class="gridarea__wraper product__grid">
        <div class="gridarea__img">
            <?php

			/**
			 * Hook: woocommerce_before_shop_loop_item_title.
			 *
			 * @hooked woocommerce_show_product_loop_sale_flash - 10
			 * @hooked woocommerce_template_loop_product_thumbnail - 10
			 */
			do_action( 'woocommerce_before_shop_loop_item_title' );

			?>
			<div class="gridarea__small__icon">
                <?php
                    echo do_shortcode('[yith_wcwl_add_to_wishlist]');
                ?>
            </div>
            <div class="product__grid__action">
                <ul>
                    <li>
                        <a href="<?php the_permalink() ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo esc_attr('icon'); ?>" tabindex="0" data-bs-original-title="Add To Compare">
                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M304 160l-64-64 64-64M207 352l64 64-64 64"/><circle cx="112" cy="96" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="400" cy="416" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 96h84a60 60 0 0160 60v212M255 416h-84a60 60 0 01-60-60V144" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
                            </svg>
                        </a>
                    </li>
                    <li>
                        <?php $iddd = get_the_ID(); echo do_shortcode( '[add_to_cart id='.$iddd.']' );?>
                    </li>
                    <li>
                        <span data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo esc_attr($id); ?>">
                            <button href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo esc_attr('icon'); ?>" tabindex="0" data-bs-original-title="Quick View">
                                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                            </button>
                        </span>
                    </li>
                </ul>
            </div>


        </div>
        <div class="gridarea__content">

            <div class="gridarea__heading">
                <h3><a href="<?php the_permalink() ?>"><?php the_title();?></a></h3>
            </div>
            <div class="gridarea__price">
                <?php echo wp_kses_post($product->get_price_html()); ?>
            </div>
            <div class="gridarea__bottom">

                    <?php 
                    $cates = get_the_terms(get_the_ID(), 'product_tag');

					if (!empty($cates) && !is_wp_error($cates)) {
					    $first_cate = $cates[0];
					    echo esc_html($first_cate->name);
					}
                    ?>

                <div class="gridarea__star">
                    <?php
					if ( function_exists( 'woocommerce_template_single_rating' ) ) {
					    woocommerce_template_single_rating();
					}
					?>
                </div>
            </div>
        </div>
    </div>
</div>
	


