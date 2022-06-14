<?php 
    $terms = get_the_terms($post->ID, 'category');
    $image = get_template_directory_uri().'/assets/images/picture.png';
    if(has_post_thumbnail($post->ID)):
        $image = get_the_post_thumbnail_url($post->ID, 'sq_sm') != '' ? get_the_post_thumbnail_url($post->ID, 'sq_sm') : $image;
    endif;
?>
<a class="item" href="<?php the_permalink(); ?>">
    <div class="img _bg-cover" style="background-image: url('<?=$image;?>')"></div>
    <div class="content">
        <?php if($terms): ?>
            <p class="category"><?= $terms[0]->name; ?></p>
        <?php endif; ?>
        <h4 class="heading"><?=shorten_title(strip_tags(get_the_title()), 5); ?></h4>
        <p class="author">Author: <?php the_author(); ?></p>
        <p class="date"><?php the_time('j M Y'); ?></p>
        <div class="desc">
            <?php the_excerpt(); ?>
        </div>
        <span class="read-more btn-f btn-f-white">Read more</span>
    </div>
</a>