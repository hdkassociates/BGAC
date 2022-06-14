<?php

function display_latest_instagram_posts($itemNr, $theinstagramid) {
 // 589324850
  // 209481225
  $instagramID = $theinstagramid;
  $client_id = 'bde3fbceff6d430fa87a0089e28c4161';

 $service_url = 'https://api.instagram.com/v1/users/'.$instagramID.'/media/recent/?count='.$itemNr.'&client_id='.$client_id;
 $curl = curl_init($service_url);
 curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
 $curl_response = curl_exec($curl);

 if ($curl_response === false) {
     $info = curl_getinfo($curl);
     curl_close($curl);
     die('error occured during curl exec. Additioanl info: ' . var_export($info));
 }

 curl_close($curl);

 $decoded = json_decode($curl_response);

 if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
     die('error occured: ' . $decoded->response->errormessage);
 }
   
   // print_r($decoded->data[0]->link);

   $instagramPics = [];

   foreach ($decoded->data as $instpic) {

      $date = new DateTime('@'.$instpic->created_time);
      $created_at = $date->format('Y-m-d H:i:s');

      $instagramPics[] = array(
       'title' => $instpic->user->username,
       'created_at' => $created_at,
       'geo_location' => $instpic->location->name,
       'thumbnail_image' => $instpic->images->low_resolution->url,
       'text' => $instpic->caption->text,
       'link' => $instpic->link,
       'venue' => 'instagram'
       );
   }

   // print_r($decoded->data);

  return $instagramPics;
}

function display_latest_instagram_posts_by_hashtag($itemNr, $hashtag) {
  
   $client_id = 'bde3fbceff6d430fa87a0089e28c4161';

   $service_url = 'https://api.instagram.com/v1/tags/'.$hashtag.'/media/recent/?count='.$itemNr.'&client_id='.$client_id;
   $curl = curl_init($service_url);
   curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
   $curl_response = curl_exec($curl);

   if ($curl_response === false) {
       $info = curl_getinfo($curl);
       curl_close($curl);
       die('error occured during curl exec. Additioanl info: ' . var_export($info));
   }

   curl_close($curl);

   $decoded = json_decode($curl_response);

   if (isset($decoded->response->status) && $decoded->response->status == 'ERROR') {
       die('error occured: ' . $decoded->response->errormessage);
   }
     
  $instagramPics = [];

   foreach ($decoded->data as $instpic) {

      $date = new DateTime('@'.$instpic->created_time);
      $created_at = $date->format('Y-m-d H:i:s');

      $instagramPics[] = array(
       'title' => $instpic->user->username,
       'created_at' => $created_at,
       'thumbnail_image' => $instpic->images->low_resolution->url,
       'text' => $instpic->caption->text,
       'link' => $instpic->link,
       'venue' => 'instagram'
       );
   }

  return $instagramPics;
}


?>