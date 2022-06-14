<?php
/*
Template Name: Home
*/
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

        <div class="hero-section">
            <div class="white-space"></div>
            <div class="hero-bg" style="background: url(<?php echo hd_get_image_url_from_id( get_field( 'header_image' ), 'cover' ); ?>) no-repeat center bottom;">
            <div class="triangle-bottom-right green-triangle"></div>
                <div class="section">
                    <div class="hero-content">
                        <h1 class="hero-title"><?php the_field('header_text'); ?></h1>
                    </div>
                </div>
            </div>
        </div>
        <div class="section">
        <div class="icon-arrow-bottom">
            <i class="i-triangle-down"></i>
        </div>

<?php 
global $big_index;
$big_index = 0;
if( have_rows('home') ):

    while ( have_rows('home') ) : the_row();

        if( get_row_layout() == 'block' ):

            echo get_template_part('framework/layouts/main-post-big');


        endif;

    endwhile;

endif;
?>

        </div>
        <div class="section">


<?php 
if( have_rows('home') ):

global $small_index;
$small_index = 0;
    while ( have_rows('home') ) : the_row();

        if( get_row_layout() == 'block_small' ):

            echo get_template_part('framework/layouts/main-post-small');


        endif;

    endwhile;

endif;
?>

        </div>


<?php endwhile; endif; ?>
<?php get_footer(); ?>