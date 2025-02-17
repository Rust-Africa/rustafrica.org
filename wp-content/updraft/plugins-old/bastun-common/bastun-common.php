<?php
/**
* Plugin Name: Bastun Common
* Plugin URI: shtheme.com
* Description: A plugin to create custom post type, metabox...
* Version:  1.0
* Author: shtheme
* Author URI: shtheme.com
* License:  GPL2
*/
include dirname( __FILE__ ) . '/meta-box/meta-box.php';
include dirname( __FILE__ ) . '/redux-framework/redux-core/framework.php';
include dirname( __FILE__ ) . '/redux-framework/sample/sample-config.php';
include dirname( __FILE__ ) . '/custom-post-type/post_type.php';
include dirname( __FILE__ ) . '/widget/recent-post.php';
return true;
