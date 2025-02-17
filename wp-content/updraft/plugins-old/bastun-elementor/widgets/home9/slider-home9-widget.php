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
class BdevsSliderHome9 extends \Elementor\Widget_Base {

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
		return 'bdevs-slider-home9';
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
		return __( 'Slider Home 9', 'bdevs-elementor' );
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
		return [ 'Slider', 'carousel' ];
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
			'section_content_sliderhome9',
			[
				'label' => esc_html__( 'Slider Home 9', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'bg_image',
			[
				'label'       => __( 'Backdround Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],			
			]
		);
		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Sliders Home 10', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Sliders #10', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					]
				],
				'fields' => [
					[
						'name'    => 'image',
						'label'   => esc_html__( 'Image', 'bdevs-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'dynamic' => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
					],
					[
						'name'        => 'subtitle',
						'label'       => esc_html__( 'Subtitle', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Sagittis purus amet volutpat consequat mauris nunc congue nisi and tortor.' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'WE ARE CONSULTING AGENCY' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'desc',
						'label'       => esc_html__( 'Description', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Sagittis purus amet volutpat consequat mauris nunc congue nisi and tortor.' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'price',
						'label'       => esc_html__( 'Price', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'button',
						'label'       => esc_html__( 'Button', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'BUY NOW' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'link_button',
						'label'       => esc_html__( 'Link Button', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '#' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'button2',
						'label'       => esc_html__( 'Button 2', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'DISCOVER MORE' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'link_button2',
						'label'       => esc_html__( 'Link Button 2', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '#' , 'bdevs-elementor' ),
						'label_block' => true,
					],
				],
			]
		);
		$this->add_control(
			'icon_right',
			[
				'label' 		=> esc_html__( 'Icon Right', 'bdevs-elementor' ),
				'type' 			=> Controls_Manager::ICONS,
				'default' 		=> [
					'url' 			=> '',
				],
			]
		);
		$this->add_control(
			'icon_left',
			[
				'label' 		=> esc_html__( 'Icon Left', 'bdevs-elementor' ),
				'type' 			=> Controls_Manager::ICONS,
				'default' 		=> [
					'url' 			=> '',
				],
			]
		);
		$this->add_control(
			'shape1',
			[
				'label'       => __( 'Shape Image 1', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],			
			]
		);
		$this->add_control(
			'shape2',
			[
				'label'       => __( 'Shape Image 2', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],			
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
<div class="herobanner d-flex align-items-center height__800 herobanner__front__img__wrapper position-relative" style="background: var(--pinkcolor) url(<?php print esc_url($settings['bg_image']['url']); ?>);">
    <div class="container">
        <div class="herobanner__wrapper">
            <div class="hero__simple__slider__active swiper">
                <div class="swiper-wrapper">
                	<?php
				    	$idd = 0;
				    	foreach ( $settings['tabs'] as $item ) :
				    	$idd++;
					?>
                    <div class="herobanner__single swiper-slide">
                        <div class="row align-items-center">
                            <div class="col-xxl-6 col-xl-7 col-lg-6 col-md-12 col-sm-12" data-aos="fade-up" data-aos-duration="1500">
                                <div class="herobanner__content__wrapper herobanner__content__wrapper--2">
                                	<?php if ( '' !== $item['subtitle'] )  : ?>
                                    <div class="herobanner__small__text">
                                        <span class="text__gradient"><?php print wp_kses_post($item['subtitle']); ?></span>
                                    </div>
                                    <?php endif; ?>
                                    <?php if ( '' !== $item['title'] )  : ?>
                                    <div class="herobanner__title herobanner__title--2">
                                        <h1><?php print wp_kses_post($item['title']); ?></h1>
                                    </div>
                                    <?php endif; ?>
                                    <?php if ( '' !== $item['desc'] )  : ?>
                                    <div class="herobanner__text herobanner__text--2">
                                        <p><?php print wp_kses_post($item['desc']); ?>
                                        </p>
                                    </div>
                                    <?php endif; ?>
                                    <?php if ( '' !== $item['price'] )  : ?>
                                    <div class="herobannerarea__price">
                                        <?php print wp_kses_post($item['price']); ?>
                                    </div>
                                    <?php endif; ?>
                                    <div class="herobanner__button">
                                    	<?php if ( '' !== $item['button'] )  : ?>
                                        <a class="default__button" href="<?php print wp_kses_post($item['link_button']); ?>"><?php print wp_kses_post($item['button']); ?></a>
                                        <?php endif; ?>
                                        <?php if ( '' !== $item['button2'] )  : ?>
                                        <a class="default__button btn__black ms-4" href="<?php print wp_kses_post($item['link_button2']); ?>"><?php print wp_kses_post($item['button2']); ?></a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php if ( '' !== $item['image']['url'] )  : ?>
                            <div class="col-xxl-6 col-xl-5 col-lg-6 col-md-12 col-sm-12">
                                <div class="herobanner__front__img" data-tilt>
                                    <img src="<?php print wp_kses_post($item['image']['url']); ?>" alt="front__img__ecommerce1">
                                </div>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php endforeach; ?>

                </div>
            </div>
            <div class="slider__controls__wrap slider__controls__pagination slider__controls__arrows hero__simple__slider__arrow">
                <div class="swiper-button-next arrow-btn arrow-btn-2">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['icon_right'], [ 'aria-hidden' => 'true' ] ); ?>
                </div>
                <div class="swiper-button-prev arrow-btn arrow-btn-2">
                    <?php \Elementor\Icons_Manager::render_icon( $settings['icon_left'], [ 'aria-hidden' => 'true' ] ); ?>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </div>
    </div>
    <div class="herobanner__icon">
    	<?php if ( '' !== $settings['shape1']['url'] )  : ?>
        <img class="herobanner__vector hero__icon__1" src="<?php print esc_url($settings['shape1']['url']); ?>" alt="Vector photo">
        <?php endif; ?>
        <?php if ( '' !== $settings['shape2']['url'] )  : ?>
        <img class="herobanner__vector hero__icon__4" src="<?php print esc_url($settings['shape2']['url']); ?>" alt="Vector photo">
        <?php endif; ?>
    </div>
</div>

<?php if (is_admin()) { ?>
<script type="text/javascript">
	var swiper = new Swiper(".hero__simple__slider__active", {
  grabCursor: true,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
  },
  slidesPerView: 1,
  breakpoints: {
      575: {
        slidesPerView: 1,
      },

      768: {
        slidesPerView: 1,
      },

      992: {
        slidesPerView: 1,
      },
      1200: {
        slidesPerView: 1
      },
      1500: {
          slidesPerView: 1
      }
  },
});
</script>
<?php }  ?>
	<?php
	}

}
