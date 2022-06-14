<?php
function hd_taxonomy_do_category()  {

    $labels = array(
        'name'                       => _x( 'Categories', 'Taxonomy General Name', 'old' ),
        'singular_name'              => _x( 'Category', 'Taxonomy Singular Name', 'old' ),
        'menu_name'                  => __( 'Categories', 'old' ),
        'all_items'                  => __( 'All Categories', 'old' ),
        'parent_item'                => __( 'Parent Category', 'old' ),
        'parent_item_colon'          => __( 'Parent Category:', 'old' ),
        'new_item_name'              => __( 'New Category Name', 'old' ),
        'add_new_item'               => __( 'Add New Category', 'old' ),
        'edit_item'                  => __( 'Edit Category', 'old' ),
        'update_item'                => __( 'Update Category', 'old' ),
        'separate_items_with_commas' => __( 'Separate Categories with commas', 'old' ),
        'search_items'               => __( 'Search rheme', 'old' ),
        'add_or_remove_items'        => __( 'Add or remove Categories', 'old' ),
        'choose_from_most_used'      => __( 'Choose from the most used Categories', 'old' ),
    );
    $args = array(
        'labels'                     => $labels,
        'hierarchical'               => false,
        'public'                     => true,
        'show_ui'                    => true,
        'show_admin_column'          => true,
        'show_in_nav_menus'          => true,
        'show_tagcloud'              => true,
    );
    register_taxonomy( 'do-category', array('do'), $args );

}

// Hook into the 'init' action
add_action( 'init', 'hd_taxonomy_do_category', 0 );

?>