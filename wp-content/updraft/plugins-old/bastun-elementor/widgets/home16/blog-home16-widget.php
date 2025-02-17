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
class BdevsBlogHome16 extends \Elementor\Widget_Base {

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
		return 'bdevs-blog-home16';
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
		return __( 'Blog Home 16', 'bdevs-elementor' );
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
		return [ 'Blog Home 16', 'carousel' ];
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
		$title_options = $this->get_post_titles_options();
		$this->start_controls_section(
			'section_content_bloghome',
			[
				'label' => esc_html__( 'Blog Home 16', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXTAREA,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'ULTIMATE INSIGHTS INSPIRATION, AWESOME BLOG INNOVATION ARTICLES.', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'button',
			[
				'label'       => __( 'Button', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Button', 'bdevs-elementor' ),
				'default'     => __( 'ALL ARTICLES', 'bdevs-elementor' ),
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
			'number',
			[
				'label'     => esc_html__( 'Post Count', 'bdevs-elementor' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => '3',
			]
		);

		$this->add_control(
			'orderpost',
			[
				'label'     => esc_html__( 'Post Order', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'asc'  => esc_html__( 'ASC', 'bdevs-elementor' ),
					'desc' => esc_html__( 'DESC', 'bdevs-elementor' ),
				],
				'default'   => 'asc',
			]
		);
		$this->add_control(
			'orderby',
			[
				'label'     => esc_html__( 'Order By', 'bdevs-elementor' ),
				'type'      => Controls_Manager::SELECT,
				'options'   => [
					'date'  => esc_html__( 'Date', 'bdevs-elementor' ),
					'title' => esc_html__( 'Title', 'bdevs-elementor' ),
					'rand' => esc_html__( 'Random', 'bdevs-elementor' ),
				],
				'default'   => 'desc',

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
<div class="blog sp_bottom_120 sp_top_140 pink__bg__color" id="blog__area"  data-aos="fade-up" data-aos-duration="1500">
    <div class="container">
        <div class="row align-items-center sp_bottom_80">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
            	<?php if ( '' !== $settings['heading'] )  : ?>
                <div class="section__title section__title--2">
                    <div class="section__title__heading">
                        <h3 class="mb-0"><?php echo wp_kses_post($settings['heading']); ?></h3>
                    </div>
                </div>
                <?php endif; ?>
            </div>
            <?php if ( '' !== $settings['button'] )  : ?>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="blog__section__button text__end">
                    <a class="default__button btn__blue" href="<?php echo wp_kses_post($settings['link_button']); ?>"><?php echo wp_kses_post($settings['button']); ?></a>
                </div>
            </div>
            <?php endif; ?>
        </div>
        <div class="blog__main__wrapper">
        	<?php 
        	$bastun_redux_demo = get_option('redux_demo');
        	$i=0;
            $q = new \WP_Query(array(
                'post_type'     => 'post',
                'posts_per_page'=> $number,
                'orderby'       => $orderby,
                'order'         => $orderpost,
            ));
        	while($q->have_posts()): $q->the_post();  
        	$i++;
        	?>
        	<?php $image_home = get_post_meta(get_the_ID(),'_cmb_image_home', true); ?>
            <?php if($i%3 == 1){?>
            <div class="blog__single" data-aos="fade-up" data-aos-duration="1500">
            <?php } elseif($i%3 == 2){?>
            <div class="blog__single" data-aos="fade-up" data-aos-duration="1800">
            <?php } else { ?>
            <div class="blog__single" data-aos="fade-up" data-aos-duration="2100">
            <?php } ?>
                <?php if (wp_get_attachment_url($image_home) !='')  { ?>
                <div class="blog__img">
                    <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url($image_home);?>" alt=""></a>
                </div>
                <?php } else { ?>
                <div class="blog__img">
                    <a href="<?php the_permalink(); ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt=""></a>
                </div>
                <?php } ?>
                <div class="blog__date">
                    <div class="blog__date__inner">
                        <span><?php the_time('j'); ?></span>
                        <p><?php the_time('M, Y'); ?></p>
                    </div>
                </div>
                <div class="blog__content">
                    <h6><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h6>
                    <p><?php if(isset($bastun_redux_demo['blog_excerpt3'])){?>
                        <?php echo esc_attr(bastun_excerpt3($bastun_redux_demo['blog_excerpt3'])); ?>
                        <?php }else{?>
                        <?php echo esc_attr(bastun_excerpt3(10)); } ?></p>
                </div>
                <div class="blog__icon">
                    <a class="direction__btn" href="<?php the_permalink(); ?>">
                        <svg width="34" height="34" viewBox="0 0 34 34" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <path d="M14.4258 10.9897L23.0101 10.9897L23.0101 19.574" stroke="#0A0624" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        <path d="M10.9902 23.0107L22.8908 11.1101" stroke="#0A0624" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>
                    </a>
                </div>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
	<?php
	}

}
