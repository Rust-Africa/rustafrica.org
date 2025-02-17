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
class BdevsWorkingStartHome3 extends \Elementor\Widget_Base {

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
		return 'bdevs-working-start-home3';
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
		return __( 'Working Start Home 3', 'bdevs-elementor' );
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
		return [ 'Working Start', 'carousel' ];
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
			'section_content_working-starthome3',
			[
				'label' => esc_html__( 'Working Start Home 3', 'bdevs-elementor' ),
			]
		);	
		$this->add_control(
			'heading1',
			[
				'label'       => __( 'Heading 1', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your heading 1', 'bdevs-elementor' ),
				'default'     => __( '24/7 CLINE SUPPORT', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'desc1',
			[
				'label'       => __( 'Description 1', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Description 1', 'bdevs-elementor' ),
				'default'     => __( 'Lorem ipsum dolor sit amet consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'button1',
			[
				'label'       => __( 'Button 1', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Button 1', 'bdevs-elementor' ),
				'default'     => __( 'OUR SERVICE', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'link_button1',
			[
				'label'       => __( 'Link Button 1', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Link Button 1', 'bdevs-elementor' ),
				'default'     => __( '#', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'heading2',
			[
				'label'       => __( 'Heading 2', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your heading 2', 'bdevs-elementor' ),
				'default'     => __( '100% CLIENT SATISFACTION', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'desc2',
			[
				'label'       => __( 'Description 2', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Description 2', 'bdevs-elementor' ),
				'default'     => __( 'Lorem ipsum dolor sit amet consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'button2',
			[
				'label'       => __( 'Button 2', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Button 2', 'bdevs-elementor' ),
				'default'     => __( 'CONTACT WITH US', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'link_button2',
			[
				'label'       => __( 'Link Button 2', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Link Button 2', 'bdevs-elementor' ),
				'default'     => __( '#', 'bdevs-elementor' ),
				'label_block' => true,
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
<div class="working"  data-aos="fade-up" data-aos-duration="1500">
    <div class="container">
        <div class="row">
            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="working__support ws__left__side">
                	<?php if ('' != $settings['heading1']): ?>
                    <div class="working__heading">
                        <h5><?php echo wp_kses_post($settings['heading1']); ?></h5>
                    </div>
                    <?php endif ?>
                    <?php if ('' != $settings['desc1']): ?>
                    <div class="working__paragraph">
                        <p><?php echo wp_kses_post($settings['desc1']); ?></p>
                    </div>
                    <?php endif ?>
                    <?php if ('' != $settings['button1']): ?>
                    <div class="working__button">
                        <a class="default__button" href="<?php echo wp_kses_post($settings['link_button1']); ?>"><?php echo wp_kses_post($settings['button1']); ?></a>
                    </div>
                    <?php endif ?>
                </div>
            </div>

            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                <div class="working__support working__support--2">
                	<?php if ('' != $settings['heading2']): ?>
                    <div class="working__heading">
                        <h5><?php echo wp_kses_post($settings['heading2']); ?></h5>
                    </div>
                    <?php endif ?>
                    <?php if ('' != $settings['desc2']): ?>
                    <div class="working__paragraph">
                        <p><?php echo wp_kses_post($settings['desc2']); ?></p>
                    </div>
                    <?php endif ?>
                    <?php if ('' != $settings['button2']): ?>
                    <div class="working__button">
                        <a class="default__button btn__white" href="<?php echo wp_kses_post($settings['link_button2']); ?>"><?php echo wp_kses_post($settings['button2']); ?></a>
                    </div>
                    <?php endif ?>
                </div>
            </div>
        </div>
        <?php if ( '' !== $settings['brand__badge']['url'] )  : ?>
        <div class="working__support__img">
            <div class="bastun__brand__badge">
                <div class="bastun__brand__badge__inner position-relative">
                    <a href="<?php print wp_kses_post($settings['link_brand__badge']); ?>">
                        <img class="bbb__animate" src="<?php print esc_url($settings['brand__badge']['url']); ?>" alt="Support badge">
                        <img class="bbb__icon" src="<?php print esc_url($settings['brand__badge__inner']['url']); ?>" alt="Support icon badge">
                    </a>
                </div>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>
	<?php
	}

}
