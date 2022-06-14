<?php

// ACF OPTIONS PAGE
if( function_exists('acf_add_options_page') ) {
    acf_add_options_page(array(
        'page_title'  => 'Options',
        'menu_title'  => 'Options',
        'menu_slug'   => 'options',
        'capability'  => 'edit_posts',
        'redirect'  => false
    ));
}

// ADD BODY CLASSES
add_filter('body_class', 'mbe_body_class');
function mbe_body_class($classes){
    if(is_user_logged_in()){
        $classes[] = 'body-logged-in';
    } else{
        $classes[] = 'body-logged-out';
    }
    return $classes;
}

function landing_redirect() {

    if(!is_user_logged_in()){
        wp_redirect( home_url( '/wp-login.php' ) );
        exit;
    }
}
  // add_action('template_redirect', 'landing_redirect');

// ADMIN FAVICON
function pa_admin_area_favicon() {
	// $size = 'full';
	// $image_object = get_field('favicon', 'options');
	// $attachment_id = $image_object['id'];
	// $img_src = wp_get_attachment_image_src( $attachment_id, $size );
	// echo '<link rel="shortcut icon" href="' . $img_src[0] . '" />';
}

add_action('admin_head', 'pa_admin_area_favicon');

// REGISTER NAVIGATIONS
function register_my_nav_menus(){
	register_nav_menus( array(
      'primary' => __( 'Top Navigation' ),
	    'secondary' => __( 'Main Navigation' ),
	    'footer' => __( 'Footer Navigation' )
    ));
}
add_action('init', 'register_my_nav_menus');

//REGISTER IMAGE SIZES
add_theme_support( 'post-thumbnails');
add_image_size( 'sq_vsm', 81, 81,  array( 'center', 'top' ) );
add_image_size( 'sq_sm', 200, 200, array( 'center', 'top' ) );
add_image_size( 'sq_md', 300, 300, array( 'center', 'top' ) );
add_image_size( 'sq_lg', 555, 555, array( 'center', 'top' ) );
add_image_size( 'rc_lg', 570, 400, array( 'center', 'top' ) );
add_image_size( 'sq_vt', 555, 777, array( 'center', 'top' ) );
add_image_size( 'slide', 650, 400, array( 'center', 'top' ) );
add_image_size( 'cover', 1020, 520, array( 'center', 'top' ) );
add_image_size( 'logo', 250, 9999);
add_image_size( 'icon', 9999, 74);
add_image_size( 'regular', 1170, 9999);

// CHANGE LOGIN LOGO
function my_custom_login_logo() {
    echo '<style type="text/css">
        h1 a { background-image:url('.get_bloginfo('template_directory').'/assets/images/logo.png) !important; background-size: 100% !important; width: 100% !important; }
    </style>';
}

add_action('login_head', 'my_custom_login_logo');

// WIDGETS
function hd_widgets_init() {
    register_sidebar(array(
        'name'          => esc_html__( 'Sidebar', 'hd' ),
        'id'            => 'sidebar-1',
        'description'   => esc_html__( 'Add widgets here.', 'hd' ),
        'before_widget' => '<div id="%1$s" class="sidebar-block %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6 class="heading">',
        'after_title'   => '</h6>',
    ) );

    register_sidebars(4, array(
        'name'          => esc_html__( 'Footer %d', 'hd' ),
        'id'            => 'footer-%d',
        'description'   => esc_html__( 'Add widgets here.', 'hd' ),
        'before_widget' => '<div id="%1$s" class="footer-links %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h6 class="heading">',
        'after_title'   => '</h6>',
    ) );
}
add_action( 'widgets_init', 'hd_widgets_init' );

// HIDE WORDPRESS UPDATE
function wp_hide_update() {
  remove_action('admin_notices', 'update_nag', 3);
}
add_action('admin_menu','wp_hide_update');

// EXCERPT
function hd_custom_excerpt_length( $length ) {
    return 12;
}
add_filter( 'excerpt_length', 'hd_custom_excerpt_length', 999 );

function hd_excerpt_more( $more ) {
    return '...';
}
add_filter( 'excerpt_more', 'hd_excerpt_more' );

// WooCommerce
// add_action( 'after_setup_theme', 'woocommerce_support' );
function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

// Mailchimp
add_action('wp_ajax_nopriv_subscribe_to_list', 'subscribe_to_list');
add_action('wp_ajax_subscribe_to_list', 'subscribe_to_list');

function subscribe_to_list() {

extract($_POST);

 $MailChimp = new MailChimp('780ab7b38da5f13d4fbaf1f182596ef6-us11');
 $result = $MailChimp->call('lists/subscribe', array(
     'id'                => '5b74dd684a',
     'email'             => array('email'=> $formemail),
     // 'merge_vars'        => array('FNAME'=>$formname),
     'double_optin'      => false,
     'update_existing'   => true,
     'replace_interests' => false,
     'send_welcome'      => false
 ));

return $result;

}

function ago($time){
   $periods = array("second", "minute", "hour", "day", "week", "month", "year");
   $lengths = array("60","60","24","7","4.35","12","10");

   $now = time();
   $difference = $now - $time;
   $tense = "ago";

   for($j = 0; $difference >= $lengths[$j] && $j < count($lengths)-1; $j++) {
       $difference /= $lengths[$j];
   }

   $difference = round($difference);

   if($difference != 1) {
       $periods[$j].= "s";
   }

   return "$difference $periods[$j] ago ";
}

function hd_get_image_url_from_id($id, $size) {
  $img = wp_get_attachment_image_src($id, $size);
  return $img[0];
}

function hd_get_image_ob_from_id($id, $size) {
  return wp_get_attachment_image_src($id, $size);
}

function shorten_title($title, $length) {
  $pieces = explode(' ', trim($title));
  $count = count($pieces);
  $first_part = implode(" ", array_splice($pieces, 0, $length));
  $other_part = implode(" ", array_splice($pieces, $length));

  if($count > $length) {
      return $first_part.'...';
    } else {
      return $first_part;
    }
}

function hd_pagination($pages = '', $range = 10)
{
    $showitems = ($range * 2)+1;

    global $paged;
    if(empty($paged)) $paged = 1;

    if($pages == '')
    {
        global $wp_query;
        $pages = $wp_query->max_num_pages;
        if(!$pages)
        {
            $pages = 1;
        }
    }

    if(1 != $pages)
    {
        echo "<ul class=\"pagination\">";
        // if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link(1)."'>←</a></li>";
        // if($paged > 1 && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged - 1)."'>←</a></li>";

        for ($i=1; $i <= $pages; $i++)
        {
            if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
            {
                echo ($paged == $i)? "<li class='active'><a>".$i."</a></li>":"<li><a href='".get_pagenum_link($i)."' class='inactive' >".$i."</a></li>";
            }
        }

        // if ($paged < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($paged + 1)."'>→</a></li>";
        // if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<li><a href='".get_pagenum_link($pages)."'>→</a></li>";
        echo "</ul>\n";
    }
}
// ← →
function addCSSClass($classToAdd, $classes) {
    
    // safety first
    if(!isset($classes) || empty($classes) || is_null($classes) || !is_array($classes)) {
        $classes = array();
    }

    if(!isset($classToAdd) || empty($classToAdd) || is_null($classToAdd)) {
        return $classes;
    }

    if(is_array($classToAdd)) {
        $classToAdd = $classToAdd[0];
    }

    if(!in_array($classToAdd, $classes)) {
        array_push($classes, $classToAdd);
    }

    return $classes;

}

function printCSSClasses($classes) {
    $str = '';

    // safety first
    if(!isset($classes) || empty($classes) || is_null($classes) || !is_array($classes)) {
        $classes = array();
        return $str;
    }

    foreach ($classes as $key => $class) {
        $str.= $class;
        if($key != (count($classes) - 1)) {
            $str.= ' ';
        }
    }

    return $str;
}

function removeCSSClass($classToRemove, $classes) {
    
    // safety first
    if(!isset($classes) || empty($classes) || is_null($classes) || !is_array($classes)) {
        $classes = array();
        return $classes;
    }

    if(!isset($classToRemove) || empty($classToRemove) || is_null($classToRemove)) {
        return $classes;
    }

    if(in_array($classToRemove, $classes)) {
        $classes = array_diff($classes, array($classToRemove));
    }

    return $classes;

}