<?php
/**
 * The Template for displaying product archives, including the main shop page which is a post type archive
 *
 * This template can be overridden by copying it to yourtheme/woocommerce/archive-product.php.
 *
 * HOWEVER, on occasion WooCommerce will need to update template files and you
 * (the theme developer) will need to copy the new files to your theme to
 * maintain compatibility. We try to do this as little as possible, but it does
 * happen. When this occurs the version of the template file will be bumped and
 * the readme will list any important changes.
 *
 * @see https://woocommerce.com/document/template-structure/
 * @package WooCommerce\Templates
 * @version 8.6.0
 */

defined( 'ABSPATH' ) || exit;
$bastun_redux_demo = get_option('redux_demo');
get_header( );
?>
<?php $style_shop = get_post_meta(get_the_ID(),'_cmb_style_shop', true); ?>
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
                        <h2 class="heading"><?php if(isset($bastun_redux_demo['shop_title'])){?>
                            <?php echo html_entity_decode(esc_attr($bastun_redux_demo['shop_title']));?>
                            <?php }else{?>
                            <?php echo esc_html__( 'Shop', 'bastun' ); } ?></h2>
                    </div>
                    <div class="breadcrumbarea__inner">
                        <ul>
                            <li><a href="<?php echo esc_url(home_url('/')); ?>">
                            	<?php if(isset($bastun_redux_demo['home'])){?>
                                <?php echo esc_attr($bastun_redux_demo['home']);?>
                                <?php }else{?>
                                <?php echo esc_html__( 'Home', 'bastun' ); } ?></a></li>
                            <li><?php echo esc_html__( '//', 'bastun' ); ?></li>
                            <li><?php if(isset($bastun_redux_demo['shop_title'])){?>
                                <?php echo html_entity_decode(esc_attr($bastun_redux_demo['shop_title']));?>
                                <?php }else{?>
                                <?php echo esc_html__( 'Shop', 'bastun' ); } ?></li>
                        </ul>
                    </div>
                </div>



            </div>
        </div>
    </div>
</div>


<section class="shop__page__wrap sp_top_100 sp_bottom_140">
    <div class="container">


        <div class="row row__custom__class">
            <div class="col-xl-12 column__custom__class">
                <div class="shoptab" data-aos="fade-up" data-aos-duration="1500">
                    <div class="shoptab__inner nav">


                        <ul class="nav" id="myTab" role="tablist">
                            <?php if($style_shop=='2column'){?>
                            <li class="nav-item" role="presentation">
                                <button data-bs-toggle="tab" class="active" data-bs-target="#grid__view" type="button">
                                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 5.5 12.5">
                                        <defs></defs><defs></defs><g data-name="Layer 2"><g data-name="Layer 1"><g data-name="shop page"><g id="Group-10"><path d="M.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11A.76.76 0 01.75 0z" class="cls-1"></path><path d="M4.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11A.76.76 0 014.75 0z" class="cls-1" data-name="Rectangle"></path></g></g></g></g>
                                        </svg>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button data-bs-toggle="tab" data-bs-target="#list_view" type="button">
                                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9.5 12.5">
                                        <defs></defs><defs><style>.cls-1{fill-rule:evenodd}</style></defs><g data-name="Layer 2"><g data-name="Layer 1"><g data-name="shop page"><g id="Group-16"><path d="M.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11A.76.76 0 01.75 0z" class="cls-1"></path><path d="M4.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11A.76.76 0 014.75 0z" class="cls-1" data-name="Rectangle"></path><path d="M8.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11A.76.76 0 018.75 0z" class="cls-1" data-name="Rectangle"></path></g></g></g></g>
                                        </svg>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button data-bs-toggle="tab" data-bs-target="#list_four" type="button" class="">
                                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13.5 12.5">
                                        <defs></defs><defs><style>.cls-1{fill-rule:evenodd}</style></defs><g data-name="Layer 2"><g data-name="Layer 1"><g data-name="shop page"><g id="_4_col" data-name="4_col"><path d="M.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11A.76.76 0 01.75 0z" class="cls-1"></path><path d="M4.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11A.76.76 0 014.75 0z" class="cls-1" data-name="Rectangle"></path><path d="M8.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11A.76.76 0 018.75 0z" class="cls-1" data-name="Rectangle"></path><path id="Rectangle-4" d="M12.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11a.76.76 0 01.75-.75z" class="cls-1" data-name="Rectangle"></path></g></g></g></g>
                                        </svg>
                                </button>
                            </li>
                            <?php } elseif($style_shop=='4column') { ?>
                            <li class="nav-item" role="presentation">
                                <button data-bs-toggle="tab" data-bs-target="#grid__view" type="button">
                                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 5.5 12.5">
                                        <defs></defs><defs></defs><g data-name="Layer 2"><g data-name="Layer 1"><g data-name="shop page"><g id="Group-10"><path d="M.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11A.76.76 0 01.75 0z" class="cls-1"></path><path d="M4.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11A.76.76 0 014.75 0z" class="cls-1" data-name="Rectangle"></path></g></g></g></g>
                                        </svg>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button data-bs-toggle="tab" data-bs-target="#list_view" type="button">
                                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9.5 12.5">
                                        <defs></defs><defs><style>.cls-1{fill-rule:evenodd}</style></defs><g data-name="Layer 2"><g data-name="Layer 1"><g data-name="shop page"><g id="Group-16"><path d="M.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11A.76.76 0 01.75 0z" class="cls-1"></path><path d="M4.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11A.76.76 0 014.75 0z" class="cls-1" data-name="Rectangle"></path><path d="M8.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11A.76.76 0 018.75 0z" class="cls-1" data-name="Rectangle"></path></g></g></g></g>
                                        </svg>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="active" data-bs-toggle="tab" data-bs-target="#list_four" type="button" class="">
                                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13.5 12.5">
                                        <defs></defs><defs><style>.cls-1{fill-rule:evenodd}</style></defs><g data-name="Layer 2"><g data-name="Layer 1"><g data-name="shop page"><g id="_4_col" data-name="4_col"><path d="M.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11A.76.76 0 01.75 0z" class="cls-1"></path><path d="M4.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11A.76.76 0 014.75 0z" class="cls-1" data-name="Rectangle"></path><path d="M8.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11A.76.76 0 018.75 0z" class="cls-1" data-name="Rectangle"></path><path id="Rectangle-4" d="M12.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11a.76.76 0 01.75-.75z" class="cls-1" data-name="Rectangle"></path></g></g></g></g>
                                        </svg>
                                </button>
                            </li>
                            <?php } else { ?>
                            <li class="nav-item" role="presentation">
                                <button data-bs-toggle="tab" data-bs-target="#grid__view" type="button">
                                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 5.5 12.5">
                                        <defs></defs><defs></defs><g data-name="Layer 2"><g data-name="Layer 1"><g data-name="shop page"><g id="Group-10"><path d="M.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11A.76.76 0 01.75 0z" class="cls-1"></path><path d="M4.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11A.76.76 0 014.75 0z" class="cls-1" data-name="Rectangle"></path></g></g></g></g>
                                        </svg>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button class="active" data-bs-toggle="tab" data-bs-target="#list_view" type="button">
                                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 9.5 12.5">
                                        <defs></defs><defs><style>.cls-1{fill-rule:evenodd}</style></defs><g data-name="Layer 2"><g data-name="Layer 1"><g data-name="shop page"><g id="Group-16"><path d="M.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11A.76.76 0 01.75 0z" class="cls-1"></path><path d="M4.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11A.76.76 0 014.75 0z" class="cls-1" data-name="Rectangle"></path><path d="M8.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11A.76.76 0 018.75 0z" class="cls-1" data-name="Rectangle"></path></g></g></g></g>
                                        </svg>
                                </button>
                            </li>
                            <li class="nav-item" role="presentation">
                                <button data-bs-toggle="tab" data-bs-target="#list_four" type="button" class="">
                                    <svg fill="currentColor" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 13.5 12.5">
                                        <defs></defs><defs><style>.cls-1{fill-rule:evenodd}</style></defs><g data-name="Layer 2"><g data-name="Layer 1"><g data-name="shop page"><g id="_4_col" data-name="4_col"><path d="M.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11A.76.76 0 01.75 0z" class="cls-1"></path><path d="M4.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11A.76.76 0 014.75 0z" class="cls-1" data-name="Rectangle"></path><path d="M8.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11A.76.76 0 018.75 0z" class="cls-1" data-name="Rectangle"></path><path id="Rectangle-4" d="M12.75 0a.76.76 0 01.75.75v11a.76.76 0 01-.75.75.76.76 0 01-.75-.75v-11a.76.76 0 01.75-.75z" class="cls-1" data-name="Rectangle"></path></g></g></g></g>
                                        </svg>
                                </button>
                            </li>
                            <?php } ?>
                        </ul>



                    </div>
                    <div class="shoptab__shoing__wrap">
                        <div class="shoptab__select">
							<label for="SortBy">Sort by :</label>
                            <?php
							/**
							 * woocommerce_before_shop_loop hook.
							 *
							 * @hooked woocommerce_result_count - 20
							 * @hooked woocommerce_catalog_ordering - 30
							 */
							do_action( 'woocommerce_before_shop_loop' );
							?>
                        </div>
                    </div>


                </div>
            </div>
        </div>


        <div class="row row__custom__class">



            <div class="col-xl-3 col-lg-4 col-md-12 column__custom__class">
                <div class="shopsidebar" data-aos="fade-up" data-aos-duration="1800">
                    <div class="sidebar-collapse-hide">
                        <?php if ( is_active_sidebar( 'sidebar-shop' ) ) : ?>
                            <?php dynamic_sidebar( 'sidebar-shop' ); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>



            <div class="col-xl-9 col-lg-8 col-md-12 column__custom__class">

                <div class="tab-content" id="myTabContent" data-aos="fade-up" data-aos-duration="2000">
                    
                        <div class="tab-pane fade" id="grid__view">

                        <div class="row row__custom__class">

							
                            <!-- single product start -->
                            <?php if ( have_posts() ) : ?>

                            <?php woocommerce_product_loop_start(); ?>

                            <?php woocommerce_product_subcategories(); ?>

                            <?php
								$idd = 0;
								while (have_posts()) : the_post();
								$idd++;
							?>

                                <?php wc_get_template_part( 'content', 'product' ); ?>

                            <?php
								endwhile;
							?>

                            <?php woocommerce_product_loop_end(); ?>

                            <?php
                            /**
                             * woocommerce_after_shop_loop hook.
                             *
                             * @hooked woocommerce_result-count - 9
                             * @hooked woocommerce_pagination - 10
                             */
                            do_action( 'woocommerce_after_shop_loop' );
                            ?>
                            <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

                            <?php wc_get_template( 'loop/no-products-found.php' ); ?>

                            <?php endif; ?>
                            <!-- single product end -->


                        </div>
                    </div>

                    <div class="tab-pane fade active show" id="list_view">
                        <div class="row row__custom__class">

                            <!-- single product start -->
                        <!-- single product start -->
                            <?php if ( have_posts() ) : ?>

                            <?php woocommerce_product_loop_start(); ?>

                            <?php woocommerce_product_subcategories(); ?>

                            <?php
								$idd = 0;
								while (have_posts()) : the_post();
								$idd++;
							?>

                                <?php wc_get_template_part( 'content-2', 'product' ); ?>

                            <?php
								endwhile;
							?>

                            <?php woocommerce_product_loop_end(); ?>

                            <?php
                            /**
                             * woocommerce_after_shop_loop hook.
                             *
                             * @hooked woocommerce_result-count - 9
                             * @hooked woocommerce_pagination - 10
                             */
                            do_action( 'woocommerce_after_shop_loop' );
                            ?>
                            <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

                            <?php wc_get_template( 'loop/no-products-found.php' ); ?>

                            <?php endif; ?>
                            <!-- single product end -->


                        </div>
                    </div>


                    <div class="tab-pane fade" id="list_four">
                        <div class="row row__custom__class">

                            <!-- single product start -->
                            <!-- single product start -->
                            <?php if ( have_posts() ) : ?>

                            <?php woocommerce_product_loop_start(); ?>

                            <?php woocommerce_product_subcategories(); ?>

                            <?php
								$idd = 0;
								while (have_posts()) : the_post();
								$idd++;
							?>

                                <?php wc_get_template_part( 'content-3', 'product' ); ?>

                            <?php
								endwhile;
							?>

                            <?php woocommerce_product_loop_end(); ?>

                            <?php
                            /**
                             * woocommerce_after_shop_loop hook.
                             *
                             * @hooked woocommerce_result-count - 9
                             * @hooked woocommerce_pagination - 10
                             */
                            do_action( 'woocommerce_after_shop_loop' );
                            ?>
                            <?php elseif ( ! woocommerce_product_subcategories( array( 'before' => woocommerce_product_loop_start( false ), 'after' => woocommerce_product_loop_end( false ) ) ) ) : ?>

                            <?php wc_get_template( 'loop/no-products-found.php' ); ?>

                            <?php endif; ?>
                            <!-- single product end -->


                        </div>
                    </div>
                    
                </div>

                
            </div>
    </div>
    </div>
</section>

<?php
	$idd=0;
	    while (have_posts()): the_post();
   	$idd ++;
   	$id = get_the_ID();
?>
<div class="grid__quick__view__modal modalarea modal fade" id="exampleModal<?php echo esc_attr($id); ?>" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
    <div class="modal-dialog modal__wraper">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="<?php echo esc_attr( 'Close', 'bastun' ); ?>"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                        <div class="featurearea__details__img">
                            <div class="swiper">
			                    <div class="featurearea__big__img--modal swiper-wrapper">
			                        <div class="featurearea__single__big__img swiper-slide">
			                            <img  src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="<?php the_title_attribute(); ?>">
			                        </div>
			                        
			                    </div>
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
                                                <img loading="lazy"  src="' . $thumbnail_url . '" alt="Product Big Img">
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


<?php get_footer(); ?>