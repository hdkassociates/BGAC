<div class="container">
    <div class="video-gallery-wrapper text-left">
        <div id="video-gallery" class="royalSlider rsUni videoGallery">
            <?php if( have_rows('slides') ): $i=0; while( have_rows('slides') ): the_row(); $i++; ?>
            <div class="slide">
                <img src="<?=hd_get_image_url_from_id(get_sub_field('image'), 'slide');?>" alt="<?= strip_tags(get_sub_field('heading')); ?>" class="rsImg">
                <div class="rsTmb">
                    <h6 class="slide-thumb-heading">#<?=$i;?> <?php the_sub_field('heading'); ?></h6>
                    <p class="slide-thumb-desc"><?php the_sub_field('description'); ?></p>
                </div>
            </div>
            <?php endwhile; endif; ?>
        </div>
    </div>
</div>