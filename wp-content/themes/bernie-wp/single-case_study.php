<?php get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <?php require_once(__DIR__.'/framework/content/content-sections.php'); ?>

<?php endwhile; endif; ?>
<?php get_footer(); ?>