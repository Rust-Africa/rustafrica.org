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
class BdevsSkillareaHome5 extends \Elementor\Widget_Base {

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
		return 'bdevs-skillarea-home5';
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
		return __( 'Skill Area Home 5', 'bdevs-elementor' );
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
		return [ 'home-5-elementor' ];
	}

	public function get_keywords() {
		return [ 'Skill Area', 'carousel' ];
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
			'section_content_Skillareahome5',
			[
				'label' => esc_html__( 'Skill Area Home 5', 'bdevs-elementor' ),
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
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Subheading', 'bdevs-elementor' ),
				'default'     => __( 'We are best', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'We’ll Ensure You Always Get the Best Guidance.', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'text',
			[
				'label'       => __( 'Description', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Description', 'bdevs-elementor' ),
				'default'     => __( 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Rerum, voluptates? Quis nam odit doloremque eveniet harum incidunt praesentium ut nulla.', 'bdevs-elementor' ),
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
		$this->add_control(
			'heading_progress',
			[
				'label'       => __( 'Heading Progress', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your heading Progress', 'bdevs-elementor' ),
				'default'     => __( 'Finance solutions for you.', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'subheading_progress',
			[
				'label'       => __( 'Subheading Progress', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Subheading Progress', 'bdevs-elementor' ),
				'default'     => __( 'Lorem, ipsum dolor sit amet consectetur adipisicing elit. Modi voluptatibus.', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Progress Home 5', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Progress #5', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					]
				],
				'fields' => [
					[
						'name'        => 'title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Consulting' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'number',
						'label'       => esc_html__( 'Number', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '90' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'subtitle',
						'label'       => esc_html__( 'Subtitle', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '90%' , 'bdevs-elementor' ),
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
<div class="skillarea sp_bottom_110 sp_top_140" style="background: url(<?php print esc_url($settings['bg_image']['url']); ?>);">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-7 col-lg-6 col-md-12 col-sm-12 col-12"  data-aos="fade-up" data-aos-duration="1500">
                <div class="section__title  section__title--2 blog__4__padding__right section__title--3">
                	<?php if ('' != $settings['subheading']): ?>
                    <div class="section__title__button">
                        <span><?php echo wp_kses_post($settings['subheading']); ?></span>
                    </div>
                    <?php endif ?>
                    <?php if ('' != $settings['heading']): ?>
                    <div class="section__title__heading sp_bottom_20">
                        <h3><?php echo wp_kses_post($settings['heading']); ?></h3>
                    </div>
                    <?php endif ?>
                    <?php if ( '' !== $settings['text'] )  : ?>
                    <div class="blog__4__section__title__text">
                        <p><?php echo wp_kses_post($settings['text']); ?></p>
                    </div>
                    <?php endif ?>
                    <?php if ('' != $settings['button']): ?>
                    <div class="section__title__button">
                        <a class="default__button" href="<?php echo wp_kses_post($settings['link_button']); ?>"><?php echo wp_kses_post($settings['button']); ?></a>
                    </div>
                    <?php endif ?>
                </div>

            </div>
            <div class="col-xl-5 col-lg-6 col-md-12 col-sm-12 col-12"  data-aos="fade-up" data-aos-duration="1800">
                <div class="skill__sets">
                	<?php if ('' != $settings['heading_progress']): ?>
                    <h3><?php echo wp_kses_post($settings['heading_progress']); ?></h3>
                    <?php endif ?>
                    <?php if ('' != $settings['subheading_progress']): ?>
                    <p><?php echo wp_kses_post($settings['subheading_progress']); ?></p>
                    <?php endif ?>
                    <?php
					$i = 0;
						foreach ( $settings['tabs'] as $item ) :
					$i++;
					?>
                    <div class="single-progress">
                        <h6 class="title"><?php echo wp_kses_post($item['title']); ?></h6>
                        <div class="progress">
                            <div class="progress-bar progress__gradient" role="progressbar" style="width: <?php echo wp_kses_post($item['number']); ?>%; visibility: visible; animation-duration: 0.5s; animation-delay: 0.3s; animation-name: fadeInLeft;" aria-valuenow="<?php echo wp_kses_post($item['number']); ?>" aria-valuemin="0" aria-valuemax="100">

                            </div>
                            <span class="progress-number"><?php echo wp_kses_post($item['subtitle']); ?></span>
                        </div>
                    </div>

                    <?php endforeach; ?>

                </div>
            </div>
        </div>
    </div>
</div>

	<?php
	}

}
