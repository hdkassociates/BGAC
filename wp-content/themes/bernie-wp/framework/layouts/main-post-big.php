<?php 
global $big_index;
$big_index++;
$class = ($big_index % 2 == 0) ? 'paleviolet-color' : 'yellow-color';
?> 

<div class="main-post-big hidden-sm hidden-xs  <?php echo $class; ?>" style="background: url(<?php echo hd_get_image_url_from_id( get_sub_field( 'block_image' ), 'full') ?>) no-repeat center top; background-size: cover;">
    <div class="square-mobile" style="background: url(<?php echo hd_get_image_url_from_id( get_sub_field( 'block_responsive_image' ), 'sq_lg') ?>) no-repeat center center;">
    <a href="<?php the_sub_field( 'block_url' ); ?>" class="cover-card-link"></a>
    <div class="line-top">
    </div>
    <div class="triangle-top-left"></div>
    <div class="triangle-top-left-white"></div>
    <div class="triangle-bottom-right"></div>
    <a href="<?php the_sub_field( 'block_url' ); ?>">
        <h1><?php the_sub_field( 'block_title' ); ?></h1>
    </a>
    <div class="main-post-text">
        <a href="<?php the_sub_field( 'block_url' ); ?>">
        <span>
            <h2><?php the_sub_field( 'block_text' ); ?></h2>
            <p class="h2-description"><?php the_sub_field( 'block_subtext' ); ?></p>
        </span>
        </a>
        <a href="<?=strip_tags(get_sub_field( 'block_url' )); ?>" class="btn btn-lg <?=strip_tags(get_sub_field( 'block_button_class' )); ?>"><span><?php the_sub_field( 'block_button_text' ); ?></span></a>
    </div>
    </div>
</div>

<div class="main-post-small visible-sm visible-xs  <?php echo $class; ?>" style="background: url(<?php echo hd_get_image_url_from_id( get_sub_field( 'block_responsive_image' ), 'sq_lg') ?>) no-repeat center top; background-size: cover;">
    <a href="<?php the_sub_field( 'block_url' ); ?>" class="cover-card-link"></a>
    <div class="line-top"></div>
    <div class="triangle-top-left"></div>
    <div class="triangle-top-left-white"></div>
    <div class="triangle-bottom-right"></div>
    <a href="<?php the_sub_field( 'block_url' ); ?>">
        <h1><?php the_sub_field( 'block_title' ); ?></h1>
    </a>
    <div class="main-post-text">
        <a href="<?php the_sub_field( 'block_url' ); ?>">
            <span>
                <h2><?php the_sub_field( 'block_text' ); ?></h2>
                <p><?php the_sub_field( 'block_subtext' ); ?></p>  
            </span>
        </a>
    </div>
    <a href="<?=strip_tags(get_sub_field( 'block_url' )); ?>" class="btn btn-md <?= strip_tags(get_sub_field( 'block_button_class' )); ?>"><span><?php the_sub_field( 'block_button_text' ); ?></span></a>
</div>