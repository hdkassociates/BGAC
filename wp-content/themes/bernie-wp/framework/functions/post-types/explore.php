<?php
// Register Custom Post Type
function create_explore_post_type() {

    $labels = array(
        'name'                => _x( 'Explore', 'Post Type General Name', 'horiondigital' ),
        'singular_name'       => _x( 'Explore', 'Post Type Singular Name', 'horiondigital' ),
        'menu_name'           => __( 'Explore', 'horiondigital' ),
        'parent_item_colon'   => __( 'Parent Explore:', 'horiondigital' ),
        'all_items'           => __( 'All Explores', 'horiondigital' ),
        'view_item'           => __( 'View Explore', 'horiondigital' ),
        'add_new_item'        => __( 'Add new Explore', 'horiondigital' ),
        'add_new'             => __( 'Add new', 'horiondigital' ),
        'edit_item'           => __( 'Edit Explore', 'horiondigital' ),
        'update_item'         => __( 'Update Explore', 'horiondigital' ),
        'search_items'        => __( 'Search Explore', 'horiondigital' ),
        'not_found'           => __( 'Not found', 'horiondigital' ),
        'not_found_in_trash'  => __( 'Not found in Trash', 'horiondigital' ),
    );
    $args = array(
        'label'               => __( 'Explore', 'horiondigital' ),
        'description'         => __( 'Explore Post Type', 'horiondigital' ),
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
        'capability_type'     => 'page',
    );
    register_post_type( 'explore', $args );

}

// Hook into the 'init' action
add_action( 'init', 'create_explore_post_type', 0 );
