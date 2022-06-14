<div class="_relative _z-1">
    <div class="slider">
        <div class="royalSlider rsUni">
            <?php if( have_rows('slides') ): while( have_rows('slides') ): the_row(); ?>
                <?php
                    if(!empty(get_sub_field('button_url'))) {
                        $link = esc_attr(strip_tags(get_sub_field('button_url')));
                    }
                    if(!empty(get_sub_field('custom_url'))) {
                        $link = esc_attr(strip_tags(get_sub_field('custom_url')));
                    }
                ?>
            <div class="slide">
                <p class="slide-category">
                    <?php if(get_sub_field('icon')): ?>
                        <img src="<?=hd_get_image_url_from_id(get_sub_field('icon'), 'icon');?>" alt="<?= strip_tags(get_sub_field('title')); ?>">
                    <?php endif; ?>
                    <?php the_sub_field('title'); ?>
                </p>
                <h6 class="slide-heading"><?php the_sub_field('heading'); ?></h6>
                <p class="slide-desc"><?php the_sub_field('description'); ?></p>
                <?php if(isset($link)): ?>
                    <a href="<?=$link;?>" class="btn btn-cta btn-white"><span><?php the_sub_field('button_title'); ?></span></a>
                <?php endif; ?>
            </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</div>