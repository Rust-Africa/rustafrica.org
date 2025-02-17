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
class BdevsWorkProcessHome3 extends \Elementor\Widget_Base {

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
		return 'bdevs-work-process-home3';
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
		return __( 'Work Process Home 3', 'bdevs-elementor' );
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
		return [ 'Work Process', 'carousel' ];
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
			'section_content_WorkProcesshome3',
			[
				'label' => esc_html__( 'Work Process Home 3', 'bdevs-elementor' ),
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
				'default'     => __( 'Work Process', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'HOW IT WORK?', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$repeater = new \Elementor\Repeater();
			$repeater->add_control(
				'icon_image',
				[
					'label' 		=> esc_html__( 'Icon Image', 'bdevs-elementor' ),
					'type' 			=> Controls_Manager::ICONS,
					'default' 		=> [
					],
				]
			);
			$repeater->add_control(
				'title',
				[
					'label'       	=> __( 'Title', 'bdevs-elementor' ),
					'type'        	=> Controls_Manager::TEXTAREA,
					'placeholder' 	=> __( 'Enter your text ', 'bdevs-elementor' ),
					'default'     	=> __( 'BOOK A SERVICE', 'bdevs-elementor' ),
					'label_block' 	=> true,
				]
			);
			$repeater->add_control(
				'link',
				[
					'label'       	=> __( 'Link Title', 'bdevs-elementor' ),
					'type'        	=> Controls_Manager::TEXTAREA,
					'placeholder' 	=> __( 'Enter your Link Title ', 'bdevs-elementor' ),
					'default'     	=> __( '#', 'bdevs-elementor' ),
					'label_block' 	=> true,
				]
			);
			$repeater->add_control(
				'subtitle',
				[
					'label'       	=> __( 'Subtitle', 'bdevs-elementor' ),
					'type'        	=> Controls_Manager::TEXTAREA,
					'placeholder' 	=> __( 'Enter your Subtitle', 'bdevs-elementor' ),
					'default'     	=> __( 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum.', 'bdevs-elementor' ),
					'label_block' 	=> true,
				]
			);
			$repeater->add_control(
				'icon',
				[
					'label' 		=> esc_html__( 'Icon', 'bdevs-elementor' ),
					'type' 			=> Controls_Manager::ICONS,
					'default' 		=> [
					],
				]
			);
			$repeater->add_control(
				'link_icon',
				[
					'label'       	=> __( 'Link Icon', 'bdevs-elementor' ),
					'type'        	=> Controls_Manager::TEXTAREA,
					'placeholder' 	=> __( 'Enter your Link Icon ', 'bdevs-elementor' ),
					'default'     	=> __( '#', 'bdevs-elementor' ),
					'label_block' 	=> true,
				]
			);
		$this->add_control(
			'tabs',
			[
				'label' 		=> esc_html__( 'Tab List Service Post', 'bdevs-elementor' ),
				'type' 			=> Controls_Manager::REPEATER,
				'fields' 		=> $repeater->get_controls(),
				'default' 		=> [
					[
						
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
<div class="work__process sp_top_140 sp_bottom_270 " style="background: var(--blackBlue) url(<?php print esc_url($settings['bg_image']['url']); ?>);">
    <div class="container">
        <div class="row">
            <div class="col-xl-12" data-aos="fade-up" data-aos-duration="1500">
                <div class="section__title section__title--3 text-center sp_bottom_70">
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
            </div>
        </div>
        <div class="work__process__inner__wrap">
        	<?php
			$i = 0;
			foreach ( $settings['tabs'] as $item ) :
				$i++;
			?>
			<?php if($i%3 == 1){?>
            <div class="work__process__single single__transform " data-aos="fade-up" data-aos-duration="1500">
            <?php } elseif($i%3 == 2){?>
            <div class="work__process__single single__transform " data-aos="fade-up" data-aos-duration="2100">
            <?php } else {?>
            <div class="work__process__single single__transform " data-aos="fade-up" data-aos-duration="2700">
            <?php } ?>
            	<?php if ( ! empty( $item['icon_image']['value'] ) ) { ?>
                <div class="work__process__icon">
                    <a href="<?php echo wp_kses_post($item['link']); ?>">       
                       <?php \Elementor\Icons_Manager::render_icon( $item['icon_image'], [ 'aria-hidden' => 'true' ] ); ?>
                    </a>  
                </div>
                <?php } ?>
                <div class="work__process__content">
                	<?php if ('' != $item['title']): ?>
                    <div class="work__process__name">
                        <h6><a href="<?php echo wp_kses_post($item['link']); ?>"><?php echo wp_kses_post($item['title']); ?></a></h6>
                    </div>
                    <?php endif ?>
                    <?php if ('' != $item['subtitle']): ?>
                    <div class="work__process__text">
                        <p><?php echo wp_kses_post($item['subtitle']); ?></p>
                    </div>
                    <?php endif ?>
                </div>
            </div>
            <?php if ( ! empty( $item['icon']['value'] ) ) { ?>
            <?php if($i%2 == 1){?>
            <div class="work__process__arrow" data-aos="fade-up" data-aos-duration="1800">
            <?php } else {?>
            <div class="work__process__arrow" data-aos="fade-up" data-aos-duration="2400">
            <?php } ?>
                <a class="direction__btn direction__btn--2" href="<?php echo wp_kses_post($item['link_icon']); ?>">
                    <?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                </a>
            </div>
            <?php } ?>
            <?php endforeach; ?>
        </div>
    </div>
</div>
	<?php
	}

}
