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
class BdevsFactsHome2 extends \Elementor\Widget_Base {

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
		return 'bdevs-facts-home2';
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
		return __( 'Facts Home 2', 'bdevs-elementor' );
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
		return [ 'home-2-elementor' ];
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
			'section_content_Factshome2',
			[
				'label' => esc_html__( 'Facts Home 2', 'bdevs-elementor' ),
			]
		);	
		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Counterup', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Counterup #2', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					]
				],
				'fields' => [
					[
						'name'        => 'number',
						'label'       => esc_html__( 'Number', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '835' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'icon',
						'label'       => esc_html__( 'Icon', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '+' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					
					[
						'name'        => 'title',
						'label'       => esc_html__( 'Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Total products' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'    => 'img_facts',
						'label'   => esc_html__( 'Image Icon', 'bdevs-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'dynamic' => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
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
<div class="facts sp_40">
    <div class="container">
        <div class="facts__inner" id="funfactId">
        	<?php
			$i = 0;
			foreach ( $settings['tabs'] as $item ) :
				$i++;
			?>

			<?php if($i%4 == 1){?>
            <div class="facts__single text-center" data-aos="fade-up" data-aos-duration="1500">
            <?php } elseif($i%4 == 2){?>
            <div class="facts__single text-center" data-aos="fade-up" data-aos-duration="2000">
            <?php } elseif($i%4 == 3) { ?>
            <div class="facts__single text-center" data-aos="fade-up" data-aos-duration="2400">
            <?php } else { ?>
            <div class="facts__single text-center" data-aos="fade-up" data-aos-duration="2800">
            <?php }  ?>
               	<div class="facts__single__counter">
	                <div class="counter__number">
	                    <span class="counter js-counter" data-count="<?php echo wp_kses_post($item['number']); ?>"><?php echo wp_kses_post($item['number']); ?></span><?php echo wp_kses_post($item['icon']); ?>
	                </div>
	                <?php if ( '' !== $item['title'] )  : ?>
	                <p><?php echo wp_kses_post($item['title']); ?></p>
	                <?php endif; ?>
               	</div>
            </div>

            <?php if ( '' !== $item['img_facts']['url'] )  : ?>
            <?php if($i%3 == 1){?>
            <div class="facts__single" data-aos="fade-up" data-aos-duration="1800">
            <?php } elseif($i%4 == 2){?>
            <div class="facts__single" data-aos="fade-up" data-aos-duration="2200">
            <?php } elseif($i%4 == 3) { ?>
            <div class="facts__single" data-aos="fade-up" data-aos-duration="2600">
            <?php } else { ?>
            <div class="facts__single" data-aos="fade-up" data-aos-duration="3000">
            <?php }  ?>
                <img src="<?php echo wp_kses_post($item['img_facts']['url']); ?>" alt="">
            </div>
            <?php endif; ?>
            <?php endforeach; ?>
        </div>
    </div>
 </div>

	<?php
	}

}
