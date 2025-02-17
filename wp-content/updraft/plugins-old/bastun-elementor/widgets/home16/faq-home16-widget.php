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
class BdevsFAQHome16 extends \Elementor\Widget_Base {

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
		return 'bdevs-faq-home16';
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
		return __( 'Faq Home 16', 'bdevs-elementor' );
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
		return [ 'FAQ', 'carousel' ];
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
			'section_content_Faqhome16',
			[
				'label' => esc_html__( 'FAQ Home 16', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'bg_image',
			[
				'label'       => __( 'Backdround Image 1', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],			
			]
		);
		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'FAQ', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'bg_image2',
			[
				'label'       => __( 'Backdround Image 2', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],			
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Subtitle', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Subtitle', 'bdevs-elementor' ),
				'default'     => __( 'About FAQ', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Title', 'bdevs-elementor' ),
				'default'     => __( 'WE 32 YEAR OF EXPRIENCE.', 'bdevs-elementor' ),
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
			'tabs',
			[
				'label' => esc_html__( 'FAQ Home 16', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Progress #5', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					]
				],
				'fields' => [
					[
						'name'        => 'title_faq',
						'label'       => esc_html__( 'Title FAQ', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'What is business consulting?' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'subtitle_faq',
						'label'       => esc_html__( 'Subtitle FAQ', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat.' , 'bdevs-elementor' ),
						'label_block' => true,
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
<div class="about position-relative sp_bottom_120 sp_top_120" id="about__mission__area">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" data-aos="fade-up" data-aos-duration="1800">
                <div class="about__img__wrapper about__img__wrapper--2 position-relative" data-tilt>
                	<?php if ( '' !== $settings['bg_image']['url'] )  : ?>
                    <img class="about__img__1" src="<?php print esc_url($settings['bg_image']['url']); ?>" alt="">
                    <?php endif; ?>
                    <?php if ( '' !== $settings['heading'] )  : ?>
                    <div class="about__big__title">
                        <h1><?php echo wp_kses_post($settings['heading']); ?></h1>
                    </div>
                    <?php endif; ?>
                    <?php if ( '' !== $settings['bg_image2']['url'] )  : ?>
                    <div class="section__strock__line__animation">
                        <img class="ssla__animation ssl__img__3" src="<?php print esc_url($settings['bg_image2']['url']); ?>" alt="">
                    </div>
                	<?php endif; ?>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12" data-aos="fade-up" data-aos-duration="2100">
                <div class="about__inner about__inner--2">

                    <div class="section__title section__title--2  sp_bottom_30">
                    	<?php if ( '' !== $settings['subtitle'] )  : ?>
                        <div class="section__title__button">
                            <span class="text__gradient"><?php echo wp_kses_post($settings['subtitle']); ?></span>
                        </div>
                        <?php endif; ?>
                        <?php if ( '' !== $settings['title'] )  : ?>
                        <div class="section__title__heading">
                            <h3><?php echo wp_kses_post($settings['title']); ?></h3>
                        </div>
                     	<?php endif; ?>
                    </div>

                    <div class="faq__accordion">
                        <div class="accordion" id="accordionPanelsStayOpenExample">
            				<?php
							$is = 0;
								foreach ( $settings['tabs'] as $item ) :
							$is++;
							?>
							<?php if($is == 1) { ?>
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="panelsStayOpen-heading<?php echo esc_attr($is)?>">
                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?php echo esc_attr($is)?>" aria-expanded="true" aria-controls="panelsStayOpen-collapse<?php echo esc_attr($is)?>">
                                    <?php echo wp_kses_post($item['title_faq']); ?>
                                </button>
                              </h2>
                              <div id="panelsStayOpen-collapse<?php echo esc_attr($is)?>" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-heading<?php echo esc_attr($is)?>">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                           <div class="accordion__text">
                                            <p><?php echo wp_kses_post($item['subtitle_faq']); ?></p>
                                           </div> 
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </div>
            				<?php } else { ?>
            
                            <div class="accordion-item">
                              <h2 class="accordion-header" id="panelsStayOpen-heading<?php echo esc_attr($is)?>">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?php echo esc_attr($is)?>" aria-expanded="false" aria-controls="panelsStayOpen-collapse<?php echo esc_attr($is)?>">
                                    <?php echo wp_kses_post($item['title_faq']); ?>
                                </button>
                              </h2>
                              <div id="panelsStayOpen-collapse<?php echo esc_attr($is)?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-heading<?php echo esc_attr($is)?>">
                                <div class="accordion-body">
                                    <div class="row">
                                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
                                           <div class="accordion__text">
                                            	<p><?php echo wp_kses_post($item['subtitle_faq']); ?></p>
                                           </div> 
                                        </div>
                                    </div>
                                </div>
                              </div>
                            </div>
            				<?php } ?>
            
                            <?php endforeach; ?>

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
