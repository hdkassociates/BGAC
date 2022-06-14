<?php

add_action('wp_ajax_nopriv_submit_form', 'submit_form');
add_action('wp_ajax_submit_form', 'submit_form');

function submit_form()
{

    extract($_POST);
    $form = '<h2>You have received a message via Modern Fashions website</h2> <br><br>';
    if ($name) {
        $form .= 'Name: <strong>' . $name . '</strong><br>';
    }
    if ($email) {
        $form .= 'Email: <strong>' . $email . '</strong><br>';
    }
    if ($tel) {
        $form .= 'Phone: <strong>' . $tel . '</strong><br>';
    }
    if ($type) {
        $form .= 'Enquiry: <strong>' . $type . '</strong><br>';
    }
    if ($date) {
        $form .= 'Date: <strong>' . $date . '</strong><br>';
    }
    if ($time) {
        $form .= 'Time: <strong>' . $time . '</strong><br>';
    }
    if ($message) {
        $form .= 'Message: <strong>' . $message . '</strong><br>';
    }

    $form2 = '<h2>You have submitted a message via Modern Fashions website</h2> <br><br>';
    if ($name) {
        $form2 .= 'Name: <strong>' . $name . '</strong><br>';
    }
    if ($email) {
        $form2 .= 'Email: <strong>' . $email . '</strong><br>';
    }
    if ($tel) {
        $form2 .= 'Phone: <strong>' . $tel . '</strong><br>';
    }
    if ($date) {
        $form2 .= 'Date: <strong>' . $date . '</strong><br>';
    }
    if ($time) {
        $form2 .= 'Time: <strong>' . $time . '</strong><br>';
    }
    if ($message) {
        $form2 .= 'Message: <strong>' . $message . '</strong><br>';
    }

    function set_html_content_type()
    {
        return 'text/html';
    }

    add_filter('wp_mail_content_type', 'set_html_content_type');
    $contactEmail = (get_field('contact_form_email', 'options') ? get_field('contact_form_email', 'options') : get_option('admin_email'));

    wp_mail($contactEmail, 'Review new submission: '.$subject, $form);
    wp_mail($email, 'We have received your submission', $form2);


    remove_filter('wp_mail_content_type', 'set_html_content_type');

}

?>