<?php get_header(); ?>

<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); 
$tags = get_the_terms($post->ID, 'post_tag');
$tags_in = array();
foreach ($tags as $key => $tag) {
    $tags_in[] .= $tag->term_id; 
}
$topics = get_the_terms($post->ID, 'category');
$image = get_template_directory_uri().'/assets/images/picture.png';
if(has_post_thumbnail($post->ID)):
    $image = get_the_post_thumbnail_url($post->ID, 'slide') != '' ? get_the_post_thumbnail_url($post->ID, 'slide') : $image;
endif;
?>

    <section class="section _bg-cover _overlay-blue _text-white _text-center"
            style="background-image: url('<?=$image;?>')">
        <div class="container">
            <div class="content">
                <div class="gap gap-80"></div>
                <h1 class="heading-main _max-width-740">
                    <?php the_title(); ?>
                </h1>
                <h2 class="subheading _max-width-560"><?php the_field('subheader'); ?></h2>
                <div class="gap gap-40"></div>
            </div>
        </div>
    </section>

    <div class="container">
        <?php qt_custom_breadcrumbs(); ?>
    </div>
    <article>
        <section class="section _bg-white _text-black">
            <div class="container">
                <?php the_content(); ?>
            </div>
        </section>
        <?php require_once(__DIR__.'/framework/content/content-sections.php'); ?>
    </article>
    <section class="section _bg-white _text-black">
        <div class="container">
            <div class="gap gap-20"></div>
            <div class="divider social">
                <div class="dots">
                    <a href="https://www.facebook.com/sharer/sharer.php?u=<?=esc_attr(strip_tags(get_permalink())); ?>" class="dot facebook" target="_blank"><i class="i i-facebook2"></i></a>
                    <a href="https://twitter.com/home?status=<?=esc_attr(strip_tags(get_the_title())); ?>" class="dot twitter" target="_blank"><i class="i i-twitter"></i></a>
                    <a href="https://www.linkedin.com/shareArticle?mini=true&url=<?=esc_attr(strip_tags(get_permalink())); ?>&title=<?=esc_attr(strip_tags(get_the_title())); ?>&summary=<?=esc_attr(strip_tags(get_the_excerpt())); ?>&source=Simplanova" class="dot linkedin" target="_blank"><i class="i i-linkedin"></i></a>
                </div>
            </div>
        </div>
    </section>
    <div class="gap gap-50"></div>
    
<?php endwhile; endif; ?>
<?php get_footer(); ?>