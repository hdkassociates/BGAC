<?php
function fetchUrl($url)
{
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, $url);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_TIMEOUT, 20);
	// You may need to add the line below
	// curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);

	$feedData = curl_exec($ch);
	curl_close($ch); 

	return $feedData;
}

function getFacebookPageFeed()
{
	$facebookPosts = array();
	$profile_id = "714283772006073";

	//App Info, needed for Auth
	$app_id = "1580076792205529";
	$app_secret = "b4938c4fa54e681afb36490fe4450f1d";

	//Retrieve auth token
	$authToken = fetchUrl("https://graph.facebook.com/oauth/access_token?grant_type=client_credentials&client_id={$app_id}&client_secret={$app_secret}");

	$json_object = fetchUrl("https://graph.facebook.com/{$profile_id}/posts?{$authToken}");

	$data = json_decode($json_object)->{'data'};

	foreach ($data as $post) {
		$facebookPosts[] =  array(
              'title' => $post->name,
              'created_at' => $post->created_time,
              'geo_location' => NULL,
              'thumbnail_image' => $post->picture,
              'text' => $post->message,
              'venue' => 'facebook'
              );
	}

	return $facebookPosts;
}

?>