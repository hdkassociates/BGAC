<div class="container">
    <div class="blog-cards items items-4">
        <?php
            $args = array(
                'post_type' => 'post',
                'post_status' => 'publish',
                'posts_per_page' => get_sub_field('post_count'),
                'orderby' => 'date',
                'order' => 'DESC',
            );
            $blog_posts = new WP_Query ($args);
            while ( $blog_posts->have_posts() ) : $blog_posts->the_post();
                get_template_part( 'framework/content/content', 'display-post' );
            endwhile;

            wp_reset_postdata();
        ?>
    </div>
</div>