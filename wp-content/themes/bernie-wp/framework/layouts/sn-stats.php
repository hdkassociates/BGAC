<div class="container">
    <div class="stat-cards<?=get_sub_field('v2') ? ' _v2' : get_sub_field('v2');?>">
        <?php if( have_rows('stat_list') ): while( have_rows('stat_list') ): the_row(); ?>
        <?php
            if(!empty(get_sub_field('url'))) {
                $link = esc_attr(strip_tags(get_sub_field('url')));
            }
            if(!empty(get_sub_field('custom_url'))) {
                $link = esc_attr(strip_tags(get_sub_field('custom_url')));
            }
        ?>
            <?php if(isset($link)): ?>
                <a href="<?=$link;?>" class="item">
            <?php else: ?>
                <div class="item">
            <?php endif;?>

                <p class="stat"><?php the_sub_field('title') ?></p>
                <p class="desc"><?php the_sub_field('description') ?></p>

            <?php if(isset($link)): ?>
                </a>
            <?php else: ?>
                </div>
            <?php endif;?>
        <?php endwhile; endif; ?>
    </div>
</div>