<?php
// Register Custom Post Type
function create_dos_post_type() {

    $labels = array(
        'name'                => _x( 'Dos', 'Post Type General Name', 'horiondigital' ),
        'singular_name'       => _x( 'Do', 'Post Type Singular Name', 'horiondigital' ),
        'menu_name'           => __( 'Do', 'horiondigital' ),
        'parent_item_colon'   => __( 'Parent Do:', 'horiondigital' ),
        'all_items'           => __( 'All Dos', 'horiondigital' ),
        'view_item'           => __( 'View Do', 'horiondigital' ),
        'add_new_item'        => __( 'Add new Do', 'horiondigital' ),
        'add_new'             => __( 'Add new', 'horiondigital' ),
        'edit_item'           => __( 'Edit Do', 'horiondigital' ),
        'update_item'         => __( 'Update Do', 'horiondigital' ),
        'search_items'        => __( 'Search Do', 'horiondigital' ),
        'not_found'           => __( 'Not found', 'horiondigital' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'horiondigital' ),
    );
    $args = array(
        'label'               => __( 'Do', 'horiondigital' ),
        'description'         => __( 'Do Post Type', 'horiondigital' ),
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
        'capability_type'     => 'page',
    );
    register_post_type( 'do', $args );

}

// Hook into the 'init' action
add_action( 'init', 'create_dos_post_type', 0 );