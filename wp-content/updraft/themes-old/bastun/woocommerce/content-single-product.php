<?php
/**
 * The template for displaying product content in the single-product.php template
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/content-single-product.php.
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

/**
 * Hook: woocommerce_before_single_product.
 *
 * @hooked woocommerce_output_all_notices - 10
 */
do_action( 'woocommerce_before_single_product' );

if ( post_password_required() ) {
	echo get_the_password_form(); // WPCS: XSS ok.
	return;
}
?>

<div class="featurearea featurearea--2 sp_top_100 sp_bottom_100">
    <div class="">
        <div class="container">
            <div class="row">
          
                <div class="col-xl-6 col-lg-6 col-md-6">

                        <div class="featurearea__details__img products__details__gallery">
                            <div class="swiper details__gallery__big">
                            	<?php
					            global $product;
					                $attachment_ids = $product->get_gallery_image_ids();
					                $attr = $product->get_title();
					                echo '<div class="featurearea__big__img swiper-wrapper">';
					                foreach( array_slice( $attachment_ids,0,10) as $attachment_id ) {
					                    $thumbnail_url = wp_get_attachment_image_src( $attachment_id,'full' )[0];
					                    echo '<div class="featurearea__single__big__img swiper-slide" data-thumb="' . $thumbnail_url . '">
		                                        <img loading="lazy"  src="' . $thumbnail_url . '" alt="Product Big Img">
		                                    </div>';
					                }
					                echo '</div>';
					            ?>
                            </div>

                            <div thumbsSlider="" class="swiper details__gallery">
                            	<?php
					            global $product;
					                $attachment_ids = $product->get_gallery_image_ids();
					                $attr = $product->get_title();
					                echo '<div class="featurearea__thumb__img swiper-wrapper">';
					                foreach( array_slice( $attachment_ids,0,10) as $attachment_id ) {
					                    $thumbnail_url = wp_get_attachment_image_src( $attachment_id,'full' )[0];
					                    echo '<div class="featurearea__single__thumb__img swiper-slide" data-thumb="' . $thumbnail_url . '">
			                                    <img loading="lazy"  src="' . $thumbnail_url . '" alt="Product Big Img">
			                                </div>';
					                }
					                echo '</div>';
					            ?>
                            </div>

                        </div>


                </div>

                <div class="col-xl-6 col-lg-6 col-md-6">
                    <div id="product-<?php the_ID(); ?>" <?php wc_product_class( '', $product ); ?>>

	

					<div class="summary entry-summary">
						<div class="featurearea__small__title">
							<span><?php 
								$cates = get_the_terms(get_the_ID(), 'product_tag');

								if (!empty($cates) && !is_wp_error($cates)) {
									$first_cate = $cates[0];
									echo esc_html($first_cate->name);
								}
							?></span>
                        </div>
						<?php
						remove_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

						do_action('woocommerce_single_product_summary');

						add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
						?>
						<?php $title_time_sale = get_post_meta(get_the_ID(),'_cmb_title_time_sale', true); ?>
						<?php $time_sale = get_post_meta(get_the_ID(),'_cmb_time_sale', true); ?>
						<?php $number_stock = get_post_meta(get_the_ID(),'_cmb_number_stock', true); ?>
						<?php $title_category = get_post_meta(get_the_ID(),'_cmb_title_category', true); ?>
						<?php $title_color = get_post_meta(get_the_ID(),'_cmb_title_color', true); ?>
						<?php $color = get_post_meta(get_the_ID(),'_cmb_color', true); ?>
						<div class="featurearea__countdown__title">
                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="feather feather-clock timer__icon"><circle cx="12" cy="12" r="10"></circle><polyline points="12 6 12 12 16 14"></polyline></svg>
                            <h5><?php echo esc_html($title_time_sale) ?></h5>
                        </div>
                        <div class="featurearea__countdown" data-countdown="<?php echo esc_attr($time_sale) ?>">
					        <div class="count"><p id="days">00</p><span>Days</span></div>
					        <div class="count"><p id="hours">00</p><span>Hrs</span></div>
					        <div class="count"><p id="minutes">00</p><span>Min</span></div>
					        <div class="count"><p id="seconds">00</p><span>Sec</span></div>
					    </div>
                        <div class="featurearea__progress__text">
                            <h6><?php echo esc_html($number_stock) ?></h6>
                            <div class="progress">
                                <div role="progressbar" class="progress-bar wow fadeInLeft" data-wow-duration="0.6s" data-wow-delay=".4s" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100" style="width: 50%; visibility: visible; animation-duration: 0.6s; animation-delay: 0.4s; animation-name: fadeInLeft;"></div>
                            </div>
                        </div>


                        <div class="featurearea__size">
                            <span><?php echo esc_html($title_category) ?></span>
                            <?php 
							$cates = get_the_terms(get_the_ID(), 'product_cat');

							if (!empty($cates) && !is_wp_error($cates)) {
							    $first_cate = $cates[0];
							    $cate_link = get_term_link($first_cate);
							    if (!is_wp_error($cate_link)) {
							        echo '<li class="cate"><a href="' . esc_url($cate_link) . '">' . esc_html($first_cate->name) . '</a></li>';
							    }
							}
							?>
                        </div>
                        <div class="featurearea__size__button">
                          	<ul>
	                            <?php 
								$cates = get_the_terms(get_the_ID(), 'product_cat');

								if (!empty($cates) && !is_wp_error($cates)) {
								    foreach ($cates as $cate) {
								        $cate_link = get_term_link($cate);
								        if (!is_wp_error($cate_link)) {
								            echo '<li class="cate"><a href="' . esc_url($cate_link) . '">' . esc_html($cate->name) . '</a></li>';
								        }
								    }
								}
								?>
                          	</ul>
                        </div>

                        <div class="featurearea__size">
                            <span><?php echo esc_html($title_color) ?></span>
                            <?php echo esc_html($color) ?>
                        </div>
                        <div class="featurearea__size__img">
                          	<?php
				            global $product;
				                $attachment_ids = $product->get_gallery_image_ids();
				                $attr = $product->get_title();
				                echo '<ul>';
				                foreach( array_slice( $attachment_ids,0,10) as $attachment_id ) {
				                    $thumbnail_url = wp_get_attachment_image_src( $attachment_id,'full' )[0];
				                    echo '<li><a class="glightbox" href="' . $thumbnail_url . '" data-thumb="' . $thumbnail_url . '">
		                                    <img loading="lazy"  src="' . $thumbnail_url . '" alt="' . 'thumbnail' . '"></a>
		                                </li>';
				                }
				                echo '</ul>';
				            ?>
                        </div>
						<div class="featurearea__size">
                            <span><?php echo esc_html__('Quantity', 'bastun');?></span>
                        </div>
                        <?php
						remove_all_actions('woocommerce_single_product_summary');
						add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);

						do_action('woocommerce_single_product_summary');

						remove_all_actions('woocommerce_single_product_summary');
						add_action('woocommerce_single_product_summary', 'woocommerce_template_single_title', 5);
						add_action('woocommerce_single_product_summary', 'woocommerce_template_single_rating', 10);
						add_action('woocommerce_single_product_summary', 'woocommerce_template_single_price', 10);
						add_action('woocommerce_single_product_summary', 'woocommerce_template_single_excerpt', 20);
						add_action('woocommerce_single_product_summary', 'woocommerce_template_single_add_to_cart', 30);
						add_action('woocommerce_single_product_summary', 'woocommerce_template_single_meta', 40);
						add_action('woocommerce_single_product_summary', 'woocommerce_template_single_sharing', 50);
						?>
					</div>

					
				</div>

				<?php do_action( 'woocommerce_after_single_product' ); ?>
                </div>

            </div>
        </div>
    </div>
</div>
<div class="descriptionarea sp_bottom_100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12 col-md-12 descriptionarea__tab__wrapper">
	            <?php
				/**
				 * Hook: woocommerce_after_single_product_summary.
				 *
				 * @hooked woocommerce_output_product_data_tabs - 10
				 * @hooked woocommerce_upsell_display - 15
				 * @hooked woocommerce_output_related_products - 20
				 */
				do_action( 'woocommerce_after_single_product_summary' );
				?>
			</div>
        </div>
    </div>
</div>

