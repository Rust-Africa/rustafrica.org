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
class BdevsSliderHome1 extends \Elementor\Widget_Base {

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
		return 'bdevs-slider-home1';
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
		return __( 'Slider Home 1', 'bdevs-elementor' );
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
		return [ 'home-elementor' ];
	}

	public function get_keywords() {
		return [ 'Slides', 'carousel' ];
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
			'section_content_slidershome',
			[
				'label' => esc_html__( 'Sliders Home 1', 'bdevs-elementor' ),
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
				'label' => esc_html__( 'Sliders Home 1', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Sliders #1', 'bdevs-elementor' ),
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
						'name'        => 'title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'WE ARE CONSULTING AGENCY' , 'bdevs-elementor' ),
						'label_block' => true,
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
						'name'        => 'button',
						'label'       => esc_html__( 'Button', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'OUR ALL SERVICES' , 'bdevs-elementor' ),
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
				],
			]
		);
		$this->add_control(
			'shape1',
			[
				'label'       => __( 'Shape Icon 1 ', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],			
			]
		);
		$this->add_control(
			'shape2',
			[
				'label'       => __( 'Shape Icon 2 ', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],			
			]
		);
		$this->add_control(
			'shape3',
			[
				'label'       => __( 'Shape Icon 3 ', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],			
			]
		);
		$this->add_control(
			'shape4',
			[
				'label'       => __( 'Shape Icon 4 ', 'bdevs-elementor' ),
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
		<div class="herobanner herobanner__with__transparent__header" id="tb__home" style="background: url(<?php print esc_url($settings['bg_image']['url']); ?>);">
            <div class="container">
                <div class="herobanner__wrapper">


                    <div class="herobanner__slider__active swiper">
                        <div class="swiper-wrapper">
                        	<?php
						    	$idd = 0;
						    	foreach ( $settings['tabs'] as $item ) :
						    	$idd++;
							?>
                            <div class="herobanner__single swiper-slide position-relative">
                                <div class="row align-items-center height__950">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" data-aos="fade-up" data-aos-duration="1500">
                                        <div class="herobanner__content__wrapper">
                                        	<?php if ( '' !== $item['title'] )  : ?>
                                            <div class="herobanner__title">
                                                <h1><?php print esc_attr($item['title']); ?></h1>
                                            </div>
                                            <?php endif; ?>
                                            <?php if ( '' !== $item['subtitle'] )  : ?>
                                            <div class="herobanner__text">
                                                <p><?php print esc_attr($item['subtitle']); ?></p>
                                            </div>
                                            <?php endif; ?>
                                            <?php if ( '' !== $item['button'] )  : ?>
                                            <div class="herobanner__button">
                                                <a class="default__button" href="<?php print esc_attr($item['link_button']); ?>"><?php print esc_attr($item['button']); ?></a>
                                            </div>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <?php if ( '' !== $item['image']['url'] )  : ?>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 ">
                                        <div class="herobanner__img herobanner__img--position">
                                            <img src="<?php print esc_url($item['image']['url']); ?>" alt="Hero Banner">
                                        </div>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                            <?php endforeach; ?>

                        </div>
                        <div class="slider__controls__wrap slider__controls__pagination slider__controls__arrows herobanner__arrow__1">
                            <div class="swiper-button-next arrow-btn">
                                <svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M14.4297 5.92999L20.4997 12L14.4297 18.07" stroke="#fff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    <path d="M3.5 12H20.33" stroke="#fff" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                    </svg>
                                    
                            </div>
                            <div class="swiper-button-prev arrow-btn">
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
            <div class="herobanner__icon">
            	<?php if ( '' !== $settings['shape1']['url'] )  : ?>
                <img class="herobanner__vector hero__icon__1" src="<?php print esc_url($settings['shape1']['url']); ?>" alt="Vector photo">
                <?php endif; ?>
                <?php if ( '' !== $settings['shape2']['url'] )  : ?>
                <img class="herobanner__vector hero__icon__2" src="<?php print esc_url($settings['shape2']['url']); ?>" alt="Vector photo">
                <?php endif; ?>
                <?php if ( '' !== $settings['shape3']['url'] )  : ?>
                <img class="herobanner__vector hero__icon__3" src="<?php print esc_url($settings['shape3']['url']); ?>" alt="Vector photo">
                <?php endif; ?>
                <?php if ( '' !== $settings['shape4']['url'] )  : ?>
                <img class="herobanner__vector hero__icon__4" src="<?php print esc_url($settings['shape4']['url']); ?>" alt="Vector photo">
                <?php endif; ?>
            </div>
        </div>
<?php if (is_admin()) { ?>
<script type="text/javascript">
	var swiper = new Swiper(".herobanner__slider__active", {
  grabCursor: true,
  slidesPerView: 1,
  navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
  }
});
</script>
<?php }  ?>
	<?php
	}

}
