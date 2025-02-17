<?php

add_action( 'init', 'register_bastun_Service' );
function register_bastun_Service() {
    
$labels = array( 
'name' => __( 'Service', 'bastun' ),
'singular_name' => __( 'Service', 'bastun' ),
'add_new' => __( 'Add New Service', 'bastun' ),
'add_new_item' => __( 'Add New Service', 'bastun' ),
'edit_item' => __( 'Edit Service', 'bastun' ),
'new_item' => __( 'New Service', 'bastun' ),
'view_item' => __( 'View Service', 'bastun' ),
'search_items' => __( 'Search Service', 'bastun' ),
'not_found' => __( 'No Service found', 'bastun' ),
'not_found_in_trash' => __( 'No Service found in Trash', 'bastun' ),
'parent_item_colon' => __( 'Parent Service:', 'bastun' ),
'menu_name' => __( 'Service', 'bastun' ),
);

$args = array( 
'labels' => $labels,
'hierarchical' => true,
'description' => 'List Service',
'supports' => array( 'title', 'editor', 'thumbnail', 'comments'),
'taxonomies' => array( 'Service', 'type' ),
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'menu_position' => 5,
'menu_icon' => 'dashicons-id-alt', 
'show_in_nav_menus' => true,
'publicly_queryable' => true,
'exclude_from_search' => false,
'has_archive' => true,
'query_var' => true,
'can_export' => true,
'rewrite' => true,
'capability_type' => 'post'
);

register_post_type( 'Service', $args );
}
add_action( 'init', 'create_type_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it Skillss for your posts

function create_Type_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like Skills
//first do the translations part for GUI

$labels = array(
'name' => __( 'Type', 'bastun' ),
'singular_name' => __( 'Type', 'bastun' ),
'search_items' =>  __( 'Search Type','bastun' ),
'all_items' => __( 'All Type','bastun' ),
    'parent_item' => __( 'Parent Type','bastun' ),
    'parent_item_colon' => __( 'Parent Type:','bastun' ),
    'edit_item' => __( 'Edit Type','bastun' ), 
    'update_item' => __( 'Update Type','bastun' ),
    'add_new_item' => __( 'Add New Type','bastun' ),
    'new_item_name' => __( 'New Type Name','bastun' ),
    'menu_name' => __( 'Type','bastun' ),
  );     

// Now register the taxonomy

  register_taxonomy('type',array('Service'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'type' ),
  ));

}


add_action( 'init', 'register_bastun_Team' );
function register_bastun_Team() {
    
$labels = array( 
'name' => __( 'Team', 'bastun' ),
'singular_name' => __( 'Team', 'bastun' ),
'add_new' => __( 'Add New Team', 'bastun' ),
'add_new_item' => __( 'Add New Team', 'bastun' ),
'edit_item' => __( 'Edit Team', 'bastun' ),
'new_item' => __( 'New Team', 'bastun' ),
'view_item' => __( 'View Team', 'bastun' ),
'search_items' => __( 'Search Team', 'bastun' ),
'not_found' => __( 'No Team found', 'bastun' ),
'not_found_in_trash' => __( 'No Team found in Trash', 'bastun' ),
'parent_item_colon' => __( 'Parent Team:', 'bastun' ),
'menu_name' => __( 'Team', 'bastun' ),
);

$args = array( 
'labels' => $labels,
'hierarchical' => true,
'description' => 'List Team',
'supports' => array( 'title', 'editor', 'thumbnail', 'comments'),
'taxonomies' => array( 'Team', 'type3' ),
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'menu_position' => 5,
'menu_icon' => 'dashicons-groups', 
'show_in_nav_menus' => true,
'publicly_queryable' => true,
'exclude_from_search' => false,
'has_archive' => true,
'query_var' => true,
'can_export' => true,
'rewrite' => true,
'capability_type' => 'post'
);

register_post_type( 'Team', $args );
}
add_action( 'init', 'create_type3_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it Skillss for your posts

function create_Type3_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like Skills
//first do the translations part for GUI

$labels = array(
'name' => __( 'Type 3', 'bastun' ),
'singular_name' => __( 'Type 3', 'bastun' ),
'search_items' =>  __( 'Search Type 3','bastun' ),
'all_items' => __( 'All Type 3','bastun' ),
    'parent_item' => __( 'Parent Type 3','bastun' ),
    'parent_item_colon' => __( 'Parent Type 3:','bastun' ),
    'edit_item' => __( 'Edit Type 3','bastun' ), 
    'update_item' => __( 'Update Type 3','bastun' ),
    'add_new_item' => __( 'Add New Type 3','bastun' ),
    'new_item_name' => __( 'New Type 3 Name','bastun' ),
    'menu_name' => __( 'Type 3','bastun' ),
  );     

// Now register the taxonomy

  register_taxonomy('type3',array('Team'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'type3' ),
  ));

}

add_action( 'init', 'register_bastun_Project' );
function register_bastun_Project() {
    
$labels = array( 
'name' => __( 'Project', 'bastun' ),
'singular_name' => __( 'Project', 'bastun' ),
'add_new' => __( 'Add New Project', 'bastun' ),
'add_new_item' => __( 'Add New Project', 'bastun' ),
'edit_item' => __( 'Edit Project', 'bastun' ),
'new_item' => __( 'New Project', 'bastun' ),
'view_item' => __( 'View Project', 'bastun' ),
'search_items' => __( 'Search Project', 'bastun' ),
'not_found' => __( 'No Project found', 'bastun' ),
'not_found_in_trash' => __( 'No Project found in Trash', 'bastun' ),
'parent_item_colon' => __( 'Parent Project:', 'bastun' ),
'menu_name' => __( 'Project', 'bastun' ),
);

$args = array( 
'labels' => $labels,
'hierarchical' => true,
'description' => 'List Project',
'supports' => array( 'title', 'editor', 'thumbnail', 'comments'),
'taxonomies' => array( 'Project', 'class' ),
'public' => true,
'show_ui' => true,
'show_in_menu' => true,
'menu_position' => 5,
'menu_icon' => 'dashicons-book', 
'show_in_nav_menus' => true,
'publicly_queryable' => true,
'exclude_from_search' => false,
'has_archive' => true,
'query_var' => true,
'can_export' => true,
'rewrite' => true,
'capability_type' => 'post'
);

register_post_type( 'Project', $args );
}
add_action( 'init', 'create_class_hierarchical_taxonomy', 0 );

//create a custom taxonomy name it Skillss for your posts

function create_Class_hierarchical_taxonomy() {

// Add new taxonomy, make it hierarchical like Skills
//first do the translations part for GUI

$labels = array(
'name' => __( 'Class', 'bastun' ),
'singular_name' => __( 'Class', 'bastun' ),
'search_items' =>  __( 'Search Class','bastun' ),
'all_items' => __( 'All Class','bastun' ),
    'parent_item' => __( 'Parent Class','bastun' ),
    'parent_item_colon' => __( 'Parent Class:','bastun' ),
    'edit_item' => __( 'Edit Class','bastun' ), 
    'update_item' => __( 'Update Class','bastun' ),
    'add_new_item' => __( 'Add New Class','bastun' ),
    'new_item_name' => __( 'New Class Name','bastun' ),
    'menu_name' => __( 'Class','bastun' ),
  );     

// Now register the taxonomy

  register_taxonomy('class',array('Project'), array(
    'hierarchical' => true,
    'labels' => $labels,
    'show_ui' => true,
    'show_admin_column' => true,
    'query_var' => true,
    'rewrite' => array( 'slug' => 'class' ),
  ));

}


?>