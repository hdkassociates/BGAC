<?php 
    $size_xs = get_sub_field('size_xs') ? get_sub_field('size_xs') : false; ?>
<div class="gap<?=$size_xs ? ' hidden-xs' : '';?>" style="height: <?php the_sub_field('size') ?>px;"></div>
<?php if($size_xs): ?>
<div class="gap visible-xs" style="height: <?php echo $size_xs; ?>px;"></div>
<?php endif;?>