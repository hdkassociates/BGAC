<?php
    // REGISTER SCRIPTS
    function hd_register_scripts() {
    // HEADER
    // wp_register_script( 'header-js', get_template_directory_uri() . '/assets/js/header.js', array( 'jquery' ) );

    // FOOTER
    wp_register_script( 'app-js', get_template_directory_uri() . '/assets/js/app.js', array( 'jquery' ), false, true );
    wp_localize_script( 'app-js', 'meta', array(
        'ajaxurl' => admin_url( 'admin-ajax.php' ),
        'page' => get_queried_object(),
        'template' => get_page_template_slug( get_the_ID() )
    ));

    wp_deregister_script( 'jquery' );
    wp_deregister_script( 'jquery-migrate' );
    wp_register_script( 'jquery', includes_url( '/js/jquery/jquery.js' ), false, NULL, true );
    wp_register_script( 'jquery-migrate', includes_url( '/js/jquery/jquery-migrate.js' ), false, NULL, true );

    // ENQUEUE
    wp_enqueue_script( 'jquery' );
    wp_enqueue_script( 'app-js' ); 

}
add_filter( 'gform_init_scripts_footer', '__return_true' );
add_action( 'wp_enqueue_scripts', 'hd_register_scripts' );
remove_action('wp_head', 'print_emoji_detection_script', 7);
remove_action('wp_print_styles', 'print_emoji_styles');

remove_action( 'admin_print_scripts', 'print_emoji_detection_script' );
remove_action( 'admin_print_styles', 'print_emoji_styles' );
?>