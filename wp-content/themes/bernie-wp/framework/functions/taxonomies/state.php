<?php
function hd_taxonomy_state_category()  {

    $labels = array(
        'name'                       => _x( 'States', 'Taxonomy General Name', 'old' ),
        'singular_name'              => _x( 'State', 'Taxonomy Singular Name', 'old' ),
        'menu_name'                  => __( 'States', 'old' ),
        'all_items'                  => __( 'All States', 'old' ),
        'parent_item'                => __( 'Parent State', 'old' ),
        'parent_item_colon'          => __( 'Parent State:', 'old' ),
        'new_item_name'              => __( 'New State Name', 'old' ),
        'add_new_item'               => __( 'Add New State', 'old' ),
        'edit_item'                  => __( 'Edit State', 'old' ),
        'update_item'                => __( 'Update State', 'old' ),
        'separate_items_with_commas' => __( 'Separate States with commas', 'old' ),
        'search_items'               => __( 'Search rheme', 'old' ),
        'add_or_remove_items'        => __( 'Add or remove States', 'old' ),
        'choose_from_most_used'      => __( 'Choose from the most used States', 'old' ),
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
    register_taxonomy( 'state', array('location'), $args );

}

// Hook into the 'init' action
add_action( 'init', 'hd_taxonomy_state_category', 0 );

?>