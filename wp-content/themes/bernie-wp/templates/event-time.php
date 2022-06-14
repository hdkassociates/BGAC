<?php
/*
Template Name: Book Event time
*/

get_header(); ?>
<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
        <script
        type='text/javascript'
        src='https://tickets.berniegrantcentre.co.uk/<?=strip_tags(get_field('spektrix_id'));?>/website/scripts/resizeiframe.js'>
        </script>
        <div class="hero-section">
            <div class="white-space"></div>
            <div class="hero-bg">
            </div>
        </div>
        <div class="section inner-page">
            <div class="main-content header-slider">
                <?php if ( isset($_GET['postID']) && have_rows( 'slider', $postID=$_GET['postID'] ) ) : ?>
                    <div class="<?=(count( get_field('slider', $postID=$_GET['postID'])) > 1 ? 'slick-slider' : 'no-slick-slider');?>">
                        <?php while ( have_rows( 'slider', $postID=$_GET['postID'] ) ) : the_row(); ?>
                            <div class="slick-slide-wrap">
                                <img src="<?php echo hd_get_image_url_from_id( get_sub_field( 'slide' ), 'slide' ); ?>">
                                <?php if(strip_tags(get_sub_field('caption'))): ?>
                                    <span class="slick-caption"><?=strip_tags(get_sub_field('caption'));?></span>
                                <?php endif; ?>
                            </div>
                        <?php endwhile; ?>
                    </div>
                <?php else: ?>
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
                    <?php if(isset($_GET['eventID'])): $eID=$_GET['eventID']; ?>
                    <iframe
                    name="SpektrixIFrame"
                    id="SpektrixIFrame"
                    frameborder="0"
                    scrolling="no"
                    src="https://tickets.berniegrantcentre.co.uk/<?=strip_tags(get_field('spektrix_id'));?>/website/ChooseSeats.aspx?resize=true&amp;EventInstanceId=<?=$eID;?>"
                    style="width: 100%; margin: 0 auto; min-height: 600px; position: relative; z-index: 9;"></iframe>
                    <?php else: ?>
                    <p>Event was not found.</p>
                    <?php endif; ?>
                </div>
                
                
                <div class="clearfix"></div>
            </div>
            <div class="aside">
                <ul class="list-unstyled sidebar-btns">
                    <li><a href="<?=get_permalink(get_field('my_account_page', 'options'));?>" class="btn btn-md btn-green"><span>My Booking Account</span></a></li>
                    <li><a href="<?=get_permalink(get_field('basket_page', 'options'));?>" class="btn btn-md btn-green"><span>My Basket</span></a></li>
                </ul>
            </div>
        </div>
        <div class="clearfix"></div>

<?php endwhile; endif; ?>
<?php get_footer(); ?>


