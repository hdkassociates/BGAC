<?php
// Register Custom Post Type
function create_explore_post_type() {

    $labels = array(
        'name'                => _x( 'About', 'Post Type General Name', 'horiondigital' ),
        'singular_name'       => _x( 'About', 'Post Type Singular Name', 'horiondigital' ),
        'menu_name'           => __( 'About', 'horiondigital' ),
        'parent_item_colon'   => __( 'Parent About:', 'horiondigital' ),
        'all_items'           => __( 'All About Posts', 'horiondigital' ),
        'view_item'           => __( 'View About', 'horiondigital' ),
        'add_new_item'        => __( 'Add new About', 'horiondigital' ),
        'add_new'             => __( 'Add new', 'horiondigital' ),
        'edit_item'           => __( 'Edit About', 'horiondigital' ),
        'update_item'         => __( 'Update About', 'horiondigital' ),
        'search_items'        => __( 'Search About', 'horiondigital' ),
        'not_found'           => __( 'Not found', 'horiondigital' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'horiondigital' ),
    );
    $args = array(
        'label'               => __( 'About', 'horiondigital' ),
        'description'         => __( 'About Post Type', 'horiondigital' ),
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
        'menu_icon'           => 'dashicons-admin-site',
        'can_export'          => true,
        'has_archive'         => false,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'rewrite' => array('slug' => 'about','with_front' => false),
        'capability_type'     => 'page',
    );
    register_post_type( 'explore', $args );

}

// Hook into the 'init' action
add_action( 'init', 'create_explore_post_type', 0 );
