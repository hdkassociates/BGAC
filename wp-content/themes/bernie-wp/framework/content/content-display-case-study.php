<?php $terms = get_the_terms($post->ID, 'case_study_category'); ?>
<a href="<?php the_permalink(); ?>" class="study-card">
    <?php if(get_field('logo_color') != ''): ?>
        <img src="<?=hd_get_image_url_from_id(get_field('logo_color'), 'logo');?>" alt="<?= strip_tags(get_field('company')); ?>" class="logo">
    <?php endif; ?>
    <p class="name"><?php the_field('company'); ?></p>
    <?php if($terms): ?>
        <p class="type"><?= $terms[0]->name; ?>a</p>
    <?php endif; ?>
    <p class="desc"><?php the_field('intro'); ?></p>
    <div class="hover">
        <?php if(get_field('logo_white') != ''): ?>
            <img src="<?=hd_get_image_url_from_id(get_field('logo_white'), 'logo');?>" alt="" class="logo logo-white">
        <?php endif; ?>
        <div class="hover-content">
            <p class="stat"><?php the_field('result_statistic'); ?></p>
            <p class="desc"><?php the_field('result_description'); ?></p>
            <span class="read-more btn-f btn-f-white">Read more</span>
        </div>
    </div>
</a>