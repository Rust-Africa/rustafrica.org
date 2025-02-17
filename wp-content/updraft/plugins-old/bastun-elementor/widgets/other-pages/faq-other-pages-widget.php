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
class BdevsFaqPagesOtherPages extends \Elementor\Widget_Base {

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
		return 'bdevs-faq-other-pages';
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
		return __( 'FAQ Other Pages', 'bdevs-elementor' );
	}

	/**
	 * Get widget icon.
	 *
	 * Retrieve Bdevs Section widget icon.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return string Widget icon.
	 */
	public function get_icon() {
		return 'eicon-posts-grid';
	}

	/**
	 * Get widget categories.
	 *
	 * Retrieve the list of categories the Bdevs Section widget belongs to.
	 *
	 * @since 1.0.0
	 * @access public
	 *
	 * @return array Widget categories.
	 */
	public function get_categories() {
		return [ 'other-pages-elementor' ];
	}

	public function get_keywords() {
		return [ 'FAQ', 'carousel' ];
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
			'section_content_FAQpagesother',
			[
				'label' => esc_html__( 'FAQ Other Pages', 'bdevs-elementor' ),
			]
		);
		global $wp_registered_sidebars;

		$options = [];

		if ( ! $wp_registered_sidebars ) {
			$options[''] = esc_html__( 'No sidebars were found', 'elementor' );
		} else {
			$options[''] = esc_html__( 'Choose Sidebar', 'elementor' );

			foreach ( $wp_registered_sidebars as $sidebar_id => $sidebar ) {
				$options[ $sidebar_id ] = $sidebar['name'];
			}
		}

		$default_key = array_keys( $options );
		$default_key = array_shift( $default_key );

		$this->add_control(
			'sidebar',
			[
				'label' => esc_html__( 'Choose Sidebar', 'elementor' ),
				'type' => Controls_Manager::SELECT,
				'default' => $default_key,
				'options' => $options,
			]
		);
		$repeater = new \Elementor\Repeater();
			$repeater->add_control(
				'heading',
				[
					'label'       	=> __( 'Heading', 'bdevs-elementor' ),
					'type'        	=> Controls_Manager::TEXTAREA,
					'placeholder' 	=> __( 'Enter your Heading', 'bdevs-elementor' ),
					'default'     	=> __( 'What is business consulting?', 'bdevs-elementor' ),
					'label_block' 	=> true,
				]
			);
			
			$repeater->add_control(
				'subheading',
				[
					'label'       	=> __( 'Subheading', 'bdevs-elementor' ),
					'type'        	=> Controls_Manager::TEXTAREA,
					'placeholder' 	=> __( 'Enter your Subheading', 'bdevs-elementor' ),
					'default'     	=> __( 'Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'bdevs-elementor' ),
					'label_block' 	=> true,
				]
			);
			$repeater->add_control(
				'image',
				[
					'label'   => esc_html__( ' Background Image', 'bdevs-elementor' ),
					'type' 			=> Controls_Manager::MEDIA,
					'default' 		=> [
						'url' 			=> '',
					],
				],
			);
		$this->add_control(
			'tabs',
			[
				'label' 		=> esc_html__( 'Tab List sidebar', 'bdevs-elementor' ),
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

<div class="faq__area sp_top_140 sp_bottom_140">
    <div class="container">
        <div class="row">
        	<?php if ( is_active_sidebar( $sidebar ) ) : ?>
            <div class="col-xl-4 col-lg-4 col-md-12 col-12">
                <div class="service__details__sidebar sidebar">
                    <?php dynamic_sidebar( $sidebar ); ?>
                </div>
            </div>
            <?php endif; ?> 
            <div class="col-xl-8 col-lg-8 col-md-12 col-12" data-aos="fade-up" data-aos-duration="1500">
           <div class="faq__accordion">
            <div class="accordion" id="accordionPanelsStayOpenExample">
            	<?php
			    	$id = 0;
			    	foreach ( $settings['tabs'] as $item ) :
			    	$id++;
				?>
				<?php if($id==1){?>
                <div class="accordion-item">
                  <h2 class="accordion-header" id="panelsStayOpen-heading<?php echo esc_attr($id)?>">
                    <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?php echo esc_attr($id)?>" aria-expanded="true" aria-controls="panelsStayOpen-collapseOne">
                        <?php print wp_kses_post($item['heading']); ?>
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapse<?php echo esc_attr($id)?>" class="accordion-collapse collapse show" aria-labelledby="panelsStayOpen-headingOne">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                               <div class="accordion__text">
                                <p><?php print wp_kses_post($item['subheading']); ?></p>
                               </div> 
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="accordion__img">
                                    <img src="<?php print esc_url($item['image']['url']); ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <?php } else { ?>

                <div class="accordion-item">
                  <h2 class="accordion-header" id="panelsStayOpen-heading<?php echo esc_attr($id)?>">
                    <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#panelsStayOpen-collapse<?php echo esc_attr($id)?>" aria-expanded="false" aria-controls="panelsStayOpen-collapseTwo">
                        <?php print wp_kses_post($item['heading']); ?>
                    </button>
                  </h2>
                  <div id="panelsStayOpen-collapse<?php echo esc_attr($id)?>" class="accordion-collapse collapse" aria-labelledby="panelsStayOpen-headingTwo">
                    <div class="accordion-body">
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                               <div class="accordion__text">
                                	<p><?php print wp_kses_post($item['subheading']); ?></p>
                               </div> 
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                                <div class="accordion__img">
                                    <img src="<?php print esc_url($item['image']['url']); ?>" alt="">
                                </div>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
                <?php } ?>

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