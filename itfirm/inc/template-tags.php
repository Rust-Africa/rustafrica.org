<?php
/**
 * Custom template tags for this theme.
 *
 * @package Itfirm
 */

/**
 * Header layout
 **/
function itfirm_page_loading()
{
    $page_loading = itfirm_get_opt( 'show_page_loading', false );
    $loading_type = itfirm_get_opt( 'loading_type', 'style1');
    $logo_loader = itfirm_get_opt( 'logo_loader', array( 'url' => get_template_directory_uri().'/assets/images/logo-loader.gif', 'id' => '' ) );

    $loading_page = itfirm_get_page_opt( 'loading_page', 'themeoption');
    $loading_type_page = itfirm_get_page_opt( 'loading_type', 'style1');

    if($loading_page == 'custom') {
        $loading_type = $loading_type_page;
    }

    if($page_loading) { ?>
        <div id="ct-loadding" class="ct-loader <?php echo esc_attr($loading_type); ?>">
            <?php switch ( $loading_type )
            {
                case 'style-image': ?>
                    <?php if ($logo_loader['url']) { ?>
                        <div class="loading-image">
                            <?php 
                                printf(
                                    '<img src="%3$s" alt="%2$s"/>',
                                    esc_url( home_url( '/' ) ),
                                    esc_attr( get_bloginfo( 'name' ) ),
                                    esc_url( $logo_loader['url'] )
                                );
                            ?>
                        </div>
                    <?php } ?>
                <?php break;

                case 'style2': ?>
                    <div class="ct-spinner2"></div>
                    <?php break;

                case 'style3': ?>
                    <div class="ct-spinner3">
                      <div class="double-bounce1"></div>
                      <div class="double-bounce2"></div>
                    </div>
                    <?php break;

                case 'style4': ?>
                    <div class="ct-spinner4">
                      <div class="rect1"></div>
                      <div class="rect2"></div>
                      <div class="rect3"></div>
                      <div class="rect4"></div>
                      <div class="rect5"></div>
                    </div>
                    <?php break;

                case 'style5': ?>
                    <div class="ct-spinner5">
                      <div class="bounce1"></div>
                      <div class="bounce2"></div>
                      <div class="bounce3"></div>
                    </div>
                    <?php break;

                case 'style6': ?>
                    <div class="ct-cube-grid">
                      <div class="ct-cube ct-cube1"></div>
                      <div class="ct-cube ct-cube2"></div>
                      <div class="ct-cube ct-cube3"></div>
                      <div class="ct-cube ct-cube4"></div>
                      <div class="ct-cube ct-cube5"></div>
                      <div class="ct-cube ct-cube6"></div>
                      <div class="ct-cube ct-cube7"></div>
                      <div class="ct-cube ct-cube8"></div>
                      <div class="ct-cube ct-cube9"></div>
                    </div>
                    <?php break;

                case 'style7': ?>
                    <div class="ct-folding-cube">
                      <div class="ct-cube1 ct-cube"></div>
                      <div class="ct-cube2 ct-cube"></div>
                      <div class="ct-cube4 ct-cube"></div>
                      <div class="ct-cube3 ct-cube"></div>
                    </div>
                    <?php break;

                case 'style8': ?>
                    <div class="ct-loading-stairs">
                        <div class="loader-bar"></div>
                        <div class="loader-bar"></div>
                        <div class="loader-bar"></div>
                        <div class="loader-bar"></div>
                        <div class="loader-bar"></div>
                        <div class="loader-ball"></div>
                    </div>
                    <?php break;

                case 'style9': ?>
                    <div class="ct-dual-ring">
                    </div>
                    <?php break;

                case 'style10': ?>
                    <div class="ct-dot-square">
                    </div>
                    <?php break;

                case 'style11': ?>
                    <div class="loading-spinner">
                    </div>
                    <?php break;

                case 'style12': ?>
                    <div class="loading-ring">
                    </div>
                    <?php break;

                case 'style13': ?>
                    <div class="ct-loading-ito">
                        <div class="item item-1"></div>
                        <div class="item item-2"></div>
                        <div class="item item-3"></div>
                        <div class="item item-4"></div>
                    </div>
                    <?php break;

                default: ?>
                    <div class="loading-spin">
                        <div class="spinner">
                            <div class="right-side"><div class="bar"></div></div>
                            <div class="left-side"><div class="bar"></div></div>
                        </div>
                        <div class="spinner color-2">
                            <div class="right-side"><div class="bar"></div></div>
                            <div class="left-side"><div class="bar"></div></div>
                        </div>
                    </div>
                    <?php break;
            } ?>
        </div>
        <div class="ct-page-loading-bg active"></div>
    <?php }
}

/**
 * Header layout
 **/
function itfirm_header_layout()
{
    if(is_singular('elementor_library')) return;
    
    $header_layout = itfirm_get_opt( 'header_layout', 'df' );

    if($header_layout == 'df') {
        get_template_part( 'template-parts/header-layout', 'df' );
    } else {
        get_template_part( 'template-parts/header-layout', 'elementor' );
    }
}

/**
 * Page title layout
 **/
function itfirm_page_title_layout()
{
    get_template_part( 'template-parts/page-title', '' );
}

/**
 * Footer
 **/
function itfirm_footer()
{
    if(is_singular('elementor_library')) return;

    $footer_layout_custom = itfirm_get_opt('footer_layout_custom');
    if( !class_exists('ReduxFramework') || empty($footer_layout_custom) ) {
        get_template_part( 'template-parts/footer-layout', 'default' );
    } else {
        get_template_part( 'template-parts/footer-layout', 'custom' );
    }
}

/**
 * Set primary content class based on sidebar position
 *
 * @param  string $sidebar_pos
 * @param  string $extra_class
 */
function itfirm_primary_class( $sidebar_pos, $extra_class = '' )
{
    if ( class_exists( 'WooCommerce' ) && (is_product_category()) || class_exists( 'WooCommerce' ) && (is_shop()) ) :
        $sidebar_load = 'sidebar-shop';
    elseif (is_page()) :
        $sidebar_load = 'sidebar-page';
    else :
        $sidebar_load = 'sidebar-blog';
    endif;

    if ( is_active_sidebar( $sidebar_load ) ) {
        $class = array( trim( $extra_class ) );
        switch ( $sidebar_pos )
        {
            case 'left':
                $class[] = 'content-has-sidebar float-right col-xl-9 col-lg-9 col-md-12 col-sm-12';
                break;

            case 'right':
                $class[] = 'content-has-sidebar float-left col-xl-9 col-lg-9 col-md-12 col-sm-12';
                break;

            default:
                $class[] = 'content-full-width col-12';
                break;
        }

        $class = implode( ' ', array_filter( $class ) );

        if ( $class )
        {
            echo ' class="' . esc_attr($class) . '"';
        }
    } else {
        echo ' class="content-area col-12"'; 
    }
}

/**
 * Set secondary content class based on sidebar position
 *
 * @param  string $sidebar_pos
 * @param  string $extra_class
 */
function itfirm_secondary_class( $sidebar_pos, $extra_class = '' )
{
    if ( class_exists( 'WooCommerce' ) && (is_product_category()) ) :
        $sidebar_load = 'sidebar-shop';
    elseif (is_page()) :
        $sidebar_load = 'sidebar-page';
    else :
        $sidebar_load = 'sidebar-blog';
    endif;

    if ( is_active_sidebar( $sidebar_load ) ) {
        $class = array(trim($extra_class));
        switch ($sidebar_pos) {
            case 'left':
                $class[] = 'widget-has-sidebar sidebar-fixed col-xl-3 col-lg-3 col-md-12 col-sm-12';
                break;

            case 'right':
                $class[] = 'widget-has-sidebar sidebar-fixed col-xl-3 col-lg-3 col-md-12 col-sm-12';
                break;

            default:
                break;
        }

        $class = implode(' ', array_filter($class));

        if ($class) {
            echo ' class="' . esc_attr($class) . '"';
        }
    }
}


/**
 * Prints HTML for breadcrumbs.
 */
function itfirm_breadcrumb()
{
    if ( ! class_exists( 'CT_Breadcrumb' ) )
    {
        return;
    }

    $breadcrumb = new CT_Breadcrumb();
    $entries = $breadcrumb->get_entries();

    if ( empty( $entries ) )
    {
        return;
    }

    ob_start();

    foreach ( $entries as $entry )
    {
        $entry = wp_parse_args( $entry, array(
            'label' => '',
            'url'   => ''
        ) );

        if ( empty( $entry['label'] ) )
        {
            continue;
        }

        echo '<li>';

        if ( ! empty( $entry['url'] ) )
        {
            printf(
                '<a class="breadcrumb-entry" href="%1$s">%2$s</a>',
                esc_url( $entry['url'] ),
                esc_attr( $entry['label'] )
            );
        }
        else
        {
            printf( '<span class="breadcrumb-entry" >%s</span>', esc_html( $entry['label'] ) );
        }

        echo '</li>';
    }

    $output = ob_get_clean();

    if ( $output )
    {
        printf( '<ul class="ct-breadcrumb">%s</ul>', wp_kses_post($output));
    }
}


function itfirm_entry_link_pages()
{
    wp_link_pages( array(
        'before'      => '<div class="page-links">',
        'after'       => '</div>',
        'link_before' => '<span>',
        'link_after'  => '</span>',
    ) );
}


if ( ! function_exists( 'itfirm_entry_excerpt' ) ) :
    /**
     * Print post excerpt based on length.
     *
     * @param  integer $length
     */
    function itfirm_entry_excerpt( $length = 55 )
    {
        $ct_the_excerpt = get_the_excerpt();
        if(!empty($ct_the_excerpt)) {
            echo esc_html($ct_the_excerpt);
        } else {
            echo wp_kses_post(itfirm_get_the_excerpt( $length ));
        }
    }
endif;


if(!function_exists('itfirm_ajax_paginate_links')){
    function itfirm_ajax_paginate_links($link){
        $parts = parse_url($link);
        if( !isset($parts['query']) ) return $link;
        parse_str($parts['query'], $query);
        if(isset($query['page']) && !empty($query['page'])){
            return '#' . $query['page'];
        }
        else{
            return '#1';
        }
    }
}

add_action( 'wp_ajax_itfirm_get_pagination_html', 'itfirm_get_pagination_html' );
add_action( 'wp_ajax_nopriv_itfirm_get_pagination_html', 'itfirm_get_pagination_html' );
if(!function_exists('itfirm_get_pagination_html')){
    function itfirm_get_pagination_html(){
        try{
            if(!isset($_POST['query_vars'])){
                throw new Exception(__('Something went wrong while requesting. Please try again!', 'itfirm'));
            }
            $query = new WP_Query($_POST['query_vars']);
            ob_start();
            itfirm_posts_pagination( $query,  true );
            $html = ob_get_clean();
            wp_send_json(
                array(
                    'status' => true,
                    'message' => esc_attr__('Load Successfully!', 'itfirm'),
                    'data' => array(
                        'html' => $html,
                        'query_vars' => $_POST['query_vars'],
                        'post' => $query->have_posts()
                    ),
                )
            );
        }
        catch (Exception $e){
            wp_send_json(array('status' => false, 'message' => $e->getMessage()));
        }
        die;
    }
}

/**
 * Prints posts pagination based on query
 *
 * @param  WP_Query $query     Custom query, if left blank, this will use global query ( current query )
 * @return void
 */
function itfirm_posts_pagination( $query = null, $ajax = false )
{
    if($ajax){
        add_filter('paginate_links', 'itfirm_ajax_paginate_links');
    }

    $classes = array();

    if ( empty( $query ) )
    {
        $query = $GLOBALS['wp_query'];
    }

    if ( empty( $query->max_num_pages ) || ! is_numeric( $query->max_num_pages ) || $query->max_num_pages < 2 )
    {
        return;
    }

    $paged = $query->get( 'paged', '' );

    if ( ! $paged && is_front_page() && ! is_home() )
    {
        $paged = $query->get( 'page', '' );
    }

    $paged = $paged ? intval( $paged ) : 1;

    $pagenum_link = html_entity_decode( get_pagenum_link() );
    $query_args   = array();
    $url_parts    = explode( '?', $pagenum_link );

    if ( isset( $url_parts[1] ) )
    {
        wp_parse_str( $url_parts[1], $query_args );
    }

    $pagenum_link = remove_query_arg( array_keys( $query_args ), $pagenum_link );
    $pagenum_link = trailingslashit( $pagenum_link ) . '%_%';

    $html_prev = '<i class="caseicon-angle-arrow-left"></i>';
    $html_next = '<i class="caseicon-angle-arrow-right"></i>';
    $paginate_links_args = array(
        'base'     => $pagenum_link,
        'total'    => $query->max_num_pages,
        'current'  => $paged,
        'mid_size' => 1,
        'add_args' => array_map( 'urlencode', $query_args ),
        'prev_text' => $html_prev,
        'next_text' => $html_next,
    );
    if($ajax){
        $paginate_links_args['format'] = '?page=%#%';
    }
    $links = paginate_links( $paginate_links_args );
    if ( $links ):
    ?>
    <nav class="ct-posts-pagination <?php echo esc_attr($ajax?'ajax':''); ?>">
        <div class="posts-page-links">
            <?php
                printf($links);
            ?>
        </div>
    </nav>
    <?php
    endif;
}

if ( ! function_exists( 'itfirm_post_meta' ) ) :
    function itfirm_post_meta() {
        $post_category_on = itfirm_get_opt( 'post_category_on', true );
        $post_author_on = itfirm_get_opt( 'post_author_on', true );
        $post_date_on = itfirm_get_opt( 'post_date_on', true );
        if($post_author_on || $post_date_on || $post_category_on) : ?>
            <ul class="entry-meta ct-item-meta">
                <?php if($post_date_on) : ?>
                    <li class="item-date"><i class="caseicon-clock"></i><?php echo get_the_date(); ?></li>
                <?php endif; ?>
                <?php if($post_author_on) : ?>
                    <li class="item-author"><i class="caseicon-user-alt"></i><?php echo esc_html__('By', 'itfirm'); ?>&nbsp;<?php the_author_posts_link(); ?></li>
                <?php endif; ?>
                <?php if($post_category_on) : ?>
                    <li class="item-category"><?php the_terms( get_the_ID(), 'category', '<i class="caseicon-tags-alt"></i>', ', ', '' ); ?></li>
                <?php endif; ?>
            </ul>
        <?php endif; }
endif;

if ( ! function_exists( 'itfirm_archive_meta' ) ) :
    function itfirm_archive_meta() {
        $archive_categories_on = itfirm_get_opt( 'archive_categories_on', true );
        $archive_author_on = itfirm_get_opt( 'archive_author_on', true );
        $archive_date_on = itfirm_get_opt( 'archive_date_on', true );
        if($archive_author_on || $archive_categories_on || $archive_date_on) : ?>
            <ul class="entry-meta ct-item-meta">
                <?php if($archive_date_on) : ?>
                    <li class="item-date"><i class="caseicon-clock"></i><?php echo get_the_date(); ?></li>
                <?php endif; ?>
                <?php if($archive_author_on) : ?>
                    <li class="item-author"><i class="caseicon-user-alt"></i><?php echo esc_html__('By', 'itfirm'); ?>&nbsp;<?php the_author_posts_link(); ?></li>
                <?php endif; ?>
                <?php if($archive_categories_on) : ?>
                    <li class="item-category"><?php the_terms( get_the_ID(), 'category', '<i class="caseicon-tags-alt"></i>', ', ', '' ); ?></li>
                <?php endif; ?>
            </ul>
        <?php endif; }
endif;

/**
 * Prints tag list
 */
if ( ! function_exists( 'itfirm_entry_tagged_in' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function itfirm_entry_tagged_in()
    {
        $tags_list = get_the_tag_list( '<label class="label">'.esc_attr__('Tags:', 'itfirm'). '</label>', ' ' );
        if ( $tags_list )
        {
            echo '<div class="entry-tags">';
            printf('%2$s', '', $tags_list);
            echo '</div>';
        }
    }
endif;

/**
 * List socials share for post.
 */
function itfirm_socials_share_default() { 
    $img_url = '';
    if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false)) {
        $img_url = wp_get_attachment_image_src(get_post_thumbnail_id(get_the_ID()), false);
    }
    ?>
    <div class="entry-social">
        <label><?php echo esc_html__('Share:', 'itfirm'); ?></label>
        <a class="fb-social" title="<?php echo esc_attr__('Facebook', 'itfirm'); ?>" target="_blank" href="http://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>"><i class="caseicon-facebook"></i></a>
        <a class="tw-social" title="<?php echo esc_attr__('Twitter', 'itfirm'); ?>" target="_blank" href="https://twitter.com/intent/tweet?url=<?php the_permalink(); ?>&text=<?php the_title(); ?>%20"><i class="caseicon-twitter"></i></a>
        <?php if(!empty($img_url)) : ?>
            <a class="pin-social" title="<?php echo esc_attr__('Pinterest', 'itfirm'); ?>" target="_blank" href="http://pinterest.com/pin/create/button/?url=<?php the_permalink(); ?>&media=<?php echo esc_url($img_url[0]); ?>&description=<?php the_title(); ?>%20"><i class="caseicon-pinterest"></i></a>
        <?php endif; ?>
        <a class="lin-social" title="<?php echo esc_attr__('LinkedIn', 'itfirm'); ?>" target="_blank" href="http://www.linkedin.com/shareArticle?mini=true&url=<?php the_permalink(); ?>&title=<?php the_title(); ?>%20"><i class="caseicon-linkedin"></i></a>
    </div>
    <?php
}

/**
 * Related Post
 */
function itfirm_related_post()
{
    $post_related_on = itfirm_get_opt( 'post_related_on', false );

    if($post_related_on) {
        global $post;
        $current_id = $post->ID;
        $posttags = get_the_category($post->ID);
        if (empty($posttags)) return;

        $tags = array();

        foreach ($posttags as $tag) {

            $tags[] = $tag->term_id;
        }
        $post_number = '6';
        $query_similar = new WP_Query(array('posts_per_page' => $post_number, 'post_type' => 'post', 'post_status' => 'publish', 'category__in' => $tags));
        if (count($query_similar->posts) > 1) {
            wp_enqueue_script( 'owl-carousel' );
            wp_enqueue_script( 'itfirm-carousel' );
            ?>
            <div class="ct-related-post">
                <h4 class="widget-title"><?php echo esc_html__('Related Posts', 'itfirm'); ?></h4>
                <div class="ct-related-post-inner owl-carousel" data-item-xs="1" data-item-sm="2" data-item-md="3" data-item-lg="3" data-item-xl="3" data-item-xxl="3" data-margin="30" data-loop="false" data-autoplay="false" data-autoplaytimeout="5000" data-smartspeed="250" data-center="false" data-arrows="false" data-bullets="false" data-stagepadding="0" data-stagepaddingsm="0" data-rtl="false">
                    <?php foreach ($query_similar->posts as $post):
                        $thumbnail_url = '';
                        if (has_post_thumbnail(get_the_ID()) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)) :
                            $thumbnail_url = wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), 'itfirm-blog-small', false);
                        endif;
                        if ($post->ID !== $current_id) : ?>
                            <div class="grid-item">
                                <div class="grid-item-inner">
                                    <?php if (has_post_thumbnail()) { ?>
                                        <div class="item-featured">
                                            <a href="<?php the_permalink(); ?>"><img src="<?php echo esc_url($thumbnail_url[0]); ?>" /></a>
                                        </div>
                                    <?php } ?>
                                    <h3 class="item-title">
                                        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
                                    </h3>
                                </div>
                            </div>
                        <?php endif;
                    endforeach; ?>
                </div>
            </div>
        <?php }
    }

    wp_reset_postdata();
}

/**
 * Header Search Mobile
 */
function itfirm_header_mobile_search()
{
    $search_field_placeholder = itfirm_get_opt( 'search_field_placeholder' );
    $search_icon = itfirm_get_opt( 'search_icon', false );
    if($search_icon) : ?>
        <div class="header-mobile-search">
            <form role="search" method="get" action="<?php echo esc_url(home_url( '/' )); ?>">
                <input type="text" placeholder="<?php if(!empty($search_field_placeholder)) { echo esc_attr( $search_field_placeholder ); } else { esc_attr_e('Search', 'itfirm'); } ?>" name="s" class="search-field" />
                <button type="submit" class="search-submit"><i class="caseicon-search"></i></button>
            </form>
        </div>
<?php endif; }

/**
 * Header Search Popup
 */
function itfirm_search_popup()
{ ?>
    <div class="ct-modal ct-modal-search">
        <div class="ct-modal-close"><i class="ct-icon-close"></i></div>
        <div class="ct-modal-overlay"></div>
        <div class="ct-modal-content">
            <form role="search" method="get" class="search-form-popup" action="<?php echo esc_url(home_url( '/' )); ?>">
                <div class="searchform-wrap">
                    <input type="text" placeholder="<?php echo esc_attr__('Enter Keywords', 'itfirm'); ?>" id="search" name="s" class="search-field" />
                    <button type="submit" class="search-submit"><i class="caseicon-search"></i></button>
                </div>
            </form>
        </div>
    </div>  
<?php }

/**
 * Sidebar Hidden
 */
function itfirm_sidebar_hidden()
{
    if(is_active_sidebar('sidebar-hidden')) { ?>
        <div class="ct-hidden-sidebar-wrap">
            <div class="ct-hidden-sidebar-overlay"></div>
            <div class="ct-hidden-sidebar">
                <div class="ct-hidden-close"><i class="caseicon-close-alt"></i></div>
                <div class="ct-hidden-sidebar-inner">
                    <div class="ct-hidden-sidebar-holder">
                        <?php dynamic_sidebar( 'sidebar-hidden' ); ?>
                    </div>
                </div>
            </div>
        </div>
    <?php }
}

/**
 * Cart Sidebar
 */
function itfirm_cart_sidebar() { 
    $cart_icon = itfirm_get_opt( 'cart_icon', false ); ?>
    <?php if(class_exists('Woocommerce')) : 
        global $woocommerce; ?>
        <div class="ct-widget-cart-wrap">
            <div class="ct-widget-cart-overlay"></div>
            <div class="ct-widget-cart-sidebar">
                <div class="ct-close"><i class="ct-icon-close"></i></div>
                <div class="widget_shopping_cart">
                    <div class="widget_shopping_head">
                        <div class="widget_shopping_title">
                            <?php echo esc_html__( 'Cart', 'itfirm' ); ?>
                        </div>
                    </div>
                    <div class="widget_shopping_cart_content">
                        <?php $cart_is_empty = sizeof( $woocommerce->cart->get_cart() ) <= 0; ?>
                        <ul class="cart_list product_list_widget">
                            <?php if ( ! WC()->cart->is_empty() ) : ?>
                                <?php foreach ( WC()->cart->get_cart() as $cart_item_key => $cart_item ) {
                                    $_product     = apply_filters( 'woocommerce_cart_item_product', $cart_item['data'], $cart_item, $cart_item_key );
                                    $product_id   = apply_filters( 'woocommerce_cart_item_product_id', $cart_item['product_id'], $cart_item, $cart_item_key );

                                    if ( $_product && $_product->exists() && $cart_item['quantity'] > 0 && apply_filters( 'woocommerce_widget_cart_item_visible', true, $cart_item, $cart_item_key ) ) {

                                        $product_name  = apply_filters( 'woocommerce_cart_item_name', $_product->get_title(), $cart_item, $cart_item_key );
                                        $thumbnail     = apply_filters( 'woocommerce_cart_item_thumbnail', $_product->get_image(), $cart_item, $cart_item_key );
                                        $product_price = apply_filters( 'woocommerce_cart_item_price', WC()->cart->get_product_price( $_product ), $cart_item, $cart_item_key );
                                        ?>
                                        <li>
                                            <?php if(!empty($thumbnail)) : ?>
                                                <div class="cart-product-image">
                                                    <a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>">
                                                        <?php echo str_replace( array( 'http:', 'https:' ), '', $thumbnail ); ?>
                                                    </a>
                                                </div>
                                            <?php endif; ?>
                                            <div class="cart-product-meta">
                                                <h3><a href="<?php echo esc_url( $_product->get_permalink( $cart_item ) ); ?>"><?php echo esc_html($product_name); ?></a></h3>
                                                <?php echo apply_filters( 'woocommerce_widget_cart_item_quantity', '<span class="quantity">' . sprintf( '%s &times; %s', $cart_item['quantity'], $product_price ) . '</span>', $cart_item, $cart_item_key ); ?>
                                                <?php
                                                    echo apply_filters( 'woocommerce_cart_item_remove_link', sprintf(
                                                        '<a href="%s" class="remove_from_cart_button" aria-label="%s" data-product_id="%s" data-cart_item_key="%s" data-product_sku="%s"><i class="caseicon-close"></i></a>',
                                                        esc_url( wc_get_cart_remove_url( $cart_item_key ) ),
                                                        esc_attr__( 'Remove this item', 'itfirm' ),
                                                        esc_attr( $product_id ),
                                                        esc_attr( $cart_item_key ),
                                                        esc_attr( $_product->get_sku() )
                                                    ), $cart_item_key );
                                                ?>
                                            </div>  
                                        </li>
                                        <?php
                                    }
                                }
                            ?>
                        <?php else : ?>
                            <li class="empty">
                                <i class="caseicon-shopping-cart-alt"></i>
                                <span><?php esc_html_e( 'Your cart is empty', 'itfirm' ); ?></span>
                                <a class="btn btn-animate" href="<?php echo get_permalink( wc_get_page_id( 'shop' ) ); ?>"><?php echo esc_html__('Browse Shop', 'itfirm'); ?></a>
                            </li>
                        <?php endif; ?>
                        </ul><!-- end product list -->
                    </div>
                    <?php if ( ! WC()->cart->is_empty() ) : ?>
                        <div class="widget_shopping_cart_footer">
                            <p class="total"><strong><?php esc_html_e( 'Subtotal', 'itfirm' ); ?>:</strong> <?php echo WC()->cart->get_cart_subtotal(); ?></p>

                            <?php do_action( 'woocommerce_widget_shopping_cart_before_buttons' ); ?>

                            <p class="buttons">
                                <a href="<?php echo esc_url( wc_get_cart_url() ); ?>" class="btn btn-animate wc-forward"><?php esc_html_e( 'View Cart', 'itfirm' ); ?></a>
                                <a href="<?php echo esc_url( wc_get_checkout_url() ); ?>" class="btn btn-animate checkout wc-forward"><?php esc_html_e( 'Checkout', 'itfirm' ); ?></a>
                            </p>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    <?php endif; ?>
<?php }
/**
 * User custom fields.
 */
add_action( 'show_user_profile', 'itfirm_user_fields' );
add_action( 'edit_user_profile', 'itfirm_user_fields' );
function itfirm_user_fields($user){

    $user_facebook = get_user_meta($user->ID, 'user_facebook', true);
    $user_twitter = get_user_meta($user->ID, 'user_twitter', true);
    $user_linkedin = get_user_meta($user->ID, 'user_linkedin', true);
    $user_skype = get_user_meta($user->ID, 'user_skype', true);
    $user_google = get_user_meta($user->ID, 'user_google', true);
    $user_youtube = get_user_meta($user->ID, 'user_youtube', true);
    $user_vimeo = get_user_meta($user->ID, 'user_vimeo', true);
    $user_tumblr = get_user_meta($user->ID, 'user_tumblr', true);
    $user_pinterest = get_user_meta($user->ID, 'user_pinterest', true);
    $user_instagram = get_user_meta($user->ID, 'user_instagram', true);
    $user_yelp = get_user_meta($user->ID, 'user_yelp', true);

    ?>
    <h3><?php esc_html_e('Social', 'itfirm'); ?></h3>
    <table class="form-table">
        <tr>
            <th><label for="user_facebook"><?php esc_html_e('Facebook', 'itfirm'); ?></label></th>
            <td>
                <input id="user_facebook" name="user_facebook" type="text" value="<?php echo esc_attr(isset($user_facebook) ? $user_facebook : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_twitter"><?php esc_html_e('Twitter', 'itfirm'); ?></label></th>
            <td>
                <input id="user_twitter" name="user_twitter" type="text" value="<?php echo esc_attr(isset($user_twitter) ? $user_twitter : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_linkedin"><?php esc_html_e('Linkedin', 'itfirm'); ?></label></th>
            <td>
                <input id="user_linkedin" name="user_linkedin" type="text" value="<?php echo esc_attr(isset($user_linkedin) ? $user_linkedin : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_skype"><?php esc_html_e('Skype', 'itfirm'); ?></label></th>
            <td>
                <input id="user_skype" name="user_skype" type="text" value="<?php echo esc_attr(isset($user_skype) ? $user_skype : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_google"><?php esc_html_e('Google', 'itfirm'); ?></label></th>
            <td>
                <input id="user_google" name="user_google" type="text" value="<?php echo esc_attr(isset($user_google) ? $user_google : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_youtube"><?php esc_html_e('Youtube', 'itfirm'); ?></label></th>
            <td>
                <input id="user_youtube" name="user_youtube" type="text" value="<?php echo esc_attr(isset($user_youtube) ? $user_youtube : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_vimeo"><?php esc_html_e('Vimeo', 'itfirm'); ?></label></th>
            <td>
                <input id="user_vimeo" name="user_vimeo" type="text" value="<?php echo esc_attr(isset($user_vimeo) ? $user_vimeo : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_tumblr"><?php esc_html_e('Tumblr', 'itfirm'); ?></label></th>
            <td>
                <input id="user_tumblr" name="user_tumblr" type="text" value="<?php echo esc_attr(isset($user_tumblr) ? $user_tumblr : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_pinterest"><?php esc_html_e('Pinterest', 'itfirm'); ?></label></th>
            <td>
                <input id="user_pinterest" name="user_pinterest" type="text" value="<?php echo esc_attr(isset($user_pinterest) ? $user_pinterest : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_instagram"><?php esc_html_e('Instagram', 'itfirm'); ?></label></th>
            <td>
                <input id="user_instagram" name="user_instagram" type="text" value="<?php echo esc_attr(isset($user_instagram) ? $user_instagram : ''); ?>" />
            </td>
        </tr>
        <tr>
            <th><label for="user_yelp"><?php esc_html_e('Yelp', 'itfirm'); ?></label></th>
            <td>
                <input id="user_yelp" name="user_yelp" type="text" value="<?php echo esc_attr(isset($user_yelp) ? $user_yelp : ''); ?>" />
            </td>
        </tr>
    </table>
    <?php
}

/**
 * Save user custom fields.
 */
add_action( 'personal_options_update', 'itfirm_save_user_custom_fields' );
add_action( 'edit_user_profile_update', 'itfirm_save_user_custom_fields' );
function itfirm_save_user_custom_fields( $user_id )
{
    if ( !current_user_can( 'edit_user', $user_id ) )
        return false;

    if(isset($_POST['user_facebook']))
        update_user_meta( $user_id, 'user_facebook', $_POST['user_facebook'] );
    if(isset($_POST['user_twitter']))
        update_user_meta( $user_id, 'user_twitter', $_POST['user_twitter'] );
    if(isset($_POST['user_linkedin']))
        update_user_meta( $user_id, 'user_linkedin', $_POST['user_linkedin'] );
    if(isset($_POST['user_skype']))
        update_user_meta( $user_id, 'user_skype', $_POST['user_skype'] );
    if(isset($_POST['user_google']))
        update_user_meta( $user_id, 'user_google', $_POST['user_google'] );
    if(isset($_POST['user_youtube']))
        update_user_meta( $user_id, 'user_youtube', $_POST['user_youtube'] );
    if(isset($_POST['user_vimeo']))
        update_user_meta( $user_id, 'user_vimeo', $_POST['user_vimeo'] );
    if(isset($_POST['user_tumblr']))
        update_user_meta( $user_id, 'user_tumblr', $_POST['user_tumblr'] );
    if(isset($_POST['user_pinterest']))
        update_user_meta( $user_id, 'user_pinterest', $_POST['user_pinterest'] );
    if(isset($_POST['user_instagram']))
        update_user_meta( $user_id, 'user_instagram', $_POST['user_instagram'] );
    if(isset($_POST['user_yelp']))
        update_user_meta( $user_id, 'user_yelp', $_POST['user_yelp'] );
}
/* Author Social */
function itfirm_get_user_social() {

    $user_facebook = get_user_meta(get_the_author_meta( 'ID' ), 'user_facebook', true);
    $user_twitter = get_user_meta(get_the_author_meta( 'ID' ), 'user_twitter', true);
    $user_linkedin = get_user_meta(get_the_author_meta( 'ID' ), 'user_linkedin', true);
    $user_skype = get_user_meta(get_the_author_meta( 'ID' ), 'user_skype', true);
    $user_google = get_user_meta(get_the_author_meta( 'ID' ), 'user_google', true);
    $user_youtube = get_user_meta(get_the_author_meta( 'ID' ), 'user_youtube', true);
    $user_vimeo = get_user_meta(get_the_author_meta( 'ID' ), 'user_vimeo', true);
    $user_tumblr = get_user_meta(get_the_author_meta( 'ID' ), 'user_tumblr', true);
    $user_pinterest = get_user_meta(get_the_author_meta( 'ID' ), 'user_pinterest', true);
    $user_instagram = get_user_meta(get_the_author_meta( 'ID' ), 'user_instagram', true);
    $user_yelp = get_user_meta(get_the_author_meta( 'ID' ), 'user_yelp', true);

    ?>
    <ul class="user-social">
        <?php if(!empty($user_facebook)) { ?>
            <li><a href="<?php echo esc_url($user_facebook); ?>"><i class="caseicon-facebook"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_twitter)) { ?>
            <li><a href="<?php echo esc_url($user_twitter); ?>"><i class="caseicon-twitter"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_linkedin)) { ?>
            <li><a href="<?php echo esc_url($user_linkedin); ?>"><i class="caseicon-linkedin"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_instagram)) { ?>
            <li><a href="<?php echo esc_url($user_instagram); ?>"><i class="caseicon-instagram"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_google)) { ?>
            <li><a href="<?php echo esc_url($user_google); ?>"><i class="caseicon-google-plus"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_skype)) { ?>
            <li><a href="<?php echo esc_url($user_skype); ?>"><i class="caseicon-skype"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_pinterest)) { ?>
            <li><a href="<?php echo esc_url($user_pinterest); ?>"><i class="caseicon-pinterest"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_vimeo)) { ?>
            <li><a href="<?php echo esc_url($user_vimeo); ?>"><i class="caseicon-vimeo"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_youtube)) { ?>
            <li><a href="<?php echo esc_url($user_youtube); ?>"><i class="caseicon-youtube"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_yelp)) { ?>
            <li><a href="<?php echo esc_url($user_yelp); ?>"><i class="caseicon-yelp"></i></a></li>
        <?php } ?>
        <?php if(!empty($user_tumblr)) { ?>
            <li><a href="<?php echo esc_url($user_tumblr); ?>"><i class="caseicon-tumblr"></i></a></li>
        <?php } ?>

    </ul> <?php
}

function itfirm_product_nav() {
    global $post;
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
    <?php
    $next_post = get_next_post();
    $previous_post = get_previous_post();
    if( !empty($next_post) || !empty($previous_post) ) { ?>
        <div class="product-previous-next">
            <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { ?>
                <a class="nav-link-prev" href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><i class="fa fa-long-arrow-left"></i></a>
            <?php } ?>
            <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') { ?>
                <a class="nav-link-next" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><i class="fa fa-long-arrow-right"></i></a>
            <?php } ?>
        </div>
    <?php }
}

/**
 * Social Icon
 */
function itfirm_social_header() {
    $social_facebook_url = itfirm_get_opt( 'h_social_facebook_url' );
    $social_twitter_url = itfirm_get_opt( 'h_social_twitter_url' );
    $social_dribbble_url = itfirm_get_opt( 'h_social_dribbble_url' );
    $social_behance_url = itfirm_get_opt( 'h_social_behance_url' );
    $social_inkedin_url = itfirm_get_opt( 'h_social_inkedin_url' );
    $social_instagram_url = itfirm_get_opt( 'h_social_instagram_url' );
    $social_google_url = itfirm_get_opt( 'h_social_google_url' );
    $social_skype_url = itfirm_get_opt( 'h_social_skype_url' );
    $social_pinterest_url = itfirm_get_opt( 'h_social_pinterest_url' );
    $social_vimeo_url = itfirm_get_opt( 'h_social_vimeo_url' );
    $social_youtube_url = itfirm_get_opt( 'h_social_youtube_url' );
    $social_yelp_url = itfirm_get_opt( 'h_social_yelp_url' );
    $social_tumblr_url = itfirm_get_opt( 'h_social_tumblr_url' );
    $social_tripadvisor_url = itfirm_get_opt( 'h_social_tripadvisor_url' );
    if(!empty($social_facebook_url) || !empty($social_dribbble_url) || !empty($social_behance_url) || !empty($social_twitter_url) || !empty($social_inkedin_url) || !empty($social_instagram_url) || !empty($social_google_url) || !empty($social_skype_url) || !empty($social_pinterest_url) || !empty($social_vimeo_url) || !empty($social_youtube_url) || !empty($social_yelp_url) || !empty($social_tumblr_url) || !empty($social_tripadvisor_url)) : ?>
        <?php
        if(!empty($social_facebook_url)) :
            echo '<a href="'.esc_url($social_facebook_url).'" target="_blank"><i class="caseicon-facebook"></i></a>';
        endif;
        if(!empty($social_twitter_url)) :
            echo '<a href="'.esc_url($social_twitter_url).'" target="_blank"><i class="caseicon-twitter"></i></a>';
        endif;
        if(!empty($social_dribbble_url)) :
            echo '<a href="'.esc_url($social_dribbble_url).'" target="_blank"><i class="caseicon-dribbble"></i></a>';
        endif;
        if(!empty($social_behance_url)) :
            echo '<a href="'.esc_url($social_behance_url).'" target="_blank"><i class="caseicon-behance"></i></a>';
        endif;
        if(!empty($social_inkedin_url)) :
            echo '<a href="'.esc_url($social_inkedin_url).'" target="_blank"><i class="caseicon-linkedin"></i></a>';
        endif;
        if(!empty($social_instagram_url)) :
            echo '<a href="'.esc_url($social_instagram_url).'" target="_blank"><i class="caseicon-instagram"></i></a>';
        endif;
        if(!empty($social_google_url)) :
            echo '<a href="'.esc_url($social_google_url).'" target="_blank"><i class="caseicon-google-plus"></i></a>';
        endif;
        if(!empty($social_skype_url)) :
            echo '<a href="'.esc_url($social_skype_url).'" target="_blank"><i class="caseicon-skype"></i></a>';
        endif;
        if(!empty($social_pinterest_url)) :
            echo '<a href="'.esc_url($social_pinterest_url).'" target="_blank"><i class="caseicon-pinterest"></i></a>';
        endif;
        if(!empty($social_vimeo_url)) :
            echo '<a href="'.esc_url($social_vimeo_url).'" target="_blank"><i class="caseicon-vimeo"></i></a>';
        endif;
        if(!empty($social_youtube_url)) :
            echo '<a href="'.esc_url($social_youtube_url).'" target="_blank"><i class="caseicon-youtube"></i></a>';
        endif;
        if(!empty($social_yelp_url)) :
            echo '<a href="'.esc_url($social_yelp_url).'" target="_blank"><i class="caseicon-yelp"></i></a>';
        endif;
        if(!empty($social_tumblr_url)) :
            echo '<a href="'.esc_url($social_tumblr_url).'" target="_blank"><i class="caseicon-tumblr"></i></a>';
        endif; 
        if(!empty($social_tripadvisor_url)) :
            echo '<a href="'.esc_url($social_tripadvisor_url).'" target="_blank"><i class="caseicon-tripadvisor"></i></a>';
        endif;
        ?>
    <?php endif; ?>
<?php }

if(!function_exists('itfirm_get_post_grid_layout1')){
    function itfirm_get_post_grid_layout1($posts = [], $settings = []){
        extract($settings);
        $images_size = '600x413';
        if(!empty($img_size)) {
            $images_size = $img_size;
        }
        if(empty($img_size)) {
            $img_size = '600x413';
        }
        if (is_array($posts)):
            foreach ($posts as $key => $post):
                $item_class = "grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
                if(isset($grid_masonry) && !empty($grid_masonry[$key]) && count($grid_masonry)) {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                    $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                    $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                    $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                    $item_class = "grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                    $img_size_m = $grid_masonry[$key]['img_size_m'];
                    if(!empty($img_size_m)) {
                        $images_size = $img_size_m;
                    }
                } else {
                    $images_size = $img_size;
                }
                $filter_class = ct_get_term_of_post_to_class($post->ID, array_unique($tax));
                $author = get_user_by('id', $post->post_author);
                $comment_count = get_comments_number($post->ID);
                if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                    $img_id = get_post_thumbnail_id($post->ID);
                    $img = ct_get_image_by_size( array(
                        'attach_id'  => $img_id,
                        'thumb_size' => $images_size,
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];
                    ?>
                    <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                        <div class="grid-item-inner <?php echo esc_attr($ct_animate); ?>" data-wow-duration="1.2s">
                            <div class="item--featured">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                            </div>
                            <div class="item--holder item--main">
                                <?php if($show_date == 'true' || $show_author == 'true' ) : ?>
                                    <ul class="item--meta">
                                        <?php if($show_date == 'true'): ?>
                                            <li class="item-date"><i class="caseicon-calendar"></i><?php $date_formart = get_option('date_format'); echo get_the_date($date_formart, $post->ID); ?></li>
                                        <?php endif; ?>
                                        <?php if($show_author == 'true'): ?>
                                            <li class="item-author">
                                                <i class="caseicon-user"></i><a href="<?php echo esc_url(get_author_posts_url($post->post_author, $author->user_nicename)); ?>"><?php echo esc_html($author->display_name); ?></a>
                                            </li>
                                        <?php endif; ?>
                                    </ul>
                                <?php endif; ?>
                                <h3 class="item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h3>
                            </div>
                            <div class="item--holder item--hover">
                                <h3 class="item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h3>
                                <?php if($show_excerpt == 'true'): ?>
                                    <div class="item--content">
                                        <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if($show_button == 'true') : ?>
                                    <div class="item--readmore">
                                        <a class="btn btn-primary" href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                            <span><?php if(!empty($button_text)) {
                                                echo esc_attr($button_text);
                                            } else {
                                                echo esc_html__('Read more', 'itfirm');
                                            } ?></span>
                                            <i class="caseicon-angle-arrow-right"></i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif;
            endforeach;
        endif;
    }
}

if(!function_exists('itfirm_get_post_grid_layout2')){
    function itfirm_get_post_grid_layout2($posts = [], $settings = []){
        extract($settings);
        $images_size = '600x419';
        if(!empty($img_size)) {
            $images_size = $img_size;
        }
        if(empty($img_size)) {
            $img_size = '600x419';
        }
        if (is_array($posts)):
            foreach ($posts as $key => $post):
                $item_class = "grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
                if(isset($grid_masonry) && !empty($grid_masonry[$key]) && count($grid_masonry)) {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                    $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                    $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                    $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                    $item_class = "grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                    $img_size_m = $grid_masonry[$key]['img_size_m'];
                    if(!empty($img_size_m)) {
                        $images_size = $img_size_m;
                    }
                } else {
                    $images_size = $img_size;
                }
                $filter_class = ct_get_term_of_post_to_class($post->ID, array_unique($tax));
                $author = get_user_by('id', $post->post_author);
                $author_avatar = get_avatar( $post->post_author, 60, '', $author->display_name, array( 'class' => '' ) );
                $comment_count = get_comments_number($post->ID); ?>
                <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                    <div class="grid-item-inner <?php echo esc_attr($ct_animate); ?>" data-wow-duration="1.2s">
                        <?php if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): 
                            $img_id = get_post_thumbnail_id($post->ID);
                            $img = ct_get_image_by_size( array(
                                'attach_id'  => $img_id,
                                'thumb_size' => $images_size,
                                'class' => 'no-lazyload',
                            ));
                            $thumbnail = $img['thumbnail']; ?>
                            <div class="item--featured">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                            </div>
                        <?php endif; ?>
                        <div class="item--holder">
                            <?php if($show_date == 'true' ) : ?>
                                <div class="item-date"><i class="caseicon-calendar"></i><?php $date_formart = get_option('date_format'); echo get_the_date($date_formart, $post->ID); ?></div>
                            <?php endif; ?>
                            <h4 class="item--title"><a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo esc_attr(get_the_title($post->ID)); ?></a></h4>
                            <?php if($show_excerpt == 'true'): ?>
                                <div class="item--content">
                                    <?php echo wp_trim_words( $post->post_excerpt, $num_words, $more = null ); ?>
                                </div>
                            <?php endif; ?>
                            <div class="item--bottom">
                                <?php if($show_author == 'true' ) : ?>
                                    <div class="item-author">
                                        <a href="<?php echo esc_url(get_author_posts_url($post->post_author, $author->user_nicename)); ?>">
                                            <?php ct_print_html($author_avatar); ?>
                                            <?php echo esc_html($author->display_name); ?>
                                        </a>
                                    </div>
                                <?php endif; ?>
                                <?php if($show_button == 'true') : ?>
                                    <div class="item--readmore">
                                        <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>">
                                            <span><?php if(!empty($button_text)) {
                                                echo esc_attr($button_text);
                                            } else {
                                                echo esc_html__('More Details', 'itfirm');
                                            } ?></span>
                                            <i class="flaticon-right-arrow pxl-rtl-icon"></i>
                                        </a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endforeach;
        endif;
    }
}

if(!function_exists('itfirm_get_service_layout1')){
    function itfirm_get_service_layout1($posts = [], $settings = []){
        extract($settings);
        if (is_array($posts)):
            if(!empty($img_size)) {
                $images_size = $img_size;
            } else {
                $images_size = '600x678';
            }
            foreach ($posts as $key => $post):
                $item_class = "grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
                $filter_class = ct_get_term_of_post_to_class($post->ID, array_unique($tax));
                $icon_type = get_post_meta($post->ID, 'icon_type', true);
                $service_icon = get_post_meta($post->ID, 'service_icon', true);
                if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                    $img_id = get_post_thumbnail_id($post->ID);
                    $img = itfirm_get_image_by_size( array(
                        'attach_id'  => $img_id,
                        'thumb_size' => $images_size,
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];
                    $thumbnail_url = $img['thumbnail_url'];
                    $service_custom_link = get_post_meta($post->ID, 'service_custom_link', true);
                    $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                    $service_except = get_post_meta($post->ID, 'service_except', true);
                    ?>
                    <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                        <div class="grid-item-inner <?php echo esc_attr($ct_animate); ?>" data-wow-duration="1.2s"> 
                            <div class="item--featured">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                            </div>
                            <div class="item--meta">
                                <?php if($icon_type == 'icon' && !empty($service_icon)) : ?>
                                    <div class="item--icon"><i class="<?php echo esc_attr($service_icon); ?>"></i></div>
                                <?php endif; ?>
                                <?php if($icon_type == 'image' && !empty($service_icon_img)) : 
                                    $icon_img = ct_get_image_by_size( array(
                                        'attach_id'  => $service_icon_img['id'],
                                        'thumb_size' => $img_size,
                                    ));
                                    $icon_thumbnail = $icon_img['thumbnail'];
                                    ?>
                                    <div class="item--icon">
                                        <?php echo wp_kses_post($icon_thumbnail); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if($show_title == 'true'): ?>
                                    <h3 class="item--title">
                                        <?php echo esc_attr(get_the_title($post->ID)); ?>
                                    </h3>
                                <?php endif; ?>
                            </div>
                            <div class="item--holder">
                                <div class="item--holder-inner">
                                    <?php if($show_title == 'true'): ?>
                                        <h3 class="item--title">
                                            <?php if($show_button == 'true') : ?><a href="<?php if(!empty($service_custom_link)) { echo esc_url($service_custom_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php endif; ?>
                                                <?php echo esc_attr(get_the_title($post->ID)); ?>
                                            <?php if($show_button == 'true') : ?></a><?php endif; ?>
                                        </h3>
                                    <?php endif; ?>
                                    <?php if($show_excerpt == 'true' && !empty($service_except)): ?>
                                            <div class="item--content">
                                                <?php echo wp_trim_words( $service_except, $num_words, $more = null ); ?>
                                            </div>
                                        <?php endif; ?>
                                    <?php if($show_button == 'true') : ?>
                                        <div class="item-readmore">
                                            <a class="btn btn-primary" href="<?php if(!empty($service_custom_link)) { echo esc_url($service_custom_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php if(!empty($button_text)) { echo esc_attr($button_text); } else { echo esc_html__('Read more', 'itfirm'); } ?></a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endif;
            endforeach;
        endif;
    }
}

if(!function_exists('itfirm_get_service_layout2')){
    function itfirm_get_service_layout2($posts = [], $settings = []){
        extract($settings);
        if (is_array($posts)):
            if(!empty($img_size)) {
                $images_size = $img_size;
            } else {
                $images_size = '220x220';
            }
            foreach ($posts as $key => $post):
                $item_class = "grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
                $filter_class = ct_get_term_of_post_to_class($post->ID, array_unique($tax));
                $icon_type = get_post_meta($post->ID, 'icon_type', true);
                $service_icon = get_post_meta($post->ID, 'service_icon', true);
                if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)):
                    $img_id = get_post_thumbnail_id($post->ID);
                    $img = itfirm_get_image_by_size( array(
                        'attach_id'  => $img_id,
                        'thumb_size' => $images_size,
                        'class' => 'no-lazyload',
                    ));
                    $thumbnail = $img['thumbnail'];
                    $thumbnail_url = $img['thumbnail_url'];
                    $service_custom_link = get_post_meta($post->ID, 'service_custom_link', true);
                    $service_icon_img = get_post_meta($post->ID, 'service_icon_img', true);
                    $service_except = get_post_meta($post->ID, 'service_except', true);
                    ?>
                    <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                        <div class="grid-item-inner <?php echo esc_attr($ct_animate); ?>" data-wow-duration="1.2s"> 
                            <div class="item--featured">
                                <a href="<?php echo esc_url(get_permalink( $post->ID )); ?>"><?php echo wp_kses_post($thumbnail); ?></a>
                                <?php if($icon_type == 'icon' && !empty($service_icon)) : ?>
                                    <div class="item--icon"><i class="<?php echo esc_attr($service_icon); ?>"></i></div>
                                <?php endif; ?>
                                <?php if($icon_type == 'image' && !empty($service_icon_img)) : 
                                    $icon_img = ct_get_image_by_size( array(
                                        'attach_id'  => $service_icon_img['id'],
                                        'thumb_size' => $img_size,
                                    ));
                                    $icon_thumbnail = $icon_img['thumbnail'];
                                    ?>
                                    <div class="item--icon">
                                        <?php echo wp_kses_post($icon_thumbnail); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="item--holder">
                                <?php if($show_title == 'true'): ?>
                                    <h3 class="item--title">
                                        <?php if($show_button == 'true') : ?><a href="<?php if(!empty($service_custom_link)) { echo esc_url($service_custom_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php endif; ?>
                                            <?php echo esc_attr(get_the_title($post->ID)); ?>
                                        <?php if($show_button == 'true') : ?></a><?php endif; ?>
                                    </h3>
                                <?php endif; ?>
                                <?php if($show_excerpt == 'true' && !empty($service_except)): ?>
                                        <div class="item--content">
                                            <?php echo wp_trim_words( $service_except, $num_words, $more = null ); ?>
                                        </div>
                                    <?php endif; ?>
                                <?php if($show_button == 'true') : ?>
                                    <div class="item-readmore">
                                        <a class="btn btn-dark1" href="<?php if(!empty($service_custom_link)) { echo esc_url($service_custom_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php if(!empty($button_text)) { echo esc_attr($button_text); } else { echo esc_html__('Read more', 'itfirm'); } ?><i class="ct-icon-plus"></i></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                <?php endif;
            endforeach;
        endif;
    }
}

if(!function_exists('itfirm_get_portfolio_layout1')){
    function itfirm_get_portfolio_layout1($posts = [], $settings = []){
        extract($settings);
        $images_size = '600x589';
        if(!empty($img_size)) {
            $images_size = $img_size;
        }
        if(empty($img_size)) {
            $img_size = '600x589';
        }
        if (is_array($posts)):
            foreach ($posts as $key => $post):
                $item_class = "grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
                if(isset($grid_masonry) && !empty($grid_masonry[$key]) && count($grid_masonry)) {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                    $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                    $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                    $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                    $item_class = "grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                    $img_size_m = $grid_masonry[$key]['img_size_m'];
                    if(!empty($img_size_m)) {
                        $images_size = $img_size_m;
                    } else {
                        $images_size = $img_size;
                    }
                } else {
                    $images_size = $img_size;
                }
                $filter_class = ct_get_term_of_post_to_class($post->ID, array_unique($tax));
                $img_id = get_post_thumbnail_id($post->ID);
                $img = ct_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
                $portfolio_except = get_post_meta($post->ID, 'portfolio_except', true);
                $portfolio_custom_link = get_post_meta($post->ID, 'portfolio_custom_link', true);
                if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                    <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                        <div class="grid-item-inner <?php echo esc_attr($ct_animate); ?>" data-wow-duration="1.2s">
                            <div class="item--featured">
                                <?php echo ct_print_html($thumbnail); ?>
                            </div>
                            <div class="item--meta">
                                <?php if($show_title == 'true'): ?>
                                    <h4 class="item--title">
                                        <?php if($show_button == 'true') : ?><a href="<?php if(!empty($portfolio_custom_link)) { echo esc_url($portfolio_custom_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php endif; ?>
                                            <?php echo esc_attr(get_the_title($post->ID)); ?>
                                        <?php if($show_button == 'true') : ?></a><?php endif; ?>
                                    </h4>
                                <?php endif; ?>
                                <?php if($show_category == 'true'): ?>
                                    <div class="item--category">
                                        <?php the_terms( $post->ID, 'portfolio-category', '', ' ' ); ?>
                                    </div>
                                <?php endif; ?>
                            </div>
                            <div class="item--holder">
                                <div class="item--holder-inner">
                                    <?php if($show_excerpt == 'true' && !empty($portfolio_except)): ?>
                                        <div class="item--content">
                                            <?php echo wp_trim_words( $portfolio_except, $num_words, $more = null ); ?>
                                        </div>
                                    <?php endif; ?>
                                    <?php if($show_button == 'true') : ?>
                                        <div class="item--readmore">
                                            <a href="<?php if(!empty($portfolio_custom_link)) { echo esc_url($portfolio_custom_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>">+</a>
                                        </div>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
            <?php endif;
            endforeach;
        endif;
    }
}

if(!function_exists('itfirm_get_portfolio_layout2')){
    function itfirm_get_portfolio_layout2($posts = [], $settings = []){
        extract($settings);
        $images_size = '371x347';
        if(!empty($img_size)) {
            $images_size = $img_size;
        }
        if(empty($img_size)) {
            $img_size = '371x347';
        }
        if (is_array($posts)):
            foreach ($posts as $key => $post):
                $item_class = "grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
                if(isset($grid_masonry) && !empty($grid_masonry[$key]) && count($grid_masonry)) {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                    $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                    $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                    $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                    $item_class = "grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                    $img_size_m = $grid_masonry[$key]['img_size_m'];
                    if(!empty($img_size_m)) {
                        $images_size = $img_size_m;
                    } else {
                        $images_size = $img_size;
                    }
                } else {
                    $images_size = $img_size;
                }
                $filter_class = ct_get_term_of_post_to_class($post->ID, array_unique($tax));
                $img_id = get_post_thumbnail_id($post->ID);
                $img = ct_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
                $portfolio_except = get_post_meta($post->ID, 'portfolio_except', true);
                $portfolio_custom_link = get_post_meta($post->ID, 'portfolio_custom_link', true);
                if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                    <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                        <div class="grid-item-inner <?php echo esc_attr($ct_animate); ?>" data-wow-duration="1.2s">
                            <div class="item--featured">
                                <?php echo ct_print_html($thumbnail); ?>
                            </div>
                            <div class="item--holder">
                                <?php if($show_title == 'true'): ?>
                                    <h4 class="item--title">
                                        <?php if($show_button == 'true') : ?><a href="<?php if(!empty($portfolio_custom_link)) { echo esc_url($portfolio_custom_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php endif; ?>
                                            <?php echo esc_attr(get_the_title($post->ID)); ?>
                                        <?php if($show_button == 'true') : ?></a><?php endif; ?>
                                    </h4>
                                <?php endif; ?>
                                <?php if($show_excerpt == 'true' && !empty($portfolio_except)): ?>
                                    <div class="item--content">
                                        <?php echo wp_trim_words( $portfolio_except, $num_words, $more = null ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if($show_button == 'true') : ?>
                                    <div class="item--readmore">
                                        <a href="<?php if(!empty($portfolio_custom_link)) { echo esc_url($portfolio_custom_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><i>+</i></a>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
            <?php endif;
            endforeach;
        endif;
    }
}

if(!function_exists('itfirm_get_portfolio_layout3')){
    function itfirm_get_portfolio_layout3($posts = [], $settings = []){
        extract($settings);
        $images_size = '600x600';
        if(!empty($img_size)) {
            $images_size = $img_size;
        }
        if(empty($img_size)) {
            $img_size = '600x600';
        }
        if (is_array($posts)):
            foreach ($posts as $key => $post):
                $item_class = "grid-item col-xl-{$col_xl} col-lg-{$col_lg} col-md-{$col_md} col-sm-{$col_sm} col-{$col_xs}";
                if(isset($grid_masonry) && !empty($grid_masonry[$key]) && count($grid_masonry)) {
                    $col_xl_m = 12 / $grid_masonry[$key]['col_xl_m'];
                    $col_lg_m = 12 / $grid_masonry[$key]['col_lg_m'];
                    $col_md_m = 12 / $grid_masonry[$key]['col_md_m'];
                    $col_sm_m = 12 / $grid_masonry[$key]['col_sm_m'];
                    $col_xs_m = 12 / $grid_masonry[$key]['col_xs_m'];
                    $item_class = "grid-item col-xl-{$col_xl_m} col-lg-{$col_lg_m} col-md-{$col_md_m} col-sm-{$col_sm_m} col-{$col_xs_m}";
                    $img_size_m = $grid_masonry[$key]['img_size_m'];
                    if(!empty($img_size_m)) {
                        $images_size = $img_size_m;
                    } else {
                        $images_size = $img_size;
                    }
                } else {
                    $images_size = $img_size;
                }
                $filter_class = ct_get_term_of_post_to_class($post->ID, array_unique($tax));
                $img_id = get_post_thumbnail_id($post->ID);
                $img = ct_get_image_by_size( array(
                    'attach_id'  => $img_id,
                    'thumb_size' => $images_size,
                    'class' => 'no-lazyload',
                ));
                $thumbnail = $img['thumbnail'];
                $portfolio_except = get_post_meta($post->ID, 'portfolio_except', true);
                $portfolio_custom_link = get_post_meta($post->ID, 'portfolio_custom_link', true);
                if (has_post_thumbnail($post->ID) && wp_get_attachment_image_src(get_post_thumbnail_id($post->ID), false)): ?>
                    <div class="<?php echo esc_attr($item_class . ' ' . $filter_class); ?>">
                        <div class="grid-item-inner <?php echo esc_attr($ct_animate); ?>" data-wow-duration="1.2s">
                            <div class="item--overlay"></div>
                            <div class="item--featured">
                                <?php echo ct_print_html($thumbnail); ?>
                            </div>
                            <?php if($show_button == 'true') : ?>
                                <div class="item--readmore">
                                    <a href="<?php if(!empty($portfolio_custom_link)) { echo esc_url($portfolio_custom_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><i class="flaticon flaticon-right-arrow"></i></a>
                                </div>
                            <?php endif; ?>
                            <div class="item--holder">
                                <?php if($show_category == 'true'): ?>
                                    <div class="item--category">
                                        <?php the_terms( $post->ID, 'portfolio-category', '', ' ' ); ?>
                                    </div>
                                <?php endif; ?>
                                <?php if($show_title == 'true'): ?>
                                    <h4 class="item--title">
                                        <?php if($show_button == 'true') : ?><a href="<?php if(!empty($portfolio_custom_link)) { echo esc_url($portfolio_custom_link); } else { echo esc_url(get_permalink( $post->ID )); } ?>"><?php endif; ?>
                                            <?php echo esc_attr(get_the_title($post->ID)); ?>
                                        <?php if($show_button == 'true') : ?></a><?php endif; ?>
                                    </h4>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
            <?php endif;
            endforeach;
        endif;
    }
}

if(!function_exists('itfirm_get_post_grid')){
    function itfirm_get_post_grid($posts = [], $settings = []){
        if (empty($posts) || !is_array($posts) || empty($settings) || !is_array($settings)) {
            return false;
        }
        switch ($settings['template_type']) {
            case 'post_grid_layout1':
                itfirm_get_post_grid_layout1($posts, $settings);
                break;

            case 'post_grid_layout2':
                itfirm_get_post_grid_layout2($posts, $settings);
                break;

            case 'service_layout1':
                itfirm_get_service_layout1($posts, $settings);
                break;

            case 'service_layout2':
                itfirm_get_service_layout2($posts, $settings);
                break;

            case 'portfolio_layout1':
                itfirm_get_portfolio_layout1($posts, $settings);
                break;

            case 'portfolio_layout2':
                itfirm_get_portfolio_layout2($posts, $settings);
                break;

            case 'portfolio_layout3':
                itfirm_get_portfolio_layout3($posts, $settings);
                break;

            default:
                return false;
                break;
        }
    }
}

add_action( 'wp_ajax_itfirm_load_more_post_grid', 'itfirm_load_more_post_grid' );
add_action( 'wp_ajax_nopriv_itfirm_load_more_post_grid', 'itfirm_load_more_post_grid' );
if(!function_exists('itfirm_load_more_post_grid')){
    function itfirm_load_more_post_grid(){
        try{
            if(!isset($_POST['settings'])){
                throw new Exception(__('Something went wrong while requesting. Please try again!', 'itfirm'));
            }
            $settings = $_POST['settings'];
            set_query_var('paged', $settings['paged']);
            extract(ct_get_posts_of_grid($settings['posttype'], [
                'source' => isset($settings['source'])?$settings['source']:'',
                'orderby' => isset($settings['orderby'])?$settings['orderby']:'date',
                'order' => isset($settings['order'])?$settings['order']:'desc',
                'limit' => isset($settings['limit'])?$settings['limit']:'6',
                'post_ids' => '',
            ]));
            ob_start();
            itfirm_get_post_grid($posts, $settings);
            $html = ob_get_clean();
            wp_send_json(
                array(
                    'status' => true,
                    'message' => esc_attr__('Load Successfully!', 'itfirm'),
                    'data' => array(
                        'html' => $html,
                        'paged' => $settings['paged'],
                        'posts' => $posts,
                        'max' => $max,
                    ),
                )
            );
        }
        catch (Exception $e){
            wp_send_json(array('status' => false, 'message' => $e->getMessage()));
        }
        die;
    }
}

/**
* Display navigation to next/previous post when applicable.
*/
function itfirm_post_nav_default() {
    global $post;
    $previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
    $next     = get_adjacent_post( false, '', false );

    if ( ! $next && ! $previous )
        return;
    ?>
    <?php
    $next_post = get_next_post();
    $previous_post = get_previous_post();

    if( !empty($next_post) || !empty($previous_post) ) { 
        ?>
        <div class="entry-navigation">
            <div class="nav-links">
                <div class="nav-item nav-post-prev">
                    <?php if ( is_a( $previous_post , 'WP_Post' ) && get_the_title( $previous_post->ID ) != '') { 
                        $prev_img_id = get_post_thumbnail_id($previous_post->ID);
                        $prev_img_url = wp_get_attachment_image_src($prev_img_id, 'itfirm-nav');
                        ?>
                        <a class="nav-post-label" href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><i class="caseicon-double-chevron-left"></i><?php echo esc_html__('Previous Post', 'itfirm'); ?></a>
                        <div class="nav-post-holder">
                            <?php if(!empty($prev_img_id)) : ?>
                                <div class="nav-post-img">
                                    <a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><img src="<?php echo wp_kses_post($prev_img_url[0]); ?>" /></a>
                                </div>
                            <?php endif; ?>
                            <div class="nav-post-meta">
                                <a  href="<?php echo esc_url(get_permalink( $previous_post->ID )); ?>"><?php echo get_the_title( $previous_post->ID ); ?></a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
                <div class="nav-item nav-post-next">
                    <?php if ( is_a( $next_post , 'WP_Post' ) && get_the_title( $next_post->ID ) != '') {
                        $next_img_id = get_post_thumbnail_id($next_post->ID);
                        $next_img_url = wp_get_attachment_image_src($next_img_id, 'itfirm-nav');
                        ?>
                        <a class="nav-post-label" href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo esc_html__('Next Post', 'itfirm'); ?><i class="caseicon-double-chevron-right"></i></a>
                        <div class="nav-post-holder">
                            <div class="nav-post-meta">
                                <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><?php echo get_the_title( $next_post->ID ); ?></a>
                            </div>
                            <?php if(!empty($next_img_id)) : ?>
                                <div class="nav-post-img">
                                    <a href="<?php echo esc_url(get_permalink( $next_post->ID )); ?>"><img src="<?php echo wp_kses_post($next_img_url[0]); ?>" /></a>
                                </div>
                            <?php endif; ?>
                        </div>
                    <?php } ?>
                </div>
            </div><!-- .nav-links -->
        </div>
    <?php }
}

/**
 * Custom Widget Categories
 */
add_filter('wp_list_categories', 'itfirm_cat_count_span');
function itfirm_cat_count_span($output) {
    $dir = is_rtl() ? 'left' : 'right';
    $output = str_replace("\t", '', $output);
    $output = str_replace(")\n</li>", ')</li>', $output);
    $output = str_replace('</a> (', '<span class="count '.$dir.'">', $output);
    $output = str_replace(")</li>", "</span></a></li>", $output);
    $output = str_replace("\n<ul", "</span></a>\n<ul", $output);
    return $output;
}


/**
 * Custom Widget Archive
 */
add_filter('get_archives_link', 'itfirm_archive_count_span');
function itfirm_archive_count_span($links) {
    $dir = is_rtl() ? 'left' : 'right';
    $links = str_replace('</a>&nbsp;(', ' <span class="count '.$dir.'">', $links);
    $links = str_replace(')', '</span></a>', $links);
    return $links;
}

/**
 * Custom Widget Product Categories 
 */
add_filter('wp_list_categories', 'itfirm_wc_cat_count_span');
function itfirm_wc_cat_count_span($links) {
    $dir = is_rtl() ? 'left' : 'right';
    $links = str_replace('</a> <span class="count">(', ' <span class="count '.$dir.'">', $links);
    $links = str_replace(')</span>', '</span></a>', $links);
    return $links;
}

/* Favicon */
function itfirm_site_favicon(){
    
    $favicon = itfirm_get_opt( 'favicon' );
    
    if(!empty($favicon['url']))
        echo '<link rel="icon" type="image/png" href="'.esc_url($favicon['url']).'"/>';
}
add_action('wp_head', 'itfirm_site_favicon');

/**
 * Add Template Woocommerce
 */
if(class_exists('Woocommerce')){
    require_once( get_template_directory() . '/woocommerce/wc-function-hooks.php' );
}

/**
 * Show Cart Sidebar Hidden
 */
add_action('wp_ajax_nopriv_item_added', 'itfirm_addedtocart_sweet_message');
add_action('wp_ajax_item_added', 'itfirm_addedtocart_sweet_message');
function itfirm_addedtocart_sweet_message() {
    echo isset($_POST['id']) && $_POST['id'] > 0 ? (int) esc_attr($_POST['id']) : false;
    die();
}
add_action('wp_footer', 'itfirm_product_count_check');
function itfirm_product_count_check() {
    if (class_exists('Woocommerce') && is_checkout())
        return;
    ?>
    <script type="text/javascript">
        jQuery( function($) {
            if ( typeof wc_add_to_cart_params === 'undefined' )
                return false;

            $(document.body).on( 'added_to_cart', function( event, fragments, cart_hash, $button ) {
                var $pid = $button.data('product_id');

                $.ajax({
                    type: 'POST',
                    url: wc_add_to_cart_params.ajax_url,
                    data: {
                        'action': 'item_added',
                        'id'    : $pid
                    },
                    success: function (response) {
                        $('.ct-widget-cart-wrap').addClass('open');
                    }
                });
            });
        });
    </script>
    <?php
}

/* Product Search */
function itfirm_get_product_search()
{
    if (class_exists('Woocommerce')) :
        $term = get_terms(array('taxonomy' => 'product_cat')); 
        $myaccount_page = get_option( 'woocommerce_myaccount_page_id' );
        $myaccount_page_url = '';
        $myaccount_page_url = get_permalink( $myaccount_page );
        ?>
        <div class="ct-header-product-search">
            <form action="<?php echo esc_url(home_url('/')); ?>" class="product-searchform" method="get">
                <div class="product-search-category">
                    <select name="product_cat">
                        <option value=""><?php esc_html_e('Select a Categories', 'itfirm'); ?></option>
                        <?php
                        foreach ($term as $key => $value) {
                            echo '<option value=' . $value->slug . '>' . $value->name . '</option>';
                        } ?>
                    </select>
                </div>
                <div class="product-search-meta">
                    <input type="text" name="s" value="" placeholder="<?php esc_html_e('Search Product', 'itfirm'); ?>">
                    <button type="submit" class="btn btn-animate"><?php esc_html_e('Search', 'itfirm'); ?></button>
                    <input type="hidden" name="post_type" value="product"/>
                </div>
            </form>
        </div>
    <?php endif;
}

function itfirm_get_product_search_h3()
{
    if (class_exists('Woocommerce')) :
        $term = get_terms(array('taxonomy' => 'product_cat')); 
        $myaccount_page = get_option( 'woocommerce_myaccount_page_id' );
        $myaccount_page_url = '';
        $myaccount_page_url = get_permalink( $myaccount_page );
        ?>
        <div class="ct-header-product-search2">
            <form action="<?php echo esc_url(home_url('/')); ?>" class="product-searchform" method="get">
                <div class="product-search-meta">
                    <input type="text" name="s" value="" placeholder="<?php esc_html_e('Search products...', 'itfirm'); ?>">
                    <div class="product-search-category">
                        <select name="product_cat">
                            <option value=""><?php esc_html_e('Category', 'itfirm'); ?></option>
                            <?php
                            foreach ($term as $key => $value) {
                                echo '<option value=' . $value->slug . '>' . $value->name . '</option>';
                            } ?>
                        </select>
                    </div>
                    <button type="submit" class="product-search-submit"><i class="caseicon-search"></i></button>
                    <input type="hidden" name="post_type" value="product"/>
                </div>
            </form>
        </div>
    <?php endif;
}

/**
 * Animate
*/

function itfirm_animate() {
    $ct_animate = array(
        '' => 'None',
        'wow bounce' => 'bounce',
        'wow flash' => 'flash',
        'wow pulse' => 'pulse',
        'wow rubberBand' => 'rubberBand',
        'wow shake' => 'shake',
        'wow swing' => 'swing',
        'wow tada' => 'tada',
        'wow wobble' => 'wobble',
        'wow bounceIn' => 'bounceIn',
        'wow bounceInDown' => 'bounceInDown',
        'wow bounceInLeft' => 'bounceInLeft',
        'wow bounceInRight' => 'bounceInRight',
        'wow bounceInUp' => 'bounceInUp',
        'wow bounceOut' => 'bounceOut',
        'wow bounceOutDown' => 'bounceOutDown',
        'wow bounceOutLeft' => 'bounceOutLeft',
        'wow bounceOutRight' => 'bounceOutRight',
        'wow bounceOutUp' => 'bounceOutUp',
        'wow fadeIn' => 'fadeIn',
        'wow fadeInDown' => 'fadeInDown',
        'wow fadeInDownBig' => 'fadeInDownBig',
        'wow fadeInLeft' => 'fadeInLeft',
        'wow fadeInLeftBig' => 'fadeInLeftBig',
        'wow fadeInRight' => 'fadeInRight',
        'wow fadeInRightBig' => 'fadeInRightBig',
        'wow fadeInUp' => 'fadeInUp',
        'wow fadeInUpBig' => 'fadeInUpBig',
        'wow fadeOut' => 'fadeOut',
        'wow fadeOutDown' => 'fadeOutDown',
        'wow fadeOutDownBig' => 'fadeOutDownBig',
        'wow fadeOutLeft' => 'fadeOutLeft',
        'wow fadeOutLeftBig' => 'fadeOutLeftBig',
        'wow fadeOutRight' => 'fadeOutRight',
        'wow fadeOutRightBig' => 'fadeOutRightBig',
        'wow fadeOutUp' => 'fadeOutUp',
        'wow fadeOutUpBig' => 'fadeOutUpBig',
        'wow flip' => 'flip',
        'wow flipInX' => 'flipInX',
        'wow flipInY' => 'flipInY',
        'wow flipOutX' => 'flipOutX',
        'wow flipOutY' => 'flipOutY',
        'wow lightSpeedIn' => 'lightSpeedIn',
        'wow lightSpeedOut' => 'lightSpeedOut',
        'wow rotateIn' => 'rotateIn',
        'wow rotateInDownLeft' => 'rotateInDownLeft',
        'wow rotateInDownRight' => 'rotateInDownRight',
        'wow rotateInUpLeft' => 'rotateInUpLeft',
        'wow rotateInUpRight' => 'rotateInUpRight',
        'wow rotateOut' => 'rotateOut',
        'wow rotateOutDownLeft' => 'rotateOutDownLeft',
        'wow rotateOutDownRight' => 'rotateOutDownRight',
        'wow rotateOutUpLeft' => 'rotateOutUpLeft',
        'wow rotateOutUpRight' => 'rotateOutUpRight',
        'wow hinge' => 'hinge',
        'wow rollIn' => 'rollIn',
        'wow rollOut' => 'rollOut',
        'wow zoomIn' => 'zoomIn',
        'wow zoomInDown' => 'zoomInDown',
        'wow zoomInLeft' => 'zoomInLeft',
        'wow zoomInRight' => 'zoomInRight',
        'wow zoomInUp' => 'zoomInUp',
        'wow zoomOut' => 'zoomOut',
        'wow zoomOutDown' => 'zoomOutDown',
        'wow zoomOutLeft' => 'zoomOutLeft',
        'wow zoomOutRight' => 'zoomOutRight',
        'wow zoomOutUp' => 'zoomOutUp',
    );
    return $ct_animate;
}

function itfirm_animate_case() {
    $ct_animate = array(
        '' => 'None',
        'case-fade-in-up' => 'Case Fade In Up',
        'wow bounce' => 'bounce',
        'wow flash' => 'flash',
        'wow pulse' => 'pulse',
        'wow rubberBand' => 'rubberBand',
        'wow shake' => 'shake',
        'wow swing' => 'swing',
        'wow tada' => 'tada',
        'wow wobble' => 'wobble',
        'wow bounceIn' => 'bounceIn',
        'wow bounceInDown' => 'bounceInDown',
        'wow bounceInLeft' => 'bounceInLeft',
        'wow bounceInRight' => 'bounceInRight',
        'wow bounceInUp' => 'bounceInUp',
        'wow bounceOut' => 'bounceOut',
        'wow bounceOutDown' => 'bounceOutDown',
        'wow bounceOutLeft' => 'bounceOutLeft',
        'wow bounceOutRight' => 'bounceOutRight',
        'wow bounceOutUp' => 'bounceOutUp',
        'wow fadeIn' => 'fadeIn',
        'wow fadeInDown' => 'fadeInDown',
        'wow fadeInDownBig' => 'fadeInDownBig',
        'wow fadeInLeft' => 'fadeInLeft',
        'wow fadeInLeftBig' => 'fadeInLeftBig',
        'wow fadeInRight' => 'fadeInRight',
        'wow fadeInRightBig' => 'fadeInRightBig',
        'wow fadeInUp' => 'fadeInUp',
        'wow fadeInUpBig' => 'fadeInUpBig',
        'wow fadeOut' => 'fadeOut',
        'wow fadeOutDown' => 'fadeOutDown',
        'wow fadeOutDownBig' => 'fadeOutDownBig',
        'wow fadeOutLeft' => 'fadeOutLeft',
        'wow fadeOutLeftBig' => 'fadeOutLeftBig',
        'wow fadeOutRight' => 'fadeOutRight',
        'wow fadeOutRightBig' => 'fadeOutRightBig',
        'wow fadeOutUp' => 'fadeOutUp',
        'wow fadeOutUpBig' => 'fadeOutUpBig',
        'wow flip' => 'flip',
        'wow flipInX' => 'flipInX',
        'wow flipInY' => 'flipInY',
        'wow flipOutX' => 'flipOutX',
        'wow flipOutY' => 'flipOutY',
        'wow lightSpeedIn' => 'lightSpeedIn',
        'wow lightSpeedOut' => 'lightSpeedOut',
        'wow rotateIn' => 'rotateIn',
        'wow rotateInDownLeft' => 'rotateInDownLeft',
        'wow rotateInDownRight' => 'rotateInDownRight',
        'wow rotateInUpLeft' => 'rotateInUpLeft',
        'wow rotateInUpRight' => 'rotateInUpRight',
        'wow rotateOut' => 'rotateOut',
        'wow rotateOutDownLeft' => 'rotateOutDownLeft',
        'wow rotateOutDownRight' => 'rotateOutDownRight',
        'wow rotateOutUpLeft' => 'rotateOutUpLeft',
        'wow rotateOutUpRight' => 'rotateOutUpRight',
        'wow hinge' => 'hinge',
        'wow rollIn' => 'rollIn',
        'wow rollOut' => 'rollOut',
        'wow zoomIn' => 'zoomIn',
        'wow zoomInDown' => 'zoomInDown',
        'wow zoomInLeft' => 'zoomInLeft',
        'wow zoomInRight' => 'zoomInRight',
        'wow zoomInUp' => 'zoomInUp',
        'wow zoomOut' => 'zoomOut',
        'wow zoomOutDown' => 'zoomOutDown',
        'wow zoomOutLeft' => 'zoomOutLeft',
        'wow zoomOutRight' => 'zoomOutRight',
        'wow zoomOutUp' => 'zoomOutUp',
    );
    return $ct_animate;
}

/* Addd shortcode Gallery */
if(function_exists( 'ct_register_shortcode' )) {
    function itfirm_gallery_shortcode( $atts = array() ) {
        extract(shortcode_atts(array(
         'link' => '#',
         'images_id' => '',
         'cols' => '2',
         'img_size' => 'full'
        ), $atts));

        ob_start();
        ?>
        <div class="ct-gallery gallery-<?php echo esc_attr($cols); ?>-columns">
        <?php
        $ct_images = explode( ',', $images_id );
        foreach ($ct_images as $key => $img_id) :
            $img = ct_get_image_by_size( array(
                'attach_id'  => $img_id,
                'thumb_size' => $img_size,
                'class'      => '',
            ));
            $thumbnail = $img['thumbnail'];
            ?>
            <div class="ct-gallery-item">
                <?php echo ct_print_html($thumbnail); ?>
                <?php if($key == 0) : ?>
                    <a href="<?php echo esc_url($link); ?>" class="btn-video"><i class="fa fa-play"></i></a>
                <?php endif; ?>
            </div>
            <?php
        endforeach;
        ?>
        </div>
        <?php
        $output = ob_get_clean();

        return $output;
    }
    ct_register_shortcode('ct_gallery', 'itfirm_gallery_shortcode');
}

if(function_exists( 'ct_register_shortcode' )) {
    function itfirm_year() { 
        ob_start(); ?>
        <span class="ct-year"><?php echo esc_attr(date("Y")); ?></span>
        <?php
        $output = ob_get_clean();

        return $output;
    }
    ct_register_shortcode('ct_year', 'itfirm_year');
}

if(function_exists( 'ct_register_shortcode' )) {
    function itfirm_list_check($atts = array()) {
        extract(shortcode_atts(array(
            'text' => '',
        ), $atts));
        ob_start(); ?>
        <?php if(!empty($text)) : ?>
            <div class="ct-list-check"><i class="flaticon-check"></i><?php echo esc_attr($text); ?></div>
        <?php endif; ?>
        <?php
        $output = ob_get_clean();

        return $output;
    }
    ct_register_shortcode('ct_list_check', 'itfirm_list_check');
}

if(function_exists( 'ct_register_shortcode' )) {
    function itfirm_button_shortcode($atts = array()) {
        extract(shortcode_atts(array(
            'text' => '',
            'link' => '',
        ), $atts));
        ob_start(); ?>
        <?php if(!empty($text)) : ?>
            <a class="ct-button-shortcode btn btn-outline-gradient btn-nina" href="<?php echo esc_url($link); ?>">
                <span class="pxl--btn-text" data-text="<?php echo esc_attr($text); ?>">
                    <?php 
                        $chars = str_split($text); 
                        foreach ($chars as $value) {
                            if($value == ' ') {
                                echo '<span class="spacer">&nbsp;</span>';
                            } else {
                                echo '<span>'.$value.'</span>';
                            }
                        } 
                    ?>
                </span>
            </a>
        <?php endif; ?>
        <?php
        $output = ob_get_clean();

        return $output;
    }
    ct_register_shortcode('ct_button', 'itfirm_button_shortcode');
}

if(function_exists( 'ct_register_shortcode' )) {
    function itfirm_pagination_slider($atts = array()) {
        extract(shortcode_atts(array(
            'number' => '',
            'total' => '',
        ), $atts));
        ob_start(); ?>
        <?php if(!empty($total)) : ?>
            <div class="ct-pagination-slider">
                <div class="item--number">
                    <span><?php echo esc_attr($number); ?></span>
                </div>
                <div class="item--total">/ <?php echo esc_attr($total); ?></div>
            </div>
        <?php endif; ?>
        <?php
        $output = ob_get_clean();

        return $output;
    }
    ct_register_shortcode('ct_pagination_slider', 'itfirm_pagination_slider');
}


/* Addd shortcode Video button */
if(function_exists( 'ct_register_shortcode' )) {
    function itfirm_video_button_shortcode( $atts = array() ) {
        extract(shortcode_atts(array(
         'btn_link' => 'https://www.youtube.com/watch?v=SF4aHwxHtZ0',
         'btn_text' => '',
         'btn_style' => 'slider-style1',
        ), $atts));

        ob_start();
        ?>
        <a href="<?php echo esc_url($btn_link); ?>" class="ct-slider-video">
            <span class="slider-video-button <?php echo esc_attr($btn_style); ?>">
                <i class="fa fa-play"></i>
            </span>
            <?php if(!empty($btn_text)) : ?>
                <span class="slider-video-title"><?php echo esc_attr($btn_text); ?></span>
            <?php endif; ?>
        </a>
        <?php
        $output = ob_get_clean();

        return $output;
    }
    ct_register_shortcode('ct_video_button', 'itfirm_video_button_shortcode');
}

/* Addd shortcode highlight */
if(function_exists( 'ct_register_shortcode' )) {
    function itfirm_text_highlight_shortcode( $atts = array() ) {
        extract(shortcode_atts(array(
         'text' => '',
        ), $atts));

        ob_start();
        if(!empty($text)) : ?>
        <cite class="ct-text-highlight">
            <?php echo esc_attr($text); ?>
        </cite>
        <?php  endif;
        $output = ob_get_clean();

        return $output;
    }
    ct_register_shortcode('highlight', 'itfirm_text_highlight_shortcode');
}

/* Addd shortcode slider box */
if(function_exists( 'ct_register_shortcode' )) {
    function itfirm_slider_box_text_shortcode( $atts = array() ) {
        extract(shortcode_atts(array(
         'icon_class' => '',
         'text' => '',
         'link' => '',
        ), $atts));

        ob_start();
        if(!empty($text)) : ?>
        <div class="ct-slider-boxtext">
            <?php if(!empty($icon_class)) : ?>
                <div class="item--icon"><i class="<?php echo esc_attr($icon_class); ?>"></i></div>
            <?php endif; ?>
            <div class="item--content">
                <?php echo esc_attr($text); ?>
            </div>
            <?php if(!empty($icon_class)) : ?>
                <a href="<?php echo esc_url($link); ?>" class="item--link"></a>
            <?php endif; ?>
        </div>
        <?php  endif;
        $output = ob_get_clean();

        return $output;
    }
    ct_register_shortcode('boxtext', 'itfirm_slider_box_text_shortcode');
}

/* Post Type Support */
function itfirm_add_cpt_support() {
    $cpt_support = get_option( 'elementor_cpt_support' );
    
    if( ! $cpt_support ) {
        $cpt_support = [ 'page', 'post', 'portfolio', 'service', 'footer', 'header', 'ct-mega-menu' ];
        update_option( 'elementor_cpt_support', $cpt_support );
    }
    
    else if( ! in_array( 'portfolio', $cpt_support ) ) {
        $cpt_support[] = 'portfolio';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

    else if( ! in_array( 'service', $cpt_support ) ) {
        $cpt_support[] = 'service';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

    else if( ! in_array( 'header', $cpt_support ) ) {
        $cpt_support[] = 'header';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

    else if( ! in_array( 'footer', $cpt_support ) ) {
        $cpt_support[] = 'footer';
        update_option( 'elementor_cpt_support', $cpt_support );
    }

    else if( ! in_array( 'ct-mega-menu', $cpt_support ) ) {
        $cpt_support[] = 'ct-mega-menu';
        update_option( 'elementor_cpt_support', $cpt_support );
    }
}
add_action( 'after_switch_theme', 'itfirm_add_cpt_support');

/* Custom Archive Post Type Link */
add_filter( 'post_type_archive_link', 'itfirm_get_post_type_archive_link', 10, 2 );
function itfirm_get_post_type_archive_link($link, $post_type){

    if( $post_type == 'portfolio'){
        $archive_portfolio_link = itfirm_get_opt( 'archive_portfolio_link' );
            if( !empty($archive_portfolio_link) ){ 
            $link = get_permalink($archive_portfolio_link);
        }
    }

    if( $post_type == 'service'){
        $archive_service_link = itfirm_get_opt( 'archive_service_link' );
            if( !empty($archive_service_link) ){ 
            $link = get_permalink($archive_service_link);
        }
    }

  return $link;
}


/* Mouse Move Animation */
function itfirm_mouse_move_animation() { 
    $mouse_move_animation = itfirm_get_opt( 'mouse_move_animation', false );
    if($mouse_move_animation) {
        wp_enqueue_script( 'itfirm-cursor', get_template_directory_uri() . '/assets/js/cursor.js', array( 'jquery' ), '1.0.0', true ); ?>  
        <div class="ct-cursor ct-js-cursor">
            <div class="ct-cursor-wrapper">
                <div class="ct-cursor--follower ct-js-follower"></div>
                <div class="ct-cursor--label ct-js-label"></div>
                <div class="ct-cursor--icon ct-js-icon"></div>
            </div>
        </div>
    <?php }
}