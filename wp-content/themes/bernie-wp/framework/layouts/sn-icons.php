<?php 
    $theme = get_sub_field('title_theme');
    $items = get_sub_field('items_per_row') ? get_sub_field('items_per_row') : 3;
    $align = get_sub_field('text_align') ? get_sub_field('text_align') : 'text-center';
 ?>
<?php if( have_rows('list') ): ?>
<div class="container">
    <div class="items-with-icons">
        <div class="items items-<?=$items;?>">
            <?php while( have_rows('list') ): the_row(); ?>
                <?php
                    if(!empty(get_sub_field('button_url'))) {
                        $link = esc_attr(strip_tags(get_sub_field('button_url')));
                    }
                    if(!empty(get_sub_field('custom_url'))) {
                        $link = esc_attr(strip_tags(get_sub_field('custom_url')));
                    }
                ?>
            <div class="item <?=$align;?>">
                <?php if(get_sub_field('icon')): ?>
                    <img src="<?=hd_get_image_url_from_id(get_sub_field('icon'), 'icon');?>" alt="<?= strip_tags(get_sub_field('title')); ?>" class="icon">
                <?php endif; ?>
                <h6 class="item-heading <?=$theme;?>"><?php the_sub_field('title'); ?></h6>
                <p class="desc"><?php the_sub_field('description'); ?></p>
                <?php if(isset($link)): ?>
                    <a href="<?=$link;?>" class="btn btn-cta btn-blue"><span><?php the_sub_field('button_title'); ?></span></a>
                <?php endif; ?>
            </div>
            <?php endwhile; ?>
        </div>
    </div>
</div>
<?php endif; ?>