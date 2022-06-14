<?php if( have_rows('testimonial') ): ?>
<div class="container">
    <?php while( have_rows('testimonial') ): the_row(); ?>
        <div class="quote<?= get_sub_field('picture') ? ' _v-person' : '';?>">
            <div class="row">
                <?php if(get_sub_field('picture')): ?>
                <div class="person-wrapper col-xs-12">
                    <img src="<?=hd_get_image_url_from_id(get_sub_field('picture'), 'logo');?>" alt="<?= strip_tags(get_sub_field('full_name')); ?>" class="person">
                </div>
                <?php endif; ?>
                <div class="quote-wrapper col-xs-12">
                    <div class="quotes"><img src="<?=get_template_directory_uri();?>/assets/images/quotes.svg" alt=""></div>
                    <div class="the-quote">
                    <?php the_sub_field('comment') ?>
                    </div>
                    <div class="quote-meta">
                        <p class="name"><?php the_sub_field('full_name') ?></p>
                        <p class="title"><?php the_sub_field('role') ?>, <?php the_sub_field('company') ?></p>
                        <?php if(get_sub_field('logo')): ?>
                            <img src="<?=hd_get_image_url_from_id(get_sub_field('logo'), 'logo');?>" alt="<?= strip_tags(get_sub_field('company')); ?>" class="company">
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>
    <?php endwhile; ?>
</div>
<?php endif; ?>