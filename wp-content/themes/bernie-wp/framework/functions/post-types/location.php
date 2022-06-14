<?php
// Register Custom Post Type
function location_post_type() {

    $labels = array(
        'name'                => _x( 'Locations', 'Post Type General Name', 'horiondigital' ),
        'singular_name'       => _x( 'Location', 'Post Type Singular Name', 'horiondigital' ),
        'menu_name'           => __( 'Locations', 'horiondigital' ),
        'parent_item_colon'   => __( 'Parent Location:', 'horiondigital' ),
        'all_items'           => __( 'All Locations', 'horiondigital' ),
        'view_item'           => __( 'View Location', 'horiondigital' ),
        'add_new_item'        => __( 'Add new Location', 'horiondigital' ),
        'add_new'             => __( 'Add new', 'horiondigital' ),
        'edit_item'           => __( 'Edit Location', 'horiondigital' ),
        'update_item'         => __( 'Update Location', 'horiondigital' ),
        'search_items'        => __( 'Search Location', 'horiondigital' ),
        'not_found'           => __( 'Not found', 'horiondigital' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'horiondigital' ),
    );
    $args = array(
        'label'               => __( 'Location', 'horiondigital' ),
        'description'         => __( 'Location Post Type', 'horiondigital' ),
        'labels'              => $labels,
        'supports'            => array( 'title', 'thumbnail' ),
        'taxonomies'          => array( 'state' ),
        'hierarchical'        => true,
        'public'              => true,
        'show_ui'             => true,
        'show_in_menu'        => true,
        'show_in_nav_menus'   => true,
        'show_in_admin_bar'   => true,
        'menu_position'       => 7,
        'menu_icon'           => 'dashicons-admin-site',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'location', $args );

}

// Hook into the 'init' action
add_action( 'init', 'location_post_type', 0 );