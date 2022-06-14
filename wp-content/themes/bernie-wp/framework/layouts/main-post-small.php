<?php 
global $small_index;
$small_index++;
$class = ($small_index % 2 == 0) ? 'pull-right blue-color' : 'green-color';
?>
            <div class="main-post-small  <?php echo $class; ?>" style="background: url(<?php echo hd_get_image_url_from_id( get_sub_field( 'block_image' ), 'sq_lg') ?>) no-repeat center bottom;">
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