<?php if(!empty(get_field('title'))): ?>
	<?php
		$link = get_field('button_page_link');
		if(!empty(get_field('button_external_url'))) {
			$link = esc_attr(strip_tags(get_field('button_external_url')));
		}
	?>
<section class="sticky bottom _bg-green _text-white">
    <div class="container">
        <div class="left-side"><?php the_field('title'); ?></div>
        <div class="right-side">
            <a href="<?=$link;?>" class="btn btn-cta btn-white"><span><?php the_field('button_text'); ?></span></a>
        </div>
        <p><?php the_field('description'); ?></p>
    </div>
</section>
<?php endif; ?>