<?php
include('../../../../../wp-load.php');

global $wpdb;

$itemsArr = $_POST['data'];
foreach($itemsArr as $item):
	if($item['socCheck'] == 1):

		$check = $item['socCheck'];
		$title = $item['socTitle'];
		$date  = $item['socCreated_at'];
		$text  = $item['socText'];
		$image = $item['socThumbnail_image'];
		$link  = $item['socLink'];
		$venue = $item['socVenue'];
		$col   = $item['col'];

		if($venue == "facebook") {
			$image = '';
		}

		$wpdb->insert( 
			'wp_social_wall', 
			array( 
				'checked' => $check, 
				'title' => $title,
				'created_at' => $date,
				'body' => $text,
				'image' => $image,
				'link' => $link,
				'venue' => $venue,
				'col'  => $col
			), 
			array( 
				'%d', 
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s',
				'%s' 
			) 
		);


	endif;
endforeach;
header( 'Location: '.get_site_url().'/wp-admin/admin.php?page=social-wall' );
?>