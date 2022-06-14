<?php
// Register Custom Post Type
function create_case_study_post_type() {

    $labels = array(
        'name'                => _x( 'Case Studies', 'Post Type General Name', 'horiondigital' ),
        'singular_name'       => _x( 'Case Study', 'Post Type Singular Name', 'horiondigital' ),
        'menu_name'           => __( 'Case Studies', 'horiondigital' ),
        'parent_item_colon'   => __( 'Parent Case Study:', 'horiondigital' ),
        'all_items'           => __( 'All Case Studies', 'horiondigital' ),
        'view_item'           => __( 'View Case Study', 'horiondigital' ),
        'add_new_item'        => __( 'Add new Case Study', 'horiondigital' ),
        'add_new'             => __( 'Add new', 'horiondigital' ),
        'edit_item'           => __( 'Edit Case Study', 'horiondigital' ),
        'update_item'         => __( 'Update Case Study', 'horiondigital' ),
        'search_items'        => __( 'Search Case Study', 'horiondigital' ),
        'not_found'           => __( 'Not found', 'horiondigital' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'horiondigital' ),
    );
    $args = array(
        'label'               => __( 'Case Study', 'horiondigital' ),
        'description'         => __( 'Case Study Post Type', 'horiondigital' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail' ),
        'taxonomies'          => array('case_study_category'),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 7,
        'menu_icon'           => 'dashicons-portfolio',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'case_study', $args );

}

// Hook into the 'init' action
add_action( 'init', 'create_case_study_post_type', 0 );