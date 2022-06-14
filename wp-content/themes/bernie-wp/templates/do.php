<?php
/*
Template Name: Do
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

        <div class="hero-section do-page">
            <div class="white-space"></div>
            <div class="hero-bg" style="background: url(<?php echo hd_get_image_url_from_id( get_field( 'header_image' ), 'cover' ); ?>) no-repeat center bottom;">
                <div class="section">
                    <div class="hero-content">
                        <div class="filter-container hidden-xs hidden-sm">
                            <div class="filter-what">
                                <ul class="list-inline list-unstyled">
                                    <li><a class="btn btn-md btn-white what"><span>What:</span></a></li>
                                    <li class="break"><a href="<?php echo esc_url( remove_query_arg( 'do_category' ) ); ?>"
                                        class="btn btn-md btn-cherry <?php echo (get_query_arg( 'do_category' ) == false ) ? 'active' : ''; ?>"
                                        ><span>All</span></a></li>
                                </ul>
                                <ul class="list-inline list-unstyled">
                                    <li><a 
                                        href="<?php echo esc_url(add_query_arg('do_category', 'child')) ?>"
                                        class="<?php echo (get_query_arg( 'do_category' ) == 'child') ? 'active' : ''; ?> btn btn-md btn-cherry"
                                        >
                                        <span>Child</span>
                                        </a>
                                    </li>
                                    <li><a 
                                        href="<?php echo esc_url(add_query_arg('do_category', 'adult')) ?>"
                                        class="<?php echo (get_query_arg( 'do_category' ) == 'adult') ? 'active' : ''; ?> btn btn-md btn-cherry"
                                        >
                                        <span>Adult</span>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                        <div class="filter-container dropdown visible-xs visible-sm">

                            <form>
                                <select class="btn btn-md btn-cherry" name="do_category"  onchange="this.form.submit()" >
                                    <option <?php echo (get_query_arg( 'what' ) == 'all' || !get_query_arg( 'what' )) ? 'selected' : ''; ?>     value="all">All</option>
                                    <option <?php echo (get_query_arg( 'what' ) == 'child' ) ? 'selected' : ''; ?> value="child">Child</option>
                                    <option <?php echo (get_query_arg( 'what' ) == 'adult'   ) ? 'selected' : ''; ?> value="adult">Adult</option>
                                </select>
                                <input type="hidden" name="page_id" value="<?php echo get_query_var( 'page_id' ); ?>">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">

            <?php
            $args = array(
                'post_type' => 'do',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC'
            );

            if(get_query_arg('do_category') && get_query_arg('do_category') != 'all' ){
                $args['tax_query'] = [[
                    'taxonomy' => 'do-category',
                    'field' => 'slug',
                    'terms' => array( get_query_arg('do_category') )
                ]];
            }


            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) :
            ?>

            <ul class="row-3 cherry-color list-inline list-unstyled one-cta">
            <?php
            while ( $the_query->have_posts() ) : $the_query->the_post();
              get_template_part( 'framework/content/boxes/content', 'do-box' );
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