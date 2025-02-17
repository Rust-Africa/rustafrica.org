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
class BdevsAboutPages extends \Elementor\Widget_Base {

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
		return 'bdevs-about-other-pages';
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
		return __( 'About Other Pages', 'bdevs-elementor' );
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
		return [ 'About Other Pages', 'carousel' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
	}
	public function get_post_titles_options() {
		$title_options = [];
		$args = [
			'post_type'      => 'team',
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
			'section_content_aboutInfo',
			[
				'label' => esc_html__( 'About & Team Other Pages', 'bdevs-elementor' ),
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
		$this->end_controls_section();


		$this->start_controls_section(
			'section_content_AbouthomeOtherPages',
			[
				'label' => esc_html__( 'About Other Pages', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'image',
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
				'default'     => __( 'About', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'QUALITY CONSULTING FORE SECURE BUSINESS.WE 32 YEARS OF EXPRIENCE.', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		
		$this->add_control(
			'number_experience',
			[
				'label'       => __( 'Number Experience', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Number Experience', 'bdevs-elementor' ),
				'default'     => __( '29', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'title_experience',
			[
				'label'       => __( 'Title Experience', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Title Experience', 'bdevs-elementor' ),
				'default'     => __( 'Years Experience', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'icon',
			[
				'label'       => __( 'Icon', 'bdevs-elementor' ),
				'type'    => Controls_Manager::ICONS,
				'default' 		=> [
						'url' 			=> '',
					],		
			]
		);
		$this->add_control(
			'link_icon',
			[
				'label'       => __( 'Link Icon', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Link Icon', 'bdevs-elementor' ),
				'default'     => __( '#', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);

		$this->add_control(
			'title',
			[
				'label'       => __( 'Title', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Title', 'bdevs-elementor' ),
				'default'     => __( 'Mission & Vision', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'text',
			[
				'label'       => __( 'Text ', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Text', 'bdevs-elementor' ),
				'default'     => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);
		$this->add_control(
			'button',
			[
				'label'       => __( 'Button', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Button', 'bdevs-elementor' ),
				'default'     => __( 'LEARN MORE ABOUT', 'bdevs-elementor' ),
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
			'section_content_TeamhomeOtherPages',
			[
				'label' => esc_html__( 'Team Other Pages About', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'subheading_team',
			[
				'label'       => __( 'Subheading Team', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Subheading Team', 'bdevs-elementor' ),
				'default'     => __( 'Team Members', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'heading_team',
			[
				'label'       => __( 'Heading Team', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your heading Team', 'bdevs-elementor' ),
				'default'     => __( 'CONSULTING EXPERTISE! YOU CAN TRUST.', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		
		$this->add_control(
			'desc_team',
			[
				'label'       => __( 'Description Team', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Description Team', 'bdevs-elementor' ),
				'default'     => __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit sed ut labore et dolore magna aliqua enim ad minim veniam.', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	

		$this->add_control(
			'tabs',
			[
				'label' => esc_html__( 'Team', 'bdevs-elementor' ),
				'type' => Controls_Manager::REPEATER,
				'default' => [
					[
						'tab_title'   => esc_html__( 'Team #2', 'bdevs-elementor' ),
						'tab_content' => esc_html__( 'I am item content. Click edit button to change this text.', 'bdevs-elementor' ),
					]
				],
				'fields' => [
					[
						'name'    		=> 'title_post',
						'label'     	=> esc_html__( 'Choose Team', 'bdevs-elementor' ),
						'type'      	=> Controls_Manager::SELECT,
						'options'   	=> $title_options,
						'default'   	=> array_key_first($title_options),
					],
					[
						'name'    => 'img_team',
						'label'   => esc_html__( 'Image Team', 'bdevs-elementor' ),
						'type'    => Controls_Manager::MEDIA,
						'dynamic' => [ 'active' => true ],
						'default'     => esc_html__( '' , 'bdevs-elementor' ),
					],
					[
						'name'        => 'title_edit',
						'label'       => esc_html__( 'Title Team Custom - If this field is empty, it will be used title Team', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Eleanor Alice' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'subtitle',
						'label'       => esc_html__( 'subtitle', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'Founder & CEO' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'facebook',
						'label'       => esc_html__( 'Link Facebook', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'https://www.facebook.com/' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'twitter',
						'label'       => esc_html__( 'Link Twitter', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'https://twitter.com/' , 'bdevs-elementor' ),
						'label_block' => true,
					],
					[
						'name'        => 'skype',
						'label'       => esc_html__( 'Link Skype', 'bdevs-elementor' ),
						'type'        => Controls_Manager::TEXT,
						'dynamic'     => [ 'active' => true ],
						'default'     => esc_html__( 'https://www.skype.com/' , 'bdevs-elementor' ),
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
		$this->add_control(
			'show_about',
			[
				'label'   => esc_html__( 'Show About', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);
		$this->add_control(
			'show_team',
			[
				'label'   => esc_html__( 'Show Team', 'bdevs-elementor' ),
				'type'    => Controls_Manager::SWITCHER,
				'default' => 'yes',
			]
		);	

		$this->end_controls_section();

	}

	public function render() {

		$settings  = $this->get_settings_for_display();
		extract($settings);
		?>  
<div class="about__team__sec__wrap" style="background: var(--pinkcolor) url(<?php print esc_url($settings['bg_image']['url']); ?>);">
    <!-- about__section__start -->
    <?php if (( $settings['show_about'] )) : ?>
    <div class="about about__white__bg position-relative sp_bottom_120 sp_top_160" id="about__mission__area">
        <div class="container">
            <div class="row">
        
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" data-aos="fade-up" data-aos-duration="1500">
                    <div class="about__inner about__inner--2">

                        <div class="section__title  section__title--2">
                        	<?php if ('' != $settings['subheading']): ?>
                            <div class="section__title__button">
                                <span class="text__gradient "><?php echo wp_kses_post($settings['subheading']); ?></span>
                            </div>
                            <?php endif ?>
                        	<?php if ('' != $settings['heading']): ?>
                            <div class="section__title__heading">
                                <h3><?php echo wp_kses_post($settings['heading']); ?></h3>
                            </div>
                        	<?php endif ?>
                        </div>

                        <div class="about__vision__wrapper sp_top_60">
                        <div class="about__number">
                            <div class="about__number__inner bg__primary">
                                <?php if ( '' !== $settings['number_experience'] )  : ?>
	                            <span><?php echo wp_kses_post($settings['number_experience']); ?></span>
	                            <?php endif; ?>
	                            <?php if ( '' !== $settings['title_experience'] )  : ?>
	                            <p><?php echo wp_kses_post($settings['title_experience']); ?></p>
	                            <?php endif; ?>
                                <?php if ( '' !== $settings['icon']['value'] )  : ?>
	                            <div class="about__number__icon">
	                                <a href="<?php echo wp_kses_post($settings['link_icon']); ?>">
	                                  	<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
	                                </a>
	                            </div>
	                            <?php endif; ?>
                            </div>
                        
                        </div>
                        <div class="about__text__wrapper">
	                        <?php if ('' != $settings['title']): ?>
		                    <div class="about__misson">
		                        <h6> <?php echo wp_kses_post($settings['title']); ?></h6>
		                    </div>
		                    <?php endif ?>
		                    <?php if ('' != $settings['text']): ?>
		                    <div class="about__text__2">
		                        <p><?php echo wp_kses_post($settings['text']); ?></p>
		                    </div>
		                    <?php endif ?>
		                    <?php if ('' != $settings['button']): ?>
		                    <div class="about__button">
		                        <a class="default__button" href="<?php echo wp_kses_post($settings['link_button']); ?>"><?php echo wp_kses_post($settings['button']); ?></a>
		                    </div>
		                    <?php endif ?>
	                    </div>
                    </div>
                

                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" data-aos="fade-up" data-aos-duration="1500">
                    <div class="about__img__3" data-tilt>
                        <img src="<?php print esc_url($settings['image']['url']); ?>" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- about__section__end-->
<?php endif; ?>
<?php if (( $settings['show_team'] )) : ?>
    <!-- team__member__start -->
    <div class="team__member__3  sp_top_140 sp_bottom_140 special__spacing">
        <div class="container-fluid">
            <div class="row align-items-center">
                <div class="col-xl-3 col=lg-4 col-md-6 col-sm-6 col-12" data-aos="fade-up" data-aos-duration="1500">
                    <div class="section__title section__title--2 ">
                    	<?php if ('' != $settings['subheading_team']): ?>
                        <div class="section__title__button">
                            <span class="text__gradient "><?php echo wp_kses_post($settings['subheading_team']); ?></span>
                        </div>
                        <?php endif ?>
                        <?php if ('' != $settings['heading_team']): ?>
	                    <div class="section__title__heading sp_bottom_20">
	                        <h3><?php echo wp_kses_post($settings['heading_team']); ?></h3>
	                    </div>
	                    <?php endif ?>
	                    <?php if ('' != $settings['desc_team']): ?>
	                    <div class="section__title__text__3">
	                        <p><?php echo wp_kses_post($settings['desc_team']); ?></p>
	                    </div>
	                    <?php endif ?>
                    </div>
                </div>
    			<?php
				$i = 0;
				foreach ( $settings['tabs'] as $item ) :
					$i++;
				?>
				<?php 
				$post_id = $item['title_post'];
				$wp_query = new \WP_Query(array(
					'post_type' => 'team',
					'p'	=> $post_id,
					'post_status' => 'publish',
				));
				while ($wp_query -> have_posts()) : $wp_query -> the_post();
				?>
				<?php if($i%3 == 1){?>
	            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12" data-aos="fade-up" data-aos-duration="1800">
	            <?php } elseif($i%3 == 2){?>
	            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12" data-aos="fade-up" data-aos-duration="2100">
	            <?php } else { ?>
	            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12" data-aos="fade-up" data-aos-duration="2400">
	            <?php }  ?>
                    <div class="team__member__3__single text-center single__transform">
                        <div class="team__member__3__single__inner">
                            <?php if ('' != $item['img_team']['url']) { ?>
	                        <div class="team__member__3__img">
	                            <img src="<?php echo wp_kses_post($item['img_team']['url']); ?>" alt="">
	                        </div>
	                        <?php } else { ?>
	                        <div class="team__member__3__img">
	                            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="">
	                        </div>
	                        <?php } ?>
	                        <?php if ('' != $item['title_edit']) { ?>
	                        <div class="team__member__name">
	                            <h6><a href="<?php the_permalink(); ?>"><?php echo wp_kses_post($item['title_edit']); ?></a></h6>
	                            <p><?php echo wp_kses_post($item['subtitle']); ?></p>
	                        </div>
	                        <?php } else { ?>
	                        <div class="team__member__name">
	                            <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
	                            <p><?php echo wp_kses_post($item['subtitle']); ?></p>
	                        </div>
	                        <?php } ?>
                            <div class="team__member__icon">
                                <ul>
                                    <?php if ( '' !== $item['facebook'])  : ?>
		                            <li>
		                                <a class="direction__btn" href="<?php echo wp_kses_post($item['facebook']); ?>"><i class="icofont-facebook"></i></a>
		                            </li>
		                            <?php endif; ?>
		                            <?php if ( '' !== $item['twitter'])  : ?>
		                            <li>
		                                <a class="direction__btn" href="<?php echo wp_kses_post($item['twitter']); ?>"><i class="icofont-twitter"></i></a>
		                            </li>
		                            <?php endif; ?>
		                            <?php if ( '' !== $item['skype'])  : ?>
		                            <li>
		                                <a class="direction__btn"  href="<?php echo wp_kses_post($item['skype']); ?>"><i class="icofont-skype"></i></a>
		                            </li>
		                            <?php endif; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
    
                <?php endwhile; ?>
				<?php endforeach; ?>
    
            </div>
        </div>
    </div>
    <!-- team__member__end -->
<?php endif; ?>
</div>
	<?php
	}

}
