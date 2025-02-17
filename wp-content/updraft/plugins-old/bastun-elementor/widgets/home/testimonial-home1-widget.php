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
class BdevsTestimonialHome1 extends \Elementor\Widget_Base {

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
		return 'bdevs-testimonial-home1';
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
		return __( 'Testimonial Home 1', 'bdevs-elementor' );
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
		return [ 'Testimonial Home 1', 'carousel' ];
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
			'section_content_Testimonialhome',
			[
				'label' => esc_html__( 'Testimonial Home 1', 'bdevs-elementor' ),
			]
		);
		
		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Heading', 'bdevs-elementor' ),
				'default'     => __( 'INSPIRING TESTIMONIALS FROM HAPPY CLIENTS', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'subheading',
			[
				'label'       => __( 'Subheading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Subheading', 'bdevs-elementor' ),
				'default'     => __( 'Sagittis purus sit amet volutpat consequat mauris nunc congue nisi and tortor dignissim convallis aenean venenatis urna', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'image',
			[
				'label'       => __( 'Background Image ', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],			
			]
		);
		$this->add_control(
			'icon_image',
			[
				'label'       => __( 'Icon Image ', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],			
			]
		);
		$this->add_control(
			'shape',
			[
				'label'       => __( 'Shape', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],			
			]
		);
		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Testimonial Home 1', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Why Choose Us #2', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					]
				],
				'fields' => [
					[
						'name'        => 'desc',
						'label'       => esc_html__( 'description', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '“Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse.”' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Mattie Warner' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'subtitle',
						'label'       => esc_html__( 'Subtitle', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Founder & CEO' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'    => 'icon_qoute',
						'label'   => esc_html__( 'Image Quote', 'bdevs-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'dynamic' => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
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
<div class="testimonial sp_bottom_110 sp_top_100" id="testimonial__area" data-aos="fade-up" data-aos-duration="1500">
    <div class="container">
        <div class="row">
            <div class="col-xl-12">
                <div class="section__title text-center sp_bottom_90">
                	<?php if ( '' !== $settings['heading'] )  : ?>
                    <div class="section__title__heading">
                        <h3><?php echo wp_kses_post($settings['heading']); ?>
                        </h3>
                    </div>
                    <?php endif; ?>
                    <?php if ( '' !== $settings['subheading'] )  : ?>
                    <div class="section__title__text">
                        <p><?php echo wp_kses_post($settings['subheading']); ?></p>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row">
        	<?php if ( '' !== $settings['image']['url'] )  : ?>
            <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12" data-aos="fade-up" data-aos-duration="1500">
                <div class="testimonial__img" data-tilt>

                    <img src="<?php print esc_url($settings['image']['url']); ?>" alt="">
                    <?php if ( '' !== $settings['icon_image']['url'] )  : ?>
                    <div class="testimonial__img__2">
                        <img src="<?php print esc_url($settings['icon_image']['url']); ?>" alt="">
                    </div>
                    <?php endif; ?>
                    <?php if ( '' !== $settings['shape']['url'] )  : ?>
                    <div class="testimonial__small__icon">
                        <img src="<?php print esc_url($settings['shape']['url']); ?>" alt="">
                    </div>
                    <?php endif; ?>
                </div>
            </div>
            <?php endif; ?>
            <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12" data-aos="fade-up" data-aos-duration="2000">

                <div class="testimonial__inner position-relative">

                    <div class="testimonial__slider__active swiper">
                        <div class="swiper-wrapper">
                        	<?php
							$i = 0;
							foreach ( $settings['tabs'] as $item ) :
							$i++;
							?>
                            <div class="testimonial__single__slider swiper-slide">
                            	<?php if ( '' !== $item['desc'] )  : ?>
                                <div class="testimonial__text">
                                    <p><?php echo wp_kses_post($item['desc']); ?></p>
                                </div>
                                <?php endif; ?>
                                <div class="testimonial__bottom">
                                    <div class="testimonial__author">
                                    	<?php if ( '' !== $item['title'] )  : ?>
                                        <h6><?php echo wp_kses_post($item['title']); ?></h6>
                                        <?php endif; ?>
                                        <?php if ( '' !== $item['subtitle'] )  : ?>
                                        <span><?php echo wp_kses_post($item['subtitle']); ?></span>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php if ( '' !== $item['icon_qoute']['url'] )  : ?>
                                <div class="testimonial__small__img">
                                    <img src="<?php print esc_url($item['icon_qoute']['url']); ?>" alt="">
                                </div>
                                <?php endif; ?>
                            </div>
                            <?php endforeach; ?>
                        </div>

                    </div>
                    <div class="slider__controls__wrap slider__controls__pagination slider__controls__arrows slider__controls__arrows--2">
                        <div class="swiper-button-next arrow-btn arrow-btn-2">
                            <?php \Elementor\Icons_Manager::render_icon( $settings['icon_right'], [ 'aria-hidden' => 'true' ] ); ?>
                        </div>
                        <div class="swiper-button-prev arrow-btn arrow-btn-2">
                            <?php \Elementor\Icons_Manager::render_icon( $settings['icon_left'], [ 'aria-hidden' => 'true' ] ); ?>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>

	<?php
	}

}
