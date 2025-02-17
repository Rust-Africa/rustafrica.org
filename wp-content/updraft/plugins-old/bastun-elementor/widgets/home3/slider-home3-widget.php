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
class BdevsSliderHome3 extends \Elementor\Widget_Base {

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
		return 'bdevs-slider-home3';
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
		return __( 'Slider Home 3', 'bdevs-elementor' );
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
		return [ 'home-3-elementor' ];
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
			'section_content_sliderhome3',
			[
				'label' => esc_html__( 'Slider Home 3', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Sliders Home 3', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Sliders #3', 'bdevs-elementor' ),
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
			'brand__badge',
			[
				'label'       => __( 'Image Brand Badge ', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],			
			]
		);
		$this->add_control(
			'brand__badge__inner',
			[
				'label'       => __( 'Image Brand Badge Inner', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],			
			]
		);
		$this->add_control(
			'link_brand__badge',
			[
				'label'       => __( 'Link Brand Badge', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Link Brand Badge', 'bdevs-elementor' ),
				'default'     => __( '#', 'bdevs-elementor' ),
				'label_block' => true,		
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
<div class="herobanner herobanner--3">

    <div class="herobanner__wrapper">
        <div class="herobanner__slider__active swiper slider__bg__position">
            <div class="swiper-wrapper">
            	<?php
			    	$idd = 0;
			    	foreach ( $settings['tabs'] as $item ) :
			    	$idd++;
				?>
                <div class="herobanner__single swiper-slide position-relative" style="background: url(<?php print esc_url($item['image']['url']); ?>);">
                    <div class="container">
                        <div class="row align-items-center height__800">
                            <div class="col-xxl-6 col-xl-7 col-lg-8 col-md-8 col-sm-12" data-aos="fade-up" data-aos-duration="1500">
                                <div class="herobanner__content__wrapper">
                                	<?php if ( '' !== $item['title'] )  : ?>
                                    <div class="herobanner__title herobanner__title--mid">
                                        <h1><?php echo wp_kses_post($item['title']); ?></h1>
                                    </div>
                                    <?php endif; ?>
                                    <?php if ( '' !== $item['subtitle'] )  : ?>
                                    <div class="herobanner__text">
                                        <p><?php echo wp_kses_post($item['subtitle']); ?></p>
                                    </div>
                                    <?php endif; ?>
                                    <?php if ( '' !== $item['button'] )  : ?>
                                    <div class="herobanner__button">
                                        <a class="default__button" href="<?php print esc_attr($item['link_button']); ?>"><?php print esc_attr($item['button']); ?></a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>

            </div>

        </div>

        <div class="slider__controls__wrap slider__controls__pagination slider__controls__arrows herobanner__arrow__1 herobanner__arrow__1--2">
            <div class="swiper-button-next arrow-btn arrow-btn-3">
                <?php \Elementor\Icons_Manager::render_icon( $settings['icon_right'], [ 'aria-hidden' => 'true' ] ); ?>  
            </div>
            <div class="swiper-button-prev arrow-btn arrow-btn-3">
                <?php \Elementor\Icons_Manager::render_icon( $settings['icon_left'], [ 'aria-hidden' => 'true' ] ); ?>
            </div>
        </div>
    </div>
    <?php if ( '' !== $settings['brand__badge']['url'] )  : ?>
    <div class="bastun__brand__badge">
        <div class="bastun__brand__badge__inner position-relative">
            <a href="<?php print wp_kses_post($settings['link_brand__badge']); ?>">
                <img class="bbb__animate" src="<?php print esc_url($settings['brand__badge']['url']); ?>" alt="Hero badge">
                <img class="bbb__icon" src="<?php print esc_url($settings['brand__badge__inner']['url']); ?>" alt="Hero icon badge">
            </a>
        </div>
    </div>
    <?php endif; ?>
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
