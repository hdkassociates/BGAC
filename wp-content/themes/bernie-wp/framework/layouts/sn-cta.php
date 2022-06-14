<?php
    if(!empty(get_sub_field('url'))) {
        $link = esc_attr(strip_tags(get_sub_field('url')));
    }
    if(!empty(get_sub_field('custom_url'))) {
        $link = esc_attr(strip_tags(get_sub_field('custom_url')));
    }
?>
<a href="<?=$link;?>" class="btn btn-cta <?php the_sub_field('color'); ?>"><span><?php the_sub_field('text'); ?></span></a>