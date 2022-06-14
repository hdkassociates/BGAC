<?php
    if(!empty(get_sub_field('button_url'))) {
        $link = esc_attr(strip_tags(get_sub_field('button_url')));
    }
    if(!empty(get_sub_field('custom_url'))) {
        $link = esc_attr(strip_tags(get_sub_field('custom_url')));
    }
?>
<div class="container get-quote">
    <div class="row">
        <div class="col-xs-12 col-sm-8 _text-white">
            <h6 class="subsubheading"><?php the_sub_field('title'); ?></h6>
            <p><?php the_sub_field('description'); ?></p>
        </div>
        <div class="col-xs-12 col-sm-4 btn-cta-wrapper">
            <a href="<?=$link;?>" class="btn btn-cta btn-white"><span><?php the_sub_field('button_title'); ?></span></a>
        </div>
    </div>
</div>