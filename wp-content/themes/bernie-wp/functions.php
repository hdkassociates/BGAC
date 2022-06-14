<?php


// if($_SERVER['REMOTE_ADDR'] == '213.159.56.174' || $_SERVER['REMOTE_ADDR'] == '84.32.116.70' || $_SERVER['REMOTE_ADDR'] == '79.132.165.224'):
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);
error_reporting(E_ALL);
// endif;


// Enterprise Grade WordPress Framework - by Horion Digital, Ltd
include_once('framework/framework-functions.php' );


function add_menuclass_active( $nav_menu, $args ) {
    if( $args->theme_location == 'primary' )
        return preg_replace( '/<a /', '<a class="btn btn-md"', $nav_menu, 1 );
    return $nav_menu;
}
// add_filter( 'wp_nav_menu', 'add_menuclass_active', 10, 2 );



class Nav_Walker_Nav_Menu extends Walker_Nav_Menu{
  function start_el(&$output, $item, $depth = 0, $args = array(), $id = 0){
        global $wp_query;
        global $numeration;

        $color_permutations = ['btn-yellow', 'btn-cherry', 'btn-green', 'btn-blue'];

        if(!isset($numeration))
            $numeration = 0;
        else
            $numeration += 1;

        $indent = ( $depth ) ? str_repeat( "\t", $depth ) : '';
        $class_names = $value = '';
        $classes = empty( $item->classes ) ? array() : (array) $item->classes;
        $class_names = join( ' ', apply_filters( 'nav_menu_css_class', array_filter( $classes ), $item ) );
        $class_names = ' class="'. esc_attr( $class_names ) . '"';

        $output .= $indent . '<li id="menu-item-'. $item->ID . '"' . $value . $class_names .'>';

        $attributes  = ! empty( $item->attr_title ) ? ' title="'  . esc_attr( $item->attr_title ) .'"' : '';
        $attributes .= ! empty( $item->target )     ? ' target="' . esc_attr( $item->target     ) .'"' : '';
        $attributes .= ! empty( $item->xfn )        ? ' rel="'    . esc_attr( $item->xfn        ) .'"' : '';
        $attributes .= ! empty( $item->url )        ? ' href="'   . esc_attr( $item->url        ) .'"' : '';


        $description  = ! empty( $item->description ) ? '<span>'.esc_attr( $item->description ).'</span>' : '';

        $item_output = $args->before;
        $item_output .= '<a class="btn btn-md '.$color_permutations[$numeration % 4].'"'. $attributes .'><span>';
        $item_output .= $args->link_before .apply_filters( 'the_title', $item->title, $item->ID );
        $item_output .= $description.$args->link_after;
        $item_output .= '</span></a>';
        $item_output .= $args->after;

        $output .= apply_filters( 'walker_nav_menu_start_el', $item_output, $item, $depth, $args );
    }
}

remove_filter( 'the_excerpt', 'wpautop' );

// Gravity Forms hook
add_action( 'gform_after_submission_8', 'post_to_third_party', 10, 2 );
function post_to_third_party( $entry, $form ) {
 
    $post_url = 'https://tickets.berniegrantcentre.co.uk/berniegrantartscentre/website/secure/signup.aspx';
    $body = array(
        'email' => rgar( $entry, '1' ),
        );
    GFCommon::log_debug( 'gform_after_submission: body => ' . print_r( $body, true ) );
 
    $request = new WP_Http();
    $response = $request->post( $post_url, array( 'body' => $body ) );
    GFCommon::log_debug( 'gform_after_submission: response => ' . print_r( $response, true ) );
}

?>