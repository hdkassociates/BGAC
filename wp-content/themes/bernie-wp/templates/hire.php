<?php
/*
Template Name: Hire
*/

if(get_query_var('paged')) {
  $paged = get_query_var('paged');
} elseif(get_query_var('page')) {
  $paged = get_query_var('page');
} else {
  $paged = 1;
}



get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="hero-section">
            <div class="white-space"></div>
            <div class="hero-bg" style="background: url(<?php echo hd_get_image_url_from_id( get_field( 'header_image' ), 'cover' ); ?>) no-repeat center bottom;">
                <div class="section">
                    <div class="hero-content">
                        <h1 class="hero-title"><?php the_field('header_text'); ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">

            <?php
            $args = array(
                'post_type' => 'hire',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC',
                'cache_results' => false
            );

            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) :
            ?>

            <ul class="row-3 blue-color list-inline list-unstyled two-cta">
            <?php
            while ( $the_query->have_posts() ) : $the_query->the_post();
              get_template_part( 'framework/content/boxes/content', 'hire-box' );
            endwhile;
            ?>
            </ul>
            <?php else: ?>
            <div class="no-posts">
                <br><br><br><br>
                <hr>
                <h2 class="text-center">no posts found...</h2>
                <hr>
                <br><br><br><br>
            </div>
            <?php endif; ?>

        </div>


<?php endwhile; endif; ?>
<?php get_footer(); ?>