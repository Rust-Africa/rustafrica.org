<?php
/*
 * Template Name: Shop Two Column
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
<section class="woocommerce woocommerce-shop shop__page__wrap sp_top_100 sp_bottom_140">
    <div class="container">
        <div class="row row__custom__class">
            <div class="col-xl-12 column__custom__class">
                <div class="shoptab" data-aos="fade-up" data-aos-duration="1500">
                    
                    <div class="shoptab__shoing__wrap">
                        <div class="shoptab__select d-flex">
                            <label for="SortBy">Sort by :</label>
                            <?php echo do_shortcode( '[custom_woocommerce_ordering]' ); ?>
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
                    <div class="tab-pane fade active show" id="grid__view">

                        <div class="row row__custom__class">
                            <?php if ( have_posts() ) : ?>

							<?php woocommerce_product_loop_start(); ?>

							<?php woocommerce_product_subcategories(); ?>

							<?php 
		                	$idd=0;
		                	$wp_query = new \WP_Query(array(
								'post_type' => 'product',
								'posts_per_page' => '6',
								'order' => 'asc',
							));
							while ($wp_query -> have_posts()) : $wp_query -> the_post();
								$product = wc_get_product(get_the_ID());
								$id = get_the_ID();
							$idd ++;
							?>

								<?php wc_get_template_part( 'content', 'product' ); ?>

							<?php endwhile; // end of the loop. ?>

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
                        </div>
                    </div>

                    
                <div class="pagination" data-aos="fade-up" data-aos-duration="1500">
                        <?php 
                        $pagination = array(
                        'base'      => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
                        'format'    => '',
                        'prev_text' => wp_specialchars_decode('<i class="icofont-simple-left"></i>',ENT_QUOTES),
                        'next_text' => wp_specialchars_decode('<i class="icofont-simple-right"></i>',ENT_QUOTES),
                        'type'      => 'list',
                        'end_size'    => 3,
                        'mid_size'    => 3
                        );
                        if(paginate_links( $pagination ) != ''){
                            $return =  paginate_links( $pagination );
                            echo str_replace( "<ul class='page-numbers'>", '<ul class="pagination">', $return );
                        }
                    ?>
                </div>
            </div>
    	</div>
    </div>
</section>


<?php
get_footer();
?>