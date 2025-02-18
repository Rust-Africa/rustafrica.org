<?php
if (!class_exists('ReduxFramework')) {
    return;
}
if (class_exists('ReduxFrameworkPlugin')) {
    remove_action('admin_notices', array(ReduxFrameworkPlugin::instance(), 'admin_notices'));
}

$opt_name = itfirm_get_opt_name();
$theme = wp_get_theme();

$args = array(
    // TYPICAL -> Change these values as you need/desire
    'opt_name'             => $opt_name,
    // This is where your data is stored in the database and also becomes your global variable name.
    'display_name'         => $theme->get('Name'),
    // Name that appears at the top of your panel
    'display_version'      => $theme->get('Version'),
    // Version that appears at the top of your panel
    'menu_type'            => class_exists('Case_Theme_Core') ? 'submenu' : '',
    //Specify if the admin menu should appear or not. Options: menu or submenu (Under appearance only)
    'allow_sub_menu'       => true,
    // Show the sections below the admin menu item or not
    'menu_title'           => esc_html__('Theme Options', 'itfirm'),
    'page_title'           => esc_html__('Theme Options', 'itfirm'),
    // You will need to generate a Google API key to use this feature.
    // Please visit: https://developers.google.com/fonts/docs/developer_api#Auth
    'google_api_key'       => '',
    // Set it you want google fonts to update weekly. A google_api_key value is required.
    'google_update_weekly' => false,
    // Must be defined to add google fonts to the typography module
    'async_typography'     => false,
    // Use a asynchronous font on the front end or font string
    //'disable_google_fonts_link' => true,                    // Disable this in case you want to create your own google fonts loader
    'admin_bar'            => true,
    // Show the panel pages on the admin bar
    'admin_bar_icon'       => 'dashicons-admin-generic',
    // Choose an icon for the admin bar menu
    'admin_bar_priority'   => 50,
    // Choose an priority for the admin bar menu
    'global_variable'      => '',
    // Set a different name for your global variable other than the opt_name
    'dev_mode'             => true,
    // Show the time the page took to load, etc
    'update_notice'        => true,
    // If dev_mode is enabled, will notify developer of updated versions available in the GitHub Repo
    'customizer'           => true,
    // Enable basic customizer support
    //'open_expanded'     => true,                    // Allow you to start the panel in an expanded way initially.
    //'disable_save_warn' => true,                    // Disable the save warning when a user changes a field
    'show_options_object' => false,
    // OPTIONAL -> Give you extra features
    'page_priority'        => null,
    // Order where the menu appears in the admin area. If there is any conflict, something will not show. Warning.
    'page_parent'          => class_exists('Case_Theme_Core') ? $theme->get('TextDomain') : '',
    // For a full list of options, visit: //codex.wordpress.org/Function_Reference/add_submenu_page#Parameters
    'page_permissions'     => 'manage_options',
    // Permissions needed to access the options panel.
    'menu_icon'            => '',
    // Specify a custom URL to an icon
    'last_tab'             => '',
    // Force your panel to always open to a specific tab (by id)
    'page_icon'            => 'icon-themes',
    // Icon displayed in the admin panel next to your menu_title
    'page_slug'            => 'theme-options',
    // Page slug used to denote the panel, will be based off page title then menu title then opt_name if not provided
    'save_defaults'        => true,
    // On load save the defaults to DB before user clicks save or not
    'default_show'         => false,
    // If true, shows the default value next to each field that is not the default value.
    'default_mark'         => '',
    // What to print by the field's title if the value shown is default. Suggested: *
    'show_import_export'   => true,
    // Shows the Import/Export panel when not used as a field.

    // CAREFUL -> These options are for advanced use only
    'transient_time'       => 60 * MINUTE_IN_SECONDS,
    'output'               => true,
    // Global shut-off for dynamic CSS output by the framework. Will also disable google fonts output
    'output_tag'           => true,
    // Allows dynamic CSS to be generated for customizer and google fonts, but stops the dynamic CSS from going to the head
    // 'footer_credit'     => '',                   // Disable the footer credit of Redux. Please leave if you can help it.

    // FUTURE -> Not in use yet, but reserved or partially implemented. Use at your own risk.
    'database'             => '',
    // possible: options, theme_mods, theme_mods_expanded, transient. Not fully functional, warning!
    'use_cdn'              => true,
    // If you prefer not to use the CDN for Select2, Ace Editor, and others, you may download the Redux Vendor Support plugin yourself and run locally or embed it in your code.

    // HINTS
    'hints'                => array(
        'icon'          => 'el el-question-sign',
        'icon_position' => 'right',
        'icon_color'    => 'lightgray',
        'icon_size'     => 'normal',
        'tip_style'     => array(
            'color'   => 'red',
            'shadow'  => true,
            'rounded' => false,
            'style'   => '',
        ),
        'tip_position'  => array(
            'my' => 'top left',
            'at' => 'bottom right',
        ),
        'tip_effect'    => array(
            'show' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'mouseover',
            ),
            'hide' => array(
                'effect'   => 'slide',
                'duration' => '500',
                'event'    => 'click mouseleave',
            ),
        ),
    ),
    'templates_path'       => get_template_directory() . '/inc/templates/redux/'
);

Redux::SetArgs($opt_name, $args);

/*--------------------------------------------------------------
# General
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('General', 'itfirm'),
    'icon'   => 'el-icon-home',
    'fields' => array(
        array(
            'id'       => 'favicon',
            'type'     => 'media',
            'title'    => esc_html__('Favicon', 'itfirm'),
            'default' => '',
            'url' => false
        ),
        array(
            'id'       => 'dev_mode',
            'type'     => 'switch',
            'title'    => esc_html__('Dev Mode (not recommended)', 'itfirm'),
            'description' => 'Scss generate css',
            'default'  => false
        ),
        array(
            'id'       => 'mouse_move_animation',
            'type'     => 'switch',
            'title'    => esc_html__('Mouse Move Animation', 'itfirm'),
            'default'  => false
        ),
        array(
            'title' => esc_html__('Page Loading', 'itfirm'),
            'type'  => 'section',
            'id' => 'page_lading',
            'indent' => true
        ),
        array(
            'id'       => 'show_page_loading',
            'type'     => 'switch',
            'title'    => esc_html__('Enable Page Loading', 'itfirm'),
            'subtitle' => esc_html__('Enable page loading effect when you load site.', 'itfirm'),
            'default'  => false
        ),
        array(
            'id'       => 'loading_type',
            'type'     => 'select',
            'title'    => esc_html__('Loading Style', 'itfirm'),
            'options'  => array(
                'style-image'  => esc_html__('Image', 'itfirm'),
                'style1'  => esc_html__('Style 1', 'itfirm'),
                'style2'  => esc_html__('Style 2', 'itfirm'),
                'style3'  => esc_html__('Style 3', 'itfirm'),
                'style4'  => esc_html__('Style 4', 'itfirm'),
                'style5'  => esc_html__('Style 5', 'itfirm'),
                'style6'  => esc_html__('Style 6', 'itfirm'),
                'style7'  => esc_html__('Style 7', 'itfirm'),
                'style8'  => esc_html__('Style 8', 'itfirm'),
                'style9'  => esc_html__('Style 9', 'itfirm'),
                'style10'  => esc_html__('Style 10', 'itfirm'),
                'style11'  => esc_html__('Style 11', 'itfirm'),
                'style12'  => esc_html__('Style 12', 'itfirm'),
                'style13'  => esc_html__('Style 13', 'itfirm'),
            ),
            'default'  => 'style1',
            'required' => array( 0 => 'show_page_loading', 1 => 'equals', 2 => '1' ),
            'force_output' => true
        ),
        array(
            'id'       => 'logo_loader',
            'type'     => 'media',
            'title'    => esc_html__('Logo Loader', 'itfirm'),
            'default' => '',
            'required' => array( 0 => 'loading_type', 1 => 'equals', 2 => 'style-image' ),
            'force_output' => true,
            'url' => false
        ),
    )
));

/*--------------------------------------------------------------
# Header
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Header', 'itfirm'),
    'icon'   => 'el el-indent-left',
    'fields' => array(
        array(
            'id'          => 'header_layout',
            'type'        => 'select',
            'title'       => esc_html__('Main Header Layout', 'itfirm'),
            'desc'        => sprintf(esc_html__('To use this Option please %sClick Here%s to add your header layout first.','itfirm'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=header' ) ) . '">','</a>'),
            'options'     =>itfirm_list_post('header'),
            'default'     => '',
        ),
        array(
            'id'          => 'header_layout_sticky',
            'type'        => 'select',
            'title'       => esc_html__('Sticky Header Layout', 'itfirm'),
            'desc'        => sprintf(esc_html__('To use this Option please %sClick Here%s to add your header layout first.','itfirm'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=header' ) ) . '">','</a>'),
            'options'     =>itfirm_list_post('header'),
            'default'     => '',
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Mobile', 'itfirm'),
    'icon'       => 'el el-picture',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'logo_m',
            'type'     => 'media',
            'title'    => esc_html__('Logo Mobile', 'itfirm'),
            'subtitle' => esc_html__('Screenshot < 1200px', 'itfirm'),
            'default' => array(
                'url'=>get_template_directory_uri().'/assets/images/logo.png'
            ),
            'url' => false
        ),
        array(
            'id'       => 'logo_maxh_sm',
            'type'     => 'dimensions',
            'title'    => esc_html__('Logo Max Height', 'itfirm'),
            'subtitle' => esc_html__('Enter number.', 'itfirm'),
            'width'    => false,
            'unit'     => 'px'
        ),
    )
));

/*--------------------------------------------------------------
# Page Title area
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Page Title', 'itfirm'),
    'icon'   => 'el-icon-map-marker',
    'fields' => array(

        array(
            'id'           => 'pagetitle',
            'type'         => 'button_set',
            'title'        => esc_html__( 'Page Title', 'itfirm' ),
            'options'      => array(
                'show'  => esc_html__( 'Show', 'itfirm' ),
                'hide'  => esc_html__( 'Hide', 'itfirm' ),
            ),
            'default'      => 'show',
        ),

        array(
            'id'          => 'pagetitle_color',
            'type'        => 'color',
            'title'       => esc_html__('Page Title Color', 'itfirm'),
            'transparent' => false,
            'default'     => '',
            'output'         => array('#ct-pagetitle .page-title'),
            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),

        array(
            'id'       => 'ptitle_bg',
            'type'     => 'background',
            'title'    => esc_html__('Background', 'itfirm'),
            'subtitle' => esc_html__('Page title background.', 'itfirm'),
            'output'   => array('body #ct-pagetitle'),
            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => 'show' ),
            'force_output' => true,
            'background-image' => true,
            'background-color' => false,
            'background-position' => false,
            'background-repeat' => false,
            'background-size' => false,
            'background-attachment' => false,
            'transparent' => false,
        ),
        array(
            'id'       => 'ptitle_bg_overlay',
            'type'     => 'color_rgba',
            'title'    => esc_html__( 'Background Color Overlay', 'itfirm' ),
            'subtitle' => esc_html__( 'Page title background color overlay.', 'itfirm' ),
            'output'   => array( 'background-color' => '#ct-pagetitle:before' ),
            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => 'show' ),
            'force_output' => true,
        ),
        array(
            'id'             => 'page_title_padding',
            'type'           => 'spacing',
            'output'         => array('body #ct-pagetitle'),
            'right'   => false,
            'left'    => false,
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => esc_html__('Page Title Space Top/Bottom', 'itfirm'),
            'default'            => array(
                'padding-top'   => '',
                'padding-bottom'   => '',
                'units'          => 'px',
            ),
            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'       => 'ptitle_breadcrumb_on',
            'type'     => 'button_set',
            'title'    => esc_html__('Breadcrumb', 'itfirm'),
            'options'  => array(
                'show'  => esc_html__('Show', 'itfirm'),
                'hidden'  => esc_html__('Hidden', 'itfirm'),
            ),
            'default'  => 'show',
            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
        array(
            'id'          => 'breadcrumb_color',
            'type'        => 'color',
            'title'       => esc_html__('Breadcrumb Color', 'itfirm'),
            'transparent' => false,
            'default'     => '',
            'output'         => array('.ct-breadcrumb, .ct-breadcrumb li a:after'),
            'required' => array( 0 => 'pagetitle', 1 => 'equals', 2 => 'show' ),
            'force_output' => true
        ),
    )
));

/*--------------------------------------------------------------
# WordPress default content
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title' => esc_html__('Content', 'itfirm'),
    'icon'  => 'el-icon-pencil',
    'fields'     => array(
        array(
            'id'             => 'content_padding',
            'type'           => 'spacing',
            'output'         => array('#content'),
            'right'   => false,
            'left'    => false,
            'mode'           => 'padding',
            'units'          => array('px'),
            'units_extended' => 'false',
            'title'          => esc_html__('Content Padding', 'itfirm'),
            'desc'           => esc_html__('Default: Top-95px, Bottom-70px', 'itfirm'),
            'default'            => array(
                'padding-top'   => '',
                'padding-bottom'   => '',
                'units'          => 'px',
            )
        ),
        array(
            'id'      => 'search_field_placeholder',
            'type'    => 'text',
            'title'   => esc_html__('Search Form - Text Placeholder', 'itfirm'),
            'default' => '',
            'desc'           => esc_html__('Default: Search', 'itfirm'),
        ),
    )
));


Redux::setSection($opt_name, array(
    'title'      => esc_html__('Blog Default', 'itfirm'),
    'icon'       => 'el-icon-list',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'archive_sidebar_pos',
            'type'     => 'button_set',
            'title'    => esc_html__('Sidebar Position', 'itfirm'),
            'subtitle' => esc_html__('Select a sidebar position for blog home, archive, search...', 'itfirm'),
            'options'  => array(
                'left'  => esc_html__('Left', 'itfirm'),
                'right' => esc_html__('Right', 'itfirm'),
                'none'  => esc_html__('Disabled', 'itfirm')
            ),
            'default'  => 'right'
        ),
        array(
            'id'       => 'archive_date_on',
            'title'    => esc_html__('Date', 'itfirm'),
            'subtitle' => esc_html__('Show date posted on each post.', 'itfirm'),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'       => 'archive_categories_on',
            'title'    => esc_html__('Categories', 'itfirm'),
            'subtitle' => esc_html__('Show category names on each post.', 'itfirm'),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'       => 'archive_author_on',
            'title'    => esc_html__('Author', 'itfirm'),
            'subtitle' => esc_html__('Show author names on each post.', 'itfirm'),
            'type'     => 'switch',
            'default'  => true,
        ),
        array(
            'id'      => 'archive_readmore_text',
            'type'    => 'text',
            'title'   => esc_html__('Read More Text', 'itfirm'),
            'default' => '',
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Single Post', 'itfirm'),
    'icon'       => 'el-icon-file-edit',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'       => 'post_sidebar_pos',
            'type'     => 'button_set',
            'title'    => esc_html__('Sidebar Position', 'itfirm'),
            'subtitle' => esc_html__('Select a sidebar position', 'itfirm'),
            'options'  => array(
                'left'  => esc_html__('Left', 'itfirm'),
                'right' => esc_html__('Right', 'itfirm'),
                'none'  => esc_html__('Disabled', 'itfirm')
            ),
            'default'  => 'right'
        ),
        array(
            'id'       => 'post_title_position',
            'type'     => 'button_set',
            'title'    => esc_html__('Title Position', 'itfirm'),
            'options'  => array(
                'ptitle'  => esc_html__('Page Title', 'itfirm'),
                'content'  => esc_html__('Content', 'itfirm'),
            ),
            'default'  => 'ptitle'
        ),
        array(
            'id'      => 'sg_post_title_text',
            'type'    => 'text',
            'title'   => esc_html__('Page Title Text', 'itfirm'),
            'default' => '',
            'required' => array( 0 => 'post_title_position', 1 => 'equals', 2 => 'content' ),
            'force_output' => true
        ),
        array(
            'id'       => 'post_date_on',
            'title'    => esc_html__('Date', 'itfirm'),
            'subtitle' => esc_html__('Show date on single post.', 'itfirm'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_author_on',
            'title'    => esc_html__('Author', 'itfirm'),
            'subtitle' => esc_html__('Show author name on single post.', 'itfirm'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_categories_on',
            'title'    => esc_html__('Categories', 'itfirm'),
            'subtitle' => esc_html__('Show category names on single post.', 'itfirm'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_tags_on',
            'title'    => esc_html__('Tags', 'itfirm'),
            'subtitle' => esc_html__('Show tag names on single post.', 'itfirm'),
            'type'     => 'switch',
            'default'  => true
        ),
        array(
            'id'       => 'post_navigation_on',
            'title'    => esc_html__('Navigation', 'itfirm'),
            'subtitle' => esc_html__('Show navigation on single post.', 'itfirm'),
            'type'     => 'switch',
            'default'  => false,
        ),
        array(
            'id'       => 'post_social_share_on',
            'title'    => esc_html__('Social Share', 'itfirm'),
            'subtitle' => esc_html__('Show social share on single post.', 'itfirm'),
            'type'     => 'switch',
            'default'  => false,
        ),
    )
));

/*--------------------------------------------------------------
# Shop
--------------------------------------------------------------*/
if(class_exists('Woocommerce')) {
    Redux::setSection($opt_name, array(
        'title'  => esc_html__('Shop', 'itfirm'),
        'icon'   => 'el el-shopping-cart',
        'fields' => array(
            array(
                'title' => esc_html__('Products', 'itfirm'),
                'type'  => 'section',
                'id' => 'shop_products',
                'indent' => true,
            ),
            array(
                'id'       => 'sidebar_shop',
                'type'     => 'button_set',
                'title'    => esc_html__('Sidebar Position', 'itfirm'),
                'subtitle' => esc_html__('Select a sidebar position for archive shop.', 'itfirm'),
                'options'  => array(
                    'left'  => esc_html__('Left', 'itfirm'),
                    'right' => esc_html__('Right', 'itfirm'),
                    'none'  => esc_html__('Disabled', 'itfirm')
                ),
                'default'  => 'right'
            ),
            array(
                'title' => esc_html__('Products displayed per page', 'itfirm'),
                'id' => 'product_per_page',
                'type' => 'slider',
                'subtitle' => esc_html__('Number product to show', 'itfirm'),
                'default' => 12,
                'min'  => 4,
                'step' => 1,
                'max' => 50,
                'display_value' => 'text'
            ),

            array(
                'title' => esc_html__('Single Product', 'itfirm'),
                'type'  => 'section',
                'id' => 'shop_single',
                'indent' => true,
            ),
            array(
                'id'       => 'product_title',
                'type'     => 'switch',
                'title'    => esc_html__('Product Title', 'itfirm'),
                'default'  => false
            ),
            array(
                'id'       => 'product_social_share',
                'type'     => 'switch',
                'title'    => esc_html__('Social Share', 'itfirm'),
                'default'  => false
            ),
        )
    ));
}

/*--------------------------------------------------------------
# Footer
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Footer', 'itfirm'),
    'icon'   => 'el el-website',
    'fields' => array(
        array(
            'id'          => 'footer_layout_custom',
            'type'        => 'select',
            'title'       => esc_html__('Layout', 'itfirm'),
            'desc'        => sprintf(esc_html__('To use this Option please %sClick Here%s to add your custom footer layout first.','itfirm'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=footer' ) ) . '">','</a>'),
            'options'     =>itfirm_list_post('footer'),
            'default'     => '',
        ),
        array(
            'id'       => 'back_totop_on',
            'type'     => 'switch',
            'title'    => esc_html__('Back to Top Button', 'itfirm'),
            'subtitle' => esc_html__('Show back to top button when scrolled down.', 'itfirm'),
            'default'  => false,
        ),
        array(
            'id'           => 'fixed_footer',
            'type'         => 'button_set',
            'title'        => esc_html__( 'Fixed Footer', 'itfirm' ),
            'options'      => array(
                'on'  => 'On',
                'off'  => 'Off',
            ),
            'default'      => 'off',
        ),
    )
));

/* 404 Page /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('404 Page', 'itfirm'),
    'icon'   => 'el-cog-alt el',
    'fields' => array(
        array(
            'id'       => 'page_404',
            'type'     => 'button_set',
            'title'    => esc_html__('Select 404 Page', 'itfirm'),
            'options'  => array(
                'default'  => esc_html__('Default', 'itfirm'),
                'custom'  => esc_html__('Custom', 'itfirm'),
            ),
            'default'  => 'default'
        ),
        array(
            'id'          => 'page_custom_404',
            'type'        => 'select',
            'title'       => esc_html__('Page', 'itfirm'),
            'options'     => itfirm_list_post('page'),
            'default'     => '',
            'required' => array( 0 => 'page_404', 1 => 'equals', 2 => 'custom' ),
            'force_output' => true
        ),
    ),
));

/*--------------------------------------------------------------
# Colors
--------------------------------------------------------------*/

Redux::setSection($opt_name, array(
    'title'  => esc_html__('Colors', 'itfirm'),
    'icon'   => 'el-icon-file-edit',
    'fields' => array(
        array(
            'id'          => 'primary_color',
            'type'        => 'color',
            'title'       => esc_html__('Primary Color', 'itfirm'),
            'transparent' => false,
            'default'     => '#006cff'
        ),
        array(
            'id'          => 'secondary_color',
            'type'        => 'color',
            'title'       => esc_html__('Secondary Color', 'itfirm'),
            'transparent' => false,
            'default'     => '#151515'
        ),
        array(
            'id'          => 'third_color',
            'type'        => 'color',
            'title'       => esc_html__('Third Color', 'itfirm'),
            'transparent' => false,
            'default'     => '#08d9ff'
        ),
        array(
            'id'      => 'link_color',
            'type'    => 'link_color',
            'title'   => esc_html__('Link Colors', 'itfirm'),
            'default' => array(
                'regular' => '#006cff',
                'hover'   => '#1227b8',
                'active'  => '#1227b8'
            ),
            'output'  => array('a')
        ),
        array(
            'id'          => 'gradient_color',
            'type'        => 'color_gradient',
            'title'       => esc_html__('Gradient Color', 'itfirm'),
            'transparent' => false,
            'default'  => array(
                'from' => '#006cff',
                'to'   => '#1227b8', 
            ),
        ),
        array(
            'id'       => 'body_bg_color',
            'type'     => 'background',
            'title'    => esc_html__('Body Background Color', 'itfirm'),
            'output'   => array( 'background-color' => 'body' ),
            'force_output' => true,
            'background-image' => false,
            'background-color' => true,
            'background-position' => false,
            'background-repeat' => false,
            'background-size' => false,
            'background-attachment' => false,
            'transparent' => false,
            'default'  => ''
        ),
        array(
            'id'          => 'body_text_color',
            'type'        => 'color',
            'title'       => esc_html__('Body Text Color', 'itfirm'),
            'transparent' => false,
            'output'      => array('body'),
        ),
        array(
            'id'          => 'heading_color',
            'type'        => 'color',
            'title'       => esc_html__('Heading Color', 'itfirm'),
            'transparent' => false,
            'output'      => array('h1, h2, h3, h4, h5, h6, .h1, .h2, .h3, .h4, .h5, .h6'),
        ),
    )
));

/*--------------------------------------------------------------
# Typography
--------------------------------------------------------------*/
$custom_font_selectors_1 = Redux::get_option($opt_name, 'custom_font_selectors_1');
$custom_font_selectors_1 = !empty($custom_font_selectors_1) ? explode(',', $custom_font_selectors_1) : array();
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Typography', 'itfirm'),
    'icon'   => 'el-icon-text-width',
    'fields' => array(
        array(
            'id'       => 'body_default_font',
            'type'     => 'select',
            'title'    => esc_html__('Body Default Font', 'itfirm'),
            'options'  => array(
                'Roboto'  => esc_html__('Default', 'itfirm'),
                'Google-Font'  => esc_html__('Google Font', 'itfirm'),
            ),
            'default'  => 'Roboto',
        ),
        array(
            'id'          => 'font_main',
            'type'        => 'typography',
            'title'       => esc_html__('Body Google Font', 'itfirm'),
            'subtitle'    => esc_html__('This will be the default font of your website.', 'itfirm'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'line-height'  => true,
            'font-size'  => true,
            'text-align'  => false,
            'color'  => false,
            'output'      => array('body'),
            'units'       => 'px',
            'required' => array( 0 => 'body_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'       => 'heading_default_font',
            'type'     => 'select',
            'title'    => esc_html__('Heading Default Font', 'itfirm'),
            'options'  => array(
                'Fira-Sans'  => esc_html__('Default', 'itfirm'),
                'Google-Font'  => esc_html__('Google Font', 'itfirm'),
            ),
            'default'  => 'Fira-Sans',
        ),
        array(
            'id'          => 'font_h1',
            'type'        => 'typography',
            'title'       => esc_html__('H1', 'itfirm'),
            'subtitle'    => esc_html__('This will be the default font for all H1 tags of your website.', 'itfirm'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h1', '.h1', '.text-heading'),
            'units'       => 'px',
            'color'  => false,
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h2',
            'type'        => 'typography',
            'title'       => esc_html__('H2', 'itfirm'),
            'subtitle'    => esc_html__('This will be the default font for all H2 tags of your website.', 'itfirm'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h2', '.h2'),
            'units'       => 'px',
            'color'  => false,
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h3',
            'type'        => 'typography',
            'title'       => esc_html__('H3', 'itfirm'),
            'subtitle'    => esc_html__('This will be the default font for all H3 tags of your website.', 'itfirm'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h3', '.h3'),
            'units'       => 'px',
            'color'  => false,
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h4',
            'type'        => 'typography',
            'title'       => esc_html__('H4', 'itfirm'),
            'subtitle'    => esc_html__('This will be the default font for all H4 tags of your website.', 'itfirm'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h4', '.h4'),
            'units'       => 'px',
            'color'  => false,
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h5',
            'type'        => 'typography',
            'title'       => esc_html__('H5', 'itfirm'),
            'subtitle'    => esc_html__('This will be the default font for all H5 tags of your website.', 'itfirm'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h5', '.h5'),
            'units'       => 'px',
            'color'  => false,
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
        array(
            'id'          => 'font_h6',
            'type'        => 'typography',
            'title'       => esc_html__('H6', 'itfirm'),
            'subtitle'    => esc_html__('This will be the default font for all H6 tags of your website.', 'itfirm'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => array('h6', '.h6'),
            'units'       => 'px',
            'color'  => false,
            'required' => array( 0 => 'heading_default_font', 1 => 'equals', 2 => 'Google-Font' ),
            'force_output' => true
        ),
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Fonts Selectors', 'itfirm'),
    'icon'       => 'el el-fontsize',
    'subsection' => true,
    'fields'     => array(
        array(
            'id'          => 'custom_font_1',
            'type'        => 'typography',
            'title'       => esc_html__('Custom Font', 'itfirm'),
            'subtitle'    => esc_html__('This will be the font that applies to the class selector.', 'itfirm'),
            'google'      => true,
            'font-backup' => true,
            'all_styles'  => true,
            'text-align'  => false,
            'output'      => $custom_font_selectors_1,
            'units'       => 'px',

        ),
        array(
            'id'       => 'custom_font_selectors_1',
            'type'     => 'textarea',
            'title'    => esc_html__('CSS Selectors', 'itfirm'),
            'subtitle' => esc_html__('Add class selectors to apply above font.', 'itfirm'),
            'validate' => 'no_html'
        )
    )
));

Redux::setSection($opt_name, array(
    'title'      => esc_html__('Extra Post Type', 'itfirm'),
    'icon'       => 'el el-briefcase',
    'fields'     => array(
        array(
            'title' => esc_html__('Portfolio', 'itfirm'),
            'type'  => 'section',
            'id' => 'post_portfolio',
            'indent' => true,
        ),
        array(
            'id'      => 'portfolio_slug',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Slug', 'itfirm'),
            'default' => '',
            'desc'     => 'Default: portfolio',
        ),
        array(
            'id'      => 'portfolio_name',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Name', 'itfirm'),
            'default' => '',
            'desc'     => 'Default: Portfolio',
        ),
        array(
            'id'      => 'portfolio_category_slug',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Category Slug', 'itfirm'),
            'default' => '',
            'desc'     => 'Default: portfolio-category',
        ),
        array(
            'id'      => 'portfolio_category_name',
            'type'    => 'text',
            'title'   => esc_html__('Portfolio Category Name', 'itfirm'),
            'default' => '',
            'desc'     => 'Default: Portfolio Categories',
        ),
        array(
            'id'    => 'archive_portfolio_link',
            'type'  => 'select',
            'title' => esc_html__( 'Custom Archive Page Link', 'itfirm' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
        ),
        
        array(
            'title' => esc_html__('Service', 'itfirm'),
            'type'  => 'section',
            'id' => 'post_service',
            'indent' => true,
        ),
        array(
            'id'      => 'service_slug',
            'type'    => 'text',
            'title'   => esc_html__('Service Slug', 'itfirm'),
            'default' => '',
            'desc'     => 'Default: service',
        ),
        array(
            'id'      => 'service_name',
            'type'    => 'text',
            'title'   => esc_html__('Service Name', 'itfirm'),
            'default' => '',
            'desc'     => 'Default: Service',
        ),
        array(
            'id'      => 'service_category_slug',
            'type'    => 'text',
            'title'   => esc_html__('Service Category Slug', 'itfirm'),
            'default' => '',
            'desc'     => 'Default: service-category',
        ),
        array(
            'id'      => 'service_category_name',
            'type'    => 'text',
            'title'   => esc_html__('Service Category Name', 'itfirm'),
            'default' => '',
            'desc'     => 'Default: Service Categories',
        ),
        array(
            'id'    => 'archive_service_link',
            'type'  => 'select',
            'title' => esc_html__( 'Custom Archive Page Link', 'itfirm' ), 
            'data'  => 'page',
            'args'  => array(
                'post_type'      => 'page',
                'posts_per_page' => -1,
                'orderby'        => 'title',
                'order'          => 'ASC',
            ),
        ),
    )
));

/* Custom Code /--------------------------------------------------------- */
Redux::setSection($opt_name, array(
    'title'  => esc_html__('Custom Code', 'itfirm'),
    'icon'   => 'el-icon-edit',
    'fields' => array(

        array(
            'id'       => 'site_header_code',
            'type'     => 'textarea',
            'theme'    => 'chrome',
            'title'    => esc_html__('Header Custom Codes', 'itfirm'),
            'subtitle' => esc_html__('It will insert the code to wp_head hook.', 'itfirm'),
        ),
        array(
            'id'       => 'site_footer_code',
            'type'     => 'textarea',
            'theme'    => 'chrome',
            'title'    => esc_html__('Footer Custom Codes', 'itfirm'),
            'subtitle' => esc_html__('It will insert the code to wp_footer hook.', 'itfirm'),
        ),

    ),
));