<?php
// Register Custom Post Type
function create_dos_post_type() {

    $labels = array(
        'name'                => _x( 'Visit', 'Post Type General Name', 'horiondigital' ),
        'singular_name'       => _x( 'Visit', 'Post Type Singular Name', 'horiondigital' ),
        'menu_name'           => __( 'Visit', 'horiondigital' ),
        'parent_item_colon'   => __( 'Parent Visit:', 'horiondigital' ),
        'all_items'           => __( 'All Visit posts', 'horiondigital' ),
        'view_item'           => __( 'View Visit', 'horiondigital' ),
        'add_new_item'        => __( 'Add new Visit', 'horiondigital' ),
        'add_new'             => __( 'Add new', 'horiondigital' ),
        'edit_item'           => __( 'Edit Visit', 'horiondigital' ),
        'update_item'         => __( 'Update Visit', 'horiondigital' ),
        'search_items'        => __( 'Search Visit', 'horiondigital' ),
        'not_found'           => __( 'Not found', 'horiondigital' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'horiondigital' ),
    );
    $args = array(
        'label'               => __( 'Visit', 'horiondigital' ),
        'description'         => __( 'Visit Post Type', 'horiondigital' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail', 'editor' ),
        'taxonomies'          => array(),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 7,
        'menu_icon'           => 'dashicons-smiley',
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite' => array('slug' => 'visit','with_front' => false),
        'capability_type'     => 'page',
    );
    register_post_type( 'do', $args );

}

// Hook into the 'init' action
add_action( 'init', 'create_dos_post_type', 0 );