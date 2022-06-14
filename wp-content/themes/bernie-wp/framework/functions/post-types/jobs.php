<?php
// Register Custom Post Type
function create_job_post_type() {

    $labels = array(
        'name'                => _x( 'Jobs', 'Post Type General Name', 'horiondigital' ),
        'singular_name'       => _x( 'Job', 'Post Type Singular Name', 'horiondigital' ),
        'menu_name'           => __( 'Jobs', 'horiondigital' ),
        'parent_item_colon'   => __( 'Parent Job:', 'horiondigital' ),
        'all_items'           => __( 'All Jobs', 'horiondigital' ),
        'view_item'           => __( 'View Job', 'horiondigital' ),
        'add_new_item'        => __( 'Add new Job', 'horiondigital' ),
        'add_new'             => __( 'Add new', 'horiondigital' ),
        'edit_item'           => __( 'Edit Job', 'horiondigital' ),
        'update_item'         => __( 'Update Job', 'horiondigital' ),
        'search_items'        => __( 'Search Job', 'horiondigital' ),
        'not_found'           => __( 'Not found', 'horiondigital' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'horiondigital' ),
    );
    $args = array(
        'label'               => __( 'Job', 'horiondigital' ),
        'description'         => __( 'Job Post Type', 'horiondigital' ),
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
    register_post_type( 'job', $args );

}

// Hook into the 'init' action
add_action( 'init', 'create_job_post_type', 0 );