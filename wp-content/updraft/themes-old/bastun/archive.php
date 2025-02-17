<?php
     $bastun_redux_demo = get_option('redux_demo');
     get_header(); 
?>
<?php if(isset($bastun_redux_demo['image_blog']['url']) && $bastun_redux_demo['image_blog']['url'] != ''){?>
<div class="breadcrumbarea aos-init aos-animate" data-aos="fade-up" style="background: url(<?php echo esc_url($bastun_redux_demo['image_blog']['url']); ?>);">
<?php }else{ ?>
<div class="breadcrumbarea aos-init aos-animate" data-aos="fade-up">
<?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-xl-12" data-aos="fade-up" data-aos-duration="1500">
                <div class="breadcrumbarea__content__wraper">
                    <div class="breadcrumbarea__title">
                        <h2 class="heading">
                            <?php
                            if ( is_day() ) :
                                printf( esc_html__( 'Daily Archives: %s', 'bastun' ), get_the_date() );
                            elseif ( is_month() ) :
                                printf( esc_html__( 'Monthly Archives: %s', 'bastun' ), get_the_date( esc_html_x( 'F Y', 'monthly archives date format', 'bastun' ) ) );
                            elseif ( is_year() ) :
                                printf( esc_html__( 'Yearly Archives: %s', 'bastun' ), get_the_date( esc_html_x( 'Y', 'yearly archives date format', 'bastun' ) ) );
                            else :
                                echo esc_html__( 'Archives', 'bastun' );
                            endif;?>
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="service__details blog-standard sp_top_140 sp_bottom_140 special__spacing">
    <div class="container">
        <div class="row">
            <?php if ( is_active_sidebar( 'sidebar-1' ) ){?>
            <div class="col-xl-8 col-lg-8 col-md-12 col-sm-12">
            <?php }else{?>
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <?php } ?>
                <div class="row">
                    <?php
                        while (have_posts()): the_post();
                    ?>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12" data-aos="fade-up" data-aos-duration="1500">
                        <div class="blog__4__single blog__3__single single__transform bg__pink">
                            <?php if (wp_get_attachment_url(get_post_thumbnail_id()) !='')  { ?>
                            <div class="blog__4__img">
                                <a href="<?php the_permalink() ?>"><img src="<?php echo wp_get_attachment_url(get_post_thumbnail_id());?>" alt="<?php the_title_attribute(); ?>"></a>
                            </div>
                            <?php } ?>
                            <div class="blog__4__time">
                               <p class="bg__white"><span class="text__gradient "><?php the_time(get_option( 'date_format' ));?></span></p>
                               <?php if ( is_sticky() ) echo '<span class="featured-post">' . esc_html__( 'Sticky', 'bastun' ) . '</span>';?>
                            </div>

                            <div class="blog__4__heading">
                                <h6><a href="<?php the_permalink() ?>"><?php the_title(); ?></a></h6>
                            </div>
                            <div class="blog__4__text">
                                <p><?php if(isset($bastun_redux_demo['blog_excerpt'])){?>
                                    <?php echo esc_attr(bastun_excerpt($bastun_redux_demo['blog_excerpt'])); ?>
                                    <?php }else{?>
                                    <?php echo esc_attr(bastun_excerpt(50)); } ?></p>
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
                    <?php 
                        $pagination = array(
                        'base'      => str_replace( 999999999, '%#%', get_pagenum_link( 999999999 ) ),
                        'format'    => '',
                        'prev_text' => wp_specialchars_decode('<i class="icofont-simple-left"></i>',ENT_QUOTES),
                        'next_text' => wp_specialchars_decode('<i class="icofont-simple-right"></i>',ENT_QUOTES),
                        'type'      => 'list',
                        'end_size'    => 3,
                        'mid_size'    => 3
                        );
                        if(paginate_links( $pagination ) != ''){
                            $return =  paginate_links( $pagination );
                            echo str_replace( "<ul class='page-numbers'>", '<ul class="pagination">', $return );
                        }
                    ?>
                </div>
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
<?php if(has_tag()){ ?>
<div class="post-tags">
    <i class="fas fa-tags"></i>
    <?php the_tags('',''); ?>
</div>
<?php } ?>
<?php
    get_footer();
?>