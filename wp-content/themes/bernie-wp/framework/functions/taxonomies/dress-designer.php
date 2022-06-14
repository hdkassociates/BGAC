<?php
function hd_taxonomy_dress_designer()  {

    $labels = array(
        'name'                       => _x( 'Designers', 'Taxonomy General Name', 'old' ),
        'singular_name'              => _x( 'Designer', 'Taxonomy Singular Name', 'old' ),
        'menu_name'                  => __( 'Designers', 'old' ),
        'all_items'                  => __( 'All Designers', 'old' ),
        'parent_item'                => __( 'Parent Designer', 'old' ),
        'parent_item_colon'          => __( 'Parent Designer:', 'old' ),
        'new_item_name'              => __( 'New Designer Name', 'old' ),
        'add_new_item'               => __( 'Add New Designer', 'old' ),
        'edit_item'                  => __( 'Edit Designer', 'old' ),
        'update_item'                => __( 'Update Designer', 'old' ),
        'separate_items_with_commas' => __( 'Separate Designers with commas', 'old' ),
        'search_items'               => __( 'Search rheme', 'old' ),
        'add_or_remove_items'        => __( 'Add or remove Designers', 'old' ),
        'choose_from_most_used'      => __( 'Choose from the most used Designers', 'old' ),
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
    register_taxonomy( 'dress_designer', array('dress'), $args );

}

// Hook into the 'init' action
add_action( 'init', 'hd_taxonomy_dress_designer', 0 );

?>