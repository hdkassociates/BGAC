<?php

// REGISTER STYLES
function hd_register_style() {
  if(!is_admin()):
    wp_register_style( 'app-css', get_template_directory_uri() . '/assets/css/app.css' );
    wp_register_style( 'additional-css', get_template_directory_uri() . '/assets/css/additional.css' );

    wp_enqueue_style( 'app-css' );
    wp_enqueue_style( 'additional-css' );
  endif;
}

function hd_register_admin_style() {
	if(is_admin()): 
		 wp_register_style( 'admin-css', get_template_directory_uri() . '/assets/css/admin.css');

		 wp_enqueue_style( 'admin-css' );
	endif;
}
define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);
add_action( 'wp_enqueue_scripts', 'hd_register_style' );
add_action( 'admin_enqueue_scripts', 'hd_register_admin_style' );
?>
