<?php
/*
 * Template Name: Checkout
 * Description: A Page Template with a Page Builder design.
 */
$bastun_redux_demo = get_option('redux_demo');
get_header(); ?>
<?php if(isset($bastun_redux_demo['image_shop']['url']) && $bastun_redux_demo['image_shop']['url'] != ''){?>
<div class="breadcrumbarea" style="background: url(<?php echo esc_url($bastun_redux_demo['image_shop']['url']); ?>);">
<?php }else{ ?>
<div class="breadcrumbarea" style="background: url(<?php echo esc_url(get_template_directory_uri());?>/img/about/about__bg__1.jpg);">
<?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-xl-12" data-aos="fade-up" data-aos-duration="1500">
                <div class="breadcrumbarea__content__wraper">
                    <div class="breadcrumbarea__title">
                        <h2 class="heading"><?php if(isset($bastun_redux_demo['checkout_title'])){?>
                            <?php echo html_entity_decode(esc_attr($bastun_redux_demo['checkout_title']));?>
                            <?php }else{?>
                            <?php echo esc_html__( 'Checkout', 'bastun' ); } ?></h2>
                    </div>
                    <div class="breadcrumbarea__inner">
                        <ul>
                            <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php if(isset($bastun_redux_demo['home'])){?>
                                <?php echo esc_attr($bastun_redux_demo['home']);?>
                                <?php }else{?>
                                <?php echo esc_html__( 'Home', 'bastun' ); } ?></a></li>
                            <li>// </li>
                            <li> <?php if(isset($bastun_redux_demo['checkout_subtitle'])){?>
                                <?php echo html_entity_decode(esc_attr($bastun_redux_demo['checkout_subtitle']));?>
                                <?php }else{?>
                                <?php echo esc_html__( 'Checkout', 'bastun' ); } ?> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="checkoutarea sp_bottom_140 sp_top_100">
    <div class="container">
        <div class="row">
            <?php if (have_posts()){ ?>
				<?php while (have_posts()) : the_post()?>
					<?php the_content(); ?>
					<?php endwhile; ?>
				<?php }else {
				echo esc_html__( 'Bemet Page Template', 'bastun' );
			}?>
        </div>
    </div>
</div>
<?php
get_footer();
?>