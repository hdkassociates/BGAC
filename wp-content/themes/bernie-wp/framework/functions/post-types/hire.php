<?php
// Register Custom Post Type
function create_hire_post_type() {

    $labels = array(
        'name'                => _x( 'Hires', 'Post Type General Name', 'horiondigital' ),
        'singular_name'       => _x( 'Hire', 'Post Type Singular Name', 'horiondigital' ),
        'menu_name'           => __( 'Hire', 'horiondigital' ),
        'parent_item_colon'   => __( 'Parent Hire:', 'horiondigital' ),
        'all_items'           => __( 'All Hires', 'horiondigital' ),
        'view_item'           => __( 'View Hire', 'horiondigital' ),
        'add_new_item'        => __( 'Add new Hire', 'horiondigital' ),
        'add_new'             => __( 'Add new', 'horiondigital' ),
        'edit_item'           => __( 'Edit Hire', 'horiondigital' ),
        'update_item'         => __( 'Update Hire', 'horiondigital' ),
        'search_items'        => __( 'Search Hire', 'horiondigital' ),
        'not_found'           => __( 'Not found', 'horiondigital' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'horiondigital' ),
    );
    $args = array(
        'label'               => __( 'Hire', 'horiondigital' ),
        'description'         => __( 'Hire Post Type', 'horiondigital' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail', 'editor' ),
        'taxonomies'          => array(),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 5,
        'menu_icon'           => 'dashicons-media-text',
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'hire', $args );

}

// Hook into the 'init' action
add_action( 'init', 'create_hire_post_type', 0 );