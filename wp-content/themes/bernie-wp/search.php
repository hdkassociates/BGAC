<?php get_header(); ?>
<?php
      global $query_string;

      $query_args = explode("&", $query_string);
      $search_query = array();
      $queryCount = 0;
      foreach($query_args as $key => $string) {
          $query_split = explode("=", $string);
          if($queryCount == 0) {
            $search_key .= urldecode($query_split[1]);
          }
          if($queryCount == 1) {
            $post_type = urldecode($query_split[1]);
          }
          $queryCount++;
      }
      	$tax_key = strtolower(str_replace(' ', '-', $search_key));
        $search_query =
          array(
              'post_type' => array('dress'),
              'post_status' => 'publish',
              'posts_per_page' => -1,
              'orderby' => 'date',
              'order' => 'DESC',
              's' => $search_key
          );

       	$testSearch = new WP_Query($search_query);

       	if(!$testSearch->have_posts())
       	{
          $search_query =
          array(
              'post_type' => array('dress'),
              'post_status' => 'publish',
              'posts_per_page' => -1,
              'orderby' => 'date',
              'order' => 'DESC',
              'tax_query' => array(
                'relation' => 'OR',
                array(
                  	'taxonomy' => 'dress_designer',
                  	'field' => 'slug',
                  	'terms' => $tax_key,
                  	'include_children' => true,    
                  	'operator' => 'IN'
                ),
                array(
                  	'taxonomy' => 'dress_category',
                  	'field' => 'slug',
                  	'terms' => $tax_key,
                  	'include_children' => true,
                  	'operator' => 'IN'
                ),
                array(
                  	'taxonomy' => 'dress_fabric',
                  	'field' => 'slug',
                  	'terms' => $tax_key,
                  	'include_children' => true,
                  	'operator' => 'IN'
                ),
                array(
	                'taxonomy' => 'dress_shape',
	                'field' => 'slug',
	                'terms' => $tax_key,
	                'include_children' => true,
	                'operator' => 'IN'
                )
            )
          );
       	}
?>

<section class="top-heading gray">
  <h2 class="heading">Search Results for: <?php echo $search_key; ?></h2>
</section>
<section class="spotlights">
      <div class="container row-2">
         <?php
             $search = new WP_Query($search_query);
             if($search->have_posts()): $index = 0;
	             while ( $search->have_posts() ) : $search->the_post(); 
	                get_template_part( 'framework/content/content', 'display-dress' );
	             ?>
	             <?php if(($index + 1) % 4 === 0): ?>
	               <div class="clearfix"></div>
	             <?php elseif(($index + 1) % 2 === 0): ?>
	               <div class="clearfix visible-sm"></div>
	             <?php endif; $index++;?>
	             <?php
	             endwhile;
	             wp_reset_postdata();
             else: 
               	echo '<br><br><hr><h1 class="text-center">No results were found</h1><hr><br><br>';
             endif;
         ?>
         <div class="clearfix"></div>
	</div>
</section>
                


<?php get_footer(); ?>