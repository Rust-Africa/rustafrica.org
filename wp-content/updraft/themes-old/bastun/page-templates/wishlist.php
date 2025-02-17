<?php
/*
 * Template Name: Wishlist
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
                        <h2 class="heading"><?php the_title(); ?></h2>
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
				echo esc_html__( 'Bastun Page Template', 'bastun' );
			}?>
        </div>
    </div>
</div>
<?php
get_footer();
?>