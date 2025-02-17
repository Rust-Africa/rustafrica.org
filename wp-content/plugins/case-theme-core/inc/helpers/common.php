<?php

if(!function_exists('ct_print_html')){
    function ct_print_html($content){
        echo $content;
    }
}

if(!function_exists('ct_print_shortcode')) {
    function ct_print_shortcode($content)
    {
        echo do_shortcode($content);
    }
}

if(!function_exists('ct_register_shortcode')) {
    function ct_register_shortcode($tag, $callback)
    {
        add_shortcode($tag, $callback);
    }
}

if(!function_exists('ct_register_wp_widget')) {
    function ct_register_wp_widget($class)
    {
        register_widget($class);
    }
}

if(!function_exists('replace_all_special_character')){
    function replace_all_special_character($subject = '', $replace = '_'){
        return preg_replace('/[^A-Za-z0-9]/', $replace, $subject);
    }
}

if(!function_exists('ct_get_template') && !function_exists('ct_get_locate_template')){
    function ct_get_template($widget, $template_path = '', $default_path = ''){
        $settings = $widget->get_settings_for_display();
        $settings['element_id'] = $widget->get_id();
        $settings['element_name'] = $widget->get_name();
        $template_name = $widget->get_name();
        $layout = (isset($settings['layout']) && !empty($settings['layout']))?$settings['layout']:'1';

        $located = ct_get_locate_template($template_name, $layout, $template_path, $default_path);

        if (!file_exists($located)) {
            _doing_it_wrong(__FUNCTION__, sprintf('<code>%s</code> does not exist.', $located), '1.0');

            return false;
        }

        $located = apply_filters('ct_template_part', $located, $template_name, $settings, $template_path, $default_path);

        include($located);

    }

    function ct_get_locate_template($template_name, $layout = '1', $template_path = '', $default_path = '')
    {
        $layout_name = 'layout' . $layout . '.php';
        if (!$template_path) {
            $template_path = apply_filters('ct_template_path', 'elementor/templates/widgets/' . $template_name . '/');
        }

        if (!$default_path) {
            $default_path = CT_PATH . 'templates/widgets/' . $template_name . '/';
        }

        // Look within passed path within the theme - this is priority.
        $template = locate_template(
            array(
                trailingslashit($template_path) . $layout_name,
                $layout_name
            )
        );

        // Get default template/
        if (!$template) {
            $template = $default_path . $layout_name;
        }

        // Return what we found.
        return apply_filters('ct_locate_template', $template, $template_name, $template_path);
    }
}

if(!function_exists('ct_get_post_types')){
    function ct_get_post_types(){

    }
}
if(!function_exists('ct_get_post_type_options')){
    function ct_get_post_type_options(){
        $post_types = get_post_types([
            'public'   => true,
            //'_builtin' => false
        ], 'objects');
        $DefaultExcludedPostTypes = [
            'page',
            'attachment',
            'revision',
            'nav_menu_item',
            'vc_grid_item',
            'custom_css',
            'customize_changeset',
            'oembed_cache',
            'ct-mega-menu',
            'elementor_library',
        ];
        $ExtraExcludedPostTypes = apply_filters('ct_get_post_types', []);
        $excludedPostTypes      = array_merge($DefaultExcludedPostTypes, $ExtraExcludedPostTypes );

        $result = [];
        if (!is_array($post_types))
            return $result;
        foreach ($post_types as $post_type) {
            if (!$post_type instanceof WP_Post_Type)
                continue;
            if (in_array($post_type->name, $excludedPostTypes))
                continue;
            $result[$post_type->name] = $post_type->labels->singular_name;;
        }
  
        return $result;
    }
}
if(!function_exists('ct_get_post_categories')){
    function ct_get_post_categories(){
        return get_terms('category', array(
            'hide_empty' => false,
            'order' => 'desc',
        ));
    }
    if(!function_exists('ct_get_post_categories_options')){
        function ct_get_post_categories_options(){
            $categories = ct_get_post_categories();
            $options = array();
            if(!is_wp_error($categories)){
                foreach ($categories as $cat){
                    $options[$cat->slug . "|" . "category"] = $cat->name;
                }
            }
            return $options;
        }
    }
}

if(!function_exists('ct_get_element_id')){
    function ct_get_element_id($settings){
        return $settings['element_name'] . '-' . $settings['element_id'];
    }
}

if(!function_exists('ct_get_grid_term_list')){
    function ct_get_grid_term_list($post_type, $taxonomy = array())
    {
        if (empty($taxonomy)) {
            $taxonomy = get_object_taxonomies($post_type, 'names');
        }
        $term_list = array();
        $term_list['terms'] = array();
        $term_list['auto_complete'] = array();
        foreach ($taxonomy as $tax) {
            $terms = get_terms(
                array(
                    'taxonomy' => $tax,
                    'hide_empty' => true,
                )
            );
            foreach ($terms as $term) {
                $term_list['terms'][] = $term->slug . '|' . $tax;
                $term_list['auto_complete'][] = array(
                    'value' => $term->slug . '|' . $tax,
                    'label' => $term->name,
                );
            }
        }

        return $term_list;
    }
}

if(!function_exists('ct_get_grid_term_options')){
    function ct_get_grid_term_options($post_type, $taxonomy = array())
    {
        if (empty($taxonomy)) {
            $taxonomy = get_object_taxonomies($post_type, 'names');
        }
        $term_list = array();
        foreach ($taxonomy as $tax) {
            $terms = get_terms(
                array(
                    'taxonomy' => $tax,
                    'hide_empty' => true,
                )
            );
            foreach ($terms as $term) {
                $term_list[$term->slug . '|' . $tax] = $term->name;
            }
        }

        return $term_list;
    }
}

if(!function_exists('ct_get_posts_of_grid')) {
    function ct_get_posts_of_grid($post_type = 'post', $atts = array(), $taxonomy = array(), $args_extra = array())
    {
        extract($atts);
        if (!empty($post_ids)) {
            $ct_query = new WP_Query(array(
                'post_type' => $post_type,
                'post_status' => 'publish',
                'post__in' => array_map('intval', explode(',', $post_ids))
            ));
            $ct_paged = 1;
            $posts = $ct_query->query($ct_query->query_vars);
        } else {
            $args = array(
                'post_type' => $post_type,
                'post_status' => 'publish',
                'posts_per_page' => !empty($limit) ? intval($limit) : 6,
                'order' => !empty($order) ? $order : 'DESC',
                'orderby' => !empty($orderby) ? $orderby : 'date',
                'tax_query' => array(
                    'relation' => 'OR',
                )
            );
            $args = array_merge($args, $args_extra);
            if($currentPostId = get_the_ID()){
                $args['post__not_in'] = [ $currentPostId ];
            }

            // if select term on custom post type, move term item to cat.
            if (!empty($source)) {
                foreach ($source as $terms) {
                    $tmp = explode('|', $terms);
                    if (isset($tmp[0]) && isset($tmp[1])) {
                        $args['tax_query'][] = array(
                            'taxonomy' => $tmp[1],
                            'field' => 'slug',
                            'operator' => 'IN',
                            'terms' => array($tmp[0]),
                        );
                    }
                }
            }
            if (get_query_var('paged')) {
                $ct_paged = get_query_var('paged');
            } elseif (get_query_var('page')) {
                $ct_paged = get_query_var('page');
            } else {
                $ct_paged = 1;
            }

            $ct_query = new WP_Query($args);
            $ct_query->set('paged', intval($ct_paged));
            $ct_query->set('posts_per_page', !empty($limit) ? intval($limit) : 6);
            $query = $ct_query->query($ct_query->query_vars);
            $posts = $query;
        }

        if (empty($source)) {
            $source_new = ct_get_grid_term_list($post_type, $taxonomy);
            $categories = $source_new['terms'];
        }
        else{
            $categories = $source;
        }
        global $wp_query;
        $wp_query = $ct_query;
        $pagination = get_the_posts_pagination(array(
            'screen_reader_text' => '',
            'mid_size' => 2,
            'prev_text' => esc_html__('Back', CT_TEXT_DOMAIN),
            'next_text' => esc_html__('Next', CT_TEXT_DOMAIN),
        ));
        global $paged;
        $paged = $ct_paged;
        $categories = is_array($categories) ? $categories : array();

        wp_reset_query();

        return array(
            'posts' => $posts,
            'categories' => $categories,
            'query' => $ct_query,
            'args' => $args,
            'paged' => $paged,
            'max' => $ct_query->max_num_pages,
            'next_link' => next_posts($ct_query->max_num_pages, false),
            'total' => $ct_query->found_posts,
            'pagination' => $pagination
        );
    }
}

if(!function_exists('ct_get_term_of_post_to_class')){
    function ct_get_term_of_post_to_class($post_id, $tax = array())
    {
        $term_list = array();
        foreach ($tax as $taxo) {
            $term_of_post = wp_get_post_terms($post_id, $taxo);
            foreach ($term_of_post as $term) {
                $term_list[] = $term->slug;
            }
        }

        return implode(' ', $term_list);
    }
}

if(!function_exists('ct_get_all_page')){
    function ct_get_all_page(){
        $all_posts = get_posts( array(
                'posts_per_page'    => -1,
                'post_type'         => 'page',
            )
        );
        if( !empty( $all_posts ) && !is_wp_error( $all_posts ) ) {
            foreach ( $all_posts as $post ) {
                $options[ $post->ID ] = strlen( $post->post_title ) > 20 ? substr( $post->post_title, 0, 20 ).'...' : $post->post_title;
            }
        }
        return $options;
    }
}