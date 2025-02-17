<?php
/**
 * @Template: class-megamenu-walker.php
 * @since: 1.0.0
 * @author: Case Themes
 * @descriptions:
 * @create: 22-Nov-17
 */
if (!defined('ABSPATH')) {
    die();
}

class EFramework_Mega_Menu_Walker extends Walker_Nav_Menu
{
    private $item;

    /**
     * Starts the list before the elements are added.
     *
     * @since 3.0.0
     *
     * @see Walker::start_lvl()
     *
     * @param string $output Passed by reference. Used to append additional content.
     * @param int $depth Depth of menu item. Used for padding.
     * @param array $args An array of wp_nav_menu() arguments.
     */
    public function start_lvl(&$output, $depth = 0, $args = array())
    {
        $indent = str_repeat("\t", $depth);
        $output .= "\n$indent<ul class=\"sub-menu\">\n";
    }

    /**
     * @see Walker::start_el()
     */
    public function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0)
    {
        $item_html = '';
        $megamenu = apply_filters('ct_enable_megamenu', false);

        if ('[divider]' === $item->title) {
            $output .= '<li class="menu-item-divider"></li>';
            return;
        }

        $extra_menu_custom = apply_filters("ct_menu_edit", array());
        if ($item->ct_onepage === 'is-one-page' && !wp_script_is('single-page-nav')) {
            wp_register_script('single-page-nav', CT_URL . 'assets/js/onepage.js', array('jquery', 'waypoints'), 'all', true);
            wp_localize_script('single-page-nav', 'one_page_options', array('filter' => '.is-one-page', 'speed' => '1000'));
            wp_enqueue_script('single-page-nav');
        }
        foreach ($extra_menu_custom as $key => $f) {
            $val = get_post_meta($item->ID, '_menu_item_' . $key, true);
            if (!empty($val)) {
                $item->classes[] = $val;
            }
        }

        add_filter('nav_menu_link_attributes', function ($atts, $item) {
            if (isset($item->ct_onepage) && $item->ct_onepage === 'is-one-page') {
                if(!isset($atts['class']) || empty($atts['class'])){
                    if (isset($item->ct_custom_class) && !empty($item->ct_custom_class)) {
                        $atts['class'] = 'is-one-page '.$item->ct_custom_class;
                    } else {
                        $atts['class'] = 'is-one-page';
                    }
                }
                elseif(strpos($atts['class'], 'is-one-page') === false){
                    $atts['class'] = trim($atts['class'] . ' is-one-page');
                }
            }

            if (isset($item->ct_onepage_offset)) {
                $atts['data-onepage-offset'] = $item->ct_onepage_offset;
            }

            if (isset($item->ct_custom_class) && !empty($item->ct_custom_class)) {
                if(!isset($atts['class']) || empty($atts['class'])){
                    $atts['class'] = $item->ct_custom_class;
                }
            }

            return $atts;
        }, 10, 2);
        if (!empty($item->ct_megaprofile) && $megamenu) {
            $item->classes[] = 'megamenu';
            $item->classes[] = 'megamenu-style-alt';
            $item->classes[] = 'menu-item-has-children';
        }

        if (!empty($args->local_scroll) && $depth === 0) {
            $item->classes[] = 'local-scroll';
        }
        $item->ct_icon_position = 'left';
        if (!empty($item->ct_icon)) {
            if ('left' === $item->ct_icon_position) {
                $args->old_link_before = $args->link_before;
                $args->link_before = '<span class="link-icon left-icon"><i class="' . esc_attr($item->ct_icon) . '"></i></span>' . $args->link_before;
            } else {
                $args->old_link_after = $args->link_after;
                $args->link_after = $args->link_after . '<span class="link-icon right-icon"><i class="' . esc_attr($item->ct_icon) . '"></i></span>';
            }
        }

        /* Marker */
        if (isset($item->ct_menu_marker) && !empty($item->ct_menu_marker)) {
            $args->old_link_after = $args->link_after;
            $args->link_after = '<cite class="ct-menu-item-marker">' . esc_attr($item->ct_menu_marker) . '</cite>' . $args->link_after;
        }

        parent::start_el($item_html, $item, $depth, $args, $id);

        if (isset($args->old_link_before)) {

            $args->link_before = $args->old_link_before;
            $args->old_link_before = '';
        }

        if (isset($args->old_link_after)) {
            $args->link_after = $args->old_link_after;
            $args->old_link_after = '';
        }

        if (!empty($item->ct_megaprofile)) {
            $item_html .= $this->get_megamenu($item->ct_megaprofile);
        }

        $output .= $item_html;
    }

    public function get_megamenu($id)
    {
        $post = get_post($id);
        $content = \Elementor\Plugin::$instance->frontend->get_builder_content( $id );
        $megamenu = apply_filters('ct_enable_megamenu', false);
        if ($megamenu)
            return '<ul class="sub-menu"><li><div class="container">' . $content . '</div></li></ul>';
        else
            return false;
    }

    public function get_vc_custom_css($id)
    {

        $out = '';

        if (!$id) {
            return;
        }

        $post_custom_css = get_post_meta($id, '_wpb_post_custom_css', true);
        if (!empty($post_custom_css)) {
            $post_custom_css = strip_tags($post_custom_css);
            $out .= '<style data-type="vc_custom-css" data-source="megamenu-output-css">';
            $out .= $post_custom_css;
            $out .= '</style>';
        }

        $shortcodes_custom_css = get_post_meta($id, '_wpb_shortcodes_custom_css', true);
        if (!empty($shortcodes_custom_css)) {
            $shortcodes_custom_css = strip_tags($shortcodes_custom_css);
            $out .= '<style data-type="vc_shortcodes-custom-css"  data-source="megamenu-output-css">';
            $out .= $shortcodes_custom_css;
            $out .= '</style>';
        }

        return $out;
    }

    public function display_element($element, &$children_elements, $max_depth, $depth, $args, &$output)
    {

        // check whether this item has children, and set $item->hasChildren accordingly
        $element->hasChildren = isset($children_elements[$element->ID]) && !empty($children_elements[$element->ID]);

        return parent::display_element($element, $children_elements, $max_depth, $depth, $args, $output);
    }
}