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
class BdevsBlogGrid extends \Elementor\Widget_Base {

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
		return 'bdevs-blog-grid';
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
		return __( 'Blog Grid', 'bdevs-elementor' );
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
		return [ 'Blog Grid' ];
	}

	public function get_script_depends() {
		return [ 'bdevs-elementor'];
	}

	protected function _register_controls() {

		$this->start_controls_section(
			'section_content_blog_grid',
			[
				'label' => esc_html__( 'Blog Grid', 'bdevs-elementor' ),
			]
		);
		$this->add_control(
			'number',
			[
				'label'     => esc_html__( 'Post Count', 'bdevs-elementor' ),
				'type'      => Controls_Manager::TEXT,
				'default'   => '6',
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
		extract($settings); ?>
<div class="service__details blogss__details sp_top_140 sp_bottom_140 special__spacing">
    <div class="container">
        <div class="row">
            <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 mobi-order-2">
                <div class="service__details__sidebar sidebar">
                    <?php get_sidebar();?>
                </div>
            </div>
            <div class="col-xl-8 col-lg-8 col-md-7 col-sm-12 mobi-order-1">
                <div class="row">
                	<?php 
		            $bastun_redux_demo = get_option('redux_demo');
		            $order = $settings['orderpost'];
		            $post_number = $settings['number'];
		            $order_by = $settings['orderby'];
		            if ( get_query_var('paged') ) {
		                    $paged = get_query_var('paged');
		                } elseif ( get_query_var('page') ) { // 'page' is used instead of 'paged' on Static Front Page
		                    $paged = get_query_var('page');
		                } else {
		                    $paged = 1;
		                }
		                $paged = (get_query_var('paged')) ? get_query_var('paged') : 1;
		                $loop = new \WP_Query(array('posts_per_page' => $post_number,'paged' => $paged, 'post_type' => 'post', 'order' => $order, 'orderby' => $order_by));
		                $idd = 0;
		            if ($loop->have_posts()): while ($loop->have_posts()) : $loop->the_post(); 
		                $idd++; ?>
		            <?php $title_blog = get_post_meta(get_the_ID(),'_cmb_title_blog', true); ?>
		            <?php $image_blog = get_post_meta(get_the_ID(),'_cmb_image_blog', true); ?>
                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12" data-aos="fade-up" data-aos-duration="1500">
                        <div class="blog__4__single blog__3__single single__transform bg__pink">
                        	<?php if (wp_get_attachment_url($image_blog) !='')  { ?>
                            <div class="blog__4__img">
                                <img src="<?php echo wp_get_attachment_url($image_blog);?>" alt="">
                            </div>
                            <?php } else { ?>
                            <div class="blog__4__img">
                                <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="">
                            </div>
                            <?php } ?>
                            <div class="blog__4__time">
                               <p class="bg__white"><span class="text__gradient "><?php the_time('j M, Y'); ?></span></p>
                            </div>
                            <?php if ($title_blog !='')  { ?>
                            <div class="blog__4__heading">
                                <h6><a href="<?php the_permalink() ?>"><?php echo esc_attr($title_blog) ?></a></h6>
                            </div>
                            <?php } else {?>
                            <div class="blog__4__heading">
                                <h6><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h6>
                            </div>
                            <?php } ?>
                            <div class="blog__4__text">
                                <p><?php if(isset($bastun_redux_demo['blog_excerpt2'])){?>
                                <?php echo esc_attr(bastun_excerpt2($bastun_redux_demo['blog_excerpt2'])); ?>
                                <?php }else{?>
                                <?php echo esc_attr(bastun_excerpt2(50)); } ?></p>
                            </div>
                            <div class="blog__4__button">
                                <a class="default__button" href="<?php the_permalink() ?>">
                                	<?php if(isset($bastun_redux_demo['read_more'])){?>
                                    <?php echo esc_attr($bastun_redux_demo['read_more']);?>
                                    <?php }else{?>
                                    <?php echo esc_html__( 'Read More', 'bastun' ); } ?></a>
                            </div>
                        </div>
                    </div>
                    <?php endwhile; ?>
                </div>
                <div class="pagination" data-aos="fade-up" data-aos-duration="1500">
                    <?php if ($loop->max_num_pages > 1) : // custom pagination  ?>
                    <?php 
                        $orig_query = $loop;
                        $pagination = array(
                        'base'      => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
                        'format'    => '',
                        'prev_text' => wp_specialchars_decode('<i class="icofont-simple-left"></i>',ENT_QUOTES),
                        'next_text' => wp_specialchars_decode('<i class="icofont-simple-right"></i>',ENT_QUOTES),
                        'type'      => 'list',
                        'total' => $orig_query->max_num_pages
                        );
                        if(paginate_links( $pagination ) != ''){
                            $return =  paginate_links( $pagination );
                            echo str_replace( "<ul class='page-numbers'>", '<ul class="pagination">', $return );
                        }
                    ?>
                    <?php endif; ?>
                    <?php wp_reset_postdata(); else: echo '<p>'.__('Sorry, no tours matched your criteria.').'</p>'; endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>   
	<?php
	}
}