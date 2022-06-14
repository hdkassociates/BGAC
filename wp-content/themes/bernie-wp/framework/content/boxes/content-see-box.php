<li>
    <div class="card">
        <div class="image-container" style="background: url(<?php the_post_thumbnail_url( 'sq_md' ); ?>)">
            <a href="<?php the_permalink( );?>" class="cover-card-link"></a>
            <div class="triangle-top-left"></div>
            <div class="triangle-top-left-white"></div>
            <div class="triangle-bottom-right"></div>
        </div>
        <a href="<?php the_permalink( );?>">
            <h2><?php the_title( ); ?></h2>
            <p class="card-date"><?php the_field('date_input_to_show'); ?></p>
            <p class="h2-description">
                <?php the_field('block_description'); ?>
            </p>
        </a>
        <a href="<?php the_permalink( ); ?>" class="btn btn-md btn-white"><span>More Info</span></a>
        <?php if(get_field('event')): ?>
            <?php $times = get_spektrix_event_transient_by_id(get_field('event'))['Times']['EventTime']; ?>
            <?php if(strip_tags(get_field('event')) && isset($times[0])): $printed = false;?>
                 <?php foreach($times as $key => $time): $date = new DateTime($time['Time']); $now = new DateTime('now'); ?>
                    <?php if($now < $date && !$printed && $time['SeatsAvailable'] > 0): $printed = true; ?>
                        <a href="<?=add_query_arg( array('eventID' => $time['EventInstanceId'], 'postID' => get_the_ID()), get_permalink(strip_tags(get_field('book_time_page', 'options'))));?>" class="btn btn-md btn-white btn-second"><span>Book now</span></a>
                    <?php endif;?>
                <?php endforeach; ?>
                <?php if(!$printed): ?>
                    <a href="javascript:void(0);" class="btn btn-md btn-white btn-second"><span>Sold out</span></a>
                <?php endif;?>
            <?php elseif(strip_tags(get_field('event')) && !isset($times[0])): ?>
                <?php if($times['SeatsAvailable'] > 0): ?>
                <a href="<?=add_query_arg( array('eventID' => $times['EventInstanceId'], 'postID' => get_the_ID()), get_permalink(strip_tags(get_field('book_time_page', 'options'))));?>" class="btn btn-md btn-white btn-second"><span>Book now</span></a>
                <?php else: ?>
                    <a href="javascript:void(0);" class="btn btn-md btn-white btn-second"><span>Sold out</span></a>
                <?php endif; ?>
            <?php endif; ?>
        <?php endif; ?>
    </div>
</li>