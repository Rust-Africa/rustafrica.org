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
class BdevsContactHome10 extends \Elementor\Widget_Base {

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
		return 'bdevs-contact-home10';
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
		return __( 'Contact Home 10', 'bdevs-elementor' );
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
		return [ 'home-10-elementor' ];
	}

	public function get_keywords() {
		return [ 'Contact', 'carousel' ];
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
			'section_content_contacthome10',
			[
				'label' => esc_html__( 'Contact Home 10', 'bdevs-elementor' ),
			]
		);
		
		$this->add_control(
			'subheading',
			[
				'label'       => __( 'Subheading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Subheading', 'bdevs-elementor' ),
				'default'     => __( 'Contact', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'subheading_button',
			[
				'label'       => __( 'Subheading Button', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Subheading Button', 'bdevs-elementor' ),
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
				'default'     => __( 'Consulting support is just a Call or email away.', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'contact_form',
			[
				'label'       => __( 'Contact Form', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Contact Form', 'bdevs-elementor' ),
				'default'     => __( '[contact-form-7 id="1a908d7" title="Contact Form Home 8"]', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		
		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Contact Home 10', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Contact #10', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					]
				],
				'fields' => [
					[
						'name'    => 'icon_item',
						'label'       => __( 'Icon', 'bdevs-elementor' ),
						'type'    => Controls_Manager::ICONS,
						'default' 		=> [
								'url' 			=> '',
							],	
					],
					[
						'name'        => 'title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Hours:' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'text1',
						'label'       => esc_html__( 'Text 1', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Monday - Friday: 8 AM - 5:30 PM' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'text2',
						'label'       => esc_html__( 'Text 2', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Saturday - Sunday: Closed' , 'bdevs-elementor' ),
						'label_block' => true,
					],
				],
			]
		);	
		$this->add_control(
			'image',
			[
				'label'       => __( 'Image Contact', 'bdevs-elementor' ),
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
<div class="contact sp_top_130 sp_bottom_140">
    <div class="container">
        <div class="row">

            <div class="col-xl-12" data-aos="fade-up" data-aos-duration="1500">
                <div class="section__title text-center  sp_bottom_50">
                	<?php if ('' != $settings['subheading']): ?>
                    <div class="section__title__small">
                        <span><?php echo wp_kses_post($settings['subheading']); ?></span>
                    </div>
                    <?php endif ?>
                    <?php if ('' != $settings['subheading_button']): ?>
                    <div class="section__title__button">
                        <span class="text__gradient"><?php echo wp_kses_post($settings['subheading_button']); ?></span>
                    </div>
                    <?php endif ?>
                    <?php if ('' != $settings['heading']): ?>
                    <div class="section__title__heading">
                        <h3><?php echo wp_kses_post($settings['heading']); ?></h3>
                    </div>
                    <?php endif ?>
                </div>
            </div>


            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12" data-aos="fade-up" data-aos-duration="1500">
                <div class="contact__input__wrapper">
                    <?php echo do_shortcode($settings['contact_form']); ?>
                </div>
            </div>

            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12 contact__info__right" data-aos="fade-up" data-aos-duration="1500">
                <div class="contact__info">
                    <?php
					$i = 0;
					foreach ( $settings['tabs'] as $item ) :
					$i++;
					?>
                    <div class="contact__single__item" data-aos="fade-up" data-aos-duration="1500">
                        <div class="contact__icon">
                            <span>
                                <?php \Elementor\Icons_Manager::render_icon( $item['icon_item'], [ 'aria-hidden' => 'true' ] ); ?>
                            </span>
                        </div>
                        <div class="contact__text">
                            <h6><?php echo wp_kses_post($item['title']); ?></h6>
                            <p><?php echo wp_kses_post($item['text1']); ?></p>
                            <p><?php echo wp_kses_post($item['text2']); ?></p>
                        </div>
                    </div>

                    <?php endforeach; ?>
                </div>
                <?php if ( '' !== $settings['image']['url'] )  : ?>
                <div class="contact__img" data-aos="fade-up" data-aos-duration="1500">
                    <img src="<?php print esc_url($settings['image']['url']); ?>" alt="">
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
	<?php
	}

}
