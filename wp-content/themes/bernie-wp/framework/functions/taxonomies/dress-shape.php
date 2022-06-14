<?php
function hd_taxonomy_dress_shape()  {

    $labels = array(
        'name'                       => _x( 'Shapes', 'Taxonomy General Name', 'old' ),
        'singular_name'              => _x( 'Shape', 'Taxonomy Singular Name', 'old' ),
        'menu_name'                  => __( 'Shapes', 'old' ),
        'all_items'                  => __( 'All Shapes', 'old' ),
        'parent_item'                => __( 'Parent Shape', 'old' ),
        'parent_item_colon'          => __( 'Parent Shape:', 'old' ),
        'new_item_name'              => __( 'New Shape Name', 'old' ),
        'add_new_item'               => __( 'Add New Shape', 'old' ),
        'edit_item'                  => __( 'Edit Shape', 'old' ),
        'update_item'                => __( 'Update Shape', 'old' ),
        'separate_items_with_commas' => __( 'Separate Shapes with commas', 'old' ),
        'search_items'               => __( 'Search rheme', 'old' ),
        'add_or_remove_items'        => __( 'Add or remove Shapes', 'old' ),
        'choose_from_most_used'      => __( 'Choose from the most used Shapes', 'old' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => true,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'dress_shape', array('dress'), $args );

}

// Hook into the 'init' action
add_action( 'init', 'hd_taxonomy_dress_shape', 0 );

?>