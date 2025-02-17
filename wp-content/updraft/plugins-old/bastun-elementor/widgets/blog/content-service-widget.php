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
class BdevsContentService extends \Elementor\Widget_Base {

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
		return 'bdevs-content-service';
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
		return __( 'Content Service', 'bdevs-elementor' );
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
		return 'eicon-post-content';
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
		return [ 'blog-elementor' ];
	}

	public function get_keywords() {
		return [ 'Content Service' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_content_inforService_details',
			[
				'label' => esc_html__( 'Service Details', 'bdevs-elementor' ),
			]
		);

		$this->add_control(
			'image',
			[
				'label'       => __( 'Featured Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],			
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Title', 'bdevs-elementor' ),
				'default'     => __( 'Management Consulting', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text 1', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Subtitle', 'bdevs-elementor' ),
				'default'     => __( '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Odio facilisis mauris sit amet massa vitae tortor condimentum. Etiam sit amet nisl purus in mollis nunc sed. Quam vulputate dignissim suspendisse in est ante in. Amet commodo nulla facilisi nullam vehicula. Arcu vitae elementum curabitur vitae nunc. Duis ultricies lacus sed turpis tincidunt id aliquet risus feugiat. Aenean vel elit scelerisque mauris pellentesque pulvinar. Turpis egestas maecenas pharetra convallis. Ac turpis egestas maecenas pharetra convallis. Morbi tincidunt augue interdum velit euismod. Accumsan sit amet nulla facilisi morbi tempus. Scelerisque eleifend donec pretium vulputate sapien nec sagittis aliquam.</p>
<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Odio facilisis mauris sit amet massa vitae tortor condimentum. Etiam sit amet nisl purus in mollis nunc sed. Quam vulputate dignissim suspendisse in est ante in. Amet commodo nulla facilisi nullam vehicula. Arcu vitae elementum curabitur vitae nunc. Duis ultricies lacus sed turpis tincidunt id aliquet risus feugiat. Aenean vel elit scelerisque mauris pellentesque pulvinar.</p>', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'image2',
			[
				'label'       => __( 'Featured Image 2', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],			
			]
		);
		$this->add_control(
			'title2',
			[
				'label'       => __( 'Title 2', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Title 2', 'bdevs-elementor' ),
				'default'     => __( 'Implementation Planning:', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'text2',
			[
				'label'       => __( 'Text 2', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Text 2', 'bdevs-elementor' ),
				'default'     => __( '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Odio facilisis mauris sit amet massa vitae tortor condimentum.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Odio facilisis mauris sit amet massa vitae tortor condimentum.</p>', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'title3',
			[
				'label'       => __( 'Title 3', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Title 3', 'bdevs-elementor' ),
				'default'     => __( 'Execution and Monitoring:', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'text3',
			[
				'label'       => __( 'Text 3', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Text 3', 'bdevs-elementor' ),
				'default'     => __( '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Odio facilisis mauris sit amet massa vitae tortor condimentum. Etiam sit amet nisl purus in mollis nunc sed. Quam vulputate dignissim suspendisse in est ante in. Amet commodo nulla facilisi nullam vehicula. Arcu vitae elementum curabitur vitae nunc. Duis ultricies lacus sed turpis tincidunt id aliquet risus feugiat. Aenean vel elit scelerisque mauris pellentesque pulvinar. Turpis egestas maecenas pharetra convallis. Ac turpis egestas maecenas pharetra convallis. Morbi tincidunt augue interdum velit euismod. Accumsan sit amet nulla facilisi morbi tempus. Scelerisque eleifend donec pretium vulputate sapien nec sagittis aliquam.</p><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Odio facilisis mauris sit amet massa vitae tortor condimentum. Etiam sit amet nisl purus in mollis nunc sed. Quam vulputate dignissim suspendisse in est ante in. Amet commodo nulla facilisi nullam vehicula. Arcu vitae elementum curabitur vitae nunc. Duis ultricies lacus sed turpis tincidunt id aliquet risus feugiat. Aenean vel elit scelerisque mauris pellentesque pulvinar.</p>', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'button',
			[
				'label'       => __( 'Button', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Button', 'bdevs-elementor' ),
				'default'     => __( 'GET A FREE QUOTE', 'bdevs-elementor' ),
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
		extract($settings); ?>
<div class="service__details servicess__details sp_top_140 sp_bottom_160">
    <div class="container">
        <div class="row">
			<div class="col-xl-4 col-lg-4 col-md-12 col-12 mobi-order-2">
				<?php if ( is_active_sidebar( 'sidebar-service' ) ) : ?>
					<?php dynamic_sidebar( 'sidebar-service' ); ?>
				<?php endif; ?> 
			</div>
			<div class="col-xl-8 col-lg-8 col-md-12 col-12 mobi-order-1">
				<div class="service__details__wraper">
					<?php if ( '' !== $settings['image']['url'] )  : ?>
				    <div class="service__details__img" data-aos="fade-up" data-aos-duration="1500">
				        <img src="<?php print esc_url($settings['image']['url']); ?>" alt="">
				    </div>
				    <?php endif; ?>
				    <?php if ( '' !== $settings['title'] )  : ?>
				    <div class="service__details__heading" data-aos="fade-up" data-aos-duration="1500">
				        <h4><?php echo wp_kses_post($settings['title']); ?></h4>
				    </div>
				    <?php endif; ?>
				    <?php if ( '' !== $settings['text'] )  : ?>
				    <div class="service__details__text" data-aos="fade-up" data-aos-duration="1500">
				        <?php echo wp_kses_post($settings['text']); ?>
				    </div>
				    <?php endif; ?>
				    <?php if ( '' !== $settings['image2']['url'] )  : ?>
				    <div class="service__details__planning" data-aos="fade-up" data-aos-duration="1500">
				        <div class="row">
				        	<?php if ( '' !== $settings['image2']['url'] )  : ?>
				            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				                <div class="service__details__planning__img">
				                    <img src="<?php print esc_url($settings['image2']['url']); ?>" alt="">
				                </div>
				            </div>
				            <?php endif; ?>
				            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
				                <div class="service__details__planning__inner">
				                	<?php if ( '' !== $settings['title2'] )  : ?>
				                    <div class="service__details__planning__heading">
				                        <h6><?php echo wp_kses_post($settings['title2']); ?></h6>
				                    </div>
				                    <?php endif; ?>
				                    <?php if ( '' !== $settings['text2'] )  : ?>
				                    <div class="service__details__planning__text">
				                        <?php echo wp_kses_post($settings['text2']); ?>
				                    </div>
				                    <?php endif; ?>
				                </div>
				            </div>
				        </div>
				    </div>
				    <?php endif; ?>
				    <?php if ( '' !== $settings['title3'] )  : ?>
				    <div class="service__details__heading" data-aos="fade-up" data-aos-duration="1500">
				        <h4><?php echo wp_kses_post($settings['title3']); ?></h4>
				    </div>
				    <?php endif; ?>
				    <?php if ( '' !== $settings['text3'] )  : ?>
				    <div class="service__details__text" data-aos="fade-up" data-aos-duration="1500">
				        <?php echo wp_kses_post($settings['text3']); ?>
				    </div>
				    <?php endif; ?>
				    <?php if ( '' !== $settings['button'] )  : ?>
				    <div class="service__details__button" data-aos="fade-up" data-aos-duration="1500">
				        <a class="default__button" href="<?php echo wp_kses_post($settings['link_button']); ?>"><?php echo wp_kses_post($settings['button']); ?></a>
				    </div>
				    <?php endif; ?>
				</div>
			</div>
        </div>  
    </div>
</div>
	<?php
	}
}