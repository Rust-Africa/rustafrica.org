<?php
   $bastun_redux_demo = get_option('redux_demo');
   get_header(); 
?>
<?php $post_select = get_post_meta(get_the_ID(),'_cmb_post_select', true); ?>
<?php 
    while (have_posts()): the_post();
?>
<?php if(isset($bastun_redux_demo['image_single']['url']) && $bastun_redux_demo['image_single']['url'] != ''){?>
<div class="breadcrumbarea" style="background: url(<?php echo esc_url($bastun_redux_demo['image_single']['url']); ?>);">
<?php }else{ ?>
<div class="breadcrumbarea">
<?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-xl-12" data-aos="fade-up" data-aos-duration="1500">
                <div class="breadcrumbarea__content__wraper">
                    <div class="breadcrumbarea__title">
                        <h2 class="heading">
                            <?php the_title(); ?>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="pages_details blog__details sp_top_140 sp_bottom_140">
    <div class="container">
        <div class="row">
            <?php if ( is_active_sidebar( 'sidebar-1' ) ){?>
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12" data-aos="fade-up" data-aos-duration="1500" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php }else{?>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" data-aos="fade-up" data-aos-duration="1500" id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
            <?php } ?>
                <div class="blog__details__wrapper" >
                    <?php if (wp_get_attachment_url(get_post_thumbnail_id()) !='')  { ?>
                    <div class="blog__details__img__wrapper" data-aos="fade-up" data-aos-duration="1500">
                        <div class="blog__details__img width-auto">
                            <img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="<?php the_title_attribute(); ?>">
                        </div>
                        <div class="blog__details__small__button">
                            <span><?php the_time(get_option( 'date_format' ));?></span>
                        </div>
                    </div>
                    <?php } ?>
                    <?php if ( is_sticky() ) echo '<span class="featured-post">' . esc_html__( 'Sticky', 'bastun' ) . '</span>';?>
                    <div class="blog__details__contents" >
                        <?php the_content(); ?>
                        <?php wp_link_pages( array(
                            'before'      => '<div class="page-links">' . esc_html__( 'Pages:', 'bastun' ),
                            'after'       => '</div>',
                            'link_before' => '<p class="page-number">',
                            'link_after'  => '</p>',
                        ) ); ?>
                    </div>
                    <?php if(isset($bastun_redux_demo['link_facebook'])){?>
                    <div class="blog__details__social__icon" data-aos="fade-up" data-aos-duration="1500">
                        <ul>
                            <div class="blog__details__share">
                                <span><?php if(isset($bastun_redux_demo['share'])){?>
                                <?php echo esc_attr($bastun_redux_demo['share']);?>
                                <?php }else{?>
                                <?php echo esc_html__( 'Share Post:', 'bastun' ); } ?></span>
                            </div>
                            <li>
                                <a class="common__gradient__bg" href="<?php echo esc_attr($bastun_redux_demo['link_facebook']);?>"><span><i class="icofont-facebook"></i></span></a>
                            </li>
                            <?php if(isset($bastun_redux_demo['link_twitter'])){?>
                            <li>
                                <a class="common__gradient__bg" href="<?php echo esc_attr($bastun_redux_demo['link_twitter']);?>"><span><i class="icofont-twitter"></i></span></a>
                            </li>
                            <?php } ?>
                            <?php if(isset($bastun_redux_demo['link_skype'])){?>
                            <li>
                                <a class="common__gradient__bg" href="<?php echo esc_attr($bastun_redux_demo['link_skype']);?>"><span><i class="icofont-skype"></i></span></a>
                            </li>
                            <?php } ?>
                            <?php if(isset($bastun_redux_demo['link_linkedin'])){?>
                            <li>
                                <a class="common__gradient__bg" href="<?php echo esc_attr($bastun_redux_demo['link_linkedin']);?>"><span><i class="icofont-linkedin"></i></span></a>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
                <?php comments_template();?>
            </div>
            <?php if ( is_active_sidebar( 'sidebar-1' ) ){?>
            <div class="col-xl-4 col-lg-4 col-md-12 col-sm-12">
                <div class="service__details__sidebar sidebar-right">
                    <?php get_sidebar();?>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>
</div>
<?php endwhile; ?>
<?php
    get_footer();
?>