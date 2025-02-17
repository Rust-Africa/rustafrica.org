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
class BdevsContentProject extends \Elementor\Widget_Base {

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
		return 'bdevs-content-project';
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
		return __( 'Content Project Details', 'bdevs-elementor' );
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
		return [ 'Content Project' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_content_inforProject_details_Portfolio',
			[
				'label' => esc_html__( 'Project Details', 'bdevs-elementor' ),
			]
		);
		$repeater = new \Elementor\Repeater();
			$repeater->add_control(
				'image',
					[
						'label' 		=> esc_html__( 'Background Image', 'bdevs-elementor' ),
						'type' 			=> Controls_Manager::MEDIA,
						'default' 		=> [
							'url' 			=> '',
						],
					]
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
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Title', 'bdevs-elementor' ),
				'default'     => __( 'Business Process Optimization', 'bdevs-elementor' ),
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
			'title2',
			[
				'label'       => __( 'Title 2', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Title 2', 'bdevs-elementor' ),
				'default'     => __( 'Project Challenges:', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'text2',
			[
				'label'       => __( 'Text 2', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Text 2', 'bdevs-elementor' ),
				'default'     => __( '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Odio facilisis mauris sit amet massa vitae tortor condimentum. Etiam sit amet nisl purus in mollis nunc sed. Quam vulputate dignissim suspendisse in est ante in. Amet commodo nulla facilisi nullam vehicula. Arcu vitae elementum curabitur vitae nunc. Duis ultricies lacus sed turpis tincidunt id aliquet risus feugiat. Aenean vel elit scelerisque mauris pellentesque pulvinar.</p>
                                <p class="project__details__challenges__text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Odio facilisis mauris sit amet massa vitae tortor condimentum. Etiam sit amet nisl purus in mollis nunc sed. Quam vulputate dignissim suspendisse in est ante in. Amet commodo nulla facilisi nullam vehicula. Arcu vitae elementum curabitur vitae nunc. Duis ultricies lacus sed turpis tincidunt id aliquet risus feugiat.</p>', 'bdevs-elementor' ),
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
<div class="project__details sp_top_140 sp_bottom_140">
    <div class="container">
        <div class="project__details__bottom__border">
        <div class="row">
            <div class="col-xl-4 col-lg-4 cl-md-12 col-12 mobi-order-2">
                <?php if ( is_active_sidebar( 'sidebar-project' ) ) : ?>
						<?php dynamic_sidebar( 'sidebar-project' ); ?>
				<?php endif; ?> 
            </div>
            <div class="col-xl-8 col-xl-8 col-lg-8 col-md-12 col-12 mobi-order-1">
                <div class="project__details__wraper">
                    <div class="projects__tap__wrapper" data-aos="fade-up" data-aos-duration="1500">
                        <div class="tab-content tab__content__wrapper" id="myTabContent">
                        	<?php
						    	$idd = 0;
						    	foreach ( $settings['tabs'] as $item ) :
						    	$idd++;
							?>
							<?php if($idd==1){?>
                            <div class="tab-pane fade active show" id="projects__<?php echo esc_attr($idd)?>" role="tabpanel" aria-labelledby="projects__<?php echo esc_attr($idd)?>">
                                <div class="projects__img">
                                    <img src="<?php print esc_url($item['image']['url']); ?>" alt="">
                                </div>
                            </div>
        					<?php } else { ?>
                            <div class="tab-pane fade" id="projects__<?php echo esc_attr($idd)?>" role="tabpanel" aria-labelledby="projects__<?php echo esc_attr($idd)?>">
                                <div class="projects__img">
                                    <img src="<?php print esc_url($item['image']['url']); ?>" alt="">
                                </div>
                            </div>
        					<?php } ?>
                            <?php endforeach; ?>
        
        
                        </div> 
                        <div class="row">
                            <div class="col-xl-12">
                                <ul class="nav  projects__nav__wrap" id="myTab" role="tablist">
                                	<?php
								    	$idd = 0;
								    	foreach ( $settings['tabs'] as $item ) :
								    	$idd++;
									?>
									<?php if($idd==1){?>
                                    <li class="nav-item" role="presentation">
                                        <a href="#" class="projects__tab__link active" data-bs-toggle="tab" data-bs-target="#projects__<?php echo esc_attr($idd)?>"><img src="<?php print esc_url($item['image']['url']); ?>" alt=""></a>
                                    </li>
                                    <?php } else { ?>
                                    <li class="nav-item" role="presentation">
                                        <a href="#" class="projects__tab__link" data-bs-toggle="tab" data-bs-target="#projects__<?php echo esc_attr($idd)?>"><img src="<?php print esc_url($item['image']['url']); ?>" alt=""></a>
                                    </li>
                                    <?php } ?>
                            		<?php endforeach; ?>
                                </ul>
                            </div>
                        </div> 
                    </div>
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
                    <div class="project__details__challenges" data-aos="fade-up" data-aos-duration="1500">
                    	<?php if ( '' !== $settings['title2'] )  : ?>
                        <div class="project__details__challenges__heading">
                            <h6><?php echo wp_kses_post($settings['title2']); ?></h6>
                        </div>
                        <?php endif; ?>
                        <?php if ( '' !== $settings['text2'] )  : ?>
                        	<?php echo wp_kses_post($settings['text2']); ?>
                        <?php endif; ?>
                    </div>
                    <div class="project__details__button" data-aos="fade-up" data-aos-duration="1500">
                        <?php previous_post_link('%link','PREV.PROJECT'); ?>
                        <?php next_post_link('%link','NEXT.PROJECT'); ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
	<?php
	}
}