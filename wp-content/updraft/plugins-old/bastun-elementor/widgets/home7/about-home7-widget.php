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
class BdevsAboutHome7 extends \Elementor\Widget_Base {

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
		return 'bdevs-about-home7';
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
		return __( 'About Home 7', 'bdevs-elementor' );
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
		return [ 'home-7-elementor' ];
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
			'section_content_Abouthome7',
			[
				'label' => esc_html__( 'About Home 7', 'bdevs-elementor' ),
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
			'shape1',
			[
				'label'       => __( 'Shape Icon 1 ', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],			
			]
		);
		$this->add_control(
			'shape2',
			[
				'label'       => __( 'Shape Icon 2 ', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],			
			]
		);

		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'WE PROVIDE ALL KIND OF CONSULTING SERVICE FROMS 1998.', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'subheading',
			[
				'label'       => __( 'Subheading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Subheading', 'bdevs-elementor' ),
				'default'     => __( 'Welcome to our comprehensive HR solutions hub, your one-stop destination for addressing all your HR needs.', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'About Home 7', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'About #4', 'bdevs-elementor' ),
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
						'default'     => esc_html__( 'Best coverage' , 'bdevs-elementor' ),
						'label_block' => true,
					],
				],
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
<div class="about about__hiring__solution position-relative sp_top_140 sp_bottom_140">
    <div class="container">
        <div class="row">
            <div class="col-xl-7 col-lg-7 col-md-12 col-sm-12" data-aos="fade-up" data-aos-duration="1500">
                <div class="about__img__wrapper position-relative" data-tilt>
                	<?php if ( '' !== $settings['bg_image']['url'] )  : ?>
                    <img class="about__img__1" src="<?php print esc_url($settings['bg_image']['url']); ?>" alt="">
                    <?php endif; ?>
                    <div class="about__number">
                        <div class="about__number__inner about__number__position">
                            <?php if ( '' !== $settings['number_experience'] )  : ?>
                            <span><?php echo wp_kses_post($settings['number_experience']); ?></span>
                            <?php endif; ?>
                            <?php if ( '' !== $settings['title_experience'] )  : ?>
                            <p><?php echo wp_kses_post($settings['title_experience']); ?></p>
                            <?php endif; ?>
                            <?php if ( '' !== $settings['icon'] )  : ?>
                            <div class="about__number__icon">
                                <a href="<?php echo wp_kses_post($settings['link_icon']); ?>">  
                                	<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                              	</a>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="section__strock__line__animation">
                    	<?php if ( '' !== $settings['shape1']['url'] )  : ?>
                        <img class="ssla__animation ssl__img__1" src="<?php print esc_url($settings['shape1']['url']); ?>" alt="">
                        <?php endif; ?>
                        <?php if ( '' !== $settings['shape2']['url'] )  : ?>
                        <img class="ssla__animation ssl__img__2" src="<?php print esc_url($settings['shape2']['url']); ?>" alt="">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <div class="col-xl-5 col-lg-5 col-md-12 col-sm-12" data-aos="fade-up" data-aos-duration="2000">
                <div class="about__inner">

                    <div class="section__title section__title--2 sp_bottom_30">
                    	<?php if ('' != $settings['heading']): ?>
                        <div class="section__title__heading sp_bottom_20">
                            <h3><?php echo wp_kses_post($settings['heading']); ?></h3>
                        </div>
                        <?php endif ?>
                        <?php if ('' != $settings['subheading']): ?>
                        <div class="section__title__text">
                            <p><?php echo wp_kses_post($settings['subheading']); ?></p>
                        </div>
                        <?php endif ?>
                    </div>

                    <div class="about__hiring__list">
                        <ul>
                        	<?php
							$i = 0;
							foreach ( $settings['tabs'] as $item ) :
							$i++;
							?>
                            <li>
                                <?php \Elementor\Icons_Manager::render_icon( $item['icon_item'], [ 'aria-hidden' => 'true' ] ); ?>
                                <?php echo wp_kses_post($item['title']); ?>
                            </li>
                            <?php endforeach; ?>
                        </ul>
                    </div>
                    <?php if ('' != $settings['button']): ?>
                    <div class="about__button">
                        <a class="default__button" href="<?php echo wp_kses_post($settings['link_button']); ?>"><?php echo wp_kses_post($settings['button']); ?></a>
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
