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
class BdevsPricingHome13 extends \Elementor\Widget_Base {

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
		return 'bdevs-pricing-home13';
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
		return __( 'Pricing Home 13', 'bdevs-elementor' );
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
		return [ 'home-13-elementor' ];
	}

	public function get_keywords() {
		return [ 'Pricing Home 13', 'carousel' ];
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
			'section_content_Pricinghome',
			[
				'label' => esc_html__( 'Pricing Home 13', 'bdevs-elementor' ),
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
			'clr_item',
			[
				'label'       => __( 'Color Background', 'bdevs-elementor' ),
				'type'        => Controls_Manager::COLOR,
				'placeholder' => __( 'Enter your Color Background', 'bdevs-elementor' ),
				'default'     => __( '#110C34', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'subheading',
			[
				'label'       => __( 'Subheading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Subheading', 'bdevs-elementor' ),
				'default'     => __( 'Happy Customers', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'subheading_button',
			[
				'label'       => __( 'Subheading Button', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Subheading  Button', 'bdevs-elementor' ),
				'default'     => __( '', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'DISCOVER OUR COMPETITIVE CONSULTING RATESS', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->end_controls_section();

		$this->start_controls_section(
			'section_content_monthlyhome',
			[
				'label' => esc_html__( 'Pricing Monthly Home 13', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'title_monthly',
			[
				'label'       => __( 'Title Monthly', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Monthly', 'bdevs-elementor' ),
				'default'     => __( 'BILLED MONTHLY', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Monthly Home 13', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Monthly #2', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					]
				],
				'fields' => [
					[
						'name'        => 'title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'BASIC PLAN' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'icon',
						'label' 		=> esc_html__( 'Icon', 'bdevs-elementor' ),
						'type' 			=> Controls_Manager::ICONS,
						'default' 		=> [
							'url' 			=> '',
						],
					],
					[
						'name'        => 'price',
						'label'       => esc_html__( 'Price', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '$80.26' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'subtitle_price',
						'label'       => esc_html__( 'Subtitle Price', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Small Business' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					
					[
						'name'        => 'text',
						'label'       => esc_html__( 'Text', 'bdevs-elementor' ),
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
						'default'     => esc_html__( 'GET STARTED' , 'bdevs-elementor' ),
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
		$this->end_controls_section();


		$this->start_controls_section(
			'section_content_yearlyhome',
			[
				'label' => esc_html__( 'Pricing Yearly Home 13', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'title_yearly',
			[
				'label'       => __( 'Title Yearly', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Monthly', 'bdevs-elementor' ),
				'default'     => __( 'BILLED YEARLY', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'tabs2',
			[
				'label' => esc_html__( 'Yearly Home 13', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Yearly #2', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					]
				],
				'fields' => [
					[
						'name'        => 'title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'BASIC PLAN' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'icon',
						'label' 		=> esc_html__( 'Icon', 'bdevs-elementor' ),
						'type' 			=> Controls_Manager::ICONS,
						'default' 		=> [
							'url' 			=> '',
						],
					],
					[
						'name'        => 'price',
						'label'       => esc_html__( 'Price', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '$80.26' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'subtitle_price',
						'label'       => esc_html__( 'Subtitle Price', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Small Business' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					
					[
						'name'        => 'text',
						'label'       => esc_html__( 'Text', 'bdevs-elementor' ),
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
						'default'     => esc_html__( 'GET STARTED' , 'bdevs-elementor' ),
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
<div class="pricing sp_top_120 sp_bottom_120 special__spacing" id="tb__pricing" style="background: <?php echo wp_kses_post($settings['clr_item']); ?> url(<?php print esc_url($settings['bg_image']['url']); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12" data-aos="fade-up" data-aos-duration="1500">
                <div class="section__title section__title--3 text-center sp_bottom_70">
                	<?php if ('' != $settings['subheading']) { ?>
                    <div class="section__title__small">
                        <span><?php echo wp_kses_post($settings['subheading']); ?></span>
                    </div>
                	<?php } else { ?>
                	<div class="section__title__button">
                        <span><?php echo wp_kses_post($settings['subheading_button']); ?></span>
                    </div>
                    <?php } ?>
                    <?php if ('' != $settings['heading']): ?>
                    <div class="section__title__heading">
                        <h3><?php echo wp_kses_post($settings['heading']); ?></h3>
                    </div>
                    <?php endif ?>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-xl-12" data-aos="fade-up" data-aos-duration="1500">
                <ul class="nav  pricing__tab" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="pricing__tab__link active" data-bs-toggle="tab" data-bs-target="#projects__one"
                            type="button"><?php echo wp_kses_post($settings['title_monthly']); ?></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="pricing__tab__link" data-bs-toggle="tab"
                            data-bs-target="#projects__two" type="button"><?php echo wp_kses_post($settings['title_yearly']); ?></button>
                    </li>

                </ul>

            </div>
        </div>

        <div class="tab-content tab__content__wrapper" id="myTabContent">

            <div class="tab-pane fade active show" id="projects__one" role="tabpanel"
                aria-labelledby="projects__one">
                <div class="social__wrapper">

                    <div class="row">
                    	<?php
						$i = 0;
						foreach ( $settings['tabs'] as $item ) :
							$i++;
						?>
						<?php if($i%4 == 1){?>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 pricing__single__wrap" data-aos="fade-up" data-aos-duration="1500">
                        <?php } elseif($i%4 == 2) { ?>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 pricing__single__wrap" data-aos="fade-up" data-aos-duration="1800">
                        <?php } elseif($i%4 == 3) { ?>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 pricing__single__wrap" data-aos="fade-up" data-aos-duration="2100">
                        <?php } else { ?>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 pricing__single__wrap" data-aos="fade-up" data-aos-duration="2400">
                        <?php } ?>
                            <div class="common__gradient__bg pricing__gradient single__transform">
                            	<?php if ( '' !== $item['icon']['value'] )  { ?>
                                <div class="pricing__single pricing__special">
                                <?php } else { ?>
                                <div class="pricing__single ">
                                <?php } ?>
                                	<?php if ( '' !== $item['icon']['value'] )  : ?>
                                	<div class="pricing__special__badge">
                                        <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </div>
                                    <?php endif; ?>
                                    <?php if ( '' !== $item['title'] )  : ?>
                                    <div class="pricing__small__button">
                                        <span><?php echo wp_kses_post($item['title']); ?></span>
                                    </div>
                                    <?php endif; ?>
                                    <div class="common__gradient__bg pricing__inner__gradient">
                                        <div class="pricing__single__price">
                                        	<?php if ( '' !== $item['price'] )  : ?>
                                            <h6 class="text__gradient "><?php echo wp_kses_post($item['price']); ?></h6>
                                            <?php endif; ?>
                                            <?php if ( '' !== $item['subtitle_price'] )  : ?>
                                            <span><?php echo wp_kses_post($item['subtitle_price']); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="pricing__single__text">
                                    	<?php if ( '' !== $item['text'] )  : ?>
                                        <ul>
                                            <?php echo wp_kses_post($item['text']); ?>
                                        </ul>
                                        <?php endif; ?>
                                    </div>
                                    <?php if ( '' !== $item['button'] )  : ?>
                                    <div class="pricing__single__button">
                                        <a class="default__button common__gradient__bg" href="<?php echo wp_kses_post($item['link_button']); ?>"><span><?php echo wp_kses_post($item['button']); ?></span></a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                    </div>
                </div>
            </div>

            <div class="tab-pane fade" id="projects__two" role="tabpanel" aria-labelledby="projects__two">
                <div class="social__wrapper">
                    <div class="row">
                    	<?php
						$i = 0;
						foreach ( $settings['tabs2'] as $item2 ) :
							$i++;
						?>
						<?php if($i%4 == 1){?>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 pricing__single__wrap" data-aos="fade-up" data-aos-duration="1500">
                        <?php } elseif($i%4 == 2) { ?>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 pricing__single__wrap" data-aos="fade-up" data-aos-duration="1800">
                        <?php } elseif($i%4 == 3) { ?>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 pricing__single__wrap" data-aos="fade-up" data-aos-duration="2100">
                        <?php } else { ?>
                        <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12 pricing__single__wrap" data-aos="fade-up" data-aos-duration="2400">
                        <?php } ?>
                            <div class="common__gradient__bg pricing__gradient single__transform">
                            	<?php if ( '' !== $item2['icon']['value'] )  { ?>
                                <div class="pricing__single pricing__special">
                                <?php } else { ?>
                                <div class="pricing__single ">
                                <?php } ?>
                                	<?php if ( '' !== $item2['icon']['value'] )  : ?>
                                	<div class="pricing__special__badge">
                                        <?php \Elementor\Icons_Manager::render_icon( $item2['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                    </div>
                                    <?php endif; ?>
                                    <?php if ( '' !== $item2['title'] )  : ?>
                                    <div class="pricing__small__button">
                                        <span><?php echo wp_kses_post($item2['title']); ?></span>
                                    </div>
                                    <?php endif; ?>
                                    <div class="common__gradient__bg pricing__inner__gradient">
                                        <div class="pricing__single__price">
                                            <?php if ( '' !== $item2['price'] )  : ?>
                                            <h6 class="text__gradient "><?php echo wp_kses_post($item2['price']); ?></h6>
                                            <?php endif; ?>
                                            <?php if ( '' !== $item2['subtitle_price'] )  : ?>
                                            <span><?php echo wp_kses_post($item2['subtitle_price']); ?></span>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                    <div class="pricing__single__text">
                                        <?php if ( '' !== $item2['text'] )  : ?>
                                        <ul>
                                            <?php echo wp_kses_post($item2['text']); ?>
                                        </ul>
                                        <?php endif; ?>
                                    </div>
                                    <?php if ( '' !== $item2['button'] )  : ?>
                                    <div class="pricing__single__button">
                                        <a class="default__button common__gradient__bg" href="<?php echo wp_kses_post($item2['link_button']); ?>"><span><?php echo wp_kses_post($item2['button']); ?></span></a>
                                    </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>

                        <?php endforeach; ?>


                    </div>
                </div>

            </div>

        </div>

    </div>
</div>


	<?php
	}

}
