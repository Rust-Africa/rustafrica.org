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
class BdevsPopUpProductHome9 extends \Elementor\Widget_Base {

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
        return 'bdevs-popup-product-home9';
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
        return __( 'PopUp Product Home 9', 'bdevs-elementor' );
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
        return [ 'PopUp Product', 'carousel' ];
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
            'section_content_PopUpProducthome9',
            [
                'label' => esc_html__( 'PopUp Product Home 9', 'bdevs-elementor' ),
            ]
        );
        $this->add_control(
            'subheading',
            [
                'label'       => __( 'Subheading', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your sub heading', 'bdevs-elementor' ),
                'default'     => __( 'Popular Collections', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );      

        $this->add_control(
            'heading',
            [
                'label'       => __( 'Heading', 'bdevs-elementor' ),
                'type'        => Controls_Manager::TEXT,
                'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
                'default'     => __( 'AWESOME COLLECTIONS', 'bdevs-elementor' ),
                'label_block' => true,
            ]
        );
        $repeater = new \Elementor\Repeater();
            $repeater->add_control(
                'title',
                [
                    'label'         => __( 'Title', 'bdevs-elementor' ),
                    'type'          => Controls_Manager::TEXTAREA,
                    'placeholder'   => __( 'Enter your text title Project custom', 'bdevs-elementor' ),
                    'default'       => __( 'New Collection', 'bdevs-elementor' ),
                    'label_block'   => true,
                ]
            );
            $repeater->add_control(
                'post_number',
                [
                    'label'         => __( 'Post Count', 'bdevs-elementor' ),
                    'type'          => Controls_Manager::TEXT,
                    'placeholder'   => __( 'Enter your Post Count', 'bdevs-elementor' ),
                    'default'       => __( '4', 'bdevs-elementor' ),
                    'label_block'   => true,
                ]
            );
            $repeater->add_control(
                'orderpost',
                [
                    'label'         => __( 'Post Count', 'bdevs-elementor' ),
                    'type'          => Controls_Manager::SELECT,
                    'options'   => [
                                        'asc'  => esc_html__( 'ASC', 'bdevs-elementor' ),
                                        'desc' => esc_html__( 'DESC', 'bdevs-elementor' ),
                                    ],
                    'default'   => 'asc',
                    'label_block'   => true,
                ]
            );
            $repeater->add_control(
                'orderby',
                [
                    'label'         => __( 'Order By', 'bdevs-elementor' ),
                    'type'          => Controls_Manager::SELECT,
                    'options'   => [
                            'date'  => esc_html__( 'Date', 'bdevs-elementor' ),
                            'title' => esc_html__( 'Title', 'bdevs-elementor' ),
                            'rand' => esc_html__( 'Random', 'bdevs-elementor' ),
                        ],
                    'default'   => '',
                ]
            );
        $this->add_control(
            'tabs',
            [
                'label'         => esc_html__( 'Tab List Project Post', 'bdevs-elementor' ),
                'type'          => Controls_Manager::REPEATER,
                'fields'        => $repeater->get_controls(),
                'default'       => [
                    [
                        
                    ],
                ],
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
        extract($settings);
        ?> 
<div class="woocommerce tabcollectionarea sp_bottom_140">
    <div class="container">

        <div class="row">
            <div class="col-xl-12" data-aos="fade-up" data-aos-duration="1500">
                <div class="section__title text-center sp_bottom_40">
                    <?php if ( '' !== $settings['subheading'] )  : ?>
                    <div class="section__title__button">
                        <span class="text__gradient "><?php print wp_kses_post($settings['subheading']); ?></span>
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

        <div class="row">
            <div class="col-xl-12 sp_bottom_30">
                <ul class="nav tabcollectionarea__item__wrap tabcollectionarea__button__area text-center">
                    <?php
                    $i = 0;
                        foreach ( $settings['tabs'] as $item ) :
                    $i++;
                    ?>
                    <?php if($i == 1){?>
                    <li class="tabcollectionarea__product__item" role="presentation">
                        <button class="tabcollectionarea__product__item__link active" data-bs-toggle="tab"
                            data-bs-target="#projects__<?php echo esc_attr($i); ?>" type="button"><?php echo wp_kses_post($item['title']); ?></button>
                    </li>
                    <?php } else { ?>
                    <li class="tabcollectionarea__product__item" role="presentation">
                        <button class="tabcollectionarea__product__item__link" data-bs-toggle="tab" data-bs-target="#projects__<?php echo esc_attr($i); ?>"
                            type="button"><?php echo wp_kses_post($item['title']); ?></button>
                    </li>
                    <?php } ?>
                    <?php endforeach; ?>
                </ul>

            </div>
        </div>

        <div class="tab-content tab__content__wrapper" id="myTabContent">
            <?php
            $i = 0;
                foreach ( $settings['tabs'] as $item ) :
            $i++;
            ?>
            <?php if($i == 1){?>
            <div class="tab-pane fade active show" id="projects__<?php echo esc_attr($i); ?>" role="tabpanel" aria-labelledby="projects__<?php echo esc_attr($i); ?>">
                <div class="social__wrapper">
                    <div class="row">
                    <?php 
                    $idd=$i*10;
                    $wp_query = new \WP_Query(array(
                        'post_type' => 'product', 
                        'posts_per_page' => $item['post_number'],
                        'orderby' => $item['orderby'], 
                        'order' => $item['orderpost'],));
                    while ($wp_query -> have_posts()) : $wp_query -> the_post();
                        $product = wc_get_product(get_the_ID());
                    $idd ++;
                    ?>
                    <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 column__custom__class">
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

                    <?php endwhile; ?>
                    <?php 
                    $idd=$i*10;
                    $wp_query = new \WP_Query(array(
                        'post_type' => 'product', 
                        'posts_per_page' => $item['post_number'],
                        'orderby' => $item['orderby'], 
                        'order' => $item['orderpost'],));
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
                    </div>
                </div>
            </div>
            <?php } else { ?>
            <div class="tab-pane fade" id="projects__<?php echo esc_attr($i); ?>" role="tabpanel" aria-labelledby="projects__<?php echo esc_attr($i); ?>">
                <div class="social__wrapper">
                    <div class="row">
                        <?php 
                        $idd=$i*20;
                        $wp_query = new \WP_Query(array(
                        'post_type' => 'product', 
                        'posts_per_page' => $item['post_number'],
                        'orderby' => $item['orderby'], 
                        'order' => $item['orderpost'],));
                        while ($wp_query -> have_posts()) : $wp_query -> the_post();
                        $product = wc_get_product(get_the_ID());
                        $idd ++;
                        ?>
                        <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 column__custom__class">
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

                        <?php endwhile; ?>
                        <?php 
                        $idd=$i*20;
                        $wp_query = new \WP_Query(array(
                            'post_type' => 'product', 
                            'posts_per_page' => $item['post_number'],
                            'orderby' => $item['orderby'], 
                            'order' => $item['orderpost'],));
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
                    </div>
                </div>

            </div>
            <?php } ?>
            <?php endforeach; ?>
        


        </div>  
    </div>
</div>
    <?php
    }

}
