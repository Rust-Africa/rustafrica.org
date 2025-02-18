<?php 
use Elementor\Core\Files\CSS\Post;
use Elementor\Plugin;
use Elementor\Post_CSS_File;

add_action('wp_enqueue_scripts',  'itfirm_elementor_enqueue_scripts' );
add_filter('single_template',  'itfirm_load_canvas_template' );

function itfirm_elementor_enqueue_scripts() {
    // not active pxl theme
    $footer_layout_custom = itfirm_get_opt('footer_layout_custom');
    $footer_page_layout_custom = itfirm_get_page_opt('footer_layout_custom','');
    if(!empty( $footer_page_layout_custom ))
    	$footer_layout_custom = $footer_page_layout_custom;
    	 
    if (empty($footer_layout_custom)) return;

    if (class_exists('\Elementor\Plugin')) {
        $elementor = Plugin::instance();
        $elementor->frontend->enqueue_styles();
    }

    /*if (class_exists('\ElementorPro\Plugin')) {
        $elementor_pro = \ElementorPro\Plugin::instance();
        $elementor_pro->enqueue_styles();
    }*/

    
    $layout_id = (int)$footer_layout_custom;
    $css_file = '';
    if ($layout_id > 0) {
        if (class_exists('\Elementor\Core\Files\CSS\Post')) {
            $css_file = new Post($layout_id);
        } elseif (class_exists('\Elementor\Post_CSS_File')) {
            $css_file = new Post_CSS_File($layout_id);
        }
        $css_file->enqueue();
    }
}
 
function itfirm_load_canvas_template($single_template) {
    global $post;
   
    if (in_array($post->post_type, ['footer'])) {
        $elementor_2_0_canvas = ELEMENTOR_PATH . '/modules/page-templates/templates/canvas.php';
        if (file_exists($elementor_2_0_canvas)) {
            return $elementor_2_0_canvas;
        } else {
            return ELEMENTOR_PATH . '/includes/page-templates/canvas.php';
        }
    }

    return $single_template;
}