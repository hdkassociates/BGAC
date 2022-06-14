<?php

function get_begin_date($key){

if($key == 'this_month')
  return date("Y-m-d", time());

else if($key == 'next_month')
  return date("Y-m-01", strtotime('+1 month'));

else if($key == '3_months')
  return date("Y-m-d", time());

else
  return date("Y-m-d", time());

}

function get_end_date($key){

  if($key == 'this_month')
    return date("Y-m-t", time());

  else if($key == 'next_month')
    return date("Y-m-t", strtotime('+1 month'));

  else if($key == '3_months')
    return date("Y-m-t", strtotime('+3 months'));

  else if($key == 'all')
    return date("Y-m-t", strtotime('+10 years'));

  else
    return date("Y-m-t", strtotime('+10 years'));

}

function get_recent_posts() {
  global $post;
  if($post->post_type == 'dress'):
    $cookie_name = 'recent_posts';
    if(isset($_COOKIE[$cookie_name])):
      $recent_posts = json_decode($_COOKIE[$cookie_name]);
      return $recent_posts;
    endif;
  endif;
  return false;
}

function check_if_favorite($postID) {
    $cookie_name = 'favorites';
    if(isset($_COOKIE[$cookie_name])):
      $favorites = json_decode($_COOKIE[$cookie_name]);
      if(in_array($postID, $favorites))
      {
        return true;
      }
      else
      {
        return false;
      }
    endif;
  return false;
}

function get_favorites() {
  $cookie_name = 'favorites';
  if(isset($_COOKIE[$cookie_name])):
    $favorites = json_decode($_COOKIE[$cookie_name]);
    return $favorites;
  endif;
  return false;
}

function hd_modify_main_query( $query ) {
    if ( $query->is_home() && $query->is_main_query() && !$query->is_paged() ) {
        $query->set('offset', 1);
    }
}
add_action( 'pre_get_posts', 'hd_modify_main_query' );

function the_breadcrumb() {
        echo '<ul class="breadcrumbs" id="crumbs">';
    if (!is_home()) {
        echo '<li><a href="';
        echo get_option('home');
        echo '">';
        echo 'Home';
        echo "</a></li><li>&nbsp;>&nbsp;</li>";
        if (is_category() || is_single()) {
            echo '<li>';
            the_category(' </li><li>&nbsp;>&nbsp;</li><li> ');
            if (is_single()) {
                echo "</li><li>&nbsp;>&nbsp;</li><li>";
                the_title();
                echo '</li>';
            }
        } elseif (is_page()) {
            echo '<li>';
            echo the_title();
            echo '</li>';
        }
    }
    elseif (is_tag()) {single_tag_title();}
    elseif (is_day()) {echo"<li>Archive for "; the_time('F jS, Y'); echo'</li>';}
    elseif (is_month()) {echo"<li>Archive for "; the_time('F, Y'); echo'</li>';}
    elseif (is_year()) {echo"<li>Archive for "; the_time('Y'); echo'</li>';}
    elseif (is_author()) {echo"<li>Author Archive"; echo'</li>';}
    elseif (isset($_GET['paged']) && !empty($_GET['paged'])) {echo "<li>Blog Archives"; echo'</li>';}
    elseif (is_search()) {echo"<li>Search Results"; echo'</li>';}
    echo '</ul>';
}

function qt_custom_breadcrumbs() {
 
  $showOnHome = 0; // 1 - show breadcrumbs on the homepage, 0 - don't show
  $delimiter = '&raquo;'; // delimiter between crumbs
  $home = 'Home'; // text for the 'Home' link
  $showCurrent = 1; // 1 - show current post/page title in breadcrumbs, 0 - don't show
  $before = '<span class="current">'; // tag before the current crumb
  $after = '</span>'; // tag after the current crumb
 
  global $post;
  $homeLink = get_bloginfo('url');
 
  if (is_home() || is_front_page()) {
 
    if ($showOnHome == 1) echo '<ul class="breadcrumbs" id="crumbs"><a href="' . $homeLink . '">' . $home . '</a></ul>';
 
  } else {
 
    echo '<ul class="breadcrumbs" id="crumbs"><li><a href="' . $homeLink . '">' . $home . '</a></li> ' . $delimiter . ' ';
 
    if ( is_category() ) {
      $thisCat = get_category(get_query_var('cat'), false);
      if ($thisCat->parent != 0) echo get_category_parents($thisCat->parent, TRUE, ' ' . $delimiter . ' ');
      echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
 
    } elseif ( is_search() ) {
      echo $before . 'Search results for "' . get_search_query() . '"' . $after;
 
    } elseif ( is_day() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
      echo '<li><a href="' . get_month_link(get_the_time('Y'),get_the_time('m')) . '">' . get_the_time('F') . '</a></li> ' . $delimiter . ' ';
      echo $before . get_the_time('d') . $after;
 
    } elseif ( is_month() ) {
      echo '<li><a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a></li> ' . $delimiter . ' ';
      echo $before . get_the_time('F') . $after;
 
    } elseif ( is_year() ) {
      echo $before . get_the_time('Y') . $after;
 
    } elseif ( is_single() && !is_attachment() ) {
      if ( get_post_type() != 'post' ) {
        $post_type = get_post_type_object(get_post_type());
        $slug = $post_type->rewrite;
        echo '<li><a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a></li>';
        if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
      } else {
        $cat = get_the_category(); $cat = $cat[0];
        $cats = get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        if ($showCurrent == 0) $cats = preg_replace("#^(.+)\s$delimiter\s$#", "$1", $cats);
        echo $cats;
        if ($showCurrent == 1) echo $before . get_the_title() . $after;
      }
 
    } elseif ( !is_single() && !is_page() && get_post_type() != 'post' && !is_404() ) {
      $post_type = get_post_type_object(get_post_type());
      echo $before . $post_type->labels->singular_name . $after;
 
    } elseif ( is_attachment() ) {
      $parent = get_post($post->post_parent);
      $cat = get_the_category($parent->ID); $cat = $cat[0];
      echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
      echo '<li><a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a></li>';
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_page() && !$post->post_parent ) {
      if ($showCurrent == 1) echo $before . get_the_title() . $after;
 
    } elseif ( is_page() && $post->post_parent ) {
      $parent_id  = $post->post_parent;
      $breadcrumbs = array();
      while ($parent_id) {
        $page = get_page($parent_id);
        $breadcrumbs[] = '<li><a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a></li>';
        $parent_id  = $page->post_parent;
      }
      $breadcrumbs = array_reverse($breadcrumbs);
      for ($i = 0; $i < count($breadcrumbs); $i++) {
        echo $breadcrumbs[$i];
        if ($i != count($breadcrumbs)-1) echo ' ' . $delimiter . ' ';
      }
      if ($showCurrent == 1) echo ' ' . $delimiter . ' ' . $before . get_the_title() . $after;
 
    } elseif ( is_tag() ) {
      echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
 
    } elseif ( is_author() ) {
       global $author;
      $userdata = get_userdata($author);
      echo $before . 'Articles posted by ' . $userdata->display_name . $after;
 
    } elseif ( is_404() ) {
      echo $before . 'Error 404' . $after;
    }
 
    if ( get_query_var('paged') ) {
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ' (';
      echo __('Page') . ' ' . get_query_var('paged');
      if ( is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author() ) echo ')';
    }
 
    echo '</ul>';
 
  }
} 


// filter the Gravity Forms button type
add_filter( 'gform_submit_button', 'form_submit_button', 10, 2 );
function form_submit_button( $button, $form ) {
    $out = '';
    if($form['id'] == 5) {
      $out .= '<button class="btn btn-md btn-green pull-right" id="gform_submit_button_'.$form['id'].'" type="submit"><span>'.$form['button']['text'].'</span></button>';
    } else {
      $out .= '<div class="text-center">';
          $out .= '<button class="btn btn-cta btn-white" id="gform_submit_button_'.$form['id'].'" type="submit"><span>'.$form['button']['text'].'</span></button>';
          $out .= '<p class="note">* - Required fields</p>';
      $out .= '</div>';
    }
    return $out;
}

add_filter( 'gform_field_container', 'form_field_container_wrap', 10, 6 );
function form_field_container_wrap( $field_container, $field, $form, $css_class, $style, $field_content ) {
  $id = $field->id;
  $field_id = is_admin() || empty( $form ) ? "field_{$id}" : 'field_' . $form['id'] . "_$id";
  if($form['id'] == 5) {
    return '<div class="fld-wrpr">'.$field_content . '<span class="' . $field_id . '"><hr></span></div>';
  } else {
    return '<li id="' . $field_id . '" class="' . $css_class . ' ' . $field['type'] . '">' . $field_content . '</li>';
  }
}


function alx_embed_html( $html ) {
    return '<div class="video-container">' . $html . '</div>';
}
 
add_filter( 'embed_oembed_html', 'alx_embed_html', 10, 4 );
add_filter( 'video_embed_html', 'alx_embed_html' );

function get_spektrix_event_transient_by_id($event_id) {
    $transient = get_transient( 'spectrix_event_'.$event_id );
    
    if(! empty( $transient ) ) {
      // console_log($transient);
      return $transient;

    } else {
      
      // Call the API.
      $out = get_spektrix_event_by_id($event_id);
      
      // Save the API response so we don't have to call again until tomorrow.
      set_transient( 'spectrix_event_'.$event_id, $out, DAY_IN_SECONDS );
      
      return $out;
      
    }
}
function API()
{
  $client = get_field('spektrix_client_id', 'options');
  $api = 'https://tickets.berniegrantcentre.co.uk/'.strip_tags(get_field('spektrix_id', 'options')).'/api/v1/';
  return $api;
}

function get_spektrix_event_by_id($eventId)
{
  $APIendPoint = API().'EventsRestful.svc/details/allattributes/'.$eventId;
  console_log($APIendPoint);
  $api = new RestClient(); 
  $result = $api->get($APIendPoint);
  $code = $result->info->http_code;
  if($code == 200) {
      libxml_use_internal_errors(true);
      try {
          $elem = simplexml_load_string($result->response);
          if($elem !== false) {
              // Process XML structure here
              $xml = new SimpleXMLElement($result->response);
              $json_string = json_encode($xml->children());    
              $result_array = json_decode($json_string, TRUE);
              console_log($result_array);
          } else {
              return array();
          }
          return $result_array;
      } catch(Exeption $e) {
        return array();
      }
  } else {
      $xml = new SimpleXMLElement($result->response, null, true);
      echo $result->response." GET failed, error code: ".$code." endpoint: ".$APIendPoint;
      return array();
  }
}
function getEventTimeDay($a) {
    $date = new DateTime($a);
    return $date->format('DD');
}
function getEventTimeMonth($a) {
    $date = new DateTime($a);
    return $date->format('MM');
}
function getEventTimeYear($a) {
    $date = new DateTime($a);
    return $date->format('YY');
}

function available_seats($event)
{
  $SeatsAvailable = $event['SeatsAvailable'];
  $SeatsSold = $event['SeatsSold'];
  $Capacity = $event['Capacity'];

  if($SeatsAvailable != 0)
  {
    if($SeatsSold == 0) {
      return 100;
    } else {
      return ($SeatsAvailable) / $Capacity * 100;
    }
  }
  else
  {
    return 0;
  }
}

function getSpektrixAttributes($attributes){

    // print_r($attributes);
    // $b = $a['Times']['EventTime'];
    $attributesToPrint = [];
    if($attributes['SeatsAvailable']*10 <= $attributes['Capacity'] && $attributes['SeatsAvailable'] != 0){
      $attributesToPrint[] = 'Limited Availability';
    }

      $attributes = $attributes['Attributes']['EventAttribute'];
      foreach ($attributes as $attribute) {
        if($attribute['Value']==1):
          $attributesToPrint[] = $attribute['Name'];
        endif;
      }
      return implode(', ', $attributesToPrint);
      // $attributesToPrint = [];
      // echo "\n";

}

function getSpektrixBookText($attributes){

    // print_r($attributes);
    // $b = $a['Times']['EventTime'];
    $html = '';

    if($attributes['SeatsAvailable'] == 0 ){
          $html .= '<span style="float:right;color:#000;">';
          $html .= 'SOLD OUT';
          $html .= '</span>';
    } else {
          $html .= '<a href="'.esc_url(get_permalink(786)).'?eventID='.$attributes['EventInstanceId'].'" style="float:right;color:#009ee3;">';
          $html .= 'BOOK';
          $html .= '</a>';
    }

  return $html;
}

function console_log($res) {
    $res = json_encode($res);
    echo '<script>';
    echo 'console.log('.$res.');';
    echo '</script>';
}

function add_query_arg_hd($key, $value, $append = false)
{
  //return to old method
  return add_query_arg($key, $value);

//UNUSED FUNCTIONALITY
if ($append){
  
  if(strpos($append, $value) !== false ){
    $arr = explode('+', str_replace(' ', '+', $append));
    if (($key2 = array_search($value, $arr)) !== false) {
      unset($arr[$key2]);
    }

    if(!empty($arr))
      return add_query_arg($key, implode('+', $arr));
    else
      return remove_query_arg($key);
  }
  else
    return add_query_arg($key, $value.'+'.str_replace(' ', '+', $append));

} else {
  return add_query_arg($key, $value);
}

}
function get_query_arg($arg){

    if(isset($_GET[$arg]) && !empty($_GET[$arg]))
        return $_GET[$arg];

    return false;
}

function get_query_arg_hd($arg, $value){

    if(!isset($_GET[$arg]))
      return false;

    $arr = explode('+', str_replace(' ', '+', $_GET[$arg]));
    return in_array($value, $arr);

}