<?php
if ( ! class_exists( 'ReduxFrameworkInstances' ) ) {
	return;
}

if(!function_exists('itfirm_hex_to_rgba')){
    function itfirm_hex_to_rgba($hex,$opacity = 1) {
        $hex = str_replace("#",null, $hex);
        $color = array();
        if(strlen($hex) == 3) {
            $color['r'] = hexdec(substr($hex,0,1).substr($hex,0,1));
            $color['g'] = hexdec(substr($hex,1,1).substr($hex,1,1));
            $color['b'] = hexdec(substr($hex,2,1).substr($hex,2,1));
            $color['a'] = $opacity;
        }
        else if(strlen($hex) == 6) {
            $color['r'] = hexdec(substr($hex, 0, 2));
            $color['g'] = hexdec(substr($hex, 2, 2));
            $color['b'] = hexdec(substr($hex, 4, 2));
            $color['a'] = $opacity;
        }
        $color = "rgba(".implode(', ', $color).")";
        return $color;
    }
}

class CSS_Generator {
	/**
     * scssc class instance
     *
     * @access protected
     * @var scssc
     */
    protected $scssc = null;

    /**
     * ReduxFramework class instance
     *
     * @access protected
     * @var ReduxFramework
     */
    protected $redux = null;

    /**
     * Debug mode is turn on or not
     *
     * @access protected
     * @var boolean
     */
    protected $dev_mode = true;

    /**
     * opt_name of ReduxFramework
     *
     * @access protected
     * @var string
     */
    protected $opt_name = '';

	/**
	 * Constructor
	 */

	function __construct() {
		$this->opt_name = itfirm_get_opt_name();
		if ( empty( $this->opt_name ) ) {
			return;
		}
		$this->dev_mode = itfirm_get_opt( 'dev_mode', '0' ) === '1' ? true : false;
		add_filter( 'ct_scssc_on', '__return_true' );
		add_action( 'init', array( $this, 'init' ) );
		add_action( 'wp_enqueue_scripts', array( $this, 'enqueue' ), 20 );
	}

	/**
	 * init hook - 10
	 */
	function init() {
		if ( ! class_exists( 'scssc' ) ) {
			return;
		}

		$this->redux = ReduxFrameworkInstances::get_instance( $this->opt_name );

		if ( empty( $this->redux ) || ! $this->redux instanceof ReduxFramework ) {
			return;
		}
		add_action( 'wp', array( $this, 'generate_with_dev_mode' ) );
		add_action( "redux/options/{$this->opt_name}/saved", function () {
			$this->generate_file_options();
		} );
	}

	function generate_with_dev_mode() {
		if ( $this->dev_mode === true ) {
			$this->generate_file_options();
			$this->generate_file();
		}
	}

	function generate_file_options() {
		$scss_dir = get_template_directory() . '/assets/scss/';
        $this->scssc = new scssc();
        $this->scssc->setImportPaths( $scss_dir );
        $_options = $scss_dir . 'variables.scss';
        $this->scssc->setFormatter( 'scss_formatter' );
        $this->redux->filesystem->execute( 'put_contents', $_options, array(
            'content' => preg_replace( "/(?<=[^\r]|^)\n/", "\r\n", $this->options_output() )
        ) );
	}

	/**
	 * Generate options and css files
	 */
	function generate_file() {
		$scss_dir = get_template_directory() . '/assets/scss/';
		$css_dir  = get_template_directory() . '/assets/css/';

		$this->scssc = new scssc();
		$this->scssc->setImportPaths( $scss_dir );

		$css_file = $css_dir . 'theme.css';

		$this->scssc->setFormatter( 'scss_formatter' );
		$this->redux->filesystem->execute( 'put_contents', $css_file, array(
			'content' => preg_replace( "/(?<=[^\r]|^)\n/", "\r\n", $this->scssc->compile( '@import "theme.scss"' ) )
		) );
	}

	protected function print_scss_opt_colors($variable,$param){
        if(is_array($variable)){
            $k = [];
            $v = [];
            foreach ($variable as $key => $value) {
                $k[] = str_replace('-', '_', $key);
                $v[] = 'var(--'.str_replace(['#',' '], [''],$key).'-color)';
            }
            if($param === 'key'){
                return implode(',', $k);
            }else{
                return implode(',', $v);
            }
            
        } else {
            return $variable;
        }
    }

	/**
	 * Output options to _variables.scss
	 *
	 * @access protected
	 * @return string
	 */
	protected function options_output() {
		$theme_colors                    = itfirm_configs('theme_colors');
        $links                           = itfirm_configs('link');
        $gradients                           = itfirm_configs('gradient');
		ob_start();

		printf('$itfirm_theme_colors_key:(%s);',$this->print_scss_opt_colors($theme_colors,'key'));
        printf('$itfirm_theme_colors_val:(%s);',$this->print_scss_opt_colors($theme_colors,'val'));
        // color rgb only
        foreach ($theme_colors as $key => $value) {
            printf('$%1$s_color_hex: %2$s;', str_replace('-', '_', $key), $value['value']); 
        }
        // color
        foreach ($theme_colors as $key => $value) {
            printf('$%1$s_color: %2$s;', str_replace('-', '_', $key), 'var(--'.str_replace(['#',' '], [''],$key).'-color)' );
        }

        // color rgb only
        foreach ($theme_colors as $key => $value) {
            printf('$%1$s_color_hex: %2$s;', str_replace('-', '_', $key), $value['value']); 
        }
        // color
        foreach ($theme_colors as $key => $value) {
            printf('$%1$s_color: %2$s;', str_replace('-', '_', $key), 'var(--'.str_replace(['#',' '], [''],$key).'-color)' );
        }
         
        // link color
        foreach ($links as $key => $value) {
            printf('$link_%1$s: %2$s;', str_replace('-', '_', $key), 'var(--link-'.$key.')');
        }

        // gradient color
        foreach ($gradients as $key => $value) {
            printf('$gradient_%1$s: %2$s;', str_replace('-', '_', $key), 'var(--gradient-'.$key.')');
        }

        // gradient color hex
        /* Gradient Color Main */
        $gradient_color_hex = itfirm_get_opt( 'gradient_color' );
        if ( !empty($gradient_color_hex['from']) && isset($gradient_color_hex['from']) ) {
            printf( '$gradient_from_hex: %s;', esc_attr( $gradient_color_hex['from'] ) );
        } else {
            echo '$gradient_from_hex: #8d4cfa;';
        }
        if ( !empty($gradient_color_hex['to']) && isset($gradient_color_hex['to']) ) {
            printf( '$gradient_to_hex: %s;', esc_attr( $gradient_color_hex['to'] ) );
        } else {
            echo '$gradient_to_hex: #5f6ffb;';
        }

		/* Font */
		$body_default_font = itfirm_get_opt( 'body_default_font', 'Roboto' );
		if ( isset( $body_default_font ) ) {
			echo '
                $body_default_font: ' . esc_attr( $body_default_font ) . ';
            ';
		}

		$heading_default_font = itfirm_get_opt( 'heading_default_font', 'Libre-Caslon-Text' );
		if ( isset( $heading_default_font ) ) {
			echo '
                $heading_default_font: ' . esc_attr( $heading_default_font ) . ';
            ';
		}

		return ob_get_clean();
	}

	/**
	 * Hooked wp_enqueue_scripts - 20
	 * Make sure that the handle is enqueued from earlier wp_enqueue_scripts hook.
	 */
	function enqueue() {
		$css = $this->inline_css();
		if ( ! empty( $css ) ) {
			wp_add_inline_style( 'itfirm-theme', $css );
		}
	}

	/**
	 * Generate inline css based on theme options
	 */
	protected function inline_css() {
		ob_start();

		/* Logo */
		?>
        @media screen and (max-width: 1199px) {
		<?php
			$logo_maxh_sm = itfirm_get_opt( 'logo_maxh_sm' );
			if ( ! empty( $logo_maxh_sm['height'] ) && $logo_maxh_sm['height'] != 'px' ) {
				printf( '.ct-header-mobile .ct-header-branding img { max-height: %s !important; }', esc_attr( $logo_maxh_sm['height'] ) );
			} ?>
        }
        <?php /* End Logo */

		/* Menu */ ?>
		@media screen and (min-width: 1200px) {
		<?php  
			$topbar_bg_color = itfirm_get_opt( 'topbar_bg_color' );
			$header_bg_color = itfirm_get_opt( 'header_bg_color' );
			if ( ! empty( $topbar_bg_color ) ) {
				printf( '#ct-header-top { background-color: %s !important; }', esc_attr( $topbar_bg_color ) );
			}

			if ( ! empty( $header_bg_color ) ) {
				printf( '#ct-header-wrap #ct-header, #ct-header-wrap #ct-header .ct-header-navigation-bg { background-color: %s !important; }', esc_attr( $header_bg_color ) );
				printf( '#ct-header-wrap.ct-header-layout3 #ct-header { background-color: transparent !important; }', esc_attr( $header_bg_color ) );

				printf( '#ct-header-wrap.ct-header-layout3 #ct-header.h-fixed { background-color: %s !important; }', esc_attr( $header_bg_color ) );
				printf( '#ct-header-wrap.ct-header-layout3 #ct-header.h-fixed .ct-header-navigation-bg { background-color: transparent !important; }', esc_attr( $header_bg_color ) );
			}

			$main_menu_color = itfirm_get_opt( 'main_menu_color' );
			if ( ! empty( $main_menu_color['regular'] ) ) {
				printf( '.ct-main-menu > li > a { color: %s !important; }', esc_attr( $main_menu_color['regular'] ) );
			}
			if ( ! empty( $main_menu_color['hover'] ) ) {
				printf( '.ct-main-menu > li > a:hover { color: %s !important; }', esc_attr( $main_menu_color['hover'] ) );
			}
			if ( ! empty( $main_menu_color['active'] ) ) {
				printf( '.ct-main-menu > li.current_page_item > a, .ct-main-menu > li.current-menu-item > a, .ct-main-menu > li.current_page_ancestor > a, .ct-main-menu > li.current-menu-ancestor > a { color: %s !important; }', esc_attr( $main_menu_color['active'] ) );
			}
			$sticky_menu_color = itfirm_get_opt( 'sticky_menu_color' );
			if ( ! empty( $sticky_menu_color['regular'] ) ) {
				printf( '#ct-header.h-fixed .ct-main-menu > li > a { color: %s !important; }', esc_attr( $sticky_menu_color['regular'] ) );
			}
			if ( ! empty( $sticky_menu_color['hover'] ) ) {
				printf( '#ct-header.h-fixed .ct-main-menu > li > a:hover { color: %s !important; }', esc_attr( $sticky_menu_color['hover'] ) );
			}
			if ( ! empty( $sticky_menu_color['active'] ) ) {
				printf( '#ct-header.h-fixed .ct-main-menu > li.current_page_item > a, #ct-header.h-fixed .ct-main-menu > li.current-menu-item > a, #ct-header.h-fixed .ct-main-menu > li.current_page_ancestor > a, #ct-header.h-fixed .ct-main-menu > li.current-menu-ancestor > a { color: %s !important; }', esc_attr( $sticky_menu_color['active'] ) );
			}
			$sub_menu_color = itfirm_get_opt( 'sub_menu_color' );
			if ( ! empty( $sub_menu_color['regular'] ) ) {
				printf( '#ct-header .ct-main-menu .sub-menu > li > a { color: %s !important; }', esc_attr( $sub_menu_color['regular'] ) );
			}
			if ( ! empty( $sub_menu_color['hover'] ) ) {
				printf( '#ct-header .ct-main-menu .sub-menu > li > a:hover { color: %s !important; }', esc_attr( $sub_menu_color['hover'] ) );
				printf( '#ct-header .ct-main-menu .sub-menu > li > a:before { background-color: %s !important; }', esc_attr( $sub_menu_color['hover'] ) );
			}
			if ( ! empty( $sub_menu_color['active'] ) ) {
				printf( '#ct-header .ct-main-menu .sub-menu > li.current_page_item > a, #ct-header .ct-main-menu .sub-menu > li.current-menu-item > a, #ct-header .ct-main-menu .sub-menu > li.current_page_ancestor > a, #ct-header .ct-main-menu .sub-menu > li.current-menu-ancestor > a { color: %s !important; }', esc_attr( $sub_menu_color['active'] ) );
				printf( '#ct-header .ct-main-menu .sub-menu > li.current_page_item > a:before, #ct-header .ct-main-menu .sub-menu > li.current-menu-item > a:before, #ct-header .ct-main-menu .sub-menu > li.current_page_ancestor > a:before, #ct-header .ct-main-menu .sub-menu > li.current-menu-ancestor > a:before { background-color: %s !important; }', esc_attr( $sub_menu_color['active'] ) );
			}
			$menu_icon_color = itfirm_get_opt( 'menu_icon_color' );
			if ( ! empty( $menu_icon_color ) ) {
				printf( '.ct-main-menu .link-icon { color: %s !important; }', esc_attr( $menu_icon_color ) );
			}
			?>
		}
		<?php /* End Menu */

		/* Page Title */
		$ptitle_bg = itfirm_get_page_opt( 'ptitle_bg' );
		$custom_pagetitle = itfirm_get_page_opt( 'custom_pagetitle', 'themeoption' );
		if ( $custom_pagetitle == 'show' && ! empty( $ptitle_bg['background-image'] ) ) {
			echo 'body .site #ct-pagetitle.ct-pagetitle {
                background-image: url(' . esc_attr( $ptitle_bg['background-image'] ) . ');
            }';
		}
		if ( $custom_pagetitle == 'show' && ! empty( $ptitle_bg['background-color'] ) ) {
			echo 'body .site #ct-pagetitle.ct-pagetitle {
                background-color: '. esc_attr( $ptitle_bg['background-color'] ) .';
            }';
		}

		/* Start Preset */
		$p_primary_color = itfirm_get_page_opt( 'p_primary_color' );
		if ( !empty( $p_primary_color ) ) {
			echo '.ct-service-carousel2 .item-readmore a,
			.ct-service-carousel2 .item--feature i {
                background-color: '. itfirm_hex_to_rgba($p_primary_color, 0.1) .';
            }';
            echo '.ct-loading-ito .item-4,
            .ct-video-button.style1:after,
            .ct-accordion1.style2 .ct-ac-title.active .ct-ac-title-text, .ct-accordion1.style2 .ct-ac-title:hover .ct-ac-title-text,
            .ct-spinner3 .double-bounce1, .ct-spinner3 .double-bounce2, .ct-video-button.style2:after, .ct-video-button.style2::before,
            .ct-service-carousel2 .item--icon, .ct-service-carousel2 .item-readmore a:hover, .ct-showcase.style1.no-soon .ct-btn-group .btn.active,
            .ct-process-grid1 .item--icon, .ct-slider-boxtext:hover, .revslider-initialised .case-arrow-slider2.tparrows:hover, .ct-support-button,
            .ct-pricing-single2:hover .pricing--price::before, .slick-dots-style5 .slick-dots li.slick-active button {
                background-color: '. esc_attr( $p_primary_color ) .';
            }';
            echo '.revslider-initialised .rs-layer cite, .ct-heading cite,
            .ct-service-carousel2 .item-readmore a,
            .ct-testimonial-carousel6 .item--icon, .ct-testimonial-carousel6 .item--position,
            .ct-slider-boxtext .item--icon i, .revslider-initialised .case-arrow-slider2.tparrows:before {
                color: '. esc_attr( $p_primary_color ) .';
            }';
            echo '.ct-loading-ito .item-2,
            .slick-dots-style3 .slick-dots li button::after,
            .ct-accordion1.style2 .ct-ac-title.active .ct-ac-title-text, .ct-accordion1.style2 .ct-ac-title:hover .ct-ac-title-text,
            .revslider-initialised .case-arrow-slider2.tparrows {
                border-color: '. esc_attr( $p_primary_color ) .';
            }';

            ?>
            @media screen and (min-width: 1200px) { <?php
            	
        	?> }
            @media screen and (max-width: 1199px) { <?php
            	
        	?> } <?php
		}

		$p_secondary_color = itfirm_get_page_opt( 'p_secondary_color' );
		if ( !empty( $p_secondary_color ) ) {
            echo '.ct-loading-ito .item-1, .ct-loading-ito .item-3, .ct-loading-ito .item-2::before,
            .ct-social-icon2 label::before {
                background-color: '. esc_attr( $p_secondary_color ) .';
            }';
        }

		$p_gradient_color = itfirm_get_page_opt( 'p_gradient_color' );
		if ( !empty($p_gradient_color['from']) && isset($p_gradient_color['from']) && !empty($p_gradient_color['to']) && isset($p_gradient_color['to']) ) {
            echo '.text-gradient, .ct-tabs3 .ct-tabs-title .ct-tab-title::before,
            .ct-testimonial-carousel4 .item--position span,
            .ct-testimonial-carousel4 .item--image::before,
            .slick-arrows-1 .ct-slick-carousel .slick-arrow::after,
            .ct-slick-arrow-style2 .ct-slick-carousel .slick-arrow::after,
            .scroll-top, .ct-nav-carousel .nav-slick::after,
            .ct-blog-carousel-layout2 .item--title a:hover,
            .slick-dots-style3 .slick-dots li.slick-active button,
            .ct-video-button.style1:before, .ct-modal .ct-modal-close {
                background-image: -webkit-gradient(linear, left top, right top, from('.esc_attr($p_gradient_color['from']).'), to('.esc_attr($p_gradient_color['to']).'));
				background-image: -webkit-linear-gradient(to left, '.esc_attr($p_gradient_color['from']).', '.esc_attr($p_gradient_color['to']).');
				background-image: -moz-linear-gradient(to left, '.esc_attr($p_gradient_color['from']).', '.esc_attr($p_gradient_color['to']).');
				background-image: -ms-linear-gradient(to left, '.esc_attr($p_gradient_color['from']).', '.esc_attr($p_gradient_color['to']).');
				background-image: -o-linear-gradient(to left, '.esc_attr($p_gradient_color['from']).', '.esc_attr($p_gradient_color['to']).');
				background-image: linear-gradient(to left, '.esc_attr($p_gradient_color['from']).', '.esc_attr($p_gradient_color['to']).');
            }';
            echo '.ct-contact-form-layout1.style3 .wpcf7-submit, .ct-cta1 .item--button a, .ct-contact-form-layout1.style4 .wpcf7-submit {
                background-image: -webkit-linear-gradient(90deg, '.esc_attr($p_gradient_color['from']).' 0%, '.esc_attr($p_gradient_color['to']).' 50%, '.esc_attr($p_gradient_color['from']).');
				background-image: -moz-linear-gradient(90deg, '.esc_attr($p_gradient_color['from']).' 0%, '.esc_attr($p_gradient_color['to']).' 50%, '.esc_attr($p_gradient_color['from']).');
				background-image: -ms-linear-gradient(90deg, '.esc_attr($p_gradient_color['from']).' 0%, '.esc_attr($p_gradient_color['to']).' 50%, '.esc_attr($p_gradient_color['from']).');
				background-image: -o-linear-gradient(90deg, '.esc_attr($p_gradient_color['from']).' 0%, '.esc_attr($p_gradient_color['to']).' 50%, '.esc_attr($p_gradient_color['from']).');
				background-image: linear-gradient(90deg, '.esc_attr($p_gradient_color['from']).' 0%, '.esc_attr($p_gradient_color['to']).' 50%, '.esc_attr($p_gradient_color['from']).');
            }';
        }
        /* Start Preset */

		return ob_get_clean();
	}
}

new CSS_Generator();