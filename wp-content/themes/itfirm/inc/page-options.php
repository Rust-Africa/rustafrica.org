<?php
/**
 * Register metabox for posts based on Redux Framework. Supported methods:
 *     isset_args( $post_type )
 *     set_args( $post_type, $redux_args, $metabox_args )
 *     add_section( $post_type, $sections )
 * Each post type can contains only one metabox. Pease note that each field id
 * leads by an underscore sign ( _ ) in order to not show that into Custom Field
 * Metabox from WordPress core feature.
 *
 * @param  CT_Post_Metabox $metabox
 */

/**
 * Get list menu.
 * @return array
 */
function itfirm_get_nav_menu(){

    $menus = array(
        '' => esc_html__('Default', 'itfirm')
    );

    $obj_menus = wp_get_nav_menus();

    foreach ($obj_menus as $obj_menu){
        $menus[$obj_menu->term_id] = $obj_menu->name;
    }

    return $menus;
}

function itfirm_get_nav_menu_slug(){

    $menus = array(
        '' => esc_html__('Default', 'itfirm')
    );

    $obj_menus = wp_get_nav_menus();

    foreach ($obj_menus as $obj_menu){
        $menus[$obj_menu->slug] = $obj_menu->name;
    }

    return $menus;
}

add_action( 'ct_post_metabox_register', 'itfirm_page_options_register' );

function itfirm_page_options_register( $metabox ) {

	if ( ! $metabox->isset_args( 'post' ) ) {
		$metabox->set_args( 'post', array(
			'opt_name'            => 'post_option',
			'display_name'        => esc_html__( 'Post Settings', 'itfirm' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'product' ) ) {
		$metabox->set_args( 'product', array(
			'opt_name'            => 'product_option',
			'display_name'        => esc_html__( 'Product Settings', 'itfirm' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'page' ) ) {
		$metabox->set_args( 'page', array(
			'opt_name'            => itfirm_get_page_opt_name(),
			'display_name'        => esc_html__( 'Page Settings', 'itfirm' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'ct_pf_audio' ) ) {
		$metabox->set_args( 'ct_pf_audio', array(
			'opt_name'     => 'post_format_audio',
			'display_name' => esc_html__( 'Audio', 'itfirm' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'ct_pf_link' ) ) {
		$metabox->set_args( 'ct_pf_link', array(
			'opt_name'     => 'post_format_link',
			'display_name' => esc_html__( 'Link', 'itfirm' )
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'ct_pf_quote' ) ) {
		$metabox->set_args( 'ct_pf_quote', array(
			'opt_name'     => 'post_format_quote',
			'display_name' => esc_html__( 'Quote', 'itfirm' )
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'ct_pf_video' ) ) {
		$metabox->set_args( 'ct_pf_video', array(
			'opt_name'     => 'post_format_video',
			'display_name' => esc_html__( 'Video', 'itfirm' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'ct_pf_gallery' ) ) {
		$metabox->set_args( 'ct_pf_gallery', array(
			'opt_name'     => 'post_format_gallery',
			'display_name' => esc_html__( 'Gallery', 'itfirm' ),
			'class'        => 'fully-expanded',
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	/* Extra Post Type */

	if ( ! $metabox->isset_args( 'service' ) ) {
		$metabox->set_args( 'service', array(
			'opt_name'            => 'service_option',
			'display_name'        => esc_html__( 'Service Settings', 'itfirm' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'portfolio' ) ) {
		$metabox->set_args( 'portfolio', array(
			'opt_name'            => 'portfolio_option',
			'display_name'        => esc_html__( 'Portfolio Settings', 'itfirm' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	if ( ! $metabox->isset_args( 'header' ) ) {
		$metabox->set_args( 'header', array(
			'opt_name'            => 'header_option',
			'display_name'        => esc_html__( 'Header Settings', 'itfirm' ),
			'show_options_object' => false,
		), array(
			'context'  => 'advanced',
			'priority' => 'default'
		) );
	}

	/**
	 * Config post meta options
	 *
	 */
	$metabox->add_section( 'post', array(
		'title'  => esc_html__( 'Post Settings', 'itfirm' ),
		'icon'   => 'el el-refresh',
		'fields' => array(
			array(
				'id'             => 'post_content_padding',
				'type'           => 'spacing',
				'output'         => array( '.single-post #content' ),
				'right'          => false,
				'left'           => false,
				'mode'           => 'padding',
				'units'          => array( 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Content Padding', 'itfirm' ),
				'subtitle'     => esc_html__( 'Content site paddings.', 'itfirm' ),
				'desc'           => esc_html__( 'Default: Theme Option.', 'itfirm' ),
				'default'        => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				)
			),
			array(
				'id'      => 'show_sidebar_post',
				'type'    => 'switch',
				'title'   => esc_html__( 'Custom Sidebar', 'itfirm' ),
				'default' => false,
				'indent'  => true
			),
			array(
				'id'           => 'sidebar_post_pos',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Sidebar Position', 'itfirm' ),
				'options'      => array(
					'left'  => esc_html__('Left', 'itfirm'),
	                'right' => esc_html__('Right', 'itfirm'),
	                'none'  => esc_html__('Disabled', 'itfirm')
				),
				'default'      => 'right',
				'required'     => array( 0 => 'show_sidebar_post', 1 => '=', 2 => '1' ),
				'force_output' => true
			),
		)
	) );

	/**
	 * Config page meta options
	 *
	 */
	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Header', 'itfirm' ),
		'desc'   => esc_html__( 'Header settings for the page.', 'itfirm' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
				'id'      => 'custom_header',
				'type'    => 'switch',
				'title'   => esc_html__( 'Custom Layout', 'itfirm' ),
				'default' => false,
				'indent'  => true
			),
			array(
	            'id'          => 'header_layout',
	            'type'        => 'select',
	            'title'       => esc_html__('Main Header Layout', 'itfirm'),
	            'desc'        => sprintf(esc_html__('To use this Option please %sClick Here%s to add your header layout first.','itfirm'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=header' ) ) . '">','</a>'),
	            'options'     => itfirm_list_post('header'),
	            'default'     => '',
	            'required'     => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
				'force_output' => true
	        ),
	        array(
	            'id'          => 'header_layout_sticky',
	            'type'        => 'select',
	            'title'       => esc_html__('Sticky Header Layout', 'itfirm'),
	            'desc'        => sprintf(esc_html__('To use this Option please %sClick Here%s to add your header layout first.','itfirm'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=header' ) ) . '">','</a>'),
	            'options'     => itfirm_list_post('header'),
	            'default'     => '',
	            'required'     => array( 0 => 'custom_header', 1 => 'equals', 2 => '1' ),
				'force_output' => true
	        ),
	        array(
	            'id'       => 'p_logo_m',
	            'type'     => 'media',
	            'title'    => esc_html__('Logo Mobile', 'itfirm'),
	            'subtitle' => esc_html__('Screenshot < 1200px', 'itfirm'),
	            'default' => ''
	        ),
	        array(
                'id'       => 'h_custom_main_menu',
                'type'     => 'select',
                'title'    => esc_html__( 'Custom Main Menu', 'itfirm' ),
                'options'  => itfirm_get_nav_menu_slug(),
                'default' => '',
            ),
	        array(
                'id'       => 'h_custom_menu_mobile',
                'type'     => 'select',
                'title'    => esc_html__( 'Custom Menu Mobile', 'itfirm' ),
                'options'  => itfirm_get_nav_menu(),
                'default' => '',
            ),
		)
	) );

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Page Title', 'itfirm' ),
		'icon'   => 'el el-indent-left',
		'fields' => array(
			array(
				'id'           => 'custom_pagetitle',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Page Title', 'itfirm' ),
				'options'      => array(
					'themeoption'  => esc_html__( 'Theme Option', 'itfirm' ),
					'show'  => esc_html__( 'Custom', 'itfirm' ),
					'hide'  => esc_html__( 'Hide', 'itfirm' ),
				),
				'default'      => 'themeoption',
			),
			array(
				'id'           => 'custom_title',
				'type'         => 'textarea',
				'title'        => esc_html__( 'Title', 'itfirm' ),
				'subtitle'     => esc_html__( 'Use custom title for this page. The default title will be used on document title.', 'itfirm' ),
				'required'     => array( 0 => 'custom_pagetitle', 1 => '=', 2 => 'show' ),
				'force_output' => true
			),
			array(
	            'id'       => 'ptitle_bg',
	            'type'     => 'background',
	            'background-color'     => true,
	            'background-repeat'     => false,
	            'background-size'     => false,
	            'background-attachment'     => false,
	            'background-position'     => false,
	            'transparent'     => false,
	            'title'    => esc_html__('Background', 'itfirm'),
	            'subtitle' => esc_html__('Page title background image.', 'itfirm'),
	            'required'     => array( 0 => 'custom_pagetitle', 1 => '=', 2 => 'show' ),
				'force_output' => true
	        ),
	        array(
				'id'       => 'ptitle_bg_overlay',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Color Overlay', 'itfirm' ),
				'subtitle' => esc_html__( 'Page title background color overlay.', 'itfirm' ),
				'output'   => array( 'background-color' => 'body #ct-pagetitle:before' ),
				'required'     => array( 0 => 'custom_pagetitle', 1 => '=', 2 => 'show' ),
				'force_output' => true
			),
	        array(
	            'id'             => 'ptitle_padding',
	            'type'           => 'spacing',
	            'output'         => array('.site #ct-pagetitle.page-title'),
	            'right'   => false,
	            'left'    => false,
	            'mode'           => 'padding',
	            'units'          => array('px'),
	            'units_extended' => 'false',
	            'title'          => esc_html__('Page Title Padding', 'itfirm'),
	            'default'            => array(
	                'padding-top'   => '',
	                'padding-bottom'   => '',
	                'units'          => 'px',
	            ),
	            'required'     => array( 0 => 'custom_pagetitle', 1 => '=', 2 => 'show' ),
				'force_output' => true
	        ),
		)
	) );

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Content', 'itfirm' ),
		'desc'   => esc_html__( 'Settings for content area.', 'itfirm' ),
		'icon'   => 'el-icon-pencil',
		'fields' => array(
	        array(
				'id'           => 'loading_page',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Loading', 'itfirm' ),
				'options'      => array(
					'themeoption'  => esc_html__( 'Theme Option', 'itfirm' ),
					'custom' => esc_html__( 'Cuttom', 'itfirm' ),
				),
				'default'      => 'themeoption',
			),
			array(
	            'id'       => 'loading_type',
	            'type'     => 'select',
	            'title'    => esc_html__('Loading Type', 'itfirm'),
	            'options'  => array(
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
	            ),
	            'default'  => 'style1',
	            'required'     => array( 0 => 'loading_page', 1 => '=', 2 => 'custom' ),
				'force_output' => true
	        ),
			array(
				'id'       => 'content_bg_color',
				'type'     => 'color_rgba',
				'title'    => esc_html__( 'Background Color', 'itfirm' ),
				'subtitle' => esc_html__( 'Content background color.', 'itfirm' ),
				'output'   => array( 'background-color' => 'body' )
			),
			array(
				'id'             => 'content_padding',
				'type'           => 'spacing',
				'output'         => array( '#content' ),
				'right'          => false,
				'left'           => false,
				'mode'           => 'padding',
				'units'          => array( 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Content Padding', 'itfirm' ),
				'desc'           => esc_html__( 'Default: Theme Option.', 'itfirm' ),
				'default'        => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				)
			),
			array(
				'id'      => 'show_sidebar_page',
				'type'    => 'switch',
				'title'   => esc_html__( 'Show Sidebar', 'itfirm' ),
				'default' => false,
				'indent'  => true
			),
			array(
				'id'           => 'sidebar_page_pos',
				'type'         => 'button_set',
				'title'        => esc_html__( 'Sidebar Position', 'itfirm' ),
				'options'      => array(
					'left'  => esc_html__( 'Left', 'itfirm' ),
					'right' => esc_html__( 'Right', 'itfirm' ),
				),
				'default'      => 'right',
				'required'     => array( 0 => 'show_sidebar_page', 1 => '=', 2 => '1' ),
				'force_output' => true
			),
		)
	) );

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Footer', 'itfirm' ),
		'desc'   => esc_html__( 'Settings for footer area.', 'itfirm' ),
		'icon'   => 'el el-website',
		'fields' => array(
			array(
				'id'      => 'custom_footer',
				'type'    => 'switch',
				'title'   => esc_html__( 'Custom Layout', 'itfirm' ),
				'default' => false,
				'indent'  => true
			),
	        array(
	            'id'          => 'footer_layout_custom',
	            'type'        => 'select',
	            'title'       => esc_html__('Layout', 'itfirm'),
	            'desc'        => sprintf(esc_html__('To use this Option please %sClick Here%s to add your custom footer layout first.','itfirm'),'<a href="' . esc_url( admin_url( 'edit.php?post_type=footer' ) ) . '">','</a>'),
	            'options'     =>itfirm_list_post('footer'),
	            'default'     => '',
	            'required' => array( 0 => 'custom_footer', 1 => 'equals', 2 => '1' ),
	            'force_output' => true
	        ),
	        array(
	            'id'       => 'footer_bg_color',
	            'type'     => 'color_rgba',
	            'title'    => esc_html__( 'Background Color', 'itfirm' ),
	            'output'   => array( 'background-color' => '.site-footer-custom' ),
	            'force_output' => true,
	        ),
	        array(
	            'id'           => 'fixed_footer',
	            'type'         => 'button_set',
	            'title'        => esc_html__( 'Fixed Footer', 'itfirm' ),
	            'options'      => array(
	                'inherit'  => 'Inherit',
	                'on'  => 'On',
	                'off'  => 'Off',
	            ),
	            'default'      => 'inherit',
	        ),
	    )
	) );

	$metabox->add_section( 'page', array(
		'title'  => esc_html__( 'Colors', 'itfirm' ),
		'icon'   => 'el-icon-file-edit',
		'fields' => array(
			array(
	            'id'          => 'p_primary_color',
	            'type'        => 'color',
	            'title'       => esc_html__('Primary Color', 'itfirm'),
	            'transparent' => false,
	            'default'     => ''
	        ),
	        array(
	            'id'          => 'p_secondary_color',
	            'type'        => 'color',
	            'title'       => esc_html__('Secondary Color', 'itfirm'),
	            'transparent' => false,
	            'default'     => ''
	        ),
	        array(
	            'id'          => 'p_gradient_color',
	            'type'        => 'color_gradient',
	            'title'       => esc_html__('Gradient Color', 'itfirm'),
	            'transparent' => false,
	            'default'  => array(
	                'from' => '',
	                'to'   => '', 
	            ),
	        ),
		)
	) );

	/**
	 * Config post format meta options
	 *
	 */

	$metabox->add_section( 'ct_pf_video', array(
		'title'  => esc_html__( 'Video', 'itfirm' ),
		'fields' => array(
			array(
				'id'    => 'post-video-url',
				'type'  => 'text',
				'title' => esc_html__( 'Video URL', 'itfirm' ),
				'desc'  => esc_html__( 'YouTube or Vimeo video URL', 'itfirm' )
			),

			array(
				'id'    => 'post-video-file',
				'type'  => 'editor',
				'title' => esc_html__( 'Video Upload', 'itfirm' ),
				'desc'  => esc_html__( 'Upload video file', 'itfirm' )
			),

			array(
				'id'    => 'post-video-html',
				'type'  => 'textarea',
				'title' => esc_html__( 'Embadded video', 'itfirm' ),
				'desc'  => esc_html__( 'Use this option when the video does not come from YouTube or Vimeo', 'itfirm' )
			)
		)
	) );

	$metabox->add_section( 'ct_pf_gallery', array(
		'title'  => esc_html__( 'Gallery', 'itfirm' ),
		'fields' => array(
			array(
				'id'       => 'post-gallery-lightbox',
				'type'     => 'switch',
				'title'    => esc_html__( 'Lightbox?', 'itfirm' ),
				'subtitle' => esc_html__( 'Enable lightbox for gallery images.', 'itfirm' ),
				'default'  => true
			),
			array(
				'id'       => 'post-gallery-images',
				'type'     => 'gallery',
				'title'    => esc_html__( 'Gallery Images ', 'itfirm' ),
				'subtitle' => esc_html__( 'Upload images or add from media library.', 'itfirm' )
			)
		)
	) );

	$metabox->add_section( 'ct_pf_audio', array(
		'title'  => esc_html__( 'Audio', 'itfirm' ),
		'fields' => array(
			array(
				'id'          => 'post-audio-url',
				'type'        => 'text',
				'title'       => esc_html__( 'Audio URL', 'itfirm' ),
				'description' => esc_html__( 'Audio file URL in format: mp3, ogg, wav.', 'itfirm' ),
				'validate'    => 'url',
				'msg'         => 'Url error!'
			)
		)
	) );

	$metabox->add_section( 'ct_pf_link', array(
		'title'  => esc_html__( 'Link', 'itfirm' ),
		'fields' => array(
			array(
				'id'       => 'post-link-url',
				'type'     => 'text',
				'title'    => esc_html__( 'URL', 'itfirm' ),
				'validate' => 'url',
				'msg'      => 'Url error!'
			)
		)
	) );

	$metabox->add_section( 'ct_pf_quote', array(
		'title'  => esc_html__( 'Quote', 'itfirm' ),
		'fields' => array(
			array(
				'id'    => 'post-quote-cite',
				'type'  => 'text',
				'title' => esc_html__( 'Cite', 'itfirm' )
			)
		)
	) );

	/**
	 * Config service meta options
	 *
	 */
	$metabox->add_section( 'service', array(
		'title'  => esc_html__( 'General', 'itfirm' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
	            'id'       => 'icon_type',
	            'type'     => 'button_set',
	            'title'    => esc_html__('Icon Type', 'itfirm'),
	            'options'  => array(
	                'icon'  => esc_html__('Icon', 'itfirm'),
	                'image'  => esc_html__('Image', 'itfirm'),
	            ),
	            'default'  => 'icon'
	        ),
			array(
	            'id'       => 'service_icon',
	            'type'     => 'ct_iconpicker',
	            'title'    => esc_html__('Icon', 'itfirm'),
	            'required' => array( 0 => 'icon_type', 1 => 'equals', 2 => 'icon' ),
            	'force_output' => true
	        ),
	        array(
	            'id'       => 'service_icon_img',
	            'type'     => 'media',
	            'title'    => esc_html__('Icon Image', 'itfirm'),
	            'default' => '',
	            'required' => array( 0 => 'icon_type', 1 => 'equals', 2 => 'image' ),
            	'force_output' => true
	        ),
            array(
				'id'       => 'service_except',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Excerpt', 'itfirm' ),
				'validate' => 'no_html'
			),
			array(
				'id'             => 'service_content_padding',
				'type'           => 'spacing',
				'output'         => array( '.single-service #content' ),
				'right'          => false,
				'left'           => false,
				'mode'           => 'padding',
				'units'          => array( 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Content Padding', 'itfirm' ),
				'subtitle'     => esc_html__( 'Content site paddings.', 'itfirm' ),
				'desc'           => esc_html__( 'Default: Theme Option.', 'itfirm' ),
				'default'        => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				)
			),
			array(
				'id'       => 'service_custom_link',
				'type'     => 'text',
				'title'    => esc_html__( 'Custom Link', 'itfirm' ),
				'validate' => 'url',
				'msg'      => 'Url error!'
			),
			array(
                'id'       => 'service_feature',
                'type'     => 'multi_text',
                'title'    => esc_html__('Feature', 'itfirm'),
                'validate' => 'html',
            ),
		)
	) );

	/**
	 * Config portfolio meta options
	 *
	 */
	$metabox->add_section( 'portfolio', array(
		'title'  => esc_html__( 'General', 'itfirm' ),
		'icon'   => 'el-icon-website',
		'fields' => array(
			array(
				'id'             => 'portfolio_content_padding',
				'type'           => 'spacing',
				'output'         => array( '.single-portfolio #content' ),
				'right'          => false,
				'left'           => false,
				'mode'           => 'padding',
				'units'          => array( 'px' ),
				'units_extended' => 'false',
				'title'          => esc_html__( 'Content Padding', 'itfirm' ),
				'subtitle'     => esc_html__( 'Content site paddings.', 'itfirm' ),
				'desc'           => esc_html__( 'Default: Theme Option.', 'itfirm' ),
				'default'        => array(
					'padding-top'    => '',
					'padding-bottom' => '',
					'units'          => 'px',
				)
			),
			array(
				'id'       => 'portfolio_custom_link',
				'type'     => 'text',
				'title'    => esc_html__( 'Custom Link', 'itfirm' ),
				'validate' => 'url',
				'msg'      => 'Url error!'
			),
			array(
				'id'       => 'portfolio_address',
				'type'     => 'text',
				'title'    => esc_html__( 'Address', 'itfirm' ),
			),
	        array(
				'id'       => 'portfolio_except',
				'type'     => 'textarea',
				'title'    => esc_html__( 'Excerpt', 'itfirm' ),
				'validate' => 'no_html'
			),
		)
	) );

}

function itfirm_get_option_of_theme_options( $key, $default = '' ) {
	if ( empty( $key ) ) {
		return '';
	}
	$options = get_option( itfirm_get_opt_name(), array() );
	$value   = isset( $options[ $key ] ) ? $options[ $key ] : $default;

	return $value;
}