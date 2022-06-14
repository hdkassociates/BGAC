<?php
/*
Template Name: Spektrix common
*/

get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <script
        type='text/javascript'
        src='https://tickets.berniegrantcentre.co.uk/<?=strip_tags(get_field('spektrix_id'));?>/website/scripts/resizeiframe.js'>
        </script>

        <div class="hero-section">
            <div class="white-space"></div>
            <div class="hero-bg" style="background: url(<?php echo hd_get_image_url_from_id( get_field( 'header_image' ), 'cover' ); ?>) no-repeat center bottom;">
<!--                 <div class="section">
                    <div class="hero-content">
                        <h1 class="hero-title"><?php the_title();?></h1>
                    </div>
                </div> -->
            </div>
        </div>
        <div class="section">
            <div class="page-content">
                <div class="triangle-top-left"></div>
                <h1 class="hero-title"><?php the_title();?></h1>
				<div class="col-sm-12">
					<?php the_content(); ?>	
				</div>
            </div>
            <div class="spektrix-iframe-wrapper">
                <iframe
                name="SpektrixIFrame"
                id="SpektrixIFrame"
                frameborder="0"
                scrolling="no"
                src="https://tickets.berniegrantcentre.co.uk/<?=strip_tags(get_field('spektrix_id'));?>/website/<?=strip_tags(get_field('spekrix_url'));?>?resize=true"
                style="width: 100%; margin: 0 auto; min-height: 600px;"></iframe>
            </div>
        </div>


<?php endwhile; endif; ?>
<?php get_footer(); ?>


