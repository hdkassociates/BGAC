<?php
/**
 * The template for displaying archive pages
 *
 */
get_header();
$tax = get_queried_object();
?>
<?php if( get_field('designer_banner', $tax->taxonomy.'_'.$tax->term_id) ): ?>
<section class="brand-cta">
  <img src="<?=hd_get_image_url_from_id(get_field('designer_banner', $tax->taxonomy.'_'.$tax->term_id), 'full');?>">
</section>
<?php endif; ?>
<section class="top-heading gray">
  <h2 class="heading"><?=$tax->name;?></h2>
</section>
<?php if($tax->description): ?>
<section class="fancy-text">
  <div class="container center">
    <i class="fa fa-angle-down"></i>
    <p><?=$tax->description?></p>
    <hr>
  </div>
</section>
<?php endif; ?>
<section class="spotlights">
  <div class="container row-2">
    <?php
    global $wp_query;
    while ( have_posts() ) : the_post();
      get_template_part( 'framework/content/content', 'display-dress' ); ?>
      <?php if(($wp_query->current_post + 1) % 4 === 0): ?>
        <div class="clearfix"></div>
      <?php elseif(($wp_query->current_post + 1) % 2 === 0): ?>
        <div class="clearfix visible-sm"></div>
      <?php endif; ?>
    <?php endwhile; wp_reset_postdata();?>
    <div class="clearfix"></div>
  </div>
</section>
<!-- /#page-content -->
<?php get_footer(); ?>
