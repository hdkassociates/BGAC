<?php

$args = array(
    'post_type' => 'post',
    'post_status' => 'publish',
    'posts_per_page' => 1,
    'orderby' => 'date',
    'order' => 'DESC'
);

$blog_posts = new WP_Query ($args);
while ( $blog_posts->have_posts() ) : $blog_posts->the_post(); ?>
<?php 
    $terms = get_the_terms($post->ID, 'category');;
    $image = get_template_directory_uri().'/assets/images/picture.png';
    if(has_post_thumbnail($post->ID)):
        $image = get_the_post_thumbnail_url($post->ID, 'rc_lg') != '' ? get_the_post_thumbnail_url($post->ID, 'rc_lg') : $image;
    endif;
?>
<section class="section _bg-white _text-black">
    <div class="container">
        <div class="row blog-featured-article">
            <div class="col-sm-4 col-md-6">
                <img src="<?=$image;?>" alt="<?=esc_attr(get_the_title());?>">
            </div>
            <div class="col-sm-8 col-md-6">
                <div class="content">
                    <p class="category"><?= $terms[0]->name; ?></p>
                    <h2 class="heading"><?php the_title(); ?></h2>
                    <p class="author-date">
                        <span class="author"><?php the_author(); ?></span>
                        <span class="date"><?php the_time('j M Y'); ?></span>
                    </p>
                    <div class="desc">
                        <?php the_excerpt(); ?>
                    </div>
                    <div class="gap gap-20"></div>
                    <a href="<?php the_permalink(); ?>" class="btn btn-cta btn-blue"><span>Read Article</span></a>
                </div>
            </div>
        </div>
    </div>
</section>
<?php endwhile; ?>