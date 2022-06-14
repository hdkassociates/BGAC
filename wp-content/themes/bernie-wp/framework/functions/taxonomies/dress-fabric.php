<?php
function hd_taxonomy_dress_fabric()  {

    $labels = array(
        'name'                       => _x( 'Fabrics', 'Taxonomy General Name', 'old' ),
        'singular_name'              => _x( 'Fabric', 'Taxonomy Singular Name', 'old' ),
        'menu_name'                  => __( 'Fabrics', 'old' ),
        'all_items'                  => __( 'All Fabrics', 'old' ),
        'parent_item'                => __( 'Parent Fabric', 'old' ),
        'parent_item_colon'          => __( 'Parent Fabric:', 'old' ),
        'new_item_name'              => __( 'New Fabric Name', 'old' ),
        'add_new_item'               => __( 'Add New Fabric', 'old' ),
        'edit_item'                  => __( 'Edit Fabric', 'old' ),
        'update_item'                => __( 'Update Fabric', 'old' ),
        'separate_items_with_commas' => __( 'Separate Fabrics with commas', 'old' ),
        'search_items'               => __( 'Search rheme', 'old' ),
        'add_or_remove_items'        => __( 'Add or remove Fabrics', 'old' ),
        'choose_from_most_used'      => __( 'Choose from the most used Fabrics', 'old' ),
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
    register_taxonomy( 'dress_fabric', array('dress'), $args );

}

// Hook into the 'init' action
add_action( 'init', 'hd_taxonomy_dress_fabric', 0 );

?>