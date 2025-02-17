<?php
$default_settings = [
    'menu' => '',
    'style_l1' => '',
    'hover_active_style' => '',
    'line_color_gr_from' => '',
    'line_color_gr_to' => '',
    'mega_fullwidth' => '',
];
$settings = array_merge($default_settings, $settings);
extract($settings);
$html_id = ct_get_element_id($settings);
$h_custom_main_menu = itfirm_get_page_opt('h_custom_main_menu');
if(!empty($h_custom_main_menu)) {
    $menu = $h_custom_main_menu;
}

if(!empty($menu)) { ?>
    <div id="<?php echo esc_attr($html_id); ?>" class="ct-nav-menu ct-nav-menu1 <?php echo esc_attr($style_l1.' '.$hover_active_style.' '.$sub_hover_active_style); if($mega_fullwidth == 'yes') { echo ' ct-mega-fullwidth'; } ?>">
        <div class="ct-inline-css"  data-css="
            <?php if( !empty($line_color_gr_from) && !empty($line_color_gr_to) ) : ?>
                #<?php echo esc_attr($html_id) ?>.ct-nav-menu1.style2 .ct-main-menu > li > a::before,
                #<?php echo esc_attr($html_id) ?>.ct-nav-menu1.style3 .ct-main-menu > li > a::before {
                    background-image: -webkit-gradient(linear, left top, left bottom, from(<?php echo esc_attr($line_color_gr_from); ?>), to(<?php echo esc_attr($line_color_gr_to); ?>));
                    background-image: -webkit-linear-gradient(to left, <?php echo esc_attr($line_color_gr_from); ?>, <?php echo esc_attr($line_color_gr_to); ?>);
                    background-image: -moz-linear-gradient(to left, <?php echo esc_attr($line_color_gr_from); ?>, <?php echo esc_attr($line_color_gr_to); ?>);
                    background-image: -ms-linear-gradient(to left, <?php echo esc_attr($line_color_gr_from); ?>, <?php echo esc_attr($line_color_gr_to); ?>);
                    background-image: -o-linear-gradient(to left, <?php echo esc_attr($line_color_gr_from); ?>, <?php echo esc_attr($line_color_gr_to); ?>);
                    background-image: linear-gradient(to left, <?php echo esc_attr($line_color_gr_from); ?>, <?php echo esc_attr($line_color_gr_to); ?>);
                    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($line_color_gr_from); ?>', endColorStr='<?php echo esc_attr($line_color_gr_to); ?>');
                }
            <?php endif; ?>">
        </div>
        <?php wp_nav_menu(array(
            'menu_class' => 'ct-main-menu clearfix',
            'walker'     => class_exists( 'EFramework_Mega_Menu_Walker' ) ? new EFramework_Mega_Menu_Walker : '',
            'link_before'     => '<span class="ct-menu-item"><span class="ct-item--number"><span></span></span>',
            'link_after'      => '</span><span class="ct-menu--plus"></span><span class="ct-menu--line"></span>',
            'menu'        => wp_get_nav_menu_object($menu))
        ); ?>
    </div>
<?php } elseif( has_nav_menu( 'primary' ) ) { ?>
    <div id="<?php echo esc_attr($html_id); ?>" class="ct-nav-menu ct-nav-menu1 <?php echo esc_attr($style_l1.' '.$hover_active_style.' '.$sub_hover_active_style); if($mega_fullwidth == 'yes') { echo ' ct-mega-fullwidth'; } ?>">
        <div class="ct-inline-css"  data-css="
            <?php if( !empty($line_color_gr_from) && !empty($line_color_gr_to) ) : ?>
                #<?php echo esc_attr($html_id) ?>.ct-nav-menu1.style2 .ct-main-menu > li > a::before,
                #<?php echo esc_attr($html_id) ?>.ct-nav-menu1.style3 .ct-main-menu > li > a::before {
                    background-image: -webkit-gradient(linear, left top, left bottom, from(<?php echo esc_attr($line_color_gr_from); ?>), to(<?php echo esc_attr($line_color_gr_to); ?>));
                    background-image: -webkit-linear-gradient(to left, <?php echo esc_attr($line_color_gr_from); ?>, <?php echo esc_attr($line_color_gr_to); ?>);
                    background-image: -moz-linear-gradient(to left, <?php echo esc_attr($line_color_gr_from); ?>, <?php echo esc_attr($line_color_gr_to); ?>);
                    background-image: -ms-linear-gradient(to left, <?php echo esc_attr($line_color_gr_from); ?>, <?php echo esc_attr($line_color_gr_to); ?>);
                    background-image: -o-linear-gradient(to left, <?php echo esc_attr($line_color_gr_from); ?>, <?php echo esc_attr($line_color_gr_to); ?>);
                    background-image: linear-gradient(to left, <?php echo esc_attr($line_color_gr_from); ?>, <?php echo esc_attr($line_color_gr_to); ?>);
                    filter: progid:DXImageTransform.Microsoft.gradient(startColorStr='<?php echo esc_attr($line_color_gr_from); ?>', endColorStr='<?php echo esc_attr($line_color_gr_to); ?>');
                }
            <?php endif; ?>">
        </div>
        <?php $attr_menu = array(
            'theme_location' => 'primary',
            'menu_class' => 'ct-main-menu clearfix',
            'link_before'     => '<span>',
            'link_after'      => '</span>',
            'walker'         => class_exists( 'EFramework_Mega_Menu_Walker' ) ? new EFramework_Mega_Menu_Walker : '',
        );
        wp_nav_menu( $attr_menu ); ?>
    </div>
<?php } ?>