<?php
// Register Custom Post Type
function create_news_post_type() {

    $labels = array(
        'name'                => _x( 'News', 'Post Type General Name', 'horiondigital' ),
        'singular_name'       => _x( 'News Item', 'Post Type Singular Name', 'horiondigital' ),
        'menu_name'           => __( 'News', 'horiondigital' ),
        'parent_item_colon'   => __( 'Parent News Item:', 'horiondigital' ),
        'all_items'           => __( 'All News', 'horiondigital' ),
        'view_item'           => __( 'View News Item', 'horiondigital' ),
        'add_new_item'        => __( 'Add new News Item', 'horiondigital' ),
        'add_new'             => __( 'Add new', 'horiondigital' ),
        'edit_item'           => __( 'Edit News Item', 'horiondigital' ),
        'update_item'         => __( 'Update News Item', 'horiondigital' ),
        'search_items'        => __( 'Search News Item', 'horiondigital' ),
        'not_found'           => __( 'Not found', 'horiondigital' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'horiondigital' ),
    );
    $args = array(
        'label'               => __( 'News', 'horiondigital' ),
        'description'         => __( 'News Post Type', 'horiondigital' ),
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
    register_post_type( 'news', $args );

}

// Hook into the 'init' action
add_action( 'init', 'create_news_post_type', 0 );