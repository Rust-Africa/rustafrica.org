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
class BdevsContentTeamList extends \Elementor\Widget_Base {

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
		return 'bdevs-content-team-list';
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
		return __( 'Content Team List', 'bdevs-elementor' );
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
		return [ 'Content Team List' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_content_team_detailsList',
			[
				'label' => esc_html__( 'Content Team List', 'bdevs-elementor' ),
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
			$repeater->add_control(
				'title',
					[
						'label' 		=> esc_html__( 'Title', 'bdevs-elementor' ),
						'type' 			=> Controls_Manager::TEXT,
						'default' 		=> esc_html__( 'VNDIES GRIFFITH' , 'bdevs-elementor' ),
						'show_label' 	=> true,
					]
				);
			$repeater->add_control(
				'subtitle',
					[
						'label' 		=> esc_html__( 'Subtitle', 'bdevs-elementor' ),
						'type' 			=> Controls_Manager::TEXT,
						'default' 		=> esc_html__( 'Founder & CEO' , 'bdevs-elementor' ),
						'show_label' 	=> true,
					]
				);
			$repeater->add_control(
				'link',
					[
						'label' 		=> esc_html__( 'Link', 'bdevs-elementor' ),
						'type' 			=> Controls_Manager::TEXT,
						'default' 		=> esc_html__( '#' , 'bdevs-elementor' ),
						'show_label' 	=> true,
					]
				);
			$repeater->add_control(
				'facebook',
					[
						'label' 		=> esc_html__( 'Facebook', 'bdevs-elementor' ),
						'type' 			=> Controls_Manager::TEXT,
						'default' 		=> esc_html__( 'https://www.facebook.com/' , 'bdevs-elementor' ),
						'show_label' 	=> true,
					]
				);
			$repeater->add_control(
				'twitter',
					[
						'label' 		=> esc_html__( 'Twitter', 'bdevs-elementor' ),
						'type' 			=> Controls_Manager::TEXT,
						'default' 		=> esc_html__( 'https://www.x.com/' , 'bdevs-elementor' ),
						'show_label' 	=> true,
					]
				);
			$repeater->add_control(
				'skype',
					[
						'label' 		=> esc_html__( 'Skype', 'bdevs-elementor' ),
						'type' 			=> Controls_Manager::TEXT,
						'default' 		=> esc_html__( 'https://www.skype.com/' , 'bdevs-elementor' ),
						'show_label' 	=> true,
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
			'button',
			[
				'label'       => __( 'Button', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Button', 'bdevs-elementor' ),
				'default'     => __( 'JOIN WITH US', 'bdevs-elementor' ),
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
<div class="team__details special__spacing">
    <div class="container">
        <div class="row">
        	<?php
		    	$idd = 0;
		    	foreach ( $settings['tabs'] as $item ) :
		    	$idd++;
			?>
            <div class="col-xxl-3 col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12" data-aos="fade-up" data-aos-duration="1500">
                <div class="team__member__3__single team__member__border text-center single__transform">
                    <div class="team__member__3__single__inner">
                        <div class="team__member__3__img">
                            <a href="<?php echo wp_kses_post($item['link']); ?>"><img src="<?php print esc_url($item['image']['url']); ?>" alt=""></a>
                        </div>
                        <div class="team__member__name">
                        	<?php if ( '' !== $item['title'] )  : ?>
                            <h6><a href="<?php echo wp_kses_post($item['link']); ?>"><?php echo wp_kses_post($item['title']); ?></a></h6>
                            <?php endif; ?>
                            <?php if ( '' !== $item['subtitle'] )  : ?>
                            <p><?php echo wp_kses_post($item['subtitle']); ?></p>
                            <?php endif; ?>
                        </div>
                        <div class="team__member__icon">
                            <ul>
                            	<?php if ( '' !== $item['facebook'] )  : ?>
                                <li>
                                    <a class="direction__btn" href="<?php echo wp_kses_post($item['facebook']); ?>"><i class="icofont-facebook"></i></a>
                                </li>
                                <?php endif; ?>
                                <?php if ( '' !== $item['twitter'] )  : ?>
                                <li>
                                    <a class="direction__btn" href="<?php echo wp_kses_post($item['twitter']); ?>"><i class="icofont-twitter"></i></a>
                                </li>
                                <?php endif; ?>
                                <?php if ( '' !== $item['skype'] )  : ?>
                                <li>
                                    <a class="direction__btn" href="<?php echo wp_kses_post($item['skype']); ?>"><i class="icofont-skype"></i></a>
                                </li>
                                <?php endif; ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php if ( '' !== $settings['button'] )  : ?>
            <div class="col-xxl-3 col-xl-42" data-aos="fade-up" data-aos-duration="1500">
                <div class="team__details__button text-center">
                    <a class="default__button btn__black " href="<?php echo wp_kses_post($settings['link_button']); ?>"><?php echo wp_kses_post($settings['button']); ?></a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
	<?php
	}
}