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
class BdevsProjectHome1 extends \Elementor\Widget_Base {

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
		return 'bdevs-project-home1';
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
		return __( 'Project Home 1', 'bdevs-elementor' );
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
		return [ 'home-elementor' ];
	}

	public function get_keywords() {
		return [ 'Project Home 1', 'carousel' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
	}
	public function get_post_titles_options() {
		$title_options = [];
		$args = [
			'post_type'      => 'project',
			'posts_per_page' => -1,
			'post_status'    => 'publish',
		];
		$posts = get_posts($args);
		if ($posts) {
			foreach ($posts as $post) {
				$title_options[$post->ID] = $post->post_title;
			}
		}
		return $title_options;
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
		$title_options = $this->get_post_titles_options();
		$this->start_controls_section(
			'section_content_Projecthome',
			[
				'label' => esc_html__( 'Projects Home 1', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'OUR TRACK RECORD OF COMPLETED CONSULTING PROJECTS.', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'brand__badge',
			[
				'label'       => __( 'Image Brand Badge ', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],			
			]
		);
		$this->add_control(
			'brand__badge__inner',
			[
				'label'       => __( 'Image Brand Badge Inner', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],			
			]
		);
		$this->add_control(
			'link_brand__badge',
			[
				'label'       => __( 'Link Brand Badge', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Link Brand Badge', 'bdevs-elementor' ),
				'default'     => __( '#', 'bdevs-elementor' ),
				'label_block' => true,		
			]
		);
		$repeater = new \Elementor\Repeater();
			$repeater->add_control(
				'title_post',
				[
					'label'     	=> esc_html__( 'Choose Post', 'bdevs-elementor' ),
					'type'      	=> Controls_Manager::SELECT,
					'options'   	=> $title_options,
					'default'   	=> array_key_first($title_options),
				]
			);
			$repeater->add_control(
				'img_project',
				[
					'label' 		=> esc_html__( 'Image Project Custom - If this field is empty, it will be used Thumbnail Project', 'bdevs-elementor' ),
					'type' 			=> Controls_Manager::MEDIA,
					'default' 		=> [
						'url' 			=> '',
					],
				]
			);
			$repeater->add_control(
				'title_edit',
				[
					'label'       	=> __( 'Title Project Custom - If this field is empty, it will be used title Project', 'bdevs-elementor' ),
					'type'        	=> Controls_Manager::TEXTAREA,
					'placeholder' 	=> __( 'Enter your text title Project custom', 'bdevs-elementor' ),
					'default'     	=> __( '', 'bdevs-elementor' ),
					'label_block' 	=> true,
				]
			);
			$repeater->add_control(
				'icon',
				[
					'label' => esc_html__( 'Icon', 'textdomain' ),
					'type' => Controls_Manager::ICONS,
					'default' => [],
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
			'button',
			[
				'label'       => __( 'Button', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Button', 'bdevs-elementor' ),
				'default'     => __( 'VIEW OTHER PROJECT', 'bdevs-elementor' ),
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
		
		$this->add_control(
			'icon',
			[
				'label'       => __( 'Icon Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],			
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Text', 'bdevs-elementor' ),
				'default'     => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation.', 'bdevs-elementor' ),
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
<div class="pink__color">
        
</div>
  <!-- pink__color__end -->

 <!-- project__section__start -->
<div class="project special__spacing" id="project__area" data-aos="fade-up" data-aos-duration="1500">
    <div class="project__margin">
        <div class="container  sp_bottom_60 sp_top_70 ">

            <div class="row align-items-center sp_bottom_80">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-8 col-12">
                	<?php if ( '' !== $settings['heading'] )  : ?>
                    <div class="section__title section__title--2">
                        <div class="section__title__heading">
                            <h3 class="mb-0"><?php echo wp_kses_post($settings['heading']); ?></h3>
                        </div>
                    </div>
                    <?php endif; ?>
                </div>
                <?php if ( '' !== $settings['brand__badge']['url'] )  : ?>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-4 col-12">
                    <div class="project__section__img text__end">
                        <div class="bastun__brand__badge">
                            <div class="bastun__brand__badge__inner position-relative">
                                <a href="<?php print wp_kses_post($settings['link_brand__badge']); ?>">
                                    <img class="bbb__animate" src="<?php print esc_url($settings['brand__badge']['url']); ?>" alt="Footer badge">
                                    <img class="bbb__icon" src="<?php print esc_url($settings['brand__badge__inner']['url']); ?>" alt="Footer icon badge">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <div class="row">
            	<?php
				$i = 0;
				foreach ( $settings['tabs'] as $item ) :
					$i++;
				?>
				<?php 
				$post_id = $item['title_post'];
				$wp_query = new \WP_Query(array(
					'post_type' => 'project',
					'p'	=> $post_id,
					'post_status' => 'publish',
				));
				while ($wp_query -> have_posts()) : $wp_query -> the_post();
				?>
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12"  data-aos="fade-up" data-aos-duration="1500">
                    <div class="project__single single__transform">
                    	<?php if ('' != $item['img_project']['url']) { ?>
                        <div class="project__img">
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_kses_post($item['img_project']['url']); ?>" alt=""></a>
                        </div>
                        <?php } else { ?>
                        <div class="project__img">
                            <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt=""></a>
                        </div>
                        <?php } ?>
                        <div class="project__content">
                        	<?php if ('' != $item['title_edit']) { ?>
                            <div class="project__heading">
                            	<h3><a href="<?php the_permalink(); ?>"><?php echo wp_kses_post($item['title_edit']); ?></a></h3>
                            </div>
                            <?php } else { ?>
                            <div class="project__heading">
                            	<h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h3>
                            </div>
                            <?php } ?>
                            <div class="project__icon">
                                <a class="direction__btn" href="<?php the_permalink(); ?>">
                                	<?php \Elementor\Icons_Manager::render_icon( $item['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <?php endwhile; ?>
				<?php endforeach; ?>
            </div>
            <div class="project__small__img">
                <img class="project__img__1" src="<?php echo wp_kses_post($settings['shape1']['url']); ?>" alt="">
                <img class="project__img__2" src="<?php echo wp_kses_post($settings['shape2']['url']); ?>" alt="">
            </div>
        </div>
        <div class="container project__bottom"  data-aos="fade-up" data-aos-duration="1500">
            <div class="row align-items-center">
            	<?php if ( '' !== $settings['button'] )  : ?>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="project__bottom__button">
                        <a class="default__button" href="<?php echo wp_kses_post($settings['link_button']); ?>"><?php echo wp_kses_post($settings['button']); ?></a>
                    </div>
                </div>
                <?php endif; ?>
                <?php if ( '' !== $settings['icon']['url'] )  : ?>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="project__bottom__img text-center">
                        <img src="<?php echo wp_kses_post($settings['icon']['url']); ?>" alt="">
                    </div>
                </div>
                <?php endif; ?>
                <?php if ( '' !== $settings['text'] )  : ?>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12">
                    <div class="project__bottom__text">
                        <p><?php echo wp_kses_post($settings['text']); ?></p>
                    </div>
                </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
</div>
	<?php
	}

}
