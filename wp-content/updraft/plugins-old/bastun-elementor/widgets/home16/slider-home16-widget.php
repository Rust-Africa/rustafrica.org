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
class BdevsSliderHome16 extends \Elementor\Widget_Base {

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
		return 'bdevs-slider-home16';
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
		return __( 'Slider Home 16', 'bdevs-elementor' );
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
		return [ 'home-16-elementor' ];
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
			'section_content_sliderhome16',
			[
				'label' => esc_html__( 'Slider Home 16', 'bdevs-elementor' ),
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
			'subheading',
			[
				'label'       => __( 'Subheading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Subheading', 'bdevs-elementor' ),
				'default'     => __( 'LEADING CREATIVE AGENCY', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Heading', 'bdevs-elementor' ),
				'default'     => __( 'Most Popular Best Creative Agency.', 'bdevs-elementor' ),
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
			'video',
			[
				'label'       => __( 'Link Video', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Link Video', 'bdevs-elementor' ),
				'default'     => __( 'https://www.youtube.com/watch?v=gLb2Gbo_bbs', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'title_video',
			[
				'label'       => __( 'Title Video', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Title Video', 'bdevs-elementor' ),
				'default'     => __( 'Watch Demo', 'bdevs-elementor' ),
				'label_block' => true,
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
<div class="herobanner d-flex align-items-center height__700 position-relative herobanner__margin herobanner__front__img__wrapper" style="background: var(--gradientColor)">
    <div class="container-fluid full__width__padding">
        <div class="herobanner__wrapper">

            <div class="herobanner__single">
                <div class="row align-items-center">
                    <div class="col-xxl-6 col-xl-7 col-lg-6 col-md-12 col-sm-12" data-aos="fade-up" data-aos-duration="1500">
                        <div class="herobanner__content__wrapper herobanner__content__wrapper--2">
                        	<?php if ( '' !== $settings['subheading'] )  : ?>
                            <div class="herobanner__small__text">
                                <span><?php echo wp_kses_post($settings['subheading']); ?></span>
                            </div>
                            <?php endif; ?>
                            <?php if ( '' !== $settings['heading'] )  : ?>
                            <div class="herobanner__title ">
                                <h1><?php echo wp_kses_post($settings['heading']); ?></h1>
                            </div>
                            <?php endif; ?>
                            <?php if ( '' !== $settings['desc'] )  : ?>
                            <div class="herobanner__text">
                                <p><?php echo wp_kses_post($settings['desc']); ?>
                                </p>
                            </div>
                            <?php endif; ?>
                            <div class="herobanner__button">
                            	<?php if ( '' !== $settings['button'] )  : ?>
                                <a class="default__button btn__white" href="<?php echo wp_kses_post($settings['link_button']); ?>"><?php echo wp_kses_post($settings['button']); ?></a>
                                <?php endif; ?>
                                <div class="video__button video__button--white">
                                	<?php if ( '' !== $settings['video'] )  : ?>
                                    <a class="video__card--link glightbox" data-gallery="video_popup" href="<?php echo wp_kses_post($settings['video']); ?>">
                                        <svg width="13" height="15" viewBox="0 0 13 15" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M13 7.5L0.250002 14.8612L0.250003 0.138783L13 7.5Z" fill="#F8422E"></path>
                                        </svg>                                            
                                    </a>
                                    <?php endif; ?>
                                    <?php if ( '' !== $settings['title_video'] )  : ?>
                                   	<span> <?php echo wp_kses_post($settings['title_video']); ?></span>
                                   	<?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php if ( '' !== $settings['bg_image']['url'] )  : ?>
                    <div class="col-xxl-6 col-xl-5 col-lg-6 col-md-12 col-sm-12">
                        <div class="herobanner__front__img" data-tilt>
                            <img src="<?php print esc_url($settings['bg_image']['url']); ?>" alt="front__img__technology">
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
