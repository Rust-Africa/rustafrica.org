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
class BdevsTeamHome1 extends \Elementor\Widget_Base {

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
		return 'bdevs-team-home1';
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
		return __( 'Team Home 1', 'bdevs-elementor' );
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
		return [ 'Team Home 1', 'carousel' ];
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
			'section_content_Teamhome',
			[
				'label' => esc_html__( 'Team Home 1', 'bdevs-elementor' ),
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
		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'CONTUATION EXPERTISE! YOU CAN TRUST.', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'subheading',
			[
				'label'       => __( 'Subheading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your Subheading', 'bdevs-elementor' ),
				'default'     => __( 'Sagittis purus sit amet volutpat consequat mauris nunc congue nisi and tortor dignissim.', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		
		$this->add_control(
			'image',
			[
				'label'       => __( 'Image', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],			
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
				'img_team',
				[
					'label' 		=> esc_html__( 'Image Team Custom - If this field is empty, it will be used Thumbnail Team', 'bdevs-elementor' ),
					'type' 			=> Controls_Manager::MEDIA,
					'default' 		=> [
						'url' 			=> '',
					],
				]
			);
			$repeater->add_control(
				'title_edit',
				[
					'label'       	=> __( 'Title Team Custom - If this field is empty, it will be used title Team', 'bdevs-elementor' ),
					'type'        	=> Controls_Manager::TEXTAREA,
					'placeholder' 	=> __( 'Enter your text title Team custom', 'bdevs-elementor' ),
					'default'     	=> __( '', 'bdevs-elementor' ),
					'label_block' 	=> true,
				]
			);
			$repeater->add_control(
				'subtitle',
				[
					'label'       	=> __( 'Subtitle', 'bdevs-elementor' ),
					'type'        	=> Controls_Manager::TEXTAREA,
					'placeholder' 	=> __( 'Enter your text Subtitle', 'bdevs-elementor' ),
					'default'     	=> __( 'Founder & CEO', 'bdevs-elementor' ),
					'label_block' 	=> true,
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
			'image_shape',
			[
				'label'       => __( 'Shape', 'bdevs-elementor' ),
				'type'    => Controls_Manager::MEDIA,
				'dynamic' => [ 'active' => true ],			
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
<div class="team sp_bottom_100 sp_top_100 position-relative" style="background: url(<?php print esc_url($settings['bg_image']['url']); ?>);">
    <div class="container-fluid">
        <div class="row">


            <div class="team__left sp_50">
                <div class="team__left__wrap">
                    <div class="section__title section__title--2"  data-aos="fade-up" data-aos-duration="1500">
                    	<?php if ( '' !== $settings['heading'] )  : ?>
                        <div class="section__title__heading">
                            <h3><?php echo wp_kses_post($settings['heading']); ?></h3>
                        </div>
                        <?php endif; ?>
                        <?php if ( '' !== $settings['subheading'] )  : ?>
                        <div class="section__title__text">
                            <p><?php echo wp_kses_post($settings['subheading']); ?></p>
                        </div>
                    	<?php endif; ?>
                    </div>
                    <?php if ( '' !== $settings['image']['url'] )  : ?>
                    <div class="team__left__img">
                        <img src="<?php print esc_url($settings['image']['url']); ?>" alt="Team Left BG">
                    </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-xl-8 offset-xl-4 col-lg-7 offset-lg-5  col-md-12 col-sm-12 team__right">
                <div class="row">
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
					<?php if($i%4 == 1){?>
		            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12"  data-aos="fade-up" data-aos-duration="1500">
		            	<?php } elseif($i%4 == 2){?>
		            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12"  data-aos="fade-up" data-aos-duration="1800">
		            	<?php } elseif($i%4 == 3){?>
		            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12"  data-aos="fade-up" data-aos-duration="2100">
		            	<?php } else { ?>
		            <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12"  data-aos="fade-up" data-aos-duration="2400">
		            <?php } ?>
                    
                        <div class="team__single single__transform">
                        	<?php if ('' != $item['img_team']['url']) { ?>
                            <div class="team__img">
                                <img src="<?php echo wp_kses_post($item['img_team']['url']); ?>" alt="">
                            </div>
                            <?php } else { ?>
                            <div class="team__img">
                                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="">
                            </div>
	                        <?php } ?>
                            <div class="team__name">
                            	<?php if ('' != $item['title_edit']) { ?>
                                <h6><a href="<?php the_permalink(); ?>"><?php echo wp_kses_post($item['title_edit']); ?></a></h6>
                                <?php } else { ?>
                                <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
								<?php } ?>
								<?php if ('' != $item['subtitle']) : ?>
                                <span><?php echo wp_kses_post($item['subtitle']); ?></span>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
					<?php endforeach; ?>
                </div>
                <div class="team__icon">
                    <img src="<?php echo wp_kses_post($settings['image_shape']['url']); ?>" alt="">
                </div>
            </div>
        </div>
    </div>
</div>
	<?php
	}

}
