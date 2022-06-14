<div class="container">
    <ul class="logo-list hidden-xs">
        <?php if(!empty(strip_tags(get_sub_field('text')))): ?>
            <li class="text"><?php the_sub_field('text'); ?></li>
        <?php endif; ?>
        <?php if( have_rows('logos') ): ?>
            <?php while( have_rows('logos') ): the_row(); ?>
                <li><img src="<?=hd_get_image_url_from_id(get_sub_field('logo'), 'logo');?>" alt="simplanova client"></li>
            <?php endwhile; ?>
        <?php endif; ?>
    </ul>
</div>