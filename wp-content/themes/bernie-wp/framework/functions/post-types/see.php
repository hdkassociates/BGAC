<?php
// Register Custom Post Type
function create_see_post_type() {

    $labels = array(
        'name'                => _x( 'What\'s on', 'Post Type General Name', 'horiondigital' ),
        'singular_name'       => _x( 'What\'s on', 'Post Type Singular Name', 'horiondigital' ),
        'menu_name'           => __( 'What\'s on', 'horiondigital' ),
        'parent_item_colon'   => __( 'Parent What\'s on:', 'horiondigital' ),
        'all_items'           => __( 'All What\'s on', 'horiondigital' ),
        'view_item'           => __( 'View What\'s on', 'horiondigital' ),
        'add_new_item'        => __( 'Add new What\'s on', 'horiondigital' ),
        'add_new'             => __( 'Add new', 'horiondigital' ),
        'edit_item'           => __( 'Edit What\'s on', 'horiondigital' ),
        'update_item'         => __( 'Update What\'s on', 'horiondigital' ),
        'search_items'        => __( 'Search What\'s on', 'horiondigital' ),
        'not_found'           => __( 'Not found', 'horiondigital' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'horiondigital' ),
    );
    $args = array(
        'label'               => __( 'What\'s on', 'horiondigital' ),
        'description'         => __( 'What\'s on Post Type', 'horiondigital' ),
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
        'menu_icon'           => 'dashicons-tickets',
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite' => array('slug' => 'whats-on','with_front' => false),
        'capability_type'     => 'page',
    );
    register_post_type( 'see', $args );

}

// Hook into the 'init' action
add_action( 'init', 'create_see_post_type', 0 );