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

function display_latest_facebook_posts($itemNr, $theprofile_id)
{
	$facebookPosts = array();
	$profile_id = $theprofile_id;

	//App Info, needed for Auth
	$app_id = "1580076792205529";
	$app_secret = "b4938c4fa54e681afb36490fe4450f1d";

	//Retrieve auth token
	$authToken = fetchUrl("https://graph.facebook.com/oauth/access_token?grant_type=client_credentials&client_id={$app_id}&client_secret={$app_secret}");

	$json_object = fetchUrl("https://graph.facebook.com/{$profile_id}/posts?limit={$itemNr}&{$authToken}");

	$data = json_decode($json_object)->{'data'};

	// print_r($data);

	foreach ($data as $post) {

		$date = new DateTime($post->created_time);
        $created_at = $date->format('Y-m-d H:i:s');

        $picture = $post->picture;

        $objetId = $post->object_id;

        if($objetId):
          $json_object2 = fetchUrl("https://graph.facebook.com/{$objetId}?{$authToken}");
          $data2 = json_decode($json_object2)->{'images'};
          $picture = $data2[5]->source;
        endif;
		


		if($post->message):
		$facebookPosts[] =  array(
              'title' => $post->from->name,
              'created_at' => $created_at,
              'thumbnail_image' => $picture,
              'text' => $post->message,
              'link' => $post->link,
              'venue' => 'facebook'
              );
    endif;
	}

	return $facebookPosts;
}

?>