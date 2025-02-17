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
        <div class="headerarea headerarea--1 headerarea__transparent header__sticky main__header">
            <div class="container desktop__menu__wrapper">
                <div class="headerarea__main__wrapper position-relative">
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
                                              'theme_location' => 'onepage_home12',
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
                                <?php } ?>
                                <?php if(isset($bastun_redux_demo['button']) && $bastun_redux_demo['button'] != ''){?>
                                <div class="headerarea__button">
                                    <a class="default__button" href="<?php echo esc_attr($bastun_redux_demo['link_button']);?>"><?php echo esc_html($bastun_redux_demo['button']);?></a>
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
                      'theme_location' => 'onepage_home12',
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