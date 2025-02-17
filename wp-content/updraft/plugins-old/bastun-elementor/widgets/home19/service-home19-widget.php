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
class BdevsServiceHome19 extends \Elementor\Widget_Base {

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
		return 'bdevs-service-home19';
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
		return __( 'Service Home 19', 'bdevs-elementor' );
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
		return [ 'home-19-elementor' ];
	}

	public function get_keywords() {
		return [ 'Service', 'carousel' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
	}
	public function get_post_titles_options() {
		$title_options = [];
		$args = [
			'post_type'      => 'service',
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
			'section_content_Servicehome19',
			[
				'label' => esc_html__( 'Service Home 19', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'bg_image',
			[
				'label'       => __( 'Backdround Image', 'bdevs-elementor' ),
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
				'default'     => __( 'HERE LIES OUR BUSINESS STRATEGY.', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$repeater = new \Elementor\Repeater();
			$repeater->add_control(
				'title_filter',
				[
					'label'       	=> __( 'Title Filter', 'bdevs-elementor' ),
					'type'        	=> Controls_Manager::TEXTAREA,
					'placeholder' 	=> __( 'Enter your text Title Filter', 'bdevs-elementor' ),
					'default'     	=> __( 'STRATEGY', 'bdevs-elementor' ),
					'label_block' 	=> true,
				]
			);
			$repeater->add_control(
				'title',
				[
					'label'       	=> __( 'Title', 'bdevs-elementor' ),
					'type'        	=> Controls_Manager::TEXTAREA,
					'placeholder' 	=> __( 'Enter your text Title', 'bdevs-elementor' ),
					'default'     	=> __( 'Need Service, How may we help you?', 'bdevs-elementor' ),
					'label_block' 	=> true,
				]
			);
			$repeater->add_control(
				'subtitle',
				[
					'label'       	=> __( 'Subtitle', 'bdevs-elementor' ),
					'type'        	=> Controls_Manager::TEXTAREA,
					'placeholder' 	=> __( 'Enter your text Subtitle', 'bdevs-elementor' ),
					'default'     	=> __( 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore.', 'bdevs-elementor' ),
					'label_block' 	=> true,
				]
			);
			$repeater->add_control(
				'button',
				[
					'label'       	=> __( 'Button', 'bdevs-elementor' ),
					'type'        	=> Controls_Manager::TEXTAREA,
					'placeholder' 	=> __( 'Enter your text Button', 'bdevs-elementor' ),
					'default'     	=> __( 'VIEW ARCHIVE POST', 'bdevs-elementor' ),
					'label_block' 	=> true,
				]
			);
			$repeater->add_control(
				'link_button',
				[
					'label'       	=> __( 'Link Button', 'bdevs-elementor' ),
					'type'        	=> Controls_Manager::TEXT,
					'placeholder' 	=> __( 'Enter your Link Button', 'bdevs-elementor' ),
					'default'     	=> __( '#', 'bdevs-elementor' ),
					'label_block' 	=> true,
				]
			);
				$repeater2 = new \Elementor\Repeater();
				$repeater2->add_control(
					'title_post',
					[
						'label'     	=> esc_html__( 'Choose Service', 'bdevs-elementor' ),
						'type'      	=> Controls_Manager::SELECT,
						'options'   	=> $title_options,
						'default'   	=> array_key_first($title_options),
					]
				);
				$repeater2->add_control(
					'img_service',
					[
						'label' 		=> esc_html__( 'Image Service', 'bdevs-elementor' ),
						'type' 			=> Controls_Manager::MEDIA,
						'default' 		=> [
							'url' 			=> '',
						],
					]
				);
				$repeater2->add_control(
					'icon_image',
					[
						'label' 		=> esc_html__( 'Icon Image', 'bdevs-elementor' ),
						'type' 			=> Controls_Manager::ICONS,
						'default' 		=> [
						],
					]
				);
				$repeater2->add_control(
					'title_edit',
					[
						'label'       	=> __( 'Title Service Custom - If this field is empty, it will be used title Service', 'bdevs-elementor' ),
						'type'        	=> Controls_Manager::TEXTAREA,
						'placeholder' 	=> __( 'Enter your text title service custom', 'bdevs-elementor' ),
						'default'     	=> __( '', 'bdevs-elementor' ),
						'label_block' 	=> true,
					]
				);
				$repeater2->add_control(
					'excerpt_edit',
					[
						'label'       	=> __( 'Excerpt Service Custom - If this field is empty, it will be used Excerpt Service', 'bdevs-elementor' ),
						'type'        	=> Controls_Manager::TEXTAREA,
						'placeholder' 	=> __( 'Enter your text excerpt service custom', 'bdevs-elementor' ),
						'default'     	=> __( '', 'bdevs-elementor' ),
						'label_block' 	=> true,
					]
				);
				$repeater2->add_control(
					'icon',
					[
						'label' 		=> esc_html__( 'Icon Service', 'bdevs-elementor' ),
						'type' 			=> Controls_Manager::ICONS,
						'default' 		=> [
							'url' 			=> '',
						],
					]
				);
			$repeater->add_control(
				'tabs2',
				[
					'label' 		=> esc_html__( 'Tab List Service Post', 'bdevs-elementor' ),
					'type' 			=> Controls_Manager::REPEATER,
					'fields' 		=> $repeater2->get_controls(),
					'default' 		=> [
						[
							
						],
					],
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
<div class="pricing business__strategy sp_top_120 sp_bottom_120 special__spacing" style="background: url(<?php print esc_url($settings['bg_image']['url']); ?>);">
    <div class="container">
    	<?php if ( '' !== $settings['heading'] )  : ?>
        <div class="row">
            <div class="col-xl-12" data-aos="fade-up" data-aos-duration="1500">
                <div class="section__title text-center  sp_bottom_50">
                    <div class="section__title__heading">
                        <h3><?php print wp_kses_post($settings['heading']); ?></h3>
                    </div>

                </div>
            </div>
        </div>
        <?php endif; ?>


        <div class="tab-content tab__content__wrapper business__strategy__wrapper" id="myTabContent">

            <div class="row">
                <div class="col-xl-12" data-aos="fade-up" data-aos-duration="1500">
                    <ul class="nav  pricing__tab business__strategy__tab" id="myTab" role="tablist">
                    	<?php
							$i = 0;
							foreach ( $settings['tabs'] as $item ) :
							$i++;
						?>
						<?php if($i == 1) { ?>
                        <li class="nav-item" role="presentation">
                            <button class="pricing__tab__link active" data-bs-toggle="tab" data-bs-target="#business__projects__<?php echo esc_attr($i)?>"
                                type="button"><?php print wp_kses_post($item['title_filter']); ?></button>
                        </li>
                        <?php } else { ?>
                        <li class="nav-item" role="presentation">
                            <button class="pricing__tab__link" data-bs-toggle="tab"
                                data-bs-target="#business__projects__<?php echo esc_attr($i)?>" type="button"><?php print wp_kses_post($item['title_filter']); ?></button>
                        </li>
                        <?php }  ?>
                        <?php endforeach; ?>

                    </ul>

                </div>
            </div>
            <?php
				$idd = 0;
				foreach ( $settings['tabs'] as $item ) :
				$idd++;
			?>
			<?php if($idd == 1) { ?>
            <div class="tab-pane fade active show" id="business__projects__<?php echo esc_attr($idd)?>" role="tabpanel" aria-labelledby="projects__<?php echo esc_attr($idd)?>">
            <?php } else { ?>
            <div class="tab-pane fade" id="business__projects__<?php echo esc_attr($idd)?>" role="tabpanel" aria-labelledby="projects__<?php echo esc_attr($idd)?>">
            <?php }  ?>

                <div class="social__wrapper">

                    <div class="row align-items-center">

                        <div class="col-xl-4 col-lg-12 col-sm-12 col-12" data-aos="fade-up" data-aos-duration="1500">
                            <div class="section__title  section__title--2">
                            	<?php if ( '' !== $item['title'] )  : ?>
                                <div class="section__title__heading sp_bottom_20">
                                    <h3><?php echo wp_kses_post($item['title']); ?></h3>
                                </div>
                                <?php endif; ?>
                                <?php if ( '' !== $item['subtitle'] )  : ?>
                                <div class="blog__4__section__title__text">
                                    <p><?php echo wp_kses_post($item['subtitle']); ?></p>
                                </div>
                                <?php endif; ?>
                                <?php if ( '' !== $item['button'] )  : ?>
                                <div class="section__title__button">
                                    <a class="default__button" href="<?php echo wp_kses_post($item['link_button']); ?>"><?php echo wp_kses_post($item['button']); ?></a>
                                </div>
    							<?php endif; ?>
                            </div>
    
                        </div> 
                        <?php
						$i = 0;
						foreach ( $item['tabs2'] as $item2 ) :
							$i++;
						?>
						<?php 
						$post_id = $item2['title_post'];
						$wp_query = new \WP_Query(array(
							'post_type' => 'service',
							'p'	=> $post_id,
							'post_status' => 'publish',
						));
						while ($wp_query -> have_posts()) : $wp_query -> the_post();
						?>
						<?php if($i%2 == 1){?>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12" data-aos="fade-up" data-aos-duration="1800">
                        <?php } else { ?>
                        <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6 col-12" data-aos="fade-up" data-aos-duration="2100">
                        <?php } ?>
                            <div class="service__single__wraper service__single__wraper--2 common__gradient__bg single__transform">
                                <div class="service__single__inner">
                                    <div class="service__img">
                                        <?php if ('' != $item2['img_service']['url']) { ?>
		                                <img src="<?php echo wp_kses_post($item2['img_service']['url']); ?>" alt="">
		                                <?php } else { ?>
		                                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="">
		                                <?php } ?>
		                                <?php if ( ! empty( $item2['icon_image']['value'] ) ) { ?>
                                        <div class="service__bg__img">
                                            <?php \Elementor\Icons_Manager::render_icon( $item2['icon_image'], [ 'aria-hidden' => 'true' ] ); ?>
                                        </div>
                                        <?php } ?>
                                    </div>
                                    <div class="service__content">
                                        <?php if ('' != $item2['title_edit']) { ?>
		                                <div class="service__heading">
		                                    <h5><a href="<?php the_permalink(); ?>"><?php echo wp_kses_post($item2['title_edit']); ?></a></h5>
		                                </div>
		                                <?php } else { ?>
		                                <div class="service__heading">
		                                    <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		                                </div>
			                            <?php } ?>
                                        <?php if ('' != $item2['excerpt_edit']) { ?>
		                                <div class="service__text">
		                                    <p><?php echo wp_kses_post($item2['excerpt_edit']); ?></p>
		                                </div>
		                                <?php } else { ?>
		                                <div class="service__text">
		                                    <p><?php if(isset($bastun_redux_demo['service_excerpt'])){?>
				                            <?php echo esc_attr(bastun_excerpt2($bastun_redux_demo['service_excerpt'])); ?>
				                            <?php }else{?>
				                            <?php echo esc_attr(bastun_excerpt2(10)); } ?></p>
		                                </div>
		                                <?php } ?>
                                    </div>
                                    <?php if ( ! empty( $item2['icon']['value'] ) ) { ?>
		                            <div class="service__icon service__icon--2">
		                                <a class="direction__btn direction__btn--2" href="<?php the_permalink(); ?>">
		                                	<?php \Elementor\Icons_Manager::render_icon( $item2['icon'], [ 'aria-hidden' => 'true' ] ); ?>
		                                </a>
		                            </div>
		                            <?php } ?>
                                </div>
                            </div>
                        </div> 

                        
                        <?php endwhile; ?>
						<?php endforeach; ?>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>

        </div>

    </div>
</div>
	<?php
	}

}
