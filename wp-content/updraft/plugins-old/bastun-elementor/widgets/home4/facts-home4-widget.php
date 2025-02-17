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
class BdevsFactsHome4 extends \Elementor\Widget_Base {

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
		return 'bdevs-facts-home4';
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
		return __( 'Facts Home 4', 'bdevs-elementor' );
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
		return [ 'home-4-elementor' ];
	}

	public function get_keywords() {
		return [ 'Facts', 'carousel' ];
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
			'section_content_Factshome4',
			[
				'label' => esc_html__( 'Facts Home 4', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( '22 Years Experience in Education and Teaching', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'subheading',
			[
				'label'       => __( 'Subheading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Subheading', 'bdevs-elementor' ),
				'default'     => __( 'Nullam at elementum odque auctor dui. Donec non nunc sodales massa finibus impe tomaer majhe keu rdiet.', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'button',
			[
				'label'       => __( 'Button', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Button', 'bdevs-elementor' ),
				'default'     => __( 'LEARN MORE ABOUT US', 'bdevs-elementor' ),
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
			'tabs',
			[
				'label' => esc_html__( 'Facts 1 Home 4', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Facts #4', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					]
				],
				'fields' => [
					[
						'name'    => 'image',
						'label'   => esc_html__( 'Icon Image', 'bdevs-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'dynamic' => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
					],
					[
						'name'        => 'title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Online Courses' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'number',
						'label'       => esc_html__( 'Number', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '1000' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'per',
						'label'       => esc_html__( 'Per', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '+' , 'bdevs-elementor' ),
						'label_block' => true,
					],
				],
			]
		);	
		$this->add_control(
			'tabs2',
			[
				'label' => esc_html__( 'Facts 2 Home 4', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Facts #4', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					]
				],
				'fields' => [
					[
						'name'    => 'image',
						'label'   => esc_html__( 'Icon Image', 'bdevs-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'dynamic' => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
					],
					[
						'name'        => 'title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Online Courses' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'number',
						'label'       => esc_html__( 'Number', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '1000' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'per',
						'label'       => esc_html__( 'Per', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '+' , 'bdevs-elementor' ),
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
<div class="facts-area fact-area-margin mt-170">
    <div class="container">
        <div class="row justify-content-center">

            <div class="col-xl-5 col-lg-5 col-md-10 col-sm-12 col-12 pr-lg-0">
                <div class="title mt--10 mb-50">
                	<?php if ( '' !== $settings['heading'] )  : ?>
                    <h2 class="mb-30"><?php print wp_kses_post($settings['heading']); ?></h2>
                    <?php endif; ?>
                    <?php if ( '' !== $settings['subheading'] )  : ?>
                    <p class="pb-35"><?php print wp_kses_post($settings['subheading']); ?></p>
                    <?php endif; ?>
                    <?php if ( '' !== $settings['button'] )  : ?>
                    <div class="btn-2 d-block aos-init aos-animate" data-aos="fade-up" data-aos-duration="1000">
                        <a href="<?php print wp_kses_post($settings['link_button']); ?>" class="main-color d-inline-block position-relative f-500 text-uppercase"><?php print wp_kses_post($settings['button']); ?></a>
                    </div><!-- /btn-2 -->
                    <?php endif; ?>
                </div><!-- /title -->
                
            </div><!-- /col -->

            <div class="col-xl-5 offset-xl-2 col-lg-6  col-md-9  col-sm-12 col-12 z-index1">
                <div class="row fact-wrapper">
                    <div class="col-xl-6  col-lg-6  col-md-6  col-sm-6 col-12 justify-content-center">
                    	<?php
					    	$idd = 0;
					    	foreach ( $settings['tabs'] as $item ) :
					    	$idd++;
						?>
                        <div class="single-fact white-bg text-center pt-55 pb-35 mb-30 tilt">
                            <div class="fact-icon mb-25">
                                <img src="<?php print esc_url($item['image']['url']); ?>" alt="">
                            </div><!-- /fact-icon -->
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="main-color f-500 d-inline-block counter"><?php print wp_kses_post($item['number']); ?></span>
                                <span class="per main-color d-inline-block f-700"><?php print wp_kses_post($item['per']); ?></span>
                            </div>
                            <p class="text-center mb-0"><?php print wp_kses_post($item['title']); ?></p>
                        </div> <!-- /single-fact -->
                        
                        <?php endforeach; ?>

                    </div><!-- /col -->

                    <div class="col-xl-6  col-lg-6  col-md-6  col-sm-6 col-12 ">
                    	<?php
					    	$idd = 0;
					    	foreach ( $settings['tabs2'] as $item2 ) :
					    	$idd++;
						?>
                        <div class="single-fact single-fact-margin-top white-bg text-center pt-55 pb-35 mt-30 mb-30 tilt">
                            <div class="fact-icon mb-25">
                                <img src="<?php print esc_url($item2['image']['url']); ?>" alt="">
                            </div><!-- /fact-icon -->
                            <div class="d-flex align-items-center justify-content-center">
                                <span class="main-color f-500 d-inline-block counter"><?php print wp_kses_post($item2['number']); ?></span>
                                <span class="per main-color d-inline-block f-700"><?php print wp_kses_post($item2['per']); ?></span>
                            </div>
                            <p class="text-center mb-0"><?php print wp_kses_post($item2['title']); ?></p>
                        </div> <!-- /single-fact -->

                        <?php endforeach; ?>

                    </div><!-- /col -->

                </div><!-- /row -->
            </div><!-- /col -->
        </div><!-- /row -->
    </div><!-- /container -->
</div>

	<?php
	}

}
