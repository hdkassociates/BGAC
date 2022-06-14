<?php
/**
 * The template for displaying archive pages
 *
 */
get_header();
$tax = get_queried_object();
?>
<?php if( have_rows('slider', $tax->taxonomy.'_'.$tax->term_id) ): ?>
<section class="slider">
  <div class="royalSlider rsMinW">
    <?php while( have_rows('slider', $tax->taxonomy.'_'.$tax->term_id) ): the_row(); ?>
    <div class="slide">
      <a href="<?=hd_get_image_url_from_id(get_sub_field('image'), 'slide');?>" class="rsImg"></a>
    </div>
    <?php endwhile; ?>
  </div>
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
<?php if(get_field('group_by_designer', $tax->taxonomy.'_'.$tax->term_id) == 0): ?>

  <?php 
    $designers = get_terms('dress_designer');
    if(have_rows('designder_order', $tax->taxonomy.'_'.$tax->term_id)): 
      $featured = array();
      while( have_rows('designder_order', $tax->taxonomy.'_'.$tax->term_id) ): the_row();
        $featured_tax = get_sub_field('designer');
        $featured[] = $featured_tax;
        $exist = array_search($featured_tax, $designers);
        if($exist !== false) {
          unset($designers[$exist]);
        }
      endwhile;
      $designers = array_merge($featured, $designers);
    endif;
    foreach ($designers as $designer):
      $args = array(
        'post_type' => 'dress',
        'post_status' => 'publish',
        'posts_per_page' => -1,
        'tax_query' => array(
          'relation' => 'AND',
          array(
            'taxonomy' => $tax->taxonomy,
            'terms' => $tax->term_id,
            'operator' => 'IN'
          ),
          array(
            'taxonomy' => $designer->taxonomy,
            'terms' => $designer->term_id,
            'operator' => 'IN'
          )
        ),
        'orderby' => 'date',
        'order' => 'DESC'
      );
      $dresses = new WP_Query ($args);
      if($dresses->have_posts()):
  ?>
        <section class="brand-cta">
          <img src="<?=hd_get_image_url_from_id(get_field('designer_banner', $designer->taxonomy.'_'.$designer->term_id), 'full');?>">
          <div class="abs-0000 hw-100">
            <div class="vertical-center text-center">
              <a href="<?=get_term_link( $designer->term_id, $designer->taxonomy );?>" class="btn btn-lg btn-main">View All <?=$designer->name;?></a>
            </div>
          </div>
        </section>
        <section class="spotlights">
          <div class="container row-2">
            <?php while ( $dresses->have_posts() ) : $dresses->the_post(); ?>
              <?php get_template_part( 'framework/content/content', 'display-dress' ); ?>

              <?php if(($dresses->current_post + 1) % 4 === 0): ?>
                <div class="clearfix"></div>
              <?php elseif(($dresses->current_post + 1) % 2 === 0): ?>
                <div class="clearfix visible-sm"></div>
              <?php endif; ?>

            <?php endwhile; wp_reset_postdata(); ?>
            <div class="clearfix"></div>
          </div>
        </section>
  <?php
      endif;
    endforeach;
  ?>
<?php else: ?>
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
      <?php endwhile;  wp_reset_postdata();?>
      <div class="clearfix"></div>
    </div>
  </section>

<?php endif; ?>


<!-- /#page-content -->
<?php get_footer(); ?>
