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
class BdevsServiceHome11 extends \Elementor\Widget_Base {

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
		return 'bdevs-service-home11';
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
		return __( 'Service Home 11', 'bdevs-elementor' );
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
		return [ 'home-11-elementor' ];
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
			'section_content_Servicehome11',
			[
				'label' => esc_html__( 'Service Home 11', 'bdevs-elementor' ),
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
			'subheading',
			[
				'label'       => __( 'Subheading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Subheading', 'bdevs-elementor' ),
				'default'     => __( 'Our Service', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'CONSULTING SERVICE', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'icon_right',
			[
				'label' 		=> esc_html__( 'Icon Right', 'bdevs-elementor' ),
				'type' 			=> Controls_Manager::ICONS,
				'default' 		=> [
					'url' 			=> '',
				],
			]
		);
		$this->add_control(
			'icon_left',
			[
				'label' 		=> esc_html__( 'Icon Left', 'bdevs-elementor' ),
				'type' 			=> Controls_Manager::ICONS,
				'default' 		=> [
					'url' 			=> '',
				],
			]
		);
		$repeater = new \Elementor\Repeater();
			$repeater->add_control(
				'title_post',
				[
					'label'     	=> esc_html__( 'Choose Service', 'bdevs-elementor' ),
					'type'      	=> Controls_Manager::SELECT,
					'options'   	=> $title_options,
					'default'   	=> array_key_first($title_options),
				]
			);
			$repeater->add_control(
				'img_service',
				[
					'label' 		=> esc_html__( 'Image Service', 'bdevs-elementor' ),
					'type' 			=> Controls_Manager::MEDIA,
					'default' 		=> [
						'url' 			=> '',
					],
				]
			);
			$repeater->add_control(
				'title_edit',
				[
					'label'       	=> __( 'Title Service Custom - If this field is empty, it will be used title Service', 'bdevs-elementor' ),
					'type'        	=> Controls_Manager::TEXTAREA,
					'placeholder' 	=> __( 'Enter your text title service custom', 'bdevs-elementor' ),
					'default'     	=> __( '', 'bdevs-elementor' ),
					'label_block' 	=> true,
				]
			);
			$repeater->add_control(
				'excerpt_edit',
				[
					'label'       	=> __( 'Excerpt Service Custom - If this field is empty, it will be used Excerpt Service', 'bdevs-elementor' ),
					'type'        	=> Controls_Manager::TEXTAREA,
					'placeholder' 	=> __( 'Enter your text excerpt service custom', 'bdevs-elementor' ),
					'default'     	=> __( '', 'bdevs-elementor' ),
					'label_block' 	=> true,
				]
			);
			$repeater->add_control(
				'icon_image',
				[
					'label' 		=> esc_html__( 'Icon Image', 'bdevs-elementor' ),
					'type' 			=> Controls_Manager::ICONS,
					'default' 		=> [
					],
				]
			);
			$repeater->add_control(
				'shape',
				[
					'label' 		=> esc_html__( 'Shape', 'bdevs-elementor' ),
					'type' 			=> Controls_Manager::MEDIA,
					'default' 		=> [
						'url' 			=> '',
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
<div class="service sp_top_140 sp_bottom_140 special__spacing" id="tb__service" style="background: url(<?php print esc_url($settings['bg_image']['url']); ?>);">
    <div class="container">

        <div class="row sp_bottom_70"  data-aos="fade-up" data-aos-duration="1500">
            <div class="col-xl-9 col-lg-9 col-md-9 col-sm-8 col-8">
                <div class="section__title section__title--2  section__title--3">
                	<?php if ('' != $settings['subheading']): ?>
                    <div class="section__title__button">
                        <span><?php echo wp_kses_post($settings['subheading']); ?></span>
                    </div>
                    <?php endif ?>
                    <?php if ('' != $settings['heading']): ?>
                    <div class="section__title__heading">
                        <h3><?php echo wp_kses_post($settings['heading']); ?></h3>
                    </div> 
                    <?php endif ?> 
                </div>
            </div>
            <div class="col-xl-3 col-lg-3 col-md-3 col-sm-4 col-4">
                <div class="slider__control__top__wrap position-relative">
                    <div class="slider__controls__wrap slider__controls__pagination slider__controls__arrows slider__controls__arrows--3">
                    	<?php if ('' !== $settings['icon_right']['value'] )  : ?>
                        <div class="swiper-button-next arrow-btn">
                            <?php \Elementor\Icons_Manager::render_icon( $settings['icon_right'], [ 'aria-hidden' => 'true' ] ); ?>  
                        </div>
                        <?php endif; ?>
                        <?php if ('' !== $settings['icon_left']['value'] )  : ?>
                        <div class="swiper-button-prev arrow-btn">
                            <?php \Elementor\Icons_Manager::render_icon( $settings['icon_left'], [ 'aria-hidden' => 'true' ] ); ?>
                        </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">

            <div class="service__slider__active swiper">
                <div class="swiper-wrapper">
                	<?php
					$i = 0;
					foreach ( $settings['tabs'] as $item ) :
						$i++;
					?>
					<?php 
					$post_id = $item['title_post'];
					$wp_query = new \WP_Query(array(
						'post_type' => 'service',
						'p'	=> $post_id,
						'post_status' => 'publish',
					));
					while ($wp_query -> have_posts()) : $wp_query -> the_post();
					?>
					<?php if($i%4 == 1){?>
		            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 swiper-slide" data-aos="fade-up" data-aos-duration="1500">
		            <?php } elseif($i%4 == 2){?>
		            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 swiper-slide" data-aos="fade-up" data-aos-duration="1800">
		            <?php } elseif($i%4 == 3){?>
		            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 swiper-slide" data-aos="fade-up" data-aos-duration="2100">
		            <?php } else {?>
		            <div class="col-xl-3 col-lg-4 col-md-6 col-sm-6 col-12 swiper-slide" data-aos="fade-up" data-aos-duration="2400">
		            <?php } ?>
                        <div class="service__single__wraper service__single__wraper__3 common__gradient__bg single__transform">
                            <div class="service__single__inner">
                                <div class="service__img">
                                	<?php if ('' != $item['img_service']['url']) { ?>
		                            <img src="<?php echo wp_kses_post($item['img_service']['url']); ?>" alt="">
		                            <?php } else { ?>
		                            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="">
		                            <?php } ?>
                                </div>

                                <div class="service__content">
                                	<?php if ('' != $item['title_edit']) { ?>
		                            <div class="service__heading">
		                                <h5><a href="<?php the_permalink(); ?>"><?php echo wp_kses_post($item['title_edit']); ?></a></h5>
		                            </div>
		                            <?php } else { ?>
		                            <div class="service__heading">
		                                <h5><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h5>
		                            </div>
		                            <?php } ?>
                                    <?php if ('' != $item['excerpt_edit']) { ?>
		                            <div class="service__text">
		                                <p><?php echo wp_kses_post($item['excerpt_edit']); ?></p>
		                            </div>
		                            <?php } else { ?>
		                            <div class="service__text">
		                                <p><?php if(isset($bastun_redux_demo['service_excerpt'])){?>
			                            <?php echo esc_attr(bastun_excerpt2($bastun_redux_demo['service_excerpt'])); ?>
			                            <?php }else{?>
			                            <?php echo esc_attr(bastun_excerpt2(10)); } ?></p>
		                            </div>
		                            <?php } ?>
		                            <?php if ( ! empty( $item['icon_image']['value'] ) ) { ?>
		                            <div class="service__icon">
		                                <a class="direction__btn direction__btn--2" href="<?php the_permalink(); ?>">
		                                	<?php \Elementor\Icons_Manager::render_icon( $item['icon_image'], [ 'aria-hidden' => 'true' ] ); ?>
		                                </a>
		                            </div>
		                            <?php } ?>
                                </div>

                            </div>

                            <div class="service__img__bg">
                                <img src="<?php echo wp_kses_post($item['shape']['url']); ?>" alt="">
                            </div>
                        
                        </div>
                    </div>
                    <?php endwhile; ?>
					<?php endforeach; ?>
                    
                </div>
            </div>
        </div>
    </div>
 
</div>
<?php if (is_admin()) { ?>
<script type="text/javascript">
	var swiper = new Swiper(".service__slider__active", {
  grabCursor: true,
  navigation: {
      nextEl: ".swiper-button-next",
      prevEl: ".swiper-button-prev",
  },
  slidesPerView: 1,
  breakpoints: {
      500: {
        slidesPerView: 1,
      },
      576: {
        slidesPerView: 2,
      },

      768: {
        slidesPerView: 2,
      },

      992: {
        slidesPerView: 3,
      },
      1200: {
        slidesPerView: 4
      },
      1500: {
          slidesPerView: 4
      }
  },
});
</script>
<?php }  ?>
	<?php
	}

}
