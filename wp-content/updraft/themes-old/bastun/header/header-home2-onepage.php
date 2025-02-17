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
<?php if(isset($bastun_redux_demo['dark']) && $bastun_redux_demo['light'] != ''){?>
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
<main class="main_wrapper overflow-hidden woocommerce">
    <header>
        <div class="headerarea headerarea--2 headerarea__transparent headerarea__display__none header__sticky">
            <div class="header__topbar desktop__menu__wrapper">
                <div class="container">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <div class="header__topbar__left">
                                <ul>
                                    <?php if(isset($bastun_redux_demo['header_phone']) && $bastun_redux_demo['header_phone'] != ''){?>
                                    <li>
                                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1212_633)">
                                            <path d="M17.3866 13.6282C16.9362 13.1592 16.3929 12.9084 15.8171 12.9084C15.246 12.9084 14.6981 13.1545 14.2291 13.6235L12.7619 15.0861C12.6412 15.0211 12.5204 14.9608 12.4043 14.9004C12.2372 14.8168 12.0793 14.7379 11.9447 14.6543C10.5703 13.7814 9.32123 12.6438 8.12327 11.1719C7.54287 10.4382 7.15283 9.82069 6.8696 9.19385C7.25034 8.8456 7.60323 8.48343 7.94683 8.13518C8.07684 8.00517 8.20685 7.87052 8.33686 7.74051C9.31194 6.76543 9.31194 5.50246 8.33686 4.52738L7.06925 3.25977C6.92531 3.11583 6.77673 2.96725 6.63743 2.81866C6.35884 2.53078 6.06631 2.23361 5.7645 1.95502C5.31411 1.50927 4.77549 1.27246 4.20901 1.27246C3.64254 1.27246 3.09463 1.50927 2.63031 1.95502C2.62566 1.95966 2.62566 1.95966 2.62102 1.96431L1.04232 3.55694C0.44798 4.15128 0.109023 4.87562 0.0347313 5.71605C-0.0767067 7.07188 0.322613 8.33485 0.629067 9.16134C1.38127 11.1904 2.50494 13.071 4.18115 15.0861C6.2149 17.5146 8.66189 19.4322 11.4571 20.7834C12.5251 21.2895 13.9506 21.8885 15.5432 21.9906C15.6407 21.9953 15.7428 21.9999 15.8357 21.9999C16.9083 21.9999 17.8091 21.6145 18.5149 20.8484C18.5195 20.8391 18.5288 20.8345 18.5334 20.8252C18.7749 20.5327 19.0535 20.268 19.346 19.9848C19.5457 19.7944 19.75 19.5947 19.9496 19.3858C20.4093 18.9075 20.6508 18.3503 20.6508 17.7792C20.6508 17.2035 20.4047 16.6509 19.9357 16.1866L17.3866 13.6282ZM19.0488 18.5175C19.0442 18.5175 19.0442 18.5221 19.0488 18.5175C18.8678 18.7125 18.682 18.889 18.4824 19.084C18.1806 19.3719 17.8741 19.6737 17.5862 20.0126C17.1172 20.5141 16.5647 20.7509 15.8404 20.7509C15.7707 20.7509 15.6964 20.7509 15.6268 20.7463C14.2477 20.658 12.9662 20.1194 12.005 19.6597C9.37695 18.3875 7.06925 16.5813 5.15159 14.2921C3.56824 12.3838 2.50958 10.6193 1.80845 8.72488C1.37663 7.56871 1.21876 6.66792 1.28841 5.8182C1.33484 5.27494 1.54379 4.82455 1.92918 4.43916L3.51253 2.85581C3.74004 2.64222 3.98149 2.52614 4.2183 2.52614C4.51082 2.52614 4.74763 2.70258 4.89621 2.85117C4.90086 2.85581 4.9055 2.86045 4.91014 2.8651C5.19338 3.12976 5.46269 3.40371 5.74593 3.69624C5.88987 3.84482 6.03845 3.99341 6.18704 4.14663L7.45464 5.41424C7.94683 5.90643 7.94683 6.36146 7.45464 6.85365C7.31999 6.9883 7.18998 7.12296 7.05533 7.25297C6.66529 7.65229 6.29383 8.02375 5.88987 8.38592C5.88058 8.39521 5.8713 8.39985 5.86665 8.40914C5.46733 8.80846 5.54163 9.19849 5.6252 9.46315C5.62985 9.47708 5.63449 9.49101 5.63913 9.50494C5.9688 10.3036 6.43313 11.0558 7.1389 11.9519L7.14355 11.9566C8.42508 13.5353 9.77627 14.7657 11.2668 15.7083C11.4571 15.8291 11.6521 15.9266 11.8379 16.0194C12.005 16.103 12.1629 16.1819 12.2976 16.2655C12.3161 16.2748 12.3347 16.2887 12.3533 16.298C12.5111 16.377 12.6597 16.4141 12.813 16.4141C13.1983 16.4141 13.4398 16.1727 13.5187 16.0937L15.1067 14.5057C15.2646 14.3479 15.5153 14.1575 15.8079 14.1575C16.0957 14.1575 16.3325 14.3386 16.4765 14.4964C16.4811 14.5011 16.4811 14.5011 16.4858 14.5057L19.0442 17.0642C19.5225 17.5378 19.5225 18.0253 19.0488 18.5175Z" fill="url(#paint0_linear_1212_633)"/>
                                            <path d="M11.889 5.23324C13.1055 5.43755 14.2106 6.01331 15.0929 6.89553C15.9751 7.77774 16.5462 8.88284 16.7551 10.0994C16.8062 10.4058 17.0709 10.6194 17.3727 10.6194C17.4098 10.6194 17.4423 10.6148 17.4795 10.6101C17.8231 10.5544 18.0506 10.2294 17.9949 9.88578C17.7442 8.41387 17.0477 7.07197 15.9844 6.00867C14.9211 4.94536 13.5792 4.24887 12.1072 3.99814C11.7636 3.94242 11.4433 4.16994 11.3829 4.5089C11.3225 4.84785 11.5454 5.17752 11.889 5.23324Z" fill="url(#paint1_linear_1212_633)"/>
                                            <path d="M21.974 9.70466C21.5607 7.28089 20.4185 5.07534 18.6633 3.32019C16.9082 1.56505 14.7026 0.422806 12.2789 0.0095565C11.9399 -0.0508058 11.6195 0.181357 11.5592 0.520314C11.5034 0.863915 11.731 1.1843 12.0746 1.24466C14.2383 1.61148 16.2117 2.63764 17.7811 4.20241C19.3505 5.77183 20.3721 7.74521 20.7389 9.90897C20.7899 10.2154 21.0546 10.429 21.3564 10.429C21.3936 10.429 21.4261 10.4244 21.4632 10.4197C21.8022 10.3686 22.0343 10.0436 21.974 9.70466Z" fill="url(#paint2_linear_1212_633)"/>
                                            </g>
                                            <defs>
                                            <linearGradient id="paint0_linear_1212_633" x1="0.015625" y1="13.423" x2="20.6508" y2="13.423" gradientUnits="userSpaceOnUse">
                                            <stop offset="0.479167" stop-color="#00229E"/>
                                            <stop offset="0.479167" stop-color="#6E1299"/>
                                            <stop offset="1" stop-color="#FE0094"/>
                                            </linearGradient>
                                            <linearGradient id="paint1_linear_1212_633" x1="11.373" y1="7.8761" x2="18.0033" y2="7.8761" gradientUnits="userSpaceOnUse">
                                            <stop offset="0.479167" stop-color="#00229E"/>
                                            <stop offset="0.479167" stop-color="#6E1299"/>
                                            <stop offset="1" stop-color="#FE0094"/>
                                            </linearGradient>
                                            <linearGradient id="paint2_linear_1212_633" x1="11.5508" y1="6.11356" x2="21.9835" y2="6.11356" gradientUnits="userSpaceOnUse">
                                            <stop offset="0.479167" stop-color="#00229E"/>
                                            <stop offset="0.479167" stop-color="#6E1299"/>
                                            <stop offset="1" stop-color="#FE0094"/>
                                            </linearGradient>
                                            <clipPath id="clip0_1212_633">
                                            <rect width="22" height="22" fill="white"/>
                                            </clipPath>
                                            </defs>
                                            </svg>
                                            
                                        <?php echo esc_attr($bastun_redux_demo['header_phone']);?>
                                    </li>
                                    <?php }?>
                                    <?php if(isset($bastun_redux_demo['header_mail']) && $bastun_redux_demo['header_mail'] != ''){?>
                                    <li>
                                        <svg width="25" height="25" viewBox="0 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <g clip-path="url(#clip0_1212_606)">
                                            <path d="M18.9853 8.26401C18.7954 8.07261 18.4862 8.07134 18.2948 8.26123C18.1034 8.45117 18.1021 8.76035 18.292 8.9518L18.295 8.95483C18.39 9.05068 18.5146 9.09844 18.6394 9.09844C18.7638 9.09844 18.8884 9.05088 18.984 8.95605C19.1755 8.76611 19.1752 8.45547 18.9853 8.26401Z" fill="url(#paint0_linear_1212_606)"/>
                                            <path d="M24.8564 14.1356L20.3214 9.60054C20.1307 9.40991 19.8215 9.40991 19.6308 9.60054C19.4401 9.79121 19.4401 10.1004 19.6308 10.2911L23.231 13.8913H14.6458C13.9336 13.8913 13.3542 13.3119 13.3542 12.5997V4.01455L16.83 7.49024C17.0206 7.68086 17.3298 7.68086 17.5205 7.49024C17.7112 7.29956 17.7112 6.99038 17.5205 6.79966L13.1099 2.38906C12.9192 2.19844 12.61 2.19844 12.4194 2.38906L4.63519 10.1734C4.44452 10.3641 4.44452 10.6732 4.63519 10.864L16.3817 22.6105C16.4733 22.702 16.5975 22.7535 16.727 22.7535C16.8565 22.7535 16.9807 22.702 17.0723 22.6105L24.8565 14.8262C24.948 14.7346 24.9995 14.6104 24.9995 14.4809C24.9994 14.3514 24.948 14.2272 24.8564 14.1356ZM12.3778 3.81187V10.0304H6.15922L12.3778 3.81187ZM16.2387 21.0863L6.15922 11.0069H12.3778V12.5997C12.3778 13.8503 13.3953 14.8678 14.6459 14.8678H16.2387V21.0863ZM17.2152 21.0864V14.8678H23.4337L17.2152 21.0864Z" fill="url(#paint1_linear_1212_606)"/>
                                            <path d="M3.35112 12.4023H0.488281C0.218604 12.4023 0 12.621 0 12.8906C0 13.1603 0.218604 13.3789 0.488281 13.3789H3.35112C3.6208 13.3789 3.8394 13.1603 3.8394 12.8906C3.8394 12.621 3.6208 12.4023 3.35112 12.4023Z" fill="url(#paint2_linear_1212_606)"/>
                                            <path d="M4.80615 12.4023H4.79883C4.52915 12.4023 4.31055 12.621 4.31055 12.8906C4.31055 13.1603 4.52915 13.3789 4.79883 13.3789H4.80615C5.07583 13.3789 5.29443 13.1603 5.29443 12.8906C5.29443 12.621 5.07583 12.4023 4.80615 12.4023Z" fill="url(#paint3_linear_1212_606)"/>
                                            <path d="M2.05093 7.27539H0.488281C0.218604 7.27539 0 7.49404 0 7.76367C0 8.0333 0.218604 8.25195 0.488281 8.25195H2.05093C2.32061 8.25195 2.53921 8.0333 2.53921 7.76367C2.53921 7.49404 2.32061 7.27539 2.05093 7.27539Z" fill="url(#paint4_linear_1212_606)"/>
                                            <path d="M5.49355 7.27539H3.64648C3.37681 7.27539 3.1582 7.49404 3.1582 7.76367C3.1582 8.0333 3.37681 8.25195 3.64648 8.25195H5.49355C5.76323 8.25195 5.98184 8.0333 5.98184 7.76367C5.98184 7.49404 5.76323 7.27539 5.49355 7.27539Z" fill="url(#paint5_linear_1212_606)"/>
                                            <path d="M6.55659 15.0879H3.82227C3.55259 15.0879 3.33398 15.3065 3.33398 15.5762C3.33398 15.8458 3.55259 16.0645 3.82227 16.0645H6.55659C6.82627 16.0645 7.04487 15.8458 7.04487 15.5762C7.04487 15.3065 6.82622 15.0879 6.55659 15.0879Z" fill="url(#paint6_linear_1212_606)"/>
                                            <path d="M8.69136 18.2129H1.80664C1.53696 18.2129 1.31836 18.4315 1.31836 18.7012C1.31836 18.9708 1.53696 19.1895 1.80664 19.1895H8.69136C8.96103 19.1895 9.17964 18.9708 9.17964 18.7012C9.17964 18.4315 8.96103 18.2129 8.69136 18.2129Z" fill="url(#paint7_linear_1212_606)"/>
                                            </g>
                                            <defs>
                                            <linearGradient id="paint0_linear_1212_606" x1="18.1504" y1="8.69341" x2="19.1277" y2="8.69341" gradientUnits="userSpaceOnUse">
                                            <stop offset="0.479167" stop-color="#00229E"/>
                                            <stop offset="0.479167" stop-color="#6E1299"/>
                                            <stop offset="1" stop-color="#FE0094"/>
                                            </linearGradient>
                                            <linearGradient id="paint1_linear_1212_606" x1="4.49219" y1="14.2677" x2="24.9995" y2="14.2677" gradientUnits="userSpaceOnUse">
                                            <stop offset="0.479167" stop-color="#00229E"/>
                                            <stop offset="0.479167" stop-color="#6E1299"/>
                                            <stop offset="1" stop-color="#FE0094"/>
                                            </linearGradient>
                                            <linearGradient id="paint2_linear_1212_606" x1="7.84023e-09" y1="12.9748" x2="3.8394" y2="12.9748" gradientUnits="userSpaceOnUse">
                                            <stop offset="0.479167" stop-color="#00229E"/>
                                            <stop offset="0.479167" stop-color="#6E1299"/>
                                            <stop offset="1" stop-color="#FE0094"/>
                                            </linearGradient>
                                            <linearGradient id="paint3_linear_1212_606" x1="4.31055" y1="12.9748" x2="5.29443" y2="12.9748" gradientUnits="userSpaceOnUse">
                                            <stop offset="0.479167" stop-color="#00229E"/>
                                            <stop offset="0.479167" stop-color="#6E1299"/>
                                            <stop offset="1" stop-color="#FE0094"/>
                                            </linearGradient>
                                            <linearGradient id="paint4_linear_1212_606" x1="5.18517e-09" y1="7.84786" x2="2.53921" y2="7.84786" gradientUnits="userSpaceOnUse">
                                            <stop offset="0.479167" stop-color="#00229E"/>
                                            <stop offset="0.479167" stop-color="#6E1299"/>
                                            <stop offset="1" stop-color="#FE0094"/>
                                            </linearGradient>
                                            <linearGradient id="paint5_linear_1212_606" x1="3.1582" y1="7.84786" x2="5.98184" y2="7.84786" gradientUnits="userSpaceOnUse">
                                            <stop offset="0.479167" stop-color="#00229E"/>
                                            <stop offset="0.479167" stop-color="#6E1299"/>
                                            <stop offset="1" stop-color="#FE0094"/>
                                            </linearGradient>
                                            <linearGradient id="paint6_linear_1212_606" x1="3.33398" y1="15.6604" x2="7.04487" y2="15.6604" gradientUnits="userSpaceOnUse">
                                            <stop offset="0.479167" stop-color="#00229E"/>
                                            <stop offset="0.479167" stop-color="#6E1299"/>
                                            <stop offset="1" stop-color="#FE0094"/>
                                            </linearGradient>
                                            <linearGradient id="paint7_linear_1212_606" x1="1.31836" y1="18.7854" x2="9.17964" y2="18.7854" gradientUnits="userSpaceOnUse">
                                            <stop offset="0.479167" stop-color="#00229E"/>
                                            <stop offset="0.479167" stop-color="#6E1299"/>
                                            <stop offset="1" stop-color="#FE0094"/>
                                            </linearGradient>
                                            <clipPath id="clip0_1212_606">
                                            <rect width="25" height="25" fill="white"/>
                                            </clipPath>
                                            </defs>
                                            </svg>
                                            
                                        <?php echo esc_attr($bastun_redux_demo['header_mail']);?>
                                    </li>
                                    <?php }?>
                                </ul>
                            </div>
                        </div>
                        <?php if(isset($bastun_redux_demo['header_address']) && $bastun_redux_demo['header_address'] != ''){?>
                        <div class="col-xl-6 col-lg-6">
                            <div class="header__topbar__right">
                                <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                                    <path d="M17.5797 2.72534C15.8223 0.967873 13.4856 0 11.0002 0C8.51481 0 6.17808 0.967873 4.42065 2.72534C2.66319 4.48285 1.69531 6.8195 1.69531 9.30486C1.69531 14.3327 6.4493 18.5147 9.00332 20.7613C9.35825 21.0735 9.66474 21.3432 9.90893 21.5713C10.2149 21.857 10.6076 22 11.0002 22C11.3929 22 11.7855 21.857 12.0915 21.5713C12.3356 21.3431 12.6421 21.0735 12.9971 20.7613C15.5511 18.5146 20.3051 14.3327 20.3051 9.30486C20.305 6.8195 19.3372 4.48285 17.5797 2.72534ZM12.1458 19.7938C11.7831 20.1128 11.4699 20.3884 11.2117 20.6296C11.0931 20.7403 10.9073 20.7403 10.7886 20.6296C10.5304 20.3883 10.2171 20.1128 9.85445 19.7937C7.45335 17.6816 2.98395 13.75 2.98395 9.3049C2.98395 4.88478 6.57997 1.28876 11.0001 1.28876C15.4202 1.28876 19.0163 4.88478 19.0163 9.3049C19.0163 13.75 14.5469 17.6816 12.1458 19.7938Z" fill="url(#paint0_linear_1212_598)"/>
                                    <path d="M11.0009 4.85254C8.73989 4.85254 6.90039 6.69199 6.90039 8.95305C6.90039 11.2141 8.73989 13.0536 11.0009 13.0536C13.262 13.0536 15.1015 11.2141 15.1015 8.95305C15.1015 6.69199 13.262 4.85254 11.0009 4.85254ZM11.0009 11.7648C9.45051 11.7648 8.18911 10.5034 8.18911 8.95301C8.18911 7.40261 9.45051 6.14122 11.0009 6.14122C12.5514 6.14122 13.8127 7.40261 13.8127 8.95301C13.8127 10.5034 12.5514 11.7648 11.0009 11.7648Z" fill="url(#paint1_linear_1212_598)"/>
                                    <defs>
                                    <linearGradient id="paint0_linear_1212_598" x1="1.69531" y1="12.8965" x2="20.3051" y2="12.8965" gradientUnits="userSpaceOnUse">
                                    <stop offset="0.479167" stop-color="#00229E"/>
                                    <stop offset="0.479167" stop-color="#6E1299"/>
                                    <stop offset="1" stop-color="#FE0094"/>
                                    </linearGradient>
                                    <linearGradient id="paint1_linear_1212_598" x1="6.90039" y1="9.66004" x2="15.1015" y2="9.66004" gradientUnits="userSpaceOnUse">
                                    <stop offset="0.479167" stop-color="#00229E"/>
                                    <stop offset="0.479167" stop-color="#6E1299"/>
                                    <stop offset="1" stop-color="#FE0094"/>
                                    </linearGradient>
                                    </defs>
                                    </svg>
                                    
                                <p><?php echo esc_html($bastun_redux_demo['header_address']);?></p>
                            </div>
                        </div>
                        <?php }?>
                    </div>
                </div>
            </div>

            <div class="container desktop__menu__wrapper">
                <div class="headerarea__main__wrapper headerarea__main__wrapper--2 position-relative">
                    <div class="headerarea__component__wrap">
                        <?php if(isset($bastun_redux_demo['logo']['url']) && $bastun_redux_demo['logo']['url'] != ''){?>
                        <div class="headerarea__component">
                            <div class="headerarea__logo">
                                <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url($bastun_redux_demo['logo']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>"></a>
                            </div>
                        </div>
                        <?php }else{ ?>
                        <div class="headerarea__component">
                            <div class="headerarea__logo">
                                <a href="<?php echo esc_url(home_url('/')); ?>"><img src="<?php echo esc_url(get_template_directory_uri());?>/img/logo/Logo_1.png" alt="<?php bloginfo( 'name' ); ?>"></a>
                            </div>
                        </div>
                        <?php } ?>
                        <div class="headerarea__component">
                            <div class="headerarea__main__menu">
                                <nav>
                                    <?php 
                                      wp_nav_menu( 
                                          array( 
                                              'theme_location' => 'onepage_home2',
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
                                              'items_wrap'      => '<ul class=" %2$s " >%3$s</ul>',
                                              'depth'           => 0,        
                                          )
                                      ); ?>
                                </nav>
                            </div>
                        </div>
                        <div class="headerarea__component">
                            <div class="headerarea__right">
                                <?php if(isset($bastun_redux_demo['cart']) && $bastun_redux_demo['cart']==1){ ?>
                                <div class="headerarea__cart__wraper">
                                    <div class="headerarea__cart__icon">
                                        <a href="#"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M7.5 7.67001V6.70001C7.5 4.45001 9.31 2.24001 11.56 2.03001C14.24 1.77001 16.5 3.88001 16.5 6.51001V7.89001" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M9.0008 22H15.0008C19.0208 22 19.7408 20.39 19.9508 18.43L20.7008 12.43C20.9708 9.99 20.2708 8 16.0008 8H8.0008C3.7308 8 3.0308 9.99 3.3008 12.43L4.0508 18.43C4.2608 20.39 4.9808 22 9.0008 22Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M15.4945 12H15.5035" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            <path d="M8.49451 12H8.50349" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                            </svg></a>
                                            <div class="headerarea__cart__border__dot"></div>
                                    </div>

                                    <div class="headerarea__cart__dropdown__wrapper">
										<?php if ( ! WC()->cart->is_empty() ) : ?>
                                        <div class="headerarea__cart__dropdown__inner">
                                            <?php
                                            do_action( 'woocommerce_before_mini_cart_contents' );

                                            foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                                $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                                $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                                if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                                    /**
                                                     * This filter is documented in woocommerce/templates/cart/cart.php.
                                                     *
                                                     * @since 2.1.0
                                                     */
                                                    $product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
                                                    $thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                                    $product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                                    $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                                    ?>
                                                    <li class="headerarea__cart__single__dropdown woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
                                                    <div class="headerarea__cart__single__dropdown__img">
                                                        <?php if ( empty( $product_permalink ) ) : ?>
                                                            <a href="<?php echo esc_url( $product_permalink ); ?>">
                                                                <?php echo wp_kses_post( $thumbnail ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                                            </a>
                                                        <?php else : ?>
                                                            <a href="<?php echo esc_url( $product_permalink ); ?>">
                                                                <?php echo wp_kses_post( $thumbnail ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                                            </a>
                                                        <?php endif; ?>
                                                        
                                                    </div>
                                                    <div class="headerarea__cart__single__dropdown__content">
                                                        <a href="<?php echo esc_url( $product_permalink ); ?>">
                                                            <?php echo wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                                            
                                                        </a>
                                                        <p><?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                                        <span class="price"><?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
                                                        </p>

                                                    </div>
                                                    <div class="headerarea__cart__single__dropdown__close ">
                                                        <?php
                                                            echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                                                'woocommerce_cart_item_remove_link',
                                                                sprintf(
                                                                    '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="icofont-close-line"></i></a>',
                                                                    esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                                    /* translators: %s is the product name */
                                                                    esc_attr( sprintf( __( 'Remove %s from cart', 'bastun' ), wp_strip_all_tags( $product_name ) ) ),
                                                                    esc_attr( $product_id ),
                                                                    esc_attr( $_product->get_sku() )
                                                                ),
                                                                $cart_item_key
                                                            );
                                                        ?>
                                                    </div>

                                                    
                                                    </li>
                                                    <?php
                                                }
                                            }

                                            do_action( 'woocommerce_mini_cart_contents' );
                                            ?>
                                        </div>
                                        <?php endif; ?>
                                        <p class="headerarea__cart__dropdown__price">
												<?php
												esc_html_e( 'Total:', 'bastun' ); 
												?>
												<?php wc_cart_totals_order_total_html(); ?>
                                        </p>
                                        <div class="headerarea__cart__dropdown__button">
                                            <?php if ((isset($bastun_redux_demo['mini-cart-link-1'])) && ('' != $bastun_redux_demo['mini-cart-link-1']) && (isset($bastun_redux_demo['mini-cart-btn-1'])) && ('' != $bastun_redux_demo['mini-cart-btn-1'])): ?>
                                                <a href="<?php echo esc_attr(($bastun_redux_demo['mini-cart-link-1']));?>" class="default__button btn__blue">
                                                    <?php echo esc_attr(($bastun_redux_demo['mini-cart-btn-1']));?>
                                                </a>
                                            <?php endif; ?>
                                            <?php if ((isset($bastun_redux_demo['mini-cart-link-2'])) && ('' != $bastun_redux_demo['mini-cart-link-2']) && (isset($bastun_redux_demo['mini-cart-btn-2'])) && ('' != $bastun_redux_demo['mini-cart-btn-2'])): ?>
                                                <a href="<?php echo esc_attr(($bastun_redux_demo['mini-cart-link-2']));?>" class="default__button">
                                                    <?php echo esc_attr(($bastun_redux_demo['mini-cart-btn-2']));?>
                                                </a>
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                                <?php }?>
                                <?php if(isset($bastun_redux_demo['button']) && $bastun_redux_demo['button'] != ''){?>
                                <div class="headerarea__button">
                                    <a class="default__button btn__white" href="<?php echo esc_attr($bastun_redux_demo['link_button']);?>"><?php echo esc_html($bastun_redux_demo['button']);?></a>
                                </div>
                                <?php }?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mob_menu_wrapper container-fluid">
                <div class="d-flex justify-content-between align-items-center">
                    <div class="offcanvas__header--menu__open ">
                        <a class="offcanvas__header--menu__open--btn" href="javascript:void(0)" data-offcanvas>
                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon offcanvas__header--menu__open--svg" viewBox="0 0 512 512"><path fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 160h352M80 256h352M80 352h352"/></svg>
                            <span class="visually-hidden"><?php echo esc_html__( 'Offcanvas Menu Open', 'bastun' ); ?></span>
                        </a>
                    </div>
                    <?php if(isset($bastun_redux_demo['logo']['url']) && $bastun_redux_demo['logo']['url'] != ''){?>
                    <div class="mobile__log">
                        <div class="mobile__log--title"><a class="mobile__log--link" href="<?php echo esc_url(home_url('/')); ?>">
                            <img class="mobile__log--img" src="<?php echo esc_url($bastun_redux_demo['logo']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>">
                        </a></div>
                    </div>
                    <?php }else{ ?>
                    <div class="mobile__log">
                        <div class="mobile__log--title"><a class="mobile__log--link" href="<?php echo esc_url(home_url('/')); ?>">
                            <img class="mobile__log--img" src="<?php echo esc_url(get_template_directory_uri());?>/img/logo/Logo_1.png" alt="<?php bloginfo( 'name' ); ?>">
                        </a></div>
                    </div>
                    <?php } ?>

                    <div class="headerarea__component mobile__component__right">
                        <div class="headerarea__right">
                            <?php if(isset($bastun_redux_demo['cart']) && $bastun_redux_demo['cart']==1){ ?>
                            <div class="headerarea__cart__wraper">
                                <div class="headerarea__cart__icon">
                                    <a href="#"><svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M7.5 7.67001V6.70001C7.5 4.45001 9.31 2.24001 11.56 2.03001C14.24 1.77001 16.5 3.88001 16.5 6.51001V7.89001" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M9.0008 22H15.0008C19.0208 22 19.7408 20.39 19.9508 18.43L20.7008 12.43C20.9708 9.99 20.2708 8 16.0008 8H8.0008C3.7308 8 3.0308 9.99 3.3008 12.43L4.0508 18.43C4.2608 20.39 4.9808 22 9.0008 22Z" stroke="white" stroke-width="1.5" stroke-miterlimit="10" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M15.4945 12H15.5035" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        <path d="M8.49451 12H8.50349" stroke="white" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                                        </svg></a>
                                        <div class="headerarea__cart__border__dot"></div>
                                </div>
                                <div class="headerarea__cart__dropdown__wrapper">
									<?php if ( ! WC()->cart->is_empty() ) : ?>
                                    <div class="headerarea__cart__dropdown__inner">
                                        <?php
                                        do_action( 'woocommerce_before_mini_cart_contents' );

                                        foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                            $_product   = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                            $product_id = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                            if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {
                                                /**
                                                 * This filter is documented in woocommerce/templates/cart/cart.php.
                                                 *
                                                 * @since 2.1.0
                                                 */
                                                $product_name      = apply_filters( 'woocommerce_cart_item_name', $_product->get_name(), $cart_item, $cart_item_key );
                                                $thumbnail         = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                                $product_price     = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                                $product_permalink = apply_filters( 'woocommerce_cart_item_permalink', $_product->is_visible() ? $_product->get_permalink( $cart_item ) : '', $cart_item, $cart_item_key );
                                                ?>
                                                <li class="headerarea__cart__single__dropdown woocommerce-mini-cart-item <?php echo esc_attr( apply_filters( 'woocommerce_mini_cart_item_class', 'mini_cart_item', $cart_item, $cart_item_key ) ); ?>">
                                                <div class="headerarea__cart__single__dropdown__img">
                                                    <?php if ( empty( $product_permalink ) ) : ?>
                                                        <a href="<?php echo esc_url( $product_permalink ); ?>">
                                                            <?php echo wp_kses_post( $thumbnail ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                                        </a>
                                                    <?php else : ?>
                                                        <a href="<?php echo esc_url( $product_permalink ); ?>">
                                                            <?php echo wp_kses_post( $thumbnail ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                                        </a>
                                                    <?php endif; ?>
                                                    
                                                </div>
                                                <div class="headerarea__cart__single__dropdown__content">
                                                    <a href="<?php echo esc_url( $product_permalink ); ?>">
                                                        <?php echo wp_kses_post( $product_name ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                                        
                                                    </a>
                                                    <p><?php echo wc_get_formatted_cart_item_data( $cart_item ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
                                                    <span class="price"><?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?></span>
                                                    </p>

                                                </div>
                                                <div class="headerarea__cart__single__dropdown__close ">
                                                    <?php
                                                        echo apply_filters( // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                                                            'woocommerce_cart_item_remove_link',
                                                            sprintf(
                                                                '<a href="%s" class="remove" aria-label="%s" data-product_id="%s" data-product_sku="%s"><i class="icofont-close-line"></i></a>',
                                                                esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                                /* translators: %s is the product name */
                                                                esc_attr( sprintf( __( 'Remove %s from cart', 'bastun' ), wp_strip_all_tags( $product_name ) ) ),
                                                                esc_attr( $product_id ),
                                                                esc_attr( $_product->get_sku() )
                                                            ),
                                                            $cart_item_key
                                                        );
                                                    ?>
                                                </div>

                                                
                                                </li>
                                                <?php
                                            }
                                        }

                                        do_action( 'woocommerce_mini_cart_contents' );
                                        ?>
                                    </div>

                                    <?php endif; ?>
                                        <p class="headerarea__cart__dropdown__price">
												<?php
												esc_html_e( 'Total:', 'bastun' ); 
												?>
												<?php wc_cart_totals_order_total_html(); ?>
                                        </p>
                                    <div class="headerarea__cart__dropdown__button">
                                        <?php if ((isset($bastun_redux_demo['mini-cart-link-1'])) && ('' != $bastun_redux_demo['mini-cart-link-1']) && (isset($bastun_redux_demo['mini-cart-btn-1'])) && ('' != $bastun_redux_demo['mini-cart-btn-1'])): ?>
                                            <a href="<?php echo esc_attr(($bastun_redux_demo['mini-cart-link-1']));?>" class="default__button btn__blue">
                                                <?php echo esc_attr(($bastun_redux_demo['mini-cart-btn-1']));?>
                                            </a>
                                        <?php endif; ?>
                                        <?php if ((isset($bastun_redux_demo['mini-cart-link-2'])) && ('' != $bastun_redux_demo['mini-cart-link-2']) && (isset($bastun_redux_demo['mini-cart-btn-2'])) && ('' != $bastun_redux_demo['mini-cart-btn-2'])): ?>
                                            <a href="<?php echo esc_attr(($bastun_redux_demo['mini-cart-link-2']));?>" class="default__button">
                                                <?php echo esc_attr(($bastun_redux_demo['mini-cart-btn-2']));?>
                                            </a>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                            <?php }?>
                            <?php if(isset($bastun_redux_demo['button_mobile']) && $bastun_redux_demo['button_mobile'] != ''){?>
                            <div class="headerarea__button">
                                <a class="default__button" href="<?php echo esc_attr($bastun_redux_demo['link_button_mobile']);?>"><?php echo esc_html($bastun_redux_demo['button_mobile']);?></a>
                            </div>
                            <?php }?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
<div class="offcanvas__header">
    <div class="offcanvas__inner">
        <?php if(isset($bastun_redux_demo['logo2']['url']) && $bastun_redux_demo['logo2']['url'] != ''){?>
        <div class="offcanvas__logo">
            <a class="offcanvas__logo_link" href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo esc_url($bastun_redux_demo['logo2']['url']); ?>" alt="<?php bloginfo( 'name' ); ?>">
            </a>
            <button class="offcanvas__close--btn" data-offcanvas><?php echo esc_html__( 'Close', 'bastun' ); ?></button>
        </div>
        <?php }else{ ?>
        <div class="offcanvas__logo">
            <a class="offcanvas__logo_link" href="<?php echo esc_url(home_url('/')); ?>">
                <img src="<?php echo esc_url(get_template_directory_uri());?>/img/logo/Logo_2.png" alt="<?php bloginfo( 'name' ); ?>">
            </a>
            <button class="offcanvas__close--btn" data-offcanvas><?php echo esc_html__( 'Close', 'bastun' ); ?></button>
        </div>
        <?php } ?>
        <nav class="offcanvas__menu">
            <?php 
                wp_nav_menu( 
                  array( 
                      'theme_location' => 'onepage_home2',
                      'container' => '',
                      'menu_class' => '', 
                      'menu_id' => '',
                      'menu'            => '',
                      'container_class' => '',
                      'container_id'    => '',
                      'echo'            => true,
                      'fallback_cb'       => 'wp_bootstrap_navwalker::fallback',
                      'walker'            => new bastun4_wp_bootstrap_navwalker(),
                      'before'          => '',
                      'after'           => '',
                      'link_before'     => '',
                      'link_after'      => '',
                      'items_wrap'      => '<ul class="offcanvas__menu_ul %2$s " >%3$s</ul>',
                      'depth'           => 0,        
                  )
            ); ?>
            <?php if(isset($bastun_redux_demo['login_mobile']) && $bastun_redux_demo['login_mobile'] != ''){?>
            <div class="offcanvas__account--items">
                <a class="offcanvas__account--items__btn d-flex align-items-center" href="<?php echo esc_attr($bastun_redux_demo['link_login_mobile']);?>">
                    <span class="offcanvas__account--items__icon"> 
                        <svg xmlns="http://www.w3.org/2000/svg"  width="20.51" height="19.443" viewBox="0 0 512 512"><path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg> 
                    </span>
                    <span class="offcanvas__account--items__label"><?php echo esc_html($bastun_redux_demo['login_mobile']);?></span>
                </a>
            </div>
            <?php }?>
        </nav>
    </div>
</div>