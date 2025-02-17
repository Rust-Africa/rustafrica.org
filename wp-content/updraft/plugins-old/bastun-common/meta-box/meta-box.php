<?php
/**
 * Plugin Name: Meta Box
 * Plugin URI:  https://metabox.io
 * Description: Create custom meta boxes and custom fields in WordPress.
 * Version:     5.3.3
 * Author:      MetaBox.io
 * Author URI:  https://metabox.io
 * License:     GPL2+
 * Text Domain: meta-box
 * Domain Path: /languages/
 *
 * @package Meta Box
 */

if ( defined( 'ABSPATH' ) && ! defined( 'RWMB_VER' ) ) {
	register_activation_hook( __FILE__, 'rwmb_check_php_version' );

	/**
	 * Display notice for old PHP version.
	 */
	function rwmb_check_php_version() {
		if ( version_compare( phpversion(), '5.3', '<' ) ) {
			die( esc_html__( 'Meta Box requires PHP version 5.3+. Please contact your host to upgrade.', 'meta-box' ) );
		}
	}




	require_once dirname( __FILE__ ) . '/inc/loader.php';
	$rwmb_loader = new RWMB_Loader();
	$rwmb_loader->init();


	add_filter( 'rwmb_meta_boxes', function ( $meta_boxes ) {

	$prefix = '_cmb_';


  // Open Code

	$meta_boxes[] = array(
        'id'         => 'post_setting',
        'title'      => 'Post Setting',
        'pages'      => array('post'), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
        'fields' => array(
            array(
                'name' => 'Image Recent Posts',
                'desc' => 'Show in Recent Posts Image',
                'id'   => $prefix . 'image_recent',
                'type'    => 'single_image',
            ),
            array(
                'name' => 'Title Recent Posts',
                'desc' => 'Show in Title Recent Posts',
                'id'   => $prefix . 'title_recent',
                'type'    => 'text',
            ),
            
            array(
                'name' => 'Title Blog Grid',
                'desc' => 'Show in Title Blog Grid',
                'id'   => $prefix . 'title_blog',
                'type'    => 'text',
            ),
            array(
                'name' => 'Image Blog Grid',
                'desc' => 'Show in Image Blog Grid',
                'id'   => $prefix . 'image_blog',
                'type'    => 'single_image',
            ),
            array(
                'name' => 'Image Home',
                'desc' => 'Show in Image Home',
                'id'   => $prefix . 'image_home',
                'type'    => 'single_image',
            ),
            
        )
    );
    $meta_boxes[] = array(
        'id'         => 'project_setting',
        'title'      => 'Project Setting',
        'pages'      => array('project'), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
        'fields' => array(
            array(
                'name' => 'Feature Image',
                'desc' => 'Show Feature Image',
                'id'   => $prefix . 'image_feature',
                'type'    => 'single_image',
            ),
        )
    );
    $meta_boxes[] = array(
        'id'         => 'product_setting',
        'title'      => 'Product Setting',
        'pages'      => array('product'), // Post type
        'context'    => 'normal',
        'priority'   => 'high',
        'show_names' => true, // Show field names on the left
        //'show_on'    => array( 'key' => 'id', 'value' => array( 2, ), ), // Specific post IDs to display this metabox
        'fields' => array(
            array(
                'name' => 'Title Time Sale',
                'desc' => 'Show Title Time Sale',
                'id'   => $prefix . 'title_time_sale',
                'type'    => 'text',
            ),
            array(
                'name' => 'Time Sale',
                'desc' => 'Show Time Sale',
                'id'   => $prefix . 'time_sale',
                'type'    => 'text',
            ),
            array(
                'name' => 'Title Number Stock',
                'desc' => 'Show Title Number Stock',
                'id'   => $prefix . 'number_stock',
                'type'    => 'text',
            ),
            array(
                'name' => 'Title Category',
                'desc' => 'Show Title Category',
                'id'   => $prefix . 'title_category',
                'type'    => 'text',
            ),
            array(
                'name' => 'Title Color',
                'desc' => 'Show Title Color',
                'id'   => $prefix . 'title_color',
                'type'    => 'text',
            ),
            array(
                'name' => 'Color',
                'desc' => 'Show Color',
                'id'   => $prefix . 'color',
                'type'    => 'text',
            ),
        )
    );
    
     

    
// End Code



    return $meta_boxes;
});
}
