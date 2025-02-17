<?php
/**
 * The template for displaying 404 pages (Not Found)
 */
$bastun_redux_demo = get_option('redux_demo');
get_header(); ?> 
<?php if(isset($bastun_redux_demo['bg_image_404']['url']) && $bastun_redux_demo['bg_image_404']['url'] != ''){?>
<div class="breadcrumbarea" style="background: url(<?php echo esc_url($bastun_redux_demo['bg_image_404']['url']); ?>);">
<?php }else{ ?>
<div class="breadcrumbarea">
<?php } ?>
    <div class="container">
        <div class="row">
            <div class="col-xl-12" data-aos="fade-up" data-aos-duration="1500">
                <div class="breadcrumbarea__content__wraper">
                    <div class="breadcrumbarea__title">
                        <h2 class="heading">
                            <?php if(isset($bastun_redux_demo['error_title'])){?>
                            <?php echo esc_attr($bastun_redux_demo['error_title']);?>
                            <?php }else{?>
                            <?php echo esc_html__( 'ERROR', 'bastun' ); } ?>
                        </h2>
                    </div>
                    <?php if(isset($bastun_redux_demo['error_title'])){?>
                    <div class="breadcrumbarea__inner">
                        <ul>
                            <li><a href="<?php echo esc_url(home_url('/')); ?>"><?php if(isset($bastun_redux_demo['home'])){?>
                            <?php echo esc_attr($bastun_redux_demo['home']);?>
                            <?php }else{?>
                            <?php echo esc_html__( 'Home', 'bastun' ); } ?></a></li>
                            <li><?php echo esc_html__( '//', 'bastun' ); ?> </li>
                            <li>
                                <?php echo esc_attr($bastun_redux_demo['error_title']);?>
                            </li>
                        </ul>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="error sp_top_140 sp_bottom_160">
    <div class="container">
        <div class="row">
            <?php if(isset($bastun_redux_demo['image_404']['url']) && $bastun_redux_demo['image_404']['url'] != ''){?>
            <div class="col-xl-12 sp_bottom_80" data-aos="fade-up" data-aos-duration="1500">
                <div class="error__img text-center">
                    <img src="<?php echo esc_url($bastun_redux_demo['image_404']['url']); ?>" alt="<?php the_title_attribute(); ?>">
                </div>
            </div>
            <?php }else{ ?>
            <div class="col-xl-12 sp_bottom_80" data-aos="fade-up" data-aos-duration="1500">
                <div class="error__img text-center">
                    <img src="<?php echo esc_url(get_template_directory_uri());?>/img/contact/error.png" alt="<?php the_title_attribute(); ?>">
                </div>
            </div>
            <?php } ?>
            <div class="col-xl-12" data-aos="fade-up" data-aos-duration="1500">
                <div class="error__text__wrapper">
                    <h3>
                        <?php if(isset($bastun_redux_demo['page_not_found'])){?>
                        <?php echo html_entity_decode(esc_attr($bastun_redux_demo['page_not_found']));?>
                        <?php }else{?>
                        <?php echo html_entity_decode(esc_html__( '<span class="text__gradient">Lost In The Filed?</span> Let us help you find your way back.', 'bastun' )); } ?>
                    </h3>
                    <div class="error__button">
                        <a class="default__button" href="<?php echo esc_url(home_url('/')); ?>">
                            <?php if(isset($bastun_redux_demo['home_page'])){?>
                            <?php echo esc_attr($bastun_redux_demo['home_page']);?>
                            <?php }else{?>
                            <?php echo esc_html__( 'Back to Home Page', 'bastun' ); } ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php get_footer(); ?> 