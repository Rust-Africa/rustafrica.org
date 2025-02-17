<!doctype html>
<html <?php language_attributes(); ?>>
<?php $bastun_redux_demo = get_option('redux_demo'); ?>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php if ( ! function_exists( 'has_site_icon' ) || ! has_site_icon() ) { ?>
        <?php if(isset($bastun_redux_demo['favicon']['url'])){?>
        <link rel="shortcut icon" href="<?php echo esc_url($bastun_redux_demo['favicon']['url']); ?>">
        <?php }?>
    <?php }?>
    <?php wp_head(); ?> 
</head>
<body <?php body_class(' body__wrapper '); ?>>
<?php
    wp_body_open();
?>
<?php if(isset($bastun_redux_demo['preloader']['url']) && $bastun_redux_demo['preloader']['url'] != ''){?>
<div id="back__preloader">
    <div id="back__circle_loader"></div>
    <div class="back__loader_logo">
        <img loading="lazy"  src="<?php echo esc_url($bastun_redux_demo['logo']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>">
    </div>
</div>
<?php }else{ ?>
<div id="back__preloader">
    <div id="back__circle_loader"></div>
    <div class="back__loader_logo">
        <img loading="lazy"  src="<?php echo esc_url(get_template_directory_uri());?>/img/pre.png" alt="<?php bloginfo( 'name' ); ?>">
    </div>
</div>
<?php } ?> 
<?php if(isset($bastun_redux_demo['dark']) && $bastun_redux_demo['light'] != '') { ?>
<div class="mode_switcher my_switcher">
    <button id="light--to-dark-button" class="light align-items-center">
        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon dark__mode" viewBox="0 0 512 512"><path d="M160 136c0-30.62 4.51-61.61 16-88C99.57 81.27 48 159.32 48 248c0 119.29 96.71 216 216 216 88.68 0 166.73-51.57 200-128-26.39 11.49-57.38 16-88 16-119.29 0-216-96.71-216-216z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
        <svg xmlns="http://www.w3.org/2000/svg" class="ionicon light__mode" viewBox="0 0 512 512"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M256 48v48M256 416v48M403.08 108.92l-33.94 33.94M142.86 369.14l-33.94 33.94M464 256h-48M96 256H48M403.08 403.08l-33.94-33.94M142.86 142.86l-33.94-33.94"/><circle cx="256" cy="256" r="80" fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32"/></svg>
        <?php if(isset($bastun_redux_demo['light']) && $bastun_redux_demo['light'] != ''){?>
        <span class="light__mode"><?php echo esc_html($bastun_redux_demo['light']);?></span>
        <?php } ?>
        <?php if(isset($bastun_redux_demo['dark']) && $bastun_redux_demo['dark'] != ''){?>
        <span class="dark__mode"><?php echo esc_html($bastun_redux_demo['dark']);?></span>
        <?php } ?>
    </button>
</div>
<?php } ?> 
<main class="main_wrapper overflow__hidden__X woocommerce">
    <header>
        <div class="headerarea headerarea--4 headerarea__transparent headerarea__display__none header__sticky">
            <div class="container-fluid full__width__padding ">
                <div class="headerarea__main__wrapper headerarea__main__wrapper--4 position-relative">
                    <div class="headerarea__component__wrap">
                        <?php if(isset($bastun_redux_demo['logo2']['url']) && $bastun_redux_demo['logo2']['url'] != ''){?>
                        <div class="headerarea__component">
                            <div class="headerarea__logo">
                                <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($bastun_redux_demo['logo2']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
                            </div>
                        </div>
                        <?php }else{ ?>
                        <div class="headerarea__component">
                            <div class="headerarea__logo">
                                <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_template_directory_uri());?>/img/logo/Logo_2.png" alt="<?php bloginfo( 'name' ); ?>"></a>
                            </div>
                        </div>
                        <?php } ?>

                        <div class="headerarea__component">
                            <div class="headerarea__right">
                                <div class="headerarea__icon">
                                    <ul>
                                        <?php if(isset($bastun_redux_demo['facebook']) && $bastun_redux_demo['facebook'] != ''){?>
                                        <li>
                                            <a href="<?php echo esc_attr($bastun_redux_demo['facebook']);?>"><i class="icofont-facebook"></i></a>
                                        </li>
                                        <?php } ?>
                                        <?php if(isset($bastun_redux_demo['twitter']) && $bastun_redux_demo['twitter'] != ''){?>
                                        <li>
                                            <a href="<?php echo esc_attr($bastun_redux_demo['twitter']);?>"><i class="icofont-twitter"></i></a>
                                        </li>
                                        <?php } ?>
                                        <?php if(isset($bastun_redux_demo['skype']) && $bastun_redux_demo['skype'] != ''){?>
                                        <li>
                                            <a href="<?php echo esc_attr($bastun_redux_demo['skype']);?>"><i class="icofont-skype"></i></a>
                                        </li>
                                        <?php } ?>
                                        <?php if(isset($bastun_redux_demo['linkedin']) && $bastun_redux_demo['linkedin'] != ''){?>
                                        <li>
                                            <a href="<?php echo esc_attr($bastun_redux_demo['linkedin']);?>"><i class="icofont-linkedin"></i></a>
                                        </li>
                                        <?php } ?>
                                        <li class="headerarea__icon__offcanvas">
                                            <button class="headerarea__bar__wrapper" type="button"
                                                data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight"
                                                aria-controls="offcanvasRight">
                                                <svg width="20" height="16" viewBox="0 0 20 16" fill="none"
                                                    xmlns="http://www.w3.org/2000/svg">
                                                    <rect width="20" height="2" fill="#0A0624" />
                                                    <rect y="7" width="20" height="2" fill="#0A0624" />
                                                    <rect y="14" width="20" height="2" fill="#0A0624" />
                                                </svg>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="offcanvas offcanvas-end headerarea__offcavas__wrapper" tabindex="-1" id="offcanvasRight"
        aria-labelledby="offcanvasRight">
        <div class="offcanvas-header headerarea__offcavas__close__button">
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body headerarea__offcavas__body">
            <form action="<?php echo esc_url(home_url('/')); ?>" class="headerarea__offcavas__form">
                <div class="form-group">
                    <input type="text" name="s" placeholder="<?php echo esc_attr__('Search...', 'bastun' );?>">
                    <button type="submit" class="side-nav-search-btn"><i class="icofont-search"></i></button>
                </div>
            </form>
            <div class="row ">
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <?php 
                        wp_nav_menu( 
                          array( 
                              'theme_location' => 'menu_home4',
                              'container' => '',
                              'menu_class' => '', 
                              'menu_id' => '',
                              'menu'            => '',
                              'container_class' => '',
                              'container_id'    => '',
                              'echo'            => true,
                              'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                              'walker'            => new bastun3_wp_bootstrap_navwalker(),
                              'before'          => '',
                              'after'           => '',
                              'link_before'     => '',
                              'link_after'      => '',
                              'items_wrap'      => '<ul class="headerarea__offcavas__menu %2$s " >%3$s</ul>',
                              'depth'           => 0,        
                          )
                    ); ?>
                </div>
                <div class="col-md-6 col-lg-6 col-xl-6">
                    <div class="headerarea__offcavas__contact">
                        <div class="headerarea__offcavas__contact__inner">
                            <?php if(isset($bastun_redux_demo['header_address_offcavas']) && $bastun_redux_demo['header_address_offcavas'] != ''){?>
                            <address class="headerarea__offcavas__address">
                                <span class="title"><?php echo esc_html($bastun_redux_demo['title_address_offcavas']);?></span>
                                <p><?php echo wp_specialchars_decode(esc_attr($bastun_redux_demo['header_address_offcavas']));?></p>
                            </address>
                            <?php }?>
                            <?php if(isset($bastun_redux_demo['header_phone1_offcavas']) && $bastun_redux_demo['header_phone1_offcavas'] != ''){?>
                            <address class="headerarea__offcavas__address">
                                <span class="title"><?php echo esc_html($bastun_redux_demo['title_phone_offcavas']);?></span>
                                <a class="tel" href="tel:<?php echo esc_attr($bastun_redux_demo['header_phone1_offcavas']);?>"><i class="icofont-phone"></i><?php echo esc_html($bastun_redux_demo['header_phone1_offcavas']);?></a>
                                <a class="tel" href="tel:<?php echo esc_attr($bastun_redux_demo['header_phone2_offcavas']);?>"><i class="icofont-fax"></i><?php echo esc_html($bastun_redux_demo['header_phone2_offcavas']);?></a>
                            </address>
                            <?php }?>
                        </div>
                        <div class="headerarea__offcavas__contact__inner">
                            <?php if(isset($bastun_redux_demo['title_social_offcavas']) && $bastun_redux_demo['title_social_offcavas'] != ''){?>
                            <h5 class="title"><?php echo esc_html($bastun_redux_demo['title_social_offcavas']);?></h5>
                            <?php }?>
                            <div class="headerarea__icon headerarea__offcavas__icon">
                                <ul>
                                    <?php if(isset($bastun_redux_demo['facebook']) && $bastun_redux_demo['facebook'] != ''){?>
                                    <li>
                                        <a href="<?php echo esc_attr($bastun_redux_demo['facebook']);?>"><i class="icofont-facebook"></i></a>
                                    </li>
                                    <?php } ?>
                                    <?php if(isset($bastun_redux_demo['twitter']) && $bastun_redux_demo['twitter'] != ''){?>
                                    <li>
                                        <a href="<?php echo esc_attr($bastun_redux_demo['twitter']);?>"><i class="icofont-twitter"></i></a>
                                    </li>
                                    <?php } ?>
                                    <?php if(isset($bastun_redux_demo['skype']) && $bastun_redux_demo['skype'] != ''){?>
                                    <li>
                                        <a href="<?php echo esc_attr($bastun_redux_demo['skype']);?>"><i class="icofont-skype"></i></a>
                                    </li>
                                    <?php } ?>
                                    <?php if(isset($bastun_redux_demo['linkedin']) && $bastun_redux_demo['linkedin'] != ''){?>
                                    <li>
                                        <a href="<?php echo esc_attr($bastun_redux_demo['linkedin']);?>"><i class="icofont-linkedin"></i></a>
                                    </li>
                                    <?php } ?>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="theme__shadow__circle theme__shadow__circle--2"></div>
        <div class="theme__shadow__circle theme__shadow__circle--2 shadow__right"></div>
    </div>