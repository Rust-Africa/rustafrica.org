<?php
/**
 * Custom taxonomies register
 *
 * @package Case-Themes
 * @since   1.0
 */

class EFramework_CTax_Register
{
    /**
     * Core singleton class
     *
     * @var self - pattern realization
     * @access private
     */
    private static $_instance;

    /**
     * Store supported taxonomies in an array
     * @var array
     * @access private
     */
    private $taxonomies = array();

    /**
     * Constructor
     *
     * @access private
     */
    function __construct()
    {
        add_action('init', array($this, 'init'), 0);
    }

    /**
     * init hook - 0
     */
    function init()
    {
        $this->taxonomies = apply_filters('ct_extra_taxonomies', array(
            'portfolio-category' => array(
                'status'     => true,
                'post_type'  => array('portfolio'),
                'taxonomy'   => esc_html__('Portfolio Category', CT_TEXT_DOMAIN),
                'taxonomies' => esc_html__('Portfolio Categories', CT_TEXT_DOMAIN),
                'args'       => array(),
                'labels'     => array()
            ),
        ));
        foreach ($this->taxonomies as $key => $ct_taxonomy) {
            if ($ct_taxonomy['status'] === true) {
                $categories = array_merge(array(
                    'hierarchical'       => true,
                    'show_ui'            => true,
                    'show_in_menu'       => true,
                    'show_in_nav_menus'  => true,
                    'show_admin_column'  => true,
                    'show_in_rest'       => true,
                    'show_in_quick_edit' => true,
                    'labels'             => array_merge(array(
                        'name'              => $ct_taxonomy['taxonomies'],
                        'singular_name'     => $ct_taxonomy['taxonomy'],
                        'edit_item'         => esc_html__('Edit', CT_TEXT_DOMAIN) . ' ' . $ct_taxonomy['taxonomy'],
                        'update_item'       => esc_html__('Update', CT_TEXT_DOMAIN) . ' ' . $ct_taxonomy['taxonomy'],
                        'add_new_item'      => esc_html__('Add New', CT_TEXT_DOMAIN) . ' ' . $ct_taxonomy['taxonomy'],
                        'new_item_name'     => esc_html__('New Type', CT_TEXT_DOMAIN) . ' ' . $ct_taxonomy['taxonomy'],
                        'all_items'         => esc_html__('All', CT_TEXT_DOMAIN) . ' ' . $ct_taxonomy['taxonomies'],
                        'search_items'      => esc_html__('Search', CT_TEXT_DOMAIN) . ' ' . $ct_taxonomy['taxonomy'],
                        'parent_item'       => esc_html__('Parent', CT_TEXT_DOMAIN) . ' ' . $ct_taxonomy['taxonomy'],
                        'parent_item_colon' => esc_html__('Parent', CT_TEXT_DOMAIN) . ' ' . $ct_taxonomy['taxonomy'] . ':',
                    ), $ct_taxonomy['labels']),
                    'rewrite'      => array(
	                    'slug' => $key
                    )
                ), $ct_taxonomy['args']);

                register_taxonomy($key, $ct_taxonomy['post_type'], $categories);
            }
        }

    }

    /**
     * Get instance of the class
     *
     * @access public
     * @return object this
     */
    public static function get_instance()
    {
        if (!(self::$_instance instanceof self)) {
            self::$_instance = new self();
        }

        return self::$_instance;
    }
}