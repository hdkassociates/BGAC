<?php
/*
Template Name: Explore
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
                        <div class="filter-container hidden-xs hidden-sm">
                            <div class="filter-what">
                                <ul class="list-inline list-unstyled">
                                    <li><a class="btn btn-md btn-white what"><span>What:</span></a></li>
                                    <li class="break"><a href="<?php echo esc_url( remove_query_arg( ['what', 'when'] ) ); ?>"
                                        class="btn btn-md btn-green <?php echo (get_query_arg( 'what' ) == false && get_query_arg( 'when' ) == false ) ? 'active' : ''; ?>"
                                        ><span>All</span></a></li>
                                </ul>
                                <ul class="list-inline list-unstyled">
                                    <?php
                                    $terms = get_terms( 'explore-category', array(
                                        'hide_empty' => false,
                                    ) );
                                    foreach ($terms as $term):
                                        ?>
                                    <li><a
                                        href="<?php echo esc_url(add_query_arg_hd('what', $term->slug, get_query_arg('what'))) ?>"
                                        class="<?php echo (get_query_arg_hd( 'what', $term->slug )) ? 'active' : ''; ?> btn btn-md btn-green"
                                        >
                                        <span><?php echo $term->name; ?></span>
                                        </a>
                                    </li>

                                        <?php
                                    endforeach;
 ?>
                                </ul>
                            </div>
                        </div>
                        <div class="filter-container dropdown visible-xs visible-sm">
                            <form>
                                <select class="btn btn-md btn-green" name="what"  onchange="this.form.submit()" >
                                    <option <?php echo (get_query_arg( 'what' ) == 'all' || !get_query_arg( 'what' )) ? 'selected' : ''; ?>     value="all">All</option>

<?php
                                    foreach ($terms as $term):
                                        ?>
                                    <option <?php echo (get_query_arg( 'what' ) == $term->slug ) ? 'selected' : ''; ?> value="<?php echo $term->slug; ?>"><?php echo $term->name; ?></option>


                                        <?php endforeach; ?>

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
                'post_type' => 'explore',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'date',
                'order' => 'DESC',
                'cache_results' => false
            );


            if(get_query_arg('what') && get_query_arg('what') != 'all' ){
                $args['tax_query'] = [[
                    'taxonomy' => 'explore-category',
                    'field' => 'slug',
                    'terms' => explode('+', str_replace(' ', '+', get_query_arg('what')) )
                ]];
            }

            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) :
            ?>

            <ul class="row-3 green-color list-inline list-unstyled one-cta">
            <?php
            while ( $the_query->have_posts() ) : $the_query->the_post();
              get_template_part( 'framework/content/boxes/content', 'explore-box' );
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
