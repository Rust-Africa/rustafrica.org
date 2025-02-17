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
class BdevsContentTeam extends \Elementor\Widget_Base {

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
		return 'bdevs-content-team';
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
		return __( 'Content Team', 'bdevs-elementor' );
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
		return [ 'Content Team' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_content_team_details',
			[
				'label' => esc_html__( 'Content Team', 'bdevs-elementor' ),
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
			'facebook',
			[
				'label'       => __( 'Link Facebook', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Link Facebook', 'bdevs-elementor' ),
				'default'     => __( 'https://www.facebook.com/', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'twitter',
			[
				'label'       => __( 'Link Twitter', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Link Twitter', 'bdevs-elementor' ),
				'default'     => __( 'https://x.com/', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'skype',
			[
				'label'       => __( 'Link Skype', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Link Skype', 'bdevs-elementor' ),
				'default'     => __( 'https://www.skype.com/', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Title', 'bdevs-elementor' ),
				'default'     => __( 'GINGER GRIFFITH', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'subtitle',
			[
				'label'       => __( 'Subtitle', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Subtitle', 'bdevs-elementor' ),
				'default'     => __( 'Project Manager', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'content',
			[
				'label'       => __( 'Content', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Content', 'bdevs-elementor' ),
				'default'     => __( '', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'phone',
			[
				'label'       => __( 'Phone', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Phone', 'bdevs-elementor' ),
				'default'     => __( '(000) 967-237-96', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'icon_phone',
			[
				'label' => esc_html__( 'Icon Phone', 'textdomain' ),
				'type' => Controls_Manager::ICONS,
				'default' => [],
			]
		);

		$this->add_control(
			'mail',
			[
				'label'       => __( 'Mail', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your mail', 'bdevs-elementor' ),
				'default'     => __( 'farnsinfo@gmail.com', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'icon_mail',
			[
				'label' => esc_html__( 'Icon Mail', 'textdomain' ),
				'type' => Controls_Manager::ICONS,
				'default' => [],
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
            <div class="col-xl-12" data-aos="fade-up" data-aos-duration="1500">
                <div class="team__details__project__manager">
                    <div
                        class="team__member__3__single team__member__border text-center single__transform team__details__top">
                        <div class="team__member__3__single__inner">
                        	<?php if ( '' !== $settings['image']['url'] )  : ?>
                            <div class="team__member__3__img">
                                <img src="<?php print esc_url($settings['image']['url']); ?>" alt="">
                            </div>
                            <?php endif; ?>
                            <div class="team__member__icon">
                                <ul>
                                	<?php if ( '' !== $settings['facebook'] )  : ?>
                                    <li>
                                        <a class="direction__btn" href="<?php echo wp_kses_post($settings['facebook']); ?>"><i class="icofont-facebook"></i></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if ( '' !== $settings['twitter'] )  : ?>
                                    <li>
                                        <a class="direction__btn" href="<?php echo wp_kses_post($settings['twitter']); ?>"><i class="icofont-twitter"></i></a>
                                    </li>
                                    <?php endif; ?>
                                    <?php if ( '' !== $settings['skype'] )  : ?>
                                    <li>
                                        <a class="direction__btn" href="<?php echo wp_kses_post($settings['skype']); ?>"><i class="icofont-skype"></i></a>
                                    </li>
                                    <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="team__details__project__manager__content">
                        <div class="team__details__project__manager__title">
                        	<?php if ( '' !== $settings['title'] )  : ?>
                            <h6><?php echo wp_kses_post($settings['title']); ?></h6>
                            <?php endif; ?>
                            <?php if ( '' !== $settings['subtitle'] )  : ?>
                            <span class="text__gradient"><?php echo wp_kses_post($settings['subtitle']); ?></span>
                            <?php endif; ?>
                        </div>
                        <?php if ( '' !== $settings['content'] )  : ?>
                        <div class="team__details__project__manager__text">
                            <?php echo wp_kses_post($settings['content']); ?>
                        </div>
                        <?php endif; ?>

                        <div class="team__details__project__manager__number">
                        	<?php if ( '' !== $settings['phone'] )  : ?>
                            <div class="team__details__project__icon">
                            	<a href="tel:<?php echo wp_kses_post($settings['phone']); ?>">
                            	<?php if ( '' !== $settings['icon_phone'] )  : ?>
                                
                                    <?php \Elementor\Icons_Manager::render_icon( $settings['icon_phone'], [ 'aria-hidden' => 'true' ] ); ?>
                                
                                <?php endif; ?>
                                <div class="team__details__number">
                                    <p><?php echo wp_kses_post($settings['phone']); ?></p>
                                </div>
                                </a>
                            </div>
                            <?php endif; ?>
                            <?php if ( '' !== $settings['mail'] )  : ?>
                            <div class="team__details__project__icon">
                                <a href="mailto:<?php echo wp_kses_post($settings['mail']); ?>">
                                	<?php \Elementor\Icons_Manager::render_icon( $settings['icon_mail'], [ 'aria-hidden' => 'true' ] ); ?>
                                <div class="team__details__number">
                                    <p><?php echo wp_kses_post($settings['mail']); ?></p>
                                </div>
                                </a>
                            </div>
                            <?php endif; ?>
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