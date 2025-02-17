<?php $bastun_redux_demo = get_option('redux_demo');?> 
<?php if(isset($bastun_redux_demo['image_footer_home16']['url']) && $bastun_redux_demo['image_footer_home16']['url'] != ''){?>
<div class="footer__2 position-relative sp_top_140" id="footer__area__2" style="background: url(<?php echo esc_url($bastun_redux_demo['image_footer_home16']['url']); ?>);">
<?php }else{ ?>
<div class="footer__2 position-relative sp_top_140" id="footer__area__2" style="background: url(<?php echo esc_url(get_template_directory_uri());?>/img/footer/footer__bg__1.png);">
<?php } ?>
    <div class="container">
        <div class="footer__wrapper sp_bottom_110">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12 col-12" data-aos="fade-up" data-aos-duration="1500">
                    <div class="footer__widget footer__left">
                        <?php if(isset($bastun_redux_demo['logo2_footer']['url']) && $bastun_redux_demo['logo2_footer']['url'] != ''){?>
                        <div class="footer__logo">
                            <img src="<?php echo esc_url($bastun_redux_demo['logo2_footer']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>">
                        </div>
                        <?php }else{ ?>
                        <div class="footer__logo">
                            <img src="<?php echo esc_url(get_template_directory_uri());?>/img/logo/Logo_2.png" alt="<?php bloginfo( 'name' ); ?>">
                        </div>
                        <?php } ?>
                        <?php if ( is_active_sidebar( 'footer-area-1' ) ) : ?>
                            <?php dynamic_sidebar( 'footer-area-1' ); ?>
                        <?php endif; ?>
                    </div>
                </div>                          
                <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6 col-12" data-aos="fade-up" data-aos-duration="1800">
                    <?php if ( is_active_sidebar( 'footer-area-2' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-area-2' ); ?>
                    <?php endif; ?>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12" data-aos="fade-up" data-aos-duration="2100">
                    <div class="footer__widget footer__right footer__right--2">
                        <?php if ( is_active_sidebar( 'footer-area-3' ) ) : ?>
                            <?php dynamic_sidebar( 'footer-area-3' ); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12 col-12" data-aos="fade-up" data-aos-duration="2400">
                    <?php if ( is_active_sidebar( 'footer-area-4' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-area-4' ); ?>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="copyright copyright--2">
    <div class="container">
        <div class="row row align-items-center">
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="copyright__left copyright__left--2">
                    <p><?php if(isset($bastun_redux_demo['footer_copyright'])){?>
                        <?php echo html_entity_decode(esc_attr($bastun_redux_demo['footer_copyright']));?>
                        <?php }else{?>
                        <?php echo esc_html__( 'Copyright © 2024 BASTUN. All Right Reserved', 'bastun' ); } ?></p>
                </div>
            </div>
            <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12">
                <div class="copyright__right">
                    <ul>
                        <?php if(isset($bastun_redux_demo['privacy_policy'])){?>
                        <li>
                            <a href="<?php echo esc_attr($bastun_redux_demo['link_privacy_policy']);?>"><?php echo esc_html($bastun_redux_demo['privacy_policy']);?></a>
                        </li>
                        <?php } ?>
                        <?php if(isset($bastun_redux_demo['icon_footer'])){?>
                        <li>
                            <a href=""><?php echo esc_html($bastun_redux_demo['icon_footer']);?></a>
                        </li>
                        <?php } ?>
                        <?php if(isset($bastun_redux_demo['terms_conditions'])){?>
                        <li>
                            <a href="<?php echo esc_attr($bastun_redux_demo['link_terms_conditions']);?>"><?php echo esc_html($bastun_redux_demo['terms_conditions']);?></a>
                        </li>
                        <?php } ?>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
</main>
<?php wp_footer(); ?>
</body>
</html>