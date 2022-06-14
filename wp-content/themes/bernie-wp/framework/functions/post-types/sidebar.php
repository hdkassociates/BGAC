<?php
// Register Custom Post Type
function create_sidebar_post_type() {

    $labels = array(
        'name'                => _x( 'Sidebars', 'Post Type General Name', 'horiondigital' ),
        'singular_name'       => _x( 'Sidebar', 'Post Type Singular Name', 'horiondigital' ),
        'menu_name'           => __( 'Sidebar', 'horiondigital' ),
        'parent_item_colon'   => __( 'Parent Sidebar:', 'horiondigital' ),
        'all_items'           => __( 'All Sidebars', 'horiondigital' ),
        'view_item'           => __( 'View Sidebar', 'horiondigital' ),
        'add_new_item'        => __( 'Add new Sidebar', 'horiondigital' ),
        'add_new'             => __( 'Add new', 'horiondigital' ),
        'edit_item'           => __( 'Edit Sidebar', 'horiondigital' ),
        'update_item'         => __( 'Update Sidebar', 'horiondigital' ),
        'search_items'        => __( 'Search Sidebar', 'horiondigital' ),
        'not_found'           => __( 'Not found', 'horiondigital' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'horiondigital' ),
    );
    $args = array(
        'label'               => __( 'Sidebar', 'horiondigital' ),
        'description'         => __( 'Sidebar Post Type', 'horiondigital' ),
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
        'menu_icon'           => 'dashicons-editor-ul',
        'can_export'          => true,
        'has_archive'         => true,
        'exclude_from_search' => false,
        'publicly_queryable'  => true,
        'capability_type'     => 'page',
    );
    register_post_type( 'sidebar', $args );

}

// Hook into the 'init' action
add_action( 'init', 'create_sidebar_post_type', 0 );