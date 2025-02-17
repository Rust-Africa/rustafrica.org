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
class BdevsAboutHome3 extends \Elementor\Widget_Base {

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
		return 'bdevs-about-home3';
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
		return __( 'About Home 3', 'bdevs-elementor' );
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
		return [ 'About', 'carousel' ];
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
			'section_content_Abouthome3',
			[
				'label' => esc_html__( 'About Home 3', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'bg_image',
			[
				'label'       => __( 'Background Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],			
			]
		);
		$this->add_control(
			'subheading',
			[
				'label'       => __( 'Subheading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Subheading', 'bdevs-elementor' ),
				'default'     => __( 'About', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'QUALITY CONSULTING FORE SECURE BUSINESS.WE 32 YEARS OF EXPRIENCE.', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		
		$this->add_control(
			'number_experience',
			[
				'label'       => __( 'Number Experience', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Number Experience', 'bdevs-elementor' ),
				'default'     => __( '29', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'title_experience',
			[
				'label'       => __( 'Title Experience', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Title Experience', 'bdevs-elementor' ),
				'default'     => __( 'Years Experience', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'icon',
			[
				'label'       => __( 'Icon', 'bdevs-elementor' ),
				'type'    => Controls_Manager::ICONS,
				'default' 		=> [
						'url' 			=> '',
					],		
			]
		);
		$this->add_control(
			'link_icon',
			[
				'label'       => __( 'Link Icon', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Link Icon', 'bdevs-elementor' ),
				'default'     => __( '#', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Title', 'bdevs-elementor' ),
				'default'     => __( 'Our Mission & Vision', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text ', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Text', 'bdevs-elementor' ),
				'default'     => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'button',
			[
				'label'       => __( 'Button', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Button', 'bdevs-elementor' ),
				'default'     => __( 'LEARN MORE ABOUT', 'bdevs-elementor' ),
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
<div class="about about__grident__bg about__white__bg position-relative sp_bottom_120 sp_top_160" id="about__mission__area">
    <div class="container">
        <div class="row">
      
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" data-aos="fade-up" data-aos-duration="1500">
                <div class="about__inner about__inner--2">

                    <div class="section__title  section__title--2 section__title--3">
                    	<?php if ('' != $settings['subheading']): ?>
                        <div class="section__title__button">
                            <span><?php echo wp_kses_post($settings['subheading']); ?></span>
                        </div>
                        <?php endif ?>
                        <?php if ('' != $settings['heading']): ?>
                        <div class="section__title__heading">
                            <h3><?php echo wp_kses_post($settings['heading']); ?></h3>
                        </div>
                        <?php endif ?>
                    </div>

                    <div class="about__vision__wrapper about__vision__wrapper--3">
	                    <div class="about__number">
	                        <div class="about__number__inner">
	                            <?php if ( '' !== $settings['number_experience'] )  : ?>
	                            <span><?php echo wp_kses_post($settings['number_experience']); ?></span>
	                            <?php endif; ?>
	                            <?php if ( '' !== $settings['title_experience'] )  : ?>
	                            <p><?php echo wp_kses_post($settings['title_experience']); ?></p>
	                            <?php endif; ?>
	                            <?php if ( '' !== $settings['icon']['value'] )  : ?>
	                            <div class="about__number__icon">
	                                <a href="<?php echo wp_kses_post($settings['link_icon']); ?>">
	                                  	<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
	                                </a>
	                            </div>
	                            <?php endif; ?>
	                        </div>
	                    </div>
	                    <div class="about__text__wrapper">
		                    <?php if ('' != $settings['title']): ?>
		                    <div class="about__misson">
		                        <h6> <?php echo wp_kses_post($settings['title']); ?></h6>
		                    </div>
		                    <?php endif ?>
		                    <?php if ('' != $settings['text']): ?>
		                    <div class="about__text__2">
		                        <p><?php echo wp_kses_post($settings['text']); ?></p>
		                    </div>
		                    <?php endif ?>
		                    <?php if ('' != $settings['button']): ?>
		                    <div class="about__button">
		                        <a class="default__button btn__white" href="<?php echo wp_kses_post($settings['link_button']); ?>"><?php echo wp_kses_post($settings['button']); ?></a>
		                    </div>
		                    <?php endif ?>
		                </div>
	                </div>
                </div>
            </div>
            <?php if ( '' !== $settings['bg_image']['url'] )  : ?>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" data-aos="fade-up" data-aos-duration="1800">
                <div class="about__img__3" data-tilt>
                    <img src="<?php print esc_url($settings['bg_image']['url']); ?>" alt="">
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
	<?php
	}

}
