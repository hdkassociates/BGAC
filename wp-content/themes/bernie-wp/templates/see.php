<?php
/*
Template Name: See
*/

if(get_query_var('paged')) {
  $paged = get_query_var('paged');
} elseif(get_query_var('page')) {
  $paged = get_query_var('page');
} else {
  $paged = 1;
}

global $post;

get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="hero-section">
            <div class="white-space"></div>
            <div class="hero-bg" style="background: url(<?php echo hd_get_image_url_from_id( get_field( 'header_image' ), 'cover' ); ?>) no-repeat center bottom;">
                <div class="section">
                    <div class="hero-content">
                        <div class="filter-container hidden-xs hidden-sm">
                            <div class="filter-what see-desktop">
                                <ul class="list-inline list-unstyled">
                                    <li><a class="btn btn-md btn-white what"><span>What:</span></a></li>
                                    <li class="break"><a href="<?php echo esc_url( remove_query_arg( ['what', 'when'] ) ); ?>"
                                        class="btn btn-md btn-yellow <?php echo (get_query_arg( 'what' ) == false && get_query_arg( 'when' ) == false ) ? 'active' : ''; ?>"
                                        ><span>All</span></a></li>
                                </ul>
                                <ul class="list-inline list-unstyled second-nav-line">
                                    <li><a 
                                        href="<?php echo esc_url(add_query_arg_hd('what', 'theatre', get_query_arg('what'))) ?>"
                                        class="<?php echo (get_query_arg_hd( 'what', 'theatre' )) ? 'active' : ''; ?> btn btn-md btn-yellow"
                                        >
                                        <span>Theatre</span>
                                        </a>
                                    </li>
                                    <li><a 
                                        href="<?php echo esc_url(add_query_arg_hd('what', 'dance', get_query_arg('what'))) ?>"
                                        class="<?php echo (get_query_arg_hd( 'what', 'dance' )) ? 'active' : ''; ?> btn btn-md btn-yellow"
                                        >
                                        <span>Dance</span>
                                        </a>
                                    </li>
                                    <li><a 
                                        href="<?php echo esc_url(add_query_arg_hd('what', 'exhibition', get_query_arg('what'))) ?>"
                                        class="<?php echo (get_query_arg_hd( 'what', 'exhibition' )) ? 'active' : ''; ?> btn btn-md btn-yellow"
                                        >
                                        <span>Exhibition</span>
                                        </a>
                                    </li>
                                </ul>
                                <ul class="list-inline list-unstyled">
                                    <li><a 
                                        href="<?php echo esc_url(add_query_arg_hd('what', 'music', get_query_arg('what'))) ?>"
                                        class="<?php echo (get_query_arg_hd( 'what', 'music' )) ? 'active' : ''; ?> btn btn-md btn-yellow"
                                        >
                                        <span>Music</span>
                                        </a>
                                    </li>
                                    <li><a 
                                        href="<?php echo esc_url(add_query_arg_hd('what', 'cinema', get_query_arg('what'))) ?>"
                                        class="<?php echo (get_query_arg_hd( 'what', 'cinema' )) ? 'active' : ''; ?> btn btn-md btn-yellow"
                                        >
                                        <span>Cinema</span>
                                        </a>
                                    </li>
									<li><a 
                                        href="<?php echo esc_url(add_query_arg_hd('what', 'festivals', get_query_arg('what'))) ?>"
                                        class="<?php echo (get_query_arg_hd( 'what', 'festivals' )) ? 'active' : ''; ?> btn btn-md btn-yellow"
                                        >
                                        <span>Festivals</span>
                                        </a>
                                    </li>
                                    <hr>
                                </ul>
                            </div>
                            <div class="filter-when">
                                <ul class="list-inline list-unstyled">
                                    <li><a
                                        href="#"
                                        class="btn btn-md btn-white when"><span>When:</span></a></li>
                                    <li><a
                                        href="<?php echo esc_url(add_query_arg('when', 'this_month')) ?>"
                                        class="<?php echo (get_query_arg( 'when' ) == 'this_month') ? 'active' : ''; ?> btn btn-md btn-yellow"><span><?php echo date("F", time()); ?></span></a></li>
                                    <li><a
                                        href="<?php echo esc_url(add_query_arg('when', 'next_month')) ?>"
                                        class="<?php echo (get_query_arg( 'when' ) == 'next_month') ? 'active' : ''; ?> btn btn-md btn-yellow"><span>Next Month</span></a></li>
                                    <li><a
                                        href="<?php echo esc_url(add_query_arg('when', '3_months')) ?>"
                                        class="<?php echo (get_query_arg( 'when' ) == '3_months') ? 'active' : ''; ?> btn btn-md btn-yellow"><span>3 months</span></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="filter-container dropdown visible-xs visible-sm">
                            <form>
                                <select class="btn btn-md btn-yellow" name="what"  onchange="this.form.submit()" >
                                    <option <?php echo (get_query_arg( 'what' ) == 'all' || !get_query_arg( 'what' )) ? 'selected' : ''; ?>     value="all">All</option>
                                    <option <?php echo (get_query_arg( 'what' ) == 'theatre' ) ? 'selected' : ''; ?> value="theatre">Theatre</option>
                                    <option <?php echo (get_query_arg( 'what' ) == 'dance'   ) ? 'selected' : ''; ?> value="dance">Dance</option>
                                    <option <?php echo (get_query_arg( 'what' ) == 'music'   ) ? 'selected' : ''; ?> value="music">Music</option>
                                    <option <?php echo (get_query_arg( 'what' ) == 'cinema'  ) ? 'selected' : ''; ?> value="cinema">Cinema</option>
                                    <option <?php echo (get_query_arg( 'what' ) == 'exhibition'  ) ? 'selected' : ''; ?> value="exhibition">Exhibition</option>
                                    <option <?php echo (get_query_arg( 'what' ) == 'festivals'  ) ? 'selected' : ''; ?> value="tottenham-lit-fest">Festivals</option>
                                </select>
                                <select class="btn btn-md btn-yellow pull-right" name="when"  onchange="this.form.submit()" >
                                    <option <?php echo (get_query_arg( 'when' ) == 'all' || !get_query_arg( 'when' ) ) ? 'selected' : ''; ?> value="all">All</option>
                                    <option <?php echo (get_query_arg( 'when' ) == 'this_month') ? 'selected' : ''; ?> value="this_month"><?php echo date("F", time()); ?></option>
                                    <option <?php echo (get_query_arg( 'when' ) == 'next_month') ? 'selected' : ''; ?> value="next_month">Next Month</option>
                                    <option <?php echo (get_query_arg( 'when' ) == '3_months'  ) ? 'selected' : ''; ?> value="3_months">3 Months</option>
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
                'post_type' => 'see',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'orderby' => 'meta_value_num',
                'order' => 'ASC',
                'meta_key' => 'date_for_filter'
            );

            if(get_query_arg('what') && get_query_arg('what') != 'all' ){
                $args['tax_query'] = [[
                    'taxonomy' => 'see-category',
                    'field' => 'slug',
                    'terms' => explode('+', str_replace(' ', '+', get_query_arg('what')) )
                ]];
            }



            // if(get_query_arg('when')){

                $args['meta_query'] = [
                    'relation' => 'AND',
                    [
                    'key' => 'date_for_filter',
                    'value' => get_end_date(get_query_arg('when')),
                    'type' => 'DATE',
                    'compare' => '<='
                    ],
                    [
                    'key' => 'date_for_filter_to',
                    'value' => get_begin_date(get_query_arg('when')),
                    'type' => 'DATE',
                    'compare' => '>='
                    ]
            ];

            // }

            $the_query = new WP_Query( $args );
            if ( $the_query->have_posts() ) :
            ?>

<!--
            <h1><?php echo get_begin_date(get_query_arg('when')) ?></h1>
            <h1><?php echo get_end_date(get_query_arg('when')) ?></h1>
 -->
            <ul class="row-3 yellow-color list-inline list-unstyled two-cta">
            <?php
            while ( $the_query->have_posts() ) : $the_query->the_post();
              get_template_part( 'framework/content/boxes/content', 'see-box' );
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