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
class BdevsVideoHome1 extends \Elementor\Widget_Base {

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
		return 'bdevs-video-home1';
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
		return __( 'Video Home 1', 'bdevs-elementor' );
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
		return [ 'Video', 'carousel' ];
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
			'section_content_videohome',
			[
				'label' => esc_html__( 'Video Home 1', 'bdevs-elementor' ),
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
			'heading_left',
			[
				'label'       => __( 'Heading Left', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your heading Left', 'bdevs-elementor' ),
				'default'     => __( 'INTRO', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'icon_image',
			[
				'label'       => __( 'Icon Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],			
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
			'icon_video',
			[
				'label'       => __( 'Icon Video', 'bdevs-elementor' ),
				'type'    => Controls_Manager::ICONS,
				'default' 		=> [
						'url' 			=> '',
					],		
			]
		);
		$this->add_control(
			'heading_right',
			[
				'label'       => __( 'Heading Right', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Heading Right', 'bdevs-elementor' ),
				'default'     => __( 'VIDEO', 'bdevs-elementor' ),
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
<div class="video sp_bottom_140 video__nmt" id="video__area" data-aos="fade-up">
    <div class="container-fluid full__width__padding">
        <div class="row">
            <div class="col-xl-12">
                <div class="video__img position-relative">
                	<?php if ('' != $settings['heading_left']): ?>
                    <div class="video__text video__text--1">
                        <h2><?php echo wp_kses_post($settings['heading_left']); ?></h2>
                    </div>
                    <?php endif ?>
                    <img src="<?php print esc_url($settings['bg_image']['url']); ?>" alt="">
                    <div class="video__small__img">
                        <img src="<?php print esc_url($settings['icon_image']['url']); ?>" alt="">
                    </div>
                    <div class="video__button">
                        <a class="video__card--link glightbox" data-gallery="video_popup" href="<?php echo wp_kses_post($settings['video']); ?>">
                            <?php \Elementor\Icons_Manager::render_icon( $settings['icon_video'], [ 'aria-hidden' => 'true' ] ); ?>
                        </a>
                    </div>
                    <?php if ('' != $settings['heading_right']): ?>
                    <div class="video__text video__text--2">
                        <h2><?php echo wp_kses_post($settings['heading_right']); ?></h2>
                    </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
    </div>
</div>

	<?php
	}

}
