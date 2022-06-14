<?php
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
                        <?php the_title(); ?>
                    </h1>
                    <?php if(strip_tags(get_field('date_input_to_show'))): ?>
                        <p class="h-2"><?php the_field('date_input_to_show'); ?></p>
                    <?php endif; ?>
                    <p class="h-2-description">
                        <?php the_field('block_description'); ?>
                    </p>
                    <?php the_content( ); ?>
                </div>
                <?php if(strip_tags(get_field('event')) || strip_tags(get_field('datetime_to_show_below_content')) || strip_tags(get_field('ticket_price')) || get_field('additional_buttons') || strip_tags(get_field('additional_buttons')) || get_post_type() == 'post'): ?>
                <div class="book-now<?= (!strip_tags(get_field('event')) && !get_field('additional_buttons') && get_post_type() != 'post') ? ' no-buttons' : '' ?><?= (strip_tags(get_field('event'))) ? ' event-exists' : '' ?>">
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
                    
                    <?php if(strip_tags(get_field('event'))): ?>
                        <?php $times = get_spektrix_event_transient_by_id(get_field('event'))['Times']['EventTime']; ?>
                        <?php if(count($times) > 0 && isset($times[0])): ?>
                            <?php foreach($times as $time): $date = new DateTime($time['Time']); $now = new DateTime('now'); ?>
                                <?php if($now < $date): ?>
                                    <?php if($time['SeatsAvailable'] > 0): ?>
                                    <p class="h-2">
                                        <a href="<?=add_query_arg( array('eventID' => $time['EventInstanceId'], 'postID' => get_the_ID()), get_permalink(strip_tags(get_field('book_time_page', 'options'))));?>"><?= $date->format('l, jS'). ' of ' .$date->format('F'). ' @'; ?> <?=$date->format('g:ia');?></a>
                                        <a href="<?=add_query_arg( array('eventID' => $time['EventInstanceId'], 'postID' => get_the_ID()), get_permalink(strip_tags(get_field('book_time_page', 'options'))));?>" class="btn btn-md btn-white"><span>Book now</span></a>
                                    </p>
                                    <?php else: ?>
                                    <p class="h-2">
                                        <a href="javascript:void(0);"><?= $date->format('l, jS'). ' of ' .$date->format('F'). ' @'; ?> <?=$date->format('g:ia');?></a>
                                        <a href="javascript:void(0);" class="btn btn-md btn-white"><span>Sold out</span></a>
                                    </p>
                                    <?php endif;?>
                                <?php endif;?>
                            <?php endforeach; ?>
                        <?php elseif(strip_tags(get_field('event')) && !isset($times[0])): $date = new DateTime($times['Time']);?>
                            <?php if($times['SeatsAvailable'] > 0): ?>
                            <p class="h-2">
                                <a href="<?=add_query_arg( array('eventID' => $times['EventInstanceId'], 'postID' => get_the_ID()), get_permalink(strip_tags(get_field('book_time_page', 'options'))));?>"><?= $date->format('l, jS'). ' of ' .$date->format('F'). ' @'; ?> <?=$date->format('g:ia');?></a>
                                <a href="<?=add_query_arg( array('eventID' => $times['EventInstanceId'], 'postID' => get_the_ID()), get_permalink(strip_tags(get_field('book_time_page', 'options'))));?>" class="btn btn-md btn-white"><span>Book now</span></a>

                            </p>
                            <?php else: ?>
                            <p class="h-2">
                                <a href="javascript:void(0);"><?= $date->format('l, jS'). ' of ' .$date->format('F'). ' @'; ?> <?=$date->format('g:ia');?></a>
                                <a href="javascript:void(0);" class="btn btn-md btn-white"><span>Sold out</span></a>
                            </p>
                            <?php endif;?>
                        <?php endif; ?>
                    <?php endif; ?>

                    <?php if(strip_tags(get_field('additional_text'))): ?>
                        <p class="h-2">
                            <?php the_field('additional_text'); ?>
                        </p>
                    <?php endif; ?>
                    <?php if(get_post_type() == 'post'): ?>
                        <a href="<?=get_permalink(get_field('blog_page', 'options'));?>" class="btn btn-md btn-white"><span>Back</span></a>
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