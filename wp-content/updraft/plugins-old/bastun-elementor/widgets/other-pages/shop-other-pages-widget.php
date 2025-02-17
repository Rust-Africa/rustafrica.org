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
class BdevsShopPages extends \Elementor\Widget_Base {

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
		return 'bdevs-shop-other-pages';
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
		return __( 'Shop Other Pages', 'bdevs-elementor' );
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
		return [ 'other-pages-elementor' ];
	}

	public function get_keywords() {
		return [ 'Shop Other Pages', 'carousel' ];
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
			'section_content_aboutShopInfo',
			[
				'label' => esc_html__( 'Shop Other Pages', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'style_shop',
			[
				'label'     => esc_html__( 'Style Shop', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'2column'  => esc_html__( 'Shop 2 Column', 'bdevs-elementor' ),
					'3column' => esc_html__( 'Shop 3 Column', 'bdevs-elementor' ),
					'4column' => esc_html__( 'Shop 4 Column', 'bdevs-elementor' ),
				],
				'default'   => '2column',
			]
		);
		$this->add_control(
			'post_number_two_column',
			[
				'label'     => esc_html__( 'Post Count Two Column', 'bdevs-elementor' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => '6',
			]
		);
		$this->add_control(
			'post_number_three_column',
			[
				'label'     => esc_html__( 'Post Count Three Column', 'bdevs-elementor' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => '9',
			]
		);
		$this->add_control(
			'post_number_four_column',
			[
				'label'     => esc_html__( 'Post Count Four Column', 'bdevs-elementor' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => '16',
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
				'default'   => 'desc',
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
		$wp_query = new \WP_Query(array('post_type' => 'product','orderby' => $settings['orderby'], 'order' => $settings['orderpost'],));
		extract($settings);
		?>  
<section class="woocommerce shop__page__wrap sp_top_100 sp_bottom_140">
    <div class="container">


        <div class="row row__custom__class">
            <div class="col-xl-12 column__custom__class">
                <div class="shoptab" data-aos="fade-up" data-aos-duration="1500">
                    <div class="shoptab__inner nav">


                        <ul class="nav" id="myTab" role="tablist">
                            <?php if($settings['style_shop']=='2column'){?>
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
                            <?php } elseif($settings['style_shop']=='4column') { ?>
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
                    <div class="woocommerce shoptab__shoing__wrap">
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
                    <?php if($settings['style_shop']=='2column'){?>
                    <div class="tab-pane fade active show" id="grid__view">

                        <div class="row row__custom__class">


                            <!-- single product start -->
                            <?php 
		                	$idd=0;
		                	$wp_query = new \WP_Query(array(
								'post_type' => 'product',
								'posts_per_page' => $settings['post_number_two_column'],
								'order' => $settings['orderpost'],
							));
							while ($wp_query -> have_posts()) : $wp_query -> the_post();
								$product = wc_get_product(get_the_ID());
								$id = get_the_ID();
							$idd ++;
							?>
		                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 column__custom__class">
		                        <div class="gridarea__wraper product__grid">
		                            <div class="gridarea__img">
		                                <a href="<?php the_permalink() ?>"><img loading="lazy"  src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="grid"></a>

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
		                                            <span data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo esc_attr($id); ?>">
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


                        </div>
                    </div>

                    <div class="tab-pane fade " id="list_view">
                        <div class="row row__custom__class">

                            <!-- single product start -->
                        <!-- single product start -->
                            <?php 
		                	$idd=0;
		                	$wp_query = new \WP_Query(array(
								'post_type' => 'product',
								'posts_per_page' => $settings['post_number_three_column'],
								'order' => $settings['orderpost'],
							));
							while ($wp_query -> have_posts()) : $wp_query -> the_post();
								$product = wc_get_product(get_the_ID());
								$id = get_the_ID();
							$idd ++;
							?>
							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 column__custom__class">
		                        <div class="gridarea__wraper product__grid">
		                            <div class="gridarea__img">
		                                <a href="<?php the_permalink() ?>"><img loading="lazy"  src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="grid"></a>

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
		                                            <span data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo esc_attr($id); ?>">
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


                        </div>
                    </div>


                    <div class="tab-pane fade" id="list_four">
                        <div class="row row__custom__class">

                            <?php 
		                	$idd=0;
		                	$wp_query = new \WP_Query(array(
								'post_type' => 'product',
								'posts_per_page' => $settings['post_number_four_column'],
								'order' => $settings['orderpost'],
							));
							while ($wp_query -> have_posts()) : $wp_query -> the_post();
								$product = wc_get_product(get_the_ID());
								$id = get_the_ID();
							$idd ++;
							?>
							<div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 column__custom__class column__custom__class_4_column ">
		                        <div class="gridarea__wraper product__grid">
		                            <div class="gridarea__img">
		                                <a href="<?php the_permalink() ?>"><img loading="lazy"  src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="grid"></a>

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
		                                            <span data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo esc_attr($id); ?>">
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


                        </div>
                    </div>
                    <?php } elseif($settings['style_shop']=='4column') { ?>
                    <div class="tab-pane fade" id="grid__view">

                        <div class="row row__custom__class">


                            <?php 
		                	$idd=0;
		                	$wp_query = new \WP_Query(array(
								'post_type' => 'product',
								'posts_per_page' => $settings['post_number_two_column'],
								'order' => $settings['orderpost'],
							));
							while ($wp_query -> have_posts()) : $wp_query -> the_post();
								$product = wc_get_product(get_the_ID());
								$id = get_the_ID();
							$idd ++;
							?>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 column__custom__class">
		                        <div class="gridarea__wraper product__grid">
		                            <div class="gridarea__img">
		                                <a href="<?php the_permalink() ?>"><img loading="lazy"  src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="grid"></a>

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
		                                            <span data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo esc_attr($id); ?>">
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


                        </div>
                    </div>

                    <div class="tab-pane fade " id="list_view">
                        <div class="row row__custom__class">

                            <?php 
		                	$idd=0;
		                	$wp_query = new \WP_Query(array(
								'post_type' => 'product',
								'posts_per_page' => $settings['post_number_three_column'],
								'order' => $settings['orderpost'],
							));
							while ($wp_query -> have_posts()) : $wp_query -> the_post();
								$product = wc_get_product(get_the_ID());
								$id = get_the_ID();
							$idd ++;
							?>
							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 column__custom__class">
		                        <div class="gridarea__wraper product__grid">
		                            <div class="gridarea__img">
		                                <a href="<?php the_permalink() ?>"><img loading="lazy"  src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="grid"></a>

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
		                                            <span data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo esc_attr($id); ?>">
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


                        </div>
                    </div>


                    <div class="tab-pane fade active show" id="list_four">
                        <div class="row row__custom__class">

                            <?php 
		                	$idd=0;
		                	$wp_query = new \WP_Query(array(
								'post_type' => 'product',
								'posts_per_page' => $settings['post_number_four_column'],
								'order' => $settings['orderpost'],
							));
							while ($wp_query -> have_posts()) : $wp_query -> the_post();
								$product = wc_get_product(get_the_ID());
								$id = get_the_ID();
							$idd ++;
							?>
							<div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 column__custom__class column__custom__class_4_column ">
		                        <div class="gridarea__wraper product__grid">
		                            <div class="gridarea__img">
		                                <a href="<?php the_permalink() ?>"><img loading="lazy"  src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="grid"></a>

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
		                                            <span data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo esc_attr($id); ?>">
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


                        </div>
                    </div>
                    <?php } else { ?>
                    <div class="tab-pane fade" id="grid__view">

                        <div class="row row__custom__class">


                            <?php 
		                	$idd=0;
		                	$wp_query = new \WP_Query(array(
								'post_type' => 'product',
								'posts_per_page' => $settings['post_number_two_column'],
								'order' => $settings['orderpost'],
							));
							while ($wp_query -> have_posts()) : $wp_query -> the_post();
								$product = wc_get_product(get_the_ID());
								$id = get_the_ID();
							$idd ++;
							?>
							<div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 column__custom__class">
		                        <div class="gridarea__wraper product__grid">
		                            <div class="gridarea__img">
		                                <a href="<?php the_permalink() ?>"><img loading="lazy"  src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="grid"></a>

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
		                                            <span data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo esc_attr($id); ?>">
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


                        </div>
                    </div>

                    <div class="tab-pane fade active show" id="list_view">
                        <div class="row row__custom__class">

                            <?php 
		                	$idd=0;
		                	$wp_query = new \WP_Query(array(
								'post_type' => 'product',
								'posts_per_page' => $settings['post_number_three_column'],
								'order' => $settings['orderpost'],
							));
							while ($wp_query -> have_posts()) : $wp_query -> the_post();
								$product = wc_get_product(get_the_ID());
								$id = get_the_ID();
							$idd ++;
							?>
							<div class="col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 column__custom__class">
		                        <div class="gridarea__wraper product__grid">
		                            <div class="gridarea__img">
		                                <a href="<?php the_permalink() ?>"><img loading="lazy"  src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="grid"></a>

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
		                                            <span data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo esc_attr($id); ?>">
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


                        </div>
                    </div>


                    <div class="tab-pane fade" id="list_four">
                        <div class="row row__custom__class">

                            <?php 
		                	$idd=0;
		                	$wp_query = new \WP_Query(array(
								'post_type' => 'product',
								'posts_per_page' => $settings['post_number_four_column'],
								'order' => $settings['orderpost'],
							));
							while ($wp_query -> have_posts()) : $wp_query -> the_post();
								$product = wc_get_product(get_the_ID());
								$id = get_the_ID();
							$idd ++;
							?>
							<div class="col-xxl-3 col-xl-4 col-lg-6 col-md-6 col-sm-6 col-12 column__custom__class column__custom__class_4_column ">
		                        <div class="gridarea__wraper product__grid">
		                            <div class="gridarea__img">
		                                <a href="<?php the_permalink() ?>"><img loading="lazy"  src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="grid"></a>

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
		                                            <span data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo esc_attr($id); ?>">
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


                        </div>
                    </div>
                    <?php }  ?>
                </div>

            </div>
    </div>
    </div>
</section>

<?php 
$idd=0;
while ($wp_query -> have_posts()) : $wp_query -> the_post();
	$product = wc_get_product(get_the_ID());
	$id = get_the_ID();
$idd ++;
?>
<div class="grid__quick__view__modal modalarea modal fade" id="exampleModal<?php echo esc_attr($id); ?>" tabindex="-1" aria-labelledby="exampleModal" aria-hidden="true">
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
                                    <?php
                                global $product;
                                    $attachment_ids = $product->get_gallery_attachment_ids();
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
                            <?php
                            /**
                             * Hook: woocommerce_single_product_summary.
                             *
                             * @hooked woocommerce_template_single_title - 5
                             * @hooked woocommerce_template_single_rating - 10
                             * @hooked woocommerce_template_single_price - 10
                             * @hooked woocommerce_upsell_display - 15
                             * @hooked woocommerce_template_single_excerpt - 20
                             */
                            do_action( 'woocommerce_single_product_summary' );
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
                                        echo '<li><a href="' . $thumbnail_url . '" data-thumb="' . $thumbnail_url . '">
                                                <img loading="lazy"  src="' . $thumbnail_url . '" alt=""></a>
                                            </li>';
                                    }
                                    echo '</ul>';
                                ?>
                            </div>
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
	}

}
