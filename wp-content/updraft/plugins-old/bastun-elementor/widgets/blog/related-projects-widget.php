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
class BdevsRelatedProject extends \Elementor\Widget_Base {

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
		return 'bdevs-related-projects';
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
		return __( 'Related Project Details', 'bdevs-elementor' );
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
		return [ 'Related Project' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_content_RelatedProject_details_Portfolio',
			[
				'label' => esc_html__( 'Related Details', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'subheading',
			[
				'label'       => __( 'Subheading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your Subheading', 'bdevs-elementor' ),
				'default'     => __( 'Our Projects', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'heading',
			[
				'label'       => __( 'Heading', 'bdevs-elementor' ),
				'type'        => Controls_Manager::TEXT,
				'placeholder' => __( 'Enter your heading', 'bdevs-elementor' ),
				'default'     => __( 'Related Projects', 'bdevs-elementor' ),
				'label_block' => true,
			]
		);	
		$this->add_control(
			'post_number',
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
				'default'   => '',
			]
		);
		$this->add_control(
			'icon',
			[
				'label' => esc_html__( 'Icon', 'textdomain' ),
				'type' => Controls_Manager::ICONS,
				'default' => [],
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
		$wp_query = new \WP_Query(array('post_type' => 'project', 'posts_per_page' => $settings['post_number'],'orderby' => $settings['orderby'], 'order' => $settings['orderpost'],));
		extract($settings); ?>
<div class="related__project  sp_bottom_140 special__spacing">
    <div class="container">
        <div class="row">
            <div class="col-xl-12" data-aos="fade-up" data-aos-duration="1500">
                <div class="section__title  text-center sp_bottom_60">
                	<?php if ( '' !== $settings['subheading'] )  : ?>
                    <div class="section__title__button">
                        <span class="text__gradient "><?php print wp_kses_post($settings['subheading']); ?></span>
                    </div>
                    <?php endif; ?>
                    <?php if ( '' !== $settings['heading'] )  : ?>
                    <div class="section__title__heading">
                        <h3><?php print wp_kses_post($settings['heading']); ?></h3>
                    </div>
                	<?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row position-relative">
        	<?php
        		$idd = 0;
	            while($wp_query->have_posts()): $wp_query->the_post();
	            $idd++;
	            $bastun_redux_demo = get_option('redux_demo');
            ?>  
            <?php $image_feature = get_post_meta(get_the_ID(),'_cmb_image_feature', true); ?>
            <?php if($idd%3 == 1){ ?>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-duration="1500">
            <?php } elseif($idd%3 == 2) { ?>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-duration="1800">
            <?php } else { ?>
            <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-duration="2100">
            <?php } ?>
                <div class="project__single single__transform">
                    <div class="project__img project__img--2">
                    	<?php if (wp_get_attachment_url($image_feature) !='')  { ?>
                        <a href="<?php the_permalink() ?>"><img src="<?php echo wp_get_attachment_url($image_feature);?>" alt=""></a>
                        <?php } ?>
                        <div class="project__heading project__heading--2">
                            <h3><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h3>
                        </div>
                        <div class="project__icon project__icon--2">
                            <a class="direction__btn" href="<?php the_permalink() ?>">
                            	<?php \Elementor\Icons_Manager::render_icon( $settings['icon'], [ 'aria-hidden' => 'true' ] ); ?>
                            </a>
                        </div>

                    </div>

                </div>
            </div>
            <?php endwhile; ?>
            <?php if ( '' !== $settings['brand__badge']['url'] )  : ?>
            <div class="bastun__brand__badge related__project__badge">
                <div class="bastun__brand__badge__inner position-relative">
                    <a href="<?php print wp_kses_post($settings['link_brand__badge']); ?>">

                        <img class="bbb__animate" src="<?php print esc_url($settings['brand__badge']['url']); ?>" alt="">
                        <img class="bbb__icon" src="<?php print esc_url($settings['brand__badge__inner']['url']); ?>" alt="">
                    </a>
                </div>
            </div>
            <?php endif; ?>
        </div>
    </div>
</div>
	<?php
	}
}