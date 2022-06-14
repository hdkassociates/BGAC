<?php
include('../../../../../wp-load.php');

global $wpdb;

$itemsArr = $_POST['data'];
foreach($itemsArr as $item):
	if($item['socCheck'] == 1):

		$check = $item['socCheck'];
		$id = $item['id'];

		$wpdb->delete( 'wp_social_wall', array( 'id' => $id ) );

		
	endif;
endforeach;

header( 'Location: '.get_site_url().'/wp-admin/admin.php?page=social-wall' );
	
?>