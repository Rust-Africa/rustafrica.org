<?php
/**
 * The Template for displaying all single products
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/single-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see         https://woocommerce.com/document/template-structure/
 * @package     WooCommerce\Templates
 * @version     1.6.4
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit; // Exit if accessed directly
}

get_header( 'shop' ); ?>
<?php if(isset($bastun_redux_demo['image_product']['url']) && $bastun_redux_demo['image_product']['url'] != ''){?>
<div class="breadcrumbarea" style="background: url(<?php echo esc_url($bastun_redux_demo['image_product']['url']); ?>);">
<?php }else{ ?>
<div class="breadcrumbarea" style="background: url(<?php echo esc_url(get_template_directory_uri());?>/img/about/about__bg__1.jpg);">
<?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-xl-12" data-aos="fade-up" data-aos-duration="1500">
                <div class="breadcrumbarea__content__wraper">
                    <div class="breadcrumbarea__title">
                        <h2 class="heading"><?php if(isset($bastun_redux_demo['product_details'])){?>
                                <?php echo esc_attr($bastun_redux_demo['product_details']);?>
                                <?php }else{?>
                                <?php echo esc_html__( 'Product Details', 'bastun' ); } ?> </h2>
                    </div>
                    <div class="breadcrumbarea__inner">
                        <ul>
                            <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php if(isset($bastun_redux_demo['home'])){?>
                                <?php echo esc_attr($bastun_redux_demo['home']);?>
                                <?php }else{?>
                                <?php echo esc_html__( 'Home', 'bastun' ); } ?></a></li>
                            <li><?php echo esc_html__( '//', 'bastun' ); ?> </li>
                            <li><?php if(isset($bastun_redux_demo['product_details'])){?>
                                <?php echo esc_attr($bastun_redux_demo['product_details']);?>
                                <?php }else{?>
                                <?php echo esc_html__( 'Product Details', 'bastun' ); } ?> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php while ( have_posts() ) : ?>
	<?php the_post(); ?>

	<?php wc_get_template_part( 'content', 'single-product' ); ?>

<?php endwhile; // end of the loop. ?>

<div class="gridarea__2 sp_bottom_140" data-aos="fade-up">
    <div class="container">

        <div class="row">
            <div class="col-xl-12" data-aos="fade-up" data-aos-duration="1500">
                <div class="section__title text-center sp_bottom_60">
                    <div class="section__title__button">
                        <span class="text__gradient "><?php if(isset($bastun_redux_demo['subtitle_related'])){?>
                                <?php echo esc_attr($bastun_redux_demo['subtitle_related']);?>
                                <?php }else{?>
                                <?php echo esc_html__( 'Best Collection', 'bastun' ); } ?></span>
                    </div>
                    <div class="section__title__heading">
                        <h3><?php if(isset($bastun_redux_demo['title_related'])){?>
                                <?php echo esc_attr($bastun_redux_demo['title_related']);?>
                                <?php }else{?>
                                <?php echo esc_html__( 'RELATED PRODUCTS', 'bastun' ); } ?></h3>
                    </div>
                </div>
            </div>
        </div>

        <div class="row row__custom__class position-relative">

            <div class="swiper featured__course">
                <div class="swiper-wrapper">
                    <?php
                    	$idd=0;
                        $args = array(    
                            'paged' => $paged,
                            'post_type' => 'product',
                            'orderby' =>'ID',
                            'order' => 'ASC',
                            );
                        $wp_query = new WP_Query($args);
                        while (have_posts()): the_post();
                       	$idd ++;
                    ?>
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12 grid-item column__custom__class swiper-slide">
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
                                        	<?php $id = get_the_ID(); echo do_shortcode( '[add_to_cart id='.$id.']' );?>
                                        </li>
                                        <li>
                                            <span data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo esc_attr($idd); ?>">
                                                <a href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="<?php echo esc_attr('icon'); ?>" tabindex="0" data-bs-original-title="Quick View">
                                                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path d="M255.66 112c-77.94 0-157.89 45.11-220.83 135.33a16 16 0 00-.27 17.77C82.92 340.8 161.8 400 255.66 400c92.84 0 173.34-59.38 221.79-135.25a16.14 16.14 0 000-17.47C428.89 172.28 347.8 112 255.66 112z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg>
                                                </a>
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

                                    <div>
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
                    <?php endwhile; ?>
                    


                </div>

            </div>

            <div class="slider__controls__wrap slider__controls__pagination slider__controls__arrows">
                <div class="swiper-button-next arrow-btn arrow-btn-2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.4297 5.92999L20.4997 12L14.4297 18.07" stroke="#fff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M3.5 12H20.33" stroke="#fff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                        
                </div>
                <div class="swiper-button-prev arrow-btn arrow-btn-2">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.57031 5.92999L3.50031 12L9.57031 18.07" stroke="#fff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M20.5 12H3.67" stroke="#fff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                </div>
                <!-- <div class="swiper-pagination"></div> -->
            </div>

        </div>
    </div>
</div>
<?php
	$idd=0;
    $args = array(    
        'paged' => $paged,
        'post_type' => 'product',
        'orderby' =>'ID',
        'order' => 'ASC',
        );
    $wp_query = new WP_Query($args);
    while (have_posts()): the_post();
   	$idd ++;
?>
<div class="grid__quick__view__modal modalarea modal fade" id="exampleModal<?php echo esc_attr($idd); ?>" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog modal__wraper">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">

                    <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                        <div class="featurearea__details__img">
                            <div class="swiper modal__gallery__big">
                                <?php
                                global $product;
                                    $attachment_ids = $product->get_gallery_image_ids();
                                    $attr = $product->get_title();
                                    echo '<div class="featurearea__big__img--modal swiper-wrapper">';
                                    foreach( array_slice( $attachment_ids,0,10) as $attachment_id ) {
                                        $thumbnail_url = wp_get_attachment_image_src( $attachment_id,'full' )[0];
                                        echo '<div class="featurearea__single__big__img swiper-slide" data-thumb="' . $thumbnail_url . '">
                                                <img loading="lazy"  src="' . $thumbnail_url . '" alt="' . 'Product Big Img' . '">
                                            </div>';
                                    }
                                    echo '</div>';
                                ?>
                            </div>


                            <div thumbsSlider="" class="swiper modal__gallery">
                                    <?php
                                global $product;
                                    $attachment_ids = $product->get_gallery_image_ids();
                                    $attr = $product->get_title();
                                    echo '<div class="featurearea__thumb__img--modal swiper-wrapper">';
                                    foreach( array_slice( $attachment_ids,0,10) as $attachment_id ) {
                                        $thumbnail_url = wp_get_attachment_image_src( $attachment_id,'full' )[0];
                                        echo '<div class="featurearea__single__thumb__img swiper-slide" data-thumb="' . $thumbnail_url . '">
                                                <img loading="lazy"  src="' . $thumbnail_url . '" alt="' . 'Product Big Img' . '">
                                            </div>';
                                    }
                                    echo '</div>';
                                ?>
                            </div>

                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-6 col-md-6 col-12">
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
								<?php $title_category = get_post_meta(get_the_ID(),'_cmb_title_category', true); ?>
								<?php $title_color = get_post_meta(get_the_ID(),'_cmb_title_color', true); ?>
								<?php $color = get_post_meta(get_the_ID(),'_cmb_color', true); ?>
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
</div>
<?php endwhile; ?>
<?php
get_footer( 'shop' );