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
class BdevsTeamHome3 extends \Elementor\Widget_Base {

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
		return 'bdevs-team-home3';
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
		return __( 'Team Home 3', 'bdevs-elementor' );
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
		return [ 'Team', 'carousel' ];
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
			'section_content_Teamhome3',
			[
				'label' => esc_html__( 'Team Home 3', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'subheading',
			[
				'label'       => __( 'Subheading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Subheading', 'bdevs-elementor' ),
				'default'     => __( 'Team Members', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'CONSULTING EXPERTISE! YOU CAN TRUST.', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		
		$this->add_control(
			'desc',
			[
				'label'       => __( 'Description', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Description', 'bdevs-elementor' ),
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
		

		$this->end_controls_section();

	}

	public function render() {

		$settings  = $this->get_settings_for_display();
		extract($settings);
		?>  
<div class="team__member__3  sp_top_140 sp_bottom_140 special__spacing">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12" data-aos="fade-up" data-aos-duration="1500">
                <div class="section__title section__title--2  section__title--3">
                	<?php if ('' != $settings['subheading']): ?>
                    <div class="section__title__button">
                        <span><?php echo wp_kses_post($settings['subheading']); ?></span>
                    </div>
                    <?php endif ?>
                    <?php if ('' != $settings['heading']): ?>
                    <div class="section__title__heading sp_bottom_20">
                        <h3><?php echo wp_kses_post($settings['heading']); ?></h3>
                    </div>
                    <?php endif ?>
                    <?php if ('' != $settings['desc']): ?>
                    <div class="section__title__text__3">
                        <p><?php echo wp_kses_post($settings['desc']); ?></p>
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
	<?php
	}

}
