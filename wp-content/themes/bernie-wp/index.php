<?php
/*
Template Name: index
*/
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
<section>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <br>
    <h1>
        Wrong place
    </h1>
</section>

<?php endwhile; endif; ?>
<?php get_footer(); ?>