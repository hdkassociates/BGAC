<?php
/*
Template Name: Sign Up Result
*/
get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>

  <div class="hero-section">
      <div class="white-space"></div>
      <div class="hero-bg">
      </div>
  </div>
  <div class="section inner-page">
      <div class="main-content header-slider">
              <?php if ( have_rows( 'slider' ) ) : ?>
                  <div class="<?=(count( get_field('slider')) > 1 ? 'slick-slider' : 'no-slick-slider');?>">
                      <?php while ( have_rows( 'slider' ) ) : the_row(); ?>
                          <div class="slick-slide-wrap">
                              <img src="<?php echo hd_get_image_url_from_id( get_sub_field( 'slide' ), 'slide' ); ?>">
                              <?php if(strip_tags(get_sub_field('caption'))): ?>
                                  <span class="slick-caption"><?=strip_tags(get_sub_field('caption'));?></span>
                              <?php endif; ?>
                          </div>
                      <?php endwhile; ?>
                  </div>
              <?php endif; ?>
          <div class="page-content">
              <div class="triangle-top-left"></div>
              <h1 class="main-header">
                  Sign Up
              </h1>
              <?php if(strip_tags(get_field('date_input_to_show'))): ?>
                  <p class="h-2"><?php the_field('date_input_to_show'); ?></p>
              <?php endif; ?>
              <p class="h-2-description">
                  <?php the_field('block_description'); ?>
              </p>
              <?php
              if (isset($_GET['Error']) && $_GET['Error'] == 'EmailExists')
              {
                echo "<p>That email already exists on our system. Please try again.</p>";
              }
              else if (isset($_GET['Error']) && $_GET['Error'] == 'NoEmail')
              {
                echo "<p>No email address has been given. Please try again.</p>";
              }
              else if (isset($_GET['Error']) && $_GET['Error'] == 'InvalidEmail')
              {
                echo "<p>That's an invalid email address.</p>";
              }
              else if (isset($_GET['Error']) && $_GET['Error'] == 'NoLastName')
              {
                echo "<p>No last name has been given. Please try again.</p>";
              }
              else
              {
                echo "<p>Thank you for signing up. Please review our privacy policy for details on how to unsubscribe, if you change your mind.</p>";
              }
              ?>
              <?php the_content( ); ?>
          </div>
          <?php if(strip_tags(get_field('event')) || strip_tags(get_field('datetime_to_show_below_content')) || strip_tags(get_field('ticket_price')) || get_field('additional_buttons') || strip_tags(get_field('additional_buttons')) || get_post_type() == 'post'): ?>
          <div class="book-now<?= (!strip_tags(get_field('event')) && !get_field('additional_buttons') && get_post_type() != 'post') ? ' no-buttons' : '' ?>">
              <?php if(strip_tags(get_field('ticket_price'))): ?>
                  <p class="h-2">
                      Tickets: <?php the_field('ticket_price'); ?>
                  </p>
              <?php endif; ?>
              <?php if(strip_tags(get_field('datetime_to_show_below_content'))): ?>
                  <p class="h-2">
                      <?php the_field('datetime_to_show_below_content'); ?>
                  </p>
              <?php endif; ?>
              <?php if(strip_tags(get_field('additional_text'))): ?>
                  <p class="h-2">
                      <?php the_field('additional_text'); ?>
                  </p>
              <?php endif; ?>
              <?php if(get_field('additional_buttons')): ?>
                  <?php if ( have_rows( 'additional_buttons' ) ) : ?>
                      <?php while ( have_rows( 'additional_buttons' ) ) : the_row(); ?>
                          <a href="<?= strip_tags(get_sub_field('url')); ?>" class="btn btn-md btn-white"><span><?php the_sub_field('text'); ?></span></a>
                      <?php endwhile; ?>
                  <?php endif; ?>
              <?php endif; ?>
          </div>
          <?php endif; ?>
          <?php if( get_field('show_related_posts') ): ?>
          <hr>
          <div class="suggestions text-center">
              <h2>You might also like</h2>
              <ul class="row-3 list-inline list-unstyled one-cta">


              <?php

              $posts = get_field('related_posts');

              if( $posts ): ?>
                  <?php foreach( $posts as $post): ?>
                      <?php setup_postdata($post); ?>
                      <?php get_template_part( 'framework/content/boxes/content', 'related-box' ); ?>
                  <?php endforeach; ?>
                  <?php wp_reset_postdata(); ?>
              <?php endif; ?>
              </ul>
          </div>

          <?php endif; ?>

          <div class="clearfix"></div>
      </div>
      <?php
      get_template_part( 'framework/content/content', 'sidebar' );
       ?>
  </div>
  <div class="clearfix"></div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>
