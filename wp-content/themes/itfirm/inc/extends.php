<?php
/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package Itfirm
 */

/*
 * Get page ID by Slug
*/
function itfirm_get_id_by_slug($slug, $post_type){
    $content = get_page_by_path($slug, OBJECT, $post_type);
    $id = $content->ID;
    return $id;
}

/**
 * Get content by slug
 **/
function itfirm_get_content_by_slug($slug, $post_type){
    $content = get_posts(
        array(
            'name'      => $slug,
            'post_type' => $post_type
        )
    );
    if(!empty($content))
        return $content[0]->post_content;
    else
        return;
}

/**
 * Show content by slug
 **/
if(!function_exists('itfirm_content_by_slug')){
    function itfirm_content_by_slug($slug, $post_type){
        $content = itfirm_get_content_by_slug($slug, $post_type);

        $id = itfirm_get_id_by_slug($slug, $post_type);
        echo apply_filters('the_content',  $content);
    }
}

/**
 * Adds custom classes to the array of body classes.
 *
 * @param array $classes Classes for the body element.
 * @return array
 */
function itfirm_body_classes( $classes )
{   
    // Adds a class of group-blog to blogs with more than 1 published author.
    if (is_multi_author()) {
        $classes[] = 'group-blog';
    }

    // Adds a class of hfeed to non-singular pages.
    if (!is_singular()) {
        $classes[] = 'hfeed';
    }

    if (itfirm_get_opt( 'site_boxed', false )) {
        $classes[] = 'site-boxed';
    }

    if (class_exists('ReduxFramework')) {
        $classes[] = 'redux-page';
    }

    $header_layout = itfirm_get_opt( 'header_layout', '1' );
    $custom_header = itfirm_get_page_opt( 'custom_header', '0' );
    if ( $custom_header == '1' ){
        $page_header_layout = itfirm_get_page_opt('header_layout');
        $header_layout = $page_header_layout;
    }
    if (class_exists('ReduxFramework')) {
        $classes[] = ' site-h'.$header_layout;
    }

    $body_default_font = itfirm_get_opt( 'body_default_font', 'Roboto' );
    $heading_default_font = itfirm_get_opt( 'heading_default_font', 'Fira-Sans' );

    if($body_default_font == 'Roboto') {
        $classes[] = 'body-default-font';
    }

    if($heading_default_font == 'Fira-Sans') {
        $classes[] = 'heading-default-font';
    }

    if (itfirm_get_opt( 'sticky_on', false )) {
        $classes[] = 'header-sticky';
    }

    $page_404 = itfirm_get_opt( 'page_404' );
    if(isset($page_404)) {
        $classes[] = ' site-404-'.$page_404;
    }

    $fixed_footer = itfirm_get_opt('fixed_footer');
    $p_fixed_footer = itfirm_get_page_opt('fixed_footer');
    if(isset($p_fixed_footer) && !empty($p_fixed_footer) && $p_fixed_footer == 'on') {
        $fixed_footer = $p_fixed_footer;
    }
    if(isset($fixed_footer) && $fixed_footer == 'on') {
        $classes[] = ' fixed-footer';
    }

    return $classes;
}
add_filter( 'body_class', 'itfirm_body_classes' );


/**
 * Add a pingback url auto-discovery header for singularly identifiable articles.
 */
function itfirm_pingback_header()
{
    if ( is_singular() && pings_open() )
    {
        echo '<link rel="pingback" href="', esc_url( get_bloginfo( 'pingback_url' ) ), '">';
    }
}
add_action( 'wp_head', 'itfirm_pingback_header' );
