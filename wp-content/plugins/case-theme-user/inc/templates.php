<?php
if (! defined('ABSPATH')) {
    exit(); // Exit if accessed directly
}

/**
 * Get template file.
 * 
 * Check template file from theme and plugin load_template() file.
 * @package Case Theme User
 * @version 1.0.0
 */
if (! function_exists('up_get_template_part')) {

    function up_get_template_part($slug, $name = '')
    {
        $template = '';
        
        // Look in yourtheme/woorestaurant/slug-name.php
        if ($slug && $name && file_exists(userpress()->theme_dir . "{$slug}-{$name}.php")) {
            $template = userpress()->theme_dir . "{$slug}-{$name}.php";
        }
        
        // If template file doesn't exist, look in yourtheme/woorestaurant/slug.php
        if (! $template && file_exists(userpress()->theme_dir . "{$slug}.php")) {
            $template = userpress()->theme_dir . "{$slug}.php";
        }
        
        // Get default slug-name.php
        if (! $template && $name && file_exists(userpress()->templates_dir . "{$slug}-{$name}.php")) {
            $template = userpress()->templates_dir . "{$slug}-{$name}.php";
        }
        
        // If default file doesn't exist, look in slug.php
        if (! $template && file_exists(userpress()->templates_dir . "{$slug}.php")) {
            $template = userpress()->templates_dir . "{$slug}.php";
        }
        
        if ($template) {
            
            // Allow 3rd party plugin filter template file from their plugin
            $template = apply_filters('wr_get_template_part', $template, $slug, $name);
            
            // load template file.
            load_template($template, false);
        }
    }
}

if(!function_exists('up_get_template_css')){
    /**
     * get template uri.
     * 
     * @param unknown $layout
     * @return string|boolean
     */
    function up_get_template_css($layout) {
        
        $css_uri = $css_dir = '';
        
        if(!$layout)
            return ;
        
        if(is_dir(userpress()->theme_dir . $layout)){
            
            $css_uri = userpress()->theme_url . $layout .'/users-press-' . $layout . '.css';
            $css_dir = userpress()->theme_dir . $layout .'/users-press-' . $layout . '.css';
        } elseif (is_dir(userpress()->templates_dir . $layout)){
            
            $css_uri = userpress()->templates_url . $layout .'/users-press-' . $layout . '.css';
            $css_dir = userpress()->templates_dir . $layout .'/users-press-' . $layout . '.css';
        }
        
        if(!$css_uri && !file_exists($css_dir))
            return;
        
        wp_enqueue_style('users-press-' . $layout, $css_uri);
    }
}

/**
 * Get list layouts.
 * 
 * Check templates from plugin and theme get layouts name.
 * @return layout name.
 * @package Case Theme User
 * @version 1.0.0
 */
if(!function_exists('up_get_template_list')){
	
	function up_get_template_list(){
		
		$in_plugin = false;
		$in_theme = false;
		
		if(file_exists(userpress()->templates_dir))
		$in_plugin = scandir(userpress()->templates_dir);
		
		if(file_exists(userpress()->theme_dir))
		$in_theme = scandir(userpress()->theme_dir);
		
		/* if layout in theme + plugin. */
		if($in_plugin && $in_theme){
		    
		    unset($in_plugin[0]);
		    unset($in_plugin[1]);
		    unset($in_theme[0]);
		    unset($in_theme[1]);
					    
			$in_plugin = array_unique(array_merge($in_plugin , $in_theme));
			
			return $in_plugin;
		}
		
		/* if layout in plugin. */
		if($in_plugin){
			
			unset($in_plugin[0]);
			unset($in_plugin[1]);
			
			return $in_plugin;
		}
		
	}	
}