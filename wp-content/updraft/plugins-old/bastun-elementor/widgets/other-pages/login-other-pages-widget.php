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
class BdevsLoginPages extends \Elementor\Widget_Base {

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
		return 'bdevs-login-other-pages';
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
		return __( 'Login Other Pages', 'bdevs-elementor' );
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
		return [ 'other-pages-elementor' ];
	}

	public function get_keywords() {
		return [ 'Login Other Pages', 'carousel' ];
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
			'section_content_login',
			[
				'label' => esc_html__( 'Login Other Pages', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'heading_login',
			[
				'label'       => __( 'Heading Login', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your heading Login', 'bdevs-elementor' ),
				'default'     => __( 'Login', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'heading_signup',
			[
				'label'       => __( 'Heading Sign Up', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your heading Sign Up', 'bdevs-elementor' ),
				'default'     => __( 'Sign Up', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		
		$this->add_control(
			'title_login',
			[
				'label'       => __( 'Title Login', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Title Login', 'bdevs-elementor' ),
				'default'     => __( 'Login', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'subtitle_login',
			[
				'label'       => __( 'Subtitle Login', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Subtitle Login', 'bdevs-elementor' ),
				'default'     => __( 'Don not have an account yet? Sign up for free', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'contact_form_login',
			[
				'label'       => __( 'Contact Form Login', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Contact Form Login', 'bdevs-elementor' ),
				'default'     => __( '[user_registration_login]', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'button_facebook',
			[
				'label'       => __( 'Button Facebook', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Button Facebook', 'bdevs-elementor' ),
				'default'     => __( 'Facebook', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'link_button_facebook',
			[
				'label'       => __( 'Link Button Facebook', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Link Button Facebook', 'bdevs-elementor' ),
				'default'     => __( 'https://www.facebook.com/', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'button_google',
			[
				'label'       => __( 'Button Google', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Button Google', 'bdevs-elementor' ),
				'default'     => __( 'Google', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'link_button_google',
			[
				'label'       => __( 'Link Button Google', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Link Button Google', 'bdevs-elementor' ),
				'default'     => __( 'https://www.google.com/', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'title_signup',
			[
				'label'       => __( 'Title Sign Up', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Title Sign Up', 'bdevs-elementor' ),
				'default'     => __( 'Sign Up', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'subtitle_signup',
			[
				'label'       => __( 'Subtitle Sign Up', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Subtitle Sign Up', 'bdevs-elementor' ),
				'default'     => __( 'Already have an account? Log In', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'contact_form_signup',
			[
				'label'       => __( 'Contact Form Sign Up', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Contact Form Sign Up', 'bdevs-elementor' ),
				'default'     => __( '[user_registration_form id="2386"]', 'bdevs-elementor' ),
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
<div class="loginarea sp_top_140 sp_bottom_200">
    <div class="container">
        <div class="row">
            <div class="col-xl-8 col-lg-8 offset-xl-2 offset-lg-2 col-md-12 col-12">
                <ul class="nav  tab__button__wrap text-center" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                        <button class="single__tab__link active" data-bs-toggle="tab" data-bs-target="#projects__one" type="button"><?php echo wp_kses_post($settings['heading_login']); ?></button>
                    </li>
                    <li class="nav-item" role="presentation">
                        <button class="single__tab__link" data-bs-toggle="tab" data-bs-target="#projects__two" type="button"><?php echo wp_kses_post($settings['heading_signup']); ?></button>
                    </li>
                </ul>
            </div>
            <div class="tab-content tab__content__wrapper" id="myTabContent">
                <div class="tab-pane fade active show" id="projects__one" role="tabpanel" aria-labelledby="projects__one">
                    <div class="col-xl-8 col-lg-8 offset-xl-2 offset-lg-2 col-md-12 col-12">
                        <div class="loginarea__wraper">
                            <div class="loginarea__heading">
                            	<?php if ('' != $settings['title_login']): ?>
                                <h5 class="login__title"><?php echo wp_kses_post($settings['title_login']); ?></h5>
                                <?php endif ?>
                                <?php if ('' != $settings['subtitle_login']): ?>
                                <p class="login__description"><?php echo wp_kses_post($settings['subtitle_login']); ?></p>
                                <?php endif ?>
                            </div>
                            <?php echo do_shortcode($settings['contact_form_login']); ?>
                            <div class="loginarea__social__option">
                                <ul class="loginarea__social__btn">
                                	<?php if ('' != $settings['button_facebook']): ?>
                                    <li><a class="default__button btn__black" href="<?php echo wp_kses_post($settings['link_button_facebook']); ?>"><i class="icofont-facebook"></i> <?php echo wp_kses_post($settings['button_facebook']); ?></a></li>
                                    <?php endif ?>
                                    <?php if ('' != $settings['button_google']): ?>
                                    <li><a class="default__button btn__black" href="<?php echo wp_kses_post($settings['link_button_google']); ?>"><i class="icofont-google-plus"></i><?php echo wp_kses_post($settings['button_google']); ?></a></li>
                                    <?php endif ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="tab-pane fade" id="projects__two" role="tabpanel" aria-labelledby="projects__two">
                    <div class="col-xl-8 col-lg-8 offset-xl-2 offset-lg-2 col-md-12 col-12">
                        <div class="loginarea__wraper">
                            <div class="loginarea__heading">
                            	<?php if ('' != $settings['title_signup']): ?>
                                <h5 class="login__title"><?php echo wp_kses_post($settings['title_signup']); ?></h5>
                                <?php endif ?>
                                <?php if ('' != $settings['subtitle_signup']): ?>
                                <p class="login__description"><?php echo wp_kses_post($settings['subtitle_signup']); ?></p>
                                <?php endif ?>
                            </div>
                            <?php echo do_shortcode($settings['contact_form_signup']); ?>
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
