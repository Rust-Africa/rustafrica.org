<?php
/**
 * Template part for displaying the primary menu of the site
 */
$h_custom_menu = itfirm_get_page_opt('h_custom_menu_mobile');
if ( has_nav_menu( 'mobile-menu' ) )
{
    $attr_menu = array(
        'theme_location' => 'mobile-menu',
        'container'  => '',
        'menu_class' => 'ct-main-menu clearfix',
        'link_before'     => '<span>',
        'link_after'      => '</span>',
        'walker'         => class_exists( 'EFramework_Mega_Menu_Walker' ) ? new EFramework_Mega_Menu_Walker : '',
    );
    if(isset($h_custom_menu) && !empty($h_custom_menu)) {
        $attr_menu['menu'] = $h_custom_menu;
    }
    wp_nav_menu( $attr_menu );
} elseif ( has_nav_menu( 'primary' ) ) {
    $attr_menu = array(
        'theme_location' => 'primary',
        'container'  => '',
        'menu_class' => 'ct-main-menu clearfix',
        'link_before'     => '<span>',
        'link_after'      => '</span>',
        'walker'         => class_exists( 'EFramework_Mega_Menu_Walker' ) ? new EFramework_Mega_Menu_Walker : '',
    );
    if(isset($h_custom_menu) && !empty($h_custom_menu)) {
        $attr_menu['menu'] = $h_custom_menu;
    }
    wp_nav_menu( $attr_menu );
} else { ?>
    <ul class="ct-main-menu">
        <?php wp_list_pages( array(
            'depth'        => 0,
            'show_date'    => '',
            'date_format'  => get_option( 'date_format' ),
            'child_of'     => 0,
            'exclude'      => '',
            'title_li'     => '',
            'echo'         => 1,
            'authors'      => '',
            'sort_column'  => 'menu_order, post_title',
            'link_before'  => '',
            'link_after'   => '',
            'item_spacing' => 'preserve',
            'walker'       => '',
        ) ); ?>
    </ul>
<?php }