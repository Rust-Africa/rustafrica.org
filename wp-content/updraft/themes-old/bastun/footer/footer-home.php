<?php $bastun_redux_demo = get_option('redux_demo');?> 
<?php if(isset($bastun_redux_demo['image_footer_home']['url']) && $bastun_redux_demo['image_footer_home']['url'] != ''){?>
<div class="footer position-relative sp_top_250 pink__bg__color" id="footer__area" style="background-image: url(<?php echo esc_url($bastun_redux_demo['image_footer_home']['url']); ?>);">
<?php }else{ ?>
<div class="footer position-relative sp_top_250 pink__bg__color" id="footer__area" style="background-image: url(<?php echo esc_url(get_template_directory_uri());?>/img/footer/footer_1.png);">
<?php } ?>
    <?php if(isset($bastun_redux_demo['brand__badge']['url']) && $bastun_redux_demo['brand__badge']['url'] != ''){?>
    <div class="bastun__brand__badge bastun__brand__badge__footer">
        <div class="bastun__brand__badge__inner position-relative">
            <a href="<?php echo esc_url(home_url('/')); ?>">
                <img class="bbb__animate" src="<?php echo esc_url($bastun_redux_demo['brand__badge']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>">
                <img class="bbb__icon" src="<?php echo esc_url($bastun_redux_demo['brand__badge_inner']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>">
            </a>
        </div>
    </div>
    <?php } ?>
    <div class="container">
        <div class="footer__wrapper sp_bottom_110">
            <div class="row">
                <div class="col-xl-4 col-lg-6 col-md-6" data-aos="fade-up" data-aos-duration="1500">
                    <div class="footer__widget footer__left">
                        <?php if(isset($bastun_redux_demo['logo1_footer']['url']) && $bastun_redux_demo['logo1_footer']['url'] != ''){?>
                        <div class="footer__logo">
                            <img src="<?php echo esc_url($bastun_redux_demo['logo1_footer']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>">
                        </div>
                        <?php }else{ ?>
                        <div class="footer__logo">
                            <img src="<?php echo esc_url(get_template_directory_uri());?>/img/logo/Logo_1.png" alt="<?php bloginfo( 'name' ); ?>">
                        </div>
                        <?php } ?>
                        <?php if ( is_active_sidebar( 'footer-area-1' ) ) : ?>
                            <?php dynamic_sidebar( 'footer-area-1' ); ?>
                        <?php endif; ?>
                    </div>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-6 col-sm-6" data-aos="fade-up" data-aos-duration="2000">
                    <?php if ( is_active_sidebar( 'footer-area-5' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-area-5' ); ?>
                    <?php endif; ?>
                </div>
                <div class="col-xl-2 col-lg-6 col-md-6 col-sm-6" data-aos="fade-up" data-aos-duration="2500">
                    <?php if ( is_active_sidebar( 'footer-area-2' ) ) : ?>
                        <?php dynamic_sidebar( 'footer-area-2' ); ?>
                    <?php endif; ?>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 col-sm-12" data-aos="fade-up" data-aos-duration="3000">
                    <div class="footer__widget footer__right">
                        <?php if ( is_active_sidebar( 'footer-area-3' ) ) : ?>
                            <?php dynamic_sidebar( 'footer-area-3' ); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
        <div class="copyright">
            <div class="row align-items-center">
                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
                    <div class="copyright__left">
                        <p><?php if(isset($bastun_redux_demo['footer_copyright'])){?>
                        <?php echo html_entity_decode(esc_attr($bastun_redux_demo['footer_copyright']));?>
                        <?php }else{?>
                        <?php echo esc_html__( 'Copyright © 2024 BASTUN. All Right Reserved', 'bastun' ); } ?></p>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-12">
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
</div>
</main>
<?php wp_footer(); ?>
</body>
</html>