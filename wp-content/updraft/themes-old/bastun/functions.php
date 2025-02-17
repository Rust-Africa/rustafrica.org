<?php
$bastun_redux_demo = get_option('redux_demo');
//Custom fields:
require_once get_template_directory() . '/framework/wp_bootstrap_navwalker.php';
require_once get_template_directory() . '/framework/class-ocdi-importer.php';
//Theme Set up:
function bastun_theme_setup() {
    /*
     * This theme uses a custom image size for featured images, displayed on
     * "standard" posts and pages.
     */
  	add_theme_support( 'custom-header' ); 
  	add_theme_support( 'custom-background' );
  	$lang = get_template_directory_uri() . '/languages';
    load_theme_textdomain('bastun', $lang);
    add_theme_support( 'post-thumbnails' );
    // Adds RSS feed links to <head> for posts and comments.
    add_theme_support( 'automatic-feed-links' );
    // Switches default core markup for search form, comment form, and comments
    // to output valid HTML5.
    add_theme_support( 'title-tag' );
    add_theme_support( 'html5', array( 'search-form', 'comment-form', 'comment-list' ) );
    // This theme uses wp_nav_menu() in one location.
  	register_nav_menus( array(
      'primary' =>  esc_html__( 'Primary: Chosen menu in the pages', 'bastun' ),
      'primary_mobile' =>  esc_html__( 'Primary Mobile : Chosen menu in the pages', 'bastun' ),
      'menu_home4' =>  esc_html__( 'Menu Home 4 & Home 10: Chosen menu in the Home 4 & Home 10', 'bastun' ),
      'onepage_home1' =>  esc_html__( 'OnePage Home 1 : Chosen menu in the OnePage Home 1', 'bastun' ),
      'onepage_home2' =>  esc_html__( 'OnePage Home 2 : Chosen menu in the OnePage Home 2', 'bastun' ),
      'onepage_home3' =>  esc_html__( 'OnePage Home 3 : Chosen menu in the OnePage Home 3', 'bastun' ),
      'onepage_home4' =>  esc_html__( 'OnePage Home 4 : Chosen menu in the OnePage Home 4', 'bastun' ),
      'onepage_home5' =>  esc_html__( 'OnePage Home 5 : Chosen menu in the OnePage Home 5', 'bastun' ),
      'onepage_home6' =>  esc_html__( 'OnePage Home 6 : Chosen menu in the OnePage Home 6', 'bastun' ),
      'onepage_home7' =>  esc_html__( 'OnePage Home 7 : Chosen menu in the OnePage Home 7', 'bastun' ),
      'onepage_home8' =>  esc_html__( 'OnePage Home 8 : Chosen menu in the OnePage Home 8', 'bastun' ),
      'onepage_home9' =>  esc_html__( 'OnePage Home 9 : Chosen menu in the OnePage Home 9', 'bastun' ),
      'onepage_home10' =>  esc_html__( 'OnePage Home 10 : Chosen menu in the OnePage Home 10', 'bastun' ),
      'onepage_home11' =>  esc_html__( 'OnePage Home 11 : Chosen menu in the OnePage Home 11', 'bastun' ),
      'onepage_home12' =>  esc_html__( 'OnePage Home 12 : Chosen menu in the OnePage Home 12', 'bastun' ),
      'onepage_home13' =>  esc_html__( 'OnePage Home 13 : Chosen menu in the OnePage Home 13', 'bastun' ),
      'onepage_home14' =>  esc_html__( 'OnePage Home 14 : Chosen menu in the OnePage Home 14', 'bastun' ),
      'onepage_home15' =>  esc_html__( 'OnePage Home 15 : Chosen menu in the OnePage Home 15', 'bastun' ),
      'onepage_home16' =>  esc_html__( 'OnePage Home 16 : Chosen menu in the OnePage Home 16', 'bastun' ),
      'onepage_home17' =>  esc_html__( 'OnePage Home 17 : Chosen menu in the OnePage Home 17', 'bastun' ),
      'onepage_home18' =>  esc_html__( 'OnePage Home 18 : Chosen menu in the OnePage Home 18', 'bastun' ),
      'onepage_home19' =>  esc_html__( 'OnePage Home 19 : Chosen menu in the OnePage Home 19', 'bastun' ),
      'onepage_home20' =>  esc_html__( 'OnePage Home 20 : Chosen menu in the OnePage Home 20', 'bastun' ),
  	) );
      // This theme uses its own gallery styles.
}
function bastun_custom_theme_setup() {
    add_theme_support( 'woocommerce' );
}
add_action( 'after_setup_theme', 'bastun_custom_theme_setup' );
add_action( 'after_setup_theme', 'bastun_theme_setup' );
if ( ! isset( $content_width ) ) $content_width = 900;
function bastun_theme_scripts_styles() {
  	$bastun_redux_demo = get_option('redux_demo');
  	$protocol = is_ssl() ? 'https' : 'http';
    wp_enqueue_style('bootstrap', get_template_directory_uri().'/css/bootstrap.min.css');
    wp_enqueue_style('aos', get_template_directory_uri().'/css/aos.min.css');
    wp_enqueue_style('icofont', get_template_directory_uri().'/css/icofont.min.css');
    wp_enqueue_style('glightbox', get_template_directory_uri().'/css/glightbox.min.css');
    wp_enqueue_style('swiper-bundle', get_template_directory_uri().'/css/swiper-bundle.min.css');
    wp_enqueue_style('bastun-style', get_template_directory_uri().'/css/style.css');
    wp_enqueue_style('bastun-css', get_stylesheet_uri(), array(), '2024-11-15' );
    if(isset($bastun_redux_demo['chosen-color']) && $bastun_redux_demo['chosen-color']==1){
    wp_enqueue_style('color', get_template_directory_uri().'/framework/color.php');
    }

    if ( is_singular() && comments_open() && get_option( 'thread_comments' ) )
    wp_enqueue_script('comment-reply' );
    //Javascript
    wp_enqueue_script('popper', get_template_directory_uri().'/js/popper.min.js',array(),false,true);
    wp_enqueue_script('bootstrap', get_template_directory_uri().'/js/bootstrap.min.js',array(),false,true);
    wp_enqueue_script('glightbox', get_template_directory_uri().'/js/glightbox.min.js',array(),false,true);
    wp_enqueue_script('bastun-plugins', get_template_directory_uri().'/js/plugins.js',array(),false,true);
    wp_enqueue_script('swiper-bundle', get_template_directory_uri().'/js/swiper-bundle.min.js',array(),false,true);
    wp_enqueue_script('bastun-main', get_template_directory_uri().'/js/main.js',array(),false,true);
    if ( is_singular('product') ) {
    wp_enqueue_script('bastun-countdown', get_template_directory_uri().'/js/countdown.js',array(),false,true);
    }
}
add_action( 'wp_enqueue_scripts', 'bastun_theme_scripts_styles' );
add_action('woocommerce_before_shop_loop_item_title', 'bastun_custom_product_badges', 10);
function bastun_custom_product_badges() {
    global $product;

    $newness_days = 30; 
    $created = strtotime($product->get_date_created());
	if (!$product->is_in_stock()) {
        echo '<span class="onsale out-of-stock">Sold Out</span>';
        return;
    }
    if ((time() - $created) < (60 * 60 * 24 * $newness_days)) {
        echo '<span class="onsale new">New</span>';
        return;
    }
    if ($product->is_on_sale()) {
        echo '<span class="onsale">Sale</span>';
        return;
    }
    
}
add_filter( 'yith_wcwl_locate_template', 'bastun_custom_yith_wcwl_template_path', 10, 2 );
function bastun_custom_yith_wcwl_template_path( $located, $template_name ) {
    $custom_template = get_stylesheet_directory() . '/yith-woocommerce-wishlist/' . $template_name;
    if ( file_exists( $custom_template ) ) {
        return $custom_template;
    }
    return $located;
}
//Custom Excerpt Function
function bastun_do_shortcode($content) {
    global $shortcode_tags;
    if (empty($shortcode_tags) || !is_array($shortcode_tags))
        return $content;
    $pattern = get_shortcode_regex();
    return preg_replace_callback( "/$pattern/s", 'do_shortcode_tag', $content );
} 
// Widget Sidebar
function bastun_widgets_init() {
  	register_sidebar( array(
      'name'          => esc_html__( 'Primary Sidebar', 'bastun' ),
      'id'            => 'sidebar-1',        
  		'description'   => esc_html__( 'Appears in the sidebar section of the site.', 'bastun' ),        
  		'before_widget' => '<div class="widget sidebar__widget sidebar-widget-%2$s %2$s" id="%2$s" data-aos="fade-up" data-aos-duration="1500">',        
  		'after_widget'  => '</div>',        
  		'before_title'  => '<div class="sidebar__title"><h5>',        
  		'after_title'   => '</h5></div>'
    ) );
    register_sidebar( array(
      'name'          => esc_html__( 'Sidebar Service', 'bastun' ),
      'id'            => 'sidebar-service',
      'description'   => esc_html__( 'Sidebar Service that appears on the Service Details.', 'bastun' ),
      'before_widget' => '<div class="service__details__sidebar sidebar"><div class="sidebar__widget" data-aos="fade-up" data-aos-duration="1500">',
      'after_widget'  => '</div></div>',
      'before_title'  => '<div class="sidebar__title"><h5>',
      'after_title'   => '</h5></div>',
    ) );
    register_sidebar( array(
      'name'          => esc_html__( 'Sidebar Shop', 'bastun' ),
      'id'            => 'sidebar-shop',
      'description'   => esc_html__( 'Sidebar Service that appears on the Service Details.', 'bastun' ),
      'before_widget' => '<div class="shopsidebar__widget"><details open="">',
      'after_widget'  => '</details></div>',
      'before_title'  => '<summary>',
      'after_title'   => '</summary>',
    ) );
    register_sidebar( array(
      'name'          => esc_html__( 'Sidebar Project', 'bastun' ),
      'id'            => 'sidebar-project',
      'description'   => esc_html__( 'Sidebar Course that appears on the Project Pages.', 'bastun' ),
      'before_widget' => '<div class="project__details__sidebar sidebar %2$s">',
      'after_widget'  => '</div>',
      'before_title'  => '<h4 class="sidebar-title mb-22"> ',
      'after_title'   => ' </h4>',
    ) );
    register_sidebar( array(
      'name'          => esc_html__( 'Sidebar Page FAQ', 'bastun' ),
      'id'            => 'sidebar-faq',
      'description'   => esc_html__( 'Sidebar that appears on the Page FAQ.', 'bastun' ),
      'before_widget' => '<div class="widget sidebar__widget sidebar-widget-%2$s %2$s" id="%2$s" data-aos="fade-up" data-aos-duration="1500">',
      'after_widget'  => '</div>',
      'before_title'  => '<div class="sidebar__title"><h5> ',
      'after_title'   => '</h5></div>',
    ) );
    register_sidebar( array(
      'name'          => esc_html__( 'Footer Menu Widget', 'bastun' ),
      'id'            => 'footer-area-menu',
      'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'bastun' ),
      'before_widget' => '',
      'after_widget'  => '',
      'before_title'  => ' ',
      'after_title'   => ' ',
    ) );
    register_sidebar( array(
      'name'          => esc_html__( 'Footer One Widget', 'bastun' ),
      'id'            => 'footer-area-1',
      'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'bastun' ),
      'before_widget' => '',
      'after_widget'  => '',
      'before_title'  => ' ',
      'after_title'   => ' ',
    ) );
    register_sidebar( array(
      'name'          => esc_html__( 'Footer Two Widget', 'bastun' ),
      'id'            => 'footer-area-2',
      'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'bastun' ),
      'before_widget' => '<div id="%1$s">',
      'after_widget'  => '</div>',
      'before_title'  => ' ',
      'after_title'   => ' ',
    ) );

    register_sidebar( array(
      'name'          => esc_html__( 'Footer Three Widget', 'bastun' ),
      'id'            => 'footer-area-3',
      'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'bastun' ),
      'before_widget' => '<div id="%1$s">',
      'after_widget'  => '</div>',
      'before_title'  => ' ',
      'after_title'   => ' ',
    ) );
    register_sidebar( array(
      'name'          => esc_html__( 'Footer Four Widget', 'bastun' ),
      'id'            => 'footer-area-4',
      'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'bastun' ),
      'before_widget' => '<div id="%1$s">',
      'after_widget'  => '</div>',
      'before_title'  => ' ',
      'after_title'   => ' ',
    ) );
    register_sidebar( array(
      'name'          => esc_html__( 'Footer Five Widget', 'bastun' ),
      'id'            => 'footer-area-5',
      'description'   => esc_html__( 'Footer Widget that appears on the Footer.', 'bastun' ),
      'before_widget' => '<div id="%1$s">',
      'after_widget'  => '</div>',
      'before_title'  => ' ',
      'after_title'   => ' ',
    ) );
    
}
add_action( 'widgets_init', 'bastun_widgets_init' );
//function tag widgets
function bastun_tag_cloud_widget($args) {
  	$args['number'] = 0; //adding a 0 will display all tags
  	$args['largest'] = 18; //largest tag
  	$args['smallest'] = 11; //smallest tag
  	$args['unit'] = 'px'; //tag font unit
  	$args['format'] = 'list'; //ul with a class of wp-tag-cloud
  	$args['exclude'] = array(20, 80, 92); //exclude tags by ID
  	return $args;
}
add_filter( 'widget_tag_cloud_args', 'bastun_tag_cloud_widget' );
function bastun_excerpt() {
  $bastun_redux_demo = get_option('redux_demo');
  if(isset($bastun_redux_demo['blog_excerpt'])){
    $limit = $bastun_redux_demo['blog_excerpt'];
  }else{
    $limit = 200;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
function bastun_excerpt2() {
  $bastun_redux_demo = get_option('redux_demo');
  if(isset($bastun_redux_demo['service_excerpt'])){
    $limit = $bastun_redux_demo['service_excerpt'];
  }else{
    $limit = 50;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}
function bastun_excerpt3() {
  $bastun_redux_demo = get_option('redux_demo');
  if(isset($bastun_redux_demo['blog_excerpt3'])){
    $limit = $bastun_redux_demo['blog_excerpt3'];
  }else{
    $limit = 10;
  }
  $excerpt = explode(' ', get_the_excerpt(), $limit);
  if (count($excerpt)>=$limit) {
    array_pop($excerpt);
    $excerpt = implode(" ",$excerpt).'...';
  } else {
    $excerpt = implode(" ",$excerpt);
  }
  $excerpt = preg_replace('`[[^]]*]`','',$excerpt);
  return $excerpt;
}

function bastun_search_form( $form ) {
  $form = '
      <form action="' . esc_url(home_url('/')) . '" class="search-bastun">
          <input type="text" class="s-input-home" name="s" required value="' . get_search_query() . '" placeholder="'.esc_attr__('Search…', 'bastun').'">
          <button class="button btn-s-input" type="submit">
              <i class="icofont-search"></i>
          </button>
      </form>
	';
    return $form;
}
add_filter( 'get_search_form', 'bastun_search_form' );
function bastun_theme_comment($comment, $args, $depth) {
    //echo 's';
  $GLOBALS['comment'] = $comment; ?>
  <?php if(get_avatar($comment,$size='100' )!=''){?>
    <div class="blog__details__comment__inner">
      <div class="author__img">
          <?php echo get_avatar($comment,$size='80' ); ?>
      </div>
      <div class="author__content">
          <div class="author__name">
              <h6><?php printf( get_comment_author_link()) ?></h6>
              <p><?php comment_time(get_option( 'date_format' ));?></p>
          </div>
          <div class="author__text">
              <?php comment_text() ?>
          </div>
      </div>
      <div class="author__icon">
          <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
  </div>
  <?php }else{?>
  <div class="blog__details__comment__inner no-avatar">
      <div class="author__content">
          <div class="author__name">
              <h6><?php printf( get_comment_author_link()) ?></h6>
              <p><?php comment_time(get_option( 'date_format' ));?></p>
          </div>
          <div class="author__text">
              <?php comment_text() ?>
          </div>
      </div>
      <div class="author__icon">
          <?php comment_reply_link(array_merge( $args, array('depth' => $depth, 'max_depth' => $args['max_depth']))) ?>
      </div>
  </div>
  <?php }?>

<?php
}


/**
 * This file represents an example of the code that themes would use to register
 * the required plugins.
 *
 * It is expected that theme authors would copy and paste this code into their
 * functions.php file, and amend to suit.
 *
 * @package    TGM-Plugin-Activation
 * @subpackage Example
 * @version    2.6.1
 * @author     Thomas Griffin <thomasgriffinmedia.com>
 * @author     Gary Jones <gamajo.com>
 * @copyright  Copyright (c) 2014, Thomas Griffin
 * @license    http://opensource.org/licenses/gpl-2.0.php GPL v2 or later
 * @link       https://github.com/thomasgriffin/TGM-Plugin-Activation
 */
/**
 * bastunlude the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/framework/class-tgm-plugin-activation.php';
add_action( 'tgmpa_register', 'bastun_theme_register_required_plugins' );
/**
 * Register the required plugins for this theme.
 *
 * In this example, we register two plugins - one bastunluded with the TGMPA library
 * and one from the .org repo.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
 
 
function bastun_theme_register_required_plugins() {
    /**
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(
        // This is an example of how to bastunlude a plugin from the WordPress Plugin Repository.
      array(
            'name'      => esc_html__( 'One Click Demo Import', 'bastun' ),
            'slug'      => 'one-click-demo-import',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Classic Editor', 'bastun' ),
            'slug'      => 'classic-editor',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Classic Widgets', 'bastun' ),
            'slug'      => 'classic-widgets',
            'required'  => true,
        ),
      array(
            'name'      => esc_html__( 'Widget Importer & Exporter', 'bastun' ),
            'slug'      => 'widget-importer-&-exporter',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Contact Form 7', 'bastun' ),
            'slug'      => 'contact-form-7',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'WP Maximum Execution Time Exceeded', 'bastun' ),
            'slug'      => 'wp-maximum-execution-time-exceeded',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Elementor', 'bastun' ),
            'slug'      => 'elementor',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Woocommerce', 'bastun' ),
            'slug'      => 'woocommerce',
            'required'  => true,
        ),
      array(
            'name'      => esc_html__( 'Max Mega Menu', 'bastun' ),
            'slug'      => 'megamenu',
            'required'  => true,
        ),
      array(
            'name'      => esc_html__( 'User Registration', 'bastun' ),
            'slug'      => 'user-registration',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Filter Everything — WooCoomerce Product & WordPress Filter', 'bastun' ),
            'slug'      => 'filter-everything',
            'required'  => true,
        ), 
      array(
            'name'      => esc_html__( 'Custom Product Tabs for WooCommerce', 'bastun' ),
            'slug'      => 'yikes-inc-easy-custom-woocommerce-product-tabs',
            'required'  => true,
        ),
      array(
            'name'      => esc_html__( 'YITH WooCommerce Wishlist', 'bastun' ),
            'slug'      => 'yith-woocommerce-wishlist',
            'required'  => true,
        ), 
      array(
            'name'                     => esc_html__( 'Bastun Common', 'bastun' ),
            'slug'                     => 'bastun-common',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/bastun-common.zip',
        ),
      array(
            'name'                     => esc_html__( 'Bastun Elementor', 'bastun' ),
            'slug'                     => 'bastun-elementor',
            'required'                 => true,
            'source'                   => get_template_directory() . '/framework/plugins/bastun-elementor.zip',
        ),
    );
    /**
     * Array of configuration settings. Amend each line as needed.
     * If you want the default strings to be available under your own theme domain,
     * leave the strings uncommented.
     * Some of the strings are added into a sprintf, so see the comments at the
     * end of each line for what each argument will be.
     */
    $config = array(
        'default_path' => '',                      // Default absolute path to pre-packaged plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.
        'strings'      => array(
            'page_title'                      => esc_html__( 'Install Required Plugins', 'bastun' ),
            'menu_title'                      => esc_html__( 'Install Plugins', 'bastun' ),
            'installing'                      => esc_html__( 'Installing Plugin: %s', 'bastun' ), // %s = plugin name.
            'oops'                            => esc_html__( 'Something went wrong with the plugin API.', 'bastun' ),
            'notice_can_install_required'     => _n_noop( 'This theme requires the following plugin: %1$s.', 'This theme requires the following plugins: %1$s.', 'bastun' ), // %1$s = plugin name(s).
            'notice_can_install_recommended'  => _n_noop( 'This theme recommends the following plugin: %1$s.', 'This theme recommends the following plugins: %1$s.', 'bastun' ), // %1$s = plugin name(s).
            'notice_cannot_install'           => _n_noop( 'Sorry, but you do not have the correct permissions to install the %s plugin. Contact the administrator of this site for help on getting the plugin installed.', 'Sorry, but you do not have the correct permissions to install the %s plugins. Contact the administrator of this site for help on getting the plugins installed.', 'bastun' ), // %1$s = plugin name(s).
            'notice_can_activate_required'    => _n_noop( 'The following required plugin is currently inactive: %1$s.', 'The following required plugins are currently inactive: %1$s.', 'bastun' ), // %1$s = plugin name(s).
            'notice_can_activate_recommended' => _n_noop( 'The following recommended plugin is currently inactive: %1$s.', 'The following recommended plugins are currently inactive: %1$s.', 'bastun' ), // %1$s = plugin name(s).
            'notice_cannot_activate'          => _n_noop( 'Sorry, but you do not have the correct permissions to activate the %s plugin. Contact the administrator of this site for help on getting the plugin activated.', 'Sorry, but you do not have the correct permissions to activate the %s plugins. Contact the administrator of this site for help on getting the plugins activated.', 'bastun' ), // %1$s = plugin name(s).
            'notice_ask_to_update'            => _n_noop( 'The following plugin needs to be updated to its latest version to ensure maximum compatibility with this theme: %1$s.', 'The following plugins need to be updated to their latest version to ensure maximum compatibility with this theme: %1$s.', 'bastun' ), // %1$s = plugin name(s).
            'notice_cannot_update'            => _n_noop( 'Sorry, but you do not have the correct permissions to update the %s plugin. Contact the administrator of this site for help on getting the plugin updated.', 'Sorry, but you do not have the correct permissions to update the %s plugins. Contact the administrator of this site for help on getting the plugins updated.', 'bastun' ), // %1$s = plugin name(s).
            'install_link'                    => _n_noop( 'Begin installing plugin', 'Begin installing plugins', 'bastun' ),
            'activate_link'                   => _n_noop( 'Begin activating plugin', 'Begin activating plugins', 'bastun' ),
            'return'                          => esc_html__( 'Return to Required Plugins Installer', 'bastun' ),
            'plugin_activated'                => esc_html__( 'Plugin activated successfully.', 'bastun' ),
            'complete'                        => esc_html__( 'All plugins installed and activated successfully. %s', 'bastun' ), // %s = dashboard link.
            'nag_type'                        => 'updated' // Determines admin notice type - can only be 'updated', 'update-nag' or 'error'.
        )
    );
    tgmpa( $plugins, $config );
}
?>