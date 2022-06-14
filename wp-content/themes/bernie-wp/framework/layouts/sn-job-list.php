<div class="container">
    <div class="_max-width-760">
        <ul class="jobs-list">
        <?php
            $args = array(
                'post_type' => 'job',
                'post_status' => 'publish',
                'posts_per_page' => get_sub_field('post_count'),
                'orderby' => 'date',
                'order' => 'DESC',
            );
            $blog_posts = new WP_Query ($args);
            while ( $blog_posts->have_posts() ) : $blog_posts->the_post();
                get_template_part( 'framework/content/content', 'display-job' );
            endwhile;

            wp_reset_postdata();
        ?>
        </ul>
    </div>
</div>
