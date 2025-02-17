<?php $bastun_redux_demo = get_option('redux_demo');?> 
    <div class="footer__3 position-relative sp_top_140">
        <?php if (isset($bastun_redux_demo['repeater-animate-footer']['redux_repeater_data']) && !empty($bastun_redux_demo['repeater-animate-footer']['redux_repeater_data'])): ?>
        <div class="brand__4 brand__3" data-aos="fade-up" data-aos-duration="1500">
            <div class="container">
                <div class="brand__inner brand__inner--2">
                    <?php 
                    $num = count($bastun_redux_demo['repeater-animate-footer']['redux_repeater_data']);
                    $i = 0;
                    for ($i=0; $i < $num ; $i++) { ?>
                    <div class="brand__single">
                        <img src="<?php echo html_entity_decode(esc_attr($bastun_redux_demo['repeater-animate-footer']['image'][$i]['url'])) ?>" alt="<?php bloginfo( 'name' ); ?>">
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
        <?php endif ?>
        <div class="container">
            <div class="footer__wrapper sp_bottom_110">
                <div class="row">
                    <div class="col-xl-4 col-lg-4 col-md-6 col-sm-12" data-aos="fade-up" data-aos-duration="1500">
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
                    <div class="col-xl-2 col-lg-2 col-md-6 col-sm-6" data-aos="fade-up" data-aos-duration="1800">
                        <?php if ( is_active_sidebar( 'footer-area-2' ) ) : ?>
                            <?php dynamic_sidebar( 'footer-area-2' ); ?>
                        <?php endif; ?>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6" data-aos="fade-up" data-aos-duration="2100">
                        <div class="footer__widget footer__right footer__right--2">
                            <?php if ( is_active_sidebar( 'footer-area-3' ) ) : ?>
                                <?php dynamic_sidebar( 'footer-area-3' ); ?>
                            <?php endif; ?>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-12" data-aos="fade-up" data-aos-duration="2400">
                        <?php if ( is_active_sidebar( 'footer-area-4' ) ) : ?>
                            <?php dynamic_sidebar( 'footer-area-4' ); ?>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="copyright copyright--4">
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