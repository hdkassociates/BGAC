<?php

add_action('wp_ajax_nopriv_toggle_project_timeslips_ajax', 'toggle_project_timeslips_ajax');
add_action('wp_ajax_toggle_project_timeslips_ajax', 'toggle_project_timeslips_ajax');
function toggle_project_timeslips_ajax() {

    if ( isset($_REQUEST) ) {

        $engagementID = $_REQUEST['engid'];


    }
    die();
}

// SAMPLE OF BASIC JQUERY FUNCTION TO PASS DATA

// jQuery.ajax({
//     url: meta.ajaxurl,
//     data: {
//         'action':'last_update_ajax',
//         'engid' : engagementID
//     },

//     success:function(data){
//         console.log(data);
//     },
//     error: function(errorThrown){
//         console.log(errorThrown);
//     }
// });

?>