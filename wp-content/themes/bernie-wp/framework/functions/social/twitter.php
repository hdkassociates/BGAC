<?php

function display_latest_tweets($no_tweets){

    @require_once 'twitter/twitteroauth.php';

     $twitterConnection = new TwitterOAuth(
        'WWrLRn82RphSCc8rgwel8XLx2',    // consumer key
        'lRqE7s1kL3QTZdhEAyjmRMpQPH2OoBUUr7q8CP8fSVfGuBYx1h', // consumer secret
        '100771137-I9jfh1Q09RlP1OATSv5kBHC9Mv8E2AbIahSJ0EO6',    // access token
        'XkzGerPa5ZcyOkBnLnZXmMGJFVOHswcyyrGb4PlJ26KVU'    // access token secret
        );

    $twitterURL = get_field('twitter_id', 'options');
    $arr = explode("/", $twitterURL);
    $twitterUsername = end($arr);
    $twitterData = $twitterConnection->get(
        'statuses/user_timeline',
          array(
            'screen_name'     => $twitterUsername,   // Your Twitter Username
            // 'count'           => $no_tweets,        // Number of Tweets to display
            // for some reason, excluding replies means those tweets get deducted from the number of tweets...
			'count'           => 20,        // Number of Tweets to get from the API before excluding the replies
            'exclude_replies' => true
          )
        );

        $arrayOfTweets = [];

        if($twitterData && is_array($twitterData)):
        $i = 0;
         foreach($twitterData as $tweet):

			if($i < $no_tweets){
			$i++;

         // print_r($tweet);
          $date = new DateTime($tweet->created_at);
          $created_at = $date->format('Y-m-d H:i:s');

          $arrayOfTweets[] = array(
              'title' => $tweet->user->screen_name,
              'created_at' => $created_at,
              'thumbnail_image' => $tweet->entities->media[0]->media_url,
              'text' => $tweet->text,
              'link' => 'http://twitter.com/'.$tweet->user->screen_name.'/statuses/'.$tweet->id_str,
              'venue' => 'tweet'
              );
			}else{
				echo '';
			}

         endforeach;
        endif;

      return $arrayOfTweets;
}

// function display_latest_tweets_by_hashtag($no_tweets, $hashtag){

//     @require_once 'twitter/twitteroauth.php';

//      $twitterConnection = new TwitterOAuth(
//         'WWrLRn82RphSCc8rgwel8XLx2',    // consumer key
//         'lRqE7s1kL3QTZdhEAyjmRMpQPH2OoBUUr7q8CP8fSVfGuBYx1h', // consumer secret
//         '100771137-I9jfh1Q09RlP1OATSv5kBHC9Mv8E2AbIahSJ0EO6',    // access token
//         'XkzGerPa5ZcyOkBnLnZXmMGJFVOHswcyyrGb4PlJ26KVU'    // access token secret
//         );


//     $twitterData = $twitterConnection->get(
//           'search/tweets',
//           array(
//             'q'     => $hashtag,
//             'count' => $no_tweets,
//             'include_entities'=> 1
//             )
//         );



//     $arrayOfTweets = [];

//          foreach($twitterData->statuses as $tweet):


//           $date = new DateTime($tweet->created_at);
//           $created_at = $date->format('Y-m-d H:i:s');

//           $arrayOfTweets[] = array(
//               'title' => $tweet->user->screen_name,
//               'created_at' => $created_at,
//               'thumbnail_image' => $tweet->entities->media[0]->media_url,
//               'text' => $tweet->text,
//               'link' => 'http://twitter.com/'.$tweet->user->screen_name.'/statuses/'.$tweet->id_str,
//               'venue' => 'tweet'
//               );

//          endforeach;

//       return $arrayOfTweets;
// }

?>