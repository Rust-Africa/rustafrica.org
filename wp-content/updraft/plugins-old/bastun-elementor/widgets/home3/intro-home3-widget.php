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
class BdevsIntroHome3 extends \Elementor\Widget_Base {

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
		return 'bdevs-intro-home3';
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
		return __( 'Intro Home 3', 'bdevs-elementor' );
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
		return [ 'Intro', 'carousel' ];
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
			'section_content_Introhome3',
			[
				'label' => esc_html__( 'Intro Home 3', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Instructor', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Clients #2', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					]
				],
				'fields' => [
					[
						'name'        => 'gradient_angle',
						'label' => esc_html__( 'Angle (deg)', 'elementor' ),
						'type' => Controls_Manager::TEXT,
						'default'     => esc_html__( '-45' , 'bdevs-elementor' ),
					],
					[
						'name'        => 'color',
						'label'       => esc_html__( 'Color', 'bdevs-elementor' ),
						'type'        => Controls_Manager::COLOR,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'color_stop',
						'label'       => esc_html__( 'Color Location', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '0%' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'color2',
						'label'       => esc_html__( 'Color 2', 'bdevs-elementor' ),
						'type'        => Controls_Manager::COLOR,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'color_stop2',
						'label'       => esc_html__( 'Color Location 2', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '49%' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'color3',
						'label'       => esc_html__( 'Color 3', 'bdevs-elementor' ),
						'type'        => Controls_Manager::COLOR,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'color_stop3',
						'label'       => esc_html__( 'Color Location 3', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '100%' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'    => 'bg_image',
						'label'   => esc_html__( 'Background Image', 'bdevs-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'dynamic' => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
					],
					[
						'name'    => 'icon',
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
						'default'     => esc_html__( 'Top Quality Content' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'link_title',
						'label'       => esc_html__( 'Link Title', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( '#' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'subtitle',
						'label'       => esc_html__( 'Subtitle', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXTAREA,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Ampor incididunt ut labore et dolore magna aliqua. Ut enim ad minim Lorem ipsum dolor sit amet, consecte tomra keuki' , 'bdevs-elementor' ),
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
<div class="intro-area pb-160 over-hidden">
    <div class="row no-gutters">
    	<?php
	    	$idd = 0;
	    	foreach ( $settings['tabs'] as $item ) :
	    	$idd++;
		?>
        <div class="col-xl-4  col-lg-4  col-md-4  col-sm- col-">
            <div class="intro-wrapper1" style="
                        background-image: -webkit-linear-gradient(<?php print wp_kses_post($item['gradient_angle']); ?>deg, <?php print wp_kses_post($item['color']); ?> <?php print wp_kses_post($item['color_stop']); ?>, <?php print wp_kses_post($item['color2']); ?> <?php print wp_kses_post($item['color_stop2']); ?>, <?php print wp_kses_post($item['color3']); ?> <?php print wp_kses_post($item['color_stop3']); ?>);">
                <div class="single-intro pt-170 pb-160 bg-cover bg-no-repeat" data-background="<?php print esc_url($item['bg_image']['url']); ?>">
                    <div class="intro-icon d-inline-block text-center mb-55">
                        <img src="<?php print esc_url($item['icon']['url']); ?>" alt="">
                    </div><!-- /intro-icon -->
                    <div class="intro-text">
                        <a href="<?php print wp_kses_post($item['link_title']); ?>"><h3 class="text-white pb-20"><?php print wp_kses_post($item['title']); ?></h3></a>
                        <p class="text-white mb-0"><?php print wp_kses_post($item['subtitle']); ?></p>
                    </div>
                </div>
            </div>
        </div><!-- /col -->
        <?php endforeach; ?>
    </div><!-- /row -->
</div>
<?php if (is_admin()) { ?>
<script type="text/javascript">
	$("[data-background]").each(function (){
        $(this).css("background-image","url(" + $(this).attr("data-background") + ")");
    });
</script>
<?php }  ?>


	<?php
	}

}
