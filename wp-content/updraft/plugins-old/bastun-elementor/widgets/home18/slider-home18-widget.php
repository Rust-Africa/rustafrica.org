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
class BdevsSliderHome18 extends \Elementor\Widget_Base {

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
		return 'bdevs-slider-home18';
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
		return __( 'Slider Home 18', 'bdevs-elementor' );
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
		return [ 'home-18-elementor' ];
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
			'section_content_sliderhome18',
			[
				'label' => esc_html__( 'Slider Home 18', 'bdevs-elementor' ),
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
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Heading', 'bdevs-elementor' ),
				'default'     => __( 'WE ARE POPULAR TRAVEL AGENCY.', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'desc',
			[
				'label'       => __( 'Description', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Description', 'bdevs-elementor' ),
				'default'     => __( 'Sagittis purus amet volutpat consequat mauris nunc congue nisi and tortor.', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'button',
			[
				'label'       => __( 'Button', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Button', 'bdevs-elementor' ),
				'default'     => __( 'OUR ALL SERVICES', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'link_button',
			[
				'label'       => __( 'Link Button', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Link Button', 'bdevs-elementor' ),
				'default'     => __( '#', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'image',
			[
				'label'       => __( 'Image Travel', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],			
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
<div class="herobanner herobanner__with__transparent__header bg__image herobanner__front__img__wrapper" style="background: url(<?php print esc_url($settings['bg_image']['url']); ?>);">
    <div class="container">
        <div class="herobanner__wrapper">

            <div class="herobanner__single position-relative">
                <div class="row align-items-center height__950">
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12" data-aos="fade-up" data-aos-duration="1500">
                        <div class="herobanner__content__wrapper herobanner__content__wrapper--2">
                        	<?php if ( '' !== $settings['heading'] )  : ?>
                            <div class="herobanner__title">
                                <h1><?php echo wp_kses_post($settings['heading']); ?></h1>
                            </div>
                            <?php endif; ?>
                            <?php if ( '' !== $settings['desc'] )  : ?>
                            <div class="herobanner__text">
                                <p><?php echo wp_kses_post($settings['desc']); ?></p>
                            </div>
                            <?php endif; ?>
                            <?php if ( '' !== $settings['button'] )  : ?>
                            <div class="herobanner__button sp_top_30">
                                <a class="default__button btn__white" href="<?php echo wp_kses_post($settings['link_button']); ?>"><?php echo wp_kses_post($settings['button']); ?></a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <?php if ( '' !== $settings['image']['url'] )  : ?>
                    <div class="col-xxl-6 col-xl-6 col-lg-6 col-md-12 col-sm-12">
                        <div class="herobanner__front__img position-relative" data-tilt>
                            <img class="rounded" src="<?php print esc_url($settings['image']['url']); ?>" alt="Travel">
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
            </div>

        </div>

    </div>
    <div class="herobanner__icon">
        <?php if ( '' !== $settings['shape1']['url'] )  : ?>
        <img class="herobanner__vector hero__icon__1" src="<?php print esc_url($settings['shape1']['url']); ?>" alt="">
        <?php endif; ?>
        <?php if ( '' !== $settings['shape2']['url'] )  : ?>
        <img class="herobanner__vector hero__icon__4" src="<?php print esc_url($settings['shape2']['url']); ?>" alt="">
        <?php endif; ?>
    </div>
</div>


	<?php
	}

}
