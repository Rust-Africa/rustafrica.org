<?php
namespace BdevsElementor\Widget;

use Elementor\Controls_Manager;
use Elementor\Group_Control_Typography;
use Elementor\Scheme_Typography;
use Elementor\Group_Control_Border;
use Elementor\Group_Control_Box_Shadow;

/**
 * Bdevs Elementor Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class BdevsProductHome9 extends \Elementor\Widget_Base {

	/**
	 * Get widget name.
	 *
	 * Retrieve Bdevs Elementor widget name.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget name.
	 */
	public function get_name() {
		return 'bdevs-product-home9';
	}

	/**
	 * Get widget title.
	 *
	 * Retrieve Bdevs Elementor widget title.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget title.
	 */
	public function get_title() {
		return __( 'Product Home 9', 'bdevs-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bdevs Slider widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-slideshow';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Bdevs Slider widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'home-9-elementor' ];
	}

	public function get_keywords() {
		return [ 'Product', 'carousel' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
	}
	
	// BDT Position
	protected function element_pack_position() {
	    $position_options = [
	        ''              => esc_html__('Default', 'bdevs-elementor'),
	        'top-left'      => esc_html__('Top Left', 'bdevs-elementor') ,
	        'top-center'    => esc_html__('Top Center', 'bdevs-elementor') ,
	        'top-right'     => esc_html__('Top Right', 'bdevs-elementor') ,
	        'center'        => esc_html__('Center', 'bdevs-elementor') ,
	        'center-left'   => esc_html__('Center Left', 'bdevs-elementor') ,
	        'center-right'  => esc_html__('Center Right', 'bdevs-elementor') ,
	        'bottom-left'   => esc_html__('Bottom Left', 'bdevs-elementor') ,
	        'bottom-center' => esc_html__('Bottom Center', 'bdevs-elementor') ,
	        'bottom-right'  => esc_html__('Bottom Right', 'bdevs-elementor') ,
	    ];

	    return $position_options;
	}

	protected function _register_controls() {
		$this->start_controls_section(
			'section_content_Producthome9',
			[
				'label' => esc_html__( 'Product Home 9', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'subheading',
			[
				'label'       => __( 'Subheading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your sub heading', 'bdevs-elementor' ),
				'default'     => __( 'Featured Collection', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);		

		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'CORPORATE PRODUCTS.', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'post_number',
			[
				'label'     => esc_html__( 'Post Count', 'bdevs-elementor' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => '6',
			]
		);
		$this->add_control(
			'orderpost',
			[
				'label'     => esc_html__( 'Post Order', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'asc'  => esc_html__( 'ASC', 'bdevs-elementor' ),
					'desc' => esc_html__( 'DESC', 'bdevs-elementor' ),
				],
				'default'   => 'desc',
			]
		);

		$this->add_control(
			'orderby',
			[
				'label'     => esc_html__( 'Order By', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'date'  => esc_html__( 'Date', 'bdevs-elementor' ),
					'title' => esc_html__( 'Title', 'bdevs-elementor' ),
					'rand' => esc_html__( 'Random', 'bdevs-elementor' ),
				],
				'default'   => '',
			]
		);
		
		$this->end_controls_section();
		$this->start_controls_section(
			'section_content_layout',
			[
				'label' => esc_html__( 'Layout', 'bdevs-elementor' ),
			]
		);

		$this->add_responsive_control(
			'align',
			[
				'label'   => esc_html__( 'Alignment', 'bdevs-elementor' ),
				'type'    => Controls_Manager::CHOOSE,
				'options' => [
					'left' => [
						'title' => esc_html__( 'Left', 'bdevs-elementor' ),
						'icon'  => 'fa fa-align-left',
					],
					'center' => [
						'title' => esc_html__( 'Center', 'bdevs-elementor' ),
						'icon'  => 'fa fa-align-center',
					],
					'right' => [
						'title' => esc_html__( 'Right', 'bdevs-elementor' ),
						'icon'  => 'fa fa-align-right',
					],
					'justify' => [
						'title' => esc_html__( 'Justified', 'bdevs-elementor' ),
						'icon'  => 'fa fa-align-justify',
					],
				],
				'prefix_class' => 'elementor%s-align-',
				'description'  => 'Use align to match position',
				'default'      => 'left',
			]
		);
		

		$this->end_controls_section();

	}

	public function render() {

		$settings  = $this->get_settings_for_display();
		$wp_query = new \WP_Query(array('post_type' => 'product', 'posts_per_page' => $settings['post_number'],'orderby' => $settings['orderby'], 'order' => $settings['orderpost'],));
		extract($settings);
		?> 
<section class="woocommerce featured__collection sp_top_120 sp_bottom_120" id="featured__collection">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section__title text-center sp_bottom_50" data-aos="fade-up" data-aos-duration="1800">
                	<?php if ( '' !== $settings['subheading'] )  : ?>
                    <div class="section__title__button">
                        <span class="text__gradient"><?php print wp_kses_post($settings['subheading']); ?></span>
                    </div>
                    <?php endif; ?>
                    <?php if ( '' !== $settings['heading'] )  : ?>
                    <div class="section__title__heading">
                        <h3><?php print wp_kses_post($settings['heading']); ?></h3>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row row__custom__class position-relative" data-aos="fade-up" data-aos-duration="2200">

            <div class="team__slider__active swiper">
                <div class="swiper-wrapper">
                	<?php 
                	$idd=0;
					while ($wp_query -> have_posts()) : $wp_query -> the_post();
						$product = wc_get_product(get_the_ID());
					$idd ++;
					?>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 column__custom__class swiper-slide">
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
                                            <a href="<?php the_permalink() ?>" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Add To Compare">
                                                <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M304 160l-64-64 64-64M207 352l64 64-64 64"/><circle cx="112" cy="96" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="400" cy="416" r="48" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 96h84a60 60 0 0160 60v212M255 416h-84a60 60 0 01-60-60V144" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/>
                                                </svg>
                                            </a>
                                        </li>
                                        <li>
                                            <?php $id = get_the_ID(); echo do_shortcode( '[add_to_cart id='.$id.']' );?>
                                        </li>
                                        <li>
                                            <span data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo esc_attr($idd); ?>">
                                                <button href="#" data-bs-toggle="tooltip" data-bs-placement="top" title="" tabindex="0" data-bs-original-title="Quick View">
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
                                    <?php echo $product->get_price_html(); ?>
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



					
                    <!-- single product end -->
                    <?php endwhile; ?>
                    <!-- single product start -->

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
            </div>

        </div>
    </div>
</section>
<?php 
$idd=0;
$wp_query = new \WP_Query(array(
	'post_type' => 'product', 
	'posts_per_page' => $settings['post_number'],
	'orderby' => $settings['orderby'], 
	'order' => $settings['orderpost'],));
while ($wp_query -> have_posts()) : $wp_query -> the_post();
    $product = wc_get_product(get_the_ID());
$idd ++;
?>
<div class="woocommerce grid__quick__view__modal modalarea modal fade" id="exampleModal<?php echo esc_attr($idd); ?>" tabindex="-1" aria-labelledby="exampleModal<?php echo esc_attr($idd); ?>" aria-hidden="true">
    <div class="modal-dialog modal__wraper">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            <div class="modal-body">
                <div class="row">
                    <div class="col-xl-6 col-lg-6 col-md-6 col-12">
            <div class="featurearea__details__img">
                <div class="swiper">
                    <div class="featurearea__big__img--modal swiper-wrapper">
                        <div class="featurearea__single__big__img swiper-slide">
                            <img  src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="">
                        </div>
                        
                    </div>
                </div>


                <div thumbsSlider="" class="swiper modal__gallery">
                    <div class=" featurearea__thumb__img--modal swiper-wrapper">
                        <?php
                        global $product;
                            $attachment_ids = $product->get_gallery_attachment_ids();
                            $attr = $product->get_title();
                            echo '';
                            foreach( array_slice( $attachment_ids,0,10) as $attachment_id ) {
                                $thumbnail_url = wp_get_attachment_image_src( $attachment_id,'full' )[0];
                                echo '<div class="featurearea__single__thumb__img swiper-slide">
                                        <img  src="' . $thumbnail_url . '" alt="">
                                    </div>';
                            }
                            echo '';
                        ?>
                    </div>
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
									<span><?php echo esc_attr($title_category) ?></span>
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
									<span><?php echo esc_attr($title_color) ?></span>
									<?php echo esc_attr($color) ?>
								</div>
								<div class="featurearea__size__img">
									<?php
									global $product;
										$attachment_ids = $product->get_gallery_attachment_ids();
										$attr = $product->get_title();
										echo '<ul>';
										foreach( array_slice( $attachment_ids,0,10) as $attachment_id ) {
											$thumbnail_url = wp_get_attachment_image_src( $attachment_id,'full' )[0];
											echo '<li><a class="glightbox" href="' . $thumbnail_url . '" data-thumb="' . $thumbnail_url . '">
													<img loading="lazy"  src="' . $thumbnail_url . '" alt=""></a>
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
<?php if (is_admin()) { ?>
<script type="text/javascript">
	var swiper = new Swiper(".team__slider__active", {
  grabCursor: true,
  navigation: {
      nextEl: ".swiper--buttonnext",
      prevEl: ".swiper-button-prev",
  },
  slidesPerView: 1,
  breakpoints: {
      575: {
        slidesPerView: 1,
      },

      768: {
        slidesPerView: 2,
      },

      992: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 4
      },
      1500: {
          slidesPerView: 4
      }
  },
});

    
</script>
<?php }  ?>
	<?php
	}

}
