<?php
// Register Custom Post Type
function create_indicators_post_type() {

    $labels = array(
        'name'                => _x( 'Indicators', 'Post Type General Name', 'horiondigital' ),
        'singular_name'       => _x( 'Indicator', 'Post Type Singular Name', 'horiondigital' ),
        'menu_name'           => __( 'Indicators', 'horiondigital' ),
        'parent_item_colon'   => __( 'Parent Indicator:', 'horiondigital' ),
        'all_items'           => __( 'All Indicators', 'horiondigital' ),
        'view_item'           => __( 'View Indicator', 'horiondigital' ),
        'add_new_item'        => __( 'Add new Indicator', 'horiondigital' ),
        'add_new'             => __( 'Add new', 'horiondigital' ),
        'edit_item'           => __( 'Edit Indicator', 'horiondigital' ),
        'update_item'         => __( 'Update Indicator', 'horiondigital' ),
        'search_items'        => __( 'Search Indicator', 'horiondigital' ),
        'not_found'           => __( 'Not found', 'horiondigital' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'horiondigital' ),
    );
    $args = array(
        'label'               => __( 'Indicator', 'horiondigital' ),
        'description'         => __( 'Indicator Post Type', 'horiondigital' ),
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
        'menu_icon'           => 'dashicons-nametag',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'indicator', $args );

}

// Hook into the 'init' action
add_action( 'init', 'create_indicators_post_type', 0 );